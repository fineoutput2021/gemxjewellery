<?
use App\frontendmodel\Order1;
use App\frontendmodel\Order2;
use App\frontendmodel\Address;
?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Sucesss</title>
</head>
<body style="font-family: sans-serif;">

	<div style="width:100%">
		<!-- <div style="display: flex;">
			<h3>Order</h3>
		</div> -->
		<div>
			<p>Hi <?php echo $name; ?>,</p>
			<p>Welcome to Gemx Jewellery family!</p>
			<p>Here are the details of your order placed on Date:</p>
													 <? $newdate = new DateTime($date);?>
			<h2 style="color: #ff700a;">[Order ID - <?php echo $order1_id; ?>] (<?php echo  $newdate->format('F j, Y'); ?>)</h2>
		</div>
		<div>
			<table style="border: 1px solid lightgrey; border-collapse: collapse;width: 100%;text-align: left;">
				<tr style="border: 1px solid lightgrey; border-collapse: collapse;text-align: left;">
					<th style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Product</th>
					<th style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Quantity</th>
					<th style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Price</th>
				</tr>
				<?
        $order_tbl= Order2::wherenull('deleted_at')->where('main_id',$order1_id)->get();
        $sub_total=0;
				?>
				<?php foreach ($order_tbl as $order2) {
          if($order2->status == 0){
          $product= App\adminmodel\Product::wherenull('deleted_at')->where('id',$order2->product_id)->first();
        }elseif ($order2->status == 1) {
          $product= App\adminmodel\CustomizeProduct::wherenull('deleted_at')->where('id',$order2->product_id)->first();
        }elseif ($order2->status == 2) {
          $product= App\adminmodel\EngraveProduct::wherenull('deleted_at')->where('id',$order2->product_id)->first();
        }
					$pname=$product->name;
					$total_amt=$order2->amount;

			?>
				<tr style="border: 1px solid lightgrey; border-collapse: collapse;">
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><?php echo $pname; ?></td>
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><?php echo $order2->quantity; ?></td>
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><b>$</b><?php echo $total_amt; ?></td>
					</tr>
				<?

				$sub_total=$sub_total + $total_amt;
					 } ?>
				<tr style="border: 1px solid lightgrey; border-collapse: collapse;">
					<th colspan="2" style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Total:</th>
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><b>$</b><?php echo $sub_total; ?>.00</td>
				</tr>

			</table>

			<div style="margin-top: 10px;width:100%;display: flex;border: 1px solid lightgrey;border-collapse: collapse;">
				<div style="width: 100%;border: 1px solid lightgrey;border-collapse: collapse;padding: 10px;">
					<h3 style="color: #ff700a;">Shipping address</h3>
					<?
					$address= Address::wherenull('deleted_at')->where('id',$address_id)->first();
					// dd($address);die();

					if(!empty($address->customer_name)){
						$name = $address->customer_name;
					}else{
						$name="";
					}
					if(!empty($address->doorflat)){
						$doorflat = $address->doorflat;
					}else{
						$doorflatdoorflat="";
					}
					if(!empty($address->address)){
						$addresss = $address->address;
					}else{
						$addresss="";
					}
					if(!empty($address->landmark)){
						$landmark = $address->landmark;
					}else{
						$landmark="";
					}
					if(!empty($address->zipcode)){
						$zipcode = $address->zipcode;
					}else{
						$zipcode="";
					}
					if(!empty($address->customer_email)){
						$email = $address->customer_email;
					}else{
						$email="";
					}
					if(!empty($address->customer_number)){
						$number = $address->customer_number;
					}else{
						$number="";
					}


					?>
					<p>Name: <?php echo $name; ?></p>
					<p>Address: <?php echo $doorflat.", ".$addresss.", ".$landmark.", ".$zipcode;?></p>
					<p>Email: <?php echo $email; ?></p>
					<p>Number: <?php echo $number; ?></p>

				</div>
			</div>

			<div style="margin-top: 10px;width:100%;">
				<p>Thank you for ordering with us, </p>
				<p>Team Gemx Jewellery</p>
				<p>Stay Safe, Stay Fashionable</p>
			</div>
		</div>
	</div>

</body>
</html>
