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
    color: rgb(255, 255, 255) !important;
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
<section class="login-area ptb-100">
<div class="container">
<div class="row mt-5">
<div class="col-md-3"></div>
<div class="col-lg-6 col-md-6">
<div class="login-content">
<h2>Reset Password</h2>
<form class="login-form" action="<?=base_path?>update_password/<?=$auth?>" method="post" enctype="multipart/form-data">
  <input type="hidden" name="local" class="form-control" value="" >
<div class="form-group">
<input type="password" class="form-control" name="reset_password" placeholder="New Password" required>
</div>
<button type="submit" class="btn-style">Submit</button>
</form>
</div>
</div>
<div class="col-md-3"></div>
</div>
</div>
</section>
</div>
  @endsection
