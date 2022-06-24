<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\CustomOrder;
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

class CustomOrderController extends Controller
{


	  public function view_custom_order(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$custom_order_data= CustomOrder::wherenull('deleted_at')->get();

			return view('admin/custom_order/view_custom_order',['customorderdetails' => $custom_order_data]);

		}else{
		 return view('admin/login/index');
		}

    }




}
