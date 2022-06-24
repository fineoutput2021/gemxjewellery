@extends('frontend.layout')
@section('main')


 <style>
 	.add_address_form label{
 		display: block;
 		margin-top:1.05rem;

 	}

 	.add_address_form input,select{
 		width: 100%;
 		height: 40px;
 		border:1px solid lightgrey;

 	}

 	.save_btn{
 	border: none;
    background: #210113;
    color: #fff;
    padding: 10px 15px;
 	}


 	.back_btn{
 	border: none;
    background: grey;
    color: #fff;
    padding: 10px 15px;
 	}
 </style>


<div class="paddingfromtop">
<div class="container pt-5 pb-5">
	<form class="add_address_form" action="<?=base_path?>add_address_process" method="post">
    @csrf
	<div class="row pt-5 pb-5">
		<div class="col-sm-12 col-md-12 col-lg-12">
			<h3 class="pb-3 text-center">ADD NEW ADDRESS</h3>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<!-- <h4 class="pb-3">Contact Information</h4> -->
			<label>Customer Name</label>
			<input type="text" name="customer_name" class="form-control" required>
      <label>Customer Email </label>
      <input type="email" name="customer_email"  class="form-control" required>
			<label>Customer Number </label>
			<input type="text" name="customer_number" class="form-control" onkeypress="return isNumberKey(event)" pattern="^[0-9]+$" minlength="10" maxlength="10" required>
		</div>
		<div class="col-sm-12 col-md-6 col-lg-6">
			<!-- <h4 class="pb-3">Address</h4> -->

			<label> Address</label>
			<!-- <input type="text" name=""> -->
      <textarea type="text" name="address" class="form-control" id="exampleFormControlTextarea1" rows="3" required></textarea>
      <label>Doorflat</label>
      <input type="text" name="doorflat" class="form-control">

      <label>Landmark</label>
      <input type="text" name="landmark" class="form-control">

      <label>Zip/Postal Code</label>
      <input type="text" name="zipcode" pattern="^[0-9]+$" onkeypress="return isNumberKey(event)" minlength="6" maxlength="6" class="form-control" required>

      <label>Country</label>
			<select name="country" class="form-control" required style="font-size:15px;">
<script>
function isNumberKey(evt){
	    var charCode = (evt.which) ? evt.which : evt.keyCode
	    if (charCode > 31 && (charCode < 48 || charCode > 57))
	        return false;
	    return true;
	}
</script>
  <?php
$country_list= App\frontendmodel\Country::get();

if(!empty($country_list)){
  foreach($country_list as $country){
  ?>
				<option value="<?=$country->country_name?>"><?=$country->country_name?></option>
				<!-- <option>india</option> -->
  <?php } }?>
			</select>

		</div>
		<div class="d-flex">
			<button class="mr-4 save_btn" type="submit" >Save Address</button>
			<!-- <a href="<?=base_path?>checkout"><button class="back_btn">Go Back</button></a> -->
		</div>
	</div>
	</form>

</div>
</div>
@endsection
