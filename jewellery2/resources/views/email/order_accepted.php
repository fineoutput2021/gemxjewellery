
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Order Accepted</title>
</head>
<body style="font-family: sans-serif;">

	<div style="width:100%">
		<div style="display: flex;">
			<h3>Order Accepted</h3>
		</div>
		<div>
			<p>Hi <?php echo $user_data['name']; ?>,</p>
			<p>We have accepted your order.</p>
			<h2 style="color: #ff700a;">[Order ID - <?php echo $user_data['order1_id']; ?>]</h2>
		</div>
		<div style="margin-top: 10px;width:100%;">
			<p>Thank you for ordering with us, </p>
			<p>Team Gemx jewellery</p>
			<p>Stay Safe, Stay Fashionable</p>
			<!-- <p><b>For any support,</b> free to email us at <a href="#">connect@milagrowbyrashi.com</a> or ring us on +971 43142413</p> -->
		</div>
	</div>
</body>
</html>
