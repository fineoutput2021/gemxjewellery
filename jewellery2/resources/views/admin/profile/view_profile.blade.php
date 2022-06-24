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
          <p class="mb-0"><span><i class="fa fa-user-circle" ></i></span>&nbsp;&nbsp;Profile</p>
        </div>
      </div>
      <div class="container font p-5" style="    background: #fff;
    border: 1px solid lightgrey;
    border-radius: 5px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;">

        <div class="row">
          <div class="col-4"><p>Name</p></div>
          <div class="col-6">
          <p>
            <?php if(!empty($profile_data)){
              echo $profile_data->name;
            }?>
          </p>
        </div>
        </div>

        <div class="row">
          <div class="col-4"><p>Email</p></div>
          <div class="col-6">
            <p>
              <?php if(!empty($profile_data)){
                echo $profile_data->email;
              }?>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-4"><p>Phone</p></div>
          <div class="col-6">
            <p>
              <?php if(!empty($profile_data)){
                echo $profile_data->phone;
              }?>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-4"><p>Address</p></div>
          <div class="col-6">
            <p>
              <?php if(!empty($profile_data)){
                echo $profile_data->address;
              }?>
            </p>
          </div>
        </div>

        <div class="row">
          <div class="col-4"><p>Password </p></div>
          <div class="col-6">
            <a href="<?=base_path?>admin_change_pass_view"><button>Change Password</button>
            </a>
          </div>
        </div>


        <div class="row">
          <div class="col-4"><p>Power</p></div>
          <div class="col-6">
            <p>
              <?php if(!empty($profile_data)){
                echo $profile_data->power;
              }?>
            </p>
          </div>
        </div>

        <!-- <div class="row">
          <div class="col-4"><p>Services</p></div>
          <div class="col-6">
            <p>
              <?php if(!empty($profile_data)){
                echo $profile_data->email;
              }?>
            </p>
          </div>
        </div> -->


        <div class="row" style="border-bottom:1px solid lightgrey;" >
          <div class="col-4"><p>Image</p></div>
          <div class="col-6">
            <p>
              <?php if(!empty($profile_data->image)){?>
              <img style="width: 110px;" src="<?=base_path.$profile_data->image?>">
            <?php } else { echo "Sorry No Image."; }?>

            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>
@endsection
