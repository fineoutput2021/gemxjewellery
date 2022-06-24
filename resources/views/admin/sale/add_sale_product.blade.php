@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
  <h4 class="page-title">Add Sale Products</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
      <li class="breadcrumb-item"><a href="javascript:void(0);">Sale</a></li>
      <li class="breadcrumb-item active">Add Sale Products</li>
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

          <h4 class="mt-0 header-title">Add Sale Products Form</h4>
          <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_sale_product_process" method="post" enctype="multipart/form-data">
@csrf

<input type="hidden" name="sale_id" id="sale_id" value="<?=base64_decode($sale_id)?>"/>

          <div class="form-group row">
              <label for="example-color-input" class="col-sm-2 col-form-label">Add Categories &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4">

                <select name="category" class="form-control" required id="category">
                <option value="" disabled selected>Please Select Sale Category</option>
                @if($category != "" && $category != null)
                @foreach ($category as $cate)


                <option value="<?php echo $cate->id;?>" ><?php echo $cate->name;?></option>

                @endforeach
                  @endif
                </select>
                @error('order_qualify_type')
                <div style= "color:red">{{$message}}</div>
                @enderror

              </div>
              <label for="example-color-input" class="col-sm-2 col-form-label">Add SubCategories &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4">

                <select name="subcategory" class="form-control" required
                id="subcategory"
                 >
                  <option value="" disabled selected>Please Select Sale Subcategory</option>
                  <!-- <span id="subcategory"> -->

                <!-- @if($subcategory != "" && $subcategory != null)
                @foreach ($subcategory as $subcate)
                <option value="<?php echo $subcate->id;?>" ><?php echo $subcate->name;?></option>
                @endforeach
                @endif -->
              <!-- </span> -->
                </select>
                @error('order_qualify_type')
                <div style= "color:red">{{$message}}</div>
                @enderror

              </div>
          </div>

<!-- <div class="form-group row"> -->
  <!-- <div id="subcategory_sale_pro"> -->

<div class="container" style="padding:10px;width:99% !important;" id="subcategory_sale_pro" >
  <!-- <div class="row" style="background:#f3f3f3;padding:10px 20px;justify-content: center;
    align-items: center;
    display: flex;
">
    <div class="col-md-1">
      <img style="width:100%;" src="https://upload.wikimedia.org/wikipedia/commons/thumb/b/b6/Image_created_with_a_mobile_phone.png/1200px-Image_created_with_a_mobile_phone.png">
    </div>
    <div class="col-6">
      <p class="m-0 p-0">jhjkdshfjkdsdhfjkdhfjksddhfjksdf</p>
    </div>
    <div class="col-2">
      <span> $<a style="text-decoration:none; color:black;" href="#">100</a></span>&nbsp;&nbsp;-&nbsp;
      <span> $<a style="text-decoration:none; color:black;" href="#">100</a></span>
    </div>
    <div class="col-2">
      <span> $<a style="text-decoration:none; color:black;" href="#">100</a></span>
    </div>
    <div class="col-1">
      <button style="border:none; text-align:center;color:black;background:none;cursor:pointer;font-weight:500;font-size:20px;">
        x
      </button>
    </div>
    </div> -->
  </div>


<!-- </div> -->




  <!-- </div> -->
</div>


<div class="form-group" style="padding: 0px 15px;margin-left: auto;">
                  <div>
                     <button type="submit"  class="btn btn-primary">Submit</button>

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
$(document).on('change', '#category', function() {
  // Does some stuff and logs the event to the console

  // alert("u");
$("#subcategory").html("");
  var cat_id = $(this).val();
// alert(cat_id);
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

  if(i == 0)  {
   options= '<option value="" disabled selected>Please Select Sale Subcategory</option>';
 }else{
   options= "";
 }

  options= options +'<option value="'+item.id+'">'+item.name+'</option>';

   $("#subcategory").append(options);
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
$(document).ready(function(){

$(document).on('change', '#subcategory', function() {
  // Does some stuff and logs the event to the console

  alert("u");
$("#subcategory_sale_pro").html("");
  var subcat_id = $(this).val();
  var cat_id = $('#category').val();
  var sale_id = $('#sale_id').val();
alert(cat_id);
// alert(subcat_id);
// alert(sale_id);

// var base_url = $("#app_base_url_values").val();
var base_path = $("#base_path").val();


  $.ajax({
  url:base_path+"subcat_pro_data",
  method: 'post',
  data: {subcat_id: subcat_id , cat_id: cat_id ,sale_id: sale_id , _token: '{{csrf_token()}}'},
  dataType: 'json',
  success: function(response){
// alert(response.toString());
alert(response);
  if(response.data == true){

  var sale_prod= response.sale_sub_pro_data;
  var prod_data= response.prod_data;
  var sale_data=  response.sales_data;
  // alert("subcat_d");
  alert(sale_prod);
  alert(prod_data);

if(response.data_msg != "" && response.data_msg != null){

alert(response.data_msg);

}


  var options;
  $.each(sale_prod, function(i, item) {
var sale_product_id= item.product_id;
  // alert("sale_product_id");
  // alert(sale_product_id);
      $.each(prod_data, function(i, item1) {
        var prodc_id= item1.id;
        // var num= 20 in stock;
          // alert("prodc_id");
          // alert(prodc_id);
        if(sale_product_id == item1.id){
  // alert("matched");
          // options= '<option value="'+item1.id+'">'+item1.name+'</option>';
          options=   '<div id="sale_pros_'+ i +'" class="row mt-3" style="background:#f3f3f3;padding:10px 20px;justify-content: center;align-items: center;display: flex;">'
              +'<div class="col-md-1">'
                +'<img style="width:100%;height:50px;" src="/'+ item1.image1 +'">'
            +'</div>'
            +'<div class="col-5">'
                +'<p class="m-0 p-0">'+ item1.name +'</p>'
              +'</div>'
              +'<div class="col-3">'
                +'<span> Sale&nbsp;:&nbsp;<a style="text-decoration:none; color:black;" href="#">'+ sale_data.sale
              +'</a></span> &nbsp;&nbsp;&nbsp; '
                +'<span> <a style="text-decoration:none; color:black;" href="#"></a></span>'
              +'</div>'
              +'<div class="col-2">'
                +'<span> <a style="text-decoration:none; color:black;" href="#"></a></span>'
              +'</div>'
              +'<div class="col-1">'
              +'<a style="border:none; text-align:center;color:black;background:none;cursor:pointer;font-weight:500;font-size:20px;" onclick="deleteSaleProduct('+item.id+','+ i +')">'
                  +'x'
                +'</a>'
              +'</div>'
              +'</div>';

          $("#subcategory_sale_pro").append(options);

        }

     });
  });


  }
  else{
  alert('hiii');
  }
  }
  });


});

});
</script>

<script>
function deleteSaleProduct(id, index){

alert(id);
alert(index);

var base_path = $("#base_path").val();

    $.ajax({
    url:base_path+"delete_sale_pro",
    method: 'post',
    data: {sale_product_id: id , _token: '{{csrf_token()}}'},
    dataType: 'json',
    success: function(response){
  // alert(response.toString());
  alert(response);
  alert(response.data);
  if(response.data == true){
    alert('yes');
    $("#sale_pros_"+index).hide();
    // location.reload();
  }else{
    alert('no');
  }

    }
});




}
</script>

@endsection
