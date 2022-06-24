<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\Contact;
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

class ContactController extends Controller
{


	  public function view_contact(Request $req){

	if(!empty($req->session()->has('admin_data'))){

			$contact_data= Contact::wherenull('deleted_at')->get();

			return view('admin/contact/view_contact',['contactdetails' => $contact_data]);

		}else{
		 return view('admin/login/index');
		}

    }




}
