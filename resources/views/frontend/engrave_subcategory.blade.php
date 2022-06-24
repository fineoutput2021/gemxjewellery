@extends('frontend.layout')
@section('main')
<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Engagement&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Nova+Flat&display=swap" rel="stylesheet">



<style>
  .custom2 {
    position: relative;
    overflow: hidden;
    height: 185px;
    border: 1px solid #bbb;

    background-size: contain;
    background-position: center top;
    background-repeat: no-repeat;
    font-size: 18px;
    width: 100%;
    float: left;
    margin-top: 15px;
    margin-bottom: 15px;
    /* margin: 10px; */
  }

  .custom2:hover>.imagecust {
    opacity: 0.3;
  }



  .custom2 h4 {
    font-size: 16px;
    justify-content: center;
    text-transform: uppercase;
    padding: 0;
    margin: 0;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    height: 100%;
    text-align: center;
    font-family: Lato, sans-serif;
    font-weight: 100;
    color: #888888;
    cursor: pointer;
  }

  .custom2 h4:hover {
    color: #4d2f40;
  }

  .cust2 h2 {
    text-align: center;
    font: 400 22px / 1.3 'Libre Baskerville', serif;
  }

  .imagecust {
    display: block;
    width: 100%;
    height: -webkit-fill-available;
    position: absolute;
  }

  /*.imagecust:hover{
     opacity: 0.4;
}*/


  .overlay {
    position: absolute;
    z-index: 1;
    bottom: 0;
    left: 0;
    right: 0;
    height: 20%;
    width: 100%;
    opacity: 0;
    transition: .5s ease;

  }

  .custom2:hover .overlay {
    opacity: 1;
  }


  .text {
    color: white;
    font-size: 16px;
    position: absolute;
    left: 50%;
    -webkit-transform: translate(-50%, -50%);
    -ms-transform: translate(-50%, -50%);
    transform: translate(-50%, -50%);
    text-align: center;
    background: #4d2f40;
    width: 100%;
    height: 100%;
    padding: 8px;
    top: 17px;
  }


  .image_cust_p {
    position: relative;
    z-index: 1;
    top: 140px;
    text-align: center;
    text-transform: uppercase;
    font-weight: 700;
    /* font:'Libre Baskerville',serif; */
  }

  .over_proname {
    text-align: center;
    position: relative;
    top: -138px;
  }

  .over_price {
    text-align: center;
    position: relative;
    top: -90px;
    font-size: 24px;

  }

  .over_price a {
    list-style: none;
    text-decoration: none;
    color: black;

  }


  .modal-content {
    position: relative;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-direction: column;
    flex-direction: column;
    width: 100%;
    pointer-events: auto;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid rgba(0, 0, 0, .2);
    border-radius: .3rem;
    outline: 0;
    padding: 0px 30px;
  }

  .modal-header {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-align: start;
    align-items: flex-start;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 1rem 1rem;
    border-bottom: none;
    border-top-left-radius: calc(.3rem - 1px);
    border-top-right-radius: calc(.3rem - 1px);
  }

  .modal-footer {
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -ms-flex-align: center;
    align-items: center;
    -ms-flex-pack: end;
    justify-content: flex-end;
    padding: .75rem;
    border-top: none;
    border-bottom-right-radius: calc(.3rem - 1px);
    border-bottom-left-radius: calc(.3rem - 1px);
  }

  .modal-body {
    position: relative;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    padding: 1rem;
    border: 1px solid #cacaca;
  }

  .custom_p p {
    text-align: center;
    color: black;
    font-size: 39px;
    margin-bottom: 0;
    cursor: pointer;
  }

  .span_out {
    display: block;
    letter-spacing: 0.3em;
    text-transform: uppercase;
    font-size: 1rem;
    font-weight: 700;
    margin-bottom: 15px;
    line-height: 2;
  }

  .can_p p {

    border: 1px solid lightgrey;
    padding: 5px 20px;
    width: 100%;
    margin-bottom: 0;
    cursor: pointer;

  }

  .img_row img {
    width: 100%;
    height: 475px;
  }

  .val_span {
    justify-content: center;
    align-items: center;
    display: flex;
  }

  .val_span span {
    background: white;
    width: 100px;
    padding: 10px 22px;
    border: 1px solid lightgrey;
    margin-right: 5px;
    cursor: pointer;
  }


  input.numu {

    position: absolute !important;
    z-index: 10 !important;
    background: transparent !important;
    text-align: center !important;
    outline: none !important;
    display: block;
    top: 33% !important;
    left: 25% !important;
    outline: none !important;
    border: none !important;
    border: 2px solid #D4D4D4 !important;
    box-shadow: 2px 2px 4px -1px #D4D4D4 !important;
    padding: 10px !important;
    width: 50% !important;
    border-radius: 7px !important;
    font-size: 13px;
    display: none;
  }







  p.numu {
    position: absolute;
    z-index: 10;
    top: 47%;
    left: 25%;
    width: 50%;
    min-height: 27px;
    background: transparent;
    text-align: center;
    border: 2px dashed red;
    overflow: hidden;
    display: block;
    align-items: center;
    margin-bottom: 0;
    justify-content: center;

  }




  @media (min-width: 992px) {

    .modal-lg,
    .modal-xl {
      max-width: 900px;
    }
  }


  .script_pc {
    font-family: 'Engagement', cursive;
  }

  .block_pc {
    font-family: 'Lalezar', cursive;
  }

  .simple_pc {
    font-family: sans-serif;
  }

  .deco_pc {
    font-family: 'Tajawal', sans-serif;
  }

  .arabic_pc {
    font-family: 'Sansita Swashed', cursive;
  }

  .korean_pc {
    font-family: 'Nova Flat', cursive;
  }


  .motif_btnpar {
    background: #4d2f40 !important;
    color: white;
    transition: 0.4s;
  }

  .font_btnpar {
    color: #4d2f40 !important;
    background: white !important;
    transition: 0.4s;

  }
</style>
<div class="paddingfromtop">
  <section class="cust2">
    <h2 style="    font-family: 'Calibri'!important;">Choose Your Engrave Product</h2>
    <div style="padding: 0px 70px;">
      <div class="container-fluid">


        <?php
if($engrave_product){
  foreach ($engrave_product as $cust_product) {
?>

        <div class="col-lg-3 col-md-3 mt-2">
          <a href="<?=base_path?>engrave_products_view/<?=base64_encode($cust_product->id);?>">
            <div class="">
              <img src="<?=base_path.$cust_product->image;?>" class="img-fluid">
              <div class="m-1">
                <p style="font-weight: 600;"><?=$cust_product->name;?></p>
                <p><b>$<?=$cust_product->base_price;?></b></p>
              </div>
            </div>
          </a>
        </div>
        <!-- <a href="<?=base_path;?>engrave_products_view/<?=base64_encode($cust_product->id);?>">
          <div class="col-lg-3 col-md-3 ">
            <div class="custom2">
              <img src="<?=base_path.$cust_product->image;?>" class="imagecust">
              <P class="image_cust_p"><?=$cust_product->name;?></P>
              <div class="overlay">
                <div class="over_proname"><?=$cust_product->s_desc;?></div>
                <div class="over_price"><i>$</i> <a href="<?=base_path;?>engrave_products_view/<?=base64_encode($cust_product->id);?>"><?=$cust_product->base_price;?>
                  </a></div>
                <a type="button" href="<?=base_path;?>engrave_products_view/<?=base64_encode($cust_product->id);?>">
                  <div class="text">SELECT</div>
                </a>
              </div>
            </div>
          </div>
        </a> -->



        <!-- Modal Start-->

        <div class="modal fade" id="exampleModal_<?=$cust_product->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header p-0">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <h5 style="font-size: 1.375rem;
            letter-spacing: 0.15em;
            text-transform: uppercase;line-height: 3;" class="modal-title text-center" id="exampleModalLabel">ADD COMPLIMENTARY ENGRAVING</h5>

              <div class="modal-body">
                <section>
                  <div class="container" style="width:100%;">
                    <div class="row">
                      <div class="col-md-7 text-center  custom_p">
                        <!-- <div class="row">
              					<div class="col-md-2 justify-content-center align-items-center d-flex"><p><</p></div>
              					<div class="col-md-8"><p style=" color: rgb(125, 125, 125);   font-size: 0.5625rem;">LOCATION 1 OF 3</p><span class="span_out">OUTSIDE</span></div>
              					<div class="col-md-2 justify-content-center align-items-center d-flex"><p>></p></div>
              				</div> -->
                      </div>
                      <div class="col-md-5 mt-auto mb-auto">
                        <div class="row text-center can_p ">
                          <div class="col-md-6 p-0 pr-3 cancel" id="cancel" pro_id="<?=$cust_product->id;?>">
                            <p>CANCEL</p>
                          </div>
                          <div class="col-md-6 p-0">
                            <!-- <p id="fine_<?=$cust_product->id;?>" type="button" style="background:lightgrey;color:white;">FINISHED</p> -->

                            <?php if(empty(Session::get('user_data'))) {?>

                            <p id="fine_<?=$cust_product->id;?>" type="button" style="background:lightgrey;color:white;" onclick="addToCartOfflineHandler(this)" data-category-id="<?=$cust_product->category_id;?>" data-subcategory-id=""
                              data-product-id="<?=$cust_product->id;?>" quantity="1" status="2">FINISHED</p>



                            <?php }else{ ?>

                            <p id="fine_<?=$cust_product->id;?>" type="button" style="background:lightgrey;color:white;" onclick="addToCartOnlineHandler(this)" data-category-id="<?=$cust_product->category_id;?>" data-subcategory-id=""
                              data-product-id="<?=$cust_product->id;?>" user-id="<?= Session::get('user_id');?>" quantity="1" status="2">FINISHED</p>



                            <?php } ?>

                          </div>
                        </div>

                      </div>
                    </div>
                  </div>
                </section>



                <section>


                  <div class="container" style="width:100%;">
                    <div class="row img_row">
                      <div class="col-md-7 pl-0" style="">


                        <input id="mySelect_<?=$cust_product->id;?>" pro_id="<?=$cust_product->id;?>" onkeyup=" myFunction_in(<?=$cust_product->id;?>)" type="text" class="numu mySelect " name="text" placeholder="add your masssage here" value="">


                        <p type="text" class="demo_text" id="demo_text_<?=$cust_product->id;?>"></p>





                        <input type="hidden" name="font_famly" id="font_famly_<?=$cust_product->id;?>" value="simple">







                        <img style="position: relative;" src="<?=base_path.$cust_product->image;?>">
                      </div>



                      <div class="col-md-5" id="demohide_<?=$cust_product->id;?>" style="    background: whitesmoke;">
                        <div class="row " style="padding: 15px;">
                          <div class="col-md-12 pr-0 pl-0 ">
                            <p style="    display: block;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.8125rem;
            margin-bottom: 20px;">ENGRAVE WITH</p>
                          </div>



                          <div class="col-md-12 font" id="font" style="cursor: pointer;" pro_id="<?=$cust_product->id;?>">
                            <div class="row" style="background: white; border: 1px solid lightgrey;border-radius:3px;">
                              <div class="col-md-4 p-0">
                                <img style="width: 100%;height: 80px;" src="<?=base_path?>frontend/assets/clipart.jpg">
                              </div>
                              <div class="col-md-8 mt-auto mb-auto">
                                <p style="display: block;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.8125rem;
            margin: 0px 0px 5px;
            font-weight: 700;">TEXT & MOTIFS</p>
                                <p style="font-size: 0.875rem;
            color: rgb(125, 125, 125);font-weight: 400;">Add a personal message</p>

                              </div>
                            </div>
                          </div>
                          <div class="col-md-12" style="cursor: pointer;">
                            <div id="heart" class="row mt-3 heart" style="background: white;border: 1px solid lightgrey;border-radius:3px;" pro_id="<?=$cust_product->id;?>">
                              <div class="col-md-4 p-0">
                                <img style="width: 100%;height: 80px;" src="<?=base_path?>frontend/assets/heart.png">
                              </div>
                              <div class="col-md-8 mt-auto mb-auto">
                                <p style="display: block;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.8125rem;
            margin: 0px 0px 5px;
            font-weight: 700;"> MOTIFS</p>
                                <p style="font-size: 0.875rem;
            color: rgb(125, 125, 125);font-weight: 400;">Choose from a selection of motif designs</p>

                              </div>
                            </div>
                          </div>


                          <div class="col-md-12 pr-0">
                            <p style="letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.625rem;
            /* display: inline-block; */
            display: none;
            padding: 20px 0px 0px;
            float: right;
            cursor: pointer;">SKIP</p>
                          </div>



                        </div>

                      </div>




                      <div class="col-md-5" id="big_motif_<?=$cust_product->id;?>" style=" display: none;    background: whitesmoke;">
                        <div class="row " style="padding: 15px;">

                          <div id="motif_first_<?=$cust_product->id;?>" class="col-md-12" style="    height:400px;
            overflow: overlay;background: white;display: none;">
                            <div class="row">
                              <div class="col-md-12">
                                <p style="
        	font-size: .8125rem;
            color: #999;
            text-align: left;
            margin: 10px 0 5px 5px;">Emojis</p>


                                <div class="col-md-12">

                                  <?php
$motif_da= App\adminmodel\Motif::wherenull('deleted_at')->where('is_active', 1)->get();
if(!empty($motif_da)){
  foreach ($motif_da as $motif) {

?>

                                  <div style="width:70px;height:70px;border: 1px solid ;justify-content: center;align-items: center;display: flex;float: left;padding-left: 10px">
                                    <img style="width: 100%;height: auto !important;" src="<?=base_path.$motif->image;?>" onclick="add_motif(this)" image="<?=$motif->image;?>" pro-id="<?=$cust_product->id;?>">
                                  </div>

                                  <?php }  } ?>

                                </div>
                              </div>
                            </div>
                          </div>










                        </div>

                      </div>







                      <div class="col-md-5" id="fontedit_<?=$cust_product->id;?>" style=" display: none;   background: whitesmoke;">
                        <div class="row " style="padding: 15px;">
                          <div id="font_btn" class="col-md-6 pr-0 pl-0 text-center font_btn" pro_id="<?=$cust_product->id;?>">
                            <p id="font_btnp" style="
        						display: block;
        						letter-spacing: 0.3em;
        						text-transform: uppercase;
        						line-height: 1.3;
        						font-size: 0.8125rem;
        						margin-bottom: 20px;
        						background: #4d2f40;
        						color: white;
        						padding:10px 13px;
        						cursor: pointer;
        						border-top-left-radius:5px;
        						border-bottom-left-radius: 5px;" pro_id="<?=$cust_product->id;?>" class="font_btnp">FONT</p>
                          </div>
                          <div id="motif_btn_<?=$cust_product->id;?>" class="col-md-6 pr-0 pl-0  text-center  motif_btn" pro_id="<?=$cust_product->id;?>">
                            <p id="motif_btnp_<?=$cust_product->id;?>" style="
        						display: block;
        						letter-spacing: 0.3em;
        						text-transform: uppercase;
        						line-height: 1.3;
        						font-size: 0.8125rem;
        						margin-bottom: 20px;
        						padding: 10px 13px;
        						cursor: pointer;
        						background: white;
        						border-top-right-radius: 5px;
        						border-bottom-right-radius: 5px;" class="motif_btnp" pro_id="<?=$cust_product->id;?>">MOTIF</p>
                          </div>
                          <div class="row" id="fo">
                            <div class="col-md-12">
                              <p style="
        						letter-spacing: .3em;
        						display: inline-block;
        						text-transform: uppercase;
        						line-height: 1.3;
        						font-size: 10px;
        						font-size: .625rem;
        						font-weight: 400;">FONT</p>
                            </div>

                          </div>
                          <div class="col-md-12">
                            <div class="row" style="background: white; border: 1px solid lightgrey;border-radius:3px;">


                            </div>
                          </div>
                          <div id="message_<?=$cust_product->id;?>" class="col-md-12" style="cursor: pointer;">
                            <div class="row mt-3" style="background: white;border: 1px solid lightgrey;border-radius:3px;">

                              <div class="col-md-12">

                                <input type="hidden" name="checkkbox" id="checkbox_<?=$cust_product->id;?>" value="0">


                                <input style="
        	outline: 0;
            background-color: #fff;
            border: 1px solid #D4D4D4;
            width: 15px;
            height: 15px;
            cursor: pointer;
            vertical-align: middle;" type="checkbox" name="Preview your message" pro_id="<?=$cust_product->id;?>">
                                <label style="
        	font-size: .875rem;
            margin-left: 10px;
            color: #4d2f40;">Preview your message</label>
                              </div>



                              <div class="col-md-12">
                                <p id="script_p_<?=$cust_product->id;?>" class="script_p" style="font-family: 'Engagement', cursive;" pro_id="<?=$cust_product->id;?>">Script</p>
                                <p id="block_p_<?=$cust_product->id;?>" class="block_p" style="font-family: 'Lalezar', cursive;" pro_id="<?=$cust_product->id;?>">BLOCK</p>
                                <p id="simple_p_<?=$cust_product->id;?>" class="simple_p" style="color: orange;" pro_id="<?=$cust_product->id;?>">Simple</p>
                                <p id="deco_p_<?=$cust_product->id;?>" class="deco_p" style="font-family: 'Tajawal', sans-serif;" pro_id="<?=$cust_product->id;?>">Deco</p>
                                <p id="arabic_p_<?=$cust_product->id;?>" class="arabic_p" style="font-family: 'Sansita Swashed', cursive;" pro_id="<?=$cust_product->id;?>">Arabic</p>
                                <p id="korean_p_<?=$cust_product->id;?>" class="korean_p" style="font-family: 'Nova Flat', cursive;" pro_id="<?=$cust_product->id;?>">Korean</p>
                              </div>

                            </div>
                          </div>





                          <div id="motif_<?=$cust_product->id;?>" class="col-md-12" style="    height:250px;
            overflow: overlay;background: white;display: none;">
                            <div class="row">
                              <div class="col-md-12">
                                <p style="
        	font-size: .8125rem;
            color: #999;
            text-align: left;
            margin: 10px 0 5px 5px;">Emojis</p>


                                <div class="col-md-12">

                                  <?php
$motif_da= App\adminmodel\Motif::wherenull('deleted_at')->where('is_active', 1)->get();
if(!empty($motif_da)){
  foreach ($motif_da as $motif) {

?>

                                  <div style="width:70px;height:70px;border: 1px solid ;justify-content: center;align-items: center;display: flex;float: left;padding-left: 10px" onclick="add_motif(this)" image="<?=$motif->image;?>"
                                    pro-id="<?=$cust_product->id;?>">
                                    <img style="width: 100%;height: auto !important;" src="<?=base_path.$motif->image;?>">
                                  </div>

                                  <?php }  } ?>

                                </div>
                              </div>
                            </div>
                          </div>




                          <div class="col-md-12 mt-3">

                            <div class="row">
                              <div class="col-md-4">
                                <p style="
        								text-transform: none;
        								color: gray;
        								letter-spacing: normal;
        								font-size: 13px;">Font size</p>
                              </div>
                              <div class="col-md-8 val_span">
                                <span id="minus" class="Minus" product-Id="<?php echo $cust_product->id; ?>">-</span>
                                <span id="font_sz_<?php echo $cust_product->id; ?>" product-Id="<?php echo $cust_product->id; ?>">15</span>
                                <span id="plus" class="Add" product-Id="<?php echo $cust_product->id; ?>">+</span>
                              </div>

                            </div>

                          </div>

                        </div>

                      </div>
                    </div>
                  </div>



                </section>

              </div>
              <div class="modal-footer">

              </div>

            </div>
          </div>
        </div>



        <!-- Model End -->



        <?php  } }  ?>



      </div>

    </div>
  </section>
</div>







<script>
  $(document).ready(function() {
    $(".font").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#fontedit_" + pro_id).show();
      $("#mySelect_" + pro_id).show();
      $("#demo_text_" + pro_id).show();
      $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('numu');
    });

    $(".font").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#demohide_" + pro_id).hide();
      $("#big_motif_" + pro_id).hide();
    });
  });

  $(document).ready(function() {
    $(".cancel").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#fontedit_" + pro_id).hide();
      $("#fontedit_" + pro_id).hide();
      $("#mySelect_" + pro_id).hide();
      $("#demo_text_" + pro_id).hide();
    });
    $(".cancel").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#demohide_" + pro_id).show();
    });
  });

  $(document).ready(function() {
    $(".motif_btn").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#message_" + pro_id).hide();
      $("#fo_" + pro_id).hide();
    });
    $(".motif_btn").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#motif_" + pro_id).show();
    });
  });



  $(document).ready(function() {
    $(".font_btn").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#motif_" + pro_id).hide();
    });
    $(".font_btn").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#message_" + pro_id).show();
      $("#fo_" + pro_id).show();
    });
  });
</script>

<script>
  $('.script_p').click(function() {
    var pro_id = $(this).attr('pro_id');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).removeClass();
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('script_pc');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('numu');

    $('#font_famly_' + pro_id).val('');
    $('#font_famly_' + pro_id).val('script');
  });


  $('.block_p').click(function() {
    var pro_id = $(this).attr('pro_id');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).removeClass();

    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('block_pc');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('numu');

    $('#font_famly_' + pro_id).val('');
    $('#font_famly_' + pro_id).val('block');
  });


  $('.simple_p').click(function() {
    var pro_id = $(this).attr('pro_id');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).removeClass();

    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('simple_pc');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('numu');

    $('#font_famly_' + pro_id).val('');
    $('#font_famly_' + pro_id).val('simple');
  });



  $('.deco_p').click(function() {
    var pro_id = $(this).attr('pro_id');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).removeClass();

    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('deco_pc');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('numu');

    $('#font_famly_' + pro_id).val('');
    $('#font_famly_' + pro_id).val('deco');
  });



  $('.arabic_p').click(function() {
    var pro_id = $(this).attr('pro_id');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).removeClass();

    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('arabic_pc');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('numu');

    $('#font_famly_' + pro_id).val('');
    $('#font_famly_' + pro_id).val('arabic');
  });



  $('.korean_p').click(function() {
    var pro_id = $(this).attr('pro_id');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).removeClass();

    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('korean_pc');
    $('#mySelect_' + pro_id + ',#demo_text_' + pro_id).addClass('numu');

    $('#font_famly_' + pro_id).val('');
    $('#font_famly_' + pro_id).val('korean');
  });




  $('.motif_btnp').click(function() {
    var pro_id = $(this).attr('pro_id');

    $('').removeClass();
    $('#motif_btnp_' + pro_id).addClass('motif_btnpar');
    $('#font_btnp_' + pro_id).addClass('font_btnpar');
  });


  $('.font_btnp').click(function() {
    var pro_id = $(this).attr('pro_id');
    $('#font_btnp_' + pro_id).removeClass('font_btnpar');
    $('#motif_btnp_' + pro_id).removeClass('motif_btnpar');

  });




  $(document).ready(function() {

    $(".mySelect").keyup(function() {

      var pro_id = $(this).attr('pro_id');
      var a = $(this).val();

      var checks = $('#checkbox_' + pro_id).val();



      if (checks == 1) {
        $('#script_p_' + pro_id).text('');
        $('#block_p_' + pro_id).text('');
        $('#simple_p_' + pro_id).text('');
        $('#deco_p_' + pro_id).text('');
        $('#arabic_p_' + pro_id).text('');
        $('#korean_p_' + pro_id).text('');

        $('#script_p_' + pro_id).html(a);
        $('#block_p_' + pro_id).html(a);
        $('#simple_p_' + pro_id).html(a);
        $('#deco_p_' + pro_id).html(a);
        $('#arabic_p_' + pro_id).html(a);
        $('#korean_p_' + pro_id).html(a);

      } else if (checks == 0) {

        $('#script_p_' + pro_id).text('');
        $('#block_p_' + pro_id).text('');
        $('#simple_p_' + pro_id).text('');
        $('#deco_p_' + pro_id).text('');
        $('#arabic_p_' + pro_id).text('');
        $('#korean_p_' + pro_id).text('');

        $('#script_p_' + pro_id).text('Script');
        $('#block_p_' + pro_id).text('BLOCK');
        $('#simple_p_' + pro_id).text('Simple');
        $('#deco_p_' + pro_id).text('Deco');
        $('#arabic_p_' + pro_id).text('Arabic');
        $('#korean_p_' + pro_id).text('Korean');
      }






      if (a != "") {
        $("#fine_" + pro_id).css("background-color", "rgb(77 47 64)");



      } else {
        $("#fine_" + pro_id).css("background-color", "lightgrey");
      }

    });
  });
</script>


<script>
  $(document).ready(function() {
    $(".heart").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#demohide_" + pro_id).hide();

    });
    $(".heart").click(function() {
      var pro_id = $(this).attr('pro_id');
      $("#big_motif_" + pro_id).show();
      $("#motif_first_" + pro_id).show();
    });
  });
</script>




<script type="text/javascript">
  $('.Add').on('click', function() {
    var product_id = $(this).attr('product-Id');
    var input = $('#font_sz_' + product_id).text();


    var inc_num = 1;
    var increaseVal = parseInt(input) + parseInt(inc_num);

    $("#font_sz_" + product_id).html("");
    $("#font_sz_" + product_id).append(increaseVal);

    var font_state = "font-size:" + increaseVal + "px !important;";
    $('#demo_text_' + product_id).attr('style', font_state);


  })

  $('.Minus').on('click', function() {
    var product_id = $(this).attr('product-Id');
    var input = $('#font_sz_' + product_id).text();

    var inc_num = 1;

    if (input >= 16) {
      var decreaseVal = parseInt(input) - parseInt(inc_num);
    } else {
      var decreaseVal = "15";
    }

    $("#font_sz_" + product_id).html("");
    $("#font_sz_" + product_id).append(decreaseVal);

    var font_state = "font-size:" + decreaseVal + "px !important;";
    $('#demo_text_' + product_id).attr('style', font_state);



  })
</script>


<script>
  $(document).ready(function() {
    $('input[type="checkbox"]').click(function() {


      var pro_id = $(this).attr('pro_id');
      var text = $('#demo_text_' + pro_id).html();

      if ($(this).prop("checked") == true) {
        $('#script_p_' + pro_id).text('');
        $('#block_p_' + pro_id).text('');
        $('#simple_p_' + pro_id).text('');
        $('#deco_p_' + pro_id).text('');
        $('#arabic_p_' + pro_id).text('');
        $('#korean_p_' + pro_id).text('');

        $('#script_p_' + pro_id).html(text);
        $('#block_p_' + pro_id).html(text);
        $('#simple_p_' + pro_id).html(text);
        $('#deco_p_' + pro_id).html(text);
        $('#arabic_p_' + pro_id).html(text);
        $('#korean_p_' + pro_id).html(text);

        $('#checkbox_' + pro_id).val('');
        $('#checkbox_' + pro_id).val(1);
      } else if ($(this).prop("checked") == false) {
        $('#script_p_' + pro_id).text('');
        $('#block_p_' + pro_id).text('');
        $('#simple_p_' + pro_id).text('');
        $('#deco_p_' + pro_id).text('');
        $('#arabic_p_' + pro_id).text('');
        $('#korean_p_' + pro_id).text('');

        $('#script_p_' + pro_id).text('Script');
        $('#block_p_' + pro_id).text('BLOCK');
        $('#simple_p_' + pro_id).text('Simple');
        $('#deco_p_' + pro_id).text('Deco');
        $('#arabic_p_' + pro_id).text('Arabic');
        $('#korean_p_' + pro_id).text('Korean');

        $('#checkbox_' + pro_id).val('');
        $('#checkbox_' + pro_id).val(0);
      }
    });
  });
</script>

<script>
  function add_motif(obj) {

    var image = $(obj).attr("image");
    var pro_id = $(obj).attr("pro-id");
    var base_path = "<?=base_path;?>";
    var msg = $("#mySelect_" + pro_id).val();
    var add_msg = msg + '<img style="height: 18px;width: 18px;" src="' + base_path + image + '"/>';

    // alert(image);
    // alert(pro_id);
    // alert(base_path);
    // alert(msg);
    // alert(add_msg);
    $("#demo_text_" + pro_id).text('');
    $("#demo_text_" + pro_id).html(add_msg);

    $("#mySelect_" + pro_id).val('');
    $("#mySelect_" + pro_id).val(add_msg);



    var checks = $('#checkbox_' + pro_id).val();



    if (checks == 1) {
      $('#script_p_' + pro_id).text('');
      $('#block_p_' + pro_id).text('');
      $('#simple_p_' + pro_id).text('');
      $('#deco_p_' + pro_id).text('');
      $('#arabic_p_' + pro_id).text('');
      $('#korean_p_' + pro_id).text('');

      $('#script_p_' + pro_id).html(add_msg);
      $('#block_p_' + pro_id).html(add_msg);
      $('#simple_p_' + pro_id).html(add_msg);
      $('#deco_p_' + pro_id).html(add_msg);
      $('#arabic_p_' + pro_id).html(add_msg);
      $('#korean_p_' + pro_id).html(add_msg);

    } else if (checks == 0) {

      $('#script_p_' + pro_id).text('');
      $('#block_p_' + pro_id).text('');
      $('#simple_p_' + pro_id).text('');
      $('#deco_p_' + pro_id).text('');
      $('#arabic_p_' + pro_id).text('');
      $('#korean_p_' + pro_id).text('');

      $('#script_p_' + pro_id).text('Script');
      $('#block_p_' + pro_id).text('BLOCK');
      $('#simple_p_' + pro_id).text('Simple');
      $('#deco_p_' + pro_id).text('Deco');
      $('#arabic_p_' + pro_id).text('Arabic');
      $('#korean_p_' + pro_id).text('Korean');
    }




  }
</script>


@endsection
