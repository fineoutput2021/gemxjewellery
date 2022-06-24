<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\WholesaleInquiry;
use App\adminmodel\AskQuestion;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class AskQuestionController extends Controller
{


	  public function view_product_ask_question(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$product_ques_data= AskQuestion::wherenull('deleted_at')->get();

			return view('admin/ask_question/view_product_ask_question',['product_ques_data' => $product_ques_data]);

		}else{
		 return view('admin/login/index');
		}


    }




}
