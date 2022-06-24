@extends('frontend.layout')
@section('main')
<style type="text/css">



/*filter css start*/

.sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 100000;
  top: 0;
  left: 0;
  background-color:white;
  overflow-x: hidden;
  transition: 0.5s;
      box-shadow: 2px 4px 5px 0px #ffa4a8
}

.sidenav a {
  padding: 8px 8px 8px 32px;
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
  background-color: #ffa4a8;
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
  padding: 0 18px;
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
  border: none !important;
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
.card:hover .img_top {
  visibility: hidden;
  display: none;
}

.card:hover .img_btm {
  visibility: visible;
  display: block;
}

.img_btm {
  visibility: hidden;
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
  font-size: 15px;
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
  display: none;
}

.colorh1:hover .cardp {
  display: block;
}

.cardprice {
  font-size: 14px;
  line-height: 1.28571;
  font-weight: 600;
  letter-spacing: 1px;
  margin: 6px 0px;
}

@media (min-width: 312px) and (max-width: 900px) {
  .cardnew img {
    height: auto;
  }

  .card-body {
    padding: 0.5rem;
  }

  span .carder {
    margin-right: 0;
  }

  .carderspan {
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
}



.prod_btn{

  position: absolute;
    top: 51%;
    left: 15%;
    background: #fff;
    color: #000;
    border: none;
    width: 70%;
    box-shadow: 2px -1px 7px 0px #747474;
    outline: 0 !important;
    opacity: 0;
    visibility: hidden;
}

.card:hover .prod_btn{
	opacity: 1;
	visibility: visible;
  border:0 !important;
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
    height: 50px;
    z-index: 1;
    letter-spacing: 1px;
}
.btn-group-lg>.btn, .btn-lg {
    padding: 0.5rem 10rem;

    display: block;
    width: calc(100% - 90px);
    float: right!important;
    border-radius: 0;
    font-weight: 700;
    margin: 0;
    color: #fff!important;
    background-color: #ffa4a8;
    border: 1px solid #ffa4a8;
    padding: 0!important;
    font-size: 14px!important;
    line-height: 48px!important;
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

/* cross remove from wislist button css */
.discard{
	position: absolute;
    color: white;
    font-size: 30px;
    padding: 24px 35px;
    top: 0;
    right: 0;
    cursor: pointer;
    margin-right: -34px;
    margin-top: -31px;
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



<!-- filter start -->


<!-- filter end -->

<!-- main body start -->

<div class="paddingfromtop">
<section id="product" style="" >


	<div class="container-fluid jewcarder">
    <div class="row" style="padding-left: 35px;">
			<div class="col-lg-12 col-md-12 p-0">
        <div>
			<h1 style="font-family: 'Libre Baskerville', serif;margin-top: 30px;font-size: 36px;"  class="text-center">Wish List </h1>
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
   if(!empty($wishlistData)){
     foreach ($wishlistData as $wish_pro) {

$subcategory_pro= App\adminmodel\Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_mini_subcat_delete', 0)->where('id', $wish_pro->product_id)->first();

if(!empty($subcategory_pro)){

$pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->first();
// echo $pro_type_color; die();
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
  $color_code="";
}

    ?>
		<div class="col-md-3">
			<div class="card cardnew  mt-5">
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
<span class="discard" style="color: #000;margin-top:-2rem;" onclick="removeFromWishlist(<?=$subcategory_pro->id?>, <?=$wish_pro->id?>);">x</span>
    <div class="card-body">
      <a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id);?>">
        <h3 class="card-text"><?=$subcategory_pro->name;?></h3>
      </a>
      <span class="carderspan">
  <input type="hidden" value="<?=$color_id;?>" id="color_select_<?=$subcategory_pro->id;?>" name="color_select">

      	<div class="carder" style="background-color:<?=$color_code;?>;"></div>
      	<a href="#" class="cardp"><?=$color;?></a>
      </span>
      <p class="cardprice"><?=$sign;?> <?=$price;?></p>

      <?php if(empty(Session::get('user_data'))) {?>


 <button type="button" class="btn prod_btn" onclick="addToCartOfflineHandler(this)"
  data-category-id="<?= $subcategory_pro->category;?>"
  data-subcategory-id="<?= $subcategory_pro->sub_category_id;?>"
  data-product-id="<?= $subcategory_pro->id;?>"
  quantity="1"> MOVE TO BAG</button>


      <?php } else{?>


<button type="button" class="btn prod_btn" onclick="addToCartOnlineHandler2(this)"
data-category-id="<?= $subcategory_pro->category;?>"
data-subcategory-id="<?= $subcategory_pro->sub_category_id;?>"
data-product-id="<?= $subcategory_pro->id;?>"
user-id="<?= Session::get('user_id');?>"
 quantity="1"> MOVE TO BAG</button>

      <?php } ?>


    </div>
  </div>
		</div>
<?php } } } ?>


	</div>


  <!-- <div class="row mt-5 mb-4 ">
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
