<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Product;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\frontendmodel\Cart;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class NewArrivalController extends Controller
{


		public function view_new_and_now_category(Request $req)
    {

  if(!empty($req->session()->has('admin_data'))){

      $Category_data= Category::wherenull('deleted_at')->where('is_active', 1)->get();


      return view('admin/new_arrival/view_new_arriv_category',[ 'categorydetails' => $Category_data ]);


    }else{
      return view('admin/login/index');
    }

    }


    public function view_new_and_now_subcategory($idd, Request $req)
    {

  if(!empty($req->session()->has('admin_data'))){

$id=base64_decode($idd);

      $Category_data= Category::wherenull('deleted_at')->where('is_active', 1)->get();
      $SubCategory_data= SubCategory::wherenull('deleted_at')->where('category_id', $id)->where('is_cat_delete', 0)->where('is_active', 1)->get();

      return view('admin/new_arrival/view_new_arriv_subcategory',[ 'categorydetails' => $Category_data , 'subcategorydetails' => $SubCategory_data,  'category_id' => $idd ]);


    }else{
      return view('admin/login/index');
    }

    }






	  public function view_new_and_now_add_product($cidd,$sidd,Request $req)
    {

  if(!empty($req->session()->has('admin_data'))){

$cid=base64_decode($cidd);
$sid=base64_decode($sidd);

			$Category_data= Category::wherenull('deleted_at')->where('is_active', 1)->get();
			$SubCategory_data= SubCategory::wherenull('deleted_at')-> where('is_cat_delete', 0)->where('is_active', 1)->get();

			$Product_Data= Product::wherenull('deleted_at')
      ->where('category',$cid)
      ->where('sub_category_id',$sid)
      ->where('is_cat_delete', 0)
      ->where('is_subcat_delete', 0)
      ->where('is_active', 1)->get();

			return view('admin/new_arrival/view_product',['productdetails' => $Product_Data, 'categorydetails' => $Category_data, 'subcategorydetails' => $SubCategory_data ,'category_id' => $cidd , 'subcategory_id' => $sidd ]);


    }else{
      return view('admin/login/index');
    }

    }







	 public function add_new_and_now_product($cidd,$sidd,$id,Request $req)
    {

  if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
$ip= $req->ip();
$decode_pro_id= base64_decode($id);

		$newArriveProductInfo= [

			'product_id' => $decode_pro_id,
			'added_by' => $admin_id,
			'ip' => $ip,
			'is_active' => 1,

		];


			$last_id = NewArrival::create($newArriveProductInfo);
			return Redirect('/view_new_and_now_add_product/'.$cidd.'/'.$sidd)->with('status', 'Product Added Successfully.');


    }else{
      return view('admin/login/index');
    }

    }



    public function remove_new_and_now_product($cidd,$sidd,$id,Request $req)
     {

  if(!empty($req->session()->has('admin_data'))){

   $admin_id= $req->session()->get('admin_id');
   $ip= $req->ip();
   $decode_pro_id= base64_decode($id);

   $newArrivalData = NewArrival::where('product_id', $decode_pro_id)->where('is_active',1)->first();


if(!empty($newArrivalData)){
     $newArrivalData->delete();
}

       return Redirect('/view_new_and_now_add_product/'.$cidd.'/'.$sidd)->with('status', 'Product Removed Successfully.');



     }else{
       return view('admin/login/index');
     }

     }


}
