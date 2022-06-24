<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Mangalmicrons</title>
    <!-- mobile responsive meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

   <!--  <link rel="apple-touch-icon" sizes="180x180" href="img/favicon/apple-icon-180x180.png"> -->

   <!--  <link rel="icon" type="image/png" sizes="16x16" href="img/favicon/favicon-16x16.png"> -->
    <!-- <link rel="manifest" href="img/favicon/manifest.json"> -->

<!--     <meta name="theme-color" content="#ffffff"> -->
    <link rel="stylesheet" href="<?=base_url();?>assets/mangal_css_js/css/style.css">
    <link rel="stylesheet" href="<?=base_url();?>assets/mangal_css_js/css/responsive.css">



</head>
<body class="_active-pr eloader-ovh">


  <div class="modal fade" id="myModal" role="dialog">
      <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
          <div class="modal-header" style="background-color: #262626;">
            <button type="button" class="close " data-dismiss="modal" style=" color: #efdcdc !important;
      opacity: 1 !important; ">&times;</button>

          </div>
          <div class="modal-body" style="background-color: #262626;">
                    <div class="rqa-box">

                      <h3>Contact Us</h3>

                      <p>Fill all information details to consult with us to get sevices from us</p>

                      <form method="post" action="<?=base_url()?>Home/contact_us" class="rqa-form" enctype="multipart/form-data">

                          <input type="text" placeholder="Name" name="name" required="required" />

                          <input type="email" placeholder="Email" name="email" required="required" />

                          <input type="text" placeholder="Contact" name="contact" required="required" />

                          <textarea placeholder="Write some text..." name="description"></textarea>

                      <button type="submit" class="hvr-sweep-to-right">Contact Us<i class="fa fa-arrow-right"></i></button>

                          </form><!-- /.rqa-form -->

                      </div>
          </div>

        </div>

      </div>
    </div>







<!-- <div class="preloader"><div class="spinner"></div></div> -->

<div class="page-wrapper">

    <div class="header-top home-three">
        <div class="top-info">
            <div class="container">
                <div class="pull-left left-text">
                    <p>Welcome to our <span style="color:#d9cb72">Raytheon</span></p>
                </div><!-- /.pull-left -->
                <div class="pull-right social">
                    <a href="#" class="fab fa-facebook-f"></a><!--
                    --><a href="#" class="fab fa-twitter"></a><!--
                    --><a href="#" class="fab fa-google-plus-g"></a><!--
                    --><a href="#" class="fab fa-linkedin-in"></a>
                </div><!-- /.pull-right -->
            </div><!-- /.container -->
        </div><!-- /.top-info -->
        <div class="container">
            <div class="logo pull-left">
                <a href="<?=base_url()?>home"><img src="<?=base_url();?>assets/mangal_css_js/img/mangal2.png" alt="Awesome Image"/></a>
            </div><!-- /.logo -->
            <div class="header-right-info pull-right">
                <div class="single-header-right-info">
                    <div class="icon-box">
                        <i class="industrio-icon-phone-call"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <p>Call us on</p>
                        <h3>+91 99833 33533</h3>
                    </div><!-- /.text-box -->
                </div><!-- /.single-header-right-info -->
                <div class="single-header-right-info">
                    <!--<div class="icon-box">
                        <i class="industrio-icon-clock"></i>
                    </div>
                    <div class="text-box">
                        <p>Monday to Friday</p>
                        <h3>9:00am - 6:00pm</h3>
                    </div><! /.text-box -->
                </div><!-- /.single-header-right-info -->
                <div class="single-header-right-info">
                    <div class="icon-box">
                        <i class="industrio-icon-envelope"></i>
                    </div><!-- /.icon-box -->
                    <div class="text-box">
                        <p>E-mail us</p>
                        <h3>business@rayhtheon.com</h3>
                    </div><!-- /.text-box -->
                </div><!-- /.single-header-right-info -->
            </div><!-- /.header-right-info -->
        </div><!-- /.container -->
    </div><!-- /.header-top home-one -->


    <header class="header header-home-three">
        <nav class="navbar navbar-default header-navigation stricky">
            <div class="container clearfix">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button class="side-nav-toggler side-nav-opener"><i class="fa fa-bars"></i></button>
                </div>

                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar" style="margin:0px -108px;padding-left:36px;">



                                        <ul class="nav navbar-nav navigation-box" style="margin-left:-25px;">

                                          <li >

                                              <a href="<?=base_url();?>Home/index">Home</a>

                                          </li>
                                          <li> <a href="<?= base_url(); ?>Home/about_us">About Us</a> </li>
                                          <li> <a href="<?= base_url() ?>Home/products/<?=base64_encode(6)?>">All Granites</a> </li>



                                           <li>

                                              <a href="<?= base_url(); ?>Home/products/<?=base64_encode(4)?>">Outdoor Paving</a>

                                              <ul class="sub-menu">

                                                <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(1)?>">Granite</a> </li>
                                                <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(2)?>">Porcelain</a> </li>
                                                <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(3)?>">Slate</a> </li>




                  			<!-- <li>
                  				<a href="#"></a>
                  				<ul class="sub-menu">

                  					<li><a href="<?=base_url()?>service/singlepage/"  alt="" title="">tiel</a></li>


                  				</ul>

                              </li> -->
                            </ul><!-- /.sub-menu -->

                          </li>
                          <li>

                            <a href="<?= base_url(); ?>Home/products/<?=base64_encode(5)?>">Indoor Paving</a>

                              <ul class="sub-menu">

                                  <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(4)?>">Granite</a> </li>
                                <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(5)?>">Porcelain</a> </li>



                          <li>
                          <a href="<?=base_url()?>soon"</a>
                          <ul class="sub-menu">

                          <li><a href="<?=base_url()?>Home/single/"  alt="" title="">this is</a></li>



                          </ul>

                          </li>




                             </ul><!-- /.sub-menu -->

                          </li>





                        <li> <a href="<?= base_url() ?>Home/products/<?=base64_encode(7)?>">All Porcelain</a></li>
                      <li> <a href="<?= base_url() ?>Home/products/<?=base64_encode(8)?>">All Slate</a> </li>



                                      </ul>

                </div><!-- /.navbar-collapse -->
                <div class="right-side-box">
                   <a href="#" class="rqa-btn hvr-sweep-to-right" data-toggle="modal" data-target="#myModal">

                        <span class="inner">Contact Us <i class="fa fa-arrow-right"></i></span>

</a>
                </div><!-- /.right-side-box -->
            </div><!-- /.container -->
        </nav>
    </header><!-- /.header -->
