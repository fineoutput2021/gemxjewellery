@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4 class="page-title">View Products</h4>
<ol class="breadcrumb">
<li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
<li class="breadcrumb-item"><a href="javascript:void(0);">New & Now Product</a></li>
<li class="breadcrumb-item active">View Products</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View Products List</h4></div>
<div class="col-md-2">  <a class="btn btn-info cticket" href="<?=base_path?>view_new_and_now_subcategory/<?php echo $category_id; ?>" role="button" style="margin-left: 20px;"> Back</a></div>

</div>
<hr style="margin-bottom: 50px;background-color: darkgrey;">
<div class="table-rep-plugin">
    <div class="table-responsive b-0" data-pattern="priority-columns">
        <table id="tech-companies-1" class="table  table-striped">
            <thead>
            <tr>
                <th>#</th>
                <th data-priority="1">Name</th>
                <th data-priority="1">Category</th>
                <th data-priority="1">SubCategory</th>
                <th data-priority="1">MiniSubCategory</th>
                <th data-priority="1">SDesc</th>
                <!-- <th data-priority="1">Tag</th> -->


                <th data-priority="6">Action</th>
            </tr>
            </thead>
            <tbody>


@if(!empty($productdetails))
<?php $a=0; ?>
@foreach($productdetails as $product)
<?php $a++;?>
<tr>
                <th>{{$a}}</th>
                <td>{{ $product->name}}</td>

@foreach($categorydetails as $category)
@if($category->id == $product->category)
<td>{{ $category->name}}</td>
@endif
@endforeach

@foreach($subcategorydetails as $subcategory)
@if($subcategory->id == $product->sub_category_id)
<td>{{ $subcategory->name}}</td>
@endif
@endforeach

<td>
<?php
$minisub=  App\adminmodel\MiniSubCategory::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('id', $product->mini_subcategory_id)->first();

if(!empty($minisub)){
echo $minisub->name;
}else{
echo "No MiniSubcategory";
}


?>
</td>

                <td>{{ $product->sdesc}}</td>

<td>

<div class="btn-group" id="btns<?php echo $a ?>">
<div class="btn-group">

<?php
$new_ariv_product= App\adminmodel\NewArrival::where('product_id', $product->id)->first();

?>
<?php  if(empty($new_ariv_product)){ ?>

    <a href="<?=base_path?>add_new_and_now_product/<?=$category_id?>/<?=$subcategory_id?>/<?php echo base64_encode($product->id); ?>">

    <button type="button" class="btn btn-default"> ADD </button>
    </a>

<?php } else{ ?>

    <a href="<?=base_path?>remove_new_and_now_product/<?=$category_id?>/<?=$subcategory_id?>/<?php echo base64_encode($product->id); ?>">
        <button type="button" class="btn btn-default " aria-expanded="false">
        Remove </button>
    </a>
<?php } ?>


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
