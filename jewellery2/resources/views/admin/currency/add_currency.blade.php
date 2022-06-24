@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
  <div class="container-fluid">

      <div class="row">
          <div class="col-sm-12">
              <div class="page-title-box">
                  <h4 class="page-title">Add Currency</h4>
                  <ol class="breadcrumb">
                      <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                      <li class="breadcrumb-item"><a href="javascript:void(0);">Currency</a></li>
                      <li class="breadcrumb-item active">Add Currency</li>
                  </ol>

                  <!-- <div class="state-information d-none d-sm-block">
                      <div class="state-graph">
                          <div id="header-chart-1"></div>
                          <div class="info">Balance $ 2,317</div>
                      </div>
                      <div class="state-graph">
                          <div id="header-chart-2"></div>
                          <div class="info">Item Sold 1230</div>
                      </div>
                  </div> -->
              </div>
          </div>
      </div>
      <!-- end row -->

      <div class="page-content-wrapper">
          <div class="row">
              <div class="col-12">
                  <div class="card m-b-20">
                      <div class="card-body">

<!-- show success and error messages -->
@if (session('status'))
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
@endif
<!-- End show success and error messages -->

                          <h4 class="mt-0 header-title">Add Currency Form</h4>
                          <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_currency_process" method="post" enctype="multipart/form-data">
@csrf

						<div class="form-group row">
						  <label for="example-text-input" class="col-sm-2 col-form-label">Country &nbsp;<span style="color:red;">*</span></label>
						  <div class="col-sm-10">

							  <select class="form-control"  id="country" name="country" required >
							  <option value="" selected> Select Country</option>
                <?php


$country_data= App\adminmodel\Countries::get();


if(!empty($country_data)){
  foreach ($country_data as $country_d) {

                ?>
							  <option value="<?=$country_d->country_name;?>"> <?=$country_d->country_name;?></option>
<?php
 } }
 ?>
							  <!-- <option value="India"> India</option>
							  <option value="Australia"> Australia</option>
							  <option value="Uk"> Uk</option>
							  <option value="Europe"> Europe</option> -->
							  </select>
														@error('country')
														<div style= "color:red">{{$message}}</div>
														@enderror
						  </div>
						</div>


                          <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Currency Sign &nbsp;<span style="color:red;">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" value="" id="sign" name="sign" required>
        													@error('sign')
        													<div style= "color:red">{{$message}}</div>
        													@enderror
                              </div>
                          </div>

                          <div class="form-group row">
                              <label for="example-text-input" class="col-sm-2 col-form-label">Currency Price &nbsp;<span style="color:red;">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="text" value="" id="currency_price" name="currency_price" required>
                                  @error('currency_price')
                                  <div style= "color:red">{{$message}}</div>
                                  @enderror
                              </div>
                          </div>



	   <div class="form-group">
                                  <div>
                                     <button type="submit" style="margin-top: 20px;margin-left: 915px;" class="btn btn-primary">Submit</button>

                                  </div>
                              </div>
	</form>
                      </div>
                  </div>
              </div> <!-- end col -->
          </div> <!-- end row -->

      </div>
      <!-- end page content-->

  </div> <!-- container-fluid -->

</div> <!-- content -->
@endsection
