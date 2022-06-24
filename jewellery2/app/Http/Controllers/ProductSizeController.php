<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Size;
use App\adminmodel\ProductSize;
use App\adminmodel\Product;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class ProductSizeController extends Controller
{


	  public function add_product_size_view($pro_id,Request $req){

if(!empty($req->session()->has('admin_data'))){

$product_id= $pro_id;
		$Size_data= Size::wherenull('deleted_at')->where('is_active',1)->get();

		return view('admin/product/add_product_size',  ['size_data' => $Size_data ,'product_id' => $product_id]  );


	}else{
	 return view('admin/login/index');
	}

    }

		public function update_product_size_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$SizeData = Size::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/size/update_size' ,['size_data' => $SizeData] );


	}else{
	 return view('admin/login/index');
	}

		}


	  public function view_product_size($pro_id,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$product_id= $pro_id;
			$product_id_dec= base64_decode($product_id);

$Product_Size_data= ProductSize::wherenull('deleted_at')->where('product_id', $product_id_dec)->get();

		  $Size_data= Size::wherenull('deleted_at')->get();

		return view('admin/product/view_product_size',['product_size_data'=>$Product_Size_data,'sizedetails' => $Size_data, 'product_id' => $product_id]);


	}else{
	 return view('admin/login/index');
	}

    }

		public function update_product_size_status($status,$pro_id,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$product_id= $pro_id;
			$product_id_decode=  base64_decode($pro_id);
			$id= base64_decode($idd);



		if($status == "active"){

			$sizeStatusInfo= [

				'is_active' =>1,


			];


					$SizeData = ProductSize::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $SizeData);

				$SizeData->update($sizeStatusInfo);

		}
		else{

			$sizeStatusInfo= [

				'is_active' =>0,


			];

			$SizeData = ProductSize::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $SizeData);
			$SizeData->update($sizeStatusInfo);
		}


			return Redirect('/view_product_size/'.$product_id)->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}

		}



		public function deleteProductSize($pro_id,$idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deletesize');
				log::debug($idd);

				$product_id= $pro_id;
				$product_id_decode=  base64_decode($pro_id);

					$id= base64_decode($idd);

				$SizeData = ProductSize::wherenull('deleted_at')-> where('id', $id)->first();
				///$img= $TeamData->image;


				log::debug($SizeData);
				$SizeData->delete();

          //unlink( $img );


		       return Redirect('/view_product_size/'.$product_id)->with('status', 'Data Deleted Successfully.');

				 }else{
				  return view('admin/login/index');
				 }

		    }



	 public function add_product_size_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');

			log::debug( 'no Id');
			$req->validate([
				'size_id' => 'required',

		]);


$size_id = $req->input('size_id');
$prod_id= $req->input('product_id');
$decod_product_id=base64_decode($prod_id);

		$sizeInfo= [

			'size_id' => $size_id,
			'product_id' => $decod_product_id,


			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];



			$last_id = ProductSize::create($sizeInfo);
			return Redirect('/view_product_size/'.$prod_id)->with('status', 'Data Added Successfully.');



		}else{
		 return view('admin/login/index');
		}

        //return response()->json(['response' => 'OK']);
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
