@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12">
                <div class="page-title-box">
                    <h4 class="page-title">Update Product Stone</h4>
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0);">Customize Product Stone</a></li>
                        <li class="breadcrumb-item active">Update Product Stone</li>
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
if($product_stone_data != "" && $product_stone_data != null ){
    $pro_stone_id= $product_stone_data->id;
    $pro_stone_name= $product_stone_data->name;
    $stone_pro_id= $product_stone_data->product_id;
    $metal_id= $product_stone_data->cust_metal_id;
    $pro_stone_price= $product_stone_data->price;
    $stone_img= $product_stone_data->stone_image;
    $pro_stone_img= $product_stone_data->stone_product_image;
    $pro_metal_img= $product_stone_data->metal_product_image;
}else{
    $pro_stone_id= "";
    $pro_stone_name= "";
    $stone_pro_id= "";
    $metal_id== "";
    $pro_stone_price= "";
    $stone_img= "";
    $pro_stone_img= "";
    $pro_metal_img= "";
}

?>
                            <h4 class="mt-0 header-title">Update Product Stone Form</h4>
                            <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_customize_product_stone_process?id=<?php echo base64_encode($pro_stone_id)?>" method="post" enctype="multipart/form-data">
@csrf

    <input type="hidden" name="pro_id" value="<?php echo base64_encode($stone_pro_id)?>">
                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Name &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?php echo $pro_stone_name; ?>" id="name" name="name" required>
            													@error('name')
            													<div style= "color:red">{{$message}}</div>
            													@enderror

                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Metal Color &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                  <select name="cust_metal_id" class="form-control" required >
                                  <option value="" disabled selected>--select Metal--</option>
                                  <?php
                                  $metal_clor_da= App\adminmodel\CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->get();
                                  if(!empty($metal_clor_da)){
                                  foreach($metal_clor_da as $metal_da) {
                                  ?>
                                  <option value="<?= $metal_da->id ?>" <?php if($metal_id == $metal_da->id){ echo "selected"; } ?> > <?= $metal_da->name; ?> </option>
                                  <?php
                                  } }?>
                                  </select>
                                      @error('cust_metal_id')
                                      <div style= "color:red">{{$message}}</div>
                                      @enderror

                                </div>
                            </div>



                            <div class="form-group row">
                                <label for="example-text-input" class="col-sm-2 col-form-label">Price &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="text" value="<?=$pro_stone_price;?>" id="price" name="price" required>
                                      @error('price')
                                      <div style= "color:red">{{$message}}</div>
                                      @enderror
                                </div>
                            </div>


                            <div class="form-group row">
                                <label for="example-color-input" class="col-sm-2 col-form-label">Stone Image &nbsp;<span style="color:red;">*</span></label>
                                <div class="col-sm-10">
                                    <input class="form-control" type="file" value="" id="stone_img" name="stone_img" >
                                    @error('stone_img')
          													<div style= "color:red">{{$message}}</div>
          													@enderror
                                    <?php if($stone_img!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$stone_img; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
                            </div>
                          </div>

                          <div class="form-group row">
                              <label for="example-color-input" class="col-sm-2 col-form-label">Stone Product Image &nbsp;<span style="color:red;">*</span></label>
                              <div class="col-sm-10">
                                  <input class="form-control" type="file" value="" id="stoneproimg" name="stoneproimg" >
                                  @error('stoneproimg')
                                  <div style= "color:red">{{$message}}</div>
                                  @enderror
                                  <?php if($pro_stone_img!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$pro_stone_img; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
                          </div>
                        </div>

                        <div class="form-group row">
                            <label for="example-color-input" class="col-sm-2 col-form-label">Metal Product Image &nbsp;<span style="color:red;">*</span></label>
                            <div class="col-sm-10">
                                <input class="form-control" type="file" value="" id="metalproimg" name="metalproimg" >
                                @error('metalproimg')
                                <div style= "color:red">{{$message}}</div>
                                @enderror
                                <?php if($pro_metal_img!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$pro_metal_img; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
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
