@extends('frontend.layout')
@section('main')
<style type="text/css">
@media screen and (min-width: 800px) {
  .rigtal{margin-right: -35rem;}
}

.colorhide {
  display: none;
}

.colorhover:hover .colorhide {
  display: block;
}


/*filter css start*/

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 100000;
  max-width: 400px;
  top: 0;
  left: 0;
  background-color:white;
  overflow-x: hidden;
  transition: 0.5s;
      box-shadow: 2px 4px 5px 0px #0000002e;
}

.sidenav a {
  padding: 8px 0;
  text-decoration: none;
  font-size: 18px;
  color:black;
  display: block;
  transition: 0.3s;
  font-weight: 500;
}

.sidenav a:hover {
  color: #f1f1f1;
}

/*.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}*/

#main {
  transition: margin-left .5s;
  z-index: 1;

}
#product{
	transition: margin-left.5s;
}
#footer{
	transition: margin-left .5s;
}
/*filter css end*/
.accordion {
  background-color:white;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline:0 !important;
  font-size: 15px;
  transition: 0.4s;
  border-bottom: 1px solid #ccc !important;
}

.active, .accordion:hover {
  background-color: #1f0b00;
    color: #fff;
}

.active, .accordion:after {

  color: #fff;

}
button.accordion.active:after {

  color: #fff;

}

.accordion:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

/* .active:after {
  content: "\2212";
} */

.panel {
  margin-left: 15px;
  margin-right: 15px;
  background-color: white;
  max-height: 0;
  overflow: hidden;
  transition: max-height 0.2s ease-out;
  margin-bottom:0 !important;

}




output {
  font-size: 2em;
  padding: .3em;
}




 	.card {
  		cursor: pointer;
      border:none !important;
  	}
  	.cardnew img {
  		width: 100%;
  		height: 300px;
  	}

    /* .card-img-top{

    } */
    /* .card-img-top{
      content:close-quote;
    }
  	.card-img-top:hover{
  		content: visible !important;

  	} */
    .card:hover .img_top{
      visibility: hidden;
      display: none;
    }

    .card:hover .img_btm{
      visibility:visible;
      display: block;
    }

.img_btm{
  visibility:hidden;
  display: none;
}

  	.carderspan {
      display: flex;
      align-items: center;
      margin: 6px 0px;
  	}
  	.carder {
  		width: 18px;
  		height: 18px;
  		margin-right: 15px;
  		background: #efd0bb;
  		border-radius: 30px;
      border: 1px solid #000;
  	}
  	.card-text {
      margin-top: 0;
  font-size:15px;
  line-height: 1.23077;
  margin-bottom: 10px !important;
  -webkit-box-flex: 0;
  -ms-flex: 0 0 100%;
  flex: 0 0 100%;
  letter-spacing: .7px;
  text-transform: capitalize;
}
.cardp {
    font-size: 10px;
    line-height: 1.3;
    font-weight: 300;
    width: 120px;
}
.cardprice {
    font-size: 14px;
    line-height: 1.28571;
    font-weight: 600;
    letter-spacing: 1px;
    margin: 6px 0px;
}
@media (min-width: 312px) and (max-width: 900px){
	.cardnew img{
		height: auto;
	}
	.card-body {
    padding: 0.5rem;
}
span .carder {
	margin-right: 0;
}
.carderspan{
	justify-content: space-between;
}

}

 @media (min-width: 576px){
	.modal-dialog {
    max-width: 853px;
    margin: 1.75rem auto;
}
img.moimg {
    width: 100%;
}
}

img.moimg {
    width: 100%;
    /* height: 100%; */
}



.prod_btn{
    position: absolute;
    top: 50%;
    left: 25%;
    background: #fff;
    color: #000;
    border:7px solid #fff !important;
    width: 50%;
    box-shadow: 2px -1px 7px 0px #747474;
    outline: 0 !important;
    opacity: 0;
    visibility: hidden;
    padding: 0 !important;
}

.card:hover .prod_btn{
	opacity: 1;
	visibility: visible;
  /* border:0 !important; */
}
.cardtop{
	display: flex;
}

.opt{
	padding: 0 25px 0 20px;
    border-radius: 0;
    width: auto;
    color: #000;
    border: 1px solid #E6E7E8;
    vertical-align: middle;
    background: 0 0!important;
    cursor: pointer;
    position: relative;
    outline-style: none;
    height: 40px;
    z-index: 1;
    letter-spacing: 1px;
}
.btn-group-lg>.btn, .btn-lg {
  padding: 0.5rem 10rem;
  display: block;
  border-radius: 0;
  font-weight: 700;
  margin: 0;
  color: #000000!important;
  background-color: #ffffff;
  border: 1px solid #e6e7e8;
  padding: 0!important;
  font-size: 14px!important;
  line-height: 48px!important;
  width: 13%;
  margin-left: 1rem;
  height: 40px !important;
  display: flex;
  justify-content: center;
  align-items: center;
}
.asset a{
	display: block;
    width: 100%;
    margin-top: 20px;
    background-color: #fff;
    border-left: 0;
    border-right: 0;
    border-top: 1px solid #dcdcdd;
    border-bottom: 1px solid #dcdcdd;
    text-align: left;
    padding: 10px 0!important;
}
.asset .btn {
    display: inline-block;
    margin: 0;
    font-weight: 400;
    letter-spacing: 1.5px;
    text-align: center;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border-radius: 0;
    white-space: nowrap;
    height: auto!important;
    float: none!important;
    text-transform: uppercase;
    transition: none;
    padding: 10px 16px!important;
    font-size: 14px!important;
    line-height: 30px!important;
    color: #000!important;
    background-color: #fff;
    border: 1px solid #E6E7E8;
}
.carder1 {
	width: 25px;
	height: 25px;
	margin-right: 15px;
	background: #efd0bb;
	border-radius: 30px;
}
.cparent{
	display: flex;
	flex-wrap: wrap;
}

button.colobtn.active.p-1{
  border:2px solid black !important;
}

.next_page{
  margin: auto;
display: flex;
justify-content: center;
align-items: center;
}

.jew_ank.active{
  border-bottom: 2px solid #ffa4a8;
  color: #ffa4a8;
  background: none !important;

  }

  .jew_ank{
    border-bottom: 2px solid #a9a9a9;
    color:#a9a9a9;

    }

    .next_page span.active{
      color:#ffa4a8;
      background: none;
    }

    button.btn.prod_btn:hover{
          border: 7px solid #fff !important;
    }

    .label.filter__label{
      width: 33%;
      margin-bottom: 2rem;
      margin-top: 2rem;
    }

    .filter__label{
          width: 30%;
          margin-bottom: 2rem;
          margin-top: 2rem;
    }

    .filter button{
      height: 44px;
    width: 50%;
    font-size: 15px;
    border: none;
    background: #1f0b00;
    color: #fff;
    outline: 0 !important;
    margin-bottom: 2rem;
    margin-top: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
    }

    .noUi-connect{background: #1f0b00;}


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


<!-- filter start -->


<!-- filter end -->

<!-- main body start -->

<div class="paddingfromtop">
<section id="product" style="" >


	<div class="container-fluid jewcarder">
    <div class="row hello_sec" style="padding-left: 35px;">
			<div class="col-lg-12 col-md-12 p-0">
        <div style="width:300px;">
			<h1 style="font-family: 'Libre Baskerville', serif;margin-top: 30px;font-size: 36px;">Search Products</h1>
            <!-- <a href="#"  onclick="openNav()">
			<div class="mb-1" style="background:yellow;background:gold;width: 30px;height: 4px;"></div>
			<div class="mb-1" style="background:yellow;background:gold;width: 30px;height: 4px;"></div>
			<div style="background:yellow;background:gold;width: 30px;height: 4px;"></div>
		    </a> -->
        </div>
			<!-- <p style="position: absolute;top: 80px;left:55px;"> FILTER & SORT</p> -->
		    </div>
		</div>
	<div class="row mb-5">

  <?php
   if(!empty($search_pro_data)){
     foreach ($search_pro_data as $subcategory_pro) {

$pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->first();

if(!empty($pro_type_color)){

$color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

if(!empty($color_da)){
  $color= $color_da->name;
  $color_code= $color_da->code;
}else{
  $color="Color Not Found!";
  $color_code="";
}

  $images1= $pro_type_color->image1;
  $images2= $pro_type_color->image2;
  $mrp= $pro_type_color->mrp;
  $price= $pro_type_color->price;

  $user_idd= Session::get('user_id');
       if(!empty($user_idd)){
         $user_data = App\frontendmodel\User::wherenull('deleted_at')->where('id', $user_idd)->first();
         if(!empty($user_data->package)){
           $package_data = App\adminmodel\PackageItem::wherenull('deleted_at')->where('id', $user_data->package)->first();
           if(!empty($package_data)){

             date_default_timezone_set("Asia/Calcutta");
                     $cur_date=date("m-d-Y");
             if($cur_date<=$user_data->expiry_date){

             $percentage = $package_data->price;
            $sell_price1 =(int)$price * $currency_price;

             $discount = $sell_price1 * $percentage /100;
             $sell_price = $sell_price1 - $discount;
           }
         }
         }else{
           $sell_price =(int)$price * $currency_price;
         }
       }else{
         $sell_price =(int)$price * $currency_price;
       }


  if(!empty($images1)){
    $image1=base_path.$images1;
  }else{
    $image1="";
  }

  if(!empty($images2)){
      $image2=base_path.$images2;
  }else{
    $image2="";
  }
}else{
  $image1="";
  $image2="";
  $mrp= "MRP Not Found!";
  $price= "Price Not Found!";
  $color= "Color Not Found!";
  $color_code="";
}

    ?>
		<div class="col-md-3 col-6 ">
			<div class="card cardnew mt-5">
        <?php  if(!empty($image1)) { ?>
    <img class="card-img-top img_top" src="<?=$image1;?>" alt="Card image" style="width:100%;">
  <?php } else{?>
  <img class="card-img-top img_top" src="<?=base_path?>frontend/assets/img/blank_img.jpg" alt="Card image" style="width:100%;">
   <?php } ?>

<?php if(!empty($image2)){
  ?>

    <img class="card-img-top img_btm"  src="<?=$image2;?>" alt="Card image" style="width:100%;">
  <?php }else{ ?>
    <img class="card-img-top img_btm" src="<?=base_path?>frontend/assets/img/blank_img.jpg" alt="Card image" style="width:100%;">
     <?php } ?>


     <?php

     $user_idd= Session::get('user_id');

     $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $subcategory_pro->id)->first();

if(!empty(Session::get('user_data'))) {
     // print_r($wish_datas);
     if(!empty($wish_datas)){

     ?>
                      <span style="position: absolute;right: 5px;font-size: 20px;">
                         <i class="fa fa-heart"  onclick="removeFromWishlist(<?=$subcategory_pro->id?>,<?=$wish_datas->id?>)" ></i>
                       </span>

     <?php } else{?>

                     <span style="position: absolute;right: 5px;font-size: 20px;" onclick="addToWishlist(<?=$subcategory_pro->id;?>)">
                       <i class="fa fa-heart-o" style=""></i>
                     </span>

     <?php } }?>



    <div class="card-body">
      <a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id);?>">
        <h3 class="card-text"><?=$subcategory_pro->name;?></h3>
      </a>
      <span class="carderspan">
      	<div class="carder" style="background-color:<?=$color_code;?>;"></div>
      	<a href="#" class="cardp"><?=$color;?></a>
      </span>
      <p class="cardprice"><?=$sign;?> <?if(!empty($sell_price)){echo $sell_price;}else{echo "no price";}?></p>
      <button type="button" class="btn prod_btn" data-toggle="modal" data-target="#myModal_<?=$subcategory_pro->id;?>">
    Quick View
  </button>
    </div>
  </div>
		</div>
<?php } } ?>


	</div>

<!--
  <div class="row mt-5 mb-4 ">
    <div class="next_page" >
      <a href="#" class="mr-3 jew_ank">PREV</a>
      <span class="ml-2 mr-2 active">1</span>
      <span class="ml-2 mr-2">2</span>
      <span class="ml-2 mr-2">3</span>
      <span class="ml-2 mr-2">4</span>
      <span class="ml-2 mr-2">5</span>
      <a href="#" class="ml-3 jew_ank active">NEXT</a>
      <a href="#" class="ml-3 jew_ank active">LAST</a></div>
  </div> -->

</div>


<div class="container-fluid" >

  <?php

   if(!empty($search_pro_data->first())){
     $a=1;
     foreach ($search_pro_data as $subcategory_pro) {

       $pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->first();

       if(!empty($pro_type_color)){

       $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

       if(!empty($color_da)){
         $color= $color_da->name;
         $colr_code= $color_da->code;
       }else{
         $color="Color Not Found!";
         $colr_code="";
       }

         $images1= $pro_type_color->image1;
         $images2= $pro_type_color->image2;
         $mrp= $pro_type_color->mrp;
         $price= $pro_type_color->price;

         if(!empty($images1)){
           $image1=base_path.$images1;
         }else{
           $image1="";
         }

         if(!empty($images2)){
             $image2=base_path.$images2;
         }else{
           $image2="";
         }
       }else{
         $image1="";
         $image2="";
         $mrp= "MRP Not Found!";
         $price= "Price Not Found!";
         $color= "Color Not Found!";
         $colr_code="";
       }


       ?>

 	  <!-- The Modal -->
  <div class="modal  " id="myModal_<?=$subcategory_pro->id;?>">
    <div class="modal-dialog  modal-lg">
      <div class="modal-content modal-content" >

        <!-- Modal Header -->

        <div class="modal-header">
          <h4 class="modal-title" style="font-size: 20px;    font-family: 'Calibri'!important;">Quick View</h4>
          <button type="button" class="close rigtal" data-dismiss="modal">&times;</button>
        </div>

        <!-- Modal body -->

        <div class="modal-body" >
        	<div class="container-fluid">
        		<div class="row">
        			<div class="col-md-6">
                <a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id);?>">
                <?php   if(!empty($image1)){ ?>
                       	<img class="moimg" id="main_img1" src="<?=$image1;?>">
                      <?php }else{?>
                         	<img class="moimg" src="<?=base_path?>frontend/assets/img/blank_img.jpg">
                      <?php } ?>
                </a>
                <div class="cardbottom mt-3">
        					<!-- <h3>Color: <span id="clr_nam_<?=$subcategory_pro->id;?>"><?=$color;?> </span></h3> -->
        					<div class="cparent mb-3">
  <?php
  $pro_type_colors= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->get();
  $pro_type_colors1= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->first();

  if(!empty($pro_type_colors)){
    $i=0;
    foreach ($pro_type_colors as $pro_types) {

      $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_types->color_id)->first();

      if(!empty($color_da)){

        $color_code= $color_da->code;
        $color_name= $color_da->name;
        $color_id= $color_da->id;

      }else{

        $color_code="";
        $color_name="";
        $color_id="";
      }
  ?>


                    <input type="hidden" value="<?=$color_id?>" id="color_select_<?=$subcategory_pro->id;?>" name="color_select">
                    <div class="colorhover">


                      <button class="colobtn mr-3  p-1 <?php if($i == 0){ echo "active"; } ?> " style="height:25px; width:25px;background:<?=$color_code;?>;border:none; border-radius:50px;"
                        onclick="colorChange(<?=$color_id;?>, <?=$subcategory_pro->id;?>);"></button>
                      <div class="colorhide">


                        <input type="hidden" value="<?=$color_id?>" id="color_select" name="color_select"><?=$color_name?>
                      </div>
                    </div>
                  <?php $i++;  } }?>

        					<!-- <div class="carder1"></div>
        					<div class="carder1"></div> -->
        					</div>
        				</div>
        			</div>
        			<div class="col-md-6">
                <div class="" style=" float: right">
                  <!-- <i class="fa fa-heart-o"></i> -->
                </div>
        				<div class="cardtop">
                <a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id);?>">
        					<h2 style="text-transform:capitalize;"><?=$subcategory_pro->name;?></h2>
                </a>


  <?php

  $user_idd= Session::get('user_id');

  $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $subcategory_pro->id)->first();


  // print_r($wish_datas);
  if(!empty($wish_datas)){

  ?>
          					<!-- <span style="position: absolute;right: 32px;">
                      <i class="fa fa-heart" style="color:#ffa4a8;"></i>
                    </span> -->

  <?php } else{?>

                  <!-- <span style="position: absolute;right: 32px;" onclick="addToWishlist(<?=$subcategory_pro->id;?>)">
                    <i class="fa fa-heart" style=""></i>
                  </span> -->

  <?php } ?>


        				</div>
        				<h3>
                <?=$sign;?> <span id="price_<?=$subcategory_pro->id;?>" ><?=(int)$price * $currency_price;?></span>
                <!-- &nbsp;&nbsp;<span id="price_discount_<?=$subcategory_pro->id;?>">
                  <?php
                  if((int)$mrp != "MRP Not Found!" && (int)$price != "Price Not Found!"){
                  $diff_price= (int)$mrp- (int)$price;
                   $discount= round($diff_price*100/(int)$mrp);
                   echo "( ".$discount."% Off )";
                  }
                  ?>
                </span> -->
                        <?if($mrp * $currency_price !=(int)$price * $currency_price){?>
                <del><?=$sign;?><span id="mrp_<?=$subcategory_pro->id;?>"><?=(int)$mrp * $currency_price;?></span></del> &nbsp;&nbsp;
                <?}?>

              </h3>
        				<div class="cardmiddle">
        					<p><?=$subcategory_pro->sdesc;?></p>
                	</div>
                  <h3 style="    font-size: 16px;
      font-weight: 600;color:#000;">Quantity</h3>
                  <div class="bottomdown d-flex">
                    <select class="opt" id="qtty_<?=$subcategory_pro->id;?>">
           				 	<option value="1">1</option>
           				 	<option value="2">2</option>
           				 	<option value="3">3</option>
           				 	<option value="4">4</option>
           				 	<option value="5">5</option>
           				 </select>
                   <?  $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $subcategory_pro->id)->first();

if(!empty(Session::get('user_data'))) {
                      // print_r($wish_datas);
                      if(!empty($wish_datas)){

                      ?>
            <button class="btn btn-default btn-lg" onclick="removeFromWishlist(<?=$subcategory_pro->id?>,<?=$wish_datas->id?>)" ><i class="fa fa-heart" ></i></button>

<?}else{?>
  <button class="btn btn-default btn-lg" onclick="addToWishlist(<?=$subcategory_pro->id;?>)"><i class="fa fa-heart-o" ></i></button>

<?}}?>
                   <?php if(empty(Session::get('user_data'))) {?>


                      <button class="btn btn-default btn-lg" id="js-add-to-basket"><a href="<?=base_path?>add_to_cart_local/<?=base64_encode($subcategory_pro->id);?>"><i class="fa fa-shopping-bag"></i></a></button>



                      <?php } else{?>

                      <!-- <button class="btn btn-default btn-lg"><i class="fa fa-heart-o"></i></button> -->

                      <button class="btn btn-default btn-lg" id="js-add-to-basket" onclick="addToCartOnlineHandler(this)" data-category-id="<?= $subcategory_pro->category;?>" data-subcategory-id="<?= $subcategory_pro->sub_category_id;?>"
                        data-product-id="<?= $subcategory_pro->id;?>" user-id="<?= Session::get('user_id');?>" quantity="1"><i class="fa fa-shopping-bag"></i></button>




                      <?php } ?>
                  </div>

                  <p class="mt-5">
                   <a style="font-weight: 700; color:#000;" class="pt-3" href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id);?>">VIEW FULL DETAILS <span><i class="fa fa-angle-right"></i></span> </a>
                 </p>

        				<!-- <div class="bottomdown">
        				 <select class="opt" id="qtty_<?=$subcategory_pro->id;?>">
        				 	<option value="1">1</option>
        				 	<option value="2">2</option>
        				 	<option value="3">3</option>
        				 	<option value="4">4</option>
        				 	<option value="5">5</option>
        				 </select>



                 <?php if(empty(Session::get('user_data'))) {?>

          <button class="btn btn-default btn-lg"
          onclick="addToCartOfflineHandler2(this)"
            data-product-id="<?=$subcategory_pro->id?>"
            color_id="<?if(!empty($pro_type_colors1->color_id)){echo $pro_type_colors1->color_id;}?>"
            quantity="1" ><i class="fa fa-shopping-bag"></i></button>



                 <?php } else{?>

         <button class="btn btn-default btn-lg"
         onclick="addToCartOnlineHandler(this)"
        data-category-id="<?= $subcategory_pro->category;?>"
        data-subcategory-id="<?= $subcategory_pro->sub_category_id;?>"
        data-product-id="<?= $subcategory_pro->id;?>"
        user-id="<?= Session::get('user_id');?>"
        quantity="" >ADD TO BAG</button> -->


                 <?php } ?>


        				</div>
        				<!-- <div class="asset mt-2">
        					<a href="#" class="btn btn-smartgift" id="smart-gift"><div><i class="fa fa-gift"></i> Send as a gift <sup><i class="fa fa-question-circle"></i></sup></div></a>
        				</div>
        				<div class="asset mt-2">
        					<a href="#" class="btn btn-smartgift" id="smart-gift"><div><i class="fa fa-envelope"></i> Drop a Hint <sup><i class="fa fa-question-circle"></i></sup></div></a>
        				</div> -->
        				<!-- <p><a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id);?>">VIEW FULL DETAILS <span><i class="fa fa-angle-right"></i></span> </a></p> -->
        			</div>
        		</div>
        	</div>
         </div>
         </div>


      </div>
    </div>

<?php } } ?>

  </div>
</div>

</section>
</div>

<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });
}
</script>

<script>
// $(document).on('change', '.size_selct', function() {
  // Does some stuff and logs the event to the console
function colorChange(c_id, prod_id){
  // alert("u");

  // var prod_id = $(this).attr('pro_id');
  // alert(prod_id);
  // alert(c_id);

  $('.colobtn .p-1 .active').removeClass('active');
   $(this).addClass('active');

 var base_path = $("#base_path").val();
// alert(selectedsize);
// alert(prod_id);
  $.ajax({
  url:base_path+'get_color_data',
  method: 'post',
  data: {color_id: c_id, product_id: prod_id, _token: '{{csrf_token()}}'},
  dataType: 'json',
  success: function(response){
// alert(response);
  if(response.data == true){


  var pro_color_d= response.productColordata;

var diff= parseFloat(pro_color_d.mrp) - parseFloat(pro_color_d.price);
var discount= diff * 100/ parseFloat(pro_color_d.mrp);
var price_discount= Math.round(discount);
// alert(price_discount);
var discount_string= '( '+price_discount+'% Off )';

if(pro_color_d != "" &&  pro_color_d != null){
  $('#mrp_'+prod_id).text('');
  $('#price_'+prod_id).text('');
  $('#price_discount_'+prod_id).text('');
  $('#color_select_'+prod_id).val('');

  $('#mrp_'+prod_id).text(pro_color_d.mrp);
  $('#price_'+prod_id).text(pro_color_d.price);
  $('#price_discount_'+prod_id).text(discount_string);

  $('#color_select_'+prod_id).val(c_id);

if(pro_color_d.image1 != "" && pro_color_d.image1 != null){

$('#main_img1').attr('src', base_path+pro_color_d.image1);
// $('#my_img1').attr('src',base_path+pro_color_d.image1);

}



  // $('#main_img2').attr('src','second.jpg');
  // $('#main_img3').attr('src','second.jpg');
  // $('#main_img4').attr('src','second.jpg');
  //
  //
  // $('#my_img2').attr('src','second.jpg');
  // $('#my_img3').attr('src','second.jpg');
  // $('#my_img4').attr('src','second.jpg');


}

  }
  else{
  alert('hiii');
  }
  }
  });


}
</script>
@endsection
