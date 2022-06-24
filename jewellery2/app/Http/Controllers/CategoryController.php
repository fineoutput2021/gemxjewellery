<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
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

class CategoryController extends Controller
{


	  public function add_category_view(Request $req){

		//$Team_data= Team::wherenull('deleted_at')->get();
  if(!empty($req->session()->has('admin_data'))){

		return view('admin/category/add_category');

	}else{
    return view('admin/login/index');
  }

    }

		public function update_category_view($id,Request $req){

  if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$CategoryData = Category::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/category/update_category',['cate_data' => $CategoryData ]);

	}else{
		return view('admin/login/index');
	}

		}



	  public function view_category(Request $req){

  if(!empty($req->session()->has('admin_data'))){
		  //$Category_data= Category::wherenull('deleted_at')->get();
			$Category_data= Category::wherenull('deleted_at')->get();

			return view('admin/category/view_category',['categorydetails' => $Category_data]);

		}else{
			return view('admin/login/index');
		}

    }

		public function update_cat_status($status,$idd,Request $req ){

  if(!empty($req->session()->has('admin_data'))){
			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);


	$id = base64_decode($idd);

		if($status == "active"){

			$categoryStatusInfo= [

				'is_active' =>1,


			];


					$CategoryData = Category::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $CategoryData);

				$CategoryData->update($categoryStatusInfo);



//SubCategory is_active 1 update
				$subCatData = SubCategory::wherenull('deleted_at')-> where('category_id', $id)-> where('is_active', 0)->get();

				if(!empty($subCatData)){
							foreach ($subCatData as $subcat) {

								$subcatDelInfo= [

									'is_active' =>1,

								];
								$subData = SubCategory::wherenull('deleted_at')-> where('id', $subcat->id)->first();
								// $ProCartData->delete();
								$subData->update($subcatDelInfo);


							}
				}



//product is_active 1 update
						$proData = Product::wherenull('deleted_at')-> where('category', $id)-> where('is_active', 0)->get();

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

			$categoryStatusInfo= [

				'is_active' =>0,


			];

			$CategoryData = Category::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $CategoryData);
			$CategoryData->update($categoryStatusInfo);




//SubCategory is_active 0 update
				$subCatData = SubCategory::wherenull('deleted_at')-> where('category_id', $id)-> where('is_active', 1)->get();

				if(!empty($subCatData)){
							foreach ($subCatData as $subcat) {

								$subcatDelInfo= [

									'is_active' =>0,

								];
								$subData = SubCategory::wherenull('deleted_at')-> where('id', $subcat->id)->first();
								// $ProCartData->delete();
								$subData->update($subcatDelInfo);


							}
				}



//product is_active 0 update
				$proData = Product::wherenull('deleted_at')-> where('category', $id)-> where('is_active', 1)->get();

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


			return Redirect('/view_category')->with('status', 'Status Updated Successfully.');


		}else{
			return view('admin/login/index');
		}


		}



		public function deleteCategory($idd,Request $req){
				// $member_Id= $req->input('memberId');

  if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				log::debug('$deletecategory');
				log::debug($id);
				$CategoryData = Category::wherenull('deleted_at')-> where('id', $id)->first();
				$img= $CategoryData->image;


				log::debug($CategoryData);
				$CategoryData->delete();

				unlink( $img );


//SubCategory is_cat_delete update
	$subCatData = SubCategory::wherenull('deleted_at')-> where('category_id', $id)-> where('is_cat_delete', 0)->get();

	if(!empty($subCatData)){
				foreach ($subCatData as $subcat) {

					$subcatDelInfo= [

						'is_cat_delete' =>1,

					];
					$subData = SubCategory::wherenull('deleted_at')-> where('id', $subcat->id)->first();
					// $ProCartData->delete();
					$subData->update($subcatDelInfo);


				}
	}

	//product is_cat_delete update
		$proData = Product::wherenull('deleted_at')-> where('category', $id)-> where('is_cat_delete', 0)->get();

		if(!empty($proData)){
					foreach ($proData as $pro) {

						$proDelInfo= [

							'is_cat_delete' =>1,

						];
						$prodData = Product::wherenull('deleted_at')-> where('id', $pro->id)->first();
						// $ProCartData->delete();
						$prodData->update($proDelInfo);



						// cart products deletes if product delete
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



		       return Redirect('/view_category')->with('status', 'Data Deleted Successfully.');

				 }else{
				 	return view('admin/login/index');
				 }

		    }



	 public function add_category_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_category_id = $req->input('id');

		$category_id= base64_decode($enc_category_id);


		if($category_id && $category_id != ""){

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
                    $filename = 'Category'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/CategoryUploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/CategoryUploads/".$filename;
									}else{

										$Cat= Category::wherenull('deleted_at')-> where('id', $category_id)->first();
											if(!empty($category_id) && !empty($Cat)){
												$fullimagepath= $Cat->image;
											}else{
												$fullimagepath= "";
											}

									}

            }
						else{
							$Cat= Category::wherenull('deleted_at')-> where('id', $category_id)->first();
								if(!empty($category_id) && !empty($Cat)){
									$fullimagepath= $Cat->image;
								}else{
									$fullimagepath= "";
								}
						}
// log::debug($filename); die();

		$categoryInfo= [

			'name' => $req->input('name'),

			'image' => $fullimagepath,
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($category_id && $category_id != ""){

				$updated_last_id = Category::wherenull('deleted_at')-> where('id', $category_id)->first();
				$updated_last_id->update($categoryInfo);
				return Redirect('/view_category')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Category::create($categoryInfo);
			return Redirect('/view_category')->with('status', 'Data Added Successfully.');
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
