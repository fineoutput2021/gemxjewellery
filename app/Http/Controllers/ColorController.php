<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
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

class ColorController extends Controller
{


	  public function add_color_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/color/add_color' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_color_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$ColorData = Color::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/color/update_color' ,['color_data' => $ColorData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_color(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Color_data= Color::wherenull('deleted_at')->get();

		return view('admin/color/view_color',['colordetails' => $Color_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_color_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$colorStatusInfo= [

				'is_active' =>1,


			];


					$ColorData = Color::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $ColorData);

				$ColorData->update($colorStatusInfo);



//update status productcolorsize rows of related to this color

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('color_id', $id)->where('is_active', 0)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

		// $proColorsizeDa->delete();
		$proColorsizeDa->update($colorStatusInfo);

		}
}



		}
		else{

			$colorStatusInfo= [

				'is_active' =>0,


			];

			$ColorData = Color::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $ColorData);
			$ColorData->update($colorStatusInfo);


//update status productcolorsize rows of related to this color

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('color_id', $id)->where('is_active', 1)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

		$proColorsizeDa->update($colorStatusInfo);

		}
}


//delete cart data related to this color

		$ColorCart = Cart::wherenull('deleted_at')-> where('color_id', $id)->where('status', 0)->get();

if($ColorCart != "" && $ColorCart != null){
		foreach ($ColorCart as $cart) {

			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();

		$proCrtDa->delete();

		}
}


		}


			return Redirect('/view_color')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteColor( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deletecolor');
				log::debug($idd);

					$id= base64_decode($idd);

				$ColorData = Color::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($ColorData);
				$ColorData->delete();



//delete productcolorsize rows of related to this color

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('color_id', $id)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

		$proColorsizeDa->delete();

		}
}


//delete cart data related to this color

		$ColorCart = Cart::wherenull('deleted_at')-> where('color_id', $id)->where('status', 0)->get();

if($ColorCart != "" && $ColorCart != null){
		foreach ($ColorCart as $cart) {

			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();

		$proCrtDa->delete();

		}
}


		       return Redirect('/view_color')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_color_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$color_id = $req->input('color_id');
			$color_id_decode = base64_decode($color_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',
					'code' => 'required ',

		]);

		log::debug('$addAdmin');


		$colorInfo= [

			'name' => $req->input('name'),
			'code' => $req->input('code'),

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($color_id_decode && $color_id_decode != ""){

				$color_dataas = Color::wherenull('deleted_at')-> where('id', $color_id_decode)->first();
				$color_dataas->update($colorInfo);
				return Redirect('/view_color')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Color::create($colorInfo);
			return Redirect('/view_color')->with('status', 'Data Added Successfully.');
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
