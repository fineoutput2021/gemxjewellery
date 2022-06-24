<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use session;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\Topbrands;
use App\adminmodel\Slider;
use App\adminmodel\Advertisement;
use App\adminmodel\BrandTypes;
use App\adminmodel\User_temp;
use App\adminmodel\Otp;
use Illuminate\Support\Str;
use App\adminmodel\Users;
use App\adminmodel\Cart2;
use App\adminmodel\Inventory;
use App\adminmodel\Type;
use App\adminmodel\Order1;
use App\adminmodel\Order2;
use App\adminmodel\Address;
use App\adminmodel\Delivery_status;
use App\adminmodel\Promocode;
use App\adminmodel\Wallet;
use App\adminmodel\Wallet_txn;
use App\adminmodel\Bottom_images;
use App\adminmodel\Delivery_boy;
use App\adminmodel\Admin_notification;



class HomeController extends Controller
{

//----index-------------

  public function index(){

  $Category_data = Category::wherenull('deleted_at')->where('is_active', 1)->get();
  $SubCategory_data = SubCategory::wherenull('deleted_at')->where('is_active', 1)->get();
  $product_data= Product::wherenull('deleted_at')->where('is_active', 1)->inRandomOrder()->limit(10)->get();
  $Topbrands_data= Topbrands::wherenull('deleted_at')->where('is_active', 1)->get();
  $slider_data= Slider::wherenull('deleted_at')->where('is_active', 1)->get();
  $ad_data= Advertisement::wherenull('deleted_at')->where('is_active', 1)->get();
  $bottom_data= Bottom_images::wherenull('deleted_at')->where('is_active', 1)->first();

// print_r($slider_data);
// exit;
if(!empty(session('user_data'))){
  return view('frontend/index',['Category_data' => $Category_data, 'SubCategory_data' => $SubCategory_data, 'product_data' => $product_data,  'Topbrands_data' => $Topbrands_data, 'slider_data' => $slider_data, 'ad_data' => $ad_data,'bottom_data' => $bottom_data  ]);
}else{
  return view('frontend/login');
  }
}

//---------category---------
public function cat_products($idd){

  $cat_id = base64_decode($idd);
  $Category_data = Category::wherenull('deleted_at')->get();

$product_data= Product::wherenull('deleted_at')->where(array('is_active' => 1, 'category_id' => $cat_id))->get();
$brand_data= BrandTypes::where('is_active', 1)->get();


return view('frontend/products',['Category_data' => $Category_data,'product_data' => $product_data, 'brand_data' => $brand_data]);

}
//---------All product---------
public function products($idd,$idd2){

  $cat_id = base64_decode($idd);
  $sub_id = base64_decode($idd2);
  $Category_data = Category::wherenull('deleted_at')->get();

$product_data= Product::wherenull('deleted_at')->where(array('is_active' => 1, 'category_id' =>
$cat_id,'subcategory_id' => $sub_id))->get();
$brand_data= BrandTypes::where('is_active', 1)->get();


return view('frontend/products',['Category_data' => $Category_data,'product_data' => $product_data, 'brand_data' => $brand_data]);

}

//-------------product details--------
public function product_details($idd){

  $pro_id = base64_decode($idd);

  $Category_data = Category::wherenull('deleted_at')->get();


$product_data= Product::wherenull('deleted_at')->where(array('is_active' => 1, 'id' => $pro_id))->first();

$related_data= Product::wherenull('deleted_at')->where(array('category_id'=>$product_data->category_id,'is_active'=> 1))->inRandomOrder()->get();
// print_r($type_data);
// exit;
// print_r($product_data);
// exit;
return view('frontend/product_details',['Category_data' => $Category_data,'product_data' => $product_data,'related_data' => $related_data]);

}

//-------------Login page--------
public function login(){


  $Category_data = Category::wherenull('deleted_at')->get();

if(!empty(session('user_data'))){
return view('frontend/login',['Category_data' => $Category_data]);
}else{
  return redirect('/')->with('status-error', 'Please log in or register first');

  }
}

//-------my account---
public function my_account(){


  $Category_data = Category::wherenull('deleted_at')->get();
if(!empty(session('user_data'))){
  $phone  = session('user_phone');
  $user_data = Users::wherenull('deleted_at')->where(array('phone'=>$phone,'is_active'=>1))->first();
  $wallet_data = Wallet::wherenull('deleted_at')->where('user_id',$user_data->id)->first();

}else{
  return view('frontend/index',['Category_data' => $Category_data]);

}
return view('frontend/my_account',['Category_data' => $Category_data,'user_data' => $user_data,'wallet_data' => $wallet_data]);

}


//-------------User Register--------
public function user_register(Request $req){

$Category_data = Category::wherenull('deleted_at')->get();


			$req->validate([

				'name' => 'required',
				'phone' => 'required'

			]);


			$name = $req->input('name');
			$phone = $req->input('phone');
			$agent_id = $req->input('agent_id');

      $user_data = Users::wherenull('deleted_at')->where(array('phone'=>$phone,"is_active"=>1))->first();

if(empty($user_data)){
      $OTP =random_int(100000, 999999);
    	// $OTP =123456;


      								$temp_userpInfo= [

      									'name' =>$name,
      									'phone' =>$phone,
      									'agent_id' =>	$agent_id,
      									'ip' => $req->ip(),
      									// 'temp_id'=> $last_id->id

      								];

      								$user=User_temp::create($temp_userpInfo)->toArray();

      						$otpInfo= [

      							'phone' => $phone,
      							'otp' => $OTP,
      							'ip' => $req->ip(),
      							'temp_id' => $user['id']


      						];

      						$last_id = Otp::create($otpInfo)->toArray();


      						$msg= "Welcome to cementwale.com and Your One Time Password (OTP) for Login Into your account is ".$OTP."." ;

      											$curl = curl_init();

      											curl_setopt_array($curl, array(
      												// http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=919799655891&message=otp%20is%20320451&sender=FORNXT&route=4
      											   CURLOPT_URL => "http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=".$phone."&message=OTP%20is%20".$OTP."%20for%20login%20on%20CEMENTWALE%20and%20valid%20till%205min%20Do%20not%20share%20this%20OTP%20to%20anyone%20for%20security%20reasons.%20Fortunext%20Cementwala&sender=FORNXT&route=4&country=91&DLT_TE_ID=1307163093625759975",
      											 CURLOPT_RETURNTRANSFER => true,
      											 CURLOPT_ENCODING => "",
      											 CURLOPT_MAXREDIRS => 10,
      											 CURLOPT_TIMEOUT => 30,
      											 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      											 CURLOPT_CUSTOMREQUEST => "GET",
      											 CURLOPT_SSL_VERIFYHOST => 0,
      											 CURLOPT_SSL_VERIFYPEER => 0,
      											));

      											$response = curl_exec($curl);
      											$err = curl_error($curl);
      											curl_close($curl);

      											if ($err) {
      											 echo "cURL Error #:" . $err;
      											} else
      											{
      											// echo $response;
      											}

      											if(!empty($last_id)){

                              $req->session()->put('user_name', $name);
                              $req->session()->put('user_phone', $phone);
                              return Redirect('/otp')->with('status', 'OTP send successfully');
      												// return view('frontend/otp',['Category_data' => $Category_data])->with('status', 'OTP send successfully.');


      											}else{

      											return Redirect('/login')->with('status-error', 'some error occured');

      											}

}else{
  return redirect()->back()->with('status-error', 'Phone Number is already registered! Please login');

}

}

//-----view verify OTP------
public function otp(Request $req){
$Category_data = Category::wherenull('deleted_at')->get();


return view('frontend/otp');

}

//---------------verify otp---------------

public function verify_register_otp(Request $req){

  $Category_data = Category::wherenull('deleted_at')->get();

  if(!empty($req->session('user_phone'))){

				$req->validate([

					'otp' => 'required'

				]);

				$name = session('user_name');
				$phone = session('user_phone');
				$OTP = $req->input('otp');

// echo 'hi'.$phone;
// exit;
$otp_data= Otp::where('phone', $phone)->orderBy('id', 'DESC')->first();
// print_r($otp_data);
// exit;
if(!empty($otp_data)){

if($otp_data->otp==$OTP){

	$otp_update =[
		'status'=>1
	];
	// echo $otp_data->id;
	// exit;
	$updated_last_id = Otp::where('id', $otp_data->id)->first();
	$updated_last_id->update($otp_update);

	// $updated_last_id1 = Otp::where('id', $updated_last_id['temp_idsss'])->first()->toArray();

// echo $updated_last_id->temp_id;
// exit;
$temp_user_data= User_temp::where('id', $updated_last_id->temp_id)->first();
// print_r($temp_user_data);
// exit;

if(!empty($temp_user_data)){

$token=Str::random(40);

// $token="hvbbbdxdfhghdexhgh113131313112343253654#$%bnonn";
	$userInfo= [

		'name' => $temp_user_data->name,
		'phone' => $temp_user_data->phone,
		'agent_id' => $temp_user_data->agent_id,
		'ip' => $req->ip(),
		'added_by' =>999,
		'is_active' => 1,
		'token'=> $token

	];


	if (Users::where('phone',$temp_user_data->phone)->exists()) {

    // echo $temp_user_data->phone;
    // exit;
    return Redirect('/login')->with('status-error', 'Number is already registed');
    // return view('frontend/login',['Category_data' => $Category_data])->with('status', 'Number is already registed');

	}else{


$created_data=Users::create($userInfo)->toArray();

  $user_id=$created_data['id'];


if(!empty($created_data)){

  // echo "hi";
  // exit;

    $req->session()->put('user_data', 1);
    $req->session()->put('user_name', $name);
    $req->session()->put('user_phone', $phone);

    date_default_timezone_set("Asia/Calcutta");
            $cur_date=date("d-m-Y");

    $expiry_date = date('d-m-Y', strtotime("+".WALLET_VALIDITY." months", strtotime($cur_date)));
    $walletInfo= [

      'user_id' => $user_id,
      'wallet_amount' => WALLET,
      'wallet_create_date' => $cur_date,
      'wallet_expire_date' => $expiry_date,
      'is_active' => 1,

    ];
    $wallet_data=Wallet::create($walletInfo)->toArray();


if(!empty(session('cart_data'))){

$cart_data= session('cart_data');

foreach ($cart_data as $value) {

$product_id=$value['product_id'];
$type_id=$value['type_id'];
$quantity=$value['quantity'];

// echo $product_id;
// exit;

if (Cart2::where(array('product_id'=>$product_id,'type_id'=>$type_id, 'user_id'=> $user_id))->exists()) {
}else{
  $type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();



	if($inventory_data->quantity >= $quantity){
    // echo 'HI';
    // exit;

	$cart_data= array(

		'product_id' => $product_id,
		'type_id' => $type_id,
		'quantity' => $quantity,
    'user_id' => $user_id,
    'ip'=>$req->ip()


	);

  $last_id5 = Cart2::create($cart_data)->toArray();

// print_r( $last_id5);
// exit;

}
}
}

if(!empty($last_id5)){

	session()->forget('cart_data');

}



}
return Redirect('/')->with('status', 'Successfully Registed');

}
else{
    return Redirect('/login')->with('status-error', 'Some error occured');
}
}
}
}
else{
return redirect()->back()->with('status-error', 'OTP not match');

}
}
}else{
  return view('frontend/index',['Category_data' => $Category_data]);
}
}


//-------user_logout-------


public function logout(Request $req){

  if(!empty($req->session()->has('user_data'))){


  $req->session()->forget('user_data');
  $req->session()->forget('user_name');
  $req->session()->forget('user_phone');

   return Redirect('/')->with('status', 'Logout Successfully.');

  }
  else{
    return Redirect('/login');
  }

}

//---------user login---------


public function user_login(Request $req){

  $Category_data = Category::wherenull('deleted_at')->get();


  $req->validate([

    'phone' => 'required'

  ]);

  $phone = $req->input('phone');

 	$user_data1= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>0))->first();
  if(!empty($user_data1)){
    return redirect()->back()->with('status-error', 'User is blocked! Please contact to admin');
  }
 	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();


if(!empty($user_data)){
	$OTP =random_int(100000, 999999);
	// $OTP =123456;
	$otpInfo= [

		'phone' => $phone,
		'otp' => $OTP,
		'ip' => $req->ip()


	];

	$last_id = Otp::create($otpInfo)->toArray();


	$msg= "Welcome to cementwale.com and Your One Time Password (OTP) for Login Into your account is ".$OTP."." ;

						$curl = curl_init();

						curl_setopt_array($curl, array(
							// http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=919799655891&message=otp%20is%20320451&sender=FORNXT&route=4
						  CURLOPT_URL => "http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=".$phone."&message=OTP%20is%20".$OTP."%20for%20login%20on%20CEMENTWALE%20and%20valid%20till%205min%20Do%20not%20share%20this%20OTP%20to%20anyone%20for%20security%20reasons.%20Fortunext%20Cementwala&sender=FORNXT&route=4&country=91&DLT_TE_ID=1307163093625759975",
						 CURLOPT_RETURNTRANSFER => true,
						 CURLOPT_ENCODING => "",
						 CURLOPT_MAXREDIRS => 10,
						 CURLOPT_TIMEOUT => 30,
						 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						 CURLOPT_CUSTOMREQUEST => "GET",
						 CURLOPT_SSL_VERIFYHOST => 0,
						 CURLOPT_SSL_VERIFYPEER => 0,
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);
						curl_close($curl);

						if ($err) {
						 echo "cURL Error #:" . $err;
						} else
						{
						// echo $response;
						}

						if(!empty($last_id)){

              $req->session()->put('user_name', $user_data->name);
              $req->session()->put('user_phone', $phone);

              return Redirect('/login_otp')->with('status', 'OTP sent successfully');


}


}
else{

  return Redirect('/login')->with('status-error', 'User not found');
}
}

//-----view verify OTP------
public function login_otp(Request $req){


return view('frontend/login_otp');

}
//---------------verify user otp-------
public function verify_user_otp(Request $req){



  if(!empty($req->session('user_phone'))){

        $req->validate([

          'otp' => 'required'

        ]);

        $name = session('user_name');
        $phone = session('user_phone');
        $OTP = $req->input('otp');

$otp_data= Otp::where(array('status'=>0,'phone'=> $phone))->orderBy('id', 'DESC')->first();
// print_r($otp_data->otp);
// exit;
if(!empty($otp_data)){
  // echo "ho";
  // exit;
if($otp_data->otp==$OTP){

	$otp_update =[
		'status'=>1
	];

	$updated_last_id = Otp::where('id', $otp_data->id)->first();
	$updated_last_id->update($otp_update);


if(!empty($updated_last_id)){
  $req->session()->put('user_data', 1);
  $req->session()->put('user_name', $name);
  $req->session()->put('user_phone', $phone);

$cart_data = session('cart_data');

  if(!empty($cart_data)){


$user_data= Users::where('phone', $phone)->first();

 $user_id =$user_data->id;
  foreach ($cart_data as $value) {

  $product_id=$value['product_id'];
  $type_id=$value['type_id'];
  $quantity=$value['quantity'];

  // echo $product_id;
  // exit;
  if (Cart2::where(array('product_id'=>$product_id,'type_id'=>$type_id, 'user_id'=> $user_data->id))->exists()) {



  }else{

    $type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

  	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();



  	if($inventory_data->quantity >= $quantity){
      // echo 'HI';
      // exit;

  	$cart_data= array(

  		'product_id' => $product_id,
  		'type_id' => $type_id,
  		'quantity' => $quantity,
      'user_id' => $user_id,
      'ip'=>$req->ip()


  	);

    $last_id5 = Cart2::create($cart_data)->toArray();
    if(!empty($last_id5)){

      session()->forget('cart_data');
    }
  // print_r( $last_id5);
  // exit;

  }
}
  }



}
return Redirect('/')->with('status', 'Successfully logged in');

}else{
	return redirect()->back()->with('status-error', 'some error occures');
}


}else{
  	return Redirect()->back()->with('status-error', 'Wrong otp');

}

}else{
  return Redirect('/login')->with('status-error', 'Otp is already used');

}
}
}

//------add to cart------

public function add_to_cart(Request $req){

$req->validate([

	'product_id' => 'required',
	'type_id' => 'required',
	'quantity' => 'required'

]);

$product_id = $req->input('product_id');
$type_id = $req->input('type_id');
$quantity = $req->input('quantity');

// echo $type_id;
// exit;
// echo $product_id;

if(!empty(session('user_data'))){

$phone = session('user_phone');
// echo $phone;
// exit;
	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

	$product_data= Product::wherenull('deleted_at')->where(array('id'=> $product_id,'is_active'=>1))->first();

	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();
// echo $type_data->id;
// exit;
	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_id,'is_active'=>1))->first();

	if($inventory_data->quantity > $quantity){

	$cart_data= [

		'product_id' => $product_id,
		'type_id' => $type_id,
		'quantity' => $quantity,
		'user_id' => $user_data->id,
		'ip' => $req->ip()


	];
	if (Cart2::where(array('product_id'=>$product_id,'user_id'=> $user_data->id))->exists()) {

    	return redirect()->back()->with('status-error', 'This product '.$product_data->name.' is already in your cart');

	}else{
	$last_id5 = Cart2::create($cart_data)->toArray();

	if($last_id5){

    return redirect()->back()->with('status', $product_data->product_name.' added in cart');



}else{
  return redirect()->back()->with('status-error', 'Some error occured');
}
}
}
else{

	return redirect()->back()->with('status-error', 'This product '.$product_data->name.' is out of stock');

}


}
//user is not log in
else{


	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

// echo $inventory_data->quantity;
// exit;


	if($inventory_data->quantity >= $quantity){


	$cart_data= array(

		'product_id' => $product_id,
		'type_id' => $type_id,
		'quantity' => $quantity,
		'ip' => $req->ip()


	);
// echo $product_id;
$cart_info = session('cart_data');
$i=0;
if(!empty($cart_info)){
foreach ($cart_info as $value) {

if($product_id == $value['product_id'] && $type_id == $value['type_id'])
{
  $i=1;
}

}
}
echo $i;
if($i==0){
  $req->session()->push('cart_data', $cart_data);

  	if(!empty(session('cart_data'))){

      return redirect()->back()->with('status', 'Item added in cart');

  }else{

    return redirect()->back()->with('status-error', 'Some error occured');


  }

}else{

  return redirect()->back()->with('status-error', 'Product is already in cart');

}
  // session()->flush();
	// $last_id5 = session()->put('cart_data',$cart_data);
  // echo count($cart_data);



}
else{

  return redirect()->back()->with('status-error', 'Product is out of stock');


}
// }

}
}

//---------My cart-------
public function my_cart(Request $req){
  if(!empty(session('user_data'))){

  $phone = session('user_phone');

  $user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

  $cart_data= Cart2::where('user_id',$user_data->id)->get();

  $Category_data = Category::wherenull('deleted_at')->get();


  return view('frontend/cart',['Category_data' => $Category_data,'cart_data' => $cart_data,]);


}
else{
    $Category_data = Category::wherenull('deleted_at')->get();
    $cart_data = session('cart_data');
    // unset($cart_data);

    // print_r($cart_data);
    // foreach($cart_data as $cc){
    //   echo($cc['product_id']);
    //   exit;
    // }
    // exit;
if(!empty(session('user_data'))){
    return view('frontend/local_cart',['Category_data' => $Category_data]);
  }else{
    return redirect("/")->with('status-error', 'Please log in or register first');

    }
}
}

//----delete product from cart------

public function delete_product_cart($idd,$idd2,Request $req){

 $pro_id=base64_decode($idd);
 $type_id=base64_decode($idd2);

//-----log in-----

 if(!empty(session('user_phone'))){

 $phone = session('user_phone');


$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();


$delete = Cart2::where(array('product_id'=> $pro_id,'user_id' =>$user_data->id))->delete();

if(!empty($delete)){

  return redirect()->back()->with('status', 'Successfully Deleted');

}else{

  return redirect()->back()->with('status-error', 'Some error occured');

}




}
					//-----without log in----------
else{

$cart_data = session('cart_data');

foreach ($cart_data as $value) {

  if($pro_id!=$value['product_id'] && $type_id!=$value['type_id']) {

  $new_cart = [
   'product_id'=> $value['product_id'],
   'type_id'=> $value['type_id'],
   'quantity'=> $value['quantity']
  ];
  session()->push('cart_data2', $new_cart);


  }
   }

 session()->forget('cart_data');

  $cart_data2 =  session('cart_data2');
  if(!empty($cart_data2)){

  foreach ($cart_data2 as $value2) {

  session()->push('cart_data', $value2);
  }



  session()->forget('cart_data2');

  }




  return redirect()->back()->with('status', 'Successfully Deleted');


}

}


//------update cart---------

public function update_cart(Request $req){


$req->validate([

	'product_id' => 'required',
	'type_id' => 'required',
	'quantity' => 'required'

]);

$product_id = $req->input('product_id');
$type_id = $req->input('type_id');
$quantity = $req->input('quantity');


//--------log in -----

if(!empty(session('user_phone'))){

  $phone = session('user_phone');


	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();


	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

	if($inventory_data->quantity >= $quantity){

	$cart_data= [

		'type_id' => $type_id,
		'quantity' => $quantity,
		'ip' => $req->ip()


	];

	$updated_last_id = Cart2::where(array('product_id'=> $product_id,'user_id'=>$user_data->id))->first();
	$updated_last_id->update($cart_data);

  return redirect()->back()->with('status', 'Successfully Updated');


}else{
  return redirect()->back()->with('status-error', 'Product is out of stock');

}



}

			//---without log in
else{
// echo "hii";
  $cart_data = session('cart_data');

$i=0;
$new_cart=[];
  foreach ($cart_data as $value) {
  //
  //    break;
  //    // $j=$i;
  //  }
  // $i++;
  //
  $i=1;
   if($product_id!=$value['product_id'] && $type_id!=$value['type_id']) {
// echo"hi";
// exit;

  $new_cart = [
    'product_id'=> $value['product_id'],
    'type_id'=> $value['type_id'],
    'quantity'=> $value['quantity']
  ];
  session()->push('cart_data2', $new_cart);

$i++;
}
    }

session()->forget('cart_data');
// exit;
// echo $quantity;
// exit;
// print_r(session('cart_data2'));
// exit;



// echo $i;
// exit;
$cart_data2 =  session('cart_data2');
if(!empty($cart_data2)){

foreach ($cart_data2 as $value2) {

session()->push('cart_data', $value2);
}



session()->forget('cart_data2');

}
// print_r(session('cart_data'));
// exit;
 // session()->regenerate();


      $cart_data= [
        'product_id' => $product_id,
        'type_id' => $type_id,
        'quantity' => $quantity



      ];
// session()->flush();
      $update=session()->push('cart_data', $cart_data);
      return redirect()->back()->with('status', 'Successfully Updated');
      // print_r(session('cart_data'));
      // exit;
//       if(!empty($update)){
// // session()->flush();
//         // print_r(session('cart_data'));
//         // exit;
//
//      return redirect()->back()->with('status', 'Successfully Updated');
//     }else{
//         // session()->flush();
//         // print_r(session('cart_data'));
//         // exit;
//       return redirect()->back()->with('status-error', 'Some error occured');
//     }




}
}


//-----promocode
public function promocode(Request $req){
// ECHO"HI";
// EXIT;
if(!empty(session('user_data'))){

  $req->validate([

    'promocode' => 'required',

  ]);

  $promocode = $req->input('promocode');

if(!empty($promocode)) {

$promocode= strtoupper( $promocode);



$order_id= session('order1_id');
$order_data= Order1::wherenull('deleted_at')->where('id', $order_id)->first();

$promo_data= Promocode::wherenull('deleted_at')->where(array('promocode'=> $promocode,'is_active'=>1))->first();

$discount=0;
  if(!empty($promo_data)){

//--cheking for one time promocode
    if($promo_data->ptype==1){

$user_id = $order_data->user_id;
$promo_check= Order1::wherenull('deleted_at')->where(array('user_id'=> $user_id,'promocode_id'=>$promo_data->id))->first();


if(empty($promo_check)){
  if($order_data->total_amount > $promo_data->minorder){ //----checking minorder for promocode
    // echo "hii";

    $discount_amt = $order_data->total_amount * $promo_data->giftpercent/100;
  if($discount_amt > $promo_data->max){
    // will get max amount
    $discount =  $promo_data->max;

  }else{

    $discount =  $discount_amt;
  }

  }//endif of minorder
  else{

    return redirect()->back()->with('status-error', 'Please add more products for promocode');

  }

  // echo $discount;
  // exit;
  $order_update= [
    'promocode_id' => $promo_data->id,
    'discount' => $discount
  ];

  $updated_last_id = Order1::where('id', $order_data->id)->first();
  $updated_last_id->update($order_update);


  return redirect()->back()->with('status', 'Promocode applied');




}else{

    return redirect()->back()->with('status-error', 'Promocode is already used');


}
}
//------every time promocode----
    else{

    // if($promo_data->id!=$order_data->promocode_id && $order_data->promocode_id==NULL){

    if($order_data->total_amount > $promo_data->minorder){ //----checking minorder for promocode
      // echo "hii";

    	$discount_amt = $order_data->total_amount * $promo_data->giftpercent/100;
    if($discount_amt > $promo_data->max){
    	// will get max amount
    	$discount =  $promo_data->max;

    }else{

    	$discount =  $discount_amt;
    }

    }//endif of minorder
    else{

      return redirect()->back()->with('status-error', 'Please add more products for promocode');

    }

// echo $discount;
// exit;
    $order_update= [
      'promocode_id' => $promo_data->id,
      'discount' => $discount
    ];

    $updated_last_id = Order1::where('id', $order_data->id)->first();
  	$updated_last_id->update($order_update);


  return redirect()->back()->with('status', 'Promocode applied');
}
// }
// else{
//   return redirect()->back()->with('status-error', 'Promocode is already used');
//
// }
// }else{
  return redirect()->back()->with('status-error', 'Invalid Promocode');

}else{
  return redirect()->back()->with('status-error', 'Invalid Promocode');

}
}
}
}


//----promocode_remove----
public function promocode_remove(){

$order_id= session('order1_id');

  $order_update= [
    'promocode_id' => "",
    'discount' => 0
  ];

  $updated_last_id = Order1::where('id', $order_id)->first();
  $updated_last_id->update($order_update);

  return redirect()->back()->with('status', 'promocode removed successfully');

}
//--------cart data submit------
public function cart_data_submit(Request $req){

  if(!empty(session('user_data'))){

  $phone = session('user_phone');

  $Category_data = Category::wherenull('deleted_at')->get();



  $user_data = Users::wherenull('deleted_at')->where('phone',$phone)->first();



  $cart_data = Cart2::where('user_id',$user_data->id)->get();


  //------order1 entry

  $quantity = 0;
  $quantity = 0;
  $charges = 0;
  $final_amt = 0;
  foreach ($cart_data as $cart) {

  $type_data= Type::wherenull('deleted_at')->where('id', $cart->type_id)->first();
$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $cart->type_id,'is_active'=>1))->first();
				if($inventory_data->quantity >= $cart->quantity){
  $total=$type_data->selling_price_gst * $cart->quantity;
  $quantity= $quantity + $cart->quantity;
$inventory= $inventory_data->quantity-$cart->quantity;
  $final_amt = $final_amt + $total;

}

else{
return Redirect('/my_cart')->with('status-error', 'This Product' . $product_data->name.' is out of stock');
}

  }
  if($final_amt>=MIN_ORDER){

    //---------Calculate tax-------------
    $charges = 0;
    $delivery_status = Delivery_status::first();

    if($delivery_status->status == 1){

    $charges = $quantity * shipping_charg;
    session()->forget('delivery_discount');
  }else{
  $req->session()->put('delivery_discount', $delivery_discount = $quantity * shipping_charg);
  }

  $final_amt1= $final_amt+$charges;
  $order_data1= [

  'user_id' => $user_data->id,
  'total_amount'=>$final_amt,
  'final_amount'=>$final_amt1,
  'delivery_charge'=>$charges,
  'app_order' => 0,

  ];



  $last_id = Order1::create($order_data1)->toArray();

  $req->session()->put('order1_id', $last_id['id']);


  //------order2 entry---------
  $main_id=$last_id['id'];

  foreach ($cart_data as  $cart2) {
    $type_data= Type::wherenull('deleted_at')->where('id', $cart2->type_id)->first();


  $total1=$type_data->selling_price_gst * $cart2->quantity;
    $order2_data= [

      'main_id' => $main_id,
      'type_id' => $cart2->type_id,
      'product_id' => $cart2->product_id,
      'quantity' => $cart2->quantity,
      'total_amount' => $total1,
      'type_amt' => $type_data->selling_price,
      'type_amt_gst' => $type_data->selling_price_gst,
      'gst' => $type_data->gst_price,
      'gst_percentage' => $type_data->gst,

    ];
  $last_id2 = Order2::create($order2_data)->toArray();
  }




  return redirect('/address');

}else{
  return redirect()->back()->with('status-error', 'Add more product! Minimum order Rs'.MIN_ORDER);

}
  }


}



//-----Address------------


public function address(Request $req){

  if(!empty(session('user_data'))){

  $phone = session('user_phone');

  $Category_data = Category::wherenull('deleted_at')->get();


  $user_data = Users::wherenull('deleted_at')->where('phone',$phone)->first();
  $cart_data = Cart2::where('user_id',$user_data->id)->first();
if(!empty($cart_data)){


  $order1_data= Order1::wherenull('deleted_at')->where('id', session('order1_id'))->first();
  // echo $order1_data->promocode_id;
  // exit;
$promocode_data = [];
  if(!empty($order1_data->promocode_id)){

  $promocode_Info= Promocode::wherenull('deleted_at')->where('id', $order1_data->promocode_id)->first();

$promocode_data = array(
  'name'=>$promocode_Info->promocode,
  'promocode_id'=>$promocode_Info->id,
  'discount'=>$order1_data->discount
);
 // print_r($promocode_data);
 // exit;

  }


  return view('frontend/checkout',['Category_data' => $Category_data,'promocode_data'=>$promocode_data]);

}else{
  return redirect("/my_cart");
}
}
else{

  return redirect("/login")->with('status-error', 'Please Register / login');

}
}






//--------checkout-------------


public function checkout(Request $req){

  if(!empty(session('user_phone'))){
    // echo "hi";
    // exit;
    $phone1 = session('user_phone');

    $user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone1,'is_active'=>1))->first();
    $cart_data = Cart2::where('user_id',$user_data->id)->first();
    if(!empty($cart_data)){
// echo "hi";
// exit;
			$req->validate([

				// 'payment_type' => 'required',
				'address' => 'required',
				'name' => 'required',
				'phone' => 'required',
				'plot_no' => 'required',
				'city' => 'required',
				'state' => 'required',
				'pincode' => 'required'

			]);

			$payment_type = $req->input('payment_type');
			$wallet_status = $req->input('wallet');
			$name = $req->input('name');
			$phone = trim($req->input('phone'));
			$gst = $req->input('gst');
			$plot_no = $req->input('plot_no');
			$address = $req->input('address');
			$city = $req->input('city');
			$state = $req->input('state');
			$pincode = $req->input('pincode');
			$vendor_code = $req->input('vendor_code');
      $order1_id = session('order1_id');
// $payment_type = 2;
// echo $payment_type;
// exit;


// echo $phone;
if($payment_type==1){
  	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone1,'is_active'=>1))->first();
  	$order_data= Order1::where('id',$order1_id)->first();
  $address_data= [

    'user_id' => $user_data->id,
    'name' => $name,
    'phone' =>$phone,
    'gst' => $gst,
    'address' => $address,
    'plot_no' => $plot_no,
    'city' => $city,
    'state' => $state,
    'pincode' => $pincode,
    'ip'=>$req->ip()

  ];

  $last_id = Address::create($address_data)->toArray();
  // print_r($last_id);
  // exit;
  $address_id = $last_id['id'];

  $order1update =[
		'address_id'=>$address_id,
    'payment_type'=>	$payment_type,
    'vendor_code' =>$vendor_code
	];

	$updated_last_id = Order1::where('id', $order1_id)->first();
	$updated_last_id->update($order1update);

//---gettiong cart data-----
$order2_data= order2::where('main_id', $order1_id)->get();
// print_R($order2_data);
// exit;

$price= 0;
$total_amt=0;
$quantity=0;
//---------checking inventory---------
foreach ($order2_data as $order ) {

$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $order->type_id,'is_active'=>1))->first();
$type_data= Type::wherenull('deleted_at')->where('id', $order->type_id)->first();
$product_data= Product::wherenull('deleted_at')->where('id', $order->product_id)->first();
// echo 'hi'.$order->quantity;
// exit;
				if($inventory_data->quantity >= $order->quantity){
          $quantity= $quantity + $order->quantity;
       $inventory= $inventory_data->quantity-$order->quantity;
          // exit;
				$price= $type_data->selling_price_gst * $order->quantity;
				$total_amt= $total_amt + $price;

        // echo $inventory;
        // exit;


        }

else{
return Redirect('/my_cart')->with('status-error', 'This Product' . $product_data->name.' is out of stock');
}
// echo $total_amt;
// exit;
}//end foreach
 // echo $total_amt;
 // exit;

//---Calculate wallet discount-----
$wallet_discount=0;

if($wallet_status==1){

$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$wallet_discount1=$total_amt * WALLET_DISCOUNT /100;

if($wallet_data->wallet_amount>=$wallet_discount1){

	$wallet_discount=$wallet_discount1;

}else{
  return redirect()->back()->with('status-error', 'Insufficent wallet balance');

}

$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$update_wallet = $wallet_data->wallet_amount - $wallet_discount;

//---update wallet amount---

$wallet_update =[
	'wallet_amount'=>$update_wallet
];


$updated_last_id2 = Wallet::where('user_id', $user_data->id)->first();
$updated_last_id2->update($wallet_update);

//----create wallet transation------
$order1=Order1::where('user_id', $user_data->id)->orderBy('id','DESC')->first();
$wallet_txt =[
	'user_id'=>$user_data->id,
	'order_id'=>$order1_id,
	'wallet_discount'=>$wallet_discount,
];

$wallet_txn_data =  Wallet_txn:: create($wallet_txt);

}

//---------Calculate tax-------------
$charges = 0;
$delivery_status = Delivery_status::first();

if($delivery_status->status == 1){

$charges = $quantity * shipping_charg;


}
// echo $charges;
// exit;
 $final_amt = ($total_amt - $order_data->discount - $wallet_discount) + $charges;   //calculate final amount
// echo  $final_amt;
// exit;

$invoice_data = Order1::where('payment_status', 1)->orderBy('id','DESC')->first();

if(!empty($invoice_data->invoice_no)){
if($invoice_data->invoice_no==NULL){
  $invoice_no = 1;
}else{
  $invoice_no = $invoice_data->invoice_no + 1;
}
}else{
  $invoice_no = 1;
}
  $order1update =[
    'address_id'=>$address_id,
    'final_amount'=>$final_amt,
    'delivery_charge' => $charges,
    'payment_type'=>	$payment_type,
    'order_status' => 1,
    'payment_status' => 1,
    'invoice_no' => $invoice_no,

  ];

  $updated_last_id = Order1::where('id', $order1_id)->first();
  $updated_last_id->update($order1update);

//------update inventory---------
  foreach ($order2_data as $order ) {

  $inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $order->type_id,'is_active'=>1))->first();


         $inventory= $inventory_data->quantity-$order->quantity;

          $inventry_update =[
                  'quantity'=>$inventory
                ];

                $updated_last_id5 = Inventory::where('producttype_type', $order->type_id)->first();
                $updated_last_id5->update($inventry_update);

  }//end foreach

//-------empty cart--------

$delete = Cart2::where('user_id' ,$user_data->id)->delete();

if(!empty($updated_last_id)){

  return Redirect('/order_success');
}else{
  return Redirect('/order_fail');


}

}//end of cod

///------online payment-----
else{


  $user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone1,'is_active'=>1))->first();
  $order_data= Order1::where('id',$order1_id)->first();


$address_data= [

  'user_id' => $user_data->id,
  'name' => $name,
  'phone' =>$phone,
  'address' => $address,
  'plot_no' => $plot_no,
  'city' => $city,
  'state' => $state,
  'pincode' => $pincode,
  'ip'=>$req->ip()

];

$last_id = Address::create($address_data)->toArray();
// print_r($last_id);
// exit;
$address_id = $last_id['id'];

$order1update =[
  'address_id'=>$address_id,
  'payment_type'=>	$payment_type,
  'vendor_code' =>$vendor_code
];

$updated_last_id = Order1::where('id', $order1_id)->first();
$updated_last_id->update($order1update);

//---gettiong cart data-----
$order2_data= order2::where('main_id', $order1_id)->get();
// print_R($order2_data);
// exit;

$price= 0;
$total_amt=0;
$quantity=0;
//---------checking inventory---------
foreach ($order2_data as $order ) {

$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $order->type_id,'is_active'=>1))->first();
$type_data= Type::wherenull('deleted_at')->where('id', $order->type_id)->first();
$product_data= Product::wherenull('deleted_at')->where('id', $order->product_id)->first();
// echo 'hi'.$order->quantity;
// exit;
      if($inventory_data->quantity >= $order->quantity){
        $quantity= $quantity + $order->quantity;
     $inventory= $inventory_data->quantity-$order->quantity;
        // exit;
      $price= $type_data->selling_price_gst * $order->quantity;
      $total_amt= $total_amt + $price;

      // echo $inventory;
      // exit;


      }

else{
return Redirect('/my_cart')->with('status-error', 'This Product' . $product_data->name.' is out of stock');
}
// echo $total_amt;
// exit;
}//end foreach
// echo $total_amt;
// exit;

//---Calculate wallet discount-----
$wallet_discount=0;

if($wallet_status==1){

$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$wallet_discount1=$total_amt * WALLET_DISCOUNT /100;

if($wallet_data->wallet_amount>=$wallet_discount1){

$wallet_discount=$wallet_discount1;

}else{
return redirect()->back()->with('status-error', 'Insufficent wallet balance');

}
//
// $wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();
//
// $update_wallet = $wallet_data->wallet_amount - $wallet_discount;
//
// //---update wallet amount---
//
// $wallet_update =[
// 'wallet_amount'=>$update_wallet
// ];
//
//
// $updated_last_id2 = Wallet::where('user_id', $user_data->id)->first();
// $updated_last_id2->update($wallet_update);
//
// //----create wallet transation------
// $order1=Order1::where('user_id', $user_data->id)->orderBy('id','DESC')->first();
// $wallet_txt =[
// 'user_id'=>$user_data->id,
// 'order_id'=>$order1_id,
// 'wallet_discount'=>$wallet_discount,
// ];
//
// $wallet_txn_data =  Wallet_txn:: create($wallet_txt);

}

//---------Calculate tax-------------
$charges = 0;
$delivery_status = Delivery_status::first();

if($delivery_status->status == 1){

$charges = $quantity * shipping_charg;


}
// echo $charges;
// exit;
$final_amt = ($total_amt - $order_data->discount - $wallet_discount) + $charges;   //calculate final amount
// echo  $final_amt;
// exit;
$order1update =[
'total_amount'=>$total_amt,
'final_amount'=>$final_amt,
'wallet_discount'=>$wallet_discount,
'delivery_charge' => $charges,
'order_status' => 0,
'payment_status' => 0

];

$updated_last_id = Order1::where('id', $order1_id)->first();
$updated_last_id->update($order1update);


  return Redirect('/payment');

  // return view('/payment',['final_amt' => $final_amt,'order_id'=>$order1_id]);






}

}else{
  return Redirect('/my_cart');

}


}

}

//-----order_success
public function order_success(Request $req){


    $Category_data = Category::wherenull('deleted_at')->get();
    $order1_id = session('order1_id');

 if(!empty($order1_id)){
    $order_data = Order1::where('id',$order1_id)->first();
    if(!empty($order_data)){
    $order_id = $order_data->id;
    $order_amount = $order_data->final_amount;

    $req->session()->forget('order1_id');


    //----sent push notification to admin---------

        $url = 'https://fcm.googleapis.com/fcm/send';

        $title="New Order";
        $message="Order recieved of amount:-".$order_amount." and order id:- ".$order_id." ";


        $msg2 = array(
          'title'=>$title,
        'body'=>$message,
        "sound" => "default"

        );


        // echo $user_device_tokens->device_token; die();

        $fields = array(
        // 'to'=>"/topics/all",
        'to'=>"/topics/weather",
        'notification'=>$msg2,
        'priority'=>'high'
        );

        $fields = json_encode ( $fields );

        $headers = array (
        'Authorization: key=' . AUTHORIZATION_KEY_PUSH_ADMIN,
        'Content-Type: application/json'
        );

        $ch = curl_init ();
        curl_setopt ( $ch, CURLOPT_URL, $url );
        curl_setopt ( $ch, CURLOPT_POST, true );
        curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
        curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
        curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

        $result = curl_exec ( $ch );
        // echo $fields;
        // echo $result;
        curl_close ( $ch );

        $notification =[
        'title'=>$title,
        'message'=>$message,
        'ip'=>$req->ip(),
        ];

        $notification_data = Admin_notification :: create($notification);



}
}else{
    return Redirect('/my_cart');
}
  return view('frontend/order_success',['Category_data' => $Category_data,'order_id' => $order_id,'amount' => $order_amount]);



}
//-----order_fail
public function order_fail(){

  $Category_data = Category::wherenull('deleted_at')->get();
if(!empty(session('order1_id'))){
  $req->session()->forget('order1_id');
return view('frontend/order_fail',['Category_data' => $Category_data]);
}else{
  return Redirect('/my_cart');

}


}

public function type_price(){

$type_id = $_GET['isl'];

  $type_data = Type::wherenull('deleted_at')->where(array('id'=>$type_id,"is_active"=>1))->first();
  $inventory_data = Inventory::wherenull('deleted_at')->where(array('producttype_type'=>$type_id,"is_active"=>1))->first();
if($inventory_data->quantity > 0){
  $stock=1;
}else{
  $stock=2;

}

$type = array(
  "type_price"=>$type_data->selling_price_gst,
  "type_mrp"=>$type_data->mrp,
  "stock"=>$stock
);

  return json_encode($type);

}

//-------------my orders-----------
public function my_orders(Request $req){

  if(!empty(session('user_phone'))){

  $phone = session('user_phone');

  $Category_data = Category::wherenull('deleted_at')->get();

  $user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();


  $order_data= Order1::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'payment_status'=>1))->get();

  $order_check = $order_data->first();
  if(!empty($order_check)){
  	$orderInfo =[];
  foreach ($order_data as $value) {

    $boy_data= Delivery_boy::wherenull('deleted_at')->where(array('id'=> $value->delivery_boy_id))->first();


if(!empty($boy_data)){
$boy_name = $boy_data->name;
$boy_number = $boy_data->phone;
}else{
  $boy_name = "";
  $boy_number = "";
}
  	$orderInfo[]=array(
  		'order_id'=>$value->id,
  		'total_amount'=>$value->total_amount,
  		'order_date'=>$value->created_at,
  		'payment_type'=>$value->payment_type,
  		'delivery_boy_name'=>$boy_name,
  		'delivery_boy_phone'=>$boy_number,
  	);

  }

  }
  return view('frontend/my_orders',['Category_data' => $Category_data,]);


}
}




//---------cancel order-------
public function cancel_order($idd,Request $req){

 $order_id=base64_decode($idd);

 if(!empty(session('user_phone'))){

 $phone = session('user_phone');

 $Category_data = Category::wherenull('deleted_at')->get();

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();


	$orderInfo = [
		'order_status'=> 5
	];

	$updated_last_id = Order1::where('id', $order_id)->first();
	$updated_last_id->update($orderInfo);

  $order2 = Order2::where('main_id',$updated_last_id)->get();


foreach ($order2 as $value) {

//----update inventory-------

  $inventory_d = Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $value->type_id,'is_active'=>1))->first();
// print_r($inventory_d);
// exit;
  $update_inv= $inventory_d->quantity + $value->quantity;
  // echo $inventory_d->quantity ;
  // exit;
    $updateinvt= ['quantity'=>$update_inv];
  // echo $updated_last_id->type_id;
  // exit;
  $inventory_data = Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $value->type_id,'is_active'=>1))->first();
  $inventory_data->update($updateinvt);
}

return redirect()->back()->with('status', 'Order Cancelled');


}

}

//--------wallet_check----
public function wallet_check($idd){
$wallet_status=$idd;
if(!empty(session('user_phone'))){

$phone = session('user_phone');

$Category_data = Category::wherenull('deleted_at')->get();

 $user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

 $order_data= Order1::where('user_id', $user_data->id)->orderBy('id','DESC')->first();

 $wallet_data= Wallet::where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$order_amt=$order_data->total_amount;

$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$wallet_discount1=$order_amt * WALLET_DISCOUNT /100;

if($wallet_status==1){


if($wallet_data->wallet_amount>=$wallet_discount1){

	$wallet_discount=$wallet_discount1;

  $order_update= [
    'wallet_discount' => $wallet_discount
  ];

  $updated_last_id = Order1::where('id', $order_data->id)->first();
  $updated_last_id->update($order_update);





return redirect()->back()->with('status', 'Wallet amount applied');

}else{
  return redirect()->back()->with('status-error', 'Insufficient wallet amount');

  }



}else{

  $order_update= [
    'wallet_discount' => 0
  ];

  $updated_last_id = Order1::where('id', $order_data->id)->first();
  $updated_last_id->update($order_update);

return redirect()->back()->with('status', 'Wallet amount Removed');

}

}
}

//---------about us---------
public function about_us(){

$Category_data = Category::wherenull('deleted_at')->get();
if(!empty(session('user_data'))){

return view('frontend/about_us',['Category_data' => $Category_data]);
}else{
  return view('frontend/about_us');

}
}

//---------Privacy Policy---------
public function privacy_policy(){

$Category_data = Category::wherenull('deleted_at')->get();
if(!empty(session('user_data'))){

return view('frontend/privacy_policy',['Category_data' => $Category_data]);
}else{
  return view('frontend/privacy_policy');

}
}

//---------shipping_and_return---------
public function shipping_and_return(){

$Category_data = Category::wherenull('deleted_at')->get();
if(!empty(session('user_data'))){
return view('frontend/shipping_and_return',['Category_data' => $Category_data]);
}else{
  return view('frontend/shipping_and_return');

}
}
//---------terms_and_conditions---------
public function terms_and_conditions(){

$Category_data = Category::wherenull('deleted_at')->get();
if(!empty(session('user_data'))){
return view('frontend/terms_and_conditions',['Category_data' => $Category_data]);
}else{
  return view('frontend/terms_and_conditions');

}
}

//------search_list------
public function search_list(Request $req){


$string=$_GET['string'];


$Category_data = Category::wherenull('deleted_at')->get();

  $product_Info= Product::wherenull('deleted_at')->Where('name', 'like', '%' . $string . '%')->get();

  $product_data=[];

  foreach ($product_Info as $value) {
  if($value->is_active==1){
  $type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $value->id,'is_active'=>1))->first();

  $product_data[]=[
  										'product_id'=> $value->id,
  										'name'=> $value->name,
  										'mrp'=> $type_data->mrp,
  										'price'=> $type_data->selling_price_gst,
  										"image"=>$value->image,
  										"type_id"=>$type_data->id,
  										"suffix"=>$type_data->suffix,
  ];
  }
  }
// print_r($product_data);
// exit;
if(!empty(session('user_data'))){
return view('frontend/search_results',['Category_data' => $Category_data,'product_data'=>$product_data]);
}else{
  return redirect("/")->with('status-error', 'Please log in or register first');
  }


}


}
