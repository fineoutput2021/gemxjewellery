@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
  <div class="col-sm-12">
      <div class="page-title-box">
          <h4 class="page-title">View Product</h4>
          <ol class="breadcrumb">
              <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
              <li class="breadcrumb-item"><a href="javascript:void(0);">Customize Product</a></li>
              <li class="breadcrumb-item active">View Product</li>
          </ol>

          <div class="state-information d-none d-sm-block">
              <!-- <div class="state-graph">
                  <div id="header-chart-1"></div>
                  <div class="info">Balance $ 2,317</div>
              </div>
              <div class="state-graph">
                  <div id="header-chart-2"></div>
                  <div class="info">Item Sold 1230</div>
              </div> -->
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

<div class="row">
<div class="col-md-8"><h4 class="mt-0 header-title">View Product List</h4></div>
<div class="col-md-2 text-right">  <a class="btn btn-info cticket" href="<?=base_path?>add_customize_product_view?cate_id=<?=$cate_id?>" role="button" style="margin-left: 20px;"> Add Product</a></div>
<div class="col-md-2">  <a class="btn btn-info cticket" href="<?=base_path?>view_customize_category" role="button" style="margin-left: 20px;">Back</a></div>
</div>
                  <hr style="margin-bottom: 50px;background-color: darkgrey;">
                  <div class="table-rep-plugin">
                      <div class="table-responsive b-0" data-pattern="priority-columns">
                          <table id="tech-companies-1" class="table  table-striped">
                              <thead>
                              <tr>
                                  <th>#</th>
                                  <th data-priority="1">Name</th>
                                  <th data-priority="3">Category Id</th>
                                  <th data-priority="3">Description</th>
                                  <th data-priority="3">Size</th>
                                  <th data-priority="3">Base Price</th>
                                  <th data-priority="3">Image</th>

                                  <th data-priority="6">status</th>
                                  <th data-priority="6">Action</th>
                              </tr>
                              </thead>
                              <tbody>

<?php
// $a=0;
// if(!empty($teamdetails)){
// foreach($teamdetails as $team){
// $a++;
?>
@if(!empty($productdetails))
<?php $a=0; ?>
@foreach($productdetails as $product)
<?php $a++;?>
<tr>
                                  <th>{{$a}}</th>
                                  <td>{{ $product->name}}</td>
                                  <td>

<?php
$category_da= App\adminmodel\CustomizeCategory::wherenull('deleted_at')->where('id', $product->category_id)->first();
if(!empty($category_da)){
  echo $category_da->name;
}else {
  echo "-";
}
?>
                                  </td>

<td>{{ $product->s_desc}}</td>
<td>{{ $product->size}}</td>
<td>{{ $product->base_price}}</td>

                                  @if( $product->image != "" &&  $product->image!= null)
                                  <td>
                                  <img id="slide_img_path" height=100 width=200 src="<?php echo base_path.$product->image; ?> ">
                                  </td>
                                  @else
                                  <td>Sorry, No Image!</td>
                                  @endif











		  <?php  $activ= $product->is_active;?>
		@if($activ == "1")
		<td><p class="label pull-right status-activ" >Active</p></td>
		@else
		<td><p class="label pull-right status-inactiv" >InActive</p></td>
		@endif

<td>

<div class="btn-group" id="btns<?php echo $a ?>">
<div class="btn-group">
	<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
  <ul class="dropdown-menu" role="menu">

	<?php if($product->is_active== 0){ ?>
	<li><a href="<?=base_path?>update_customize_product_status/active/<?php echo base64_encode($product->id)?>">Active</a></li>
	<?php } else { ?>
	<li><a href="<?=base_path?>update_customize_product_status/inactive/<?php echo base64_encode($product->id)?>">Inactive</a></li>
	<?php		}   ?>

  <li><a href="<?=base_path?>update_customize_product_view/<?php echo base64_encode($product->id)?>">Edit</a></li>
  <li><a href="<?=base_path?>view_customize_product_stone/<?php echo base64_encode($product->id)?>">View Products Types</a></li>

	<li><a href="javascript:();" class="dCnf" mydata="<?php echo $a ?>">Delete Product</a></li>
  </ul>
</div>
</div>

<div style="display:none" id="cnfbox<?php echo $a ?>">
<p> Are you sure delete this </p>
<a href="<?=base_path?>deleteCustomizeProduct/<?php echo base64_encode($product->id)?>" class="btn btn-danger" >Yes</a>
<a href="javascript:();" class="cans btn btn-default" mydatas="<?php echo $a ?>" >No</a>
</div>


</td>
</tr>
@endforeach
@endif
                  <?php
// }
// }
?>

                              </tbody>
                          </table>
                      </div>

                  </div>

              </div>
          </div>
      </div> <!-- end col -->
  </div> <!-- end row -->
</div>
<!-- end page content-->

</div> <!-- container-fluid -->

</div> <!-- content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
// $('#userTable').DataTable({
// responsive: true,
// // bSort: true
// });

$(document.body).on('click', '.dCnf', function() {
var i=$(this).attr("mydata");
console.log(i);

$("#btns"+i).hide();
$("#cnfbox"+i).show();

});

$(document.body).on('click', '.cans', function() {
var i=$(this).attr("mydatas");
console.log(i);

$("#btns"+i).show();
$("#cnfbox"+i).hide();
})

});

</script>
@endsection
