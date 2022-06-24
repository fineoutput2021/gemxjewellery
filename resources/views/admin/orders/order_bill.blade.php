<!DOCTYPE html>
<html>
<html lang="en">
<input type="hidden" value="<?php if(!empty($order1_data)){ echo $order1_data->total_amount; }?>" id="tot_amnt">
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<!-- Css file include -->
<link rel="stylesheet" type="text/css" href="css/style.css">
	<title>Gemx Jewellery Bill</title>
</head>
<body style="padding-top:75px;">
<div class="container main_container">
	<div class="row">
		<div class="col-sm-6 oswal_logo">
		<img src="https://www.fineoutput.co.in/jewellery2/public/frontend/assets/img/jewl/logo2.png" class="img-fluid" style="width:250px;">
		</div>
		<div class="col-sm-6 content_part">Tax Invoice/Bill of Supply/Cash Memo
			<p>(Original for Recipient)</p>
		</div>
	</div><br>

<div class="container">
	<div class="row">
		<div class="col-sm-6">Sold By<br>
<span class="seller_details">Gemx Jewellery<br>
 Pretty in Gems Jewellery Pvt. Ltd. 302, Dhantak Plaza, Ajmer Road, Jaipur-59 Rajasthan, India
<br>
			<!-- 1-844-527-4367<br> -->
		www.gemxjewellery.com<br></span>
		</div>

		<div class="col-sm-6 billing_content">Billing Address:<br>
      <!-- code here -->
<?php

$usr_dat= App\frontendmodel\User::wherenull('deleted_at')->where('id',$order1_data->user_id)->first();

if(!empty($usr_dat)){
  $user_name= $usr_dat->name;
  $user_email= $usr_dat->email;
  $user_contact= $usr_dat->contact;

  if(!empty($usr_dat->country_code)){
    $user_countrycode= $usr_dat->country_code;
  }else {
    $user_countrycode= "";
  }

  if(!empty($usr_dat->country)){
    $user_country= $usr_dat->country;
  }else {
    $user_country= "";
  }


}else{
  $user_name="";
  $user_email="";
  $user_countrycode="";
  $user_contact="";
  $user_country="";
}
?>


User: <?=$user_name;?>
<br>Email: <?=$user_email;?>
<br>Contact: <?=$user_countrycode." ".$user_contact;?><br>

      <br>Address:
      <?php
  if(!empty($order1_data)){

$address= App\frontendmodel\Address::wherenull('deleted_at')->where('id',$order1_data->address_id)->first();
if(!empty($address)){
     echo $addres= $address->address;
     $location_addres= $address->location_address;
     $doorflat= $address->doorflat;
     $landmark= $address->landmark;
    // $state=$address->state;
    // $city=$address->city;
    $zipcode=$address->zipcode;
    $countr=$address->country;

}else{

  echo $addres= "no address";
  $location_addres= "";
  $doorflat= "";
  $landmark= "";
 // $state="";
 // $city="";
 $zipcode="";
 $countr="";
}


  }
      ?>
    <!-- <br>State/UT Code : RJ14 -->
    <br>
    Country: <?php echo $countr;?><br>
    Zipcode: <?php echo $zipcode;?><br>
		</div>
	</div>

<br><div class="row" style="margin-left: 0px;">PAN NO:  <br>
GST REGISTRATION NO :  <br>
</div>
<div class="row">
	<div class="col-sm-6"></div>
<div class="col-sm-6 shipping_content">	Shipping Address:<br>

Address: <?php
// if(empty($location_addres)){
//   echo $addres;
// }else{
//   echo $doorflat.", ".$landmark.", ".$location_addres;
// }

if(!empty($addres)){
  echo $addres;
}else{
  echo "no address";
}
?> <br>

<!-- State/UT Code : RJ14<br> -->
Country: <?php echo $countr;?><br>
Zipcode: <?php echo $zipcode;?><br>
</div>
</div>
<div class="row">
	<div class="col-sm-6">Order No: &nbsp; <?php if(!empty($order1_data)){ echo $order1_data->id; }?><br>
<p> Order Date:  &nbsp;
   <?php if(!empty($order1_data)){
  $source = $order1_data->created_at;
     $date = new DateTime($source);
     echo $date->format('F j, Y, g:i a');
  }?>
	</div><br> <br>



	<div class="col-sm-6 invoice_content">
<br>

	</div>

</div>
</div>





<div class="container">

  <table class="table table-black">
    <thead class="product_table">

      <tr>
        <th>SNo.</th>
        <th>Product</th>
        <th>SKU Code</th>
        <th>Variant</th>
        <th>Color</th>
        <th>Unit Price</th>
        <th>Qty</th>
        <th>Net Amount</th>
        <!-- <th>Tax Rate</th>
        <th>Tax Type</th>
        <th>Tax Amount</th> -->
        <th>Total Amount</th>
      </tr>
    </thead>
    <tbody>
  <?php
  $total_weight = 0;
  $total_gst_percentt = 0;
  $total_gst_pricee = 0;
if(!empty($order2_data)){
  $i=1; foreach($order2_data as $data) { ?>
      <tr class="product_table2">
       <td><?php echo $i;?></td>
        <td><?php
// echo $data->product_id;
// exit;
if($data->status == 0){
$product_data= App\adminmodel\Product::wherenull('deleted_at')->where('id',$data->product_id)->first();
}elseif ($data->status == 1) {
$product_data= App\adminmodel\CustomizeProduct::wherenull('deleted_at')->where('id',$data->product_id)->first();
}elseif ($data->status == 2) {
$product_data= App\adminmodel\EngraveProduct::wherenull('deleted_at')->where('id',$data->product_id)->first();
}
// print_r($product_data);
// exit;
if(!empty($product_data)){
  $sku_code= $product_data->sku_id;
echo $product_name= $product_data->name;
}else{
  $sku_code= "-";
}

        ?></td>

        <td><?=$sku_code;?></td>

        <td> <?php
        $variant_data= App\adminmodel\Size::wherenull('deleted_at')->where('id',$data->variant_id)->first();

        if(!empty($variant_data)){

        echo  $variant_data->name;
        }else{
        echo  "-";
        }

        ?></td>

        <td> <?php
        $color_data= App\adminmodel\Color::wherenull('deleted_at')->where('id',$data->color_id)->first();

        if(!empty($color_data)){

        echo  $color_data->name;
        }else{
        echo  "-";
        }

        ?></td>


<?php

//get product price
  $pro_prices= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('product_id',$data->product_id)->where('color_id',$data->color_id)->first();

	if(!empty($pro_prices)){
	$pro_price= $pro_prices->price;
	}else{
		$pro_price= 0;
	}

$net_unit_price=$pro_price * $data->quantity ;
?>

        <td ><?php echo "$".$pro_price;?></td>
        <td ><?php echo $data->quantity;?></td>
        <td ><?php echo "$".$net_unit_price;?></td>
        <!-- <td>9%</td>
        <td>CGST</td>
        <td>200</td> -->

        <td><?php echo "$".$data->amount;?></td>
      </tr>
  <?php $i++;} }?>



      <tr>
        <?php $product_total= App\frontendmodel\Order2::wherenull('deleted_at')->where('main_id',$order1_data->id)->sum('amount'); ?>
        <th>Total</th>
        <th class="product_table" colspan="2"><?php if(!empty($order1_data)){ echo ""; }?></th>
        <th class="product_table"></th>
        <th class="product_table" colspan="1"><?php if(!empty($order1_data)){ echo ""; }?></th>
        <th class="product_table"></th>
        <th class="product_table" colspan="1"><?php if(!empty($order1_data)){ echo ""; }?></th>
        <th class="product_table"></th>
        <th class="product_table"><?php if(!empty($product_total)){ echo "$".$product_total; }else{ echo "$0"; }?></th>
      </tr>

      <tr>
        <th colspan="7">Delivery Charge</th>
        <th class="product_table"><?php if(!empty($order1_data)){ echo " "; }?></th>
        <th class="product_table"><?php if(!empty($order1_data->delivery_charge)){ echo "$".$order1_data->delivery_charge; }else{ echo "$0"; }?></th>

      </tr>

      <?php if(!empty($order1_data->promocode) ){

        $promo_da= App\adminmodel\Promocode::wherenull('deleted_at')->where('promocode',$order1_data->promocode)->first();

        if(!empty($promo_da)){
          $peomocode_id= $promo_da->id;
          $promocode_name= $promo_da->promocode;
        }else{
          $peomocode_id="";
          $promocode_name="";
        }
        ?>
        <tr>
          <th colspan="7">Promocode:<?=$promocode_name;?> </th>
          <th class="product_table"><?php if(!empty($order1_data)){ echo " "; }?></th>
          <th class="product_table"><?php if(!empty($order1_data->promocode)){

  $promo_da= App\adminmodel\Promocode::wherenull('deleted_at')->where('promocode',$order1_data->promocode)->first();

          if(!empty($promo_da)){
            $db_promocode_offer_type = $promo_da->offer_type;
            $db_promocode_percent = $promo_da->percent;
            $db_promocode_maximum_gift_amount = $promo_da->maximum_gift_amount;
            // $f_amount= $order1_data->total_amount + $order1_data->order_shipping_amount;
            $f_amount= $order1_data->total_amount ;

if($db_promocode_offer_type == 1){
            $promocodes_discount= $f_amount * $db_promocode_percent/100;
            $promo_discount= round($promocodes_discount);

            if($promo_discount > $db_promocode_maximum_gift_amount){
              $promo_discount = $db_promocode_maximum_gift_amount;
            }
}else {
  $promo_discount= 0;
}

          }else{
            $promo_discount= 0;
            $db_promocode_offer_type= "";
          }

          if($db_promocode_offer_type == 1){
            echo "- $".$promo_discount; }else{ echo "-$0"; }
          }elseif ($db_promocode_offer_type == 2) {
            echo "Free Delivery";
          }elseif ($db_promocode_offer_type == 3) {
            echo "GiftCard Applied";
          }else {
            echo "-";
          }
            ?></th>

        </tr>
      <?php }?>

      <!-- <tr>
        <th colspan="9">Discount</th>
        <th class="product_table"><?php if(!empty($order1_data)){ echo " "; }?></th>
        <th class="product_table"><?php if(!empty($order1_data)){ echo "- $".$order1_data->discount; }?></th>

      </tr> -->

      <tr>
        <th colspan="7">SubTotal</th>
        <th class="product_table"><?php if(!empty($order1_data)){ echo " "; }?></th>
        <th class="product_table"><?php if(!empty($order1_data)){ echo "$".$order1_data->total_amount; }?></th>

      </tr>



    </tbody>
    </table>

      <h6 class="amount_content" >Amount in Words:<br>
      <span id="checks123" style="text-transform: capitalize;font-style: revert;"></span></h6><br>




      <h4 class="oswal_head">Gemx jewellery:<br><br>

      Authorized Signatory </h4>

      </tr>

</div>


<h5 class="warning" style="margin-left: 15px;">Whether tax is payable under reverse charge-No</h5>


</div>
</body>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<!-- <script>
 //alert('Changed!')

       $('#gst_percentage').keyup(function() {
       // alert("Key up detected");

       var total_price = $("#mrp").val();
       //var gst_percentage = $("#gst_percentage").val();$(this).val
       var gst_percentage = $(this).val();
       var gst_price = (total_price*gst_percentage)/100;
       var total_gst_price = parseInt(total_price) + parseInt(gst_price);
       //alert(total_gst_price);
       $('#gst_percentage_price').val(gst_price);
       $('#selling_price').val(total_gst_price);

     });

 </script> -->

<script>

window.onload = function() {

  // var unit_mrp = $(".unit_mrp").text();
  // var unit_qty = $(".qty").text();
  // //var gst_percentage = $("#gst_percentage").val();$(this).val
  //
  // var total_unit_mrp = parseInt(unit_mrp) * parseInt(unit_qty);
  // //alert(total_gst_price);
  // $('.net_unit_mrp').text(total_unit_mrp);

  var total_amount= document.getElementById("tot_amnt").value;
  //alert(total_amount);
  inWords(total_amount);
  window.print();
};



var a = ['','one ','two ','three ','four ', 'five ','six ','seven ','eight ','nine ','ten ','eleven ','twelve ','thirteen ','fourteen ','fifteen ','sixteen ','seventeen ','eighteen ','nineteen '];
var b = ['', '', 'twenty','thirty','forty','fifty', 'sixty','seventy','eighty','ninety'];

function inWords (num) {
    if ((num = num.toString()).length > 9) return 'overflow';
    n = ('000000000' + num).substr(-9).match(/^(\d{2})(\d{2})(\d{2})(\d{1})(\d{2})$/);
    if (!n) return; var str = '';
    str += (n[1] != 0) ? (a[Number(n[1])] || b[n[1][0]] + ' ' + a[n[1][1]]) + 'crore ' : '';
    str += (n[2] != 0) ? (a[Number(n[2])] || b[n[2][0]] + ' ' + a[n[2][1]]) + 'lakh ' : '';
    str += (n[3] != 0) ? (a[Number(n[3])] || b[n[3][0]] + ' ' + a[n[3][1]]) + 'thousand ' : '';
    str += (n[4] != 0) ? (a[Number(n[4])] || b[n[4][0]] + ' ' + a[n[4][1]]) + 'hundred ' : '';
    str += (n[5] != 0) ? ((str != '') ? 'and ' : '') + (a[Number(n[5])] || b[n[5][0]] + ' ' + a[n[5][1]]) + 'only ' : '';
    //return str;
    // alert(str);
    $("#checks123").text(str);

}
</script>

</html>
