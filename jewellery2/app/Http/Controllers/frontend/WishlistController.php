<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\ProductColorSize;
use App\adminmodel\Color;
// use App\adminmodel\Size;
use App\adminmodel\CustomOrder;
use App\adminmodel\WholesaleInquiry;
use App\adminmodel\Contact;
// use App\adminmodel\Countries;
use App\frontendmodel\User;
use App\frontendmodel\Address;
use App\frontendmodel\Cart;
// use App\frontendmodel\Rating;
// use App\frontendmodel\Order1;
// use App\frontendmodel\Order2;
use App\frontendmodel\Wishlist;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class WishlistController extends Controller
{



// add_wishlist for user
public function add_to_wishlist(Request $req)
 {


if(!empty($req->session()->has('user_data'))){


	 $req->validate([
	 'product_id' => 'required',

	 ]);

$product_id= $req->input('product_id');
$user_id= $req->session()->get('user_id');

$ip= $req->ip();


$user_wishlist = Wishlist::wherenull('deleted_at')->where('user_id', $user_id)->where('product_id', $product_id)->first();

    if(empty($user_wishlist)){

           $userWishInfo= [
          	 'user_id' => $user_id,
          	 'product_id' => $product_id,

           ];

          	 $last_id = Wishlist::create($userWishInfo);

          	 $data=true;

     }else{
       $data=false;
     }


}else{
  $data="loginN";
}

echo json_encode($data); exit;

}


// Remove_wishlist product for user
public function remove_from_wishlist(Request $req)
 {


if(!empty($req->session()->has('user_data'))){


	 $req->validate([
	 'product_id' => 'required',
	 'wishlist_id' => 'required',

	 ]);

$product_id= $req->input('product_id');
$wishlist_id= $req->input('wishlist_id');
$user_id= $req->session()->get('user_id');

$ip= $req->ip();


$user_wishlist = Wishlist::wherenull('deleted_at')->where('user_id', $user_id)->where('product_id', $product_id)->where('id', $wishlist_id)->first();

    if(!empty($user_wishlist)){

      	$user_wishlist->delete();

          	 $data=true; exit;

     }else{
        $data=false; exit;
     }


}else{
      $data=false; exit;
}


}


//Get wishlist products
  public function get_wishlist(Request $req){

if(!empty($req->session()->has('user_data'))){

        $user_id= $req->session()->get('user_id');

        $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
        log::debug($categories);



        $userWishData = Wishlist::wherenull('deleted_at')->where('user_id', $user_id)->get();

        return view('frontend/my_wishlist', ['category_data'=>$categories, 'wishlistData'=>$userWishData]);


    }else{
      return Redirect('/');
    }

  }



 }
