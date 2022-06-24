@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
    <h4 class="page-title">Update GiftCard</h4>
    <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
        <li class="breadcrumb-item"><a href="javascript:void(0);">GiftCard</a></li>
        <li class="breadcrumb-item active">Update GiftCard</li>
    </ol>

    <div class="state-information d-none d-sm-block">
        <div class="state-graph">
            <div id="header-chart-1"></div>
            <div class="info">Balance $ 2,317</div>
        </div>
        <div class="state-graph">
            <div id="header-chart-2"></div>
            <div class="info">Item Sold 1230</div>
        </div>
    </div>
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
<?php
if($giftcard_data != "" && $giftcard_data != null ){
$giftcard_id= $giftcard_data->id;
$giftcard_name= $giftcard_data->name;
$giftcard_img= $giftcard_data->image;
$giftcard_description= $giftcard_data->description;
$giftcard_price= $giftcard_data->price;
}else{
$giftcard_id= "";
$giftcard_name= "";
$giftcard_img= "";
$giftcard_description= "";
$giftcard_price= "";
}

?>
            <h4 class="mt-0 header-title">Update GiftCard Form</h4>
            <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_giftcard_process?id=<?php echo base64_encode($giftcard_id)?>" method="post" enctype="multipart/form-data">
@csrf
            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">GiftCard Name &nbsp;<span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input class="form-control" type="text" value="<?php echo $giftcard_name; ?>" id="name" name="name" required>
											@error('name')
											<div style= "color:red">{{$message}}</div>
											@enderror

                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Description &nbsp;<span style="color:red;">*</span></label>
                <div class="col-sm-10">
                  <textarea id="description" class="form-control" name="description" rows="5" cols="60"><?php echo $giftcard_description; ?></textarea>
                    <!-- <input class="form-control" type="text" value="<?php echo $giftcard_description; ?>" id="description" name="description" required> -->
                      @error('description')
                      <div style= "color:red">{{$message}}</div>
                      @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="example-text-input" class="col-sm-2 col-form-label">Price  &nbsp;<span style="color:red;">*</span></label>
                <div class="col-sm-10">
                    <input class="form-control" type="number" value="<?php echo $giftcard_price; ?>" id="price" name="price" required>
                      @error('price')
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
                    <?php if($giftcard_img != ""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$giftcard_img; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
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
