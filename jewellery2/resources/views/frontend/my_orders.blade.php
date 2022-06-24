@extends('frontend.layout')
@section('main')


<style>
	.my_order{
		background: #ececec;
	}
	.my_order h1{
		font-weight: 100;
	}

	.my_order img{
		width: 100%;
	}

	.order_cont{
	 padding: 2rem;
	 padding-bottom: 0;
    border-radius: 6px;
    box-shadow: 0px 2px 7px -1px #bfbfbf;

	}

	.order_small{
		border: none;
    height: 40px;
    width: 35%;
    border-radius: 26px;
background: lightgray;
	}

	.ordertrack_small{
	    border: none;
    height: 40px;
    width: 35%;
    border-radius: 26px;
    color: #fff;
    background: #ffb100;
    /* display: none; */
    display: block;
	}

	.can_btn{
	width: 100%;
	height: 100%;
    border: none;
    background: #fff;
    outline: 0!important;
    border-right: 1px solid lightgrey !important;
    color: red;
	}


	@media(min-width: 312px) and (max-width: 900px){
  .ordertrack_small{
    width: 100%;
  }
  .order_small{
    width: 100%;
  }
  .two_btn{
  	display: block !important;
  }
  .sp_od_web{
  	display: none;
  }
  .sp_od_mob{
  	display: block !important;
  }

  .can_btn{
  	border:none;
  	height: 44px;
  }

  .ab_p_h p,h5{
  	font-size: 12px;
  }
  .order_cont{
  	padding: 1rem;
  	padding-bottom: 0;
  }

  .ab_p_h{
  	position: absolute;
  }

  .my_order h4{
    font-size: 18px !important;
  }

  .my_order i{
    display: contents;
  }

}




</style>

<?php


/* front-end currency start */

$sign="$";
$currency_price="1";

$cuncy_id = Session::get('currency_id');
$curr_v= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active',1)->where('id',$cuncy_id)->first();
if(!empty($curr_v)){
  $sign= $curr_v->sign;
  $currency_price= $curr_v->currency_price;
}else {
$sign="$";
$currency_price="1";
}



/* front-end currency end*/

?>

<div class="paddingfromtop">
	<section class="my_order p-0 " style="margin-top:2rem;">
					<center><h1>My Orders</h1></center>
<?php if(!empty($user_orders)){
foreach ($user_orders as $order) {

  ?>

		<div class="container bg-white order_cont mb-5">
			<div class="row">
				<div class="col-12">
					<div class="row">
						<div class="col-6 d-flex align-items-center mb-4 two_btn">
							<button class="float-left order_small mr-4">order
								<a href="#">#<?=$order->id;?></a>
							</button>
							<span class="sp_od_web" style="margin-left:2rem;">Order Placed &nbsp;<a href="#">
                <?php
                  $newdate = new DateTime($order->created_at);
                  echo $newdate->format('j F, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                ?>
              </a></span>
						</div>
						<div class="col-6">
							<!-- <button class="float-right ordertrack_small">TrackId #<?php if(!empty($order->track_id)){ echo $order->track_id; }?></button> -->
						</div>
						<div class="col-12 sp_od_mob mb-3 d-none">
							<center>
								<span class="">Order Placed
								&nbsp;	<a href="#">
                    <?php
                        $newdate = new DateTime($order->created_at);
                        echo $newdate->format('j F, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                      ?>
                    </a>
								</span>
							</center>
						</div>
					</div>
				</div>

<?php
    $order_pro_data=App\frontendmodel\Order2::wherenull('deleted_at')->where('main_id', $order->id)->get();

if(!empty($order_pro_data)){
  foreach ($order_pro_data as $order2) {

if($order2->status == 0){

$pro_data=App\adminmodel\Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_mini_subcat_delete', 0)->where('id', $order2->product_id)->first();

$pro_clr_siz_data=App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $order2->product_id)->where('color_id', $order2->color_id)->first();


$clr_data= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $order2->color_id)->first();

// $variant_data= App\adminmodel\Size::wherenull('deleted_at')->where('is_active', 1)->where('id', $order2->variant_id)->first();

?>

				<div class="col-12 mt-3 pt-3" style="border-top: 1px solid lightgrey;">
					<div class="row">
						<div class="col-4 col-lg-2 col-md-2">

              <?php if(!empty($pro_data)){?>
              <a href="<?=base_path?>products_view/<?=base64_encode($pro_data->id);?>">
              <?php }?>

  							<img  src="<?php  if(!empty($pro_clr_siz_data) && !empty($pro_clr_siz_data->image1)){ echo base_path.$pro_clr_siz_data->image1; } else{ echo "No Image!";}?>">

              <?php if(!empty($pro_data)){?>
              </a>
              <?php }?>
						</div>
						<div class="col-8 col-lg-10 col-md-10">

              <?php if(!empty($pro_data)){?>
              <a href="<?=base_path?>products_view/<?=base64_encode($pro_data->id);?>">
              <?php }?>

							<h4><?php if(!empty($pro_data)){ echo $pro_data->name; } else{ echo "Product Not Found!";}?></h4>

              <?php if(!empty($pro_data)){?>
              </a>
              <?php }?>

							<p>SKU ID: <?php if(!empty($pro_data)){ echo $pro_data->sku_id; } else{ echo "SKU Not Found!";}?></p>

							<p>Color: <a href="#"><?php if(!empty($clr_data)){ echo $clr_data->name; } else{ echo "Color Not Found!";}?></a></p>

							<p>Quantity: <a href="#"><?=$order2->quantity;?></a></p>
							<p>Price: <a href="#"><?=$sign;?> <?=(int)$order2->amount * $currency_price;?></a></p>
						</div>
					</div>
				</div>

<?php } ?>

<?php if($order2->status == 1){

	$custom_product= App\adminmodel\CustomizeProduct::wherenull('deleted_at')->where('id',$order2->product_id)->where('is_active',1)->first();

	$pro_stone_data= App\adminmodel\CustomizeProductStone::wherenull('deleted_at')->where('product_id',$order2->product_id)->where('name',$order2->stone)->where('cust_metal_id',$order2->metal)->where('is_active',1)->first();


  $metal_da= App\adminmodel\CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $order2->metal)->first();

	?>

<!-- customize -->

<div class="col-12 mt-3 pt-3" style="border-top: 1px solid lightgrey;">
	<div class="row">
		<div class="col-4 col-lg-2 col-md-2">

			<?php if(!empty($custom_product)){?>
			<a href="<?=base_path?>customize_diamond/<?=base64_encode($custom_product->id);?>">
			<?php }?>

				<img  src="<?php  if(!empty($pro_stone_data) && !empty($pro_stone_data->stone_product_image)){ echo base_path.$pro_stone_data->stone_product_image; } else{ echo "No Image!";}?>">

			<?php if(!empty($custom_product)){?>
			</a>
			<?php }?>
		</div>
		<div class="col-8 col-lg-10 col-md-10">

			<?php if(!empty($custom_product)){?>
			<a href="<?=base_path?>customize_diamond/<?=base64_encode($custom_product->id);?>">
			<?php }?>

			<h4><?php if(!empty($custom_product)){ echo $custom_product->name; } else{ echo "Product Not Found!";}?></h4>

			<?php if(!empty($custom_product)){?>
			</a>
			<?php }?>


			<p>Metal: <a href="#"><?php if(!empty($metal_da)){ echo $metal_da->name; } else{ echo "Metal Not Found!";}?></a></p>
			<p>Stone: <a href="#"><?php if(!empty($order2->stone)){ echo $order2->stone; } else{ echo "Stone Not Found!";}?></a></p>
			<?if(!empty($order2->size)){?>
			<p>Size: <a href="#"><?php if(!empty($order2->size)){ echo $order2->size; } else{ echo "Stone Not Found!";}?></a></p>
			<?}?>
			<p>Quantity: <a href="#"><?=$order2->quantity;?></a></p>
			<p>Price: <a href="#"><?=$sign;?> <?=(int)$order2->amount * $currency_price;?></a></p>
		</div>
	</div>
</div>


<?php } ?>

<?php if($order2->status == 2){

$engrave_product= App\adminmodel\EngraveProduct::wherenull('deleted_at')->where('id',$order2->product_id)->where('is_active',1)->first();
	 ?>

<!-- engrave -->


<div class="col-12 mt-3 pt-3" style="border-top: 1px solid lightgrey;">
	<div class="row">
		<div class="col-4 col-lg-2 col-md-2">

			<?php if(!empty($engrave_product)){?>
			<a href="<?=base_path?>engrave_subcategory/<?=base64_encode($engrave_product->category_id);?>">
			<?php }?>

				<img  src="<?php  if(!empty($engrave_product) && !empty($engrave_product->image)){ echo base_path.$engrave_product->image; } else{ echo "No Image!";}?>">

			<?php if(!empty($engrave_product)){?>
			</a>
			<?php }?>
		</div>
		<div class="col-8 col-lg-10 col-md-10">

			<?php if(!empty($engrave_product)){?>
			<a href="<?=base_path?>engrave_subcategory/<?=base64_encode($engrave_product->category_id);?>">
			<?php }?>

			<h4><?php if(!empty($engrave_product)){ echo $engrave_product->name; } else{ echo "Product Not Found!";}?></h4>

			<?php if(!empty($engrave_product)){?>
			</a>
			<?php }?>


			<p>Text: <a href="#"><?php if(!empty($order2->engrave_text)){ echo $order2->engrave_text; } else{ echo "Text Not Found!";}?></a></p>
			<p>Font Family: <a href="#"><?php if(!empty($order2->font_family)){ echo $order2->font_family; } else{ echo "Font Family Not Found!";}?></a></p>
			<p>Font Size: <a href="#"><?php if(!empty($order2->font_size)){ echo $order2->font_size."px"; } else{ echo "Font Size Not Found!";}?></a></p>

			<p>Quantity: <a href="#"><?=$order2->quantity;?></a></p>
			<p>Price: <a href="#"><?=$sign;?> <?=(int)$order2->amount * $currency_price;?></a></p>
		</div>
	</div>
</div>


<?php } ?>

<?php } } ?>


				<div class="col-12 mt-3 pt-3 pb-3 "
				style="border-top: 1px solid lightgrey;">
					<div class="row">
						<div class="col-12 col-sm-2 col-md-2 col-lg-2 mt-5 mt-lg-0">
              <?php if($order->order_status == 5){?>
                <button class="can_btn" style="background-color:red !important;color:white !important;border-radius:20px !important;">ORDER CANCELLED
                </button>
                <?php } else{ ?>
                  <a href="<?=base_path?>cancel_order/<?=base64_encode($order->id);?>">
                  <button class="can_btn"><i class="fa fa-times pr-2"></i>CANCEL ORDER
                  </button></a>
                <?php } ?>

						</div>
						<div class="col-12 col-sm-10 col-md-10 col-lg-10 d-flex align-items-center ab_p_h" style="justify-content: space-between;">

							<p class="mb-0">Promocode :
								<a href="#"> <?php if(!empty($order->promocode) ){ echo $order->promocode; }else{echo "NA";} ?> </a>
							</p>
							<?if($order->shipping==1){?>
							<p class="mb-0">Standard Shipping :
								<?}else if($order->shipping==2){?>
									<p class="mb-0">Express Shipping :
								<?}else{?>
									<p class="mb-0">Shipping :

								<?}?>
								<a href="#"> <?php if(!empty($order->delivery_charge) ){ echo $sign; echo $order->delivery_charge; }else{echo "NA";} ?> </a>
							</p>

  					<p class="mb-0">Payment Method :
              <a href="#"> <?php if($order->payment_type == 1){ echo 'Cash On Delivery'; } ?>
                <?php  if($order->payment_type == 2){
                  echo 'Online Payment';
                }  ?>
              </a>
            </p>
							<h5 class="mb-0">Total Amount &nbsp;<a href="#">
<?=$sign;?><?=$order->total_amount * $currency_price;?>
              </a></h5>
						</div>
					</div>
				</div>

			</div>
		</div>
<?php } } ?>

		</div>
		<br>
	</section>
</div>
@endsection
