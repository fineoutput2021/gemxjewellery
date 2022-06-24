<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Shape;
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

class ShapeController extends Controller
{


	  public function add_shape_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/shape/add_shape' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_shape_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$ShapeData = Shape::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/shape/update_shape' ,['shape_data' => $ShapeData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_shape(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Shape_data= Shape::wherenull('deleted_at')->get();

		return view('admin/shape/view_shape',['shapedetails' => $Shape_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_shape_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$shapeStatusInfo= [

				'is_active' =>1,


			];


					$ShapeData = Shape::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $ShapeData);

				$ShapeData->update($shapeStatusInfo);



//update status productcolorsize rows of related to this shape

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('shape_id', $id)->where('is_active', 0)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 0)->first();

		// $proColorsizeDa->delete();
		$proColorsizeDa->update($shapeStatusInfo);

		}
}



		}
		else{

			$shapeStatusInfo= [

				'is_active' =>0,


			];

			$ShapeData = Shape::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $ShapeData);
			$ShapeData->update($shapeStatusInfo);


//update status productcolorsize rows of related to this shape

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('shape_id', $id)->where('is_active', 1)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->where('is_active', 1)->first();

		$proColorsizeDa->update($shapeStatusInfo);

		}
}


//delete cart data related to this shape

// 		$ShapeCart = Cart::wherenull('deleted_at')-> where('shape_id', $id)->get();
//
// if($ShapeCart != "" && $ShapeCart != null){
// 		foreach ($ShapeCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		}


			return Redirect('/view_shape')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteShape( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deleteShape');
				log::debug($idd);

					$id= base64_decode($idd);

				$ShapeData = Shape::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($ShapeData);
				$ShapeData->delete();



//delete productcolorsize rows of related to this shape

		$ProColorsizeData = ProductColorSize::wherenull('deleted_at')-> where('shape_id', $id)->get();

if($ProColorsizeData != "" && $ProColorsizeData != null){
		foreach ($ProColorsizeData as $colorsizepro) {

			$proColorsizeDa = ProductColorSize::wherenull('deleted_at')-> where('id', $colorsizepro->id)->first();

		$proColorsizeDa->delete();

		}
}


//delete cart data related to this shape

// 		$ShapeCart = Cart::wherenull('deleted_at')-> where('shape_id', $id)->get();
//
// if($ShapeCart != "" && $ShapeCart != null){
// 		foreach ($ShapeCart as $cart) {
//
// 			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
//
// 		$proCrtDa->delete();
//
// 		}
// }


		       return Redirect('/view_shape')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_shape_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$shape_id = $req->input('shape_id');
			$shape_id_decode = base64_decode($shape_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required'

		]);

		log::debug('$addAdmin');

		if($req->hasFile('img')) {
									$images =   $req->file('img');

										if(!empty($images)){
											$filename = 'Shape'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
											$filePath = public_path('uploads/ShapeUploads');
											$images->move($filePath, $filename);

											$fullimagepath= "uploads/ShapeUploads/".$filename;
										}else{

											$Cat= Shape::wherenull('deleted_at')-> where('id', $shape_id_decode)->first();
												if(!empty($shape_id_decode) && !empty($Cat)){
													$fullimagepath= $Cat->image;
												}else{
													$fullimagepath= "";
												}

										}

							}
							else{
								$Cat= Shape::wherenull('deleted_at')-> where('id', $shape_id_decode)->first();
									if(!empty($shape_id_decode) && !empty($Cat)){
										$fullimagepath= $Cat->image;
									}else{
										$fullimagepath= "";
									}
							}


		$shapeInfo= [

			'name' => $req->input('name'),
			'image' => $fullimagepath,

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($shape_id_decode && $shape_id_decode != ""){

				$shape_dataas = Shape::wherenull('deleted_at')-> where('id', $shape_id_decode)->first();
				$shape_dataas->update($shapeInfo);
				return Redirect('/view_shape')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Shape::create($shapeInfo);
			return Redirect('/view_shape')->with('status', 'Data Added Successfully.');
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
