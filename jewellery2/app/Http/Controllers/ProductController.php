<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Product;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\MiniSubCategory;
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

class ProductController extends Controller
{


//add product page on view product page
	  public function add_product_view($cidd,$sidd,Request $req){

if(!empty($req->session()->has('admin_data'))){

		$cate_data= Category::wherenull('deleted_at')->where('is_active', 1)->get();

		return view('admin/product/add_product',['cate_data' => $cate_data, 'category_id' => $cidd, 'subcategory_id' => $sidd]);

	}else{
    return view('admin/login/index');
  }

    }

//add product page from adminsidebar
		public function add_products_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		$cate_data= Category::wherenull('deleted_at')->where('is_active', 1)->get();

		return view('admin/product/add_products',['cate_data' => $cate_data ]);

	}else{
    return view('admin/login/index');
  }

		}


public function subcat_data(Request $req){

// if($request->method('post')){
 $category_id = trim($req->input('cat_id'));
// log::debug($category_id);
$subcate_data= SubCategory::wherenull('deleted_at')->where('category_id', $category_id)->get();

// log::debug('$subcate_data');
// log::debug($subcate_data);

if(!empty($subcate_data)){
	// log::debug('yes');
	$data['data']=true;
		$data['cat_id']=$category_id;
	$data['sub_cat_data']=$subcate_data;
// echo json_encode($data); exit;
}
else{
		// log::debug('no');
	$data['data']=false;
	$data['cat_id']=$category_id;
$data['sub_cat_data']="";
// echo json_encode($data); exit;
}


echo json_encode($data);



}



public function minisubcat_data(Request $req){

// if($request->method('post')){
 $subcategory_id = trim($req->input('subcat_id'));
// log::debug($category_id);
$minisubcate_data= MiniSubCategory::wherenull('deleted_at')->where('subcategory_id', $subcategory_id)->where('is_active',1)->where('is_cat_delete',0)->where('is_subcat_delete',0)->get();

// log::debug('$subcate_data');
// log::debug($subcate_data);

if(!empty($minisubcate_data)){
	// log::debug('yes');
	$data['data']=true;
		$data['subcat_id']=$subcategory_id;
	$data['minisub_cat_data']=$minisubcate_data;
// echo json_encode($data); exit;
}
else{
		// log::debug('no');
	$data['data']=false;
	$data['subcat_id']=$subcategory_id;
$data['minisub_cat_data']="";
// echo json_encode($data); exit;
}


echo json_encode($data);



}




		public function update_product_view($cidd,$sidd,$id,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$Product_Data = Product::wherenull('deleted_at')-> where('id', $id_decode)-> where('is_cat_delete', 0)-> where('is_subcat_delete', 0)->first();
		$cate_data= Category::wherenull('deleted_at')-> where('is_active', 1)->get();
		$subcate_data= SubCategory::wherenull('deleted_at')-> where('is_active', 1)->where('is_cat_delete', 0)->get();
		$minisubcate_data= MiniSubCategory::wherenull('deleted_at')-> where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->get();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/product/update_product',['pro_data' => $Product_Data , 'cate_data' => $cate_data, 'subcate_data' => $subcate_data, 'minisubcate_data' => $minisubcate_data, 'category_id' => $cidd, 'subcategory_id' => $sidd]);

	}else{
    return view('admin/login/index');
  }

		}



		public function view_product_category(Request $req){

if(!empty($req->session()->has('admin_data'))){

      $Category_data= Category::wherenull('deleted_at')->where('is_active', 1)->get();


      return view('admin/product/view_product_category',[ 'categorydetails' => $Category_data ]);


		}else{
	    return view('admin/login/index');
	  }

    }


    public function view_product_subcategory($idd, Request $req){

if(!empty($req->session()->has('admin_data'))){

$id=base64_decode($idd);

      $Category_data= Category::wherenull('deleted_at')->get();
      $SubCategory_data= SubCategory::wherenull('deleted_at')->where('is_active', 1)->where('category_id', $id)->where('is_cat_delete', 0)->get();


      return view('admin/product/view_product_subcategory',[ 'categorydetails' => $Category_data , 'subcategorydetails' => $SubCategory_data,  'category_id' => $idd ]);


		}else{
	    return view('admin/login/index');
	  }


    }






	  public function view_product($cidd,$sidd,Request $req){

if(!empty($req->session()->has('admin_data'))){

$cid=base64_decode($cidd);
$sid=base64_decode($sidd);
		  //$Category_data= Category::wherenull('deleted_at')->get();
			$Category_data= Category::wherenull('deleted_at')->get();
			$SubCategory_data= SubCategory::wherenull('deleted_at')->where('is_active', 1)-> where('is_cat_delete', 0)->get();
			$MiniSubCategory_data= MiniSubCategory::wherenull('deleted_at')->where('is_active', 1)-> where('is_cat_delete', 0)-> where('is_subcat_delete', 0)->get();

			$Product_Data= Product::wherenull('deleted_at')->where('category',$cid)->where('sub_category_id',$sid)->where('is_cat_delete', 0)-> where('is_subcat_delete', 0)->get();

			return view('admin/product/view_product',['productdetails' => $Product_Data, 'categorydetails' => $Category_data, 'subcategorydetails' => $SubCategory_data ,'category_id' => $cidd , 'subcategory_id' => $sidd ]);


		}else{
	    return view('admin/login/index');
	  }


    }

		public function update_product_status($status,$cidd,$sidd,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

	$id = base64_decode($idd);

		if($status == "active"){

			$productStatusInfo= [

				'is_active' =>1,


			];


					$ProductData = Product::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $ProductData);

				$ProductData->update($productStatusInfo);




				// new&now products updates if product delete
					$arrivalData = NewArrival::where('product_id', $id)->where('is_active', 0)->first();

				if(!empty($arrivalData)){

								$proArriveInfo= [

									'is_active' =>1,

								];
								$newArrivData = NewArrival::where('id', $arrivalData->id)->first();
								// $ProCartData->delete();
								$newArrivData->update($proArriveInfo);


				}

				// sale products updates if product delete
					$ClearanceData = Clearance:: where('product_id', $id)->where('is_active', 0)->first();

				if(!empty($ClearanceData)){

								$proClearnceInfo= [

									'is_active' =>1,

								];
								$clearancData = Clearance:: where('id', $ClearanceData->id)->first();
								$clearancData->update($proClearnceInfo);


				}





		}
		else{

			$productStatusInfo= [

				'is_active' =>0,


			];

			$ProductData = Product::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $ProductData);
			$ProductData->update($productStatusInfo);



			// new&now products updates if product delete
				$arrivalData = NewArrival::where('product_id', $id)->where('is_active', 1)->first();

			if(!empty($arrivalData)){

							$proArriveInfo= [

								'is_active' =>0,

							];
							$newArrivData = NewArrival::where('id', $arrivalData->id)->first();
							// $ProCartData->delete();
							$newArrivData->update($proArriveInfo);


			}

			// sale products updates if product delete
				$ClearanceData = Clearance:: where('product_id', $id)->where('is_active', 1)->first();

			if(!empty($ClearanceData)){

							$proClearnceInfo= [

								'is_active' =>0,

							];
							$clearancData = Clearance:: where('id', $ClearanceData->id)->first();
							$clearancData->update($proClearnceInfo);


			}





//	cart products delete if product delete
				$CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 0)->get();

			if(!empty($CartData)){
						foreach ($CartData as $cart) {

							$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
							$ProCartData->delete();

						}
			}


		}


			return Redirect('/view_product/'.$cidd.'/'.$sidd)->with('status', 'Status Updated Successfully.');



		}else{
	    return view('admin/login/index');
	  }

		}



		public function deleteProduct($cidd,$sidd,$idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				log::debug('$deleteproduct');
				log::debug($id);
				$ProductData = Product::wherenull('deleted_at')-> where('id', $id)->first();

				if(!empty($ProductData)){
					// echo "yay"; die();
				// $img1= $ProductData->image1;
				// $img2= $ProductData->image2;
				// $img3= $ProductData->image3;
				// $img4= $ProductData->image4;
				// $img5= $ProductData->image5;


				log::debug($ProductData);
				$ProductData->delete();
// if(!empty($img1)){
// 	unlink( $img1 );
// }
// if(!empty($img2)){
// 	unlink( $img2 );
// }
// if(!empty($img3)){
// 	unlink( $img3 );
// }
// if(!empty($img4)){
// 	unlink( $img4 );
// }
// if(!empty($img5)){
// 	unlink( $img5 );
// }

//cart products delete if product delete
	$CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 0)->get();

if(!empty($CartData)){
			foreach ($CartData as $cart) {

				$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
				$ProCartData->delete();

			}
}



// new&now products deletes if product delete
	$arrivalData = NewArrival::where('product_id', $id)->first();

if(!empty($arrivalData)){

				$ProArrivalData = NewArrival::where('id', $arrivalData->id)->first();
				$ProArrivalData->delete();


}

// sale products deletes if product delete
	$ClearanceData = Clearance::where('product_id', $id)->first();

if(!empty($ClearanceData)){

				$ProClearanceData = Clearance:: where('id', $ClearanceData->id)->first();
				$ProClearanceData->delete();


}




		       return Redirect('/view_product/'.$cidd.'/'.$sidd)->with('status', 'Data Deleted Successfully.');

}else{
	return Redirect('/view_product/'.$cidd.'/'.$sidd)->with('status-error', 'Some Err Occur.');
}


}else{
	return view('admin/login/index');
}


		    }



	 public function add_product_process($cidd,$sidd,Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');

		$enc_product_id = $req->input('id');

		$product_id= base64_decode($enc_product_id);

 $mini= $req->input('minisubcategory_id');

		if($product_id && $product_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'name' => 'required',
			'category_id' => 'required',
			'subcategory_id' => 'required',

			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
				'name' => 'required',
				'category_id' => 'required',
				'subcategory_id' => 'required',

				'sku_id' => 'required',
				'tag' => 'required',
				// 'img1' => 'required',
				// 'img2' => 'required',
				// 'img3' => 'required',


		]);
		}
		log::debug('$addCategory');


//image1
// if($req->hasFile('img1')) {
//       $images1 =   $req->file('img1');
//
// 			if(!empty($images1)){
//           $filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images1->getClientOriginalExtension());
//           $filePath = public_path('uploads/ProductUploads');
//           $images1->move($filePath, $filename);
//
// 					$fullimagepath1= "uploads/ProductUploads/".$filename;
// 				}else{
//
// 				$Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 					if(!empty($product_id) && !empty($Pro_datas)){
// 						$fullimagepath1= $Pro_datas->image1;
// 					}else{
// 						$fullimagepath1= "";
// 					}
//
// 				}
//   }
//
// else{
// 	$Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 		if(!empty($product_id) && !empty($Pro_datas)){
// 			$fullimagepath1= $Pro_datas->image1;
// 		}else{
// 			$fullimagepath1= "";
// 		}
// }
//
// //image2
// if($req->hasFile('img2')) {
// 		 $images2 =   $req->file('img2');
//
// 		 if(!empty($images2)){
// 				 $filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images2->getClientOriginalExtension());
// 				 $filePath = public_path('uploads/ProductUploads');
// 				 $images2->move($filePath, $filename);
//
// 				 $fullimagepath2= "uploads/ProductUploads/".$filename;
// 			 }else{
//
// 			 $Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 				 if(!empty($product_id) && !empty($Pro_datas)){
// 					 $fullimagepath2= $Pro_datas->image2;
// 				 }else{
// 					 $fullimagepath2= "";
// 				 }
//
// 			 }
//  }
//  else{
//  	$Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
//  		if(!empty($product_id) && !empty($Pro_datas)){
//  			$fullimagepath2= $Pro_datas->image2;
//  		}else{
//  			$fullimagepath2= "";
//  		}
//  }
//
// //image3
// if($req->hasFile('img3')) {
// $images3 =   $req->file('img3');
//
// if(!empty($images3)){
// $filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images3->getClientOriginalExtension());
// $filePath = public_path('uploads/ProductUploads');
// $images3->move($filePath, $filename);
//
// $fullimagepath3= "uploads/ProductUploads/".$filename;
//
// }else{
//
// $Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 	if(!empty($product_id) && !empty($Pro_datas)){
// 		$fullimagepath3= $Pro_datas->image3;
// 	}else{
// 		$fullimagepath3= "";
// 	}
//
// }
//
// }
// else{
// 	$Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 		if(!empty($product_id) && !empty($Pro_datas)){
// 			$fullimagepath3= $Pro_datas->image3;
// 		}else{
// 			$fullimagepath3= "";
// 		}
// }
//
// //image4
// if($req->hasFile('img4')) {
//  $images4 =   $req->file('img4');
//
// 	if(!empty($images4)){
// 		 $filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images4->getClientOriginalExtension());
// 		 $filePath = public_path('uploads/ProductUploads');
// 		 $images4->move($filePath, $filename);
//
// 		 $fullimagepath4= "uploads/ProductUploads/".$filename;
//
// 	 }else{
//
// 	 $Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 		if(!empty($product_id) && !empty($Pro_datas)){
// 			$fullimagepath4= $Pro_datas->image4;
// 		}else{
// 			$fullimagepath4= "";
// 		}
//
// 	 }
// }
// else{
// 	$Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 		if(!empty($product_id) && !empty($Pro_datas)){
// 			$fullimagepath4= $Pro_datas->image4;
// 		}else{
// 			$fullimagepath4= "";
// 		}
// }
//
// //image5
// if($req->hasFile('img5')) {
// 	$images5 =   $req->file('img5');
//
// 	if(!empty($images5)){
// 			$filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images5->getClientOriginalExtension());
// 			$filePath = public_path('uploads/ProductUploads');
// 			$images5->move($filePath, $filename);
//
// 		 $fullimagepath5= "uploads/ProductUploads/".$filename;
//
// 	 }else{
//
// 	 $Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 		if(!empty($product_id) && !empty($Pro_datas)){
// 			$fullimagepath5= $Pro_datas->image5;
// 		}else{
// 			$fullimagepath5= "";
// 		}
//
// 	 }
// }
// else{
// 	$Pro_datas= Product::wherenull('deleted_at')-> where('id', $product_id)->first();
// 		if(!empty($product_id) && !empty($Pro_datas)){
// 			$fullimagepath5= $Pro_datas->image5;
// 		}else{
// 			$fullimagepath5= "";
// 		}
// }
// log::debug($filename); die();


$category_Id= $req->input('category_id');
$subcategory_Id= $req->input('subcategory_id');

$enc_category_Id= base64_encode($category_Id);
$enc_subcategory_Id= base64_encode($subcategory_Id);

		$productInfo= [

			'name' => $req->input('name'),
			'category' => $req->input('category_id'),
			'sub_category_id' => $req->input('subcategory_id'),
			'mini_subcategory_id' => $mini,
			'sdesc' => $req->input('sdesc'),
			'ldesc' => $req->input('ldesc'),
			'tag' => $req->input('tag'),
			'sku_id' => $req->input('sku_id'),
			'point1' => $req->input('point1'),
			'point2' => $req->input('point2'),
			'point3' => $req->input('point3'),
			'point4' => $req->input('point4'),
			'point5' => $req->input('point5'),

			// 'image1' => $fullimagepath1,
			// 'image2' => $fullimagepath2,
			// 'image3' => $fullimagepath3,
			// 'image4' => $fullimagepath4,
			// 'image5' => $fullimagepath5,
			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];

		log::debug('check minicat');
		log::debug($productInfo);

		if($product_id && $product_id != ""){

				$updated_last_id = Product::wherenull('deleted_at')-> where('id', $product_id)->first();
				$updated_last_id->update($productInfo);
				return Redirect('/view_product/'.$enc_category_Id.'/'.$enc_subcategory_Id)->with('status', 'Data Updated Successfully.');



		}
		else{

			$last_id = Product::create($productInfo);
			$last_pro_id= base64_encode($last_id->id);
			return Redirect('/add_product_color_size_view/'.$last_pro_id)->with('status', 'Data Added Successfully.');
		}


	}else{
    return view('admin/login/index');
  }

        //return response()->json(['response' => 'OK']);
    }


//


public function add_products_process(Request $req)
 {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
 $enc_product_id = $req->input('id');

 $product_id= base64_decode($enc_product_id);

 $mini= $req->input('minisubcategory_id');

 if($product_id && $product_id != ""){

		 log::debug( 'yes Id');
	 $req->validate([
	 'name' => 'required',
	 'category_id' => 'required',
	 'subcategory_id' => 'required',

	 ]);
 }
 else{
	 log::debug( 'no Id');
	 $req->validate([
		 'name' => 'required',
		 'category_id' => 'required',
		 'subcategory_id' => 'required',
		 'tag' => 'required',
		 'sku_id' => 'required',

 ]);
 }
 log::debug('minicat1');

log::debug('check minicat1');

 $productInfo= [

	 'name' => $req->input('name'),
	 'category' => $req->input('category_id'),
	 'sub_category_id' => $req->input('subcategory_id'),
	 'mini_subcategory_id' => $mini,
	 'sdesc' => $req->input('sdesc'),
	 'ldesc' => $req->input('ldesc'),
	 'tag' => $req->input('tag'),
	 'sku_id' => $req->input('sku_id'),
	 'point1' => $req->input('point1'),
	 'point2' => $req->input('point2'),
	 'point3' => $req->input('point3'),
	 'point4' => $req->input('point4'),
	 'point5' => $req->input('point5'),

	 // 'image1' => $fullimagepath1,
	 // 'image2' => $fullimagepath2,
	 // 'image3' => $fullimagepath3,
	 // 'image4' => $fullimagepath4,
	 // 'image5' => $fullimagepath5,
	 'ip' => $req->ip(),
	 'added_by' => $admin_id,
	 'is_active' => 1,

 ];

log::debug('check minicat');
log::debug($productInfo);

 if($product_id && $product_id != ""){

		 $updated_last_id = Product::wherenull('deleted_at')-> where('id', $product_id)->first();
		 $updated_last_id->update($productInfo);
		 return Redirect('/view_product_category')->with('status', 'Data Updated Successfully.');

 }
 else{

	 $last_id = Product::create($productInfo);
	 $last_pro_id= base64_encode($last_id->id);

	 return Redirect('/add_product_color_size_view/'.$last_pro_id)->with('status', 'Data Added Successfully.');
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
