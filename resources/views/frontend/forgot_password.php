<style>
.btn-style{
background-color: rgb(46 62 78);
height: 50px;
padding: 0px 20px;
font-size: 0.8rem;
text-transform: uppercase;
border: 1px solid #2e3e4e;
outline: 0px;
color: #c5a981 !important;
width: 30%;
}
</style>
<div class="paddingfromtop">
		<main class="main">
			<br>
			<div class="container ">
				<div class="col-md-7">
				<div class="heading mb-4">
					<h2>Reset Password</h2>
					<p>Please enter your email address below to receive a password reset link.</p>
				</div>
  <? if(!empty($this->session->flashdata('smessage'))){ ?>
        <div class="alert alert-success alert-dismissible">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    <h4><i class="icon fa fa-check"></i> Alert!</h4>
  <? echo $this->session->flashdata('smessage'); ?>
  </div>
    <? }
     if(!empty($this->session->flashdata('emessage'))){ ?>
     <div class="alert alert-danger alert-dismissible">
  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
  <h4><i class="icon fa fa-ban"></i> Alert!</h4>
<? echo $this->session->flashdata('emessage'); ?>
</div>
  <? } ?>
				<form action="<?=base_url()?>Home/form_submit_forgotpassword" method="post">
					<div class="form-group required-field">
						<label for="reset-email">Email</label>
						<input type="email" class="form-control" id="reset_email" name="reset_email" required>
					</div><!-- End .form-group -->

					<div class="form-footer">
						<button type="submit" class="btn btn-style">Reset My Password</button>
					</div><!-- End .form-footer -->

				</form>
			</div>
			</div><!-- End .container -->

			<div class="mb-10"></div><!-- margin -->
		</main><!-- End .main -->
</div>
