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
use App\adminmodel\CustomizeCategory;
use App\adminmodel\CustomizeProduct;
use App\adminmodel\CustomizeMetalColor;
use App\adminmodel\CustomizeProductStone;
use App\adminmodel\EngraveCategory;
use App\adminmodel\EngraveProduct;
use App\adminmodel\Inventory;
use App\adminmodel\Cart;
use App\adminmodel\Forgot_pass;

use App\frontendmodel\User;
// use App\adminmodel\Cart;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class LoginController extends Controller
{



//get login page
		public function open_login(Request $req,$x=''){

		log::debug('open_login');
      if(empty($req->session()->has('user_data'))){
				if(!empty($x)){
					$req->session()->put('lcart', '1');
				}else{
					$req->session()->forget('lcart');
				}
  $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
            return view('frontend/login_register', ['category_data'=>$categories ]);

      }else{
        return Redirect('/');
      }
    }

//get forgoot password page
		public function forgot_password(Request $req){

      if(empty($req->session()->has('user_data'))){

  $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
            return view('frontend/forgot_password', ['category_data'=>$categories ]);

      }else{
        return Redirect('/');
      }
    }

		function generateRandomString($length = 20) {
			$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ%$@*!';
			$charactersLength = strlen($characters);
			$randomString = '';
			for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
			}
			return $randomString;
		}
//get form submit of forgot password  page
		public function form_submit_forgotpassword(Request $req){

      if(empty($req->session()->has('user_data'))){
					$req->validate([
             				'reset_email' => 'required',
             			]);

             			$email = $req->input('reset_email');
									$userData = User::wherenull('deleted_at')->where('email', $email)->first();
if(!empty($userData)){
							$user_id=$userData->id;
							$user_name=$userData->name;
							$ip = $req->ip();
							$txn_id=  $this->generateRandomString(6);

						$temp_userpInfo= [
							'user_id' =>$user_id,
						  'txn_id' =>$txn_id,
						   'status' =>	0,
						   'ip' => $req->ip(),

						    ];

						     $user=Forgot_pass::create($temp_userpInfo)->toArray();
								 $link = base_path."forget_password_reset/".$txn_id;
				 			 $forgot_password_data = ['user_name'=>$user_name,
				 		 		'link'=>$link];
								//-------email--------



																// $config = Array(
																// 						 'protocol' => 'ssmtp',
																// 						 // 'smtp_host' => 'mail.fineoutput.co.in',
																// 						 'smtp_host' => SMTP_HOST,
																// 						 'smtp_port' => SMTP_PORT,
																// 						 // 'smtp_user' => 'info@fineoutput.co.in', // change it to yours
																// 						 // 'smtp_pass' => 'info@fineoutput2019', // change it to yours
																// 						 'smtp_user' => USER_NAME, // change it to yours
																// 						 'smtp_pass' => PASSWORD, // change it to yours
																// 						 'mailtype' => 'html',
																// 						 'charset' => 'iso-8859-1',
																// 						 'wordwrap' => TRUE
																// 						 );

																					$to=$email;

// print_r($forgot_password_data['user_name']);
// exit;
																						$message = view('email/forgetpassword',['forgot_password_data'=>$forgot_password_data]);
																						echo $message;
												 		 							// $this->load->library('email', $config);
												 		 							// $this->email->set_newline("");
												 		 							// // $this->email->from('info@fineoutput.co.in'); // change it to yours
												 		 							// $this->email->from(EMAIL); // change it to yours
												 		 							// $this->email->to($to);// change it to yours
												 		 							// $this->email->subject('Reset Forgot Password');
												 		 							// $this->email->message($message);
												 		 							// if($this->email->send()){
												 		 							// //  echo 'Email sent.';
												 		 							// }else{
												 		 							// // show_error($this->email->print_debugger());
												 		 							// }

																					// $this->session->set_flashdata('smessage','Email send successfully');
																					// redirect($_SERVER['HTTP_REFERER']);

}else{
return redirect()->back()->with('status-error', 'Email is not exist');

}
      }else{
        return Redirect('/');
      }
    }



		//---forget-password-reset-----
			public function forget_password_reset(Request $req, $t){
      if(empty($req->session()->has('user_data'))){
				$id=$t;
// echo $id;
// exit;
$u1 = Forgot_pass::where('txn_id', $id)->first();
// print_r($u1);
// exit;
$st=$u1->status;


				if($st==0){
$data_update =[
                'status'=>1

              ];

              $updated_last_id = Forgot_pass::where('status', $u1->status)->first();
              $updated_last_id->update($data_update);

			$auth=$id;

			  $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

return view('frontend/reset_password',['Category_data' => $categories, 'auth' => $auth]);

				}else{
return redirect()->back()->with('status-error', 'Link already used');
				}


				      }else{
				        return Redirect('/');
				      }

			}
			public function update_password(Request $req,$t){
      if(empty($req->session()->has('user_data'))){
			$txn_id=$t;

			$u2 = Forgot_pass::where('txn_id', $txn_id)->first();

												$ui=$u2->user_id;
												$data['auth']=$txn_id;
$req->validate([

             				'reset_password' => 'required',
             			]);

             			$reset_password = $req->input('reset_password');
		                $ip = $req->ip();

$user = User::wherenull('deleted_at')->where('id', $ui)->first();

										$rs=md5($reset_password);

	$passwordupdate =[
	                'password'=>$rs,

	              ];

	              $updated_last_id = User::where('id', $user->id)->first();
	              $updated_last_id->update($passwordupdate);

									  if(!empty($updated_last_id)){

return Redirect('/open_login')->with('status', 'Password successfully reset');

 }

       }else{
         return Redirect('/');
       }
}

// register_process form user process

public function register_process(Request $req)
 {
if(empty($req->session()->has('user_data'))){

		 log::debug( 'yes Id');
	 $req->validate([
	 'name' => 'required',
	 'email' => 'required|email|unique:tbl_users,email',
	 'password' => 'required',
	 // 'contact' => 'required'

	 ]);

$name= $req->input('name');
$email= $req->input('email');
$contact= $req->input('contact');
$password= $req->input('password');
$pass= md5($password);

 $userInfo= [

	 'name' => $req->input('name'),
	 'email' => $req->input('email'),
	 'contact' => $req->input('contact'),
	 'password' => $pass,

	 'ip' => $req->ip()

 ];




	 $last_id = User::create($userInfo);

   // if($last_id->id !=0 ){


     $req->session()->put('user_data', 1);
     $req->session()->put('user_name', $name);
     $req->session()->put('user_email', $email);
     $req->session()->put('user_contact', $contact);
     $req->session()->put('user_id', $last_id->id);

		 $db_id = $last_id->id;

		 $cart_data = session("cart_data");

		 if(!empty($cart_data)){

 		foreach ($cart_data as $cart) {

 		if($cart['status']==0){

 		$product_id = $cart['product_id'];
 		$color_id = $cart['color_id'];
 		$quantity = $cart['quantity'];
 		$status = $cart['status'];


 		$inventory_da= Inventory::where(array('product_id'=>$product_id,'color_id'=>$color_id))->first();

 		if(!empty($inventory_da)){

 		if($inventory_da->stock >=$quantity){

 		$cart_da= Cart::where(array('user_id'=>$db_id,'product_id'=>$product_id,'color_id'=>$color_id))->first();

 		if(empty($cart_da)){

 			 $cartInfo= [

 				 'user_id' => $db_id,
 				 'product_id' => $product_id,
 				 'color_id' => $color_id,
 				 'quantity' => $quantity,
 				 'status' => $status,
 				 'ip' => $req->ip()

 			 ];
 		// print_r($cartInfo);
 		// exit;
 				 $last_id = cart::create($cartInfo);

 		}

 		}// end of out of stock
 		}//end inventory check
 		}
 		if($cart['status']==1){

 		$product_id = $cart['product_id'];
 		$stone_id = $cart['stone'];
 		$metal_id = $cart['metal'];
 		$quantity = $cart['quantity'];
 		$status = $cart['status'];



 		$cart_da= Cart::where(array('user_id'=>$db_id,'product_id'=>$product_id,'stone'=>$stone_id,'metal'=>$metal_id))->first();

 		if(empty($cart_da)){

 			 $cartInfo= [

 				 'user_id' => $db_id,
 				 'product_id' => $product_id,
 				 'stone' => $stone_id,
 				 'metal' => $metal_id,
 				 'quantity' => $quantity,
 				 'status' => $status,
 				 'ip' => $req->ip()

 			 ];
 		// print_r($cartInfo);
 		// exit;
 				 $last_id = cart::create($cartInfo);

 		}

 		}
 		if($cart['status']==2){

 		$product_id = $cart['product_id'];
 		$text = $cart['engrave_text'];
 		$f_size = $cart['font_size'];
 		$f_family = $cart['font_family'];
 		$quantity = $cart['quantity'];
 		$status = $cart['status'];



 		$cart_da= Cart::where(array('user_id'=>$db_id,'product_id'=>$product_id,'engrave_text'=>$text,'font_size'=>$f_size,'font_family'=>$f_family))->first();

 		if(empty($cart_da)){

 			 $cartInfo= [

 				 'user_id' => $db_id,
 				 'product_id' => $product_id,
 				 'engrave_text' => $text,
 				 'font_size' => $f_size,
 				 'font_family' => $f_family,
 				 'quantity' => $quantity,
 				 'status' => $status,
 				 'ip' => $req->ip()

 			 ];
 		// print_r($cartInfo);
 		// exit;
 				 $last_id = cart::create($cartInfo);

 		}

 		}
 		}//end of cart foreach
 		}//end of cart empty
		session()->forget('cart_data');
if(empty($req->session()->has('lcart'))){
	 return Redirect('/')->with('status', 'Signed Up Successfully.');
 }else{
	 $req->session()->forget('lcart');
	 return Redirect('view_cart')->with('status', 'Signed Up Successfully.');
 }
   // }

}else{
  return Redirect('/');
}

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

$cart_data = session("cart_data");

// print_r($cart_data);
// exit;

if(!empty($cart_data)){

foreach ($cart_data as $cart) {

if($cart['status']==0){

$product_id = $cart['product_id'];
$color_id = $cart['color_id'];
$quantity = $cart['quantity'];
$status = $cart['status'];


$inventory_da= Inventory::where(array('product_id'=>$product_id,'color_id'=>$color_id))->first();

if(!empty($inventory_da)){

if($inventory_da->stock >=$quantity){

$cart_da= Cart::where(array('user_id'=>$db_id,'product_id'=>$product_id,'color_id'=>$color_id))->first();

if(empty($cart_da)){

	 $cartInfo= [

		 'user_id' => $db_id,
		 'product_id' => $product_id,
		 'color_id' => $color_id,
		 'quantity' => $quantity,
		 'status' => $status,
		 'ip' => $req->ip()

	 ];
// print_r($cartInfo);
// exit;
		 $last_id = cart::create($cartInfo);

}

}// end of out of stock
}//end inventory check
}
if($cart['status']==1){

$product_id = $cart['product_id'];
$stone_id = $cart['stone'];
$metal_id = $cart['metal'];
$size = $cart['size'];
$quantity = $cart['quantity'];
$status = $cart['status'];



$cart_da= Cart::where(array('user_id'=>$db_id,'product_id'=>$product_id,'stone'=>$stone_id,'metal'=>$metal_id,'size'=>$size))->first();
// print_r($cart_da);
// exit;
if(empty($cart_da)){

	 $cartInfo= [

		 'user_id' => $db_id,
		 'product_id' => $product_id,
		 'stone' => $stone_id,
		 'metal' => $metal_id,
		 'size' => $size,
		 'quantity' => $quantity,
		 'status' => $status,
		 'ip' => $req->ip()

	 ];
// print_r($cartInfo);
// exit;
		 $last_id = cart::create($cartInfo);

}

}
if($cart['status']==2){

$product_id = $cart['product_id'];
$text = $cart['engrave_text'];
$f_size = $cart['font_size'];
$f_family = $cart['font_family'];
$quantity = $cart['quantity'];
$status = $cart['status'];



$cart_da= Cart::where(array('user_id'=>$db_id,'product_id'=>$product_id,'engrave_text'=>$text,'font_size'=>$f_size,'font_family'=>$f_family))->first();

if(empty($cart_da)){

	 $cartInfo= [

		 'user_id' => $db_id,
		 'product_id' => $product_id,
		 'engrave_text' => $text,
		 'font_size' => $f_size,
		 'font_family' => $f_family,
		 'quantity' => $quantity,
		 'status' => $status,
		 'ip' => $req->ip()

	 ];
// print_r($cartInfo);
// exit;
		 $last_id = cart::create($cartInfo);

}

}
}//end of cart foreach
}//end of cart empty

if(!empty($last_id)){
session()->forget('cart_data');
}
if(empty($req->session()->has('lcart'))){
	 return Redirect('/')->with('status', 'Logged in Successfully.');
 }else{
	 $req->session()->forget('lcart');
	 return Redirect('view_cart')->with('status', 'Logged in Successfully.');
 }



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



//logout function
public function logout(Request $req){

    if(!empty($req->session()->has('user_data'))){

    $req->session()->forget('user_data');
    $req->session()->forget('user_name');
    $req->session()->forget('user_email');
    $req->session()->forget('user_contact');
    $req->session()->forget('user_id');


  	 return Redirect('/')->with('status', 'Logged Out Successfully.');

    }
    else{
      return Redirect('/');
    }

  }


//View User Profile
  public function user_profile(Request $req){

if(!empty($req->session()->has('user_data'))){

$user_id= $req->session()->get('user_id');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
log::debug($categories);

$userData = User::wherenull('deleted_at')->where('id', $user_id)->first();

      return view('frontend/my_profile', ['category_data'=>$categories, 'userData'=>$userData]);


    }else{
      return Redirect('/');
    }

  }



//View Edit User Profile
    public function edit_user_profile(Request $req){

  if(!empty($req->session()->has('user_data'))){

  $user_id= $req->session()->get('user_id');

  $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
  log::debug($categories);

  $userData = User::wherenull('deleted_at')->where('id', $user_id)->first();

        return view('frontend/edit_profile', ['category_data'=>$categories, 'userData'=>$userData]);


      }else{
        return Redirect('/');
      }

    }


//Edit User Profile page

public function edit_user_profile_process(Request $req)
 {
if(!empty($req->session()->has('user_data'))){

		 log::debug( 'yes Id');
	 $req->validate([
	 'name' => 'required',
	 'email' => 'email',
	 // 'password' => 'required',
	 // 'contact' => 'required'

	 ]);

$user_id= $req->session()->get('user_id');
$name= $req->input('name');
$email= $req->input('email');
$contact= $req->input('phone');
$password= $req->input('password');
$pass= md5($password);

$ip= $req->ip();

if(!empty($password)){
  // echo "yes"; die();
   $userInfo= [
  	 'name' => $name,
  	 'email' => $email,
  	 'contact' => $contact,
  	 'password' => $pass

   ];

}else{
  // echo "no"; die();
    $userInfo= [
   	 'name' => $name,
   	 'email' => $email,
   	 'contact' => $contact

    ];

}


 $userData = User::wherenull('deleted_at')-> where('id', $user_id)->first();

if(!empty($userData)){

  if($userData->email == $email){

  $userData->update($userInfo);

  }else{

     $userEmailData = User::wherenull('deleted_at')-> where('email', $email)->first();

     if(empty($userEmailData)){

       $userData->update($userInfo);



     }else{
        return Redirect::back()->with('status-error', 'Email Is Already Taken!');
     }

  }

 return Redirect('/user_profile')->with('status', 'Profile Updated Successfully.');

}



}else{
  return Redirect('/');
}

}


 }
