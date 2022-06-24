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
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class AddressController extends Controller
{

	  public function add_address(Request $req){

		log::debug('add_address');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
log::debug($categories);

        return view('frontend/add_address', ['category_data'=>$categories]);



    }





// add_address_process for user

public function add_address_process(Request $req)
 {
if(!empty($req->session()->has('user_data'))){

		 log::debug( 'yes Id');
	 $req->validate([
	 'customer_name' => 'required',
	 'customer_email' => 'required|email',
	 'customer_number' => 'required',
	 'address' => 'required',
	 'zipcode' => 'required',
	 'country' => 'required'

	 ]);

$customer_name= $req->input('customer_name');
$customer_email= $req->input('customer_email');
$customer_number= $req->input('customer_number');
$address= $req->input('address');
$doorflat= $req->input('doorflat');
$landmark= $req->input('landmark');
$zipcode= $req->input('zipcode');
$country= $req->input('country');
$user_id= $req->session()->get('user_id');

 $userAddressInfo= [

	 'user_id' => $user_id,
	 'customer_name' => $customer_name,
	 'customer_email' => $customer_email,
	 'customer_number' => $customer_number,
	 'address' => $address,
	 'doorflat' => $doorflat,
	 'landmark' => $landmark,
	 'zipcode' => $zipcode,
	 'country' => $country

 ];




	 $last_id = Address::create($userAddressInfo);



	 return Redirect('/checkout')->with('status', 'Address Added Successfully.');
   // }

}else{
  return Redirect('/');
}

}







 }
