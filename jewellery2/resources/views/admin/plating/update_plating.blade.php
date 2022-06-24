@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
  <div class="page-title-box">
      <h4 class="page-title">Update Plating</h4>
      <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
          <li class="breadcrumb-item"><a href="javascript:void(0);">Plating</a></li>
          <li class="breadcrumb-item active">Update Plating</li>
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

              <h4 class="mt-0 header-title">Update Plating Form</h4>
              <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_plating_process" method="post" enctype="multipart/form-data">
@csrf

<input class="form-control" type="hidden" value="<?php if(!empty($plating_data)){ echo base64_encode($plating_data->id); }?>" name="plating_id">



              <div class="form-group row">
                  <label for="example-text-input" class="col-sm-2 col-form-label">Name &nbsp;<span style="color:red;">*</span></label>
                  <div class="col-sm-10">
                      <input class="form-control" type="text" value="<?php if(!empty($plating_data)){ echo $plating_data->name; }?>" id="name" name="name" required>
											@error('name')
											<div style= "color:red">{{$message}}</div>
											@enderror
                  </div>
              </div>

              <div class="form-group row">
                  <label for="example-color-input" class="col-sm-2 col-form-label">Image &nbsp;<span style="color:red;">*</span></label>
                  <div class="col-sm-10">
                      <input class="form-control" type="file" value="" id="img" name="img" >
                      @error('img')
                      <div style= "color:red">{{$message}}</div>
                      @enderror
                      <?php if(!empty($plating_data->image)){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$plating_data->image; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
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
