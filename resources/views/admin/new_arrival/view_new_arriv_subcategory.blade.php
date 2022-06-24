@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4 class="page-title">View New & Now SubCategory</h4>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0);">New & Now Product</a></li>
<li class="breadcrumb-item active">View New & Now SubCategory</li>
</ol>

<div class="state-information d-none d-sm-block">

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
<div class="col-md-10"><h4 class="mt-0 header-title">View New & Now SubCategory List</h4></div>
<div class="col-md-2">  <a class="btn btn-info cticket" href="<?=base_path?>view_new_and_now_category" role="button" style="margin-left: 20px;"> Back</a></div>
</div>
<hr style="margin-bottom: 50px;background-color: darkgrey;">
<div class="table-rep-plugin">
<div class="table-responsive b-0" data-pattern="priority-columns">
  <table id="tech-companies-1" class="table  table-striped">
      <thead>
      <tr>
          <th>#</th>
          <th data-priority="1">category</th>
          <th data-priority="1">Name</th>
          <th data-priority="3">Image</th>
          <th data-priority="6">Action</th>
      </tr>
      </thead>
      <tbody>


@if(!empty($subcategorydetails))
<? $a=0; ?>
@foreach($subcategorydetails as $subcategory)
<? $a++; ?>
<tr>
          <th>{{$a}}</th>

        	@foreach($categorydetails as $category)
          @if($category->id == $subcategory->category_id)
          <td>{{ $category->name}}</td>
          @endif
          @endforeach

          <td>{{ $subcategory->name}}</td>
          @if( $subcategory->image != "" &&  $subcategory->image != null)
          <td>
          <img id="slide_img_path" height=100 width=200 src="<?php if($subcategory->image != "" && $subcategory->image != null ){echo base_path.$subcategory->image;} ?> ">
          </td>
          @else
          <td>Sorry, No Image!</td>
          @endif



<td>

<div class="btn-group" id="btns<?php echo $a ?>">
<div class="btn-group">
  <a href="<?=base_path?>view_new_and_now_add_product/<?php echo $category_id; ?>/<?php echo base64_encode($subcategory->id)?>">
<button type="button" class="btn btn-default " > View Products </button>
</a>

</div>
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
