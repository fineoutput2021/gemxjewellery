<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\Catelogue;
use App\adminmodel\GiftCard;
use App\adminmodel\Blog;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class BlogController extends Controller
{


	  public function add_blog_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		//$Team_data= Team::wherenull('deleted_at')->get();

		return view('admin/blog/add_blog');

	}else{
	 return view('admin/login/index');
	}

    }

		public function update_blog_view($id, Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$BlogData = Blog::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/blog/update_blog',['blog_data' => $BlogData ]);

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_blog(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$Blog_data= Blog::wherenull('deleted_at')->get();

			return view('admin/blog/view_blog',['blogdetails' => $Blog_data]);

		}else{
		 return view('admin/login/index');
		}

    }

		public function update_blog_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

	$id = base64_decode($idd);

		if($status == "active"){

			$blogStatusInfo= [

				'is_active' =>1,


			];


					$BlogData = Blog::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $BlogData);

				$BlogData->update($blogStatusInfo);








		}
		else{

			$blogStatusInfo= [

				'is_active' =>0,


			];

			$BlogData = Blog::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $BlogData);
			$BlogData->update($blogStatusInfo);


		}


			return Redirect('/view_blog')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteBlog($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				log::debug('$deleteBlog');
				log::debug($id);
				$BlogData = Blog::wherenull('deleted_at')-> where('id', $id)->first();
				$img= $BlogData->image;


				log::debug($BlogData);
				$BlogData->delete();

				unlink( $img );



		       return Redirect('/view_blog')->with('status', 'Data Deleted Successfully.');


				 }else{
				  return view('admin/login/index');
				 }

		    }



	 public function add_blog_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_blog_id = $req->input('id');

		$blog_id= base64_decode($enc_blog_id);


		if($blog_id && $blog_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'heading' => 'required',

			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
				'heading' => 'required',
				'img' => 'required',
				'content' => 'required'


		]);
		}
		log::debug('$addblog');


	if($req->hasFile('img')) {
                $images =   $req->file('img');

									if(!empty($images)){
                    $filename = 'Blog'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/BlogUploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/BlogUploads/".$filename;
									}else{

										$GC = Blog::wherenull('deleted_at')-> where('id', $blog_id)->first();
											if(!empty($blog_id) && !empty($GC)){
												$fullimagepath= $GC->image;
											}else{
												$fullimagepath= "";
											}

									}

            }
						else{
							$GC = Blog::wherenull('deleted_at')-> where('id', $blog_id)->first();
								if(!empty($blog_id) && !empty($GC)){
									$fullimagepath= $GC->image;
								}else{
									$fullimagepath= "";
								}
						}
// log::debug($filename); die();

		$blogInfo= [

			'heading' => $req->input('heading'),
			'image' => $fullimagepath,
			'content' => $req->input('content'),
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($blog_id && $blog_id != ""){

				$updated_last_id = Blog::wherenull('deleted_at')-> where('id', $blog_id)->first();
				$updated_last_id->update($blogInfo);
				return Redirect('/view_blog')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Blog::create($blogInfo);
			return Redirect('/view_blog')->with('status', 'Data Added Successfully.');
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
