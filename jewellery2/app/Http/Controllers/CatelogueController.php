<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\Catelogue;
use App\frontendmodel\UserCatelogue;
// use App\adminmodel\Cart;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class CatelogueController extends Controller
{


	  public function add_catelogue_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		//$Team_data= Team::wherenull('deleted_at')->get();

		return view('admin/catelogue/add_catelogue');

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_catelogue_view($id, Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$CatelogueData = Catelogue::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/catelogue/update_catelogue',['catelogue_data' => $CatelogueData ]);

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_catelogue(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$Catelogue_data= Catelogue::wherenull('deleted_at')->get();

			return view('admin/catelogue/view_catelogue',['cateloguedetails' => $Catelogue_data]);

		}else{
		 return view('admin/login/index');
		}

    }

		public function update_catelogue_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

	$id = base64_decode($idd);

		if($status == "active"){

			$catelogueStatusInfo= [

				'is_active' =>1,


			];


					$CatelogueData = Catelogue::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $CatelogueData);

				$CatelogueData->update($catelogueStatusInfo);








		}
		else{

			$catelogueStatusInfo= [

				'is_active' =>0,


			];

			$CatelogueData = Catelogue::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $CatelogueData);
			$CatelogueData->update($catelogueStatusInfo);


		}


			return Redirect('/view_catelogue')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteCatelogue($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				log::debug('$deleteCatelogue');
				log::debug($id);
				$CatelogueData = Catelogue::wherenull('deleted_at')-> where('id', $id)->first();
				$img= $CatelogueData->image;


				log::debug($CatelogueData);
				$CatelogueData->delete();

				unlink( $img );



		       return Redirect('/view_catelogue')->with('status', 'Data Deleted Successfully.');


				 }else{
				  return view('admin/login/index');
				 }

		    }



	 public function add_catelogue_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_catelogue_id = $req->input('id');

		$catelogue_id= base64_decode($enc_catelogue_id);


		if($catelogue_id && $catelogue_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'name' => 'required',

			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',

		]);
		}
		log::debug('$addcatelogue');


	if($req->hasFile('img')) {
                $images =   $req->file('img');

									if(!empty($images)){
                    $filename = 'Catelogue'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/CatelogueUploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/CatelogueUploads/".$filename;
									}else{

										$Cat= Catelogue::wherenull('deleted_at')-> where('id', $catelogue_id)->first();
											if(!empty($catelogue_id) && !empty($Cat)){
												$fullimagepath= $Cat->image;
											}else{
												$fullimagepath= "";
											}

									}

            }
						else{
							$Cat= Catelogue::wherenull('deleted_at')-> where('id', $catelogue_id)->first();
								if(!empty($catelogue_id) && !empty($Cat)){
									$fullimagepath= $Cat->image;
								}else{
									$fullimagepath= "";
								}
						}
// log::debug($filename); die();

		$catelogueInfo= [

			'name' => $req->input('name'),

			'image' => $fullimagepath,
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($catelogue_id && $catelogue_id != ""){

				$updated_last_id = Catelogue::wherenull('deleted_at')-> where('id', $catelogue_id)->first();
				$updated_last_id->update($catelogueInfo);
				return Redirect('/view_catelogue')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Catelogue::create($catelogueInfo);
			return Redirect('/view_catelogue')->with('status', 'Data Added Successfully.');
		}



	}else{
	 return view('admin/login/index');
	}
        //return response()->json(['response' => 'OK']);
    }




		public function view_user_catelogue(Request $req){

	if(!empty($req->session()->has('admin_data'))){

		$CatelogueData = UserCatelogue::wherenull('deleted_at')->get();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/catelogue/view_user_catelogue',['catelogue_data' => $CatelogueData ]);

	}else{
	 return view('admin/login/index');
	}

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
