<?php

namespace App\Http\Controllers;
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
use App\frontendmodel\User;
use App\frontendmodel\Cart;
use App\frontendmodel\Order1;
use App\frontendmodel\Order2;
use App\frontendmodel\Address;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class OrderController extends Controller
{


  //new_orders method
  public function new_orders(Request $req){

if(!empty($req->session()->has('admin_data'))){

  $orders_data= Order1::wherenull('deleted_at')->where('order_status', 1 )->orWhere('order_status',2)->orderBy("id", "desc")->get();

  $page_title = ' New Orders';

  	return view('admin/orders/view_orders',['page_title' => $page_title,  'orders_data' => $orders_data]);

  }else{
   return view('admin/login/index');
  }

  }

  //dispatched_orders method

  public function dispatched_orders(Request $req){


  if(!empty($req->session()->has('admin_data'))){

    $orders_data= Order1::wherenull('deleted_at')->where('order_status', 3)->orderBy("id", "desc")->get();

    $page_title = ' Dispatched Orders';

    	return view('admin/orders/view_orders',['page_title' => $page_title,  'orders_data' => $orders_data]);

    }else{
     return view('admin/login/index');
    }


  }

  //completed_orders method

  public function completed_orders(Request $req){

  if(!empty($req->session()->has('admin_data'))){

    $orders_data= Order1::wherenull('deleted_at')->where('order_status', 4)->orderBy("id", "desc")->get();

    $page_title = ' Completed Orders';

      return view('admin/orders/view_orders',['page_title' => $page_title,  'orders_data' => $orders_data]);

    }else{
     return view('admin/login/index');
    }

  }


  //rejected_orders method

  public function rejected_orders(Request $req){

  if(!empty($req->session()->has('admin_data'))){

    $orders_data= Order1::wherenull('deleted_at')->where('order_status', 5)->orderBy("id", "desc")->get();

    $page_title = ' Rejected Orders';

      return view('admin/orders/view_orders',['page_title' => $page_title,  'orders_data' => $orders_data]);

    }else{
     return view('admin/login/index');
    }


  }


  //view orders

  public function view_orders(Request $req){


  if(!empty($req->session()->has('admin_data'))){

    $orders_data= Order1::wherenull('deleted_at')->orderBy("id", "desc")->get();

    $page_title = ' All Orders';

      return view('admin/orders/view_orders',['page_title' => $page_title,  'orders_data' => $orders_data]);

    }else{
     return view('admin/login/index');
    }


  }

  public function updateordersStatus($idd,$t,Request $req){

  if(!empty($req->session()->has('admin_data'))){

  $id=base64_decode($idd);
  $typ = base64_decode($t);


  date_default_timezone_set("Asia/Calcutta");
  $cur_date=date("Y-m-d H:i:s");


  $data_updates_data= [
    'order_status'=>$typ
  ];


$d11= Order1::wherenull('deleted_at')->where('id', $id)->first();
if(!empty($d11)){
  $d11->update($data_updates_data);
}

$userData = user::wherenull('deleted_at')->where('id', $d11->user_id)->first();
// print_r($userData);
// exit;
// if(!empty($userData->email)){

$user_data = ['name'=>$userData->name,'order1_id'=>$id];
$user_email= $userData->email;
// print_r($user_data);
// exit;
////-----email for order accepted----

if($typ==2){

  $message="Order has been accepted of amount:- $".$d11->total_amount." and order id:- ".$id." ";
                $data['name'] = $userData->name;
                $data['heading'] = "Your order has been accepted";
                $data['body'] = $message;

                Mail::send('email/mail', $data, function ($message) use ($user_email) {
                    $message->to($user_email)->subject('Order has been Accepted');
                    $message->from(EMAIL, 'Gemx Jewellery');
                });


}
////-----email for order Dispatched----

if($typ==3){

  $message="Order has been dispatched of amount:- $".$d11->total_amount." and order id:- ".$id." ";
                $data['name'] = $userData->name;
                $data['heading'] = "Your order has been dispatched";
                $data['body'] = $message;

                Mail::send('email/mail', $data, function ($message)  use ($user_email) {
                    $message->to($user_email)->subject('Order has been Dispatched');
                    $message->from(EMAIL, 'Gemx Jewellery');
                });


}
////-----email for order Delivered----

if($typ==4){
  $message="Order has been Delivered of amount:- $".$d11->total_amount." and order id:- ".$id." ";
                $data['name'] = $userData->name;
                $data['heading'] = "Your order has been Delivered";
                $data['body'] = $message;

                Mail::send('email/mail', $data, function ($message)  use ($user_email) {
                    $message->to($user_email)->subject('Order has been Delivered');
                    $message->from(EMAIL, 'Gemx Jewellery');
                });

}
////-----email for order Rejected----

if($typ==5){

    $d1= Order2::wherenull('deleted_at')->where('main_id', $id)->get();

    $ip = $req->ip();
    date_default_timezone_set("Asia/Calcutta");
    $cur_date=date("Y-m-d H:i:s");
    $addedby=$req->session()->get('admin_id');

    foreach($d1 as $dd1) {
    $o_product_name = '';
    $o_product_qty = '';
    if(!empty($dd1)){
    $o_product_qty = $dd1->quantity;


  $dsa= Inventory::wherenull('deleted_at')->where('product_id', $dd1->product_id)->where('color_id', $dd1->color_id)->first();

    if(!empty($dsa)){

    $db_pro_stock = $dsa->stock;
    $total_pro_stock = $db_pro_stock + $o_product_qty;

    $data_update= [
      'stock'=>$total_pro_stock
    ];

    $dsa->update($data_update);


    }

    }
    }
  $message="Order has been cancelled of amount:- $".$d11->total_amount." and order id:- ".$id." ";
                $data['name'] = $userData->name;
                $data['heading'] = "Your order has been cancelled";
                $data['body'] = $message;

                Mail::send('email/mail', $data, function ($message)  use ($user_email) {
                    $message->to($user_email)->subject('Order has been Cancelled');
                    $message->from(EMAIL, 'Gemx Jewellery');
                });
}

return redirect()->back()->with('status', 'Status Updated Successfully.');


  }else{
   return view('admin/login/index');
  }

  }

  public function view_ordered_product_details($main_id,Request $req){


  if(!empty($req->session()->has('admin_data'))){

    $ordered_product_details_data= Order2::wherenull('deleted_at')->where('main_id',base64_decode($main_id))->get();

      return view('admin/orders/view_ordered_product_details',[ 'ordered_product_details_data' => $ordered_product_details_data]);

    }else{
     return view('admin/login/index');
    }

  }




  //add order track id page
  public function add_order_track_view($idd, Request $req){

if(!empty($req->session()->has('admin_data'))){


  	return view('admin/orders/add_order_track_view',['order_id' => $idd ]);

  }else{
   return view('admin/login/index');
  }

  }



  public function add_track_id_process($idd,Request $req){

  if(!empty($req->session()->has('admin_data'))){

  $id=base64_decode($idd);
  $track_id = $req->input('track_id');

  $ip = $req->ip();
  date_default_timezone_set("Asia/Calcutta");
  $cur_date=date("Y-m-d H:i:s");
  $addedby=$req->session()->get('admin_id');



  $data_updates_data= [
    'track_id'=>$track_id
  ];


$d11= Order1::wherenull('deleted_at')->where('id', $id)->first();
if(!empty($d11)){
  // echo $d11; die();
  $d11->update($data_updates_data);
}

  return Redirect('/new_orders')->with('status', 'Order Track Id Added Successfully.');

  }else{
   return view('admin/login/index');
  }

  }








  //Order bill

  public function view_order_bill($main_id,Request $req){


  if(!empty($req->session()->has('admin_data'))){

    $order1_data = Order1::wherenull('deleted_at')->where('id',base64_decode($main_id))->first();
    $order2_data = Order2::wherenull('deleted_at')->where('main_id',base64_decode($main_id))->get();



      return view('admin/orders/order_bill',[ 'order1_data' => $order1_data, 'order2_data' => $order2_data ]);

    }else{
     return view('admin/login/index');
    }

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
