<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
// use App\adminmodel\Order;
use App\adminmodel\Promocode;
use App\adminmodel\Sale;
use App\adminmodel\SaleProduct;
// use App\adminmodel\Inventory;
// use App\adminmodel\Cart;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
//use Crypt;
use Mail;
use Log;
use session;

class SaleController extends Controller
{


	  public function add_sale_view(Request $req){

if(!empty($req->session()->has('admin_data'))){

		return view('admin/sale/add_sale');

	}else{
	 return view('admin/login/index');
	}

    }

    public function add_sale_product_view($id, Request $req){

if(!empty($req->session()->has('admin_data'))){

$id_dec= base64_decode($id);
    $Category_data= Category::wherenull('deleted_at')->get();
    $SubCategory_data= SubCategory::wherenull('deleted_at')->get();


    return view('admin/sale/add_sale_product', ['sale_id'=>$id, 'category'=>$Category_data, 'subcategory'=>$SubCategory_data]);

	}else{
	 return view('admin/login/index');
	}

    }


		public function add_sale_product_process(){

if(!empty($req->session()->has('admin_data'))){

					return Redirect('/view_sale')->with('status', 'Sale Created Successfully.');

				}else{
				 return view('admin/login/index');
				}

		}

    public function subcat_pro_data(Request $req){

$admin_id= $req->session()->get('admin_id');
    // if($request->method('post')){
     $category_id = trim($req->input('cat_id'));
     $subcategory_id = trim($req->input('subcat_id'));
     $sale_id = trim($req->input('sale_id'));
    log::debug($category_id);
    log::debug($subcategory_id);
    log::debug($sale_id);

$data_msg="";

    $subcate_prod_data= Product::wherenull('deleted_at')->where('sub_category_id', $subcategory_id)->get();
log::debug($subcate_prod_data);

$sale_id_products= SaleProduct::wherenull('deleted_at')->where('sub_category_id', $subcategory_id)->where('sale_id', $sale_id)->first();
 // die();

 log::debug('$sale_id_products');
 log::debug($sale_id_products);

 if(empty($sale_id_products)){
	 log::debug("blank");
if(!empty($subcate_prod_data)){
  // $i=1;
 foreach ($subcate_prod_data as $subcat_pro) {

      $dataInfo = [
				'sale_id' =>$sale_id,
				'product_id' =>$subcat_pro->id,
				'category_id' =>$category_id,
				'sub_category_id' =>$subcategory_id,
				'added_by' =>$admin_id,
				'is_active' =>1,
			];
  // $i++;

    $last_id = SaleProduct::create($dataInfo);

    }
  }

}else{
 log::debug("not_blank");
  $data_msg="This Subcategory Products Alredy Exists In This Sale.";
}

log::debug('$subcategory_id');
log::debug($subcategory_id);
log::debug('sale_id');
log::debug($sale_id);

$sale_subcat_prod_data= SaleProduct::wherenull('deleted_at')->where('sub_category_id', $subcategory_id)->where('sale_id', $sale_id)->get();

$sales_data= Sale::wherenull('deleted_at')->where('id', $sale_id)->first();



log::DEBUG('$sale_subcat_prod_data') ;
log::DEBUG($sale_subcat_prod_data) ;
$prod_data= Product::wherenull('deleted_at')->where('sub_category_id', $subcategory_id)->get();

    log::debug('$prod_data');
    log::debug($prod_data);
		log::debug('$sale_subcat_prod_data');
		log::debug($sale_subcat_prod_data);

    if(!empty($sale_subcat_prod_data) && !empty($prod_data)){
    	 log::debug('yes');
    	$data['data']=true;
    		$data['sale_id']=$sale_id;
    		$data['cat_id']=$category_id;
    		$data['sub_cat_id']=$subcategory_id;;
    		$data['prod_data']=$prod_data;
    		$data['sales_data']=$sales_data;
    	$data['sale_sub_pro_data']=$sale_subcat_prod_data;
			$data['data_msg']=$data_msg;
     echo json_encode($data); exit;
    }
    else{
    		 log::debug('no');
    	$data['data']=false;
      $data['sale_id']=$sale_id;
      $data['cat_id']=$category_id;
      $data['sub_cat_id']=$subcategory_id;
			$data['sales_data']="";
      $data['prod_data']= "";
    $data['sale_sub_pro_data']= "";
		$data['data_msg']=$data_msg;
     echo json_encode($data); exit;
    }

    echo json_encode($data);



    }





		public function update_sale_view($id){

if(!empty($req->session()->has('admin_data'))){

			$id_decode = base64_decode($id);
		$saleData = Sale::wherenull('deleted_at')-> where('id', $id_decode)->first();

		return view('admin/sale/update_sale',['sale_data' => $saleData ]);

	}else{
	 return view('admin/login/index');
	}

		}




	  public function view_sale(Request $req){

if(!empty($req->session()->has('admin_data'))){

			$sale_data= Sale::wherenull('deleted_at')->get();

			return view('admin/sale/view_sale',['saledetails' => $sale_data]);

		}else{
		 return view('admin/login/index');
		}

    }



    public function view_sale_products($idd, Request $req){

if(!empty($req->session()->has('admin_data'))){

$id= base64_decode($idd);

			$sale_pro_join_data= SaleProduct::leftjoin('tbl_products', 'tbl_sale_products.product_id', '=', 'tbl_products.id')
                    ->where('tbl_sale_products.sale_id', '=', $id)
                    ->where('tbl_products.deleted_at', '=', null)
                    ->where('tbl_products.is_cat_delete', '=', 0)
                    ->where('tbl_sale_products.deleted_at', '=', null)
                    ->select('tbl_products.*', 'tbl_sale_products.*')
                    ->get();


			$sale_pro_data= SaleProduct::wherenull('deleted_at')->get();
			$sale_data= Sale::wherenull('deleted_at')->where('id',$id)->first();
			$pro_data= Product::wherenull('deleted_at')->get();
			$category_data= Category::wherenull('deleted_at')->get();
			$subcategory_data= SubCategory::wherenull('deleted_at')->get();

			return view('admin/sale/view_sale_products',['saleproductdetails' => $sale_pro_join_data, 'sale_data'=>$sale_data, 'saleprodetails' => $sale_pro_data, 'prodetails' => $pro_data, 'categorydetails' => $category_data, 'subcategorydetails' => $subcategory_data ]);

		}else{
		 return view('admin/login/index');
		}

    }



		public function update_sale_status($status,$idd,Request $req ){

if(!empty($req->session()->has('admin_data'))){

			log::debug( 'update_status');
			log::debug( $status);
			log::debug( $idd);

	$id = base64_decode($idd);

		if($status == "active"){

			$saleStatusInfo= [

				'is_active' =>1,


			];


				$saleData = Sale::wherenull('deleted_at')-> where('id', $id)->first();
				log::debug( $saleData);

				$saleData->update($saleStatusInfo);

		}
		else{

			$saleStatusInfo= [

				'is_active' =>0,


			];

			$saleData = Sale::wherenull('deleted_at')-> where('id', $id)->first();
			log::debug( $saleData);
			$saleData->update($saleStatusInfo);


		}


			return Redirect('/view_sale')->with('status', 'Status Updated Successfully.');


		}else{
		 return view('admin/login/index');
		}


		}



		public function deleteSale($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

					$id = base64_decode($idd);
				log::debug('$deleteSale');
				log::debug($id);
				$saleData = Sale::wherenull('deleted_at')-> where('id', $id)->first();
				// $img= $PromocodeData->image;


				log::debug($saleData);
				$saleData->delete();

				$saleProData = SaleProduct::wherenull('deleted_at')-> where('sale_id', $id)->get();

if(!empty($saleProData)){
				foreach ($saleProData as $salepro) {
					// code...

					$salesProdData = SaleProduct::wherenull('deleted_at')-> where('id', $salepro->id)->first();


					log::debug($salesProdData);
					$salesProdData->delete();
				}
			}


		       return Redirect('/view_sale')->with('status', 'Data Deleted Successfully.');


				 }else{
				  return view('admin/login/index');
				 }

		    }

				public function deleteSaleProduct($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

							$id = base64_decode($idd);
						log::debug('deleteSaleProduct');
						log::debug($id);
						$saleproData = SaleProduct::wherenull('deleted_at')-> where('id', $id)->first();
						// $img= $PromocodeData->image;


						log::debug($saleproData);
						$saleproData->delete();


				      return Redirect::back()->with('status', 'Product Successfully Removed From Sale.');


						}else{
						 return view('admin/login/index');
						}

				    }

//delete product from add sale product page

public function delete_sale_pro(Request $req){



		$id= $req->input('sale_product_id');

		log::debug('delete_sale_pro');
		log::debug($id);
		$saleproData = SaleProduct::wherenull('deleted_at')-> where('id', $id)->first();


		log::debug($saleproData);
		$saleproData->delete();


$data['data'] = true;



		echo json_encode($data);

		}


	 public function add_sale_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

    $admin_id= $req->session()->get('admin_id');
		$enc_sale_id = $req->input('id');

		$sale_id= base64_decode($enc_sale_id);


		if($sale_id && $sale_id != ""){

				log::debug( 'yes Id');
			$req->validate([
			'sale' => 'required',
			'offer_type' => 'required',
			'order_qualify_type' => 'required',
			'start_date' => 'required',
			'expiry_date' => 'required',

			]);
		}
		else{
			log::debug( 'no Id');
			$req->validate([
        'sale' => 'required',
  			'offer_type' => 'required',
  			'order_qualify_type' => 'required',
  			'start_date' => 'required',
  			'expiry_date' => 'required',

		]);
		}
		log::debug('$addSale');




		$saleInfo= [

			'sale' => $req->input('sale'),
			'offer_type' => $req->input('offer_type'),
			'percent' => $req->input('percent'),
			'order_qualify_type' =>$req->input('order_qualify_type'),
			'quantity' => $req->input('quantity'),
			'minimum_order_total' => $req->input('minimum_order_total'),
			'start_date' => $req->input('start_date'),
			'expiry_date' => $req->input('expiry_date'),
			'terms_and_conditions' => $req->input('terms_and_conditions'),
			// 'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


		if($sale_id && $sale_id != ""){

				$updated_last_id = Sale::wherenull('deleted_at')-> where('id', $sale_id)->first();
				$updated_last_id->update($saleInfo);

        $updated_last_enc_id= base64_encode($updated_last_id->id);
				return Redirect('/view_sale')->with('status', 'Sale Updated Successfully.');


		}
		else{

			$last_id = Sale::create($saleInfo);

      $last_enc_id= base64_encode($last_id->id);

      return Redirect('/add_sale_product_view/'.$last_enc_id);
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
