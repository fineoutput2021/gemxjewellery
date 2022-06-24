@extends('frontend.layout')
@section('main')
   <style type="text/css">
   	/*! CSS Used from: Embedded */
*{margin:0px;padding:0px;box-sizing:border-box;}
::-moz-focus-inner{border:0;}
::-webkit-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
::-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-ms-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:focus{outline:none;}
img{border:0;}
/*! CSS Used from: Embedded */
.css-1abnf4d{font-size:1.1rem;}
/*@media (min-width: 993px){
.css-1abnf4d{font-size:1.4rem;padding:0px 25px 0px 20px;flex:3 1 0%;position:sticky;top:72px;align-self:flex-start;}
}*/
.css-5rnr3f{display:flex;height:42px;padding:0px 16px;background-color:rgb(246, 239, 246);-webkit-box-align:center;align-items:center;-webkit-box-pack:justify;justify-content:space-between;}
@media (min-width: 993px){
.css-5rnr3f{display:none;}
}
.css-5rnr3f .title{font-family:mulilight;color:rgb(35, 21, 53);position:relative;}
.css-5rnr3f .title .text{margin-right:10px;}
.css-5rnr3f .title i{position:absolute;}
.css-5rnr3f .title i.down-arrow{top:3px;}
.css-5rnr3f .price{font-family:mulisemibold;text-align:right;color:rgb(35, 21, 53);font-size:1.6rem;}
.css-18g5l5m{padding:20px 16px;}
.css-18g5l5m .line-item{display:flex;-webkit-box-pack:justify;justify-content:space-between;-webkit-box-align:center;align-items:center;}
.css-18g5l5m .price{font-family:mulisemibold;text-align:right;color:rgb(35, 21, 53);}
.css-18g5l5m .shipping-type{margin-left:5px;color:rgb(51, 51, 51);}
.css-18g5l5m .sub-total{margin-bottom:10px;}
.css-17ss6c3{border-top:1px solid rgb(230, 220, 230);padding:10px 16px 20px;}
.css-17ss6c3.line-item{display:flex;-webkit-box-pack:justify;justify-content:space-between;-webkit-box-align:center;align-items:center;}
.css-17ss6c3 .price{font-family:mulisemibold;text-align:right;color:#eec782;font-size:1.6rem;}
@media (min-width: 993px){
.css-17ss6c3 .price{font-size:2rem;}
}
.css-1wird2e .cart-item{padding:20px 16px;display:flex;border-bottom:1px solid rgb(230, 220, 230);}
.css-1wird2e .cart-item .thumbnail{flex:1 1 0%;}
.css-1wird2e .cart-item .thumbnail img{background:rgb(242, 242, 242);width:48px;}
@media (min-width: 993px){
.css-1wird2e .cart-item .thumbnail img{width:60px;}
}
.css-1wird2e .cart-item .details{flex:5 1 0%;margin-left:16px;line-height:1.64;color:rgb(35, 21, 53);}
.css-1wird2e .cart-item .details .title{display:inline;}
.css-1wird2e .cart-item .details .title{padding-right:4px;}
.css-1wird2e .cart-item .details .delivery > span{font-family:muliregular;}
.css-1wird2e .cart-item .price{font-family:mulisemibold;text-align:right;color:rgb(35, 21, 53);display:flex;align-items:flex-end;-webkit-box-pack:end;justify-content:flex-end;flex-direction:column;flex:1 1 0%;}
.css-1wird2e .cart-item .price .strikethrough{text-decoration:line-through;color:rgb(151, 151, 151);}
.css-yqnuxd{padding:15px 16px 10px;font-family:begummedium;font-size:1.8rem;color:rgb(35, 21, 53);}
@media (max-width: 992px){
.css-yqnuxd{display:none;}
}
.css-1bh2wnb{font-family:mulilight;overflow-y:hidden;transition:max-height 1s ease-in-out 0s;background-color:rgb(238, 238, 238);max-height:0px;}
@media (min-width: 993px){
.css-1bh2wnb{max-height:2000px;background-color:#fff8ed;}
}
.css-zw473k{border-style:solid;border-color:black;border-image:initial;border-width:0px 1px 1px 0px;display:inline-block;padding:3px;transform:rotate(45deg);}
/*! CSS Used from: Embedded */
*,::before,::after{background-repeat:no-repeat;}
::before,::after{text-decoration:inherit;vertical-align:inherit;}
::-moz-selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
::selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
img{vertical-align:middle;}
img{border-style:none;}
::-moz-focus-inner{border-style:none;padding:0;}
:-moz-focusring{outline:1px dotted ButtonText;}
::-webkit-input-placeholder{color:inherit;opacity:.54;}
*{
	font-size: 13px;
}

/*new start 1*/

/*! CSS Used from: Embedded */
button{background:transparent;border:none;}
*{margin:0px;padding:0px;box-sizing:border-box;}
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
/*! CSS Used from: Embedded */
.css-aw72tv{padding:16px;}
@media (min-width: 993px){
.css-aw72tv{padding:24px 32px;}
}
.css-ld7inj{margin:0px;padding:0px;display:block;text-decoration:none;outline:0px;cursor:pointer;font-family:muliregular;color:rgb(222, 87, 229);font-size:inherit;}
@media (max-width: 992px){
.css-ld7inj{cursor:default;}
}
.css-1s1wqwg{width:100%;max-width:400px;min-height:calc(100vh - 120px);display:flex;flex-direction:column;-webkit-box-pack:center;justify-content:center;margin:0px auto;}
.css-1s1wqwg > button{margin-bottom:22px;}
@media (min-width: 993px){
.css-1s1wqwg{min-height:auto;margin:30px auto;max-width:340px;}
}
.css-1vvjsf5{font-size:1.4rem;font-family:BegumRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;color:rgb(35, 21, 53);margin-bottom:26px;}
.css-k3qi9z{font-family:BegumSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1fjoggo{position:relative;outline:none;cursor:pointer;user-select:none;-webkit-tap-highlight-color:transparent;width:100%;border-radius:5px;box-sizing:border-box;margin:5px 0px;font-size:1.4rem;color:rgb(255, 255, 255);background:rgb(238 199 130);border:none;font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;height:36px;}
.css-fef3d3{font-size:1.2rem;font-family:MuliLight, "Helvetica Neue", Helvetica, Arial, sans-serif;display:flex;margin-bottom:10px;}
.css-14mqcli{font-size:1.2rem;font-family:MuliLight, "Helvetica Neue", Helvetica, Arial, sans-serif;color:rgb(157, 159, 164);}
.css-1fk9qj8 .step-child{background:rgb(249, 249, 249);transition:max-height 0.6s ease-in-out 0s;overflow-y:hidden;position:relative;margin:0px;max-height:734px;}
@media (max-width: 992px){
.css-1fk9qj8 .step-child{margin:0px;padding:0px;max-height:734px;}
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
@font-face{font-family:'BegumRegular';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/dc179aa46e00f2b7065217532f8b3514.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/3f82bc99b8cedb50fa6f88a1723f9ec5.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/a4950c8d6a78f64202a58e580031e95d.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'BegumSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/6fcd125d1e90d56657a28a91f0642621.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/cd4d30b8acd3d870e5941597a4aa6346.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/165fc3bf1497781325b15ae965e055fc.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/f880aba0c9b501d3d43bb86f52836271.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/5b67bf433f6012ec163bb17bf860edf1.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/6504a5cd73e82bd72d1d3ded33279d35.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliLight';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/eeb61d9dad436af6d4181989b63cba64.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/a5fc1c72a20616d26b424c0aae872cf5.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/49d9e837e5d0d18067952a4edc9bfa0b.ttf) format('ttf');font-display:swap;}

/*new start 1*/


/*new start 2*/
/*! CSS Used from: Embedded */
button{background:transparent;border:none;}
*{margin:0px;padding:0px;box-sizing:border-box;}
button{outline:0;}
::-moz-focus-inner{border:0;}
::-webkit-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
::-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-ms-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:focus{outline:none;}
h3{font-family:'latobold';font-weight:normal;}
button{border:0;border-width:0;background:transparent;outline:0;}
input:focus,textarea:focus,button:focus{outline:none!important;}
button,input,textarea{font-size:1.6rem;}
/*! CSS Used from: Embedded */
.css-1rpdsnf{text-align:left;padding:16px;width:100%;}
@media (min-width: 993px){
.css-1rpdsnf{padding:24px 32px;}
}
.css-1rpdsnf button{width:100%;font-size:1.4rem;max-width:440px;}
@media (max-width: 992px){
.css-1rpdsnf{min-height:90vh;}
}
.css-1rpdsnf .optional{color:rgb(173, 169, 173);}
.css-1issayh{position:relative;outline:none;cursor:pointer;height:40px;user-select:none;-webkit-tap-highlight-color:transparent;width:100%;border-radius:5px;box-sizing:border-box;font-family:inherit;margin:5px 0px;font-size:1.4rem;color:rgb(255, 255, 255);background:linear-gradient(to right, rgb(222, 87, 229), rgb(136, 99, 251));border:none;}
@media (min-width: 993px){
.css-1issayh{display:none;}
}
.css-1p32tn{max-width:440px;color:rgb(35, 21, 53);font-size:1.1rem;margin:2rem 0px;display:flex;-webkit-box-align:center;align-items:center;font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1p32tn > span{margin-right:1rem;}
.css-gmx734{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -150px -965px / 832px no-repeat;display:block;cursor:pointer;width:70px;height:24px;}
@media (max-width: 992px){
.css-gmx734{cursor:default;}
}
.css-1tz7aqt{display:flex;list-style:none;overflow-x:auto;}
.css-12z8bwj{position:relative;padding-bottom:220px;margin-right:20px;min-width:204px;}
.css-12z8bwj span{font-size:1.2rem;}
.css-12z8bwj::after{content:"";width:204px;height:204px;position:absolute;left:0px;bottom:0px;background-image:url(https://cdn.caratlane.com/media/static/images/App-gift/Shaya-Giftpack-1.png);background-size:contain;}
.css-1oobp6f{margin:20px 0px;}
.css-1oobp6f .gift-message{padding-top:20px;}
.css-1oobp6f .message-text{font-family:BegumMedium, "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:1.4rem;line-height:18px;}
.css-1oobp6f .message-text > span{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:1.1rem;color:rgb(173, 169, 173);}
.css-1oobp6f .textarea-wrapper{position:relative;max-width:440px;}
.css-1oobp6f textarea{background:rgb(255, 255, 255);padding:16px;margin:10px 0px 12px;border-radius:4px;min-height:150px;border:1px solid rgb(233, 233, 233);width:100%;resize:none;font-size:1.2rem;}
.css-1oobp6f .maxcharacters{position:absolute;right:0.7rem;bottom:2rem;color:rgb(238 199 130);font-size:1.3rem;font-family:MuliLight, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1xmwgps{max-width:440px;font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:1.1rem;}
.css-1xmwgps > h3{font-family:inherit;color:rgb(35, 21, 53);margin:1rem 0px;}
.css-1xmwgps .drop-down{width:auto;margin:2rem 0px;font-family:MuliLight, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1xmwgps .xcl-message{display:flex;font-family:inherit;margin:1rem 0px;color:rgb(173, 169, 173);}
.css-1xmwgps .xcl-message .quote{font-family:MuliBold, "Helvetica Neue", Helvetica, Arial, sans-serif;font-size:1.8rem;margin:0px 1.1rem;color:rgb(145, 98, 249);}
.css-1xmwgps .recpOptin{margin:1rem 0px;}
.css-1xmwgps .recpOptin .label-text{color:rgb(104, 101, 104);}
@media (min-width: 993px){
.css-1xmwgps .recp-data{margin-bottom:2rem;display:flex;-webkit-box-align:center;align-items:center;}
.css-1xmwgps .recp-data .input-wrapper,.css-1xmwgps .recp-data .drop-down{-webkit-box-flex:1;flex-grow:1;}
.css-1xmwgps .recp-data .input-wrapper{flex-basis:31%;}
.css-1xmwgps .recp-data .drop-down{flex-basis:35%;margin:0px 0px 0px 1.2rem;}
}
.css-hk5r4{position:relative;}
body.fontLoaded .css-hk5r4{font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-1oy2vzl{font-family:mulilight;text-align:left;color:rgb(51, 51, 51);margin:0px;line-height:2;width:100%;border:1px solid rgb(233, 233, 233);border-radius:4px;cursor:text;outline:none;background:rgb(255, 255, 255);height:3.6rem;font-size:1.1rem;padding:0px 1rem;}
.css-17jx6pt{width:100%;position:relative;}
.css-1k5bqx1{display:inline-block;outline:none;width:100%;height:34px;background:rgb(255, 255, 255);position:relative;text-align:left;border:1px solid rgb(233, 233, 233);box-sizing:border-box;border-radius:2px;cursor:pointer;color:inherit;}
@media (max-width: 992px){
.css-1k5bqx1{cursor:default;}
}
.css-1k5bqx1::before{content:"";width:6px;height:100%;left:0px;top:0px;position:absolute;background:transparent;border-radius:2px 0px 0px 2px;}
.css-ga31n9{line-height:32px;padding:0px 0px 0px 12px;display:block;border-right:1px solid rgb(233, 233, 233);width:calc(100% - 30px);white-space:nowrap;text-overflow:ellipsis;font-size:inherit;color:rgb(157, 159, 164);}
.css-hvdi67{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -660px -10px / 832px;position:absolute;right:0px;top:0px;width:30px;height:100%;opacity:1;transition:transform 0.4s ease-in-out 0s;transform:rotate(0deg);}
.css-5vbtf8{position:absolute;visibility:hidden;transition:visibility 0.4s ease-in-out 0s;z-index:1;width:100%;border-width:0px 1px 1px;border-right-style:solid;border-bottom-style:solid;border-left-style:solid;border-right-color:rgb(233, 233, 233);border-bottom-color:rgb(233, 233, 233);border-left-color:rgb(233, 233, 233);border-image:initial;background:rgb(255, 255, 255);overflow-y:auto;border-top-style:initial;border-top-color:initial;list-style-type:none;max-height:150px;}
.css-tgywvg{line-height:36px;padding:0px 13px;font-size:1.1rem;background-color:rgb(255, 255, 255);border-bottom:1px solid rgba(222, 229, 239, 0.5);cursor:pointer;opacity:1;width:100%;list-style-type:none;}
@media (max-width: 992px){
.css-tgywvg{cursor:default;}
}
.css-tgywvg:hover{background:rgb(249, 249, 250);}
.css-18luvt1{display:flex;cursor:pointer;-webkit-box-align:center;align-items:center;}
.css-18luvt1 .check-icon{cursor:pointer;}
.css-18luvt1 .deselect{transform:scale(0.7);border:1px solid rgb(187, 187, 187);border-radius:50%;}
.css-18luvt1 .check-icon{margin-right:5px;}
.css-18luvt1 .label-text{width:100%;}
.css-1qy82bh{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -787px -500px / 832px no-repeat;display:block;cursor:pointer;width:28px;height:28px;}
@media (max-width: 992px){
.css-1qy82bh{cursor:default;}
}
.css-ejm13r{display:none!important;opacity:0!important;}
.css-1ci033r{position:relative;outline:none;cursor:pointer;height:40px;user-select:none;-webkit-tap-highlight-color:transparent;width:100%;border-radius:5px;box-sizing:border-box;font-family:inherit;margin:5px 0px;font-size:1.4rem;color:rgb(255, 255, 255);background:rgb(238 199 130);border:none;}
.css-10fvf5e .step-child{background:rgb(249, 249, 249);transition:max-height 0.6s ease-in-out 0s;overflow-y:hidden;position:relative;margin:0px;max-height:893px;}
@media (max-width: 992px){
.css-10fvf5e .step-child{margin:0px;padding:0px;max-height:893px;}
}
/*! CSS Used from: Embedded */
*,::before,::after{background-repeat:no-repeat;}
::before,::after{text-decoration:inherit;vertical-align:inherit;}
::-moz-selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
::selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
button,input,textarea{background-color:transparent;border-style:none;color:inherit;font-size:1em;margin:0;}
button,input{overflow:visible;}
button{text-transform:none;}
button{-webkit-appearance:button;}
::-moz-focus-inner{border-style:none;padding:0;}
:-moz-focusring{outline:1px dotted ButtonText;}
textarea{overflow:auto;resize:vertical;}
[type="checkbox"]{padding:0;}
::-webkit-input-placeholder{color:inherit;opacity:.54;}
button,input,label,textarea,[tabindex]{-ms-touch-action:manipulation;touch-action:manipulation;}
/*! CSS Used fontfaces */
@font-face{font-family:'MuliSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/f880aba0c9b501d3d43bb86f52836271.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/5b67bf433f6012ec163bb17bf860edf1.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/6504a5cd73e82bd72d1d3ded33279d35.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'BegumMedium';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/623d8d94f78e9ea23fd58623850a21dc.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/579a6f5a76111c97fa61e5f538629fb3.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/53956f6968fb42360426be3cad4cea42.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliRegular';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/743500abdf420f6f22f4ae16d9328886.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/087cb22996bfb0f35007679e3164d0b4.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/25dc88e941ae1c1b088df20ffaa98948.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliLight';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/eeb61d9dad436af6d4181989b63cba64.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/a5fc1c72a20616d26b424c0aae872cf5.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/49d9e837e5d0d18067952a4edc9bfa0b.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/7b7626b3d92105bde067f0d537412fd1.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/e6ce6f049b5adbda9d9f325a17d1104b.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/b168035f557a338a053902f942645342.ttf) format('ttf');font-display:swap;}
/*new end 2*/

/*new start 3*/
/*! CSS Used from: Embedded */
button{background:transparent;border:none;}
*{margin:0px;padding:0px;box-sizing:border-box;}
a{-webkit-text-decoration:none;text-decoration:none;color:#33363e;}
a,a:active,button,a:hover{outline:0;}
::-moz-focus-inner{border:0;}
::-webkit-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
::-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-ms-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:focus{outline:none;}
h3{font-family:'latobold';font-weight:normal;}
button{border:0;border-width:0;background:transparent;outline:0;}
input:focus,button:focus,a:focus{outline:none!important;}
button,input{font-size:1.6rem;}
/*! CSS Used from: Embedded */
.css-1jv0y87{font-family:begumregular;font-size:1.4rem;color:rgb(35, 21, 53);opacity:0.8;padding-bottom:10px;}
@media (min-width: 993px){
.css-1jv0y87{font-size:1.6rem;}
}
.css-ejm13r{display:none!important;opacity:0!important;}
.css-bmsfsb{font-family:begumregular;font-size:1.4rem;color:rgb(35, 21, 53);padding-bottom:10px;font-weight:600;opacity:1;}
@media (min-width: 993px){
.css-bmsfsb{font-size:1.6rem;}
}
.css-u5cjan{background:none;opacity:1;}
.css-u5cjan label{cursor:pointer;display:flex;flex-direction:row;-webkit-box-align:center;align-items:center;}
.css-u5cjan label .label-text{margin-left:0px;width:90%;}
.css-1arc75f{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -603px -377px / 832px no-repeat;width:28px;height:18px;display:inline-block;cursor:pointer;}
@media (max-width: 992px){
.css-1arc75f{cursor:default;}
}
.css-ld7inj{margin:0px;padding:0px;display:block;text-decoration:none;outline:0px;cursor:pointer;font-family:muliregular;color:rgb(222, 87, 229);font-size:inherit;}
@media (max-width: 992px){
.css-ld7inj{cursor:default;}
}
.css-lhv7fw{border:1px solid rgb(233, 233, 233);border-radius:4px;padding:8px 30px 8px 8px;max-width:350px;font-size:1.1rem;font-family:mulilight;position:relative;background:rgb(255, 255, 255);min-height:9rem;line-height:1.5;margin-bottom:20px;}
@media (min-width: 768px){
.css-lhv7fw{font-size:1.2rem;}
}
.css-lhv7fw .name{color:rgb(156, 89, 242);font-family:MuliSemiBold, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-lhv7fw .message{word-break:break-all;font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;}
.css-lhv7fw .invoice{font-style:italic;}
.css-lhv7fw .recpinfo{word-break:break-all;font-family:MuliRegular, "Helvetica Neue", Helvetica, Arial, sans-serif;margin-top:1.5rem;}
.css-1b1zfbw{flex-wrap:wrap;-webkit-box-pack:justify;justify-content:space-between;}
.css-11jrx2d{position:absolute;bottom:5px;right:10px;}
.css-1gvurk0{position:relative;padding:16px;}
@media (min-width: 993px){
.css-1gvurk0{padding:24px 32px;}
}
.css-1gvurk0 .gift-message{padding-top:15px;}
.css-1mv2nhv{font-family:mulilight;font-size:1.1rem;flex:0 0 100%;}
@media (min-width: 768px){
.css-1mv2nhv{font-size:1.2rem;flex:0 0 100%;}
}
.css-1a9sku1{border:1px solid rgb(238 199 130);font-size:1.1rem;font-family:mulilight;border-radius:4px;margin-bottom:10px;position:relative;cursor:pointer;padding:1px;min-height:80px;max-width:350px;}
@media (min-width: 768px){
.css-1a9sku1{font-size:1.2rem;}
}
@media (min-width: 768px){
.css-1a9sku1{min-height:90px;}
}
.css-1a9sku1 .address{background:rgb(255, 255, 255);display:block;padding:8px;border-radius:2px;min-height:76px;}
@media (min-width: 768px){
.css-1a9sku1 .address{min-height:86px;}
}
.css-1a9sku1 .name{font-family:mulisemibold;}
.css-1a9sku1 .action-buttons{position:absolute;font-family:muliregular;top:10px;right:5px;}
.css-1a9sku1 .action-buttons > *{display:inline;}
.css-1a9sku1 .action-buttons > a{padding:5px;}
.css-1a9sku1 .action-buttons .separator{border-right:1px solid rgb(35, 21, 53);}
.css-1a9sku1 .selected-icon{position:absolute;display:inline-block;bottom:5px;right:5px;}
.css-1a9sku1 .name{font-family:mulisemibold;}
.css-ad8ff6{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -680px -372px / 832px no-repeat;display:block;cursor:pointer;width:28px;height:28px;}
@media (max-width: 992px){
.css-ad8ff6{cursor:default;}
}
.css-1ex41it{border:1px solid rgb(233, 233, 233);border-radius:4px;margin-bottom:10px;position:relative;cursor:pointer;padding:1px;min-height:80px;max-width:350px;}
@media (min-width: 768px){
.css-1ex41it{min-height:90px;}
}
.css-1ex41it.new{background:rgb(246, 239, 246);display:flex;-webkit-box-align:center;align-items:center;-webkit-box-pack:center;justify-content:center;position:relative;}
.css-1ex41it .add{font-family:muliregular;text-align:center;position:absolute;top:50%;left:50%;transform:translate(-50%, -50%);}
.css-1ex41it .add .icon{display:inline-block;}
.css-ilzi1t{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -696px -16px / 832px no-repeat;display:block;cursor:pointer;width:14px;height:14px;}
@media (max-width: 992px){
.css-ilzi1t{cursor:default;}
}
.css-1xm1ava{display:flex;flex-direction:column;font-family:mulilight;font-size:1.1rem;padding-bottom:10px;}
.css-1xm1ava li{-webkit-box-flex:1;flex-grow:1;list-style-type:none;margin-top:3px;margin-bottom:3px;}
@media (min-width: 993px){
.css-1xm1ava{font-size:1.4rem;}
}
.css-1xm1ava > li{display:flex;line-height:18px;}
@media (max-width: 359px){
.css-1xm1ava{font-size:1rem;}
}
@media (min-width: 768px){
.css-1xm1ava{font-size:1.4rem;flex-direction:row;}
.css-1xm1ava > li{display:block;-webkit-box-flex:unset;flex-grow:unset;padding-right:30px;}
}
.css-1xm1ava .radio-button{display:flex;-webkit-box-pack:justify;justify-content:space-between;-webkit-box-align:center;align-items:center;}
@media (min-width: 768px){
.css-1xm1ava .radio-button{flex-direction:column;-webkit-box-align:start;align-items:start;}
}
.css-13raopf{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -641px -377px / 832px no-repeat;width:28px;height:18px;display:inline-block;cursor:pointer;}
@media (max-width: 992px){
.css-13raopf{cursor:default;}
}
.css-kzapv6{position:relative;outline:none;cursor:pointer;height:40px;user-select:none;-webkit-tap-highlight-color:transparent;width:100%;border-radius:5px;box-sizing:border-box;margin:30px 0px 12px;color:rgb(255, 255, 255);background:rgb(238 199 130);border:none;max-width:350px;font-family:mulisemibold;font-size:1.4rem;}
@media (min-width: 768px){
.css-kzapv6{font-size:1.6rem;}
}
.css-1m4rbgv .step-child{background:rgb(249, 249, 249);transition:max-height 0.6s ease-in-out 0s;overflow-y:hidden;position:relative;margin:0px;max-height:532px;}
@media (max-width: 992px){
.css-1m4rbgv .step-child{margin:0px;padding:0px;max-height:532px;}
}
/*! CSS Used from: Embedded */
*,::before,::after{background-repeat:no-repeat;}
::before,::after{text-decoration:inherit;vertical-align:inherit;}
::-moz-selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
::selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
a{background-color:transparent;-webkit-text-decoration-skip:objects;}
a:hover{outline-width:0;}
button,input{background-color:transparent;border-style:none;color:inherit;font-size:1em;margin:0;}
button,input{overflow:visible;}
button{text-transform:none;}
button{-webkit-appearance:button;}
::-moz-focus-inner{border-style:none;padding:0;}
:-moz-focusring{outline:1px dotted ButtonText;}
[type="radio"]{padding:0;}
::-webkit-input-placeholder{color:inherit;opacity:.54;}
a,button,input,label,[tabindex]{-ms-touch-action:manipulation;touch-action:manipulation;}
/*! CSS Used fontfaces */
@font-face{font-family:'MuliSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/f880aba0c9b501d3d43bb86f52836271.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/5b67bf433f6012ec163bb17bf860edf1.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/6504a5cd73e82bd72d1d3ded33279d35.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliRegular';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/743500abdf420f6f22f4ae16d9328886.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/087cb22996bfb0f35007679e3164d0b4.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/25dc88e941ae1c1b088df20ffaa98948.ttf) format('ttf');font-display:swap;}
/*new end 3*/

/*new start 4*/

/*! CSS Used from: Embedded */
.css-1tzeee1{opacity:0.5;}
.css-1jv0y87{font-family:begumregular;font-size:1.4rem;color:#231535;opacity:0.8;padding-bottom:10px;}
@media (min-width:993px){
.css-1jv0y87{font-size:1.6rem;}
}
button{background:transparent;border:none;}
*{margin:0px;padding:0px;box-sizing:border-box;}
a{-webkit-text-decoration:none;text-decoration:none;color:#33363e;}
a,a:active,button,a:hover{outline:0;}
::-moz-focus-inner{border:0;}
::-webkit-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
::-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-ms-input-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:-moz-placeholder{font-family:'mulilight';font-size:1.1rem;color:#9e9fa5;}
:focus{outline:none;}
h3{font-family:'latobold';font-weight:normal;}
button{border:0;border-width:0;background:transparent;outline:0;}
input:focus,button:focus,a:focus{outline:none!important;}
button,input{font-size:1.6rem;}
.css-1mtcxao{position:absolute;top:5px;right:10px;}
.css-3rzbte{height:auto;width:100%;max-width:340px;min-width:280px;display:inline-block;margin:0 20px 20px 0;}
.css-3rzbte .action-button{position:absolute;right:10px;top:5px;}
.css-f37s0l{padding-top:10px;font-style:italic;}
.css-1au0689{font-family:mulilight;font-size:1.4rem;text-align:left;color:#333333;padding:0;margin:0;line-height:2;width:100%;height:inherit;border:#e9e9e9 1px solid;border-radius:4px;cursor:text;outline:none;}
.css-ejm13r{display:none!important;opacity:0!important;}
.css-6b8k2j{position:relative;padding:16px;}
@media (min-width:993px){
.css-6b8k2j{padding:24px 32px;}
}
.css-1qa26rq{overflow-y:hidden;-webkit-transition:height 0.3s linear;transition:height 0.3s linear;height:0px;line-height:32px;background-color:#e00a22;color:#ffffff;font-size:1.1rem;position:absolute;top:0;left:0;width:100%;padding-left:32px;}
body.fontLoaded .css-1qa26rq{font-family:'MuliRegular','Helvetica Neue',Helvetica,Arial,sans-serif;}
.css-bmsfsb{font-family:begumregular;font-size:1.4rem;color:#231535;opacity:0.8;padding-bottom:10px;font-weight:600;opacity:1;}
@media (min-width:993px){
.css-bmsfsb{font-size:1.6rem;}
}
.css-15etgga{padding-bottom:10px;}
.css-15etgga #payment-method-heading{margin-bottom:15px;}
.css-14vj4zk{width:100%;font-family:'MuliLight','Helvetica Neue',Helvetica,Arial,sans-serif;font-size:1.2rem;color:#231535;max-width:500px;margin-bottom:20px;}
.css-1m2w5v1{border:1px solid #e9e9e9;border-radius:5px;background:#ffffff;}
.css-3t6x02{padding:0 9px;height:36px;line-height:36px;position:relative;}
.css-3t6x02::after{content:'';background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) -660px -10px;background-size:832px auto;position:absolute;right:0;top:1px;width:30px;height:100%;-webkit-transition:-webkit-transform 0.4s ease-in-out;-webkit-transition:transform 0.4s ease-in-out;transition:transform 0.4s ease-in-out;-webkit-transform:rotate(0deg);-ms-transform:rotate(0deg);transform:rotate(0deg);}
.css-1hebl25{-webkit-transition:max-height 0.6s ease-in-out;transition:max-height 0.6s ease-in-out;overflow-y:hidden;max-height:0;}
.css-ijoe3{background:#e9e9e9;width:100%;padding:16px;}
.css-p9nyfv{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;}
.css-uracs0{position:relative;padding:5px 0;-webkit-flex:1 0 100%;-ms-flex:1 0 100%;flex:1 0 100%;}
body.fontLoaded .css-uracs0{font-family:'MuliRegular','Helvetica Neue',Helvetica,Arial,sans-serif;}
.css-uracs0 input{background:#fff;border:1px solid #e9e9e9;border-radius:4px;padding:5px 10px;font-size:1.1rem;height:34px;}
.css-15kb6k{position:relative;outline:none;cursor:pointer;height:40px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:transparent;width:100%;border-radius:5px;box-sizing:border-box;font-family:inherit;margin:5px 0;font-size:1.4rem;background:transparent;border:1px solid #8863fb;color:#231535;color:#ffffff;background:linear-gradient(to right,#de57e5,#8863fb);border:none;height:34px;cursor:pointer;background-color:#231535;}
.css-e7rdpk{font-size:1.2rem;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;border:1px solid #e9e9e9;max-width:500px;}
.css-e7rdpk li{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1;list-style-type:none;margin-top:3px;margin-bottom:3px;}
@media (min-width:993px){
.css-e7rdpk{font-size:1.4rem;}
}
.css-e7rdpk > li{border-bottom:1px solid #e9e9e9;margin:0;}
.css-e7rdpk > li .radio-button{background:#ffffff;padding-left:9px;font-family:'MuliLight','Helvetica Neue',Helvetica,Arial,sans-serif;font-size:1.2rem;height:36px;line-height:36px;color:#231535;}
.css-e7rdpk li:last-child{border-bottom:none;}
.css-u5cjan{background:none;opacity:1;}
.css-u5cjan label{cursor:pointer;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:row;-ms-flex-direction:row;flex-direction:row;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;}
.css-u5cjan label .label-text{margin-left:0;width:90%;}
.css-1arc75f{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) no-repeat;width:18px;height:17px;background-size:832px auto;display:block;cursor:pointer;background-position:-603px -377px;width:28px;height:18px;display:inline-block;cursor:pointer;}
@media (max-width:992px){
.css-1arc75f{cursor:default;}
}
.css-dcnvsn{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;padding:1.3rem 0.4rem 2.6rem;border-width:1px 1px 0 1px;border-color:#e9e9e9 #f9f9f9 #e9e9e9 #f9f9f9;border-style:solid;color:#8863fb;font-size:1.1rem;line-height:1.6rem;margin:0 -1px;}
body.fontLoaded .css-dcnvsn{font-family:'MuliLight','Helvetica Neue',Helvetica,Arial,sans-serif;}
.css-dcnvsn > p{padding:0;margin:0;color: rgb(238 199 130);}
.css-19qtxsu{background:#e9e9e9;height:120%;width:100%;min-height:85px;padding:16px;}
.css-1mn5d1a{padding:16px;height:100%;width:100%;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-direction:column;-ms-flex-direction:column;flex-direction:column;min-height:176px;background-color:#e9e9e9;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;opacity:1;}
.css-1mn5d1a #offline-payment-options{padding-top:10px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;}
.css-1mn5d1a #offline-payment-options > div{margin-right:20px;margin-bottom:10px;}
.css-1mn5d1a #offline-payment-content{width:100%;color:#232427;font-size:1rem;padding-bottom:10px;}
body.fontLoaded .css-1mn5d1a #offline-payment-content{font-family:'MuliLight','Helvetica Neue',Helvetica,Arial,sans-serif;}
.css-1mn5d1a #offline-payment-content #ivr-phone-link{color:#8863fb;}
@media (min-width:768px){
.css-1mn5d1a #offline-payment-content{font-size:1.2rem;padding-bottom:0;}
}
.css-1ote4j0{background:#ffffff;height:66px;width:64px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-box-pack:center;-webkit-justify-content:center;-ms-flex-pack:center;justify-content:center;-webkit-align-items:center;-webkit-box-align:center;-ms-flex-align:center;align-items:center;border-radius:5px;cursor:pointer;border:none;}
.css-e6069g{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) no-repeat;width:18px;height:17px;background-size:832px auto;display:block;cursor:pointer;display:inline-block;background-position:-65px -296px;width:37px;height:36px;}
@media (max-width:992px){
.css-e6069g{cursor:default;}
}
.css-116j28b{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) no-repeat;width:18px;height:17px;background-size:832px auto;display:block;cursor:pointer;display:inline-block;background-position:-12px -292px;width:35px;height:44px;}
@media (max-width:992px){
.css-116j28b{cursor:default;}
}
.css-jz79wf{background:url(https://assets.cltstatic.com/images/responsive/spriteImage1.png?t=1580384077297) no-repeat;width:18px;height:17px;background-size:832px auto;display:block;cursor:pointer;display:inline-block;background-position:-196px -286px;width:56px;height:56px;}
@media (max-width:992px){
.css-jz79wf{cursor:default;}
}
.css-1lgba4u{position:relative;outline:none;cursor:pointer;height:40px;-webkit-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none;-webkit-tap-highlight-color:transparent;width:100%;border-radius:5px;box-sizing:border-box;font-family:inherit;margin:5px 0;font-size:1.4rem;background:transparent;border:1px solid #8863fb;color:#231535;color:#ffffff;background:linear-gradient(to right,#de57e5,#8863fb);border:none;width:100%;max-width:340px;margin:25px 0 35px;font-size:1.4rem;}
.css-1lgba4u[disabled]{cursor:not-allowed;background:#ececec;border:#ececec;color:#acacac;}
body.fontLoaded .css-1lgba4u{font-family:'MuliSemiBold','Helvetica Neue',Helvetica,Arial,sans-serif;}
@media (min-width:993px){
.css-1lgba4u{margin:20px 0 30px;}
}
.css-1a88qml{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;margin-top:0;}
@media (min-width:768px){
.css-1a88qml{-webkit-box-pack:justify;-webkit-justify-content:space-between;-ms-flex-pack:justify;justify-content:space-between;}
}
.css-1itmqzp{border:solid 1px #e9e9e9;border-radius:4px;padding:8px 30px 8px 8px;max-width:350px;font-size:1.1rem;font-family:mulilight;position:relative;background:#ffffff;}
@media (min-width:768px){
.css-1itmqzp{font-size:1.2rem;}
}
.css-1itmqzp .name{font-family:mulisemibold;}
.css-ld7inj{margin:0;padding:0;display:block;-webkit-text-decoration:none;text-decoration:none;outline:0;cursor:pointer;font-family:muliregular;color:rgb(238 199 130);font-size:inherit;}
@media (max-width:992px){
.css-ld7inj{cursor:default;}
}
.css-lhv7fw{border:solid 1px #e9e9e9;border-radius:4px;padding:8px 30px 8px 8px;max-width:350px;font-size:1.1rem;font-family:mulilight;position:relative;background:#ffffff;min-height:9rem;line-height:1.5;margin-bottom:20px;}
@media (min-width:768px){
.css-lhv7fw{font-size:1.2rem;}
}
.css-lhv7fw .name{color:rgb(238 199 130);font-family:'MuliSemiBold','Helvetica Neue',Helvetica,Arial,sans-serif;}
.css-lhv7fw .message{word-break:break-all;font-family:'MuliRegular','Helvetica Neue',Helvetica,Arial,sans-serif;}
.css-lhv7fw .invoice{font-style:italic;}
.css-lhv7fw .recpinfo{word-break:break-all;font-family:'MuliRegular','Helvetica Neue',Helvetica,Arial,sans-serif;margin-top:1.5rem;}
/*! CSS Used from: Embedded */
.css-bfy1g9 .step-child{background:rgb(249, 249, 249);transition:max-height 0.6s ease-in-out 0s;overflow-y:hidden;position:relative;margin:0px;max-height:676px;}
@media (max-width: 992px){
.css-bfy1g9 .step-child{margin:0px;padding:0px;max-height:676px;}
}
/*! CSS Used from: Embedded */
*,::before,::after{background-repeat:no-repeat;}
::before,::after{text-decoration:inherit;vertical-align:inherit;}
::-moz-selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
::selection{background-color:#b3d4fc;color:#000000;text-shadow:none;}
a{background-color:transparent;-webkit-text-decoration-skip:objects;}
a:hover{outline-width:0;}
button,input{background-color:transparent;border-style:none;color:inherit;font-size:1em;margin:0;}
button,input{overflow:visible;}
button{text-transform:none;}
button{-webkit-appearance:button;}
::-moz-focus-inner{border-style:none;padding:0;}
:-moz-focusring{outline:1px dotted ButtonText;}
[type="radio"]{padding:0;}
::-webkit-input-placeholder{color:inherit;opacity:.54;}
a,button,input,label,[tabindex]{-ms-touch-action:manipulation;touch-action:manipulation;}
/*! CSS Used fontfaces */
@font-face{font-family:'MuliRegular';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/743500abdf420f6f22f4ae16d9328886.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/087cb22996bfb0f35007679e3164d0b4.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/25dc88e941ae1c1b088df20ffaa98948.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliLight';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/eeb61d9dad436af6d4181989b63cba64.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/a5fc1c72a20616d26b424c0aae872cf5.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/49d9e837e5d0d18067952a4edc9bfa0b.ttf) format('ttf');font-display:swap;}
@font-face{font-family:'MuliSemiBold';src:url(https://assets.cltstatic.com/desktop/live/maatran/build/f880aba0c9b501d3d43bb86f52836271.woff2) format('woff2'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/5b67bf433f6012ec163bb17bf860edf1.woff) format('woff'),     url(https://assets.cltstatic.com/desktop/live/maatran/build/6504a5cd73e82bd72d1d3ded33279d35.ttf) format('ttf');font-display:swap;}
/*new end 4*/

/*.card-header{
	    background-color: rgb(35, 21, 53);
}*/
/*.active {
  background-color: rgb(35, 21, 53) !important;
}*/
.btn-link{
	color:  rgb(35, 21, 53);
	font-size: 18px !important;
	text-decoration: none !important;
}

.pro_div {
    width: 70%;
    margin: auto;
    position: relative;
}

.in_prodiv {
    width: 100%;
}

.in_prodiv input{
  width: 100%;
border: 1px solid #52c1b7 !important;
padding: 1rem 5rem 1rem 1rem;
border-radius: 6px;
height: 44px;
}

.in_prodiv button{
  position: absolute;
    top:0;
    padding: 1rem;
    right: 15px;
    height: 44px;
}


.apply_pro_btn{
  border: 1px solid #52c1b7;
height: 29px;
width: 100%;
border-radius: 6px;
justify-content: center;
align-items: center;
color: #52c1b7;
}
.all_pro{
      background: #d4f9f6;
      padding:15px;
}

.pro_row{
  background: #fff;
  padding: 10px 0px;
}

.apply_pro_btn:hover {
  background:#52c1b7;
  color: #fff;
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
<section>
	<div class="container-fluid">
<form action="<?=base_path?>giftcard_order_place/<?=$user_gift_id;?>" method="post">
@csrf
		<div class="row">
			<div class="col-xl-7 col-lg-7 col-md-7 p-0">
				<div class="accordion" id="accordionExample">


  <div class="card">
    <div class="card-header active" id="headingOne" onclick="myFunction1()" style="background-color: rgb(238 199 130);">
      <h2 class="mb-0">
        <h3 class="btn btn-link btn-block text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne" id="but" style="color: white;">
          1.log in
        </h3>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
      <div class="step-child">
        <div data-name="chk-login" class="css-aw72tv eihbpq30"><div class="css-1s1wqwg eyqztrc0">

<?php if(!empty(Session::get('user_data'))){ ?>

<!-- with login -->

  <p class="css-1vvjsf5 eyqztrc1">Logged in as <span class="css-k3qi9z eyqztrc5"><?=Session::get('user_name');?></span>
  </p>
  <!-- <button class="eyqztrc2 e1jmj0hg1 css-1fjoggo e1jmj0hg0">Continue Checkout</button> -->
  <p class="css-fef3d3 eyqztrc3">Use a different account. &nbsp;<a href="<?=base_path?>logout" color="#de57e5" class="css-ld7inj epg3bs00">Log Out</a>

  </p>
<p class="css-14mqcli eyqztrc4">Please note that when you log out you will lose all the items in your cart and will be redirected to the Home page.</p>

<?php }else{ ?>

<!-- without login -->
  <p class="css-1vvjsf5 eyqztrc1">Please Login First
  </p>

<div>
  g
</div>

<?php } ?>

      </div>
      </div>
    </div>
      </div>
    </div>
  </div>

  <!-- <div class="card">
    <div class="card-header" id="headingThree"  onclick="myFunction3()"  >
      <h2 class="mb-0">
        <h3 class="btn btn-link btn-block text-left collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree" id="but2">
          2. Shipping/Address Information
        </h3>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
       <div class="step-child">

         <div class="css-1gvurk0 ez4e8l00">




         <div>


           <div class="css-1b1zfbw">

 <div class="css-1mv2nhv">
   <a href="<?=base_path?>add_address">
   <div class="css-1ex41it address-box new" role="presentation">
     <div class="add">
       <span class="icon erq4t6020 css-ilzi1t efp5dbi0"></span>
       <div class="text">Add a New Address</div>
     </div>
   </div>
 </a>
 </div>

<div  style="    max-height: 251px;
overflow: auto;">

@if($user_addr_data)
<?php $i=0; ?>
@foreach ($user_addr_data as $user_addr)


         <div class="css-1mv2nhv">
           <div class="address-box compact css-1a9sku1" id="2277789" role="presentation">
           <div class="address">
             <div class="name"><?=$user_addr->doorflat?> <?=$user_addr->landmark?>  </div>
             <div class="street"><?=$user_addr->address?> </div>
             <div class="city"><?=$user_addr->zipcode?> </div>
             <div class="country"><?=$user_addr->country?></div>
           </div>
           <div class="action-buttons">
             <a color="#de57e5" href="#" class="css-ld7inj epg3bs00">Edit</a>
             <span class="separator">
             </span>
             <a color="#de57e5" href="#" class="css-ld7inj epg3bs00">Remove</a>
           </div>


             <span >
               <input class="selected-icon erq4t6019 css-ad8ff6 efp5dbi0" type="radio" name="addr_id" value="<?=$user_addr->id;?>"></input>
             </span>


           </div>
         </div>

@endforeach
@endif



</div>

         </div>

       </div>

       <br>
  </div>


</div>
      </div>
    </div>
  </div> -->




</div>
			</div>

      <div class="col-xl-5 col-lg-5 col-md-5 p-0" style="right: 0;">
      <!-- <form action="<?=base_path?>order_place" method="post">
      @csrf -->
        <div class="css-1abnf4d">
          <div class="css-5rnr3f" role="presentation">
            <div class="title">
              <span class="text">Show Order Summary</span>
              <i direction="down" class="down-arrow css-zw473k e1tt8hgl0"></i>
            </div>
            <div class="price">&#8377;4,860</div>
      </div>
      <div class="css-1bh2wnb">
        <p class="css-yqnuxd">Order Summary</p>
          <div class="css-1wird2e">
      @if($giftcard_data != "" && $giftcard_data != null)
      <?php $i=1; $totalamount=0; $total_qty=0;?>


      <?php
      // echo $giftcard_data->giftcard_id; die();
      $giftCard_da= App\adminmodel\GiftCard::wherenull('deleted_at')->where('id',$giftcard_data->giftcard_id)->where('is_active', 1)->first();

      ?>
          <div class="cart-item">
            <div class="thumbnail">
              <img src="<?=base_path.$giftCard_da->image?>" alt="Laura D Bracelet">
            </div>
            <div class="details">
              <div class="title"><?=$giftCard_da->name?></div>

              <div class="sku">Quantity: <span class="value">1</span>
              </div>
              <!-- <div class="delivery">Expected Delivery -<span>7th to 8th Sep</span>
              </div> -->
            </div>

      <?php
      $gift_price= App\adminmodel\GiftCardPrice::wherenull('deleted_at')->where('id',$giftcard_data->giftcard_price_id)->where('is_active', 1)->first();

      if(!empty($gift_price)){
      $gift_pric= $gift_price->price;
      $gift_pric= (float)$gift_pric * $currency_price;
      $gift_pric= number_format((float)$gift_pric, 2, '.', '');
      }else{
        $gift_pric= 0;
      }


      ?>

            <div class="price">
              <?php if($gift_price != "" && $gift_price != null){ ?>
              <span><?=$sign." ".$gift_pric;?></span>
            <?php }else{ ?>
              <span>$N/A</span>
            <?php } ?>

            </div>
          </div>



      @endif

        </div>
        <div class="css-18g5l5m">
          <div class="sub-total line-item">
            <div class="label" style="color:black !important">SUBTOTAL</div>
            <div class="price" ><span id="subtotal_price" ><?=$sign." ".$gift_pric;?></span></div>
          </div>



          <!-- <div class="discount line-item">
            <div class="label">CART DISCOUNT</div>
            <div class="price"  >- $<span id="discount" >0</span></div>
          </div> -->
          <!-- <div class="shipping-charge line-item">
            <div class="label">SHIPPING CHARGES <span class="shipping-type">(Standard)</span>
            </div><div class="price" id="shiping" >$0</div>
          </div> -->
        </div>
        <div class="css-17ss6c3 line-item">
          <div class="label" style="color:black !important">TOTAL COST</div>
          <div class="price" ><span id="total_price" class="price"><?=$sign." ".$gift_pric;?></span></div>
        </div>

        <div class="css-17ss6c3 line-item">
          <!-- <div class="label" style="color:black !important">Payment Method</div><br> -->
          <!--<div class="">new sanganer road
      Jaipur, Rajasthan, 302019
      India</div> -->




                  <!-- <input style=""  type="radio" name="payment" id="payment_1" value="1"     style="margin-left: 44px;">
                 <b> Cash On Delivery</b>


           <input style=""  type="radio" name="payment" id="payment_2" value="2" >
          <b> Online Payment</b> -->


                </div>

        </div>

      </div>
      <button type="submit" class="btn" style="background-color: #210113;
    color: white !important;
    float: right;
    margin-top: 0px;
    width: 100%;
    font-size: 19px;
    height: 44px;
    font-weight: 700;">Place Order
      </button>
      <!-- </form> -->
      </div>

		</div>


  </form>
	</div>
</section>
</div>


















<script>
function myFunction1() {
  document.getElementById("headingOne").style.backgroundColor = "rgb(238 199 130)";
  document.getElementById("headingTwo").style.backgroundColor = "white";
  document.getElementById("headingThree").style.backgroundColor = "white";
  document.getElementById("headingfour").style.backgroundColor = "white";
   document.getElementById("but").style.color = "white";
   document.getElementById("but1").style.color = "rgb(35, 21, 53)";
   document.getElementById("but2").style.color = "rgb(35, 21, 53)";
   document.getElementById("but3").style.color = "rgb(35, 21, 53)";

}
</script>


<script>
function myFunction3() {
  document.getElementById("headingThree").style.backgroundColor = "rgb(238 199 130)";
   document.getElementById("headingTwo").style.backgroundColor = "white";
  document.getElementById("headingOne").style.backgroundColor = "white";
  document.getElementById("headingfour").style.backgroundColor = "white";
  document.getElementById("but2").style.color = "white";
  document.getElementById("but1").style.color = "rgb(35, 21, 53)";
  document.getElementById("but").style.color = "rgb(35, 21, 53)";
  document.getElementById("but3").style.color = "rgb(35, 21, 53)";
}
</script>





<script>
// Attach a submit handler to the form
$( "#promocodeForm" ).click(function( event ) {
// alert("oiuy");
// Stop form from submitting normally
event.preventDefault();

// Get some values from elements on the page:
var promo_id =  $(this).attr("promo-id");
var promocode = $('#applied_promocode_'+promo_id).val();
var qty = $('#qntty').val();
var sub_amount = $('#subtotal_price').text().trim();

// alert(promo_id);
// alert(promocode);
// alert(sub_amount);
// alert(qty); die();
// newpass = $form.find( "input[name='new']" ).val()
//   url = $form.attr( "action" );

// Send the data using post
// var posting = $.post( url, { s: term } );
$.ajax({
type: "POST",
url: "<?=base_path?>isValidPromocodeforcheckout",
data: {
'promocode': promocode, 'sub_amount':sub_amount, 'qty':qty, _token: '{{csrf_token()}}'
},
dataType: "json",
success: function(response){
  // alert(response);
  // alert(response[0].data);
      if(response.data == true){
          // alert("true");
        var status= response.status;

        $("#discount").html('');
        // $("#deduct_lbl").html('');
        // $("#deduct_amt").html('');
        $("#total_price").html('');
        $("#smsg").html('');
        $("#emsg").text('');

           // $("#deduct_lbl").html(label);
           // $("#deduct_amt").html(response.deduction_amount);
           $("#total_price").html(response.amount);
           $("#smsg").html(response.data_msg);
           $("#discount").html(response.deduction_amount);
           if(status && status != '' && status != null){
             $("#shiping").html('');
              $("#shiping").html(status);
           }

          $("#order_promocode").val('');
          $("#order_promocode").val(promocode);


      }
      else{

        var sub= $("#subtot").val();
           // alert("false");
           // $("#discount").html('');
           $("#total_price").html('');
           $("#smsg").html('');
           $("#emsg").text('');
           $("#total_price").html(sub);
           $("#emsg").text(response.data_msg);
          }

},error: function (error) {
// alert("ty");

console.log(error);
}
});   //$.ajax ends here
// Put the results in a div
// posting.done(function( data ) {
//
//
//
//   var content = $( data ).find( "#content" );
//   // console.log(content)
//     alert(JSON.stringify(content));
//   $( "#result" ).empty().append( content );
// });
});
</script>


@endsection
