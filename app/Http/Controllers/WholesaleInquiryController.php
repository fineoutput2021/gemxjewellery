<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\WholesaleInquiry;
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

class WholesaleInquiryController extends Controller
{


	  public function view_wholesale_inquiry(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$inquiry_data= WholesaleInquiry::wherenull('deleted_at')->get();

			return view('admin/wholesale_inquiry/view_wholesale_inquiry',['inquirydetails' => $inquiry_data]);

		}else{
		 return view('admin/login/index');
		}


    }




}
