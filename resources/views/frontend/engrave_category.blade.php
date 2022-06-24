@extends('frontend.layout')
@section('main')


 <style>
 .custom{
     position: relative;
     overflow: hidden;
     /* height:185px; */
     height: 282px;
     border: 1px solid #bbb;
     background-color: #3e002396;
     background-size: contain;
     background-position: center top;
     background-repeat: no-repeat;
     font-size: 18px;
     width: 100%;
     float: left;
     margin-bottom:15px;
     margin-top:15px;

     /* margin: 10px; */
   	}
   	.custom h4{
   	font-size: 22px ;
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
          color: #fff;
          cursor: pointer;

   	}

   	.custom h4:hover{
   		color: #4d2f40;
   	}

   	.cust h2{
   		text-align: center;
   		 font: 400 22px / 1.3 'Libre Baskerville',serif;
   	}

    .cust a {
      width: 100%;
    }
 </style>

<div class="paddingfromtop">
 <section class="cust mt-5">
   <h2>Choose Your Engraving Style</h2>
   <div style="padding: 0px 70px;">

<?php
if(!empty($engrave_category)){
$i=0;  foreach ($engrave_category as $cust_category) {

?>
<?php if($i==0) {?>
    <div class="row">
<?php } ?>
       <div class="col-lg-3 col-md-3 ">
         <div class="custom">
           <a href="<?=base_path?>engrave_subcategory/<?=base64_encode($cust_category->id)?>">
           <h4><?=$cust_category->name;?></h4>
           </a>
         </div>
       </div>






 <?php if($i==3) {?>
     </div>

   <?php } ?>


<?php  if($i==3){ $i=0; }else{ $i++; }    } }  ?>


   </div>
 </section>
</div>

@endsection
