<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\WholesaleInquiry;
use App\adminmodel\NewsLetter;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class NewsLetterController extends Controller
{


	  public function view_newsletter(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$newsletter_data= NewsLetter::wherenull('deleted_at')->get();

			return view('admin/newsletter/view_newsletter',['newsletter_data' => $newsletter_data]);

		}else{
		 return view('admin/login/index');
		}


    }




}
