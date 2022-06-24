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
use App\adminmodel\Gemstone;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class GemstoneController extends Controller
{


	  public function add_gemstone_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/gemstone/add_gemstone' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_gemstone_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$GemstoneData = Gemstone::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/gemstone/update_gemstone' ,['gemstone_data' => $GemstoneData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_gemstone(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Gemstone_data= Gemstone::wherenull('deleted_at')->get();

		return view('admin/gemstone/view_gemstone',['gemstonedetails' => $Gemstone_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_gemstone_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$gemstoneStatusInfo= [

				'is_active' =>1,


			];


					$GemstoneData = Gemstone::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $GemstoneData);

				$GemstoneData->update($gemstoneStatusInfo);



//update status productcolorsize rows of related to this Gemstone

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('gemstone_id', $id)->where('is_active', 0)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

		// $proColorsizeDa->delete();
		$proColorsizeDa->update($gemstoneStatusInfo);

		}
}



		}
		else{

			$gemstoneStatusInfo= [

				'is_active' =>0,


			];

			$GemstoneData = Gemstone::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $GemstoneData);
			$GemstoneData->update($gemstoneStatusInfo);


//update status productcolorsize rows of related to this gemstone

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('gemstone_id', $id)->where('is_active', 1)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

		$proColorsizeDa->update($gemstoneStatusInfo);

		}
}


//delete cart data related to this gemstone

// 		$GemstoneCart = Cart::wherenull('deleted_at')-> where('gemstone_id', $id)->get();
//
// if($GemstoneCart != "" && $GemstoneCart != null){
// 		foreach ($GemstoneCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		}


			return Redirect('/view_gemstone')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteGemstone( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('deleteGemstone');
				log::debug($idd);

					$id= base64_decode($idd);

				$GemstoneData = Gemstone::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($GemstoneData);
				$GemstoneData->delete();



//delete productcolorsize rows of related to this gemstone

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('gemstone_id', $id)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

		$proColorsizeDa->delete();

		}
}


//delete cart data related to this gemstone

// 		$GemstoneCart = Cart::wherenull('deleted_at')-> where('gemstone_id', $id)->get();
//
// if($GemstoneCart != "" && $GemstoneCart != null){
// 		foreach ($GemstoneCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		       return Redirect('/view_gemstone')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_gemstone_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$gemstone_id = $req->input('gemstone_id');
			$gemstone_id_decode = base64_decode($gemstone_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required'
      		]);

		log::debug('$addAdmin');


			if($req->hasFile('img')) {
		                $images =   $req->file('img');

											if(!empty($images)){
		                    $filename = 'Gemstone'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
		                    $filePath = public_path('uploads/GemstoneUploads');
		                    $images->move($filePath, $filename);

												$fullimagepath= "uploads/GemstoneUploads/".$filename;
											}else{

												$Cat= Gemstone::wherenull('deleted_at')-> where('id', $gemstone_id_decode)->first();
													if(!empty($gemstone_id_decode) && !empty($Cat)){
														$fullimagepath= $Cat->image;
													}else{
														$fullimagepath= "";
													}

											}

		            }
								else{
									$Cat= Gemstone::wherenull('deleted_at')-> where('id', $gemstone_id_decode)->first();
										if(!empty($gemstone_id_decode) && !empty($Cat)){
											$fullimagepath= $Cat->image;
										}else{
											$fullimagepath= "";
										}
								}


		$gemstoneInfo= [

			'name' => $req->input('name'),
			'image' => $fullimagepath,

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($gemstone_id_decode && $gemstone_id_decode != ""){

				$gemstone_dataas = Gemstone::wherenull('deleted_at')-> where('id', $gemstone_id_decode)->first();
				$gemstone_dataas->update($gemstoneInfo);
				return Redirect('/view_gemstone')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Gemstone::create($gemstoneInfo);
			return Redirect('/view_gemstone')->with('status', 'Data Added Successfully.');
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
