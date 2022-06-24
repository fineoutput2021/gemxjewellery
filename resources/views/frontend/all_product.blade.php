@extends('frontend.layout')
@section('main')
<style type="text/css">
@media screen and (min-width: 800px) {
  .rigtal{margin-right: -35rem;}
}

  .colorhide {
    display: none;
  }

  .colorhover:hover .colorhide {
    display: block;
  }

  /*filter css start*/

  .sidenav {
    height: 100%;
    width: 0;
    position: fixed;
    z-index: 100000;
    max-width: 450px;
    top: 0;
    left: 0;
    background-color: white;
    overflow-x: hidden;
    transition: 0.5s;
    box-shadow: 2px 4px 5px 0px #0000002e;
  }

  .sidenav a {
    padding: 8px 0;
    text-decoration: none;
    font-size: 18px;
    color: black;
    display: block;
    transition: 0.3s;
    font-weight: 500;
  }

  .sidenav a:hover {
    color: #f1f1f1;
  }

  /*.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}*/

  #main {
    transition: margin-left .5s;
    z-index: 1;

  }

  #product {
    transition: margin-left.5s;
  }

  #footer {
    transition: margin-left .5s;
  }

  /*filter css end*/
  .accordionx {
    background-color: white;
    color: #444;
    cursor: pointer;
    padding: 18px;
    width: 100%;
    border: none;
    text-align: left;
    outline: 0 !important;
    font-size: 15px;
    transition: 0.4s;
    border-bottom: 1px solid #ccc !important;
  }

  .active,
  .accordionx:hover {
    background-color: #1f0b00;
    color: #fff;
  }

  .active,
  .accordionx:after {

    color: #fff;

  }

  button.accordionx.active:after {

    color: #fff;

  }

  .accordionx:after {
    content: '\002B';
    color: #777;
    font-weight: bold;
    float: right;
    margin-left: 5px;
  }



  .panel {
    margin-left: 15px;
    margin-right: 15px;
    background-color: white;
    max-height: 0;
    overflow: hidden;
    transition: max-height 0.2s ease-out;
    margin-bottom: 0 !important;

  }




  output {
    font-size: 2em;
    padding: .3em;
  }




  .card {
    cursor: pointer;
    border: none !important;
  }

  .cardnew img {
    width: 100%;
    /* height: 300px; */
  }

  /* .card-img-top{

    } */
  /* .card-img-top{
      content:close-quote;
    }
  	.card-img-top:hover{
  		content: visible !important;

  	} */
  .card:hover .img_top {
    visibility: hidden;
    display: none;
  }

  .card:hover .img_btm {
    visibility: visible;
    display: block;
  }

  .img_btm {
    visibility: hidden;
    display: none;
  }

  .carderspan {
    display: flex;
    align-items: center;
    margin: 6px 0px;
  }

  .carder {
    width: 18px;
    height: 18px;
    margin-right: 15px;
    background: #000;
    border-radius: 30px;
    border: 1px solid #000;
  }

  .card-text {
    margin-top: 0;
    font-size: 15px;
    line-height: 1.23077;
    margin-bottom: 10px !important;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    letter-spacing: .7px;
    text-transform: capitalize;
  }

  .cardp {
    font-size: 10px;
    line-height: 1.3;
    font-weight: 300;
    width: 120px;
  }

  .cardprice {
    font-size: 14px;
    line-height: 1.28571;
    font-weight: 600;
    letter-spacing: 1px;
    margin: 6px 0px;
  }

  @media (min-width: 312px) and (max-width: 900px) {
    .cardnew img {
      height: auto;
    }

    .card-body {
      padding: 0.5rem;
    }

    span .carder {
      margin-right: 0;
    }

    .carderspan {
      justify-content: space-between;
    }

  }

  @media (min-width: 576px) {
    .modal-dialog {
      max-width: 853px;
      margin: 1.75rem auto;
    }

    img.moimg {
      width: 100%;
    }
  }

  img.moimg {
    width: 100%;
    height: 100%;
  }



  .prod_btn {
    position: absolute;
    top: 50%;
    left: 25%;
    background: #fff;
    color: #000;
    /* border:2px solid #1f0b00 !important; */
    width: 50%;
    box-shadow: 2px -1px 7px 0px #747474;
    outline: 0 !important;
    opacity: 0;
    visibility: hidden;
    padding: 0 !important;
  }

  .card:hover .prod_btn {
    opacity: 1;
    visibility: visible;
    /* border:0 !important; */
  }

  .cardtop {
    display: flex;
  }

  .opt {
    padding: 0 25px 0 20px;
    border-radius: 0;
    width: auto;
    color: #000;
    border: 1px solid #E6E7E8;
    vertical-align: middle;
    background: 0 0 !important;
    cursor: pointer;
    position: relative;
    outline-style: none;
    height: 40px;
    z-index: 1;
    letter-spacing: 1px;
  }

  .btn-group-lg>.btn,
  .btn-lg {
    padding: 0.5rem 10rem;
    display: block;
    border-radius: 0;
    font-weight: 700;
    margin: 0;
    color: #000000 !important;
    background-color: #ffffff;
    border: 1px solid #e6e7e8;
    padding: 0 !important;
    font-size: 14px !important;
    line-height: 48px !important;
    width: 13%;
    margin-left: 1rem;
    height: 40px !important;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .asset a {
    display: block;
    width: 100%;
    margin-top: 20px;
    background-color: #fff;
    border-left: 0;
    border-right: 0;
    border-top: 1px solid #dcdcdd;
    border-bottom: 1px solid #dcdcdd;
    text-align: left;
    padding: 10px 0 !important;
  }

  .asset .btn {
    display: inline-block;
    margin: 0;
    font-weight: 400;
    letter-spacing: 1.5px;
    text-align: center;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border-radius: 0;
    white-space: nowrap;
    height: auto !important;
    float: none !important;
    text-transform: uppercase;
    transition: none;
    padding: 10px 16px !important;
    font-size: 14px !important;
    line-height: 30px !important;
    color: #000 !important;
    background-color: #fff;
    border: 1px solid #E6E7E8;
  }

  .carder1 {
    width: 25px;
    height: 25px;
    margin-right: 15px;
    background: #efd0bb;
    border-radius: 30px;
  }

  .cparent {
    display: flex;
    flex-wrap: wrap;
  }

  button.colobtn.active.p-1 {
    border: 2px solid black !important;
  }

  .next_page {
    margin: auto;
    display: flex;
    justify-content: center;
    align-items: center;
  }

  .jew_ank.active {
    border-bottom: 2px solid #ffa4a8;
    color: #ffa4a8;
    background: none !important;

  }

  .jew_ank {
    border-bottom: 2px solid #a9a9a9;
    color: #a9a9a9;

  }

  .next_page span.active {
    color: #ffa4a8;
    background: none;
  }

  button.btn.prod_btn:hover {
    border: 0px solid #1f0b00 !important;
  }

  .label.filter__label {
    width: 33%;
    margin-bottom: 2rem;
    margin-top: 2rem;
  }

  .filter__label {
    width: 30%;
    margin-bottom: 2rem;
    margin-top: 2rem;
  }

  .filter button {
    height: 44px;
    width: 50%;
    font-size: 15px;
    border: none;
    background: #1f0b00;
    color: #fff;
    outline: 0 !important;
    margin-bottom: 2rem;
    margin-top: 2rem;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-left: auto;
    margin-right: auto;
  }

  .noUi-connect {
    background: #1f0b00;
  }



  @media only screen and (min-width: 600px) {
    #filterText{
      position: absolute;
      top: 69px;
      left:55px;
    }
}
  @media only screen and (max-width: 600px) {
    #filterText{
      position: absolute;
      top: 105px;
      left:47px;
    }
}
</style>






<!-- filter start -->
<div id="mySidenav" class="sidenav">
  <div class="container-fluid p-0" style="background: #ffffff">
    <div class="row p-3 m-0" style="background:#f1f1f1;">
      <div style="    display: contents;" class="col-lg-6 col-md-6">
        <a href="#">FILTER & SORT</a>
      </div>
      <div class="col-lg-6 col-md-6" style="    display: contents;">
        <a style="right: 15px;
    position: absolute;
    font-size: 30px !important;
    padding-top: 0;" href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
      </div>
    </div>
    <div class="row p-3 m-0" style="background:#f1f1f1;padding-bottom:2rem !important;">
      <div style="display: contents;" class="col-lg-6 col-md-6">
        <a href="#"> SORT BY</a>
      </div>

      <div class="col-lg-6 col-md-6 m-auto p-0" style="background:white;">

        <?php if (!empty($submini_id)) { ?>
        <form action="<?=base_path?>all_products/<?=$sub_id;?>/<?=$submini_id;?>" method="get">
          <?php } else { ?>
          <form action="<?=base_path?>all_products/<?=$sub_id;?>" method="get">
            <?php }?>
            <select class="form-control" id="exampleFormControlSelect1" style="    width: 100%;
    background: #ffffff;
    border: none;
    text-decoration: none;
    border-radius: 0; font-size:13px;" name="prc_f">

              <option value="<?=base64_encode(3);?>">Newest</option>
              <option value="<?=base64_encode(1);?>"> Price High To Low</option>
              <option value="<?=base64_encode(2);?>">Price Low To High</option>



            </select>
            <!-- <button style="position: absolute;
    top: 1px;
    right: 0;
    height: 33px;
    width: 36px;
    border: none;
    background: #fff;
    outline: 0 !important;" type="submit" title="submit"><i class="fa fa-search"></i></button> -->
          </form>
      </div>
    </div>
    <div class="row p-0 m-0">
      <div class="col-lg-12 col-md-12 p-0">


        <button class="accordionx">Gemstone
        </button>
        <div class="panel">
          <div class="row" >

            <?php
       $gemstones= App\adminmodel\Gemstone::wherenull('deleted_at')->where('is_active', 1)->get();

       if (!empty($gemstones)) {
           $i=0;
           foreach ($gemstones as $gemstone) {
               ?>

            <div class="col-lg-6 col-md-6">


              <a href="<?=base_path?>all_products/<?=$sub_id; ?>/<?=$submini_id; ?>?gem_id=<?=base64_encode($gemstone->id); ?>">

                <?php if (!empty($gemstone->image)) {?>
                <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:url('<?=base_path.$gemstone->image?>');background-size:30px 30px;">
                  <?php } else { ?>
                  <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:red;">
                    <?php } ?>
                    <label style="padding-left: 40px" for="vehicle1"> <?=$gemstone->name; ?></label>

                  </div><br>
              </a>




            </div>

            <?php $i++;
           }
       } ?>
          </div>
        </div>
</div>


        <button class="accordionx">Style
        </button>
        <div class="panel">
          <div class="row">
            <?php
  $styles= App\adminmodel\Style::wherenull('deleted_at')->where('is_active', 1)->get();

  if (!empty($styles)) {
      $i=0;
      foreach ($styles as $style) {
          ?>




            <div class="col-lg-6 col-md-6">

              <?php if (!empty($submini_id)) { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>/<?=$submini_id;?>?s_id=<?=base64_encode($style->id);?>">
                <label for="vehicle1"> <?=$style->name;?></label><br>
              </a>
              <?php } else { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>?s_id=<?=base64_encode($style->id);?>">
                <label for="vehicle1"> <?=$style->name;?></label><br>
              </a>
              <?php  } ?>
              <!-- <input class="mt-4" type="checkbox" id="vehicle1" value="<?=$style->id; ?>"> -->




            </div>

            <?php $i++;
      }
  } ?>
          </div>
        </div>

        <button class="accordionx">Metal
        </button>
        <div class="panel">
          <div class="row">

            <?php
   $metals= App\adminmodel\Metal::wherenull('deleted_at')->where('is_active', 1)->get();

   if (!empty($metals)) {
       $i=0;
       foreach ($metals as $metal) {
           ?>

            <div class="col-lg-6 col-md-6">

              <?php if (!empty($submini_id)) { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>/<?=$submini_id;?>?m_id=<?=base64_encode($metal->id);?>">


                <?php if (!empty($metal->image)) {?>
                <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:url('<?=base_path.$metal->image?>');background-size:30px 30px;">
                  <?php } else { ?>
                  <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background: red;">
                    <?php } ?>

                    <label style="padding-left: 40px" for="vehicle1"> <?=$metal->name;?></label>
                  </div><br>
              </a>
              <?php } else { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>?m_id=<?=base64_encode($metal->id);?>">


                <?php if (!empty($metal->image)) {?>
                <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:url('<?=base_path.$metal->image?>');background-size:30px 30px;">
                  <?php } else { ?>
                  <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background: red;">
                    <?php } ?>

                    <label style="padding-left: 40px" for="vehicle1"> <?=$metal->name;?></label>
                  </div><br>
              </a>
              <?php  } ?>



            </div>

            <?php $i++;
       }
   } ?>
          </div>
        </div>
        <button class="accordionx">Material
        </button>
        <div class="panel">

          <?php
  $materials= App\adminmodel\Material::wherenull('deleted_at')->where('is_active', 1)->get();

  if (!empty($materials)) {
      $i=0;
      foreach ($materials as $material) {
          ?>
          <!-- <input class="mt-4" type="checkbox" id="vehicle1" value="<?=$material->id; ?>" > -->


          <?php if (!empty($submini_id)) { ?>
          <a href="<?=base_path?>all_products/<?=$sub_id;?>/<?=$submini_id;?>?mtr_id=<?=base64_encode($material->id);?>">
            <label for="vehicle1"> <?=$material->name;?></label><br>
          </a>
          <?php } else { ?>
          <a href="<?=base_path?>all_products/<?=$sub_id;?>?mtr_id=<?=base64_encode($material->id);?>">
            <label for="vehicle1"> <?=$material->name;?></label><br>
          </a>
          <?php  } ?>

          <?php $i++;
      }
  } ?>
        </div>
        <button class="accordionx">Shape
        </button>
        <div class="panel">
          <div class="row"  style="padding-left:0px;">

            <?php
    $shapes= App\adminmodel\Shape::wherenull('deleted_at')->where('is_active', 1)->get();

    if (!empty($shapes)) {
        $i=0;
        foreach ($shapes as $shape) {
            ?>

            <div class="col-lg-4 col-md-4">


              <?php if (!empty($submini_id)) { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>/<?=$submini_id;?>?sh_id=<?=base64_encode($shape->id);?>">

                <?php if (!empty($shape->image)) {?>
                <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:url('<?=base_path.$shape->image?>');background-size:30px 30px;">
                  <?php } else { ?>
                  <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background: red;">
                    <?php } ?>

                    <label style="padding-left: 40px" for="vehicle1"> <?=$shape->name;?></label>
                  </div><br>
              </a>
              <?php } else { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>?sh_id=<?=base64_encode($shape->id);?>">

                <?php if (!empty($shape->image)) {?>
                <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:url('<?=base_path.$shape->image?>');background-size:30px 30px;">
                  <?php } else { ?>
                  <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background: red;">
                    <?php } ?>

                    <label style="padding-left: 40px" for="vehicle1"> <?=$shape->name;?></label>
                  </div><br>
              </a>
              <?php  } ?>




            </div>
            <?php $i++;
        }
    } ?>
          </div>
        </div>


        <button class="accordionx">Plating
        </button>
        <div class="panel">
          <div class="row">

            <?php
    $platings= App\adminmodel\Plating::wherenull('deleted_at')->where('is_active', 1)->get();

    if (!empty($platings)) {
        $i=0;
        foreach ($platings as $plating) {
            ?>

            <div class="col-lg-4 col-md-4">

              <?php if (!empty($submini_id)) { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>/<?=$submini_id;?>?pl_id=<?=base64_encode($plating->id);?>">

                <?php if (!empty($plating->image)) {?>
                <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:url('<?=base_path.$plating->image?>');background-size:30px 30px;">
                  <?php } else { ?>
                  <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background: red;">
                    <?php } ?>

                    <label style="padding-left: 40px" for="vehicle1"> <?=$plating->name;?></label>
                  </div><br>
              </a>
              <?php } else { ?>
              <a href="<?=base_path?>all_products/<?=$sub_id;?>?pl_id=<?=base64_encode($plating->id);?>">

                <?php if (!empty($plating->image)) {?>
                <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background:url('<?=base_path.$plating->image?>');background-size:30px 30px;">
                  <?php } else { ?>
                  <div class="mt-4" class="stone" style="border-radius: 50%; width: 30px;height: 30px; background: red;">
                    <?php } ?>

                    <label style="padding-left: 40px" for="vehicle1"> <?=$plating->name;?></label>
                  </div><br>
              </a>
              <?php  } ?>




            </div>
            <?php $i++;
        }
    } ?>
          </div>
        </div>


        <button class="accordionx">Price
        </button>
        <div class="panel">
          <?php if (!empty($submini_id)) { ?>
          <form action="<?=base_path?>all_products/<?=$sub_id;?>/<?=$submini_id;?>" method="get">
            <?php } else { ?>
            <form action="<?=base_path?>all_products/<?=$sub_id;?>" method="get">
              <?php }?>
              <div class="filter" style="padding: 0px 20px !important;">
                <label class="filter__label">
                  <input type="text" value="" name="pr_lim_st" class="filter__input" min="1" >
                </label>

                <label class="filter__label float-right" style="float: right;">
                  <input type="text" value="" name="pr_lim_en" class="filter__input">
                </label>

                <div id="sliderPrice" class="filter__slider-price" data-min="0" data-max="500" data-step="1" style="padding-right: 20px;"></div>

                <button type="submit" title="submit">submit</button>
              </div>
            </form>
        </div>

      </div>
    </div>
  </div>
</div>

<script>
  function openNav() {
    document.getElementById("mySidenav").style.width = "100%";
    // document.getElementById("main").style.marginLeft = "400px";
    // document.getElementById("product").style.marginLeft = "400px";
    // document.getElementById("footer").style.marginLeft = "400px";


  }

  function closeNav() {
    document.getElementById("mySidenav").style.width = "0";
    // document.getElementById("main").style.marginLeft= "0";
    // document.getElementById("product").style.marginLeft = "0";
    // document.getElementById("footer").style.marginLeft = "0";

  }
</script>

<!-- filter end -->

<!-- main body start -->
<style>
  .hoverh1:hover {
    color: #0056b3;
  }
</style>
<div class="paddingfromtop">
  <section id="product" style="">


    <div class="container-fluid jewcarder">
      <div class="row hello_sec" style="padding-left: 35px;">
        <div class="col-lg-12 col-md-12 p-0">
          <div style="width:auto;">
            <h1 style="font-family: 'Calibri'!important;
    margin-top: 30px;
    font-size: 30px;" class=""><?=$cat_data->name."/".$sub_cat_data->name; if (!empty($mini_sub_data->name)) {
        echo "/"; ?><span style="font-size:12px;"><?=$mini_sub_data->name?></span>
              <?
    }?>
            </h1>
            <a href="#" onclick="openNav()">
              <div class="mb-1" style="background:yellow;background:gold;width: 30px;height: 4px;"></div>
              <div class="mb-1" style="background:yellow;background:gold;width: 30px;height: 4px;"></div>
              <div style="background:yellow;background:gold;width: 30px;height: 4px;"></div>
            </a>
          </div>
          <p id="filterText"> FILTER & SORT</p>
        </div>
      </div>
      <div class="row mb-5">

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



   if (!empty($subcategory_pro_data)) {
       foreach ($subcategory_pro_data as $subcategory_pro) {
           $pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->first();

           if (!empty($pro_type_color)) {
               $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

               if (!empty($color_da)) {
                   $color= $color_da->name;
                   $color_code= $color_da->code;
               } else {
                   $color="Color Not Found!";
                   $color_code="";
               }

               $images1= $pro_type_color->image1;
               $images2= $pro_type_color->image2;
               $mrp= $pro_type_color->mrp;
               $price= $pro_type_color->price;

               if (!empty($images1)) {
                   $image1=base_path.$images1;
               } else {
                   $image1="";
               }

               if (!empty($images2)) {
                   $image2=base_path.$images2;
               } else {
                   $image2="";
               }
           } else {
               $image1="";
               $image2="";
               $mrp= "MRP Not Found!";
               $price= "Price Not Found!";
               $color= "Color Not Found!";
               $color_code="";
           } ?>
        <div class="col-md-3 col-6 ">
          <div class="card cardnew mt-5">
            <?php  if (!empty($image1)) { ?>
            <img class="card-img-top img_top" src="<?=$image1;?>" alt="Card image" style="width:100%;">
            <?php } else {?>
            <img class="card-img-top img_top" src="<?=base_path?>frontend/assets/img/blank_img.jpg" alt="Card image" style="width:100%;">
            <?php } ?>

            <?php if (!empty($image2)) {
               ?>

            <img class="card-img-top img_btm" src="<?=$image2; ?>" alt="Card image" style="width:100%;">
            <?php
           } else { ?>
            <img class="card-img-top img_btm" src="<?=base_path?>frontend/assets/img/blank_img.jpg" alt="Card image" style="width:100%;">
            <?php } ?>


            <?php

     $user_idd= Session::get('user_id');

           $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $subcategory_pro->id)->first();

           if (!empty(Session::get('user_data'))) {
               // print_r($wish_datas);
               if (!empty($wish_datas)) {
                   ?>
            <span style="position: absolute;right: 5px;font-size: 20px;">
              <i class="fa fa-heart" onclick="removeFromWishlist(<?=$subcategory_pro->id?>,<?=$wish_datas->id?>)"></i>
            </span>

            <?php
               } else {?>

            <span style="position: absolute;right: 5px;font-size: 20px;" onclick="addToWishlist(<?=$subcategory_pro->id;?>)">
              <i class="fa fa-heart-o" style=""></i>
            </span>

            <?php }
           } ?>


            <div class="card-body">
              <a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id); ?>">
                <h3 class="card-text"><?=$subcategory_pro->name; ?></h3>
              </a>



              <?php
      if (!empty($user_idd)) {
          $user_data = App\frontendmodel\User::wherenull('deleted_at')->where('id', $user_idd)->first();
          if (!empty($user_data->package)) {
              $package_data = App\adminmodel\PackageItem::wherenull('deleted_at')->where('id', $user_data->package)->first();
              if (!empty($package_data)) {
                  date_default_timezone_set("Asia/Calcutta");
                  $cur_date=date("m-d-Y");
                  if ($cur_date<=$user_data->expiry_date) {
                      $percentage = $package_data->price;
                      $sell_price1 =(int)$price * $currency_price;

                      $discount = $sell_price1 * $percentage /100;
                      $sell_price = $sell_price1 - $discount;
                  }
              }
          } else {
              $sell_price =(int)$price * $currency_price;
          }
      } else {
          $sell_price =(int)$price * $currency_price;
      } ?>
              <p class="cardprice"><?=$sign; ?>
                <?if (!empty($sell_price)) {
          echo $sell_price;
      } else {
          echo "no price";
      } ?>
              </p>
              <span class="carderspan">
                <?php
      $pro_type_color1= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->get();
           $color_check = $pro_type_color1->first();
           if (!empty($color_check)) {
               foreach ($pro_type_color1 as $colors) {
                   $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $colors->color_id)->first(); ?>
                <div class="carder" style="background-color:<?if (!empty($color_da->code)) {
                       echo $color_da->code;
                   } ?>;"></div>
                <!-- <a href="#" class="cardp" style="width:60px"><if(!empty($color_da->name)){echo $color_da->name;}else{echo 'no color';}></a> -->
                <?
               }
           } ?>
              </span>
              <button type="button" class="btn prod_btn" data-toggle="modal" data-target="#myModal_<?=$subcategory_pro->id; ?>">
                Quick View
              </button>
            </div>
          </div>
        </div>
        <?php
       }
   } ?>


      </div>


      <div class="row mt-5 mb-4 ">
        <div class="next_page">
          <!-- <a href="#" class="mr-3 jew_ank">PREV</a>
      <span class="ml-2 mr-2 active">1</span>
      <span class="ml-2 mr-2">2</span>
      <span class="ml-2 mr-2">3</span>
      <span class="ml-2 mr-2">4</span>
      <span class="ml-2 mr-2">5</span>
      <a href="#" class="ml-3 jew_ank active">NEXT</a>
      <a href="#" class="ml-3 jew_ank active">LAST</a> -->

          <?php if ($linkstatus == 1) {?>

          {!! $subcategory_pro_data->links() !!}

          <?php } ?>

        </div>
      </div>

    </div>


    <div class="container-fluid">

      <?php
   if (!empty($subcategory_pro_data)) {
       foreach ($subcategory_pro_data as $subcategory_pro) {
           $pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->first();

           if (!empty($pro_type_color)) {
               $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

               if (!empty($color_da)) {
                   $color= $color_da->name;
                   $colr_code= $color_da->code;
               } else {
                   $color="Color Not Found!";
                   $colr_code="";
               }

               $images1= $pro_type_color->image1;
               $images2= $pro_type_color->image2;
               $mrp= $pro_type_color->mrp;
               $price= $pro_type_color->price;

               $user_idd= Session::get('user_id');
               if (!empty($user_idd)) {
                   $user_data = App\frontendmodel\User::wherenull('deleted_at')->where('id', $user_idd)->first();
                   if (!empty($user_data->package)) {
                       $package_data = App\adminmodel\PackageItem::wherenull('deleted_at')->where('id', $user_data->package)->first();
                       if (!empty($package_data)) {
                           date_default_timezone_set("Asia/Calcutta");
                           $cur_date=date("m-d-Y");
                           if ($cur_date<=$user_data->expiry_date) {
                               $percentage = $package_data->price;
                               $sell_price1 =(int)$price * $currency_price;

                               $discount = $sell_price1 * $percentage /100;
                               $sell_price = $sell_price1 - $discount;
                           }
                       }
                   } else {
                       $sell_price =(int)$price * $currency_price;
                   }
               } else {
                   $sell_price =(int)$price * $currency_price;
               }




               if (!empty($images1)) {
                   $image1=base_path.$images1;
               } else {
                   $image1="";
               }

               if (!empty($images2)) {
                   $image2=base_path.$images2;
               } else {
                   $image2="";
               }
           } else {
               $image1="";
               $image2="";
               $mrp= "MRP Not Found!";
               $price= "Price Not Found!";
               $color= "Color Not Found!";
               $colr_code="";
           } ?>

      <!-- The Modal -->
      <div class="modal  " id="myModal_<?=$subcategory_pro->id; ?>">
        <div class="modal-dialog  modal-lg">
          <div class="modal-content modal-content">

            <!-- Modal Header -->
            <!-- <div class="modal-header" style="justify-content:flex-end;">
              <h4 class="modal-title"></h4>
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div> -->
            <div class="modal-header">
              <h4 class="modal-title" style="font-size: 20px;    font-family: 'Calibri'!important;">Quick View</h4>
              <button type="button" class="close rigtal" data-dismiss="modal">&times;</button>
            </div>

            <!-- Modal body -->

            <div class="modal-body">
              <div class="container-fluid">
                <div class="row">
                  <div class="col-md-6">
                    <a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id); ?>">
                      <?php   if (!empty($image1)) { ?>
                      <img class="moimg" id="main_img1" src="<?=$image1;?>">
                      <?php } else {?>
                      <img class="moimg" src="<?=base_path?>frontend/assets/img/blank_img.jpg">
                      <?php } ?>

                    </a>
                  </div>
                  <div class="col-md-6">
                    <!-- <div class="" style=" float: right">
                  <i class="fa fa-heart-o"></i>
                </div> -->
                    <div class="cardtop">
                      <!-- <i class="fa fa-heart-o text-align-end"></i> -->
                      <a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id); ?>">
                        <h2 style="text-transform:capitalize;"><?=$subcategory_pro->name; ?></h2>
                        <h6><strong> <?=$subcategory_pro->sku_id; ?></strong></h6>
                      </a>

                      <?php

$user_idd= Session::get('user_id');

           $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $subcategory_pro->id)->first();


           // print_r($wish_datas);
           if (!empty($wish_datas)) {
               ?>
                      <!-- <span style="position: absolute;right: 32px;">
                    <i class="fa fa-heart" style="color:#ffa4a8;"></i>
                  </span> -->

                      <?php
           } else {?>

                      <!-- <span style="position: absolute;right: 32px;" onclick="addToWishlist(<?=$subcategory_pro->id;?>)">
                  <i class="fa fa-heart" style=""></i>
                </span> -->

                      <?php } ?>

                    </div>
                    <h3>
                      <!-- <del><?=$sign; ?> <span id="mrp_<?=$subcategory_pro->id; ?>"><?=(int)$mrp * $currency_price; ?></span></del> &nbsp;&nbsp; -->
                      <?=$sign; ?> <span id="price_<?=$subcategory_pro->id; ?>">
                        <?if (!empty($sell_price)) {
               echo $sell_price;
           } else {
               echo "no price";
           } ?>
                      </span>
                      &nbsp;&nbsp;<span id="price_discount_<?=$subcategory_pro->id; ?>">
                        <?php
                  if ($mrp != "MRP Not Found!" && $price != "Price Not Found!") {
                      $diff_price= $mrp- $price;
                      // $discount= round($diff_price*100/$mrp);
                   // echo "( ".$discount."% Off )";
                  } ?>
                      </span>
                      <?if((int)$mrp * $currency_price!=$sell_price){?>
                      <del><?=$sign; ?> <span id="mrp_<?=$subcategory_pro->id; ?>"><?=(int)$mrp * $currency_price; ?></span></del> &nbsp;&nbsp;
                      <?}?>
                    </h3>



                    <div class="cardmiddle">
                      <p><?=$subcategory_pro->sdesc; ?></p>
                      <h3 style="    font-size: 16px;
      font-weight: 600;color:#000;">Quantity</h3>
                      <div class="d-flex">
                        <select class="opt" id="qtty_<?=$subcategory_pro->id; ?>" onchange="qty_chng('<?=$subcategory_pro->id;?>')">
                          <option value="1">1</option>
                          <option value="2">2</option>
                          <option value="3">3</option>
                          <option value="4">4</option>
                          <option value="5">5</option>
                        </select>
                        <?php  $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $subcategory_pro->id)->first();

           if (!empty(Session::get('user_data'))) {
               // print_r($wish_datas);
               if (!empty($wish_datas)) {
                   ?>
                        <button class="btn btn-default btn-lg" onclick="removeFromWishlist(<?=$subcategory_pro->id?>,<?=$wish_datas->id?>)"><i class="fa fa-heart"></i></button>

                        <?
               } else {?>
                        <button class="btn btn-default btn-lg" onclick="addToWishlist(<?=$subcategory_pro->id; ?>)"><i class="fa fa-heart-o"></i></button>

                        <?}
           } ?>

                        <?php if (empty(Session::get('user_data'))) {?>


                        <button class="btn btn-default btn-lg" id="js-add-to-basket<?=$subcategory_pro->id; ?>"><a href="<?=base_path?>add_to_cart_local/<?=base64_encode($subcategory_pro->id);?>"><i class="fa fa-shopping-bag"></i></a></button>



                        <?php } else {?>

                        <!-- <button class="btn btn-default btn-lg"><i class="fa fa-heart-o"></i></button> -->

                        <button class="btn btn-default btn-lg" id="add_to_cart<?=$subcategory_pro->id; ?>" onclick="addToCartOnlineHandler(this)" data-category-id="<?= $subcategory_pro->category;?>" data-subcategory-id="<?= $subcategory_pro->sub_category_id;?>"
                          data-product-id="<?= $subcategory_pro->id;?>" user-id="<?= Session::get('user_id');?>" quantity="1"><i class="fa fa-shopping-bag"></i></button>




                        <?php } ?>
                      </div>

                      <p class="mt-5">
                        <a style="font-weight: 700; color:#000;" class="pt-3" href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id); ?>">VIEW FULL DETAILS <span><i class="fa fa-angle-right"></i></span> </a>
                      </p>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-4 col-4">
                    <div class="cardbottom">
                      <!-- <h3 class="m-0">Color:
                    <span id="clr_nam_<?=$subcategory_pro->id; ?>"><?=$color; ?> </span>
                  </h3> -->
                      <div class="cparent mb-3">
                        <?php
  $pro_type_colors= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->get();
           $pro_type_colors1= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $subcategory_pro->id)->first();

           if (!empty($pro_type_colors)) {
               $i=0;
               foreach ($pro_type_colors as $pro_types) {
                   $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_types->color_id)->first();

                   if (!empty($color_da)) {
                       $color_code= $color_da->code;
                   } else {
                       $color_code="";
                   } ?>
                        <!-- <div class="carder1" style="background-color:<?=$color_code; ?>"></div> -->
                        <!-- <input type="hidden" value="<?=$color_da->id; ?>" id="color_select_<?=$subcategory_pro->id; ?>" name="color_select">
                            <button class="colobtn  p-1 <?php if ($i == 0) {
                       echo "active";
                   } ?> " style="height:25px; width:25px;background:<?=$color_code; ?>;border:none; border-radius:50px;" onclick="colorChange(<?=$color_da->id; ?>, <?=$subcategory_pro->id; ?>);"  ></button> -->

                        <input type="hidden" value="<?=$color_da->id?>" id="color_select_<?=$subcategory_pro->id; ?>" name="color_select">
                        <div class="colorhover">


                          <button class="colobtn mr-3  p-1 <?php if ($i == 0) {
                       echo "active";
                   } ?> " style="height:25px; width:25px;background:<?=$color_code; ?>;border:none; border-radius:50px;" onclick="colorChange(<?=$color_da->id; ?>, <?=$subcategory_pro->id; ?>);"></button>
                          <div class="colorhide">


                            <input type="hidden" value="<?=$color_da->id?>" id="color_select" name="color_select"><?=$color_da->name?>
                          </div>
                        </div>
                        <?php $i++;
               }
           } ?>

                        <!-- <div class="carder1"></div>
        					<div class="carder1"></div> -->
                      </div>
                    </div>
                  </div>
                  <!-- <div class="col-md-8 col-8">
        				<div class="bottomdown">
                  <div class="col-md-6 col-6">

        				 <select class="opt" id="qtty_<?=$subcategory_pro->id; ?>">
        				 	<option value="1">1</option>
        				 	<option value="2">2</option>
        				 	<option value="3">3</option>
        				 	<option value="4">4</option>
        				 	<option value="5">5</option>
        				 </select>
               </div>

               <div class="col-md-6 col-6">


                 <?php if (empty(Session::get('user_data'))) {?>

          <button class="btn btn-default btn-lg"
          onclick="addToCartOfflineHandler2(this)"
            data-product-id="<?=$subcategory_pro->id?>"
            color_id="<?=$pro_type_colors1->color_id?>"
            quantity="1"><i class="fa fa-shopping-bag"></i></button>



                 <?php } else {?>

         <button class="btn btn-default btn-lg"
         onclick="addToCartOnlineHandler(this)"
        data-category-id="<?= $subcategory_pro->category;?>"
        data-subcategory-id="<?= $subcategory_pro->sub_category_id;?>"
        data-product-id="<?= $subcategory_pro->id;?>"
        user-id="<?= Session::get('user_id');?>"
        quantity="" >ADD TO BAG</button>


                 <?php } ?>
               </div>
             </div>


        				</div> -->
                  <!-- <div class="asset mt-2">
        					<a href="#" class="btn btn-smartgift" id="smart-gift"><div><i class="fa fa-gift"></i> Send as a gift <sup><i class="fa fa-question-circle"></i></sup></div></a>
        				</div>
        				<div class="asset mt-2">
        					<a href="#" class="btn btn-smartgift" id="smart-gift"><div><i class="fa fa-envelope"></i> Drop a Hint <sup><i class="fa fa-question-circle"></i></sup></div></a>
        				</div> -->
                </div>
                <!-- <div class="row">
                <div class="col-md-12">
              <p class="text-center"><a href="<?=base_path?>products_view/<?=base64_encode($subcategory_pro->id); ?>">VIEW FULL DETAILS <span><i class="fa fa-angle-right"></i></span> </a></p>

        			</div>
        	</div> -->
              </div>
            </div>


          </div>
        </div>

        <?php
       }
   } ?>

      </div>
    </div>

  </section>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/noUiSlider/14.6.0/nouislider.js"></script>
<script>
  var acc = document.getElementsByClassName("accordionx");
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
</script>

<script>
  function colorChange(c_id, prod_id) {
    var c_price = '<?php echo $currency_price;?>';
    // var prod_id = $(this).attr('pro_id');
    // alert(prod_id);
    // alert(c_id);

    $('.colobtn .p-1 .active').removeClass('active');
    $(this).addClass('active');

    var base_path = $("#base_path").val();
    // alert(selectedsize);
    // alert(prod_id);
    $.ajax({
      url: base_path + 'get_color_data',
      method: 'post',
      data: {
        color_id: c_id,
        product_id: prod_id,
        _token: '{{csrf_token()}}'
      },
      dataType: 'json',
      success: function(response) {
        // alert(response);
        if (response.data == true) {


          var pro_color_d = response.productColordata;

          var diff = parseFloat(pro_color_d.mrp) - parseFloat(pro_color_d.price);
          var discount = diff * 100 / parseFloat(pro_color_d.mrp);
          var price_discount = Math.round(discount);
          // alert(price_discount);
          var discount_string = '( ' + price_discount + '% Off )';

          if (pro_color_d != "" && pro_color_d != null) {
            $('#mrp_' + prod_id).text('');
            $('#price_' + prod_id).text('');
            $('#price_discount_' + prod_id).text('');
            $('#color_select_' + prod_id).val('');
            var c_mrp = parseFloat(pro_color_d.mrp) * parseFloat(c_price);
            var cc_price = parseFloat(pro_color_d.price) * parseFloat(c_price);
            $('#mrp_' + prod_id).text(c_mrp);
            $('#price_' + prod_id).text(cc_price);
            $('#price_discount_' + prod_id).text(discount_string);

            $('#color_select_' + prod_id).val(c_id);

            if (pro_color_d.image1 != "" && pro_color_d.image1 != null) {

              $('#main_img1').attr('src', base_path + pro_color_d.image1);
              // $('#my_img1').attr('src',base_path+pro_color_d.image1);

            }



            // $('#main_img2').attr('src','second.jpg');
            // $('#main_img3').attr('src','second.jpg');
            // $('#main_img4').attr('src','second.jpg');
            //
            //
            // $('#my_img2').attr('src','second.jpg');
            // $('#my_img3').attr('src','second.jpg');
            // $('#my_img4').attr('src','second.jpg');


          }

        } else {
          alert('hiii');
        }
      }
    });


  }
</script>
<script>
function qty_chng(id) {
// alert()
  var x = document.getElementById('qtty_'+id).value;
  // alert(x)
document.getElementById('add_to_cart'+id).setAttribute('quantity',x);
document.getElementById('js-add-to-basket'+id).setAttribute('quantity',x);
// $("#add_to_cart"+id).attr("quantity",x);
// alert()
}
</script>

@endsection
