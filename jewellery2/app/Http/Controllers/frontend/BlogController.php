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
use App\adminmodel\AskQuestion;
use App\adminmodel\NewsLetter;
use App\adminmodel\Contact;
use App\adminmodel\Countries;
use App\frontendmodel\User;
use App\frontendmodel\Cart;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\adminmodel\Slider;
use App\adminmodel\Slider2;
use App\adminmodel\SaleProduct;
use App\adminmodel\Sale;
use App\adminmodel\Blog;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;

class BlogController extends Controller
{





 //view_blog_detail  page
 public function view_blog_detail(Request $req){

 log::debug('view_blog_detail');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$Blog_data= Blog::wherenull('deleted_at')->where('is_active', 1)->get();
log::debug($Blog_data);
 		return view('frontend/blog_detail',  ['category_data'=>$categories,'blog_data'=>$Blog_data ]);
 }



 //Single view_blog  page
 public function view_blog($idd, Request $req){

$id= base64_decode($idd);
 log::debug('view_blog');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$Blog_data= Blog::wherenull('deleted_at')->where('id', $id)->where('is_active', 1)->get();
log::debug($Blog_data);
 		return view('frontend/blog_view',  ['category_data'=>$categories,'blog_data'=>$Blog_data ]);
 }





}
