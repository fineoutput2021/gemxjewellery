<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <title>Krevon - Luxury for life</title>

  <!--== Favicon ==-->
  <link rel="shortcut icon" href="<?=base_url()?>assets/frontend/img/favicon.png" type="image/x-icon" />

  <!--== Google Fonts ==-->
  <link href="https://fonts.googleapis.com/css?family=Oswald:400,500,600,700%7CPoppins:400,400i,500,600&amp;display=swap" rel="stylesheet">

  <!-- build:css <?=base_url()?>assets/frontend/css/app.min.css -->
  <!--== Leaflet Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/leaflet.min.css" rel="stylesheet" />
  <!--== Nice Select Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/nice-select.min.css" rel="stylesheet" />
  <!--== Slick Slider Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/slick.min.css" rel="stylesheet" />
  <!--== Magnific Popup Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/magnific-popup.min.css" rel="stylesheet" />
  <!--== Slicknav Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/slicknav.min.css" rel="stylesheet" />
  <!--== Animate Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/animate.min.css" rel="stylesheet" />
  <!--== Ionicons Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/ionicons.min.css" rel="stylesheet" />
  <!--== Font-Awesome Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/font-awesome.min.css" rel="stylesheet" />
  <!--== Bootstrap Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/bootstrap.min.css" rel="stylesheet" />

  <!--== Main Style CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/style.css" rel="stylesheet" />
  <!--== Helper Min CSS ==-->
  <link href="<?=base_url()?>assets/frontend/css/helper.min.css" rel="stylesheet" />
  <!-- endbuild -->

</head>

<body>

  <!--== Start Header Area ==-->
  <header class="header-area">
    <div class="container container-wide">
      <div class="row align-items-center">
        <div class="col-sm-4 col-lg-2">
          <div class="site-logo text-center text-sm-left">
            <a href="<?=base_url()?>">
              <img src="<?=base_url()?>assets/frontend/img/logo.png" alt="Logo" class="img-fluid" />
            </a>
          </div>
        </div>

        <div class="col-lg-10 d-none d-lg-block">
          <div class="site-navigation">
            <ul class="main-menu nav">
              <!-- <ul class="sub-menu">
                              <li><a href="index.html">Home 1</a></li>
                              <li><a href="">Home 2</a></li>
                              <li><a href="">Home Box Layout</a></li>
                          </ul> -->
              <?php $this->db->select('*');
                    $this->db->from('tbl_category');
                    $cat_data= $this->db->get();
                   foreach($cat_data->result() as $cat) {
                    ?>
              <li class="has-submenu"><a href="<?=base_url()?>Home/products/<?=base64_encode($cat->id)?>"><?=$cat->name?></a></li>
              <?php  } ?>
              <li><a href="<?=base_url()?>Home/about_us">About Us</a></li>
              <li><a href="<?=base_url()?>Home/contact_us">Contact Us</a></li>
            </ul>
          </div>
        </div>

        <div class="col-sm-8 col-lg-3">
          <div class="site-action d-flex justify-content-sm-end" style="flex-direction: row-reverse;">
            <!-- <ul class="login-reg-nav nav">
                            <li><a href="login.html">Login</a></li>
                            <li><a href="register.html">Register</a></li>
                        </ul> -->

            <!-- <div class="mini-cart-wrap">
                            <a href="cart.html" class="btn-mini-cart">
                                <i class="ion-bag"></i>
                                <span class="cart-total">3</span>
                            </a>

                            <div class="mini-cart-content">
                                <div class="mini-cart-product">
                                    <div class="mini-product">
                                        <div class="mini-product__thumb">
                                            <a href="single-product.html"><img src="<?=base_url()?>assets/frontend/img/product/product-1.png" alt="product" /></a>
                                        </div>
                                        <div class="mini-product__info">
                                            <h2 class="title"><a href="single-product.html">Auto Clutch & Brake</a></h2>

                                            <div class="mini-calculation">
                                                <p class="price">5 x <span>$20.33</span></p>
                                                <button class="remove-pro"><i class="ion-trash-b"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mini-product">
                                        <div class="mini-product__thumb">
                                            <a href="single-product.html"><img src="<?=base_url()?>assets/frontend/img/product/product-2.png" alt="product" /></a>
                                        </div>
                                        <div class="mini-product__info">
                                            <h2 class="title"><a href="single-product.html">Leather Steering Wheel</a></h2>

                                            <div class="mini-calculation">
                                                <p class="price">5 x <span>$20.33</span></p>
                                                <button class="remove-pro"><i class="ion-trash-b"></i></button>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mini-product">
                                        <div class="mini-product__thumb">
                                            <a href="single-product.html"><img src="<?=base_url()?>assets/frontend/img/product/product-3.png" alt="product" /></a>
                                        </div>
                                        <div class="mini-product__info">
                                            <h2 class="title"><a href="single-product.html">Leather Steering Wheel</a></h2>

                                            <div class="mini-calculation">
                                                <p class="price">5 x <span>$20.33</span></p>
                                                <button class="remove-pro"><i class="ion-trash-b"></i></button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->

            <div class="responsive-menu d-lg-none">
              <button class="btn-menu">
                <i class="fa fa-bars"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
  <?php if (!empty($this->session->flashdata('smessage'))) { ?>
  <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
    <?php echo $this->session->flashdata('smessage'); ?>
  </div>
  <?php }
         if (!empty($this->session->flashdata('emessage'))) { ?>
  <div class="alert alert-danger alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-ban"></i> Alert!</h4>
    <?php echo $this->session->flashdata('emessage'); ?>
  </div>
  <?php } ?>
  <!--== End Header Area ==-->
