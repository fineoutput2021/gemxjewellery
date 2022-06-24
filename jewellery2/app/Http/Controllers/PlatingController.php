<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Plating;
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

class PlatingController extends Controller
{


	  public function add_plating_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/plating/add_plating' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_plating_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$PlatingData = Plating::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/plating/update_plating' ,['plating_data' => $PlatingData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_plating(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Plating_data= Plating::wherenull('deleted_at')->get();

		return view('admin/plating/view_plating',['platingdetails' => $Plating_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_plating_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$platingStatusInfo= [

				'is_active' =>1,


			];


					$PlatingData = Plating::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $PlatingData);

				$PlatingData->update($platingStatusInfo);



//update status productcolorsize rows of related to this plating

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('plating_id', $id)->where('is_active', 0)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

		// $proColorsizeDa->delete();
		$proColorsizeDa->update($platingStatusInfo);

		}
}



		}
		else{

			$platingStatusInfo= [

				'is_active' =>0,


			];

			$PlatingData = Plating::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $PlatingData);
			$PlatingData->update($platingStatusInfo);


//update status productcolorsize rows of related to this plating

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('plating_id', $id)->where('is_active', 1)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

		$proColorsizeDa->update($platingStatusInfo);

		}
}


//delete cart data related to this plating

// 		$PlatingCart = Cart::wherenull('deleted_at')-> where('plating_id', $id)->get();
//
// if($PlatingCart != "" && $PlatingCart != null){
// 		foreach ($PlatingCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		}


			return Redirect('/view_plating')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deletePlating( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deleteplating');
				log::debug($idd);

					$id= base64_decode($idd);

				$PlatingData = Plating::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($PlatingData);
				$PlatingData->delete();



//delete productcolorsize rows of related to this plating

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('plating_id', $id)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

		$proColorsizeDa->delete();

		}
}


//delete cart data related to this plating

// 		$PlatingCart = Cart::wherenull('deleted_at')-> where('plating_id', $id)->get();
//
// if($PlatingCart != "" && $PlatingCart != null){
// 		foreach ($PlatingCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		       return Redirect('/view_plating')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_plating_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$plating_id = $req->input('plating_id');
			$plating_id_decode = base64_decode($plating_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required'

		]);

		log::debug('$addAdmin');


		if($req->hasFile('img')) {
									$images =   $req->file('img');

										if(!empty($images)){
											$filename = 'Plating'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
											$filePath = public_path('uploads/PlatingUploads');
											$images->move($filePath, $filename);

											$fullimagepath= "uploads/PlatingUploads/".$filename;
										}else{

											$Cat= Plating::wherenull('deleted_at')-> where('id', $plating_id_decode)->first();
												if(!empty($plating_id_decode) && !empty($Cat)){
													$fullimagepath= $Cat->image;
												}else{
													$fullimagepath= "";
												}

										}

							}
							else{
								$Cat= Plating::wherenull('deleted_at')-> where('id', $plating_id_decode)->first();
									if(!empty($plating_id_decode) && !empty($Cat)){
										$fullimagepath= $Cat->image;
									}else{
										$fullimagepath= "";
									}
							}


		$platingInfo= [

			'name' => $req->input('name'),
			'image' => $fullimagepath,

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($plating_id_decode && $plating_id_decode != ""){

				$plating_dataas = Plating::wherenull('deleted_at')-> where('id', $plating_id_decode)->first();
				$plating_dataas->update($platingInfo);
				return Redirect('/view_plating')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Plating::create($platingInfo);
			return Redirect('/view_plating')->with('status', 'Data Added Successfully.');
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
