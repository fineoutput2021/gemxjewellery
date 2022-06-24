<?use App\adminmodel\PackageItem;?>
@extends('frontend.layout')
@section('main')
<style>
	.my_ac_cla {
		border: 1px solid #f5f0ec;
		padding: 30px;
		border-radius: 12px;
		background: rgb(245 240 236);
	}

	@media(min-width:312px) and (max-width:900px) {
		.my_ac_cla {
			padding: 15px !important;
			box-shadow: none !important;
		}
	}

	.edit_btn {
		position: relative;
		outline: none;
		cursor: pointer;
		user-select: none;
		-webkit-tap-highlight-color: transparent;
		border-radius: 0;
		box-sizing: border-box;
		font-family: inherit;
		color: rgb(255, 255, 255);
		background: #1f0b00;
		border: none;
		display: flex;
		-webkit-box-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		align-items: center;
		width: 16%;
		height: 35px;
		font-size: larger;
	}
	.upgrade_btn {
		position: relative;
		outline: none;
		cursor: pointer;
		user-select: none;
		-webkit-tap-highlight-color: transparent;
		border-radius: 0;
		box-sizing: border-box;
		font-family: inherit;
		color: rgb(255, 255, 255);
		background: #1f0b00;
		border: none;
		display: flex;
		-webkit-box-pack: center;
		justify-content: center;
		-webkit-box-align: center;
		align-items: center;
		width: 30%;
		height: 35px;
		font-size: larger;
	}
</style>

<div class="paddingfromtop">
	<section class="mb-5  mt-5">
		<div class="container my_ac_cla">
			<div class="row">
				<div class="col-lg-6 col-md-6">
					<h2 class="mr-5 mb-5 mt-5" style="font-size: 20px;text-transform: uppercase;">MY ACCOUNT</h2>
				</div>
				<div class="col-lg-6 col-md-6">
					<h2 class="mr-5 mb-5 mt-5" style="font-size: 20px;text-transform: uppercase;">MY Package</h2>
				</div>
				<div class="col-6 pb-3" style="border-bottom: 1px solid lightgrey;">
					<strong class="pb-5" style="font-size: 18px;">Account Information</strong>
				</div>
				<div class="col-6 pb-3" style="border-bottom: 1px solid lightgrey;">
					<strong class="pb-5" style="font-size: 18px;">Package Information</strong>
				</div>
				<div class="col-lg-6  col-md-6 pt-3">
					<p>CONTACT INFORMATION</p>
					<p style="font-size: 14px;">
						NAME:- <?php if (!empty($userData)) {
    echo $userData->name;
} ?>
					</p>
					<p style="font-size: 14px;">
						EMAIL:- <?php if (!empty($userData)) {
    echo $userData->email;
} ?>
					</p>
					<p style="font-size: 14px;">
						PHONE NO.:- <?php if (!empty($userData)) {
    echo $userData->contact;
} ?>
					</p>

					<span>
						<a href="<?=base_path?>edit_user_profile">
							<span style="color: #1f0b00 !important;"><button class="edit_btn">Edit</button></span>
						</a>
						<!-- <a href="#">Change Password</a> -->
					</span>
				</div>

				<?if(!empty($userData->package)){
	$package_da = PackageItem::wherenull('deleted_at')->where('id', $userData->package)->first();
	?>
				<div class="col-lg-6 pt-3 ">
					<p><b>Name:</b> <?=$package_da->name?></p>
					<p><b>Price:</b> $<?=$package_da->buy_price?></p>
					<p><b>Discount:</b> $<?=$package_da->price?> % off on every product.</p>
					<p><b>Expiry:</b> <?=$userData->expiry_date?></p>
          <a href="<?=base_path?>Packages">
            <span style="color: #1f0b00 !important;"><button class="upgrade_btn" >Upgrade Package</button></span>
          </a>
				</div>
				<?}else{?>
				<p style="font-size: 14px;">You aren't purchased to any package.</p>
				<a href="<?=base_path?>Packages">
					<span style="color: #1f0b00 !important;">Buy Package</span>
				</a>
				<?}?>
			</div>
		</div>
	</section>
</div>

@endsection
