@extends('frontend.layout')
@section('main')
<style>
.btn-style{
  display: inline-block;
  margin: 0px;
  padding: 0;
  outline: 0px;
  cursor: pointer;
  text-decoration: none;
  color: rgb(255, 255, 255);
  background: #1f0b00 !important;
  border: none;
  -webkit-font-smoothing: antialiased;
  text-align: center;
  transition: background-color 0.3s ease 0s, color 0.3s ease 0s;
  white-space: nowrap;
  height: 44px;
  width: 100%;
}
</style>
<div class="paddingfromtop">
		<main class="main">
			<br>
			<div class="container ">
        <div class="col-md-3"></div>
				<div class="col-md-6">
				<div class="heading mb-4">
					<h2>Reset Password</h2>
					<p>Please enter your email address below to receive a password reset link.</p>
				</div>
				<form action="<?=base_path?>form_submit_forgotpassword" method="post" enctype="multipart/form-data">
            @csrf
					<div class="form-group required-field">
						<label for="reset-email">Email</label>
						<input type="email" class="form-control" id="reset_email" name="reset_email" required>
					</div><!-- End .form-group -->

					<div class="form-footer">
						<button type="submit" class=" btn-style">Reset My Password</button>
					</div><!-- End .form-footer -->

				</form>
			</div>
      <div class="col-md-3"></div>
			</div><!-- End .container -->

			<div class="mb-10"></div><!-- margin -->
		</main><!-- End .main -->
  </div>
    @endsection
