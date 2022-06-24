@extends('frontend.layout')
@section('main')

<style>
    .gif_image{
      border:1px solid lightgrey;
    }

    .best_gif{
      /* padding: 4rem 9rem; */
      padding: 5rem 18rem;
    }

    .pad_4{
      padding: 4rem 0rem;
    }

     .swiper-container {
      width: 100%;
      height: 100%;
    }

    .swiper-slide {
      text-align: center;
      font-size: 18px;
      background: #fff;


      /* Center slide text vertically */
      display: -webkit-box;
      display: -ms-flexbox;
      display: -webkit-flex;
      display: flex;
      -webkit-box-pack: center;
      -ms-flex-pack: center;
      -webkit-justify-content: center;
      justify-content: center;
      -webkit-box-align: center;
      -ms-flex-align: center;
      -webkit-align-items: center;
      align-items: center;
    }
    .he_50{
      height:190px !important;
    }

    .swiper-slide img{
      height: 100%;
      width: 100%;
    }

    .price_btn button{
          text-transform: none;
    height: 60px;
    width: 100%;
    border: 1px solid #000;
    margin: 0rem 0.50rem;
    background: #fff;
    outline: 0 !important
    }
    .price_btn button:focus{
      background: black;
      color: #fff;
    }

    .price_btn button:visited{
      background: black;
      color: #fff;
    }


    .price_btn button:active{
      background: black;
      color: #fff;
    }


    .price_btn button:hover{
      background: #000;
      color: #fff;
    }

    .name_input input{
      width:49%;
      height: 44px;
      margin-bottom:0.50rem;
          border: 1px solid #E6E7E8;
          padding:11px;
    }

    .mes_tex{
      width: 99%;
      min-height: 150px;
          border: 1px solid #E6E7E8;
           padding:11px;
    }

    .ad_gg{
          width: 100%;
    background: #52c1b7;
    color: #fff;
    border: 0;
    outline: 0 !important;
    height: 44px;
    }

    .price_btn{
      width: 100%;
    }
    img.gif_image {
    width: 498px;
    height: 282px;
    background-size: 100% 100%;
    background-repeat: no-repeat;
}

@media (min-width:312px) and (max-width:900px) {
  img.gif_image {
  width: 100% !important;

}
.best_gif{
  padding-left: 15px !important;
  padding-right: 15px !important;
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
  <section>
    <div class="container-fluid ">
      <div class="row mt-5 mb-5">
        <div class="col-md-8 best_gif " style="background-color:#fafafa; height:min-content;">
          <div class="preview-pic tab-content">

<?php
if(!empty($giftcard_data)){
  $i=0;
  foreach ($giftcard_data as $giftcard) {
?>

         <div class="tab-pane <?php if($i == 0){ echo 'active';} ?>" id="pic_<?=$giftcard->id;?>" >
            <img class="gif_image" src="<?=base_path.$giftcard->image;?>" style="margin-top:5px; height: 440px;">
         </div>

<?php $i++; } } ?>


       </div>

        </div>


        <div class="col-md-4  preview-thumbnail nav nav-tabs style" style="padding-left:15px;padding-right:15px;position:relative; flex-direction: column;border-bottom:none !important;" >
          <h1 class="account-container gift-cert-name header-3">
  eGift Card
  </h1>
  <p class="gift-cert-price header-5" style="margin-top:2rem !important;">
   <span style="font-weight:50px; font-size:400;">$25</span>
    <span style="font-size:400;">- $200</span>
   </p>



  <div class="swiper2 swiper-container swiper-container50 he_50" id="swiper-container50" style="overflow: hidden;">
    <div class="swiper-wrapper">

<?php
if(!empty($giftcard_data)){
  $k=0;
  foreach ($giftcard_data as $giftcard) {

?>

      <div class="swiper-slide <?php if($k == 0){ echo 'active'; $g_id=$giftcard->id;} ?>">
        <a data-target="#pic_<?=$giftcard->id;?>" data-toggle="tab"  onclick="giftcard(<?=$giftcard->id;?>);" style="width:70px; height:70px!important; border-radius:50%;">

           <img src="<?=base_path.$giftcard->image;?>" >

        </a>
      </div>

<?php $k++; } } ?>



    </div>

    <!-- <div class="swiper-pagination"></div> -->

<!--     <div class="swiper-button-next"></div>
    <div class="swiper-button-prev"></div> -->
  </div>

      <h3 class="account-container gift-cert-amount-title title-s" style="margin-top:-0.5rem;">AMOUNT</h3>
      <!-- <div class="form-row form-row-gift-cert-amounts required" aria-required="true"> -->

<div class="form-row form-row-gift-cert-amounts required" aria-required="true"  style="padding-top:2rem; margin-left:-rem; width:90%;">


      <!-- <div class="d-flex price_btn">  -->
      <select class="variation-select required gift-cert-amount text-m" id="gp_price" name="dwfrm_giftcert_purchase_amount" data-cs-mask="" aria-required="true" onchange="giftcard_chng()">


<?php
if(!empty($giftcard_price_data)){
  $n=0;
  foreach ($giftcard_price_data as $giftcard_price) {
?>
        <option value="<?=$giftcard_price->id?>" <?php if($n == 0){ echo 'ml-0';$p_id=$giftcard_price->id;}?> ><?=$sign." ".$giftcard_price->price;?></option>
<?php $n++; } } ?>
        <!-- <button>$50</button>
        <button>$150</button>
        <button>$200</button>
        <button>$250</button> -->
      </select>
      </div>

      <form action="<?=base_path?>giftcard_checkout" method="post" enctype="multipart/form-data">
        @csrf
<input type="hidden" name="giftcard_id" value="<?=$g_id?>" id="giftcard_id">
<input type="hidden" name="giftcard_price_id" value="<?=$p_id?>" id="giftcard_price_id">


        <h3 class="account-container from-title title-s">FROM</h3>
   <!-- <h3 class="account-container to-title title-s">Let us know where to deliver your eGift Card.</h3>  -->
   <span class="to-description text-m pb-5">Let us know where to deliver your eGift Card.</span>
        <div class="row" style="padding-left:0px !important;">
<div class="col-sm-6 col-xs-12 fname pt-5">
<div class="form-row form-row-float  required form-row-text null" aria-required="true">
<label for="sender_fname"><span class="required-indicator"> </span><span>First Name</span></label>
<div class="field-wrapper text">
<input class="input-text  js-alphabet-only required ascii" type="text" id="sender_fname" name="sender_fname" value="" placeholder="First Name" maxlength="2147483647" data-cs-mask="" aria-required="true">
</div>
</div>
</div>
<div class="col-sm-6 col-xs-12 lname from-lname-column pt-5">
<div class="form-row form-row-float  required form-row-text null" aria-required="true">
<label for="sender_lname"><span class="required-indicator"> </span><span>Last Name</span></label>
<div class="field-wrapper text">
<input class="input-text  js-alphabet-only required ascii" type="text" id="sender_lname" name="sender_lname" value="" placeholder="Last Name" maxlength="2147483647" data-cs-mask="" aria-required="true">
</div>
</div>
</div>
</div>
<h3 class="account-container from-title title-s">To</h3>
<!-- <h3 class="account-container to-title title-s">Let us know where to deliver your eGift Card.</h3> -->
<span class="to-description text-m">Let us know where to deliver your eGift Card.</span>
      <!-- <span class="to-description text-m"></span> -->

      <div class="row" style="padding-left:0px !important;">
<div class="col-sm-6 col-xs-12 fname pt-5 ">
<div class="form-row form-row-float  required form-row-text null error" aria-required="true">
<label for="recipent_fname"><span class="required-indicator"> </span><span>First Name</span></label>
<div class="field-wrapper text">
<input class="input-text  js-alphabet-only required ascii error" type="text" id="recipent_fname" name="recipent_fname" value="" placeholder="First Name" maxlength="21474recipent_fname83647" data-cs-mask="" aria-required="true" aria-invalid="true" aria-describedby="recipent_fname-error"><span id="recipent_fname-error" class="error"></span>
</div>
</div>
</div>
<div class="col-sm-6 col-xs-12 lname to-lname-column pt-5">
<div class="form-row form-row-float  required form-row-text null" aria-required="true">
<label for="recipent_lname"><span class="required-indicator"> </span><span>Last Name</span></label>
<div class="field-wrapper text">
<input class="input-text  js-alphabet-only required ascii" type="text" id="recipent_lname" name="recipent_lname" value="" placeholder="Last Name" maxlength="2147483647" data-cs-mask="" aria-required="true">
</div>
</div>
</div>
</div>

<div class="row" style="padding-left:0px !important;">
<div class="col-sm-6 col-xs-12 fname pt-5">
<div class="form-row form-row-float  required form-row-text null error" aria-required="true">
<label for="friend_email"><span class="required-indicator"> </span><span>Email</span></label>
<div class="field-wrapper text">
<input class="input-text  js-alphabet-only required ascii error" type="text" id="friend_email" name="friend_email" value="" placeholder="Email" maxlength="2147483647" data-cs-mask="" aria-required="true" aria-invalid="true" aria-describedby="friend_email-error"><span id="friend_email-error" class="error"></span>
</div>
</div>
</div>
<div class="col-sm-6 col-xs-12 pt-5 lname to-lname-column">
<div class="form-row form-row-float  required form-row-text null" aria-required="true">
<label for="confirm_friend_email"><span class="required-indicator"> </span><span>Confirm Email</span></label>
<div class="field-wrapper text">
<input class="input-text  js-alphabet-only required ascii" type="text" id="confirm_friend_email" name="confirm_friend_email" value="" placeholder="Confirm Email" maxlength="2147483647" data-cs-mask="" aria-required="true">
</div>
</div>
</div>
</div>



        <!-- <div class="name_input">
          <input type="text" name="friend_email" placeholder="Friend's Email" required>
        <input type="text" name="confirm_friend_email" placeholder="Confirm Friend's Email" required>
        </div> -->

        <!-- <textarea class="mes_tex" name="message" placeholder="Message"></textarea>
        <P>You have 200 characters left out of 200</P>
        <p><strong>Please do not use a .edu email address for e-gift card recipient. E-gift cards will be sent within 24 hours directly to the recipient email provided in the order. Please allow 1 hour for the order confirmation email to be sent to the e-gift card purchaser.</strong></p> -->

        <div class="gift-message pt-5">
        <div class="form-row form-row-float  form-row-textarea null">

        <label for="message"><span>Message</span></label>


        <div class="field-wrapper textarea">
        <textarea class="input-textarea  ascii" id="message" name="message" rows="5" cols="50" data-character-limit="200" data-show-remaining-count-only="true" placeholder="" aria-invalid="false"></textarea><div class="char-count text-xxs"><span class="char-remain-count">200</span> characters left</div>
        </div>
        </div>
        </div>
        <button class="ad_gg" type="submit" style="background: #210113 !important;color:white;">Buy Now</button>
      </form>
        </div>
      </div>
    </div>
  </section>
</div>

  <!-- <script>
     var swiper2 = new Swiper('#swiper-container50', {
       slidesPerView: 4,
       spaceBetween: 30,
       slidesPerGroup: 0,
       loop: true,
       loopFillGroupWithBlank: true,
       pagination: {
         el: '.swiper-pagination',
         clickable: true,
       },
       navigation: {
         nextEl: '.swiper-button-next',
         prevEl: '.swiper-button-prev',
       },
     });
   </script> -->

   <!-- Initialize Swiper -->

   <script>
    $(function() {
    let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;

    if (isMobile) {
        //Conditional script here
      var swiper = new Swiper('.swiper-container', {
      slidesPerView: 1,
      spaceBetween: 10,
      slidesPerGroup:1,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });

    }
    else{

    var swiper = new Swiper('.swiper-container', {
      slidesPerView: 4,
      spaceBetween: 10,
      slidesPerGroup:1,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });



    }
 });
  </script>

  <script>
  function giftcard_chng() {
    // alert()
    var id = document.getElementById("gp_price").value;
    $('#giftcard_price_id').val(id);
  }
  function giftcard(id){
    // alert(id);
    $('#giftcard_id').val('');
    $('#giftcard_id').val(id);
  }


  </script>

@endsection
