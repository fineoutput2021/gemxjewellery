<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\ProductColorSize;
use App\adminmodel\Color;
use App\adminmodel\Gemstone;
use App\adminmodel\Style;
use App\adminmodel\Shape;
use App\adminmodel\Plating;
use App\adminmodel\Metal;
use App\adminmodel\Material;
use App\adminmodel\Size;
use App\adminmodel\CustomOrder;
use App\adminmodel\WholesaleInquiry;
use App\adminmodel\AskQuestion;
use App\adminmodel\Contact;
use App\adminmodel\NewsLetter;
use App\adminmodel\Countries;
use App\frontendmodel\User;
use App\frontendmodel\Cart;
use App\frontendmodel\ReferAfriend;
use App\frontendmodel\Rating;
use App\frontendmodel\UserCatelogue;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\adminmodel\Slider;
use App\adminmodel\Slider2;
use App\adminmodel\CountriesCurrency;

use App\adminmodel\CustomizeCategory;
use App\adminmodel\CustomizeProduct;
use App\adminmodel\CustomizeMetalColor;
use App\adminmodel\CustomizeProductStone;
use App\adminmodel\EngraveCategory;
use App\adminmodel\EngraveProduct;
use App\adminmodel\PackageItem;

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
// use Omnipay\Omnipay as Omnipay;


class PackageController extends Controller
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


		public function Packages(Request $req){


// if(!empty($req->session()->has('user_data'))){


$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
log::debug($categories);

$Packages_data = PackageItem::wherenull('deleted_at')->where('is_active', 1)->get();

        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/packages', ['category_data'=>$categories, 'packages_data'=>$Packages_data]);


		// }else{
		// 	return Redirect('/open_login');
		// }



  }






	//Buy Package api

			    public function Buy_Package($idd, Request $req)
			     {

			if(!empty($req->session()->has('user_data'))){


	$package_id= base64_decode($idd);

$current_date= date("Y-m-d");


			    $order_status= 1;
			    $payment_status= 1;
			    $user_id= $req->session()->get('user_id');
			    $ip= $req->ip();



			    //package table data check
			    $user_data= User::wherenull('deleted_at')->where('id',$user_id)->first();
			    $package_data= PackageItem::wherenull('deleted_at')->where('id',$package_id)->first();

$last_package_user_id= "";
$buy_package_id= "";
$am= "";

if(!empty($user_data)){

if(empty($user_data->package)){

	$last_package_user_id= $user_data->id;
	$buy_package_id= $package_id;

	if(!empty($package_data)){

		$am= $package_data->buy_price;

	}



}else{

if(!empty($user_data->order_status) ){


if($user_data->payment_status == 1 ){


$user_package_data= PackageItem::wherenull('deleted_at')->where('id',$user_data->package)->first();

if(!empty($user_package_data)){

	$package_exp_date= $user_data->expiry_date;

if($current_date <= $package_exp_date){
 if($user_package_data->buy_price < $package_data->buy_price){
$last_package_user_id= $user_data->id;
   $am= $package_data->buy_price;
   	$buy_package_id= $package_id;

 }else{
   return Redirect::back()->with('status-error', 'You can not choose for a lower package.');
 }

}else{

//if user current package expired

	$last_package_user_id= $user_data->id;
	$buy_package_id= $package_id;

	if(!empty($package_data)){

		$am= $package_data->buy_price;

	}

}


}else{

//if user current package not found in table

	$last_package_user_id= $user_data->id;
	$buy_package_id= $package_id;

	if(!empty($package_data)){

		$am= $package_data->buy_price;

	}


}


}else{

//payment status pending

	$last_package_user_id= $user_data->id;
	$buy_package_id= $package_id;

	if(!empty($package_data)){

		$am= $package_data->buy_price;

	}

}


}

}






//payment gateway start

$amu=  number_format((float)$am, 2, '.', '');
$pack_user_id= base64_encode($last_package_user_id);
$buy_package_id_en= base64_encode($buy_package_id);
 // if($request->input('submit'))
 // {
		 try {
				 $response = $this->gateway->purchase(array(
						 'amount' => $amu,
						 'currency' => 'USD',
						 'returnUrl' => url('packagepaymentsuccess/'.$pack_user_id.'/'.$buy_package_id_en),
						 'cancelUrl' => url('packagepaymenterror'),
				 ))->send();
// echo "<pre>";
// print_r($response); die();
				 if ($response->isRedirect()) {
					 // echo "redirect_right"; die();
						 $response->redirect(); // this will automatically forward the customer
				 } else {
					 // echo "redirect"; die();
						 // not successful
						 return $response->getMessage();
						 // dd($response);
				 }
		 } catch(Exception $e) {
			 // echo "excep"; die();
				 return $e->getMessage();
		 }
 // }





}





			}else{
				return Redirect('/open_login');
			}

			}





			public function packagepaymentsuccess($idd,$p_id, Request $request)
			{

				$cur_date=date("Y-m-d H:i:s");
					$id= base64_decode($idd);
					$package_id= base64_decode($p_id);

$package_data= PackageItem::wherenull('deleted_at')->where('id',$package_id)->first();
$pack_amount= 0;
if(!empty($package_data)){
	$pack_amount= number_format((float)$package_data->buy_price, 2, '.', '');
}

					// Once the transaction has been approved, we need to complete it.
					if ($request->input('paymentId') && $request->input('PayerID'))
					{
							$transaction = $this->gateway->completePurchase(array(
									'payer_id'             => $request->input('PayerID'),
									'transactionReference' => $request->input('paymentId'),
							));
							$response = $transaction->send();

							if ($response->isSuccessful())
							{
									// The customer has successfully paid.
									$arr_body = $response->getData();

									// Insert transaction data into the database
									$isPaymentExist = User::where('payment_id', $arr_body['id'])->first();

									if(!$isPaymentExist)
									{

											$payment_id = $arr_body['id'];
											$payer_id = $arr_body['payer']['payer_info']['payer_id'];
											$payer_email = $arr_body['payer']['payer_info']['email'];
											$payamount = $arr_body['transactions'][0]['amount']['total'];
											$currency = env('PAYPAL_CURRENCY');
											$paypal_payment_status = $arr_body['state'];
											$validity = $package_data->validity;
 											$exp_date = date('d-m-Y', strtotime('+'.$validity.' days'));
											//order1 table update data
											$data_inserts2= [
											  'package'=>$package_id,
											  'expiry_date'=>$exp_date,
											  'payment_id'=>$payment_id,
											  'payer_id'=> $payer_id,
											  'payer_email'=> $payer_email,
											  'pay_amount'=>$payamount,
											  'currency'=>$currency,
											  'paypal_payment_status'=>$paypal_payment_status,

												'total_amount'=>$pack_amount,
												'payment_status'=>1,
												'order_status'=>1,
												'package_buy_date'=>$cur_date,
											];
											$user_packge_da = User::wherenull('deleted_at')->where('id', $id)->first();

											$user_packge_da->update($data_inserts2);


			//get user details
			$user_id= $request->session()->get('user_id');
			$userr_data= User::wherenull('deleted_at')->where('id', $user_id)->where('is_active', 1)->first();

			if(!empty($userr_data)){
				$user_email= $userr_data->email;
				$user_name= $userr_data->name;
			}else{
				$user_email= "";
				$user_name= "";
			}












				//Send Email Start

							// $ordr_data= Order1::wherenull('deleted_at')->where('id', $id)->first();
							//
							// if(!empty($ordr_data)){
							// 	$ordr_id= $ordr_data->id;
							// 	$order_date= $ordr_data->created_at;
							// 	$order_total_amount= $ordr_data->total_amount;
							// 	$order_address= $ordr_data->address_id;
							// 	$order_payment_type= $ordr_data->payment_type;
							// 	$order_delivery_charge= $ordr_data->delivery_charge;
							//
							// 	if($order_payment_type == 1){
							// 		$pay_type= "Cash On Delivery";
							// 	}else{
							// 		$pay_type= "Online Payment";
							// 	}
							//
							// 	$addres_data= Address::wherenull('deleted_at')->where('id', $order_address)->first();
							//
							// 	if(!empty($addres_data)){
							// 		$addrs= "address";
							// 	}else{
							// 		$addrs= "";
							// 	}
							//
							// 	 $newdate = new DateTime($order_date);
							// 	$order_dat = $newdate->format('j F, Y, g:i a');
							//
							// }else{
							// 	$ordr_id= "";
							// 	$order_date= "";
							// 	$order_dat= "";
							// 	$order_total_amount= "";
							// 	$order_address= "";
							// 	$order_payment_type= "";
							// 	$pay_type= "";
							// 	$addrs= "";
							// 	$order_delivery_charge= "";
							//
							// }
							//
							//
							//
							// $ordr_products_data= Order2::wherenull('deleted_at')->where('main_id', $id)->get();
							//
							//
							//
							// $link= base_path."claim_your_gift/".$idd;
							// 	$to_name= $user_name;
							// 			$to_email = $user_email;
							// 			// $department = WholesaleInquiry::wherenull('deleted_at')->where('department_id',$department_id)->select('department_name')->first();
							//
							// 			$data= array('name' => $to_name, 'order_id' => $ordr_id, 'order_date' => $order_dat, 'order_total_amount' => $order_total_amount, 'order_delivery_charge' => $order_delivery_charge, 'pay_type' => $pay_type, 'addrs' => $addrs, 'order2_product' => $ordr_products_data ,'link' => $link);
							// 			Mail::send('frontend/emails/order', $data, function($message) use ($to_name, $to_email){
							//
							// 				$message->to($to_email)->subject('Refer From Your Friend.');
							//
							// 			});


					//Send Email End







			// });




									}

									// return "Payment is successful. Your transaction id is: ". $arr_body['id'];

									return Redirect('/package_order_success');
							} else {


								// The customer has successfully paid.
								$arr_body = $response->getData();

								// Insert transaction data into the database
								$isPaymentExist = User::where('payment_id', $arr_body['id'])->first();

								if(!$isPaymentExist)
								{

										$payment_id = $arr_body['id'];
										$payer_id = $arr_body['payer']['payer_info']['payer_id'];
										$payer_email = $arr_body['payer']['payer_info']['email'];
										$payamount = $arr_body['transactions'][0]['amount']['total'];
										$currency = env('PAYPAL_CURRENCY');
										$paypal_payment_status = $arr_body['state'];


										//order1 table update data
										$data_inserts2= [
											'payment_id'=>$payment_id,
											'payer_id'=> $payer_id,
											'payer_email'=> $payer_email,
											'pay_amount'=>$payamount,
											'currency'=>$currency,
											'paypal_payment_status'=>$paypal_payment_status,

											'total_amount'=>$pack_amount,
											'payment_status'=>0,
											'order_status'=>0,
											'package_buy_date'=>$cur_date,
										];
										$user_packge_da = User::wherenull('deleted_at')->where('id', $id)->first();

										$user_packge_da->update($data_inserts2);


									// return $response->getMessage();
									return Redirect('/packagepaymenterror');
							}
						}
					} else {
							return 'Transaction is declined';
					}
			}

			public function packagepaymenterror( Request $request)
			{
					// return 'User is canceled the payment.';

					return Redirect('/package_orderfailed');
			}


			//order success

			    public function package_order_success(Request $req){

			    log::debug('package_order_success');

			if(!empty($req->session()->has('user_data'))){


			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

			        return view('frontend/package_order_success', ['category_data'=>$categories ]);

						}else{
						  return Redirect('/');
						}

			    }



			//order Failed
					public function package_orderfailed(Request $req){

					log::debug('package_orderfailed');

					if(!empty($req->session()->has('user_data'))){


					$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

							return view('frontend/packageorderfailed', ['category_data'=>$categories ]);

						}else{
							return Redirect('/');
						}

					}




}
