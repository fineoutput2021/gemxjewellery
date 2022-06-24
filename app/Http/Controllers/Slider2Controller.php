<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\Catelogue;
use App\adminmodel\Slider;
use App\adminmodel\Slider2;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class Slider2Controller extends Controller
{




		public function update_slider2_view($id, Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$SliderData = Slider2::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/slider2/update_slider',['slider_data' => $SliderData ]);

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_slider2(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$Slider_data= Slider2::wherenull('deleted_at')->get();

			return view('admin/slider2/view_slider',['sliderdetails' => $Slider_data]);

		}else{
		 return view('admin/login/index');
		}

    }





	 public function update_slider2_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_slider_id = $req->input('id');

		$slider_id= base64_decode($enc_slider_id);




				log::debug( 'yes Id');
			$req->validate([
			'name' => 'required',
			'link' => 'required'

			]);

		log::debug('$addslider2');


	if($req->hasFile('img')) {
                $images =   $req->file('img');

									if(!empty($images)){
                    $filename = 'Slider2'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/Slider2Uploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/Slider2Uploads/".$filename;
									}else{

										$slide= Slider2::wherenull('deleted_at')-> where('id', $slider_id)->first();
											if(!empty($slider_id) && !empty($slide)){
												$fullimagepath= $slide->image;
											}else{
												$fullimagepath= "";
											}

									}

            }
						else{
							$slide= Slider2::wherenull('deleted_at')-> where('id', $slider_id)->first();
								if(!empty($slider_id) && !empty($slide)){
									$fullimagepath= $slide->image;
								}else{
									$fullimagepath= "";
								}
						}
// log::debug($filename); die();

		$sliderInfo= [

			'name' => $req->input('name'),
			'link' => $req->input('link'),
			'image' => $fullimagepath,
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($slider_id && $slider_id != ""){

				$updated_last_id = Slider2::wherenull('deleted_at')-> where('id', $slider_id)->first();
				$updated_last_id->update($sliderInfo);
				return Redirect('/view_slider2')->with('status', 'Data Updated Successfully.');

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
