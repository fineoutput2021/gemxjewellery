<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\PackageItem;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\frontendmodel\Cart;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class PackageController extends Controller
{


	  public function add_package_view(Request $req){

		//$Team_data= Team::wherenull('deleted_at')->get();
  if(!empty($req->session()->has('admin_data'))){

		return view('admin/package/add_package');

	}else{
    return view('admin/login/index');
  }

    }

		public function update_package_view($id,Request $req){

  if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$PackageData = PackageItem::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("PackageData"); log::debug($PackageData);die();
		return view('admin/package/update_package',['package_data' => $PackageData ]);

	}else{
		return view('admin/login/index');
	}

		}



	  public function view_package(Request $req){

  if(!empty($req->session()->has('admin_data'))){
		  //$Package_data= Package::wherenull('deleted_at')->get();
			$Package_data= PackageItem::wherenull('deleted_at')->get();

			return view('admin/package/view_package',['packagedetails' => $Package_data]);

		}else{
			return view('admin/login/index');
		}

    }

		public function update_package_status($status,$idd,Request $req ){

  if(!empty($req->session()->has('admin_data'))){
			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);


	$id = base64_decode($idd);

		if($status == "active"){

			$packageStatusInfo= [

				'is_active' =>1,


			];


					$PackageData = PackageItem::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $PackageData);

				$PackageData->update($packageStatusInfo);



		}else{

			$packageStatusInfo= [

				'is_active' =>0,


			];

			$PackageData = PackageItem::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $PackageData);
			$PackageData->update($packageStatusInfo);


		}


			return Redirect('/view_package')->with('status', 'Status Updated Successfully.');


		}else{
			return view('admin/login/index');
		}


		}



		public function deletePackage($idd,Request $req){
				// $member_Id= $req->input('memberId');

  if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				log::debug('$deletepackage');
				log::debug($id);
				$PackageData = PackageItem::wherenull('deleted_at')-> where('id', $id)->first();
				// $img= $PackageData->image;


				log::debug($PackageData);
				$PackageData->delete();

				// unlink( $img );



		       return Redirect('/view_package')->with('status', 'Data Deleted Successfully.');

				 }else{
				 	return view('admin/login/index');
				 }

		    }



	 public function add_package_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_package_id = $req->input('id');

		$package_id= base64_decode($enc_package_id);


		if($package_id && $package_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'name' => 'required',
			'price' => 'required',
			'buy_price' => 'required',
			'validity' => 'required',

			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',
        'price' => 'required',
        'buy_price' => 'required',
				'validity' => 'required',
		]);
		}
		log::debug('$addpackage');


	// if($req->hasFile('img')) {
  //               $images =   $req->file('img');
	//
	// 								if(!empty($images)){
  //                   $filename = 'Package'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
  //                   $filePath = public_path('uploads/PackageUploads');
  //                   $images->move($filePath, $filename);
	//
	// 									$fullimagepath= "uploads/PackageUploads/".$filename;
	// 								}else{
	//
	// 									$Cat= PackageItem::wherenull('deleted_at')-> where('id', $package_id)->first();
	// 										if(!empty($package_id) && !empty($Cat)){
	// 											$fullimagepath= $Cat->image;
	// 										}else{
	// 											$fullimagepath= "";
	// 										}
	//
	// 								}
	//
  //           }
	// 					else{
	// 						$Cat= PackageItem::wherenull('deleted_at')-> where('id', $package_id)->first();
	// 							if(!empty($package_id) && !empty($Cat)){
	// 								$fullimagepath= $Cat->image;
	// 							}else{
	// 								$fullimagepath= "";
	// 							}
	// 					}
// log::debug($filename); die();

		$packageInfo= [

			'name' => $req->input('name'),
			'description' => $req->input('description'),

			// 'image' => $fullimagepath,
			'price' => $req->input('price'),
			'buy_price' => $req->input('buy_price'),
			'validity' => $req->input('validity'),
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];

// print_r($packageInfo); die();

		if($package_id && $package_id != ""){

				$updated_last_id = PackageItem::wherenull('deleted_at')-> where('id', $package_id)->first();
				$updated_last_id->update($packageInfo);
				return Redirect('/view_package')->with('status', 'Data Updated Successfully.');

		}else{

			$last_id = PackageItem::create($packageInfo);
			return Redirect('/view_package')->with('status', 'Data Added Successfully.');
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
