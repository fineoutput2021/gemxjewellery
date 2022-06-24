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

use App\adminmodel\EngraveCategory;
use App\adminmodel\EngraveProduct;
// use App\adminmodel\CustomizeMetalColor;
// use App\adminmodel\CustomizeProductStone;


use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class EngraveController extends Controller
{




//--------------------------------------------------------------Customize Engrave Categories Part Start -------------------------------------------------------------------//




	  public function add_category_view(Request $req){

    	//$Team_data= Team::wherenull('deleted_at')->get();
      if(!empty($req->session()->has('admin_data'))){

    		return view('admin/engrave/category/add_category');

    	}else{
        return view('admin/login/index');
      }

    }

		public function update_category_view($id,Request $req){

  if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$CategoryData = EngraveCategory::wherenull('deleted_at')-> where('id', $id_decode)->first();
		// log::debug("CategoryData"); log::debug($CategoryData);die();
		return view('admin/engrave/category/update_category',['cate_data' => $CategoryData ]);

	}else{
		return view('admin/login/index');
	}

		}



	  public function view_category(Request $req){

  if(!empty($req->session()->has('admin_data'))){
		  //$Category_data= Category::wherenull('deleted_at')->get();
			$Category_data= EngraveCategory::wherenull('deleted_at')->get();

			return view('admin/engrave/category/view_category',['categorydetails' => $Category_data]);

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


					$CategoryData = EngraveCategory::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $CategoryData);

				$CategoryData->update($categoryStatusInfo);





//product is_active 1 update
						$proData = EngraveProduct::wherenull('deleted_at')->where('category_id', $id)-> where('is_active', 0)->get();

						if(!empty($proData)){
									foreach ($proData as $pro) {

										$proDelInfo= [

											'is_active' =>1,

										];
										$prodData = EngraveProduct::wherenull('deleted_at')-> where('id', $pro->id)->first();
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

			$CategoryData = EngraveCategory::wherenull('deleted_at')-> where('id', $id)->first();
			// log::debug( $CategoryData);
			$CategoryData->update($categoryStatusInfo);





//product is_active 0 update
				$proData = EngraveProduct::wherenull('deleted_at')-> where('category_id', $id)-> where('is_active', 1)->get();

				if(!empty($proData)){

							foreach ($proData as $pro) {

								$proDelInfo= [

									'is_active' =>0,

								];
								$prodData = EngraveProduct::wherenull('deleted_at')-> where('id', $pro->id)->first();
								$prodData->update($proDelInfo);



								// cart products delete if product delete
									$CartData = Cart::wherenull('deleted_at')->where('product_id', $pro->id)->where('status', 2)->get();

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


			return Redirect('/view_engrave_category')->with('status', 'Status Updated Successfully.');


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
				$CategoryData = EngraveCategory::wherenull('deleted_at')-> where('id', $id)->first();
				$img= $CategoryData->image;


				log::debug($CategoryData);
				$CategoryData->delete();

				unlink( $img );




	//get category products
		$proData = EngraveProduct::wherenull('deleted_at')-> where('category_id', $id)->get();

		if(!empty($proData)){
					foreach ($proData as $pro) {



						// cart products delete if product delete
							$CartData = Cart::wherenull('deleted_at')->where('product_id', $pro->id)->where('status', 2)->get();

						if(!empty($CartData)){
									foreach ($CartData as $cart) {

										$ProCartData = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();
										$ProCartData->delete();

									}
						}




            //product delete
    						$prodData = EngraveProduct::wherenull('deleted_at')->where('id', $pro->id)->first();
    						$prodData->delete();


					}
		}



		       return Redirect('/view_engrave_category')->with('status', 'Data Deleted Successfully.');

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
                    $filename = 'EngraveCategory'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                    $filePath = public_path('uploads/CustomizeCateUploads');
                    $images->move($filePath, $filename);

										$fullimagepath= "uploads/CustomizeCateUploads/".$filename;
									}else{

										$Cat= EngraveCategory::wherenull('deleted_at')-> where('id', $category_id)->first();
											if(!empty($category_id) && !empty($Cat)){
												$fullimagepath= $Cat->image;
											}else{
												$fullimagepath= "";
											}

									}

            }
						else{
							$Cat= EngraveCategory::wherenull('deleted_at')-> where('id', $category_id)->first();
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

				$updated_last_id = EngraveCategory::wherenull('deleted_at')-> where('id', $category_id)->first();
				$updated_last_id->update($categoryInfo);
				return Redirect('/view_engrave_category')->with('status', 'Data Updated Successfully.');

		}
		else{

			$last_id = EngraveCategory::create($categoryInfo);
			return Redirect('/view_engrave_category')->with('status', 'Data Added Successfully.');
		}


	}else{
    return view('admin/login/index');
  }


        //return response()->json(['response' => 'OK']);
    }






//--------------------------------------------------------------Customize Engrave Categories Part End -------------------------------------------------------------------//








//--------------------------------------------------------------Customize Engrave Products Part Start ---------------------------------------------------------------//

public function add_product_view(Request $req){

  //$Team_data= Team::wherenull('deleted_at')->get();
  if(!empty($req->session()->has('admin_data'))){

$idd= $req->input('cate_id');

    return view('admin/engrave/product/add_product', ['cate_id'=> $idd]);

  }else{
    return view('admin/login/index');
  }

}

public function update_product_view($id,Request $req){

if(!empty($req->session()->has('admin_data'))){

  $id_decode = base64_decode($id);
$ProductData = EngraveProduct::wherenull('deleted_at')-> where('id', $id_decode)->first();
// log::debug("ProductData"); log::debug($ProductData);die();
return view('admin/engrave/product/update_product',['product_data' => $ProductData ]);

}else{
return view('admin/login/index');
}

}



public function view_product($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

$id= base64_decode($idd);

  //$Product_data= Product::wherenull('deleted_at')->get();
  $Product_data= EngraveProduct::wherenull('deleted_at')->where('category_id', $id)->get();

  return view('admin/engrave/product/view_product',['productdetails' => $Product_data, 'cate_id'=>$idd]);

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

  $ProductData = EngraveProduct::wherenull('deleted_at')-> where('id', $id)->first();
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


      $ProductData = EngraveProduct::wherenull('deleted_at')-> where('id', $id)->first();
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

  $ProductData = EngraveProduct::wherenull('deleted_at')-> where('id', $id)->first();
  // log::debug( $ProductData);
  $ProductData->update($productStatusInfo);





//product is_active 0 update




            // cart products delete if product delete
              $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 2)->get();

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


  return Redirect('/view_engrave_product/'.$cate_id_en)->with('status', 'Status Updated Successfully.');


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
    $ProductData = EngraveProduct::wherenull('deleted_at')-> where('id', $id)->first();
    $img= $ProductData->image;
    $cate_id= $ProductData->category_id;
    $cate_id_en= base64_encode($cate_id);


    log::debug($ProductData);
    $ProductData->delete();

    unlink( $img );





        // cart products deletes if product delete
          $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->where('status', 2)->get();

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







       return Redirect('/view_engrave_product/'.$cate_id_en)->with('status', 'Data Deleted Successfully.');

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
                $filename = 'EngraveProduct'.rand(1111, 9999) . time() . '.' . strtolower($images->getClientOriginalExtension());
                $filePath = public_path('uploads/EngraveProductUploads');
                $images->move($filePath, $filename);

                $fullimagepath= "uploads/EngraveProductUploads/".$filename;
              }else{

                $Cat= EngraveProduct::wherenull('deleted_at')-> where('id', $product_id)->first();
                  if(!empty($product_id) && !empty($Cat)){
                    $fullimagepath= $Cat->image;
                  }else{
                    $fullimagepath= "";
                  }

              }

        }
        else{
          $Cat= EngraveProduct::wherenull('deleted_at')-> where('id', $product_id)->first();
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

    $updated_last_id = EngraveProduct::wherenull('deleted_at')-> where('id', $product_id)->first();
    $updated_last_id->update($productInfo);
    return Redirect('/view_engrave_product/'.$cate_id)->with('status', 'Data Updated Successfully.');

}
else{

  $last_id = EngraveProduct::create($productInfo);
  return Redirect('/view_engrave_product/'.$cate_id)->with('status', 'Data Added Successfully.');
}


}else{
return view('admin/login/index');
}


    //return response()->json(['response' => 'OK']);
}




//--------------------------------------------------------------Customize Engrave Products Part End -----------------------------------------------------------------//









}
