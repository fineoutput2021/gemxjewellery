@extends('frontend.layout')
@section('main')

<style type="text/css">

.css-1geyf33{
      padding: 0px !important;
      margin-left:0px;
      margin-right:0px
}

.css-1tnay0n p.prices{
  font-size: 15px !important;
}

/*! CSS Used from: Embedded */
button{background:transparent;border:none;}

a{-webkit-text-decoration:none;text-decoration:none;color:#33363e;}
a,a:active,button,a:hover{outline:0;}
::-moz-focus-inner{border:0;}
::-webkit-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
::-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-ms-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:focus{outline:none;}
button{border:0;border-width:0;background:transparent;outline:0;}
button:focus,a:focus{outline:none!important;}
button{font-size:1.6rem;}
img{border:0;}
/*! CSS Used from: Embedded */
.css-10xun30{overflow:hidden;white-space:nowrap;text-overflow:ellipsis;color:rgb(51, 54, 62);font-size:1.1rem;line-height:2.8rem;margin-bottom:0.4rem;}
@media (min-width: 993px){
.css-10xun30{font-size:14px;}
}
body.fontLoaded .css-10xun30{font-family:MuliLight, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-5y0199{
font-size: inherit;
color:rgb(240 206 145)!important;
}
@media (min-width: 993px){
.css-5y0199{    font-size: inherit;;}
}
body.fontLoaded .css-5y0199{font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1eusqjf{font-size:1.1rem;margin-bottom:8px;}
@media (min-width: 993px){
.css-1eusqjf{font-size:1.4rem;}
}
body.fontLoaded .css-1eusqjf{font-family:MuliLight, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-ajcn37{font-size: inherit;margin:4px 0px;color:rgb(235, 79, 92)!important;}
@media (min-width: 993px){
.css-ajcn37{font-size: inherit;}
}
.css-mtc8vw{font-size:1.2rem;}
.css-mtc8vw .strikethrough{text-decoration:line-through;color:rgb(173, 169, 173);margin:0px 0px 0px 0.5rem;}
.css-mtc8vw .discountprice{color:rgb(235, 79, 92);margin:0px 0px 0px 5px;}
body.fontLoaded .css-mtc8vw{font-family:MuliBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
@media (min-width: 993px){
.css-mtc8vw{font-size:1.4rem;}
}
.css-1tnay0n{-webkit-box-flex:1;flex-grow:1;flex-basis:73%;margin-left:1.6rem;position:relative;display:flex;flex-direction:column;overflow-y:visible;min-width:0px;-webkit-box-pack:justify;justify-content:space-between;}
body.fontLoaded .css-1tnay0n{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1tnay0n p{
  color:#000;
  font-size: 20px !important;
}


.css-di2q33{
-webkit-box-flex:1;
flex-grow:1;
}
@media (min-width: 993px){
.css-di2q33{margin-bottom:0px;
flex-basis:30% ;
display:flex;
-webkit-box-pack:end;
justify-content:flex-end;
align-items:flex-end;


}
}
.css-106pwyk{font-size:1.1rem;display:flex;flex-direction:row;margin-bottom:0.2rem;margin-top: 10px;}
body.fontLoaded .css-106pwyk{font-family:MuliSemibold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
@media (min-width: 993px){
.css-106pwyk{font-size:1.4rem;margin-bottom:0px;}
}
.css-19b44e8{
flex:1 1 65%;
border-right:none;
padding: 0 1rem;
height: 100%;
}
@media screen and (min-width: 993px){
.css-19b44e8{
/* border-right:1px solid rgb(233, 233, 233); */
padding: 0 2rem;
height: 100%;
}
}
@media screen and (min-width: 1281px){
.css-19b44e8{
padding: 0 3rem;
height: 100%;
}
}
.css-oz56hd{width:100%;display:flex;padding:0px;}
@media screen and (max-width: 992px){
.css-oz56hd{padding:1rem 0.8rem;}
}
.css-1gi7vqi{width:100%;display:flex;-webkit-box-align:center;align-items:center;border-width:1px 1px 1px 0.4rem;border-style:solid;border-color:rgb(233, 233, 233) rgb(233, 233, 233) rgb(233, 233, 233) rgb(136, 99, 251);border-image:initial;margin:0px 0px 1rem;border-radius:0.4rem;-webkit-box-pack:justify;justify-content:space-between;background-color:rgb(255, 255, 255);}
@media screen and (max-width: 992px){
.css-1gi7vqi{margin:0px;}
}
.css-g4rm2m{position:relative;padding:1rem 1.8rem;text-align:left;}
@media screen and (max-width: 992px){
.css-g4rm2m{padding:1rem;}
}
.css-76he1v{font-size:1.9rem;color:rgb(240 206 145);line-height:2.4rem;}
@media screen and (max-width: 992px){
.css-76he1v{font-size:1.2rem;line-height:1.4rem;}
}
body.fontLoaded .css-76he1v{font-family:BegumSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-xvolfu{font-size:1.5rem;color:rgb(35, 21, 53);}
.css-xvolfu a{text-decoration:none;color:rgb(222, 87, 229);}
@media screen and (min-width: 993px){
.css-xvolfu a{cursor:pointer;}
}
@media screen and (max-width: 992px){
.css-xvolfu{font-size:1rem;}
}
body.fontLoaded .css-xvolfu{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-19lerao{width:9rem;height:9rem;line-height:9rem;text-align:center;border-left:0.1rem solid rgb(233, 233, 233);}
.css-19lerao .card-icon{background:url(https://assets.cltstatic.com/images/responsive/spriteImage2_stage.png?t=1580384077297) -19px -1388px / 832px no-repeat;width:6.2rem;height:6.2rem;display:inline-block;vertical-align:middle;}
@media screen and (max-width: 992px){
.css-19lerao{width:8rem;height:8rem;line-height:8rem;}
}
.css-1aspwm4{font-size:1.4rem;color:rgb(35, 21, 53);padding:1.6rem 0px;}
body.fontLoaded .css-1aspwm4{font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1aspwm4 .savecart{float:right;}
.css-1aspwm4 .savecart::after{content:"";clear:both;display:table;}
@media screen and (max-width: 992px){
.css-1aspwm4{padding:1.1rem 1.6rem;border-bottom:1px solid rgb(233, 233, 233);}
.crossbtn{
  margin-top: -1rem;
margin-right: 1rem!important;
}
}
.css-bi61qn{position:relative;display:flex;flex-direction:column;padding:1.6rem;border-bottom:1px solid rgb(233, 233, 233);background-color:rgb(255, 255, 255);animation-duration:0.3s;animation-fill-mode:backwards;animation-name:animation-aw5r2h;animation-delay:100ms;}
@media (min-width: 993px){
.css-bi61qn{flex-direction:row;padding:1.6rem;background-color:rgb(255, 255, 255);margin-bottom:2.4rem;border:1px solid rgb(233, 233, 233);border-radius:0.4rem;}
}
.css-on8ti6{position:relative;-webkit-box-flex:1;flex-grow:1;display:flex;flex-direction:row;margin-bottom:16px;}
@media (min-width: 993px){
.css-on8ti6{flex-basis:70%;margin-bottom:0px;}
}
.css-z4200p{background-color:rgb(255, 255, 255);flex-basis:27%;min-width:9rem;max-width:9rem;height:11.2rem;border-radius:2px;border:1px solid rgb(233, 233, 233);align-content:center;position:relative;}
@media screen and (min-width: 993px){
.css-z4200p{min-width:12.2rem;max-width:12.2rem;height:11.2rem;}
}
.css-z4200p > a{display:flex;-webkit-box-align:center;align-items:center;height:100%;}
.css-24jlg2{max-width:100%;animation:0s ease 0s 1 normal none running none;width:100%;}
.css-1dpejff{margin:0px 1rem 0px 0px;width:auto;display:flex;}

.css-1geyf33{
  position:relative;
  font-size:1.1rem;
  width:auto;
  left:0px;
  border:none;
  display:inline-block;
  color:rgb(35, 21, 53);
  margin-top:-1px;
  width:79px;
  /* margin: 0 11px; */
  white-space: nowrap;
  text-overflow: ellipsis;
  overflow: hidden;
  text-transform: capitalize;

}
.crossbtn{
  margin-top: -1rem;
margin-right: -8rem;

    /* margin-right: -1rem; */
    /* font-size: 1.5rem;
    font-weight: 700; */
}

@media (min-width: 993px){
.css-1geyf33{font-size:1.4rem;margin-top:0px;}
}
.css-zb2zke{outline:none;width:100%;background:rgb(255, 255, 255);position:relative;text-align:left;box-sizing:border-box;border-radius:2px;cursor:pointer;color:inherit;display:flex;height:2.1rem;line-height:2.1rem;border:none;}
@media (max-width: 992px){
.css-zb2zke{cursor:default;}
}
.css-zb2zke::before{content:"";width:6px;height:100%;left:0px;top:0px;position:absolute;background:transparent;border-radius:2px 0px 0px 2px;}
.css-zb2zke::after{content:"";background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -534px -756px / 832px;width:1.2rem;line-height:inherit;position:relative;top:35%;}
.css-zb2zke::before{width:0px;}
.css-67d77v{display:block;white-space:nowrap;text-overflow:ellipsis;font-size:inherit;height:2.1rem;line-height:2.1rem;padding:0px 0px 0px 0.5rem;width:100%;border:none;}
.css-l9tl4r{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -660px -10px / 832px;position:absolute;right:0px;top:0px;width:30px;height:100%;opacity:1;transition:transform 0.4s ease-in-out 0s;transform:rotate(0deg);display:none;}
.css-1dskjgu{position:absolute;visibility:hidden;transition:visibility 0.4s ease-in-out 0s;z-index:1;border:1px solid rgb(233, 233, 233);background:rgb(255, 255, 255);overflow-y:auto;list-style-type:none;width:200%;min-width:5rem;font-size:inherit;max-height:12rem;}
.css-1spp5nl{line-height:36px;background-color:rgb(255, 255, 255);border-bottom:1px solid rgba(222, 229, 239, 0.5);cursor:pointer;opacity:1;width:100%;list-style-type:none;font-size:inherit;text-align:center;padding:0px 0.5rem;}
@media (max-width: 992px){
.css-1spp5nl{cursor:default;}
}
.css-1spp5nl:hover{background:rgb(249, 249, 250);}
.css-5tikav{line-height:36px;border-bottom:1px solid rgba(222, 229, 239, 0.5);cursor:pointer;opacity:1;width:100%;list-style-type:none;font-size:inherit;text-align:center;padding:0px 0.5rem;background:rgb(249, 249, 250);}
@media (max-width: 992px){
.css-5tikav{cursor:default;}
}
.css-5tikav:hover{background:rgb(249, 249, 250);}
.css-1kb8zzg{margin:0px;width:auto;display:flex;}
.css-qhuuwl{color:rgb(35, 21, 53);padding-left:0.3rem;}
.css-1vspfwe{
display:flex;
-webkit-box-align:center;
align-items:center;
flex:1 0 auto;
flex-direction:row;
-webkit-box-pack:justify;
justify-content:space-between;

}
@media screen and (min-width: 993px){
.css-1vspfwe{
-webkit-box-pack:end;
justify-content:flex-end;
flex-direction:column;
position: absolute;

}
}
.css-clidyq{
position:relative;
outline:none;cursor:pointer;user-select:none;
-webkit-tap-highlight-color:transparent;
width:100%;
box-sizing:border-box;
font-family:inherit
;margin:5px 0.8rem 5px 0px;
background:transparent;color:rgb(132, 132, 132);
border-radius:0.4rem;
/* border:1px solid rgb(173, 169, 173); */
min-width:13.6rem;
   height: 3rem;

}
@media screen and (min-width: 993px){
.css-clidyq{
min-width:14.6rem;
font-size: initial;
margin-right:0px;
}
}
body.fontLoaded .css-clidyq{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-c9ymxf{
position:relative;
outline:none;cursor:pointer;
user-select:none;
-webkit-tap-highlight-color:transparent;
width:100%;
box-sizing:border-box;
font-family:inherit;
margin:5px 0px 5px 0.8rem;
background:transparent;
border:1px solid #1f0b00;
color:rgb(35, 21, 53);
order:2;
height:2.2rem;
border-radius:0.4rem;
min-width:13.6rem;

}
@media screen and (min-width: 993px){
.css-c9ymxf{
min-width:14.6rem;
font-size: initial;
margin-left:0px;
}
}
body.fontLoaded .css-c9ymxf{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-2jwarf{position:relative;display:flex;flex-direction:column;padding:1.6rem;border-bottom:1px solid rgb(233, 233, 233);background-color:rgb(255, 255, 255);animation-duration:0.3s;animation-fill-mode:backwards;animation-name:animation-aw5r2h;animation-delay:200ms;}
@media (min-width: 993px){
.css-2jwarf{flex-direction:row;padding:1.6rem;background-color:rgb(255, 255, 255);margin-bottom:2.4rem;border:1px solid rgb(233, 233, 233);border-radius:0.4rem;}
}
.css-1sa1z8f{height: 100%;max-width:100%;animation:0.5s ease-in-out 0s 1 normal none running animation-5j8bii;width:100%;}
/*! CSS Used from: Embedded */
*,::before,::after{background-repeat:no-repeat;}
::before,::after{text-decoration:inherit;vertical-align:inherit;}
::-moz-selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
::selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
img{vertical-align:middle;}
img{border-style:none;}
a{background-color:transparent;-webkit-text-decoration-skip:objects;}
a:hover{outline-width:0;}
button{background-color:transparent;border-style:none;color:inherit;font-size:1em;margin:0;}
button{overflow:visible;}
button{text-transform:none;}
button{-webkit-appearance:button;}
::-moz-focus-inner{border-style:none;padding:0;}
:-moz-focusring{outline:1px dotted ButtonText;}
::-webkit-input-placeholder{color:inherit;opacity:.54;}
a,button,[tabindex]{-ms-touch-action:manipulation;touch-action:manipulation;}
/*! CSS Used keyframes */
@-webkit-keyframes animation-aw5r2h{from{opacity:0;-webkit-transform:translate3d(0,100%,0);-ms-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0);}to{opacity:1;-webkit-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);transform:translate3d(0,0,0);}}
@keyframes animation-aw5r2h{from{opacity:0;-webkit-transform:translate3d(0,100%,0);-ms-transform:translate3d(0,100%,0);transform:translate3d(0,100%,0);}to{opacity:1;-webkit-transform:translate3d(0,0,0);-ms-transform:translate3d(0,0,0);transform:translate3d(0,0,0);}}
/*! CSS Used fontfaces */
@font-face{font-family:'MuliLight';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/eeb61d9dad436af6d4181989b63cba64.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/a5fc1c72a20616d26b424c0aae872cf5.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/49d9e837e5d0d18067952a4edc9bfa0b.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/f880aba0c9b501d3d43bb86f52836271.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/5b67bf433f6012ec163bb17bf860edf1.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/6504a5cd73e82bd72d1d3ded33279d35.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/7b7626b3d92105bde067f0d537412fd1.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/e6ce6f049b5adbda9d9f325a17d1104b.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/b168035f557a338a053902f942645342.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliRegular';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/743500abdf420f6f22f4ae16d9328886.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/087cb22996bfb0f35007679e3164d0b4.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/25dc88e941ae1c1b088df20ffaa98948.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'BegumSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/6fcd125d1e90d56657a28a91f0642621.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/cd4d30b8acd3d870e5941597a4aa6346.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/165fc3bf1497781325b15ae965e055fc.ttf) format('ttf');font-display:swap;}

/*! CSS Used from: Embedded */
button{background:transparent;border:none;}

a{-webkit-text-decoration:none;text-decoration:none;color:#33363e;}
a,a:active,button,a:hover{outline:0;}
::-moz-focus-inner{border:0;}
::-webkit-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
::-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-ms-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:focus{outline:none;}
/* h5{font-family:'latobold';font-weight:normal;} */
button{border:0;border-width:0;background:transparent;outline:0;}
button:focus,a:focus{outline:none!important;}
button{font-size:1.6rem;}
/*! CSS Used from: Embedded */
.css-1c2kahj{
  font-size: 1.4rem;
  z-index: 7;
  width: 100%;
  /* display: flex; */
      /* padding: 1rem 1.6rem; */
  -webkit-box-align: center;
  /* height: 7.6rem; */
  background-color: rgb(255 255 255);
  align-items: center;
  justify-content: space-around;
}
body.fontLoaded .css-1c2kahj{font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
@media screen and (max-width: 992px){
.css-1c2kahj{position:fixed;bottom:0px;left:0px;padding:1.6rem;}
}
.css-13z9nd2{
  position:relative;
  flex:1 1 35%;
    padding: 1.5rem 15px 0px;
}
/*@media screen and (min-width: 993px){
.css-13z9nd2{padding:0px 0px 0px 2rem;position:sticky;top:120px;align-self:flex-start;}
}*/
/*@media screen and (min-width: 1281px){
.css-13z9nd2{padding:0px 0px 0px 7rem;}

}*/

.css-1bvn1b6 {
 height: 2.8rem;
 line-height: 2.8rem;
 color: rgb(51, 54, 62);
 font-size: initial;
 padding: 0px 1.6rem;
 border: 1px solid rgb(233, 233, 233);
 border-radius: 0.4rem;
 position: relative;
 background-color: rgb(246, 239, 246);
 width: 100%;
 text-align: left;
}
body.fontLoaded .css-1bvn1b6{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1bvn1b6::after{content:"";width:9px;height:9px;border-radius:2px;border-top:2px solid rgb(35, 21, 53);border-right:2px solid rgb(35, 21, 53);position:absolute;right:1.6rem;top:50%;transform:translateY(-50%) rotate(45deg);}
@media screen and (max-width: 992px){
.css-1bvn1b6{border-top:none;border-radius:0px;}
}
@media screen and (min-width: 993px){
.css-1bvn1b6{margin-top:0px;cursor:pointer;}
}





.css-meo3va{
  font-size:16px!important;
  margin:0px;
  padding:1.2rem 0px;
  color:rgb(35, 21, 53);
  border-bottom: 1px solid #d0d0d0;
}
body.fontLoaded .css-meo3va{font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
@media screen and (max-width: 992px){
.css-meo3va{padding:1.2rem 1.6rem;background-color:rgb(255, 255, 255);}
}
.css-ry2i6z{
  background-color:rgb(255, 255, 255);
  /* padding:1rem 1.6rem; */
}
.css-ry2i6z p{
    font-size: 15px !important;
  padding:0.6rem 0px;
  color:rgb(35, 21, 53);
  font-family: sans-serif;
}
body.fontLoaded .css-ry2i6z p{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-ry2i6z p .price-values{float:right;}
.css-ry2i6z p.discount a{color:#eec782;}
.css-ry2i6z p.discount .price-values{color:#eec782;}
.css-ry2i6z p.shipping-charge .price-values > span.free{color:#eec782;}
body.fontLoaded .css-ry2i6z .price-breakup-final{font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
@media screen and (max-width: 992px){
.css-ry2i6z{border:none;}
}
.css-6yxsag{margin:0px;padding:0px;display:block;text-decoration:none;outline:0px;cursor:pointer;font-family:muliregular;color:inherit;font-size:inherit;}
@media (max-width: 992px){
.css-6yxsag{cursor:default;}
}
.css-ijtbad{
  /* display:none; */
}
@media screen and (max-width: 992px){
.css-ijtbad{display:block;flex-basis:50%;}
}
.css-1usgn1r{
  font-size:1.1rem;
  color:#533021;
}
.css-17fmasb {
  position: relative;
  outline: none;
  cursor: pointer;
  user-select: none;
  -webkit-tap-highlight-color: transparent;
  border-radius: 0;
  box-sizing: border-box;
  font-family: inherit;
  color: rgb(255, 255, 255);
  background: #1f0b00;
  border: none;
  display: flex;
  -webkit-box-pack: center;
  justify-content: center;
  -webkit-box-align: center;
  align-items: center;
  width: 100%;
  height: 50px;
  font-size: larger;
}
body.fontLoaded .css-17fmasb{font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-17fmasb > span{margin-right:1rem;}
.css-5whwel{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -685px -646px / 832px no-repeat;display:block;cursor:pointer;width:14px;height:17px;}
@media (max-width: 992px){
.css-5whwel{cursor:default;}
}
/*! CSS Used from: Embedded */
*,::before,::after{background-repeat:no-repeat;}
::before,::after{text-decoration:inherit;vertical-align:inherit;}
::-moz-selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
::selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
a{background-color:transparent;-webkit-text-decoration-skip:objects;}
a:hover{outline-width:0;}
button{background-color:transparent;border-style:none;color:inherit;font-size:1em;margin:0;}
button{overflow:visible;}
button{text-transform:none;}
button{-webkit-appearance:button;}
::-moz-focus-inner{border-style:none;padding:0;}
:-moz-focusring{outline:1px dotted ButtonText;}
::-webkit-input-placeholder{color:inherit;opacity:.54;}
a,button{-ms-touch-action:manipulation;touch-action:manipulation;}
/*! CSS Used fontfaces */
@font-face{font-family:'MuliSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/f880aba0c9b501d3d43bb86f52836271.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/5b67bf433f6012ec163bb17bf860edf1.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/6504a5cd73e82bd72d1d3ded33279d35.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliRegular';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/743500abdf420f6f22f4ae16d9328886.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/087cb22996bfb0f35007679e3164d0b4.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/25dc88e941ae1c1b088df20ffaa98948.ttf) format('ttf');font-display:swap;}

@media (min-width:312px) and (max-width:900px){
.web_che{
 display: none;
}
.mob_che{
 display: flex !important;
}

.css-1dpejff{
 display: block;
}
select,span.css-qhuuwl.eay09df1 input{
 margin-left: 0 !important;
}
.cart-item-qty.css-1kb8zzg.eay09df2 span{
 width:71px;
}
.css-1kb8zzg{
 display: block;
}
.css-bi61qn{
 display: contents;
}

.css-clidyq{
 min-width: 0;
 width: 100%;
}

.css-c9ymxf{
 min-width: 0;
 width: 50%;
}

p{
 font-size: 12px !important;
}

.css-1c2kahj{
 z-index: 10000 !important;
}

.css-17fmasb{
 position: relative !important;
 height: 4.6rem !important;
}


}

.mob_che{
display: none;
}






.cart-item-size.css-1dpejff.eay09df2 span{
   width: 82px;
   font-size: 20px;
}

select{
text-transform: none;
width: 90%;
font-size: 13px;
height: 30px;
margin-left: 10px;
margin-right: 10px;
    border: 1px solid #e9e9e9;
color: #1f0b00;
}

span.css-qhuuwl.eay09df1 input{
  text-transform: none;
  width: 50%;
  height: 30px;
  font-size: 13px;
  padding: 0 10px;
  margin-left: 10px;
  margin-right: 10px;
  border: 1px solid #e9e9e9;
  color: #1f0b00;
}

.cart-item-qty.css-1kb8zzg.eay09df2 span{
width:100px;
font-size: 16px;
}

.melorra-search{
   right:-7px !important;
}
@media (max-width:360px) {
    .h1res{
       font-size: 20px !important;
    }

  }
  @media (max-width:1350px) {
      .setword{
        width: 30rem;
      }
  }

</style>


 <?php


 /* front-end currency start */

 $sign="$";
 $currency_price="1";

 $cuncy_id = Session::get('currency_id');
 $curr_v= App\adminmodel\CountriesCurrency::wherenull('deleted_at')->where('is_active',1)->where('id',$cuncy_id)->first();
 if(!empty($curr_v)){
   $sign= $curr_v->sign;
   $currency_price= $curr_v->currency_price;
 }else {
 $sign="$";
 $currency_price="1";
 }



 /* front-end currency end*/

 ?>




<div class="paddingfromtop">
<section style="font-size:12px;">
  <div class="container-fluid">
    <div class="row">
      <div class="col-lg-9 col-md-9 p-0" style="min-height:75vh;">
        <div class="css-19b44e8 eclstbm4">
        <div class="css-1aspwm4 eclstbm5 h1res d-flex justify-content-between" style="font-size: 30px;font-weight: 700;margin-top:2rem;margin-bottom:2rem;    font-family: 'Calibri'!important;">Your Shopping Bag
          <span class="savecart"></span>
          <div class="d-flex">
<!-- <p class="section-header text-center text-m" style="padding-right: 11rem;">Color</p>
<p class="section-header text-center text-m" style="padding-right: 8rem;">Quantity</p>
<p class="section-header text-center text-m" style="padding-right: 7rem;">Price</p>
<p class="section-header text-center text-m">Total</p> -->

        </div>


        </div>

<div id="cart_items_tbody">

@if($cart_data != "" && $cart_data != null )
<?php $i=0; $totalamount=0;
// dd($cart_data); die();
?>
@foreach ($cart_data as $cart)

<?php

if($cart->status == 0){

$product= App\adminmodel\Product::wherenull('deleted_at')->where('id',$cart->product_id)->where('is_cat_delete',0)->where('is_subcat_delete',0)->where('is_active',1)->first();

if(!empty($product)){

$productcolorsizeimg= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('product_id',$cart->product_id)->where('color_id',$cart->color_id)->where('is_active',1)->first();

if(!empty($productcolorsizeimg)){
  $img= $productcolorsizeimg->image1;
}else{
  $img= "";
}
?>

<div class="cart-item-card css-bi61qn ee3or4p0">
<div class="css-on8ti6 ee3or4p2">
  <div>
    <div class="css-z4200p ee3or4p3 mt-4">
      <a href="/jewellery/mesh-cluster-ring-jr04526-wyp900.html">
        <img id="pro_img1" class="css-1sa1z8f e1nln7oz0" data-src="" data-srcset="" srcset="" src="<?=$img;?>" alt="product-image">
      </a>
    </div>
  </div>
  <div class="css-1tnay0n cart-item-content">
    <div class="row pt-0">
      <span class="text-right"> <a onclick="removeFromTblCart(<?=$cart->id;?>)" href="javascript:void(0);" >
        <img src="https://img.icons8.com/external-becris-lineal-becris/25/000000/external-cancel-mintab-for-ios-becris-lineal-becris.png" style="width: 12px;"/>
      </a></span>
<div class="col-md-4">
  <h5 style="top:2px"><b>Product Name</b></h5>
    <p class="/*css-10xun30*/ cart-item-product-name" style="font-size: 20px !important;"><?=$product->name;?></p>
  </div>
  <div class="col-md-8">
    <!-- <p class="css-10xun30 cart-item-product-name col-md-7 setword" style="font-size: 14px !important;font-weight: bold;width: 16rem;"><?=$product->name;?></p> -->
      <!-- <p class="css-1eusqjf cart-item-sku"><?=$product->sku_id;?></p> -->

      <div class="/*css-106pwyk*/ row pt-0 cart-item-update-options">
        <!-- <div class="cart-item-size css-1dpejff eay09df2"> -->
        <div class="col-md-4 ">
<div class="cart-item-qty  /*css-1kb8zzg*/ eay09df2">
  <h5 style="top:2px"><b>Color</b></h5>
<div class="drop-down css-1geyf33 ey3901i0 " style="margin-left:0px;">
<select id="color_selct_<?=$product->id;?>" class="color_selct p-2" pro_id="<?=$product->id;?>">
<option>---select color---</option>

<?php
$productcolorsize= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('product_id',$cart->product_id)->where('is_active',1)->get();
$colors= App\adminmodel\Color::wherenull('deleted_at')->where('is_active',1)->get();

?>

@foreach ($productcolorsize as $productclrsiz)
@foreach ($colors as $color)

  <?php  if($color->id == $productclrsiz->color_id){ ?>
 <option value="<?=$color->id;?>"  <?php if($cart->color_id == $color->id){ echo "Selected";} ?> ><?=$color->name;?></option>
<?php  } ?>


 @endforeach
 @endforeach

</select>

</div>

</div>
</div>

<!-- </div> -->
<?php
// echo $cart['color_id'];
// exit;
$productcolorsizeprices= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('product_id',$cart->product_id)->where('color_id',$cart->color_id)->first();
if(!empty($productcolorsizeprices)){
$productcolorsizeprice= $productcolorsizeprices->price;
}else{
$productcolorsizeprice= 0;
}

?>
<div class="col-md-4 ">
<div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
<h5 style="top:2px"><b>Quantity</b></h5>
<span class="css-qhuuwl eay09df1">
<input type="number" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" max="5" style="margin-left:0px;" id="qt_<?=$product->id;?>" value="<?=$cart->quantity;?>" min="1" onchange="updateQuantityCartOnline(event ,<?=$cart->id;?>,<?=$product->id;?> )" style="30% !important" />
</span>
</div>
</div>
<div class="col-md-4">
<div  class="setprice" style="">
  <h5 class="ml-3"><b>Price</b></h5>
  <span style="font-size:30px;"class="priceres">
<p class="css-mtc8vw cart-item-price prices"style="">
<input type="hidden" value="" id="single_price_<?=$product->id;?>"/>
<span id="varcol_price_<?=$product->id;?>">
<?=$sign;?>
<?php if($productcolorsizeprices != "" && $productcolorsizeprices != null){ echo number_format((float)($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', '');  }?>
</span>
<!-- <span class="discountprice"></span> -->
</p>
</span>
</div>
</div>
</div>
</div>
<!-- <div> -->



<!-- <p class="css-mtc8vw cart-item-price"><=$sign;?> -->
<!-- <input type="hidden" value="" id="single_price_<=$product->id;?>"/> -->
<!-- <span id="varcol_price_<=$product->id;?>"> -->
<!-- <php if($productcolorsizeprices != "" && $productcolorsizeprices != null){ echo number_format((float) ($productcolorsizeprice * $cart['quantity']) * $currency_price, 2, '.', '');  }?> -->
<!-- </span> -->
<!-- <span class="discountprice"></span> -->
<!-- </p> -->

<!-- </div> -->
</div>
</div>
</div>

</a>


</div>



<?php $i++; ?>

<?php

if($productcolorsizeprices != "" && $productcolorsizeprices != null){

$total_quantity_price= $productcolorsizeprice * $cart->quantity;

}else{
$total_quantity_price = 0;
}

$totalamount = $totalamount + $total_quantity_price;

?>

<?php } } ?>




<!-- customize cart product -->

<?php if($cart->status == 1){


  $custom_product= App\adminmodel\CustomizeProduct::wherenull('deleted_at')->where('id',$cart->product_id)->where('is_active',1)->first();

  if(!empty($custom_product)){

  $productmetalstoneimg= App\adminmodel\CustomizeProductStone::wherenull('deleted_at')->where('product_id',$cart->product_id)->where('name',$cart->stone)->where('cust_metal_id',$cart->metal)->where('is_active',1)->first();

  if(!empty($productmetalstoneimg)){
    $custimg= $productmetalstoneimg->stone_product_image;
  }else{
    $custimg= "";
  }
  ?>




  <div class="cart-item-card css-bi61qn ee3or4p0">
  <div class="css-on8ti6 ee3or4p2">
    <div>
      <div class="css-z4200p ee3or4p3">
        <a href="/jewellery/mesh-cluster-ring-jr04526-wyp900.html">
          <img id="pro_img1" class="css-1sa1z8f e1nln7oz0" data-src="" data-srcset="" srcset="" src="<?=$custimg;?>" alt="product-image">
        </a>
      </div>
    </div>
    <div class="css-1tnay0n cart-item-content">
    <div class="row p-0">
      <span class="text-right"> <a onclick="removeFromTblCart(<?=$cart->id;?>)" href="javascript:void(0);" >
        <img src="https://img.icons8.com/external-becris-lineal-becris/25/000000/external-cancel-mintab-for-ios-becris-lineal-becris.png" style="width: 12px;"/>
      </a></span>
      <div class="col-md-3">
        <!-- <div class="col-md-6"> -->
          <h5 style="top:2px"><b>Product Name</b></h5>
            <p class="css-10xun30 cart-item-product-name"><?=$custom_product->name;?></p>
          <!-- </div> -->
          <!-- <div class="col-md-6">
          </div> -->
      </div>
      <div class="col-md-9">
        <div class="col-md-3">
          <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
            <h5 style="top:2px"><b>Metal</b></h5>
          <div class="drop-down css-1geyf33 ey3901i0 p-2" style="margin-right:0px;margin-left:0px;">
          <?php

          $metal_da= App\adminmodel\CustomizeMetalColor::wherenull('deleted_at')->where('is_active', 1)->where('id', $cart->metal)->first();
          if(!empty($metal_da)){
          $metal_id= $metal_da->id;
          $metal_name= $metal_da->name;
          $metal_image= $metal_da->image;
          }else{
          $metal_id= "";
          $metal_name= "";
          $metal_image= "";
          }

          echo $metal_name;
          ?>


          </div>

          </div>
        </div>
        <div class="col-md-2">
          <?if(!empty($cart->size)){?>
          <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
            <h5 style="top:2px"><b>Size</b></h5>
          <div class="drop-down css-1geyf33 ey3901i0">
          <?=$cart->size;?>
          </div>
          </div>
          <?}?>
        </div>
        <div class="col-md-2">

          <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
            <h5 style="top:2px"><b>Stone</b></h5>
          <div class="drop-down css-1geyf33 ey3901i0  p-2"  style="margin-right:0px;margin-left:0px;overflow:visible !important;white-space: unset !important;">

          <?=$productmetalstoneimg->name;?>

          </div>

          </div>
        </div>

        <div class="col-md-3 ">
        <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
        <h5 style="top:2px"><b>Quantity</b></h5>
        <span class="css-qhuuwl eay09df1">
        <input type="number" max="5" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');"  style="margin-left:0px;width:70% !important;" id="qt_<?=$custom_product->id;?>" value="<?=$cart->quantity;?>" min="1" onchange="updateQuantityCartOnline(event ,<?=$cart->id;?>,<?=$custom_product->id;?> )" style="30% !important" />
        </span>
        </div>
        </div>
        <div class="col-md-2">
        <div  class="setprice" style="">
          <h5 class="ml-3"><b>Price</b></h5>
          <span style="font-size:30px;"class="priceres">
            <?php


            $productcolorsizeprices= App\adminmodel\CustomizeProductStone::wherenull('deleted_at')->where('product_id',$cart->product_id)->where('name',$cart->stone)->where('cust_metal_id',$cart->metal)->where('is_active',1)->first();

            if(!empty($productcolorsizeprices)){
              $productcolorsizeprice= $productcolorsizeprices->price;
            }else{
              $productcolorsizeprice= 0;
            }

            ?>

        <p class="css-mtc8vw cart-item-price prices"style="">
        <input type="hidden" value="" id="single_price_<?=$custom_product->id;?>"/>
        <span id="varcol_price_<?=$custom_product->id;?>">
        <?=$sign;?>
        <?php if($productcolorsizeprices != "" && $productcolorsizeprices != null){ echo number_format((float) ($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', ''); }?>
        </span>
        <!-- <span class="discountprice"></span> -->
        </p>
        </span>
        </div>
        </div>
      </div>
  </div>

  </div>
  </div>
  <!-- <div class="crossbtn">
    <a onclick="removeFromTblCart(<?=$cart->id;?>)" href="javascript:void(0);" >
  <img src="https://img.icons8.com/external-becris-lineal-becris/25/000000/external-cancel-mintab-for-ios-becris-lineal-becris.png" style="width: 12px;"/>
      </a>
  </div> -->
  </div>
  <?php $i++; ?>

  <?php

  if($productcolorsizeprices != "" && $productcolorsizeprices != null){

  $total_quantity_price= $productcolorsizeprice * $cart->quantity;

  }else{
  $total_quantity_price = 0;
  }

  $totalamount = $totalamount + $total_quantity_price;
  ?>


<?php } } ?>


<!-- engrave cart product -->
<?php if($cart->status == 2){


    $engrave_product= App\adminmodel\EngraveProduct::wherenull('deleted_at')->where('id',$cart->product_id)->where('is_active',1)->first();

    if(!empty($engrave_product)){



    if(!empty($engrave_product->image)){
      $custimg= $engrave_product->image;
    }else{
      $custimg= "";
    }
    ?>




    <div class="cart-item-card css-bi61qn ee3or4p0">

    <div class="css-on8ti6 ee3or4p2">


      <div>
        <div class="css-z4200p ee3or4p3">
          <a href="/jewellery/mesh-cluster-ring-jr04526-wyp900.html">
            <img id="pro_img1" class="css-1sa1z8f e1nln7oz0" data-src="" data-srcset="" srcset="" src="<?=$custimg;?>" alt="product-image">
          </a>
        </div>
      </div>

      <!-- <div> -->
        <div class="css-1tnay0n cart-item-content">

          <div class="row p-0">
            <span class="text-right"> <a onclick="removeFromTblCart(<?=$cart->id;?>)" href="javascript:void(0);" >
              <img src="https://img.icons8.com/external-becris-lineal-becris/25/000000/external-cancel-mintab-for-ios-becris-lineal-becris.png" style="width: 12px;"/>
            </a></span>

            <div class="col-md-3">
              <h5 style="top:2px"><b>Product Name</b></h5>
              <p class="css-10xun30 cart-item-product-name"><?=$engrave_product->name;?></p>
            </div>
            <div class="col-md-9">
              <div class="col-md-2">
                <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
                <h5 style="top:2px">Text:</h5>
                <div class="drop-down css-1geyf33 ey3901i0" style="margin:0px !important;">
                <?php
echo $cart->engrave_text;
                ?>


                </div>

                </div>
              </div>
              <div class="col-md-3">
                <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
                  <h5 style="top:2px"><b>Font Family</b></h5>
                <div class="drop-down css-1geyf33 ey3901i0">

                  <?=$cart->font_family;?>

                </div>

                </div>
              </div>
              <div class="col-md-2">
                <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
                  <h5 style="top:2px"><b>Font Size</b></h5>
                <div class="drop-down css-1geyf33 ey3901i0">

                  <?=$cart->font_size."px";?>

                </div>





                </div>
              </div>

              <div class="col-md-3">
                <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
                  <h5 style="top:2px"><b>Quantity</b></h5>
                  <span class="css-qhuuwl eay09df1">
                  <input type="number" max="5" onkeydown="if(event.key==='.'){event.preventDefault();}"  oninput="event.target.value = event.target.value.replace(/[^0-9]*/g,'');" id="qt_<?=$engrave_product->id;?>" value="<?=$cart->quantity;?>" min="1" onchange="updateQuantityCartOnline(event ,<?=$cart->id;?>,<?=$engrave_product->id;?> )" style="margin-left:0px;margin-right:0px; width:70%;" />
                  </span>

                </div>
              </div>

              <div class="col-md-2">
                <div class="cart-item-qty /*css-1kb8zzg*/ eay09df2">
                  <h5 class="ml-3"><b>Price</b></h5>
                  <span style="font-size:30px;"class="priceres">
                  <?php


                  $productcolorsizeprices= $engrave_product->base_price;

                  if(!empty($productcolorsizeprices)){
                    $productcolorsizeprice= $productcolorsizeprices;
                  }else{
                    $productcolorsizeprice= 0;
                  }

                  ?>

                  <p class="css-mtc8vw cart-item-price prices"><?=$sign;?>
                  <input type="hidden" value="" id="single_price_<?=$engrave_product->id;?>"/>
                  <span id="varcol_price_<?=$engrave_product->id;?>">
                  <?php if($productcolorsizeprices != "" && $productcolorsizeprices != null){ echo number_format((float) ($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', ''); }?>
                  </span>
                  <span class="discountprice"></span>

                </div>
              </div>
            </div>
          </div>






          <!-- <div class="crossbtn" style="text-align: right; margin-right:-5rem;">
            <a onclick="removeFromTblCart(<?=$cart->id;?>)" href="javascript:void(0);" >
          <img src="https://img.icons8.com/external-becris-lineal-becris/25/000000/external-cancel-mintab-for-ios-becris-lineal-becris.png" style="    width: 12px;"/>
              </a>
          </div> -->

        <!-- <p class="css-10xun30 cart-item-product-name"><?=$engrave_product->name;?></p> -->
          <!-- <p class="css-1eusqjf cart-item-sku"></p> -->
          <!-- <div class="css-106pwyk cart-item-update-options">
            <div class="cart-item-size css-1dpejff eay09df2"> -->

    <!-- <div class="cart-item-qty css-1kb8zzg eay09df2">
    <span>Text : </span>
    <div class="drop-down css-1geyf33 ey3901i0">
  <?php

  echo $cart->engrave_text;
  ?>


    </div>

    </div> -->


    <!-- <div class="cart-item-qty css-1kb8zzg eay09df2">
    <span>Font Family</span>
    <div class="drop-down css-1geyf33 ey3901i0">

      <?=$cart->font_family;?>

    </div>

    </div> -->

    <!-- <div class="cart-item-qty css-1kb8zzg eay09df2">
    <span>Font Size</span>
    <div class="drop-down css-1geyf33 ey3901i0">

      <?=$cart->font_size."px";?>

    </div>

    </div> -->



    <!-- </div> -->

    <!-- <div class="cart-item-qty css-1kb8zzg eay09df2"><span>Quantity :</span>
    <span class="css-qhuuwl eay09df1">
    <input type="number" id="qt_<?=$engrave_product->id;?>" value="<?=$cart->quantity;?>" min="1" onchange="updateQuantityCartOnline(event ,<?=$cart->id;?>,<?=$engrave_product->id;?> )" />
    </span>

    </div> -->

    <!-- </div>
    </div> -->
    <!-- <div style="margin-left: 15px;"> -->

    <!-- <?php


    $productcolorsizeprices= $engrave_product->base_price;

    if(!empty($productcolorsizeprices)){
      $productcolorsizeprice= $productcolorsizeprices;
    }else{
      $productcolorsizeprice= 0;
    }

    ?>

    <p class="css-mtc8vw cart-item-price"><?=$sign;?>
    <input type="hidden" value="" id="single_price_<?=$engrave_product->id;?>"/>
    <span id="varcol_price_<?=$engrave_product->id;?>">
    <?php if($productcolorsizeprices != "" && $productcolorsizeprices != null){ echo number_format((float) ($productcolorsizeprice * $cart->quantity) * $currency_price, 2, '.', ''); }?>
    </span>
    <span class="discountprice"></span> -->
    </p>

    </div>
    <!-- </div> -->
    </div>

    </div>
    <?php $i++; ?>

    <?php

    if($productcolorsizeprices != "" && $productcolorsizeprices != null){

    $total_quantity_price= $productcolorsizeprice * $cart->quantity;

    }else{
    $total_quantity_price = 0;
    }

    $totalamount = $totalamount + $total_quantity_price;
    ?>


  <?php } } ?>


@endforeach
@endif


</div>


<?php  $totalamount = number_format((float)$totalamount, 2, '.', ''); ?>


</div>
      </div>
      <div class="col-lg-3 col-md-3" style="position:sticky;right: 0;top:0;">
        <div class="css-13z9nd2 e1r0aisc0"  style="position: sticky;
  top: 207px !important;">
          <!-- <button class="css-1bvn1b6 e1r0aisc4">Apply Coupon</button> -->
          <h5 data-name="order-summary-title" class="css-meo3va e1r0aisc1">Order Summary</h5>

          <div id="order-summary" data-name="order-summary-box" class="css-ry2i6z e1r0aisc2">
            <p class="subtotal" >Subtotal <span class="price-values"><?=$sign;?>
              <span id="subtotal"><?=number_format((float)$totalamount * $currency_price, 2, '.', '');?></span>
            </span>
            </p>
            <!-- <p class="discount">You Saved <span class="price-values">- &#8377;6,253</span>
            </p>
            <p class="discount">Coupon Discount <span class="price-values">
              <a class="css-6yxsag epg3bs00">Apply Coupon</a></span>
            </p>
            <p class="shipping-charge">Delivery Charge <span>(Standard)</span>
               <span class="price-values"><span class="free">FREE</span></span>
             </p> -->
             <b>
               <p class="price-breakup-final">Estimated Total <span class="price-values"><?=$sign;?>
              <span id="total_cost"> <?=number_format((float)$totalamount * $currency_price, 2, '.', '');?></span>
               </span>
               </p>
             </b>
           </div>
           <div class="css-1c2kahj web_che">
              <div class="css-ijtbad epypi6q3">
                <!-- <p><?=$sign;?> <span><?=number_format((float)$totalamount * $currency_price, 2, '.', '');?></span></p>
                <a class="css-1usgn1r epypi6q4"> VIEW DETAILS</a> -->
              </div>
              <?php $counting_cart=0;?>
              @foreach ($cart_data as $lets_count)
                <?php $counting_cart=1;?>
              @endforeach

              @if ($counting_cart==1)
              <a href="<?=base_path?>checkout">
                <button class="epypi6q0 e1jmj0hg1 css-17fmasb e1jmj0hg0"><span class="erq4t6042 css-5whwel efp5dbi0"></span>Checkout Securely</button></a>
              @else
                  <a href="javascript:void(0)">
                    <button class="epypi6q0 e1jmj0hg1 css-17fmasb e1jmj0hg0"><span class="erq4t6042 css-5whwel efp5dbi0"></span>Checkout Securely</button></a>
              @endif

          </div>
       </div>
      </div>
    </div>
  </div>
</section>
<div class="css-1c2kahj mob_che">
   <div class="css-ijtbad epypi6q3">
     <p><?=$sign;?> <span><?=number_format((float)$totalamount, 2, '.', '');?></span></p>
     <a class="css-1usgn1r epypi6q4"> VIEW DETAILS</a>
   </div>
   <a href="<?=base_path?>checkout">
     <button class="epypi6q0 e1jmj0hg1 css-17fmasb e1jmj0hg0"><span class="erq4t6042 css-5whwel efp5dbi0"></span>Checkout Securely</button>
   </a>
</div>
</div>
<!-- not redirect from login page start -->
<?php $fromlogin= 0;?>
<!-- not redirect from login page end -->

<script>


$(document).ready(function() {
      // insertdatacartttbl();

      // location.reload();

      if(document.URL.indexOf("#")==-1){
          // Set the URL to whatever it was plus "#loaded".
          url = document.URL+"#loaded";
          location = "#loaded";
          //Reload the page using reload() method
          location.reload(true);
      }


});

// alert('dr');

// $(window).on('load', function() {
// alert('d');
//   // var insert_local= '<?=$fromlogin;?>';
//   // // alert(insert_local);
//   // if(insert_local == 1){
//   //   insertdatacartttbl();
//   // }
//
//   location.reload();
//   location.reload();
// });

// loadCartItemsInView();
//
// function loadCartItemsInView(){
//   var cartItems = [];
//      $("#cart_items_tbody").html('');
//   if(localStorage.getItem("cartItems") !== null){
//     cartItems = JSON.parse(localStorage.getItem("cartItems"));
//     if(cartItems.length != 0){
//     var base_url = $("#base_path").val();
// 		// alert(base_url);
//     var cart_subtotal = 0;
//      var totalamount= 0;
//      $("#totalCartItems").text('');
//      $("#totalCartItems").text(cartItems.length);
//     //$("#offline_cart_loader").show();
//    for(c=0;c<cartItems.length;c++){
//
//      var pro_id = cartItems[c].product_id;
//      var variant_id = cartItems[c].variant_id;
//      var color_id = cartItems[c].color_id;
//      var quantity = cartItems[c].quantity;
//
// // var cart_data;
//
// // alert('syxqty');
// // alert(quantity);
// 		 $.ajax({
// 	   url:base_url+'get_cart_pro_full_data',
// 	   method: 'post',
// 	   data: {product_id: pro_id, variant_id: variant_id, color_id: color_id, quantity: quantity, _token: '{{csrf_token()}}'},
// 	   dataType: 'json',
// 	   success: function(response){
// 	 // alert(response);
// 	 console.log(response);
// 	   if(response.data == true){
//
// // alert('yay');
// 	  //   var pro_color_d= response.product.name;
// 		//
// 	  // alert(pro_color_d);
// var a= 1;
// var b = 5;
//
// var cart_data = '<div class="cart-item-card css-bi61qn ee3or4p0">'
// +'<div class="css-on8ti6 ee3or4p2">'
//   +'<div>'
//     +'<div class="css-z4200p ee3or4p3">'
//       +'<a href="/jewellery/mesh-cluster-ring-jr04526-wyp900.html">'
//         +'<img class="css-1sa1z8f e1nln7oz0" data-src="" data-srcset="" srcset="" src="'+response.product.image1 +'" alt="product-image">'
//       +'</a>'
//     +'</div>'
//   +'</div>'
//   +'<div class="css-1tnay0n cart-item-content">'
//   +	'<div>'
//     +	'<p class="css-10xun30 cart-item-product-name">'+response.product.name+'</p>'
//       +'<p class="css-1eusqjf cart-item-sku">'+response.product.sku_id+'</p>'
//       +'<div class="css-106pwyk cart-item-update-options">'
//         +'<div class="cart-item-size css-1dpejff eay09df2">'
//           +'<span>Variant :</span>'
// +'<div class="drop-down css-1geyf33 ey3901i0">'
//
// +'<select class="size_selct" pro_id="'+response.product.id+'"'
// +'id="size_selct_'+response.product.id+'">'
// +'<option>---select value---</option>';
//
// var pro_clr_isz= response.productcolorsize;
// var pro_vari= response.size;
//
// $.each(pro_clr_isz, function(i, item) {
//   $.each(pro_vari, function(i1, item1) {
//     if(item1.id == item.size_id){
//  cart_data = cart_data +'<option value="'+ item1.id +'">'+ item1.name +'</option>';
// }
//   });
//  });
// cart_data = cart_data +'</select>'
//
// +'</div>'
// +'<div class="cart-item-qty css-1kb8zzg eay09df2">'
// +'<span>Color :</span>'
// +'<div class="drop-down css-1geyf33 ey3901i0">'
//
// +'<select id="color_selct_'+response.product.id+'" class="color_selct" pro_id="'+response.product.id+'">'
// +'<option>---select color---</option>';
//
//
// var pro_color= response.colors;
//
// $.each(pro_clr_isz, function(i, item) {
//   $.each(pro_color, function(i1, item1) {
//     if(item1.id == item.color_id){
//  cart_data = cart_data +'<option value="'+ item1.id +'">'+ item1.name +'</option>';
// }
//   });
//  });
//
//
// cart_data = cart_data +'</select>'
//
// +'</div>'
//
// +'</div>'
// +'</div>'
//
// +'<div class="cart-item-qty css-1kb8zzg eay09df2"><span>Quantity :</span>'
// +'<span class="css-qhuuwl eay09df1">'
// +'<input type="number" id="qt_'+response.product.id+'"' +'value="'+quantity+'" min="1"' +'onchange="updateQuantityCartOffline(event , '+response.product.id+')" />'
// +'</span>'
//
// +'</div>'
//
// +'</div>'
// +'</div>'
// +'<div>'
//
//
//
// +'<p class="css-mtc8vw cart-item-price">&#8377;'
// +'<input type="hidden" value=""' +'id="single_price_'+response.product.id+'"/>'
// +'<span id="varcol_price_'+response.product.id+'">'
// +response.productcolorsizeprice.price * quantity
// +'</span>'
// +'<span class="discountprice">Save &#8377;2,256</span>'
// +'</p>'
//
// +'</div>'
// +'</div>'
// +'</div>'
// +'<div class="css-di2q33 cart-item-options">'
// +'<div class="css-1vspfwe e12cosct0">'
//   +'<button class="css-clidyq e1jmj0hg0"' +'onclick="removeFromCart('+response.product.id+')">Remove</button>'
//   +'<button class="css-c9ymxf e1jmj0hg0">Move to Wishlist</button>'
// +'</div>'
// +'</div>'
// +'</div>';
//
//
//
//
//
// $("#cart_items_tbody").append(cart_data);
//
// var pro_price= response.productcolorsizeprice.price;
// var pro_qty_price= pro_price * quantity;
// // alert(pro_price);
// // alert(quantity);
// // alert(pro_qty_price);
// totalamount= totalamount + pro_qty_price;
// // alert(totalamount);
//
//
// $("#subtotal").text('');
// $("#total_cost").text('');
//
// $("#subtotal").text(totalamount);
// $("#total_cost").text(totalamount);
//
// 	   // var options;
// 	   // $.each(pro_color_d, function(i, item) {
// 		 //
// 	   //   if(i == 0){
// 	   //   options= '<option value="" selected>---select color---</option>';
// 	   //   }else{
// 	   //     options='';
// 	   //   }
// 		 //
// 	   //  options= options+'<option value="'+item.id+'">'+item.name+'</option>';
// 		 //
// 	   //  $(".color_selct").append(options);
// 	   // });
//
// 	   }
// 	   else{
// 	   alert('hiii');
// 	   }
// 	   }
// 	   });
//
//
// // alert(totalamount);
//
// // $("#product_id").val(pro_encoded_id);
// // $("#product_name").val(pro_db_name);
// // $("#quantity").val(product_c_qty);
// //$("#total_amount").val(cart_subtotal);
//
//
//
//
//
//
//
//
//
//
//
//              // $("#checkout-form").prepend(checkout_data);
//
//
//
//
//              //$(".checkout-btn").attr("disabled", false);
//
//              //$("#offline_cart_loader").hide();
//
//
//
//    }
//
//
//    // $("#totalCartAmount").text(totalamount);
//    // $("#sub_total_Amount").text(totalamount);
// // $("#offline_cart_loader").hide();
// }else{
//   var noItem ='<tr style="text-align:center" ><td colspan="7" class="no_item" style="display:table-cell;">No Items in Cart</td></tr>';
//    $("#cart_items_tbody").prepend(noItem);
//     //$("#cart_total_price").text(0);
//       // $("#cartitem-counts").text(0);
//     //$(".checkout-btn").attr("disabled", true);
//
// }
// }else{
//   var noItem ='<tr  style="text-align:center"><td colspan="7" style="display:table-cell;">No Items in Cart</td></tr>';
//    $("#cart_items_tbody").prepend(noItem);
//    //$("#cart_total_price").text(0);
//     //  $("#cartitem-counts").text(0);
//    //$(".checkout-btn").attr("disabled", true);
//
// }
// }
//


</script>

<script>
$(document).on('change', '.size_selct', function() {
// Does some stuff and logs the event to the console

// alert("u");
var prod_id = $(this).attr('pro_id');
var selectedsize = $("#size_selct_"+prod_id).val();

$("#color_selct_"+prod_id).html("");
var base_path = $("#base_path").val();
// alert(selectedsize);
// alert(prod_id);
$.ajax({
url:base_path+'get_color_data',
method: 'post',
data: {size_id: selectedsize, product_id: prod_id, _token: '{{csrf_token()}}'},
dataType: 'json',
success: function(response){
// alert(response);

console.log('un');
console.log(response);
if(response.data == true){


var pro_color_d= response.productColordata;

// alert(pro_color_d);

var options;
$.each(pro_color_d, function(i, item) {

  if(i == 0){
  options= '<option value="" selected>---select color---</option>';
  }else{
    options='';
  }

 options= options+'<option value="'+item.color_id+'">'+item.name+'</option>';

 $("#color_selct_"+prod_id).append(options);
});

}
else{
// alert('hiii');
}
}
});


});
</script>

<script>

//onchang price on select color

$(document).on('change', '.color_selct', function() {
// Does some stuff and logs the event to the console

// alert("u");
var prod_id = $(this).attr('pro_id');
var cart_id = $(this).attr('cart_id');
var selectedcolor = $("#color_selct_"+prod_id).val();
// var selectedsize = $("#size_selct_"+prod_id).val();
var quantity = $("#qt_"+prod_id).val();


var base_path = $("#base_path").val();
// alert(selectedcolor);
// alert(selectedsize);
// alert(prod_id);
// alert(cart_id);
// die();
$.ajax({
url:base_path+'get_color_price',
method: 'post',
data: {color_id: selectedcolor, product_id: prod_id, cart_id: cart_id, _token: '{{csrf_token()}}'},
dataType: 'json',
success: function(response){
// alert(response);
console.log(response);
if(response.data == true){

var pro_color_d= response.productColordata;
// alert(pro_color_d);

if(pro_color_d != null ){
var mrp= response.productColordata.mrp;
var price= response.productColordata.price;

if(quantity == 0){
  quantity = 1;
}

var qty_price= price * quantity;
// var price= "12";
}else{
var mrp= "N/A";
var price= "N/A";
var qty_price= "N/A";
}

// alert(response.pro_color_d);
// $("#var_col_mrp_"+prod_id).text("");
$("#varcol_price_"+prod_id).text("");

// $("#var_col_mrp_"+prod_id).text(mrp);
$("#varcol_price_"+prod_id).text(qty_price.toFixed(2));
 $('#pro_img1').attr('src', pro_color_d.image1);

//single product price
$("#single_price_"+prod_id).val("");
$("#single_price_"+prod_id).val(price.toFixed(2));


location.reload();
}
else{
// alert('hiii');
}
}
});


});
</script>

<script>

//Update quantity in table onChange
function updateQuantityCartOnline(event ,cart_id, product_id){
var quantity = event.target.value;

if(quantity == 0){
  alert('Less than 1 quantity is not allowed.')
  quantity = 1;
}

// alert(quantity);
// alert(cart_id);
// alert(product_id);
var base_path = $("#base_path").val();
$.ajax({
 url:base_path+'update_qty_in_tbl_cart',
 method: 'post',
 data: {cart_id: cart_id, product_id: product_id, quantity: quantity, _token: '{{csrf_token()}}' },
 dataType: 'json',
 success: function(response){
// alert("yay");
// alert(response.data);

//delete product from localStorage (if exist)



location.reload();


}
});

}

//remove item from cart onClick
function removeFromTblCart(cart_id){

var base_path = $("#base_path").val();

$.ajax({
 url:base_path+'delete_from_tbl_cart',
 method: 'post',
 data: {cart_id: cart_id, _token: '{{csrf_token()}}' },
 dataType: 'json',
 success: function(response){
// alert("yay");
//   alert(response.data);



location.reload();


}
});

}

</script>
@endsection
