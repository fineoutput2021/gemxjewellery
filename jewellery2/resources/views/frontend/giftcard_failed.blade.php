@extends('frontend.layout')
@section('main')

<!-- show success and error messages -->

@if (session('status'))
  <div class="alert alert-success" role="alert" >
    {{ session('status') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </div>
@endif
@if (session('status-error'))
  <div class="alert alert-danger" role="alert" >
    {{ session('status-error') }}
     <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
  </div>
@endif
<!-- End show success and error messages -->
<div class="paddingfromtop">
  <section class="section-b-space"style="background-image:linear-gradient(45deg, #ff807342, #ce318f00);height:90vh;justify-content:center; align-items:center;display:flex;">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="success-text" style="line-height:60px;text-align:center;font-family: Lato, sans-serif;"><i class="fa fa-times" aria-hidden="true" style="font-size: 50px;color: red;"></i>
                        <h2 style="text-transform:uppercase;">Sorry</h2>
                        <p style="font-size: 18px;  text-transform: capitalize;color:red!important;">Order Failed</p>

                        <a href="<?=base_path?>">  <button type="button" class="btn btn-solid" style="background: #52c1b7;">Back Home</button></a>



                    </div>
                </div>
            </div>
        </div>
    </section>
</div>



@endsection
