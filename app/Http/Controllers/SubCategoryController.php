<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\SubCategory;
use App\adminmodel\Category;
use App\adminmodel\Product;
use App\frontendmodel\Cart;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class SubCategoryController extends Controller
{


	  public function add_subcategory_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		//$Team_data= Team::wherenull('deleted_at')->get();
	$Category_data= Category::wherenull('deleted_at')->get();
		return view('admin/subcategory/add_subcategory',['category_data' => $Category_data]);

	}else{
    return view('admin/login/index');
  }

    }

		public function update_subcategory_view($id,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$subcategoryData = SubCategory::wherenull('deleted_at')-> where('id', $id_decode)->first();
    $Category_data= Category::wherenull('deleted_at')->get();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/subcategory/update_subcategory',['subcate_data' => $subcategoryData, 'category_data' => $Category_data ]);

	}else{
    return view('admin/login/index');
  }


		}



	  public function view_subcategory(Request $req){

if(!empty($req->session()->has('admin_data'))){

		  //$Category_data= Category::wherenull('deleted_at')->get();
			$Category_data= Category::wherenull('deleted_at')->get();
			$SubCategory_data= SubCategory::wherenull('deleted_at')->where('is_cat_delete', 0)->get();

			return view('admin/subcategory/view_subcategory',['categorydetails' => $Category_data, 'subcategorydetails' => $SubCategory_data]);

		}else{
	    return view('admin/login/index');
	  }

    }

		public function update_subcategory_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

	$id = base64_decode($idd);

		if($status == "active"){

			$subcategoryStatusInfo= [

				'is_active' =>1,


			];


					$subcategoryData = SubCategory::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $subcategoryData);

				$subcategoryData->update($subcategoryStatusInfo);



//product is_active 1 update
	$proData = Product::wherenull('deleted_at')-> where('sub_category_id', $id)-> where('is_active', 0)->get();

	if(!empty($proData)){
				foreach ($proData as $pro) {

					$proDelInfo= [

						'is_active' =>1,

					];
					$prodData = Product::wherenull('deleted_at')-> where('id', $pro->id)->first();
					// $ProCartData->delete();
					$prodData->update($proDelInfo);




// newarrival products updates if product delete
	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();

if(!empty($arrivalData)){
			foreach ($arrivalData as $arrival) {

				$proArriveInfo= [

					'is_active' =>1,

				];
				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
				// $ProCartData->delete();
				$newArrivData->update($proArriveInfo);

			}
}

// clearance products updates if product delete
	$ClearanceData = Clearance:: where('product_id', $pro->id)->where('is_active', 0)->get();

if(!empty($ClearanceData)){
			foreach ($ClearanceData as $clearance) {

				$proClearnceInfo= [

					'is_active' =>1,

				];
				$clearancData = Clearance:: where('id', $clearance->id)->first();
				$clearancData->update($proClearnceInfo);

			}
}



				}
	}



		}
		else{

			$subcategoryStatusInfo= [

				'is_active' =>0,


			];

			$subcategoryData = SubCategory::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $subcategoryData);
			$subcategoryData->update($subcategoryStatusInfo);



//product is_active 0 update
		$proData = Product::wherenull('deleted_at')-> where('sub_category_id', $id)-> where('is_active', 1)->get();

		if(!empty($proData)){
					foreach ($proData as $pro) {

						$proDelInfo= [

							'is_active' =>0,

						];
						$prodData = Product::wherenull('deleted_at')-> where('id', $pro->id)->first();
						// $ProCartData->delete();
						$prodData->update($proDelInfo);



						// cart products delete if product delete
							$CartData = Cart::wherenull('deleted_at')-> where('product_id', $pro->id)->where('status', 0)->get();

						if(!empty($CartData)){
									foreach ($CartData as $cart) {

										$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
										$ProCartData->delete();

									}
						}


						// newarrival products updates if product delete
							$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 1)->get();

						if(!empty($arrivalData)){
									foreach ($arrivalData as $arrival) {

										$proArriveInfo= [

											'is_active' =>0,

										];
										$newArrivData = NewArrival:: where('id', $arrival->id)->first();
										// $ProCartData->delete();
										$newArrivData->update($proArriveInfo);

									}
						}

						// clearance products updates if product delete
							$ClearanceData = Clearance:: where('product_id', $pro->id)->where('is_active', 1)->get();

						if(!empty($ClearanceData)){
									foreach ($ClearanceData as $clearance) {

										$proClearnceInfo= [

											'is_active' =>0,

										];
										$clearancData = Clearance:: where('id', $clearance->id)->first();
										$clearancData->update($proClearnceInfo);

									}
						}


					}
		}



		}


			return Redirect('/view_subcategory')->with('status', 'Status Updated Successfully.');


		}else{
	    return view('admin/login/index');
	  }


		}



		public function deletesubcategory($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				// $member_Id= $req->input('memberId');
					$id = base64_decode($idd);
				log::debug('$deletesubcategory');
				log::debug($id);
				$subcategoryData = SubCategory::wherenull('deleted_at')-> where('id', $id)->first();
				$img= $subcategoryData->image;


				log::debug($subcategoryData);
				$subcategoryData->delete();

				unlink( $img );


//product is_subcat_delete update
					$proData = Product::wherenull('deleted_at')-> where('sub_category_id', $id)-> where('is_subcat_delete', 0)->get();

					if(!empty($proData)){
								foreach ($proData as $pro) {

									$proDelInfo= [

										'is_subcat_delete' =>1,

									];
									$prodData = Product::wherenull('deleted_at')-> where('id', $pro->id)->first();
									// $ProCartData->delete();
									$prodData->update($proDelInfo);



									// cart products delete if product delete
										$CartData = Cart::wherenull('deleted_at')-> where('product_id', $pro->id)->where('status', 0)->get();

									if(!empty($CartData)){
												foreach ($CartData as $cart) {

													$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
													$ProCartData->delete();

												}
									}



									// newarrival products deletes if product delete
										$arrivalData = NewArrival:: where('product_id', $pro->id)->get();

									if(!empty($arrivalData)){
												foreach ($arrivalData as $arrival) {

													$ProArrivalData = NewArrival::where('id', $arrival->id)->first();
													$ProArrivalData->delete();

												}
									}

									// clearance products deletes if product delete
										$ClearanceData = Clearance:: where('product_id', $pro->id)->get();

									if(!empty($ClearanceData)){
												foreach ($ClearanceData as $clearance) {

													$ProClearanceData = Clearance:: where('id', $clearance->id)->first();
													$ProClearanceData->delete();

												}
									}




								}
					}




		       return Redirect('/view_subcategory')->with('status', 'Data Deleted Successfully.');

				 }else{
			     return view('admin/login/index');
			   }


		    }



	 public function add_subcategory_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_subcategory_id = $req->input('id');

		$subcategory_id= base64_decode($enc_subcategory_id);


		if($subcategory_id && $subcategory_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'name' => 'required',

			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',
		]);
		}
		log::debug('$addCategory');


	if($req->hasFile('img')) {
                $images =   $req->file('img');

								if(!empty($images)){
                    $filename = 'SubCategory'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/SubCategoryUploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/SubCategoryUploads/".$filename;
									}else{

									$Sub_cat= SubCategory::wherenull('deleted_at')-> where('id', $subcategory_id)->first();
										if(!empty($subcategory_id) && !empty($Sub_cat)){
											$fullimagepath= $Sub_cat->image;
										}else{
											$fullimagepath= "";
										}

									}
            }
						else{
							$Sub_cat= SubCategory::wherenull('deleted_at')-> where('id', $subcategory_id)->first();
								if(!empty($subcategory_id) && !empty($Sub_cat)){
									$fullimagepath= $Sub_cat->image;
								}else{
									$fullimagepath= "";
								}
						}


		$subcategoryInfo= [
      'category_id' => $req->input('category_id'),
			'name' => $req->input('name'),

			'image' => $fullimagepath,
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($subcategory_id && $subcategory_id != ""){

				$updated_last_id = SubCategory::wherenull('deleted_at')-> where('id', $subcategory_id)->first();
				$updated_last_id->update($subcategoryInfo);
				return Redirect('/view_subcategory')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = SubCategory::create($subcategoryInfo);
			return Redirect('/view_subcategory')->with('status', 'Data Added Successfully.');
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
