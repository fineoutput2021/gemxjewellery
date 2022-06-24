<?php

namespace App\Http\Controllers\frontend;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\ProductColorSize;
use App\adminmodel\Color;
use App\adminmodel\Size;
use App\adminmodel\CustomOrder;
use App\adminmodel\WholesaleInquiry;
use App\adminmodel\AskQuestion;
use App\adminmodel\NewsLetter;
use App\adminmodel\Contact;
use App\adminmodel\Countries;
use App\frontendmodel\User;
use App\frontendmodel\Cart;
use App\frontendmodel\SiteReview;
use App\frontendmodel\ReferAFriend;
use App\frontendmodel\User_Giftcard;
use App\frontendmodel\Address;
use App\adminmodel\GiftCard;
use App\adminmodel\GiftCardPrice;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\adminmodel\Slider;
use App\adminmodel\Slider2;
use App\adminmodel\SaleProduct;
use App\adminmodel\Sale;
use App\adminmodel\Promocode;
use App\frontendmodel\Order1;
use App\frontendmodel\PromocodeApplied;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use Omnipay\Omnipay;
use session;

class GiftCardController extends Controller
{
    public $gateway;

    public function __construct()
    {
        $this->gateway = Omnipay::create('PayPal_Rest');
        //sandbox
        $this->gateway->setClientId('AcIQTr5qtgjXY97I-dDqHwkUxK-CB_cTXGtpxcFGb4KYFIO9MkEYPaihaEVmKQ24slxR-I5vz6RvYtgM');
        $this->gateway->setSecret('EM3tuoRB138Ll0ZbTfKmxivQCHygwK5lVDCKrPVp6NshSH72c-cDTE9RQCxPx6Z5lkd7dfTQWiPJUthV');
        $this->gateway->setTestMode(true); //set it to 'false' when go live
            //live
            // $this->gateway->setClientId('AU0whuVsBbfGgTjGVSfHg5aiLuME-SpNg_1GQdpC2EJPARWVhQKINfVGaFirUgsQpqpkl3KaomRhTA64');
            // $this->gateway->setSecret('EGNOhnfRPGQs-SqqVtRowfIxlodyhsUXi53ZY4fLy5tLZSC_VHxlYUawC34VqepM7X7VJUs8TDcZk7ep');
            // $this->gateway->setTestMode(false); //set it to 'false' when go live
    }

    public function charge($amu, $idd, Request $request)
    {
        $am= base64_decode($amu);
        $id= base64_decode($idd);
        // if($request->input('submit'))
        // {
        try {
            $response = $this->gateway->purchase(array(
                                'amount' => $am,
                                'currency' => 'USD',
                                'returnUrl' => url('giftpaymentsuccess/'.$idd),
                                'cancelUrl' => url('giftpaymenterror'),
                        ))->send();

            if ($response->isRedirect()) {
                $response->redirect(); // this will automatically forward the customer
            } else {
                // not successful
                return $response->getMessage();
                // dd($response);
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
        // }
    }

    public function payment_success($idd, Request $request)
    {
        $id= base64_decode($idd);
        // Once the transaction has been approved, we need to complete it.
        if ($request->input('paymentId') && $request->input('PayerID')) {
            $transaction = $this->gateway->completePurchase(array(
                        'payer_id'             => $request->input('PayerID'),
                        'transactionReference' => $request->input('paymentId'),
                ));
            $response = $transaction->send();

            if ($response->isSuccessful()) {
                // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $isPaymentExist = Order1::where('payment_id', $arr_body['id'])->first();

                if (!$isPaymentExist) {
                    $payment_id = $arr_body['id'];
                    $payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payer_email = $arr_body['payer']['payer_info']['email'];
                    $payamount = $arr_body['transactions'][0]['amount']['total'];
                    $currency = env('PAYPAL_CURRENCY');
                    $paypal_payment_status = $arr_body['state'];


                    //user_giftcard table update data
                    $usr_giftcardInfo= [

                                    'payment_id'=>$payment_id,
                                    'payer_id'=> $payer_id,
                                    'payer_email'=> $payer_email,
                                    'pay_amount'=>$payamount,
                                    'currency'=>$currency,
                                    'paypal_payment_status'=>$paypal_payment_status,
                                'payment_type' => 2,
                                'payment_status' =>1,
                                'order_status' =>1,


                              ];



                    $giftcard_order= User_Giftcard::wherenull('deleted_at')->where('id', $id)->first();
                    // echo $refrs; die();
                    if (!empty($giftcard_order)) {
                        $giftcard_order->update($usr_giftcardInfo);

                        //get order giftcard price
                        $giftcard_pricess = GiftCardPrice::wherenull('deleted_at')->where('is_active', 1)->where('id', $giftcard_order->giftcard_price_id)->first();
                        if (!empty($giftcard_pricess)) {
                            $gift_price= $giftcard_pricess->price;
                        } else {
                            $gift_price=0;
                        }
                    } else {
                        $gift_price=0;
                    }




                    $user_id= $request->session()->get('user_id');

                    $userr_data= User::wherenull('deleted_at')->where('id', $user_id)->where('is_active', 1)->first();

                    if (!empty($userr_data)) {
                        $user_email= $userr_data->email;
                        $user_name= $userr_data->name;
                    } else {
                        $user_email= "";
                        $user_name= "";
                    }


                    $random_string= $this->generateRandomString();
                    $generate_promo= "GIFT".$random_string.$gift_price;

                    $productInfo= [

    'promocode' => $generate_promo,
    'offer_type' => 4,
    'type' => 1,
    'minimum_amount' =>0,
    'maximum_gift_amount' => $gift_price,
    'order_qualify_type' => 1,
    'start_date' => "",
    'expiry_date' => "",
    'terms_and_conditions' => "",
    // 'ip' => $req->ip(),
    'added_by' => "",
    'is_active' => 1,
    'from_status' => 1,

];


                    $promo_last_id = Promocode::create($productInfo);


                    //send email start

                    $user_giftcard_order= User_Giftcard::wherenull('deleted_at')->where('id', $id)->first();
										// dd($user_giftcard_order);die();

                    if (!empty($user_giftcard_order)) {
                        $sender_name= strtoupper($user_giftcard_order->sender_fname)." ".strtoupper($user_giftcard_order->sender_lname);
                        $recipent_name= strtoupper($user_giftcard_order->recipent_fname)." ".strtoupper($user_giftcard_order->recipent_lname);
                      	$recipent_email= $user_giftcard_order->friend_email;
                        $message= $user_giftcard_order->message;
                    } else {
                        $sender_name= "";
                        $recipent_name= "";
                        $recipent_email= "";
                        $message= "";
                    }

                    $message ="You have receiverd eGift card ".$generate_promo." from ".$sender_name." of $".$gift_price.".
& Message from ".$sender_name." :- ".$message."";
// echo $recipent_email;die();
                    //-----gift card mail------------
                    $data['name'] = $recipent_name;
                    $data['heading'] = "Giftcard For You From Your Friend";
                    $data['body'] = $message;
										// echo $recipent_email;die();

                    Mail::send('email/mail', $data, function ($message) use ($recipent_email){
                        $message->to($recipent_email)->subject('Giftcard For You From Your Friend');
                        $message->from(EMAIL, 'Gemx Jewellery');
                    });
                }

                // return "Payment is successful. Your transaction id is: ". $arr_body['id'];

                // return Redirect('/order_success');

                $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

                return view('frontend/giftcard_success', ['category_data'=>$categories ]);
            } else {


                    // The customer has successfully paid.
                $arr_body = $response->getData();

                // Insert transaction data into the database
                $isPaymentExist = Order1::where('payment_id', $arr_body['id'])->first();

                if (!$isPaymentExist) {
                    $payment_id = $arr_body['id'];
                    $payer_id = $arr_body['payer']['payer_info']['payer_id'];
                    $payer_email = $arr_body['payer']['payer_info']['email'];
                    $payamount = $arr_body['transactions'][0]['amount']['total'];
                    $currency = env('PAYPAL_CURRENCY');
                    $paypal_payment_status = $arr_body['state'];


                    //user_giftcard table update data
                    $usr_giftcardInfo= [

                                'payment_id'=>$payment_id,
                                'payer_id'=> $payer_id,
                                'payer_email'=> $payer_email,
                                'pay_amount'=>$payamount,
                                'currency'=>$currency,
                                'paypal_payment_status'=>$paypal_payment_status,

                            'payment_type' => 2,
                            'payment_status' =>0,
                            'order_status' =>0,


                            ];



                    $giftcard_order= User_Giftcard::wherenull('deleted_at')->where('id', $id)->first();
                    // echo $refrs; die();
                    if (!empty($giftcard_order)) {
                        $giftcard_order->update($usr_giftcardInfo);
                    }

                    // return $response->getMessage();
                    return Redirect('/giftpaymenterror');
                } else {
                    return Redirect('/giftpaymenterror');
                }
            }
        } else {
            return 'Transaction is declined';
        }
    }

    public function payment_error(Request $request)
    {
        // return 'User is canceled the payment.';

        $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

        return view('frontend/giftcard_failed', ['category_data'=>$categories ]);
    }


    public function gift_payment_success(Request $request)
    {
        // return 'User is success the payment.';

        $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

        return view('frontend/giftcard_success', ['category_data'=>$categories ]);
    }




    //send_giftcard_view to afriend reviews

    public function send_giftcard_view(Request $req)
    {

// if(!empty($req->session()->has('user_data'))){
        log::debug('frontend-send_giftcard_view');

        $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
        $giftcards = GiftCard::wherenull('deleted_at')->where('is_active', 1)->get();
        $giftcard_prices = GiftCardPrice::wherenull('deleted_at')->where('is_active', 1)->get();

        $first_giftcard = GiftCard::wherenull('deleted_at')->where('is_active', 1)->first();
        $first_giftcard_prices = GiftCardPrice::wherenull('deleted_at')->where('is_active', 1)->first();


        return view('frontend/giftcard_view', ['category_data'=>$categories, 'giftcard_data'=>$giftcards, 'giftcard_price_data'=>$giftcard_prices, 'first_giftcard'=>$first_giftcard, 'first_giftcard_prices'=>$first_giftcard_prices ]);
        // return Redirect('/refer_a_friend');

  // }else{
  //   return Redirect('/open_login');
  // }
    }



    //send_giftcard_view to afriend reviews

    public function open_giftcard_checkout($idd, Request $req)
    {
        if (!empty($req->session()->has('user_data'))) {
            log::debug('frontend-send_giftcard_view');

            $id= base64_decode($idd);
            $user_id= $req->session()->get('user_id');

            $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
            $user_giftcards = User_Giftcard::wherenull('deleted_at')->where('id', $id)->first();
            $user_addr_data = Address::wherenull('deleted_at')->where('user_id', $user_id)->get();



            return view('frontend/giftcard_checkout', ['category_data'=>$categories, 'giftcard_data'=>$user_giftcards , 'user_addr_data'=> $user_addr_data, 'user_gift_id'=> $idd]);
        // return Redirect('/refer_a_friend');
        } else {
            return Redirect('/');
        }
    }



    //add detail refer_friend_process form process

    public function giftcard_checkout(Request $req)
    {

        if (!empty($req->session()->has('user_data'))) {
            log::debug('yes Id');
            $req->validate([
    'giftcard_id' => 'required',
    'giftcard_price_id' => 'required',
    'sender_fname' => 'required',
    'sender_lname' => 'required',
    'recipent_fname' => 'required',
    'recipent_lname' => 'required',
    'friend_email' => 'required',
    'confirm_friend_email' => 'required',

    ]);

            $user_id= $req->session()->get('user_id');

            $giftcard_id= $req->input('giftcard_id');
            $giftcard_price_id= $req->input('giftcard_price_id');
            $sender_fname= $req->input('sender_fname');
            $sender_lname= $req->input('sender_lname');
            $recipent_fname= $req->input('recipent_fname');
            $recipent_lname= $req->input('recipent_lname');
            $friend_email= $req->input('friend_email');
            $confirm_friend_email= $req->input('confirm_friend_email');
            $message= $req->input('message');

            $ip= $req->ip();
            $FriendGiftCardInfo= [

    'user_id' => $user_id,
    'giftcard_id' => $giftcard_id,
    'giftcard_price_id' =>$giftcard_price_id,
    'sender_fname' =>$sender_fname,
    'sender_lname' =>$sender_lname,
    'recipent_fname' =>$recipent_fname,
    'recipent_lname' =>$recipent_lname,
    'friend_email' =>$friend_email,
    'confirm_friend_email' =>$confirm_friend_email,
    'message' =>$message,
    'ip' =>$ip


 ];


            if ($friend_email == $confirm_friend_email) {
                $last_data = User_Giftcard::create($FriendGiftCardInfo);

                $last_id= base64_encode($last_data->id);


                return Redirect('/giftcard_order_place/'.$last_id);
            } else {
                return Redirect::back()->with('status-error', 'friend email and confirm email does not matched.');
            }
        } else {
            return Redirect('/open_login?localcart=2');
        }
    }






    //add detail refer_friend_process form process

    public function giftcard_order_place($idd, Request $req)
    {
        if (!empty($req->session()->has('user_data'))) {
            log::debug('yes Id');
            $req->validate([
    // 'addr_id' => 'required',
    // 'payment' => 'required'

    ]);

            $id= base64_decode($idd);

            // $country_code= $req->input('country_code');
            // $contact= $req->input('contact');
            // $country= $req->input('country');

            $user_id= $req->session()->get('user_id');
            $address_id= "";
            $payment_type= 2;
            $order_status= 0;
            $payment_status= 0;



            // if(!empty($contact) && !empty($country_code)){
//
            // 	$ContactInfo= [
            // 		'country_code' =>$country_code,
            // 		'contact' =>$contact,
            // 		// 'country' =>$country,
            // 	];
//
//
            // 			$UserData = User::wherenull('deleted_at')->where('id', $user_id)->first();
            // 		log::debug( $UserData);
//
            // 		$UserData->update($ContactInfo);
//
//
//
            // }else{
            // 	return Redirect::back()->with('status-error', 'Please add contact or country information before place an order.');
            // }



            $usr_giftcardInfo= [

    'user_id' => $user_id,
    'address_id' =>$address_id,
    'payment_type' =>$payment_type,
    'payment_status' =>$payment_status,
    'order_status' =>$order_status,


 ];



            $giftcard_order= User_Giftcard::wherenull('deleted_at')->where('id', $id)->first();
            // echo $refrs; die();
            if (!empty($giftcard_order)) {
                $giftcard_order->update($usr_giftcardInfo);
            }

            $giftcard_order= User_Giftcard::wherenull('deleted_at')->where('id', $id)->first();
            if (!empty($giftcard_order)) {
                $giftcard_pric_id= $giftcard_order->giftcard_price_id;

                $giftcard_price= GiftCardPrice::wherenull('deleted_at')->where('id', $giftcard_pric_id)->where('is_active', 1)->first();
                if (!empty($giftcard_price)) {
                    $gift_price= $giftcard_price->price;
                } else {
                    $gift_price="";
                }
            } else {
                $giftcard_pric_id= "";
                $gift_price= "";
            }

            $amm= base64_encode($gift_price);
            $lo_id= base64_encode($id);
            return Redirect('/giftcharge/'.$amm.'/'.$lo_id);

        } else {
            return Redirect('/');
        }
    }


    public function generateRandomString($length = 4)
    {
        $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ%$@*!';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }



//
// public function undoDelete(Request $req,$id){
//
// 		log::debug('$undoDelete');
// 		//log::debug($admin_id);
// 		//$admin = Admin::wherenull('deleted_at')-> where('admin_id', $admin_id)->first();
// 		$admin = Admin::onlyTrashed()->find($id);
// log::debug('$admin');
// 		log::debug($admin);
//         if (!is_null($admin)) {
// log::debug('$notNull');
//             $admin->restore();
// 			 log::debug('$restorsucces');
//             return Redirect('/adminList')->with('status', ' Deleted Admin Restored Successfully.');
//         } else {
//        log::debug('$restorfail');
//
// 			return Redirect('/adminList')->with('status', ' Deleted Admin Restored fail.');
//         }
//
//
//     }
//
// 	public function adminFilter(Request $req){
//
// 		$admin_name= $req->input('admin_name');
// 		$country= $req->input('country_name');
//
// 		log::debug('$adminFilter');
// 		//log::debug($admin_id);
// 		if(($admin_name && $admin_name!="") || ($country== null && $country==""))
// 		{
// 			$admin = Admin::wherenull('deleted_at')-> where('name', $admin_name)->get();
// 		}
// 		elseif(($country && $country!="") || ($admin_name== null && $admin_name=="")){
// 			$admin = Admin::wherenull('deleted_at')-> where('country', $country)->get();
// 		}
// 		else{
// 			$admin="";
// 		}
// 		//$admins =  Admin::wherenull('deleted_at')->get();
//
//        //return Redirect('/adminList')->with('status', 'Admin Deleted Successfully.');
//
//     }

}
