@extends('frontend.layout')
@section('main')
<style>
  .bl-img img{
    width: 100%;
    height:320px;
    background-size: 100% 100%;
    background-repeat: no-repeat;
  }
  @media (min-width: 320px) and (max-width: 900px){
    .bl-img img{
    width: 100%;
    height: auto;
    background-size: 100% 100%;
    background-repeat: no-repeat;
  }
  .row.py-2 {
  flex-wrap: wrap-reverse;
}
  }

</style>
<div class="paddingfromtop">
<section class="mt-5 mb-5">

  <div class="container ">
    <?
  // print_r($blog_data);
  //
  //
  //   die();
  // echo $blog_data->content;
    if(!empty($blog_data)){
      foreach($blog_data as $blog){?>
    <div class="row  py-2">
      <div class="col-md-7">
        <div class="blg-content">

          <h3 style="    font-family: 'Calibri'!important;"><?php echo $blog->heading; ?></h3>
          <p>
          <?php echo $blog->content; ?>
          </p>

        </div>
        </div>
      <div class="col-md-5">
        <div class="bl-img">
          <img src="<?=base_path.$blog->image; ?>" alt="" >
        </div>
        </div>
      </div>
    <?php } }?>
    </div>

</section>
</div>


@endsection
