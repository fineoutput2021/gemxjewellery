<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\CustomOrder;
// use App\adminmodel\Cart;
use App\frontendmodel\Rating;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class ReviewController extends Controller
{


	  public function view_product_reviews(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$review_data= Rating::wherenull('deleted_at')->get();

			return view('admin/product_reviews/view_product_reviews',['reviewdetails' => $review_data]);

		}else{
		 return view('admin/login/index');
		}

    }




}
