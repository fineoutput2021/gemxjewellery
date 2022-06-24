@extends('frontend.layout')
@section('main')

<style>
  ul li a {
    color: #000 !important;
  }
</style>

<style>
  /*new start*/

  [class*="span"] {
    float: left;
    min-height: 1px;
    margin-left: 20px;
  }

  .span12 {
    width: 940px;
  }

  .span8 {
    width: 620px;
  }

  .span4 {
    width: 300px;
  }

  .span3 {
    width: 220px;
  }

  .row-fluid {
    width: 100%;
    *zoom: 1;
  }

  .row-fluid:before,
  .row-fluid:after {
    display: table;
    line-height: 0;
    content: "";
  }

  .row-fluid:after {
    clear: both;
  }

  .row-fluid [class*="span"] {
    display: block;
    float: left;
    width: 100%;
    min-height: 30px;
    margin-left: 2.127659574468085%;
    *margin-left: 2.074468085106383%;
    -webkit-box-sizing: border-box;
    -moz-box-sizing: border-box;
    box-sizing: border-box;
  }

  .row-fluid [class*="span"]:first-child {
    margin-left: 0;
  }

  .row-fluid .span12 {
    width: 100%;
    *width: 99.94680851063829%;
  }

  .row-fluid .span8 {
    width: 65.95744680851064%;
    *width: 65.90425531914893%;
  }

  .row-fluid .span4 {
    width: 31.914893617021278%;
    *width: 31.861702127659576%;
  }

  .row-fluid .span3 {
    width: 23.404255319148934%;
    *width: 23.351063829787233%;
  }

  p {
    margin: 0 0 10px;
  }

  h5 {
    margin: 10px 0;
    font-family: inherit;
    font-weight: bold;
    line-height: 20px;
    color: inherit;
    text-rendering: optimizelegibility;
  }

  h5 {
    font-size: 14px;
  }

  label,
  input,
  select {
    font-size: 14px;
    font-weight: normal;
    line-height: 20px;
  }

  input,
  select {
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
  }

  label {
    display: block;
    margin-bottom: 5px;
  }

  select,
  input[type="text"] {
    display: inline-block;
    height: 20px;
    padding: 4px 6px;
    margin-bottom: 10px;
    font-size: 14px;
    line-height: 20px;
    color: #555;
    vertical-align: middle;
    -webkit-border-radius: 4px;
    -moz-border-radius: 4px;
    border-radius: 4px;
  }

  input {
    width: 206px;
  }

  input[type="text"] {
    background-color: #fff;
    border: 1px solid #ccc;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border linear .2s, box-shadow linear .2s;
    -moz-transition: border linear .2s, box-shadow linear .2s;
    -o-transition: border linear .2s, box-shadow linear .2s;
    transition: border linear .2s, box-shadow linear .2s;
  }

  input[type="text"]:focus {
    border-color: rgba(82, 168, 236, 0.8);
    outline: 0;
    outline: thin dotted \9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  }

  input[type="checkbox"] {
    margin: 0px 0 0;
    margin-top: 1px \9;
    *margin-top: 0;
    line-height: normal;
  }

  input[type="submit"],
  input[type="checkbox"] {
    width: auto;
  }

  select {
    height: 30px;
    *margin-top: 4px;
    line-height: 30px;
  }

  select {
    width: 220px;
    background-color: #fff;
    border: 1px solid #ccc;
  }

  select:focus,
  input[type="checkbox"]:focus {
    outline: thin dotted #333;
    outline: 5px auto -webkit-focus-ring-color;
    outline-offset: -2px;
  }

  input:-moz-placeholder {
    color: #999;
  }

  input:-ms-input-placeholder {
    color: #999;
  }

  input::-webkit-input-placeholder {
    color: #999;
  }

  input {
    margin-left: 0;
  }

  input:focus:invalid,
  select:focus:invalid {
    color: #b94a48;
    border-color: #ee5f5b;
  }

  input:focus:invalid:focus,
  select:focus:invalid:focus {
    border-color: #e9322d;
    -webkit-box-shadow: 0 0 6px #f8b9b7;
    -moz-box-shadow: 0 0 6px #f8b9b7;
    box-shadow: 0 0 6px #f8b9b7;
  }

  /*! CSS Used from: https://www.abhaas.com/css/bootstrap-responsive.min.css */
  @media (min-width:1200px) {
    [class*="span"] {
      float: left;
      min-height: 1px;
      margin-left: 0px;
    }

    .span12 {
      width: 1170px;
    }

    .span8 {
      width: 770px;
    }

    .span4 {
      width: 370px;
    }

    /* .span3{width:270px;} */
    .row-fluid {
      width: 100%;
      *zoom: 1;
    }

    .row-fluid:before,
    .row-fluid:after {
      display: table;
      line-height: 0;
      content: "";
    }

    .row-fluid:after {
      clear: both;
    }

    .row-fluid [class*="span"] {
      display: block;
      float: left;
      width: 100%;
      min-height: 30px;
      margin-left: 2.564102564102564%;
      *margin-left: 2.5109110747408616%;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    .row-fluid [class*="span"]:first-child {
      margin-left: 0;
    }

    .row-fluid .span12 {
      width: 100%;
      *width: 99.94680851063829%;
    }

    .row-fluid .span8 {
      width: 65.81196581196582%;
      *width: 65.75877432260411%;
    }

    .row-fluid .span4 {
      width: 31.623931623931625%;
      *width: 31.570740134569924%;
    }

    .row-fluid .span3 {
      width: 23.076923076923077%;
      *width: 23.023731587561375%;
    }

    input {
      margin-left: 0;
    }
  }

  @media (min-width:768px) and (max-width:979px) {
    [class*="span"] {
      float: left;
      min-height: 1px;
      margin-left: 20px;
    }

    .span12 {
      width: 724px;
    }

    .span8 {
      width: 476px;
    }

    .span4 {
      width: 228px;
    }

    .span3 {
      width: 166px;
    }

    .row-fluid {
      width: 100%;
      *zoom: 1;
    }

    .row-fluid:before,
    .row-fluid:after {
      display: table;
      line-height: 0;
      content: "";
    }

    .row-fluid:after {
      clear: both;
    }

    .row-fluid [class*="span"] {
      display: block;
      float: left;
      width: 100%;
      min-height: 30px;
      margin-left: 2.7624309392265194%;
      *margin-left: 2.709239449864817%;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    .row-fluid [class*="span"]:first-child {
      margin-left: 0;
    }

    .row-fluid .span12 {
      width: 100%;
      *width: 99.94680851063829%;
    }

    .row-fluid .span8 {
      width: 65.74585635359117%;
      *width: 65.69266486422946%;
    }

    .row-fluid .span4 {
      width: 31.491712707182323%;
      *width: 31.43852121782062%;
    }

    .row-fluid .span3 {
      width: 22.92817679558011%;
      *width: 22.87498530621841%;
    }

    input {
      margin-left: 0;
    }
  }

  @media (max-width:767px) {
    .row-fluid {
      width: 100%;
    }

    [class*="span"],
    .row-fluid [class*="span"] {
      display: block;
      float: none;
      width: 100%;
      margin-left: 0;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }

    .span12,
    .row-fluid .span12 {
      width: 100%;
      -webkit-box-sizing: border-box;
      -moz-box-sizing: border-box;
      box-sizing: border-box;
    }
  }

  @media (max-width:480px) {
    input[type="checkbox"] {
      border: 1px solid #ccc;
    }
  }

  /*! CSS Used from: https://www.abhaas.com/css/slider-css/demo.css */
  .textAlignLeft {
    text-align: left !important;
  }

  input[type="text"] {
    border-radius: 4px;
    color: #000000;
    box-shadow: none;
    border: 1px solid #dedddd;
  }

  section .detail {
    margin: 34px 0 0;
  }

  section .detail .market-req {
    background-color: #333;
    font-family: "Helvetica Neue", Helvetica, Arial, sans-serif;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    font-size: 14px;
    margin: 0 0 18px 0;
    color: #fff;
    padding: 15px 10px;
    text-align: left;
  }

  section .detail label {
    font-size: 14px;
    font-family: Arial, Helvetica, sans-serif;
    color: #000;
    cursor: auto;
    text-align: left;
    line-height: 48px;
  }

  section .detail select {
    background-color: #fff;
    border: 1px solid #ccc;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border linear .2s, box-shadow linear .2s;
    -moz-transition: border linear .2s, box-shadow linear .2s;
    -o-transition: border linear .2s, box-shadow linear .2s;
    transition: border linear .2s, box-shadow linear .2s;
    background-color: #EAEAEA;
    border: 1px solid #E1DFDF;
    -webkit-border-radius: 8px;
    -moz-border-radius: 8px;
    border-radius: 8px;
    border-radius: 2px;
    box-shadow: 0 0 1px #FFFFFF inset;
    padding: 8px 10px;
    width: 90%;
    font-size: 16px;
    color: #000000;
  }

  .textAlignLeft {
    text-align: left !important;
  }

  section .detail input[type="text"] {
    padding: 8px 4%;
    width: 92%;
    margin-bottom: 10px;
    background-color: #fff;
    border: 1px solid #ccc;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075);
    -webkit-transition: border linear .2s, box-shadow linear .2s;
    -moz-transition: border linear .2s, box-shadow linear .2s;
    -o-transition: border linear .2s, box-shadow linear .2s;
    transition: border linear .2s, box-shadow linear .2s;
  }

  section .detail input[type="text"]:focus {
    border-color: rgba(82, 168, 236, 0.8);
    outline: 0;
    outline: thin dotted \9;
    -webkit-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    -moz-box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
    box-shadow: inset 0 1px 1px rgba(0, 0, 0, 0.075), 0 0 8px rgba(82, 168, 236, 0.6);
  }

  .star {
    color: #ff0000;
  }

  /*! CSS Used from: https://www.abhaas.com/css/main.css */
  section .mid-inner {
    padding: 15px;
  }

  section .product {
    background-color: #fff;
    padding: 15px 15px;
    border: solid 1px #dadada;
    ;
    margin-bottom: 15px;
    filter: progid:DXImageTransform.Microsoft.DropShadow(OffX=5, OffY=5, Color=#ff0000);
    border: 1px solid lightgrey;
  }

  section .product img {
    margin: 0 auto;
    display: block;
  }

  @media (min-width: 320px) and (max-width: 480px) {
    section .product {
      margin: 0 auto 15px;
      width: 328px;
      border: 1px solid lightgrey;
    }
  }

  @media (max-width: 320px) {
    section .product {
      margin: 0 auto 15px;
      width: auto;
      border: 1px solid lightgrey;
    }
  }

  .btn-regular_new {
    background-color: #9b9ca0;
    color: #000;
    display: block;
    font-family: 'HelveticaNeueLTPro35Thin';
    font-size: 15px;
    font-size: 15px;
    behavior: url(https://www.abhaas.com/PIE.htc);
    padding: 6px 51px;
    text-align: center;
    text-decoration: none;
    width: 50%;
    font-weight: 600;
    float: right;
  }

  .btn-regular_new:hover {
    text-decoration: none;
    box-shadow: 0 0 15px #515151;
  }

  /*! CSS Used fontfaces */


  input[type="text"] {
    width: 92%;

    margin-bottom: 10px;
    background-color: rgb(255, 255, 255);
    box-shadow: rgba(0, 0, 0, 0.075) 0px 1px 1px inset;
    padding: 19px 4%;
    border-width: 1px;
    border-style: solid;
    border-color: rgb(204, 204, 204);
    border-image: initial;
    transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
  }

  /*new end*/
  .product {
    border: 1px solid lightgrey;
    margin: 15px;
    padding: 10px;
    box-shadow: 0px 0px 3px 3px #ddb33b;
  }




  }

  /*! CSS Used from: Embedded */
  .box4 {
    text-align: center;
  }

  .box4:before {
    content: "";
  }

  .box4 {
    overflow: hidden;
  }

  .box4 .title {
    letter-spacing: 1px;
  }

  .box4 .post {
    font-style: italic;
  }

  .box4 .icon li a:hover {
    border-radius: 50%;
  }

  .box4 .title {
    text-transform: uppercase;
  }

  .box4 {
    box-shadow: 0 0 3px rgba(0, 0, 0, .3);
  }

  .box4 {
    position: relative;
    border: 1px solid lightgrey;
    margin: 15px;
    /* box-shadow: 0px 0px 3px 3px #ddb33b; */
  }

  /* .box4:before{width:0;height:200%;background:rgba(0,0,0,.5);position:absolute;top:0;left:-250px;bottom:0;transform:skewX(-36deg);transition:all .5s ease 0s;} */
  .box4:hover:before {
    width: 200%;
  }

  .box4 img {
    width: 100%;
    height: auto;
  }

  .box4 .box-content {
    width: 100%;
    height: 100%;
    padding-top: 20%;
    position: absolute;
    top: 65%;
    left: 0;
    transform: scale(0);
    transition: all .3s ease 0s;
  }

  .box4 .icon {
    list-style: none;
    padding: 0;
  }

  .box4:hover .box-content {
    transform: scale(1);
  }

  .box4 .title {
    font-size: 22px;
    font-weight: 700;
    color: #fff;
    margin: 0 0 10px;
  }

  .box4 .post {
    display: block;
    font-size: 15px;
    font-weight: 600;
    color: #fff;
    margin-bottom: 20px;
  }

  .box4 .icon {
    margin: 0;
  }

  .box4 .icon li {
    display: inline-block;
  }

  .box4 .icon li a {
    display: block;
    width: 35px;
    height: 35px;
    line-height: 35px;
    font-size: 20px;
    background: #fff;
    color: #ee4266;
    margin-right: 10px;
    transition: all .3s ease 0s;
  }

  @media only screen and (max-width:990px) {
    .box4 {
      margin-bottom: 30px;
    }
  }

  @media only screen and (max-width:767px) {
    .box4:before {
      left: -400px;
    }

    .box4:hover:before {
      width: 300%;
    }
  }
</style>

<div class="paddingfromtop" style="margin-bottom:5rem !important;">
  <div class="container" style="border: 1px solid lightgrey;margin-top:7rem;margin-bottom:10rem;">
    <div class="interior ">
      <div class="span12 text-center">
        <h5>
          Select the Catalogs Category You Would like to Receive</h5>
      </div>
      <div class="row p-0">
        <form action="<?=base_path;?>user_catelogue_request" method="post" enctype="multipart/form-data">
          @csrf

          <?php
 $CatelogueData = App\adminmodel\Catelogue::wherenull('deleted_at')->where('is_active', 1)->get();
 // echo count($CatelogueData); die();
 $i=0;
 if(!empty($CatelogueData)){
   foreach ($CatelogueData as $catelogue) {

     if(!empty($catelogue->image)){
       $catelogueimg = base_path.$catelogue->image;
     }else{
       $catelogueimg = "";
     }?>
          <div class="col-xs-12 col-sm-6 col-md-3 blogBox moreBox">
            <div class="item">
              <img src="<?=$catelogueimg;?>" class="img-fluid">
              <div class="blogTxt">
                <div class="blogCategory">
                  <div class="co-12 mt-2 text-center" style="">
                    <input type="checkbox" name="catelogue_checkbx[]" value="<?=$catelogue->id;?>">
                    <span style="color: #000;font: 14px arial; text-align: justify; font-weight: bold"><?=$catelogue->name;?></span>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <?}}?>
      </div>
      <div class="row mt-5 mb-5 justify-content-center">
        <div id="loadMore" style="" class="col-md-2">
          <a href="#"><button class="button js-gtm-element btn-lg w-100" style="color:white;">Load More</button></a>
        </div>
      </div>
    </div>

    <div class="detail col-md-12">
      <div class="row-fluid">
        <div class="span12">
          <div class="span4">
            <label>
            Business Name:</label>
          </div>
          <div class="span8 textAlignLeft">
            <input name="business_name" type="text" id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_txt_name" placeholder="Business Name" >
            <span id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_RequiredFieldValidator1" style="display:none;"></span>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="span4">
            <label>
               Contact Name <span class="star">*</span>:
            </label>
          </div>
          <div class="span8 textAlignLeft">
            <input name="contact_name" type="text" id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_txt_cname" placeholder="Contact Name" class="required" onkeypress="return alpha(event)">
            <span id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_RequiredFieldValidator5" style="display:none;"></span>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="span4">
            <label>
               Email <span class="star">*</span>:</label>
          </div>
          <div class="span8 textAlignLeft">
            <input name="email" type="text" id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_txt_email" class="required" placeholder="Email">
            <span id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_RequiredFieldValidator6" style="display:none;"></span>
            <span id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_RegularExpressionValidator1" style="display:none;"></span>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="span4">
            <label>
            Phone :</label>
          </div>
          <div class="span8 textAlignLeft">
            <input name="phone" type="text" id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_txt_phn"  placeholder="Phone No">
            <span id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_RequiredFieldValidator4" style="display:none;"></span>
            <span id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_CompareValidator1" style="display:none;"></span>
          </div>
        </div>
      </div>
      <div class="row-fluid">
        <div class="span12">
          <div class="span4">
            <label>
              Country <span class="star">*</span>:</label>
          </div>
          <div class="span8 textAlignLeft">
            <select name="country" id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_ddl_country" class="required" data-theme="a" placeholder="Country" style="height:40px;width:92%;outline: 0;padding:4px 30px;">
              <?php
                    $CountryCode = App\frontendmodel\CountryCode::get();
                    if(!empty($CountryCode)){
                    foreach ($CountryCode as $cntrycod) {

                    ?>
              <option value="<?=$cntrycod->nicename;?>" <?php if($cntrycod->iso == 'US'){ echo 'selected';} ?>><?=$cntrycod->nicename;?></option>

              <?php } } ?>

            </select>
            <span id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_RequiredFieldValidator3" style="display:none;"></span>
          </div>
        </div>
      </div>
      <div class="d-flex mt-3 mb-2" style="justify-content: center;">
        <input style="background-color:#1f0b00;border:none;color: white;outline: none;margin-right: 0px;" type="submit" name="ctl00$ctl00$ContentPlaceHolderMaster1$ContentPlaceHolderInner$Button1" value="Submit" onclick=""
          id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_Button1" class="btn-regular_new">
        <div id="ContentPlaceHolderMaster1_ContentPlaceHolderInner_ValidationSummary1" style="display:none;">

        </div>
      </div>
    </div>

    </form>
  </div>
</div>


<script>
  $(document).ready(function() {
    $(".moreBox").slice(0, 3).show();
    if ($(".blogBox:hidden").length != 0) {
      $("#loadMore").show();
    }
    $("#loadMore").on('click', function(e) {
      e.preventDefault();
      $(".moreBox:hidden").slice(0, 6).slideDown();
      if ($(".moreBox:hidden").length == 0) {
        $("#loadMore").fadeOut('slow');
      }
    });
  });
</script>
@endsection
