@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

    <div class="row">
        <div class="col-sm-12">
            <div class="page-title-box">
                <h4 class="page-title">View Sale Products</h4>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                    <li class="breadcrumb-item"><a href="javascript:void(0);">Sale </a></li>
                    <li class="breadcrumb-item active">View Sale Products</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View Sale Products List</h4></div>
<div class="col-md-2">  <a class="btn btn-info cticket" href="<?=base_path?>view_sale" role="button" style="margin-left: 20px;"> Back To Sale</a></div>
</div>
                        <hr style="margin-bottom: 50px;background-color: darkgrey;">
                        <div class="table-rep-plugin">
                            <div class="table-responsive b-0" data-pattern="priority-columns">
                                <table id="tech-companies-1" class="table  table-striped">
                                    <thead>
                                    <tr>
                                        <th>#</th>
                                        <th data-priority="3">SaleName</th>
                                        <th data-priority="3">ProductName</th>
                                        <th data-priority="1">Category</th>
                                        <th data-priority="1">SubCategory</th>
                                        <th data-priority="1">SDesc</th>
                                        <th data-priority="1">LDesc</th>
                                        <th data-priority="3">Image1</th>
                                        <th data-priority="3">Image2</th>
                                        <th data-priority="3">Image3</th>

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
	@if(!empty($saleproductdetails) )
		<?php $a=0; ?>
		@foreach($saleproductdetails as $saleProduct)
		<?php $a++;?>
	<tr>
                                        <th>{{$a}}</th>
                                        @if($sale_data != "" && $sale_data != null)
                                        <th>{{$sale_data->sale}}</th>
                                        @endif

                                        <td>{{ $saleProduct->name}}</td>

                    @foreach($categorydetails as $category)
                    @if($category->id == $saleProduct->category_id)
                    <td>{{ $category->name}}</td>
                    @endif
                    @endforeach

                    @foreach($subcategorydetails as $subcategory)
                    @if($subcategory->id == $saleProduct->sub_category_id)
                    <td>{{ $subcategory->name}}</td>
                    @endif
                    @endforeach




                                        <td>{{ $saleProduct->sdesc}}</td>
                                        <td>{{ $saleProduct->ldesc}}</td>

                                        @if( $saleProduct->image1 != "" &&  $saleProduct->image1!= null)
                                        <td>
                                        <img id="slide_img_path" height=100 width=200 src="<?php echo base_path.$saleProduct->image1; ?> ">
                                        </td>
                                        @else
                                        <td>Sorry, No Image!</td>
                                        @endif

                                        @if( $saleProduct->image2 != "" &&  $saleProduct->image2 != null)
                                        <td>
                                        <img id="slide_img_path" height=100 width=200 src="<?php echo base_path.$saleProduct->image2; ?> ">
                                        </td>
                                        @else
                                        <td>Sorry, No Image!</td>
                                        @endif

                                        @if( $saleProduct->image3 != "" &&  $saleProduct->image3 != null)
                                        <td>
                                        <img id="slide_img_path" height=100 width=200 src="<?php echo base_path.$saleProduct->image3 ; ?> ">
                                        </td>
                                        @else
                                        <td>Sorry, No Image!</td>
                                        @endif











					  <?php  $activ= $saleProduct->is_active;?>
					@if($activ == "1")
					<td><p class="label pull-right status-activ" >Active</p></td>
					@else
					<td><p class="label pull-right status-inactiv" >InActive</p></td>
					@endif

  <td>

		<div class="btn-group" id="btns<?php echo $a ?>">
			<div class="btn-group">
					<a href="<?=base_path?>deleteSaleProduct/<?php echo base64_encode($saleProduct->id)?>" ><button type="button" class="btn btn-default" > Remove </button></a>

			</div>
		</div>




	</td>
  </tr>
		@endforeach
    @else
    <p> No Sale Products!</p>
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
