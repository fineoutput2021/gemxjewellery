<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Team;
use App\adminmodel\AdminSidebar;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class TeamController extends Controller
{

	  public function admin_index(Request $req){

		log::debug('$admin-index');
if(!empty($req->session()->has('admin_data'))){

        return view('admin/index');
}else{
	return view('admin/login/index');
}

    }

	  public function add_team_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		$service_data= AdminSidebar::get();

		return view('admin/team/add_team' , compact('service_data') );

	}else{
		return view('admin/login/index');
	}

    }


	  public function view_team(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  $Team_data= Team::wherenull('deleted_at')->get();

		return view('admin/team/view_team',['teamdetails' => $Team_data]);

	}else{
		return view('admin/login/index');
	}

    }

		public function update_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$id= base64_decode($idd);
			$admin_id= $req->session()->get('admin_id');
			$admin_position= $req->session()->get('position');

			if($id==$admin_id){

					 return Redirect('/view_team')->with('status-error', "Sorry You can't change status of yourself.");
				 }




if($admin_position == "Super Admin"){


			if($status == "active"){

				$teamStatusInfo= [

					'is_active' =>1,


				];


						$TeamData = Team::wherenull('deleted_at')-> where('id', $id)->first();
					log::debug( $TeamData);

					$TeamData->update($teamStatusInfo);

			}
			else{

				$teamStatusInfo= [

					'is_active' =>0,


				];

				$TeamData = Team::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $TeamData);
				$TeamData->update($teamStatusInfo);
			}


				return Redirect('/view_team')->with('status', 'Status Updated Successfully.');


}else{

	return Redirect('/view_team')->with('status-error', "Sorry you dont have Permission to change admin, Only Super admin can change status.");

}


		}else{
			return view('admin/login/index');
		}


		}



		public function deleteTeam($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deleteteam');
				log::debug($idd);

					$id= base64_decode($idd);
					$admin_id= $req->session()->get('admin_id');
					$admin_position= $req->session()->get('position');

					if($id==$admin_id){

							 return Redirect('/view_team')->with('status-error', "Sorry You can't delete yourself.");
			 			 }


if($admin_position == "Super Admin"){

		$TeamData = Team::wherenull('deleted_at')-> where('id', $id)->first();
			if(!empty($TeamData))	{
						 $img= $TeamData->image;


										log::debug($TeamData);
										$TeamData->delete();

								if(!empty($img)){
									 	unlink( $img );
								}



				return Redirect('/view_team')->with('status', 'Data Deleted Successfully.');

		}else{
			 return Redirect('/view_team')->with('status-error', 'Some Error Occurred.');
		}

}else{

	return Redirect('/view_team')->with('status-error', "Sorry You Don't Have Permission To Delete Anything.");

}

				 }else{
				 	return view('admin/login/index');
				 }

		    }



	 public function add_team_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){


$admin_id= $req->session()->get('admin_id');

			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',
					'email' => 'required|unique:tbl_team|email',
					'password' => 'required',
					'power' => 'required '
		]);


//check for services
	$service= $req->input('service');
	$services= $req->input('services');

	if($service== 999){
		$ser='["999"]';
	}
	else{
		$ser=json_encode($services);
	}


$fullimagepath="";
 if($req->hasFile('img')) {
							 $images =   $req->file('img');

if(!empty($images)){

									 $filename = 'Team'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
									 $filePath = public_path('uploads/TeamUploads');
									 $images->move($filePath, $filename);


					 }

$fullimagepath= "uploads/TeamUploads/".$filename;
}

		$teamInfo= [

			'name' => $req->input('name'),
			'email' => $req->input('email'),
			'phone' => $req->input('phone'),
			'password' => md5($req->input('password')),
			'address' => $req->input('address'),
			'services' => $ser,
			'power' => $req->input('power'),
			'image' => $fullimagepath,
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


			$last_id = Team::create($teamInfo);
			return Redirect('/view_team')->with('status', 'Data Added Successfully.');



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
