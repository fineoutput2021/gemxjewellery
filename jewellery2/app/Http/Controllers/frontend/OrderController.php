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
use App\adminmodel\Contact;
use App\adminmodel\Countries;
use App\adminmodel\Inventory;
use App\adminmodel\Promocode;
use App\adminmodel\PackageItem;
use App\frontendmodel\PromocodeApplied;
use App\frontendmodel\User;
use App\frontendmodel\Cart;
use App\frontendmodel\Order1;
use App\frontendmodel\Order2;
use App\frontendmodel\Address;
use App\adminmodel\CustomizeCategory;
use App\adminmodel\CustomizeProduct;
use App\adminmodel\CustomizeMetalColor;
use App\adminmodel\CustomizeProductStone;
use App\adminmodel\EngraveCategory;
use App\adminmodel\EngraveProduct;
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

class OrderController extends Controller
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
								'returnUrl' => url('paymentsuccess/'.$idd),
								'cancelUrl' => url('paymenterror'),
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

public function payment_success($idd, Request $request)
{
		$id= base64_decode($idd);
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
						$isPaymentExist = Order1::where('payment_id', $arr_body['id'])->first();

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

									'payment_type'=>2,
									'payment_status'=>1,
									'order_status'=>1,
								];
								$order1_da = Order1::wherenull('deleted_at')->where('id', $id)->first();

								$order1_da->update($data_inserts2);


//get user details
$user_id= $request->session()->get('user_id');
$userr_data= User::wherenull('deleted_at')->where('id', $user_id)->where('is_active', 1)->first();

if(!empty($userr_data)){
	$user_email= $userr_data->email;
	$user_name= $userr_data->name;
	$user_id= $userr_data->id;
}else{
	$user_email= "";
	$user_name= "";
}



//update stock in inventory table start

	$order2_da= Order2::wherenull('deleted_at')->where('main_id',$id)->get();


if(!empty($order2_da)){
	foreach ($order2_da as $order_pro) {

if($order_pro->status == 0){

		$pro_inv_da= Inventory::wherenull('deleted_at')->where('product_id',$order_pro->product_id)->where('color_id',$order_pro->color_id)->first();

    // print_r($pro_inv_da); die();

    if(!empty($pro_inv_da)){
    $db_quantity=$pro_inv_da->stock;


		          $total_pro_stock = $db_quantity - $order_pro->quantity;

		    $data_update= [
					'stock' =>$total_pro_stock,
				];

						$invData = Inventory::wherenull('deleted_at')-> where('id', $pro_inv_da->id)->first();

					$invData->update($data_update);
		}

}

	}
}

//update stock in inventory table end




			//delete cart tabl data
				$CartDData= Cart::wherenull('deleted_at')->where('user_id',$user_id)->get();
				if(!empty($CartDData)){
					foreach ($CartDData as $Cart_DA) {
						$Cart_DA->delete();
					}
				}

// $order_data = ["name"=>$user_name,'order1_id'=>$order1_da->id,'date'=>$order1_da->created_at];

//--------------send email to user----------------------


$data['name'] = $user_name;
// echo $user_id;die();
$data['address_id'] = $order1_da->address_id;
$data['order1_id'] = $order1_da->id;
$data['date'] = $order1_da->created_at;

Mail::send('email/ordersuccess', $data, function ($message) use ($user_email) {
		$message->to($user_email)->subject('Order has been Placed');
		$message->from(EMAIL, 'Gemx Jewellery');
});


return Redirect('/order_success');
	}
				} else {


					// The customer has successfully paid.
					$arr_body = $response->getData();

					// Insert transaction data into the database
					$isPaymentExist = Order1::where('payment_id', $arr_body['id'])->first();

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

								'payment_type'=>2,
								'payment_status'=>0,
								'order_status'=>0,
								'delivery_charge'=>0,
							];
							$order1_da = Order1::wherenull('deleted_at')->where('id', $id)->first();

							$order1_da->update($data_inserts2);


						// return $response->getMessage();
						return Redirect('/payment_error');
				}
			}
		} else {
				return 'Transaction is declined';
		}
}


public function payment_error( Request $request)
{
		// return 'User is canceled the payment.';

		return Redirect('/orderfailed');
}




			public function checkout(Request $req){

		log::debug('frontend-checkout');
if(!empty($req->session()->has('user_data'))){

 $user_id= $req->session()->get('user_id');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$user_address = Address::wherenull('deleted_at')->where('user_id', $user_id)->get();

log::debug($categories);

$cart_data= Cart::wherenull('deleted_at')->where('user_id',$user_id)->get();


        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/checkout', ['category_data'=>$categories, 'cart_data'=>$cart_data, 'user_addr_data'=>$user_address ]);

			}else{
			  return Redirect('/');
			}

    }


public function delete_address($idd,Request $req){
	if(!empty($req->session()->has('user_data'))){

 $id=base64_decode($idd);

$addressData = Address::wherenull('deleted_at')->where('id', $id)->first();
if(!empty($addressData)){
	$addressData->delete();
	return redirect()->back()->with('status', 'Successfully Deleted');
}
	}else{
		return Redirect('/');
	}
}





//order success

    public function order_success(Request $req){

    log::debug('order_success');

if(!empty($req->session()->has('user_data'))){


$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

        return view('frontend/order_success', ['category_data'=>$categories ]);

			}else{
			  return Redirect('/');
			}

    }



//order Failed
		public function orderfailed(Request $req){

		log::debug('orderfailed');

		if(!empty($req->session()->has('user_data'))){


		$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/orderfailed', ['category_data'=>$categories ]);

			}else{
				return Redirect('/');
			}

		}



//order place api

		    public function order_place(Request $req)
		     {
// echo "hi";
// exit;
		if(!empty($req->session()->has('user_data'))){

		    		 log::debug( 'order_place');
		    	 // $req->validate([
		    	 // // 'addr_id' => 'required',
		    	 // 'payment' => 'required'
					 //
		    	 // ], [
		       //          // 'addr_id.required' => 'Please select address for order deliver.',
		       //          'payment.required' => 'Please choose payment method.'
						// 			]);

		    $address_id= $req->input('addr_id');
		    $shipping_status= $req->input('shipping');
				// echo $shipping_status;die();
		    // $payment_type= $req->input('payment');

		if(empty($address_id)){
		return Redirect::back()->with('status-error', 'Please select address for order deliver.');
		}
		    $applied_promocode= $req->input('order_promocode');
				$gift_promo= $req->input('gift_promo');
		    $order_status= 1;
		    $payment_status= 1;
		    $user_id= $req->session()->get('user_id');
		    $ip= $req->ip();

				log::debug('promo');
				log::debug($applied_promocode);
// echo $applied_promocode;die();
		    //cart table data check
		    $cart_data= Cart::wherenull('deleted_at')->where('user_id',$user_id)->get();

		    if(!empty($cart_data)){
		      $i=0;
		      $totalamount=0;
		      $total_qty=0;
					$s_shipping=0;
					$a=0;
		    foreach ($cart_data as $cart) {

		    $status= $cart->status;
		    $product_id= $cart->product_id;
		    $color_id= $cart->color_id;
		    $stone= $cart->stone;
		    $metal= $cart->metal;
		    $size= $cart->size;
		    $font_size= $cart->font_size;
		    $engrave_text= $cart->engrave_text;
		    $font_family= $cart->font_family;
		    $quantity= $cart->quantity;


if($status == 0){

		    //inventory check
		    $pro_inv_da= Inventory::wherenull('deleted_at')->where('product_id',$product_id)->where('color_id',$color_id)->first();

		    // print_r($pro_inv_da); die();

		    if(!empty($pro_inv_da)){
		    $db_quantity=$pro_inv_da->stock;
		  // echo    "  q".$quantity;

		        if($quantity <= $db_quantity){
		// echo "y";
		if($i == 0){
		//order1 table insert data
		$data_insert2= [
		  'user_id'=>$user_id,
		  'total_amount'=>0,
		  'address_id'=>$address_id,
		  'payment_type'=>0,
		  'payment_status'=>0,
		  'order_status'=>0,
		  'delivery_charge'=>0,
		  'ip'=>$ip
		];



		$last_order2_id = Order1::create($data_insert2);
		$last_order1_id= $last_order2_id->id;



		}

		// echo $last_order1_id;die();

	//update stock in inventory table start
		    //       $total_pro_stock = $db_quantity - $quantity;
				//
		    // $data_update= [
				// 	'stock' =>$total_pro_stock,
				// ];
				//
				// 		$invData = Inventory::wherenull('deleted_at')-> where('id', $pro_inv_da->id)->first();
				//
				// 	$invData->update($data_update);

	//update stock in inventory table end


		//get product price
		  $pro_prices= ProductColorSize::wherenull('deleted_at')->where('product_id',$product_id)->where('color_id',$color_id)->where('is_active', 1)->first();

			if(!empty($pro_prices)){

//user's package check start
				// $user_id= Session::get('user_id');

				$user_da = User::wherenull('deleted_at')->where('is_active', 1)->where('id', $user_id)->first();

				if(!empty($user_da)){
				  $user_package= $user_da->package;
				  if(!empty($user_package)){

				$package_da= PackageItem::wherenull('deleted_at')->where('id', $user_package)->first();

				if(!empty($package_da)){

				       $current_date= date("Y-m-d");
				       $package_start_date= $package_da->start_date;
				       $package_exp_date= $package_da->end_date;
				       $package_percent_off= $package_da->price;

				       if($current_date >= $package_start_date && $current_date <= $package_exp_date){

				          $percent_off= "( ".$package_percent_off."% Off )";
				          $pro_org_price= $pro_prices->price;
				          $package_discount= $pro_org_price * $package_percent_off/100;
				          $pro_price= $pro_org_price - $package_discount;

				       }else{
				         $percent_off= "";
				          $pro_price= $pro_prices->price;
				       }

				}else{
				   $percent_off= "";
				  $pro_price= $pro_prices->price;
				}


				  }else{
				     $percent_off= "";
				    $pro_price= $pro_prices->price;
				  }
				}else{
				   $percent_off= "";
				  $pro_price= $pro_prices->price;
				}


//user's package check end


			}else{
				$pro_price= 0;
			}


		  if($pro_prices != "" && $pro_prices != null){
		    // $qty_amount= $pro_price * $quantity;
				if($a==0){
					$s_shipping=$cart->quantity*0.30+6;
					$a++;
				}else{
					$s_shipping = $s_shipping + $cart->quantity*0.30;
				}
				$qty_amount=  number_format((float)$pro_price * $quantity, 2, '.', '');
		  }else{
		    $qty_amount= 0;
		  }


		        			//insert into order2 tabel
		              $data_insert2= [
		                'main_id'=>$last_order1_id,
		          			'product_id'=>$product_id,
		          			// 'gemstone_id'=>$gemstone_id,
		          			'color_id'=>$color_id,
		          			'quantity'=>$quantity,
		          			'amount'=>$qty_amount,
										'status' => 0,
		          			'ip'=>$ip
		              ];

		        $last_order2_id = Order2::create($data_insert2);

		//get total amount
		$totalamount = $totalamount + $qty_amount;
		$total_qty = $total_qty + $quantity;






		}else{
			$product_d= Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_mini_subcat_delete', 0)->where('id', $product_id)->first();

			if(!empty($product_d)){
				$product_name= $product_d->name;
			}else{
					$product_name= "";
			}
			return Redirect::back()->with('status-error', 'This Product '.$product_name.' order quantity is greater than available product inventory. To proceed further please less the ordered quantity.Available product Inventory is'.$db_quantity);
		}

		}else{

			$product_d= Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_mini_subcat_delete', 0)->where('id', $product_id)->first();

			if(!empty($product_d)){
				$product_name= $product_d->name;
			}else{
					$product_name= "";
			}
			return Redirect::back()->with('status-error', 'This Product '.$product_name.' is out of stock. To proceed further please remove this product.');

		}

}
// echo $totalamount;
//
// exit;


if($status == 1){

//customize


if($i == 0){

//order1 table insert data
$data_insert2= [
	'user_id'=>$user_id,
	'total_amount'=>0,
	'address_id'=>$address_id,
	'payment_type'=>0,
	'payment_status'=>0,
	'order_status'=>0,
	'delivery_charge'=>0,
	'ip'=>$ip
];



$last_order2_id = Order1::create($data_insert2);
$last_order1_id= $last_order2_id->id;


}



// echo $last_order1_id;die();


//get product price
	$pro_prices=  CustomizeProductStone::wherenull('deleted_at')->where('product_id',$product_id)->where('name',$stone)->where('cust_metal_id',$metal)->where('is_active',1)->first();
	// $pro_prices= CustomizeProductStone::wherenull('deleted_at')->where('product_id',$cart->product_id)->where('id',$cart->stone)->where('cust_metal_id',$cart->metal)->where('is_active',1)->first();
// print_r($pro_prices);
// exit;
	if(!empty($pro_prices)){

//user's package check start
		// $user_id= Session::get('user_id');

		$user_da = User::wherenull('deleted_at')->where('is_active', 1)->where('id', $user_id)->first();

		if(!empty($user_da)){
			$user_package= $user_da->package;
			if(!empty($user_package)){

		$package_da= PackageItem::wherenull('deleted_at')->where('id', $user_package)->first();

		if(!empty($package_da)){

					 $current_date= date("Y-m-d");
					 $package_start_date= $package_da->start_date;
					 $package_exp_date= $package_da->end_date;
					 $package_percent_off= $package_da->price;

					 if($current_date >= $package_start_date && $current_date <= $package_exp_date){

							$percent_off= "( ".$package_percent_off."% Off )";
							$pro_org_price= $pro_prices->price;
							$package_discount= $pro_org_price * $package_percent_off/100;
							$pro_price= $pro_org_price - $package_discount;

					 }else{
						 $percent_off= "";
							$pro_price= $pro_prices->price;
					 }

		}else{
			 $percent_off= "";
			$pro_price= $pro_prices->price;
		}


			}else{
				 $percent_off= "";
				$pro_price= $pro_prices->price;
			}
		}else{
			 $percent_off= "";
			$pro_price= $pro_prices->price;
		}


//user's package check end


	}else{
		$pro_price= 0;
	}


	if($pro_prices != "" && $pro_prices != null){
		if($a==0){
			$s_shipping=$cart->quantity*0.30+6;
			$a++;
		}else{
			$s_shipping = $s_shipping + $cart->quantity*0.30;
		}
		// $qty_amount= $pro_price * $quantity;
		$qty_amount= number_format((float)$pro_price * $quantity, 2, '.', '');
	}else{
		$qty_amount= 0;
	}


//       			$this->db->select('*');
// $this->db->from('tbl_packages');
// $this->db->where('id',$user_id);
// $pack_dat= $this->db->get()->row();
//
// if(!empty($pack_dat)){
//
// $percent_off= $pack_dat-> ;
//
// }
// echo $qty_amount;die();


							//insert into order2 tabel
							$data_insert2= [
								'main_id'=>$last_order1_id,
								'product_id'=>$product_id,
								'metal'=>$metal,
								'stone'=>$stone,
								'size'=>$size,
								'quantity'=>$quantity,
								'amount'=>$qty_amount,
								'status' => 1,
								'ip'=>$ip
							];

				$last_order2_id = Order2::create($data_insert2);

//get total amount
$totalamount = $totalamount + $qty_amount;
$total_qty = $total_qty + $quantity;






}

// echo $totalamount;
// exit;

if($cart->status == 2){

//engrave



if($i == 0){

//order1 table insert data
$data_insert2= [
	'user_id'=>$user_id,
	'total_amount'=>0,
	'address_id'=>$address_id,
	'payment_type'=>0,
	'payment_status'=>0,
	'order_status'=>0,
	'delivery_charge'=>0,
	'ip'=>$ip
];



$last_order2_id = Order1::create($data_insert2);
$last_order1_id= $last_order2_id->id;


}



// echo $last_order1_id;die();


//get product price
	$pro_prices=  EngraveProduct::wherenull('deleted_at')->where('id',$product_id)->where('is_active',1)->first();

	if(!empty($pro_prices)){

//user's package check start
		// $user_id= Session::get('user_id');

		$user_da = User::wherenull('deleted_at')->where('is_active', 1)->where('id', $user_id)->first();

		if(!empty($user_da)){
			$user_package= $user_da->package;
			if(!empty($user_package)){

		$package_da= PackageItem::wherenull('deleted_at')->where('id', $user_package)->first();

		if(!empty($package_da)){

					 $current_date= date("Y-m-d");
					 $package_start_date= $package_da->start_date;
					 $package_exp_date= $package_da->end_date;
					 $package_percent_off= $package_da->price;

					 if($current_date >= $package_start_date && $current_date <= $package_exp_date){

							$percent_off= "( ".$package_percent_off."% Off )";
							$pro_org_price= $pro_prices->base_price;
							$package_discount= $pro_org_price * $package_percent_off/100;
							$pro_price= $pro_org_price - $package_discount;

					 }else{
						 $percent_off= "";
							$pro_price= $pro_prices->base_price;
					 }

		}else{
			 $percent_off= "";
			$pro_price= $pro_prices->base_price;
		}


			}else{
				 $percent_off= "";
				$pro_price= $pro_prices->base_price;
			}
		}else{
			 $percent_off= "";
			$pro_price= $pro_prices->base_price;
		}


//user's package check end


	}else{
		$pro_price= 0;
	}


	if($pro_prices != "" && $pro_prices != null){
		if($a==0){
			$s_shipping=$cart->quantity*0.30+6;
			$a++;
		}else{
			$s_shipping = $s_shipping + $cart->quantity*0.30;
		}
		// $qty_amount= $pro_price * $quantity;
		$qty_amount= number_format((float)$pro_price * $quantity, 2, '.', '');
	}else{
		$qty_amount= 0;
	}



							//insert into order2 tabel
							$data_insert2= [
								'main_id'=>$last_order1_id,
								'product_id'=>$product_id,
								'font_size'=>$font_size,
								'engrave_text'=>$engrave_text,
								'font_family'=>$font_family,
								'quantity'=>$quantity,
								'amount'=>$qty_amount,
								'status' => 2,
								'ip'=>$ip
							];

				$last_order2_id = Order2::create($data_insert2);

//get total amount
$totalamount = $totalamount + $qty_amount;
$total_qty = $total_qty + $quantity;





}

		$i++;
		  }



		}

		// echo $totalamount;
		// die;
		// echo $total_qty;
		// echo $last_order1_id;


	// check promocode
		if(!empty($applied_promocode)){

				$totalamount = $this->isValidPromocode($last_order1_id,$totalamount,$applied_promocode,$total_qty,$user_id);
		}

// giftcard promocode
		if(!empty($gift_promo)){

				$totalamount = $this->isValidGiftPromocode($last_order1_id,$totalamount,$gift_promo,$user_id);
		}


$totalamount= number_format((float)$totalamount, 2, '.', '');
//--for express shipping
if($shipping_status==2){
$s_shipping=$s_shipping+25;
}
$totalamount=$totalamount+$s_shipping;
// echo $totalamount; die();
		//order1 table update data
		// echo $s_shipping;die();
		$data_inserts2= [
		  'user_id'=>$user_id,
		  'total_amount'=> $totalamount,
		  'promocode'=> $applied_promocode,
			'gift_promocode'=> $gift_promo,
		  'address_id'=>$address_id,
		  // 'payment_type'=>1,
		  // 'payment_status'=>1,
		  // 'order_status'=>1,
			'shipping'=>$shipping_status,
		  'delivery_charge'=>$s_shipping,
		];
		$order1_da = Order1::wherenull('deleted_at')-> where('id', $last_order1_id)->first();

		$order1_da->update($data_inserts2);



		// //delete cart tabl data
		// $CartDData= Cart::wherenull('deleted_at')->where('user_id',$user_id)->get();
		// if(!empty($CartDData)){
		// 	foreach ($CartDData as $Cart_DA) {
		// 		$Cart_DA->delete();
		// 	}
		//
		// }

		// return Redirect('/order_success')->with('status', 'Order Successfully Placed.');
		// return Redirect('/order_success');
		$amm= base64_encode($totalamount);
		$lo_id= base64_encode($last_order1_id);
		return Redirect('/charge/'.$amm.'/'.$lo_id);

		}else{
			return Redirect('/');
		}

		}




		//My Orders page
		public function my_orders(Request $req){

			if(!empty($req->session()->has('user_data'))){

			$user_id= $req->session()->get('user_id');
// echo $user_id;
// exit;
		$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

		  $user_orders= Order1::wherenull('deleted_at')->where(array('user_id'=> $user_id,'payment_status'=>1))->orderBy('id','DESC')->get();
		  // $user_orders= Order1::wherenull('deleted_at')->where(array('user_id'=> $user_id,'payment_status'=>1))->orWhere(array('user_id'=> $user_id,'order_status'=>5))->orderBy('id','DESC')->get();

						return view('frontend/my_orders', ['user_orders'=>$user_orders, 'category_data'=>$categories]);

			}else{
				return Redirect('/');

			}
		}



		//My Orders page
		public function cancel_order($idd,Request $req){


		$id= base64_decode($idd);


			if(!empty($req->session()->has('user_data'))){

			$user_id= $req->session()->get('user_id');


		  $order= Order1::wherenull('deleted_at')->where('id', $id)->first();

			if(!empty($order)){

				$orderStatusInfo= [
					'order_status' =>5
				];


				$order->update($orderStatusInfo);


	//update inventory start
	$order2_data= Order2::wherenull('deleted_at')->where('main_id', $id)->get();

	if(!empty($order2_data)){
		foreach ($order2_data as $order2) {
			$inv_data= Inventory::wherenull('deleted_at')->where('product_id',$order2->product_id)->where('color_id', $order2->color_id)->where('is_active', 1)->first();

				if(!empty($inv_data)){

				$db_stock= $inv_data->stock;
				$pro_qty= $order2->quantity;

					$total_pro_stock = $db_stock + $pro_qty;

				$data_update= [
				'stock' =>$total_pro_stock,
				];

				$inv_data->update($data_update);

				}

		}
	}

	//update inventory end


			}

		return Redirect::back()->with('status', 'Order Cancelled Successfully');

			}else{
				return Redirect('/');

			}
		}





		//valid promocode check for order placing process

		public function isValidPromocode($inputOrderId,$final_amount,$promocode, $final_qty, $user_id)
		 {

// echo $inputOrderId;
// echo $final_amount;
// echo $promocode;
// die();
// echo $final_qty;
// echo $user_id; die();

				 log::debug( 'yes Id');

		$db_promocode_id = 0;

		$da= Promocode::wherenull('deleted_at')->where('is_active', 1)->where('promocode', $promocode)->first();

				if(!empty($da)){

					$db_promocode_id = $da->id;
					$db_expiry_date = $da->expiry_date;
					$db_promocode_type = $da->type;
					$db_promocode_offer_type = $da->offer_type;
					$db_promocode_percent = $da->percent;
					$db_promocode_amount_off = $da->amount_off;
				  $db_promocode_offer_qualify_type = $da->order_qualify_type;
					$db_promocode_minimum_order_total = $da->minimum_order_total;
					$db_promocode_minimum_quantity = $da->quantity;

					$db_promocode_minimum_amount = $da->minimum_amount;

				 $db_promocode_maximum_gift_amount = $da->maximum_gift_amount;
				 $cur_date=date("Y-m-d");


		//promocode expry and single or multiple time usebility check
					if($cur_date <= $db_expiry_date){


						if($db_promocode_type == 1){


										 $das= PromocodeApplied::wherenull('deleted_at')->where('user_id', $user_id)->where('promocode_id', $da->id)->first();

										 if(!empty($das)){
											 return $final_amount;
										 }else{
											 $percentage=$da->percent;
											 $deduction_amount= $final_amount*$percentage/100;

											 $deduction_amount = number_format((float)$deduction_amount,2, '.', '');

													 $calculated_final_amount = $final_amount - $deduction_amount;
													 $data_ins= [
			 					 						'user_id'=>$user_id,
			 					 						'order_id'=>$inputOrderId,
			 					 						'promocode_id'=>$db_promocode_id,

			 					 					];

			 					 		$last_order_promocode = PromocodeApplied::create($data_ins);
													  return $calculated_final_amount;

										 }
					 }else{
						 $percentage=$da->percent;
						 $deduction_amount= $final_amount*$percentage/100;

						 $deduction_amount = number_format((float)$deduction_amount,2, '.', '');

								 $calculated_final_amount = $final_amount - $deduction_amount;
								 $data_ins= [
									'user_id'=>$user_id,
									'order_id'=>$inputOrderId,
									'promocode_id'=>$db_promocode_id,

								];

						$last_order_promocode = PromocodeApplied::create($data_ins);
									return $calculated_final_amount;
					 }


				 	// echo $final_qty;
				 	// echo $db_promocode_minimum_quantity;
		//offer Qualify type check
		if($db_promocode_offer_qualify_type == 2){

// echo "dfo";die();
		//offer qualify type check for minimum quantity
			if($final_qty >= $db_promocode_minimum_quantity){


		// echo "yes";
					if($final_amount >= $db_promocode_minimum_amount ){

					if($db_promocode_offer_type == 1){
						if($db_promocode_percent <= 100){
							$calc = $db_promocode_percent / 100;
							$deduction_amount = $calc * $final_amount;

							if($deduction_amount > $db_promocode_maximum_gift_amount){
								$deduction_amount = $db_promocode_maximum_gift_amount;
							}
		$deduction_amount = number_format((float)$deduction_amount,2, '.', '');
							$calculated_final_amount = $final_amount - $deduction_amount;


		// $calculated_final_amount = number_format((float)$calculated_final_amount,2, '.', '');


			//insert into tbl_promocode_applied of offer tabel
					 					$data_ins= [
					 						'user_id'=>$user_id,
					 						'order_id'=>$inputOrderId,
					 						'promocode_id'=>$db_promocode_id,

					 					];

					 		$last_order_promocode = PromocodeApplied::create($data_ins);


							return $calculated_final_amount;

					}else{
					return $final_amount;
					}

				}elseif ($db_promocode_offer_type == 3) {
					$deduction_amount = $db_promocode_amount_off;

					$deduction_amount = number_format((float)$deduction_amount,2, '.', '');
					$calculated_final_amount = $final_amount - $deduction_amount;


					//insert into tbl_promocode_applied of offer tabel
												$data_ins= [
													'user_id'=>$user_id,
													'order_id'=>$inputOrderId,
													'promocode_id'=>$db_promocode_id,

												];

									$last_order_promocode = PromocodeApplied::create($data_ins);


									return $calculated_final_amount;



				}else{
					return $final_amount;

				}


					}else{

					return $final_amount;
					}


			}else{
				return $final_amount;
			}

		}else{
		// echo "exno";
		//if order_qualify type is not based on quantity

			if($final_amount >= $db_promocode_minimum_amount ){

			if($db_promocode_offer_type == 1){
				if($db_promocode_percent <= 100){
					$calc = $db_promocode_percent / 100;
					$deduction_amount = $calc * $final_amount;

					if($deduction_amount > $db_promocode_maximum_gift_amount){
						$deduction_amount = $db_promocode_maximum_gift_amount;
					}

		$deduction_amount = number_format((float)$deduction_amount,2, '.', '');

					$calculated_final_amount = $final_amount -  $deduction_amount;


					// $calculated_final_amount = number_format((float)$calculated_final_amount,2, '.', '');

					//insert into tbl_promocode_applied of offer tabel
												$data_ins= [
													'user_id'=>$user_id,
													'order_id'=>$inputOrderId,
													'promocode_id'=>$db_promocode_id,

												];

									$last_order_promocode = PromocodeApplied::create($data_ins);

					return $calculated_final_amount;

			}else{
		return $final_amount;
			}

			}elseif ($db_promocode_offer_type == 3) {
				$deduction_amount = $db_promocode_amount_off;

				$deduction_amount = number_format((float)$deduction_amount,2, '.', '');
				$calculated_final_amount = $final_amount -  $deduction_amount;


				//insert into tbl_promocode_applied of offer tabel
											$data_ins= [
												'user_id'=>$user_id,
												'order_id'=>$inputOrderId,
												'promocode_id'=>$db_promocode_id,

											];

								$last_order_promocode = PromocodeApplied::create($data_ins);


								return $calculated_final_amount;



			}else{
				return $final_amount;

			}


			}else{

			return $final_amount;
			}



		}



		}else{
		// 	echo "hi";
		// die();
if(!empty($db_promocode_type)){
	if($db_promocode_type == 1){


					 $das= PromocodeApplied::wherenull('deleted_at')->where('user_id', $user_id)->where('promocode_id', $da->id)->first();

					 if(!empty($das)){

						 return $final_amount;

					 }else{
						 $percentage=$da->percent;
						 $deduction_amount= $final_amount*$percentage/100;

						 $deduction_amount = number_format((float)$deduction_amount,2, '.', '');

								 $calculated_final_amount = $final_amount - (int) $deduction_amount;
								 $data_ins= [
									'user_id'=>$user_id,
									'order_id'=>$inputOrderId,
									'promocode_id'=>$db_promocode_id,

								];

					$last_order_promocode = PromocodeApplied::create($data_ins);
									return $calculated_final_amount;

					 }
 }
}else{
		return $final_amount;
	}
		}
				}else{
					return $final_amount;
				}



		echo json_encode($data);



		 }




		 //valid giftcard promocode check for order placing process

		 public function isValidGiftPromocode($inputOrderId,$final_amount,$promocode,$user_id)
		  {


		 $db_promocode_id = 0;

		 $da= Promocode::wherenull('deleted_at')->where('is_active', 1)->where('promocode', $promocode)->first();

		 if(!empty($da)){
		 	$db_promocode_id = $da->id;
		 	$db_promocode_type = $da->type;
		 	$db_promocode_offer_type = $da->offer_type;


		  $db_promocode_maximum_gift_amount = $da->maximum_gift_amount;
		  $cur_date=date("Y-m-d");


		 //promocode expry and single or multiple time usebility check



		 		if($db_promocode_type == 1){


		 						 $das= PromocodeApplied::wherenull('deleted_at')->where('promocode_id', $da->id)->first();

		 						 if(!empty($das)){
		 							 		return $final_amount;
		 						 }
		 	 }






		 if($db_promocode_offer_type == 4){

		 				$deduction_amount = $db_promocode_maximum_gift_amount;

		 				if($final_amount <= $db_promocode_maximum_gift_amount){
		 					$deduction_amount = $final_amount;
		 				}

		 				$deduction_amount = number_format((float)$deduction_amount,2, '.', '');

		 				$calculated_final_amount = $final_amount -  $deduction_amount;

		 				//insert into tbl_promocode_applied of offer tabel
		 				$data_ins= [
		 				  'user_id'=>$user_id,
		 				  'order_id'=>$inputOrderId,
		 				  'promocode_id'=>$db_promocode_id,

		 				];

		 				$last_order_promocode = PromocodeApplied::create($data_ins);


		 				return $calculated_final_amount;


		 }else{

		 return $final_amount;

		 }





		 }else{
		 	return $final_amount;
		 }




		  }



		 //valid giftcard promocode check for checkout process js

		 public function isValidGiftPromoforcheckout(Request $req)
		  {

		 		 log::debug( 'yes Id');
		 	 // $req->validate([
		 	 // 'promocode' => 'required',
		 	 // 'qty' => 'required',
		 	 // 'sub_amount' => 'required'
		 	 //
		 	 // ]);

		 $promocode= $req->input('promocode');
		 $final_amount= $req->input('sub_amount');
		 $s_charge= $req->input('s_charge');
		 // $final_qty= $req->input('qty');
		 $user_id = $req->session()->get('user_id');
		 // $user_id = 1;




		 $db_promocode_id = 0;

		 $da= Promocode::wherenull('deleted_at')->where('is_active', 1)->where('promocode', $promocode)->first();
		 // print_r($da);
		 // exit;
		 		if(!empty($da)){
		 			$db_promocode_id = $da->id;
		 			$db_promocode_type = $da->type;
		 			$db_promocode_offer_type = $da->offer_type;


		 		 $db_promocode_maximum_gift_amount = $da->maximum_gift_amount;
		 		 $cur_date=date("Y-m-d");
				 // echo $db_promocode_offer_type;
				 // exit;

		 //promocode expry and single or multiple time usebility check



		 				if($db_promocode_type == 1){


		 								 $das= PromocodeApplied::wherenull('deleted_at')->where('promocode_id', $da->id)->first();

		 								 if(!empty($das)){
		 									 // return $final_amount;
		 									 $data['data']= false;
		 									$data['amount']= $final_amount;
		 									$data['data_msg']="Giftcard Already Used.";

											 echo json_encode($data); exit;
		 								 }else{
											$percentage=$da->percent;
											$deduction_amount= $final_amount*$percentage/100;

											$deduction_amount = number_format((float)$deduction_amount,2, '.', '');

								 		 			$calculated_final_amount = $final_amount - $deduction_amount;
													// echo $calculated_final_amount;die();
										 $data['data']= true;
						 		 		 $data['deduction_amount']= $deduction_amount;
						 		 		 $data['amount']= $calculated_final_amount+$s_charge;
						 		 		 $data['data_msg']="Giftcard Promocode applied successfully.";

										 		 echo json_encode($data); exit;
										 }
		 			 }else{
						 $percentage=$da->percent;
							$deduction_amount= $final_amount*$percentage/100;

							$deduction_amount = number_format((float)$deduction_amount,2, '.', '');

									$calculated_final_amount = $final_amount -  $deduction_amount;
									// echo $calculated_final_amount;die();
						 $data['data']= true;
						 $data['deduction_amount']= $deduction_amount;
						  $data['amount']= $calculated_final_amount+$s_charge;
						 $data['data_msg']="Giftcard Promocode applied successfully.";

								 echo json_encode($data); exit;
					 }






		 	if($db_promocode_offer_type == 4){

		 			$deduction_amount = $db_promocode_maximum_gift_amount;

		 			if($final_amount <= $db_promocode_maximum_gift_amount){
		 				$deduction_amount = $final_amount;
		 			}

		 $deduction_amount = number_format((float)$deduction_amount,2, '.', '');

		 			$calculated_final_amount = $final_amount - $deduction_amount;


		 			// $calculated_final_amount = number_format((float)$calculated_final_amount,2, '.', '');


		 			// return $calculated_final_amount;
		 			$data['data']= true;
		 		 $data['deduction_amount']= $deduction_amount;
		 		  $data['amount']= $calculated_final_amount+$s_charge;
		 		 $data['data_msg']="Giftcard Promocode applied successfully.";



		 	}else{
		 		$deduction_amount= 0;
		 		$data['data']= false;
		 	 $data['deduction_amount']= $deduction_amount;
		 	 $data['amount']= $final_amount+$s_charge;
		 	 $data['status']= "Error";
		 	 $data['data_msg']="Some error occured.";

		 	}





		 		}else{
		 			$data['data']= false;
		 			$data['amount']= $final_amount+$s_charge;
		 			$data['data_msg']="Invalid promocode.";
		 		}



		 echo json_encode($data); exit;



		  }







//valid promocode check for checkout process js

public function isValidPromocodeforcheckout(Request $req)
 {

		 log::debug( 'yes Id');
	 // $req->validate([
	 // 'promocode' => 'required',
	 // 'qty' => 'required',
	 // 'sub_amount' => 'required'
	 //
	 // ]);

$promocode= $req->input('promocode');
$final_amount= $req->input('sub_amount');
$s_charge= $req->input('s_charge');
$final_qty= $req->input('qty');
$user_id = $req->session()->get('user_id');
// $user_id = "1";

// echo $s_charge;


$db_promocode_id = 0;

$da= Promocode::wherenull('deleted_at')->where('is_active', 1)->where('promocode', $promocode)->first();

		if(!empty($da)){
			$db_promocode_id = $da->id;
			$db_expiry_date = $da->expiry_date;
		  $db_promocode_type = $da->type;
			$db_promocode_offer_type = $da->offer_type;
			$db_promocode_percent = $da->percent;
			$db_promocode_amount_off = $da->amount_off;
		  $db_promocode_offer_qualify_type = $da->order_qualify_type;
			$db_promocode_minimum_order_total = $da->minimum_order_total;
			$db_promocode_minimum_quantity = $da->quantity;

			$db_promocode_minimum_amount = $da->minimum_amount;

		 $db_promocode_maximum_gift_amount = $da->maximum_gift_amount;
		 $cur_date=date("Y-m-d");


//promocode expry and single or multiple time usebility check
			if($cur_date <= $db_expiry_date){


				if($db_promocode_type == 1){


								 $das= PromocodeApplied::wherenull('deleted_at')->where('user_id', $user_id)->where('promocode_id', $da->id)->first();

								 if(!empty($das)){
									 // echo "das";
									 // return $final_amount;
									 $data['data']= false;
									$data['amount']= $final_amount+$s_charge;
									$data['data_msg']="You have already applied this promocode.";


									echo json_encode($data); exit;

								 }
			 }


		 	// echo $final_qty;
		 	// echo $db_promocode_minimum_quantity;
//offer Qualify type check
if($db_promocode_offer_qualify_type == 2){

//offer qualify type check for minimum quantity
	if($final_qty >= $db_promocode_minimum_quantity){


// echo "yes";
			if($final_amount >= $db_promocode_minimum_amount ){

			if($db_promocode_offer_type == 1){
				if($db_promocode_percent <= 100){
					$calc = $db_promocode_percent / 100;
					$deduction_amount = $calc * $final_amount;

					if($deduction_amount > $db_promocode_maximum_gift_amount){
						$deduction_amount = $db_promocode_maximum_gift_amount;
					}
$deduction_amount = number_format((float)$deduction_amount,2, '.', '');
					$calculated_final_amount = $final_amount - (int) $deduction_amount;


// $calculated_final_amount = number_format((float)$calculated_final_amount,2, '.', '');

					// return $calculated_final_amount;
					$data['data']= true;
				 $data['deduction_amount']= $deduction_amount;
				 $data['amount']= $calculated_final_amount+$s_charge;
				 // $data['status']= "Percent Off";
				 $data['data_msg']="Promocode applied successfully.";

			}else{
				// return $final_amount;
				$data['data']= false;
				$data['amount']= $final_amount+$s_charge;
				$data['data_msg']="Sorry error occured.";
			}


		}elseif ($db_promocode_offer_type == 3) {
			$deduction_amount = $db_promocode_amount_off;

			$deduction_amount = number_format((float)$deduction_amount,2, '.', '');
			$calculated_final_amount = $final_amount - (int) $deduction_amount;

			$data['data']= true;
		 $data['deduction_amount']= $deduction_amount;
		 $data['amount']= $calculated_final_amount+$s_charge;
		 // $data['status']= "Amount Off";
		 $data['data_msg']="Promocode applied successfully.";

		}else{
			$deduction_amount= 0;
			$data['data']= true;
		 $data['deduction_amount']= $deduction_amount;
		 $data['amount']= $final_amount+$s_charge;
		 $data['status']= "Free Delivery";
		 $data['data_msg']="Promocode applied successfully.";

		}



			}else{

				$data['data']= false;
				$data['amount']= $final_amount+$s_charge;
				$data['data_msg']="Your order total is less than promocode minimum applicable amount limit.";
			}


	}else{
		// echo "no";
		$data['data']= false;
	$data['amount']= $final_amount+$s_charge;
	 $data['data_msg']="Your order quantity is less than promocode minimum applicable quantity.";
	}

}else{
// echo "exno";
//if order_qualify type is not based on quantity

	if($final_amount >= $db_promocode_minimum_amount ){

	if($db_promocode_offer_type == 1){
		if($db_promocode_percent <= 100){
			$calc = $db_promocode_percent / 100;
			$deduction_amount = $calc * $final_amount;

			if($deduction_amount > $db_promocode_maximum_gift_amount){
				$deduction_amount = $db_promocode_maximum_gift_amount;
			}

$deduction_amount = number_format((float)$deduction_amount,2, '.', '');

			$calculated_final_amount = $final_amount - (int) $deduction_amount;


			// $calculated_final_amount = number_format((float)$calculated_final_amount,2, '.', '');


			// return $calculated_final_amount;
			$data['data']= true;
		 $data['deduction_amount']= $deduction_amount;
		 $data['amount']= $calculated_final_amount+$s_charge;
		 // $data['status']= "Percent Off";
		 $data['data_msg']="Promocode applied successfully.";

	}else{
		// return $final_amount;
		$data['data']= false;
	$data['amount']= $final_amount+$s_charge;
		$data['data_msg']="Sorry error occured.";
	}

	}elseif ($db_promocode_offer_type == 3) {
		$deduction_amount = $db_promocode_amount_off;

		$deduction_amount = number_format((float)$deduction_amount,2, '.', '');
		$calculated_final_amount = $final_amount - (int) $deduction_amount;

		$data['data']= true;
	 $data['deduction_amount']= $deduction_amount;
	 $data['amount']= $calculated_final_amount+$s_charge;
	 // $data['status']= "Amount Off";
	 $data['data_msg']="Promocode applied successfully.";

	}else{
		$deduction_amount= 0;
		$data['data']= true;
	 $data['deduction_amount']= $deduction_amount;
	 $data['amount']= $final_amount+$s_charge;
	 $data['status']= "Free Delivery";
	 $data['data_msg']="Promocode applied successfully.";

	}


	}else{

		$data['data']= false;
	$data['amount']= $final_amount+$s_charge;
		$data['data_msg']="Your order total is less than promocode minimum applicable amount limit.";
	}



}





}else{

$data['data']= false;
$data['amount']= $final_amount+$s_charge;
$data['data_msg']="Promocode Expired.";
}
		}else{
			$data['data']= false;
		$data['amount']= $final_amount+$s_charge;
			$data['data_msg']="Invalid promocode.";
		}



echo json_encode($data);



 }




}
