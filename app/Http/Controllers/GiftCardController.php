<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\GiftCard;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class GiftCardController extends Controller
{
    public function view_giftcard(Request $req)
    {
        if (!empty($req->session()->has('admin_data'))) {
            $giftcarddetails = GiftCard::wherenull('deleted_at')->get();

            return view('admin/giftcard/view_giftcard', ['giftcarddetails' => $giftcarddetails]);
        } else {
            return view('admin/login/index');
        }
    }

    public function add_giftcard_view(Request $req)
    {
        if (!empty($req->session()->has('admin_data'))) {
            return view('admin/giftcard/add_giftcard');
        } else {
            return view('admin/login/index');
        }
    }

    public function update_giftcard_view($idd, Request $req)
    {
        if (!empty($req->session()->has('admin_data'))) {
            $id= base64_decode($idd);

            $giftcard_data = GiftCard::wherenull('deleted_at')-> where('id', $id)->first();

            return view('admin/giftcard/update_giftcard', ['giftcard_data' => $giftcard_data]);
        } else {
            return view('admin/login/index');
        }
    }


    public function update_giftcard_status($status, $idd, Request $req)
    {
        if (!empty($req->session()->has('admin_data'))) {
            log::debug('update_status');
            log::debug($status);
            log::debug($idd);

            $id= base64_decode($idd);
            if ($status == "active") {
                $giftCardStatusInfo= [
                    'is_active' =>1,
                ];

                $giftcardData = GiftCard::wherenull('deleted_at')-> where('id', $id)->first();
                log::debug($giftcardData);

                $giftcardData->update($giftCardStatusInfo);
            } else {
                $giftCardStatusInfo= [

                    'is_active' =>0,


                ];

                $giftcardData = GiftCard::wherenull('deleted_at')-> where('id', $id)->first();
                log::debug($giftcardData);
                $giftcardData->update($giftCardStatusInfo);
            }

            return Redirect('/view_giftcard')->with('status', 'Status Updated Successfully.');
        } else {
            return view('admin/login/index');
        }
    }


    public function deleteGiftCard($idd, Request $req)
    {
        if (!empty($req->session()->has('admin_data'))) {
            log::debug('$deleteGiftCard');
            log::debug($idd);

            $id= base64_decode($idd);
            $GiftCardData = GiftCard::wherenull('deleted_at')-> where('id', $id)->first();

            log::debug($GiftCardData);
            $GiftCardData->delete();

            return Redirect('/view_giftcard')->with('status', 'Data Deleted Successfully.');
        } else {
            return view('admin/login/index');
        }
    }

    public function add_giftCard_process(Request $req)
     {

 if(!empty($req->session()->has('admin_data'))){

   $admin_id= $req->session()->get('admin_id');
       $giftCard_id = base64_decode('id');

   		$giftCard_id= base64_decode($giftCard_id);


       log::debug( 'no Id');
       $req->validate([
         'name' => 'required',
         'description' => 'required',
         'price' => 'required'

     ]);

     log::debug('$addAdmin');

     if($req->hasFile('img')) {
                   $images =   $req->file('img');

   									if(!empty($images)){
                       $filename = 'GiftCard'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                       $filePath = public_path('uploads/GiftCardUploads');
                       $images->move($filePath, $filename);

   										$fullimagepath= "uploads/GiftCardUploads/".$filename;
   									}else{

   										$GiftCard= GiftCard::wherenull('deleted_at')-> where('id', $giftCard_id)->first();
   											if(!empty($giftCard_id) && !empty($GiftCard)){
   												$fullimagepath= $GiftCard->image;
   											}else{
   												$fullimagepath= "";
   											}

   									}

               }
   						else{
   							$GiftCard= GiftCard::wherenull('deleted_at')-> where('id', $giftCard_id)->first();
   								if(!empty($giftCard_id) && !empty($GiftCard)){
   									$fullimagepath= $GiftCard->image;
   								}else{
   									$fullimagepath= "";
   								}
   						}
// echo $fullimagepath;die();
     $giftCardInfo= [

       'name' => $req->input('name'),
       'description' => $req->input('description'),
       'price' => $req->input('price'),
       'image' => $fullimagepath,
       'added_by' => $admin_id,
       'is_active' => 1,

     ];


     if($giftCard_id && $giftCard_id != ""){
       // echo $giftCard_id;
       // exit;

         $giftCard_dataas = GiftCard::wherenull('deleted_at')-> where('id', $giftCard_id)->first();
         $giftCard_dataas->update($giftCardInfo);
         return Redirect('/view_giftcard')->with('status', 'Data Updated Successfully.');

     }
     else{

       $last_id = GiftCard::create($giftCardInfo);
       return Redirect('/view_giftcard')->with('status', 'Data Added Successfully.');
     }


   }else{
    return view('admin/login/index');
   }

         //return response()->json(['response' => 'OK']);
     }
}
