@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4 class="page-title">View MiniSubCategory</h4>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0);">MiniSubCategory</a></li>
<li class="breadcrumb-item active">View MiniSubCategory</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View MiniSubCategory List</h4></div>
<div class="col-md-2">  <a class="btn btn-info cticket" href="<?=base_path?>add_minisubcategory_view" role="button" style="margin-left: 20px;"> Add MiniSubCategory</a></div>
</div>
<hr style="margin-bottom: 50px;background-color: darkgrey;">
<div class="table-rep-plugin">
<div class="table-responsive b-0" data-pattern="priority-columns">
  <table id="datatable-buttons" class="table  table-striped">
      <thead>
      <tr>
          <th>#</th>
          <th data-priority="1">Category</th>
          <th data-priority="1">Subcategory</th>
          <th data-priority="1">Name</th>
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
// print_r($subcategorydetails); die();
?>
@if(!empty($minisubcategorydetails))
<? $a=0; ?>
@foreach($minisubcategorydetails as $m_subcategory)
<? $a++; ?>
<tr>
          <th>{{$a}}</th>

        	@foreach($categorydetails as $category)
          @if($category->id == $m_subcategory->category_id)
          <td>{{ $category->name}}</td>
          @endif
          @endforeach

          @foreach($subcategorydetails as $subcategory)
          @if($subcategory->id == $m_subcategory->subcategory_id)
          <td>{{ $subcategory->name}}</td>
          @endif
          @endforeach


          <td>{{ $m_subcategory->name}}</td>
          @if( $m_subcategory->image != "" &&  $m_subcategory->image != null)
          <td>
          <img id="slide_img_path" height=100 width=200 src="<?php if($m_subcategory->image != "" && $m_subcategory->image != null ){echo base_path.$m_subcategory->image;} ?> ">
          </td>
          @else
          <td>Sorry, No Image!</td>
          @endif











<?php  $activ= $m_subcategory->is_active;?>
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

<?php if($m_subcategory->is_active== 0){ ?>
<li><a href="<?=base_path?>update_minisubcategory_status/active/<?php echo base64_encode($m_subcategory->id)?>">Active</a></li>
<?php } else { ?>
<li><a href="<?=base_path?>update_minisubcategory_status/inactive/<?php echo base64_encode($m_subcategory->id)?>">Inactive</a></li>
<?php		}   ?>

<li><a href="<?=base_path?>update_minisubcategory_view/<?php echo base64_encode($m_subcategory->id)?>">Edit</a></li>

<li><a href="javascript:();" class="dCnf" mydata="<?php echo $a ?>">Delete MiniSubCategory</a></li>
</ul>
</div>
</div>

<div style="display:none" id="cnfbox<?php echo $a ?>">
<p> Are you sure delete this </p>
<a href="<?=base_path?>deleteminisubcategory/<?php echo base64_encode($m_subcategory->id)?>" class="btn btn-danger" >Yes</a>
<a href="javascript:();" class="cans btn btn-default" mydatas="<?php echo $a ?>" >No</a>
</div>


</td>
</tr>
@endforeach
@endif
<?php
// 	}
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
