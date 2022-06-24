@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">View Product Ask Questions</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Product Ask Questions</a></li>
                <li class="breadcrumb-item active">View Product Ask Questions</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View Product Ask Questions List</h4></div>
<!-- <div class="col-md-2">  <a class="btn btn-info cticket" href="/add_catelogue_view" role="button" style="margin-left: 20px;"> Add Wholesale Inquiry</a></div> -->
</div>
                    <hr style="margin-bottom: 50px;background-color: darkgrey;">
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th data-priority="3">Name</th>
                                    <th data-priority="3">Email</th>
                                    <th data-priority="3">Product</th>
                                    <th data-priority="3">Category</th>
                                    <th data-priority="3">SubCategory</th>
                                    <th data-priority="3">Question</th>

                                    <th data-priority="3">Date</th>
                                    <!-- <th data-priority="6">Action</th> -->
                                </tr>
                                </thead>
                                <tbody>

<?php
// $a=0;
// if(!empty($teamdetails)){
// foreach($teamdetails as $team){
	// $a++;
?>
@if(!empty($product_ques_data))
<?php $a=0; ?>
@foreach($product_ques_data as $ques_data)
<?php $a++;?>
<tr>
                                    <th>{{$a}}</th>
                                    <td>{{ $ques_data->name}}</td>

                                    <td>{{ $ques_data->email}}</td>
                                    <td>{{ $ques_data->product_id }}

<?php
$product_data= App\adminmodel\Product::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('is_subcat_delete', 0)->where('id', $ques_data->product_id)->first();

if(!empty($product_data)){

echo $product_data->name;

}else{
  echo "Product not found!";
}
?>

                                    </td>

                                    <td>
<?php
  if(!empty($product_data)){

    $category_data= App\adminmodel\Category::wherenull('deleted_at')->where('is_active', 1)->where('id', $product_data->category)->first();

      if(!empty($category_data)){
        echo $category_data->name;
      }else{
        echo "Category not found!";
      }


  }else{
    echo "Category not found!";
  }
?>
                                    </td>

                                    <td>

<?php
  if(!empty($product_data)){

    $subcategory_data=App\adminmodel\SubCategory::wherenull('deleted_at')->where('is_active', 1)->where('is_cat_delete', 0)->where('id', $product_data->sub_category_id)->first();

      if(!empty($subcategory_data)){
        echo $subcategory_data->name;
      }else{
        echo "SubCategory not found!";
      }


  }else{
    echo "SubCategory not found!";
  }
?>

                                    </td>





                                    <td>{{ $ques_data->message}}</td>
                                    <td>

                                      <?php
                                        $newdate = new DateTime($ques_data->created_at);
                                        echo $newdate->format('j F, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                                      ?>
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
