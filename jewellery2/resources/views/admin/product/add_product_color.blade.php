@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

  <div class="row">
      <div class="col-sm-12">
          <div class="page-title-box">
              <h4 class="page-title">Add Color</h4>
              <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                  <li class="breadcrumb-item"><a href="javascript:void(0);">Color</a></li>
                  <li class="breadcrumb-item active">Add Color</li>
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

                      <h4 class="mt-0 header-title">Add Color Form</h4>
                      <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_product_color_size_process" method="post" enctype="multipart/form-data">
@csrf
<input type="hidden" value="<?=$product_id;?>" name="product_id">

                      <div class="form-group row">
                          <label for="example-text-input" class="col-sm-2 col-form-label">Color &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                            <select name="color_id" id="cid" class="form-control"  >
                            <option value="" disabled selected>--select color--</option>
                            <?php
                            if(!empty($color_data)){
                            foreach($color_data as $color) {
                            ?>
                            <option value="<?= $color->id ?>"> <?= $color->name ?> </option>
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
                            <option value="<?= $gemstone->id ?>"> <?= $gemstone->name ?> </option>
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
                            <option value="<?= $style->id ?>"> <?= $style->name ?> </option>
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
                            <option value="<?= $shape->id ?>"> <?= $shape->name ?> </option>
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
                            <option value="" disabled selected>--select color--</option>
                            <?php
                            if(!empty($plating_data)){
                            foreach($plating_data as $plating) {
                            ?>
                            <option value="<?= $plating->id ?>"> <?= $plating->name ?> </option>
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
                            <option value="<?= $metal->id ?>"> <?= $metal->name ?> </option>
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
                            <option value="<?= $material->id ?>"> <?= $material->name ?> </option>
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
                              <input class="form-control" type="text" value="" id="mrp" name="mrp" required>
                              @error('mrp')
                              <div style= "color:red">{{$message}}</div>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="example-text-input" class="col-sm-2 col-form-label">Price &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                              <input class="form-control" type="text" value="" id="price" name="price" required>
                              @error('price')
                              <div style= "color:red">{{$message}}</div>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="example-text-input" class="col-sm-2 col-form-label">Inventory Stock &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                              <input class="form-control" type="text" value="" id="inve_stock" name="inve_stock" required>
                              @error('inve_stock')
                              <div style= "color:red">{{$message}}</div>
                              @enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="example-color-input" class="col-sm-2 col-form-label">Image1 &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                              <input class="form-control" type="file" value="" id="img1" name="img1" required>
                              @error('img1')
            									<div style= "color:red">{{$message}}</div>
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
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="example-color-input" class="col-sm-2 col-form-label">Image3 &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                              <input class="form-control" type="file" value="" id="img3" name="img3" >
                              @error('img3')
            									<div style= "color:red">{{$message}}</div>
            									@enderror
                          </div>
                      </div>

                      <div class="form-group row">
                          <label for="example-color-input" class="col-sm-2 col-form-label">Image4 &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                              <input class="form-control" type="file" value="" id="img4" name="img4" >
                              @error('img4')
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
