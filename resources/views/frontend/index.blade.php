@extends('frontend.layout')
@section('main')
<!-- <style media="screen">
  .last_slider{
     transition-duration: 0ms !important;
    transform: translate3d(50px, 0px, 0px) !important;
} -->

<style>

.hova:hover{
  color:#fff !important;
}
@media (max-width:360px) {
  .imgrespon{
    width: 100% !important;
  }
  .heartres{
    right: 4px !important;
  }
  .hov_p{
    width: 100% !important;
  }
  .imgres{
    padding-top: 2rem;
  }
}
@media (max-width:1320px) {

  /* .imgres1{
    margin-right: 20px !important;
  } */
}
.carderspan{
  display: flex;
  cursor: pointer;
}
.carder{
  width:2rem;
  height:2rem;
  border-radius: 50%;
  border: 1px solid #120101;
}
.cardp{
  display: none;
}
.colorh:hover .cardp{
  display:contents;
}
</style>
<style media="screen">
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;1,100&family=Space+Grotesk:wght@300;400&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,300;1,400&display=swap');
@font-face {
  font-family: 'Calibri';
  font-style: italic;
  font-weight: 400;
  src: url(https://fonts.gstatic.com/l/font?kit=J7adnpV-BGlaFfdAhLQo6btP&skey=36a3d5758e0e2f58&v=v11) format('woff2');
  unicode-range: U+0000-00FF, U+0131, U+0152-0153, U+02BB-02BC, U+02C6, U+02DA, U+02DC, U+2000-206F, U+2074, U+20AC, U+2122, U+2191, U+2193, U+2212, U+2215, U+FEFF, U+FFFD;
}

@media (max-width:1900px){
   .img2{
         width: 180.5rem !important;
   }
   .here-for-you-banner{
     max-width: 1916px;
   }
}
.swiper-button-next  {
  opacity: 1;
  background: #fff !important;
  color: #000000 !important;
}
.swiper-button-prev {
  opacity: 1;
  background: #fff !important;
  color: #000000 !important;
}
@media (min-width: 640px) and (max-width: 2000px) {
.midsection{
  max-width: 90%;
  margin: auto;
}
}
    @media (min-width: 640px){
        .btn-ch1{
        display: none;
        }
        .btn-mobile{
          display: none;
        }
        .mob-btn{
          display: none;
        }
        .mob-1{
          display: none;
        }
    }
    @media (max-width: 640px){
      .btn-ch{
        display: none;
      }
      .btn-desktop{

      }
      .des-btn{
        display: none;
      }
      .des-1{
        display: none;
      }
    }
    .hello a {
      font-size: 16px !important;
      font-family: 'Lato', sans-serif !important;
      /* letter-spacing: 1px !important; */
      text-transform: capitalize !important;
    }
    .hovera a:hover{
      text-decoration: underline !important;
      color: #007bff !important;
    }
    @media (max-width:360px) {
      .hello p {
    font-size: 10px !important;
    }
  }
</style>



<div class="paddingfromtop">

<!-- top slider start -->
<div class="container-fluid p-0">
  <!--  <h2>Carousel Example</h2> -->
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <?php    if(!empty($slider)) {
        $a=0;
        foreach ($slider as $slidr) {

      ?>
      <li data-target="#myCarousel" data-slide-to="<?=$a;?>" class="<?php if($a == 0){ echo "active";} ?>"></li>
      <?php $a++; } } ?>
      <!-- <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li> -->
    </ol>
    <!-- Wrapper for slides -->

    <div class="carousel-inner">
      <?php
    if(!empty($slider)) {
      $k=0;
      foreach ($slider as $slidr) {

    ?>
      <div class="item <?php if($k == 0){ echo "active"; } ?>" style="margin-top:1rem;">
      <a href="<?=base_path.$slidr->link;?>">
        <img src="<?=base_path.$slidr->image;?>" alt="Los Angeles" style="width:100%;height:auto;">
      </a>
        <div class="carousel-caption">
          <!--  <h3>Los Angeles</h3>
          <p>LA is always so much fun!</p> -->
        </div>
      </div>

        <?php $k++; } } ?>
    </div>
    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left" style="color: white;"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right" style="color: white;"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>
<!-- top slider end -->


<!-- second slider start -->
<section class=" container-fluid mt-5 mb-5 overflow-hidden position-relative">
  <center>
   <h1  class="h1style" style="margin-bottom: 3rem;margin-top: 5rem;">Top Categories</h1>   <!-- font-family: 'Calibri'!important; -->

    <!-- <h1 class="weight_100 mb-5">OUR EVERYDAY PIECES</h1> -->
  </center>
  <!-- Swiper -->
  <div class="swiper-container ">
    <div class="swiper-wrapper">
<?php
$recent_categories= App\adminmodel\Category::wherenull('deleted_at')->orderBy('id','DESC')->where('is_active',1)->get();
if(!empty($recent_categories)){
  foreach ($recent_categories as $recent_cate) {

?>
<style>
.nreewe:hover {
filter: brightness(1);
}
</style>
      <div class="swiper-slide hello hovera">
        <a href="<?=base_path?>category_products/<?=base64_encode($recent_cate->id);?>">
          <img class="swiper-slide_img nreewe img-fluid" src="<?=base_path.$recent_cate->image;?>" style=";" >
      </a>
         <span>
          <a href="<?=base_path?>category_products/<?=base64_encode($recent_cate->id);?>">
            <?=$recent_cate->name;?>
          </a>
          <!-- <p class="pr_slider_price">$ 200 <a href="#"><del>$220</del></a></p> -->
        </span>
      </div>
<?php } } ?>
    </div>
    <!-- Add Pagination -->
    <!-- <div class="swiper-pagination"></div> -->
    <!-- Add Arrows -->
      <div class="swiper-button-next btn-desktop"></div>
     <div class="swiper-button-prev btn-desktop"></div>
     <!-- <div class="swiper-button-next btn-mobile" style="top: 56%;"></div>
    <div class="swiper-button-prev btn-mobile" style="top: 56%;"></div> -->
  </div>
</section>
<!-- second slider end -->



<!--
<div class="containerx">
   <div class="swiper-container test">
       <div class="swiper-wrapper">
         <?php
         $recents= App\adminmodel\Product::wherenull('deleted_at')->where('is_active',1)->where('is_subcat_delete',0)->where('is_cat_delete',0)->where('is_mini_subcat_delete',0)->orderBy('id','DESC')->get();
         if(!empty($recents)){
           foreach ($recents as $recent_pro) {

         $pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $recent_pro->id)->first();


         if(!empty($pro_type_color)){

           $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

           if(!empty($color_da)){
             $color_id= $color_da->id;
             $color= $color_da->name;
             $color_code= $color_da->code;
           }else{
             $color_id="";
             $color="Color Not Found!";
             $color_code="";
           }


           $mrp= $pro_type_color->mrp;
           $price= $pro_type_color->price;
           $image= base_path.$pro_type_color->image1;
         }else{
           $mrp="MRP!";
           $price="Price!";
           $image="";
           $color_id="";
           $color="Color Not Found!";
           $color_code="";
         }
         ?>

           <div class="swiper-slide"><img src="<?=$image;?>" class="img-fluid " alt="..."></div>
           <?}}?>
       </div>


       <div class="swiper-button-prevx"></div>
       <div class="swiper-button-nextx"></div>
   </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    new Swiper('.swiper-container test', {
        loop: true,
        nextButton: '.swiper-button-nextx',
        prevButton: '.swiper-button-prevx',
        slidesPerView: 3,
        paginationClickable: true,
        spaceBetween: 20,
        breakpoints: {
            1920: {
                slidesPerView: 3,
                spaceBetween: 30
            },
            1028: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            480: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }
    });
});

</script> -->
<!-- third slider start -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;1,100&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Space+Grotesk:wght@300;400&display=swap');
   .h1style{
     /* font-family: 'Libre Baskerville', serif !important; */
     font-size: 36px;
   }

</style>
<div class="col-sm-12 col-md-12 col-lg-12 pad_no" style="padding:0px!important">

  <img data-aos-once="true" data-aos="fade-up" class="img-fluid" src="<?=base_path.$homepage_img_data->image?>" >
</div>

<section class="mt-1 ">
  <div class="container-fluid m-0 p-0 pt-5" style="">


      <!-- <div class="col-sm-12 col-md-3 col-lg-3 p-0 mar_top_new" data-aos="fade-up" data-aos-once="true">
        <div style="background-color: #ffffff;height:100%;   border:25px solid #533021;    padding: 4rem;">
          <h1 style="font-family: 'Dancing Script', cursive;">Sustainability</h1>
          <h2>100% recycled<h2>
          <h2 style="    color: #ada700;">GOLD</h2>
          <P>All of our jewellery is now made in<br>
100% Recycled Silver<br>
(because it reduces CO2 emissions by ⅔ versus mined silver).</P>
          <h5 style="border-bottom: 2px solid black;display: inline-block;color: #84004b;">Shop Best Sellers </h5>
        </div>
      </div> -->
    </div>

</section>

<div class="container-fluid">


<section class=" mb-5 overflow-hidden position-relative" style="">
  <center>
    <h1 class="h1style" style="margin-bottom: 5rem;margin-top: 5rem;">Top Trending's</h1>
      <!-- font-family: 'Calibri'!important; -->
    <!-- <h1 class="weight_100 mb-5">THE LATEST IN LAYERING</h1> -->
  </center>
  <!-- Swiper -->
  <div class="swiper-container ">
    <div class="swiper-wrapper">

<?php
$trendings= App\adminmodel\Product::wherenull('deleted_at')->where('is_active',1)->where('is_subcat_delete',0)->where('is_cat_delete',0)->where('is_mini_subcat_delete',0)->inRandomOrder()
    ->limit(10)->get();
if(!empty($trendings)){
  $a=0;
  foreach ($trendings as $trend_pro) {

$pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $trend_pro->id)->first();
if(!empty($pro_type_color)){

  $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

  if(!empty($color_da)){
    $color_id= $color_da->id;
    $color= $color_da->name;
    $color_code= $color_da->code;
  }else{
    $color_id="";
    $color="Color Not Found!";
    $color_code="";
  }

  $mrp= $pro_type_color->mrp;
  $price= $pro_type_color->price;
  $image= base_path.$pro_type_color->image1;
  $image1= base_path.$pro_type_color->image2;
  if(!empty($pro_type_color->image2)){
          $image1 = base_path.$pro_type_color->image2;
        }else{
          $image1 = base_path.$pro_type_color->image1;
        }



}else{
  $mrp="MRP!";
  $price="Price!";
  $image="";
  $color="Color Not Found!";
  $color_code="";
  $color_id="";
}

?>

      <div class="swiper-slide hello text-left">
<input type="hidden" value="<?=$color_id;?>" id="color_select_t_<?=$trend_pro->id?>">
<?php if(!empty($image)){ ?>
<a style="" class="m-0" href="<?=base_path?>products_view/<?=base64_encode($trend_pro->id);?>">
<img class="swiper-slide_img img-fluid" src="<?=$image;?>" onmouseover="pro_change(this)" onmouseout="pro_default(this)" id="pro_img<?=$a?>" style="" img="<?=$image?>" img2="<?=$image1?>">
</a>
<?php if(empty(Session::get('user_data'))) {?>


        <a href="<?=base_path?>add_to_cart_local/<?=base64_encode($trend_pro->id);?>" ><p class="text_center hov_p" style="z-index: 1000;padding:7px;">ADD TO CART</p></a>

<?php } else{ ?>

       <a class="text_center hov_p hova"  onclick="addToCartOnlineHandler(this)"
      data-category-id="<?= $trend_pro->category;?>"
      data-subcategory-id="<?= $trend_pro->sub_category_id;?>"
      data-product-id="<?= $trend_pro->id;?>"
      user-id="<?= Session::get('user_id');?>"
      quantity="1"
      btn="trend_btn" style="z-index: 1000;padding:7px;">ADD TO CART</a>

<?php } ?>
<?php }else{ ?>
<a  style="" class="m-0">
<img class="swiper-slide_img img-fluid" src="<?=base_path?>frontend/assets/img/blank_img.jpg" style="">
</a>
<?php } ?>
<!-- <div class="imgdiv">
        <?php if(!empty($image)){ ?>
        <a style="border: 1px solid #efefef;" class="m-0" href="<?=base_path?>products_view/<?=base64_encode($trend_pro->id);?>">
        <img class="swiper-slide_img img-fluid" src="<?=$image;?>" style="">
      </a>
      <?php }else{ ?>
        <a  style="border: 1px solid #efefef;" class="m-0">
        <img class="swiper-slide_img img-fluid" src="<?=base_path?>frontend/assets/img/blank_img.jpg" style="">
      </a>
      <?php } ?>
      <?php if(!empty($image1)){ ?>
      <a style="border: 1px solid #efefef;" class="m-0" href="<?=base_path?>products_view/<?=base64_encode($trend_pro->id);?>">
      <img class="swiper-slide_img  img-fluid" src="<?=$image1;?>" style="">
    </a>
    <?php }else{ ?>
      <a  style="border: 1px solid #efefef;" class="m-0">
      <img class="swiper-slide_img img-fluid" src="<?=base_path?>frontend/assets/img/blank_img.jpg" style="">
    </a>
    <?php } ?>
</div> -->


      <?php

      $user_idd= Session::get('user_id');

      $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $trend_pro->id)->first();


      // print_r($wish_datas);
      if(!empty($user_idd)){
      if(!empty($wish_datas)){

      ?>
                       <span  style="position: absolute;
    right: 5px;
    font-size: 20px;
    top: 25px;
    /* background: #e9e9e9; */
    height: 30px;
    width: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* border-radius: 50px; */
    " class="heartres" onclick="removeFromWishlist(<?=$trend_pro->id?>,<?=$wish_datas->id?>)">
                    <i class="fa fa-heart-o"></i>
                        </span>

      <?php } else{?>

                      <span style="position: absolute;
   right: 5px;
   font-size: 20px;
   top: 25px;
   /* background: #e9e9e9; */
   height: 30px;
   width: 30px;
   display: flex;
   justify-content: center;
   align-items: center;
   z-index: 1000;
   /* border-radius: 50px; */
   " onclick="addToWishlist(<?=$trend_pro->id;?>)" class="heartres">
                    <i class="fa fa-heart-o"></i>
                      </span>

      <?php } }?>


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
?>
<style>
   .setprice{
      display:flex;
   }
   .setprice1{

     margin: 0.6rem;
   }

</style>

         <span class="text_tra" style="">

        <a style="text-transform: capitalize !important; " class="ml-0 mr-0" href="<?=base_path?>products_view/<?=base64_encode($trend_pro->id);?>"><?=$trend_pro->name;?></a>
        <div class="setprice">
      <?if((int)$mrp * $currency_price !=$sell_price){?>  <p style="font-size:10px !important;" class="mb-0 mt-2">
        <a class="ml-0 mr-0" href="#"><del><?=$sign;?> <span><?=(int)$mrp * $currency_price;?></span></del></a>
      </p>
      <?}?>
        <p style="color:#000 !important;"  class="pr_slider_price setprice1"><?=$sign;?> <span><?if(!empty($sell_price)){echo $sell_price;}else{echo "no price";}?></span> </p>
      </div>
         <div class="colorh " style="margin-left:5px;">
          <span class="carderspan setprice1">
            <div class="carder" style="background-color:<?=$color_code;?>;"></div>
            <div><a href="#" class="cardp"><?=$color;?></a></div>
          </span>
               </div>
        </span>
      </div>

<?php $a++;} } ?>

    </div>
    <!-- Add Pagination -->
    <!-- <div class="swiper-pagination"></div> -->
    <!-- Add Arrows -->
     <div class="swiper-button-next des-btn" style="top: 58%"></div>
    <div class="swiper-button-prev des-btn" style="top: 58%"></div>
    <div class="swiper-button-next mob-btn" style="top: 55%"></div>
   <div class="swiper-button-prev mob-btn" style="top: 55%"></div>
  </div>
</section>






<style>
    .imgdiv {
        /* width: 130px;
        height: 195px; */
        height: 360px;
        position: relative;
        display: inline-block;
    }
    .imgdiv .img-top {
        display: none;
        position: absolute;
        top: 0;
        left: 0;
        z-index: 99;
    }
    .imgdiv img {
      position: absolute;
      top: 0;
      left: 0;
    }
    .imgdiv:hover .img-top {
        display: inline;
    }
    /* @media screen and (max-width: 900px){
      .imgdiv {
      height: 350px;
      } */
    }
    @media (max-width:1926px) {
       #img2{
         width: 183rem !important;
       }
       /* .img2{
         width: 183rem !important;
       } */
    }
    @media (max-width:723px) {
       .imggap{
         margin-bottom: 4rem;
       }
    }
    @media (max-width:360px) {
       #img1{
             height: 195px !important;
       }
       #img2{
         height: 18rem !important;
       }
    }
</style>

  <br>


<div class="container-fluid">
  <center>
    <h1 class="h1style" style="margin-bottom: 3rem;margin-top: 5rem;">Build Your Own Jewellery</h1>
      <!-- font-family: 'Calibri'!important; -->
    <!-- <h1 class="weight_100 mb-5">THE LATEST IN LAYERING</h1> -->
  </center>
    <div class="row">
        <div class="col-md-4 col-xs-12">
<a href="https://www.fineoutput.co.in/jewellery2/public/customize_category"><img src="<?=base_path?>frontend/assets/img/discount.jpg" class="img-fluid imggap" alt="..."></a>
        </div>
        <div class="col-md-4 col-xs-12">
<a href="https://www.fineoutput.co.in/jewellery2/public/engrave_category" ><img src="<?=base_path?>frontend/assets/img/discount.jpg" class="img-fluid imggap" alt="..."></a>
        </div>
        <div class="col-md-4 col-xs-12">
  <a href="https://www.fineoutput.co.in/jewellery2/public/comming_soon" ><img src="<?=base_path?>frontend/assets/img/discount.jpg" class="img-fluid imggap" alt="..."></a>
        </div>
    </div>
  </div>

<section class="mt-5 mb-5 overflow-hidden position-relative" style="padding: 0px important; margin: 0px !important;">
  <center class="mb-5">
    <h1 class="h1style" style="margin-bottom: 3rem;margin-top: 5rem;">Recent Products</h1>
      <!-- font-family: 'Calibri'!important; -->
    <!-- <h1 class="weight_100 mb-5">THE LATEST IN LAYERING</h1> -->
  </center>
  <!-- Swiper -->
  <div class="swiper-container col-md-12" style="position: relative; padding:0px!important">
    <div class="swiper-wrapper">

      <?php
      $recents= App\adminmodel\Product::wherenull('deleted_at')->where('is_active',1)->where('is_subcat_delete',0)->where('is_cat_delete',0)->where('is_mini_subcat_delete',0)->orderBy('id','DESC')->get();
      if(!empty($recents)){
        $x=300;
        foreach ($recents as $recent_pro) {

      $pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $recent_pro->id)->first();


      if(!empty($pro_type_color)){

        $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

        if(!empty($color_da)){
          $color_id= $color_da->id;
          $color= $color_da->name;
          $color_code= $color_da->code;
        }else{
          $color_id="";
          $color="Color Not Found!";
          $color_code="";
        }


        $mrp= $pro_type_color->mrp;
        $price= $pro_type_color->price;
        $image= base_path.$pro_type_color->image1;
        if(!empty($pro_type_color->image2)){
                $image1 = base_path.$pro_type_color->image2;
              }else{
                $image1 = base_path.$pro_type_color->image1;
              }
      }else{
        $mrp="MRP!";
        $price="Price!";
        $image="";
        $color_id="";
        $color="Color Not Found!";
        $color_code="";
      }
      ?>

      <div class="swiper-slide hello text-left">

<input type="hidden" value="<?=$color_id;?>" id="color_select_<?=$recent_pro->id?>">

<?php if(!empty($image)){ ?>
<a style="" class="m-0" href="<?=base_path?>products_view/<?=base64_encode($trend_pro->id);?>">
<img class="swiper-slide_img img-fluid" src="<?=$image;?>" onmouseover="pro_change(this)" onmouseout="pro_default(this)" id="pro_img<?=$x?>" style="" img="<?=$image?>" img2="<?=$image1?>">
</a>
<?php if(empty(Session::get('user_data'))) {?>


        <a href="<?=base_path?>add_to_cart_local/<?=base64_encode($recent_pro->id);?>" ><p class="text_center hov_p" style="z-index: 1000;padding:7px;">ADD TO CART</p></a>

<?php } else{ ?>

       <a class="text_center hov_p"  onclick="addToCartOnlineHandler(this)"
      data-category-id="<?= $recent_pro->category;?>"
      data-subcategory-id="<?= $recent_pro->sub_category_id;?>"
      data-product-id="<?= $recent_pro->id;?>"
      user-id="<?= Session::get('user_id');?>"
      quantity="1"
      btn="trend_btn" style="z-index: 1000;padding:7px;">ADD TO CART</a>

<?php } ?>
<?php }else{ ?>
<a  style="" class="m-0">
<img class="swiper-slide_img img-fluid" src="<?=base_path?>frontend/assets/img/blank_img.jpg" style="">
</a>
<?php } ?>
      <?php

      $user_idd= Session::get('user_id');

      $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $recent_pro->id)->first();

      if(!empty($user_idd)){

      // print_r($wish_datas);
      if(!empty($wish_datas)){

      ?>
                       <span style="position: absolute;
    right: 5px;
    font-size: 20px;
    top: 25px;
    /* background: #e9e9e9; */
    height: 30px;
    width: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* border-radius: 50px;"> */
                        <i class="fa fa-heart-o"></i>
                        </span>

      <?php } else{?>

                      <span style="position: absolute;
   right: 30px;
   font-size: 20px;
   top: 25px;
   /* background: #e9e9e9; */
   height: 30px;
   width: 30px;
   display: flex;
   justify-content: center;
   align-items: center;
   z-index: 1000;
   /* border-radius: 50px;" */
    onclick="addToWishlist(<?=$recent_pro->id;?>)">
                      <i class="fa fa-heart-o"></i>
                      </span>

      <?php } }?>


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
?>

         <div class="text_tra" style=" ">
          <a style="    text-transform: capitalize !important; " class="ml-0 mr-0" href="<?=base_path?>products_view/<?=base64_encode($recent_pro->id);?>"><?=$recent_pro->name;?></a>
          <div class="setprice">
        <?if((int)$mrp * $currency_price !=$sell_price){?>  <p style="font-size:10px !important;" class="mb-0 mt-2">
          <a class="ml-0 mr-0" href="#"><del><?=$sign;?> <span><?=(int)$mrp * $currency_price;?></span></del></a>
        </p>
        <?}?>
          <p style="color:#000 !important;"  class="pr_slider_price setprice1"><?=$sign;?> <span><?if(!empty($sell_price)){echo $sell_price;}else{echo "no price";}?></span> </p>
        </div>
        <div class="colorh">
          <div class="carderspan setprice1">
            <div class="carder" style="background-color:<?=$color_code;?>;"></div>
            <div><a href="#" class="cardp "><?=$color;?></a></div>
          </div>
            </div>
        </div>
      </div>

<?php $x++;} } ?>
    </div>
    <!-- Add Pagination -->
    <!-- <div class="swiper-pagination"></div> -->
    <!-- Add Arrows -->
    <div class="swiper-button-next btn-ch" style=" top: 180px;"></div>
    <div class="swiper-button-prev btn-ch" style=" top: 180px;"></div>
    <div class="swiper-button-next btn-ch1" style=" top: 40%;"></div>
    <div class="swiper-button-prev btn-ch1" style=" top: 40%;"></div>
    <!-- <div class="swiper-button-next"></div>
   <div class="swiper-button-prev"></div> -->
  </div>
</section>
</div>
<div class="row" style="padding:0px!important;">


<img src="<?=base_path.$homepage_img_data->image2?>" class="img-fluid mt-5" id="" style="">
</div>





<!--

<section>
  <div class="container-fluid m-0 p-0">
    <div class="row mr-0 " style="position:relative;">
      <div class="col-sm-12 col-md-12 col-lg-12 mt-3 pad_no">
        <img data-aos-once="true" data-aos="fade-up" id="img2" src="<?base_path();?>frontend\assets\img\banner4.jpg" style="max-width:100%;width:100%;height:500px;">
      </div>
      <div data-aos-once="true" data-aos="fade-up" class="col-3 col-md-3 col-lg-3 p-0 pso_tred">
        <div class="mar_sm" style="background-color:#4d2f40;height:20px;width: 261px; overflow:hidden;"></div>
        <div style=" margin-top:20px; overflow:hidden;">
          <h2 class="s_heart" style="font-family: Mongolian Baiti; color: #293d3d; font-size:28px;">follow your heart<br>(straight to cheackout)</h2>
          <h5 style="border-bottom: 2px solid black;display: inline-block;margin-right: 140px;color: #3d5c5c;">SHOP HEARTS </h5>
        </div>
      </div>
    </div>
  </div>
</section> -->


<!-- <section style="background-color:#fff3f4;">
  <div class="container-fluid p-0 m-0">
    <div class="row p-0 m-0">
      <div class="col-lg-4 col-md-4" style="justify-content: center;background-color: #fff3f4;
    max-width: 24%;
    padding: 3%;">
        <h2 class="text_cter" style="font-family: Mongolian Baiti; color: #293d3d; text-align: left;line-height: 100%;">new! limited edition stones</h2>
      </div>
      <div class="col-lg-2 col-md-2 col-6">
        <img data-aos-once="true" data-aos="zoom-in" data-aos-duration="1000" src="<?=base_path?>frontend/assets/img/Untitled-1.png" style="height: 90px;    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top:30px;">
        <h5 class="no_pad" style="text-align: center;padding-top: 75px">burnt sienna howlite</h5>
      </div>
      <div class="col-lg-2 col-md-2 col-6" >
        <img data-aos-once="true" data-aos="zoom-in" data-aos-duration="1500" src="<?=base_path?>frontend/assets/img/Untitled-1.png" style="height: 90px;    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top:30px;">
        <h5 class="no_pad" style="text-align: center;padding-top: 75px">burnt sienna howlite</h5>
      </div>
      <div class="col-lg-2 col-md-2 col-6">
        <img data-aos-once="true" data-aos="zoom-in" data-aos-duration="2000" src="<?=base_path?>frontend/assets/img/Untitled-1.png" style="height: 90px;    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top:30px;">
        <h5 class="no_pad" style="text-align: center;padding-top: 75px">burnt sienna howlite</h5>
      </div>
      <div class="col-lg-2 col-md-2 col-6" >
        <img data-aos-once="true" data-aos="zoom-in" data-aos-duration="3000" src="<?=base_path?>frontend/assets/img/Untitled-1.png" style="height: 90px;    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top:30px;">
        <h5 class="no_pad" style="text-align: center;padding-top: 75px">burnt sienna howlite</h5>
      </div>
    </div>
  </div>
</section> -->
<!-- third slider start -->




<!-- sign up end -->


<h2 class="text-center mt-5 " style="font-size:36px;"> Our Blogs</h2>
<!-- font-family: 'Calibri' !important; -->
<p class="text-center mb-5">Wanna read something interesting?</p>
<div class="container-fluid blog" >
  <div class="row">
    <style>
      @import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;1,100&family=Libre+Baskerville:ital,wght@0,400;0,700;1,400&family=Space+Grotesk:wght@300;400&display=swap');
      .newheading{
        font-family: 'Libre Baskerville', serif !important;
      }
      .btna{
        font-family: 'Libre Baskerville', serif !important;
        /* background:#1f0b00; */
        /* color:#fff !important; */
        font-size: 1.5rem !important;
        padding: 7px 10px !important;

        background-color:#f5f1ea!important; color:Black!important;
      }
      @media (max-width:360px){
        .imgres{
          margin-top:1rem;
        }
        .textres{
          margin-top:-2rem !important;
        }
        .mobile-h2{
          font-size: 18px;
        }
        .textres{
          font-size: 18px;
          display: none;
        }
      }
    </style>

    <?php
      $blog_data= App\adminmodel\Blog::wherenull('deleted_at')->where('is_active',1)->limit(3)->get();

      if(!empty($blog_data)){
        $f=0; foreach ($blog_data as $blog) {
      ?>
    <div class="col-lg-4 col-md-4 col-sm-12 pad_no " style=" text-align: center;">
      <a href="<?=base_path?>view_blog/<?=base64_encode($blog->id);?>" >
      <img src="<?=base_path.$blog->image;?>" class="img-fluid imgres" style="height:306.33px;max-width: 400px!important;width:100%;">
    </a>
    <h3 class="newheading" style="font-size:18px;">Shop for jewellery</h3>
      <a href="<?=base_path?>view_blog/<?=base64_encode($blog->id);?>" >
      <h5 class="text-center"><?=$blog->name;?></h5></a>
      <p class="text-center textstn mb-5"><?=$blog->content;?></p>
      <a href="<?=base_path?>view_blog_detail" class="btna">Read More</a>
    </div>
<?php } } ?>
  </div>
</div>
<script>
    let textstn=document.querySelectorAll('.textstn');
     for(let i=0;i<textstn.length;i++){
       let textbre = textstn[i].innerHTML.slice(0, 49);
       textstn[i].innerHTML=textbre
}
</script>

<div class="text-center mt-5 mb-5" style="margin-top:5rem !important;">

<a  href="<?=base_path?>view_blog_detail" class="blg_btn" style="height: 44px;
    width: 13%;
    font-size: 20px !important;
    font-weight:bold !important;
    padding: 10px 15px;
    border: none;
    background: #f5f1ea!important;
    color: #000000 !important;
    outline: 0 !important;">View All Blogs</a>


</div>


<!-- blog sldier start -->




<!-- blog sldier end -->
<!-- third slider end -->
<div class="container-fluid">


<div class="here-for-you-banner" id="homepage-stores-sale-banner">
  <a href="#" target="_top" title="#">
    <!-- <img data-aos="zoom-in" data-aos-once="true" src="<?=base_path;?>frontend/assets/img/logo.png"> -->
  <h2 class="textres tcenter mt-2 mb-2">GemX</h2>
    <div class="here-for-you-banner-text">

      <h2 class="desktop-h2 mt-1">Stores are Open!</h2>
      <h2 class="mobile-h2 mt-1 tcenter">Stores are Open!</h2>
      <div class="desktop-h2 mt-1" style="flex-direction: column;">
        <p style="margin:0 0 10px 0;">Our stores have been thoughtfully reopened with additional safety measures in place. Prefer contactless shopping? You can now buy online and pick up curbside or in-store.</p>
        <p class="homepage-banner-cta mt-1">Learn How We are Keeping You Safe</p>
      </div>
      <div class="mobile-h2 mt-1">
        <p>Our stores have been thoughtfully reopened with additional safety measures in place. Prefer contactless shopping? You can now buy online and pick up curbside or in-store.</p>
        <p class="homepage-banner-cta">Learn How We are Keeping You Safe</p>
      </div>
    </div>
  </a>
</div>

</div>
</div>





@endsection
