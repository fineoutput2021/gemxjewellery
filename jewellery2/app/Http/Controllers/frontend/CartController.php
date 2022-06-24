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
use App\adminmodel\Inventory;
use App\frontendmodel\User;
use App\frontendmodel\Cart;
use App\frontendmodel\Wishlist;

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
use session;

class CartController extends Controller
{

// 	  public function index(Request $req){
//
// 		log::debug('frontend-index');
//
// $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
// log::debug($categories);

        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
    //     return view('frontend/index', ['category_data'=>$categories]);
    //
    //
    // }



//cart page
public function view_cart(Request $req){

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

log::debug('view_cart');
if(empty($req->session()->has('user_data'))) {

$cart_data = session('cart_data');

		return view('frontend/cart', ['category_data'=>$categories,"cart_data"=>$cart_data]);

	}else{

		 $user_id= $req->session()->get('user_id');
		$cart_data = Cart::wherenull('deleted_at')->where('user_id', $user_id)->get();





		// print_r($cart_data); die();

		return view('frontend/user_cart', ['category_data'=>$categories, 'cart_data'=>$cart_data]);

	}
}



// check inventory before add to cart for frontend js functions

public function get_cart_pro_full_data(Request $req)
 {


		 log::debug( 'yes Id');
	 $req->validate([
	 'product_id' => 'required',
	 // 'color_id' => 'required',
	 'quantity' => 'required',


	 ]);

$product_id= $req->input('product_id');
$color_id= $req->input('color_id');
$stone= $req->input('stone');
$metal= $req->input('metal');
$font_size= $req->input('font_size');
$engrave_text= $req->input('engrave_text');
$font_family= $req->input('font_family');
$quantity= $req->input('quantity');
$status= $req->input('status');



if($status == 0){

$product= Product::wherenull('deleted_at')->where('id',$product_id)->where('is_cat_delete',0)->where('is_subcat_delete',0)->first();

$productcolorsize= ProductColorSize::wherenull('deleted_at')->where('product_id',$product_id)->get();

$productcolorsizeprices= ProductColorSize::wherenull('deleted_at')->where('product_id',$product_id)->where('color_id',$color_id)->first();

if(!empty($productcolorsizeprices)){
$productcolorsizeprice= $productcolorsizeprices->price;
$productcolorsizeimg1= $productcolorsizeprices->image1;
}else{
	$productcolorsizeprice= "";
	$productcolorsizeimg1= "";
}


$colors= Color::wherenull('deleted_at')->get();
// $size= Size::wherenull('deleted_at')->get();

// print_r($pro_inv_da); die();

$data['data'] = true;
$data['product'] = $product;
$data['productcolorsize'] = $productcolorsize;
$data['productcolorsizeprice'] = $productcolorsizeprice;
$data['productcolorsizetype'] = $productcolorsizeprices;
$data['productcolorsizeimage1'] = $productcolorsizeimg1;
$data['pro_quantity'] = $quantity;
$data['pro_status'] = $status;
$data['pro_stone'] = "";
$data['colors'] = $colors;
$data['pro_fontfamily'] = "";
$data['pro_fontsize'] = "";
$data['pro_engravetext'] = "";
$data['color_id'] = $color_id;

}
if($status == 1){

	$customize_product = CustomizeProduct::wherenull('deleted_at')->where('is_active', 1)->where('id', $product_id)->first();

	$productcolorsize= [];

	$productmetalstoneimg= CustomizeProductStone::wherenull('deleted_at')->where('product_id',$product_id)->where('name',$stone)->where('cust_metal_id',$metal)->where('is_active',1)->first();

	if(!empty($productmetalstoneimg)){
	$productcolorsizeprice= $productmetalstoneimg->price;
	$productcolorsizeimg1= $productmetalstoneimg->stone_product_image;
	}else{
		$productcolorsizeprice= "";
		$productcolorsizeimg1= "";
	}


	$metal= CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $metal)->first();
	// $size= Size::wherenull('deleted_at')->get();

	// print_r($pro_inv_da); die();

	$data['data'] = true;
	$data['product'] = $customize_product;
	$data['productcolorsize'] = $productcolorsize;
	$data['productcolorsizeprice'] = $productcolorsizeprice;
	$data['productcolorsizetype'] = $productmetalstoneimg;
	$data['productcolorsizeimage1'] = $productcolorsizeimg1;
	$data['pro_quantity'] = $quantity;
	$data['pro_status'] = $status;
	$data['pro_stone'] = $stone;
	$data['colors'] = $metal;
	$data['pro_fontfamily'] = "";
	$data['pro_fontsize'] = "";
	$data['pro_engravetext'] = "";
	$data['color_id'] = "";

}
if($status == 2){


		$engrave_product = EngraveProduct::wherenull('deleted_at')->where('is_active', 1)->where('id', $product_id)->first();

		$productcolorsize= [];

		$productmetalstoneimg= [];;

		if(!empty($engrave_product)){
		$productcolorsizeprice= $engrave_product->base_price;
		$productcolorsizeimg1= $engrave_product->image;
		}else{
			$productcolorsizeprice= "";
			$productcolorsizeimg1= "";
		}


		$metal= "";
		// $size= Size::wherenull('deleted_at')->get();

		// print_r($pro_inv_da); die();

		$data['data'] = true;
		$data['product'] = $engrave_product;
		$data['productcolorsize'] = $productcolorsize;
		$data['productcolorsizeprice'] = $productcolorsizeprice;
		$data['productcolorsizetype'] = $productmetalstoneimg;
		$data['productcolorsizeimage1'] = $productcolorsizeimg1;
		$data['pro_quantity'] = $quantity;
		$data['pro_status'] = $status;
		$data['pro_stone'] = "";
		$data['colors'] = $metal;
		$data['pro_fontfamily'] = $font_family;
		$data['pro_fontsize'] = $font_size;
		$data['pro_engravetext'] = $engrave_text;
		$data['color_id'] = "";


}

echo json_encode($data);

}



//update quantity in cart table
public function update_qty_in_tbl_cart(Request $req){

	$req->validate([
	'cart_id' => 'required',
	'product_id' => 'required',
	'quantity' => 'required'


	]);

					$cart_id= $req->input('cart_id');
					$product_id= $req->input('product_id');
					$quantity= $req->input('quantity');
					$user_id= $req->session()->get('user_id');



					date_default_timezone_set("Asia/Calcutta");
					$cur_date=date("Y-m-d H:i:s");



$cart_data= Cart::wherenull('deleted_at')->where('id',$cart_id)->first();

if(!empty($cart_data)){

	$data_update = array(
		'quantity'=> $quantity

	 );

	 $cartData = Cart::wherenull('deleted_at')->where('id', $cart_id)->first();

	 $cartData->update($data_update);

	//total cart product count of user

 $user_cart_count = Cart::wherenull('deleted_at')->where('user_id', $user_id)->count();



	  $data['data'] = true;
	  $data['cartcount'] = $user_cart_count;


}else{

$data['data'] = false;

}


echo json_encode($data);

	}



	//Delete cart product in cart table
	public function delete_from_tbl_cart(Request $req){

		$req->validate([
		'cart_id' => 'required'


		]);

						$cart_id= $req->input('cart_id');
						$user_id= $req->session()->get('user_id');



						date_default_timezone_set("Asia/Calcutta");
						$cur_date=date("Y-m-d H:i:s");



	$cart_data= Cart::wherenull('deleted_at')->where('id',$cart_id)->first();




	if(!empty($cart_data)){

	$CartData= Cart::wherenull('deleted_at')->where('id',$cart_id)->first();
	$CartData->delete();

	$data['data'] = true;

	}else{

	$data['data'] = false;

	}


	echo json_encode($data);

		}



// check inventory before add to cart for frontend js functions

public function check_Inventory(Request $req)
 {


		 log::debug( 'yes Id');
	 $req->validate([
	 'product_id' => 'required',
	 'color_id' => 'required',

	 'quantity' => 'required',


	 ]);

$product_id= $req->input('product_id');
$color_id= $req->input('color_id');

$quantity= $req->input('quantity');

$pro_inv_da= Inventory::wherenull('deleted_at')->where('product_id',$product_id)->where('color_id',$color_id)->first();

// print_r($pro_inv_da); die();

if(!empty($pro_inv_da)){
  $db_quantity=$pro_inv_da->stock;

    if($quantity <= $db_quantity){
          $data['data'] = true;
    }else{
      $data['data'] = false;
      $data['data_message'] = 'Product is out of stock';
    }

}else{
  $data['data'] = false;
  $data['data_message'] = 'Product is out of stock';
}

echo json_encode($data);

}



// add to cart inventory for frontend js functions addToCartOnlineHandler

public function add_to_cart_online(Request $req)
 {


		 log::debug( 'yes Id');
	 $req->validate([
	 'product_id' => 'required',
	 // 'color_id' => 'required',
	 'user_id' => 'required',
	 'quantity' => 'required',


	 ]);

$product_id= $req->input('product_id');
$color_id= $req->input('color_id');
$stone= $req->input('stone');
$metal= $req->input('metal');
 $font_size= $req->input('font_size');
 $engrave_text= $req->input('engrave_text');
$font_family= $req->input('font_family');
$user_id= $req->input('user_id');
$quantity= $req->input('quantity');
$status= $req->input('status');
$size= $req->input('size');


if($status == 0){

//inventory check
$pro_inv_da= Inventory::wherenull('deleted_at')->where('product_id',$product_id)->where('color_id',$color_id)->first();

// print_r($pro_inv_da); die();

if(!empty($pro_inv_da)){
  $db_quantity=$pro_inv_da->stock;

    if($quantity <= $db_quantity){

//cart table data check
$pro_cart_da= Cart::wherenull('deleted_at')->where('user_id',$user_id)->where('product_id',$product_id)->where('color_id',$color_id)->where('status',$status)->first();

if(empty($pro_cart_da)){

	$productInfo= [

		'product_id' => $product_id,
		'color_id' => $color_id,
		'user_id' => $user_id,
		'quantity' => $quantity,
		'status' => 0,
		// 'product_id' => $decod_product_id,

		'ip' => $req->ip()

	];

$last_id = Cart::create($productInfo);

//total cart product count of user
$pro_cart_count= Cart::wherenull('deleted_at')->where('user_id',$user_id)->count();

//---delete cart from wishlist----

$wishData= Wishlist::wherenull('deleted_at')->where(array('product_id'=>$product_id,'user_id'=>$user_id))->first();
// print_r($wishData);
// exit;
if(!empty($wishData)){
$wishData->delete();
}

  $data['data'] = true;
  $data['cartcount'] = $pro_cart_count;

}else{
	$data['data'] = false;
	$data['data_message'] = 'Product is alredy in your cart.';
}





    }else{
      $data['data'] = false;
      $data['data_message'] = 'Product is out of stock.';
    }

}else{
  $data['data'] = false;
  $data['data_message'] = 'Product is out of stock.';
}


}elseif ($status == 1) {

//customize

	//cart table data check
	$pro_cart_da= Cart::wherenull('deleted_at')->where('user_id',$user_id)->where('product_id',$product_id)->where('stone',$stone)->where('metal',$metal)->where('size',$size)->where('status',$status)->first();

	if(empty($pro_cart_da)){

		$productInfo= [

			'product_id' => $product_id,
			'stone' => $stone,
			'metal' => $metal,
			'size' => $size,
			'user_id' => $user_id,
			'quantity' => $quantity,
			'status' => 1,
			// 'product_id' => $decod_product_id,

			'ip' => $req->ip()

		];

	$last_id = Cart::create($productInfo);

	//total cart product count of user
	$pro_cart_count= Cart::wherenull('deleted_at')->where('user_id',$user_id)->count();


	  $data['data'] = true;
	  $data['cartcount'] = $pro_cart_count;

	}else{
		$data['data'] = false;
		$data['data_message'] = 'Product is alredy in your cart.';
	}

}else {

//engarve

	// cart table data check

	$pro_cart_da= Cart::wherenull('deleted_at')->where('user_id',$user_id)->where('product_id',$product_id)->where('font_size',$font_size)->where('engrave_text',$engrave_text)->where('font_family',$font_family)->where('status',$status)->first();

	if(empty($pro_cart_da)){

		$productInfo= [

			'product_id' => $product_id,
			'font_size' => $font_size,
			'engrave_text' => $engrave_text,
			'font_family' => $font_family,
			'user_id' => $user_id,
			'quantity' => $quantity,
			'status' => 2,
			// 'product_id' => $decod_product_id,

			'ip' => $req->ip()

		];


	$last_id = Cart::create($productInfo);

	//total cart product count of user
	$pro_cart_count= Cart::wherenull('deleted_at')->where('user_id',$user_id)->count();


	  $data['data'] = true;
	  $data['cartcount'] = $pro_cart_count;

	}else{
		$data['data'] = false;
		$data['data_message'] = 'Product is alredy in your cart.';
	}


}

echo json_encode($data);

}


//check data of localstorage

public function check_localcart(Request $req){

	$data['data'] = '';
		$data['data_message'] = '';

	$req->validate([
	'cart_array[]' => 'required',

	]);



						 $cart_array[]=$req->input('cart_array');

						// print_r($cart_array);
						// exit;
						// $h = $cart_array[0][1];
						$h1 =  count($cart_array[0]);
				// print_r($h);
// exit;
// echo  $h1; exit;


$ip = $req->ip();
date_default_timezone_set("Asia/Calcutta");
$cur_date=date("Y-m-d H:i:s");


$last_id = 0;
$res=[];


//local cart product
for ($i=0; $i < $h1; $i++) {

	$v = $cart_array[0][$i];
	// print_r($v); exit;
	$product_id= $v['product_id'];
	$color_id= $v['color_id'];
	$stone= $v['stone'];
	$metal= $v['metal'];
	$font_family= $v['font_family'];
	$font_size= $v['font_size'];
	$engrave_text= $v['engrave_text'];
	$quantity= $v['quantity'];
	$status= $v['status'];


if($status == 0){

//inventory check
$pro_inv_da= Inventory::wherenull('deleted_at')->where('product_id',$product_id)->where('color_id',$color_id)->first();

// print_r($pro_inv_da); die();

if(!empty($pro_inv_da)){
  $db_quantity=$pro_inv_da->stock;

    if($quantity <= $db_quantity){



		}else{

			$user_id= $req->session()->get('user_id');

$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();


			if(!empty($cartdata)){

				$cartdata->delete();

			}else{

			}


		$res[]= $product_id;

		}
	}else{

		$user_id= $req->session()->get('user_id');

$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();


		if(!empty($cartdata)){

			$cartdata->delete();

		}else{

		}

	$res[]= $product_id;

	}


//product check
$product_data_dsa= Product::wherenull('deleted_at')->where('id',$product_id)->where('is_active',1)->where('is_cat_delete',0)->where('is_subcat_delete',0)->first();


        if(!empty($product_data_dsa)){

        }else{
          $user_id= $req->session()->get('user_id');

$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();


          if(!empty($cartdata)){

						$cartdata->delete();

          }else{

          }


        $res[]= $product_id;




        }


//productcolorsize check
$product_type_data_dsa= ProductColorSize::wherenull('deleted_at')->where('product_id',$product_id)->where('color_id',$color_id)->where('is_active',1)->first();


        if(!empty($product_type_data_dsa)){

        }else{
          $user_id= $req->session()->get('user_id');

					$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();

          if(!empty($cartdata)){

            $cartdata->delete();

          }else{

          }


        $res[]= $product_id;




        }



}

if($status == 1){


	//customize product check
	$customize_product = CustomizeProduct::wherenull('deleted_at')->where('is_active', 1)->where('id',$product_id)->first();


	        if(!empty($customize_product)){

	        }else{
	          $user_id= $req->session()->get('user_id');

	$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();


	          if(!empty($cartdata)){

							$cartdata->delete();

	          }else{

	          }


	        $res[]= $product_id;




	        }


	//customize productMetalstone check
	$product_stone_data_dsa= CustomizeProductStone::wherenull('deleted_at')->where('product_id',$product_id)->where('name',$stone)->where('cust_metal_id',$metal)->where('is_active',1)->first();


	        if(!empty($product_stone_data_dsa)){

	        }else{
	          $user_id= $req->session()->get('user_id');

						$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();

	          if(!empty($cartdata)){

	            $cartdata->delete();

	          }else{

	          }


	        $res[]= $product_id;




	        }


	//customize product Metal check
		$metal_da= CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $metal)->first();


			        if(!empty($metal_da)){

			        }else{
			          $user_id= $req->session()->get('user_id');

								$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();

			          if(!empty($cartdata)){

			            $cartdata->delete();

			          }else{

			          }


			        $res[]= $product_id;




			        }


}

if($status == 2){

	//customize engrave product check
	$engrave_product = EngraveProduct::wherenull('deleted_at')->where('is_active', 1)->where('id',$product_id)->first();


	        if(!empty($engrave_product)){

	        }else{
	          $user_id= $req->session()->get('user_id');

	$cartdata= Cart::wherenull('deleted_at')->where('product_id',$product_id)->where('user_id',$user_id)->where('status',$status)->first();


	          if(!empty($cartdata)){

							$cartdata->delete();

	          }else{

	          }


	        $res[]= $product_id;




	        }


}


}

			echo json_encode($res);
				exit;






}






//check data of Tbl_cart

public function check_localcart_frm_tbl(Request $req){

	$data['data'] = '';
		$data['data_message'] = '';

	$req->validate([
	'user_id' => 'required',

	]);



						  $user_ids =$req->input('user_id');



$ip = $req->ip();
date_default_timezone_set("Asia/Calcutta");
$cur_date=date("Y-m-d H:i:s");



//cart table data delete if product out of stock or deleted
// $user_id= $req->session()->get('user_id');

$carttdata= Cart::wherenull('deleted_at')->where('user_id',$user_ids)->get();

// print_r($carttdata); exit;
if(!empty($carttdata)){
foreach ($carttdata as $cartt) {


if($cartt->status == 0){


	//inventory check
	$pro_inv_da= Inventory::wherenull('deleted_at')->where('product_id',$cartt->product_id)->where('color_id',$cartt->color_id)->first();

	// print_r($pro_inv_da); die();

	if(!empty($pro_inv_da)){
		$db_quantity=$pro_inv_da->stock;

			if($cartt->quantity <= $db_quantity){



		 }else{

			 $cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
			 $cartdata->delete();

		 }

	 }else{

		 $cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
		 $cartdata->delete();

	 }


	//product check
	$product_data_dsa= Product::wherenull('deleted_at')->where('id',$cartt->product_id)->where('is_active',1)->where('is_cat_delete',0)->where('is_subcat_delete',0)->first();


								if(!empty($product_data_dsa)){

								}else{

									$cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
								 $cartdata->delete();

								}


	//productcolorsize check
	$product_type_data_dsa= ProductColorSize::wherenull('deleted_at')->where('product_id',$cartt->product_id)->where('color_id',$cartt->color_id)->where('is_active',1)->first();


	        if(!empty($product_type_data_dsa)){

	        }else{
						$cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
						$cartdata->delete();
	       }


 //product color check for table cart
 	 $color_data_dsa= Color::wherenull('deleted_at')->where('is_active',1)->where('id',$cartt->color_id)->first();


 				         if(!empty($color_data_dsa)){

 				         }else{

 									 $cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
 			 						$cartdata->delete();

 				         }


}

if($cartt->status == 1){


		//product check
		$product_data_dsa= CustomizeProduct::wherenull('deleted_at')->where('id',$cartt->product_id)->where('is_active',1)->first();


									if(!empty($product_data_dsa)){

									}else{

										$cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
									 $cartdata->delete();

									}


		//productmetalstone check
		$product_type_data_dsa= CustomizeProductStone::wherenull('deleted_at')->where('product_id',$cartt->product_id)->where('name',$cartt->stone)->where('cust_metal_id',$cartt->metal)->where('is_active',1)->first();


		        if(!empty($product_type_data_dsa)){

		        }else{
							$cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
							$cartdata->delete();
		       }


	 //product metal check for table cart
	 	 $metal_data_dsa= CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $cartt->metal)->first();


	 				         if(!empty($metal_data_dsa)){

	 				         }else{

	 									 $cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
	 			 						$cartdata->delete();

	 				         }

}

if($cartt->status == 2){

	//product check
	$product_data_dsa= EngraveProduct::wherenull('deleted_at')->where('is_active', 1)->where('id',$cartt->product_id)->first();


								if(!empty($product_data_dsa)){

								}else{

									$cartdata= Cart::wherenull('deleted_at')->where('id',$cartt->id)->first();
								 $cartdata->delete();

								}

}




 }
}

$res= 9;

			echo json_encode($res);
				exit;






}





//login user


public function login_process(Request $req)
 {
   log::debug('yes login');
if(empty($req->session()->has('user_data'))){

		 log::debug( 'yes Id');
	 $req->validate([
	 'email' => 'required|email',
	 'password' => 'required',

	 ]);


$email= $req->input('email');
$password= $req->input('password');
$pass= md5($password);


$user_da= User::wherenull('deleted_at')->where('email',$email)->first();

log::debug($user_da);
if(!empty($user_da)){
log::debug("user_da");
$db_name= $user_da->name;
$db_email= $user_da->email;
$db_password= $user_da->password;



  if($db_password == $pass){
log::debug("match");
$db_contact= $user_da->contact;
$db_id= $user_da->id;



$req->session()->put('user_data', 1);
$req->session()->put('user_name', $db_name);
$req->session()->put('user_email', $db_email);
$req->session()->put('user_contact', $db_contact);
$req->session()->put('user_id', $db_id);


return Redirect('/')->with('status', 'Login Successfully.');



  }else{
log::debug("Invalid Password");
     return Redirect('/')->with('status-error', 'Invalid Password!');
  }

}else{
  log::debug("Invalid Credentials");
   return Redirect('/')->with('status-error', 'Invalid Credentials!');
}




}else{
  log::debug("Invalid out");
  return Redirect('/');
}


}


public function add_to_cart_local($id,Request $req){
 $product_id=base64_decode($id);
 // print_r(session('cart_data'));
 // exit;
// $req->session()->flush();
 $quantity = $req->input('quantity');
if(empty($quantity)){
$quantity=1;
}

	$color_data= ProductColorSize::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('product_id'=> $product_id,'color_id'=> $color_data->color_id,'is_active'=>1))->first();

// echo $inventory_data->quantity;
// exit;
$color_id=$color_data->color_id;

	if($inventory_data->stock >= $quantity){


	$cart_data= array(

		'product_id' => $product_id,
		'color_id' => $color_id,
		'quantity' => $quantity,
		'status' => 0,
		'ip' => $req->ip()


	);
// echo $product_id;
$cart_info = session('cart_data');
$i=0;
if(!empty($cart_info)){
foreach ($cart_info as $value) {

if($product_id == $value['product_id'] && $color_id == $value['color_id'])
{
  $i=1;
}

}
}
// echo $i;
if($i==0){
  $req->session()->push('cart_data', $cart_data);

// print_r(session('cart_data'));
// exit;
  	if(!empty(session('cart_data'))){

      return redirect()->back()->with('status', 'Item added in cart');

  }else{

    return redirect()->back()->with('status-error', 'Some error occured');


  }

}else{

  return redirect()->back()->with('status-error', 'Product is already in cart');

}


}
else{

  return redirect()->back()->with('status-error', 'Product is out of stock');


}
// }



}

public function add_to_cart_local2(Request $req){
// $req->session()->flush();
$req->validate([

             				// // 'payment_type' => 'required',
             				// 'product_id' => 'required',
             				// 'color_id' => 'required',
             				// 'quantity' => 'required',

             			]);

             			$product_id = $req->input('product_id');
             			$color_id = $req->input('color_id');
             			$stone_id = $req->input('stone_id');
             			$metal_id = $req->input('metal_id');
             			$text = $req->input('text');
             			$f_size = $req->input('f_size');
             			$f_family = $req->input('f_family');
             			$quantity = $req->input('quantity');
             			$status = $req->input('status');
             			$size = $req->input('size');

// echo json_encode($color_id);
// $exit;

if($status==0){

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('product_id'=> $product_id,'color_id'=>$color_id,'is_active'=>1))->first();

if(!empty($inventory_data)){

	if($inventory_data->stock >= $quantity){


	$cart_data= array(

		'product_id' => $product_id,
		'color_id' => $color_id,
		'quantity' => $quantity,
		'status' => 0,
		'ip' => $req->ip()


	);


$cart_info = session('cart_data');


$i=0;
if(!empty($cart_info)){
foreach ($cart_info as $value) {
if($value['status']==0){
if($product_id == $value['product_id'] && $color_id == $value['color_id'])
{
  $i=1;
}

}
}
}
// echo $i;
if($i==0){
  $req->session()->push('cart_data', $cart_data);


  	// if(!empty(session('cart_data'))){

			// session('status', 'Item added in cart');
			// $data="Item added in cart";
			$data="Item added in cart";
			echo json_encode($data);
  // }else{
	// 	session('status-error', 'Some error occured');
	// 	$data="Some error occured";
	// $data="false";
	// echo json_encode($data);
	//
  // }

}else{
	$data="Product is already in cart";
	echo json_encode($data);

}
}
else{
	$data="Product is out of stock";
	echo json_encode($data);


}
}
else{
	$data="Product is out of stock";
	echo json_encode($data);


}
// }

}
if($status==1){


		$cart_data= array(

			'product_id' => $product_id,
			'stone' => $stone_id,
			'metal' => $metal_id,
			'size' => $size,
			'quantity' => $quantity,
			'status' => $status,
			'ip' => $req->ip()


		);


	$cart_info = session('cart_data');


	$i=0;
	if(!empty($cart_info)){
	foreach ($cart_info as $value) {
if($value['status']==1){
	if($product_id == $value['product_id'] && $stone_id == $value['stone'] && $metal_id == $value['metal'])
	{
	  $i=1;
	}

	}
}
	}
	// echo $i;
	if($i==0){
	  $req->session()->push('cart_data', $cart_data);


	  	// if(!empty(session('cart_data'))){

				// session('status', 'Item added in cart');
				// $data="Item added in cart";
				$data="Item added in cart";
				echo json_encode($data);
	  // }else{
		// 	session('status-error', 'Some error occured');
		// 	$data="Some error occured";
		// $data="false";
		// echo json_encode($data);
		//
	  // }

	}else{
		$data="Product is already in cart";
		echo json_encode($data);

	}
	}
	if($status==2){


			$cart_data= array(

				'product_id' => $product_id,
				'engrave_text' => $text,
				'font_size' => $f_size,
				'font_family' => $f_family,
				'quantity' => $quantity,
				'status' => $status,
				'ip' => $req->ip()


			);


		$cart_info = session('cart_data');


		$i=0;
		if(!empty($cart_info)){
		foreach ($cart_info as $value) {
if($value['status']==2){
		if($product_id == $value['product_id'] && $text == $value['engrave_text'] && $f_size == $value['f_size'] && $font_family == $value['font_family'])
		{
		  $i=1;
		}

		}
	}
		}
		// echo $i;
		if($i==0){
		  $req->session()->push('cart_data', $cart_data);


		  	// if(!empty(session('cart_data'))){

					// session('status', 'Item added in cart');
					// $data="Item added in cart";
					$data="Item added in cart";
					echo json_encode($data);
		  // }else{
			// 	session('status-error', 'Some error occured');
			// 	$data="Some error occured";
			// $data="false";
			// echo json_encode($data);
			//
		  // }

		}else{
			$data="Product is already in cart";
			echo json_encode($data);

		}
		}


}



//----delete product from cart session------

public function delete_product_cart($idd,$idd2,Request $req){


 $pro_id=base64_decode($idd);
 $color_id=base64_decode($idd2);




$cart_data = session('cart_data');

// echo $pro_id;
// echo $color_id;
// print_r($cart_data);
// exit;
// $i=1;
foreach ($cart_data as $value) {

if($value['status']==0){
  if($pro_id!=$value['product_id'] && $color_id!=$value['color_id']) {
// $i++;
  $new_cart = [
   'product_id'=> $value['product_id'],
   'color_id'=> $value['color_id'],
   'quantity'=> $value['quantity'],
   'status'=> $value['status']
  ];
  session()->push('cart_data2', $new_cart);


  }
   }

	 if($value['status']==1){
	   $new_cart = [
	    'product_id'=> $value['product_id'],
			'metal'=> $value['metal'],
			'stone'=> $value['stone'],
	    'quantity'=> $value['quantity'],
	    'status'=> $value['status']
	   ];
	   session()->push('cart_data2', $new_cart);


	    }
	 	 if($value['status']==2){

	 	   $new_cart = [
	 	    'product_id'=> $value['product_id'],
	 	    'engrave_text'=> $value['engrave_text'],
	 	    'font_family'=> $value['font_family'],
	 	    'font_size'=> $value['font_size'],
	 	    'quantity'=> $value['quantity'],
	 	    'status'=> $value['status']
	 	   ];
	 	   session()->push('cart_data2', $new_cart);

	 	    }

}

// print_r(session('cart_data2'));


 session()->forget('cart_data');

  $cart_data2 =  session('cart_data2');

  if(!empty($cart_data2)){

  foreach ($cart_data2 as $value2) {

  session()->push('cart_data', $value2);
  }
// print_r(session('cart_data'));
// exit;


  session()->forget('cart_data2');

  }




  return redirect()->back()->with('status', 'Successfully Deleted');


}
//----delete custom product from cart session ------

public function delete_sc_custom(Request $req){


	             			$pro_id = $req->input('product_id');
	             			$metal = $req->input('metal');
	             			$stone = $req->input('stone');




$cart_data = session('cart_data');

foreach ($cart_data as $value) {

	if($value['status']==0){

	  $new_cart = [
	   'product_id'=> $value['product_id'],
	   'color_id'=> $value['color_id'],
	   'quantity'=> $value['quantity'],
		 'status'=> $value['status']
	  ];
	  session()->push('cart_data2', $new_cart);



	   }



if($value['status']==1){
  if($pro_id!=$value['product_id'] && $metal!=$value['metal'] && $stone!=$value['stone']) {

  $new_cart = [
   'product_id'=> $value['product_id'],
   'metal'=> $value['metal'],
   'stone'=> $value['stone'],
   'quantity'=> $value['quantity'],
   'status'=> $value['status']
  ];
  session()->push('cart_data2', $new_cart);


  }
   }
	 if($value['status']==2){

	   $new_cart = [
	    'product_id'=> $value['product_id'],
	    'engrave_text'=> $value['engrave_text'],
	    'font_family'=> $value['font_family'],
	    'font_size'=> $value['font_size'],
	    'quantity'=> $value['quantity'],
	    'status'=> $value['status']
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


	$data['data'] = true;

echo json_encode($data);


}
//----delete custom product from cart session ------

public function delete_sc_ecustom(Request $req){



	             			$pro_id = $req->input('product_id');
	             			$engrave_text = $req->input('engrave_text');
	             			$font_family = $req->input('font_family');
	             			$font_size = $req->input('font_size');



$cart_data = session('cart_data');

foreach ($cart_data as $value) {

	if($value['status']==0){

		$new_cart = [
		 'product_id'=> $value['product_id'],
		 'color_id'=> $value['color_id'],
		 'quantity'=> $value['quantity'],
		 'status'=> $value['status']
		];
		session()->push('cart_data2', $new_cart);



		 }


	if($value['status']==1){

	$new_cart = [
	 'product_id'=> $value['product_id'],
	 'metal'=> $value['metal'],
	 'stone'=> $value['stone'],
	 'quantity'=> $value['quantity'],
	 'status'=> $value['status']
	];
	session()->push('cart_data2', $new_cart);


	 }

if($value['status']==2){


  if($pro_id==$value['product_id'] && $engrave_text==$value['engrave_text'] && $font_family==$value['font_family'] && $font_size==$value['font_size']) {



  }
	else{
		$new_cart = [
		 'product_id'=> $value['product_id'],
		 'engrave_text'=> $value['engrave_text'],
		 'font_family'=> $value['font_family'],
		 'font_size'=> $value['font_size'],
		 'quantity'=> $value['quantity'],
		 'status'=> $value['status']
		];
		session()->push('cart_data2', $new_cart);
	}
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


	$data['data'] = true;

echo json_encode($data);


}


//------update cart---------

public function update_cart(Request $req){


$req->validate([

	'product_id' => 'required',
	'color_id' => 'required',
	'quantity' => 'required'

]);

$product_id= $req->input('product_id');
$color_id= $req->input('color_id');
$quantity= $req->input('quantity');

// $color_data= ProductColorSize::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();
//
// $inventory_data= Inventory::wherenull('deleted_at')->where(array('product_id'=> $product_id,'color_id'=> $color_id,'is_active'=>1))->first();
//
// // echo $inventory_data->quantity;
// // exit;
//
// if($inventory_data->stock >= $quantity){


  $cart_data = session('cart_data');
// print_r($cart_data);
// exit;
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
if($value['status']==0)	{
   if($product_id!=$value['product_id'] && $color_id!=$value['color_id']) {
// echo"hi";
// exit;

  $new_cart = [
    'product_id'=> $value['product_id'],
    'color_id'=> $value['color_id'],
    'quantity'=> $value['quantity'],
    'status'=> $value['status']
  ];
  session()->push('cart_data2', $new_cart);

$i++;
}
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
        'color_id' => $color_id,
        'quantity' => $quantity,
        'status' => 0



      ];
// session()->flush();
      $update=session()->push('cart_data', $cart_data);
      $data['data'] = true;
			// Session::flash('status', 'This is a message!');
// }else{
// 	$data['data'] = true;
// 	// Session::flash('status-error', 'Product is out of stock');
// }

echo json_encode($data);
}


//logout function
public function logout(Request $req){

    if(!empty($req->session()->has('user_data'))){

    $req->session()->forget('user_data');
    $req->session()->forget('user_name');
    $req->session()->forget('user_email');
    $req->session()->forget('user_contact');
    $req->session()->forget('user_id');


  	 return Redirect('/')->with('status', 'Logout Successfully.');

    }
    else{
      return Redirect('/');
    }

  }



 }
