<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Shape;
use App\adminmodel\GiftCardPrice;
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

class GiftCardPriceController extends Controller
{


	  public function add_giftprice_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/giftprice/add_giftprice' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_giftprice_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$GiftpriceData = GiftCardPrice::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/giftprice/update_giftprice' ,['giftprice_data' => $GiftpriceData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_giftprice(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Giftprice_data= GiftCardPrice::wherenull('deleted_at')->get();

		return view('admin/giftprice/view_giftprice',['giftpricedetails' => $Giftprice_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_giftprice_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$giftpriceStatusInfo= [

				'is_active' =>1,


			];


					$GiftpriceData = GiftCardPrice::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $GiftpriceData);

				$GiftpriceData->update($giftpriceStatusInfo);



		}
		else{

			$giftpriceStatusInfo= [

				'is_active' =>0,


			];

			$GiftpriceData = GiftCardPrice::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $GiftpriceData);
			$GiftpriceData->update($giftpriceStatusInfo);



		}


			return Redirect('/view_giftprice')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteGiftprice( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deleteGiftprice');
				log::debug($idd);

					$id= base64_decode($idd);

				$GiftpriceData = GiftCardPrice::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($GiftpriceData);
				$GiftpriceData->delete();




		       return Redirect('/view_giftprice')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_giftprice_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		  $giftprice_id = $req->input('giftprice_id');
			$giftprice_id_decode = base64_decode($giftprice_id);


			log::debug( 'no Id');
			$req->validate([
				'price' => 'required'

		]);

		log::debug('$addAdmin');


		$giftpriceInfo= [

			'price' => $req->input('price'),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($giftprice_id_decode && $giftprice_id_decode != ""){

				$giftprice_dataas = GiftCardPrice::wherenull('deleted_at')-> where('id', $giftprice_id_decode)->first();
				$giftprice_dataas->update($giftpriceInfo);
				return Redirect('/view_giftprice')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = GiftCardPrice::create($giftpriceInfo);
			return Redirect('/view_giftprice')->with('status', 'Data Added Successfully.');
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
