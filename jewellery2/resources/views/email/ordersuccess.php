<!DOCTYPE html>
<?
use App\frontendmodel\Order1;
use App\frontendmodel\Order2;
use App\frontendmodel\product;
use App\frontendmodel\Address;
?>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>order sucesss</title>
</head>
<body style="font-family: sans-serif;">

	<div style="width:100%">
		<div style="display: flex;">
			<h3>Order</h3>
		</div>
		<div>
			<p>Hi <?php echo $order_data['name']; ?>,</p>
			<p>Welcome to Tailer family!</p>
			<p>Here are the details of your order placed on Date:</p>
													 <? $newdate = new DateTime($order_data['date']);?>
			<h2 style="color: #ff700a;">[Order ID - <?php echo $order_data['order1_id']; ?>] (<?php echo  $newdate->format('F j, Y'); ?>)</h2>
		</div>
		<div>
			<table style="border: 1px solid lightgrey; border-collapse: collapse;width: 100%;text-align: left;">
				<tr style="border: 1px solid lightgrey; border-collapse: collapse;text-align: left;">
					<th style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Product</th>
					<th style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Quantity</th>
					<th style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Price</th>
				</tr>
				<?

$order2_Data = Order2::where('main_id', $order_data['order1_id'])->get();

$sub_total=0;
				?>
				<?php foreach ($order2_Data->result() as $order) {

$product = product::wherenull('deleted_at')->where('id', $order->product_id)->first();


					$pname=$product->name;
					$total_amt=$order->amount

			?>
				<tr style="border: 1px solid lightgrey; border-collapse: collapse;">
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><?php echo $pname; ?></td>
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><?php echo $order->quantity; ?></td>
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><b>Rs.</b><?php echo $total_amt; ?></td>
					</tr>
				<?

				$sub_total=$sub_total + $total_amt;
					 } ?>
				<tr style="border: 1px solid lightgrey; border-collapse: collapse;">
					<th colspan="2" style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;">Total:</th>
					<td style="border: 1px solid lightgrey; border-collapse: collapse;padding: 10px;"><b>Rs.</b><?php echo $sub_total; ?></td>
				</tr>

			</table>

			<div style="margin-top: 10px;width:100%;display: flex;border: 1px solid lightgrey;border-collapse: collapse;">
				<div style="width: 50%;border: 1px solid lightgrey;border-collapse: collapse;padding: 10px;">
					<h3 style="color: #ff700a;">Billing address</h3>
					<?      			/*$this->db->select('*');
					$this->db->from('tbl_users');
					$this->db->where('id',$order1_id);
					$user= $this->db->get()->row();
					$user_id=$user->id;
					$user_mail=$user->email;*/
					$order1 = Order1::where('id', $order_data['order1_id'])->first();

					$user_address = Address::where('id', $order1->address_id)->first();

					$door_flat = $user_address->doorflat;
					$add=$user_address->address;
					$zip=$user_address->zipcode;
					$country=$user_address->country;
					$mobile=$user_address->customer_number;
					$email=$user_address->customer_email;

					?>
					<p><?php echo $name; ?></p>
					<p><?php echo $door_flat; ?></p>
					<p<?php echo $add,$zip; ?></p>
					<p><?php echo $country; ?></p>
					<p><?php echo $mobile; ?></p>
					<p><?php echo $email; ?></p>
				</div>
				<div style="width: 50%;border: 1px solid lightgrey;border-collapse: collapse;padding: 10px;">
					<h3 style="color: #ff700a;">Shipping address</h3>
					<p><?php echo $name; ?></p>
					<p><?php echo $door_flat; ?></p>
					<p<?php echo $add,$zip; ?></p>
					<p><?php echo $country; ?></p>
					<p><?php echo $mobile; ?></p>
					<p><?php echo $email; ?></p>
				</div>
			</div>


			<div style="margin-top: 10px;width:100%;">
				<p>Thank you for ordering with us, </p>
				<p>Team Gemx Jewellery</p>
				<p>Stay Safe, Stay Fashionable</p>
				<!-- <p><b>For any support,</b> free to email us at <a href="#">connect@tailer.com</a> or ring us on 1234567890</p> -->
			</div>
		</div>

	</div>

</body>
</html>
