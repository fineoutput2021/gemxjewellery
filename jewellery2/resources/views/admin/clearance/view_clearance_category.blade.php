@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4 class="page-title">View Sale Category</h4>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0);">Sale Product</a></li>
<li class="breadcrumb-item active">View Sale Category</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View Sale Category List</h4></div>

</div>
    <hr style="margin-bottom: 50px;background-color: darkgrey;">
    <div class="table-rep-plugin">
        <div class="table-responsive b-0" data-pattern="priority-columns">
            <table id="tech-companies-1" class="table  table-striped">
                <thead>
                <tr>
                    <th>#</th>
                    <th data-priority="1">Name</th>
                    <th data-priority="3">Image</th>


                    <th data-priority="6">Action</th>
                </tr>
                </thead>
                <tbody>


@if(!empty($categorydetails))
<?php $a=0; ?>
@foreach($categorydetails as $category)
<?php $a++;?>
<tr>
                    <th>{{$a}}</th>
                    <td>{{ $category->name}}</td>
                    @if( $category->image != "" &&  $category->image!= null)
                    <td>
                    <img id="slide_img_path" height=100 width=200 src="<?php echo base_path.$category->image; ?> ">
                    </td>
                    @else
                    <td>Sorry, No Image!</td>
                    @endif

<td>

<div class="btn-group" id="btns<?php echo $a ?>">
<div class="btn-group">
  <a href="<?=base_path?>view_sale_subcategory/<?php echo base64_encode($category->id)?>"  >
<button type="button" class="btn btn-default " > View Subcategory <span class="caret"></span></button>
</a>

</div>
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
