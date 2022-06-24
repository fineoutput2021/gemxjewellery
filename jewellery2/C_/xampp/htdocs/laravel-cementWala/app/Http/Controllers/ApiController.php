<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\adminmodel\Category;
use App\adminmodel\Agent;
use App\adminmodel\Inventory;
use App\adminmodel\Slider;
use App\adminmodel\Slider1;
use App\adminmodel\Advertisement;
use App\adminmodel\Topbrands;
use App\adminmodel\Signup;
use App\adminmodel\Brand;
use App\adminmodel\SubCategory;
use App\adminmodel\Product;
use App\adminmodel\NewArrival;
use App\adminmodel\Clearance;
use App\adminmodel\Type;
use App\adminmodel\Users;
use App\adminmodel\User_temp;
use App\adminmodel\Otp;
use App\frontendmodel\Cart;
use App\adminmodel\Cart2;
use App\adminmodel\Address;
use App\adminmodel\Promocode;
use App\adminmodel\Order1;
use App\adminmodel\Delivery_status;
use App\adminmodel\Order2;
use App\adminmodel\Wallet;
use App\adminmodel\Wallet_txn;
use App\adminmodel\Delivery_boy;
use App\adminmodel\App_slider;
use App\adminmodel\States;
use App\adminmodel\App_version;
use App\adminmodel\Team;
use App\adminmodel\Admin_notification;
use DB;
use Image;
use Redirect;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
//use Crypt;
use Mail;
use Log;
use session;

class ApiController extends Controller
{


	  public function get_category(Request $req){

            $category_datas= Category::wherenull('deleted_at')->where('is_active', 1)->get();

            $category_data=[];
            if(!empty($category_datas)){
                foreach($category_datas as $category){

                    $cat_idd=$category->id;
            $subcategory_datas= SubCategory::wherenull('deleted_at')->where('category_id', $cat_idd)->get();
            $rtr="";
            $arr=[];
            foreach($subcategory_datas as $subc2){

                $rt22r='<NavLink><li>'.$subc2->name.'</li></NavLink>';
              $rtr.=$rt22r;

              $arr[]=array(

                'id'=>$subc2->id,
                'name'=>$subc2->name,

            );


            }



                    $category_data[]= array(

                        'id'=>$category->id,
                        'name'=>$category->name,
                        'image'=>$category->image,
                        'image2'=>$category->image2,
                        'sub_cat'=>$arr

                    );


                }
            }


            $res= array(
                'msg'=> 'success',
                'status'=> 200,
                'data'=> $category_data,
            );



            return json_encode($res);

    }
    public function get_subcategory(Request $req,$cat_id=""){

        $subcategory_datas= SubCategory::wherenull('deleted_at')->where('category_id', $cat_id)->get();
        $subcategory_data=[];
        if(!empty($subcategory_datas)){
            foreach($subcategory_datas as $subcategory){
                $subcategory_data[]= array(
                    'category_id'=>$subcategory->category_id,
                    'name'=>$subcategory->name,
                    'image'=>base_path.$subcategory->image,
                );
            }
            $res= array(
                'msg'=> 'success check1',
                'status'=> 200,
                'data'=> $subcategory_data,
            );
        }else{
            $res=[
                'msg'=>'error',
                'status'=>200,
                'data'=>'No data Found'
            ];
        }
        return response($res);
    }
public function get_blog(Request $req){

    $blog_data= Blog::wherenull('deleted_at')->where('is_active', 1)->get();

    $blog_data=[];
    if(!empty($blog_data)){
        foreach($blog_data as $blog){

            $blog_data[]= array(

                'heading'=>$subcategory->heading,
                'image'=>$subcategory->image,
                'content'=>$subcategory->content,


            );


        }
    }


    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $blog_data,
    );



    return json_encode($res);



}
public function get_inventory(Request $req){

    $inventory_data= Inventory::wherenull('deleted_at')->where('is_active', 1)->get();

    $inventory_data=[];
    if(!empty($inventory_data)){
        foreach($inventory_data as $inventory){

            $inventory_data[]= array(

                'productid'=>$inventory->productid,
                'unit_id'=>$inventory->unit_id,
                'stock'=>$inventory->stock,


            );


        }
    }


    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $inventory_data,
    );



    return json_encode($res);



}

public function get_agent(Request $req){

    $agent_datas= agent::wherenull('deleted_at')->where('is_active', 1)->get();


    $agent_data=[];
    if(!empty($agent_datas)){
        foreach($agent_datas as $agent){

            $agent_data[]= array(

                'name'=>$agent->name,
                'number'=>$agent->number,
                'email'=>$agent->email,
                'unique'=>$agent->unique,


            );


        }
    }


    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $agent_data,
    );



    return json_encode($res);



}
public function get_slider(Request $req){

    $slider_datas= App_slider::wherenull('deleted_at')->where('is_active', 1)->get();



    $slider_data=[];
    if(!empty($slider_datas)){
        foreach($slider_datas as $slider){

            $slider_data[]= array(
            'id'=>$slider->id,
                'link'=>$slider->link,
                'image'=>base_path.$slider->image,



            );


        }
    }


    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $slider_data,
    );



    return json_encode($res);






}
public function get_order(Request $req){

    $order_data= Order::wherenull('deleted_at')->where('is_active', 1)->get();

    $order_data=[];
    if(!empty($order_data)){
        foreach($order_data as $order){

            $order_data[]= array(

                'name'=>$order->name,
                'link'=>$order->link,
                'image'=>$order->image,



            );


        }
    }


    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $order_data,
    );



    return json_encode($res);






}
public function get_slider1(Request $req){

    $slider1_datas= Slider1::wherenull('deleted_at')->where('is_active', 1)->get();

    $slider1_data=[];
    if(!empty($slider1_datas)){
        foreach($slider1_datas as $slider1){

            $slider1_data[]= array(
            'id'=>$slider1->id,
                'name'=>$slider1->name,
                'link'=>$slider1->link,
                'image'=>base_path.$slider1->image,



            );


        }
				$image_data1 = $slider1_data[0];
				$image_data2 = $slider1_data[1];

				$slider2_data= array(
				'id'=>$slider1->id,
						'name'=>$slider1->name,
						'link1'=>$image_data1['link'],
						'link2'=>$image_data2['link'],
						'image1'=>$image_data1['image'],
						'image2'=>$image_data2['image'],



				);


    }


    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $slider2_data,
    );



    return json_encode($res);






}
public function get_advertisement(Request $req){

    $advertisement_datas= Advertisement::wherenull('deleted_at')->where('is_active', 1)->get();

    $advertisement_data=[];
    if(!empty($advertisement_datas)){
        foreach($advertisement_datas as $advertisement){

            $advertisement_data[]= array(
            'id'=>$advertisement->id,
                'name'=>$advertisement->name,
                'link'=>$advertisement->link,
                'image'=>base_path."/".$advertisement->image,



            );


        }
    }


    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $advertisement_data,
    );



    return json_encode($res);






}

public function get_topbrands(Request $req){

    $topbrands_datas= Topbrands::wherenull('deleted_at')->where('is_active', 1)->get();

    $topbrands_data=[];
    if(!empty($topbrands_datas)){
        foreach($topbrands_datas as $topbrands){

            $topbrands_data[]= array(
            'id'=>$topbrands->id,
                'name'=>$topbrands->name,
                'link'=>$topbrands->link,
                'image'=>base_path."/".$topbrands->image,
            );

        }
    }
    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $topbrands_data,
    );
    return json_encode($res);
}


public function post_signup(Request $req){
    $signup_datas= Signup::wherenull('deleted_at')->where('is_active', 1)->get();
    $signup_data=[];
    if(!empty($signup_datas)){
        foreach($signup_datas as $signup){
            $signup_data[]= array(
            'id'=>$signup->id,
                'fullname'=>$signup->fullname,
                'number'=>$signup->number,
                'agent_id'=>$signup->agent_id,
                'otp'=>$signup->otp,
            );
        }
    }
    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $signup_data,
    );
    return json_encode($res);
}
    public function get_products($id,Request $req){

        // echo "hi";
        // exit;
        $product_datas= Product::wherenull('deleted_at')->where(array('subcategory_id'=> $id,'is_active'=>1))->get();
       $product_data=[];
        if(!empty($product_datas)){
            foreach($product_datas as $product){

							$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product->id,'is_active'=>1))->first();


                $product_data[]= array(
                    'category_id'=>$product->category_id,
                    'subcategory_id'=>$product->subcategory_id,
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'price'=>$type_data->selling_price,
                    'costprice'=>$type_data->mrp,
                    'saleprice'=>$type_data->selling_price_gst,
                    'image'=>base_path."/".$product->image
                );
            }
        }
        $res= array(
            'msg'=> 'success',
            'status'=> 200,
            'data'=> $product_data,
        );
        // return response($res);
         return json_encode($res);
    }
    public function get_subcategorys(Request $req){

        $subcategorys_datas= Subcategory::wherenull('deleted_at')->where('is_active', 1)->get();

        $subcategorys_data=[];
        if(!empty($subcategorys_datas)){
            foreach($subcategorys_datas as $subcategory){
    //loop for products
                $subcategorys_data[]= array(
                'id'=>$subcategory->id,
                    'name'=>$subcategory->name,
                    'category_id'=>$subcategory->category_id,
                    'image'=>base_path.$subcategory->image
                );

            }
        }
        $res= array(
            'msg'=> 'success',
            'status'=> 200,
            'data'=> $subcategorys_data
        );
        return json_encode($res);
    }
    public function product_detail(Request $req){
        $productdets=Product::wherenull('deleted_at')->where('deleted_at')->where('category_id', $cat_id)->get();

        $productdet=[];
        if(!empty($productdets)){
            foreach($productdets as $product){

                $productdets[]=array(
                'id'=>$product->id,
                'name'=>$product->name,

                'image'=>base_path."/".$product->image,
                );

}
        }
        $res= array(
            'msg'=> 'success',
            'status'=> 200,
            'data'=> $productdet
        );
        return json_encode($res);
    }

    public function get_productss($id,Request $req){
        $getproduct_datas= Product::wherenull('deleted_at')->where('id', $id)->get();
        $getproduct_data=[];
				$image=[];
				$type=[];
        if(!empty($getproduct_datas)){
            foreach($getproduct_datas as $product){
							$image=array(
								base_path.$product->image,
								base_path.$product->image2,
								base_path.$product->image3,
								base_path.$product->image4,
							);
							$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product->id,'is_active'=>1))->get();
							$type_data1= Type::wherenull('deleted_at')->where(array('product_id'=> $product->id,'is_active'=>1))->first();
$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data1->id,'is_active'=>1))->first();

	if($inventory_data->quantity > 0){
$availability = "In stock";
	}else{
		$availability = "Out of stock";

	}

							foreach ($type_data as $value) {
								$price=$value->selling_price;
								$costprice=$value->mrp;
								$sale_price=$value->selling_price_gst;
							$type[] = array(
									'type_id'=> $value->id,
									'type_name'=> $value->type_name,
									 'price'=>$price,
									'costprice'=>$costprice,
									'saleprice'=>$sale_price,
									'suffix'=>$value->suffix,
							);
								}
                $getproduct_data= array(
                    'category_id'=>$product->category_id,
                    'subcategory_id'=>$product->subcategory_id,
                    'id'=>$product->id,
                    'name'=>$product->name,
                    'productdesc'=>$product->productdesc,
                    'productspec'=>$product->productspec,
                    'brand_id'=>$product->brandid,
										'price'=>$type_data1->selling_price,
										'image'=>$image,
										'availability'=>$availability,
										'type' =>$type
                );
            }
        }
        $res= array(
            'msg'=> 'success',
            'status'=> 200,
            'data'=> $getproduct_data,
        );
        return json_encode($res);
    }


    public function get_brand(Request $req){

        $brand_datas= Brand::wherenull('deleted_at')->where('is_active', 1)->get();

        $brand_data=[];
        if(!empty($brand_datas)){
            foreach($brand_datas as $brand){

                $brand_data[]= array(

                    'image'=>$brand->image,



                );


            }
        }


        $res= array(
            'msg'=> 'success',
            'status'=> 200,
            'data'=> $brand_data,
        );



        return json_encode($res);



    }



//-------------- featured Product------------------------------------


		public function featured_products(Request $req){

		    $product_data= Product::wherenull('deleted_at')->where('is_active', 1)->inRandomOrder()->limit(10)->get();

		    $featured_data=[];
		    if(!empty($product_data)){
		        foreach($product_data as $featured){
							$a=1;
						if($a<11){
						$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $featured->id,'is_active'=>1))->first();
						if(!empty($type_data)){
							$price=$type_data->selling_price_gst;
						}else{
							$price="";
						}
		            $featured_data[]= array(

		                'product_id'=>$featured->id,
		                'name'=>$featured->name,
		                'price'=>	$price,
										'image' => base_path.$featured->image

		            );

							}else{
								break;
							}
								$a++;
		        }
		    }


		    $res= array(
		        'msg'=> 'success',
		        'status'=> 200,
		        'data'=> $featured_data,
		    );



		    return json_encode($res);



		}




//----------Recent product---------------------------

	public function related_products(Request $req){

			$req->validate([

				'subcategory_id' => 'required'

			]);
			$sub_id = $req->input('subcategory_id');

			$product_data= Product::wherenull('deleted_at')->where(array('subcategory_id'=> $sub_id,'is_active'=>1))->get();

		  $recent_data=[];
		  if(!empty($product_data)){
		 		 foreach($product_data as $recent){
		 			 $a=1;
		 		 if($a<11){
					 $type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $recent->id,'is_active'=>1))->first();
					 if(!empty($type_data)){
						 $price=$type_data->selling_price_gst;
					 }else{
						 $price="";
					 }
		 				 $recent_data[]= array(

		 						 'id'=>$recent->id,
		 						 'name'=>$recent->name,
		 						 'type_id'=>$type_data->id,
								 'price'=>	$price,
		 						 'image' => base_path.$recent->image

		 				 );

		 			 }else{
		 				 break;
		 			 }
		 				 $a++;
		 		 }
		  }


		  $res= array(
		 		 'msg'=> 'success',
		 		 'status'=> 200,
		 		 'data'=> $recent_data,
		  );



		  return json_encode($res);

		}

//------------User Register-------------------------------------------
public function user_register(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$device_id=$headers['Deviceid'];

			$req->validate([

				'name' => 'required'

			]);

			$name = $req->input('name');
			$agent_id = $req->input('agent_id');

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if(empty($user_data)){


	$OTP =random_int(100000, 999999);
	// $OTP =123456;


								$temp_userpInfo= [

									'name' =>$name,
									'phone' =>$phone,
									'agent_id' =>	$agent_id,
									'ip' => $req->ip(),
									// 'temp_id'=> $last_id->id

								];

								$user=User_temp::create($temp_userpInfo)->toArray();

						$otpInfo= [

							'phone' => $phone,
							'otp' => $OTP,
							'ip' => $req->ip(),
							'temp_id' => $user['id']


						];

						$last_id = Otp::create($otpInfo)->toArray();


						$msg= "OTP is ".$OTP." for login on CEMENTWALE and valid till 5 Do not share this OTP to anyone for security reasons. Fortunext Cementwala, [  'qY4rNU8dq78'  ]" ;

					$curl = curl_init();

					curl_setopt_array($curl, array(
					  // CURLOPT_URL => "http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=".$phone."&message=OTP%20is%20".$OTP."%20for%20login%20on%20CEMENTWALE%20and%20valid%20till%205%20Do%20not%20share%20this%20OTP%20to%20anyone%20for%20security%20reasons.%20Fortunext%20Cementwala%2C%20y5gTz9xuHT&sender=FORNXT&route=4&country=91&DLT_TE_ID=1307163799738258863",
					  CURLOPT_URL => "http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=".$phone."&message=".urlencode($msg)."&sender=FORNXT&route=4&country=91&DLT_TE_ID=1307163799738258863",
											 CURLOPT_RETURNTRANSFER => true,
											 CURLOPT_ENCODING => "",
											 CURLOPT_MAXREDIRS => 10,
											 CURLOPT_TIMEOUT => 30,
											 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
											 CURLOPT_CUSTOMREQUEST => "GET",
											 CURLOPT_SSL_VERIFYHOST => 0,
											 CURLOPT_SSL_VERIFYPEER => 0,
											));

											$response = curl_exec($curl);
											$err = curl_error($curl);
											curl_close($curl);

											if ($err) {
											 echo "cURL Error #:" . $err;
											} else
											{
											// echo $response;
											}

											if(!empty($last_id)){

												$res= array(
														'msg'=> 'success',
														'status'=> 200
												);



												return json_encode($res);


											}else{

												$res= array(
										        'msg'=> 'fail',
										        'status'=> 201
										    );



										    return json_encode($res);

											}

}else{

	$res= array(
			'msg'=> 'User is already registed',
			'status'=> 201
	);



	return json_encode($res);


}
}


//----------Get Otp-----------
public function verify_otp(Request $req){

	$headers = apache_request_headers();
				$number=$headers['Authorization'];
				$device_id=$headers['Deviceid'];



				$req->validate([

					'otp' => 'required'

				]);

				$OTP = $req->input('otp');
				$fcm_token = $req->input('fcm_token');

$otp_data= Otp::where('phone', $number)->orderBy('id', 'DESC')->first();

if(!empty($otp_data)){

if($otp_data->otp==$OTP){

	$otp_update =[
		'status'=>1
	];
	// echo $otp_data->id;
	// exit;
	$updated_last_id = Otp::where('id', $otp_data->id)->first();
	$updated_last_id->update($otp_update);

	// $updated_last_id1 = Otp::where('id', $updated_last_id['temp_idsss'])->first()->toArray();

$temp_user_data= User_temp::where('id', $updated_last_id->temp_id)->first();
// print_r($temp_user_data);
// exit;
if(!empty($temp_user_data)){

$token=Str::random(40);

// $token="hvbbbdxdfhghdexhgh113131313112343253654#$%bnonn";
	$userInfo= [

		'name' => $temp_user_data->name,
		'phone' => $temp_user_data->phone,
		'agent_id' => $temp_user_data->agent_id,
		'ip' => $req->ip(),
		'added_by' =>999,
		'is_active' => 1,
		'token'=> $token,
		'fcm_token'=> $fcm_token,

	];

	if (Users::where('phone',$temp_user_data->phone)->exists()) {
		$res= array(
				'msg'=> 'Number is already registed ',
				'status'=> 201
		);

		return json_encode($res);
	}else{


$created_data=Users::create($userInfo)->toArray();




if(!empty($created_data)){

// echo"hi";
// exit;



			Cart2::where('device_id', $device_id)->update(['user_id' =>$created_data['id'] ]);
		// $updated_last_id = Cart2::where('device_id',$device_id)->first();
		// $updated_last_id->update($cart_id_add);ci insert data

		date_default_timezone_set("Asia/Calcutta");
						$cur_date=date("d-m-Y");

$expiry_date = date('d-m-Y', strtotime("+".WALLET_VALIDITY." months", strtotime($cur_date)));
		$walletInfo= [

			'user_id' => $created_data['id'],
			'wallet_amount' => WALLET,
			'wallet_create_date' => $cur_date,
			'wallet_expire_date' => $expiry_date,
			'is_active' => 1,

		];
		$wallet_data=Wallet::create($walletInfo)->toArray();



	$res= array(
			'msg'=> 'success',
			'status'=> 200,
			'token'=> $token
	);

	return json_encode($res);

}
else{
	$res= array(
			'msg'=> 'Data insertion fail',
			'status'=> 201
	);



	return json_encode($res);
}
}
}
}
else{
	$res= array(
			'msg'=> 'Otp Not match',
			'status'=> 201
	);



	return json_encode($res);
}
}
}

//-----------user login------
public function user_login(Request $req){

$headers = apache_request_headers();
		 $phone=$headers['Authorization'];
		 $device_id=$headers['Deviceid'];

 	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data){
	$OTP =random_int(100000, 999999);
	// $OTP =123456;
	$otpInfo= [

		'phone' => $phone,
		'otp' => $OTP,
		'ip' => $req->ip()


	];

	$last_id = Otp::create($otpInfo)->toArray();


	$msg= "OTP is ".$OTP." for login on CEMENTWALE and valid till 5 Do not share this OTP to anyone for security reasons. Fortunext Cementwala, [  'qY4rNU8dq78'  ]" ;

						$curl = curl_init();

						curl_setopt_array($curl, array(
						  // CURLOPT_URL => "http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=".$phone."&message=OTP%20is%20".$OTP."%20for%20login%20on%20CEMENTWALE%20and%20valid%20till%205%20Do%20not%20share%20this%20OTP%20to%20anyone%20for%20security%20reasons.%20Fortunext%20Cementwala%2C%20y5gTz9xuHT&sender=FORNXT&route=4&country=91&DLT_TE_ID=1307163799738258863",
						  CURLOPT_URL => "http://www.smsguruonline.com/api/sendhttp.php?authkey=366782AviUbjnf61334546P1&mobiles=".$phone."&message=".urlencode($msg)."&sender=FORNXT&route=4&country=91&DLT_TE_ID=1307163799738258863",
						 CURLOPT_RETURNTRANSFER => true,
						 CURLOPT_ENCODING => "",
						 CURLOPT_MAXREDIRS => 10,
						 CURLOPT_TIMEOUT => 30,
						 CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
						 CURLOPT_CUSTOMREQUEST => "GET",
						 CURLOPT_SSL_VERIFYHOST => 0,
						 CURLOPT_SSL_VERIFYPEER => 0,
						));

						$response = curl_exec($curl);
						$err = curl_error($curl);
						curl_close($curl);

						if ($err) {
						 echo "cURL Error #:" . $err;
						} else
						{
						// echo $response;
						}

						if(!empty($last_id)){

							$res= array(
									'msg'=> 'success',
									'status'=> 200
							);


							return json_encode($res);

}


}
else{


		$res= array(
				'msg'=> 'User not found',
				'status'=> 201
		);



		return json_encode($res);
}
}

//---------------verify user otp-------
public function verify_user_otp(Request $req){

	$headers = apache_request_headers();
			$number=$headers['Authorization'];
			$device_id=$headers['Deviceid'];


			$req->validate([

				'otp' => 'required'

			]);

			$OTP = $req->input('otp');
			$fcm_token = $req->input('fcm_token');

$otp_data= Otp::where(array('status'=>0,'phone'=> $number))->orderBy('id', 'DESC')->first();
// print_r($otp_data->otp);
// exit;
if(!empty($otp_data)){

if($otp_data->otp==$OTP){

	$otp_update =[
		'status'=>1
	];

	$updated_last_id = Otp::where('id', $otp_data->id)->first();
	$updated_last_id->update($otp_update);
// $token=Str::random(40);
// 	$tokend =[
// 		'token'=> $token
// 	];
// // $token="hvbbbdxdfhghdexhgh113131313112343253654#$%bnonn";
// 	$updated_last_id1 = Users::where('phone', $number)->first();
// 	$updated_last_id1->update($tokend);
$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $number,'is_active'=>1))->first();
if(!empty($user_data)){

	Cart2::where('device_id', $device_id)->update(['user_id' =>$user_data->id ]);
	Users::where('id', $user_data->id)->update(['fcm_token' =>$fcm_token ]);


	$res= array(
			'msg'=> 'success',
			'status'=> 200,
			'token'=> $user_data->token
	);

	return json_encode($res);
}else{
	$res= array(
			'msg'=> 'Some error occured',
			'status'=> 201
	);

	return json_encode($res);
}
}else{
	$res= array(
			'msg'=> 'Wrong Otp',
			'status'=> 201
	);



	return json_encode($res);
}

}else{
	$res= array(
			'msg'=> 'Otp is already used',
			'status'=> 201
	);



	return json_encode($res);
}


}


//---------------add to Cart-----------------

public function add_to_cart(Request $req){
	// echo "hi";
	// exit;
	$headers = [];
	$headers = apache_request_headers();

			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];

$req->validate([

	'product_id' => 'required',
	'type_id' => 'required',
	'quantity' => 'required'

]);

$product_id = $req->input('product_id');
$type_id = $req->input('type_id');
$quantity = $req->input('quantity');



if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){

	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();



	if($inventory_data->quantity >= $quantity){
// echo $inventory_data->quantity;
// exit;
	$cart_data= [

		'product_id' => $product_id,
		'type_id' => $type_id,
		'quantity' => $quantity,
		'user_id' => $user_data->id,
		'device_id' => $device_id,
		'ip' => $req->ip()


	];
	if (Cart2::where(array('product_id'=>$product_id,'user_id'=> $user_data->id))->exists()) {
		// echo "hi";
		// exit;
		$res= array(
				'msg'=> 'Product is already in cart',
				'status'=> 201
		);

		return json_encode($res);
	}else{
	$last_id5 = Cart2::create($cart_data)->toArray();

	if($last_id5){

		$res= array(
			'msg'=> 'success',
			'status'=> 200
	);



	return json_encode($res);
}else{
	$res= array(
		'msg'=> 'Fail',
		'status'=> 201
);



return json_encode($res);
}
}
}
else{

	$res= array(
		'msg'=> 'Product is out of stock',
		'status'=> 201
	);



	return json_encode($res);

}
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}
//insert with device id
else{

	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

// echo $inventory_data->quantity;
// exit;

	if($inventory_data->quantity >= $quantity){


	$cart_data= [

		'product_id' => $product_id,
		'type_id' => $type_id,
		'quantity' => $quantity,
		'device_id' => $device_id,
		'ip' => $req->ip()


	];
	if (Cart2::where(array('product_id'=>$product_id,'type_id'=>$type_id,'device_id'=>$device_id))->exists()) {
		$res= array(
				'msg'=> 'Product is already in cart',
				'status'=> 201
		);

		return json_encode($res);
	}else{
	$last_id5 = Cart2::create($cart_data)->toArray();

	if($last_id5){

		$res= array(
			'msg'=> 'success',
			'status'=> 200
	);



	return json_encode($res);
}else{
	$res= array(
		'msg'=> 'Fail',
		'status'=> 201
);



return json_encode($res);
}
}
}
else{

	$res= array(
		'msg'=> 'Product is out of stock',
		'status'=> 201
	);



	return json_encode($res);

}


}
}

//-------cart data------
public function cart_data(Request $req){


	$headers = apache_request_headers();
			$device_id=$headers['Deviceid'];
			$phone=$headers['Authorization'];
			$password=$headers['Password'];




	if(!empty($phone)){

		$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();
// printr($user_data);
// exit;
if(!empty($user_data)){
	if($user_data->token==$password){

		$cart_data= Cart2::where('user_id', $user_data->id)->get();
		$cartInfo=[];
		$pr2=0;
		$total= 0;
		$subtotal=0;
		foreach ($cart_data as $value) {

			$product_data= Product::wherenull('deleted_at')->where('id', $value->product_id)->first();
			$type_data= Type::wherenull('deleted_at')->where('id', $value->type_id)->first();

$total =  $type_data->selling_price_gst * $value->quantity;

			$cartInfo[] = array(

				'product_id' => $value->product_id,
				'name' => $product_data->name,
				'image' => base_path.$product_data->image,
				'quantity' => $value->quantity,
				'type_id' => $type_data->id,
				'type_name' => $type_data->type_name,
				'price' => $type_data->selling_price_gst,
				'total_price' => $total
			);

$subtotal = $subtotal + $total;
		}
		$res= array(
				'msg'=> 'success',
				'status'=> 200,
				'data' => $cartInfo,
				'subtotal' => $subtotal
		);



		return json_encode($res);


	}else{
		$res= array(
				'msg'=> 'Wrong Password',
				'status'=> 201
		);



		return json_encode($res);
	}

}
	}
	//insert with device id
	else{

		$cart_data= Cart2::wherenull('deleted_at')->where('device_id', $device_id)->get();
		$cartInfo=[];
		foreach ($cart_data as $value) {

			$product_data= Product::wherenull('deleted_at')->where('id', $value->product_id)->first();
			$type_data= Type::wherenull('deleted_at')->where('id', $value->type_id)->first();

			$total =  + $type_data->selling_price_gst * $value->quantity;

			$cartInfo[] = array(

				'product_id' => $value->product_id,
				'name' => $product_data->name,
				'image' => base_path.$product_data->image,
				'quantity' => $type_data->quantity,
				'type_name' => $type_data->type_name,
				'price' => $type_data->selling_price_gst,
				'total_price' => $total

			);
			$subtotal = $subtotal + $total;

		}
		$res= array(
				'msg'=> 'success',
				'status'=> 200,
				'data' => $cartInfo,
				'subtotal' => $subtotal
		);



		return json_encode($res);




	}
	}
//---------add address-------------
public function add_address(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];




			$req->validate([

				'name' => 'required',
				'phone' => 'required',
				'house' => 'required',
				'address' => 'required',
				'city' => 'required',
				'state' => 'required',
				'pincode' => 'required'

			]);

			$name = $req->input('name');
			$number = $req->input('phone');
			$gst = $req->input('gSTN');
			$plot_no = $req->input('house');
			$address = $req->input('address');
			$city = $req->input('city');
			$state = $req->input('state');
			$pincode = $req->input('pincode');
			$longitude = $req->input('longitude');
			$latitude = $req->input('latitude');


	if(!empty($phone)){

		$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

		if($user_data->token==$password){

$addressInfo =[
	'user_id' => $user_data->id,
	'name' => $name,
	'phone' => $number,
	'plot_no' => $plot_no,
	'address' => $address,
	'city' => $city,
	'state' => $state,
	'pincode' => $pincode,
	'longitude' => $longitude,
	'latitude' => $latitude,
	'gst' => $gst,
	'ip' => $req->ip(),
];

$address_data = Address::create($addressInfo)->toArray();

if(!empty($address_data)){
	$res= array(
			'msg'=> 'success',
			'status'=> 200,
			'adderess_id' =>$address_data['id']
	);

	return json_encode($res);

}else{
	$res= array(
			'msg'=> 'fail',
			'status'=> 201
	);

	return json_encode($res);
}
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}

}
}

//------address list------

public function address_list(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];


if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

	if($user_data->token==$password){

	$address_data= Address::wherenull('deleted_at')->where('user_id', $user_data->id)->get();
if(!empty($address_data)){
	$addressInfo = [];
foreach ($address_data as $value) {
if(!empty($value->longitude)){
	$longitude =  $value->longitude;
}
else{
	$longitude= "";
}
if(!empty($value->latitude)){
	$latitude =  $value->latitude;
}
else{
	$latitude= "";
}
$addressInfo[] = array(
			'address_id' => $value->id,
			'address' => $value->address,
			'city' => $value->city,
			'state' => $value->state,
			'pincode' => $value->pincode,
			'longitude' => $value->$longitude,
			'latitude' => $value->$latitude
);

}

$res= array(
		'msg'=> 'success',
		'status'=> 200,
		'data' => $addressInfo
);

return json_encode($res);

}else{
	$res= array(
			'msg'=> 'No data',
			'status'=> 201
	);

	return json_encode($res);
}
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}

}
}

//------promocode list--------
public function promocode_list(Request $req){

	$promocodeInfo = Promocode::wherenull('deleted_at')->get();

	$promocode_data=[];
	foreach ($promocodeInfo as $value) {

		$promocode_data[] = array(
				'id' => $value->id,
				'name' => $value->promocode,
				'giftpercent' => $value->giftpercent,
				'max' => $value->max,
				'minorder' => $value->minorder,
		);

	}
	$res= array(
			'msg'=> 'success',
			'status'=> 200,
			'data' => $promocode_data
	);

	return json_encode($res);


}

//-------my orders--------
public function my_orders(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];


if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

	if($user_data->token==$password){

$order_data= Order1::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'payment_status'=>1))->orderBY('id','DESC')->get();
if(!empty($order_data)){
	$orderInfo =[];
foreach ($order_data as $value) {
// echo "hi";
// exit;

  // $order_date1 = new DateTime($value->created_at);
  $order_date= $value->created_at->format('d-m-Y');   #d-m-Y  // March 10, 2001, 5:16 pm

if($value->payment_type==1){
	$payment_type= 'COD';

}else{
	$payment_type= 'Online Payment';

}
 if($value->order_status==1){
	 $order_status="Placed";
 }else if($value->order_status==2){
	 $order_status="Confirmed";
 }else if($value->order_status==3){
	 $order_status="Dispatched";
 }else if($value->order_status==4){
	 $order_status="Delivered";
 }else if($value->order_status==5){
	 $order_status="Cancelled";
 }

if($order_status=="Dispatched" || $order_status=="Delivered" || $order_status=="Cancelled"){
	$cancel_status = 0;
}else{
	$cancel_status = 1;
}
// echo $order_status;
// exit;
if(!empty($value->discount)){
	$p_discount=$value->discount;
}else{
	$p_discount="";
}
if(!empty($value->wallet_discount)){
	$w_discount=$value->wallet_discount;
}else{
	$w_discount="";
}

if($order_status=="Dispatched"){
$boy_data= Delivery_boy::wherenull('deleted_at')->where(array('id'=> $value->delivery_boy_id,'is_active'=>1))->first();

if(!empty($boy_data->name)){
	$boyy=$boy_data->name;
}
else{
	$boyy="";

}
if(!empty($boy_data->phone)){
	$phonee=$boy_data->phone;
}
else{
	$phonee="";

}


$boy_info = [
	'delivery_boy_name'=>$boyy,
	'deliver_boy_number'=>$phonee,
];

}else{
	$boy_info = [];
}

	$orderInfo[]=array(
		'order_id'=>$value->id,
		'total_amount'=>$value->final_amount,
		'order_date'=>$order_date,
		'payment_type'=>$payment_type,
		'delivery_charger'=>$value->delivery_charge,
		'promocode_discount'=>$p_discount,
		'wallet_discount'=>$w_discount,
		'order_status'=>$order_status,
		'cancel_status'=>$cancel_status,
		'delivery_boy'=>$boy_info

	);

}
$res= array(
		'msg'=> 'success',
		'status'=> 200,
		'data' => $orderInfo
);

return json_encode($res);
}
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}
}

}

//-------My Orders Details--------
public function my_orders_details(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];

			$req->validate([

				'order_id' => 'required'

			]);

			$order_id = $req->input('order_id');

if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

	if($user_data->token==$password){

$order_data= Order2::where('main_id', $order_id)->get();
$order_chk = $order_data->first();
if(!empty($order_chk)){
	$orderInfo =[];
foreach ($order_data as $value) {

	$product_data= Product::wherenull('deleted_at')->where(array('id'=> $value->product_id,'is_active'=>1))->first();
	$type_data= Type::wherenull('deleted_at')->where(array('id'=> $value->type_id,'is_active'=>1))->first();

	$order_date= $value->created_at->format('d-m-Y');   #d-m-Y  // March 10, 2001, 5:16 pm

	$orderInfo[]=array(
		'name'=>$product_data->name,
		"image"=>base_path.$product_data->image,
		'type_name'=>$type_data->type_name,
		'type_price'=>$value->type_amt,
		'quantity'=>$value->quantity,
		'total_amount'=>$value->total_amount,
		"order_date"=>	$order_date

	);

}
$res= array(
		'msg'=> 'success',
		'status'=> 200,
		'data' => $orderInfo
);

return json_encode($res);
}
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}
}

}


//----------cancel order---------

public function cancel_order(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];




			$req->validate([

				'order_id' => 'required'

			]);

			$order_id = $req->input('order_id');


if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){

	$orderInfo = [
		'order_status'=> 5
	];

	$updated_last_id = Order1::wherenull('deleted_at')-> where('id', $order_id)->first();
	$updated_last_id->update($orderInfo);

	$res= array(
			'msg'=> 'success',
			'status'=> 200
	);



	return json_encode($res);

}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}

}

//----delete product from cart------

public function delete_product_cart(Request $req){

	$headers = apache_request_headers();

		$phone=$headers['Authorization'];
		$password=$headers['Password'];
		$device_id=$headers['Deviceid'];


		$req->validate([

			'product_id' => 'required'

		]);

		$product_id = $req->input('product_id');


if(!empty($phone)){

$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){

$delete = Cart2::where(array('product_id'=> $product_id,'user_id' =>$user_data->id))->delete();

if(!empty($delete)){
	$res= array(
			'msg'=> 'success',
			'status'=> 200
	);

	return json_encode($res);
}else{
	$res= array(
			'msg'=> 'fail',
			'status'=> 200
	);

	return json_encode($res);
}

}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}
					//-----without log in----------
else{

	$delete = Cart2::where(array('product_id'=> $product_id,'device_id' =>$device_id))->delete();
if(!empty($delete)){
	$res= array(
			'msg'=> 'success',
			'status'=> 200
	);

	return json_encode($res);
}else{
	$res= array(
			'msg'=> 'fail',
			'status'=> 200
	);

	return json_encode($res);
}
}

}

//------update cart----------


public function update_cart(Request $req){


	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];


$req->validate([

	'product_id' => 'required',
	'type_id' => 'required',
	'quantity' => 'required'

]);

$product_id = $req->input('product_id');
$type_id = $req->input('type_id');
$quantity = $req->input('quantity');


if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){
	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

	if($inventory_data->quantity >= $quantity){

	$cart_data= [

		'type_id' => $type_id,
		'quantity' => $quantity,
		'ip' => $req->ip()


	];

	$updated_last_id = Cart2::where(array('product_id'=> $product_id,'user_id'=>$user_data->id))->first();
	$updated_last_id->update($cart_data);


			$res= array(
					'msg'=> 'success',
					'status'=> 200
			);



			return json_encode($res);

}else{
	$res= array(
			'msg'=> 'product is out of stock',
			'status'=> 201
	);



	return json_encode($res);
}

}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}
				//update with device id
else{

	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

	if($inventory_data->quantity >= $quantity){

		$cart_data= [

			'type_id' => $type_id,
			'quantity' => $quantity,
			'ip' => $req->ip()


		];

		$updated_last_id = Cart2::where(array('product_id'=> $product_id,'device_id'=>$device_id))->first();
		$updated_last_id->update($cart_data);


		$res= array(
				'msg'=> 'success',
				'status'=> 200
		);



		return json_encode($res);

	}else{
		$res= array(
				'msg'=> 'product is out of stock',
				'status'=> 201
		);



		return json_encode($res);
	}

}
}

//---------------Home Product Cart-----------------

public function home_product_cart(Request $req){
	$headers = [];
	$headers = apache_request_headers();

			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];

$req->validate([

	'product_id' => 'required',

]);

$product_id = $req->input('product_id');



if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){

	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

	if($inventory_data->quantity >= MIN_QUANTITY){

	$cart_data= [

		'product_id' => $product_id,
		'type_id' => $type_data->id,
		'quantity' => MIN_QUANTITY,
		'user_id' => $user_data->id,
		'device_id' => $device_id,
		'ip' => $req->ip()


	];
	if (Cart2::where(array('product_id'=>$product_id,'type_id'=>$type_data->id, 'user_id'=> $user_data->id))->exists()) {
		$res= array(
				'msg'=> 'Product is already in cart',
				'status'=> 201
		);

		return json_encode($res);
	}else{
	$last_id5 = Cart2::create($cart_data)->toArray();

	if($last_id5){

		$res= array(
			'msg'=> 'success',
			'status'=> 200
	);



	return json_encode($res);
}else{
	$res= array(
		'msg'=> 'Fail',
		'status'=> 201
);



return json_encode($res);
}
}
}
else{

	$res= array(
		'msg'=> 'Product is out of stock',
		'status'=> 201
	);



	return json_encode($res);

}
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}
//insert with device id
else{

	$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $product_id,'is_active'=>1))->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

// echo $inventory_data->quantity;
// exit;

	if($inventory_data->quantity >= $quantity){


	$cart_data= [

		'product_id' => $product_id,
		'type_id' => $type_id,
		'quantity' => $quantity,
		'device_id' => $device_id,
		'ip' => $req->ip()


	];
	if (Cart2::where(array('product_id'=>$product_id,'type_id'=>$type_id,'device_id'=>$device_id))->exists()) {
		$res= array(
				'msg'=> 'Product is already in cart',
				'status'=> 201
		);

		return json_encode($res);
	}else{
	$last_id5 = Cart2::create($cart_data)->toArray();

	if($last_id5){

		$res= array(
			'msg'=> 'success',
			'status'=> 200
	);



	return json_encode($res);
}else{
	$res= array(
		'msg'=> 'Fail',
		'status'=> 201
);



return json_encode($res);
}
}
}
else{

	$res= array(
		'msg'=> 'Product is out of stock',
		'status'=> 201
	);



	return json_encode($res);

}


}
}

//---------Search--------
public function search_list(Request $req){
	$headers = [];
	$headers = apache_request_headers();

			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];

$req->validate([

	'string' => 'required',

]);

$string = $req->input('string');

$product_Info= Product::wherenull('deleted_at')->Where('name', 'like', '%' . $string . '%')->get();

$product_data=[];

foreach ($product_Info as $value) {
if($value->is_active==1){
$type_data= Type::wherenull('deleted_at')->where(array('product_id'=> $value->id,'is_active'=>1))->first();

$product_data[]=array(
										'product_id'=> $value->id,
										'name'=> $value->name,
										'price'=> $type_data->selling_price_gst,
										"image"=>base_path.$value->image
);
}
}

$res= array(
	'msg'=> 'success',
	'status'=> 200,
	'data'=>$product_data
);



return json_encode($res);

}


//---------check_payment--------
public function check_payment(Request $req){
	$headers = [];
	$headers = apache_request_headers();

			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];

$req->validate([

	'txn_id' => 'required',

]);

$txn_id = $req->input('txn_id');

if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){

	$order_data= Order1::wherenull('deleted_at')->where('txnid', $txn_id)->first();

	$workingKey="43FE2B8FFB06FB9F35F32A2AB58B02DF";
	$access_code='AVEW27II80AV83WEVA';
if(!empty($order_data)){


	$merchant_json_data =
	    array(
	    'order_no' => $order_data->id,
		// 'reference_no' =>$bank_ref_no[1]
	);
	// print_r($merchant_json_data);
	// exit;
	$merchant_data = json_encode($merchant_json_data);
	$encrypted_data = $this->encrypt($merchant_data, $workingKey);
	// print_r($encrypted_data);


	$final_data = 'enc_request='.$encrypted_data.'&access_code=AVEW27II80AV83WEVA&command=orderStatusTracker&request_type=JSON&response_type=JSON';


	// print_r($final_data);

	// $headers = array(
	//             'Content-Type: application/json');
if(GATWAY==0){
	$URL="https://apitest.ccavenue.com/apis/servlet/DoWebTrans";
}else{
	$URL="https://api.ccavenue.com/apis/servlet/DoWebTrans";
}



	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $URL);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_VERBOSE, 1);
	// curl_setopt($ch, CURLOPT_HTTPHEADER,$headers) ;
	curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, 0);
	curl_setopt($ch, CURLOPT_POST, 1);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $final_data);
	// Get server response ...
	$result = curl_exec($ch);
	// print_r($result);
	// exit;
	curl_close($ch);
	$status = '';
	$information = explode('&', $result);

	$dataSize = sizeof($information);
	for ($i = 0; $i < $dataSize; $i++) {
	    $info_value = explode('=', $information[$i]);
	    if ($info_value[0] == 'enc_response') {
		$status = $this->decrypt(trim($info_value[1]), $workingKey);

	    }
	}

	// echo 'Status revert is: ' . $status.'<pre>';
	$obj = json_decode($status);
  $ddws=$obj->Order_Status_Result;
   $status=$ddws->order_status;



if($status=='Shipped'){

	$user_data= Users::wherenull('deleted_at')->where('id', $order_data->user_id)->first();

	$invoice_data = Order1::where('payment_status', 1)->orderBy('id','DESC')->first();

	if(!empty($invoice_data->invoice_no)){
	if($invoice_data->invoice_no==NULL){
	  $invoice_no = 1;
	}else{
	  $invoice_no = $invoice_data->invoice_no + 1;
	}
	}else{
	  $invoice_no = 1;
	}


	$order1_Info = [

		'order_status' => 1,
		'payment_status' => 1,
		"invoice_no"=>$invoice_no


	];

	$updated_last_id2 = Order1::where('id', $order_data->id)->first();
	 $updated_last_id2->update($order1_Info);


	$cart_Info1= Cart2::where('user_id',$user_data->id)->get();

 foreach ($cart_Info1 as $value) {
 	// $a=1;
 	$product_data= Product::wherenull('deleted_at')->where('id', $value->product_id)->first();
 	$type_data= Type::wherenull('deleted_at')->where('id', $value->type_id)->first();
 $inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $value->type_id,'is_active'=>1))->first();

 $inventory= $inventory_data->quantity-$value->quantity;

 $inventry_update =[
 	'quantity'=>$inventory
 ];

 $updated_last_id5 = Inventory::where('producttype_type', $value->type_id)->first();
 $updated_last_id5->update($inventry_update);

 	// $total_amt2 = $type_data->selling_price_gst * $value->quantity;

  				// $cart_data = [
  				// 	'type_id' => $type_data->id,
  				// 	'product_id' => $product_data->id,
  				// 	'total_amount' => $total_amt2,
  				// 	'type_amt' => $type_data->selling_price_gst,
  				// 	'gst' => $type_data->gst,
  				// 	'quantity' => $value->quantity,
  				// 	'gst_percentage' => $type_data->gst
 				//
 				//
  				// ];
 				//
 				// $cart_Info2= Order2::create($cart_data);


 }

 $delete = Cart2::where(array('user_id' =>$user_data->id))->delete();

 //success notification code



                       $user_data = Users::where('id', $user_data->id)->first();

 											if(!empty($user_data)){

											//----sent push notification to user---------

 											$url = 'https://fcm.googleapis.com/fcm/send';

 											$title="Order Placed";
 											$message="Your order has been placed. ";


 											$msg2 = array(
 											'body'=>$title,
 											'title'=>$message,
 											"sound" => "default"

 											);


 											// echo $user_device_tokens->device_token; die();

 											$fields = array(
 											// 'to'=>"/topics/all",
 											'to'=>$user_data->fcm_token,
 											'notification'=>$msg2,
 											'priority'=>'high'
 											);

 											$fields = json_encode ( $fields );

 											$headers = array (
 											'Authorization: key=' . AUTHORIZATION_KEY_PUSH,
 											'Content-Type: application/json'
 											);

 											$ch = curl_init ();
 											curl_setopt ( $ch, CURLOPT_URL, $url );
 											curl_setopt ( $ch, CURLOPT_POST, true );
 											curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
 											curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
 											curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

 											$result = curl_exec ( $ch );
 											// echo $fields;
 											// echo $result;
 											curl_close ( $ch );



											//----sent push notification to admin---------

													$url = 'https://fcm.googleapis.com/fcm/send';

													$title="New Order";
													$message="Order recieved of amount:-".$order_amount." and order id:- ".$order_id." ";


													$msg2 = array(
														'title'=>$title,
													'body'=>$message,
													"sound" => "default"

													);


													// echo $user_device_tokens->device_token; die();

													$fields = array(
													// 'to'=>"/topics/all",
													'to'=>"/topics/weather",
													'notification'=>$msg2,
													'priority'=>'high'
													);

													$fields = json_encode ( $fields );

													$headers = array (
													'Authorization: key=' . AUTHORIZATION_KEY_PUSH_ADMIN,
													'Content-Type: application/json'
													);

													$ch = curl_init ();
													curl_setopt ( $ch, CURLOPT_URL, $url );
													curl_setopt ( $ch, CURLOPT_POST, true );
													curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
													curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
													curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

													$result = curl_exec ( $ch );
													// echo $fields;
													// echo $result;
													curl_close ( $ch );

													$notification =[
													'title'=>$title,
													'message'=>$message,
													'ip'=>$req->ip(),
													];

													$notification_data =Admin_notification :: create($notification);



										}

	$res= array(
			'msg'=> 'success',
			'status'=> 200,
			'order_id'=>$order_data->id,
			'order_amount'=>$order_data->final_amount,
	);



	return json_encode($res);
}else if($status=='Unsuccessful'){
	$res= array(
			'msg'=> 'failed',
			'status'=> 201
	);



	return json_encode($res);
}

}else{
	$res= array(
			'msg'=> 'wrong txn_id',
			'status'=> 201
	);



	return json_encode($res);
}


}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}
}
}

//--------------calculate-------------------

public function calculate(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];


			$req->validate([

				'address_id' => 'required'

			]);

			$promocode_id = $req->input('promocode_id');
			$wallet_status = $req->input('wallet_status');
			$address_id = $req->input('address_id');

if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){

	$bytes = random_bytes(15);
	$txnid=bin2hex($bytes);


	//------cart_data-------
	$cart_Info= Cart2::where('user_id',$user_data->id)->get();
	$total_amt = 0;
	$quantity=0;
	foreach ($cart_Info as $cart) {


						$product_data= Product::wherenull('deleted_at')->where('id', $cart->product_id)->first();
						$type_data= Type::wherenull('deleted_at')->where('id', $cart->type_id)->first();
	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

		//---------checking inventory---------
						if($inventory_data->quantity >= $cart->quantity){

						$price= $type_data->selling_price_gst * $cart->quantity;
						$total_amt= $total_amt + $price;
						$quantity = $quantity + $cart->quantity;


		}else{
			$res= array(
					'msg'=> $product_data->name.' Product is out of stock',
					'status'=> 201 );
					return json_encode($res);
					exit;
		}



	}

if($total_amt>=MIN_ORDER){

//---Calculate wallet discount-----
$wallet_discount=0;

if($wallet_status==1){

$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$wallet_discount1=$total_amt * WALLET_DISCOUNT /100;

if($wallet_data->wallet_amount>=$wallet_discount1){

	$wallet_discount=$wallet_discount1;

}else{
	$res= array(
			'msg'=> 'Insufficient wallet amount ',
			'status'=> 201 );
			return json_encode($res);
			exit;
}

//
// $wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();
//
// $update_wallet = $wallet_data->wallet_amount - $wallet_discount;
//
// //---update wallet amount---
//
// $wallet_update =[
// 	'wallet_amount'=>$update_wallet
// ];
//
//
// $updated_last_id2 = Wallet::where('id', $user_data->id)->first();
// $updated_last_id2->update($wallet_update);
//
// //----update wallet discount in order 1----
//
// $wallet_dis =[
// 	'wallet_discount'=>$wallet_discount
// ];
//
//
// $updated_last_id2 = Order1::where('user_id', $user_data->id)->first();
// $updated_last_id2->update($wallet_dis);
//
// //----create wallet transation------
//
// $wallet_txt =[
// 	'user_id'=>$user_data->id,
// 	'order_id'=>$order_Info->id,
// 	'wallet_discount'=>$wallet_discount,
// ];
//
// $wallet_txn_data =  Wallet_txn:: create($wallet_txt);

}//--end wallet_status



//--------Calculate promocode---------
$discount = 0;
if(!empty($promocode_id)){

$promocode_data= Promocode::wherenull('deleted_at')->where('id', $promocode_id)->first();
if(!empty($promocode_data)){
	// echo "hi";
	// exit;

//---check one time promocode---
if($promocode_data->ptype==1){
	$user_id = $user_data->user_id;
	$promo_check= Order1::wherenull('deleted_at')->where(array('user_id'=> $user_id,'promocode_id'=>$promocode_data->id))->first();


	if(empty($promo_check)){
if($total_amt > $promocode_data->minorder){ //----checking minorder for promocode
	// echo "hi";
	// exit;
	$discount_amt = $total_amt * $promocode_data->giftpercent/100;
if($discount_amt > $promocode_data->max){
	// will get max amount
	$discount =  $promocode_data->max;

}else{

	$discount =  $discount_amt;
}

}//endif of minorder
else{
	$res= array(
			'msg'=> 'Please add more products for promocode ',
			'status'=> 201 );
			return json_encode($res);
			exit;

}

}else{
	$res= array(
			'msg'=> 'Promocode is already used',
			'status'=> 201 );
			return json_encode($res);
			exit;

}

//----every time promocode
}else{


	if($total_amt > $promocode_data->minorder){ //----checking minorder for promocode
		// echo "hi";
		// exit;
		$discount_amt = $total_amt * $promocode_data->giftpercent/100;
	if($discount_amt > $promocode_data->max){
		// will get max amount
		$discount =  $promocode_data->max;

	}else{

		$discount =  $discount_amt;
	}


}else{
	$res= array(
			'msg'=> 'Please add more products for promocode ',
			'status'=> 201 );
			return json_encode($res);
			exit;

}
}
}//endif of promo_data
else{
	$res= array(
			'msg'=> 'Invalid Promocode',
			'status'=> 201 );
			return json_encode($res);
			exit;

}

}//endif of promocode_id




//---------Calculate tax-------------
$charges = 0;
$delivery_status=0;
$show_charges = $quantity * shipping_charg;

$delivery_status1 = Delivery_status::first();

if($delivery_status1->status == 1){
$charges = $quantity * shipping_charg;
$delivery_status = 1;

}


if($delivery_status==1){
	$deliver_amount=0;
}else{
	$deliver_amount = -($quantity * shipping_charg);

}
$final_amt = ($total_amt - $discount -$wallet_discount) + $charges;   //calculate final amount

//------tbl order 1 enteries---------

$order1_Info = [

'user_id' => $user_data->id,
'total_amount' => $total_amt,
'address_id' => $address_id,
'txnid' => $txnid,
'final_amount' => $final_amt,
'app_order' => 1,




];


$order_1_data =  Order1:: create($order1_Info)->toArray();


// -------------------tbl order 2 enteries--------------

$cart_Info1= Cart2::where('user_id',$user_data->id)->get();

foreach ($cart_Info1 as $value) {
// $a=1;
$product_data= Product::wherenull('deleted_at')->where('id', $value->product_id)->first();
$type_data= Type::wherenull('deleted_at')->where('id', $value->type_id)->first();
// echo $value->qauntity;
// exit;
$total_amt2 = $type_data->selling_price_gst * $value->quantity;

			$cart_data = [
				'type_id' => $type_data->id,
				'product_id' => $product_data->id,
				'total_amount' => $total_amt2,
				'main_id' => $order_1_data['id'],
				'type_amt' => $type_data->selling_price_gst,
				'gst' => $type_data->gst,
				'quantity' => $value->quantity,
				'gst_percentage' => $type_data->gst


			];

			$cart_Info2= Order2::create($cart_data);
}


$data= array(

	'wallet_discount' =>$wallet_discount,
	'promocode_discount' =>$discount,
	'charges' =>$show_charges,
	'total_amount' =>$total_amt,
	'subtotal' =>$final_amt,
	'delivery_amount' =>$deliver_amount,
	'delivery_status' =>$delivery_status,


);



$res= array(
		'msg'=> 'success',
		'status'=> 200,
		'data'=>$data
);



return json_encode($res);


}else{
	$res= array(
			'msg'=> 'Please add more products! Minimum order should be greater than '.MIN_ORDER,
			'status'=> 201
	);



	return json_encode($res);


}


}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}

}





//--------------Checkout-------------------

public function checkout(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];


			$req->validate([

				'payment_type' => 'required',
				'address_id' => 'required'

			]);

			$payment_type = $req->input('payment_type');
			$promocode_id = $req->input('promocode_id');
			if($promocode_id==""){
				$promocode_id=0;
			}
			else{
				$promocode_id=$promocode_id;

			}
			$wallet_status = $req->input('wallet_status');
			$address_id = $req->input('address_id');
			$vendor_code = $req->input('vendor');


if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

if($user_data->token==$password){

//---gettiong cart data-----
$cart_Info= Cart2::where('user_id',$user_data->id)->get();
// print_r($cart_Info);
// exit;
$cart_data=[];
$total_amt=0;
$quantity=0;
foreach ($cart_Info as $cart) {
$a=1;
				$product_data= Product::wherenull('deleted_at')->where('id', $cart->product_id)->first();
				$type_data= Type::wherenull('deleted_at')->where('id', $cart->type_id)->first();

	$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $type_data->id,'is_active'=>1))->first();

//---------checking inventory---------
				if($inventory_data->quantity >= $cart->quantity){
					$quantity = $quantity + $cart->quantity;
				$price= $type_data->selling_price_gst * $cart->quantity;


				$total_amt= $total_amt + $price;


}else{
	$res= array(
			'msg'=> $pro.' Product is out of stock',
			'status'=> 201 );
			return json_encode($res);
			exit;
}

}//end foreach
// echo 	$total_amt;
// exit;



//---Calculate wallet discount-----
$wallet_discount=0;

if($wallet_status==1){

$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$wallet_discount1=$total_amt * WALLET_DISCOUNT /100;

if($wallet_data->wallet_amount>=$wallet_discount1){

	$wallet_discount=$wallet_discount1;

}else{
	$res= array(
			'msg'=> 'Insufficient wallet amount ',
			'status'=> 201 );
			return json_encode($res);
			exit;
}

// echo $wallet_discount;
// exit;

$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

$update_wallet = $wallet_data->wallet_amount - $wallet_discount;
// echo $update_wallet;
// exit;
//---update wallet amount---

$wallet_update =[
	'wallet_amount'=>$update_wallet
];


$updated_last_id2 = Wallet::where('user_id', $user_data->id)->first();
$updated_last_id2->update($wallet_update);
//
// //----update wallet discount in order 1----
//
// $wallet_dis =[
// 	'wallet_discount'=>$wallet_discount
// ];
//
//
// $updated_last_id2 = Order1::where('user_id', $user_data->id)->first();
// $updated_last_id2->update($wallet_dis);

//----create wallet transation------
$order=Order1::where('user_id', $user_data->id)->orderBy('id','DESC')->first();
$wallet_txt =[
	'user_id'=>$user_data->id,
	'order_id'=>$order->id,
	'wallet_discount'=>$wallet_discount,
];

$wallet_txn_data =  Wallet_txn:: create($wallet_txt);

}//--end wallet_status





//--------Calculate promocode---------
$discount = 0;
if(!empty($promocode_id)){

$promocode_data= Promocode::wherenull('deleted_at')->where('id', $promocode_id)->first();
if(!empty($promocode_data)){

if($total_amt > $promocode_data->minorder){ //----checking minorder for promocode

	$discount_amt = $total_amt * $promocode_data->giftpercent/100;
if($discount_amt > $promocode_data->max){
	// will get max amount
	$discount =  $promocode_data->max;

}else{

	$discount =  $discount_amt;
}

}//endif of minorder

}//endif of promo_data

}//endif of promocode_id

//---------Calculate tax-------------
$charges = 0;
$delivery_status = Delivery_status::first();

if($delivery_status->status == 1){

$charges = $quantity * shipping_charg;


}



$final_amt = ($total_amt - $discount - $wallet_discount) + $charges;   //calculate final amount

// echo $wallet_discount;
// echo '<br>'.$final_amt;
// exit;
$order=Order1::where('user_id', $user_data->id)->orderBy('id','DESC')->first();


if($payment_type==1){


	$invoice_data = Order1::where('payment_status', 1)->orderBy('id','DESC')->first();
	if(!empty($invoice_data->invoice_no)){
	if($invoice_data->invoice_no==NULL){
	  $invoice_no = 1;
	}else{
	  $invoice_no = $invoice_data->invoice_no + 1;
	}
	}else{
	  $invoice_no = 1;
	}
if(empty($vendor_code)){
	$vendor_code = 0;
}
$order1_Info = [


	'promocode_id' => $promocode_id,
	'discount' => $discount,
	'address_id' => $address_id,
	'total_amt' => $total_amt,
	'final_amount' => $final_amt,
	'wallet_discount'=>$wallet_discount,
	'payment_type' => $payment_type,
	'delivery_charge' => $charges,
	'order_status' => 1,
	'payment_status' => 1,
	'invoice_no' => $invoice_no,
	'vendor_code' => $vendor_code,



];

$updated_last_id2 = Order1::where('user_id', $user_data->id)->orderBy('id','DESC')->first();
 $updated_last_id2->update($order1_Info);

 // $order_1_data =  Order1:: create($order1_Info)->toArray();
 		// $cart_Info2= Cart2::create('cart_data');

		// print_r($order_1_data['id']);

// -------------------tbl order 2 enteries--------------

 $cart_Info1= Cart2::where('user_id',$user_data->id)->get();

foreach ($cart_Info1 as $value) {
	// $a=1;
	$product_data= Product::wherenull('deleted_at')->where('id', $value->product_id)->first();
	$type_data= Type::wherenull('deleted_at')->where('id', $value->type_id)->first();
$inventory_data= Inventory::wherenull('deleted_at')->where(array('producttype_type'=> $value->type_id,'is_active'=>1))->first();

$inventory= $inventory_data->quantity-$value->quantity;

$inventry_update =[
	'quantity'=>$inventory
];

$updated_last_id5 = Inventory::where('producttype_type', $value->type_id)->first();
$updated_last_id5->update($inventry_update);

	// $total_amt2 = $type_data->selling_price_gst * $value->quantity;

 				// $cart_data = [
 				// 	'type_id' => $type_data->id,
 				// 	'product_id' => $product_data->id,
 				// 	'total_amount' => $total_amt2,
 				// 	'type_amt' => $type_data->selling_price_gst,
 				// 	'gst' => $type_data->gst,
 				// 	'quantity' => $value->quantity,
 				// 	'gst_percentage' => $type_data->gst
				//
				//
 				// ];
				//
				// $cart_Info2= Order2::create($cart_data);

				$delete = Cart2::where('user_id' ,$user_data->id)->delete();

				//success notification code



				                      $user_data = Users::where('id', $user_data->id)->first();

															if(!empty($user_data)){

//----sent push notification to users---------

															$url = 'https://fcm.googleapis.com/fcm/send';

															$title="Order Placed";
															$message="Your order has been placed. ";


															$msg2 = array(
															'body'=>$title,
															'title'=>$message,
															"sound" => "default"

															);


															// echo $user_device_tokens->device_token; die();

															$fields = array(
															// 'to'=>"/topics/all",
															'to'=>$user_data->fcm_token,
															'notification'=>$msg2,
															'priority'=>'high'
															);

															$fields = json_encode ( $fields );

															$headers = array (
															'Authorization: key=' . AUTHORIZATION_KEY_PUSH,
															'Content-Type: application/json'
															);

															$ch = curl_init ();
															curl_setopt ( $ch, CURLOPT_URL, $url );
															curl_setopt ( $ch, CURLOPT_POST, true );
															curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
															curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
															curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

															$result = curl_exec ( $ch );
															// echo $fields;
															// echo $result;
															curl_close ( $ch );
														}
}

//----sent push notification to admin---------

    $url = 'https://fcm.googleapis.com/fcm/send';

    $title="New Order";
    $message="Order recieved of amount:-".$final_amt." and order id:- ".$updated_last_id2->id." ";


    $msg2 = array(
			'title'=>$title,
		'body'=>$message,
    "sound" => "default"

    );


    // echo $user_device_tokens->device_token; die();

    $fields = array(
    // 'to'=>"/topics/all",
    'to'=>"/topics/weather",
    'notification'=>$msg2,
    'priority'=>'high'
    );

    $fields = json_encode ( $fields );

    $headers = array (
    'Authorization: key=' . AUTHORIZATION_KEY_PUSH_ADMIN,
    'Content-Type: application/json'
    );

    $ch = curl_init ();
    curl_setopt ( $ch, CURLOPT_URL, $url );
    curl_setopt ( $ch, CURLOPT_POST, true );
    curl_setopt ( $ch, CURLOPT_HTTPHEADER, $headers );
    curl_setopt ( $ch, CURLOPT_RETURNTRANSFER, true );
    curl_setopt ( $ch, CURLOPT_POSTFIELDS, $fields );

    $result = curl_exec ( $ch );
    // echo $fields;
    // echo $result;
    curl_close ( $ch );

		$notification =[
		'title'=>$title,
		'message'=>$message,
		'ip'=>$req->ip(),
		];

		$notification_data = Admin_notification :: create($notification);

$res= array(
		'msg'=> 'success',
		'status'=> 200,
		'order_id'=> $updated_last_id2->id,
		'Order_amount'=> $final_amt,
);
	return json_encode($res);

}//end of cod
else{
// echo $final_amt;
// exit;
///---------table order 1 enteries---------
	$order1_Info = [


		'promocode_id' => $promocode_id,
		'discount' => $discount,
		'address_id' => $address_id,
		'total_amt' => $total_amt,
		'final_amount' => $final_amt,
		'wallet_discount'=>$wallet_discount,
		'payment_type' => $payment_type,
		'delivery_charge' => $charges,
		'vendor_code' => $vendor_code,


	];

	$updated_last_id2 = Order1::where('user_id', $user_data->id)->orderBy('id','DESC')->first();
	 $updated_last_id2->update($order1_Info);


	$working_key="43FE2B8FFB06FB9F35F32A2AB58B02DF";
	$access_code='AVEW27II80AV83WEVA';
	 $order_id = session('order1_id');
$order_data= Order1::wherenull('deleted_at')->where('id', $order->id)->first();
	 // $final_amt= "3000";
	$currency= "&amp;currency=INR";
	$language = "EN";
	// $tid = bin2hex(random_bytes(10));
	$tid = rand(10,9999999999);

	$order1update =[
	'txnid'=>	json_encode($tid),

	];

	$updated_last_id = Order1::where('id', $order->id)->first();
	$updated_last_id->update($order1update);

	$redirect_url=base_path."payment_status";
	$cancel_url=base_path."payment_status";
	$mid = APP_MID;

$merchant_data="tid=".$tid."&merchant_id=".$mid."&"."order_id=".$order->id."&"."amount=".$final_amt."&currency=INR&".'redirect_url='.$redirect_url."&"."cancel_url=".$cancel_url."&"."language=".$language;


// echo $merchant_data;
// exit;

// $encrypted_data=encrypt($merchant_data,$working_key); // Method for encrypting the data.
$encrypted_data = $this->encrypt($merchant_data,$working_key);
// $encrypted_data="";
if(GATWAY==0){
	$URL1="https://test.ccavenue.com/transaction.do?command=initiateTransaction&encRequest=";
}else{
	$URL1="https://secure.ccavenue.com/transaction.do?command=initiateTransaction&encRequest=";
}

$url=$URL1.$encrypted_data."&access_code=".$access_code."";

// $delete = Cart2::where('user_id' ,$user_data->id)->delete();




$res= array(
		'msg'=> 'success',
		'status'=> 200,
		'data'=> $url,
		'txn_id'=>$tid,
		'status_url'=>$redirect_url,
		'order_id'=>$order->id,
		'order_amount'=>$final_amt,
);



return json_encode($res);


}

}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}

}

//----------user profile------
public function user_profile(Request $req){

	$headers = apache_request_headers();
			$phone=$headers['Authorization'];
			$password=$headers['Password'];
			$device_id=$headers['Deviceid'];



if(!empty($phone)){

	$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();
	$wallet_data= Wallet::wherenull('deleted_at')->where(array('user_id'=> $user_data->id,'is_active'=>1))->first();

if($user_data->token==$password){

if(!empty($wallet_data->wallet_amount)){
	$wallet_amount = $wallet_data->wallet_amount;
}else{
	$wallet_amount = 0;
}

	$user_Info= array(

		'user_name' => $user_data->name,
		'user_phone' => $user_data->phone,
		'wallet_amount' => $wallet_amount,


	);

	$res= array(
			'msg'=> 'success',
			'status'=> 200,
			'data'=>$user_Info
	);

	return json_encode($res);

}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);



	return json_encode($res);
}


}
//insert with device id
else{

}
}


public function get_state_name(Request $req){

    // $state_data= States::get();
		//
    // $state_info=[];
    // if(!empty($state_data)){
    //     foreach($state_data as $state){
		//
    //         $state_info[]= array(
    //         'id'=>$state->id,
    //         'name'=>$state->state_name,
    //         );
		//
    //     }
    // }

		$state_data= States::where("id",29)->first();
		$state_info[]= array(
		        'id'=>$state_data->id,
		        'name'=>$state_data->state_name,
		        );
    $res= array(
        'msg'=> 'success',
        'status'=> 200,
        'data'=> $state_info,
    );
    return json_encode($res);
}





	public function blank_class(Request $req){

		$req->validate([

			'product_id' =>'required',
			'type_id' => 'required',
			'qauntity' => 'required',
			'phone' => 'required',
			'password' => 'required',
			'device_id' => 'required'

		]);
		$product_id=$req->input('product_id');
		$type_id=$req->input('type_id');
		$qauntity=$req->input('qauntity');
		$phone=$req->input('phone');
		$password=$req->input('password');
		$device_id=$req->input('device_id');

	if(!empty($phone)){

		$user_data= Users::wherenull('deleted_at')->where(array('phone'=> $phone,'is_active'=>1))->first();

	if($user_data->token==$password){


		$cart_data= [

			'product_id' => $product_id,
			'type_id' => $type_id,
			'qauntity' => $qauntity,
			'user_id' => $user_data->id,
			'ip' => $req->ip()


		];

		$last_id5 = Cart2::create($cart_data)->toArray();


	}else{
		$res= array(
				'msg'=> 'Wrong Password',
				'status'=> 201
		);



		return json_encode($res);
	}


	}
	//insert with device id
	else{

	}
	}


	function encrypt($plainText,$key)
	{
		// $key = hextobin(md5($key));
		$key = $this->hextobin(md5($key));

		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$openMode = openssl_encrypt($plainText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		$encryptedText = bin2hex($openMode);
		return $encryptedText;
	}

	function decrypt($encryptedText,$key)
	{
		$key = $this->hextobin(md5($key));
		$initVector = pack("C*", 0x00, 0x01, 0x02, 0x03, 0x04, 0x05, 0x06, 0x07, 0x08, 0x09, 0x0a, 0x0b, 0x0c, 0x0d, 0x0e, 0x0f);
		$encryptedText = $this->hextobin($encryptedText);
		$decryptedText = openssl_decrypt($encryptedText, 'AES-128-CBC', $key, OPENSSL_RAW_DATA, $initVector);
		return $decryptedText;
	}
	//*********** Padding Function *********************

	 function pkcs5_pad ($plainText, $blockSize)
	{
			$pad = $blockSize - (strlen($plainText) % $blockSize);
			return $plainText . str_repeat(chr($pad), $pad);
	}

	//********** Hexadecimal to Binary function for php 4.0 version ********

	function hextobin($hexString)
		 {
					$length = strlen($hexString);
					$binString="";
					$count=0;
					while($count<$length)
					{
							$subString =substr($hexString,$count,2);
							$packedString = pack("H*",$subString);
							if ($count==0)
				{
				$binString=$packedString;
				}

				else
				{
				$binString.=$packedString;
				}

				$count+=2;
					}
						return $binString;
				}


public function cart_count(){

		$headers = [];
		$headers = apache_request_headers();

				$phone=$headers['Authorization'];
				$password=$headers['Password'];
				$device_id=$headers['Deviceid'];

	$user_Info= Users::wherenull('deleted_at')->Where(array("phone"=>$phone,"is_active"=>1))->first();

	$cart_Info= Cart2::Where('user_id',$user_Info->id)->get();

	$count = count($cart_Info);
if(!empty($count)){
	$cart_count=$count;
}else{
	$cart_count=0;
}

	$res= array(
		'msg'=> 'success',
		'status'=> 200,
		'data'=>$cart_count
	);



	return json_encode($res);


}

//-------update token-----

public function update_token(Request $req){

		$headers = [];
		$headers = apache_request_headers();

				$phone=$headers['Authorization'];
				$password=$headers['Password'];
				$device_id=$headers['Deviceid'];

				$req->validate([

					'fcm_token' =>'required',

				]);

				$fcm_token=$req->input('fcm_token');
				$user_Info= Users::wherenull('deleted_at')->Where(array("phone"=>$phone,"is_active"=>1))->first();

	if($user_Info->token==$password){

	$user_update =[
	'fcm_token'=>	$fcm_token,

	];

	$updated_last_id = Users::where('id', $user_Info->id)->first();
	$updated_last_id->update($user_update);


	$res= array(
		'msg'=> 'success',
		'status'=> 200,
	);



	return json_encode($res);



	}else{
		$res= array(
				'msg'=> 'Wrong Password',
				'status'=> 201
		);
		return json_encode($res);
	}


	}

//---------app_version----
public function app_version(){

$v_data = App_version::orderBY('id','DESC')->first();

 // foreach($v_data as $data) {
if(!empty($v_data->android_version)){
	$a_version = $v_data->android_version;
	$a_code = $v_data->android_version_code;
}else{
	$a_version = "";
	$a_code = "";
}
if(!empty($v_data->ios_version)){
	$i_version = $v_data->ios_version;
	$i_code = $v_data->ios_version_code;
}else{
	$i_version = "";
	$i_code = "";
}
$version = array(
'version'=> $a_version,
'version_code'=> $a_code,
'ios_version'=> $i_version,
'ios_version_code'=> $i_code
);

 // }
 $res= array(
		 'msg'=> 'success',
		 'status'=> 200,
		 'data'=> $version
 );
 return json_encode($res);


}

//---------admin login check api -------
public function admin_login_check(Request $req){

	$req->validate([
	'email' => 'required|email',
	'password' => 'required',

	]);


	$email= $req->input('email');
	$password= $req->input('password');


$admin_Info= Team::wherenull('deleted_at')->Where(array("email"=>$email,"is_active"=>1))->first();

if(!empty($admin_Info)){

if($admin_Info->password==md5($password)){

	$res= array(
			'msg'=> 'success',
			'status'=> 200
	);
	return json_encode($res);
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);
	return json_encode($res);
}

}else{
	$res= array(
			'msg'=> 'Email does not exist',
			'status'=> 201
	);
	return json_encode($res);
}



}

//---------admin login check api -------
public function admin_notification(Request $req){

	$req->validate([
	'email' => 'required|email',
	'password' => 'required',

	]);


	$email= $req->input('email');
	$password= $req->input('password');


$admin_Info= Team::wherenull('deleted_at')->Where(array("email"=>$email,"is_active"=>1))->first();

if(!empty($admin_Info)){

if($admin_Info->password==md5($password)){

	$notification_Info= Admin_notification::get();
$notification=[];
foreach ($notification_Info as $value) {
	$notification[] = array(
		"title"=>"$value->title",
		"message"=>"$value->message",
		"date"=>"$value->created_at",
	);
}

	$res= array(
			'msg'=> 'success',
			'status'=> 200,
			'data'=> $notification,
	);
	return json_encode($res);
}else{
	$res= array(
			'msg'=> 'Wrong Password',
			'status'=> 201
	);
	return json_encode($res);
}

}else{
	$res= array(
			'msg'=> 'Email does not exist',
			'status'=> 201
	);
	return json_encode($res);
}



}


}
