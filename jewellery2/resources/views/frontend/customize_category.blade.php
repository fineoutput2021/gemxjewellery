@extends('frontend.layout')
@section('main')


 <style>
 .custom{
     position: relative;
     overflow: hidden;
     /* height:185px; */
     height: 300px;
     border: 1px solid #bbb;
     background-color: #3e002396;
     background-size: contain;
     background-position: center top;
     background-repeat: no-repeat;
     font-size: 18px;
     width: 100%;
     /* weight: 200px; */
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
   <h2 style="font-family: 'Calibri'!important;">Choose Your Customize Style</h2>
   <div class="row">
       <div class="col-lg-3 col-md-3 ">
         <div class="custom">
           <a href="<?=base_path?>color_bar_category">
           <h4>Color Bar</h4>
           </a>
         </div>
       </div>
       <div class="col-lg-3 col-md-3 ">
         <div class="custom">
           <a href="<?=base_path?>engrave_category">
           <h4>Engravable Style</h4>
           </a>
         </div>
       </div>
       <div class="col-lg-3 col-md-3 ">
         <div class="custom">
           <a href="<?=base_path?>comming_soon">
           <h4>Hanging Style</h4>
           </a>
         </div>
       </div>
   </div>
 </section>
</div>



@endsection
