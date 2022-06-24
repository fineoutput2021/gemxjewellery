<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Product;
use App\adminmodel\Category;
use App\adminmodel\SubCategory;
use App\adminmodel\Inventory;
use App\adminmodel\Size;
use App\adminmodel\Color;
use App\adminmodel\ProductColorSize;
use App\adminmodel\ProductSize;
use App\adminmodel\InventoryTransaction;
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

class InventoryController extends Controller
{


	  public function add_inventory_view($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

$id=base64_decode($idd);

$pro_data= Product::wherenull('deleted_at')->where('id', $id)->first();

if(!empty($pro_data)){
$prod_name= $pro_data->name;
}else{
$prod_name= "";
}

		$pro_color_data= ProductColorSize::wherenull('deleted_at')->where('product_id', $id)->get();
		$pro_size_data= ProductSize::wherenull('deleted_at')->where('product_id', $id)->get();
		$color_data= Color::wherenull('deleted_at')->get();
		$size_data= Size::wherenull('deleted_at')->get();

		return view('admin/inventory/add_inventory',['pro_color_data' => $pro_color_data, 'pro_size_data' => $pro_size_data, 'color_data' => $color_data, 'size_data' => $size_data , 'product_id' => $idd ,'product_name'=>$prod_name]);

	}else{
	 return view('admin/login/index');
	}

    }

		//remove inventory view
		public function remove_inventory_view($idd, $Iidd,Request $req){

if(!empty($req->session()->has('admin_data'))){

		$id=base64_decode($idd);
		$Iid=base64_decode($Iidd);

$pro_data= Product::wherenull('deleted_at')->where('id', $id)->first();

if(!empty($pro_data)){

$prod_name= $pro_data->name;

}else{

$prod_name= "";

}

				$pro_color_data= ProductColorSize::wherenull('deleted_at')->where('product_id', $id)->get();
				$pro_size_data= ProductSize::wherenull('deleted_at')->where('product_id', $id)->get();
				$color_data= Color::wherenull('deleted_at')->get();
				$size_data= Size::wherenull('deleted_at')->get();

				$inventory_data= Inventory::wherenull('deleted_at')->where('id', $Iid)->first();

				return view('admin/inventory/remove_inventory',['pro_color_data' => $pro_color_data, 'pro_size_data' => $pro_size_data, 'color_data' => $color_data, 'size_data' => $size_data , 'product_id' => $idd , 'inventory_id' => $Iidd , 'product_name'=>$prod_name, 'inventorydetails'=> $inventory_data ]);


			}else{
			 return view('admin/login/index');
			}

		    }


public function subcat_data(Request $req){


 $category_id = trim($req->input('cat_id'));
$subcate_data= SubCategory::wherenull('deleted_at')->where('category_id', $category_id)->get();


if(!empty($subcate_data)){

	$data['data']=true;
		$data['cat_id']=$category_id;
	$data['sub_cat_data']=$subcate_data;
// echo json_encode($data); exit;
}
else{

	$data['data']=false;
	$data['cat_id']=$subcate_data;
$data['sub_cat_data']="";
// echo json_encode($data); exit;
}


echo json_encode($data);


}




    public function view_inventory_category(Request $req){

if(!empty($req->session()->has('admin_data'))){

      $Category_data= Category::wherenull('deleted_at')->get();


      return view('admin/inventory/view_inventory_category',[ 'categorydetails' => $Category_data ]);

		}else{
		 return view('admin/login/index');
		}

    }


    public function view_inventory_subcategory($idd, Request $req){

if(!empty($req->session()->has('admin_data'))){

$id=base64_decode($idd);

      $Category_data= Category::wherenull('deleted_at')->get();
      $SubCategory_data= SubCategory::wherenull('deleted_at')->where('category_id', $id)->where('is_cat_delete', 0)->get();


      return view('admin/inventory/view_inventory_subcategory',[ 'categorydetails' => $Category_data , 'subcategorydetails' => $SubCategory_data,  'category_id' => $idd ]);

		}else{
		 return view('admin/login/index');
		}

    }


	  public function view_inventory_products($cidd, $sidd, Request $req){

if(!empty($req->session()->has('admin_data'))){

$cid= base64_decode($cidd);
$sid= base64_decode($sidd);


			$Category_data= Category::wherenull('deleted_at')->get();
			$SubCategory_data= SubCategory::wherenull('deleted_at')-> where('is_cat_delete', 0)->get();

			$Product_Data= Product::wherenull('deleted_at')->where('category',$cid)->where('sub_category_id',$sid)-> where('is_cat_delete', 0)-> where('is_subcat_delete', 0)->get();

			return view('admin/inventory/view_inventory_products',['productdetails' => $Product_Data, 'categorydetails' => $Category_data, 'subcategorydetails' => $SubCategory_data,  'category_id' => $cidd, 'subcategory_id' => $sidd]);

		}else{
		 return view('admin/login/index');
		}

    }

    public function view_inventory($idd,Request $req){

if(!empty($req->session()->has('admin_data'))){

$id= base64_decode($idd);

      $Color_Data= Color::wherenull('deleted_at')->get();
      $Size_data= Size::wherenull('deleted_at')->get();

    $product_da  = Product::wherenull('deleted_at')-> where('is_cat_delete', 0)-> where('is_subcat_delete', 0)->get();

			 $Inventory_data= Inventory::wherenull('deleted_at')-> where('product_id', $id)->get();

      return view('admin/inventory/view_inventory',['colordetails' => $Color_Data, 'sizedetails' => $Size_data, 'inventorydetails' => $Inventory_data ,  'productdetails' => $product_da,  'product_id' => $idd ]);

		}else{
		 return view('admin/login/index');
		}

    }


public function view_inventory_transaction(Request $req){

if(!empty($req->session()->has('admin_data'))){

	$Color_Data= Color::wherenull('deleted_at')->get();
	$Size_data= Size::wherenull('deleted_at')->get();

$product_da  = Product::wherenull('deleted_at')-> where('is_cat_delete', 0)-> where('is_subcat_delete', 0)->get();

	 $InventoryTrans_data= InventoryTransaction::wherenull('deleted_at')->get();

	return view('admin/inventory/inventory_transaction',['colordetails' => $Color_Data, 'sizedetails' => $Size_data, 'inventorydetails' => $InventoryTrans_data ,  'productdetails' => $product_da,  ]);

}else{
 return view('admin/login/index');
}

}



// Add And update Inventory
	 public function add_inventory_process(Request $req)
    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
		$enc_product_id = $req->input('product_id');

		$product_id= base64_decode($enc_product_id);




				log::debug( 'yes Id');
			$req->validate([
			'color_id' => 'required',
			// 'size_id' => 'required',
			'stock' => 'required',

			]);


$color_id= $req->input('color_id');
// $size_id= $req->input('size_id');
$inputstock= $req->input('stock');

	// $cur_date=date("Y-m-d H:i:s");
		$inventoryInfo= [

			'product_id' => $product_id,
			'color_id' => $req->input('color_id'),
			// 'size_id' => $req->input('size_id'),
			'stock' => $req->input('stock'),


			'ip' => $req->ip(),
			'added_by' => $admin_id,
			'is_active' => 1,

		];


	$inventry_da= Inventory::wherenull('deleted_at')-> where('product_id', $product_id)->where('color_id', $color_id)->first();

if(empty($inventry_da)){
			$last_id = Inventory::create($inventoryInfo);

			$upInventoryTransactionInfo= [

				'product_id' => $product_id,
				'color_id' => $req->input('color_id'),
				// 'size_id' => $req->input('size_id'),
				'stock' => $inputstock,
				'type' => 1,
				'ip' => $req->ip(),
				'added_by' => $admin_id,
				'is_active' => 1,


			];

				$lastTrans_id = InventoryTransaction::create($upInventoryTransactionInfo);

		}else{
			$stock= $inventry_da->stock;
			$updatedstock = $stock + $inputstock;

			$upInventoryInfo= [

				'stock' => $updatedstock,

			];

			$inventry_da->update($upInventoryInfo);

			$upInventoryTransactionInfo= [

				'product_id' => $product_id,
				'color_id' => $req->input('color_id'),
				// 'size_id' => $req->input('size_id'),
				'stock' => $inputstock,
				'type' => 1,
				'ip' => $req->ip(),
				'added_by' => $admin_id,
				'is_active' => 1,


			];

				$lastTrans_id = InventoryTransaction::create($upInventoryTransactionInfo);

		}

				return Redirect('/view_inventory/'.$enc_product_id)->with('status', 'Inventory Added Successfully.');


			}else{
			 return view('admin/login/index');
			}

    }




			 public function remove_inventory_process(Request $req)
		    {

if(!empty($req->session()->has('admin_data'))){

$admin_id= $req->session()->get('admin_id');
				$enc_product_id = $req->input('product_id');
				$enc_inv_id = $req->input('inventory_id');

				$product_id= base64_decode($enc_product_id);
				$inventory_id= base64_decode($enc_inv_id);


						log::debug( 'yes Id');
					$req->validate([
					'color_id' => 'required',
					// 'size_id' => 'required',
					'stock' => 'required',

					]);


		$color_id= $req->input('color_id');
		// $size_id= $req->input('size_id');
		$inputstock= $req->input('stock');




			$inventry_da= Inventory::wherenull('deleted_at')->where('id', $inventory_id)-> where('product_id', $product_id)->first();

if(!empty($inventry_da)){
					$stock= $inventry_da->stock;

					if($stock >= $inputstock){
					$updatedstock = $stock - $inputstock;

					$upInventoryInfo= [

						'product_id' => $product_id,
						'color_id' => $req->input('color_id'),
						// 'size_id' => $req->input('size_id'),
						'stock' => $updatedstock,

					];

					$inventry_da->update($upInventoryInfo);

//inventory transation entry
$upInventoryTransactionInfo= [

	'product_id' => $product_id,
	'color_id' => $req->input('color_id'),
	// 'size_id' => $req->input('size_id'),
	'stock' => $inputstock,
	'type' => 2,
	'ip' => $req->ip(),
	'added_by' => $admin_id,
	'is_active' => 1,


];

	$lastTrans_id = InventoryTransaction::create($upInventoryTransactionInfo);



	return Redirect('/view_inventory/'.$enc_product_id)->with('status', 'Inventory Added Successfully.');

				}else{
					return Redirect::back()->with('status-error', 'Your Input stock greater then this product stock. ');
				}
		}


	}else{
	 return view('admin/login/index');
	}


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
