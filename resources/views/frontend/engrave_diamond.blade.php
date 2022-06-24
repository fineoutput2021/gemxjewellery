@extends('frontend.layout')
@section('main')


<style type="text/css">

@media print{
*,:after,:before{background:0 0!important;color:#000!important;box-shadow:none!important;text-shadow:none!important;}
}
svg:not(:root){overflow:hidden;}
button,select{color:inherit;font:inherit;margin:0;}
button{overflow:visible;}
button,select{text-transform:none;}
button{-webkit-appearance:button;cursor:pointer;}
button::-moz-focus-inner{border:0;padding:0;}
@media print{
*,:after,:before{background:0 0!important;color:#000!important;box-shadow:none!important;text-shadow:none!important;}
}
*,:after,:before{box-sizing:border-box;}
ul{margin:0;padding:0;list-style-type:none;}
select{-webkit-appearance:none;-moz-appearance:none;font-weight:400;}
select::-ms-expand{display:none;}
/*! CSS Used from: https://code.fluidretail.net/configure-ui/stable/css/configure-app.css */
.fc-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
.fc-outline-target:focus{outline-width:0;}
.fc-icon-close{width:1em;height:1em;display:inline-block;position:relative;vertical-align:baseline;}
.fc-icon-close:after{content:" ";position:absolute;background-color:#333;top:.4375em;left:0;height:.125em;width:1em;-webkit-transform:rotate(-45deg);-moz-transform:rotate(-45deg);-ms-transform:rotate(-45deg);-o-transform:rotate(-45deg);transform:rotate(-45deg);}
.fc-icon-close:before{content:" ";position:absolute;background-color:#333;top:.4375em;left:0;height:.125em;width:1em;-webkit-transform:rotate(-135deg);-moz-transform:rotate(-135deg);-ms-transform:rotate(-135deg);-o-transform:rotate(-135deg);transform:rotate(-135deg);}
.fc-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
.fc-button-pair button{display:none;}
.fc-button-pair div.fc-button{outline-style:none;box-shadow:none;border-color:transparent;}
.fc-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
.fc-dropdown{padding:0.2em;}
.fc-quantity-title{display:inline-block;padding:0.4em;}
.fc-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
.fc-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
.fc-ripple-effect{display:none;position:absolute;top:100%;left:100%;width:0px;height:0px;line-height:0;-webkit-transform:translate(-50%, -50%);-moz-transform:translate(-50%, -50%);-ms-transform:translate(-50%, -50%);-o-transform:translate(-50%, -50%);transform:translate(-50%, -50%);background-color:#000;opacity:0;border-radius:50%;box-shadow:0 0 5px 5px #000;}
.fc-button{-webkit-tap-highlight-color:transparent;cursor:pointer;text-align:center;position:relative;overflow:hidden;}
.fc-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
.fc-button{-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;}
.fc-snapshots{display:inline-block;position:relative;}
.fc-snapshots div,.fc-snapshots span,.fc-snapshots button{box-sizing:border-box;}
.fc-snapshots.fc-snapshots-count-0 .fc-snapshots-list-badge-counter{visibility:hidden;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-take-wrapper{display:inline-block;vertical-align:middle;cursor:pointer;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-take-wrapper .fc-button-pair{display:none;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-take-wrapper .fc-snapshots-take-entry-icon{display:block;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-view-wrapper{display:inline-block;vertical-align:middle;margin:0 12px;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-view-wrapper .fc-button-pair{display:inline-block;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-view-wrapper .fc-snapshots-view-button{display:inline-block;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-view-wrapper .fc-snapshots-list-badge-counter{position:absolute;background-color:red;color:white;font-weight:bold;font-size:0.8em;border-radius:30px;box-shadow:1px 1px 1px gray;margin:-10px 0 0 3px;padding:2px 4px;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-view-wrapper .fc-snapshots-list-badge-counter{display:inline;}
/*! CSS Used from: https://cdn-prod.fluidconfigure.com/static/assets/prod/prod/customers/c1552/configureHtml/etc/assets/css/fluidConfigure-kendrascott.min.css */
.fc-share-panel [aria-label="Close"] button{font-size:30px;cursor:pointer;}
.fc-share-panel [aria-label="Close"] button::after,.fc-share-panel [aria-label="Close"] button::before{content:" ";position:absolute;background-color:#acacac;height:2px;width:1em;top:0.4375em;left:0;}
.fc-share-panel [aria-label="Close"] button::after{transform:rotate(-45deg);}
.fc-share-panel [aria-label="Close"] button::before{transform:rotate(-135deg);}
#fluidConfigure *,#fluidConfigure *::after,#fluidConfigure *::before{box-sizing:border-box;}
[class*="fc-"]{outline:none;}
*[class*="fc-"][class*="button"],.fc-dropdown,.fc-button{-webkit-tap-highlight-color:transparent;}
.fc-dropdown{-webkit-appearance:none;-moz-appearance:none;-o-appearance:none;appearance:none;border-radius:0;text-overflow:'';text-indent:0;background:#fff;cursor:pointer;color:#333333;border:1px solid #bbbbbb;font-family:"Lato", sans-serif;font-size:14px;height:auto;padding:1px 17px 2px 8px;background:#fff url(https://cdn-prod.fluidconfigure.com/static/assets/prod/prod/customers/c1552/configureHtml/etc/assets/img/icons/dropdown-arrow.svg) calc(100% - 8px) 40%/7px no-repeat border-box;}
.fc-dropdown::-ms-expand{display:none;}
.fc-dropdown:focus{outline:none;outline:0px solid transparent;}
.fc-menu-stone #fc-left-arrow+.fc-attribute-selector-swatch{display:none;}
.fc-information-container .fc-button-label>span,.fc-share-container .fc-button-label>span,.fc-start-over-container .fc-button-label>span{display:block;position:relative;padding-left:29px;height:32px;line-height:32px;}
.fc-information-container .fc-button-label>span::before,.fc-share-container .fc-button-label>span::before,.fc-start-over-container .fc-button-label>span::before{content:"";display:inline-block;height:28px;width:28px;position:absolute;top:50%;transform:translateY(-50%);left:0;}
.fc-actions-bar-container{z-index:150;display:flex;align-items:center;background-color:#fff;position:fixed;bottom:0;left:0;padding-left:15px;max-height:46px;width:100%;border-top:1px solid #bbbbbb;border-bottom:1px solid #bbbbbb;}
.fc-actions-bar-container .fc-action-button{cursor:pointer;color:#6c6c6c;font-size:16px;line-height:1.2;text-transform:uppercase;margin-right:26px;}
.fc-actions-bar-container .fc-action-button .fc-button{overflow:visible;}
.fc-actions-bar-container .fc-action-button .fc-button-label{display:block;}
.fc-actions-bar-container .fc-cart-price{font-size:16px;font-family:"Lato", sans-serif;color:#333333;}
.fc-actions-bar-container .fc-dropdown{min-width:42px;}
.fc-actions-bar-container .fc-cart-price,.fc-actions-bar-container .fc-qty-ring-container{margin-right:19px;}
.fc-actions-bar-container .fc-quantity-title{font-size:16px;color:#333333;padding:0;margin-right:10px;}
.fc-actions-bar-container .fc-quantity-title,.fc-actions-bar-container .fc-dropdown-container,.fc-actions-bar-container .fc-ring-size-container,.fc-actions-bar-container .fc-qty-container{display:inline-block;vertical-align:middle;}
.fc-actions-bar-container .fc-information-container{display:none;}
@media screen and (min-width: 1024px){
.fc-actions-bar-container{order:5;position:initial;}
}
.fc-information-container.fc-action-button{margin-right:23px;}
.fc-information-container .fc-button-label>span::before{background:transparent url(https://cdn-prod.fluidconfigure.com/static/assets/prod/prod/customers/c1552/configureHtml/etc/assets/img/icons/info.svg) left center/28px no-repeat border-box;}
.fc-share-container .fc-button-label>span::before{background:transparent url(https://cdn-prod.fluidconfigure.com/static/assets/prod/prod/customers/c1552/configureHtml/etc/assets/img/icons/share.svg) left center/19px no-repeat border-box;}
.fc-favorite-container{display:none;}
.fc-snapshots .fc-snapshots-controls .fc-snapshots-take-wrapper .fc-snapshots-take-entry-icon svg,.fc-snapshots .fc-snapshots-controls .fc-snapshots-view-wrapper .fc-snapshots-list-badge-counter{display:none;}
.fc-snapshots-container{background-color:transparent!important;}
.fc-snapshots-container .fc-snapshots-view-wrapper{display:none!important;}
.fc-snapshots-container .fc-snapshots-take-wrapper{*zoom:1;}
.fc-snapshots-container .fc-snapshots-take-wrapper::before,.fc-snapshots-container .fc-snapshots-take-wrapper::after{content:" ";display:table;}
.fc-snapshots-container .fc-snapshots-take-wrapper::after{clear:both;}
.fc-snapshots-container .fc-button-pair,.fc-snapshots-container .fc-snapshots-take-wrapper,.fc-snapshots-container .fc-snapshots-take-entry-icon{display:inline-block!important;vertical-align:middle;}
.fc-snapshots-container .fc-snapshots-take-entry-icon{float:left;background:transparent url(https://cdn-prod.fluidconfigure.com/static/assets/prod/prod/customers/c1552/configureHtml/etc/assets/img/icons/save.svg) left center/28px no-repeat border-box;width:40px;height:30px;}
.fc-snapshots-container .fc-button-pair{padding-top:5px;float:right;}
.fc-start-over-container.fc-action-button{margin-right:auto;}
.fc-start-over-container .fc-button-label>span{padding-left:40px;}
.fc-start-over-container .fc-button-label>span::before{background:transparent url(https://cdn-prod.fluidconfigure.com/static/assets/prod/prod/customers/c1552/configureHtml/etc/assets/img/icons/start-over.png) left center/30px no-repeat border-box;height:30px;width:30px;}
.fc-cart-container{width:212px;}
.fc-cart-container .fc-button{color:#333333;font-family:"Lato", sans-serif;font-size:16px;letter-spacing:0.08em;text-transform:uppercase;padding:0.688em 5px;position:relative;overflow:visible;background-color:#f1e02b;}
.fc-icon-close{font-size:30px;}
.fc-icon-close::after,.fc-icon-close::before{height:2px;background-color:#acacac;}
.fc-custom-share{position:relative;}
.fc-custom-share .fc-share-panel .fc-share-disabled{display:none;}
.fc-share-panel{min-height:280px;position:absolute;bottom:55px;left:0;right:auto;z-index:10;transform:translateY(10%);opacity:0;visibility:hidden;background-color:#fff;border:2px solid #b8b8b8;border-radius:0;width:205px;transition:transform 0.25s cubic-bezier(0, 0, 0.2, 1),opacity 0.25s cubic-bezier(0, 0, 0.2, 1),visibility 0.25s cubic-bezier(0, 0, 0.2, 1);will-change:transform, opacity, visibility;}
.fc-share-panel::after,.fc-share-panel::before{position:absolute;bottom:-30px;left:34px;border:solid transparent;content:'';height:0;width:0;pointer-events:none;}
.fc-share-panel::after{border:15px solid transparent;border-top-color:#fff;}
.fc-share-panel::before{border:16px solid transparent;border-top-color:#b8b8b8;bottom:-34px;margin-left:-1px;}
.fc-share-panel [aria-label="Close"]{position:absolute;right:0;top:0;z-index:5;display:none;}
@media screen and (max-width: 768px){
.fc-share-panel [aria-label="Close"]{display:block;}
}
.fc-share-panel [aria-label="Close"] button{-webkit-appearance:none;-moz-appearance:none;-o-appearance:none;appearance:none;border-radius:0;border:none;background-color:transparent;height:70px;width:60px;text-indent:-999px;overflow:hidden;}
.fc-share-panel [aria-label="Close"] button:focus{outline:none;}
.fc-share-panel [aria-label="Close"] button::after,.fc-share-panel [aria-label="Close"] button::before{background-color:#6c6c6c;top:32px;left:14px;}
.fc-share-panel ul{list-style:none;padding:0;margin:0;}
.fc-share-panel li{cursor:pointer;font-size:16px;letter-spacing:0.13em;text-transform:uppercase;line-height:20px;padding:1.54em 10px 1.54em 70px;position:relative;text-align:left;color:#333333;}
.fc-share-panel li::before{background:transparent url(https://cdn-prod.fluidconfigure.com/static/assets/prod/prod/customers/c1552/configureHtml/etc/assets/img/icons/share-icons.png) center center/30px no-repeat border-box;position:absolute;top:50%;transform:translateY(-50%);left:22px;content:'';height:30px;width:30px;}
.fc-share-panel li:not(:last-child){border-bottom:1px solid #e4e4e4;}
.fc-share-panel .fc-share-email::before{background-position:0 -33px;height:25px;}
.fc-share-panel .fc-share-facebook::before{background-position:0 -60px;}
.fc-share-panel .fc-share-twitter::before{background-position:0 -90px;}
.fc-share-panel .fc-share-pinterest::before{background-position:0 -121px;}
@media screen and (max-width: 768px){
.fc-share-panel{z-index:99;left:0;bottom:45px;border-width:2px 0 0 0;border-bottom:1px solid #bbbbbb;width:100%;}
.fc-share-panel::after,.fc-share-panel::before{display:none;}
.fc-share-panel li{padding-left:165px;}
.fc-share-panel li::before{left:92px;}
}












</style>



<div class="paddingfromtop">
<section>
	<div class="container-fluid p-0">



		<div class="row w-100">
			<div class="col-lg-4 col-xl-4 col-md-4" style="padding: 55px;">
				<h3 class="text-center">METAL</h3>
				<div class="row p-0">

	<?php
	if($customize_product_stones){
		foreach ($customize_product_stones->unique('cust_metal_id') as $stone_metal) {

	$metal_da= App\adminmodel\CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $stone_metal->cust_metal_id)->first();
	if(!empty($metal_da)){
		$metal_name= $metal_da->name;
		$metal_image= $metal_da->image;
	}else {
		$metal_name= "";
		$metal_image= "";
	}
				?>
						<div class="col-lg-6 col-xl-6 col-md-6 m-auto">
							<div  onclick="changeImagegold()" class="gold active" style="background:url(<?=base_path.$metal_image;?>);background-size:100% 100px; width: 100%;height: 100px;" ></div>
							<p class="text-center"><?=$metal_name?></p>
						</div>

	<?php
	} }
	?>
				</div>

			</div>



			<div class="col-lg-4 col-xl-4 col-md-4" style="padding: 55px;">
<?php
$customize_product_stone_single = App\adminmodel\CustomizeProductStone::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $product_id)->first();
if(!empty($customize_product_stone_single)){
	$metal_pro_img= $customize_product_stone_single->metal_product_image;
	$metal_pro_name= $customize_product_stone_single->name;
	$cust_pro_price= $customize_product_stone_single->price;
}else {
	$metal_pro_img= "";
	$metal_pro_name= "";
	$cust_pro_price= 0;
}




?>
				<img id="myImage" src="<?=base_path.$metal_pro_img;?>" style="width: 100%;">
				<p style="text-align:center;"><?=$metal_pro_name;?></p>

			</div>

<script>

function changeImagegold() {
  var image = document.getElementById('myImage');

  			status= 1;
  		  image.src = "jewimg/empty.jpg";

}
</script>

<script>
function changeImagepink() {
  var image = document.getElementById('myImage');
  	status= 2;
    image.src = "jewimg/pink.jpg";

}
</script>

<script>
function changeImagegrey() {
  var image = document.getElementById('myImage');
  status= 3;
    image.src = "jewimg/platinum.jpg";

}
</script>

<script>
function changeImagegoldred() {
  var image = document.getElementById('myImage');
  if (status== 1) {
    image.src = "jewimg/red.jpg";
  } else if (status== 2) {
    image.src = "jewimg/rosered.jpg";
  }
  else if (status== 3) {
    image.src = "jewimg/greyred.jpg";
  }
}
</script>

<script>
function changeImageblue()  {
  var image = document.getElementById('myImage');
  if (status== 1) {
    image.src = "jewimg/blue.jpg";
  } else if (status== 2) {
    image.src = "jewimg/roseblue.jpg";
  }
  else if (status== 3) {
    image.src = "jewimg/greyblue.jpg";
  }
}
</script>

<!-- <script>
function changeImageblue() {
  var image = document.getElementById('myImage');
  if (image.src.match("bulbon")) {
    image.src = "file:///C:/Users/pro/Desktop/jew%20img/blue.jpg";
  } else {
    image.src = "file:///C:/Users/pro/Desktop/jew%20img/blue.jpg";
  }
}
</script> -->
	<div class="col-lg-4 col-xl-4 col-md-4" style="padding: 55px;">
		<h3 class="text-center">STONE #1</h3>
			<p class="text-center">Choose your stone</p>
        <div class="scroll" style="height:310px; overflow-x: hidden; overflow-y: auto; text-align:justify; ">

	<?php
	$i=0;
		if($customize_product_stones){
				foreach ($customize_product_stones as $stone_metal) {
	?>

	<?php if($i==0) {?>
			<div class="row" style="    padding: 20px;">
	<?php } ?>


       			<div class="col-lg-2 col-md-2">
       				<div  onclick="changeImagegoldred()" class="red" style="background:url(<?=base_path.$stone_metal->stone_image;?>);background-size:100% 100px;width: 40px;height: 40px;border-radius: 50%;"></div>
       			</div>


	<?php if($i==3) {?>
	     </div>

	   <?php } ?>

	<?php
	if($i==3){ $i=0; }else{ $i++; } 	} }
	?>

        </div>
	</div>




</div>
</div>
</section>

<!-- buy now button start -->
<!-- <div class="fc-actions-bar-container" style="position: sticky; bottom: 0;"> <div class="fc-action-button fc-information-container"><div class="fc-button-pair fc-outline-target" aria-disabled="false" role="button" tabindex="0">  <button class="fc-default-button">Information</button>  <div class="fc-button fc-fancy-button ">    <div class="fc-ripple-effect">  </div>  <span class="fc-button-label">    <span></span>  </span>  </div></div></div> <div class="fc-action-button fc-share-container"><div class="fc-custom-share  " data-reactid=".0"><div class="fc-share-panel" data-reactid=".0.0"><div aria-label="Close" class="fc-button-pair fc-outline-target" aria-disabled="false" role="button" tabindex="0" data-reactid=".0.0.0"><button class="fc-default-button" data-reactid=".0.0.0.0">Close</button><div class="fc-button fc-fancy-button fc-share-list-close-icon" data-reactid=".0.0.0.1"><div class="fc-ripple-effect" data-reactid=".0.0.0.1.0"></div><span class="fc-button-label" data-reactid=".0.0.0.1.1"><span class="fc-icon-close" data-reactid=".0.0.0.1.1.0"></span></span></div></div><ul data-reactid=".0.0.1"><li class="fc-share-email" data-reactid=".0.0.1.$0">email</li><li class="fc-share-facebook" data-reactid=".0.0.1.$1">facebook</li><li class="fc-share-twitter" data-reactid=".0.0.1.$2">twitter</li><li class="fc-share-pinterest" data-reactid=".0.0.1.$3">pinterest</li><li class="fc-share-disabled" data-reactid=".0.0.1.$4">Sharing is unavailable when a photo has been uploaded</li></ul></div><div class="fc-button-pair" data-reactid=".0.1"><button class="fc-default-button" data-reactid=".0.1.0">Share</button><div class="fc-button fc-fancy-button" data-reactid=".0.1.1"><div class="fc-ripple-effect" data-reactid=".0.1.1.0"></div><span class="fc-button-label" data-reactid=".0.1.1.1"><span data-reactid=".0.1.1.1.0">Share</span></span></div></div></div></div> <div class="fc-action-button fc-favorite-container"></div> <div class="fc-action-button fc-snapshots-container"><div data-reactroot="" data-count="0" class="fc-snapshots fc-snapshots-count-0 fc-snapshots-list-closed"><div class="fc-snapshots-controls"><div class="fc-snapshots-take-wrapper"><div aria-label="Save" class="fc-button-pair fc-outline-target" role="button" tabindex="0"><button class="fc-default-button">Save</button><div class="fc-button fc-fancy-button fc-snapshots-take-button"><div class="fc-ripple-effect"></div><span class="fc-button-label">Save</span></div></div><span class="fc-snapshots-take-entry-icon" tabindex="0" role="button" aria-label="Save"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="#000000" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg></span></div><div class="fc-snapshots-view-wrapper"><div class="fc-button-pair fc-outline-target" role="button" tabindex="0"><button class="fc-default-button">Design Snapshot</button><div class="fc-button fc-fancy-button fc-snapshots-view-button fc-outline-target"><div class="fc-ripple-effect"></div><span class="fc-button-label">Design Snapshot</span></div></div><span class="fc-snapshots-list-badge-counter">0</span></div></div></div></div> <div class="fc-action-button fc-start-over-container"><div data-reactroot="" class="fc-button-pair" role="button"><button class="fc-default-button">Clear Design</button><div class="fc-button fc-fancy-button fc-reset-recipe-button"><div class="fc-ripple-effect"></div><span class="fc-button-label"><span>Clear Design</span></span></div></div></div> <div class="fc-qty-ring-container"> <div class="fc-ring-size-container"></div> <div class="fc-qty-container"><div data-reactroot="" class="fc-quantity-selector"><div class="fc-quantity-title" id="fc-quantity-selector4" aria-label="Qty">Qty</div><div class="fc-dropdown-container"><select class="fc-quantity-list fc-dropdown fc-outline-target" tabindex="0" aria-describedby="fc-quantity-selector4"><option value="1">1</option><option value="2">2</option><option value="3">3</option><option value="4">4</option><option value="5">5</option><option value="6">6</option><option value="7">7</option><option value="8">8</option><option value="9">9</option><option value="10">10</option></select></div></div></div> </div> <div class="fc-cart-price"><div key="price" class="fc-price bfx-price" aria-live="polite" data-price="68">$68.00</div></div> <div class="fc-cart-container"><div data-reactroot="" aria-label="Add To Bag" class="fc-button-pair fc-outline-target" role="button" tabindex="0"><button class="fc-default-button">Add To Bag</button><div class="fc-button fc-fancy-button fc-add-to-cart-button fc-outline-target"><div class="fc-ripple-effect"></div><span class="fc-button-label"><!-- react-text: 6 -->Add To Bag<!-- /react-text --></span></div></div></div> </div> -->


<div class="fc-actions-bar-container" style="position: sticky; bottom: 0;">
	<div class="fc-action-button fc-information-container">
		<div class="fc-button-pair fc-outline-target" aria-disabled="false" role="button" tabindex="0">
			<button class="fc-default-button">Information</button>
			<div class="fc-button fc-fancy-button ">
				<div class="fc-ripple-effect"> </div> <span class="fc-button-label">    <span></span> </span>
			</div>
		</div>
	</div>
	<div class="fc-action-button fc-share-container">
		<div class="fc-custom-share  " data-reactid=".0">
			<div class="fc-share-panel" data-reactid=".0.0">
				<div aria-label="Close" class="fc-button-pair fc-outline-target" aria-disabled="false" role="button" tabindex="0" data-reactid=".0.0.0">
					<button class="fc-default-button" data-reactid=".0.0.0.0">Close</button>
					<div class="fc-button fc-fancy-button fc-share-list-close-icon" data-reactid=".0.0.0.1">
						<div class="fc-ripple-effect" data-reactid=".0.0.0.1.0"></div><span class="fc-button-label" data-reactid=".0.0.0.1.1"><span class="fc-icon-close" data-reactid=".0.0.0.1.1.0"></span></span>
					</div>
				</div>
				<ul data-reactid=".0.0.1">
					<li class="fc-share-email" data-reactid=".0.0.1.$0">email</li>
					<li class="fc-share-facebook" data-reactid=".0.0.1.$1">facebook</li>
					<li class="fc-share-twitter" data-reactid=".0.0.1.$2">twitter</li>
					<li class="fc-share-pinterest" data-reactid=".0.0.1.$3">pinterest</li>
					<li class="fc-share-disabled" data-reactid=".0.0.1.$4">Sharing is unavailable when a photo has been uploaded</li>
				</ul>
			</div>
			<div class="fc-button-pair" data-reactid=".0.1">
				<button class="fc-default-button" data-reactid=".0.1.0">Share</button>
				<div class="fc-button fc-fancy-button" data-reactid=".0.1.1">
					<div class="fc-ripple-effect" data-reactid=".0.1.1.0"></div><span class="fc-button-label" data-reactid=".0.1.1.1"><span data-reactid=".0.1.1.1.0">Share</span></span>
				</div>
			</div>
		</div>
	</div>
	<div class="fc-action-button fc-favorite-container"></div>
	<div class="fc-action-button fc-snapshots-container">
		<div data-reactroot="" data-count="0" class="fc-snapshots fc-snapshots-count-0 fc-snapshots-list-closed">
			<div class="fc-snapshots-controls">
				<div class="fc-snapshots-take-wrapper">
					<div aria-label="Save" class="fc-button-pair fc-outline-target" role="button" tabindex="0">
						<button class="fc-default-button">Save</button>
						<div class="fc-button fc-fancy-button fc-snapshots-take-button">
							<div class="fc-ripple-effect"></div><span class="fc-button-label">Save</span></div>
					</div><span class="fc-snapshots-take-entry-icon" tabindex="0" role="button" aria-label="Save"><svg viewBox="0 0 24 24" width="24" height="24"><path fill="#000000" d="M4,4H7L9,2H15L17,4H20A2,2 0 0,1 22,6V18A2,2 0 0,1 20,20H4A2,2 0 0,1 2,18V6A2,2 0 0,1 4,4M12,7A5,5 0 0,0 7,12A5,5 0 0,0 12,17A5,5 0 0,0 17,12A5,5 0 0,0 12,7M12,9A3,3 0 0,1 15,12A3,3 0 0,1 12,15A3,3 0 0,1 9,12A3,3 0 0,1 12,9Z"></path></svg></span></div>
				<div class="fc-snapshots-view-wrapper">
					<div class="fc-button-pair fc-outline-target" role="button" tabindex="0">
						<button class="fc-default-button">Design Snapshot</button>
						<div class="fc-button fc-fancy-button fc-snapshots-view-button fc-outline-target">
							<div class="fc-ripple-effect"></div><span class="fc-button-label">Design Snapshot</span></div>
					</div><span class="fc-snapshots-list-badge-counter">0</span></div>
			</div>
		</div>
	</div>
	<div class="fc-action-button fc-start-over-container">
		<div data-reactroot="" class="fc-button-pair" role="button">
			<button class="fc-default-button">Clear Design</button>
			<div class="fc-button fc-fancy-button fc-reset-recipe-button">
				<div class="fc-ripple-effect"></div><span class="fc-button-label"><span>Clear Design</span></span>
			</div>
		</div>
	</div>
	<div class="fc-qty-ring-container">
		<div class="fc-ring-size-container"></div>
		<div class="fc-qty-container">
			<div data-reactroot="" class="fc-quantity-selector">
				<div class="fc-quantity-title" id="fc-quantity-selector4" aria-label="Qty">Qty</div>
				<div class="fc-dropdown-container">
					<select class="fc-quantity-list fc-dropdown fc-outline-target" tabindex="0" aria-describedby="fc-quantity-selector4">
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
						<option value="10">10</option>
					</select>
				</div>
			</div>
		</div>
	</div>
	<div class="fc-cart-price">
		<div key="price" class="fc-price bfx-price" aria-live="polite" data-price="<?=$cust_pro_price;?>">$<?=$cust_pro_price?></div>
	</div>
	<div class="fc-cart-container">
		<div data-reactroot="" aria-label="Add To Bag" class="fc-button-pair fc-outline-target" role="button" tabindex="0">
			<button class="fc-default-button">Add To Bag</button>
			<div class="fc-button fc-fancy-button fc-add-to-cart-button fc-outline-target">
				<div class="fc-ripple-effect"></div><span class="fc-button-label"><!-- react-text: 6 -->Add To Bag<!-- /react-text --></span></div>
		</div>
	</div>
</div>
</div>
<!-- buy noe button end -->










<!-- min body end -->


@endsection
