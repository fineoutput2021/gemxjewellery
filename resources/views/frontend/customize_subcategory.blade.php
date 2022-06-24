@extends('frontend.layout')
@section('main')


 <style>
 .custom2{
   position: relative;
   overflow: hidden;
   height:185px;
   border: 1px solid #bbb;

   background-size: contain;
   background-position: center top;
   background-repeat: no-repeat;
   font-size: 18px;
   width: 100%;
   float: left;
   margin-top: 15px;
   margin-bottom:15px;
   /* margin: 10px; */
   }

.custom2:hover > .imagecust { opacity: 0.3; }



   .custom2 h4{
   font-size: 16px ;
   justify-content: center;
   text-transform: uppercase;
   padding: 0;
   margin: 0;
   display: -ms-flexbox;
   display: flex;
   -ms-flex-direction: column;
   flex-direction: column;
   height: 100%;
   text-align: center;
    font-family: Lato,sans-serif;
    font-weight: 100;
        color: #888888;
        cursor: pointer;
   }

   .custom2 h4:hover{
     color: #4d2f40;
   }

   .cust2 h2{
     text-align: center;
      font: 400 22px / 1.3 'Libre Baskerville',serif;
   }

   .imagecust {
 display: block;
 width: 100%;
  height: -webkit-fill-available;
  position: absolute;
}

/*.imagecust:hover{
     opacity: 0.4;
}*/


.overlay {
 position: absolute;
 z-index: 1;
 bottom: 0;
 left: 0;
 right: 0;
 height: 20%;
 width: 100%;
 opacity: 0;
 transition: .5s ease;

}

.custom2:hover .overlay {
 opacity: 1;
}


.text {
 color: white;
 font-size:16px;
 position: absolute;
 left: 50%;
 -webkit-transform: translate(-50%, -50%);
 -ms-transform: translate(-50%, -50%);
 transform: translate(-50%, -50%);
 text-align: center;
     background: #4d2f40;
   width: 100%;
   height: 100%;
   padding: 8px;
       top: 17px;
}


.image_cust_p{
 position: relative;
   z-index: 1;
   top: 140px;
   text-align: center;
   text-transform: uppercase;
   font-weight: 700;
   /* font:'Libre Baskerville',serif; */
}

.over_proname{
 text-align: center;
   position: relative;
   top: -138px;
}

.over_price{
 text-align: center;
   position: relative;
   top: -90px;
   font-size: 24px;

}
.over_price a{
 list-style: none;
 text-decoration: none;
 color: black;

}
 </style>
<div class="paddingfromtop">
 <section class="cust2">
 		<h2 style="    font-family: 'Calibri'!important;">Choose your Product</h2>
 		<div style="padding: 0px 70px;">
 			<div class="row">


<?php
if($customize_product){
  foreach ($customize_product as $cust_product) {
?>

        <div class="col-lg-3 col-md-3 mt-2">
            <a href="<?=base_path?>customize_diamond/<?=base64_encode($cust_product->id);?>">
          <div class="">
            <img src="<?=base_path.$cust_product->image;?>" class="img-fluid">
            <div class="m-1">
              <p style="font-weight: 600;"><?=$cust_product->name;?></p>
              <p><b>$<?=$cust_product->base_price;?></b></p>
            </div>
          </div>
        </a>
        </div>

          <!-- <div class="col-lg-3 col-md-3">
          <div class="custom2">
   					<img src="<?=base_path.$cust_product->image;?>" class="imagecust">
                       <P class="image_cust_p" ><?=$cust_product->name;?></P>
                       <div class="overlay">
                       	<div class="over_proname"><?=$cust_product->s_desc;?></div>
                       	<div class="over_price"><i>$</i> <a href="#"><?=$cust_product->base_price;?></a></div>
                          <a href="<?=base_path?>customize_diamond/<?=base64_encode($cust_product->id);?>">
       				    <div class="text">SELECT</div>
                    </a>
    					 </div>
          </div>
 				</div> -->

<?php  } }  ?>



</div>

 		</div>
 	</section>
</div>


@endsection
