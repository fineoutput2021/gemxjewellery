@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">View Order Product</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Orders </a></li>
                <li class="breadcrumb-item active">View Order Product</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View Order Product Inquiry List</h4></div>
<!-- <div class="col-md-2">  <a class="btn btn-info cticket" href="/add_catelogue_view" role="button" style="margin-left: 20px;"> Add Wholesale Inquiry</a></div> -->
</div>
                    <hr style="margin-bottom: 50px;background-color: darkgrey;">
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th data-priority="3">Product </th>
                                    <th data-priority="3">Color </th>
                                    <th data-priority="3">Metal </th>
                                    <th data-priority="3">Stone </th>
                                    <th data-priority="3">Size </th>
                                    <th data-priority="3">Engrave Text </th>
                                    <th data-priority="3">Font Family </th>
                                    <th data-priority="3">Font Size </th>
                                    <th data-priority="2">Quantity</th>
                                    <th data-priority="2">Amount</th>
                                    <!-- <th data-priority="3">Message</th> -->

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
@if(!empty($ordered_product_details_data))
<?php $a=0; ?>
@foreach($ordered_product_details_data as $order2)
<?php $a++;?>
<tr>
                                    <th>{{$a}}</th>
                                    <td>
                                      <?php
                                      if($order2->status == 0){
                                      $products_data= App\adminmodel\Product::wherenull('deleted_at')->where('id',$order2->product_id)->first();
                                    }elseif ($order2->status == 1) {
                                      $products_data= App\adminmodel\CustomizeProduct::wherenull('deleted_at')->where('id',$order2->product_id)->first();
                                    }elseif ($order2->status == 2) {
                                      $products_data= App\adminmodel\EngraveProduct::wherenull('deleted_at')->where('id',$order2->product_id)->first();
                                    }
                                      if(!empty($products_data)){
                                        echo $products_data->name;

                                      }else{
                                        echo "no product found";

                                      }
                                      ?>
                                    </td>

                                    <td>

                                      <?php
                                      if($order2->status == 0){
                                      $color_data= App\adminmodel\Color::wherenull('deleted_at')->where('id',$order2->color_id)->first();
                                      if(!empty($color_data)){
                                        echo $color_data->name;

                                      }else{
                                        echo "-";
                                      }
                                    }else {
                                      echo "-";
                                    }
                                      ?>

                                    </td>


                                    <td>

                                      <?php
                                      if($order2->status == 1){
                                      $metal_da= App\adminmodel\CustomizeMetalColor::wherenull('deleted_at')->where('id', $order2->metal)->first();
                                      if(!empty($metal_da)){
                                        echo $metal_da->name;

                                      }else{
                                        echo "-";
                                      }
                                    }else {
                                      echo "-";
                                    }
                                      ?>

                                    </td>

                                    <td>

                                      <?php
                                      if($order2->status == 1){

                                      if(!empty($order2->stone)){
                                        echo $order2->stone;

                                      }else{
                                        echo "-";
                                      }
                                    }else {
                                      echo "-";
                                    }
                                      ?>

                                    </td>
                                    <td>

                                      <?php
                                      if($order2->status == 1){

                                      if(!empty($order2->size)){
                                        echo $order2->size;

                                      }else{
                                        echo "-";
                                      }
                                    }else {
                                      echo "-";
                                    }
                                      ?>

                                    </td>


                                    <td>

                                      <?php
                                      if($order2->status == 2){

                                      if(!empty($order2->engrave_text)){
                                        echo $order2->engrave_text;

                                      }else{
                                        echo "-";
                                      }
                                    }else {
                                      echo "-";
                                    }
                                      ?>

                                    </td>


                                    <td>

                                      <?php
                                      if($order2->status == 2){

                                      if(!empty($order2->font_family)){
                                        echo $order2->font_family;

                                      }else{
                                        echo "-";
                                      }
                                    }else {
                                      echo "-";
                                    }
                                      ?>

                                    </td>


                                    <td>

                                      <?php
                                      if($order2->status == 2){

                                      if(!empty($order2->font_size)){
                                        echo $order2->font_size;

                                      }else{
                                        echo "-";
                                      }
                                    }else {
                                      echo "-";
                                    }
                                      ?>

                                    </td>


                                    <td>{{ $order2->quantity}}</td>
                                    <td>${{ $order2->amount}}</td>

                                    <td>
                                      <?php
                                        $newdate = new DateTime($order2->created_at);
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
