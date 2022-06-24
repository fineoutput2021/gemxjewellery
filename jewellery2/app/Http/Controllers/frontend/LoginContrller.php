<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\ProductColorSize;
use App\adminmodel\Color;
use App\adminmodel\Size;
use App\adminmodel\CustomOrder;
use App\adminmodel\WholesaleInquiry;
use App\adminmodel\Contact;
use App\adminmodel\Countries;
// use App\adminmodel\Cart;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;

class LoginController extends Controller
{

	  public function index(Request $req){

		log::debug('frontend-index');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
log::debug($categories);

        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/index', ['category_data'=>$categories]);


    }




		public function all_products($idd,Request $req){

$id= base64_decode($idd);
		log::debug('frontend-index');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$sub_all_products = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->get();
log::debug($sub_all_products);

        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/all_product', ['category_data'=>$categories, 'subcategory_pro_data'=>$sub_all_products]);


    }


		public function products_view( $idd, Request $req){

		log::debug('frontend-index');
$id= base64_decode($idd);

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$product = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('id', $id)->first();
log::debug($product);

        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/product_view', ['category_data'=>$categories, 'product_data'=>$product]);


    }


		public function get_color_data(Request $req){

		log::debug('get_color_data');

		$size_id= $req->input('size_id');
		$product_id= $req->input('product_id');
		// $id= $req->input('sale_product_id');
			// $id = base64_decode($idd);

		// $productColordata = ProductColorSize::wherenull('deleted_at')-> where('product_id', $product_id)-> where('size_id', $size_id)->get();
		$productColordata = ProductColorSize::leftjoin('tbl_colors', 'tbl_product_color_size.color_id', '=', 'tbl_colors.id')
									->where('tbl_product_color_size.product_id', '=', $product_id)
									->where('tbl_product_color_size.size_id', '=', $size_id)
									->where('tbl_product_color_size.deleted_at', '=', null)
									->where('tbl_colors.deleted_at', '=', null)
									->select('tbl_colors.name', 'tbl_product_color_size.*')
									->get();



		// wherenull('deleted_at')-> where('product_id', $product_id)-> where('size_id', $size_id)->get();
		// $img= $PromocodeData->image;


		log::debug('$productColordata');
		log::debug($productColordata);
		// $saleproData->delete();


		// unlink( $img );
		$data['data'] = true;
		$data['productColordata'] = $productColordata;



		echo json_encode($data);


    }

// contact form page
public function view_contact_page(Request $req){

log::debug('view_contact_page');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$contries= Countries::get();
log::debug($contries);

		return view('frontend/contact', ['category_data'=>$categories ,'countrydata'=>$contries  ]);
}





//add contact form process

public function add_contact_process(Request $req)
 {

		 log::debug( 'yes Id');
	 $req->validate([
	 'name' => 'required',
	 'email' => 'required|email|unique:tbl_contact,email',
	 'message' => 'required',

	 ]);



 $contactInfo= [

	 'name' => $req->input('name'),
	 'email' => $req->input('email'),
	 'contact_number' => $req->input('contact_number'),
	 'message' => $req->input('message'),

	 'ip' => $req->ip()

 ];




	 $last_id = Contact::create($contactInfo);
	 return Redirect('/view_contact_page')->with('status', 'Thankyou for contact us, We will get back to you.');






 }




 // Wholesale Inquery form  page
 public function view_wholesale_inquiry_page(Request $req){

 log::debug('view_wholesale_inquiry_page');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$contries= Countries::get();
log::debug($contries);
 		return view('frontend/wholesale_inquiry',  ['category_data'=>$categories,'countrydata'=>$contries ]);
 }





 //add Wholesale Inquery form process

 public function add_wholesale_inquery_process(Request $req)
  {

 		 log::debug( 'yes Id');
 	 $req->validate([
 	 'name' => 'required',
 	 'business_name' => 'required',
 	 'email' => 'required|email|unique:tbl_wholesale_inquiry,email',
 	 'message' => 'required',

 	 ]);


  $InquiryInfo= [

 	 'name' => $req->input('name'),
 	 'business_name' => $req->input('business_name'),
 	 'email' => $req->input('email'),
 	 'contact_number' => $req->input('contact_number'),
 	 'country' => $req->input('country'),
 	 'message' => $req->input('message'),

 	 'ip' => $req->ip()

  ];




 	 $last_id = WholesaleInquiry::create($InquiryInfo);
 	 return Redirect('/view_wholesale_inquiry_page')->with('status', 'Thankyou for contact us, We will get back to you.');






  }




	 // custom order form page
	 public function view_custom_order_page(Request $req){

	 log::debug('view_custom_order_page');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$contries= Countries::get();
log::debug($contries);


	 		return view('frontend/custom_order', ['category_data'=>$categories ,'countrydata'=>$contries ]);
	 }



	 //add custom order form process

	 public function add_custom_order_process(Request $req)
	  {

	 		 log::debug( 'yes Id');
	 	 $req->validate([
	 	 'name' => 'required',
	 	 'email' => 'required|email|unique:tbl_custom_order,email',
	 	 'message' => 'required',
	 		 // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
	 	 ]);




/* --------------------------Image 1------------------------------- */

	 if($req->hasFile('image1')) {
	 						 $images1 =   $req->file('image1');

	 							 if(!empty($images1)){
	 								 $filename = 'CustomImg'.rand(1111, 9999) . time() . '.' . strtolower($images1->getClientOriginalExtension());
	 								 $filePath = public_path('uploads/CustomOrderUploads');
	 								 $images1->move($filePath, $filename);

	 								 $fullimagepath1= "uploads/CustomOrderUploads/".$filename;
	 							 }else{


	 										 $fullimagepath1= "";


	 							 }

	 				 }
	 				 else{

	 							 $fullimagepath1= "";

	 				 }


/* --------------------------Image 2------------------------------- */

	 if($req->hasFile('image2')) {
	 						 $images2 =   $req->file('image2');

	 							 if(!empty($images2)){
	 								 $filename = 'CustomImg'.rand(1111, 9999) . time() . '.' . strtolower($images2->getClientOriginalExtension());
	 								 $filePath = public_path('uploads/CustomOrderUploads');
	 								 $images2->move($filePath, $filename);

	 								 $fullimagepath2= "uploads/CustomOrderUploads/".$filename;
	 							 }else{


	 										 $fullimagepath2= "";


	 							 }

	 				 }
	 				 else{

	 							 $fullimagepath2= "";

	 				 }

 /* --------------------------Image 3------------------------------ */

 	 if($req->hasFile('image3')) {
 	 						 $images3 =   $req->file('image3');

 	 							 if(!empty($images3)){
 	 								 $filename = 'CustomImg'.rand(1111, 9999) . time() . '.' . strtolower($images3->getClientOriginalExtension());
 	 								 $filePath = public_path('uploads/CustomOrderUploads');
 	 								 $images3->move($filePath, $filename);

 	 								 $fullimagepath3= "uploads/CustomOrderUploads/".$filename;
 	 							 }else{


 	 										 $fullimagepath3= "";


 	 							 }

 	 				 }
 	 				 else{

 	 							 $fullimagepath3= "";

 	 				 }


/* --------------------------Image 4------------------------------- */

	 if($req->hasFile('image4')) {
	 						 $images4 =   $req->file('image4');

	 							 if(!empty($images4)){
	 								 $filename = 'CustomImg'.rand(1111, 9999) . time() . '.' . strtolower($images4->getClientOriginalExtension());
	 								 $filePath = public_path('uploads/CustomOrderUploads');
	 								 $images4->move($filePath, $filename);

	 								 $fullimagepath4= "uploads/CustomOrderUploads/".$filename;
	 							 }else{


	 										 $fullimagepath4= "";


	 							 }

	 				 }
	 				 else{

	 							 $fullimagepath4= "";

	 				 }

 /* --------------------------Image 5------------------------------ */

 	 if($req->hasFile('image5')) {
 	 						 $images5 =   $req->file('image5');

 	 							 if(!empty($images5)){
 	 								 $filename = 'CustomImg'.rand(1111, 9999) . time() . '.' . strtolower($images5->getClientOriginalExtension());
 	 								 $filePath = public_path('uploads/CustomOrderUploads');
 	 								 $images5->move($filePath, $filename);

 	 								 $fullimagepath5= "uploads/CustomOrderUploads/".$filename;
 	 							 }else{


 	 										 $fullimagepath5= "";


 	 							 }

 	 				 }
 	 				 else{

 	 							 $fullimagepath5= "";

 	 				 }

/* --------------------------Image 6------------------------------- */

	 if($req->hasFile('image6')) {
	 						 $images6 =   $req->file('image6');

	 							 if(!empty($images6)){
	 								 $filename = 'CustomImg'.rand(1111, 9999) . time() . '.' . strtolower($images6->getClientOriginalExtension());
	 								 $filePath = public_path('uploads/CustomOrderUploads');
	 								 $images6->move($filePath, $filename);

	 								 $fullimagepath6= "uploads/CustomOrderUploads/".$filename;
	 							 }else{


	 										 $fullimagepath6= "";


	 							 }

	 				 }
	 				 else{

	 							 $fullimagepath6= "";

	 				 }


	  $customInfo= [

	 	 'name' => $req->input('name'),
	 	 'business_name' => $req->input('business_name'),
	 	 'email' => $req->input('email'),
	 	 'contact_number' => $req->input('contact_number'),
	 	 'country' => $req->input('country'),
	 	 'message' => $req->input('message'),

	 	 'image1' => $fullimagepath1,
	 	 'image2' => $fullimagepath2,
	 	 'image3' => $fullimagepath3,
	 	 'image4' => $fullimagepath4,
	 	 'image5' => $fullimagepath5,
	 	 'image6' => $fullimagepath6,


	 	 'ip' => $req->ip()

	  ];




	 	 $last_id = CustomOrder::create($customInfo);
	 	 return Redirect('/view_custom_order_page')->with('status', 'Thankyou for contact us, We will get back to you.');






	  }













	  public function add_category_view(Request $req){

		//$Team_data= Team::wherenull('deleted_at')->get();

		return view('admin/category/add_category');


    }

		public function update_category_view($id){
			$id_decode = base64_decode($id);
		$CategoryData = Category::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/category/update_category',['cate_data' => $CategoryData ]);


		}



	  public function view_category(Request $req){

		  //$Category_data= Category::wherenull('deleted_at')->get();
			$Category_data= Category::wherenull('deleted_at')->get();

			return view('admin/category/view_category',['categorydetails' => $Category_data]);


    }

		public function update_cat_status($status,$idd,Request $req ){

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
															// 	$CartData = Cart::wherenull('deleted_at')-> where('product_id', $pro->id)->get();
															//
															// if(!empty($CartData)){
															// 			foreach ($CartData as $cart) {
															//
															// 				$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
															// 				$ProCartData->delete();
															//
															// 			}
															// }



														}
											}



		}


			return Redirect('/view_category')->with('status', 'Status Updated Successfully.');





		}



		public function deleteCategory($idd,Request $req){
				// $member_Id= $req->input('memberId');
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



						// cart products delete if product delete
						// 	$CartData = Cart::wherenull('deleted_at')-> where('product_id', $pro->id)->get();
						//
						// if(!empty($CartData)){
						// 			foreach ($CartData as $cart) {
						//
						// 				$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
						// 				$ProCartData->delete();
						//
						// 			}
						// }

					}
		}



		       return Redirect('/view_category')->with('status', 'Data Deleted Successfully.');

		    }



	 public function add_category_process(Request $req)
    {

//image upload code

			// $request->validate([
      //       'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
      //   ]);
			//
      //   $imageName = time().'.'.$request->image->extension();
			//
      //   $request->image->move(public_path('images'), $imageName);




		$enc_category_id = $req->input('id');

		$category_id= base64_decode($enc_category_id);


		if($category_id && $category_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'name' => 'required',
				// 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',
					 //'image' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',

		]);
		}
		log::debug('$addCategory');



		 // $nameEmp = $req->input('name');
		 // log::debug( 'Input::get');
		 // log::debug( Input::get('name'));
		 // $no = $req->input('number');
		// $admin_code = "AD00".strtoupper(substr($nameEmp,0,3)).substr($no,8,9);





	// $services[]= $req->input('services');
	// $service[]= $req->input('service');

	// if(!empty($services)){
		// $alotService[] = $services;
	// }
	// if(!empty($service)){
		// $alotService[] = $service;
	// }


	// $imageName = time().'.'.$req->fileToUpload1->getClientOriginalExtension();
	//
	// $req->fileToUpload1->move(public_path('Team-images'), $imageName);


 // $a= $req->file('img');   Log::DEBUG("a");
 // Log::DEBUG($a); die();
 //
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
			'added_by' => 1,
			'is_active' => 1,

		];
		/* $files = $req->file('file');
		Log::debug('$ffe');
		log::debug($files);
		$filename = '';

			if($req->file('img')) {
				log::debug('$yesImg');
				$selectedImage = '';
				$file = $req->file('img');
				log::debug($file);
				$filename = str_random(25) .$this->getDateString(). '.' . $file->getClientOriginalExtension();
				log::debug('$filename');
				log::debug($filename);
				$destinationPath = public_path('/uploads/adminProfileImg/');
				$thumb_img = Image::make(public_path() . '/uploads/adminProfileImg/' . $filename)->resize(100, 100);
				$thumb_img->save($destinationPath . 'small/' . $filename, 80);
			log::debug('$thumb_img');
			log::debug('$aftfilename');
				log::debug($filename);
				$adminInfo['profile_pic'] =$filename;
			} */
		/* $a= $req->input('desc');
		$b= $req->input('phone');
		$c= $req->input('pass');
		$file = $req->file('file')->store('Uploads');
		$d= $file; */

		if($category_id && $category_id != ""){

				$updated_last_id = Category::wherenull('deleted_at')-> where('id', $category_id)->first();
				$updated_last_id->update($categoryInfo);
				return Redirect('/view_category')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = Category::create($categoryInfo);
			return Redirect('/view_category')->with('status', 'Data Added Successfully.');
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
