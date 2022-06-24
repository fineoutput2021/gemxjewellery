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
// echo $sign; die();
?>
