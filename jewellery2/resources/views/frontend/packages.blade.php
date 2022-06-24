@extends('frontend.layout')
@section('main')

<style>
.pak_shd{
    box-shadow: 0 0 4px 0px #d2d2d2;
    padding: 30px;
    border-radius: 15px;
    background: #f7f2ee;
    height: 360px;
    width: auto;
}


.pak_shd p{
    font-size: 14px !important;
    text-align: center;
    letter-spacing: 1.2px;

    overflow: hidden;
   text-overflow: ellipsis;
   display: -webkit-box;
   line-height: 16px;     /* fallback */
   max-height: 64px;      /* fallback */
   -webkit-line-clamp: 4; /* number of lines to show */
   -webkit-box-orient: vertical;
    /* line-height: 25px; */

}




.pak_shd sub{
    font-size: 12px;
    color: grey;
}

.pak_shd h1{
  font-weight: bolder;
    font-size: 50px;
        font-family: auto;
}

.btn_buy{
  height: 44px;
  width: 50%;
  font-size: 15px;
  border: none;
  background: #1f0b00;
  color: #fff;
  outline: 0 !important;
  position: absolute;
  left: 25%;
  bottom: 30px;

}

h1.glob_text{
  font-size: 40px;
  font-weight: 600;
}


</style>

<div class="paddingfromtop">

<div class="container mt-5" >
  <div class="row">
    <div class="col-md-12 mb-5">
      <h1 class="text-center glob_text ">Packages</h1>

    </div>


<?php
$sign="$";
$currency_price= 1;

$cuncy_id = Session::get('currency_id');
$curr_v= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active',1)->where('id',$cuncy_id)->first();
if(!empty($curr_v)){
	$sign= $curr_v->sign;
	$currency_price= $curr_v->currency_price;
}else {
$sign="$";
$currency_price=1;
}

if(!empty($packages_data)){
  foreach ($packages_data as $packages) {

//     $current_date= date("Y-m-d");
//     $package_start_date= $packages->start_date;
//     $package_exp_date= $packages->end_date;
//
// if($current_date >= $package_start_date && $current_date <= $package_exp_date){

?>

    <div class="col-md-4 mb-5">
      <div class="pak_shd">
        <h4 class="text-center"><?=$packages->name;?></h4>

        <h1 class="text-center"><?=$sign;?><?php echo round($packages->buy_price * $currency_price, 2);?></h1>
        <p class="mb-5">
        <?=$packages->price."% off on every product."?>
        </p>
        <p class="mb-5 mt-4=5">
          <?=$packages->description;?>
        </p>
        <div class="text-center">
          <a href="<?=base_path;?>Buy_Package/<?=base64_encode($packages->id);?>">
            <button class="btn_buy">BUY NOW</button>
          </a>
        </div>
      </div>
    </div>

<?php  } } ?>



  </div>
</div>
</div>




@endsection
