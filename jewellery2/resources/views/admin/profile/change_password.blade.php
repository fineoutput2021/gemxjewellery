@extends('admin.base_template')
@section('main')

<style>
.font .row{
  border-top: 1px solid lightgrey;
  padding-top: 0.5rem;
padding-bottom: 0.5rem;
}

.font .col-4 p{
  font-weight: bold;
  color: #000;
}


.font button{
  border:none;
  background: lightgrey;
  color: black;
  padding: 10px;
  outline: 0!important;
  margin-bottom: 0.75rem;
  margin-top: 20px;
margin-left: 710px;
}

</style>
<section >


  <div class="container-fluid" style="    position: relative;
    top:30px;padding: 4rem;
    margin-bottom:3rem;">
    <div class="row">
      <div class="row" style="
      background: #bfbfbf;
width: 100%;
padding: 0;
margin: 0;
height: 44px;
align-items: center;
border-top-left-radius: 5px;
border-top-right-radius: 5px;
color: black; ">





        <div class="col-12">
          <p class="mb-0"><span><i class="fa fa-key" aria-hidden="true"></i></span>&nbsp;&nbsp;Change Password</p>
        </div>
      </div>
      <div class="container font p-5" style="    background: #fff;
    border: 1px solid lightgrey;
    border-radius: 5px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;">


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



<form action="<?=base_path?>admin_change_password" method="post">
@csrf
        <div class="row" style="border-top:none;">
          <div class="col-4"><p>Old Password<span style="color:red;">*</span></p></div>
          <div class="col-6">
            <p>
<input type="password" name="old" value="" id="old" class="form-control" placeholder="Old Password" required/>
            </p>
          </div>
        </div>

        <div class="row" style="border-top:none;">
          <div class="col-4"><p>New Password<span style="color:red;">*</span></p></div>
          <div class="col-6">
          <p>
            <input type="password" name="new" value="" id="new" class="form-control" placeholder="New Password" required/>
          </p>
        </div>
        </div>

        <div class="row" style="border-top:none;" >
          <div class="col-4"><p>Confirm Password<span style="color:red;">*</span></p></div>
          <div class="col-6">
            <p>
              <input type="password" name="confirm" value="" id="confirm" class="form-control" placeholder="Confirm Password" required/>
            </p>
          </div>
        </div>


        <div class="row" >
          <div class="col-12">
          <button type="submit">Submit Password</button>
        </div>
        </div>


</form>
      </div>
    </div>
  </div>
</section>
@endsection
