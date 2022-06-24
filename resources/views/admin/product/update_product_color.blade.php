@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <h4 class="page-title">Update Color</h4>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                  <li class="breadcrumb-item active">Update Color</li>
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

<?php
if($pro_data != "" && $pro_data != null ){
  $pro_type_id= $pro_data->id;
  $product_id= $pro_data->product_id;
  $color_id= $pro_data->color_id;
  $gemstone_id= $pro_data->gemstone_id;
  $style_id= $pro_data->style_id;
  $shape_id= $pro_data->shape_id;
  $plating_id= $pro_data->plating_id;
  $metal_id= $pro_data->metal_id;
  $material_id= $pro_data->material_id;

  $mrp= $pro_data->mrp;
  $price= $pro_data->price;


if(!empty($pro_data->image1)){
  $image1= base_path.$pro_data->image1;
}else {
  $image1= "";
}
if(!empty($pro_data->image2)){
  $image2= base_path.$pro_data->image2;
}else {
  $image2= "";
}
if(!empty($pro_data->image3)){
  $image3= base_path.$pro_data->image3;
}else {
  $image3= "";
}
if(!empty($pro_data->image4)){
  $image4= base_path.$pro_data->image4;
}else {
  $image4= "";
}



}else{

  $pro_type_id= "";
  $color_id= "";
  $product_id= "";
  $gemstone_id= "";
  $style_id= "";
  $shape_id= "";
  $plating_id= "";
  $metal_id= "";
  $material_id= "";

  $mrp= "";
  $price= "";

  $image1= "";
  $image2= "";
  $image3= "";
  $image4= "";

}

?>

                      <h4 class="mt-0 header-title">Add Color Form</h4>
                      <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_product_color_size_process?id=<?php echo base64_encode($pro_type_id)?>" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" value="<?=base64_encode($product_id);?>" name="product_id">

<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Color &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
      <select name="color_id" id="cid" class="form-control"  >
      <option value="" disabled selected>--select color--</option>
      <?php
      if(!empty($color_data)){
      foreach($color_data as $color) {
      ?>
      <option value="<?= $color->id ?>" <?php if($color->id == $color_id){ echo 'selected'; }?>> <?= $color->name ?> </option>
      <?php
      } }?>
      </select>
        @error('color_id')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Gemstone &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
      <select name="gemstone_id" id="gmsid" class="form-control"  >
      <option value="" disabled selected>--select gemstone--</option>
      <?php
      if(!empty($gemstone_data)){
      foreach($gemstone_data as $gemstone) {
      ?>
      <option value="<?= $gemstone->id ?>" <?php if($gemstone->id == $gemstone_id){ echo 'selected'; }?> > <?= $gemstone->name ?> </option>
      <?php
      } }?>
      </select>
        @error('gemstone_id')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Style &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
      <select name="style_id" id="cid" class="form-control"  >
      <option value="" disabled selected>--select style--</option>
      <?php
      if(!empty($style_data)){
      foreach($style_data as $style) {
      ?>
      <option value="<?= $style->id ?>" <?php if($style->id == $style_id){ echo 'selected'; }?>> <?= $style->name ?> </option>
      <?php
      } }?>
      </select>
        @error('style_id')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Shape &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
      <select name="shape_id" id="cid" class="form-control"  >
      <option value="" disabled selected>--select shape--</option>
      <?php
      if(!empty($shape_data)){
      foreach($shape_data as $shape) {
      ?>
      <option value="<?= $shape->id ?>" <?php if($shape->id == $shape_id){ echo 'selected'; }?> > <?= $shape->name ?> </option>
      <?php
      } }?>
      </select>
        @error('shape_id')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Plating &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
      <select name="plating_id" id="cid" class="form-control"  >
      <option value="" disabled selected>--select plating--</option>
      <?php
      if(!empty($plating_data)){
      foreach($plating_data as $plating) {
      ?>
      <option value="<?= $plating->id ?>" <?php if($plating->id == $plating_id){ echo 'selected'; }?>> <?= $plating->name ?> </option>
      <?php
      } }?>
      </select>
        @error('plating_id')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>


<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Metal &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
      <select name="metal_id" id="cid" class="form-control"  >
      <option value="" disabled selected>--select metal--</option>
      <?php
      if(!empty($metal_data)){
      foreach($metal_data as $metal) {
      ?>
      <option value="<?= $metal->id ?>" <?php if($metal->id == $metal_id){ echo 'selected'; }?> > <?= $metal->name ?> </option>
      <?php
      } }?>
      </select>
        @error('metal_id')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Material &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
      <select name="material_id" id="cid" class="form-control"  >
      <option value="" disabled selected>--select material--</option>
      <?php
      if(!empty($material_data)){
      foreach($material_data as $material) {
      ?>
      <option value="<?= $material->id ?>" <?php if($material->id == $material_id){ echo 'selected'; }?>> <?= $material->name ?> </option>
      <?php
      } }?>
      </select>
        @error('material_id')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>




<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">MRP &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
        <input class="form-control" type="text" value="<?=$mrp;?>" id="mrp" name="mrp" required>
        @error('mrp')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="example-text-input" class="col-sm-2 col-form-label">Price &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
        <input class="form-control" type="text" value="<?=$price;?>" id="price" name="price" required>
        @error('price')
        <div style= "color:red">{{$message}}</div>
        @enderror
    </div>
</div>



<div class="form-group row">
    <label for="example-color-input" class="col-sm-2 col-form-label">Image1 &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
        <input class="form-control" type="file" value="" id="img1" name="img1" >
        @error('img1')
        <div style= "color:red">{{$message}}</div>
          <?php if($image1!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo $image1; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="example-color-input" class="col-sm-2 col-form-label">Image2 &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
        <input class="form-control" type="file" value="" id="img2" name="img2" >
        @error('img2')
        <div style= "color:red">{{$message}}</div>
        @enderror
        <?php if($image2!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo $image2; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
    </div>
</div>

<div class="form-group row">
    <label for="example-color-input" class="col-sm-2 col-form-label">Image3 &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
        <input class="form-control" type="file" value="" id="img3" name="img3" >
        @error('img3')
        <div style= "color:red">{{$message}}</div>
        @enderror
          <?php if($image3!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo $image3; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
    </div>
</div>

<div class="form-group row">
    <label for="example-color-input" class="col-sm-2 col-form-label">Image4 &nbsp;<span style="color:red;">*</span></label>
    <div class="col-sm-10">
        <input class="form-control" type="file" value="" id="img4" name="img4" >
        @error('img4')
        <div style= "color:red">{{$message}}</div>
        @enderror
      <?php if($image4!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo $image4; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
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
