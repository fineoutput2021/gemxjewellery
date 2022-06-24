<!DOCTYPE html>
<html>

<head>

  <title>Gemx Jewellery</title>
  <link rel="icon" type="image/x-icon" href="<?=base_path?>frontend/assets/img/jewl/logopart1.png">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script:wght@700&display=swap" rel="stylesheet">
  <!-- fontawesome icon -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" /> -->
  <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"> -->
  <!-- google font -->
  <link href="https://fonts.googleapis.com/css?family=Arimo:400,700|Muli&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Tangerine">
  <!-- Latest compiled and minified CSS -->
  <div id="cdn">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

  </div>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.css">

  <!-- jQuery library -->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <!-- Latest compiled JavaScript -->
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

  <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.css">
  <!-- <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"> -->

  <script src="https://unpkg.com/swiper/swiper-bundle.js"></script>
  <!-- <script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script> -->

  <!-- sc -->
  <!-- CSS only -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
  <!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
  <!-- <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script> -->
  <!-- sc -->
  <link rel="stylesheet" href="<?=base_path?>frontend/assets/css/style.css" />
  <style media="screen">
  hr.black{
    border:3px solid black;
  }
  .label {
    padding: 0.2em 0em 0.3em!important;
        color: black;
        font-size: 12px !important;
        font-weight: bold !important;
    }

  </style>
  <style media="screen">
    .btnx {
      position: relative;
      display: flex;
      align-items: center;
      width: 100%;
      padding: 1rem 1.25rem;
      font-size: 1rem;
      color: #212529;
      text-align: left;
      background-color: #fff;
      border: 0;
      border-radius: 0;
      overflow-anchor: none;
      transition: color .15s ease-in-out, background-color .15s ease-in-out, border-color .15s ease-in-out, box-shadow .15s ease-in-out, border-radius .15s ease;
    }
  </style>
  <style media="screen">
    .accordion-header {
      margin-top: 0px;
    }

    .accordion-button:not(.collapsed) {
      color: black;
      background-color: white;
      box-shadow: none;
    }

    .accordion-button:focus {
      z-index: 3;
      border-color: white;
      outline: 0;
      box-shadow: none;
    }

    .accordion-button:not(.collapsed)::after {
      background-image: url(data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16' fill='%23212529'%3e%3cpath fill-rule='evenodd' d='M1.646 4.646a.5.5 0 0 1 .708 0L8 10.293l5.646-5.647a.5.5 0 0 1 .708.708l-6 6a.5.5 0 0 1-.708 0l-6-6a.5.5 0 0 1 0-.708z'/%3e%3c/svg%3e);
      transform: rotate(-180deg);
    }
  </style>




  <?php


/* front-end currency start */

$sign="$";
$currency_price="1";

$cuncy_id = Session::get('currency_id');
$curr_v= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active', 1)->where('id', $cuncy_id)->first();
if (!empty($curr_v)) {
    $sign= $curr_v->sign;
    $currency_price= $curr_v->currency_price;
} else {
    $sign="$";
    $currency_price="1";
}



/* front-end currency end*/

?>


  <!--without login -->


</head>



<div class="bg_blur" id="hk13" style="display:none;">

  <section class="side_open_nav" id="hk11">
    <div class="container-fluid pt-5 pt-0" id="hk10">
      <div class="row user_top">

        <div class="col-md-12 mt-3 d-flex" style="    justify-content: space-between;">



          <?php if (empty(Session::get('user_data'))) {?>

          <a href="<?=base_path;?>open_login">
            <p class="mb-0 ml-3"><i class="fa fa-user"></i>Login/Register</p>
          </a>

          <?php } else { ?>

          <?php
$usr_id = Session::get('user_id');
$user_das= App\frontendmodel\User::wherenull('deleted_at')->where('is_active', 1)->where('id', $usr_id)->first();

$user_name= "No Name";
if (!empty($user_das)) {
    $user_name= $user_das->name;
}
?>

          <p class="mb-0 ml-3">Hello, <?=$user_name;?></p>

          <?php } ?>
          <span class="text-right" onclick=closenav1()>&#10006;</span>

        </div>

      </div>








      <!-- <div class="row mt-5">
        <div class="col-md-12">
          <ul>
            <li class="cat_ul" style="font-size: 17px !important;font-weight: 800;">
              <strong>Categories</strong>
            </li>

            <a class="menu-item-link has-sub-menu" href="<?=base_path?>new_and_now_products" class="pimg">
              <li class="cat_ul">
                New &amp; Now
              </li>

            </a>
            <a class="menu-item-link has-sub-menu" href="https://www.fineoutput.co.in/jewellery2/public/category_products/Ng==" class="pimg">
              <li class="cat_ul">
                Customize
              </li>


            </a>
          </ul>










          <ul>
            <?php if (empty(Session::get('user_data'))) {?>



            <?php } else { ?>

            <a href="<?=base_path;?>my_orders">
              <li class="cat_ul" style="font-size: 17px !important;font-weight: 800;">
                <strong>My Orders</strong>
              </li>
            </a>

            <a href="<?=base_path;?>user_profile">
              <li class="cat_ul" style="font-size: 17px !important;font-weight: 800;">
                <strong>My Account</strong>
              </li>
            </a>

            <a href="<?=base_path;?>logout">
              <li class="cat_ul" style="font-size: 17px !important;font-weight: 800;">
                <strong>Logout</strong>
              </li>
            </a>

            <?php } ?>
          </ul>
        </div>
      </div> -->
    </div>

    <!--======================= my new 3 layer accordian====================== -->

    <div class="mt-4">
      <div class="accordion" id="accordionExample">
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne999">
            <button class="btnx collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne999" aria-expanded="false" aria-controls="collapseOne999" >
              <h4 onclick="window.location.href='<?=base_path?>new_and_now_products'">New & Now</h4>
                  <!-- <a href="<?=base_path;?>sale_products">Sale</a> -->

            </button>
          </h2>
        </div>
        <?php
      $category_v= App\adminmodel\Category::wherenull('deleted_at')->where('is_active', 1)->get();

      if (!empty($category_v)) {
          $a=1;
          foreach ($category_v as $categ) {
              $subcategory_data= App\adminmodel\SubCategory::wherenull('deleted_at')->where('is_cat_delete', 0)->where('is_active', 1)->where('category_id', $categ->id)->get(); ?>
        <div class="accordion-item" >
          <h2 class="accordion-header" id="headingOne<?=$a?>">
            <button class="accordion-button collapsed accoord" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne<?=$a?>" aria-expanded="false" aria-controls="collapseOne<?=$a?>">
              <!-- <a href="<?=base_path; ?>category_products/<?=base64_encode($categ->id); ?>"><?=$categ->name; ?></a> -->
                <h4 onclick="window.location.href='<?=base_path; ?>category_products/<?=base64_encode($categ->id); ?>'"><?=$categ->name; ?></h4>
            </button>
          </h2>
          <div id="collapseOne<?=$a?>" class="accordion-collapse collapse " aria-labelledby="headingOne<?=$a?>" data-bs-parent="#accordionExample">
            <div class="accordion-body">
              <div class="accordion " id="accordionExample11">
                <?if (!empty($subcategory_data)) {
                  foreach ($subcategory_data as $subcategory) {
                      $minisubcategory_data= App\adminmodel\MiniSubCategory::wherenull('deleted_at')->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_active', 1)->where('subcategory_id', $subcategory->id)->get(); ?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="headingOne11<?=$a?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne11<?=$a?>" aria-expanded="true" aria-controls="collapseOne11<?=$a?>">
                      <a href="<?php echo base_path?>all_products/<?=base64_encode($subcategory->id); ?>">
                        <?=$subcategory->name?></a>
                    </button>
                  </h2>
                  <div id="collapseOne11<?=$a?>" class="accordion-collapse collapse " aria-labelledby="headingOne11<?=$a?>" data-bs-parent="#accordionExample11">
                    <div class="accordion-body">
                      <?if (!empty($minisubcategory_data)) {
                          $n=0;
                          foreach ($minisubcategory_data as $minisubcate) {?>
                      <li><a href="<?php echo base_path?>all_products/<?=base64_encode($subcategory->id); ?>/<?=base64_encode($minisubcate->id); ?>">
                          <?=$minisubcate->name; ?></a></li>
                      <?}
                      } ?>
                    </div>
                  </div>
                </div>
                <?$a++;
                  }
              } ?>
              </div>
            </div>
          </div>
        </div>
        <?$a++;
          }
      }?>
        <div class="accordion-item">
          <h2 class="accordion-header" id="headingOne9999">
            <button class="btnx collapsed" type="button" style="">
              <a href="<?=base_path;?>sale_products">Sale</a>
            </button>
          </h2>
        </div>

        <?php if (empty(Session::get('user_data'))) {?>

        <?php } else { ?>
        <div class="accordxx ">

            <button class="btn btnx collapsed " type="button" style="justify-content:space-around; padding: 2px 16px!important;text-transform: none!important;">
              <a href="<?=base_path;?>my_orders">My Orders</a>
              <a href="<?=base_path;?>user_profile">My Account</a>
            </button>
            <button class="btn btnx collapsed" type="button" style="justify-content:center; padding:0px!important;text-transform: none!important;">
              <a href="<?=base_path;?>logout">Logout</a>
            </button>

        </div>


          <?php } ?>


      </div>


    </div>
    <!-- ========================my 3 layer accordian end================================ -->
  </section>

</div>

<body id="body">

  <?php


/* front-end currency start */

$sign="$";
$currency_price="1";

$cuncy_id = Session::get('currency_id');
$curr_v= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active', 1)->where('id', $cuncy_id)->first();
if (!empty($curr_v)) {
    $sign= $curr_v->sign;
    $currency_price= $curr_v->currency_price;
} else {
    $sign="$";
    $currency_price="1";
}



/* front-end currency end*/

?>



  <input type="hidden" value="<?=base_path?>" id="base_path">

  <header class="top-banner" role="banner" style="box-shadow: 2px -5px 20px 0px #919191;">
    <!-- <a href="" class="skip-to-main-content" role="link" tabindex="0">Skip To Main Content</a> -->
    <div class="header-shipping-banner" style="display: none;padding:0!important;">
      <div data-promo-id="homepage" data-promo-name="8-26-20-new-arrivals-promo-bar-text">
        <p>
          <a href="">Today Only! 20% Off Select New Arrivals. <u>Shop Now</u></a>
          <br><a href="https://www.kendrascott.com/shipping-returns.html" target="_blank"><span>free ground shipping and returns, always.</span></a>
        </p>
      </div>
    </div>
    <div class="logo-bar">
      <div class="container-fluid">
        <div id="bfx-cc-wrapper" class="bfx-cc-position-right bfx-cc-position-top">
          <div class="bfx-cc-collapsed" style="height: 25px;">
            <div class="bfx-cc-menu  d-none d-lg-flex">
              <!-- <div class="logo-bar-right"> -->
              <!-- utility user menu -->
              <div class="money" style="width:212px;margin:auto;">
                <ul id=ppreview>
                  <li class="crncy" style=" ">
                    <?php
              // session()->flush();
              $C_id = session('currency_id');
              if (!empty($C_id)) {
                  $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where(array('id'=>$C_id,'is_active'=> 1))->first();
                  $c_code= App\frontendmodel\CountryCode::where('nicename', $currency->country)->first();

                  if (!empty($c_code)) {
                      $iso1= $c_code->iso;
                      $lower_iso_code1= strtolower($iso1);
                      $src_da1= 'https://api.hostip.info/images/flags/'.$lower_iso_code1.'.gif';
                  } else {
                      $iso1= "";
                      $lower_iso_code1= "";
                      $src_da1= "";
                  }
              } else {
                  $C_id = 1;
                  $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where(array('id'=>$C_id,'is_active'=> 1))->first();
                  $c_code= App\frontendmodel\CountryCode::where('nicename', $currency->country)->first();

                  if (!empty($c_code)) {
                      $iso1= $c_code->iso;
                      $lower_iso_code1= strtolower($iso1);
                      $src_da1= 'https://api.hostip.info/images/flags/'.$lower_iso_code1.'.gif';
                  } else {
                      $iso1= "";
                      $lower_iso_code1= "";
                      $src_da1= "";
                  }
              }
              ?>

                    <script type="text/javascript">
                      $(function() {
                        $('#hc').mouseenter(function() {

                          $('#hc').addClass("open");
                        }).mouseleave(function() {
                          $('#hc').removeClass("open");
                        });
                      });
                    </script>

                    <div class="dropdown " id="hc">
                      <button class="dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" style="border:none;padding:6px !important;background:none;">
                        <span id="country" style="font-size:1.5rem">&nbsp; <?=$currency->country;?></span>
                      </button>
                      <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <?php
                  $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active', 1)->get();

                  if (!empty($currency)) {
                      $i=0;
                      foreach ($currency as $curr) {
                          $c_code= App\frontendmodel\CountryCode::where('nicename', $curr->country)->first();

                          if (!empty($c_code)) {
                              $iso= $c_code->iso;
                              $lower_iso_code= strtolower($iso);
                              $src_da= 'https://api.hostip.info/images/flags/'.$lower_iso_code.'.gif';
                          } else {
                              $iso= "";
                              $lower_iso_code= "";
                              $src_da= "";
                          } ?>
                        <!-- <li class="showcur"><a href="<?=base_path; ?>currency_data/<?=base64_encode($curr->id); ?>" id="c_data_<?=$i; ?>"><img src="<?=$src_da; ?>" style="width: 38px;" id="c_image_<?=$i?>" class="c_images1" value="<?=$i?>"><?=$curr->country; ?></a></li> -->

                        <!-- <a class="dropdown-item" href="<?=base_path; ?>currency_data/<?=base64_encode($curr->id); ?>" id="c_data_<?=$i; ?>"><img src="<?=$src_da; ?>" style="width: 38px;" id="c_image_<?=$i?>" class="c_images1"
                            value="<?=$i?>"><?=$curr->country; ?></a> -->
                        <a class="dropdown-item" href="<?=base_path; ?>currency_data/<?=base64_encode($curr->id); ?>" id="c_data_<?=$i; ?>"><?=$curr->country; ?></a>
                        <?php $i++;
                      }
                  } ?>

                      </div>
                    </div>


                    <!-- <ul class="notes">
                    <?php
                    $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active', 1)->get();

                    if (!empty($currency)) {
                        $i=0;
                        foreach ($currency as $curr) {
                            $c_code= App\frontendmodel\CountryCode::where('nicename', $curr->country)->first();

                            if (!empty($c_code)) {
                                $iso= $c_code->iso;
                                $lower_iso_code= strtolower($iso);
                                $src_da= 'https://api.hostip.info/images/flags/'.$lower_iso_code.'.gif';
                            } else {
                                $iso= "";
                                $lower_iso_code= "";
                                $src_da= "";
                            } ?>
                    <li class="showcur"><a href="<?=base_path; ?>currency_data/<?=base64_encode($curr->id); ?>" id="c_data_<?=$i; ?>"><img src="<?=$src_da; ?>" style="width: 38px;" id="c_image_<?=$i?>" class="c_images1" value="<?=$i?>"><?=$curr->country; ?></a></li>

                    <?php $i++;
                        }
                    } ?>

                </ul> -->
                  </li>
                </ul>
              </div>
              <script type="text/javascript">
                function myFunction(x) {
                  alert(x);
                  // var x = document.getElementById("c_data_"+x).value;
                }
                // $(document).ready(function(){
                //
                //   var v=$(".c_images1").attr("value");
                //   $("#c_data_"+v).click(function(){
                //     alert(v);
                //
                //     var a=$("#c_image_"+v).attr("src");
                //     var t=$("#c_image_"+v).attr("text");
                //     alert(t);
                //     alert(a);
                //     var b=$("#country_image").attr("src",a);
                //     alert(b);
                //   });
                // });
              </script>

              <ul class="menu-utility-user ">
                <li class="user-info">
                  <!-- cart popup model start -->

            </div>
          </div>
          <style>
            .dropdown-menu {
              min-width: 39px !important;
            }

            .pro_ul li {
              color: white;
              white-space: normal;
              background: black !important;
            }

            .pro_ul {
              margin-left: 1rem;
              margin-top: 11rem;
            }

            @media (max-width: 1326px) {
              .setlogo {
                padding: 6px !important;
              }

              .reslogo {
                width: 20% !important;
              }
            }

            @media (max-width:650px) {
              .reslogo {
                width: 23% !important;
              }
            }

            @media (max-width:567px) {
              .reslogo {
                width: 25% !important;
              }
            }

            @media (max-width:530px) {
              .reslogo {
                width: 26% !important;
              }
            }

            @media (max-width:490px) {
              .reslogo {
                width: 50% !important;
              }
            }

            @media (max-width:441px) {
              .reslogo {
                width: 45% !important;
              }
            }

            @media (max-width:405px) {
              .reslogo {
                width: 45% !important;
              }
            }

            @media (max-width:375px) {
              .reslogo {
                width: 47% !important;
              }
            }

            @media (max-width:360px) {
              .reslogo {
                width: 47% !important;
              }
            }

            @media (max-width:992px) {
              .crncy {
                /* display: none !important; */
              }
            }

            @media (min-width:991px) {
              .mini-cart-link {
                line-height: 0px !important;
              }

              .minicart-quantity {
                top: -7px !important;
                right: -6px !important;
              }
            }
          </style>

          <div class="row searc">
            <div class="col divpro">

              <!-- <ul class="pro_ul" id="serc" style="z-index:1">

      </ul> -->
            </div>
          </div>
        </div>





        <div class="logo-bar-left">
          <button class="menu-toggle"><i class="menu-icon fa fa-bars"></i><span class="visually-hidden">Menu</span>
          </button>
        </div>

        <div class="center" style="position: static;z-index:999">
          <a style="width: 60% !important;display:flex;align-items:center;margin:auto; margin-top:-3rem;flex-direction: column;" href="<?=base_path?>" class="logo reslogo">
            <img style="width: 20.5rem !important; margin-top: 6.1rem;" src="<?=base_path?>frontend/assets/img/header_logo3.jpg" />
            <!-- <img style="width: 15rem !important; height: 2.5rem; margin-top:7rem" src="<?=base_path?>frontend/assets/img/jewl/logopart2.png"/> -->
            <!-- <p class="setlogo">Gemx Jewellery</p> -->
          </a>
        </div>
        <style>
          .setlogo {
            font-size: 15px !important;
            margin: 0 !important;
            z-index: 999;
          }

          .user-account {
            margin-top: -0.1rem;
            /* padding-right: 1.5rem; */

          }

          @media (max-width:360px) {
            #headersearchbtn {
              /* margin-left: 1.5rem; */
            }
          }
        </style>
        <div class="header_right">
          <div class="top_name mobhide">
            <?php if (empty(Session::get('user_data'))) {?>
            <a class="user-account" href="<?=base_path?>open_login" title="login/register" data-auth="false">
              <!-- <i class="fa fa-user" style="font-size: 22px !important;"></i> -->
              <span icon-color="black">
                <img src="https://www.monicavinader.com/images/2020/account-black.svg" width="28px" height="20px" class="" alt="">
              </span>
              <!-- <span >LOGIN/REGISTER</span> -->
            </a>
            <?php } else {?>
            <a class="user-account" href="" data-auth="false">
              <span icon-color="black">
                <img src="https://www.monicavinader.com/images/2020/account-black.svg" width="28px" height="20px" class="" alt="">
              </span>
              <span class="float-right ml-1  first_name top_name">
                <?php
$usr_id = Session::get('user_id');
$user_das= App\frontendmodel\User::wherenull('deleted_at')->where('is_active', 1)->where('id', $usr_id)->first();
?>
                <span class="" style="color:#1f0b00;"> <?php if (!empty($user_das)) {
    echo $user_das->name;
} else {
    echo "No name";
}?>&nbsp;<i class="fa fa-angle-down" aria-hidden="true"></i>
                </span>
            </a>

            <div class="hover_name">
              <a href="<?=base_path?>user_profile">
                <div>My Account</div>
              </a>

              <a href="<?=base_path?>my_orders">
                <div>My Orders</div>
              </a>

              <a href="<?=base_path?>logout">
                <div class="log">Logout</div>
              </a>
            </div>

            </span>

            <?php } ?>
            <!-- <span class="hidden">My Account</span> -->
          </div>
          </li>
          </ul>
          <!-- <div class="menu-utility-wishlist" style="margin-left:0px;">
            <?php if (!empty(Session::get('user_data'))) {?>
            <a class="user-wishlist" data-items="" href="<?=base_path?>get_wishlist" title="My Wishlist">
              <i class="fa fa-heart" style="font-size: 22px !important;"></i>
              <span>My Wishlist</span>

              <?php

$user_iddd= Session::get('user_id');

$wish_datass=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_iddd)->count();


?>

              <span class="wishlist-quantity"><?=$wish_datass;?></span>
            </a>
            <?php } ?>
          </div> -->


          <!-- <div class="menu-utility-wishlist" style="margin-left:0px;">
            <?php if (!empty(Session::get('user_data'))) {?>
            <a class="user-wishlist" data-items="" href="<?=base_path?>get_wishlist" title="My Wishlist">
              <i class="fa fa-heart" style="font-size: 22px !important;"></i>
              <span>My Wishlist</span>

              <?php

          $user_iddd= Session::get('user_id');

          $wish_datass=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_iddd)->count();


          ?>

              <span class="wishlist-quantity"><?=$wish_datass;?></span>
            </a>
            <?php } ?>
          </div> -->








          <div style="padding: 0px 8px;">
            <span icon-color="black" style="">
              <img id="headersearchbtn" src="https://www.monicavinader.com/images/2020/search-black.svg" width="28px" height="20px" class="" alt="">
            </span>
          </div>
          <div id="mini-cart" class="bfx-price-container">
            <!-- Report any requested source code -->
            <!-- Report the active source code -->

            <div class="mini-cart-total">


              <?php if (empty(Session::get('user_data'))) {
    // session()->flush();
    $cart_data = session('cart_data');
    // print_r($cart_data); die();
    if (!empty($cart_data)) {
        $count = count($cart_data);
    }else{
      $count = 0;
    } ?>
    <a class="mini-cart-link" style="cursor: default;" href="<?=base_path?>view_cart" title="View Your Shopping Bag">
                 <!-- href="<?=base_path?>view_cart" b="" -->
                <!-- <i class="minicart-icon fa fa-shopping-bag"></i> -->
                <span icon-color="black">
                  <img src="https://www.monicavinader.com/images/2020/basket-black.svg" width="28px" height="20px" class="" alt="">
                </span>
                <span class="minicart-quantity" id="totalCartItems">
                  <?if (!empty($count)) {
        echo $count;
    } else {
        echo "0";
    } ?>
                </span>


              </a>

              <?php
} else { ?>

              <?php
$user_id= Session::get('user_id');
$total_cart_count= App\frontendmodel\Cart::wherenull('deleted_at')->where('user_id', $user_id)->count();
// echo $total_cart_count; die();
?>


              <a class="mini-cart-link" >
                <!-- href="<?=base_path?>view_cart" b="" -->
                <span icon-color="black">
                  <img src="https://www.monicavinader.com/images/2020/basket-black.svg" width="28px" height="20px" class="" alt="">
                </span>
                <span class="minicart-quantity" id="totaltblCartItems">
                  <?php
      if (!empty($total_cart_count)) {
          echo $total_cart_count;
      } else {
          echo "0";
      }
?>
                </span>

              </a>
              <?php } ?>

              <!-- show success and error messages -->
              @if (session('status'))
              <div class="alert alert-success mobilere" role="alert" id="status" style="position:absolute;font-size:10px; top:24px;z-index:1050;right:1px;">
                {{ session('status') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </div>
              @endif
              @if (session('status-error'))
              <div class="alert alert-danger mobilere1" role="alert" id="status-error" style="position:absolute; font-size:10px; top:24px;z-index:1050;right:1px;">
                {{ session('status-error') }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </div>
              @endif
              <!-- End show success and error messages -->

            </div>


            <!-- cart popup model start -->

            <?php if (empty(Session::get('user_data'))) { ?>

            <!-- LocalCart (before login) -->
            <?$cart_data = session('cart_data');?>
            <div class="mini-cart-content" data-minicart="null"  id="h_scart">
              <div class="mini-cart-header">
                Your Shopping Bag
              </div>
              <div class="mini-cart-products">
                <form name="dwfrm_cart" id="minicart-items-form" novalidate="novalidate">
                  <fieldset>
                    <div class="mini-cart-product bfx-minicart-product bfx-price-product" id="cart_items_popup_body">
                      <?php
                  $j=0; $cart_totalamount=0;
                  // print_r($cart_data); die();
                  if (!empty($cart_data)) {
                      foreach ($cart_data as $cart) {?>

                      <?php
                    //-------------normal products-------------//

                      if ($cart['status'] == 0) {
                          $product= App\adminmodel\Product::wherenull('deleted_at')->where('id', $cart['product_id'])->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_active', 1)->first();

                          if (!empty($product)) {
                              $productcolorsizeimg= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('product_id', $cart['product_id'])->where('color_id', $cart['color_id'])->where('is_active', 1)->first();

                              if (!empty($productcolorsizeimg)) {
                                  $img= $productcolorsizeimg->image1;
                                  $productcolorsizeprices= $productcolorsizeimg->price;
                              } else {
                                  $img= "";
                                  $productcolorsizeprices= 0;
                              }

                              //get color

                              $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $cart['color_id'])->first();

                              if (!empty($color_da)) {
                                  $clr_name= $color_da->name;
                              } else {
                                  $clr_name= "N/A";
                              } ?>

                      <hr>
                      <div>
                      <input type="hidden" name="dwfrm_cart_shipments_i0_items_i0_quantity" value="1">
                      <div class="col-md-12" style="">
                      <div class="mini-cart-image"   style="margin-top:10px;"`accesskey=""`>
                        <img width="114" height="144" src="<?=base_path.$img;?>">
                        <div class="ordersummary-engraving-details">
                        </div>
                      </div>

                      <div class="mini-cart-product-details" style="margin-top:10px;">
                        <div class="product-list-item">
                          <span class="not-available">
                          </span>
                          <div class="name bfx-product-name title-s"><?=$product->name; ?></div>
                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s" style="color:black;">Color: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">
                              <?=$clr_name; ?>
                            </span>
                          </div>
                        </div>
                        <div class="mini-cart-qty text-s">
                          <span class="label text-s" style="text-transform: uppercase;">Quantity: </span>
                          <span class="value bfx-minicart-product-qty"><?=$cart['quantity']; ?></span>
                        </div>
                        <div class="mini-cart-pricing">
                          <div class="product-price title-s">

                            <div>
                              <span class="visually-hidden bfx-list-price bfx-price">
                                           
                                <?=$sign; ?>
                                <?php
                     if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
                         echo number_format((float) ($productcolorsizeprices * $cart['quantity']) * $currency_price, 2, '.', '');
                     } ?>

                              </span>
                                <span class="label"  style="font-weight:bold;">Price: </span>
                              <span class="price-sales bfx-price bfx-sales-price" style="">

                                <?=$sign; ?>
                                <?php
                      if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
                          echo number_format((float) ($productcolorsizeprices * $cart['quantity']) * $currency_price, 2, '.', '');
                      } ?>

                              </span>
                            </div>

                          </div>

                        </div>


                        <div class="mini-cart-edit">

                          <!-- <button class="btn btn-remove" type="submit" value="Remove" name="dwfrm_cart_shipments_i0_items_i0_deleteProduct" onclick="removeFromTblCartPop(<?=$product->id; ?>)" >Remove</button> -->
                        </div>
                      </div>
                      </div>


                    </div>


                      <!-- <div class="minicart-engraving-details"></div> -->

                      <?php

                       if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
                           $total_quantity_price= $productcolorsizeprices * $cart['quantity'];
                       } else {
                           $total_quantity_price = 0;
                       }

                              $cart_totalamount = $cart_totalamount + $total_quantity_price; ?>


                      <?php
                          }
                      } ?>


                      <?php

                    //-------------customize cart product-------------//

                    if ($cart['status'] == 1) {
                        $custom_product= App\adminmodel\CustomizeProduct::wherenull('deleted_at')->where('id', $cart['product_id'])->where('is_active', 1)->first();

                        if (!empty($custom_product)) {
                            $productmetalstoneimg= App\adminmodel\CustomizeProductStone::wherenull('deleted_at')->where('product_id', $cart['product_id'])->where('name', $cart['stone'])->where('cust_metal_id', $cart['metal'])->where('is_active', 1)->first();

                            if (!empty($productmetalstoneimg)) {
                                $custimg= $productmetalstoneimg->stone_product_image;
                                $productcolorsizeprice= $productmetalstoneimg->price;
                            } else {
                                $custimg= "";
                                $productcolorsizeprice= 0;
                            } ?>


                          <hr>
                      <input type="hidden" name="dwfrm_cart_shipments_i0_items_i0_quantity" value="1">
                      <div class="col-md-12 mt-3">
                      <div class="mini-cart-image">
                        <img width="114" height="144" src="<?=base_path.$custimg; ?>">
                        <div class="ordersummary-engraving-details">
                        </div>
                      </div>

                      <div class="mini-cart-product-details"  style="margin-top:10px;">
                        <div class="product-list-item">
                          <span class="not-available">
                          </span>
                          <div class="name bfx-product-name title-s"><?=$custom_product->name; ?></div>
                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Metal: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?php

                                                            $metal_da= App\adminmodel\CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $cart['metal'])->first();
                            if (!empty($metal_da)) {
                                $metal_id= $metal_da->id;
                                $metal_name= $metal_da->name;
                                $metal_image= $metal_da->image;
                            } else {
                                $metal_id= "";
                                $metal_name= "";
                                $metal_image= "";
                            }

                            echo $metal_name; ?>

                            </span>
                          </div>
                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Size: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">
                              <?=$cart['stone']; ?>
                            </span>
                          </div>
                        </div>
                        <div class="mini-cart-qty text-s">
                          <span class="label" style="color:black;">Quantity:</span>
                          <span class="value bfx-minicart-product-qty"><?=$cart['quantity']; ?></span>
                        </div>
                        <div class="mini-cart-pricing">
                          <div class="product-price title-s">
                            <div>
                              <span class="label" style="color:black !important;">Price: </span>
                              <span class="visually-hidden bfx-list-price bfx-price">
                                            
                                <?=$sign; ?>

                                <?php if ($productcolorsizeprice != "" && $productcolorsizeprice != null) {
                                echo number_format((float) ($productcolorsizeprice * $cart['quantity']) * $currency_price, 2, '.', '');
                            } ?>

                              </span>
                              <span class="price-sales bfx-price bfx-sales-price">

                                <?=$sign; ?>

                                <?php if ($productcolorsizeprice != "" && $productcolorsizeprice != null) {
                                echo number_format((float) ($productcolorsizeprice * $cart['quantity']) * $currency_price, 2, '.', '');
                            } ?>

                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- <hr> -->
                        <div class="mini-cart-edit">

                          <!-- <button class="btn btn-remove" type="submit" value="Remove" name="dwfrm_cart_shipments_i0_items_i0_deleteProduct" onclick="removeFromTblCartPop(<?=$custom_product->id; ?>)" >Remove</button> -->
                        </div>
                      </div>
                    </div>


                      <!-- <div class="minicart-engraving-details"></div> -->


                      <?php

                           if ($productcolorsizeprice != "" && $productcolorsizeprice != null) {
                               $total_quantity_price= $productcolorsizeprice * $cart['quantity'];
                           } else {
                               $total_quantity_price = 0;
                           }

                            $cart_totalamount = $cart_totalamount + $total_quantity_price; ?>


                      <?php
                        }
                    } ?>

                      <?php
                    //-------------engrave cart product-------------//

                    if ($cart['status'] == 2) {
                        $engrave_product= App\adminmodel\EngraveProduct::wherenull('deleted_at')->where('id', $cart['product_id'])->where('is_active', 1)->first();

                        if (!empty($engrave_product)) {
                            if (!empty($engrave_product->image)) {
                                $custimg= base_path.$engrave_product->image;
                            } else {
                                $custimg= "";
                            } ?>



<!-- <hr> -->
                      <div class="col-md-12 mt-3">

                        <input type="hidden" name="dwfrm_cart_shipments_i0_items_i0_quantity" value="1">
                      <div class="mini-cart-image">
                        <img width="114" height="144" src="<?=$custimg; ?>">
                        <div class="ordersummary-engraving-details">
                        </div>
                      </div>

                      <div class="mini-cart-product-details">
                        <div class="product-list-item">
                          <span class="not-available">
                          </span>
                          <div class="name bfx-product-name title-s"><?=$engrave_product->name; ?></div>
                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Text: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?php echo $cart['engrave_text']; ?>

                            </span>
                          </div>

                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Font Family: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?=$cart['font_family']; ?>

                            </span>
                          </div>

                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Font Size: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?=$cart['font_size']."px"; ?>

                            </span>
                          </div>

                        </div>
                        <div class="mini-cart-qty text-s">
                          <span class="label" style="color:black;">Quantity: </span>
                          <span class="value bfx-minicart-product-qty"><?=$cart['quantity']; ?></span>
                        </div>
                        <div class="mini-cart-pricing">
                          <div class="product-price title-s">
                            <div>
                              <span class="visually-hidden bfx-list-price bfx-price">
<span class="label" style="color:black !important;">Price: </span> 
                                <?php

                      $productcolorsizeprices= $engrave_product->base_price;

                            if (!empty($productcolorsizeprices)) {
                                $productcolorsizeprice= $productcolorsizeprices;
                            } else {
                                $productcolorsizeprice= 0;
                            } ?>

                                  
                                <?=$sign; ?>
                                <?php if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
                                echo number_format((float) ($productcolorsizeprice * $cart['quantity']) * $currency_price, 2, '.', '');
                            } ?>
                              </span>
                              <span class="price-sales bfx-price bfx-sales-price">
                                <?=$sign; ?>
                                <?php if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
                                echo number_format((float) ($productcolorsizeprice * $cart['quantity']) * $currency_price, 2, '.', '');
                            } ?>

                              </span>
                            </div>
                          </div>
                        </div>
<!-- <hr> -->
                        <div class="mini-cart-edit">
                          <!-- <button class="btn btn-remove" type="submit" value="Remove" name="dwfrm_cart_shipments_i0_items_i0_deleteProduct" onclick="removeFromTblCartPop(<?=$engrave_product->id; ?>)" >Remove</button> -->
                        </div>
                      </div>
                    </div>


                      <!-- <div class="minicart-engraving-details"></div> -->



                      <?php

                      if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
                          $total_quantity_price= $productcolorsizeprice * $cart['quantity'];
                      } else {
                          $total_quantity_price = 0;
                      }

                            $cart_totalamount = $cart_totalamount + $total_quantity_price; ?>


                      <?php
                        }
                    } ?>



                      <?php }
                  } ?>



                    </div>

                    <input type="hidden" name="dwfrm_cart_updateCart" value="dwfrm_cart_updateCart">
                    <input type="hidden" name="csrf_token" value="">
                    <!-- Modal for engraved general information -->
                    <div id="engraved-wrapper">
                      <div class="engraved-content-preview">
                        <img src="" alt="Engraved" title="Engraved">
                      </div>
                      <div class="engraved-actions">
                        <button type="button" class="btn btn-cancel" value="product.engraving.cancel">
                          Close
                        </button>
                      </div>
                    </div>
                  </fieldset>
                </form>
              </div>
              <div class="mini-cart-totals">
                <div class="mini-cart-subtotals">
                  <span class="label" style="float:left; font-size:15px;">Subtotal</span>
                  <span class="value bfx-minicart-total bfx-price" style="font-size:20px !important;color:black;">$<span id="subtotal_pop" >
                      <?if (!empty($cart_totalamount)) {
                      echo $cart_totalamount.".00";
                  } else {
                      echo "0.00";
                  }?>
                    </span></span>
                </div>
                <div class="mini-cart-slot"> </div>
              <!-- <hr> -->

                <a class="btn btn-checkout js-checkout-enabled primary-submit-btn btn-small" href="<?=base_path?>view_cart" title="View Cart">
                  <i class="fa fa-lock"></i> View Cart
                </a>

                <a href="#" title="View Bag" class="btn btn-lg view-bag btn-outlined hidden">
                  View Bag
                </a>
              </div>
            </div>

            <!-- LocalCart (before login) -->

            <?php } else {
                      $user_id= Session::get('user_id');
                      $cart_data = App\frontendmodel\Cart::wherenull('deleted_at')->where('user_id', $user_id)->get(); ?>

            <!-- UserCart (after login) -->

            <div class="mini-cart-content" data-minicart="null" id="h_cart">
              <div class="mini-cart-header">
                Your Shopping Bag
              </div>
              <div class="mini-cart-products">
                <form action="#" method="post" name="dwfrm_cart" id="minicart-items-form" novalidate="novalidate">

                  <fieldset>
                    <div class="mini-cart-product bfx-minicart-product bfx-price-product">

                      <?php
  $j=0;
                      $cart_totalamount=0;
                      // print_r($cart_data); die();
                      if (!empty($cart_data)) {
                          foreach ($cart_data as $cart) {
                              ?>



                      <?php
  //-------------normal products-------------//

  if ($cart->status == 0) {
      $product= App\adminmodel\Product::wherenull('deleted_at')->where('id', $cart->product_id)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_active', 1)->first();

      if (!empty($product)) {
          $productcolorsizeimg= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('product_id', $cart->product_id)->where('color_id', $cart->color_id)->where('is_active', 1)->first();

          if (!empty($productcolorsizeimg)) {
              $img= $productcolorsizeimg->image1;
              $productcolorsizeprices= $productcolorsizeimg->price;
          } else {
              $img= "";
              $productcolorsizeprices= 0;
          }

          //get color

          $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $cart->color_id)->first();

          if (!empty($color_da)) {
              $clr_name= $color_da->name;
          } else {
              $clr_name= "N/A";
          } ?>




                      <input type="hidden" name="dwfrm_cart_shipments_i0_items_i0_quantity" value="1">
                      <div class="mini-cart-image"   style="margin-top:10px;">
                        <img width="114" height="144" src="<?=base_path.$img; ?>">
                        <div class="ordersummary-engraving-details">
                        </div>
                      </div>

                      <div class="mini-cart-product-details"  style="margin-top:10px;">
                        <div class="product-list-item">
                          <span class="not-available">
                          </span>
                          <div class="name bfx-product-name title-s"><?=$product->name; ?></div>
                          <div class="sku visually-hidden">
                            <span class="label">Item No.: </span>
                            <span class="value bfx-sku">842177190708</span>
                          </div>
                          <div class="gtmAddAllToCart visually-hidden">
                            <span class="addType">null</span>
                            <span class="addLocation">null</span>
                          </div>
                          <div class="attribute text-s" data-attribute="stoneColor">
                            <span class="label text-s">Color</span>
                            <span class="value bfx-product-color text-s" data-valueid="530">
                              Lilac Abalone
                            </span>
                          </div>
                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Color: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">
                              <?=$clr_name; ?>
                            </span>
                          </div>
                        </div>
                        <div class="mini-cart-qty text-s">
                          <span class="label" style="text-transform:uppercase;">Quantity: </span>
                          <span class="value bfx-minicart-product-qty"><?=$cart->quantity; ?></span>
                        </div>
                        <div class="mini-cart-pricing">
                          <div class="product-price title-s">
                            <div>
                              <span class="visually-hidden bfx-list-price bfx-price" style="font-weight:bold;">
                              pRICE:             

                                <?=$sign; ?>
                                <?php
  if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
      echo number_format((float) ($productcolorsizeprices * $cart->quantity) * $currency_price, 2, '.', '');
  } ?>

                              </span>
                              <span class="price-sales bfx-price bfx-sales-price"  style="font-weight:bold;">
pRICE:   
                                <?=$sign; ?>
                                <?php
  if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
      echo number_format((float) ($productcolorsizeprices * $cart->quantity) * $currency_price, 2, '.', '');
  } ?>

                              </span>
                            </div>
                          </div>
                        </div>
                        <!-- <hr> -->
                        <div class="mini-cart-addType visually-hidden">
                          null
                        </div>
                        <div class="mini-cart-addLocation visually-hidden">
                          null
                        </div>
                        <div class="mini-cart-edit">

                          <!-- <button class="btn btn-remove" type="submit" value="Remove" name="dwfrm_cart_shipments_i0_items_i0_deleteProduct" onclick="removeFromTblCartPop(<?=$cart->id; ?>,<?=$product->id; ?>)" >Remove</button> -->
                        </div>
                      </div>

                      <!-- <div class="minicart-engraving-details"></div> -->

                      <?php

  if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
      $total_quantity_price= $productcolorsizeprices * $cart->quantity;
  } else {
      $total_quantity_price = 0;
  }

          $cart_totalamount = $cart_totalamount + $total_quantity_price; ?>


                      <?php
      }
  } ?>





                      <?php

  //-------------customize cart product-------------//

  if ($cart->status == 1) {
      $custom_product= App\adminmodel\CustomizeProduct::wherenull('deleted_at')->where('id', $cart->product_id)->where('is_active', 1)->first();

      if (!empty($custom_product)) {
          $productmetalstoneimg= App\adminmodel\CustomizeProductStone::wherenull('deleted_at')->where('product_id', $cart->product_id)->where('name', $cart->stone)->where('cust_metal_id', $cart->metal)->where('is_active', 1)->first();

          if (!empty($productmetalstoneimg)) {
              $custimg= $productmetalstoneimg->stone_product_image;
              $productcolorsizeprice= $productmetalstoneimg->price;
          } else {
              $custimg= "";
              $productcolorsizeprice= 0;
          } ?>




                      <input type="hidden" name="dwfrm_cart_shipments_i0_items_i0_quantity" value="1">
                      <div class="mini-cart-image">
                        <img width="114" height="144" src="<?=base_path.$custimg; ?>">
                        <div class="ordersummary-engraving-details">
                        </div>
                      </div>

                      <div class="mini-cart-product-details">
                        <div class="product-list-item">
                          <span class="not-available">
                          </span>
                          <div class="name bfx-product-name title-s"><?=$custom_product->name; ?></div>
                          <div class="sku visually-hidden">
                            <span class="label">Item No.: </span>
                            <span class="value bfx-sku">842177190708</span>
                          </div>
                          <div class="gtmAddAllToCart visually-hidden">
                            <span class="addType">null</span>
                            <span class="addLocation">null</span>
                          </div>
                          <div class="attribute text-s" data-attribute="stoneColor">
                            <span class="label text-s">Color</span>
                            <span class="value bfx-product-color text-s" data-valueid="530">
                              Lilac Abalone
                            </span>
                          </div>
                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Metal: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?php

                              $metal_da= App\adminmodel\CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $cart->metal)->first();
          if (!empty($metal_da)) {
              $metal_id= $metal_da->id;
              $metal_name= $metal_da->name;
              $metal_image= $metal_da->image;
          } else {
              $metal_id= "";
              $metal_name= "";
              $metal_image= "";
          }

          echo $metal_name; ?>

                            </span>
                          </div>
                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Size: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">
                              <?=$cart->stone; ?>
                            </span>
                          </div>
                        </div>
                        <div class="mini-cart-qty text-s">
                          <span class="label">Quantity: </span>
                          <span class="value bfx-minicart-product-qty"><?=$cart->quantity; ?></span>
                        </div>
                        <div class="mini-cart-pricing">
                          <div class="product-price title-s">
                            <div>
                              <span class="visually-hidden bfx-list-price bfx-price">
                                      
                                <?=$sign; ?>

                                <?php if ($productcolorsizeprice != "" && $productcolorsizeprice != null) {
              echo number_format((float) ($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', '');
          } ?>

                              </span>
                              <span class="price-sales bfx-price bfx-sales-price">

                                <?=$sign; ?>

                                <?php if ($productcolorsizeprice != "" && $productcolorsizeprice != null) {
              echo number_format((float) ($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', '');
          } ?>

                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="mini-cart-addType visually-hidden">
                          null
                        </div>
                        <div class="mini-cart-addLocation visually-hidden">
                          null
                        </div>
                        <div class="mini-cart-edit">

                          <!-- <button class="btn btn-remove" type="submit" value="Remove" name="dwfrm_cart_shipments_i0_items_i0_deleteProduct" onclick="removeFromTblCartPop(<?=$cart->id; ?>,<?=$custom_product->id; ?>)">Remove</button> -->
                        </div>
                      </div>


                      <!-- <div class="minicart-engraving-details"></div> -->


                      <?php

  if ($productcolorsizeprice != "" && $productcolorsizeprice != null) {
      $total_quantity_price= $productcolorsizeprice * $cart->quantity;
  } else {
      $total_quantity_price = 0;
  }

          $cart_totalamount = $cart_totalamount + $total_quantity_price; ?>


                      <?php
      }
  } ?>





                      <?php
  //-------------engrave cart product-------------//

  if ($cart->status == 2) {
      $engrave_product= App\adminmodel\EngraveProduct::wherenull('deleted_at')->where('id', $cart->product_id)->where('is_active', 1)->first();

      if (!empty($engrave_product)) {
          if (!empty($engrave_product->image)) {
              $custimg= $engrave_product->image;
          } else {
              $custimg= "";
          } ?>




                      <input type="hidden" name="dwfrm_cart_shipments_i0_items_i0_quantity" value="1">
                      <div class="mini-cart-image">
                        <img width="114" height="144" src="<?=base_path.$custimg; ?>">
                        <div class="ordersummary-engraving-details">
                        </div>
                      </div>

                      <div class="mini-cart-product-details">
                        <div class="product-list-item">
                          <span class="not-available">
                          </span>
                          <div class="name bfx-product-name title-s"><?=$engrave_product->name; ?></div>
                          <div class="sku visually-hidden">
                            <span class="label">Item No.: </span>
                            <span class="value bfx-sku">842177190708</span>
                          </div>
                          <div class="gtmAddAllToCart visually-hidden">
                            <span class="addType">null</span>
                            <span class="addLocation">null</span>
                          </div>
                          <div class="attribute text-s" data-attribute="stoneColor">
                            <span class="label text-s">Color</span>
                            <span class="value bfx-product-color text-s" data-valueid="530">
                              Lilac Abalone
                            </span>
                          </div>

                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Text: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?php echo $cart->engrave_text; ?>

                            </span>
                          </div>

                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Font Family: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?=$cart->font_family; ?>

                            </span>
                          </div>

                          <div class="attribute text-s" data-attribute="size">
                            <span class="label text-s">Font Size: </span>
                            <span class="value bfx-product-size text-s" datavalueid="00015">

                              <?=$cart->font_size."px"; ?>

                            </span>
                          </div>

                        </div>
                        <div class="mini-cart-qty text-s">
                          <span class="label">Quantity: </span>
                          <span class="value bfx-minicart-product-qty"><?=$cart->quantity; ?></span>
                        </div>
                        <div class="mini-cart-pricing">
                          <div class="product-price title-s">
                            <div>
                              <span class="visually-hidden bfx-list-price bfx-price">

                                <?php

  $productcolorsizeprices= $engrave_product->base_price;

          if (!empty($productcolorsizeprices)) {
              $productcolorsizeprice= $productcolorsizeprices;
          } else {
              $productcolorsizeprice= 0;
          } ?>

                                         
                                <?=$sign; ?>
                                <?php if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
              echo number_format((float) ($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', '');
          } ?>

                              </span>
                              <span class="price-sales bfx-price bfx-sales-price">

                                <?=$sign; ?>
                                <?php if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
              echo number_format((float) ($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', '');
          } ?>

                              </span>
                            </div>
                          </div>
                        </div>
                        <div class="mini-cart-addType visually-hidden">
                          null
                        </div>
                        <div class="mini-cart-addLocation visually-hidden">
                          null
                        </div>
                        <div class="mini-cart-edit">

                          <!-- <button class="btn btn-remove" type="submit" value="Remove" name="dwfrm_cart_shipments_i0_items_i0_deleteProduct" onclick="removeFromTblCartPop(<?=$cart->id; ?>,<?=$engrave_product->id; ?>)">Remove</button> -->
                        </div>
                      </div>


                      <!-- <div class="minicart-engraving-details"></div> -->



                      <?php

  if ($productcolorsizeprices != "" && $productcolorsizeprices != null) {
      $total_quantity_price= $productcolorsizeprice * $cart->quantity;
  } else {
      $total_quantity_price = 0;
  }

          $cart_totalamount = $cart_totalamount + $total_quantity_price; ?>


                      <?php
      }
  } ?>



                      <?php $j++;
                          }
                      } else { ?>

                      No Cart Available.


                      <?php } ?>


                    </div>
                    <!-- <hr> -->
                    <input type="hidden" name="dwfrm_cart_updateCart" value="dwfrm_cart_updateCart">
                    <input type="hidden" name="csrf_token" value="">
                    <!-- Modal for engraved general information -->
                    <div id="engraved-wrapper">
                      <div class="engraved-content-preview">
                        <img src="" alt="Engraved" title="Engraved">
                      </div>
                      <div class="engraved-actions">
                        <button type="button" class="btn btn-cancel" value="product.engraving.cancel">
                          Close
                        </button>
                      </div>
                    </div>
                  </fieldset>


                </form>
              </div>



              <div class="mini-cart-totals">
                <div class="mini-cart-subtotals">
                  <span class="label" style="float:left !important;">Subtotal</span>
                  <span class="value bfx-minicart-total bfx-price " style="color:black !important;">
                    <?=$sign; ?>
                    <?=number_format((float)$cart_totalamount * $currency_price, 2, '.', ''); ?>

                  </span>
                </div>
                <!-- <div class="mini-cart-slot"> </div> -->
                <!-- <hr> -->


                <a class="btn btn-checkout js-checkout-enabled primary-submit-btn btn-small" href="<?=base_path?>view_cart" title="View Cart">
                  <i class="fa fa-lock"></i> View Cart
                </a>


                <a href="#" title="View Bag" class="btn btn-lg view-bag btn-outlined hidden">
                  View Bag
                </a>
              </div>


            </div>

            <!-- UserCart (after login) -->

            <?php
                  } ?>


            <!-- cart popup model end -->

          </div>
          <div class="menu-utility-wishlist" style="    margin-left: 5px;
    margin-top: -4px;">
            <?php if (!empty(Session::get('user_data'))) {?>
            <a class="user-wishlist" data-items="" href="<?=base_path?>get_wishlist" title="My Wishlist">
              <i class="fa fa-heart" style="font-size: 22px !important;"></i>
              <span>My Wishlist</span>

              <?php

$user_iddd= Session::get('user_id');

$wish_datass=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_iddd)->count();


?>

              <span class="wishlist-quantity"><?=$wish_datass;?></span>
            </a>
            <?php } ?>
          </div>
          <!-- </div> -->
          <!-- Search Style -->
          <style>
            /* #searchinput
{
position:absolute;
-webkit-transform:translate(0,-50%);
width:3rem;
height:3rem;
border-style:none;
border-radius:20px;
padding:10px;
background-color:#081925;
outline:none;
transition-duration:500ms;
cursor:pointer;
background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAAAXNSR0IArs4c6QAAAARnQU1BAACxjwv8YQUAAAAJcEhZcwAADsMAAA7DAcdvqGQAAAAadEVYdFNvZnR3YXJlAFBhaW50Lk5FVCB2My41LjExR/NCNwAAAWpJREFUWEfNljFOxDAQRbehoKDnIjTcgYtwAHpOwhE4BA3Vig6Je9ABYZ60kZbVc5xkifRHelrleRzP2rGT3TAM0ahMQmUSKpNQmYTKJFQmoTIJlUmonMFlcV88FW/F5+GXazzt1m8xKjvcFh/FVNBOnvVfhMoJHorvgtgXzNZNcXX45RpPkEe+3Wc2KhswIwz6VTwWF4Xl4Wknj/yzZlKlwDM1LiuDW84p5BH0W/1MqhRYOoLla83cKeSNy01/y+miUmB3EksHGv8Y/a29i0qBI4RgI1h7C/IJ+lt7F5UC5xzBbrX2FuQT9Lf2LiqF+BmMfwbHgWJ3cfw5CEvfJD8FcVdY3ixUTrDkXTzGe3Fd2P26qOww92uGmaM4YnWRKmfAM8VssTs5QlrfgxR1VpEq/5mzilS5AauLVLkRq4pUuSHHRb4WlvMHlRtDkS/F85FrojIJlUmoTEJlEiqTUJmEyiRUJqEyh2H3Cz4WH1fC57RBAAAAAElFTkSuQmCC);
background-repeat:no-repeat;
background-size: 3rem;
font-family:'Segoe UI';
font-size:15px;
color:transparent;
overflow:hidden;
}
#searchinput:focus
{
width:200px;
cursor:text;
padding-left: 30px;
color:#A0A0A0;
} */
            /* #searchinput:hover,#searchinput:focus
{
background-color:#081925;
background-image:url(data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACgAAAAoCAYAAACM/rhtAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAAN1wAADdcBQiibeAAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAJTSURBVFiF7ZdNSxtRFIafM5PgJGqXxXy4DIziJhBdFLrwnyi4cym40S4ClkJ/g2B/Qv+BC0s3CtkIDWYZasWtXxEzebswQxGt3sk0Nou8cHfnPTycc+fOOSaJUZb3vwFe0hgwrcaAaTUGTKuRB8wMYrLZ2dxEd3rVPC2aqAoqBi0ZDfXs8DZzsad2++ZfAFrSP0m+NPdO4gtQeSasZcbK9c8f39PAQcIW50vzmxIHQEXQkGzdU2+pc6c3nnpLkq0LGkBF4iBfmt9MC+hcwX7lDgBhfOycTu5IR3ePElotGxSvthFbgJnxPlUlJb14KJdzQSE8CQqhgmJYd/EExbAeFEIFhfCEcjnn4nnqOLV4oju9Sr+tndPJHRdP53RyJ2533z+QnADN0yIAst2n2vqUpKM7ZLsP/EMDFFUAn+gwSfI4PvYPIidA9Z+U6641kySP4/X8k/Ss3CoILYB8RmGS5HF87B9EbhU0GgARfqK7FMfH/kHkBtiz+7tnWjOrZV08ZrUsprUH/mEB3mYu9oCWQTUoXm27eILi1bZBFWj1/cMDVLt9Y8YK0ENs5Upz9b9V0qyWzZXm6ogPAF6PjTSDQ6Jh4f5frE+AJ2gg2/WJDq+71sxnFEb4i5jW+pWL1fS7/vLl+fHZ0AHvId2mGa/HRs/jMxCmgUwMCO7z4NTbhZkoE+2ngRwIMInSQg595L88Pz7zu/4y0ATCKBPtT71dmHH1v8pOkgby1ZamR5DZ6KuL71W3uj+Q9k3SLxfP0D+StBr5vXgMmFZjwLQaA6bVyAP+BkJqfmMbSKF/AAAAAElFTkSuQmCC);
} */
            #searchinput {
              padding: 1rem;
            }

            #searchinput:hover,
            #searchinput:focus {
              border: none;
            }



            @media only screen and (max-width: 600px) {
              #searchbtn {
                 width: 6%;
              }
            }
            @media only screen and (min-width: 600px) {
              #searchbtn {
                 width: 2%;
              }
            }

            .searchdiv {
              position: absolute;
              left: 0px;
              top: 45px;
              width: 50px;
              height: 5px;
            }
          </style>

          <!-- <div class="inline-search enabled-search-suggestions-mobile">
<form role="search" action="<?=base_path?>search_products" method="post" name="simpleSearch" novalidate="novalidate">
<fieldset class="top_ser" style="padding: 1.4rem; padding-left: 0.6rem;">
<button style="background:none; border:none; outline:0 !important;padding:0;">
<i class="fa fa-search " style="font-size:17px !important;"></i>
</button>

<input name="search_input" id="searchinput" autocomplete="off"><div class="searchdiv"></div></input>
<input type="text" id="searchinput" class="search" name="search_input" autocomplete="off" placeholder="Search">
<input type="hidden" name="lang" value="en_US">
<a href="" class="clear-field hidden">X</a>
</fieldset>
</form>
</div> -->

        </div>
      </div>
      <style>
        .pro_ul li {
          color: white;
          white-space: normal;
          background: black !important;
        }

        .pro_ul {
          margin-left: 1rem;
        }

        .pimg {
          padding-left: 8px;
        }

        @media (max-width:700px) {
          .mobhide {
            display: none;
          }
        }

        @media (min-width: 312px) and (max-width: 900px) {
          .top-banner .menu-utility-wishlist {
            margin-right: -6px !important;
            margin-top: 0px;
          }

          .mobilere {
            left: -169px !important;
          }

          .mobilere1 {
            left: -180px !important;
          }
        }
      </style>

      <!-- <div class="row searc">
<div class="col divpro">
<ul class="pro_ul" id="serc" style="z-index:1">

</ul>
</div>
</div> -->
    </div>
    </div>

    </div>

    <nav id="navigation" role="navigation" style="margin-left:-6rem;">


      <div class="container" style="position:static">



        <a href="#" class="close-menu" title="close menu"></a>
        <!-- utility user menu -->

        <ul class="menu-category level-1" style="z-index:-1;margin-top:1rem;">

          <div class="show_logo" style="width:60px;    position: absolute;
left: 20px;display:none;">

            <!-- <a href="<?=base_path?>" class="d-flex">
  <img style="width: 40px;" src="<?=base_path?>frontend/assets/img/jewl/logopart1.png">
<img style="width: 100px;height: 32px;margin-top: 9px;" src="<?=base_path?>frontend/assets/img/jewl/logopart2.png">
</a> -->
          </div>
          <li class="menu-item">
            <a class="menu-item-link has-sub-menu" href="<?=base_path?>new_and_now_products" class="pimg">

              New &amp; Now

            </a>

          </li>




          <?php
if (!empty($category_data)) {
                      $i=0;
                      foreach ($category_data as $category) {
                          ?>

          <li class="menu-item">
            <a class="menu-item-link has-sub-menu pimg" href="<?=base_path?>category_products/<?=base64_encode($category->id); ?>">

              <?=$category->name; ?>

            </a>
            <style media="screen">
              level-3 a {
                padding-left: 5px;
              }
            </style>
            <div class="level-2" style="width:25rem;padding:4px 0px;">

              <div class="container">
                <!-- <h4><b style="margin-left:5rem;">Categories</b></h4> -->
                <ul class="menu-horizontal">
                  <li>

                    <ul class="level-3" style="width:25rem;">
                      <?php

$subcategory_data= App\adminmodel\SubCategory::wherenull('deleted_at')->where('is_cat_delete', 0)->where('is_active', 1)->where('category_id', $category->id)->get();



                          if (!empty($subcategory_data)) {
                              $a=0;
                              foreach ($subcategory_data as $subcategory) {
                                  $minisubcategory_data= App\adminmodel\MiniSubCategory::wherenull('deleted_at')->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('is_active', 1)->where('subcategory_id', $subcategory->id)->get(); ?>
                      <li class="ho_licatup">
                        <a class="ho_licat">
                          <a href="<?php echo base_path?>all_products/<?=base64_encode($subcategory->id); ?>" class="pimg">
                            <?=$subcategory->name?>

                            <?php if (!empty($minisubcategory_data)) {
                                      $y=0;
                                      foreach ($minisubcategory_data as $minisubcate) {
                                          ?>
                            <?php if ($y == 0) {?>
                            <i class="fa fa-chevron-right ml-5" style="font-size: 10px !important;"></i>
                            <?php } ?>
                            <?php $y++;
                                      }
                                  } ?>
                          </a>
                          <ul class="ul_sub">
                            <?php

if (!empty($minisubcategory_data)) {
    $n=0;
    foreach ($minisubcategory_data as $minisubcate) {
        // echo $n;?>
                            <li class="">
                              <a href="#">
                                <a href="<?php echo base_path?>all_products/<?=base64_encode($subcategory->id); ?>/<?=base64_encode($minisubcate->id); ?>" class=pimg>
                                  <?=$minisubcate->name; ?></a>
                              </a>
                            </li>
                            <?php $n++;
    }
} ?>

                          </ul>
                        </a>


                      </li>
                      <?php  $a++;
                              }
                          } ?>
                    </ul>
                  </li>
                  <li>
                    <!-- <span class="menu-item-link">
Collections
</span> -->
                    <!-- <ul class="level-3">
  <li>
<a href="">
Fall Collection
</a>
  </li>
  <li>
<a href="">
Summer Collection
</a>
  </li>
  <li>
<a href="">
Back to School
</a>
  </li>
  <li>
<a href="/new-now/trending-now/stars-jewelry/">
Stars Collection
</a>
  </li>
  <li>
<a href="/new-now/trending-now/heart-jewelry/">
Hearts Collection
</a>
  </li>
  <li>
<a href="">
The Elisa Necklace
</a>
  </li>
  <li>
<a href="">
Fine Jewelry
</a>
  </li>
  <li>
<a href="">
Sterling Silver &amp; Gold Vermeil
</a>
  </li>
  <li>
<a href="">
Birthstone Colors
</a>
  </li>
  <li>
<a href="">
Our Icons
</a>
  </li>
</ul> -->
                  </li>
                </ul>
                <div class="banner">
                  <div class="navbar-banner d-flex" style="width: 100%;">
                    <a class="ml-auto" href="/jewelry/categories/earrings/">
                      <!-- <img data-src="#" width="433" alt="" src="<?=base_path.$category->image; ?>"> <strong style="text-align: center; text-transform: uppercase;">Shop Earrings</strong> -->
                    </a>
                  </div>
                </div>
              </div>
            </div>
          </li>

          <?php
                      }
                  }?>

          <li class="menu-item">
            <a class="menu-item-link has-sub-menu pimg" href="<?=base_path?>sale_products">

              Sale

            </a>

          <li class="menu-item">
            <a class="menu-item-link has-sub-menu pimg" href="<?=base_path?>customize_category" class="pimg">

              Customize
            </a>
            <div class="level-2" style="width:20rem;margin-left: -1rem;padding:4px 0px;">

              <div class="container">
                <!-- <h4><b style="margin-left:5rem;">Categories</b></h4> -->
                <ul class="menu-horizontal">
                  <li>

                    <ul class="level-3" style="width:20rem;">
                      <li class="ho_licatup">
                        <a class="ho_licat">
                        </a><a class="menu-item-link has-sub-menu pimg" href="<?=base_path?>color_bar_category">
                          Color Bar Style
                          <i class="fa fa-chevron-right ml-5" style="font-size: 10px !important;"></i>
                        </a>

                        <ul class="ul_sub" style="margin-left:-18.4rem">
                          <?php $customize_category = App\adminmodel\CustomizeCategory::wherenull('deleted_at')->where('is_active', 1)->get();

   if (!empty($customize_category)) {
       foreach ($customize_category as $cust_cate) {
           ?>
                          <li class=""><a href="<?=base_path?>customize_subcategory/<?=base64_encode($cust_cate->id)?>" class="pimg">
                              <?=$cust_cate->name; ?></a>

                          </li>
                          <?php
       }
   }?>
                        </ul>
                      </li>
                      <li class="ho_licatup">
                        <a class="ho_licat">
                        </a><a class="menu-item-link has-sub-menu pimg" href="<?=base_path?>engrave_category">
                          Engravable Styles
                          <i class="fa fa-chevron-right ml-5" style="font-size: 10px !important;"></i>
                        </a>
                        <ul class="ul_sub" style="margin-left:-18.4rem">
                          <?php $engrave_category = App\adminmodel\EngraveCategory::wherenull('deleted_at')->where('is_active', 1)->get();

   if (!empty($engrave_category)) {
       foreach ($engrave_category as $engrave_cate) {
           ?>
                          <li class="">
                            <a href="<?=base_path?>engrave_subcategory/<?=base64_encode($engrave_cate->id)?>" class="pimg">
                              <?=$engrave_cate->name; ?></a>
                          </li>
                          <?php
       }
   }?>
                        </ul>
                      </li>
                      <li class="ho_licatup">
                        <a class="ho_licat">
                        </a><a href="<?=base_path?>comming_soon" class=pimg>
                          Hanging Style
                          <i class="fa fa-chevron-right ml-5" style="font-size: 10px !important;"></i>
                        </a>
                        <ul class="ul_sub" style="margin-left:-18.4rem">
                            <li class="">
                              <a href="#">
                              </a><a href="<?=base_path?>comming_soon" class="pimg">
                                Build A Necklace</a>
                            </li>
                            <li class="">
                              <a href="#">
                              </a><a href="<?=base_path?>comming_soon" class="pimg">
                                Build A Bracelet</a>
                            </li>
                            <li class="">
                              <a href="#">
                              </a><a href="<?=base_path?>comming_soon" class="pimg">
                                Build A Earring</a>
                            </li>

                          </ul>



                        </li>
                        <!-- <li class="ho_licatup">
  <a class="ho_licat">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/MjU=">
  Bracelets
  <i class="fa fa-chevron-right ml-5" style="font-size: 10px !important;"></i>
  </a>
   <ul class="ul_sub">
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/MjU=/NDA=">
  Gemstone Bracelets</a>

  </li> -->
                        <!-- <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/MjU=/NDE=">
  Diamond Bracelets</a>

  </li>
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/MjU=/NDI=">
  Geode Bracelets</a>

  </li> -->
                        <!-- <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/MjU=/NDM=">
  Druzy Bracelets</a>

  </li>
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/MjU=/NDQ=">
  Gold Edged Bracelets</a>

  </li> -->
                        <!-- <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/MjU=/NDU=">
  Sterling Silver Bracelets</a>

  </li>

  </ul> -->



                        <!-- </li>
    <li class="ho_licatup">
  <a class="ho_licat">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDA=">
  Pendant Charms
  <i class="fa fa-chevron-right ml-5" style="font-size: 10px !important;"></i>
  </a>
   <ul class="ul_sub">
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDA=/NDY=">
  Diamond Pendants</a>

  </li> -->
                        <!-- <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDA=/NDc=">
  Gemstone Pendants</a>

  </li>
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDA=/NDg=">
  Gold/ Silver Edged Pendant</a>

  </li>
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDA=/NDk=">
  Organic Rough Pendants</a>

  </li>
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDA=/NTA=">
  Druzy Pendants</a>

  </li>
  <li class="">
  <a href="#">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDA=/NTE=">
  Charms Pendants</a>

  </li>

  </ul>
   -->


                        <!-- </li>
    <li class="ho_licatup">
  <a class="ho_licat">
  </a><a href="https://www.fineoutput.co.in/jewellery2/public/all_products/NDE=">
  Anklets
  </a>
   <ul class="ul_sub">

  </ul> -->



                    </li>
                  </ul>
            </li>

            <!-- <span class="menu-item-link">
  Collections
  </span> -->
            <!-- <ul class="level-3">
    <li>
  <a href="">
  Fall Collection
  </a>
    </li>
    <li>
  <a href="">
  Summer Collection
  </a>
    </li>
    <li>
  <a href="">
  Back to School
  </a>
    </li>
    <li>
  <a href="/new-now/trending-now/stars-jewelry/">
  Stars Collection
  </a>
    </li>
    <li>
  <a href="/new-now/trending-now/heart-jewelry/">
  Hearts Collection
  </a>
    </li>
    <li>
  <a href="">
  The Elisa Necklace
  </a>
    </li>
    <li>
  <a href="">
  Fine Jewelry
  </a>
    </li>
    <li>
  <a href="">
  Sterling Silver &amp; Gold Vermeil
  </a>
    </li>
    <li>
  <a href="">
  Birthstone Colors
  </a>
    </li>
    <li>
  <a href="">
  Our Icons
  </a>
    </li>
  </ul> -->
            </li>
          </ul>
          <div class="banner">
            <div class="navbar-banner d-flex" style="width: 100%;">
              <a class="ml-auto" href="/jewelry/categories/earrings/">
                <!-- <img data-src="#" width="433" alt="" src="https://www.fineoutput.co.in/jewellery2/public/uploads/CategoryUploads/Category97651638871682.jpg"> <strong style="text-align: center; text-transform: uppercase;">Shop Earrings</strong> -->
              </a>
            </div>
          </div>
        </div>
        </div>
        </li>
        <!-- </li> -->


        <!-- <li class="menu-item">
  <a class="menu-item-link has-sub-menu" >

   CUSTOMIZE

  </a> -->
        <!-- <div class="level-2">
  <div class="container">
  <ul class="menu-horizontal">
  <li>

  <div class="sub-menu-1">
    <ul>
    <li class="menu-item-link has-sub-menu" href="<?=base_path?>customize_category">
     Color Bar™
   </li>
   <li class="menu-item-link has-sub-menu" href="<?=base_path?>engrave_category">
    Engravable Styles
  </li>
  <ul> -->
        </div>

        <!--
  <ul class="level-3">
    <span class="menu-item-link">
    <a class="menu-item-link has-sub-menu" href="<?=base_path?>customize_category">
     Color Bar™
    </a>
    </span>
  <?php $customize_category = App\adminmodel\CustomizeCategory::wherenull('deleted_at')->where('is_active', 1)->get();

  if (!empty($customize_category)) {
      foreach ($customize_category as $cust_cate) {
          ?>
  <li class="ho_licatup">
  <a href="<?=base_path?>customize_subcategory/<?=base64_encode($cust_cate->id)?>"><?=$cust_cate->name; ?></a>
  <ul class="ul_sub">
    <li>
    <span class="menu-item-link">
    <a class="menu-item-link has-sub-menu" href="<?=base_path?>engrave_category">
     Engravable Styles
    </a>
    </span>
    <ul class="level-3" style="margin-left:1rem;">

    <?php $engrave_category = App\adminmodel\EngraveCategory::wherenull('deleted_at')->where('is_active', 1)->get();

          if (!empty($engrave_category)) {
              foreach ($engrave_category as $engrave_cate) {
                  ?>

    <li class="ho_licatup">
    <a href="<?=base_path?>engrave_subcategory/<?=base64_encode($engrave_cate->id)?>"><?=$engrave_cate->name; ?></a>
    </li>
    <?php
              }
          } ?>
    </ul>
    </li>
  </ul>
  </li>
  <?php
      }
  } ?>
  </ul>
  </li> -->
        </ul>
        <!-- <ul class="menu-horizontal" >
  <li>
  <span class="menu-item-link">
  <a class="menu-item-link has-sub-menu" href="<?=base_path?>engrave_category">
   Engravable Styles
  </a>
  </span>
  <ul class="level-3">

  <?php $engrave_category = App\adminmodel\EngraveCategory::wherenull('deleted_at')->where('is_active', 1)->get();

  if (!empty($engrave_category)) {
      foreach ($engrave_category as $engrave_cate) {
          ?>

  <li class="ho_licatup">
  <a href="<?=base_path?>engrave_subcategory/<?=base64_encode($engrave_cate->id)?>"><?=$engrave_cate->name; ?></a>
  </li>
  <?php
      }
  } ?>
  </ul>
  </li>
  </ul> -->

        </div>
        </div>

        </li>


        <!-- menu item -->



        <!-- <div class="bag_show" style="position: absolute; right: 20px;display:none;">


  <?php if (empty(Session::get('user_data'))) {
      $cart_data = session('cart_data');
      if (!empty($cart_data)) {
          $count = count($cart_data);
      } ?>


  <a class="mini-cart-link" href="<?=base_path?>view_cart" b="" title="View Your Shopping Bag">

  <i class="fa fa-shopping-bag" style="margin-top: 13px;"></i>
  <span  class="minicart-quantity-new text-white" id="totalCartItems2" style="margin-top: 13px;"><?if (!empty($count)) {
          echo $count;
      } else {
          echo "0";
      } ?></span>

  </a>
  <?php
  } else { ?>

  <?php
  $user_id= Session::get('user_id');
  $total_cart_count= App\frontendmodel\Cart::wherenull('deleted_at')->where('user_id', $user_id)->count();
  ?>


  <a class="mini-cart-link" href="<?=base_path?>view_cart" b="">
  <i class="fa fa-shopping-bag"></i>
  <span class="minicart-quantity-new" id="totaltblCartItems2">
  <?php
  if (!empty($total_cart_count)) {
      // echo "1";
      // exit;
      echo $total_cart_count;
  } else {
      echo "0";
  }
  ?>
  </span>
  </a>
  <?php } ?>




  </div> -->





        </ul>
        <ul class="secondary-menu accessible">
          <li><a class="accessible-mobile-ada unAssistiveView" href="#" title="By activating this link you will enable accessibility for all the data and features of the site">Enable Accessibility</a>
          </li>
        </ul>
        <div class="newsletter-form-mobile">
          <span>Sign up for our email!</span>
          <form action="/on/demandware.store/Sites-KendraScott-Site/en_US/Listrak-Subscribe" method="post" class="newsletter-form" novalidate="novalidate">
            <div class="form-row">
              <div>
                <input type="text" name="emailSubscribe" class="email" placeholder="Email Address" required="" aria-required="true">
              </div>
              <input type="hidden" name="ltkSubscriptionCode" value="footersubscribe">
            </div>
            <div class="form-row">
              <div>
                <input type="text" name="FA%20Customer%20Metrics.Zip%20Code_0" class="zipcode" placeholder="ZIP Code" required="" aria-required="true">
              </div>
              <input type="submit" class="btn lstSubscribe" title="Sign up" value="Sign up">
            </div>
          </form>
        </div>
        </div>
        <style>
          #searchsection {
            display: none;
          }

          .createX {
            display: inline-block;
            font-size: 2rem !important;
            font-weight: bold;
            cursor: pointer;
          }
        </style>
        <script>
          document.querySelector("#headersearchbtn").addEventListener("click", function() {
            // alert("hi")
            if (document.querySelector("#searchsection").style.display === "none") {
              document.querySelector("#searchsection").style.display = "block";
            } else {
              document.querySelector("#searchsection").style.display = "none";

            }
          })
        </script>
      </nav>
      <div class="w-100" id="searchsection">
        <div class="inline-search enabled-search-suggestions-mobile w-100">
          <div class="hidesearch">
            <form role="search" action="<?=base_path?>search_products" method="post" name="simpleSearch" novalidate="novalidate" style="float:none;">
              <fieldset class="top_ser" style="padding-left: 0.6rem;">
                <button id="searchbtn" style="background:none; border:none; outline:0 !important;padding: 0;margin-top:10px;">
                  <!-- <i class="fa fa-search " style="font-size:17px !important;"></i> -->
                  <span icon-color="black">
                    <img src="https://www.monicavinader.com/images/2020/search-black.svg" width="28px" height="20px" class="" alt="">
                  </span>
                </button>

                <!-- <input name="search_input" id="searchinput" autocomplete="off"><div class="searchdiv"></div></input> -->



                <input type="text" id="searchinput" class="search" name="search_input" autocomplete="off" placeholder="Search" style="width: 95%;">
                <p class="createX" onclick="myCreate()">X</p>
                <input type="hidden" name="lang" value="en_US">
          </div>
          <a href="" class="clear-field hidden">X</a>
          </fieldset>
          </form>
        </div>
      </div>

      <div id="nav-overlay" class="nav-overlay"></div>
      <script>
        function myCreate() {
          let Xbtn = document.querySelector('#searchsection');
          if (Xbtn.style.display === "block") {
            Xbtn.style.display = "none";
          } else {
            Xbtn.style.display = "block";
          }
        }
        // Xbtn.addEventListener("click", function() {
        //   document.querySelector('.hidesearch').style.display = "none";
        //
        // });
      </script>
      <script>
        function btnClick() {
          alert("hello");
          let x = document.querySelector('.showcur')
          if (x.style.display === "none") {
            x.style.display = "block";
          } else {
            x.style.display = "none";
          }
        }
      </script>
      <!-- <script>
      var acc = document.getElementsByClassName("accordion");
      var i;

      for (i = 0; i < acc.length; i++) {
        acc[i].addEventListener("click", function() {
          this.classList.toggle("active");
          var panel = this.nextElementSibling;
          if (panel.style.maxHeight) {
            panel.style.maxHeight = null;
          } else {
            panel.style.maxHeight = panel.scrollHeight + "px";
          }
        });
      }
      </script> -->
      <script type="text/javascript">
        function closenav1() {

          document.getElementById('hk13').style.display = 'none';
          document.getElementById('hk11').style.transform = 'translateX(-1500px)';
          document.getElementById('body').style.overflow = 'auto';
        }
      </script>


    </header>
