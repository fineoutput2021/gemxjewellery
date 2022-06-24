<?php

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

  return view('admin/customize/product_stone/view_product_stone',['productstonedetails' => $Product_stone_data, 'pro_id'=>$idd]);

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
            //   $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->get();
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
    $stone_image= $ProductData->stone_image;
    $stone_product_image= $ProductData->stone_product_image;
    $metal_product_image= $ProductData->metal_product_image;
    $pro_id= $ProductData->product_id;
    $pro_id_en= base64_encode($pro_id);


    log::debug($ProductStoneData);
    $ProductStoneData->delete();

    unlink( $stone_image );
    unlink( $stone_product_image );
    unlink( $metal_product_image );





        // cart products deletes if product delete
        //   $CartData = Cart::wherenull('deleted_at')-> where('product_id', $id)->get();
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
                  if(!empty($product_id) && !empty($Cat)){
                    $fullimagepath1= $Cat->image;
                  }else{
                    $fullimagepath1= "";
                  }

              }

        }
        else{
          $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
            if(!empty($product_id) && !empty($Cat)){
              $fullimagepath1= $Cat->image;
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
				                  if(!empty($product_id) && !empty($Cat)){
				                    $fullimagepath2= $Cat->image;
				                  }else{
				                    $fullimagepath2= "";
				                  }

				              }

				        }
				        else{
				          $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
				            if(!empty($product_id) && !empty($Cat)){
				              $fullimagepath2= $Cat->image;
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
					                  if(!empty($product_id) && !empty($Cat)){
					                    $fullimagepath3= $Cat->image;
					                  }else{
					                    $fullimagepath3= "";
					                  }

					              }

					        }
					        else{
					          $Cat= CustomizeProductStone::wherenull('deleted_at')-> where('id', $product_stone_id)->first();
					            if(!empty($product_id) && !empty($Cat)){
					              $fullimagepath3= $Cat->image;
					            }else{
					              $fullimagepath3= "";
					            }
					        }


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
