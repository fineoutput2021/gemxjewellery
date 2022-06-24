@extends('frontend.layout')
@section('main')


<style>
/*register div css start*/
.login_div {
    padding: 60px 0;
}

.login_div label {
    display: block;
    margin-bottom: .5rem;
}
 .login_div input{
    margin-bottom: .5rem;
    width: 100%;
    min-height: 40px;
    padding-left: 10px;
    margin-top: 10px;
    max-width: 300px;
    display: block;
    color: #666;
    border: none;
    -webkit-border-radius: 3px;
  border-radius: 0px;
    padding: 3px 17px;
    outline: 0 !important;
    height: 100%;
 }

 .login_div h4{
    font-size: 22px !important;
    font-family: Lato;
    font-weight: 400;
    color: rgb(68,68,68);
 }

 .login_div label{
    font-size: 14px !important;
    color: #676c77;
    letter-spacing: 1px;
 }

 .login_div button{
    background:#1f0b00;
    color: white;
    border: none;
    outline: 0 !important;
    height: 44px;
    max-width: 148px;
    width: 100%;
    margin-top: 0.75rem;
    /* border-radius: 29px; */
 }

 .login_div button:hover{
    background-color: #210113;
 }

 .login_div .re input{
    width: auto;
    margin: 0;
 }
 .login_div .re label{

    margin-bottom: 0;
    line-height: 3;
    margin-left: 5px;

 }

 .login_row{
   border: 1px solid #f5f0ec;
padding: 30px;
/* box-shadow: -1px 0px 5px 0px #210113; */
border-radius: 12px;
background: rgb(245 240 236);
 }

 /* .login_row:hover{

       box-shadow: -1px 0px 5px 0px #ffa4a8;
 } */
 .login_row a{
    color: #b28a5e;
 }



/*register div css end*/

</style>

<!-- register div start -->

<div class="paddingfromtop">
<section>
	<div class="container login_div">
		<div class="row login_row">
			<div class="col-sm-12 col-md-6 col-lg-6">
				<form action="<?=base_path?>login_process"  method="post">
          @csrf
					<h4>Login</h4>
				<label>Username or email address *</label>
        <input type="email" placeholder="Email" name="email" id="email" required/>


				<label>Password *</label>
				<input type="password" placeholder="Password" name="password" id="password" required/>

				<button type="submit" >LOGIN</button>

				<div class="d-flex re">

					<!-- <input type="checkbox" name="">
					<label>Remember me</label> -->

				</div>

				<p><a href="<?=base_path?>/forgot_password">Forgot your password?</a></p>
				</form>
			</div>
			<div class="col-sm-12 col-md-6 col-lg-6">
				<form action="<?=base_path?>register_process" method="post">
          @csrf
					<h4>Register</h4>

          <label>Name *</label>
          <input type="text" placeholder="Name" name="name" id="name" required />

          <label>Contact Number *</label>
  				<input type="text" maxlength="10" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" placeholder="Contact Number" name="contact" id="contact" />

				<label>Username or email address *</label>
				<input type="email" placeholder="Email" name="email" id="email" required/>

				<label>Password *</label>
				<input type="password" placeholder="Password" name="password" id="password" required/>

				<button type="submit">SIGN UP</button>
				</form>
			</div>
		</div>
	</div>
</section>
</div>
<!-- register div end -->

@endsection
