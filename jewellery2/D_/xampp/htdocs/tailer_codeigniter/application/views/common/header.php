<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>OTAILOR</title>
	<link rel="icon" type="image/x-icon" href="<?=base_url()?>assets/frontend/img/favicon-standard_2.png">
	<!-- <link rel="icon" href="<?=base_url()?>assets/frontend/assets/img/royal_homes_favicon.png" type="image/x-icon" type="image/x-icon"> -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="preconnect" href="https://fonts.googleapis.com">
	<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
	<link href="https://fonts.googleapis.com/css2?family=Oswald:wght@200;300;400;500;600;700&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="<?=base_url();?>assets/frontend/css/style.css">
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css" />
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">

</head>
<style media="screen">
	@media (min-width: 900px) {
		.change_mobile {
			display: none;
		}

	}

	@media (max-width: 900px) {
		.change_desktop {
			display: none;
		}

	}

	@media (min-width: 320px) and (max-width: 361px) {
		.duo {
			margin-right: 181px;
			margin-top: -62px;
		}

		.duo1 {
			margin-top: -22px !important;
		}

		.tac {
			margin-left: 86px;
			margin-top: 6px;
		}

		.chng-3 {
			width: 27px !important;
			margin-top: -60px !important;
			margin-right: 5px !important;
		}

		.img_sz {
			width: 115% !important;
		}
	}

	@media (min-width: 362px) and (max-width: 389px) {
		.duo {
			margin-right: 198px;
			margin-top: -64px;
		}

		.duo1 {
			margin-top: -22px !important;
		}

		.tac {
			margin-left: 86px;
			margin-top: 10px;
		}

		.chng-3 {
			width: 27px !important;
			margin-top: -58px !important;
			margin-right: 4px !important;
		}
	}

	@media (min-width: 389px) and (max-width: 414px) {
		.duo {
			margin-right: 205px;
			margin-top: -64px;
		}

		.duo1 {
			margin-top: -22px !important;
		}

		.tac {
			margin-left: 86px;
			margin-top: 10px;
		}

		.chng-3 {
			width: 27px !important;
			margin-top: -58px !important;
			margin-right: 2px !important;
		}
	}

	@media (min-width: 414px) and (max-width: 540px) {
		.duo {
			margin-right: 239px;
			margin-top: -61px;

		}

		.tac {
			margin-left: 131px;
		}

		.chng-3 {
			width: 27px !important;
			margin-top: -58px !important;
			margin-right: 2px !important;
		}

	}

	@media (min-width: 540px) and (max-width: 600px) {
		.duo {
			margin-right: 341px;
			margin-top: -61px;
		}

		.tac {
			margin-left: 200px !important;
		}
	}

	.duo {
		background: #2e3e4e !important;
		color: #c5a981 !important;
	}

	.dropdown-menu {
		margin-left: -16vw
	}

	.chng-3 {
		width: 21px !important;
		margin-top: -64px !important;
		margin-right: 4px !important;
	}

	.side_b {
		display: flex;
	}

	.logo_b {
		font-size: 8vw;
		text-align: center;
		margin-left: 7vw;
	}

	@media (min-width: 540px) and (max-width: 600px) {
		.duo {
			margin-right: 341px;
			margin-top: -61px;
		}

		.tac {
			margin-left: 200px !important;
		}







	}

	@media (min-width: 900px) and (max-width: 1380px) {
		.img_sz {
			width: 50% !important;
			margin-top: 5vh;
		}

		.dropdown-toggle::after {
			vertical-align: -0.745em !important;
		}

		.dropdown-menu {
			margin-left: -4vw;
		}

		.duo1 {
			margin-right: -8px !important;
		}
	}
</style>

<body>
	<style>
		@media (max-width: 640px) {
			.Cart-number2 {
				position: absolute;
				top: -27px;
				transform: translate(1px);
				font-size: 12px;
				color: #fff;
				background: #2e3e4e;
				padding: 0px 5px;
				border-radius: 50%;
				font-weight: 600;
			}
		}

		@media (min-width: 640px) {
			.Cart-number {
				position: absolute;
				top: 5px;
				transform: translate(1px);
				font-size: 12px;
				color: #fff;
				background: #2e3e4e;
				padding: 0px 5px;
				border-radius: 50%;
				font-weight: 600;
			}
		}

		.spinner {
			/* width: 5rem;
height: 5rem;
border-radius: 50%;
background: conic-gradient(rgba(46, 62, 78, 25%), #2e3e4e);
position: relative;
animation: spin 1.4s linear infinite;
transform: translateZ(0); */
			width: 1.2em;
			height: 1.2em;
			border-radius: 50%;
			box-shadow:
				0 -3em rgba(46, 62, 78, 1),
				2.25em -2.25em rgba(46, 62, 78, 0.875),
				3em 0 rgba(46, 62, 78, 0.75),
				2.25em 2.25em rgba(46, 62, 78, 0.625),
				0 3em rgba(46, 62, 78, 0.5),
				-2.25em 2.25em rgba(46, 62, 78, 0.375),
				-3em 0 rgba(46, 62, 78, 0.25),
				-2.25em -2.25em rgba(46, 62, 78, 0.125);
			animation: spin 1.2s linear infinite;
			position: absolute;
			/* opacity: 0.3; */
			top: 20rem;
			left: 20rem;
			z-index: 999;
		}

		/* .spinner::after {
background: #ffff;
width: 90%;
height: 90%;
border-radius: 50%;
content: "";
margin: auto;
position: absolute;
top: 0;
left: 0;
bottom: 0;
right: 0;
} */

		/* @keyframes spin {
from {
transform: rotate(0deg);
}

to {
transform: rotate(360deg);
}
} */
		@keyframes spin {
			100% {
				transform: rotate(-360deg)
			}
		}

		#loading {
			display: none;
		}
	</style>
	<!-- header start -->

	<!-- style="margin-left: 131px; -->
	<header class="navbar-expand-lg">
		<div class="container">
			<div class="row hei">

				<div class="col-2 col-md-2 col-lg-2  d-flex align-items-center ">
					<div>
						<a href="<?=base_url();?>Home/index">
							<h1 class="mb-0 change_mobile tac"><span style="color:#c5a981">O</span>TAILOR</h1>
							<h1 class="mb-0 change_desktop"><span style="color:#c5a981">O</span>TAILOR</h1>
						</a>
					</div>
				</div>
				<div class="col-md-8">
					<div class="row hei he-gh  d-lg-flex d-md-flex collapse navbar-collapse" id="collapsibleNavbar">
						<div class="col-12 p-0">
							<div class="d-flex top_dh">
								<ul>
									<?php


  $this->db->select('*');
$this->db->from('tbl_category');
$this->db->where('is_active', 1);
$this->db->where('type !=', 2);
$all_category= $this->db->get();


if (!empty($all_category)) {
foreach ($all_category->result() as $category) {
?>


									<li style="padding: 0px 10px;">
										<a href="<?=base_url(); ?>Home/allproducts/<?php echo base64_encode($category->id) ?>/<?php echo base64_encode(1) ?>" class="active"><?=$category->name; ?></a>
										<div class="top_hover">
											<div class="container">
												<div class="row">
													<div class="col-md-4">
														<ul class="d-block">
															<?php
// echo $category->id;
// exit;
$this->db->select('*');
$this->db->from('tbl_subcategory');
$this->db->where('category', $category->id);
$this->db->where('type !=', 2);
$this->db->where('is_active', 1);
$subcat_data= $this->db->count_all_results();



$this->db->select('*');
$this->db->from('tbl_subcategory');
$this->db->where('category', $category->id);
$this->db->where('type !=', 2);
$this->db->where('is_active', 1);
$subcattwo_data= $this->db->get();
if (!empty($subcat_data)) {
$d_data = $subcat_data / 2;
$sub_data = round($d_data);
}
// echo "<pre>";		print_r($subcat_data); die();
// echo "<pre>";		print_r($subcattwo_data->result()); die();
$i = 1;

foreach ($subcattwo_data->result() as $subcattwo) {
?>
															<a href="<?=base_url(); ?>Home/allproducts/<?php echo base64_encode($subcattwo->id) ?>/<?php echo base64_encode(2) ?>">
																<li><?=$subcattwo->name; ?></li>
															</a>
															<!-- <a href="<?=base_url(); ?>Home/allproducts">
<li>Category 1.1</li>
</a>
<a href="<?=base_url(); ?>Home/allproducts">
<li>Category 1.2</li>
</a>
<a href="<?=base_url(); ?>Home/allproducts">
<li>Category 1.3</li>
</a> -->
															<?php
    if ($i == $sub_data) {
        break;
    }
$i++;
} ?>
														</ul>
													</div>
													<div class="col-md-4">
														<ul class="d-block">
															<?php



                        $this->db->select('*');
$this->db->from('tbl_subcategory');
$this->db->where('category', $category->id);
$subcattwox_data= $this->db->get();
if (!empty($sub_data)) {
// 	$d_dataa = $subcast_data / 2;
// 	$sub_dataa = round($d_data);
// echo $sub_data;

$jk=1;
foreach ($subcattwox_data->result() as $subcattwoo) {
if ($jk <= $sub_data) {
// echo "gii";
// echo $jk."(1)";
} else {
// echo $jk;?>


															<a href="<?=base_url(); ?>Home/allproducts/<?php echo base64_encode($subcattwoo->id) ?>/<?php echo base64_encode(2) ?>">
																<li><?=$subcattwoo->name; ?></li>
															</a>
															<?php
}
$jk++;
}
} ?>
														</ul>
													</div>
													<div class="col-md-4">
														<div>
															<img class="w-100" src="<?=base_url(); ?><?=$category->image; ?>">
														</div>
													</div>
												</div>
											</div>
										</div>
									</li>

									<?php

// 	}
// }
}
}
?>



								</ul>
							</div>
						</div>
					</div>

				</div>


				<!-- Sidebar -->
				<div class="w3-sidebar w3-bar-block" style="display:none" id="mySidebar">

					<div class="side_b">
						<p class="logo_b">TAILOR</p>
						<button onclick="w3_close()" class="w3-bar-item w3-button w3-large" style="text-align: end;margin-top:-2.5vh; font-size: 5vh!important;  ">&times;</button>

					</div>
					<div class="accordion" id="accordionExample">
						<?php
$this->db->select('*');
$this->db->from('tbl_category');
$this->db->where('is_active', 1);
$cat_data= $this->db->get();

$i=1; foreach ($cat_data->result() as $cat) { ?>

						<div class="card">
							<div class="card-header" id="heading_<?=$cat->id?>">
								<h2 class="mb-0">
									<button class="btn btn-light btn-block text-left collapsed dropdown-toggle" type="button" data-toggle="collapse" data-target="#collapse_<?=$cat->id?>" aria-expanded="false" aria-controls="collapse_<?=$cat->id?>">
										<?=$cat->name?>
									</button>
								</h2>
							</div>
							<div id="collapse_<?=$cat->id?>" class="collapse" aria-labelledby="heading_<?=$cat->id?>" data-parent="#accordionExample">
								<div class="card-body">
									<div class="list-group">
										<?php      			$this->db->select('*');
$this->db->from('tbl_subcategory');
$this->db->where('category', $cat->id);
$subdata= $this->db->get();
$i=1; foreach ($subdata->result() as $sub) {
?>
										<a href="<?=base_url(); ?>Home/allproducts/<?php echo base64_encode($sub->id) ?>/<?php echo base64_encode(2) ?>" class="list-group-item list-group-item-action" style="border:none"><?=$sub->name?></a>
										<?php
}?>
									</div>
								</div>
							</div>
						</div>
						<?$i++;}?>

						<!-- <div class="card">
<div class="card-header" id="headingTwo">
<h2 class="mb-0">
<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
Category#2
</button>
</h2>
</div>
<div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
<div class="card-body">
<div class="list-group">

<a href="#" class="list-group-item list-group-item-action">A second link item</a>
<a href="#" class="list-group-item list-group-item-action">A third link item</a>
<a href="#" class="list-group-item list-group-item-action">A fourth link item</a>

</div>
</div>
</div>
</div>
<div class="card">
<div class="card-header" id="headingThree">
<h2 class="mb-0">
<button class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
catrgory#3
</button>
</h2>
</div>
<div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
<div class="card-body">
<div class="list-group">

<a href="#" class="list-group-item list-group-item-action">A second link item</a>
<a href="#" class="list-group-item list-group-item-action">A third link item</a>
<a href="#" class="list-group-item list-group-item-action">A fourth link item</a>

</div>
</div>
</div>
</div> -->


					</div>






					<!-- <a href="<?=base_url();?>Home/allproducts/<?php echo base64_encode($subcattwo->id) ?>/<?php echo base64_encode(2) ?>" class="w3-bar-item w3-button">CATEGORY 2.0</a>
<a href="<?=base_url();?>Home/allproducts/<?php echo base64_encode($subcattwo->id) ?>/<?php echo base64_encode(2) ?>" class="w3-bar-item w3-button">CATEGORY 2.1</a>
<a href="<?=base_url();?>Home/allproducts/<?php echo base64_encode($subcattwo->id) ?>/<?php echo base64_encode(2) ?>" class="w3-bar-item w3-button">CATEGORY 2.3</a>
<a href="<?=base_url();?>Home/allproducts/<?php echo base64_encode($subcattwo->id) ?>/<?php echo base64_encode(2) ?>" class="w3-bar-item w3-button">CATEGORY 2.4</a> -->
				</div>



				<div class="col-2 col-lg-2 col-md-2 ml-auto pr-0 pr-lg-3 pr-md-3">

					<div class="d-flex w-100 justify-content-end top_dh">
						<a href="#">
							<!-- Page Content -->
							<!-- <div class="w3-teal pra-ch"> -->
							<button class="w3-button w3-teal change_mobile duo" onclick="w3_open()">☰</button>
						</a>


						<a class="mr-3 top_inp">
							<img src="<?=base_url();?>assets/frontend/img/search.png" class="chang_img_wid change_mobile chng-3" style="width:14px; margin-top:-34px; margin-right:15px;">
							<img src="<?=base_url();?>assets/frontend/img/search.png" class="chang_img_wid change_desktop ">
							<form action="<?=base_url()?>Home/search_list" method="get">
								<input type="text" name="string" class="ser_inp" placeholder="Type here...">
							</form>
						</a>
						<?php
if (!empty($this->session->userdata('user_id'))) { ?>
						<div class="dropdown" style="margin-top:-22px; margin-right: 22px">
							<p class="secondary dropdown-toggle duo1 " id="dropdownMenu" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="margin-top:10px ; margin-right:10px ; margin-left:6px !important; font-size: 12px !important;">
								<img src="<?=base_url();?>assets/frontend/img/user.png" class="img_sz" style="width:115% ;">
							</p>
							<div class="dropdown-menu " aria-labelledby="dropdownMenu" style="left: -22px !important;">
								<a class="dropdown-item" href="<?=base_url()?>Home/my_orders">My Orders</a>
								<a class="dropdown-item" href="<?=base_url()?>Home/my_account">My Account</a>
								<a class="dropdown-item" href="<?=base_url()?>Home/logout">Log Out</a>
							</div>
						</div>
						<!-- <a href="<?=base_url()?>Home/logout" class="mr-3">
<i class="fa fa-sign-out" aria-hidden="true"></i>
</a> -->
						<?php
} else {
?>
						<a href="<?=base_url(); ?>home/login" class="mr-3">
							<img src="<?=base_url(); ?>assets/frontend/img/user.png" class="chang_img_wid change_mobile chng-3" style="width:14px; margin-top:-34px; margin-right:15px;">
							<img src="<?=base_url(); ?>assets/frontend/img/user.png" class="change_desktop">
						</a>
						<?php
}
?>

						<a href="<?=base_url();?>Cart/cart">
							<img src="<?=base_url();?>assets/frontend/img/cart.png" class="chang_img_wid change_mobile chng-3" style="width:14px; margin-top:-34px; margin-right:15px;">
							<img src="<?=base_url();?>assets/frontend/img/cart.png" class="change_desktop">
							<div class="Cart-number Cart-number2">
								<?php
if (!empty($this->session->userdata('user_data'))) {
$user_id = $this->session->userdata('user_id');
$this->db->select('*');
$this->db->from('tbl_cart');
$this->db->where('user_id', $user_id);
$count= $this->db->count_all_results();
// $count = count_all_results($cart_data);
if (!empty($count)) {
echo	$count;
}
} else {
$cart= $this->session->userdata('cart_items');
// exit;
if (!empty($cart)) {
echo	$count= count($cart);
}
}
?>
							</div>
						</a>
					</div>
				</div>
			</div>
		</div>
	</header>

	<script>
		function w3_open() {
			document.getElementById("mySidebar").style.width = "70vw";
			document.getElementById("mySidebar").style.display = "block";
		}

		function w3_close() {
			document.getElementById("mySidebar").style.display = "none";
		}
	</script>

	<!-- header end -->


	<?php if (!empty($this->session->flashdata('header_smessage'))) { ?>
	<div class="alert alert-success alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-check"></i> Alert!</h4>
		<?php echo $this->session->flashdata('header_smessage'); ?>
	</div>
	<?php }
if (!empty($this->session->flashdata('header_emessage'))) { ?>
	<div class="alert alert-danger alert-dismissible">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<h4><i class="icon fa fa-ban"></i> Alert!</h4>
		<?php echo $this->session->flashdata('header_emessage'); ?>
	</div>
	<?php } ?>
