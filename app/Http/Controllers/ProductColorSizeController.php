<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Color;
use App\adminmodel\Size;
use App\frontendmodel\Cart;
use App\adminmodel\ProductColorSize;
use App\adminmodel\Product;
use App\adminmodel\Inventory;
use App\adminmodel\InventoryTransaction;
use App\adminmodel\Style;
use App\adminmodel\Shape;
use App\adminmodel\Plating;
use App\adminmodel\Metal;
use App\adminmodel\Material;
use App\adminmodel\Gemstone;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class ProductColorSizeController extends Controller
{


	  public function add_product_color_size_view($pro_id, Request $req){

if(!empty($req->session()->has('admin_data'))){

$product_id= $pro_id;
$ColorData = Color::wherenull('deleted_at')->where('is_active', 1)->get();
$GemstoneData = Gemstone::wherenull('deleted_at')->where('is_active', 1)->get();
$styleData = Style::wherenull('deleted_at')->where('is_active', 1)->get();
$ShapeData = Shape::wherenull('deleted_at')->where('is_active', 1)->get();
$PlatingData = Plating::wherenull('deleted_at')->where('is_active', 1)->get();
$metalData = Metal::wherenull('deleted_at')->where('is_active', 1)->get();
$materialData = Material::wherenull('deleted_at')->where('is_active', 1)->get();
$Size_data= Size::wherenull('deleted_at')->where('is_active',1)->get();
// $product_id= $pro_id;
		return view('admin/product/add_product_color', ['color_data' => $ColorData, 'gemstone_data' => $GemstoneData, 'style_data' => $styleData, 'shape_data' => $ShapeData ,'plating_data' => $PlatingData ,'metal_data' => $metalData , 'material_data'=>$materialData ,'size_data' => $Size_data, 'product_id' => $product_id] );

	}else{
	 return view('admin/login/index');
	}

    }


		public function update_product_color_size_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$id= base64_decode($idd);

$Product_Color_data= ProductColorSize::wherenull('deleted_at')->where('id', $id)->first();

			$ColorData = Color::wherenull('deleted_at')->where('is_active', 1)->get();
			$GemstoneData = Gemstone::wherenull('deleted_at')->where('is_active', 1)->get();
			$styleData = Style::wherenull('deleted_at')->where('is_active', 1)->get();
			$ShapeData = Shape::wherenull('deleted_at')->where('is_active', 1)->get();
			$PlatingData = Plating::wherenull('deleted_at')->where('is_active', 1)->get();
			$metalData = Metal::wherenull('deleted_at')->where('is_active', 1)->get();
			$materialData = Material::wherenull('deleted_at')->where('is_active', 1)->get();
			$Size_data= Size::wherenull('deleted_at')->where('is_active',1)->get();

		return view('admin/product/update_product_color' ,['color_data' => $ColorData, 'gemstone_data' => $GemstoneData, 'style_data' => $styleData, 'shape_data' => $ShapeData ,'plating_data' => $PlatingData ,'metal_data' => $metalData , 'material_data'=>$materialData ,'size_data' => $Size_data, 'pro_data'=>$Product_Color_data ] );

	}else{
	 return view('admin/login/index');
	}

		}



	  public function view_product_color_size($pro_id,Request $req){

if(!empty($req->session()->has('admin_data'))){

			$product_id= $pro_id;
			$product_id_dec= base64_decode($product_id);

    $Product_data= Product::wherenull('deleted_at')->where('id', $product_id_dec)->first();

$Product_Color_data= ProductColorSize::wherenull('deleted_at')->where('product_id', $product_id_dec)->get();

		  $Color_data= Color::wherenull('deleted_at')->where('is_active', 1)->get();

			$Size_data= Size::wherenull('deleted_at')->get();

		return view('admin/product/view_product_color',['Product_Color_data'=>$Product_Color_data,'colordetails' => $Color_data, 'sizedetails' => $Size_data, 'product_id' => $product_id,'Product_data'=>$Product_data]);


	}else{
	 return view('admin/login/index');
	}

    }

		public function update_product_color_size_status($status,$pro_id,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

			$product_id= $pro_id;
			$product_id_decode=  base64_decode($pro_id);
			$id= base64_decode($idd);



		if($status == "active"){

			$colorStatusInfo= [

				'is_active' =>1,


			];


					$ColorData = ProductColorSize::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $ColorData);

				$ColorData->update($colorStatusInfo);

		}
		else{

			$colorStatusInfo= [

				'is_active' =>0,


			];

			$ColorData = ProductColorSize::wherenull('deleted_at')-> where('id', $id)->first();

			$color_idd= $ColorData->color_id;
			$variant_idd= $ColorData->size_id;

			log::debug( $ColorData);
			$ColorData->update($colorStatusInfo);


			//delete cart data related to this product color size

					$ColorCart = Cart::wherenull('deleted_at')-> where('product_id', $product_id_decode)-> where('color_id', $color_idd)-> where('status', 0)->get();

			if($ColorCart != "" && $ColorCart != null){
					foreach ($ColorCart as $cart) {

						$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();

					$proCrtDa->delete();

					}
			}



		}


			return Redirect('/view_product_color_size/'.$product_id)->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteProductColorSize($pro_id, $idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

				log::debug('$deletecolor');
				log::debug($idd);
$product_id= $pro_id;
$product_id_decode=  base64_decode($pro_id);
					$id= base64_decode($idd);

				$ColorData = ProductColorSize::wherenull('deleted_at')-> where('id', $id)->first();

				if($ColorData != "" && $ColorData != null){

					$color_idd= $ColorData->color_id;
					$variant_idd= $ColorData->size_id;

					$img1= $ColorData->image1;
					$img2= $ColorData->image2;
					$img3= $ColorData->image3;
					$img4= $ColorData->image4;

					log::debug($ColorData);
					$ColorData->delete();


					if(!empty($img1)){
						unlink( $img1 );
					}
					if(!empty($img2)){
						unlink( $img2 );
					}
					if(!empty($img3)){
						unlink( $img3 );
					}
					if(!empty($img4)){
						unlink( $img4 );
					}



				}else{

					$color_idd= "";
					$variant_idd= "";
				}



//delete cart data related to this product color size

		$ColorCart = Cart::wherenull('deleted_at')-> where('product_id', $product_id_decode)-> where('color_id', $color_idd)-> where('status', 0)->get();

if($ColorCart != "" && $ColorCart != null){
		foreach ($ColorCart as $cart) {

			$proCrtDa = Cart::wherenull('deleted_at')-> where('id', $cart->id)->first();

		$proCrtDa->delete();

		}
}


//delete inventory data related to this product color size

		$inv_data = Inventory::wherenull('deleted_at')-> where('product_id', $product_id_decode)-> where('color_id', $color_idd)->first();

if(!empty($inv_data)){

		$inv_data->delete();

}

		       return Redirect('/view_product_color_size/'.$product_id)->with('status', 'Data Deleted Successfully.');

				 }else{
			 	 return view('admin/login/index');
			 	}

		    }



	 public function add_product_color_size_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');

$proclrs_id = $req->input('id');
 $proclr_id = base64_decode($proclrs_id);


 if(!empty($proclr_id)){
 		// 	$req->validate([
		// 'color_id' => 'required',
		// 'mrp' => 'required',
		// 'price' => 'required',
		// 'inve_stock' => 'required',
		// 'img1' => 'required',
 		//
 		// ]);
 	}else{

			$req->validate([
				// 'color_id' => 'required',
				'mrp' => 'required',
				'price' => 'required',
				'inve_stock' => 'required',
				'img1' => 'required',

		]);

}

$color_id = $req->input('color_id');
$gemstone_id = $req->input('gemstone_id');
$style_id = $req->input('style_id');
$shape_id = $req->input('shape_id');
$plating_id = $req->input('plating_id');
$metal_id = $req->input('metal_id');
$material_id = $req->input('material_id');
$mrp = $req->input('mrp');
$price = $req->input('price');
$inve_stock = $req->input('inve_stock');
$prod_id= $req->input('product_id');
$decod_product_id=base64_decode($prod_id);

 $prod_id2=base64_encode($decod_product_id);


//image1
if($req->hasFile('img1')) {
      $images1 =   $req->file('img1');

			if(!empty($images1)){
          $filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images1->getClientOriginalExtension());
          $filePath = public_path('uploads/ProductUploads');
          $images1->move($filePath, $filename);

					$fullimagepath1= "uploads/ProductUploads/".$filename;
				}else{

				$Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
					if(!empty($proclr_id) && !empty($Pro_datas)){
						$fullimagepath1= $Pro_datas->image1;
					}else{
						$fullimagepath1= "";
					}

				}
  }

else{
	$Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
		if(!empty($proclr_id) && !empty($Pro_datas)){
			$fullimagepath1= $Pro_datas->image1;
		}else{
			$fullimagepath1= "";
		}
}



//image2
if($req->hasFile('img2')) {
		 $images2 =   $req->file('img2');

		 if(!empty($images2)){
				 $filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images2->getClientOriginalExtension());
				 $filePath = public_path('uploads/ProductUploads');
				 $images2->move($filePath, $filename);

				 $fullimagepath2= "uploads/ProductUploads/".$filename;
			 }else{

			 $Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
				 if(!empty($proclr_id) && !empty($Pro_datas)){
					 $fullimagepath2= $Pro_datas->image2;
				 }else{
					 $fullimagepath2= "";
				 }

			 }
 }
 else{
 	$Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
 		if(!empty($proclr_id) && !empty($Pro_datas)){
 			$fullimagepath2= $Pro_datas->image2;
 		}else{
 			$fullimagepath2= "";
 		}
 }

//image3
if($req->hasFile('img3')) {
$images3 =   $req->file('img3');

if(!empty($images3)){
$filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images3->getClientOriginalExtension());
$filePath = public_path('uploads/ProductUploads');
$images3->move($filePath, $filename);

$fullimagepath3= "uploads/ProductUploads/".$filename;

}else{

$Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
	if(!empty($proclr_id) && !empty($Pro_datas)){
		$fullimagepath3= $Pro_datas->image3;
	}else{
		$fullimagepath3= "";
	}

}

}
else{
	$Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
		if(!empty($proclr_id) && !empty($Pro_datas)){
			$fullimagepath3= $Pro_datas->image3;
		}else{
			$fullimagepath3= "";
		}
}

//image4
if($req->hasFile('img4')) {
 $images4 =   $req->file('img4');

	if(!empty($images4)){
		 $filename = 'Product'.rand(1111, 9999) . time() . '.' . strtolower($images4->getClientOriginalExtension());
		 $filePath = public_path('uploads/ProductUploads');
		 $images4->move($filePath, $filename);

		 $fullimagepath4= "uploads/ProductUploads/".$filename;

	 }else{

	 $Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
		if(!empty($proclr_id) && !empty($Pro_datas)){
			$fullimagepath4= $Pro_datas->image4;
		}else{
			$fullimagepath4= "";
		}

	 }
}
else{
	$Pro_datas= ProductColorSize::wherenull('deleted_at')-> where('id', $proclr_id)->first();
		if(!empty($proclr_id) && !empty($Pro_datas)){
			$fullimagepath4= $Pro_datas->image4;
		}else{
			$fullimagepath4= "";
		}
}





		$procolorInfo= [

			'color_id' => $color_id,
			'gemstone_id' => $gemstone_id,
			'style_id' => $style_id,
			'shape_id' => $shape_id,
			'plating_id' => $plating_id,
			'metal_id' => $metal_id,
			'material_id' => $material_id,
			'mrp' => $mrp,
			'price' => $price,
			'product_id' => $decod_product_id,
			'image1' => $fullimagepath1,
			'image2' => $fullimagepath2,
			'image3' => $fullimagepath3,
			'image4' => $fullimagepath4,

			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


if(empty($proclr_id)){

			$last_id = ProductColorSize::create($procolorInfo);

//inventory add
$inventoryInfo= [

	'product_id' => $decod_product_id,
	'color_id' => $color_id,
	'gemstone_id' => $gemstone_id,
	'stock' => $inve_stock,


	'ip' => $req->ip(),
	'added_by' => $admin_id,
	'is_active' => 1,

];

$iventory_last_id = Inventory::create($inventoryInfo);


			return Redirect('/view_product_color_size/'.$prod_id)->with('status', 'Data Added Successfully.');

	}else{

		$updated_last_id = ProductColorSize::wherenull('deleted_at')-> where('id',$proclr_id)->first();
		// echo $proclr_id; die();
		// echo $updated_last_id; die();
		// $iddd= $updated_last_id->update($procolorInfo);
			$updated_last_id->update($procolorInfo);
			// $pros=base64_encode($updated_last_id->product_id);
		// echo $updated_last_id; die();
		return Redirect('/view_product_color_size/'.$prod_id2)->with('status', 'Data Updated Successfully.');
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
