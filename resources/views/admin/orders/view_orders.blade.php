@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
    <div class="col-sm-12">
        <div class="page-title-box">
            <h4 class="page-title"><?= $page_title?> </h4>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
                <li class="breadcrumb-item"><a href="javascript:void(0);">Orders</a></li>
                <li class="breadcrumb-item active"><?= $page_title?></li>
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
<div class="col-md-10"><h4 class="mt-0 header-title"><?= $page_title?> List</h4></div>
<!-- <div class="col-md-2">  <a class="btn btn-info cticket" href="/add_catelogue_view" role="button" style="margin-left: 20px;"> Add Wholesale Inquiry</a></div> -->
</div>
                    <hr style="margin-bottom: 50px;background-color: darkgrey;">
                    <div class="table-rep-plugin">
                        <div class="table-responsive b-0" data-pattern="priority-columns">
                              <table id="datatable-buttons" class="table  table-striped">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Order ID</th>
                                    <th>User</th>
                                    <th>Promocode</th>
                                    <th>Total Amount</th>
                                    <!-- <th>promocode</th> -->
                                    <th>Address</th>
                                    <th>User Mob.</th>
                                    <th>Country</th>
                                    <!-- <th>State</th> -->
                                    <th>Zipcode</th>
                                    <th>Payment Type</th>
                                    <th>Payment Status</th>
                                    <!-- <th>Expected Delivery Date</th> -->
                                    <!-- <th>Slot Time</th> -->
                                    <th>Order Status</th>
                                    <th>Order Track Id</th>
                                    <!-- <th>Delivery Status</th> -->
                                    <th>Shipping</th>
                                    <th>Shipping Charge</th>
                                    <!-- <th>Last Update Date</th> -->
                                    <th>Order Date</th>
                                    <!-- <th>Order Products</th> -->

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
@if(!empty($orders_data))
<?php $i=0; ?>
@foreach($orders_data as $order)
<?php $i++;?>
<tr>
                                    <th>{{$i}}</th>
                                    <th>{{$order->id}}</th>
                                    <td>
<?php
$user= App\frontendmodel\User::wherenull('deleted_at')->where('id',$order->user_id)->first();
if(!empty($user)){
  echo $user->name;
  $user_mob=  $user->contact;
}else{
  echo "no contact found";
  $user_mob="";
}

// $user= App\frontendmodel\User::wherenull('deleted_at')->where('id',$order->user_id)->first();
// if(!empty($user)){
//   echo $user->name;
// }else{
//   echo "no user found";
// }

?>

                                    </td>
                                    <td>{{ $order->promocode}}</td>
                                    <td>${{ $order->total_amount}}</td>
                                    <td>
<?php
$user_address= App\frontendmodel\Address::wherenull('deleted_at')->where('id',$order->address_id)->first();
if(!empty($user_address)){

    $addr_zipcode = $user_address->zipcode;
    $country = $user_address->country;
    $location_addr = $user_address->location_address;
    if(!empty($location_addr)){
    echo $location_addr;
    }else{
      echo $user_address->address;

    }

}else{
  echo "no address found";
  $addr_zipcode="";
  $country="";
}
?>



                                    </td>

                                    <td><?=$user_mob;?></td>




                                    <td>
                              <?=$country;?>
                                      </td>


                                    <td><?=$addr_zipcode;?></td>

                                    <td>
                                      <?php
                                      if($order->payment_type == 1){
                                        echo "Cash On Delivery";
                                      }else{
                                        echo "Online Payment";
                                      }

                                    ?>
                                  </td>

                                  <td>
                                    <?php
                                    if($order->payment_status == 1){
                                      echo "Succeed";
                                    }else{
                                      echo "Pending";
                                    }

                                  ?>
                                </td>


                                <td><?php
                             if($order->order_status == 1){
                               ?><span class="label label-primary" style="font-size:13px;color:blue;font-weight: 700;">New Order</span><?php
                             }
                             if($order->order_status == 2){
                               ?><span class="label label-success" style="font-size:13px;color:#6f5499;font-weight: 700;">Accepted</span><?php
                             }
                             if($order->order_status == 3){
                               ?>
                               <span class="label label-info" style="font-size:13px;color:orange;font-weight: 700;">Dispatched</span>
                               <?php
                             }
                             if($order->order_status == 4){
                               ?><span class="label label-success" style="font-size:13px;color:green;font-weight: 700;">Delivered</span><?php
                             }
                             if($order->order_status == 5){
                               ?><span class="label label-danger" style="font-size:13px;color:red;font-weight: 700;">Rejected</span><?php
                             }
                                  ?></td>

                                  <td>

                          <?php
                          if(!empty($order->track_id)){
                            echo $track_id = $order->track_id;
                          }else{
                            echo $track_id = "No TrackId";
                          }

                          ?>
                        </td>

                          <td><?if($order->shipping==1){
                            echo "Standard Shipping";
                          }else if($order->shipping==2){
                            echo "Express Shipping";
                          }else{
                            echo "NA";
                          }?></td>
                          <td><?="$".$order->delivery_charge;?></td>

                          <td>

                            <?php
                              $newdate = new DateTime($order->created_at);
                              echo $newdate->format('j F, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
                            ?>
                          </td>

        <td>

        <div class="btn-group" id="btns<?php echo $i ?>">
        	<div class="btn-group">
        		<button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
        	  <ul class="dropdown-menu" role="menu">

              <?php if($order->order_status == 1){ ?>
                  <li><a href="<?=base_path?>updateordersStatus/<?php echo
                  base64_encode($order->id) ?>/<?= base64_encode(2) ?>">Accept</a></li>
                  <li><a  href="javascript:;" class="dCnf" mydata="<?php echo $i ?>">Reject</a></li>
                <?php } ?>

                <?php if($order->track_id == null && $order->track_id == ""){ ?>

            <!-- <li><a href="<?=base_path?>add_order_track_view/<?php //echo base64_encode($order->id) ?>">Add Track Id</a></li> -->


                <?php } ?>

                <?php if($order->order_status == 2){ ?>

                          <li><a href="<?=base_path?>updateordersStatus/<?php echo
                          base64_encode($order->id) ?>/<?= base64_encode(3) ?>">Dispatch Order</a></li>


                        <?php } ?>




                <?php if($order->order_status == 3){ ?>

                  <li><a href="<?=base_path?>updateordersStatus/<?php echo
                  base64_encode($order->id) ?>/<?= base64_encode(4) ?>">Deliver Order</a></li>
                  <li><a href="<?=base_path?>order_bill/<?php echo
                  base64_encode($order->id) ?>">View bill</a></li>
                <?php }else if($order->order_status == 4){ ?>
                        <li><a href="<?=base_path?>view_ordered_product_details/<?php echo base64_encode($order->id)?>">View Products</a></li
                  <li><a href="<?=base_path?>order_bill/<?php echo
                  base64_encode($order->id) ?>">View bill</a></li>
<?}?>
            <li><a href="<?=base_path?>view_ordered_product_details/<?php echo base64_encode($order->id)?>">View Products</a></li>
            <!-- <li><a href="<?=base_path?>order_bill/<?php //echo base64_encode($order->id)?>">View Bill</a></li> -->



        	  </ul>
        	</div>
        </div>

        <div style="display:none" id="cnfbox<?php echo $i ?>">
        	<p> Are you sure reject this </p>
        	<a href="<?=base_path?>updateordersStatus/<?php echo
          base64_encode($order->id) ?>/<?= base64_encode(5) ?>" class="btn btn-danger" >Yes</a>
        	<a href="javascript:();" class="cans btn btn-default" mydatas="<?php echo $i ?>" >No</a>
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
