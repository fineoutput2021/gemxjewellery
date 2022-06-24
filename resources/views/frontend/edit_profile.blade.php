@extends('frontend.layout')
@section('main')

<style>
.my_ac_cla{
	border: 1px solid #f5f0ec;
	padding: 30px;
	border-radius: 12px;
	background: rgb(245 240 236);
}

@media(min-width:312px) and (max-width:900px){
	.my_ac_cla{
		padding: 15px !important;
		box-shadow: none !important;
	}
}

</style>
<div class="paddingfromtop">
<section class="form_my_ac p-5">
	<div class="container my_ac_cla">
		<div class="row">
			<div class="col-lg-12">
				<h2 class="mr-5 mb-5 mt-5" style="font-size: 20px;text-transform: uppercase;">EDIT ACCOUNT INFORMATION</h2>
			</div>
			<div class="col-6 pb-3" style="border-bottom: 1px solid lightgrey;">
				<strong class="pb-5" style="font-size: 18px;">Account Information</strong>
			</div>
			<div class="col-12">
				<div class="row">
					<div class="col-lg-6">
						<form class="mt-3" action="<?=base_path?>edit_user_profile_process" method="post">
              @csrf

							<label class="d-block">Name</label>
							<input style="    margin-bottom: .5rem;
    width: 100%;
    min-height: 40px;
    padding-left: 10px;
    margin-top: 10px;

    display: block;
    color: #666;
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    padding: 3px 17px;
    outline: 0 !important;
    height: 100%;" type="text" name="name" placeholder="Name" value="<?php if(!empty($userData)){ echo $userData->name; }?>">

							<label class="d-block">Email</label>
							<input style=" margin-bottom: .5rem;
    width: 100%;
    min-height: 40px;
    padding-left: 10px;
    margin-top: 10px;

    display: block;
    color: #666;
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    padding: 3px 17px;
    outline: 0 !important;
    height: 100%;" class="d-block" type="email" name="email" placeholder="Email" value="<?php if(!empty($userData)){ echo $userData->email; }?>">

              <label class="d-block">Phone</label>
              <input style=" margin-bottom: .5rem;
    width: 100%;
    min-height: 40px;
    padding-left: 10px;
    margin-top: 10px;

    display: block;
    color: #666;
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    padding: 3px 17px;
    outline: 0 !important;
    height: 100%;" class="d-block" type="number" name="phone" placeholder="Phone Number" value="<?php if(!empty($userData)){ echo $userData->contact; }?>">

              <label class="d-block">Password</label>
              <input style=" margin-bottom: .5rem;
    width: 100%;
    min-height: 40px;
    padding-left: 10px;
    margin-top: 10px;

    display: block;
    color: #666;
    border: 1px solid #ccc;
    -webkit-border-radius: 3px;
    border-radius: 3px;
    padding: 3px 17px;
    outline: 0 !important;
    height: 100%;" class="d-block" type="password" name="password" placeholder="Password" value="">



							<!-- <div class="mb-3">
								<input type="checkbox" name="">
							<label> Change Password</label>
							</div> -->

							<button type="submit" class="mr-5 mt-4" style="    background: #040100;
    color: #fff;
    height: 40px;
    width: 30%;
    border: 0;
    outline: 0 !important;"> save</button>

              <a href="<?=base_path?>user_profile"  style="font-size:13px;">
							<button class="mt-4" style="background:#fff;border:2px solid #040100; color:#040100;height:40px;width:30%;">Go Back</button>
            </a>

						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
</div>

@endsection
