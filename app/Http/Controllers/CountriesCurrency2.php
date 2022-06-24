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
  use App\adminmodel\CountriesCurrency;
  use DB;
  use Image;
  use Redirect;
  use Illuminate\Support\Facades\Hash;
  use Illuminate\Support\Facades\Crypt;
  //use Crypt;
  use Mail;
  use Log;
  use session;

  class CountriesCurrency2 extends Controller
  {


	  public function add_currency_view( Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/currency/add_currency' );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_currency_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

		$CurrencyData = CountriesCurrency::wherenull('deleted_at')-> where('id', $id)->first();

		return view('admin/currency/update_currency' ,['currency_data' => $CurrencyData] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_currency(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Currency_data= CountriesCurrency::wherenull('deleted_at')->get();

		return view('admin/currency/view_currency',['currencydetails' => $Currency_data]);

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_currency_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);



		if($status == "active"){

			$currencyStatusInfo= [

				'is_active' =>1,


			];


					$CurrencyData = CountriesCurrency::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $CurrencyData);

				$CurrencyData->update($currencyStatusInfo);







		}
		else{

			$currencyStatusInfo= [

				'is_active' =>0,


			];

			$CurrencyData = CountriesCurrency::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $CurrencyData);
			$CurrencyData->update($currencyStatusInfo);



		}


			return Redirect('/view_currency')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteCurrency( $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deletecurrency');
				log::debug($idd);

					$id= base64_decode($idd);

				$CurrencyData = CountriesCurrency::wherenull('deleted_at')-> where('id', $id)->first();



				log::debug($CurrencyData);
				$CurrencyData->delete();






		       return Redirect('/view_currency')->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_currency_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
			$currency_id = $req->input('currency_id');
			$currency_id_decode = base64_decode($currency_id);


			log::debug( 'no Id');
			$req->validate([
				'country' => 'required',
					'sign' => 'required ',
					'currency_price' => 'required ',

		]);

		log::debug('$addAdmin');


		$currencyInfo= [

			'country' => $req->input('country'),
			'sign' => $req->input('sign'),
			'currency_price' => $req->input('currency_price'),

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($currency_id_decode && $currency_id_decode != ""){

				$currency_dataas = CountriesCurrency::wherenull('deleted_at')-> where('id', $currency_id_decode)->first();
				$currency_dataas->update($currencyInfo);
				return Redirect('/view_currency')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = CountriesCurrency::create($currencyInfo);
			return Redirect('/view_currency')->with('status', 'Data Added Successfully.');
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
