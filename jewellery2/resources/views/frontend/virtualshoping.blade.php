@extends('frontend.layout')
@section('main')
<style>
@media screen and (max-width: 900px;) {
  #virtualshopping{
      height: 300px !important;
      }
}

</style>
<div class="paddingfromtop">

<div class="container">
  <div class="row p-0"    style="margin:6rem 0 0 0; ">
    <div class="col-md-12">
      <img src="<?=base_path?>frontend/assets/img/virtualshopping.jpg" id="virtualshopping" alt='virtualshopping' width="100%" style="height: 754px"/>

      </div>
    </div>
<div class="row"    style="margin:6rem 0 0 0; ">
  <div class="col-md-4">
  </div>
  <div class="col-md-4 col-12">
      <h1 class="text-center">Virtual Shopping</h1>
    </div>
  </div>
  <div class="row" >
    <div class="col-md-4">
    </div>
    <div class="col-md-4 text-center"    style="margin:0 0 10rem 0; ">
<p><stong>VIRTUAL STYLING APPOINTMENTS</strong></p>

<p>
  Book your 20 minute personal styling appointment with our stylists (no need to even take off your slippers). Chat about your gifting, styling, and any fitting advice that you need.
</p>
<a href="<?=base_path?>appointment_type"style=""><button type="submit" class="button js-gtm-element btn-lg px-4 mt-5" style="color:#fff;font-size:20px;width: auto;">BOOK NOW</button></a>
</div>
</div>
  </div>
@endsection
