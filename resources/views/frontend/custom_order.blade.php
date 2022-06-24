@extends('frontend.layout')
@section('main')

<style type="text/css">
  /*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
select{
  border: 1px solid #E6E7E8 !important;
letter-spacing: 1px !important;
height: 44px !important;

padding: 0 20px !important;
/* width: 100% !important; */
border-radius: 0 !important;
background-clip: padding-box !important;
font-weight: 400 !important;
}

.text_ar{
  min-height:150px !important;
}

.form-control{
  border: 1px solid #E6E7E8 !important;
letter-spacing: 1px !important;
height: 44px !important;

padding: 0 20px !important;
width: 100% !important;
border-radius: 0 !important;
background-clip: padding-box !important;
font-weight: 400 !important;
}
.contact .info-wrap {

  padding: 30px;
}

.contact .info {
  background: #fff;
}

.contact .info i {
  font-size: 20px;
  color: #f03c02;
  float: left;
  width: 44px;
  height: 44px;
  background: #ffeee8;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
}

.contact .info h4 {
  padding: 0 0 0 60px;
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 5px;
  color: #2b2320;
}

.contact .info p {
  padding: 0 0 0 60px;
  margin-bottom: 0;
  font-size: 14px;
  color: #65534c;
}

.contact .info:hover i {
  background: #f03c02;
  color: #fff;
}

.contact .php-email-form {
  width: 100%;
  padding: 30px;
  background: #fff;
}

.contact .php-email-form .form-group {
  padding-bottom: 8px;
}

.contact .php-email-form .validate {
  display: none;
  color: red;
  margin: 0 0 15px 0;
  font-weight: 400;
  font-size: 13px;
}

.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .error-message br + br {
  margin-top: 25px;
}

.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}

.contact .php-email-form input {
  height: 44px;
}

.contact .php-email-form textarea {
  padding: 10px 12px;
}

.contact .php-email-form button[type="submit"] {
  background: #f03c02;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
  border-radius: 4px;
}

.contact .php-email-form button[type="submit"]:hover {
  background: #fd5c28;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
.form-img img {
    width: 100px;
    height: 100px;
}
select#cars {
    width: 100%;
    padding: 7px;
}



select#cars{
  display: block;
    /* box-shadow: 0px 0px 6px 0px #52c1b7; */
    width: 100%;
    height: calc(1.5em + .75rem + 2px);
    padding: .375rem .75rem;
    /* font-size: 1rem; */
    font-weight: 400;
    line-height: 1.5;
    color: #495057;
    background-color: #fff;
    background-clip: padding-box;
    border: 1px solid #52c1b7;
    border-radius: .25rem;
    transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
    outline: 0 !important;
}

select#country_code{
  display: block;
/* box-shadow: 0px 0px 6px 0px #52c1b7; */
width: 17%;
height: calc(1.5em + .75rem + 2px);
padding: .375rem .75rem;
font-size: 1rem;
font-weight: 400;
line-height: 1.5;
color: #495057;
background-color: #fff;
background-clip: padding-box;
border: 1px solid #52c1b7;
border-radius: .25rem;
transition: border-color .15s ease-in-out,box-shadow .15s ease-in-out;
outline: 0 !important;
border-right: 0;
border-top-right-radius: 0;
border-bottom-right-radius: 0;
}

.good_in{
  box-shadow:none;
  border-left: 0;
  border-top-left-radius: 0;
  border-bottom-left-radius: 0;}

.btn-primary{
  color: #fff;
background-color: #52c1b7;
border-color: #52c1b7;margin-bottom: 5rem;
}
.btn-primary:hover{
  color: #fff;
background-color: #52c1b7;
border-color: #52c1b7;
}


.btn {
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
    height: auto!important;
    float: none!important;
    text-transform: uppercase;
    transition: none;
    padding: 10px 16px!important;
    font-size: 14px!important;
    line-height: 30px!important;
    color: #fff!important;
    background-color: #ffa4a8;
    border: 1px solid #ffa4a8;
}


</style>



<input type="hidden" value="<?=base_path;?>" name="base_path">
<div class="paddingfromtop">
    <section id="contact" class="contact"  style="margin:6rem 0 10rem 0; ">
      <div class="container">
        <h2 style="text-align:center;text-decoration:underline;" class="mt-5 mb-5">Custom Order</h2>
      </hr>
      <div class="row mt-5">
      <div class="col-lg-12">
        <div class="profile">
          <img src="https://i0.wp.com/www.pinti.co.uk/assets/frontend/images/home/slider-2.jpg" style="width: 100%; height: 450px;">
        </div>
      </div>
    </div>
        <div class="row mt-5" data-aos="fade-up">
          <div class="col-lg-2">
          </div>
          <div class="col-lg-8">

            <!-- show success and error messages -->
           	<!-- @if (session('status'))
           		<div class="alert alert-success" role="alert">
           			{{ session('status') }}
           			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           				<span aria-hidden="true">&times;</span>
           		</div>
           	@endif
           	@if (session('status-error'))
           		<div class="alert alert-danger" role="alert">
           			{{ session('status-error') }}
           			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
           				<span aria-hidden="true">&times;</span>
           		</div>
           	@endif -->
            <!-- End show success and error messages -->

<form action="<?=base_path?>add_custom_order_process" method="post" enctype="multipart/form-data">
  @csrf
  <div class="form-group">
   <label for="email"> Name</label>
   <input type="text" class="form-control" placeholder="Enter FirstName" id="name" name="name" required>
   @error('name')
   <div style= "color:red">{{$message}}</div>
   @enderror
  </div>

  <!-- <div class="form-group">
   <label for="email">Last Name</label>
   <input type="text" class="form-control" placeholder="Enter Name" id="last_name" name="last_name" required>
   @error('name')
   <div style= "color:red">{{$message}}</div>
   @enderror
  </div> -->
  <div class="form-group">
    <label for="business_name">Business Name</label>
    <input type="text" class="form-control" placeholder="Enter Business Name" id="business_name" name="business_name" >
  </div>
    <div class="form-group">
    <label for="email">Email</label>
    <input type="email" class="form-control" placeholder="Enter Email" id="email" name="email" style="font-size:16px;" required >
    @error('email')
    <div style= "color:red">{{$message}}</div>
    @enderror
  </div>
    <div class="form-group">
    <label for="country">Country</label>
    <select class="country" name="country" id="cars" style="font-size:16px;">

@if($countrydata !="" && $countrydata != null)
@foreach ($countrydata as $country)
    <option value="<?=$country->country_name?>" <?php if($country->country_name == 'United States'){ echo 'selected'; } ?> style="font-size:16px;"><?=$country->country_name?></option>
@endforeach
@endif
    <!-- <option value="Australia">Australia</option>
    <option value="USA">USA</option>
    <option value="UAE">UAE</option> -->
  </select>
    </div>

  <label for="contact_number">Contact</label>
    <div class="form-group d-flex">
      <span class="px-3">
        <img src="https://api.hostip.info/images/flags/us.gif" id="flag_img" style="width: 35px;height: 35px;border-radius: 50px;">
      </span>

    <select class="country_code"  name="country_code" id="country_code" style="font-size:16px;">


    <?php

$country= App\frontendmodel\CountryCode::get();

if(!empty($country)){
  foreach ($country as $coutr) {

    ?>
      <option value="<?=$coutr->iso?> +<?=$coutr->phonecode;?>" code="<?=$coutr->iso?>" <?php if($coutr->iso == 'US'){ echo 'selected';} ?> style="font-size:16px;"><?=$coutr->iso?> +<?=$coutr->phonecode;?></option>
<?php } }?>

   </select>


   <input type="number" class="form-control good_in" placeholder="Enter Contact" id="contact_number" name="contact_number" style="font-size:16px;">

    </div>




  <div class="form-group ">
            <label for="pwd">Message</label>
   <textarea class="form-control text_ar" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message" style="font-size:16px;" required ></textarea>
   @error('message')
   <div style= "color:red">{{$message}}</div>
   @enderror
     </div>

  <label for="pwd">Add Images</label>
  <br>
  <br>
<div class="row">
<div class="col-lg-4">

  <label for="image1">Select a file:</label>
  <input type="file" id="image1" name="image1" ><br><br>

  </div>
<div class="col-lg-4">

  <label for="image2">Select a file:</label>
  <input type="file" id="image2" name="image2"><br><br>

  </div>

<div class="col-lg-4">

  <label for="image3">Select a file:</label>
  <input type="file" id="image3" name="image3"><br><br>

  </div>
<div class="col-lg-4">

  <label for="image4">Select a file:</label>
  <input type="file" id="image4" name="image4"><br><br>

  </div>

<div class="col-lg-4">

  <label for="image5">Select a file:</label>
  <input type="file" id="image5" name="image5"><br><br>

  </div>
<div class="col-lg-4">

  <label for="image6">Select a file:</label>
  <input type="file" id="image6" name="image6"><br><br>

  </div>
  </div>
  <button type="submit" class="button js-gtm-element btn-lg" style="color:#fff;font-size:20px;">Submit</button>
</form>
</div>



        </div>

      </div>
    </section><!-- End Contact Section -->
  </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

    <script>
    $(document).on('change', '#country_code', function() {
      // Does some stuff and logs the event to the console

      // alert("u");
    $("#flag_img").attr("src",'');
      var country_code_num = $(this).val();

              var code = $('option:selected', this).attr('code');


              // alert(code);
              var lower_iso_code= code.toLowerCase();
              var string_img= 'https://api.hostip.info/images/flags/'+lower_iso_code+'.gif';
              // alert(subcat_d);


               $("#flag_img").attr("src",string_img);


    // alert(country_code_num);
    // // var base_url = $("#app_base_url_values").val();
    // var base_path = $("#base_path").val();
    //
    //   $.ajax({
    //   url:base_path+"country_data",
    //   method: 'post',
    //   data: {country_code_num: country_code_num , _token: '{{csrf_token()}}'},
    //   dataType: 'json',
    //   success: function(response){
    // // alert(response.toString());
    // alert(response);
    //   if(response.data == true){
    //
    //   var iso_code= response.country_iso;
    //   alert(iso_code);
    //   var lower_iso_code= iso_code.toLowerCase();
    //   var string_img= 'https://api.hostip.info/images/flags/'+lower_iso_code+'.gif';
    //   // alert(subcat_d);
    //
    //
    //    $("#flag_img").attr("src",string_img);
    //
    //
    //
    //
    //
    //   }
    //   else{
    //   alert('hiii');
    //   }
    //   }
    //   });


    });
    </script>

@endsection
