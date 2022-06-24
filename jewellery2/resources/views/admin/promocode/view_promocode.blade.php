@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title">View Promocode</h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Promocode</a></li>
                <li class="breadcrumb-item active">View Promocode</li>
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
<div class="col-md-10"><h4 class="mt-0 header-title">View Promocode List</h4></div>
<div class="col-md-2">  <a class="btn btn-info cticket" href="<?=base_path?>add_promocode_view" role="button" style="margin-left: 20px;"> Add Promocode</a></div>
</div>
                    <hr style="margin-bottom: 50px;background-color: darkgrey;">
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                            <table id="tech-companies-1" class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th data-priority="1">Promocode</th>
                                    <th data-priority="3">Offer Type</th>
                                    <th data-priority="2">Percent Off</th>
                                    <th data-priority="2">Amount Off</th>
                                    <th data-priority="3">Promocode Type</th>
                                    <th data-priority="3">Minimum Amount To Apply Promocode</th>
                                    <th data-priority="3">Maximum Gift Amount</th>
                                    <th data-priority="3">Order Qualify Type</th>
                                    <th data-priority="3">Minimum Quantity</th>
                                    <th data-priority="3">Minimum Order Total</th>
                                    <th data-priority="3">Promocode Start Date</th>
                                    <th data-priority="3">Promocode Expiry Date</th>
                                    <!-- <th data-priority="3">Added By</th> -->

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
@if(!empty($promocodedetails))
<?php $a=0; ?>
@foreach($promocodedetails as $promocode)
<?php $a++;?>
<tr>
                                    <th>{{$a}}</th>
                                    <td>{{ $promocode->promocode}}</td>
                                    @if( $promocode->offer_type == 1)
                                    <td>
                                    Percentage Off
                                    </td>
                                    @elseif( $promocode->offer_type == 3)
                                    <td>
                                    Amount Off
                                    </td>
                                    @else
                                    <td>Free Delivery</td>
                                    @endif

                                    @if( $promocode->percent != "" && $promocode->percent  != null)
                                    <td>
                                    {{ $promocode->percent}} %
                                    </td>
                                    @else
                                    <td>0%</td>
                                    @endif

                                    @if( $promocode->amount_off != "" && $promocode->amount_off  != null)
                                    <td>
                                      ${{ $promocode->amount_off}}
                                    </td>
                                    @else
                                    <td>$0</td>
                                    @endif

                                    @if( $promocode->type == 1)
                                    <td>
                                    One Time
                                    </td>
                                    @else
                                    <td>Every Time</td>
                                    @endif

                                    <td>${{ $promocode->minimum_amount}}</td>

                                    @if( $promocode->maximum_gift_amount != "" && $promocode->maximum_gift_amount  != null)
                                    <td>${{ $promocode->maximum_gift_amount}}</td>
                                    @else
                                    <td>$0</td>
                                    @endif

                                    @if( $promocode->order_qualify_type == 1)
                                    <td>
                                    None
                                    </td>
                                    @elseif($promocode->order_qualify_type == 2)
                                    <td>Quantity</td>
                                    @else
                                    <td>Order Total</td>
                                    @endif

                                    @if( $promocode->quantity != "" && $promocode->quantity != null)
                                    <td>
                                    {{ $promocode->quantity}}
                                    </td>
                                    @else
                                    <td>0</td>
                                    @endif

                                    @if( $promocode->minimum_order_total != "" && $promocode->minimum_order_total != null)
                                    <td>
                                      ${{ $promocode->minimum_order_total}}
                                    </td>
                                    @else
                                    <td>$0</td>
                                    @endif

                                    <td>{{ $promocode->start_date}}</td>
                                    <td>{{ $promocode->expiry_date}}</td>
                                    <!-- <td>{{ $promocode->added_by}}</td> -->




			  <?php  $activ= $promocode->is_active;?>
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

		<?php if($promocode->is_active== 0){ ?>
		<li><a href="<?=base_path?>update_promocode_status/active/<?php echo base64_encode($promocode->id)?>">Active</a></li>
		<?php } else { ?>
		<li><a href="<?=base_path?>update_promocode_status/inactive/<?php echo base64_encode($promocode->id)?>">Inactive</a></li>
		<?php		}   ?>

    <li><a href="<?=base_path?>update_promocode_view/<?php echo base64_encode($promocode->id)?>">Edit</a></li>

		<li><a href="javascript:();" class="dCnf" mydata="<?php echo $a ?>">Delete Promocode</a></li>
	  </ul>
	</div>
</div>

<div style="display:none" id="cnfbox<?php echo $a ?>">
	<p> Are you sure delete this </p>
	<a href="<?=base_path?>deletePromocode/<?php echo base64_encode($promocode->id)?>" class="btn btn-danger" >Yes</a>
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
