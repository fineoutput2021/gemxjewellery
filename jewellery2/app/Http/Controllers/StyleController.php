<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Style;
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

class StyleController extends Controller
{


	  public function add_style_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/style/add_style' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_style_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$StyleData = Style::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/style/update_style' ,['style_data' => $StyleData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_style(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Style_data= Style::wherenull('deleted_at')->get();

		return view('admin/style/view_style',['styledetails' => $Style_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_style_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$styleStatusInfo= [

				'is_active' =>1,


			];


					$StyleData = Style::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $StyleData);

				$StyleData->update($styleStatusInfo);



//update status productcolorsize rows of related to this Style

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('style_id', $id)->where('is_active', 0)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

		// $proColorsizeDa->delete();
		$proColorsizeDa->update($styleStatusInfo);

		}
}



		}
		else{

			$styleStatusInfo= [

				'is_active' =>0,


			];

			$StyleData = Style::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $StyleData);
			$StyleData->update($styleStatusInfo);


//update status productcolorsize rows of related to this style

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('style_id', $id)->where('is_active', 1)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

		$proColorsizeDa->update($styleStatusInfo);

		}
}


//delete cart data related to this style

// 		$StyleCart = Cart::wherenull('deleted_at')-> where('style_id', $id)->get();
//
// if($StyleCart != "" && $StyleCart != null){
// 		foreach ($StyleCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		}


			return Redirect('/view_style')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteStyle( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('deleteStyle');
				log::debug($idd);

					$id= base64_decode($idd);

				$StyleData = Style::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($StyleData);
				$StyleData->delete();



//delete productcolorsize rows of related to this style

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('style_id', $id)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

		$proColorsizeDa->delete();

		}
}


//delete cart data related to this style

// 		$StyleCart = Cart::wherenull('deleted_at')-> where('style_id', $id)->get();
//
// if($StyleCart != "" && $StyleCart != null){
// 		foreach ($StyleCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		       return Redirect('/view_style')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_style_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$style_id = $req->input('style_id');
			$style_id_decode = base64_decode($style_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required'
      		]);

		log::debug('$addAdmin');


		$styleInfo= [

			'name' => $req->input('name'),

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($style_id_decode && $style_id_decode != ""){

				$style_dataas = Style::wherenull('deleted_at')-> where('id', $style_id_decode)->first();
				$style_dataas->update($styleInfo);
				return Redirect('/view_style')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Style::create($styleInfo);
			return Redirect('/view_style')->with('status', 'Data Added Successfully.');
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
