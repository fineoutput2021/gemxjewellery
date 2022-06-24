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
// use App\adminmodel\Countries;
use App\frontendmodel\User;
use App\frontendmodel\Address;
use App\frontendmodel\Cart;
use App\frontendmodel\Rating;
use App\frontendmodel\Order1;
use App\frontendmodel\Order2;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class RatingController extends Controller
{



// add_product_rating_review for user

public function add_product_review(Request $req)
 {


if(!empty($req->session()->has('user_data'))){


	 $req->validate([
	 'product_id' => 'required',
   'rating' => 'required',
	 'description' => 'required',


	 ]);

$product_id= $req->input('product_id');
$rating= $req->input('rating');
$description= $req->input('description');

$user_id= $req->session()->get('user_id');
$ip= $req->ip();
$ability= 0;



$user_order = Order1::wherenull('deleted_at')->where('user_id', $user_id)->get();


if(!empty($user_order)){
   // echo "adh"; die();
foreach ($user_order as $order) {

$user_order_products = Order2::wherenull('deleted_at')->where('main_id', $order->id)->where('product_id', $product_id)->first();

if(!empty($user_order_products)){
$ability=1;
}


}


}




if($ability == 1){


$user_rating_data = Rating::wherenull('deleted_at')->where('user_id', $user_id)->where('product_id', $product_id)->first();

if(empty($user_rating_data)){


 $userRatingInfo= [

	 'user_id' => $user_id,
	 'product_id' => $product_id,
	 'rating' => $rating,
	 'description' => $description,
	 'ip' => $ip

 ];




	 $last_id = Rating::create($userRatingInfo);

	 return Redirect::back()->with('status', 'Thankyou for giving rating to us.');


 }else{

   $userRatingInfo= [

  	 'rating' => $rating,
  	 'description' => $description

   ];


   $rating_review_Data = Rating::wherenull('deleted_at')-> where('id', $user_rating_data)->first();
  log::debug( $rating_review_Data);

  $rating_review_Data->update($userRatingInfo);

 	 return Redirect::back()->with('status', 'Thankyou for giving rating to us.');


 }



 }else{


 	 return Redirect::back()->with('status-error', 'You Can Write Review After Order This Product.');


 }



}else{
  return Redirect('/');
}

}


//Get Product Rating
public function get_product_rating(Request $req){

log::debug('get_product_rating');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
log::debug($categories);


    return view('frontend/add_address', ['category_data'=>$categories]);



}



 }
