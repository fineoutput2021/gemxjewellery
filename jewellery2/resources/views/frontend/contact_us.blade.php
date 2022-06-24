@extends('frontend.layout')
@section('main')
<style>
.title-2 {
    color: rgb(241, 93, 71);
    font-size: 18px;
    border-bottom: 1px solid rgb(240, 240, 240);
    text-align: left;
    text-transform: uppercase;
    margin-top: 0px;
    padding: 20px 0px;
    letter-spacing: 3px;
}
        .red{
            color: #f15d47;
        }
        .address {
    display: flex;
    justify-content: center;
        }
        .btlu{
            color: #4476b2;
                font-size: 14px;
        }
        .form-submit.mt-5 {
    text-align: center;
    /* background: #ff6c6c; */
}
.border_jewel{
  box-shadow: -1px 0px 5px 0px #1f0b00 ;
border-radius: 9px;
}


.border_jewel input[type=text]{
  height:34px !important;
  border: 1px solid #ccc !important;
}

.border_jewel input{
  box-shadow: none !important;
  outline: 0 !important;
  border-radius: 0 !important;
}
.border_jewel textarea{
  box-shadow: none !important;
  outline: 0 !important;
    border-radius: 0 !important;
}

.border_jewel input:focus{
  border: 1px solid #ccc !important;
}
.border_jewel textarea:focus{
  border: 1px solid #ccc !important;
}

</style>
<div class="paddingfromtop">
<section style="margin:6rem 0 10rem 0; ">
<center class="mb-5"><h3 style="color:#1f0b00 !important;">Contact Us</h3></center>

<div class="container">
  <!-- show success and error messages -->
  <!-- @if (session('status'))
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
  @endif -->
  <!-- End show success and error messages -->
         <div class="row">
             <div class="col-md-6 border_jewel " style="padding: 28px !important;">
                 <h6 class="title-2" style="color:#1f0b00 !important;font-weight: 700 !important;">CONTACT US</h6>
                 <p class="red" style="color:#1f0b00 !important">Customer Delight</p>
                 <p>Call us at 1800-419-0066 (9 am-10 pm, 7 days a week)</p>
                 <p>or</p>
                 <p>Write to us at <a href="#">Gemxjewelley.com</a></p><br>
                 <!-- <p>Email : yugal5939@gmail.com<br>
                    Phone : +91-8078675149
                  </p> -->

                 <p class="red" style="color:#1f0b00 !important;">Address Information</p>
                 <p>For all corporate sales related queries please write to us at <a href="#">Gemxjewelley.com</a></p>
                 <p>For bulk enquiries or sales associations please contact <a href="#">Gemxjewelley.com</a></p>
                 <div class="address">
                     <div class="address1">
                       <h6 class="btlu" style="color:#1f0b00 !important;"><i class="fa fa-map-marker" style="color:#1f0b00 !important;"></i> Jaipur</h6>
                       <p>Pretty in Gems Jewellery Pvt. Ltd.
                         302, Dhantak Plaza, Ajmer Road,
                         Jaipur-59
                         Rajasthan, India
                       </p>
                         <!-- <h6 class="btlu"><i class="fa fa-map-marker"></i> Mumbai</h6>
                         <p>BlueStone Jewellery and Lifestyle Pvt. Ltd.
                           302, Dhantak Plaza, Makwana Road,
                           Marol, Andheri (East)
                           Mumbai-59
                           Maharashtra, India
                           </p> -->
                     </div>
                     <!-- <div class="address2">
                         <h6 class="btlu"><i class="fa fa-map-marker"></i> Mumbai</h6>
                         <p>BlueStone Jewellery and Lifestyle Pvt. Ltd.
                           302, Dhantak Plaza, Makwana Road,
                           Marol, Andheri (East)
                           Mumbai-59
                           Maharashtra, India
                           </p>
                   </div> -->
                 </div>
             </div>
             <!-- <div class="col-md-1"></div> -->
               <div class="col-md-5 wow animated fadeInRight border_jewel border_jewel545 " data-wow-delay=".2s" style="margin-left:80px;padding: 28px !important;">
                   <h1 class="title-2" style="color:#1f0b00 !important;font-weight: 700 !important;">Have a Question ?</h1>

               <form class="shake" role="form" action="<?=base_path?>add_contact_process" method="post" id="contactForm" name="contact-form" enctype="multipart/form-data">
                 @csrf

                     <!-- Name -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="name">Name</label>
                      <input class="form-control" id="name" type="text" name="name" required placeholder="Write your name...">
                      <div class="help-block with-errors"></div>
                    </div>
                    <!-- email -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="email">Email</label>
                      <input class="form-control" id="email" type="email" name="email" required placeholder="Write your Email..." style="font-size: 15px;padding: 0 20px;">
                      <div class="help-block with-errors"></div>
                    </div>
                    <!-- Contact Number -->
                    <div class="form-group label-floating">
                      <label class="control-label" for="number">Contact Number</label>
                      <input class="form-control" id="number" type="number" name="contact_number" required placeholder="Write your contact number..." style="font-size: 15px;padding: 0 20px;">
                      <div class="help-block with-errors"></div>
                    </div>
                    <!-- Subject -->
                    <div class="form-group label-floating">
                      <label class="control-label">Subject</label>
                      <input class="form-control" id="msg_subject" type="text" name="subject" required placeholder="Write your message subject...">
                      <div class="help-block with-errors"></div>
                    </div>
                    <!-- Message -->
                    <div class="form-group label-floating">
                        <label for="message" class="control-label">Message</label>
                        <textarea class="form-control" rows="3" id="message" name="message" required placeholder="Write your message..." style="font-size: 15px;padding: 0 20px;"></textarea>
                        <div class="help-block with-errors"></div>
                    </div>

                       <!-- Form Submit -->
                       <div class="form-submit mt-5">
                           <button class="btn btn-common w-100" type="submit" id="form-submit" style="background:#1f0b00 !important;color:white !important;border:none;"><i class="material-icons mdi mdi-message-outline"></i> Send Message</button>
                           <div id="msgSubmit" class="h3 text-center hidden"></div>
                           <div class="clearfix"></div>
                       </div>
                   </form>
               </div>
         </div>
     </div>

</section>
</div>
@endsection
