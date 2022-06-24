@extends('admin.base_template')
@section('main')
                <!-- Start content -->
                <div class="content">
                    <div class="container-fluid">

                        <div class="row">
                            <div class="col-sm-12">
                                <div class="page-title-box">
                                    <h4 class="page-title">Update MiniSubCategory</h4>
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                                        <li class="breadcrumb-item"><a href="javascript:void(0);">MiniSubCategory</a></li>
                                        <li class="breadcrumb-item active">Update MiniSubCategory</li>
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
if($minisubcate_data != "" && $minisubcate_data != null ){
  $minisubcate_id= $minisubcate_data->id;
  $minisubcate_cat_id= $minisubcate_data->category_id;
  $minisubcate_subcat_id= $minisubcate_data->subcategory_id;
  $minisubcate_name= $minisubcate_data->name;
  $minisubcate_img= $minisubcate_data->image;
}else{
  $minisubcate_id= "";
  $minisubcate_cat_id="";
  $minisubcate_subcat_id="";
  $minisubcate_name= "";
  $minisubcate_img= "";
}

?>
                                            <h4 class="mt-0 header-title">Update MiniSubCategory Form</h4>
                                            <hr style="margin-bottom: 50px;background-color: darkgrey;">
            <form action="<?=base_path?>add_minisubcategory_process?id=<?php echo base64_encode($minisubcate_id)?>" method="post" enctype="multipart/form-data">
			@csrf

      <div class="form-group row">
      <label for="example-text-input" class="col-sm-2 col-form-label">Category &nbsp;<span style="color:red;">*</span></label>
      <div class="col-sm-10">



      <select name="category_id" class="form-control" id="cid" required >
      <option value="" disabled selected>--select category--</option>
      <?php
      if(!empty($category_data)){
      foreach($category_data as $cat_data) {
      ?>
      <option value="<?= $cat_data->id ?>" <?php if($minisubcate_cat_id == $cat_data->id){ echo "selected"; } ?>> <?= $cat_data->name ?> </option>
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



      <select name="subcategory_id" class="form-control" id="bran_student" required >
      <option value="" disabled selected>--select subcategory--</option>
      <?php
      if(!empty($subcate_data)){
      foreach($subcate_data as $subcat) {
      ?>
      <option value="<?= $subcat->id ?>" <?php if($minisubcate_subcat_id == $subcat->id){ echo "selected"; } ?>> <?= $subcat->name ?> </option>
      <?php
      } }?>
      </select>
      @error('subcategory_id')
      <div style= "color:red">{{$message}}</div>
      @enderror
      </div>
      </div>



                      <div class="form-group row">
                          <label for="example-text-input" class="col-sm-2 col-form-label">Name &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                              <input class="form-control" type="text" value="<?php echo $minisubcate_name; ?>" id="name" name="name" required>
      													@error('name')
      													<div style= "color:red">{{$message}}</div>
      													@enderror

                          </div>
                      </div>


                      <div class="form-group row">
                          <label for="example-color-input" class="col-sm-2 col-form-label">Image &nbsp;<span style="color:red;">*</span></label>
                          <div class="col-sm-10">
                            <span style="color:red;">Image size: 1000x1000</span>
                              <input class="form-control" type="file" value="" id="img" name="img" >
                              @error('img')
    													<div style= "color:red">{{$message}}</div>
    													@enderror
                              <?php if($minisubcate_img!=""){ ?> <img id="slide_img_path" height=200 width=300 src="<?php echo base_path.$minisubcate_img; ?> "> <?php }else{ ?> Sorry No File Found <?php } ?>
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


<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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

@endsection
