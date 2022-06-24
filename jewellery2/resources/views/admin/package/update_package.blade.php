@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Package</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Packages</a></li>
                        <li class="breadcrumb-item active">Update Package</li>
                    </ol>

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
if($package_data != "" && $package_data != null ){
$package_id= $package_data->id;
$package_name= $package_data->name;
$package_description= $package_data->description;
$package_img= $package_data->image;
$package_price= $package_data->price;
$package_buy_price= $package_data->buy_price;
$validity= $package_data->validity;

}else{
$package_id= "";
$package_name= "";
$package_description= "";
$package_img= "";
$package_price= "";
$package_buy_price= "";
$validity= "";
}

?>
                            <h4 class="mt-0 header-title">Update Package Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_package_process?id=<?php echo base64_encode($package_id)?>" method="post" enctype="multipart/form-data">
@csrf
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $package_name; ?>" id="name" name="name" required>
            													@error('name')
            													<div style= "color:red">{{$message}}</div>
            													@enderror

                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Description &nbsp;<span style="color:red;"></span></label>
                                <div class="col-sm-10">
                                    <!-- <input class="form-control" type="text" value="<?php echo $package_description; ?>" id="description" name="description" > -->

<textarea class="form-control" type="text" value="<?php echo $package_description; ?>" id="description" name="description" rows="5"><?php echo $package_description; ?></textarea>

                                      @error('description')
                                      <div style= "color:red">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>


                            <!-- <div class="form-group row">
                                <label for="example-color-input" class="col-sm-2 col-form-label">Image &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" value="" id="img" name="img" >
                                    @error('img')
          													<div style= "color:red">{{$message}}</div>
          													@enderror
                                    <?php if($package_img!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$package_img; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
                                </div>
                            </div> -->

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Percentage Off &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $package_price; ?>" id="price" name="price" required>
                                      @error('price')
                                      <div style= "color:red">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Buy Price &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $package_buy_price; ?>" id="buy_price" name="buy_price" required>
                                      @error('buy_price')
                                      <div style= "color:red">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Validity &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="input" value="<?php echo $validity; ?>" id="validity" name="validity" required>
                                      @error('validity')
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
