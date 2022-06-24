<style media="screen">
@media screen and (max-width: 750px) {
  .five { order: 5; margin-top:2px; }
  .four { order: 4;  margin-top:2px;}
  .three { order: 1;}
  .two { order: 3; margin-top:2px;}
  .one { order: 2;margin-top:2px;}
  .fw{font-weight: 900}
}
</style>
<?
$homepage_img_data = App\adminmodel\Homepage_imgs::wherenull('deleted_at')->where('is_active', 1)->first();

?>

<section class="newsletter mt-5" style="background-size: 100% 100%;background-image: url('<?php echo base_path.$homepage_img_data->image3?>'); background-repeat: no-repeat; margin-top:5rem !important;">
  <div class="newsletter__body">
    <div class="newsletter-copy">
      <div class="newsletter__title" style="background-size: 100% 100%;padding: 3rem 0rem;background-image: url('<?php echo base_path.$homepage_img_data->image3?>'); background-repeat: no-repeat;">Join our newsletter</div>
      <style>
      .bginherit{
        background-image:inherit !important;
      }
      </style>
      <style media="screen">
      /*! CSS Used from: https://cdn.shopify.com/s/files/1/0419/6922/1789/t/14/assets/theme.scss.css?v=15983834990774641455 */
  *,*:before,*:after{box-sizing:border-box!important;-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale;}
  :active{outline:none;}
  select{color:inherit;font:inherit;margin:0;}
  select{text-transform:none;}
  body:not(.is-tabbing) select:focus{outline:none;}
  select::-ms-expand{display:none;}
  /*! CSS Used from: Embedded */
  .locale-selectors__selector{-moz-appearance:none!important;-webkit-appearance:none!important;appearance:none!important;background-color:#fff !important;background-image:url(data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI4IiBoZWlnaHQ9IjUiPjxwYXRoIGZpbGw9IiM2NjYiIGQ9Ik0wIDBzMy40IDQuNCAzLjUgNC40QzMuNyA0LjQgNy4xIDAgNy4xIDBIMHoiLz48L3N2Zz4=)!important;background-position:right 10px center!important;background-repeat:no-repeat!important;background-size:auto!important;border-radius:2px!important;border:0!important;color:#333!important;cursor:pointer!important;display:inline-block!important;font-size:16px!important;height:auto!important;line-height:1.375!important;margin:0.3em!important;max-width:100%!important;min-height:unset!important;min-width:unset!important;padding:0.3em 28px 0.3em 0.5em!important;text-indent:0.01px!important;text-overflow:''!important;vertical-align:baseline!important;width:auto!important;margin:0!important;}
      </style>
<script>
window.onload=() =>{
  if(screen.width>=900){
    document.querySelector(".newsletter__title").classList.add("bginherit");
  }
}
</script>
      <!-- <div>
        <img class="img-fluid" src="<?php echo base_path;?>assets/images/jewdfdf.jpg" />
      </div> -->
      <div class="large-subtitle">STAY UP TO DATE</div>
      <div class="large-subtitle-thin">on latest drops, edits &amp; offers</div>
    </div>
    <div class="footer-newsletter-container">
      <form method="post" action="<?=base_path?>add_newsletter_process" class="js-footer-subscribe step active newsletter__form newsletter__form--1" data-step="1" enctype="multipart/form-data" style="background:none;">
        @csrf
        <input type="hidden" name="step" value="1">
        <div class="newsletter__control">
          <input type="text" class="input" placeholder="Email" address="" name="email">
          <p class="newsletter__error" style="display: none;">
            <img src="https://www.monicavinader.com/images/2020/error.svg" width="14px" height="16px">
            <span></span>
          </p>
        </div>
        <button class="button js-gtm-element "  type="submit" style="/*height: 100% !important;/* width: 25%; */font-size: 20px;/*padding: 10px;*/border-radius: 2px;">
<span class="text-white" style="font-size:16px;">Join<i class="bi bi-arrow-right px-3" style="color:white;"></i></span>
        </button>
      </form>

      <form method="post" action="#" class="js-footer-subscribe step newsletter__form newsletter__form--2" data-step="2">
        <input type="hidden" name="step" value="2">
        <input type="hidden" name="contact-id">
        <div class="newsletter__control newsletter__control--dob">
          <p class="richtext">Thank you for signing up. Let us know your DOB for extra gifts.</p>
          <div id="contact_dob_wrap" class="field field--date-select date-select field-select">
            <label for="contact_dob">Date of birth</label>
            <div class="select-replace" id="contact_dob_day_selectreplace">
              <select id="contact_dob_day" name="contact_dob_day" class="input select-replaced">
                <option value="">Day</option>
                <option value="01">01</option>
                <option value="02">02</option>
                <option value="03">03</option>
                <option value="04">04</option>
                <option value="05">05</option>
                <option value="06">06</option>
                <option value="07">07</option>
                <option value="08">08</option>
                <option value="09">09</option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
                <option value="13">13</option>
                <option value="14">14</option>
                <option value="15">15</option>
                <option value="16">16</option>
                <option value="17">17</option>
                <option value="18">18</option>
                <option value="19">19</option>
                <option value="20">20</option>
                <option value="21">21</option>
                <option value="22">22</option>
                <option value="23">23</option>
                <option value="24">24</option>
                <option value="25">25</option>
                <option value="26">26</option>
                <option value="27">27</option>
                <option value="28">28</option>
                <option value="29">29</option>
                <option value="30">30</option>
                <option value="31">31</option>
              </select>
              <img src="https://www.monicavinader.com/images/2020/dropdown-black.svg" class="select-replace__icon">
              <p class="select-replace__value">Day�</p>
            </div>
            <div class="select-replace" id="contact_dob_month_selectreplace">
              <select id="contact_dob_month" name="contact_dob_month" class="input select-replaced">
                <option value="">Month�</option>
                <option value="01">Jan</option>
                <option value="02">Feb</option>
                <option value="03">Mar</option>
                <option value="04">Apr</option>
                <option value="05">May</option>
                <option value="06">Jun</option>
                <option value="07">Jul</option>
                <option value="08">Aug</option>
                <option value="09">Sep</option>
                <option value="10">Oct</option>
                <option value="11">Nov</option>
                <option value="12">Dec</option>
              </select>
              <img src="https://www.monicavinader.com/images/2020/dropdown-black.svg" class="select-replace__icon">
              <p class="select-replace__value">Month�</p>
            </div>
            <div class="select-replace" id="contact_dob_year_selectreplace">
              <select id="contact_dob_year" name="contact_dob_year" class="input select-replaced">
                <option value="">Year�</option>
                <option value="2020">2020</option>
                <option value="2019">2019</option>
                <option value="2018">2018</option>
                <option value="2017">2017</option>
                <option value="2016">2016</option>
                <option value="2015">2015</option>
                <option value="2014">2014</option>
                <option value="2013">2013</option>
                <option value="2012">2012</option>
                <option value="2011">2011</option>
                <option value="2010">2010</option>
                <option value="2009">2009</option>
                <option value="2008">2008</option>
                <option value="2007">2007</option>
                <option value="2006">2006</option>
                <option value="2005">2005</option>
                <option value="2004">2004</option>
                <option value="2003">2003</option>
                <option value="2002">2002</option>
                <option value="2001">2001</option>
                <option value="2000">2000</option>
                <option value="1999">1999</option>
                <option value="1998">1998</option>
                <option value="1997">1997</option>
                <option value="1996">1996</option>
                <option value="1995">1995</option>
                <option value="1994">1994</option>
                <option value="1993">1993</option>
                <option value="1992">1992</option>
                <option value="1991">1991</option>
                <option value="1990">1990</option>
                <option value="1989">1989</option>
                <option value="1988">1988</option>
                <option value="1987">1987</option>
                <option value="1986">1986</option>
                <option value="1985">1985</option>
                <option value="1984">1984</option>
                <option value="1983">1983</option>
                <option value="1982">1982</option>
                <option value="1981">1981</option>
                <option value="1980">1980</option>
                <option value="1979">1979</option>
                <option value="1978">1978</option>
                <option value="1977">1977</option>
                <option value="1976">1976</option>
                <option value="1975">1975</option>
                <option value="1974">1974</option>
                <option value="1973">1973</option>
                <option value="1972">1972</option>
                <option value="1971">1971</option>
                <option value="1970">1970</option>
                <option value="1969">1969</option>
                <option value="1968">1968</option>
                <option value="1967">1967</option>
                <option value="1966">1966</option>
                <option value="1965">1965</option>
                <option value="1964">1964</option>
                <option value="1963">1963</option>
                <option value="1962">1962</option>
                <option value="1961">1961</option>
                <option value="1960">1960</option>
                <option value="1959">1959</option>
                <option value="1958">1958</option>
                <option value="1957">1957</option>
                <option value="1956">1956</option>
                <option value="1955">1955</option>
                <option value="1954">1954</option>
                <option value="1953">1953</option>
                <option value="1952">1952</option>
                <option value="1951">1951</option>
                <option value="1950">1950</option>
                <option value="1949">1949</option>
                <option value="1948">1948</option>
                <option value="1947">1947</option>
                <option value="1946">1946</option>
                <option value="1945">1945</option>
                <option value="1944">1944</option>
                <option value="1943">1943</option>
                <option value="1942">1942</option>
                <option value="1941">1941</option>
                <option value="1940">1940</option>
                <option value="1939">1939</option>
                <option value="1938">1938</option>
                <option value="1937">1937</option>
                <option value="1936">1936</option>
                <option value="1935">1935</option>
                <option value="1934">1934</option>
                <option value="1933">1933</option>
                <option value="1932">1932</option>
                <option value="1931">1931</option>
                <option value="1930">1930</option>
                <option value="1929">1929</option>
                <option value="1928">1928</option>
                <option value="1927">1927</option>
                <option value="1926">1926</option>
                <option value="1925">1925</option>
                <option value="1924">1924</option>
                <option value="1923">1923</option>
                <option value="1922">1922</option>
                <option value="1921">1921</option>
              </select>
              <img src="https://www.monicavinader.com/images/2020/dropdown-black.svg" class="select-replace__icon">
              <p class="select-replace__value">Year�</p>
            </div>
          </div>
          <p class="newsletter__error" style="display: none;">
            <img src="https://www.monicavinader.com/images/2020/error.svg" width="14px" height="16px">
<span></span>
          </p>
          <button class="button js-gtm-element" data-galabel="footer-signup" type="submit">
<span>Submit</span>
          </button>
        </div>
      </form>
      <div class="newsletter__form newsletter__form--3 step" data-step="3">
        <p class="newsletter__control richtext">Thank you. Happy Shopping!</p>
      </div>
    </div>
    <!-- <div class="newsletter__footer">
      <p>Keep up to date by email and SMS. You can unsubscribe at any time, please read our <a href="https://help.monicavinader.com/en/support/solutions/articles/27000051066-privacy-notice">
Privacy Policy</a>.</p>
    </div> -->
  </div>
</section>




<!-- footer start -->
<footer>

  <div class="container-fluid mt-5 p-5  ">
    <div class="row">
      <div class="col-md-2 col-6 one">
      <h5 class="fw">Quick Links</h5>
      <ul>
      <li><a href="<?=base_path?>send_giftcard_view">Gift Cards</a></li>
      <li><a href="<?=base_path?>refer_friend_view">Refer a Friend</a></li>
      <li><a href="<?=base_path?>catalogpage">Catalogue</a></li>
      <li><a href="<?=base_path?>stonechart">Stone Chart</a></li>
      <li><a href="<?=base_path?>sizeguides">Size Guides</a></li>


      <li><a href="<?=base_path?>Packages"> Buy Packages</a></li>



      <!-- <li>Our Story</li>
      <li>MV Familys</li>
      <li>Affiliates</li> -->
    </ul>
    </div>
    <div class="col-md-2 col-6 two">
      <h5 class="fw">HELP</h5>
      <ul>
      <li><a href="<?=base_path?>FAQ">FAQ</a></li>
      <li><a href="<?=base_path?>packaging">Packaging & Shipping</a></li>
      <li><a href="<?=base_path?>delivery_and_returns">Returns And Refunds</a></li>
      <li><a href="<?=base_path?>repair_policy">Jewelry Care / Repair Policy</a></li>
      <li><a href="<?=base_path?>contact_us">Contact Us</a></li>
      <!-- <li><a href="<?=base_path?>fitness_trainer_terms_and_conditions">Fitness Terms & Conditions</a></li> -->
    </ul>
    </div>



    <div class="col-md-4 col-12 d-flex justify-content-center flex-column  three">
    <img class="img-fluid img_logo_footer" src="https://www.fineoutput.co.in/jewellery2/public/frontend/assets/img/footer_logo.jpg">
    <!-- <img style="width: 4.5rem !important; width: 4.5rem !important;
    margin-top: 0.5rem;
    margin-left: 15rem;" src="<?=base_path?>frontend/assets/img/jewl/logopart1.png"/>
    <img style="    width: 19rem !important;
    height: 3.5rem;
    margin-top: 1rem;
    margin-left: 7rem;" src="<?=base_path?>frontend/assets/img/jewl/logopart2.png"/> -->
    <div class="money" style="/*width:150px;*/margin:auto;">
            <ul class="locale-selectors__selector">
                <li class="crncy" style="line-height:0px!important">
                  <?
                  $C_id = session('currency_id');
                  if(!empty($C_id)){
                  $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where(array('id'=>$C_id,'is_active'=> 1))->first();
                  $c_code= App\frontendmodel\CountryCode::where('nicename', $currency->country)->first();

                  if(!empty($c_code)){
                    $iso1= $c_code->iso;
                    $lower_iso_code1= strtolower($iso1);
                    $src_da1= 'https://api.hostip.info/images/flags/'.$lower_iso_code1.'.gif';
                  }else {
                    $iso1= "";
                    $lower_iso_code1= "";
                    $src_da1= "";
                  }}else{
                      $C_id = 1;
                    $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where(array('id'=>$C_id,'is_active'=> 1))->first();
                    $c_code= App\frontendmodel\CountryCode::where('nicename', $currency->country)->first();

                    if(!empty($c_code)){
                      $iso1= $c_code->iso;
                      $lower_iso_code1= strtolower($iso1);
                      $src_da1= 'https://api.hostip.info/images/flags/'.$lower_iso_code1.'.gif';
                    }else {
                      $iso1= "";
                      $lower_iso_code1= "";
                      $src_da1= "";
                    }
                  }
                  ?>
                    <a href="javasript:void(0);" class="countryres" style="margin: -6px -12px;"><img src="<?=$src_da1?>" style="width:16px;height:12px;" id="country_image"><span id="country">&nbsp;<b style="font-size:12px;"> <?=$currency->country;?></b></span></a>


                    <ul class="notes">
                        <?php
                        $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active', 1)->get();

                        if(!empty($currency)){
                        $i=0;
                        foreach ($currency as $curr) {
                          $c_code= App\frontendmodel\CountryCode::where('nicename', $curr->country)->first();
                          if(!empty($c_code)){
                            $iso= $c_code->iso;
                            $lower_iso_code= strtolower($iso);
                            $src_da= 'https://api.hostip.info/images/flags/'.$lower_iso_code.'.gif';
                          }else {
                            $iso= "";
                            $lower_iso_code= "";
                            $src_da= "";
                          }
                        ?>
                        <li><a href="<?=base_path;?>currency_data/<?=base64_encode($curr->id);?>"><img src="<?=$src_da;?>" ><?=$curr->country;?></a></li>


                        <?php $i++;  } } ?>

                    </ul>
                </li>
            </ul>
            <!-- <?
            $C_id = session('currency_id');
            if(!empty($C_id)){
            $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where(array('id'=>$C_id,'is_active'=> 1))->first();
            $c_code= App\frontendmodel\CountryCode::where('nicename', $currency->country)->first();

            if(!empty($c_code)){
              $iso1= $c_code->iso;
              $lower_iso_code1= strtolower($iso1);
              $src_da1= 'https://api.hostip.info/images/flags/'.$lower_iso_code1.'.gif';
            }else {
              $iso1= "";
              $lower_iso_code1= "";
              $src_da1= "";
            }}else{
                $C_id = 1;
              $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where(array('id'=>$C_id,'is_active'=> 1))->first();
              $c_code= App\frontendmodel\CountryCode::where('nicename', $currency->country)->first();

              if(!empty($c_code)){
                $iso1= $c_code->iso;
                $lower_iso_code1= strtolower($iso1);
                $src_da1= 'https://api.hostip.info/images/flags/'.$lower_iso_code1.'.gif';
              }else {
                $iso1= "";
                $lower_iso_code1= "";
                $src_da1= "";
              }
            }
            ?>
            <select class="" name="country_code">
            <?php
            $currency= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active', 1)->get();

            if(!empty($currency)){
            $i=0;
            foreach ($currency as $curr) {
              $c_code= App\frontendmodel\CountryCode::where('nicename', $curr->country)->first();
              if(!empty($c_code)){
                $iso= $c_code->iso;
                $lower_iso_code= strtolower($iso);
                $src_da= 'https://api.hostip.info/images/flags/'.$lower_iso_code.'.gif';
              }else {
                $iso= "";
                $lower_iso_code= "";
                $src_da= "";
              }
            ?>
              <option value="" style="background-image:url();"><a href="<?=base_path;?>currency_data/<?=base64_encode($curr->id);?>"><?=$curr->country;?></a></option>
                <?php $i++;  } } ?>
            </select> -->
            </div>
  </div>
  <div class="col-md-2 col-6 four">
  <h5 class="fw">COMPANY</h5>
  <ul>
  <li><a href="<?=base_path?>our_story">About us</a></li>
  <li><a href="<?=base_path?>stocks">Stockist</a></li>
  <li><a href="<?=base_path?>manufacture">Manufacture with us</a></li>
   <!-- <li><a href="<?=base_path?>repair_policy">Repair Policy</a></li> -->
   <!-- <li><a href="<?=base_path?>privacy_policy">Privacy Policy</a></li> -->
   <!-- <li><a href="<?=base_path?>packaging">Packaging & Shipping</a></li> -->
  <!-- <li><a href="<?=base_path?>terms_and_conditions">Terms & Conditions</a></li> -->
  <!-- <li><a href="<?=base_path?>privacy_policy">Privacy Policy</a></li> -->
</ul>
</div>
<div class="col-md-2 col-6 five">
  <h5 class="fw">Order</h5>
  <ul>
  <li><a href="<?=base_path?>view_custom_order_page">Custom Order</a></li>
  <li><a href="<?=base_path?>view_wholesale_inquiry_page">Wholesale Inqueries</a></li>
  <li><a href="<?=base_path?>virtualshoping">Virtual Personal Shopping</a></li>
  <!-- <li><a href="<?=base_path?>contact_us">Contact Us</a></li>
  <li><a href="<?=base_path?>terms_and_conditions">Terms & Conditions</a></li> -->
  <!-- <li><a href="<?=base_path?>fitness_trainer_terms_and_conditions">Fitness Terms & Conditions</a></li> -->
</ul>
</div>

  </div>
  <!-- <div class="row">
    <div class="col-md-6">
    </div> -->
<style>
/* .iconscenter{
      margin-left: 42rem;
    } */
    @media (max-width:360px) {
      .iconres{
        margin-left: -43rem !important;
        /* float: left !important; */
      }
      /* .countryres{
        margin-top: 4rem !important;
        margin-bottom: 1rem !important;
      } */
      .logores{
      margin-left: -10rem !important;
      margin-top: 2rem !important;
    }
    }
</style>
      <div class="col-md-12 iconscenter ">
      <!-- <h5>SOCIAL</h5> -->
      <ul class="d-flex justify-content-center">
      <li><a href="#" class="p-2 pr-4"><i class="fa fa-facebook" style="font-size: 2rem;"></i></a></li>
      <li><a href="#" class="p-2 pr-4"><i class="fa fa-instagram" style="font-size: 2rem;"></i></a></li>
      <li><a href="#" class="p-2 pr-4"><i class="fa fa-pinterest" style="font-size: 2rem;"></i></a></li>
      <li><a href="#" class="p-2 pr-4"><i class="fa fa-twitter" style="font-size: 2rem;"></i></a></li>
      <li><a href="#" class="p-2 pr-4"><i class="fa fa-envelope" style="font-size: 2rem;"></i></a></li>
    </ul>
    </div>
  </div>



  </div>

</footer>
<section style="background: rgb(240, 239, 235);padding: 0.75rem 0rem;">
<div class="container-fluid good_ul_fot">
  <div class=row>
  <div class="col-md-6">
    <ul class="d-flex  mb-0">
      <!-- <li><a href="<?=base_path?>terms_and_conditions">Terms & Conditions</a></li> -->
      <!-- <li><a href="<?=base_path?>fitness_trainer_terms_and_conditions">Fitness Terms & Conditions</a></li> -->
      <!-- <li><a href="<?=base_path?>Refund_Policy">Refund_Policy</a></li> -->
      <!-- <li><a href="<?=base_path?>privacy_policy">Privacy Policy</a></li> -->
      <!-- <li>Cookie Statement</li>
      <li>Modern Slavery Statement</li> -->
    </ul>
  </div>
  <div class="col-md-6">
    <ul class="d-flex mb-0 make_ce" style="justify-content: flex-end;">
      <!-- <li>Pretty in Gems LTD </li> -->
    </ul>
  </div>
  </div>
</div>
</section>
<!-- footer end -->

</body>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <!-- <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js'></script> -->
  <!-- Bootstrap Notification js-->
    <script src="<?=base_path?>frontend/assets/bootstrap-notify.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

<script src='<?php echo base_path;?>frontend/assets/js/zoom.js'></script>
   <!-- <script src="https://unpkg.com/aos@next/dist/aos.js"></script> -->

   <script>
     $("document").ready(function(){

   setTimeout(function() {

       $('#status').fadeOut('fast');
       $('#status-error').fadeOut('fast');
   }, 5000);

    });
   </script>
  <!-- <script>
    AOS.init();
  </script> -->

  <!-- second slider script start -->
  <!-- <script>
    var swiper = new Swiper('.swiper-container', {
      slidesPerView:4,
      spaceBetween: 10,
      slidesPerGroup:1,
      loop: true,
      loopFillGroupWithBlank: true,
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
  </script> -->

  <!-- second slider script end -->




<script>

$('.bg_blur').hide();
   $(document).on('click', function(e) {
       if ( $(e.target).closest('.menu-toggle').length ) {
           $(".side_open_nav").css("transform" , "translateX(0px)");
           $("#body").css("overflow" , "hidden");
           $(".bg_blur").css("display" , "block");
            // $("#cdn").html('<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">');

       }else if ( ! $(e.target).closest('.side_open_nav').length ) {
           $(".side_open_nav").css("transform" , "translateX(-1500px)");
           $("#body").css("overflow" , "auto");
            $(".bg_blur").css("display" , "none");
            // $("#cdn").html('<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">');

       }
   });



</script>



<!-- wishlist function start -->


  <script>

  function addToWishlist(product_id){
// alert()

    $.ajax({
    type: "POST",
    url: "<?=base_path?>add_to_wishlist",
    data: {
    'product_id': product_id,
      _token: '{{csrf_token()}}'
    // 'category_id': category_id,
    // 'subcategory_id': subcategory_id
    },
    dataType: "json",
    success: function(server_response){

  // alert(server_response);
  // alert(server_response);
          // alert("done");
               // $("#result").html(server_response);
  if(server_response == true){


                $.notify({
                           icon: 'fa fa-check',
                           title: 'Success!',
                           message: 'Item Successfully added to your wishlist'
                       },{
                           element: 'body',
                           position: null,
                           type: "success",
                           allow_dismiss: true,
                           newest_on_top: false,
                           showProgressbar: true,
                           placement: {
                               from: "top",
                               align: "right"
                           },
                           // offset: 20,
                           spacing: 10,
                           z_index: 9999,
                           delay: 5000,
                           animate: {
                               enter: 'animated fadeInDown',
                               exit: 'animated fadeOutUp'
                           },
                           icon_type: 'class',
                           template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                           '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                           '<span data-notify="icon"></span> ' +
                           '<span data-notify="title">{1}</span> ' +
                           '<span data-notify="message">{2}</span>' +
                           // '<div class="progress" data-notify="progressbar">' +
                           // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                           // '</div>' +
                           '<a href="{3}" target="{4}" data-notify="url"></a>' +
                           '</div>'
                       });
  location.reload();
                       //load div
                       // $("#step1Content").load();

                     }

          // if(server_response == "loginN") {
          //
          // window.location.href = "<?=base_path?>User/login";
          //
          // }
    }
    });   //$.ajax ends here


  }


  function removeFromWishlist(product_id,wishlist_id){
  // alert("yes");

    $.ajax({
    type: "POST",
    url: "<?=base_path?>remove_from_wishlist",
    data: {
    'product_id': product_id,
    'wishlist_id': wishlist_id,
    _token: '{{csrf_token()}}'
    },
    success: function(server_response){

                $.notify({
                           icon: 'fa fa-check',
                           title: 'Success!',
                           message: 'Item Successfully removed from your wishlist'
                       },{
                           element: 'body',
                           position: null,
                           type: "success",
                           allow_dismiss: true,
                           newest_on_top: false,
                           showProgressbar: true,
                           placement: {
                               from: "top",
                               align: "right"
                           },
                           // offset: 20,
                           spacing: 10,
                           z_index: 9999,
                           delay: 5000,
                           animate: {
                               enter: 'animated fadeInDown',
                               exit: 'animated fadeOutUp'
                           },
                           icon_type: 'class',
                           template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                           '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                           '<span data-notify="icon"></span> ' +
                           '<span data-notify="title">{1}</span> ' +
                           '<span data-notify="message">{2}</span>' +
                           // '<div class="progress" data-notify="progressbar">' +
                           // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                           // '</div>' +
                           '<a href="{3}" target="{4}" data-notify="url"></a>' +
                           '</div>'
                       });
  location.reload();


    }
    });   //$.ajax ends here


  }

  </script>
<!-- wishlist function start -->




  <!-- show count of items in cart fromlocalStorage start -->

  <script>
    $(window).on('load', function() {
  // alert("hi");
cookieData="";
        var cookieData =JSON.parse(localStorage.getItem("cartItems"));
// alert(cookieData);
if (cookieData === null){

}
else{
  if(cookieData != "")   {

    var a= cookieData.length;

  } else{
    var a= 0;
  }
}
  // console.log('cookieData');
  // console.log(a);
  // console.log(cookieData);

  $("#totalCartItems").text(a);
  $("#totalCartItems2").text(a);
  $("#totalCartItemsM").text(a);
  $("#totalCartItemsMb").text(a);



      });
    </script>

  <!-- show count of items in cart fromlocalStorage start -->



<!-- price filter slider start-->
  <script>
  const slider = document.getElementById('sliderPrice');
  if(slider != ""  && slider != null){
  const rangeMin = parseInt(slider.dataset.min);
  const rangeMax = parseInt(slider.dataset.max);
  const step = parseInt(slider.dataset.step);
  const filterInputs = document.querySelectorAll('input.filter__input');

  noUiSlider.create(slider, {
      start: [rangeMin, rangeMax],
      connect: true,
      step: step,
      range: {
          'min': rangeMin,
          'max': rangeMax
      },

      // make numbers whole
      format: {
        to: value => value,
        from: value => value
      }
  });

  // bind inputs with noUiSlider
  slider.noUiSlider.on('update', (values, handle) => {
    filterInputs[handle].value = values[handle];
  });

  filterInputs.forEach((input, indexInput) => {
    input.addEventListener('change', () => {
      slider.noUiSlider.setHandle(indexInput, input.value);
    })
  });

}

  </script>

<!-- price filter slider end-->


<!-- search dynamic start -->
  <script>

  $('#searchinput').keyup(function() {
  // alert("Key up detected");

  // var total_price = $("#mrp").val();
  // //var gst_percentage = $("#gst_percentage").val();$(this).val
  // var gst_percentage = $(this).val();
  // var gst_price = Math.round((total_price*gst_percentage)/100);
  // var total_gst_price = parseInt(total_price) + parseInt(gst_price);
  // //alert(total_gst_price);
  // $('#gst_percentage_price').val(gst_price);
  // $('#selling_price').val(total_gst_price);

  var string = $(this).val();
  // alert(string);
  // var base_url = $("#app_base_url_value").val();


  if(string == ""){
    // alert(string);
      $(".searc").css({"display": "none"});
    return false;


  }else{
  $(".searc").css({"display": "block"});

  $.ajax({
  type: "POST",
  url: "<?=base_path; ?>search_results",
  data: {string: string , _token: '{{csrf_token()}}' },
   dataType: 'json',
  success: function(response){
// alert('ghhg');
    if(response.data == true){
      // alert(response.result_da);
      console.log(response.result_da);

  // var data_array[]= response.result_da;
  var data;
  $("#serc").html("");
      $.each(response.result_da, function(index, itemData) {


        data= '<a href="<?php echo base_path; ?>products_view/'+btoa(itemData.id)+'"><li style="background-color: white;">'+ itemData.name +'</li></a>';

        $("#serc").append(data);
  });


  }
  }
  });   //$.ajax ends here

  }

  });

  </script>
<!-- search dynamic end -->


  <!-- insert localstorage data to tbl_cart after login -->
  <?php $customer_id= Session::get('user_id');
  //echo $customer_id;  ?>
  <input type="hidden" id="customer_id" value="<? echo $customer_id; ?>">

  <script>

  // insert data from localstorage into table cart after product check on click cart icon on header.

  function insertdatacartttbl(){
  var cusomer_id = $('#customer_id').val();
  // alert(cusomer_id);
  // alert('ho');
  checkData();
  checkDatafrmTbl();
  var cart_array= localStorage.getItem("cartItems");
  // alert(cart_array);
  insertDataFromCart(cusomer_id);
  // location.reload();
  }

  //check localstorage cart data
  function checkData(){
  // alert('alertfron checkdata');
  var cusomer_id = $('#customer_id').val();

  var cart_array = [];
  var pro_array=[];
  // var pro_arrays=[];
  if(localStorage.getItem("cartItems") !== null){
  cart_array = JSON.parse(localStorage.getItem("cartItems"));
  // alert(cart_array);
  var uu= '<?=base_path?>check_localcart';
  // alert(cart_array);

  // for(var ca=0;ca < cart_array.length;ca++){
  //alert(cart_array[ca].quantity);
  $.ajax({
  url:'<?=base_path?>check_localcart',
  method: 'post',
  data: {cart_array: cart_array , _token: '{{csrf_token()}}'},
  // dataType: 'json',
  success: function(response){

  // alert(response);

  // pro_array= response ;
  // pro_arrays= JSON.parse(pro_array);

  var lytt = response;
var pro_arrays = JSON.parse(lytt);
  // alert(pro_arrays);
  //delete cart_products


  for (var i = 0; i < pro_arrays.length; i++) {





  // var cartItems = [];
  if(localStorage.getItem("cartItems") !== null){
  cartItems = JSON.parse(localStorage.getItem("cartItems"));
  var index = cartItems.findIndex(x => x.product_id == pro_arrays[i]);

  // var customer_id = $('#customer_id').val();
  // deleteCartDataInTbl(customer_id,prod_id);

  if(index !== -1){
  cartItems.splice(index, 1);
  var cart_array = [...cartItems];
  localStorage.setItem("cartItems" , JSON.stringify(cart_array));

  }
  }

  }



  }
  });


  }
  }




  //check Tbl  cart data
  function checkDatafrmTbl(){
  // alert('alertfron checkDatafrmTbl');
  var cusomer_id = $('#customer_id').val();

  // alert(u);
  // alert(cusomer_id);
  $.ajax({
    url:'<?=base_path?>check_localcart_frm_tbl',
    method: 'post',
    data: {user_id: cusomer_id , _token: '{{csrf_token()}}'},
    dataType: 'json',
    success: function(response){
    // alert(response);
    // console.log('tryy');
    // console.log(response);

    }
  });



  }

  </script>


  <!--  insert cart data from localstorage -->
  <script>
  function insertDataFromCart(customer_id){

        var cart_array = [];
        if(localStorage.getItem("cartItems") !== null){
          cart_array = JSON.parse(localStorage.getItem("cartItems"));

            for(var ca=0;ca < cart_array.length;ca++){
              // alert(cart_array[ca].pro_type_id);
              $.ajax({
               url:'<?=base_path?>add_to_cart_online',
               method: 'post',
               data: {product_id: cart_array[ca].product_id , color_id: cart_array[ca].color_id, stone: cart_array[ca].stone, metal: cart_array[ca].metal, engrave_text: cart_array[ca].engrave_text, font_size: cart_array[ca].font_size, font_family: cart_array[ca].font_family, quantity : cart_array[ca].quantity, status : cart_array[ca].status , user_id : customer_id,  _token: '{{csrf_token()}}' },
               dataType: 'json',
               success: function(response){
  // alert("yay");
              // alert(response.data);
              // console.log('response');
              // console.log(response.data);
              }
          });

        }
    }

    }

  </script>




  <!-- add to cart offline handler -->

  <script>
    function addToCartOfflineHandler(obj){
      // var cart_btn_type = $(obj).attr("data-btn-type");
// alert(JSON.stringify(obj);

      var pro_id = $(obj).attr("data-product-id");
      var category_id = $(obj).attr("data-category-id");
      var subcategory_id = $(obj).attr("data-subcategory-id");
      var quantity = $(obj).attr("quantity");
      var btn= $(obj).attr("btn");
      var status= $(obj).attr("status");

// alert(quantity)
// return
      // var btn= $(obj).attr("btn");
      // var status= 1;
// alert(pro_id);
var color_id= "";
var stone= "";
var metal= "";

var font_size= "";
var engrave_text= "";
var font_family= "";


      if(quantity == ""){
        quantity=  $('#qtty_'+pro_id).val().trim();
      }


      if(quantity == 0){

        $.notify({
                icon: 'fa fa-check',
                title: '',
                message: 'Please Select Quantity Greater Than 1. '
            },{
                element: 'body',
                position: null,
                type: "danger",
                allow_dismiss: true,
                newest_on_top: false,
                showProgressbar: true,
                placement: {
                    from: "top",
                    align: "right"
                },
                // offset: 20,
                spacing: 10,
                z_index: 9999,
                delay: 5000,
                animate: {
                    enter: 'animated fadeInDown',
                    exit: 'animated fadeOutUp'
                },
                icon_type: 'class',
                template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                '<span data-notify="icon"></span> ' +
                '<span data-notify="title">{1}</span> ' +
                '<span data-notify="message">{2}</span>' +
                // '<div class="progress" data-notify="progressbar">' +
                // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                // '</div>' +
                '<a href="{3}" target="{4}" data-notify="url"></a>' +
                '</div>'
            });

      }



if(status == undefined){

    if(btn != "" && btn != null && btn == "trend_btn"){

      // var variant_id= $('#variant_t_'+pro_id).val().trim();
      var color_id= $("#color_select_t_"+pro_id).val().trim();
      // alert(color_id);

    }else if(btn=="trend_btn_v"){
    // alert("hi2")
    // return

    var color_id= $("#color_select_t_"+pro_id).val().trim();
    // alert(color_id);
    // return;
  }
    else{
      // var variant_id= $('#variant_'+pro_id).val().trim();
      var color_id= $("#color_select_"+pro_id).val().trim();
    }

}else {


  if(status == 1 ){
//customize
    // var stone= $('#stone_id').val().trim();
    // var metal= $('#metal_id').val().trim();

  }else{
//engrave

var font_size= $('#font_sz_'+pro_id).html().trim();
var engrave_text= $("#demo_text_"+pro_id).html().trim();
var font_family= $('#font_famly_'+pro_id).val().trim();

  }

}


      // alert(category_id);
      // alert(subcategory_id);
      // alert(pro_id);
      // alert(quantity);
      // alert(variant_id);
      // alert(color_id);
      // alert(stone);
      // alert(metal);
      // alert(font_size);
      // alert(engrave_text);
      // alert(font_family);
      // alert(status);
      // die();




      var cart_array = [];
      var oldCartItems = [];
      var pro_db_img1 = '';
      var pro_db_name = '';
      var base_url = $("#base_path").val();
      // alert(base_url);
      var cart_success = false;

// var sd= localStorage.getItem("cartItems");
// alert(sd);
// alert(localStorage.getItem("cartItems"));
// alert(localStorage.getItem("cartItems").length);

      if(localStorage.getItem("cartItems") !== null  ){
        oldCartItems = JSON.parse(localStorage.getItem("cartItems"));
        cart_array = [...oldCartItems];
        var cookieData =JSON.parse(localStorage.getItem("cartItems"));
    var a= cookieData;


    // console.log('a');
// alert('yes');
//   console.log(cart_array);

    // alert(a);
      // localStorage.removeItem("cartItems");
      // alert(category_id);
      cart_array = {};
cart_array.pro_id = pro_id;
cart_array.category_id = category_id;
cart_array.subcategory_id = subcategory_id;
cart_array.quantity = quantity;

var new_data  =JSON.stringify(cart_array);
// alert(new_data);
localStorage.setItem("cartItems",new_data);

$.each(oldCartItems, function(i, item) {

if(status == undefined){

  if(item.status === 0  && item.product_id === pro_id){

    $.notify({
               icon: 'fa fa-times',
               title: '',
               message: 'Item is already in your cart'
           },{
               element: 'body',
               position: null,
               type: "danger",
               allow_dismiss: true,
               newest_on_top: false,
               showProgressbar: true,
               placement: {
                   from: "top",
                   align: "right"
               },
               // offset: 20,
               spacing: 10,
               z_index: 9999,
               delay: 5000,
               animate: {
                   enter: 'animated fadeInDown',
                   exit: 'animated fadeOutUp'
               },
               icon_type: 'class',
               template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
               '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
               '<span data-notify="icon"></span> ' +
               '<span data-notify="title">{1}</span> ' +
               '<span data-notify="message">{2}</span>' +

               '<a href="{3}" target="{4}" data-notify="url"></a>' +
               '</div>'

           });



    cart_success = false;

  }else {
    cart_success = true;
    $( "#h_scart" ).load(window.location.href + " #h_scart > *" );

  }

}else{
  if(item.status === status  && item.product_id === pro_id){

// alert('1 & 2');
    $.notify({
               icon: 'fa fa-times',
               title: '',
               message: 'Customize Item is already in your cart'
           },{
               element: 'body',
               position: null,
               type: "danger",
               allow_dismiss: true,
               newest_on_top: false,
               showProgressbar: true,
               placement: {
                   from: "top",
                   align: "right"
               },
               // offset: 20,
               spacing: 10,
               z_index: 9999,
               delay: 5000,
               animate: {
                   enter: 'animated fadeInDown',
                   exit: 'animated fadeOutUp'
               },
               icon_type: 'class',
               template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
               '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
               '<span data-notify="icon"></span> ' +
               '<span data-notify="title">{1}</span> ' +
               '<span data-notify="message">{2}</span>' +

               '<a href="{3}" target="{4}" data-notify="url"></a>' +
               '</div>'
           });



    cart_success = false;


  }else {
    cart_success = true;
    $( "#h_scart" ).load(window.location.href + " #h_scart > *" );

  }

}


});


  // if(oldCartItems.some(item => item.status == 0)){
  //
  // console.log('st_0');
  //       if(oldCartItems.some(item => item.product_id === pro_id)){
  //
  // console.log('st_0_y');
  //         $.notify({
  //                    icon: 'fa fa-times',
  //                    title: '',
  //                    message: 'Item is already in your cart'
  //                },{
  //                    element: 'body',
  //                    position: null,
  //                    type: "danger",
  //                    allow_dismiss: true,
  //                    newest_on_top: false,
  //                    showProgressbar: true,
  //                    placement: {
  //                        from: "top",
  //                        align: "right"
  //                    },
  //                    offset: 20,
  //                    spacing: 10,
  //                    z_index: 9999,
  //                    delay: 5000,
  //                    animate: {
  //                        enter: 'animated fadeInDown',
  //                        exit: 'animated fadeOutUp'
  //                    },
  //                    icon_type: 'class',
  //                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
  //                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
  //                    '<span data-notify="icon"></span> ' +
  //                    '<span data-notify="title">{1}</span> ' +
  //                    '<span data-notify="message">{2}</span>' +
  //
  //                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
  //                    '</div>'
  //                });
  //
  //
  //
  //         cart_success = false;
  //
  //
  //       }else{
  //          cart_success = true;
  //       }
  //
  //
  // }else if (oldCartItems.some(item => item.status == 1)) {
  //
  //
  // console.log('st_1');
  //       if(oldCartItems.some(item => item.product_id === pro_id)){
  //
  // console.log('st_1_y');
  //         $.notify({
  //                    icon: 'fa fa-times',
  //                    title: '',
  //                    message: 'Customize Item is already in your cart'
  //                },{
  //                    element: 'body',
  //                    position: null,
  //                    type: "danger",
  //                    allow_dismiss: true,
  //                    newest_on_top: false,
  //                    showProgressbar: true,
  //                    placement: {
  //                        from: "top",
  //                        align: "right"
  //                    },
  //                    offset: 20,
  //                    spacing: 10,
  //                    z_index: 9999,
  //                    delay: 5000,
  //                    animate: {
  //                        enter: 'animated fadeInDown',
  //                        exit: 'animated fadeOutUp'
  //                    },
  //                    icon_type: 'class',
  //                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
  //                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
  //                    '<span data-notify="icon"></span> ' +
  //                    '<span data-notify="title">{1}</span> ' +
  //                    '<span data-notify="message">{2}</span>' +
  //
  //                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
  //                    '</div>'
  //                });
  //
  //
  //
  //         cart_success = false;
  //
  //       }else{
  //          cart_success = true;
  //       }
  //
  // }else if (oldCartItems.some(item => item.status == 2)) {
  //
  //
  // console.log('st_1');
  //       if(oldCartItems.some(item => item.product_id === pro_id)){
  //
  // console.log('st_1_y');
  //         $.notify({
  //                    icon: 'fa fa-times',
  //                    title: '',
  //                    message: 'Customize Engrave Item is already in your cart'
  //                },{
  //                    element: 'body',
  //                    position: null,
  //                    type: "danger",
  //                    allow_dismiss: true,
  //                    newest_on_top: false,
  //                    showProgressbar: true,
  //                    placement: {
  //                        from: "top",
  //                        align: "right"
  //                    },
  //                    offset: 20,
  //                    spacing: 10,
  //                    z_index: 9999,
  //                    delay: 5000,
  //                    animate: {
  //                        enter: 'animated fadeInDown',
  //                        exit: 'animated fadeOutUp'
  //                    },
  //                    icon_type: 'class',
  //                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
  //                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
  //                    '<span data-notify="icon"></span> ' +
  //                    '<span data-notify="title">{1}</span> ' +
  //                    '<span data-notify="message">{2}</span>' +
  //
  //                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
  //                    '</div>'
  //                });
  //
  //
  //
  //         cart_success = false;
  //
  //       }else{
  //          cart_success = true;
  //       }
  //
  // }







      }else{
          cart_success = true;
      }

// alert(cart_success);
// console.log(cart_success);

    if(cart_success == true){


// console.log(status);

if(status == undefined ){

  // alert('cart_success');
      // inventory check

      $.ajax({
        url:base_url+'check_Inventory',
        method: 'post',
        data: {product_id: pro_id , color_id : color_id  , quantity: quantity, _token: '{{csrf_token()}}'},
        dataType: 'json',
        success: function(response){
          // alert('trys');
      // alert(response);
      console.log(response);
        if(response.data == true){
      // alert('true');

          cart_array.push({product_id : pro_id , category_id : category_id, subcategory_id : subcategory_id, color_id : color_id, stone : stone, metal : metal, font_size : font_size, engrave_text : engrave_text, font_family : font_family, quantity : quantity, status : 0 });
          localStorage.setItem("cartItems" , JSON.stringify(cart_array));

          var cookieData =JSON.parse(localStorage.getItem("cartItems"));
      var a= cookieData.length;
      // alert(a);


      $("#totalCartItems").text(a);
      $("#totalCartItems2").text(a);
      $("#totalCartItemsM").text(a);
      $("#totalCartItemsMb").text(a);


      $.notify({
              icon: 'fa fa-check',
              title: 'Success!',
              message: 'Item Successfully added to your cart'
          },{
              element: 'body',
              position: null,
              type: "success",
              allow_dismiss: true,
              newest_on_top: false,
              showProgressbar: true,
              placement: {
                  from: "top",
                  align: "right"
              },
              // offset: 20,
              spacing: 10,
              z_index: 9999,
              delay: 5000,
              animate: {
                  enter: 'animated fadeInDown',
                  exit: 'animated fadeOutUp'
              },
              icon_type: 'class',
              template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
              '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
              '<span data-notify="icon"></span> ' +
              '<span data-notify="title">{1}</span> ' +
              '<span data-notify="message">{2}</span>' +
              '<a href="{3}" target="{4}" data-notify="url"></a>' +
              '</div>'
          });





        }

        if(response.data == false){
          // alert('false');
        $.notify({
        icon: 'fa fa-times',
        title: '',
        message: response.data_message
        },{
        element: 'body',
        position: null,
        type: "danger",
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: false,
        placement: {
        from: "top",
        align: "right"
        },
        // offset: 20,
        spacing: 10,
        z_index: 9999,
        delay: 1000,
        animate: {
        enter: 'animated fadeInDown',
        exit: 'animated fadeOutUp'
        },
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'
        });

        }

      },
  error: function (error) {
    // alert("ty");

      console.log(error);
  }
        });


}else{

  if(status == 1){


    cart_array.push({product_id : pro_id , category_id : category_id, subcategory_id : subcategory_id, color_id : color_id, stone : stone, metal : metal, font_size : font_size, engrave_text : engrave_text, font_family : font_family, quantity : quantity, status : status });
    localStorage.setItem("cartItems" , JSON.stringify(cart_array));

    var cookieData =JSON.parse(localStorage.getItem("cartItems"));
var a= cookieData.length;
// alert(a);


$("#totalCartItems").text(a);
$("#totalCartItems2").text(a);
$("#totalCartItemsM").text(a);
$("#totalCartItemsMb").text(a);


$.notify({
        icon: 'fa fa-check',
        title: 'Success!',
        message: 'Customize Item Successfully added to your cart'
    },{
        element: 'body',
        position: null,
        type: "success",
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: true,
        placement: {
            from: "top",
            align: "right"
        },
        // offset: 20,
        spacing: 10,
        z_index: 9999,
        delay: 5000,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'
    });



  }else{

    cart_array.push({product_id : pro_id , category_id : category_id, subcategory_id : subcategory_id, color_id : color_id, stone : stone, metal : metal, font_size : font_size, engrave_text : engrave_text, font_family : font_family, quantity : quantity, status : status });
    localStorage.setItem("cartItems" , JSON.stringify(cart_array));

    var cookieData =JSON.parse(localStorage.getItem("cartItems"));
var a= cookieData.length;
// alert(a);


$("#totalCartItems").text(a);
$("#totalCartItems2").text(a);
$("#totalCartItemsM").text(a);
$("#totalCartItemsMb").text(a);


$.notify({
        icon: 'fa fa-check',
        title: 'Success!',
        message: 'Customize Engrave Item Successfully added to your cart'
    },{
        element: 'body',
        position: null,
        type: "success",
        allow_dismiss: true,
        newest_on_top: false,
        showProgressbar: true,
        placement: {
            from: "top",
            align: "right"
        },
        // offset: 20,
        spacing: 10,
        z_index: 9999,
        delay: 5000,
        animate: {
            enter: 'animated fadeInDown',
            exit: 'animated fadeOutUp'
        },
        icon_type: 'class',
        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
        '<span data-notify="icon"></span> ' +
        '<span data-notify="title">{1}</span> ' +
        '<span data-notify="message">{2}</span>' +
        '<a href="{3}" target="{4}" data-notify="url"></a>' +
        '</div>'
    });


  }

}


    }
    }

    </script>







    <!-- add to cart online handler -->

    <script>
      function addToCartOnlineHandler(obj){
        //var cart_btn_type = $(obj).attr("data-btn-type");
// alert('dfj'); die();
// alert()
        var pro_id = $(obj).attr("data-product-id");
        var category_id = $(obj).attr("data-category-id");
        var subcategory_id = $(obj).attr("data-subcategory-id");
        var user_id = $(obj).attr("user-id");
        var quantity = $(obj).attr("quantity");
        var btn= $(obj).attr("btn");
        var status= $(obj).attr("status");

  //       alert(pro_id);
  // return;

  var color_id= "";
  var stone= "";
  var metal= "";

  var font_size= "";
  var engrave_text= "";
  var font_family= "";

  if(quantity == ""){
    quantity=  $('#qtty_'+pro_id).val().trim();
  }


  if(quantity == 0){
  // alert("qty 0 detected.");
    $.notify({
            icon: 'fa fa-check',
            title: '',
            message: 'Please Select Quantity Greater Than 1. '
        },{
            element: 'body',
            position: null,
            type: "danger",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            // offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            // '<div class="progress" data-notify="progressbar">' +
            // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            // '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });

  }

if(status == undefined){

status= 0;

  if(btn != "" && btn != null && btn == "trend_btn"){
    // alert(btn)
    // return
// alert("hi1")
    // var variant_id= $('#variant_t_'+pro_id).val().trim();
    var color_id= $("#color_select_"+pro_id).val().trim();

  }else if(btn=="trend_btn_v"){
    // alert("hi2")
    // return

    var color_id= $("#color_select_t_"+pro_id).val().trim();
    // alert(color_id);
    // return;
  }
  else{
    // alert("hi3")
    // return
    // alert("hi")
    // var variant_id= $('#variant_'+pro_id).val().trim();
    var color_id= $("#color_select_"+pro_id).val().trim();
  }


}else {


  if(status == 1 ){
//customize
    var stone= $('#stone_id').attr('value').trim();
    var metal= $('#metal_id').val().trim();
    var size= $('#atb').attr('size').trim();

  }else{
//engrave

var font_size= $('#font_sz_'+pro_id).html().trim();
var engrave_text= $("#demo_text_"+pro_id).html().trim();
var font_family= $('#font_famly_'+pro_id).val().trim();

  }

}


    //
    // alert(color_id);
    // return;
    //
        // alert(category_id);
        // alert(subcategory_id);
        // alert(pro_id);
        // alert(quantity);
        //
        // alert(color_id);
        // alert(user_id);
        // alert(font_size);
        // alert(engrave_text);
        // alert(font_family);
        // alert(status);
        //  die();




        var cart_array = [];
        var oldCartItems = [];
        var pro_db_img1 = '';
        var pro_db_name = '';
        var base_url = $("#base_path").val();
        // alert(base_url);






  // inventory check

  $.ajax({
    url:base_url+'add_to_cart_online',
    method: 'post',
    data: {product_id: pro_id , color_id : color_id , user_id : user_id, stone : stone, metal : metal, font_size : font_size, engrave_text : engrave_text, font_family : font_family, quantity: quantity,size:size, status : status, _token: '{{csrf_token()}}' },
    dataType: 'json',
    success: function(response){
  // alert(response);
  // console.log(response);
    if(response.data == true){
  // alert('true');

      // cart_array.push({product_id : pro_id , category_id : category_id, subcategory_id : subcategory_id, variant_id : variant_id, color_id : color_id, quantity : quantity });
      // localStorage.setItem("cartItems" , JSON.stringify(cart_array));

  //     var cookieData =JSON.parse(localStorage.getItem("cartItems"));
  // var a= cookieData.length;
  var a= response.cartcount;
  // alert(a);
  // total_price of cart
  // var totalamount= 0;
  //   for(var ca=0;ca < cookieData.length;ca++){
  //     var total_mrp= cookieData[ca].total_pro_mrp;
  //      totalamount = totalamount + total_mrp;
  //   }

  $("#totaltblCartItems").text(a);
  $("#totaltblCartItems2").text(a);
  $("#totaltblCartItemsM").text(a);
  $("#totaltblCartItemsMb").text(a);



  // $("#totalCartAmount").text(totalamount);

  //delete wishlist product after added in cart
  // if(wishlistPro != "" && wishlistPro == "wishProd"){
  //   removeFromWishlist(pro_id,wishlistCatId,wishlistId);
  //   location.reload();
  // }

  $.notify({
          icon: 'fa fa-check',
          title: 'Success!',
          message: 'Item Successfully added to your cart'
      },{
          element: 'body',
          position: null,
          type: "success",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: true,
          placement: {
              from: "top",
              align: "right"
          },
          // offset: 20,
          spacing: 10,
          z_index: 9999,
          delay: 5000,
          animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
          },
          icon_type: 'class',
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
          '<span data-notify="icon"></span> ' +
          '<span data-notify="title">{1}</span> ' +
          '<span data-notify="message">{2}</span>' +
          // '<div class="progress" data-notify="progressbar">' +
          // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
          // '</div>' +
          '<a href="{3}" target="{4}" data-notify="url"></a>' +
          '</div>'
      });


$( "#h_cart" ).load(window.location.href + " #h_cart > *" );

    // $("#addtocart").modal('show');

    // location.reload();
    }

    if(response.data == false){
      // alert('false');
      // alert(response.data_message);
    $.notify({
    icon: 'fa fa-times',
    title: '',
    message: response.data_message
    },{
    element: 'body',
    position: null,
    type: "danger",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
    from: "top",
    align: "right"
    },
    // offset: 20,
    spacing: 10,
    z_index: 9999,
    delay: 5000,
    animate: {
    enter: 'animated fadeInDown',
    exit: 'animated fadeOutUp'
    },
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
    '<span data-notify="icon"></span> ' +
    '<span data-notify="title">{1}</span> ' +
    '<span data-notify="message">{2}</span>' +
    '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>'
    });

    }

    }
    });








              // loadCartItems();
              // $("#addtocart").modal('show');
              // console.log(base_url);
              // $.ajax({
              //  url:base_url+'order/get_product_data',
              //  method: 'post',
              //  data: {pro_id: pro_id},
              //  dataType: 'json',
              //  success: function(response){
              //       if(response.data == true){
              //         console.log('done');
              //        pro_db_name = response.product_data.name;
              //        pro_db_img1 = base_url + response.product_data.img1;
              //        $("#cart_data_pro_image").attr("src",pro_db_img1);
              //        $("#cart_data_pro_name").text(pro_db_name);
              //
              //        $.notify({
              //                   icon: 'fa fa-check',
              //                   title: 'Success!',
              //                   message: 'Item Successfully added to your cart'
              //               },{
              //                   element: 'body',
              //                   position: null,
              //                   type: "success",
              //                   allow_dismiss: true,
              //                   newest_on_top: false,
              //                   showProgressbar: true,
              //                   placement: {
              //                       from: "top",
              //                       align: "right"
              //                   },
              //                   offset: 20,
              //                   spacing: 10,
              //                   z_index: 9999,
              //                   delay: 5000,
              //                   animate: {
              //                       enter: 'animated fadeInDown',
              //                       exit: 'animated fadeOutUp'
              //                   },
              //                   icon_type: 'class',
              //                   template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
              //                   '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
              //                   '<span data-notify="icon"></span> ' +
              //                   '<span data-notify="title">{1}</span> ' +
              //                   '<span data-notify="message">{2}</span>' +
              //                   '<div class="progress" data-notify="progressbar">' +
              //                   '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
              //                   '</div>' +
              //                   '<a href="{3}" target="{4}" data-notify="url"></a>' +
              //                   '</div>'
              //               });
              //   }
              // }
              // });




      }

      </script>

      <script>
      function myFunction() {
        var x = document.getElementById("quantity").value;
        // alert('hi');
      document.getElementById('js-add-to-basket').setAttribute('quantity',x);
      }
      </script>


      <script>
        function addToCartOfflineHandler2(obj){
          // var cart_btn_type = $(obj).attr("data-btn-type");
      // alert(JSON.stringify(obj));
        var size="";
          var pro_id = $(obj).attr("data-product-id");
          var color_id = $(obj).attr("color_id");
          var stone_id = $(obj).attr("data-stone_id");
          var metal_id = $(obj).attr("data-metal_id");
          var text = $(obj).attr("data-enagve_text");
          var f_size = $(obj).attr("data-font_size");
          var f_family = $(obj).attr("data-font_family");
          var quantity = $(obj).attr("quantity");
          var status = $(obj).attr("status");
          var size = $(obj).attr("size");

// alert(size)
// return
          $.ajax({
            url:'<?=base_path?>add_to_cart_local2',
            method: 'post',
            data: {product_id: pro_id, color_id: color_id, quantity: quantity,stone_id:stone_id,metal_id:metal_id,status:status,size:size,text:text,f_size:f_size,f_family:f_family,_token: '{{csrf_token()}}'},
            dataType: 'json',
            success: function(response){

              if(response == 'Item added in cart'){
                $.notify({
                        icon: 'fa fa-check',
                        title: 'Success!',
                        message: 'Item Successfully added to your cart'
                    },{
                        element: 'body',
                        position: null,
                        type: "success",
                        allow_dismiss: true,
                        newest_on_top: false,
                        showProgressbar: true,
                        placement: {
                            from: "top",
                            align: "right"
                        },
                        // offset: 20,
                        spacing: 10,
                        z_index: 9999,
                        delay: 5000,
                        animate: {
                            enter: 'animated fadeInDown',
                            exit: 'animated fadeOutUp'
                        },
                        icon_type: 'class',
                        template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                        '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                        '<span data-notify="icon"></span> ' +
                        '<span data-notify="title">{1}</span> ' +
                        '<span data-notify="message">{2}</span>' +
                        // '<div class="progress" data-notify="progressbar">' +
                        // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                        // '</div>' +
                        '<a href="{3}" target="{4}" data-notify="url"></a>' +
                        '</div>'
                    });

                    $( "#h_scart" ).load(window.location.href + " #h_scart > *" );

              }
                else if(response == 'Product is already in cart')
                {
                  $.notify({
                          icon: 'fa fa-check',
                          title: '',
                          message: 'Product is already in cart'
                      },{
                          element: 'body',
                          position: null,
                          type: "danger",
                          allow_dismiss: true,
                          newest_on_top: false,
                          showProgressbar: true,
                          placement: {
                              from: "top",
                              align: "right"
                          },
                          // offset: 20,
                          spacing: 10,
                          z_index: 9999,
                          delay: 5000,
                          animate: {
                              enter: 'animated fadeInDown',
                              exit: 'animated fadeOutUp'
                          },
                          icon_type: 'class',
                          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                          '<span data-notify="icon"></span> ' +
                          '<span data-notify="title">{1}</span> ' +
                          '<span data-notify="message">{2}</span>' +
                          // '<div class="progress" data-notify="progressbar">' +
                          // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                          // '</div>' +
                          '<a href="{3}" target="{4}" data-notify="url"></a>' +
                          '</div>'
                      });
                   location.reload();
                }else if(response== 'Product is out of stock'){
                  $.notify({
                          icon: 'fa fa-check',
                          title: '',
                          message: 'Product is out of stock'
                      },{
                          element: 'body',
                          position: null,
                          type: "danger",
                          allow_dismiss: true,
                          newest_on_top: false,
                          showProgressbar: true,
                          placement: {
                              from: "top",
                              align: "right"
                          },
                          // offset: 20,
                          spacing: 10,
                          z_index: 9999,
                          delay: 5000,
                          animate: {
                              enter: 'animated fadeInDown',
                              exit: 'animated fadeOutUp'
                          },
                          icon_type: 'class',
                          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                          '<span data-notify="icon"></span> ' +
                          '<span data-notify="title">{1}</span> ' +
                          '<span data-notify="message">{2}</span>' +
                          // '<div class="progress" data-notify="progressbar">' +
                          // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                          // '</div>' +
                          '<a href="{3}" target="{4}" data-notify="url"></a>' +
                          '</div>'
                      });
                   location.reload();
                }
              }
              });

            }

        </script>

    <script>
      function addToCartOnlineHandler2(obj){
        //var cart_btn_type = $(obj).attr("data-btn-type");
// alert('dfj'); die();

        var pro_id = $(obj).attr("data-product-id");
        var category_id = $(obj).attr("data-category-id");
        var subcategory_id = $(obj).attr("data-subcategory-id");
        var user_id = $(obj).attr("user-id");
        var quantity = $(obj).attr("quantity");
        var btn= $(obj).attr("btn");
        var status= $(obj).attr("status");

  var color_id= "";
  var stone= "";
  var metal= "";

  var font_size= "";
  var engrave_text= "";
  var font_family= "";

  if(quantity == ""){
    quantity=  $('#qtty_'+pro_id).val().trim();
  }


  if(quantity == 0){
  // alert("qty 0 detected.");
    $.notify({
            icon: 'fa fa-check',
            title: '',
            message: 'Please Select Quantity Greater Than 1. '
        },{
            element: 'body',
            position: null,
            type: "danger",
            allow_dismiss: true,
            newest_on_top: false,
            showProgressbar: true,
            placement: {
                from: "top",
                align: "right"
            },
            // offset: 20,
            spacing: 10,
            z_index: 9999,
            delay: 5000,
            animate: {
                enter: 'animated fadeInDown',
                exit: 'animated fadeOutUp'
            },
            icon_type: 'class',
            template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
            '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
            '<span data-notify="icon"></span> ' +
            '<span data-notify="title">{1}</span> ' +
            '<span data-notify="message">{2}</span>' +
            // '<div class="progress" data-notify="progressbar">' +
            // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
            // '</div>' +
            '<a href="{3}" target="{4}" data-notify="url"></a>' +
            '</div>'
        });

  }


if(status == undefined){

status= 0;

  if(btn != "" && btn != null && btn == "trend_btn"){

    // var variant_id= $('#variant_t_'+pro_id).val().trim();
    var color_id= $("#color_select_"+pro_id).val().trim();

  }else{
    // var variant_id= $('#variant_'+pro_id).val().trim();
    var color_id= $("#color_select_"+pro_id).val().trim();
  }


}else {


  if(status == 1 ){
//customize
    var stone= $('#stone_id').val().trim();
    var metal= $('#metal_id').val().trim();

  }else{
//engrave

var font_size= $('#font_sz_'+pro_id).html().trim();
var engrave_text= $("#demo_text_"+pro_id).html().trim();
var font_family= $('#font_famly_'+pro_id).val().trim();

  }

}



// alert(color_id);
// return;
    // alert(quantity);
    //
        // alert(category_id);
        // alert(subcategory_id);
        // alert(pro_id);
        // alert(quantity);
        //
        // alert(user_id);
        // alert(font_size);
        // alert(engrave_text);
        // alert(font_family);
        // alert(status);
        //  die();




        var cart_array = [];
        var oldCartItems = [];
        var pro_db_img1 = '';
        var pro_db_name = '';
        var base_url = $("#base_path").val();
        // alert(base_url);






  // inventory check

  $.ajax({
    url:base_url+'add_to_cart_online',
    method: 'post',
    data: {product_id: pro_id , color_id : color_id , user_id : user_id, stone : stone, metal : metal, font_size : font_size, engrave_text : engrave_text, font_family : font_family, quantity: quantity, status : status, _token: '{{csrf_token()}}' },
    dataType: 'json',
    success: function(response){
  // alert(response);
  // console.log(response);
    if(response.data == true){
  // alert('true');

      // cart_array.push({product_id : pro_id , category_id : category_id, subcategory_id : subcategory_id, variant_id : variant_id, color_id : color_id, quantity : quantity });
      // localStorage.setItem("cartItems" , JSON.stringify(cart_array));

  //     var cookieData =JSON.parse(localStorage.getItem("cartItems"));
  // var a= cookieData.length;
  var a= response.cartcount;
  // alert(a);
  // total_price of cart
  // var totalamount= 0;
  //   for(var ca=0;ca < cookieData.length;ca++){
  //     var total_mrp= cookieData[ca].total_pro_mrp;
  //      totalamount = totalamount + total_mrp;
  //   }

  $("#totaltblCartItems").text(a);
  $("#totaltblCartItems2").text(a);
  $("#totaltblCartItemsM").text(a);
  $("#totaltblCartItemsMb").text(a);



  // $("#totalCartAmount").text(totalamount);

  //delete wishlist product after added in cart
  // if(wishlistPro != "" && wishlistPro == "wishProd"){
  //   removeFromWishlist(pro_id,wishlistCatId,wishlistId);
  //   location.reload();
  // }

  $.notify({
          icon: 'fa fa-check',
          title: 'Success!',
          message: 'Item Successfully added to your cart'
      },{
          element: 'body',
          position: null,
          type: "success",
          allow_dismiss: true,
          newest_on_top: false,
          showProgressbar: true,
          placement: {
              from: "top",
              align: "right"
          },
          // offset: 20,
          spacing: 10,
          z_index: 9999,
          delay: 5000,
          animate: {
              enter: 'animated fadeInDown',
              exit: 'animated fadeOutUp'
          },
          icon_type: 'class',
          template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
          '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
          '<span data-notify="icon"></span> ' +
          '<span data-notify="title">{1}</span> ' +
          '<span data-notify="message">{2}</span>' +
          // '<div class="progress" data-notify="progressbar">' +
          // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
          // '</div>' +
          '<a href="{3}" target="{4}" data-notify="url"></a>' +
          '</div>'
      });




    // $("#addtocart").modal('show');

    $( "#h_cart" ).load(window.location.href + " #h_cart > *" );

    }

    if(response.data == false){
      // alert('false');
      // alert(response.data_message);
    $.notify({
    icon: 'fa fa-times',
    title: '',
    message: response.data_message
    },{
    element: 'body',
    position: null,
    type: "danger",
    allow_dismiss: true,
    newest_on_top: false,
    showProgressbar: false,
    placement: {
    from: "top",
    align: "right"
    },
    // offset: 20,
    spacing: 10,
    z_index: 9999,
    delay: 5000,
    animate: {
    enter: 'animated fadeInDown',
    exit: 'animated fadeOutUp'
    },
    icon_type: 'class',
    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
    '<span data-notify="icon"></span> ' +
    '<span data-notify="title">{1}</span> ' +
    '<span data-notify="message">{2}</span>' +
    '<a href="{3}" target="{4}" data-notify="url"></a>' +
    '</div>'
    });

    }

    }
    });








              // loadCartItems();
              // $("#addtocart").modal('show');
              // console.log(base_url);
              // $.ajax({
              //  url:base_url+'order/get_product_data',
              //  method: 'post',
              //  data: {pro_id: pro_id},
              //  dataType: 'json',
              //  success: function(response){
              //       if(response.data == true){
              //         console.log('done');
              //        pro_db_name = response.product_data.name;
              //        pro_db_img1 = base_url + response.product_data.img1;
              //        $("#cart_data_pro_image").attr("src",pro_db_img1);
              //        $("#cart_data_pro_name").text(pro_db_name);
              //
              //        $.notify({
              //                   icon: 'fa fa-check',
              //                   title: 'Success!',
              //                   message: 'Item Successfully added to your cart'
              //               },{
              //                   element: 'body',
              //                   position: null,
              //                   type: "success",
              //                   allow_dismiss: true,
              //                   newest_on_top: false,
              //                   showProgressbar: true,
              //                   placement: {
              //                       from: "top",
              //                       align: "right"
              //                   },
              //                   offset: 20,
              //                   spacing: 10,
              //                   z_index: 9999,
              //                   delay: 5000,
              //                   animate: {
              //                       enter: 'animated fadeInDown',
              //                       exit: 'animated fadeOutUp'
              //                   },
              //                   icon_type: 'class',
              //                   template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
              //                   '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
              //                   '<span data-notify="icon"></span> ' +
              //                   '<span data-notify="title">{1}</span> ' +
              //                   '<span data-notify="message">{2}</span>' +
              //                   '<div class="progress" data-notify="progressbar">' +
              //                   '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
              //                   '</div>' +
              //                   '<a href="{3}" target="{4}" data-notify="url"></a>' +
              //                   '</div>'
              //               });
              //   }
              // }
              // });




      }

      </script>







     <script>
     $(document).scroll(function () {
    //Show element after user scrolls 800px
    var y = $(this).scrollTop();
    if (y >50) {
        $('.show_logo').fadeIn();
    } else {
        $('.show_logo').fadeOut();
    }

    // Show element after user scrolls past
    // the top edge of its parent
    $('show_logo').each(function () {
        var t = $(this).parent().offset().top;
        if (y > t) {
            $(this).fadeIn();
        } else {
            $(this).fadeOut();
        }
    });
});

</script>
     <script>
     $(document).scroll(function () {
    //Show element after user scrolls 800px
    var y = $(this).scrollTop();
    if (y >50) {
        $('.bag_show').fadeIn();
    } else {
        $('.bag_show').fadeOut();
    }

    // Show element after user scrolls past
    // the top edge of its parent
    $('bag_show').each(function () {
        var t = $(this).parent().offset().top;
        if (y > t) {
            $(this).fadeIn();
        } else {
            $(this).fadeOut();
        }
    });
});

</script>





<script>
 $(function() {
 let isMobile = window.matchMedia("only screen and (max-width: 760px)").matches;
 let isMobile2 = window.matchMedia("only screen and (max-width: 400px)").matches;

 if (isMobile) {
     //Conditional script here
   var swiper = new Swiper('.swiper-container', {
   slidesPerView: 1,
   spaceBetween: 15,
   slidesPerGroup:1,
   loop: true,
   loopFillGroupWithBlank: true,
   pagination: {
     el: '.swiper-pagination',
     clickable: true,
   },
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },
 });

 }
 if (isMobile2) {
     //Conditional script here
   var swiper = new Swiper('.swiper-container', {
   slidesPerView: 1,
   spaceBetween: 15,
   slidesPerGroup:1,
   loop: true,
   loopFillGroupWithBlank: true,
   pagination: {
     el: '.swiper-pagination',
     clickable: true,
   },
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },
 });

 }
 else{

 var swiper = new Swiper('.swiper-container', {
   slidesPerView: 4,
   spaceBetween: 15,
   slidesPerGroup:1,
   loop: true,
   loopFillGroupWithBlank: true,
   pagination: {
     el: '.swiper-pagination',
     clickable: true,
   },
   navigation: {
     nextEl: '.swiper-button-next',
     prevEl: '.swiper-button-prev',
   },
 });



 }
});
</script>



  <script>

  $(".mini-cart-link").hover(function(){
    $(".mini-cart-content").css("display", "block");
    }, function(){
    $(".mini-cart-content").css("display", "none");
  });



  $(".mini-cart-content").hover(function(){
    $(this).css("display", "block");
    }, function(){
    $(this).css("display", "none");
  });

  </script>
  <script>
    function pro_change(obj) {
      var id = $(obj).attr("id");
      var img2 = $(obj).attr("img2");
      document.getElementById(id).src = img2;
    }

    function pro_default(obj) {
      var id = $(obj).attr("id");
      var img = $(obj).attr("img");
      document.getElementById(id).src = img;
    }
  </script>


</html>
