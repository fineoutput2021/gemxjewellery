<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="UTF-8" />


    <title>Raytheon</title>

    <!-- mobile responsive meta -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- <link rel="apple-touch-icon" sizes="57x57" href="<?= base_url();?>assets/mangal_css_js/img/favicon/apple-icon-57x57.png"> -->



    <link rel="manifest" href="<?= base_url();?>assets/mangal_css_js/img/favicon/manifest.json">

    <meta name="" content="">

    <meta name="" content="">

    <meta name="" content="">

    <link rel="stylesheet" href="<?= base_url();?>assets/mangal_css_js/css/style.css">
    <link rel="stylesheet" href="<?= base_url();?>assets/mangal_css_js/css/testimonals.css">

    <link rel="stylesheet" href="<?= base_url();?>assets/mangal_css_js/css/responsive.css">
    <style>
        @media (max-width:360px) {
            .clearfix{
              margin-top: -57rem !important;
              width: 35rem !important;
              height: 4rem !important;
              padding: 3rem 0rem !important;
              background: none !important;
            }
            .rqa-btn{
            width: 17rem !important;
            padding: 1rem 2rem !important;
          }
          .header-navigation {
            background-color: #fff;
          }
          .fadeInUp{
            font-size: 1rem !important;
          }
          .slider-home-one .content h2 {
          font-size: 22px;
          line-height: 32px;
          }
          .imgres {
          max-width: 50% !important;
         }
         .sliderres{
           width: 20rem;
         }
         .home-two{
           width: 14rem !important;
           height: 8rem !important;
           margin-bottom: -13rem !important;
         }
        }
    </style>

</head>

<body class="_active-preloader-ovh">





<div class="preloader"><div class="spinner"></div></div>



<div class="page-wrapper">



    <div id="minimal-bootstrap-carousel" class="carousel slide carousel-fade slider-home-one slider-home-two" data-ride="carousel">

        <!-- Wrapper for slides -->

        <div class="carousel-inner" role="listbox">
<?php $i=1; foreach($slider_data->result() as $data) { ?>
            <div class="item <?if($i==1){echo 'active';}?> slide-<?=$i?>  sliderres" style="background-image: url(<?=base_url();?><?=$data->slider_image?>);background-position: center center;">



                <div class="carousel-caption">

                    <div class="container">

                        <div class="box valign-middle">

                            <div class="content text-center">

                                <h2 data-animation="animated fadeInUp"><?=$data->title;?><br><span><?=$data->text;?></span></h2>

                                <!-- <a href="#" class="banner-btn hvr-sweep-to-right" data-animation="animated fadeInDown">Learn more <i class="fa fa-arrow-right"></i></a> -->

                            </div>

                        </div>

                    </div>

                </div>

            </div>
<?php $i++; } ?>

        </div>

        <!-- Controls -->

        <a class="left carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="prev">

            <i class="fas fa-angle-left"></i>

            <span class="sr-only">Previous</span>

        </a>

        <a class="right carousel-control" href="#minimal-bootstrap-carousel" role="button" data-slide="next">

            <i class="fas fa-angle-right"></i>

            <span class="sr-only">Next</span>

        </a>



        <ul class="carousel-indicators list-inline custom-navigation">

            <li data-target="#minimal-bootstrap-carousel" data-slide-to="0" class="active"></li><!--

            --><li data-target="#minimal-bootstrap-carousel" data-slide-to="1"></li><!--

            --><li data-target="#minimal-bootstrap-carousel" data-slide-to="2"></li>

        </ul>



        <div class="logo home-two" style="padding:0;width:15rem;height: 13rem;">

            <a href="<?=base_url()?>"><img src="<?=base_url();?>assets/mangal_css_js/img/mangal_3.png"  class="imgres" style="width:94%;" alt="Mangal Logo"/></a>

        </div><!-- /.logo home-two -->

    </div>





    <header class="header header-home-two stricky">

        <nav class="navbar navbar-default header-navigation">

            <div class="container clearfix">

                <!-- Brand and toggle get grouped for better mobile display -->

                <div class="navbar-header">

                    <button class="side-nav-toggler side-nav-opener"><i class="fa fa-bars"></i></button>

                </div>



                <!-- Collect the nav links, forms, and other content for toggling -->

                <div class="collapse navbar-collapse main-navigation mainmenu " id="main-nav-bar">



                    <ul class="nav navbar-nav navigation-box" style="background:black">

                        <li >

                            <a href="<?=base_url();?>">Home</a>

                        </li>
                        <li> <a href="<?= base_url() ?>Home/about_us">About Us</a> </li>
                        <li> <a href="<?= base_url() ?>Home/products/<?=base64_encode(6)?>">All Granites</a> </li>


                         <li>

                           <a href="<?= base_url(); ?>Home/products/<?=base64_encode(4)?>">Outdoor Paving</a>

                           <ul class="sub-menu">

                             <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(1)?>">Granite</a> </li>
                             <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(2)?>">Porcelain</a> </li>
                             <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(3)?>">Slate</a> </li>
			<!-- <li>
				<a href="<?=base_url()?>soon"</a>
				<ul class="sub-menu">

					<li><a href="<?=base_url()?>Home/single/"  alt="" title=""></a></li>



				</ul>

            </li> -->
          </ul>
        </li>





                         <li>

                          <a href="<?= base_url(); ?>Home/products/<?=base64_encode(5)?>">Indoor Paving</a>

                            <ul class="sub-menu">

                                <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(4)?>">Granite</a> </li>
                              <li> <a href="<?= base_url() ?>Home/sub_products/<?=base64_encode(5)?>">Porcelain</a> </li>


			<!-- <li>
				<a href="<?=base_url()?>soon"</a>
				<ul class="sub-menu">

					<li><a href="<?=base_url()?>Home/single/"  alt="" title="">this is</a></li>



				</ul>

            </li> -->




                            </ul><!-- /.sub-menu -->

                        </li>

                        <li> <a href="<?= base_url() ?>Home/products/<?=base64_encode(7)?>">All Porcelain</a></li>
                      <li> <a href="<?= base_url() ?>Home/products/<?=base64_encode(8)?>">All Slate</a> </li>
                        <!-- <li> <a href="<= base_url() ?>Home/rnd">R&D</a> </li> -->



                    </ul>

                </div><!-- /.navbar-collapse -->

                <div class="right-side-box">
<a  href="#getquote" class="rqa-btn hvr-sweep-to-right" >

                        <span class="inner">Contact Us <i class="fa fa-arrow-right"></i></span>

</a>
                </div><!-- /.right-side-box -->

            </div><!-- /.container -->

        </nav>

    </header><!-- /.header -->
