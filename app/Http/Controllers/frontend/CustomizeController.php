<?php

namespace App\Http\Controllers\frontend;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\ProductColorSize;
use App\adminmodel\Color;
use App\adminmodel\Gemstone;
use App\adminmodel\Style;
use App\adminmodel\Shape;
use App\adminmodel\Plating;
use App\adminmodel\Metal;
use App\adminmodel\Material;
use App\adminmodel\Size;
use App\adminmodel\CustomOrder;
use App\adminmodel\WholesaleInquiry;
use App\adminmodel\AskQuestion;
use App\adminmodel\Contact;
use App\adminmodel\NewsLetter;
use App\adminmodel\Countries;
use App\frontendmodel\User;
use App\frontendmodel\Cart;
use App\frontendmodel\ReferAfriend;
use App\frontendmodel\Rating;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\adminmodel\Slider;
use App\adminmodel\Slider2;
use App\adminmodel\CountriesCurrency;


use App\adminmodel\CustomizeCategory;
use App\adminmodel\CustomizeProduct;
use App\adminmodel\CustomizeMetalColor;
use App\adminmodel\CustomizeProductStone;

use App\adminmodel\EngraveCategory;
use App\adminmodel\EngraveProduct;

use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;

class CustomizeController extends Controller
{

	  public function customize_category(Request $req){

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
$customize_category = CustomizeCategory::wherenull('deleted_at')->where('is_active', 1)->get();



        return view('frontend/customize_category', ['category_data'=>$categories, 'customize_category'=>$customize_category]);


    }
	  public function color_bar_category(Request $req){

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
$customize_category = CustomizeCategory::wherenull('deleted_at')->where('is_active', 1)->get();



        return view('frontend/color_bar_category', ['category_data'=>$categories, 'customize_category'=>$customize_category]);


    }


public function customize_subcategory($idd, Request $req){

$id= base64_decode($idd);
$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$customize_product = CustomizeProduct::wherenull('deleted_at')->where('is_active', 1)->where('category_id', $id)->get();

    return view('frontend/customize_subcategory', ['category_data'=>$categories, 'customize_product'=>$customize_product]);


}

public function customize_diamond($idd,Request $req){

$id= base64_decode($idd);
$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$customize_product_stones = CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $id)->get();
$customize_product_stonesf = CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $id)->first();
$pro_data = CustomizeProduct::wherenull('deleted_at')->where('is_active', 1)->where('id', $id)->first();
$ringcheck_data = CustomizeCategory::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_data->category_id)->first();

// echo($id);
// print_r($ringcheck_data);
// exit;

    return view('frontend/customize_diamond', ['category_data'=>$categories, 'customize_product_stonesf'=>$customize_product_stonesf,'customize_product_stones'=>$customize_product_stones, 'product_id'=>$id,'ringcheck_data'=>$ringcheck_data]);


}





public function get_metal_blank_data(Request $req){

log::debug('get_metal_blank_data');

$metal_id= $req->input('metal_id');
$product_id= $req->input('product_id');
$stone_id= $req->input('stone_id');
	// $id = base64_decode($idd);

//getname from tbl
// $customize_product_stones_da = CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('id', $stone_id)->first();
// if(!empty($customize_product_stones_da)){
// 	$stone_name= $customize_product_stones_da->name;
// }else{
// 	$stone_name= "";
// }
//getname from tbl


$customize_product_stones = CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $product_id)->where('cust_metal_id', $metal_id)->where('name', $stone_id)->first();


// log::debug('$productColordata');
// log::debug($metal_id);
// log::debug($product_id);
// log::debug($customize_product_stones);
// $saleproData->delete();


// unlink( $img );
$data['data'] = true;
$data['customProductMetalData'] = $customize_product_stones;



echo json_encode($data);


}



public function get_metal_stone_data(Request $req){

log::debug('get_metal_stone_data');

$stone_id= $req->input('stone_id');
$metal_id= $req->input('metal_id');
$product_id= $req->input('product_id');

// $id= $req->input('sale_product_id');
	// $id = base64_decode($idd);

$customize_product_stones = CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $product_id)->where('cust_metal_id', $metal_id)->where('name', $stone_id)->first();

if(!empty($customize_product_stones)){
	$customize_product_stones= $customize_product_stones;
}else{
	$customize_product_stones = CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $product_id)->where('cust_metal_id', $metal_id)->first();
}
// log::debug('$productColordata');
// log::debug($metal_id);
// log::debug($product_id);
// log::debug($customize_product_stones);
// $saleproData->delete();


// unlink( $img );
$data['data'] = true;
$data['customProductStoneData'] = $customize_product_stones;



echo json_encode($data);


}




//engraving part start



public function engrave_category(Request $req){

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
$engrave_category = EngraveCategory::wherenull('deleted_at')->where('is_active', 1)->get();



		return view('frontend/engrave_category', ['category_data'=>$categories, 'engrave_category'=>$engrave_category]);


}


public function engrave_subcategory($idd, Request $req){

$id= base64_decode($idd);
$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$engrave_product = EngraveProduct::wherenull('deleted_at')->where('is_active', 1)->where('category_id', $id)->get();

return view('frontend/engrave_subcategory', ['category_data'=>$categories, 'engrave_product'=>$engrave_product]);


}

public function engrave_diamond($idd,Request $req){

$id= base64_decode($idd);
$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

// $engrave_product_stones = CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $id)->get();
$engrave_product_stones = "qwert";

return view('frontend/engrave_diamond', ['category_data'=>$categories, 'engrave_product_stones'=>$engrave_product_stones, 'product_id'=>$id]);


}






public function engrave_products_view($idd,Request $req){

$id= base64_decode($idd);
$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$engrave_product = EngraveProduct::wherenull('deleted_at')->where('is_active', 1)->where('id', $id)->first();

return view('frontend/engrave_products_view', ['category_data'=>$categories, 'product_data'=>$engrave_product, 'product_id'=>$id]);


}


//engraving part end



}
