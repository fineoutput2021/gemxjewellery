<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Size;
use App\adminmodel\Product;
use App\adminmodel\ProductColorSize;
use App\frontendmodel\Cart;
use App\adminmodel\Color;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class SizeController extends Controller
{


	  public function add_size_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/size/add_size' );

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_size_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$SizeData = Size::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/size/update_size' ,['size_data' => $SizeData] );

	}else{
	 return view('admin/login/index');
	}

		}


	  public function view_size(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Size_data= Size::wherenull('deleted_at')->get();

		return view('admin/size/view_size',['sizedetails' => $Size_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_size_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);

		if($status == "active"){

			$sizeStatusInfo= [

				'is_active' =>1,


			];


					$SizeData = Size::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $SizeData);

				$SizeData->update($sizeStatusInfo);



				//update status productcolorsize rows of related to this color

						$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('size_id', $id)->where('is_active', 0)->get();

				if($ProColorsizeData != "" && $ProColorsizeData != null){
						foreach ($ProColorsizeData as $colorsizepro) {

							$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

						// $proColorsizeDa->delete();
						$proColorsizeDa->update($sizeStatusInfo);

						}
				}



		}
		else{

			$sizeStatusInfo= [

				'is_active' =>0,


			];

			$SizeData = Size::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $SizeData);
			$SizeData->update($sizeStatusInfo);



			//update status productcolorsize rows of related to this color

					$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('size_id', $id)->where('is_active', 1)->get();

			if($ProColorsizeData != "" && $ProColorsizeData != null){
					foreach ($ProColorsizeData as $colorsizepro) {

						$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

					$proColorsizeDa->update($sizeStatusInfo);

					}
			}



			//delete cart data related to this color

					$ColorCart = Cart::wherenull('deleted_at')-> where('variant_id', $id)->get();

			if($ColorCart != "" && $ColorCart != null){
					foreach ($ColorCart as $cart) {

						$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();

					$proCrtDa->delete();

					}
			}


		}


			return Redirect('/view_size')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteSize($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deletesize');
				log::debug($idd);

					$id= base64_decode($idd);

				$SizeData = Size::wherenull('deleted_at')-> where('id', $id)->first();


				log::debug($SizeData);
				$SizeData->delete();


					//delete productcolorsize rows of related to this size variant

							$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('size_id', $id)->get();

					if($ProColorsizeData != "" && $ProColorsizeData != null){
							foreach ($ProColorsizeData as $colorsizepro) {

								$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

							$proColorsizeDa->delete();

							}
					}

					//delete cart data related to this size

							$ColorCart = Cart::wherenull('deleted_at')-> where('variant_id', $id)->get();

					if($ColorCart != "" && $ColorCart != null){
							foreach ($ColorCart as $cart) {

								$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();

							$proCrtDa->delete();

							}
					}

		       return Redirect('/view_size')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_size_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$size_id = $req->input('size_id');
		$size_id_decode = base64_decode($size_id);

			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',

		]);

		$sizeInfo= [

			'name' => $req->input('name'),
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($size_id_decode && $size_id_decode != ""){

				$size = Size::wherenull('deleted_at')-> where('id', $size_id_decode)->first();


			 	 $size->update($sizeInfo);

				return Redirect('/view_size')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Size::create($sizeInfo);
			return Redirect('/view_size')->with('status', 'Data Added Successfully.');
		}



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
