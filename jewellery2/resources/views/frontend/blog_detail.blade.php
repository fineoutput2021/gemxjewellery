@extends('frontend.layout')
@section('main')

<style>
  @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:ital@0;1&display=swap');
  button.read_btn{
    width: 28%;
        border: 1px solid rgb(31 11 0);
        /* background: #1f0b00; */
        outline: 0 !important;
        border-radius: 4px;
        /* color: #fff; */
          background-color:#f5f1ea!important; color:Black!important;
        height: 27px;
        margin-top: 2rem;
        text-align: center;
        margin-top: 1rem;
        font-family: 'Libre Baskerville', serif !important;
}

/* button.read_btn:hover{
  background: #ffa4a8;
      color: #fff;
} */

.img_bl {
    width: 100%;
    height: 248px;
    border-radius: 7px;
}
/* .btnstyle{
  font-family: 'Libre Baskerville', serif !important;
  font-size: 11px !important;
  padding: 1px 15px !important;
  margin-top: 1rem;
  width: 151.41px !important;
  /* margin-bottom: 4rem !important; */
} */
</style>
<div class="paddingfromtop">
<section class="mt-5 mb-5">

<div class="container-fluid">
<?php

if(!empty($blog_data)){
  $i=0;
  foreach($blog_data as $blog){

?>

  <?php if($i==0) {?>
  <div class="row">
  <?php } ?>
    <div class="col-md-4 mb-5">
      <div class="bl-img">
        <a href="<?=base_path?>view_blog/<?=base64_encode($blog->id);?>">
           <img src="<?=base_path.$blog->image;?>" class=" img-fluid  mb-3"></a> <!--img_bl-->
      </div>
      <div class="bl-content" style="height: auto;">
       <a href="<?=base_path?>view_blog/<?=base64_encode($blog->id);?>">
         <h5 style="min-height: auto;" class="bheading"><?=$blog->heading;?></h5>
       </a>
       <p style="    height: auto;
    overflow: hidden;" class="textstn"><?=$blog->content;?>
      </p>

      </div>
      <a href="<?=base_path?>view_blog/<?=base64_encode($blog->id);?>">
       <!-- <button type="button" class="btn btn-secondary btn-sm btnstyle read_btn">Learn More</button> -->
        <button class="read_btn">Read More</button>
      </a>
    </div>

<?php if($i==2) {?>
  </div>
<?php } ?>
<?php

if($i==2){ $i=0; } else{ $i++; } } }
?>
</div>
</section>
</div>
<script>
    let textstn=document.querySelectorAll('.textstn');
     for(let i=0;i<textstn.length;i++){
       let textbre = textstn[i].innerHTML.slice(0, 49);
       textstn[i].innerHTML=textbre
     }
     let textstnh=document.querySelectorAll('.bheading');
      for(let i=0;i<textstnh.length;i++){
        let textbre = textstnh[i].innerHTML.slice(0, 49);
        textstnh[i].innerHTML=textbre+"..."
      }

</script>
@endsection
