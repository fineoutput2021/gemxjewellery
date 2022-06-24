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
use App\frontendmodel\UserCatelogue;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\adminmodel\Slider;
use App\adminmodel\Slider2;
use App\adminmodel\Promocode;
use App\adminmodel\CountriesCurrency;

use App\adminmodel\CustomizeCategory;
use App\adminmodel\CustomizeProduct;
use App\adminmodel\CustomizeMetalColor;
use App\adminmodel\CustomizeProductStone;
use App\adminmodel\EngraveCategory;
use App\adminmodel\EngraveProduct;
use App\adminmodel\Inventory;
use App\adminmodel\MiniSubCategory;
use App\adminmodel\Homepage_imgs;
use App\adminmodel\Appointment;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;

class HomeController extends Controller
{

	// public function main_index(Request $req){
	//
	//
	//   // return Redirect('/index');
	// 	return view('frontend/main_index');
	//
  // }

	  public function index(Request $req){


// $req->session()->put('user_data', 1);

		log::debug('frontend-index');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->limit(9)->get();
// log::debug($categories);

$slider = Slider::wherenull('deleted_at')->where('is_active', 1)->get();

$slider2_first2 = Slider2::wherenull('deleted_at')->where('is_active', 1)->limit(2)->get();

// log::debug("recent_first2_categories");
// log::debug($recent_first2_categories);

$slider2_next3 = Slider2::wherenull('deleted_at')->where('is_active', 1)->limit(3)->offset(2)->get();
// log::debug("recent_next3_categories");
// log::debug($recent_next3_categories);

$recent_products = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->orderBy("id", "desc")->get();

$trending_products = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->inRandomOrder()->limit(10)->get();

$homepage_img_data = Homepage_imgs::wherenull('deleted_at')->where('is_active', 1)->first();

// log::debug('trending');
// log::debug($trending_products);

        return view('frontend/index', ['category_data'=>$categories, 'recent_data'=>$recent_products, 'trending_data'=>$trending_products,
				'slider'=>$slider,
			'slider2_fst2'=>$slider2_first2, 'slider2_nxt3'=>$slider2_next3,'homepage_img_data'=>$homepage_img_data]);


    }





		public function currency_data($idd,Request $req){

				$id = base64_decode($idd);

				$req->session()->forget('currency_id');
				$req->session()->put('currency_id', $id);
				// echo $req->session()->get('currency_id');
				// echo $id; die();
				return redirect()->back();
 // return redirect::back();
    }


		public function manufacture(Request $req){
			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->limit(9)->get();

			return view('frontend/manufacture', ['category_data'=>$categories]);

    }
		public function stocks(Request $req){
			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->limit(9)->get();

			return view('frontend/stocks', ['category_data'=>$categories]);

		}



		//search result data

		public function search_results(Request $req)
		{
			$data['data'] = '';
			// if(!empty($this->session->userdata('user_data'))){


				$string= $req->input('string');



			 $user_id= $req->session()->get('user_id');



		// $detail= $this->db->select('*')->from('tbl_products')->where("name LIKE '%$string%'")->get()->result_array();
$detail = Product::wherenull('deleted_at')
->where('is_active', 1)
->where('is_cat_delete', 0)
->where('is_subcat_delete', 0)
->where('is_mini_subcat_delete', 0)
->where('name', 'like', '%'.$string.'%')
->orWhere('tag', 'like', '%' . $string . '%')
->orWhere('sku_id', 'like', '%' . $string . '%')->get();



		$data['data']=true;
		$data['result_da']=$detail;


		echo json_encode($data);
		}



		//Search Products Page after search
				public function search_products(Request $req){

		$string= $req->input('search_input');
				log::debug('frontend-category_products');

		$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

		$search_pro_data = Product::wherenull('deleted_at')
		->where('is_active', 1)
		->where('is_cat_delete', 0)
		->where('is_subcat_delete', 0)
		->where('is_mini_subcat_delete', 0)
		->where('name', 'like', '%'.$string.'%')
		->orWhere('tag', 'like', '%' . $string . '%')
		->orWhere('sku_id', 'like', '%' . $string . '%')->get();
// dd($search_pro_data);die();
		        // return view('frontend/index', ['category_data'=>$categories]);
		        // return view('frontend/all_product', ['category_data'=>$categories]);
		        return view('frontend/search_products', ['category_data'=>$categories, 'search_pro_data'=>$search_pro_data]);


		    }



		public function checkout(Request $req){

		log::debug('frontend-checkout');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
log::debug($categories);

        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/checkout', ['category_data'=>$categories]);


    }

//all_products page of subcategory wise
		public function all_products($idd, $m_idd= null ,Request $req){


$id= base64_decode($idd);
$price_f= $req->input('prc_f');
$gems_id= $req->input('gem_id');
$style_f= $req->input('s_id');
$metal_f= $req->input('m_id');
$material_f= $req->input('mtr_id');
$shape_f= $req->input('sh_id');
$plating_f= $req->input('pl_id');

 $pricerangeS_f= $req->input('pr_lim_st');
 $pricerangeE_f= $req->input('pr_lim_en');

$dec_price_f= base64_decode($price_f);
$dec_gems_f= base64_decode($gems_id);
$dec_style_f= base64_decode($style_f);
$dec_metal_f= base64_decode($metal_f);
$dec_metarial_f= base64_decode($material_f);
$dec_shape_f= base64_decode($shape_f);
$dec_plating_f= base64_decode($plating_f);
// $dec_size2_f= base64_decode($size2_f);
// $dec_discount_f= base64_decode($discount_f);

		log::debug('frontend-index');

$linkstatus= 0;


$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$sub_cat_data = SubCategory::wherenull('deleted_at')->where(array('is_active'=> 1,'id'=>$id))->first();

$cat_data = Category::wherenull('deleted_at')->where(array('is_active'=> 1,'id'=>$sub_cat_data->category_id))->first();


$mini_sub_data="";
if($m_idd != null && $m_idd != ""){

 $m_id= base64_decode($m_idd);

 $mini_sub_data = MiniSubCategory::wherenull('deleted_at')->where(array('is_active'=> 1,'id'=>$m_id))->first();


if($price_f != null){
if( $dec_price_f == 1){


	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','desc')->get();


$sub_all_products=[];
if(!empty($price)){
	$i=0;
	foreach ($price->unique('product_id') as $pric) {

// $sub_all_products= [];

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}
// echo $i;
$i++;	}

// $flter_name="Low To High";
}

	log::debug($sub_all_products);
}elseif ($dec_price_f == 2) {
	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','asc')->get();


$sub_all_products=[];
if(!empty($price)){
	foreach ($price->unique('product_id') as $pric) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

// $flter_name="High To Low";
}

}else{

	$sub_all_products = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->orderBy('id', 'DESC')->get();

}

}elseif (!empty($pricerangeE_f)) {

	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->whereBetween('price', [$pricerangeS_f, $pricerangeE_f])->get();


$sub_all_products=[];
if(!empty($price)){
	foreach ($price->unique('product_id') as $pric) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

// $flter_name="High To Low";
}



}elseif ($dec_gems_f != null && $dec_gems_f != "") {

	$gemstone_pro_types= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('gemstone_id',$dec_gems_f)->get();


	$sub_all_products=[];
	if(!empty($gemstone_pro_types)){
	foreach ($gemstone_pro_types->unique('product_id') as $gems_type) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $gems_type->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

	$gemstone_name= Gemstone::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_gems_f)->first();
		if(!empty($gemstone_name)){
			$flter_name= $gemstone_name->name;
		}

	}

}elseif ($dec_style_f != null && $dec_style_f != "") {

$stye= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('style_id',$dec_style_f)->get();


$sub_all_products=[];
if(!empty($stye)){
foreach ($stye->unique('product_id') as $styl) {

$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $styl->product_id)->first();

if(!empty($sub_all_products_da)){
$sub_all_products[]= $sub_all_products_da;
}

}

$style_name= Style::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_style_f)->first();
	if(!empty($style_name)){
		$flter_name= $style_name->name;
	}

}

}elseif ($dec_metal_f != null && $dec_metal_f != "") {

$metal= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('metal_id',$dec_metal_f)->get();


$sub_all_products=[];
if(!empty($metal)){
foreach ($metal->unique('product_id') as $metl) {

$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $metl->product_id)->first();

if(!empty($sub_all_products_da)){
$sub_all_products[]= $sub_all_products_da;
}

}

$metal_name= Metal::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metal_f)->first();
	if(!empty($metal_name)){
		$flter_name= $metal_name->name;
	}

}

}elseif ($dec_metarial_f != null && $dec_metarial_f != "") {

$meterial= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('material_id',$dec_metarial_f)->get();


$sub_all_products=[];
if(!empty($meterial)){
foreach ($meterial->unique('product_id') as $metl) {

$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $metl->product_id)->first();

if(!empty($sub_all_products_da)){
$sub_all_products[]= $sub_all_products_da;
}

}

$meterial_name= Material::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metarial_f)->first();
	if(!empty($meterial_name)){
		$flter_name= $meterial_name->name;
	}

}

}elseif ($dec_shape_f != null && $dec_shape_f != "") {

$shape= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('shape_id',$dec_shape_f)->get();


$sub_all_products=[];
if(!empty($shape)){
foreach ($shape->unique('product_id') as $shap) {

$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $shap->product_id)->first();

if(!empty($sub_all_products_da)){
$sub_all_products[]= $sub_all_products_da;
}

}

$shape_name= Shape::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_shape_f)->first();
	if(!empty($shape_name)){
		$flter_name= $shape_name->name;
	}

}

}elseif ($dec_plating_f != null && $dec_plating_f != "") {

$plating= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('plating_id',$dec_plating_f)->get();


$sub_all_products=[];
if(!empty($plating)){
foreach ($plating->unique('product_id') as $plat) {

$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->where('id', $plat->product_id)->first();

if(!empty($sub_all_products_da)){
$sub_all_products[]= $sub_all_products_da;
}

}

$plating_name= Plating::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_plating_f)->first();
	if(!empty($plating_name)){
		$flter_name= $plating_name->name;
	}

}

}else{


	$sub_all_products = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_mini_subcat_delete', 0)->where('sub_category_id', $id)->where('mini_subcategory_id', $m_id)->paginate(12);
	log::debug($sub_all_products);

}




}else{


	if($price_f != null){
	if( $dec_price_f == 1){


		$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','desc')->get();


	$sub_all_products=[];
	if(!empty($price)){
		$i=0;
		foreach ($price->unique('product_id') as $pric) {

	// $sub_all_products= [];

		$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $pric->product_id)->first();

		if(!empty($sub_all_products_da)){
		$sub_all_products[]= $sub_all_products_da;
		}
	// echo $i;
	$i++;	}

	// $flter_name="Low To High";
	}

		log::debug($sub_all_products);
	}else{

		$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','asc')->get();


	$sub_all_products=[];
	if(!empty($price)){
		foreach ($price->unique('product_id') as $pric) {

		$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $pric->product_id)->first();

		if(!empty($sub_all_products_da)){
		$sub_all_products[]= $sub_all_products_da;
		}

		}

	// $flter_name="High To Low";
	}

	}

}elseif (!empty($pricerangeS_f)) {

	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)	->whereBetween('price', [$pricerangeS_f, $pricerangeE_f])->get();


$sub_all_products=[];
if(!empty($price)){
	foreach ($price->unique('product_id') as $pric) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

// $flter_name="High To Low";
}



}elseif ($dec_gems_f != null && $dec_gems_f != "") {

	$gemstone_pro_types= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('gemstone_id',$dec_gems_f)->get();


	$sub_all_products=[];
	if(!empty($gemstone_pro_types)){
	foreach ($gemstone_pro_types->unique('product_id') as $gems_type) {

		$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $gems_type->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

	$gemstone_name= Gemstone::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_gems_f)->first();
		if(!empty($gemstone_name)){
			$flter_name= $gemstone_name->name;
		}

	}

}elseif ($dec_style_f != null && $dec_style_f != "") {

	$stye= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('style_id',$dec_style_f)->get();


$sub_all_products=[];
if(!empty($stye)){
	foreach ($stye->unique('product_id') as $styl) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $styl->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

	$style_name= Style::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_style_f)->first();
		if(!empty($style_name)){
			$flter_name= $style_name->name;
		}

}

}elseif ($dec_metal_f != null && $dec_metal_f != "") {

	$metal= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('metal_id',$dec_metal_f)->get();


$sub_all_products=[];
if(!empty($metal)){
	foreach ($metal->unique('product_id') as $metl) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $metl->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

	$metal_name= Metal::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metal_f)->first();
		if(!empty($metal_name)){
			$flter_name= $metal_name->name;
		}

}

}elseif ($dec_metarial_f != null && $dec_metarial_f != "") {

	$meterial= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('material_id',$dec_metarial_f)->get();


$sub_all_products=[];
if(!empty($meterial)){
	foreach ($meterial->unique('product_id') as $metl) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $metl->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

	$meterial_name= Material::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metarial_f)->first();
		if(!empty($meterial_name)){
			$flter_name= $meterial_name->name;
		}

}

}elseif ($dec_shape_f != null && $dec_shape_f != "") {

	$shape= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('shape_id',$dec_shape_f)->get();


$sub_all_products=[];
if(!empty($shape)){
	foreach ($shape->unique('product_id') as $shap) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $shap->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

	$shape_name= Shape::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_shape_f)->first();
		if(!empty($shape_name)){
			$flter_name= $shape_name->name;
		}

}

}elseif ($dec_plating_f != null && $dec_plating_f != "") {

	$plating= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('plating_id',$dec_plating_f)->get();


$sub_all_products=[];
if(!empty($plating)){
	foreach ($plating->unique('product_id') as $plat) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->where('id', $plat->product_id)->first();

	if(!empty($sub_all_products_da)){
	$sub_all_products[]= $sub_all_products_da;
	}

	}

	$plating_name= Plating::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_plating_f)->first();
		if(!empty($plating_name)){
			$flter_name= $plating_name->name;
		}

}

}else{

$linkstatus= 1;

	$sub_all_products = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('sub_category_id', $id)->paginate(12);
	log::debug($sub_all_products);
}

}



        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/all_product', ['category_data'=>$categories, 'subcategory_pro_data'=>$sub_all_products, 'sub_id'=>$idd, 'submini_id'=>$m_idd, 'linkstatus'=>$linkstatus,'cat_data'=>$cat_data,'sub_cat_data'=>$sub_cat_data,'mini_sub_data'=>$mini_sub_data ]);


    }


//Category Products Page for category wise
		public function category_products($idd,Request $req){
$id= base64_decode($idd);


$price_f= $req->input('prc_f');
$gems_id= $req->input('gem_id');
$style_f= $req->input('s_id');
$metal_f= $req->input('m_id');
$material_f= $req->input('mtr_id');
$shape_f= $req->input('sh_id');
$plating_f= $req->input('pl_id');

 $pricerangeS_f= $req->input('pr_lim_st');
 $pricerangeE_f= $req->input('pr_lim_en');

$pricerangeS_f=trim($pricerangeS_f);
$pricerangeE_f=trim($pricerangeE_f);


$dec_price_f= base64_decode($price_f);
$dec_gems_f= base64_decode($gems_id);
$dec_style_f= base64_decode($style_f);
$dec_metal_f= base64_decode($metal_f);
$dec_metarial_f= base64_decode($material_f);
$dec_shape_f= base64_decode($shape_f);
$dec_plating_f= base64_decode($plating_f);



		log::debug('frontend-category_products');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$cat_data= Category::wherenull('deleted_at')->where(array('is_active'=> 1,"id"=>$id))->first();

$linkstatus= 0;

	if($price_f != null){
	if( $dec_price_f == 1){


		$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','desc')->get();



	$cat_all_products=[];
	if(!empty($price)){
		$i=0;
		foreach ($price->unique('product_id') as $pric) {

	// $sub_all_products= [];

		$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $pric->product_id)->first();

		if(!empty($sub_all_products_da)){
		$cat_all_products[]= $sub_all_products_da;
		}
	// echo $i;
	$i++;	}

	// $flter_name="Low To High";
	}

		// log::debug($sub_all_products);
	}else{

		$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','asc')->get();


	$cat_all_products=[];
	if(!empty($price)){
		foreach ($price->unique('product_id') as $pric) {

		$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $pric->product_id)->first();;

		if(!empty($sub_all_products_da)){
		$cat_all_products[]= $sub_all_products_da;
		}

		}

	// $flter_name="High To Low";
	}

	}

}elseif (!empty($pricerangeE_f)) {


	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->whereBetween('price', [$pricerangeS_f, $pricerangeE_f])->get();


$cat_all_products=[];
if(!empty($price)){
	foreach ($price->unique('product_id') as $pric) {

		$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$cat_all_products[]= $sub_all_products_da;
	}

	}

// $flter_name="High To Low";
}



}elseif ($dec_gems_f != null && $dec_gems_f != "") {

	$gemstone_pro_types= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('gemstone_id',$dec_gems_f)->get();


	$cat_all_products=[];
	if(!empty($gemstone_pro_types)){
	foreach ($gemstone_pro_types->unique('product_id') as $gems_type) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $gems_type->product_id)->first();

	if(!empty($sub_all_products_da)){
	$cat_all_products[]= $sub_all_products_da;
	}

	}

	$gemstone_name= Gemstone::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_gems_f)->first();
		if(!empty($gemstone_name)){
			$flter_name= $gemstone_name->name;
		}

	}

}elseif ($dec_style_f != null && $dec_style_f != "") {

	$stye= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('style_id',$dec_style_f)->get();


$cat_all_products=[];
if(!empty($stye)){
	foreach ($stye->unique('product_id') as $styl) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $styl->product_id)->first();

	if(!empty($sub_all_products_da)){
	$cat_all_products[]= $sub_all_products_da;
	}

	}

	$style_name= Style::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_style_f)->first();
		if(!empty($style_name)){
			$flter_name= $style_name->name;
		}

}

}elseif ($dec_metal_f != null && $dec_metal_f != "") {

	$metal= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('metal_id',$dec_metal_f)->get();


$cat_all_products=[];
if(!empty($metal)){
	foreach ($metal->unique('product_id') as $metl) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $metl->product_id)->first();

	if(!empty($sub_all_products_da)){
	$cat_all_products[]= $sub_all_products_da;
	}

	}

	$metal_name= Metal::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metal_f)->first();
		if(!empty($metal_name)){
			$flter_name= $metal_name->name;
		}

}

}elseif ($dec_metarial_f != null && $dec_metarial_f != "") {

	$meterial= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('material_id',$dec_metarial_f)->get();


$cat_all_products=[];
if(!empty($meterial)){
	foreach ($meterial->unique('product_id') as $metl) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $metl->product_id)->first();

	if(!empty($sub_all_products_da)){
	$cat_all_products[]= $sub_all_products_da;
	}

	}

	$meterial_name= Material::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metarial_f)->first();
		if(!empty($meterial_name)){
			$flter_name= $meterial_name->name;
		}

}

}elseif ($dec_shape_f != null && $dec_shape_f != "") {

	$shape= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('shape_id',$dec_shape_f)->get();


$cat_all_products=[];
if(!empty($shape)){
	foreach ($shape->unique('product_id') as $shap) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $shap->product_id)->first();

	if(!empty($sub_all_products_da)){
	$cat_all_products[]= $sub_all_products_da;
	}

	}

	$shape_name= Shape::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_shape_f)->first();
		if(!empty($shape_name)){
			$flter_name= $shape_name->name;
		}

}

}elseif ($dec_plating_f != null && $dec_plating_f != "") {

	$plating= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('plating_id',$dec_plating_f)->get();


$cat_all_products=[];
if(!empty($plating)){
	foreach ($plating->unique('product_id') as $plat) {

	$sub_all_products_da = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->where('id', $plat->product_id)->first();

	if(!empty($sub_all_products_da)){
	$cat_all_products[]= $sub_all_products_da;
	}

	}

	$plating_name= Plating::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_plating_f)->first();
		if(!empty($plating_name)){
			$flter_name= $plating_name->name;
		}

}
}else{

	$linkstatus= 1;
$cat_all_products = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_subcat_delete', 0)->where('is_cat_delete', 0)->where('category', $id)->paginate(12);
log::debug($cat_all_products);
}
// print_r($cat_all_products); die();
        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/all_category_product', ['category_data'=>$categories, 'category_pro_data'=>$cat_all_products, 'cate_id'=>$idd, 'linkstatus'=>$linkstatus,'cat_data'=>$cat_data  ]);


    }





		public function products_view( $idd, Request $req){

		log::debug('frontend-index');
$id= base64_decode($idd);

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

$product = Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('id', $id)->first();
$cat_data = Category::wherenull('deleted_at')->where('is_active', 1)->where('id', $product->category)->first();
if(!empty($product->sub_category_id)){
$sub_cat_data = SubCategory::wherenull('deleted_at')->where('is_active', 1)->where('id', $product->sub_category_id)->first();
}else{
	$sub_cat_data = "";
}
if(!empty($product->sub_category_id)){
$mini_sub_data = MiniSubCategory::wherenull('deleted_at')->where('is_active', 1)->where('id', $product->mini_subcategory_id)->first();
}else{
	$mini_sub_data="";
}
log::debug($product);


        // return view('frontend/index', ['category_data'=>$categories]);
        // return view('frontend/all_product', ['category_data'=>$categories]);
        return view('frontend/product_view', ['category_data'=>$categories, 'product_data'=>$product, 'cat_data'=>$cat_data, 'sub_cat_data'=>$sub_cat_data, 'mini_sub_data'=>$mini_sub_data]);


    }


		public function get_color_data(Request $req){

		log::debug('get_color_data');

		$color_id= $req->input('color_id');
		$product_id= $req->input('product_id');
		// $id= $req->input('sale_product_id');
			// $id = base64_decode($idd);

		$productColordata = ProductColorSize::wherenull('deleted_at')-> where('product_id', $product_id)-> where('color_id', $color_id)->first();
		// $productColordata = ProductColorSize::leftjoin('tbl_colors', 'tbl_product_color_size.color_id', '=', 'tbl_colors.id')
		// 							->where('tbl_product_color_size.product_id', '=', $product_id)
		// 							->where('tbl_product_color_size.size_id', '=', $size_id)
		// 							->where('tbl_product_color_size.deleted_at', '=', null)
		// 							->where('tbl_colors.deleted_at', '=', null)
		// 							->where('tbl_product_color_size.is_active', '=', 1)
		// 							->where('tbl_colors.is_active', '=', 1)
		// 							->select('tbl_colors.name', 'tbl_product_color_size.*')
		// 							->get();



		// wherenull('deleted_at')-> where('product_id', $product_id)-> where('size_id', $size_id)->get();
		// $img= $PromocodeData->image;


		log::debug('$productColordata');
		log::debug($color_id);
		log::debug($product_id);
		log::debug($productColordata);
		// $saleproData->delete();


		// unlink( $img );
		$data['data'] = true;
		$data['productColordata'] = $productColordata;



		echo json_encode($data);


    }

//price of color , size of product

public function get_color_price(Request $req){

log::debug('get_color_price');


$product_id= $req->input('product_id');
$color_id= $req->input('color_id');
$cart_id= $req->input('cart_id');

//update variant and color in tbl_cart
$cart_data= Cart::wherenull('deleted_at')->where('id',$cart_id)->first();

if(!empty($cart_data)){

	$data_update = array(

		'color_id'=> $color_id,

	 );

	 $cartData = Cart::wherenull('deleted_at')->where('id', $cart_id)->first();

	 $cartData->update($data_update);

}



$productColordata = ProductColorSize::wherenull('deleted_at')->where('is_active', 1)-> where('product_id', $product_id)->where('color_id', $color_id)->first();

log::debug('$productColordata');
log::debug($productColordata);



$data['data'] = true;
$data['productColordata'] = $productColordata;



echo json_encode($data);


}



//add product ask question form process

public function add_product_askquestion_process(Request $req)
 {

		 log::debug( 'yes Id');
	 $req->validate([
	 'name' => 'required',
	 // 'email' => 'required|email|unique:tbl_contact,email',
	 'email' => 'required|email',
	 'product_id' => 'required',
	 'message' => 'required',

	 ]);



 $questionInfo= [

	 'name' => $req->input('name'),
	 'email' => $req->input('email'),
	 'product_id' => $req->input('product_id'),
	 'message' => $req->input('message'),

	 'ip' => $req->ip()

 ];




	 $last_id = AskQuestion::create($questionInfo);
	 return Redirect::back()->with('status', 'Thankyou for ask question to us, We will get back to you.');



 }




// contact form page
// public function view_contact_page(Request $req){
//
// log::debug('view_contact_page');
//
// $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
//
// $contries= Countries::get();
// log::debug($contries);
//
// 		return view('frontend/contact', ['category_data'=>$categories ,'countrydata'=>$contries  ]);
// }





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
 	 'country_code' => $req->input('country_code'),
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
	 	 'country_code' => $req->input('country_code'),
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








//open new & now products page

public function new_and_now_products(Request $req){

log::debug('frontend-new-&-now-products');

$price_f= $req->input('prc_f');
$gems_id= $req->input('gem_id');
$style_f= $req->input('s_id');
$metal_f= $req->input('m_id');
$material_f= $req->input('mtr_id');
$shape_f= $req->input('sh_id');
$plating_f= $req->input('pl_id');

 $pricerangeS_f= $req->input('pr_lim_st');
 $pricerangeE_f= $req->input('pr_lim_en');

$dec_price_f= base64_decode($price_f);
$dec_gems_f= base64_decode($gems_id);
$dec_style_f= base64_decode($style_f);
$dec_metal_f= base64_decode($metal_f);
$dec_metarial_f= base64_decode($material_f);
$dec_shape_f= base64_decode($shape_f);
$dec_plating_f= base64_decode($plating_f);



$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();


if($price_f != null){
if( $dec_price_f == 1){


	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','desc')->get();


$new_arrive_products=[];
if(!empty($price)){
	$i=0;
	foreach ($price->unique('product_id') as $pric) {

// $sub_all_products= [];

	$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$new_arrive_products[]= $sub_all_products_da;
	}
// echo $i;
$i++;	}

// $flter_name="Low To High";
}

	// log::debug($sub_all_products);
}else{

	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','asc')->get();


$new_arrive_products=[];
if(!empty($price)){
	foreach ($price->unique('product_id') as $pric) {

	$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$new_arrive_products[]= $sub_all_products_da;
	}

	}

// $flter_name="High To Low";
}

}

}elseif (!empty($pricerangeS_f)) {

$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->whereBetween('price', [$pricerangeS_f, $pricerangeE_f])->get();


$new_arrive_products=[];
if(!empty($price)){
foreach ($price->unique('product_id') as $pric) {

	$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $pric->product_id)->first();

if(!empty($sub_all_products_da)){
$new_arrive_products[]= $sub_all_products_da;
}

}

// $flter_name="High To Low";
}



}elseif ($dec_gems_f != null && $dec_gems_f != "") {

	$gemstone_pro_types= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('gemstone_id',$dec_gems_f)->get();


	$new_arrive_products=[];
	if(!empty($gemstone_pro_types)){
	foreach ($gemstone_pro_types->unique('product_id') as $gems_type) {

		$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $gems_type->product_id)->first();

	if(!empty($sub_all_products_da)){
	$new_arrive_products[]= $sub_all_products_da;
	}

	}

	$gemstone_name= Gemstone::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_gems_f)->first();
		if(!empty($gemstone_name)){
			$flter_name= $gemstone_name->name;
		}

	}

}elseif ($dec_style_f != null && $dec_style_f != "") {

$stye= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('style_id',$dec_style_f)->get();


$new_arrive_products=[];
if(!empty($stye)){
foreach ($stye->unique('product_id') as $styl) {

$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $styl->product_id)->first();

if(!empty($sub_all_products_da)){
$new_arrive_products[]= $sub_all_products_da;
}

}

$style_name= Style::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_style_f)->first();
	if(!empty($style_name)){
		$flter_name= $style_name->name;
	}

}

}elseif ($dec_metal_f != null && $dec_metal_f != "") {

$metal= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('metal_id',$dec_metal_f)->get();


$new_arrive_products=[];
if(!empty($metal)){
foreach ($metal->unique('product_id') as $metl) {

$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $metl->product_id)->first();

if(!empty($sub_all_products_da)){
$new_arrive_products[]= $sub_all_products_da;
}

}

$metal_name= Metal::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metal_f)->first();
	if(!empty($metal_name)){
		$flter_name= $metal_name->name;
	}

}

}elseif ($dec_metarial_f != null && $dec_metarial_f != "") {

$meterial= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('material_id',$dec_metarial_f)->get();


$new_arrive_products=[];
if(!empty($meterial)){
foreach ($meterial->unique('product_id') as $metl) {

$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $metl->product_id)->first();

if(!empty($sub_all_products_da)){
$new_arrive_products[]= $sub_all_products_da;
}

}

$meterial_name= Material::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metarial_f)->first();
	if(!empty($meterial_name)){
		$flter_name= $meterial_name->name;
	}

}

}elseif ($dec_shape_f != null && $dec_shape_f != "") {

$shape= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('shape_id',$dec_shape_f)->get();


$new_arrive_products=[];
if(!empty($shape)){
foreach ($shape->unique('product_id') as $shap) {

$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $shap->product_id)->first();

if(!empty($sub_all_products_da)){
$new_arrive_products[]= $sub_all_products_da;
}

}

$shape_name= Shape::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_shape_f)->first();
	if(!empty($shape_name)){
		$flter_name= $shape_name->name;
	}

}

}elseif ($dec_plating_f != null && $dec_plating_f != "") {

$plating= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('plating_id',$dec_plating_f)->get();


$new_arrive_products=[];
if(!empty($plating)){
foreach ($plating->unique('product_id') as $plat) {

$sub_all_products_da = NewArrival::where('is_active', 1)->where('product_id', $plat->product_id)->first();

if(!empty($sub_all_products_da)){
$new_arrive_products[]= $sub_all_products_da;
}

}

$plating_name= Plating::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_plating_f)->first();
	if(!empty($plating_name)){
		$flter_name= $plating_name->name;
	}

}
}else{

$new_arrive_products= NewArrival::where('is_active', 1)->paginate(12);

}

		return view('frontend/new_arrival_product', ['category_data'=>$categories, 'new_arrive_data'=>$new_arrive_products ]);


}


//open sale products page

public function sale_products(Request $req){

log::debug('frontend-sale-products');

// $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();


$price_f= $req->input('prc_f');
$gems_id= $req->input('gem_id');
$style_f= $req->input('s_id');
$metal_f= $req->input('m_id');
$material_f= $req->input('mtr_id');
$shape_f= $req->input('sh_id');
$plating_f= $req->input('pl_id');

 $pricerangeS_f= $req->input('pr_lim_st');
 $pricerangeE_f= $req->input('pr_lim_en');

$dec_price_f= base64_decode($price_f);
$dec_gems_f= base64_decode($gems_id);
$dec_style_f= base64_decode($style_f);
$dec_metal_f= base64_decode($metal_f);
$dec_metarial_f= base64_decode($material_f);
$dec_shape_f= base64_decode($shape_f);
$dec_plating_f= base64_decode($plating_f);



$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();


if($price_f != null){
if( $dec_price_f == 1){


	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','desc')->get();


$clearance_products=[];
if(!empty($price)){
	$i=0;
	foreach ($price->unique('product_id') as $pric) {

// $sub_all_products= [];

	$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$clearance_products[]= $sub_all_products_da;
	}
// echo $i;
$i++;	}

// $flter_name="Low To High";
}

	// log::debug($sub_all_products);
}else{

	$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->orderBy('price','asc')->get();


$clearance_products=[];
if(!empty($price)){
	foreach ($price->unique('product_id') as $pric) {

	$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $pric->product_id)->first();

	if(!empty($sub_all_products_da)){
	$clearance_products[]= $sub_all_products_da;
	}

	}

// $flter_name="High To Low";
}

}

}elseif (!empty($pricerangeS_f)) {

$price= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->whereBetween('price', [$pricerangeS_f, $pricerangeE_f])->get();


$clearance_products=[];
if(!empty($price)){
foreach ($price->unique('product_id') as $pric) {

	$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $pric->product_id)->first();

if(!empty($sub_all_products_da)){
$clearance_products[]= $sub_all_products_da;
}

}

// $flter_name="High To Low";
}



}elseif ($dec_gems_f != null && $dec_gems_f != "") {

	$gemstone_pro_types= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('gemstone_id',$dec_gems_f)->get();


	$clearance_products=[];
	if(!empty($gemstone_pro_types)){
	foreach ($gemstone_pro_types->unique('product_id') as $gems_type) {

		$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $gems_type->product_id)->first();

	if(!empty($sub_all_products_da)){
	$clearance_products[]= $sub_all_products_da;
	}

	}

	$gemstone_name= Gemstone::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_gems_f)->first();
		if(!empty($gemstone_name)){
			$flter_name= $gemstone_name->name;
		}

	}

}elseif ($dec_style_f != null && $dec_style_f != "") {

$stye= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('style_id',$dec_style_f)->get();


$clearance_products=[];
if(!empty($stye)){
foreach ($stye->unique('product_id') as $styl) {

$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $styl->product_id)->first();

if(!empty($sub_all_products_da)){
$clearance_products[]= $sub_all_products_da;
}

}

$style_name= Style::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_style_f)->first();
	if(!empty($style_name)){
		$flter_name= $style_name->name;
	}

}

}elseif ($dec_metal_f != null && $dec_metal_f != "") {

$metal= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('metal_id',$dec_metal_f)->get();


$clearance_products=[];
if(!empty($metal)){
foreach ($metal->unique('product_id') as $metl) {

$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $metl->product_id)->first();

if(!empty($sub_all_products_da)){
$clearance_products[]= $sub_all_products_da;
}

}

$metal_name= Metal::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metal_f)->first();
	if(!empty($metal_name)){
		$flter_name= $metal_name->name;
	}

}

}elseif ($dec_metarial_f != null && $dec_metarial_f != "") {

$meterial= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('material_id',$dec_metarial_f)->get();


$clearance_products=[];
if(!empty($meterial)){
foreach ($meterial->unique('product_id') as $metl) {

$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $metl->product_id)->first();

if(!empty($sub_all_products_da)){
$clearance_products[]= $sub_all_products_da;
}

}

$meterial_name= Material::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_metarial_f)->first();
	if(!empty($meterial_name)){
		$flter_name= $meterial_name->name;
	}

}

}elseif ($dec_shape_f != null && $dec_shape_f != "") {

$shape= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('shape_id',$dec_shape_f)->get();


$clearance_products=[];
if(!empty($shape)){
foreach ($shape->unique('product_id') as $shap) {

$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $shap->product_id)->first();

if(!empty($sub_all_products_da)){
$clearance_products[]= $sub_all_products_da;
}

}

$shape_name= Shape::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_shape_f)->first();
	if(!empty($shape_name)){
		$flter_name= $shape_name->name;
	}

}

}elseif ($dec_plating_f != null && $dec_plating_f != "") {

$plating= ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('plating_id',$dec_plating_f)->get();


$clearance_products=[];
if(!empty($plating)){
foreach ($plating->unique('product_id') as $plat) {

$sub_all_products_da = Clearance::where('is_active', 1)->where('product_id', $plat->product_id)->first();

if(!empty($sub_all_products_da)){
$clearance_products[]= $sub_all_products_da;
}

}

$plating_name= Plating::wherenull('deleted_at')->where('is_active', 1)->where('id', $dec_plating_f)->first();
	if(!empty($plating_name)){
		$flter_name= $plating_name->name;
	}

}
}else{


$clearance_products= Clearance::where('is_active', 1)->paginate(12);

}
		return view('frontend/clearance_product', ['category_data'=>$categories, 'clearance_data'=>$clearance_products ]);


}




//add product producct rating form process

public function add_product_rating($idd,Request $req)
 {

if(!empty($req->session()->get('user_id'))){

		 log::debug( 'yes Id');
	 $req->validate([
	 'rating' => 'required',


	 ]);
$id= base64_decode($idd);
$user_id= $req->session()->get('user_id');


 $ratingInfo= [

	 'name' => $req->input('name'),
	 'email' => $req->input('email'),
	 'rating' => $req->input('rating'),
	 'description' => $req->input('description'),
	 'product_id' => $id,
	 'user_id' => $user_id,


	 'ip' => $req->ip()

 ];



 $prod_rating= Rating::wherenull('deleted_at')->where('user_id', $user_id)->where('product_id', $id)->first();
 	if(empty($prod_rating)){

		$last_id = Rating::create($ratingInfo);
		return Redirect::back()->with('status', 'Thankyou for giving rating on our product.');

 	}else{
		return Redirect::back()->with('status-error', 'You have already given review on this product.');
	}

}else {
	return Redirect('/open_login')->with('status-error', 'Please login first for submitting review');
}

 }





// -------------------------------------garbage clsses strt-------------------------------------//




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





		//add NewsLetter form process

	  public function add_newsletter_process(Request $req)
	   {

	  		 log::debug( 'yes Id');
	  	 $req->validate([
	  	 // 'name' => 'required',
	  	 // 'email' => 'required|email|unique:tbl_newsletter,email',
	  	 'email' => 'required|email'

	  	 ]
	 	 // ,[
	 		// 	'email.email' => 'You already subscibed us with this email, please use another email.',
	 		// ]
	 	);

	 // $name= $req->input('name');

	 $email= $req->input('email');
	 // $route = Illuminate\Support\Facades\Route::getCurrentRoute()->getPath();
	 // echo $route; die();
	   $newsletterInfo= [

	  	 // 'name' => $req->input('name'),
	  	 'email' => $req->input('email'),
	  	 'ip' => $req->ip()

	   ];


	 $newsdata = NewsLetter::wherenull('deleted_at')->where('email', $email)->first();

	 if(empty($newsdata)){
	  	 $last_id = NewsLetter::create($newsletterInfo);
	  	 return Redirect('/')->with('status', 'Thankyou for subscribing with us.');
	 }else{

	 	return Redirect('/')->with('status-error', 'You already subscibed us with this email, please use another email.');
	 }


}





//----------footer pages view link function methods start-----------//

//FAQ Page
		public function FAQ(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/faq', [ 'category_data'=>$categories ]);

		}

		// stone charts
		public function stonechart(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/stonechart', [ 'category_data'=>$categories ]);

		}
		//stonechartstable Page
				public function stonechartstable(Request $req){

					$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

						return view('frontend/stonechartstable', [ 'category_data'=>$categories ]);

				}

//SizeGuides Page
		public function sizeguides(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/sizeguides', [ 'category_data'=>$categories ]);

		}


		//sizeguidestable Page
				public function sizeguidestable(Request $req){

					$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

						return view('frontend/sizeguidestable', [ 'category_data'=>$categories ]);

				}
				//virtualshoping Page
						public function virtualshoping(Request $req){

							$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

								return view('frontend/virtualshoping', [ 'category_data'=>$categories ]);

						}

						//appointment_type Page
								public function appointment_type(Request $req){

									$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

									$Subcategories = SubCategory::wherenull('deleted_at')->where(array('is_active'=>1,'category_id'=>6))->get();

										return view('frontend/appointment_type', [ 'category_data'=>$categories,'Subcategories'=>$Subcategories ]);

								}
//---appoitment_data----
public function booking_appointment(Request $req){

	$req->validate([
	'time' => 'required',
	'f_name' => 'required',
	'l_name' => 'required',
	'phone' => 'required',
	'email' => 'required',
	'subcategory' => 'required',
	'finish' => 'required',
	'country' => 'required',

	]);
  $time = $req->input('time');
  $f_name = $req->input('f_name');
  $l_name = $req->input('l_name');
  $phone = $req->input('phone');
  $email = $req->input('email');
  $subcategory = $req->input('subcategory');
  $finish = $req->input('finish');
  $discuss = $req->input('discuss');
  $country = $req->input('country');

// print_r($finish);
// exit;


	$appointementInfo= [

		'time' => $time,
		'f_name' => $f_name,
		'l_name' => $l_name,
		'phone' => $phone,
		'email' => $email,
		'subcategory_id' => json_encode($subcategory),
		'finish' => json_encode($finish),
		'discuss' => $discuss,
		'country' => $country,
		'ip' => $req->ip(),

	];

	$last_id = Appointment::create($appointementInfo);
	if(!empty($appointementInfo)){
		return Redirect('/')->with('status', 'Request Successfully Submitted');
	}else{
		return Redirect()->back()->with('status-error', 'Some error occured');
	}

}



//Delivery & Returns Page
		public function delivery_and_returns(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/delivery_and_returns', [ 'category_data'=>$categories ]);

		}


//Contact-Us Page
		public function contact_us(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/contact_us', [ 'category_data'=>$categories ]);

		}
//terms_and_conditions
		public function terms_and_conditions(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/terms_and_conditions', [ 'category_data'=>$categories ]);

		}



//add contact form process

		public function add_contact_process(Request $req)
		 {

				 // log::debug( 'yes Id');
			 $req->validate([
			 'name' => 'required',
			 'email' => 'required|email|unique:tbl_contact,email',
			 'subject' => 'required',
			 'message' => 'required',

			 ]);



		 $contactInfo= [

			 'name' => $req->input('name'),
			 'email' => $req->input('email'),
			 'contact_number' => $req->input('contact_number'),
			 'subject' => $req->input('subject'),
			 'message' => $req->input('message'),

			 'ip' => $req->ip()

		 ];




			 $last_id = Contact::create($contactInfo);
			 return Redirect('/contact_us')->with('status', 'Thankyou for contact us, We will get back to you.');

		 }




//Our Story Page
		public function our_story(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/our_story', [ 'category_data'=>$categories ]);

		}


		//REPAIR POLICY Page
				public function repair_policy(Request $req){

// echo "hii";
// exit;
								$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

									return view('frontend/repair_policy', [ 'category_data'=>$categories ]);
					// $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
			// return	 view('frontend/common/header');
		         // return  view('frontend/repaire_policy');
		// return		 view('frontend/common/footer');


				}

//catalogpage
		public function catalogpage(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/catalogpage', [ 'category_data'=>$categories ]);

		}

		//catalogpage
				public function packaging(Request $req){

					$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

						return view('frontend/packaging', [ 'category_data'=>$categories ]);

				}



		//user catelogue send request start


		public function user_catelogue_request(Request $req){


			$user_id= $req->session()->get('user_id');
					$catelogue_checkbx = $req->input('catelogue_checkbx');
					$business_name = $req->input('business_name');
					$contact_name = $req->input('contact_name');
					$email = $req->input('email');
					$phone = $req->input('phone');
					$country = $req->input('country');

		$catelogue_checkbx_json= json_encode($catelogue_checkbx);


							log::debug( 'yes Id');
						$req->validate([
						// 'catelogue_checkbx' => 'required',
						// 'business_name' => 'required',
						// 'contact_name' => 'required',
						'email' => 'required',
						'country' => 'required',

						]);

		if(empty($catelogue_checkbx) ){
			// echo "yes"; die();
			return Redirect('/catelogue')->with('status-error', 'Please select checkbox befor submission.');

		}



					$userCatelogueInfo= [

						'catelogue_checkbx' => $catelogue_checkbx_json,
						'business_name' => $business_name,
						'contact_name' => $contact_name,
						'email' => $email,
						'phone' => $phone,
						'country' => $country,

						'ip' => $req->ip(),

					];




						$last_id = UserCatelogue::create($userCatelogueInfo);


						// $to_name= $contact_name;
						// 			$to_email = $email;
						// 			// $department = WholesaleInquiry::wherenull('deleted_at')->where('department_id',$department_id)->select('department_name')->first();
						//
						// 			$data= array('name' => $to_name);
						// 			Mail::send('frontend/emails/catalogue_request', $data, function($message) use ($to_name, $to_email){
						//
						// 				$message->to($to_email)->subject('Catalogue Request on Gemcobeads.');
						//
						// 			});


						return Redirect('/catalogpage')->with('status', 'Data Added Successfully.');





		}

		//user catelogue send request end




//Our Materials Page
		public function our_materials(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/our_materials', [ 'category_data'=>$categories ]);

		}


//Careers Page
		public function careers(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/careers', [ 'category_data'=>$categories ]);

		}

// //Terms And Conditions Page
// 	public function terms_and_conditions(Request $req){
//
// 		$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();
//
// 			return view('frontend/terms_and_conditions', [ 'category_data'=>$categories ]);
//
// 	}
//Fitness Terms And Conditions Page
	public function fitness_trainer_terms_and_conditions(Request $req){

		$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

			return view('frontend/fitness_trainer_terms_and_conditions', [ 'category_data'=>$categories ]);

	}

	//Refund and Policy
		public function Refund_Policy(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/Refund_Policy', [ 'category_data'=>$categories ]);

		}

//Privacy Policy Page
		public function privacy_policy(Request $req){

			$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

				return view('frontend/privacy_policy', [ 'category_data'=>$categories ]);

		}




//-----refer a friend all api start-----//


//refer afriend reviews

public function refer_friend_view(Request $req){

log::debug('frontend-refer_friend_view');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();


		return view('frontend/refer_friend_view', ['category_data'=>$categories]);
		// return Redirect('/refer_a_friend');


}


//add detail refer_friend_process form process

public function refer_friend_process(Request $req)
 {

		log::debug( 'yes Id');
	$req->validate([
	'name' => 'required',
	'email' => 'required|email|unique:tbl_refer_friend,email',

	]);


$name= $req->input('name');
$email= $req->input('email');

$ip= $req->ip();
 $ReferFriendInfo= [

	'name' => $name,
	'email' =>$email,

	'ip' => $ip

 ];




	$last_data = ReferAfriend::create($ReferFriendInfo);

	$last_id= base64_encode($last_data->id);


	// $to_name= $fname." ".$lname;
	 // 		$to_email = $email;
	 // 		// $department = WholesaleInquiry::wherenull('deleted_at')->where('department_id',$department_id)->select('department_name')->first();
	//
	 // 		$data= array('name' => $to_name);
	 // 		Mail::send('frontend/emails/inquery_mail', $data, function($message) use ($to_name, $to_email){
	//
	 // 			$message->to($to_email)->subject('Wholesale Inquery on Jwellery Paredise.');
	//
	 // 		});
	return Redirect('/refer_a_friend/'.$last_id);






 }


//refer a friend to giftcard reviews

public function refer_a_friend($idd, Request $req){

log::debug('frontend-refer_friend_view');

$categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();


		return view('frontend/refer_a_friend', ['category_data'=>$categories, 'refer_id'=> $idd]);


}



//add detail refer_friend_process form process

public function refer_a_friend_process( $idd, Request $req)
 {

		log::debug( 'yes Id');
	$req->validate([
	'invite_email' => 'required',
	'subject' => 'required',

	]);

$refer_id= base64_decode($idd);
$invite_email= $req->input('invite_email');
$subject= $req->input('subject');
$note= $req->input('note');
// $gift= "Refer@2Ashu";

$random_string= $this->generateRandomString();
$gift= "Refer".$random_string;

$productInfo= [

'promocode' => $gift,
'offer_type' => 1,
'type' => 1,
'minimum_amount' =>0,
'percent' => 12,
'order_qualify_type' => 1,
'start_date' => "",
'expiry_date' => "",
// 'maximum_gift_amount' => 500,
// 'ip' => $req->ip(),
'added_by' => "",
'is_active' => 1,
'from_status' => 1,

];


$promo_last_id = Promocode::create($productInfo);

 $ReferEmailFriendInfo= [

	'invite_email' => $invite_email,
	'subject' =>$subject,
	'note' =>$note,
	'giftcard' =>$gift,

	'ip' => $req->ip()

 ];



$refrs= ReferAFriend::wherenull('deleted_at')->where('id',$refer_id)->first();



// echo $refrs; die();
if(!empty($refrs)){
	$refrs->update($ReferEmailFriendInfo);
}


	$message=$subject."Use this promocode at the time of checkout: ".$gift;
                $data['name'] = "Sir/Ma'am";
                $data['heading'] = "Your friend sent you referral link for Gemx Jewellery";
                $data['body'] = $message;

                Mail::send('email/mail', $data, function ($message) use ($invite_email) {
                    $message->to($invite_email)->subject('Gemx Jewellery referral link');
                    $message->from(EMAIL, 'Gemx Jewellery');
                });


	return Redirect('/refer_friend_view')->with('status', 'Reffered your friend Successfully.');






 }

public function comming_soon(Request $req)
 {
	 $categories = Category::wherenull('deleted_at')->where('is_active', 1)->get();

	 return view('frontend/comming_soon', ['category_data'=>$categories]);


 }

//-----refer a friend all api end-----//


public function generateRandomString($length = 4)
{
		$characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ%$@*!';
		$charactersLength = strlen($characters);
		$randomString = '';
		for ($i = 0; $i < $length; $i++) {
				$randomString .= $characters[rand(0, $charactersLength - 1)];
		}
		return $randomString;
}







//----------footer pages view link function methods end-----------//






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
