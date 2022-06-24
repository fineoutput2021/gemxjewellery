<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
// use App\adminmodel\Order;
use App\adminmodel\Promocode;
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

class PromocodeController extends Controller
{


	  public function add_promocode_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/promocode/add_promocode');

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_promocode_view($id,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$promocodeData = Promocode::wherenull('deleted_at')-> where('id', $id_decode)->first();

		return view('admin/promocode/update_promocode',['promo_data' => $promocodeData ]);

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_promocode(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$Promocode_data= Promocode::wherenull('deleted_at')->get();

			return view('admin/promocode/view_promocode',['promocodedetails' => $Promocode_data]);


		}else{
		 return view('admin/login/index');
		}

    }

		public function update_promocode_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

	$id = base64_decode($idd);

		if($status == "active"){

			$promocodeStatusInfo= [

				'is_active' =>1,


			];


					$PromocodeData = Promocode::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $PromocodeData);

				$PromocodeData->update($promocodeStatusInfo);

		}
		else{

			$promocodeStatusInfo= [

				'is_active' =>0,


			];

			$PromocodeData = Promocode::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $PromocodeData);
			$PromocodeData->update($promocodeStatusInfo);


		}


			return Redirect('/view_promocode')->with('status', 'Status Updated Successfully.');



		}else{
		 return view('admin/login/index');
		}

		}



		public function deletePromocode($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				log::debug('$deletePromocode');
				log::debug($id);
				$PromocodeData = Promocode::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($PromocodeData);
				$PromocodeData->delete();


		       return Redirect('/view_promocode')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_promocode_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_promocode_id = $req->input('id');

		$promocode_id= base64_decode($enc_promocode_id);


		if($promocode_id && $promocode_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'promocode' => 'required',
			'offer_type' => 'required',
			'type' => 'required',
			'minimum_amount' => 'required',
			// 'maximum_gift_amount' => 'required',
			'order_qualify_type' => 'required',
			'start_date' => 'required',
			'expiry_date' => 'required',

			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
        'promocode' => 'required',
  			'offer_type' => 'required',
  			'type' => 'required',
  			'minimum_amount' => 'required',
  			// 'maximum_gift_amount' => 'required',
  			'order_qualify_type' => 'required',
  			'start_date' => 'required',
  			'expiry_date' => 'required',

		]);
		}
		log::debug('$addCategory');

		$promocodeInfo= [

			'promocode' => $req->input('promocode'),
			'offer_type' => $req->input('offer_type'),
			'percent' => $req->input('percent'),
			'amount_off' => $req->input('amount_off'),
			'type' => $req->input('type'),
			'minimum_amount' =>$req->input('minimum_amount'),
			'maximum_gift_amount' => $req->input('maximum_gift_amount'),
			'order_qualify_type' =>$req->input('order_qualify_type'),
			'quantity' => $req->input('quantity'),
			'minimum_order_total' => $req->input('minimum_order_total'),
			'start_date' => $req->input('start_date'),
			'expiry_date' => $req->input('expiry_date'),
			'terms_and_conditions' => $req->input('terms_and_conditions'),
			// 'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($promocode_id && $promocode_id != ""){

				$updated_last_id = Promocode::wherenull('deleted_at')-> where('id', $promocode_id)->first();
				$updated_last_id->update($promocodeInfo);
				return Redirect('/view_promocode')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Promocode::create($promocodeInfo);
			return Redirect('/view_promocode')->with('status', 'Data Added Successfully.');
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
