<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Metal;
use App\adminmodel\Product;
use App\adminmodel\ProductColorSize;
use App\frontendmodel\Cart;
use App\adminmodel\Size;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class MetalController extends Controller
{


	  public function add_metal_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/metal/add_metal' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_metal_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$MetalData = Metal::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/metal/update_metal' ,['metal_data' => $MetalData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_metal(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Metal_data= Metal::wherenull('deleted_at')->get();

		return view('admin/metal/view_metal',['metaldetails' => $Metal_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_metal_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$metalStatusInfo= [

				'is_active' =>1,


			];


					$MetalData = Metal::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $MetalData);

				$MetalData->update($metalStatusInfo);



//update status productcolorsize rows of related to this metal

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('metal_id', $id)->where('is_active', 0)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

		// $proColorsizeDa->delete();
		$proColorsizeDa->update($metalStatusInfo);

		}
}



		}
		else{

			$metalStatusInfo= [

				'is_active' =>0,


			];

			$MetalData = Metal::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $MetalData);
			$MetalData->update($metalStatusInfo);


//update status productcolorsize rows of related to this metal

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('metal_id', $id)->where('is_active', 1)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

		$proColorsizeDa->update($metalStatusInfo);

		}
}


//delete cart data related to this metal

// 		$MetalCart = Cart::wherenull('deleted_at')-> where('metal_id', $id)->get();
//
// if($MetalCart != "" && $MetalCart != null){
// 		foreach ($MetalCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		}


			return Redirect('/view_metal')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteMetal( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deletemetal');
				log::debug($idd);

					$id= base64_decode($idd);

				$MetalData = Metal::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($MetalData);
				$MetalData->delete();



//delete productcolorsize rows of related to this metal

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('metal_id', $id)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

		$proColorsizeDa->delete();

		}
}


//delete cart data related to this metal

// 		$MetalCart = Cart::wherenull('deleted_at')-> where('metal_id', $id)->get();
//
// if($MetalCart != "" && $MetalCart != null){
// 		foreach ($MetalCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		       return Redirect('/view_metal')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_metal_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$metal_id = $req->input('metal_id');
			$metal_id_decode = base64_decode($metal_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required'

		]);

		log::debug('$addAdmin');


	if($req->hasFile('img')) {
                $images =   $req->file('img');

									if(!empty($images)){
                    $filename = 'Metal'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/MetalUploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/MetalUploads/".$filename;
									}else{

										$Cat= Metal::wherenull('deleted_at')-> where('id', $metal_id_decode)->first();
											if(!empty($metal_id_decode) && !empty($Cat)){
												$fullimagepath= $Cat->image;
											}else{
												$fullimagepath= "";
											}

									}

            }
						else{
							$Cat= Metal::wherenull('deleted_at')-> where('id', $metal_id_decode)->first();
								if(!empty($metal_id_decode) && !empty($Cat)){
									$fullimagepath= $Cat->image;
								}else{
									$fullimagepath= "";
								}
						}


		$metalInfo= [

			'name' => $req->input('name'),
			'image' => $fullimagepath,

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($metal_id_decode && $metal_id_decode != ""){

				$metal_dataas = Metal::wherenull('deleted_at')-> where('id', $metal_id_decode)->first();
				$metal_dataas->update($metalInfo);
				return Redirect('/view_metal')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Metal::create($metalInfo);
			return Redirect('/view_metal')->with('status', 'Data Added Successfully.');
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
