@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Product</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Customize Product</a></li>
                        <li class="breadcrumb-item active">Update Product</li>
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
if($product_data != "" && $product_data != null ){
$pro_id= $product_data->id;
$pro_name= $product_data->name;
$pro_cate_id= $product_data->category_id;
$pro_sdesc= $product_data->s_desc;
$pro_size= $product_data->size;
$pro_base_price= $product_data->base_price;
$pro_img= $product_data->image;
}else{
$pro_id= "";
$pro_name= "";
$pro_cate_id= "";
$pro_sdesc= "";
$pro_size= "";
$pro_base_price= "";
$pro_img= "";
}

?>
                            <h4 class="mt-0 header-title">Update Product Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_customize_product_process?id=<?php echo base64_encode($pro_id)?>" method="post" enctype="multipart/form-data">
@csrf

    <input type="hidden" name="cate_id" value="<?php echo base64_encode($pro_cate_id)?>>">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $pro_name; ?>" id="name" name="name" required>
            													@error('name')
            													<div style= "color:red">{{$message}}</div>
            													@enderror

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Short Description &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?=$pro_sdesc;?>" id="s_desc" name="s_desc" required>
                                      @error('s_desc')
                                      <div style= "color:red">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Size &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?=$pro_size;?>" id="size" name="size" required>
                                      @error('size')
                                      <div style= "color:red">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Base Price &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?=$pro_base_price;?>" id="base_price" name="base_price" required>
                                      @error('base_price')
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
                                    <?php if($pro_img!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$pro_img; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
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
