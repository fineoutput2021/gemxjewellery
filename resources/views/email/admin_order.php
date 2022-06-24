<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>New order received</title>
</head>
<body style="font-family: sans-serif;">

	<div style="width:100%">
		<div style="display: flex;">
			<h3>New Order</h3>
		</div>
		<div>
			<p>Hi Admin,</p>
			<p>New order is received!</p>
			<p>Here are the details of new order placed on Date:</p>
													 <? $newdate = new DateTime($order_data['data']);?>
			<h2 style="color: #ff700a;">[Order ID - <?php echo $order_data['order1_id']; ?>] (<?php echo  $newdate->format('F j, Y'); ?>)</h2>
		</div>

	</div>

</body>
</html>
