@extends('frontend.layout')
@section('main')

<style>
    .gift_new{
      border: 1px solid #ccc;
    }
    .gift_new button{
      width: 100%;
     background-color: #52c1b7;
    border-color: #52c1b7;
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
   /* display: none;*/
}


    .cbox{
      display: -webkit-box;
    }
    .gift_new .btn-mail{
      width: 50% !important;
      margin: auto;
     background-color: #52c1b7 !important;
    border-color: #52c1b7 !important;
    }

    .first_hide{
      display: none;
    }
    input{
      outline: 0 !important;
    }
  </style>

<div class="paddingfromtop">
  <div class="container gift_new mb-5 mt-5">
   	<div class="row ">

       <div class="col-md-5 text-center">


               <?php

         // echo $refer_id;
               $refers= App\frontendmodel\ReferAfriend::wherenull('deleted_at')->where('id',base64_decode($refer_id))->first();
               // echo $refers;die();
               if(!empty($refers)){
                 $refer_friend_name= $refers->name;
                 $refer_friend_email= $refers->email;
               }else{
                 $refer_friend_name= "";
                 $refer_friend_email= "";
               }


               ?>

         <h6>Refer a Friend</h6>
         <!-- <div>
           <h3>Get a $50 Amazon gift card</h3>
           <p>For every friend that makes a purchase,
              you'll get a $50 Amazon gift card (and they'll
              get 12% off and a jewelry gift with their first order).
            </p>
         </div> -->
         <div>
          <button class="btn btn-defalut mt-5" onclick="myfunform()">
            <i class="fa fa-envelope-square"></i>Share via Email
          </button>
          </div>
        <!-- </br>
         <div><button class="btn btn-defalut"><i class="fa fa-facebook"></i>Share via Email</button></div></br>
         <div><button class="btn btn-defalut"><i class="fa fa-link"></i>Share via Email</button></div></br> -->
         <p style="color: #ccc;">
          *Offer valid only for new customers.
           By accepting this offer you agree to the <a href="#">Terms of Service</a> and <a href="#">Privacy Policy</a>.
         </p>
         <!-- <p>Powered by <span>Talkable</span></p> -->

       </div>
       <div class="col-md-7">
        <img class="eml" id="eml" src="https://d2jjzw81hqbuqv.cloudfront.net/static_assets/files/394216/original/Advocate%20signup%3Ashare%20page%20%28645%20X%20645%29.jpg" alt="">

        <form class="first_hide" id="first_hide" action="<?=base_path?>refer_a_friend_process/<?=$refer_id?>" method="post" enctype="multipart/form-data">
          <!-- <input type="hidden" name="refer_id" value=""> -->
          <h3  class="text-center mt-2">SHARE VIA EMAIL</h3>
          <p>Email will be sent from: <?=$refer_friend_email;?></p>
          <label>To:</label>
          <input type="text" name="invite_email" class="form-control " placeholder="Friends email"><br>
          <!-- <input type="text" name="" class="form-control " placeholder=""><br>
          <input type="text" name="" class="form-control " placeholder=""><br>
          <input type="text" name="" class="form-control " placeholder=""><br>
          <input type="text" name="" class="form-control " placeholder=""><br> -->
          <label>Subject:</label>



          <input type="text" name="subject" class="form-control" placeholder="Subject" value="Your friend <?=$refer_friend_name;?> sent you 12% off at GemX.">
          <label>Note:</label>
          <textarea  type="text" name="note" class="form-control" placeholder=""></textarea>

          <label for="share_email_reminder" class="checkbox">
            <input name="share_email_reminder" type="hidden" value="false">
            <input type="checkbox" checked="checked" id="share_email_reminder" name="share_email_reminder" value="true" class="js-checkbox is-checked">
              Send my friends a reminder e‑mail in 3 days
          </label>
          <button class="btn btn-mail" type="submit">Send Email</button>
        </form>

      </div>

   	</div>
   </div>

</div>

   <script>
     function myfunform() {
         document.getElementById('eml').style = 'display: none';
         document.getElementById('first_hide').style = 'display: block';
     }



   </script>

@endsection
