@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
  <h4 class="page-title">Add Product</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
      <li class="breadcrumb-item"><a href="javascript:void(0);">Product</a></li>
      <li class="breadcrumb-item active">Add Product</li>
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

          <h4 class="mt-0 header-title">Add Product Form</h4>
          <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_products_process" method="post" enctype="multipart/form-data">
@csrf
          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Name &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="name" name="name" required>
										@error('name')
										<div style= "color:red">{{$message}}</div>
										@enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Category &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">

                <select name="category_id" id="cid" class="form-control" required >
                <option value="" disabled selected>--select category--</option>
                <?php
                if(!empty($cate_data)){
                foreach($cate_data as $cat_data) {
                ?>
                <option value="<?= $cat_data->id ?>"> <?= $cat_data->name ?> </option>
                <?php
                } }?>
                </select>
                @error('category_id')
                <div style= "color:red">{{$message}}</div>
                @enderror

              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">SubCategory &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">

                <select name="subcategory_id" class="form-control" required id="bran_student">
                <option value="" disabled selected>--select subcategory--</option>
                <!-- <?php
                if(!empty($cate_data)){
                foreach($cate_data as $cat_data) {
                ?>
                <option value="<?= $cat_data->id ?>"> <?= $cat_data->name ?> </option>
                <?php
                } }?> -->
                </select>
                @error('subcategory_id')
                <div style= "color:red">{{$message}}</div>
                @enderror

              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">MiniSubCategory &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">

                <select name="minisubcategory_id" class="form-control"  id="mini_bran_student">
                <option value="" disabled selected>--select minisubcategory--</option>
                <!-- <?php
                if(!empty($cate_data)){
                foreach($cate_data as $cat_data) {
                ?>
                <option value="<?= $cat_data->id ?>"> <?= $cat_data->name ?> </option>
                <?php
                } }?> -->
                </select>
                @error('minisubcategory_id')
                <div style= "color:red">{{$message}}</div>
                @enderror

              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">SKU Id &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="sku_id" name="sku_id" required>
                    @error('sku_id')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">SDesc &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">
                  <textarea class="form-control" type="text" value="" id="editor2" name="sdesc" required rows="5" ></textarea>
                    @error('sdesc')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>


                <div class="form-group row">
                    <label for="example-text-input" class="col-sm-2 col-form-label">LDesc</strong>  <span style="color:red;">*</span></strong> </td>
          					<td> &nbsp;<span style="color:red;">*</span></label>
                    <div class="col-sm-10">
                        <textarea class="form-control" type="text" value="" id="editor1" name="ldesc"  rows="5" ></textarea>
                          @error('sdesc')
                          <div style= "color:red">{{$message}}</div>
                          @enderror
                    </div>
                </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Product Tag &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="tag" name="tag" required>
                    @error('tag')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>


          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">About Product Point1 &nbsp;</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="point1" name="point1" >
                    @error('point1')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">About Product Point2 &nbsp;</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="point2" name="point2" >
                    @error('point2')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">About Product Point3 &nbsp;</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="point3" name="point3" >
                    @error('point3')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">About Product Point4 &nbsp;</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="point4" name="point4" >
                    @error('point4')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>
          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">About Product Point5 &nbsp;</label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="" id="point5" name="point5" >
                    @error('point5')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>


          <!-- <div class="form-group row">
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

          <div class="form-group row">
              <label for="example-color-input" class="col-sm-2 col-form-label">Image5 &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">
                  <input class="form-control" type="file" value="" id="img5" name="img5" >
                  @error('img5')
									<div style= "color:red">{{$message}}</div>
									@enderror
              </div>
          </div> -->


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
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="<?=base_path?>assets/ckeditor/ckeditor.js"></script>




          <!-- <script src="<?=base_path?>assets/ckeditor/ckeditor.js"></script> -->


<script>

            // Replace the <textarea id="editor1"> with a CKEditor

            // instance, using default configuration.

            CKEDITOR.replace( 'editor1' );

        </script>
        <script>

                    // Replace the <textarea id="editor1"> with a CKEditor

                    // instance, using default configuration.

                    CKEDITOR.replace( 'editor2' );

                </script>
<!-- <script>

$(document).ready(function(){
  	$("#cid").change(function(){
		var cat_id=$(this).val();
    var yr = $("#year_id option:selected").val();
		if(cat_id==""){
			return false;

		}else{
			$('#bran_student option').remove();
			  var opton="<option value=''>Please Select </option>";
			$.ajax({
				url:"/subcat_data",
				data : {'cat_id': cat_id },
				type: "get",
				success : function(html){
          alert(html);
						if(html!="NA")
						{
							var s = jQuery.parseJSON(html);
							$.each(s, function(i) {
							opton +='<option value="'+s[i]['id']+'">'+s[i]['name']+'</option>';
							});
							$('#bran_student').append(opton);
							//$('#city').append("<option value=''>Please Select State</option>");

                      //var json = $.parseJSON(html);
                      //var ayy = json[0].name;
                      //var ayys = json[0].pincode;
						}
						else
						{
							alert('No Branch Found');
							return false;
						}

					}

				})
		}


	})
  });


</script> -->

<script>
$(document).on('change', '#cid', function() {
  // Does some stuff and logs the event to the console

  // alert("u");
$("#bran_student").html("");
  var cat_id = $(this).val();
// alert(cat_id);
// var base_url = $("#app_base_url_values").val();
var base_path = $("#base_path").val();

  $.ajax({
  url:base_path+"subcat_data",
  method: 'post',
  data: {cat_id: cat_id , _token: '{{csrf_token()}}'},
  dataType: 'json',
  success: function(response){
// alert(response.toString());
// alert(response);
  if(response.data == true){

  var subcat_d= response.sub_cat_data;
  // alert(subcat_d);
  var options;
  options='<option value="">-------select subcategory-------</option>';
  $("#bran_student").append(options);
  $.each(subcat_d, function(i, item) {
   options= '<option value="'+item.id+'">'+item.name+'</option>';

   $("#bran_student").append(options);
  });


  }
  else{
  alert('hiii');
  }
  }
  });


});
</script>


<script>
$(document).on('change', '#bran_student', function() {
  // Does some stuff and logs the event to the console

  // alert("u");
$("#mini_bran_student").html("");
  var subcat_id = $(this).val();
// alert(cat_id);
// var base_url = $("#app_base_url_values").val();
var base_path = $("#base_path").val();

  $.ajax({
  url:base_path+"minisubcat_data",
  method: 'post',
  data: {subcat_id: subcat_id , _token: '{{csrf_token()}}'},
  dataType: 'json',
  success: function(response){
// alert(response.toString());
// alert(response);
  if(response.data == true){

  var minisubcat_d= response.minisub_cat_data;
  // alert(subcat_d);
  var options;
  options='<option value="">-------select minisubcategory-------</option>';

$("#mini_bran_student").append(options);

  $.each(minisubcat_d, function(i, item) {
   options= '<option value="'+item.id+'">'+item.name+'</option>';

   $("#mini_bran_student").append(options);
  });


  }
  else{
  alert('hiii');
  }
  }
  });


});
</script>

@endsection
