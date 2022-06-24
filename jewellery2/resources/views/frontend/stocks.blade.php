@extends('frontend.layout')
@section('main')


<!-- <section>
<div class="container-fluid p-0 w-100 m-0">
  <div class="row p-0 w-100 m-0">
    <div class="col-md-12 p-0 w-100 m-0">
      <img class="story_img" src="https://www.wallpapertip.com/wmimgs/71-712248_weddings-ring-wallpaper-139701-hd-wallpapers-desktopinhqcom-gold.jpg">
    </div>
  </div>

</div>

<div class="container">
  <div class="row line_he">
    <div class="col-md-12">
      <h2 class="mt-5 mb-5 text-center">About us</h2>
      <p>
          Hello friends,<br>
          My name is yugal verma. I have been complete my graduation from Rajasthan technical university.
          My interest has been in fitness from the beginning. I give my 15 years in different
          gym in Jaipur and do exercise there. Then I know about the importance of fitness. Fitness is
          very must for our body healthy and wellness. If we do exercise daily in 40 to 50 minute we can
          do every work easily. And no disease will occur us easily so friends I made fitness app
          for our user named Fit to be Easy. I am the owner of this app.
          It helps to improve our strength, stamina, happiness.
          Fit to be Easy is a health and fitness platform that help our user to achieve their physical and
          Mental potential. This platform provided to user best experienced trainer for training online
          home exercise classes. We believe this is not about how the world perceives us but more
          about a way of life we believe in.
      </p>
          App Name &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp Fit to be Easy <br>
          Purpose &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp          Health, wellness and fitness <br>
          Type &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp             Privately held <br>
          Founded &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp &nbsp          2021 <br>

      <h2 class="mt-5 mb-5">MEET FOUNDER
HARSH SONI 
</h2>
      <p>I was born and raised in Jaipur, India. Jaipur is considered the hub of fashion jewellery and handcrafted Gemstones, and it's the best place to shop for the most elegant and sophisticated jewellery made from precious and semi-precious stones. I am an artist, traveller and designer by profession. Chole bhature makes me happy. I love dogs, theatre and pizza. I've always had a love of natural gemstones & has been attracted by colours, cuts and styles since childhood, so I decided to make my career in it.</p>
    </div>
  </div>

  <div class="row mt-5  he-20">
    <div class="col-md-3">
      <div>
      <img class="w-100 " src="https://sc01.alicdn.com/kf/HTB1OXWUSpXXXXbmaVXXq6xXFXXXE/200160633/HTB1OXWUSpXXXXbmaVXXq6xXFXXXE.jpg"></div>
    </div>
    <div class="col-md-3">
      <div>
      <img class="w-100" src="https://www.diamonds.net/News/Files/Gallery/Jewelry%20Prices%20large.jpg"></div>
    </div>
    <div class="col-md-3">
      <div>
      <img class="w-100" src="http://kprotection.com/wp-content/uploads/2017/03/jewelry-store.jpg"></div>
    </div>
    <div class="col-md-3">
      <div>
      <img class="w-100" src="http://retaildesignblog.net/wp-content/uploads/2014/09/Dhamani-1969-boutique-by-Callison-Dubai-UAE-02.jpg"></div>
    </div>

  </div>


  <div class="row" style="margin-top:8rem; ">
    <div class="col-md-6">
      <h4 style="    letter-spacing: 2px;
    line-height: 27px;" class="text-center">Founder and CEO, GemX, grew up surrounded by arts and objects from her parents' antiques business, an influential force that has guided her entrepreneurial spirit and eye for design. After graduating from art school in London, Monica immersed herself in the jewellery world and worked her way up before deciding to go it alone, creating bespoke pieces from her converted forge in Norfolk, with an office, showroom and workshop all under one roof. As the business has scaled, Norfolk remains at the heart of the design process, where she and her creative team develop all of the collections such as elegant earrings. Production takes place in India, where every stone is cut and faceted by hand from rough, using contemporary cuts, meaning your piece of GemX jewellery is entirely unique.</h4>
    </div>
    <div class="col-md-6">
      <div>
        <img class="w-100" style="height:450px;" src="https://images.unsplash.com/photo-1561060511-78b14b799fe1?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1000&q=80">
      </div>
    </div>
  </div>

  <div class="row" style="margin-top:8rem; ">

    <div class="col-md-6">
      <div>
        <img class="w-100" style="height:450px;" src="https://images.unsplash.com/photo-1561060511-78b14b799fe1?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=1000&q=80">
      </div>
    </div>
    <div class="col-md-6">
      <h4 style="    letter-spacing: 2px;
    line-height: 27px;" class="text-center">We are committed to the ethical sourcing of our products and work closely with suppliers to ensure that they adhere to our code of conduct, which outlines strict standards of business behaviour.</h4>
    <h4 style="    letter-spacing: 2px;
  line-height: 27px;" class="text-center">We have been awarded the Butterfly Mark by Positive Luxury for our outstanding commitment to sustainability. In addition, Monica Vinader is a member of the Responsible Jewellery Council.</h4>
  <h4 style="    letter-spacing: 2px;
  line-height: 27px;" class="text-center">MV diamonds are sourced through suppliers that adhere to the Kimberley Process and the World Diamond Council's System of Warranties, preventing the distribution of conflict diamonds both in rough, cut and polished stones. Conflict diamonds are those smuggled by rebels to finance wars against legitimate governments. Our diamond suppliers are also compliant with United Nations resolutions.</h4>


    </div>
  </div>



</div>
</section>
<script>
var acc = document.getElementsByClassName("accordion");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("active");
    var panel = this.nextElementSibling;
    if (panel.style.display === "block") {
      panel.style.display = "none";
    } else {
      panel.style.display = "block";
    }
  });
}
</script> -->
<style>
@import url('https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,300;1,100;1,300&family=Lora&display=swap');
  .aboutus p{
    letter-spacing: 1px;
    font-family: 'Lato', sans-serif;
  }
</style>
<div class="aboutus paddingfromtop">


<section style="padding:20px;margin:3rem 0 10rem 0;" >


  <div class="container">
    <div class="row">
      <div class="col-sm-12">
        <h2 class="mb-5 text-center">Stockist</h2>
      </div>
        <div class="col-md-12">
        <img src="https://media.istockphoto.com/photos/fancy-designer-antique-golden-bracelets-for-woman-fashion-picture-id1277517088?b=1&k=20&m=1277517088&s=170667a&w=0&h=PXTQvh19pESR7mIekh3mJQHWcw2FDRrYcHdxsv9XY-Q=" alt='faq' width="100%" height="430px"/>
      </div>
      </div>

    <div class="row">
      <div class="col-sm-12">
        <h2 class="mt-5 text-center">Jewellery</h2>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-sm-12">
          <p>GEMX JEWELLERY is a store that provides designer jewellery to its esteemed customers since 2014. Harsh Soni founded it in Jaipur. It has introduced high quality, flawless &amp; dazzling jewellery with precious and semi-precious gemstones at Reasonable prices. It offers a complete range of fashion and custom jewellery and provides other beautiful items like great Earrings, Necklace, Bracelets, Cuffs, Pendants, Rings, and several other fashion accessories. Gemx designs jewellery using metals such as Brass, copper, sterling silver, gold, natural gemstones, and dazzling Pearls.&nbsp;</p>
          <p>Our company&apos;s vision and objective have always been to keep the customer delighted and contended through our brilliant quality, best price and excellent services. Our handcrafted jewellery is just impeccable and flawless piece of art. fashion jewellery we deal in is not only elegant, but the quality is also persistent and maintains excellent standards. We are specialized in Opal Jewelry, Fashion Jewelry, Fine Jewelry And, Stone-Embellished Jewelry crafted from various handcrafted Gemstones. If you wish to use your creativity in designing your own jewellery, you can reach us with your ideas, and we&apos;ll customize your piece as you desire.&nbsp;</p>
          <!-- <p><br></p>
          <p><br></p> -->
          <!-- <h3 class="text-center">MEET FOUNDER</h3>
          <p><b>HARSH SONI</b>&nbsp;</p>
          <p>I was born and raised in Jaipur, India. Jaipur is considered the hub of fashion jewellery and handcrafted Gemstones, and it&apos;s the best place to shop for the most elegant and sophisticated jewellery made from precious and semi-precious stones. I am an artist, traveller and designer by profession. Chole bhature makes me happy. I love dogs, theatre and pizza. I&apos;ve always had a love of natural gemstones &amp; has been attracted by colours, cuts and styles since childhood, so I decided to make my career in it.</p>
          <p><br></p>
          <p><br></p> -->
</section>
</div>
@endsection
