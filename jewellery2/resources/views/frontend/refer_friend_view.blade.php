@extends('frontend.layout')
@section('main')

<style>
    .gift_new{
      border: 1px solid #ccc;
    }
    .gift_new button{
      width: 100%;
     background-color: #f9999e;
    border-color: #f9999e;
    }
    .gift_new .btn{
      border: 2px solid;
    color: #fff;
    cursor: pointer;
    font-size: 16px;
    line-height: 19px;
    margin-bottom: 10px;
    padding: 14px 25px;
    text-align: center;
    text-decoration: none;
    display: block;
    transition: background-color 0.25s, border-color 0.25s;
    }
    .gift_new .btn i {
          padding: 5px;
         font-size: 20px;
    }
    .gift_new img{

    background-size: cover;
    background-position: center center;
}


    .cbox{
      display: -webkit-box;
    }
    .gift_new .btn-mail{
      width: 20% !important;
     background-color: #fa505a !important;
    border-color: #fa505a !important;
    }
    .separator {
    color: #c5c5c5;
    font-size: 17px;
    margin-bottom: 20px;
    text-align: center;
    -webkit-font-smoothing: antialiased;
    }
    .separator .border .tl {
    height: 1px;
    border-bottom: 1px solid #c5c5c5;
    margin-top: -19px;}
    .b-btn {
    display: -webkit-box;
    width: 50%;
         }
  </style>


<div class="paddingfromtop">
  <div class="container gift_new" style="margin-top:7rem; margin-bottom:10rem">
 <div class="row ">
    <div class="col-md-5 text-center">
      <h3>Refer a Friend</h3>
      <!-- <div>
        <h3>Get a $50 Amazon gift card</h3>
        <p>For every friend that makes a purchase,
           you'll get a $50 Amazon gift card (and they'll
           get 12% off and a jewelry gift with their first order).
         </p>
      </div> -->

      <form action="refer_friend_process" method="post" enctype="multipart/form-data">
      @csrf

         <input type="text" name="name" class="form-control " placeholder="Your First Name"><br>
         <input type="text" name="email" class="form-control " placeholder="Your Email"><br>
         <!-- <label for="share_email_reminder" class="checkbox">
             <input name="share_email_reminder" type="hidden" value="false">
             <input type="checkbox" checked="checked" id="share_email_reminder" name="share_email_reminder" value="true" class="js-checkbox is-checked">
               Send my friends a reminder e‑mail in 3 days
           </label> -->

      <div><button class="btn btn-defalut"><i class="fa fa-link"></i>Invite Friend</button></div></br>


    </form>



    </div>
    <div class="col-md-7">
     <img class="eml" src="https://d2jjzw81hqbuqv.cloudfront.net/static_assets/files/394216/original/Advocate%20signup%3Ashare%20page%20%28645%20X%20645%29.jpg" alt="">



   </div>

 </div>
</div>
</div>
@endsection
