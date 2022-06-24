<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Homepage_imgs;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class Homepage_images extends Controller
{


	  public function view_homepage_img(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$homapage_data= Homepage_imgs::wherenull('deleted_at')->where('is_active',1)->get();
// print_r($homapage_data);
// exit;
			return view('admin/homepage_images/view_homepage_img',['homapage_data' => $homapage_data]);

		}else{
		 return view('admin/login/index');
		}


    }
    public function add_homapge_img_view(Request $req){

    //$Team_data= Team::wherenull('deleted_at')->get();
  if(!empty($req->session()->has('admin_data'))){

    return view('admin/homepage_images/add_homepage_image');

  }else{
    return view('admin/login/index');
  }

    }

    public function update_homapge_img_view($id,Request $req){

  if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$homapage_data = Homepage_imgs::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/homepage_images/update_homapge_img',['homapage_data' => $homapage_data ]);

	}else{
		return view('admin/login/index');
	}

		}

    public function add_homepage_img_process(Request $req)
     {

 if(!empty($req->session()->has('admin_data'))){

 $admin_id= $req->session()->get('admin_id');
     $enc_image_id = $req->input('id');

     $image_id= base64_decode($enc_image_id);



   if($req->hasFile('image')) {
                 $image =   $req->file('image');

                   if(!empty($image)){
                     $filename = 'Homepage_img'.rand(1111, 9999) . time() . '.' . strtolower($image->getClientOriginalExtension());
                     $filePath = public_path('uploads/Homepage_imgUploads');
                     $image->move($filePath, $filename);

                     $fullimagepath= "uploads/Homepage_imgUploads/".$filename;
                   }else{

                     $hp= Homepage_imgs::wherenull('deleted_at')-> where('id', $image_id)->first();
                       if(!empty($image_id) && !empty($hp)){
                         $fullimagepath= $hp->image;
                       }else{
                         $fullimagepath= "";
                       }

                   }

             }
             else{
               $hp= Homepage_imgs::wherenull('deleted_at')-> where('id', $image_id)->first();
                 if(!empty($image_id) && !empty($hp)){
                   $fullimagepath= $hp->image;
                 }else{
                   $fullimagepath= "";
                 }
             }

   if($req->hasFile('image2')) {
                 $image2 =   $req->file('image2');

                   if(!empty($image2)){
                     $filename = 'Homepage_img2'.rand(1111, 9999) . time() . '.' . strtolower($image2->getClientOriginalExtension());
                     $filePath = public_path('uploads/Homepage_imgUploads');
                     $image2->move($filePath, $filename);

                     $fullimagepath2= "uploads/Homepage_imgUploads/".$filename;
                   }else{

                     $hp= Homepage_imgs::wherenull('deleted_at')-> where('id', $image_id)->first();
                       if(!empty($image_id) && !empty($hp)){
                         $fullimagepath2= $hp->image2;
                       }else{
                         $fullimagepath2= "";
                       }

                   }

             }
             else{
               $hp= Homepage_imgs::wherenull('deleted_at')-> where('id', $image_id)->first();
                 if(!empty($image_id) && !empty($hp)){
                   $fullimagepath2= $hp->image2;
                 }else{
                   $fullimagepath2= "";
                 }
             }

   if($req->hasFile('image3')) {
                 $image3 =   $req->file('image3');

                   if(!empty($image3)){
                     $filename = 'Homepage_img'.rand(1111, 9999) . time() . '.' . strtolower($image3->getClientOriginalExtension());
                     $filePath = public_path('uploads/Homepage_imgUploads');
                     $image3->move($filePath, $filename);

                     $fullimagepath3= "uploads/Homepage_imgUploads/".$filename;
                   }else{

                     $hp= Homepage_imgs::wherenull('deleted_at')-> where('id', $image_id)->first();
                       if(!empty($image_id) && !empty($hp)){
                         $fullimagepath3= $hp->image3;
                       }else{
                         $fullimagepath3= "";
                       }

                   }

             }
             else{
               $hp= Homepage_imgs::wherenull('deleted_at')-> where('id', $image_id)->first();
                 if(!empty($image_id) && !empty($hp)){
                   $fullimagepath3= $hp->image3;
                 }else{
                   $fullimagepath3= "";
                 }
             }
 // log::debug($filename); die();

     $HomeInfo= [
       'image' => $fullimagepath,
       'image2' => $fullimagepath2,
       'image3' => $fullimagepath3,
       'ip' => $req->ip(),
       'added_by' => $admin_id,
       'is_active' => 1,

     ];


     if($image_id && $image_id != ""){

         $updated_last_id = Homepage_imgs::wherenull('deleted_at')-> where('id', $image_id)->first();
         $updated_last_id->update($HomeInfo);
         return Redirect('/view_homepage_img')->with('status', 'Data Updated Successfully.');

     }
     else{

       $last_id = Homepage_imgs::create($HomeInfo);
       return Redirect('/view_homepage_img')->with('status', 'Data Added Successfully.');
     }


   }else{
     return view('admin/login/index');
   }


         //return response()->json(['response' => 'OK']);
     }


}
