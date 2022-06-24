<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Material;
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

class MaterialController extends Controller
{


	  public function add_material_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/material/add_material' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_material_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$MaterialData = Material::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/material/update_material' ,['material_data' => $MaterialData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_material(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Material_data= Material::wherenull('deleted_at')->get();

		return view('admin/material/view_material',['materialdetails' => $Material_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_material_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$materialStatusInfo= [

				'is_active' =>1,


			];


					$MaterialData = Material::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $MaterialData);

				$MaterialData->update($materialStatusInfo);



//update status productcolorsize rows of related to this material

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('material_id', $id)->where('is_active', 0)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

		// $proColorsizeDa->delete();
		$proColorsizeDa->update($materialStatusInfo);

		}
}



		}
		else{

			$materialStatusInfo= [

				'is_active' =>0,


			];

			$MaterialData = Material::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $MaterialData);
			$MaterialData->update($materialStatusInfo);


//update status productcolorsize rows of related to this material

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('material_id', $id)->where('is_active', 1)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

		$proColorsizeDa->update($materialStatusInfo);

		}
}


//delete cart data related to this material

// 		$MaterialCart = Cart::wherenull('deleted_at')-> where('material_id', $id)->get();
//
// if($MaterialCart != "" && $MaterialCart != null){
// 		foreach ($MaterialCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		}


			return Redirect('/view_material')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteMaterial( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deleteMaterial');
				log::debug($idd);

					$id= base64_decode($idd);

				$MaterialData = Material::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($MaterialData);
				$MaterialData->delete();



//delete productcolorsize rows of related to this material

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('material_id', $id)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

		$proColorsizeDa->delete();

		}
}


//delete cart data related to this material

// 		$MaterialCart = Cart::wherenull('deleted_at')-> where('material_id', $id)->get();
//
// if($MaterialCart != "" && $MaterialCart != null){
// 		foreach ($MaterialCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		       return Redirect('/view_material')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_material_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$material_id = $req->input('material_id');
			$material_id_decode = base64_decode($material_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required'

		]);

		log::debug('$addAdmin');


		$materialInfo= [

			'name' => $req->input('name'),

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($material_id_decode && $material_id_decode != ""){

				$material_dataas = Material::wherenull('deleted_at')-> where('id', $material_id_decode)->first();
				$material_dataas->update($materialInfo);
				return Redirect('/view_material')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Material::create($materialInfo);
			return Redirect('/view_material')->with('status', 'Data Added Successfully.');
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
