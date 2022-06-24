@extends('admin.base_template')
@section('main')
<!-- Start content -->
<div class="content">
<div class="container-fluid">

<div class="row">
<div class="col-sm-12">
<div class="page-title-box">
  <h4 class="page-title">Update Sale</h4>
  <ol class="breadcrumb">
      <li class="breadcrumb-item"><a href="javascript:void(0);">CMS</a></li>
      <li class="breadcrumb-item"><a href="javascript:void(0);">Sale</a></li>
      <li class="breadcrumb-item active">Update Sale</li>
  </ol>

  <!-- <div class="state-information d-none d-sm-block">
      <div class="state-graph">
          <div id="header-chart-1"></div>
          <div class="info">Balance $ 2,317</div>
      </div>
      <div class="state-graph">
          <div id="header-chart-2"></div>
          <div class="info">Item Sold 1230</div>
      </div>
  </div> -->
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




  <?php
  if($sale_data != "" && $sale_data != null ){
    $sale_id= $sale_data->id;
    $sale= $sale_data->sale;
    $offer_type= $sale_data->offer_type;
    $percent= $sale_data->percent;
    // $type= $sale_data->type;
    // $minimum_amount= $sale_data->minimum_amount;
    // $maximum_gift_amount= $sale_data->maximum_gift_amount;
    $order_qualify_type= $sale_data->order_qualify_type;
    $quantity= $sale_data->quantity;
    $minimum_order_total= $sale_data->minimum_order_total;
    $start_date= $sale_data->start_date;
    $expiry_date= $sale_data->expiry_date;
    $terms_and_conditions= $sale_data->terms_and_conditions;
  }else{

    $sale_id= "";
    $sale= "";
    $offer_type= "";
    $percent= "";
    // $type= "";
    // $minimum_amount= "";
    // $maximum_gift_amount= "";
    $order_qualify_type= "";
    $quantity= "";
    $minimum_order_total= "";
    $start_date= "";
    $expiry_date= "";
    $terms_and_conditions= "";
  }

  ?>





          <h4 class="mt-0 header-title">Update Sale Form</h4>
          <hr style="margin-bottom: 50px;background-color: darkgrey;">
<form action="<?=base_path?>add_sale_process?id=<?php echo base64_encode($sale_id)?>" method="post" enctype="multipart/form-data">
@csrf
          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Name Your Sale &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-10">
                  <input class="form-control" type="text" value="<?php echo $sale; ?>" id="sale" name="sale" placeholder="Write Here Your Sale Name..." required>
										@error('sale')
										<div style= "color:red">{{$message}}</div>
										@enderror
              </div>
          </div>

          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Offer Type &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4">

                <select name="offer_type" id="offer_type" class="form-control" required >
                <option value="" disabled selected>Please Select Offer Type</option>
                <option value="1" <?php if($offer_type ==1){ echo "selected";} ?> >Percent Off</option>
                <option value="2" <?php if($offer_type ==2){ echo "selected";} ?> >Free Delivery</option>

                </select>
                @error('offer_type')
                <div style= "color:red">{{$message}}</div>
                @enderror

              </div>
        <label for="example-text-input" class="col-sm-2 col-form-label" id="percentlabal" style="display:none;">Percentage &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4" id="percentdiv"  style="display:none;">

                <input class="form-control" type="text" value="<?php echo $percent; ?>" id="percent" name="percent" placeholder="Add % Off">
                  @error('percent')
                  <div style= "color:red">{{$message}}</div>
                  @enderror

              </div>
          </div>


          <div class="form-group row">
              <label for="example-color-input" class="col-sm-2 col-form-label">Order Qualify Type &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4">


                <select name="order_qualify_type" class="form-control" required id="order_qualify_type">
                <option value="" disabled selected>Please Select Order Qualify Type</option>
                <option value="1" <?php if($order_qualify_type ==1){ echo "selected";} ?> >None</option>
                <option value="2" <?php if($order_qualify_type ==2){ echo "selected";} ?> >Quantity</option>
                <option value="3" <?php if($order_qualify_type ==3){ echo "selected";} ?> >Order Total</option>
                </select>
                @error('order_qualify_type')
                <div style= "color:red">{{$message}}</div>
                @enderror


              </div>
<label for="example-color-input" class="col-sm-2 col-form-label" id="labelName" style="display:none;">Quantity&nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4" id="qty" style="display:none;">


                <input class="form-control" type="text" value="<?php echo $quantity; ?>" id="quantity" name="quantity" placeholder="Add Quantity" >
                  @error('quantity')
                  <div style= "color:red">{{$message}}</div>
                  @enderror


              </div>
              <label for="example-color-input" class="col-sm-2 col-form-label" id="labelNameOrdr" style="display:none;">Order Total&nbsp;<span style="color:red;">*</span></label>
          <div class="col-sm-4 " id="ordr_ttl" style="display:none;">


                <input class="form-control" type="text" value="<?php echo $minimum_order_total; ?>" id="minimum_order_total" name="minimum_order_total" placeholder="Minimum Order Amount">
                  @error('minimum_order_total')
                  <div style= "color:red">{{$message}}</div>
                  @enderror


              </div>
          </div>

          <div class="form-group row">
              <label for="example-color-input" class="col-sm-2 col-form-label">Start Date &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4">
                  <input class="form-control" type="date" value="<?php echo $start_date; ?>" id="start_date" name="start_date" required>
                  @error('start_date')
									<div style= "color:red">{{$message}}</div>
									@enderror
              </div>
              <label for="example-color-input" class="col-sm-2 col-form-label">Expiry Date &nbsp;<span style="color:red;">*</span></label>
              <div class="col-sm-4">
                  <input class="form-control" type="date" value="<?php echo $expiry_date; ?>" id="expiry_date" name="expiry_date" required>
                  @error('expiry_date')
                  <div style= "color:red">{{$message}}</div>
                  @enderror
              </div>
          </div>


          <div class="form-group row">
              <label for="example-text-input" class="col-sm-2 col-form-label">Terms and Conditions &nbsp;(<span >Optional</span>)</label>
              <div class="col-sm-10">
                  <textarea class="form-control" type="text" value="<?php echo $terms_and_conditions; ?>" id="terms_and_conditions" name="terms_and_conditions"></textarea>
                    @error('terms_and_conditions')
                    <div style= "color:red">{{$message}}</div>
                    @enderror
              </div>
          </div>

<div class="form-group" style="padding: 0px 15px;margin-left: auto;">
                  <div>
                     <button type="submit"  class="btn btn-primary">Submit</button>

                  </div>
              </div>
</form>
      </div>
  </div>
</div> <!-- end col -->
</div> <!-- end row -->

</div>
<!-- end page content-->

</div> <!-- container-fluid -->

</div> <!-- content -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
$(document).ready(function(){




  // selected value input show
    var val1 = $('#order_qualify_type option:selected').val();
         // var val2 = $('#drop option:selected').val();
  if( val1 == 2){
    $("#labelNameOrdr").hide();
    $("#ordr_ttl").hide();
    $("#labelName").show();
    $("#qty").show();
  }
    else if ( val1 == 3){
      $("#labelName").hide();
      $("#qty").hide();
      $("#labelNameOrdr").show();
      $("#ordr_ttl").show();
    }
  else{
    $("#labelName").hide();
    $("#qty").hide();
    $("#labelNameOrdr").hide();
    $("#ordr_ttl").hide();
  }

  // end selected value input show


  // onchange dropdown based input show
    $('#order_qualify_type').on('change', function() {
      if ( this.value == '2')
      //.....................^.......
      {
        $("#labelNameOrdr").hide();
        $("#ordr_ttl").hide();
        $("#labelName").show();
        $("#qty").show();
      }
      else if ( this.value == '3')
      //.....................^.......
      {
        $("#labelName").hide();
        $("#qty").hide();
        $("#labelNameOrdr").show();
        $("#ordr_ttl").show();
      }
      else
      {
        $("#labelName").hide();
        $("#qty").hide();
        $("#labelNameOrdr").hide();
        $("#ordr_ttl").hide();
      }
    });
});
</script>
<script>
$(document).ready(function(){

  // selected value input show
    var val1 = $('#offer_type option:selected').val();
         // var val2 = $('#drop option:selected').val();
  if( val1 == 1){
    $("#percentlabal").show();
    $("#percentdiv").show();
  }else{
    $("#percentlabal").hide();
    $("#percentdiv").hide();
  }
  // end selected value input show


  // onchange dropdown based input show
    $('#offer_type').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {

        $("#percentlabal").show();
        $("#percentdiv").show();
      }

      else
      {
        $("#percentlabal").hide();
        $("#percentdiv").hide();

      }
    });
});
</script>
@endsection
