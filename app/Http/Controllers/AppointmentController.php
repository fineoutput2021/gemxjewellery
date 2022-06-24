<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Appointment;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class AppointmentController extends Controller
{


	  public function view_appointment(Request $req){

if(!empty($req->session()->has('admin_data'))){

  $appointment_data = Appointment::wherenull('deleted_at')->get();


  return view('admin/appointment/view_appointment',['appointment_data' => $appointment_data ]);

	}else{
	 return view('admin/login/index');
	}

    }


}
