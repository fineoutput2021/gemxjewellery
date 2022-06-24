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

use App\adminmodel\CustomizeCategory;
use App\adminmodel\CustomizeProduct;
use App\adminmodel\CustomizeMetalColor;
use App\adminmodel\CustomizeProductStone;


use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class CustomizeController extends Controller
{




//--------------------------------------------------------------Customize Categories Part Start -------------------------------------------------------------------//




	  public function add_category_view(Request $req){

    	//$Team_data= Team::wherenull('deleted_at')->get();
      if(!empty($req->session()->has('admin_data'))){

    		return view('admin/customize/category/add_category');

    	}else{
        return view('admin/login/index');
      }

    }

		public function update_category_view($id,Request $req){

  if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$CategoryData = CustomizeCategory::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/customize/category/update_category',['cate_data' => $CategoryData ]);

	}else{
		return view('admin/login/index');
	}

		}



	  public function view_category(Request $req){

  if(!empty($req->session()->has('admin_data'))){
		  //$Category_data= Category::wherenull('deleted_at')->get();
			$Category_data= CustomizeCategory::wherenull('deleted_at')->get();

			return view('admin/customize/category/view_category',['categorydetails' => $Category_data]);

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


					$CategoryData = CustomizeCategory::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $CategoryData);

				$CategoryData->update($categoryStatusInfo);





//product is_active 1 update
						$proData = CustomizeProduct::wherenull('deleted_at')->where('category_id', $id)-> where('is_active', 0)->get();

						if(!empty($proData)){
									foreach ($proData as $pro) {

										$proDelInfo= [

											'is_active' =>1,

										];
										$prodData = CustomizeProduct::wherenull('deleted_at')-> where('id', $pro->id)->first();
										// $ProCartData->delete();
										$prodData->update($proDelInfo);



										// update in customize product types updates
										// 	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();
                    //
										// if(!empty($arrivalData)){
										// 			foreach ($arrivalData as $arrival) {
                    //
										// 				$proArriveInfo= [
                    //
										// 					'is_active' =>1,
                    //
										// 				];
										// 				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
										// 				$newArrivData->update($proArriveInfo);
                    //
										// 			}
										// }





									}
						}





		}else{


			$categoryStatusInfo= [

				'is_active' =>0,


			];

			$CategoryData = CustomizeCategory::wherenull('deleted_at')-> where('id', $id)->first();
			// log::debug( $CategoryData);
			$CategoryData->update($categoryStatusInfo);





//product is_active 0 update
				$proData = CustomizeProduct::wherenull('deleted_at')-> where('category_id', $id)-> where('is_active', 1)->get();

				if(!empty($proData)){

							foreach ($proData as $pro) {

								$proDelInfo= [

									'is_active' =>0,

								];
								$prodData = CustomizeProduct::wherenull('deleted_at')-> where('id', $pro->id)->first();
								$prodData->update($proDelInfo);



								// cart products delete if product delete
									$CartData = Cart::wherenull('deleted_at')-> where('product_id', $pro->id)->where('status', 1)->get();

								if(!empty($CartData)){
											foreach ($CartData as $cart) {

												$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
												$ProCartData->delete();

											}
								}




                // update in customize product types updates
                // 	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();
                //
                // if(!empty($arrivalData)){
                // 			foreach ($arrivalData as $arrival) {
                //
                // 				$proArriveInfo= [
                //
                // 					'is_active' =>0,
                //
                // 				];
                // 				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
                // 				$newArrivData->update($proArriveInfo);
                //
                // 			}
                // }






							}
				}



		}


			return Redirect('/view_customize_category')->with('status', 'Status Updated Successfully.');


		}else{
			return view('admin/login/index');
		}


		}



		public function deleteCategory($idd,Request $req){
				// $member_Id= $req->input('memberId');

  if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				// log::debug('$deletecategory');
				// log::debug($id);
				$CategoryData = CustomizeCategory::wherenull('deleted_at')-> where('id', $id)->first();
				$img= $CategoryData->image;


				log::debug($CategoryData);
				$CategoryData->delete();

				unlink( $img );




	//get category products
		$proData = CustomizeProduct::wherenull('deleted_at')-> where('category_id', $id)->get();

		if(!empty($proData)){
					foreach ($proData as $pro) {



						// cart products delete if product delete
							$CartData = Cart::wherenull('deleted_at')-> where('product_id', $pro->id)->where('status', 1)->get();

						if(!empty($CartData)){
									foreach ($CartData as $cart) {

										$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
										$ProCartData->delete();

									}
						}


			// update in customize product types delete
						// 	$arrivalData = NewArrival:: where('product_id', $pro->id)->get();
            //
						// if(!empty($arrivalData)){
						// 			foreach ($arrivalData as $arrival) {
            //
						// 				$ProArrivalData = NewArrival::where('id', $arrival->id)->first();
						// 				$ProArrivalData->delete();
            //
						// 			}
						// }




            //product delete
    						$prodData = CustomizeProduct::wherenull('deleted_at')->where('id', $pro->id)->first();
    						$prodData->delete();


					}
		}



		       return Redirect('/view_customize_category')->with('status', 'Data Deleted Successfully.');

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
                    $filename = 'CustomizeCategory'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/CustomizeCateUploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/CustomizeCateUploads/".$filename;
									}else{

										$Cat= CustomizeCategory::wherenull('deleted_at')-> where('id', $category_id)->first();
											if(!empty($category_id) && !empty($Cat)){
												$fullimagepath= $Cat->image;
											}else{
												$fullimagepath= "";
											}

									}

            }
						else{
							$Cat= CustomizeCategory::wherenull('deleted_at')-> where('id', $category_id)->first();
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

				$updated_last_id = CustomizeCategory::wherenull('deleted_at')-> where('id', $category_id)->first();
				$updated_last_id->update($categoryInfo);
				return Redirect('/view_customize_category')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = CustomizeCategory::create($categoryInfo);
			return Redirect('/view_customize_category')->with('status', 'Data Added Successfully.');
		}


	}else{
    return view('admin/login/index');
  }


        //return response()->json(['response' => 'OK']);
    }






//--------------------------------------------------------------Customize Categories Part End -------------------------------------------------------------------//








//--------------------------------------------------------------Customize Products Part Start -------------------------------------------------------------------//

public function add_product_view(Request $req){

  //$Team_data= Team::wherenull('deleted_at')->get();
  if(!empty($req->session()->has('admin_data'))){

$idd= $req->input('cate_id');

    return view('admin/customize/product/add_product', ['cate_id'=> $idd]);

  }else{
    return view('admin/login/index');
  }

}

public function update_product_view($id,Request $req){

if(!empty($req->session()->has('admin_data'))){

  $id_decode = base64_decode($id);
$ProductData = CustomizeProduct::wherenull('deleted_at')-> where('id', $id_decode)->first();
// log::debug("ProductData"); log::debug($ProductData);die();
return view('admin/customize/product/update_product',['product_data' => $ProductData ]);

}else{
return view('admin/login/index');
}

}



public function view_product($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

$id= base64_decode($idd);

  //$Product_data= Product::wherenull('deleted_at')->get();
  $Product_data= CustomizeProduct::wherenull('deleted_at')->where('category_id', $id)->get();

  return view('admin/customize/product/view_product',['productdetails' => $Product_data, 'cate_id'=>$idd]);

}else{
  return view('admin/login/index');
}

}

public function update_product_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){
  log::debug( 'update_status');
  log::debug( $status);
  log::debug( $idd);


$id = base64_decode($idd);

  $ProductData = CustomizeProduct::wherenull('deleted_at')-> where('id', $id)->first();
if(!empty($ProductData)){
  $cate_id= $ProductData->category_id;
  $cate_id_en= base64_encode($cate_id);
}else{
  $cate_id= "";
  $cate_id_en= "";
}


if($status == "active"){

  $productStatusInfo= [

    'is_active' =>1,


  ];


      $ProductData = CustomizeProduct::wherenull('deleted_at')-> where('id', $id)->first();
    log::debug( $ProductData);

    $ProductData->update($productStatusInfo);









        // update in customize product types updates
        // 	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();
        //
        // if(!empty($arrivalData)){
        // 			foreach ($arrivalData as $arrival) {
        //
        // 				$proArriveInfo= [
        //
        // 					'is_active' =>1,
        //
        // 				];
        // 				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
        // 				$newArrivData->update($proArriveInfo);
        //
        // 			}
        // }








}else{


  $productStatusInfo= [

    'is_active' =>0,


  ];

  $ProductData = CustomizeProduct::wherenull('deleted_at')-> where('id', $id)->first();
  // log::debug( $ProductData);
  $ProductData->update($productStatusInfo);





//product is_active 0 update




            // cart products delete if product delete
              $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 1)->get();

            if(!empty($CartData)){
                  foreach ($CartData as $cart) {

                    $ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
                    $ProCartData->delete();

                  }
            }




            // update in customize product types updates
            // 	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();
            //
            // if(!empty($arrivalData)){
            // 			foreach ($arrivalData as $arrival) {
            //
            // 				$proArriveInfo= [
            //
            // 					'is_active' =>0,
            //
            // 				];
            // 				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
            // 				$newArrivData->update($proArriveInfo);
            //
            // 			}
            // }








}


  return Redirect('/view_customize_product/'.$cate_id_en)->with('status', 'Status Updated Successfully.');


}else{
  return view('admin/login/index');
}


}



public function deleteProduct($idd,Request $req){
    // $member_Id= $req->input('memberId');

if(!empty($req->session()->has('admin_data'))){

      $id = base64_decode($idd);
    // log::debug('$deleteproduct');
    // log::debug($id);
    $ProductData = CustomizeProduct::wherenull('deleted_at')-> where('id', $id)->first();
    $img= $ProductData->image;
    $cate_id= $ProductData->category_id;
    $cate_id_en= base64_encode($cate_id);


    log::debug($ProductData);
    $ProductData->delete();

    unlink( $img );





        // cart products deletes if product delete
          $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 1)->get();

        if(!empty($CartData)){
              foreach ($CartData as $cart) {

                $ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
                $ProCartData->delete();

              }
        }


  // update in customize product types delete
        // 	$arrivalData = NewArrival:: where('product_id', $pro->id)->get();
        //
        // if(!empty($arrivalData)){
        // 			foreach ($arrivalData as $arrival) {
        //
        // 				$ProArrivalData = NewArrival::where('id', $arrival->id)->first();
        // 				$ProArrivalData->delete();
        //
        // 			}
        // }







       return Redirect('/view_customize_product/'.$cate_id_en)->with('status', 'Data Deleted Successfully.');

     }else{
      return view('admin/login/index');
     }

    }



public function add_product_process(Request $req)
{

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
$cate_id = $req->input('cate_id');
$enc_product_id = $req->input('id');

$product_id= base64_decode($enc_product_id);


if($product_id && $product_id != ""){

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
log::debug('$addProduct');


if($req->hasFile('img')) {
            $images =   $req->file('img');

              if(!empty($images)){
                $filename = 'CustomizeProduct'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                $filePath = public_path('uploads/CustomizeProductUploads');
                $images->move($filePath, $filename);

                $fullimagepath= "uploads/CustomizeProductUploads/".$filename;
              }else{

                $Cat= CustomizeProduct::wherenull('deleted_at')-> where('id', $product_id)->first();
                  if(!empty($product_id) && !empty($Cat)){
                    $fullimagepath= $Cat->image;
                  }else{
                    $fullimagepath= "";
                  }

              }

        }
        else{
          $Cat= CustomizeProduct::wherenull('deleted_at')-> where('id', $product_id)->first();
            if(!empty($product_id) && !empty($Cat)){
              $fullimagepath= $Cat->image;
            }else{
              $fullimagepath= "";
            }
        }
// log::debug($filename); die();

$productInfo= [

  'name' => $req->input('name'),
  'category_id' => base64_decode($cate_id),
  's_desc' => $req->input('s_desc'),
  'size' => $req->input('size'),
  'base_price' => $req->input('base_price'),

  'image' => $fullimagepath,
  'ip' => $req->ip(),
  'added_by' => $admin_id,
  'is_active' => 1,

];


if($product_id && $product_id != ""){

    $updated_last_id = CustomizeProduct::wherenull('deleted_at')-> where('id', $product_id)->first();
    $updated_last_id->update($productInfo);
    return Redirect('/view_customize_product/'.$cate_id)->with('status', 'Data Updated Successfully.');

}
else{

  $last_id = CustomizeProduct::create($productInfo);
  return Redirect('/view_customize_product/'.$cate_id)->with('status', 'Data Added Successfully.');
}


}else{
return view('admin/login/index');
}


    //return response()->json(['response' => 'OK']);
}




//--------------------------------------------------------------Customize Products Part End -------------------------------------------------------------------//






//--------------------------------------------------------------Customize Metal Color Part Start -------------------------------------------------------------------//




public function add_color_view(Request $req){

//$Team_data= Team::wherenull('deleted_at')->get();
if(!empty($req->session()->has('admin_data'))){

return view('admin/customize/color/add_color');

}else{
return view('admin/login/index');
}

}

public function update_color_view($id,Request $req){

if(!empty($req->session()->has('admin_data'))){

	$id_decode = base64_decode($id);
$ColorData = CustomizeMetalColor::wherenull('deleted_at')-> where('id', $id_decode)->first();
// log::debug("ColorData"); log::debug($ColorData);die();
return view('admin/customize/color/update_color',['cate_data' => $ColorData ]);

}else{
return view('admin/login/index');
}

}



public function view_color(Request $req){

if(!empty($req->session()->has('admin_data'))){
	//$Color_data= Color::wherenull('deleted_at')->get();
	$Color_data= CustomizeMetalColor::wherenull('deleted_at')->get();

	return view('admin/customize/color/view_color',['colordetails' => $Color_data]);

}else{
	return view('admin/login/index');
}

}

public function update_color_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){
	log::debug( 'update_status');
	log::debug( $status);
	log::debug( $idd);


$id = base64_decode($idd);

if($status == "active"){

	$colorStatusInfo= [

		'is_active' =>1,


	];


			$ColorData = CustomizeMetalColor::wherenull('deleted_at')-> where('id', $id)->first();
		log::debug( $ColorData);

		$ColorData->update($colorStatusInfo);



//SubCategory is_active 1 update
		// $subCatData = SubCategory::wherenull('deleted_at')-> where('color_id', $id)-> where('is_active', 0)->get();
		//
		// if(!empty($subCatData)){
		// 			foreach ($subCatData as $subcat) {
		//
		// 				$subcatDelInfo= [
		//
		// 					'is_active' =>1,
		//
		// 				];
		// 				$subData = SubCategory::wherenull('deleted_at')-> where('id', $subcat->id)->first();
		// 				// $ProCartData->delete();
		// 				$subData->update($subcatDelInfo);
		//
		//
		// 			}
		// }



//product is_active 1 update
				// $proData = Product::wherenull('deleted_at')-> where('color', $id)-> where('is_active', 0)->get();
				//
				// if(!empty($proData)){
				// 			foreach ($proData as $pro) {
				//
				// 				$proDelInfo= [
				//
				// 					'is_active' =>1,
				//
				// 				];
				// 				$prodData = Product::wherenull('deleted_at')-> where('id', $pro->id)->first();
				// 				// $ProCartData->delete();
				// 				$prodData->update($proDelInfo);
				//
				//
				//
				// 				// newarrival products updates if product delete
				// 				// 	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();
				// 				//
				// 				// if(!empty($arrivalData)){
				// 				// 			foreach ($arrivalData as $arrival) {
				// 				//
				// 				// 				$proArriveInfo= [
				// 				//
				// 				// 					'is_active' =>1,
				// 				//
				// 				// 				];
				// 				// 				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
				// 				// 				// $ProCartData->delete();
				// 				// 				$newArrivData->update($proArriveInfo);
				// 				//
				// 				// 			}
				// 				// }
				//
				// 				// clearance products updates if product delete
				// 				// 	$ClearanceData = Clearance:: where('product_id', $pro->id)->where('is_active', 0)->get();
				// 				//
				// 				// if(!empty($ClearanceData)){
				// 				// 			foreach ($ClearanceData as $clearance) {
				// 				//
				// 				// 				$proClearnceInfo= [
				// 				//
				// 				// 					'is_active' =>1,
				// 				//
				// 				// 				];
				// 				// 				$clearancData = Clearance:: where('id', $clearance->id)->first();
				// 				// 				$clearancData->update($proClearnceInfo);
				// 				//
				// 				// 			}
				// 				// }
				//
				//
				//
				// 			}
				// }





}
else{

	$colorStatusInfo= [

		'is_active' =>0,


	];

	$ColorData = CustomizeMetalColor::wherenull('deleted_at')-> where('id', $id)->first();
	log::debug( $ColorData);
	$ColorData->update($colorStatusInfo);








	// cart products deletes if product delete
		$CartData = Cart::wherenull('deleted_at')-> where('metal', $id)->where('status', 1)->get();

	if(!empty($CartData)){
				foreach ($CartData as $cart) {

					$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
					$ProCartData->delete();

				}
	}







}


	return Redirect('/view_customize_color')->with('status', 'Status Updated Successfully.');


}else{
	return view('admin/login/index');
}


}



public function deleteColor($idd,Request $req){
		// $member_Id= $req->input('memberId');

if(!empty($req->session()->has('admin_data'))){

			$id = base64_decode($idd);
		// log::debug('$deletecolor');
		// log::debug($id);
		$ColorData = CustomizeMetalColor::wherenull('deleted_at')-> where('id', $id)->first();
		$img= $ColorData->image;
		// $product_id= $ColorData->product_id;


		log::debug($ColorData);
		$ColorData->delete();

		unlink( $img );








		// cart products deletes if product delete
			$CartData = Cart::wherenull('deleted_at')-> where('metal', $id)->where('status', 1)->get();

		if(!empty($CartData)){
					foreach ($CartData as $cart) {

						$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
						$ProCartData->delete();

					}
		}





			 return Redirect('/view_customize_color')->with('status', 'Data Deleted Successfully.');

		 }else{
			return view('admin/login/index');
		 }

		}



public function add_color_process(Request $req)
{

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
$enc_color_id = $req->input('id');

$color_id= base64_decode($enc_color_id);


if($color_id && $color_id != ""){

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
log::debug('$addColor');


if($req->hasFile('img')) {
						$images =   $req->file('img');

							if(!empty($images)){
								$filename = 'CustomizeColor'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
								$filePath = public_path('uploads/CustomizeColorUploads');
								$images->move($filePath, $filename);

								$fullimagepath= "uploads/CustomizeColorUploads/".$filename;
							}else{

								$Cat= CustomizeMetalColor::wherenull('deleted_at')-> where('id', $color_id)->first();
									if(!empty($color_id) && !empty($Cat)){
										$fullimagepath= $Cat->image;
									}else{
										$fullimagepath= "";
									}

							}

				}
				else{
					$Cat= CustomizeMetalColor::wherenull('deleted_at')-> where('id', $color_id)->first();
						if(!empty($color_id) && !empty($Cat)){
							$fullimagepath= $Cat->image;
						}else{
							$fullimagepath= "";
						}
				}
// log::debug($filename); die();

$colorInfo= [

	'name' => $req->input('name'),

	'image' => $fullimagepath,
	'ip' => $req->ip(),
	'added_by' => $admin_id,
	'is_active' => 1,

];


if($color_id && $color_id != ""){

		$updated_last_id = CustomizeMetalColor::wherenull('deleted_at')-> where('id', $color_id)->first();
		$updated_last_id->update($colorInfo);
		return Redirect('/view_customize_color')->with('status', 'Data Updated Successfully.');

}
else{

	$last_id = CustomizeMetalColor::create($colorInfo);
	return Redirect('/view_customize_color')->with('status', 'Data Added Successfully.');
}


}else{
return view('admin/login/index');
}


		//return response()->json(['response' => 'OK']);
}





//--------------------------------------------------------------Customize Metal Color Part End -------------------------------------------------------------------//












//------------------------------------------------------------Customize Products Stones Part Start ----------------------------------------------------------------//


public function add_customize_product_stone_view(Request $req){

  //$Team_data= Team::wherenull('deleted_at')->get();
  if(!empty($req->session()->has('admin_data'))){

$idd= $req->input('pro_id');

    return view('admin/customize/product_stone/add_product_stone', ['pro_id'=> $idd]);

  }else{
    return view('admin/login/index');
  }

}

public function update_customize_product_stone_view($id,Request $req){

if(!empty($req->session()->has('admin_data'))){

  $id_decode = base64_decode($id);
$ProductStoneData = CustomizeProductStone::wherenull('deleted_at')-> where('id', $id_decode)->first();
// log::debug("ProductData"); log::debug($ProductData);die();
return view('admin/customize/product_stone/update_product_stone',['product_stone_data' => $ProductStoneData ]);

}else{
return view('admin/login/index');
}

}



public function view_customize_product_stone($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

$id= base64_decode($idd);

  //$Product_data= Product::wherenull('deleted_at')->get();
  $Product_stone_data= CustomizeProductStone::wherenull('deleted_at')->where('product_id', $id)->get();
  $Product_data= CustomizeProduct::wherenull('deleted_at')->where('id', $id)->first();
  // print_r($Product_data);
  // exit;
  $cat_id =  base64_encode($Product_data->category_id);



  return view('admin/customize/product_stone/view_product_stone',['productstonedetails' => $Product_stone_data, 'pro_id'=>$idd,'cat_id'=>$cat_id]);

}else{
  return view('admin/login/index');
}

}

public function update_customize_product_stone_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){
  log::debug( 'update_status');
  log::debug( $status);
  log::debug( $idd);


$id = base64_decode($idd);

  $ProductData = CustomizeProductStone::wherenull('deleted_at')-> where('id', $id)->first();
if(!empty($ProductData)){
  $pro_id= $ProductData->product_id;
  $pro_id_en= base64_encode($pro_id);
}else{
  $pro_id= "";
  $pro_id_en= "";
}


if($status == "active"){

  $productStatusInfo= [

    'is_active' =>1,


  ];


      $ProductData = CustomizeProductStone::wherenull('deleted_at')-> where('id', $id)->first();
    log::debug( $ProductData);

    $ProductData->update($productStatusInfo);









        // update in customize product types updates
        // 	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();
        //
        // if(!empty($arrivalData)){
        // 			foreach ($arrivalData as $arrival) {
        //
        // 				$proArriveInfo= [
        //
        // 					'is_active' =>1,
        //
        // 				];
        // 				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
        // 				$newArrivData->update($proArriveInfo);
        //
        // 			}
        // }








}else{


  $productStatusInfo= [

    'is_active' =>0,


  ];

  $ProductData = CustomizeProductStone::wherenull('deleted_at')-> where('id', $id)->first();
  // log::debug( $ProductData);
  $ProductData->update($productStatusInfo);





//product is_active 0 update




            // cart products delete if product delete
            //   $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 1)->get();
						//
            // if(!empty($CartData)){
            //       foreach ($CartData as $cart) {
						//
            //         $ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
            //         $ProCartData->delete();
						//
            //       }
            // }




            // update in customize product types updates
            // 	$arrivalData = NewArrival:: where('product_id', $pro->id)->where('is_active', 0)->get();
            //
            // if(!empty($arrivalData)){
            // 			foreach ($arrivalData as $arrival) {
            //
            // 				$proArriveInfo= [
            //
            // 					'is_active' =>0,
            //
            // 				];
            // 				$newArrivData = NewArrival:: where('id', $arrival->id)->first();
            // 				$newArrivData->update($proArriveInfo);
            //
            // 			}
            // }








}


  return Redirect('/view_customize_product_stone/'.$pro_id_en)->with('status', 'Status Updated Successfully.');


}else{
  return view('admin/login/index');
}


}



public function deleteCustomizeProductStone($idd,Request $req){
    // $member_Id= $req->input('memberId');

if(!empty($req->session()->has('admin_data'))){

      $id = base64_decode($idd);
    // log::debug('$deleteproduct');
    // log::debug($id);
    $ProductStoneData = CustomizeProductStone::wherenull('deleted_at')-> where('id', $id)->first();
if(!empty($ProductStoneData)){
	$stone_image= $ProductStoneData->stone_image;
	$stone_product_image= $ProductStoneData->stone_product_image;
	$metal_product_image= $ProductStoneData->metal_product_image;
	$pro_id= $ProductStoneData->product_id;
	$pro_id_en= base64_encode($pro_id);


	log::debug($ProductStoneData);
	$ProductStoneData->delete();

	unlink( $stone_image );
	unlink( $stone_product_image );
	unlink( $metal_product_image );





			// cart products deletes if product delete
			//   $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 1)->get();
			//
			// if(!empty($CartData)){
			//       foreach ($CartData as $cart) {
			//
			//         $ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
			//         $ProCartData->delete();
			//
			//       }
			// }


// update in customize product types delete
			// 	$arrivalData = NewArrival:: where('product_id', $pro->id)->get();
			//
			// if(!empty($arrivalData)){
			// 			foreach ($arrivalData as $arrival) {
			//
			// 				$ProArrivalData = NewArrival::where('id', $arrival->id)->first();
			// 				$ProArrivalData->delete();
			//
			// 			}
			// }







		 return Redirect('/view_customize_product_stone/'.$pro_id_en)->with('status', 'Data Deleted Successfully.');



}else{
	return Redirect::back()->with('status-error', 'Product not found.');
}





     }else{
      return view('admin/login/index');
     }

    }



public function add_customize_product_stone_process(Request $req)
{

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
 $pro_id = $req->input('pro_id');

$enc_product_stone_id = $req->input('id');

 $product_stone_id= base64_decode($enc_product_stone_id);


if($product_stone_id && $product_stone_id != ""){

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
log::debug('$addProduct');


if($req->hasFile('stone_img')) {
            $images =   $req->file('stone_img');

              if(!empty($images)){
                $filename = 'CustomizeProductStone'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                $filePath = public_path('uploads/CustomizeProductStoneUploads');
                $images->move($filePath, $filename);

                $fullimagepath1= "uploads/CustomizeProductStoneUploads/".$filename;
              }else{

                $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
                  if(!empty($product_stone_id) && !empty($Cat)){
                    $fullimagepath1= $Cat->stone_image;
                  }else{
                    $fullimagepath1= "";
                  }

              }

        }
        else{

          $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
					// print_r($Cat); die("d");
            if(!empty($product_stone_id) && !empty($Cat)){
              $fullimagepath1= $Cat->stone_image;
            }else{
              $fullimagepath1= "";
            }
        }


				if($req->hasFile('stoneproimg')) {
				            $images =   $req->file('stoneproimg');

				              if(!empty($images)){
				                $filename = 'CustomizeProductStone'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
				                $filePath = public_path('uploads/CustomizeProductStoneUploads');
				                $images->move($filePath, $filename);

				                $fullimagepath2= "uploads/CustomizeProductStoneUploads/".$filename;
				              }else{

				                $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
				                  if(!empty($product_stone_id) && !empty($Cat)){
				                    $fullimagepath2= $Cat->stone_product_image;
				                  }else{
				                    $fullimagepath2= "";
				                  }

				              }

				        }
				        else{
				          $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
				            if(!empty($product_stone_id) && !empty($Cat)){
				              $fullimagepath2= $Cat->stone_product_image;
				            }else{
				              $fullimagepath2= "";
				            }
				        }


					if($req->hasFile('metalproimg')) {
					            $images =   $req->file('metalproimg');

					              if(!empty($images)){
					                $filename = 'CustomizeProductStone'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
					                $filePath = public_path('uploads/CustomizeProductStoneUploads');
					                $images->move($filePath, $filename);

					                $fullimagepath3= "uploads/CustomizeProductStoneUploads/".$filename;
					              }else{

					                $Cat= CustomizeProductStone::wherenull('deleted_at')->where('id', $product_stone_id)->first();
					                  if(!empty($product_stone_id) && !empty($Cat)){
					                    $fullimagepath3= $Cat->metal_product_image;
					                  }else{
					                    $fullimagepath3= "";
					                  }

					              }

					        }
					        else{
					          $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
					            if(!empty($product_stone_id) && !empty($Cat)){
					              $fullimagepath3= $Cat->metal_product_image;
					            }else{
					              $fullimagepath3= "";
					            }
					        }


// echo $fullimagepath1;
// echo $fullimagepath2;
// echo $fullimagepath3; die();

// log::debug($filename); die();

$productInfo= [


  'product_id' => base64_decode($pro_id),
  'cust_metal_id' => $req->input('cust_metal_id'),
	'name' => $req->input('name'),
  'price' => $req->input('price'),

  'stone_image' => $fullimagepath1,
  'stone_product_image' => $fullimagepath2,
  'metal_product_image' => $fullimagepath3,
  'ip' => $req->ip(),
  'added_by' => $admin_id,
  'is_active' => 1,

];


if($product_stone_id && $product_stone_id != ""){

    $updated_last_id = CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
    $updated_last_id->update($productInfo);
    return Redirect('/view_customize_product_stone/'.$pro_id)->with('status', 'Data Updated Successfully.');

}
else{

  $last_id = CustomizeProductStone::create($productInfo);
  return Redirect('/view_customize_product_stone/'.$pro_id)->with('status', 'Data Added Successfully.');
}


}else{
return view('admin/login/index');
}


    //return response()->json(['response' => 'OK']);
}



//--------------------------------------------------------------Customize Product Stones Part End -------------------------------------------------------------------//







}
