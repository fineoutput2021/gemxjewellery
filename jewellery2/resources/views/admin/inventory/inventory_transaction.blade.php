@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
<h4 class="page-title">View Inventory Transaction</h4>
<ol class="breadcrumb">
  <li class="breadcrumb-item"><a href="javascript:void(0);">Inventory Transaction</a></li>
  <!-- <li class="breadcrumb-item"><a href="javascript:void(0);">Tables</a></li> -->
  <li class="breadcrumb-item active">View Inventory Transaction</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View Inventory Transaction List</h4></div>

</div>

      <hr style="margin-bottom: 50px;background-color: darkgrey;">
      <div class="table-rep-plugin">
          <div class="table-responsive b-0" data-pattern="priority-columns">
              <table id="tech-companies-1" class="table  table-striped">
                  <thead>
                  <tr>
                      <th>#</th>
                      <th data-priority="1">Product Name</th>
                      <th data-priority="3">Color</th>
                      <th data-priority="3">Stock</th>
                      <th data-priority="3">Type</th>
                      <th data-priority="3">Date</th>

                      <!-- <th data-priority="6">status</th> -->
                      <!-- <th data-priority="6">Action</th> -->
                  </tr>
                  </thead>
                  <tbody>

<?php
// $a=0;
// if(!empty($teamdetails)){
// foreach($teamdetails as $team){
// $a++;
// echo ; die();
?>
@if(!empty($inventorydetails))
<?php $a=0;?>
@foreach($inventorydetails as $inventory)
<?php $a++;?>
<tr>


    <th>{{$a}}</th>
  <td>
    @if(!empty($productdetails))
      @foreach($productdetails as $product)

        @if($inventory->product_id == $product->id)
       {{ $product->name}}
        @endif

      @endforeach
      @endif
</td>

<td>
    @if(!empty($colordetails))
		@foreach($colordetails as $color_data)

      @if($inventory->color_id == $color_data->id)
       {{ $color_data->name}}
      @endif

    @endforeach
    @endif
</td>


<td>  {{ $inventory->stock}}  </td>
@if($inventory->type == 1)
<td>  Stock Added.  </td>
@else
<td>  Stock Removed.  </td>
@endif

<td>
<?php
  $newdate = new DateTime($inventory->created_at);
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
