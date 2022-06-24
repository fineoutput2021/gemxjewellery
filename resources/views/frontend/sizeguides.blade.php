@extends('frontend.layout')
@section('main')
<div class="paddingfromtop">
<section>
<div class="container-fluid" style="margin:6rem 0 10rem 0; ">
  <div class="row">
    <div class="col-md-12 text-center">
      <h2 class="mt-5 mb-5">SIZE GUIDE</h2>
      <p class="mt-5 mb-5">We want to make sure our jewellery is the correct fit for you. Explore our guides below and we'll help you find a ring, bracelet or necklace in your perfect size.</p>
    </div>
  </div>
  <div class="row size_row" style="padding: 1.3rem;">
  <div class="col-md-4 mb-5">
    <div>
      <a href="<?=base_path;?>sizeguidestable">
    <img src="https://cfs3.monicavinader.com/images/modular1x1desktop/10251698-190216-monica-vinader-shot-002-286-1.jpg">
    <p>ring size guide</p>
      </a>
  </div>
  </div>
  <div class="col-md-4">
      <div>
        <a href="<?=base_path;?>sizeguidestable">
    <img src="https://cfs3.monicavinader.com/images/modular1x1desktop/10251667-180109-monica-vinader-shot-04-085-web.jpg">
    <p>necklace size guide</p>
    </a>
      </div>
  </div>
  <div class="col-md-4">

      <div>
        <a href="<?=base_path;?>sizeguidestable">
    <img src="https://cfs3.monicavinader.com/images/modular1x1desktop/10251623-190413-mvaw19-shot-08-026-cmyk.jpg">
    <p>bracelet size guide</p>
        </a>
      </div>

  </div>
  <div class="col-md-4">
      <div>
        <a href="<?=base_path;?>sizeguidestable">
    <img src="<?=base_path?>frontend/assets/img/earing.jpg">
    <p>earrings size guide</p>
    </a>
      </div>
  </div>
  <div class="col-md-4">
      <div>
        <a href="<?=base_path;?>sizeguidestable">
    <img src="<?=base_path?>frontend/assets/img/pendant.jpg">
    <p>pendant size guide</p>
    </a>
      </div>
  </div>

  <div class="col-md-4">
      <div>
        <a href="<?=base_path;?>sizeguidestable">
    <img src="<?=base_path?>frontend/assets/img/anklet.jpg">
    <p>anklet size guide</p>
    </a>
      </div>
  </div>
</div>
</div>
</section>
</div>
@endsection
