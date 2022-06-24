<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Shape;
use App\adminmodel\Motif;
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

class MotifController extends Controller
{


	  public function add_motif_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/motif/add_motif' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_motif_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$MotifData = Motif::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/motif/update_motif' ,['motif_data' => $MotifData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_motif(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Motif_data= Motif::wherenull('deleted_at')->get();

		return view('admin/motif/view_motif',['motifdetails' => $Motif_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_motif_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$motifStatusInfo= [

				'is_active' =>1,


			];


					$MotifData = Motif::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $MotifData);

				$MotifData->update($motifStatusInfo);






		}
		else{

			$motifStatusInfo= [

				'is_active' =>0,


			];

			$MotifData = Motif::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $MotifData);
			$MotifData->update($motifStatusInfo);



		}


			return Redirect('/view_motif')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteMotif( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deleteMotif');
				log::debug($idd);

					$id= base64_decode($idd);

				$MotifData = Motif::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($MotifData);
				$MotifData->delete();



		       return Redirect('/view_motif')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_motif_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$motif_id = $req->input('motif_id');
			$motif_id_decode = base64_decode($motif_id);


			log::debug( 'no Id');
			$req->validate([
				'name' => 'required'

		]);

		log::debug('$addAdmin');

		if($req->hasFile('img')) {
									$images =   $req->file('img');

										if(!empty($images)){
											$filename = 'Motif'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
											$filePath = public_path('uploads/MotifUploads');
											$images->move($filePath, $filename);

											$fullimagepath= "uploads/MotifUploads/".$filename;
										}else{

											$Cat= Motif::wherenull('deleted_at')-> where('id', $motif_id_decode)->first();
												if(!empty($motif_id_decode) && !empty($Cat)){
													$fullimagepath= $Cat->image;
												}else{
													$fullimagepath= "";
												}

										}

							}
							else{
								$Cat= Motif::wherenull('deleted_at')-> where('id', $motif_id_decode)->first();
									if(!empty($motif_id_decode) && !empty($Cat)){
										$fullimagepath= $Cat->image;
									}else{
										$fullimagepath= "";
									}
							}


		$motifInfo= [

			'name' => $req->input('name'),
			'image' => $fullimagepath,

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($motif_id_decode && $motif_id_decode != ""){

				$motif_dataas = Motif::wherenull('deleted_at')-> where('id', $motif_id_decode)->first();
				$motif_dataas->update($motifInfo);
				return Redirect('/view_motif')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Motif::create($motifInfo);
			return Redirect('/view_motif')->with('status', 'Data Added Successfully.');
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
