@extends('frontend.layout')
@section('main')
<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> -->

<style media="screen">
@import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css");
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;1,100&display=swap');
@import url('https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;1,300&display=swap');

  @media (min-width: 640px){
    .btn-desk-2{
      display: none;
    }
  }
  @media (max-width: 640px){
    .btn-desk-1{
      display: none;
    }
  }
  @media (max-width:360px) {
    .seticon{
      margin-left: 0.5rem !important;
    }
  }
  @media (max-width:1025px) {
    .setprice{
        margin-left: -12rem !important;
    }
    .responsive{
      width: 56% !important;
    }
    .responsive1{
      margin-left: -6rem !important;
    }
    .seticon{
      margin-left: 4.5rem !important;
    }
    .ofn{overflow: visible!important;}
  }
  @media (max-width:877px) {
    .setprice{
      margin-left: 0rem !important;
    }
    .seticon {
    margin-left: -0.5rem !important;
}
  }
  @media (max-width:750px) {
     .col-xs-12{
       flex-basis: 100%;
       max-width: 100%;
     }
  }
  @media (max-width:727px) {
     .responsive1{
       width: 100% !important;
       margin-left: 0rem !important;
     }
  }
  @media (max-width:360px) {
     .drop-hint-section{
       width: 100% !important;
       margin-left: 0rem !important;
     }
     .smart-gift-section {
       width: 100% !important;
       /* margin-left: 0rem !important; */
     }
  }
  .carder {
    height: 2rem;
    width: 2rem;
    border-radius: 50%;
  }
  .carderspan {
    display: flex;
  }
  .cardp{
    display: none;
  }
  .hoverc:hover .cardp{
    display: table-row;
  }
  .hoverc{
    height: 20.8px
  }
  .hoverh1:hover{
  color: #63c7c5!important;
  }

</style>
<style>
.accordionq {
  background-color:#f7f5f3;
  color: #444;
  cursor: pointer;
  padding: 18px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  font-size: 15px;
  transition: 0.4s;
}
.accordionq:after {
  content: '\002B';
  color: #777;
  font-weight: bold;
  float: right;
  margin-left: 5px;
}

/* .active:after {
  content: "\2212";
} */

.active, .accordionq:hover {
  background-color: #f7f5f3;
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
  border: none;
}
button:focus{
  outline: 0px !important
}
</style>
<style>
  @media all {




  @media screen and (max-width: 62.4375em) {
    .m-one-half {
      width: 50%;
    }
  }
  @media screen and (max-width: 42.5em) {
    .ph-full {
      width: 100%;
    }
  }
  button::-moz-focus-inner {
    padding: 0;
    border: 0;
  }
  .richtext {
    font-family: Grotesk, Helvetica, sans-serif;
    line-height: 1.583;
    font-size: 12px;
    font-size: 0.75rem;
    color: #000;
  }
  .richtext p {
    margin-bottom: 2.5em;
    letter-spacing: 0.68px;
  }
  .richtext a {
    color: inherit;
  }
  .richtext a:hover {
    font-weight: 700;
  }
  .richtext--flush p:last-child {
    margin-bottom: 0;
  }
  button {
    width: auto;
    white-space: nowrap;
    vertical-align: top;
    border: none;
  }
  button::-moz-focus-inner {
    padding: 0;
    border: none;
  }
  .button {
    -moz-osx-font-smoothing: grayscale;
  -webkit-font-smoothing: antialiased;
  display: inline-block;
  margin: 0;
  padding: 0;
  outline: 0;
  cursor: pointer;
  text-decoration: none;
  color: #000;
  background: 0 0;
  border: 1px solid #231005;
  -webkit-font-smoothing: antialiased;
  text-align: center;
  -webkit-transition: background-color 0.3s ease, color 0.3s ease;
  transition: background-color 0.3s ease, color 0.3s ease;
  white-space: nowrap;
  }
  .button:active img,
  .button:hover img {
    -webkit-transform: translateX(25px);
    transform: translateX(25px);
  }
  .button:after {
    content: "";
    display: inline-block;
    vertical-align: middle;
    width: 0;
    height: 42px;
  }
  .button span {
    font-family: Grotesk, Helvetica, sans-serif;
    font-weight: 700;
    text-transform: uppercase;
    line-height: 1;
    letter-spacing: 1.5px;
    font-size: 13px;
    display: -webkit-inline-box;
    display: -ms-inline-flexbox;
    display: inline-flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    padding: 14px 15px;
  }
  .button img {
    margin-right: 10px;
    margin-left: 15px;
    -webkit-transition: 0.3s ease;
    transition: 0.3s ease;
  }
  .button--alt {
    color: #fff;
    background: #533021;
  }
  .button--alt:hover {
    background:#231005;
  }
  .button--full {
    width: 100%;
  }
  .accordionq:not(.accordionq--invalid) .accordionq__wrap {
    display: none;
  }
  .accordionq:not(.accordionq--invalid) .accordionq__wrap {
    display: block;
    max-height: 0;
    overflow: hidden;
  }
  .accordionq.accordionq--invalid .accordionq__body {
    -webkit-transform: none;
    transform: none;
    opacity: 1;
    -webkit-transition: none;
    transition: none;
  }
  .accordionq .accordionq__body {
    opacity: 0;
    -webkit-transform: translateX(-25px);
    transform: translateX(-25px);
    -webkit-transition: -webkit-transform 0.3s
      cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: -webkit-transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1),
      -webkit-transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  .accordionq--product-details .accordionq__button {
    width: 100%;
    padding: 7px 0;
    background: 0 0;
    outline: 0;
  }
  .accordionq--product-details .accordionq__button-content {
    font-size: 11px;
    font-size: 0.6875rem;
    line-height: 1.27273;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    letter-spacing: 0.5px;
    pointer-events: none;
  }
  .accordionq--product-details .accordionq__button-content > * {
    margin-right: 8px;
  }
  .accordionq--product-details .accordionq__button-content > :last-child {
    margin-right: 0;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details .accordionq__button-content > * {
      margin-right: 20px;
    }
    .accordionq--product-details .accordionq__button-content > :last-child {
      margin-right: 0;
    }
  }
  .accordionq--product-details .accordionq__button-content > :nth-child(3) {
    margin-left: auto;
  }
  .accordionq--product-details .accordionq__icon {
    min-width: 20px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details .accordionq__icon {
      min-width: 30px;
    }
  }
  .accordionq--product-details .accordionq__icon img {
    display: block;
  }
  .accordionq--product-details
    .accordionq__icon
    img[src*="2020/usp-icons/recycled-silver-black"] {
    width: 21px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details
      .accordionq__icon
      img[src*="2020/usp-icons/recycled-silver-black"] {
      width: 22px;
      height: auto;
    }
  }
  .accordionq--product-details
    .accordionq__icon
    img[src*="2020/usp-icons/heart-black"] {
    width: 21px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details
      .accordionq__icon
      img[src*="2020/usp-icons/heart-black"] {
      width: 22px;
      height: auto;
    }
  }
  .accordionq--product-details
    .accordionq__icon
    img[src*="2020/usp-icons/handmade"] {
    width: 21px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details
      .accordionq__icon
      img[src*="2020/usp-icons/handmade"] {
      width: 16px;
      height: auto;
      margin-left: 2px;
    }
  }
  .accordionq--product-details
    .accordionq__icon
    img[src*="2020/usp-icons/free-delivery-black"] {
    width: 26px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details
      .accordionq__icon
      img[src*="2020/usp-icons/free-delivery-black"] {
      width: 30px;
      height: 20px;
    }
  }
  .accordionq--product-details
    .accordionq__icon
    img[src*="2020/usp-icons/returns-black"] {
    width: 27px;
    height: 19px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details
      .accordionq__icon
      img[src*="2020/usp-icons/returns-black"] {
      width: 28px;
      height: auto;
    }
  }
  .accordionq--product-details
    .accordionq__icon
    img[src*="2020/usp-icons/warranty-black"] {
    width: 17px;
    height: 19px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details
      .accordionq__icon
      img[src*="2020/usp-icons/warranty-black"] {
      width: 24px;
      height: auto;
    }
  }
  .accordionq--product-details .accordionq__status {
    -webkit-transition: -webkit-transform 0.3s
      cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: -webkit-transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1),
      -webkit-transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  .accordionq--product-details .accordionq__status img {
    display: block;
  }
  .accordionq--product-details .accordionq__status img[src*="2020/plus-black"] {
    width: 9px;
    height: 9px;
  }
  .accordionq--product-details .accordionq__body {
    font-size: 10px;
    font-size: 0.625rem;
    line-height: 1.5;
    font-weight: 300;
    padding-left: 36px;
    -webkit-transition: none;
    transition: none;
  }
  @media screen and (max-width: 62.4375em) {
    .accordionq--product-details .accordionq__body {
      padding-left: 48px;
    }
  }
  .accordionq--product-benefits.accordionq--invalid .accordionq__button {
    cursor: default;
  }
  .accordionq--product-benefits.accordionq--invalid
    .accordionq__button-content
    > :not(.accordionq__icon) {
    margin-right: 0;
  }
  .accordionq--product-benefits.accordionq--invalid .accordionq__status,
  .accordionq--product-benefits.accordionq--invalid .accordionq__wrap {
    display: none;
  }
  a {
    text-decoration: none;
    /* color: #929292; */
  }
  .product-details {
    margin: 0 40px;
  }
  @media screen and (max-width: 42.5em) {
    .product-details {
      margin: 0 12px;
      margin-top: 20px;
    }
  }
  .product-details__header {
    /* display: -webkit-box; */
    /* display: -ms-flexbox; */
    /* display: flex; */
    /* -ms-flex-wrap: wrap; */
    flex-wrap: wrap;
    padding-bottom: 15px;
    /* margin-bottom: 20px; */
    border-bottom: 1px solid #e7e7e7;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__header {
      display: block;
      padding-bottom: 28px;
      margin-bottom: 25px;
      text-align: center;
    }
  }
  .product-details__title {
    text-transform: capitalize;
font-size: 22px !important;
line-height: 1.21739;
font-family: 'Lato';
font-weight: 500;
-webkit-box-flex: 0;
-ms-flex: 0 0 100%;
flex: 0 0 100%;
margin-bottom: 5px;
letter-spacing: 2.1px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__title {
      font-size: 20px;
      font-size: 1.25rem;
      line-height: 1.4;
      margin-bottom: 6px;
      letter-spacing: 0.5px;
    }
  }
  .product-details__subtitle {
    font-size: 10px;
    font-size: 0.625rem;
    line-height: 1.3;
    font-weight: 300;
    -webkit-box-flex: 0;
    -ms-flex: 0 0 100%;
    flex: 0 0 100%;
    margin-bottom: 10px;
    letter-spacing: 0.75px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__subtitle {
      font-size: 11px;
      font-size: 0.6875rem;
      line-height: 1.27273;
      letter-spacing: 0.8px;
    }
  }
  .product-details__price-and-stock {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: baseline;
    -ms-flex-align: baseline;
    align-items: baseline;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    width: 100%;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__price-and-stock {
      display: block;
    }
  }
  .product-details__price {
    font-size:27px !important;
    display: flex;
    line-height:1;
    margin-right: 15px;
    letter-spacing: 1px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__price {
      font-size: 22px;
      font-size: 1.375rem;
      line-height: 1.27273;
      margin-right: 0;
      margin-bottom: 10px;
      letter-spacing: 0.2px;
    }
  }
  .product-details__stock {
    font-size: 11px !important;
  line-height: 1.27273;
  margin-left: auto;
  letter-spacing: 0.8px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__stock {
      letter-spacing: 0.5px;
    }
  }
  .product-details__swatches {
    margin-bottom:15px;
  }
  .product-details__buttons {
    margin-bottom: 34px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__buttons {
      margin-bottom: 44px;
    }
  }
  .product-details__buttons > * {
    margin-bottom: 12px;
  }
  .product-details__buttons > :last-child {
    margin-bottom: 0;
  }
  .product-details__help {
    font-size: 11px;
    font-size: 0.6875rem;
    line-height: 1.54545;
    margin-bottom: 17px;
    min-height: 26px;
    letter-spacing: 0.7px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__help {
      margin-bottom: 34px;
      text-align: center;
    }
  }
    .product-details__help > * {
    margin-bottom: 13px;
    color: #8a8a8a;
    text-transform: capitalize;
    letter-spacing: 2px;
    font-weight: 100;
  }
  .product-details__help > :last-child {
    margin-bottom: 0;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__help > * {
      margin-bottom: 19px;
    }
    .product-details__help > :last-child {
      margin-bottom: 0;
    }
  }
  .product-details__info {
    margin-bottom: 7px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__info {
      margin-bottom: 23px;
    }
  }
  .product-details__benefits {
    margin-bottom: 25px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-details__benefits {
      margin-bottom: 27px;
    }
  }
  .product-details__stylist {
    font-size: 11px;
    font-size: 0.6875rem;
    line-height: 1.18182;
    margin-bottom: 24px;
    letter-spacing: 0.7px;
  }
  .product-details__stylist:last-child {
    margin-bottom: 0;
  }
  .product-details__stylist > * {
    margin-bottom: 13px;
  }
  .product-details__stylist > :last-child {
    margin-bottom: 0;
  }
  .product-details__stylist a {
    font-weight: 700;
    color: inherit;
    text-decoration: none;
  }
  .product-details__sticky-content {
    position: -webkit-sticky;
    position: sticky;
    top: 140px;
  }
  .product-details__add-to-basket .add-to-basket__spinner {
    display: none;
  }
  .product-details__add-to-basket .add-to-basket__spinner img {
    -webkit-filter: invert(1);
    filter: invert(1);
    -webkit-animation: spinner-rotation 5s infinite linear;
    animation: spinner-rotation 5s infinite linear;
  }
  .product-info__title {
    font-size: 11px;

    line-height: 1.27273;
    font-weight: 700;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    padding: 7px 0;
    letter-spacing: 0.5px;
  }
  .product-info__cta {
    font-size: 10px;
    font-size: 0.625rem;
    line-height: 1.3;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    color: inherit;
    text-decoration: none;
    letter-spacing: 0.4px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-info__cta {
      display: none;
    }
  }
  .product-info__cta img {
    width: 9px;
    height: 7px;
    margin-left: 5px;
  }
  .product-info__accordionq {
    padding: 10px 0;
    border-top: 1px solid #b1b1b1;
    border-bottom: 1px solid #b1b1b1;
  }
  @media screen and (max-width: 62.4375em) {
    .product-info__accordionq {
      padding-bottom: 0;
      border-bottom: none;
    }
  }
  .product-benefits__title {
    font-size: 11px;
    font-size: 0.6875rem;
    line-height: 1.27273;
    font-weight: 500;
    padding: 7px 0;
    letter-spacing: 0.5px;
    display: none;
  }
  @media screen and (max-width: 62.4375em) {
    .product-benefits__title {
      display: block;
    }
  }
  .product-benefits__accordionq {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin: 0 -10px;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
  }
  @media screen and (max-width: 62.4375em) {
    .product-benefits__accordionq {
      display: block;
      margin: 0;
      padding-top: 10px;
      border-top: 1px solid #b1b1b1;
    }
  }
  .product-benefits__accordionq > * {
    margin: 0 10px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-benefits__accordionq > * {
      margin: 0;
    }
  }
.opt{
  padding: 0 15px 0 18px;
border-radius: 0;
width: auto;
color: #000;
border: 1px solid #E6E7E8;
vertical-align: middle;
background: 0 0!important;
cursor: pointer;
position: relative;
outline-style: none;
height: 45px;
z-index: 1;
letter-spacing: 1px;
outline: none;
}
select {
      -webkit-appearance: none;
      -moz-appearance: none;
      appearance: none;
    }



  .size-selector {
    margin-bottom: 20px;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -webkit-box-align: start;
    -ms-flex-align: start;
    align-items: flex-start;
  }
  @media screen and (max-width: 62.4375em) {
    .size-selector {
      margin-bottom: 25px;
    }
  }
  .size-selector__title {
    font-size: 11px;
    font-size: 0.6875rem;
    line-height: 3;
    font-weight: 700;
    /* margin-top: 6px; */
    /* margin-right: 15px; */
    letter-spacing: 1px;
    min-width: 50px;
  }
  @media screen and (max-width: 34.375em) {
    .size-selector__title {
      margin-right: 5px;
      min-width: 40px;
    }
  }
  .size-selector__content {
    -webkit-box-flex: 1;
    -ms-flex: 1 1 auto;
    flex: 1 1 auto;
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
    flex-wrap: wrap;
    -webkit-box-pack: justify;
    -ms-flex-pack: justify;
    justify-content: space-between;
    -webkit-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    margin: -5px;
  }
  .size-selector__content > * {
    margin: 5px;
  }
  .size-selector__item {
    font-size: 13px;
font-size: 0.8125rem;
line-height: 1.69231;
display: inline-block;
color: inherit;
text-decoration: none;
margin-right: 10px;
height: 25px;
width: 25px;

border-radius: 50px;
border: 1px solid black;
justify-content: center;
align-items: center;
text-align: center;
  }
  .size-selector__item:first-child::after {
    content: "";
  }

  .size-selector__item:first-child {
    margin-left: 0;
  }
  .size-selector__item:last-child {
    margin-right: 0;
  }
  .size-selector__error {
    display: none;
  }
  .size-selector__guide {
    font-size: 11px;
    font-size: 0.6875rem;
    line-height: 1.27273;
    letter-spacing: 1px;
    color: #000;
  }
  .size-selector__guide a {
    color: #000;
    margin-left: 5px;
    text-decoration: none;
  }
}
/*! CSS Used from: https://api.getcandid.com/content/widget.css */
span,
h1,
p {
  text-align: inherit;
}
/*! CSS Used keyframes */.

@-webkit-keyframes spinner-rotation {
  from {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
@keyframes spinner-rotation {
  from {
    -webkit-transform: rotate(0);
    transform: rotate(0);
  }
  to {
    -webkit-transform: rotate(359deg);
    transform: rotate(359deg);
  }
}
/*! CSS Used fontfaces */
@font-face {
  font-family: Grotesk;
  src: url(https://www.monicavinader.com/fonts/HK-grotesk-light.woff2)
      format("woff2"),
    url(https://www.monicavinader.com/fonts/HK-grotesk-light.woff)
      format("woff");
  font-weight: 300;
}
@font-face {
  font-family: Grotesk;
  src: url(https://www.monicavinader.com/fonts/HK-grotesk-regular.woff2)
      format("woff2"),
    url(https://www.monicavinader.com/fonts/HK-grotesk-regular.woff)
      format("woff");
  font-weight: 400;
}
@font-face {
  font-family: Grotesk;
  src: url(https://www.monicavinader.com/fonts/HK-grotesk-medium.woff2)
      format("woff2"),
    url(https://www.monicavinader.com/fonts/HK-grotesk-medium.woff)
      format("woff");
  font-weight: 500;
}
@font-face {
  font-family: Grotesk;
  src: url(https://www.monicavinader.com/fonts/HK-grotesk-semi-bold.woff2)
      format("woff2"),
    url(https://www.monicavinader.com/fonts/HK-grotesk-semi-bold.woff)
      format("woff");
  font-weight: 700;
}
.virom{
  flex-wrap: nowrap;
  margin: 0px;
padding: 0px;
}



/* xol-8*/


img {
  max-width: 100%; }

.preview {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }
  @media screen and (max-width: 996px) {
    .preview {
      margin-bottom: 20px; } }

.preview-pic {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

.preview-thumbnail.nav-tabs {
  border: none;
  margin-top: 15px; }
  .preview-thumbnail.nav-tabs li {
    width: 23%;
    margin-right: 2.5%;
    height: 105px; }
    .preview-thumbnail.nav-tabs li img {
      max-width: 100%;
    display: block;
    height:100px;
    width: 100%;}
    .preview-thumbnail.nav-tabs li a {
      padding: 0;
      margin: 0; }
    .preview-thumbnail.nav-tabs li:last-of-type {
      margin-right: 0; }

.tab-content {
  overflow: hidden; }
  .tab-content img {
    width: 100%;
    height: 100%;
    /* -webkit-animation-name: opacity; */
            /* animation-name: opacity; */
    -webkit-animation-duration: .3s;
            animation-duration: .3s; }

.card {
  /* margin-top: 50px; */
  background: #eee;
  /* padding: 3em; */
  line-height: 1.5em; }

@media screen and (min-width: 997px) {
  .wrapper {
    display: -webkit-box;
    display: -webkit-flex;
    display: -ms-flexbox;
    display: flex; } }

.details {
  display: -webkit-box;
  display: -webkit-flex;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-orient: vertical;
  -webkit-box-direction: normal;
  -webkit-flex-direction: column;
      -ms-flex-direction: column;
          flex-direction: column; }

.colors {
  -webkit-box-flex: 1;
  -webkit-flex-grow: 1;
      -ms-flex-positive: 1;
          flex-grow: 1; }

@media (min-width: 312px) and (max-width: 900px){
  .virom {
     flex-wrap: wrap !important;
}

.pi_no{
  padding-left: 0 !important;
  padding-right: 0 !important;
}

.tab-content .tab-pane{
  height: 388px !important;
}

.product-details__header{
  text-align: left !important;
}

.hel_mar{
  margin-left: 0px!important;
  margin-top: 30px !important;
}

.good_mar{
  margin-bottom: 1rem !important;
}

.product-details__header{
  padding-bottom: 0px !important;
margin-bottom: 0px !important;
}

.product-details__buttons{
      margin-bottom: 0px !important;
}





}
@-webkit-keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); }
          }

@keyframes opacity {
  0% {
    opacity: 0;
    -webkit-transform: scale(3);
            transform: scale(3); }
  100% {
    opacity: 1;
    -webkit-transform: scale(1);
            transform: scale(1); }
          }

   .tab-pane{
    height: 500px;
   }
button.colobtn.active.p-1{
  border:2px solid black !important;
}





/* these styles are for the demo, but are not required for the plugin */
		.zoom {
			display:inline-block;
			position: relative;
		}

		/* magnifying glass icon */
		.zoom:after {
			content:'';
			display:block;
			width:33px;
			height:33px;
			position:absolute;
			top:0;
			right:0;
			background:url(icon.png);
		}

		.zoom img {
			display: block;
		}

		.zoom img::selection { background-color: transparent; }

    .zoomImg {
        width: 800px !important;
        height: 800px !important;
    }


    .nav-tabs>li.active>a{
          border-bottom-color: #ddd !important;
    }


    /* review css start */

    .nav>li>a:focus, .nav>li>a:hover {
        text-decoration: underline !important;
        color: #63c7c5 !important;
        background: none;
        /* background-color: none; */
        /* color: #fff !important; */
    }

    /* .nav-link.show.active{
      background-color:#1f0b00;
      color: #fff !important;
    } */

    .md-outline input{
          border: 1px solid #1f0b00;
          height: 40px;
          border-radius: 0;
    }
    .md-outline textarea{
          border: 1px solid #1f0b00;
          border-radius: 0;
    }


    .nav-link{
      color: black;
text-transform: uppercase;
font-weight: 700;
font-size: 15px !important;
    }


    #description{
      height:auto !important;
    }
    #info{
      height:auto !important;
    }
    #reviews{
      height:auto !important;
    }

    /* review css end */
.top_star .fa.fa-star {
    margin-right: 5px;
    opacity: 1;
}




/* rating css start */

/* Rating cSS */

/* RATING - Form */
.rating-form {
	margin-top: 40px;
}

	/* RATING - Form - Group */
	.rating-form .form-group {
    position: relative;
    border: 0;
	}

	/* RATING - Form - Legend */
	.rating-form .form-legend {
		display: none;
		margin: 0;
		padding: 0;
		font-size: 20px; font-size: 2rem;
		/*background: green;*/
	}

	/* RATING - Form - Item */
	.rating-form .form-item {
		position: relative;
		margin: auto;
		width: 300px;
		text-align: center;
		direction: rtl;
		/*background: green;*/
	}

	.rating-form .form-legend + .form-item {
		padding-top: 10px;
	}

		.rating-form input[type='radio'] {
			position: absolute;
			left: -9999px;
		}

	  /* RATING - Form - Label */
	  .rating-form label {
		display: inline-block;
		cursor: pointer;
	  }

		.rating-form .rating-star {
       display: inline-block;
			position: relative;
		}

	.rating-form input[type='radio'] + label:before {
		content: attr(data-value);
		position: absolute;
    height: 0;

     top:-35px;
		font-size: 30px; font-size: 3rem;
		opacity: 0;
		direction: ltr;
		.transition();
	}




	.rating-form input[type='radio']:checked + label:before {
		right: 152px;
		opacity: 1;
    top: -3px;
	}

	.rating-form input[type='radio'] + label:after {
		content: "/ 5";
		position: absolute;
		right:110px;
    top:0px;
		font-size: 16px; font-size: 2.8rem;
		opacity: 0;
		direction: ltr;
		.transition();
	}

	.rating-form input[type='radio']:checked + label:after {
		/*right: 5px;*/
		opacity: 1;
	}

		.rating-form label .fa {

       font-size:2rem;
		  line-height: 60px;
		  .transition();
		}

		.rating-form label .fa-star-o {

		}

		.rating-form label:hover .fa-star-o,
		.rating-form label:focus .fa-star-o,
		.rating-form label:hover ~ label .fa-star-o,
		.rating-form label:focus ~ label .fa-star-o,
		.rating-form input[type='radio']:checked ~ label .fa-star-o {
		  opacity: 0;
		}

		.rating-form label .fa-star {
		  position: absolute;
		  left: 0; top: 0;
		  opacity: 1;
          color: lightgrey;
		}

		.rating-form label:hover .fa-star,
		.rating-form label:focus .fa-star,
		.rating-form label:hover ~ label .fa-star,
		.rating-form label:focus ~ label .fa-star,
		.rating-form input[type='radio']:checked ~ label .fa-star {
		  opacity: 1;
		}

		.rating-form input[type='radio']:checked ~ label .fa-star {
		  color: gold;
		}

		.rating-form .ir {
		  position: absolute;
		  left: -9999px;
		}

	/* RATING - Form - Action */
	.rating-form .form-action {
		opacity: 0;
		position: absolute;
		left:-22px;
    top: 30px;
    bottom: -40px;
		.transition();
	}

	.rating-form input[type='radio']:checked ~ .form-action {
	  cursor: pointer;
	  opacity: 1;
	}

	.rating-form .btn-reset {
		display: inline-block;
		margin: 0;
		padding: 4px 18px;
		border: 0;
		font-size: 10px; font-size: 1rem;
		background: #fff;
		color: #333;
		cursor: auto;
		border-radius: 5px;
		outline: 0;
		.transition();
	}

	   .rating-form .btn-reset:hover,
	   .rating-form .btn-reset:focus {
		 background: gold;
	   }

	   .rating-form input[type='radio']:checked ~ .form-action .btn-reset {
		 cursor: pointer;
	   }


	/* RATING - Form - Output */
	.rating-form .form-output {
		display: none;
		position: absolute;
		right: 15px; bottom: -45px;
		font-size: 20px; font-size: 2rem;
		opacity: 0;
		.transition();
	}

	.no-js .rating-form .form-output {
		right: 5px;
		opacity: 1;
	}

	.rating-form input[type='radio']:checked ~ .form-output {
		right: 5px;
		opacity: 1;
	}


/* review list rating icon small */
  .rating_smal{
      font-size: 15px;
  }


  .virom{
  flex-wrap: nowrap;
}





/* rating css end */



/* .border{
      border: 1px solid #1f0b00!important;
} */


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



<?php


if(!empty($product_data)){


// echo $product_data->id; die();
$pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $product_data->id)->first();

if(!empty($pro_type_color)){

$color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

if(!empty($color_da)){
  $color= $color_da->name;
  $color_code= $color_da->code;
}else{
  $color="Color Not Found!";
  $color_code="";
}

  $images1= $pro_type_color->image1;
  $images2= $pro_type_color->image2;
  $images3= $pro_type_color->image3;
  $images4= $pro_type_color->image4;
  $mrp= $pro_type_color->mrp;
  $price= $pro_type_color->price;

  if(!empty($images1)){
    $image1=base_path.$images1;
  }else{
    $image1="";
  }

  if(!empty($images2)){
      $image2=base_path.$images2;
  }else{
    $image2="";
  }

  if(!empty($images3)){
      $image3=base_path.$images3;
  }else{
    $image3="";
  }

  if(!empty($images4)){
      $image4=base_path.$images4;
  }else{
    $image4="";
  }

}else{
  $image1="";
  $image2="";
  $image3="";
  $image4="";
  $mrp= "MRP Not Found!";
  $price= "Price Not Found!";
  $color= "Color Not Found!";
  $color_code="";
}

?>
<!-- saprat -->
<script type="text/javascript">

</script>



<div class="paddingfromtop ofn" style="overflow:hidden">

<div class="container mt-5 mb-5 good_mar">
  <h1 style="font-family: 'Lato', sans-serif;;margin-top: 30px;font-size: 12px;margin-bottom: 2rem;" class="hoverh1"><?=$cat_data->name."/".$sub_cat_data->name; if(!empty($mini_sub_data->name)){echo "/";?><span style="font-size:12px;"><?=$mini_sub_data->name?></span><?}?></h1>
  <div class="row virom">
    <div class="col-md-6 pi_no">
          <div class="preview-pic tab-content" style="border: 1px solid #ddd;">
              <div class="tab-pane active zoom" id="pic-1" ><img id="main_img1" src="<?=$image1;?>" /></div>
              <div class="tab-pane" id="pic-2"><img id="main_img2" src="<?=$image2;?>" /></div>
              <div class="tab-pane" id="pic-3"><img id="main_img3"src="<?=$image3;?>" /></div>
              <div class="tab-pane" id="pic-4"><img id="main_img4"src="<?=$image4;?>" /></div>
              <!-- <div class="tab-pane" id="pic-5"><img src="https://cfs3.monicavinader.com/images/pdpdetaildesktop/3213039-ss-rg-rshr-dia.jpg" /></div> -->
            </div>
            <ul class="preview-thumbnail nav nav-tabs">
              <?php if(!empty($image1)){  ?>
                      <li class="active"><a data-target="#pic-1" data-toggle="tab"><img id="my_img1" src="<?=$image1;?>" /></a></li>
                <?php }else{ ?>

                  <li class="active"><a  data-toggle="tab"><img src="<?=base_path?>frontend/assets/img/blank_img.jpg" /></a></li>
                   <?php } ?>

             <?php if(!empty($image2)){  ?>
                     <li class=""><a data-target="#pic-2" data-toggle="tab"><img id="my_img2" src="<?=$image2;?>" /></a></li>
               <?php }else{ ?>

                 <li class=""><a  data-toggle="tab"><img src="<?=base_path?>frontend/assets/img/blank_img.jpg" /></a></li>
                  <?php } ?>

                <?php if(!empty($image3)){  ?>
                    <li class=""><a data-target="#pic-3" data-toggle="tab"><img id="my_img3" src="<?=$image3;?>" /></a></li>
                <?php }else{ ?>

                <li class=""><a  data-toggle="tab"><img src="<?=base_path?>frontend/assets/img/blank_img.jpg" /></a></li>
                 <?php } ?>


                <?php if(!empty($image4)){  ?>
                   <li class=""><a data-target="#pic-4" data-toggle="tab"><img id="my_img4" src="<?=$image4;?>" /></a></li>
                <?php }else{ ?>

                <li class=""><a  data-toggle="tab"><img src="<?=base_path?>frontend/assets/img/blank_img.jpg" /></a></li>
                <?php } ?>

              <!-- <li><a data-target="#pic-2" data-toggle="tab"><img src="https://cfs3.monicavinader.com/images/pdpdetaildesktop/3212970-ss-rg-rhoo-dia.jpg" /></a></li>
              <li><a data-target="#pic-3" data-toggle="tab"><img src="https://cfs3.monicavinader.com/images/pdpdetaildesktop/3213039-ss-rg-rshr-dia.jpg" /></a></li>
              <li><a data-target="#pic-4" data-toggle="tab"><img src="https://cfs3.monicavinader.com/images/pdpdetaildesktop/3212970-ss-rg-rhoo-dia.jpg" /></a></li> -->
              <!-- <li><a data-target="#pic-5" data-toggle="tab"><img src="https://cfs3.monicavinader.com/images/pdpdetaildesktop/3213039-ss-rg-rshr-dia.jpg" /></a></li> -->
            </ul>
    </div>
    <div class="col-md-6 ml-auto pi_no">
  <article class="product-details">

    <header class="product-details__header">
      <h1 class="product-details__title" style="    font-family: 'Calibri'!important;"><?=$product_data->name;?></h1>
      <h6><strong id="boldfont"> <?=$product_data->sku_id;?></strong></h6>
      <div class="d-flex top_star mb-3 seticon">


        <?php
          //total products Average Rating
  $query = App\frontendmodel\Rating::wherenull('deleted_at')->where('product_id', $product_data->id)->get();


  // print_r($query->result()) ; die();
  $z="";
  if(!empty($query)){
  foreach($query as $val){

     $z= round($val->rating);
  }
  }

            ?>



                    <?php if( $z >= 1 ){?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php } else{ ?>
                    <i class="fa fa-star-o seticoni" ></i>
                    <?php }?>

                    <?php if( $z >= 2 ){?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php } else{ ?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php }?>

                    <?php if( $z >= 3 ){?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php } else{ ?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php }?>

                    <?php if( $z >= 4 ){?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php } else{ ?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php }?>

                    <?php if( $z >= 5 ){?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php } else{ ?>
                    <i class="fa fa-star-o seticoni"></i>
                    <?php }?>



      <!-- <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i>
      <i class="fa fa-star"></i> -->
    </div>
    <!-- <script>
    let star = document.querySelectorAll('.seticoni')
    for(let i=0;i<star.length;i++){
          star[i].addEventListener("click", function(event) {
            if(event.target.style.color==="yellow"){
            if(i==0){
              star[i].style.color="yellow";
            } else{
              for(let j=0;j<=i;j++){
                star[j].style.color="yellow";
              }
            }
} else{
  if(i==0){
    star[i].style.color="yellow";
  } else{
    for(let j=0;j<=i;j++){
      star[j].style.color="yellow";
    }
  }
}

    });
}
    </script> -->

      <?php

      $user_idd= Session::get('user_id');

      $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $product_data->id)->first();


      // print_r($wish_datas);
      if(!empty($wish_datas)){

      ?>
              					<span style="position:absolute;
    right: 5px;
    font-size: 20px;
    top: 5px;
    /* background: #e9e9e9; */
    height: 30px;
    width: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* border-radius: 50px; */

    ">
                          <i class="fa fa-heart-o" style="color:#ffa4a8;"></i>
                        </span>

      <?php } else{?>

                      <span style="    position: absolute;
    right: 5px;
    font-size: 20px;
    top: 5px;
    /* background: #e9e9e9; */
    height: 30px;
    width: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    /* border-radius: 50px; */
    " onclick="addToWishlist(<?=$product_data->id;?>)">
                        <i class="fa fa-heart-o" style=""></i>
                      </span>

      <?php } ?>

      <!-- <p class="product-details__subtitle">18ct Gold Vermeil</p> -->
      <div class="product-details__price-and-stock">
        <?if($mrp * $currency_price !=(int)$price * $currency_price){?>
          <p class="product-details__price">
          <del class="mb-4"><?=$sign;?> <span id="mrp_<?=$product_data->id;?>" ><?=(int)$mrp * $currency_price;?></span></del>
           <br>
             </p>
             <?}?>
        <div class="setprice">
          <span style="font-weight:600;"><?=$sign;?></span><span style="font-weight:600;" id="price_<?=$product_data->id;?>" ><?=(int)$price * $currency_price;?></span>
        </div>
          &nbsp; <span style="color:#f11313;font-size:13px;font-weight: 600;" id="price_discount_<?=$product_data->id?>">

<?php
if($mrp != "MRP Not Found!" && $price != "Price Not Found!"){
$diff_price= $mrp- $price;
// echo "hi".$diff_price;
// exit;
if($diff_price >0){
 $discount= round($diff_price*100/$mrp);
 if($discount!="0" || $discount!=$price){
 echo "( ".$discount."% Off )";
 }
}
}
?>
          </span>

      </div>
    </header>
    <div class="product-details__swatches">
    </divxc
    <div class="size-selector">
      <p class="size-selector__title">Color:</p>
      <div class="size-selector__content" style="height: 4rem;">
        <div class="size-selector__options">

      <?php
          $pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $product_data->id)->get();
          $pro_type_color1= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $product_data->id)->first();
          // print_r($pro_type_color1);
          // exit;

          if(!empty($pro_type_color)){
            $i=0;
          foreach ($pro_type_color as $pro_color) {

          $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_color->color_id)->first();

          if(!empty($color_da)){ ?>


      <div class="colorh">


        <button id="asc_<?=$color_da->id;?>" class="colobtn  p-1 <?php if($i == 0){ echo "active"; } ?> " style="height:25px; width:25px;background:<?=$color_da->code;?>;border:none; border-radius:50px;" onclick="colorChange(<?=$color_da->id;?>, <?=$product_data->id;?>);"  ></button>
      <div class="colorhov">
  <input type="hidden" value="<?=$color_da->id;?>" id="color_select_<?=$product_data->id;?>" name="color_select" style="display:none;"><?=$color_da->name?>
        </div>
                </div>
      <?php } ?>
        <?php
        $i++;  } }
        ?>
       <!-- <button class="colobtn  p-1" style="height:25px; width:25px;background:red;border:none; border-radius:50px;"></button>  -->




        </div>
        <!-- <p class="size-selector__guide">|<a class="modal" href="/ring-size-guide">Size guide</a></p> -->
        <p class="size-selector__error">Please select a ring size above</p>

      </div>
    </div>
    <div class="product-details__buttons">
      <div class="pdp-options__group">

        <div id="js-applepay" data-applepay="{&quot;countryCode&quot;:&quot;GB&quot;,&quot;currencyCode&quot;:&quot;GBP&quot;,&quot;shippingMethods&quot;:[{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_66&quot;,&quot;label&quot;:&quot;No Hurry Delivery&quot;,&quot;amount&quot;:&quot;0.00&quot;,&quot;detail&quot;:&quot;No Hurry Delivery&quot;},{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_1&quot;,&quot;label&quot;:&quot;Standard Delivery&quot;,&quot;amount&quot;:&quot;3.95&quot;,&quot;detail&quot;:&quot;Standard Delivery&quot;},{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_20&quot;,&quot;label&quot;:&quot;Next Day Delivery&quot;,&quot;amount&quot;:&quot;7.95&quot;,&quot;detail&quot;:&quot;Next Day Delivery (excl. weekends)&quot;},{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_2&quot;,&quot;label&quot;:&quot;Next Morning Delivery&quot;,&quot;amount&quot;:&quot;11.95&quot;,&quot;detail&quot;:&quot;Next Morning Delivery (excl. weekends)&quot;}],&quot;informationPromotion&quot;:null,&quot;promotion&quot;:null,&quot;lineItems&quot;:[{&quot;key&quot;:&quot;Products_StockItem_37152&quot;,&quot;label&quot;:&quot;Siren Muse Wide Ring 18ct Gold Vermeil on Sterling Silver&quot;,&quot;qty&quot;:1,&quot;amount&quot;:170}],&quot;total&quot;:{&quot;label&quot;:&quot;Total&quot;,&quot;amount&quot;:170},&quot;supportedNetworks&quot;:[&quot;amex&quot;,&quot;discover&quot;,&quot;masterCard&quot;,&quot;visa&quot;],&quot;merchantCapabilities&quot;:[&quot;supports3DS&quot;],&quot;requiredShippingContactFields&quot;:[&quot;postalAddress&quot;,&quot;email&quot;],&quot;selectedShippingMethod&quot;:null}" class="pdp" style="display: none;">


        </div>


        <?php if(empty(Session::get('user_data'))) {?>
          <div class="d-flex">



          <!-- <a type="button" class="btn dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false" style="background:none;width: 9rem;"> -->



          <select class="opt" id="quantity" name="quantity" style="margin-top:1.4rem;" onchange="myFunction()">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
          </select>

                  <button type="button" style="width:41rem;margin-left: 2rem;" class="product-details__add-to-basket button button--full button--alt mt-4" id="js-add-to-basket" data-after-href="/basket/recently-added?stockitem=5056112555940" data-href="#"
            onclick="addToCartOfflineHandler2(this)"
              data-product-id="<?=$product_data->id;?>"
              color_id="<?=$pro_type_color1->color_id?>"
              quantity="1"
              status="0">
              <span class="add-to-basket__default" data-added="Added to Bag">
                Add to Bag
                <img src="https://www.monicavinader.com/images/2020/arrow-right-white.svg" width="14px" height="16px">
              </span>
              <span class="add-to-basket__spinner">
                Adding
                <img src="https://www.monicavinader.com/images/2020/spinner.svg" width="14px" height="16px">
              </span>
            </button>
       </div>
        <?php } else{?>
      <div class="d-flex">
        <!-- <lable>Qty</label> -->
          <select class="opt" id="quantity" name="quantity" style="margin-top:1.4rem;" onchange="myFunction()">
           <option value="1">1</option>
           <option value="2">2</option>
           <option value="3">3</option>
           <option value="4">4</option>
           <option value="5">5</option>
          </select>

         <button type="button" style="width:41rem;margin-left: 2rem;" class="product-details__add-to-basket button button--full button--alt" id="js-add-to-basket" data-after-href="/basket/recently-added?stockitem=5056112555940" data-href="#"
        onclick="addToCartOnlineHandler(this)"
        data-category-id="<?= $product_data->category;?>"
        data-subcategory-id="<?= $product_data->sub_category_id;?>"
        data-product-id="<?= $product_data->id;?>"
        user-id="<?= Session::get('user_id');?>"
        quantity="1"
        >
           <span class="add-to-basket__default" data-added="Added to Bag">
             Add to Bag
             <img src="https://www.monicavinader.com/images/2020/arrow-right-white.svg" width="14px" height="16px">
           </span>
           <span class="add-to-basket__spinner">
             Adding
             <img src="https://www.monicavinader.com/images/2020/spinner.svg" width="14px" height="16px">
           </span>
         </button>
 </div>
        <?php } ?>


      </div>
 <div class="linecreate1"></div>
     <div class="container-fluid pdic">

  <div class="seticons">

         <i class="bi bi-envelope"></i><p class="designp">Drop a Hint? <a id="dahTriggerInner" href="<?=base_path?>contact_us" style="text-decoration:underline !important;">click here</a></p><br>
          <a id="dahTriggerInner" href="<?=base_path?>packaging" style=""><i class="bi bi-truck"></i><p class="designp">Worldwide Shipping <span id="mobbenefits-txt">(incl. India)</span></p><br></a>
         <!-- <i class="bi bi-truck"></i><p class="designp">Worldwide Shipping <span id="mobbenefits-txt">(incl. India)</span></p><br> -->
           <a id="dahTriggerInner" href="<?=base_path?>Refund_Policy" style=""><i class="bi bi-arrow-clockwise"></i><p class="designp">60-DAY RETURN POLICY ON ALL ORDERS</p><br></a>
         <!-- <i class="bi bi-arrow-clockwise"></i><p class="designp">60-DAY RETURN POLICY ON ALL ORDERS</p><br> -->
         <!-- <i class="bi bi-gem"></i><p class="designp"><a href="/pages/faq#faq-materials-gia"><u>GIA</u></a> Lab Approved Gem Authenticity</p><br> -->

       </div>
       </div>
       <div class="linecreate"></div>

     </div>

      <!-- <div class="product-details__help js-product-benefit-target">
        <p class="product-details__delivery-message">
          <?=$product_data->sdesc;?>
         </p>
      </div> -->


        <style>
            #boldfont{
              font-size: 1.5rem;
            }
            .seticon{
              /* margin-left: -6.5rem; */
              /* margin-left: -3.5rem; */
              margin-top: 1rem;
              margin-bottom: 1rem;
              font-size: 2.5rem;
              opacity: 1;
            }
            .setprice{
              /* margin-left: -10rem; */
            font-size: 2rem;
            }
        </style>
      <style>





                .size-selector__options{
                  display: flex;
                  text-indent: 4px;
                }
                .colorhov{
                  display: none;
                }
                .colorh{
                  height: 65px;
                }
                .colorh:hover .colorhov{
                  display: block;
                }

                .linecreate{
                  border: 0.8px solid black;
                  opacity: 0.2;
                }
                .linecreate1{
                  border: 0.8px solid black;
                  opacity: 0.2;
                  margin-top: 3rem;
                }
                .designp{
                  display: inline-block;
                  margin-left: 2rem;
                  font-size: 11px !important;
                }
                .seticons{
                  line-height: 2;
                  font-family: 'Montserrat', sans-serif;
                  font-weight: bold;
                  font-size: 11px !important;
                  text-transform: uppercase;
                }
                .seticons i{
                  font-size: 21.5px;
                  opacity: 0.6;
                }
                .seticons a{
                  font-size: 1.1rem !important;
                }
                @media (max-width:1243px) {
                  .responsive1{
                      margin-left: 0rem !important;
                      width: 100% !important;
                  }
                }
      </style>
      <style>
           .stylep{
             font-size: 1rem;
           }
           .btnbold{
             font-size: 1.4rem !important;
             font-family: Montserrat,sans-serif; !important;
             letter-spacing: 2px;
             text-transform: uppercase;
             font-weight: 700 !important;
             color: #2f2f2f !important;
             padding: 20px;
             background: #f8f8f8 !important;
           }
           .bgcolor{
             background: #f8f8f8 !important;
           }

      </style>
      <button class="accordionq"> Product Description</button>
<div class="panel" style="background-color: #f7f5f3">
  <p><?=$product_data->sdesc;?></p>
</div>

<button class="accordionq">Buy with Confidence</button>
<div class="panel" style="background-color: #f7f5f3">
  <p><strong style="font-weight:700;font-size:1.4rem;">Premium Materials:</strong><p class="stylep"> Authentic gemstones and nickel-free metals</p><br>
<strong style="font-weight:700;font-size:1.4rem;">Approachable Pricing:</strong><p class="stylep"> Online only business model that keeps prices fair</p><br>
<strong style="font-weight:700;font-size:1.4rem;">5 Star Customer Service:</strong><p class="stylep"> Dedicated international team that’s ready to help</p><br>
<strong style="font-weight:700;font-size:1.4rem;">Fast Worldwide Shipping:</strong> <p class="stylep">2-6 business days (US); 2-7 business days (most international countries)*</p><br>
<strong style="font-weight:700;font-size:1.4rem;">Hassle-Free Returns:</strong><p class="stylep"> 60 days return policy, send back for any reason</p><br>
<strong style="font-weight:700;font-size:1.4rem;">Safe &amp; Secure Payments:</strong><p class="stylep"> Check out with PayPal or any major credit card </p><br>
<br><br>
*<strong><p class="stylep">Covid Shipping Update: Our carrier is operating with the utmost caution to protect our customers and the delivery workers. Unfortunately, this may add to unavoidable delivery delays.
We appreciate your patience and understanding during this time.</p></strong></p>
</div>

<button class="accordionq">  About this product</button>
<div class="panel" style="background-color: #f7f5f3">
  <!-- <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p> -->
  <!-- <div class="product-info__accordionq"> -->

<?php if(!empty($product_data->point1)){ ?>
    <div class="accordionq accordionq--bare accordionq--product-details js-product-usps-accordionq">
      <div class="accordionq__head">
        <button type="button" class="accordionq__button js-product-usps-accordionq__trigger" style="white-space: normal; text-align: left;">
          <div class="accordionq__button-content">
            <span class="accordionq__icon">
              <!-- <img src="https://www.monicavinader.com/images/2020/usp-icons/recycled-silver-black.svg" width="14px" height="16px"> -->
              <img src="https://www.monicavinader.com/images/2020/usp-icons/heart-black.svg" width="14px" height="16px">
            </span>
            <p><?=$product_data->point1;?></p>
            <span class="accordionq__status">

            </span>
          </div>
        </button>
      </div>
      <div class="accordionq__wrap">
        <div class="richtext richtext--flush accordionq__body">
          <p>In April 2020 we transitioned to manufacturing all our jewellery
            in 100% <u><a href="https://www.monicavinader.com/sustainability/recycled-silver">Recycled
                Sterling Silver</a></u> and Gold Vermeil. Recycling Silver cuts
            down CO2 emissions by &#8532; versus mined silver. It is better for the
            environment, reduces water usage and reduces other environmental
            impacts.</p>
        </div>
      </div>
    </div>

<?php } if(!empty($product_data->point2)){ ?>
    <div class="accordionq accordionq--bare accordionq--product-details js-product-usps-accordionq">
      <div class="accordionq__head">
        <button type="button" class="accordionq__button js-product-usps-accordionq__trigger" style="white-space: normal; text-align: left;">
          <div class="accordionq__button-content">
            <span class="accordionq__icon">
              <img src="https://www.monicavinader.com/images/2020/usp-icons/heart-black.svg" width="14px" height="16px">
            </span>
            <p><?=$product_data->point2;?></p>
            <span class="accordionq__status">
              <
            </span>
          </div>
        </button>
      </div>
      <div class="accordionq__wrap">
        <div class="richtext richtext--flush accordionq__body">
          <p>We are certified members of the Responsible Jewellery Council,
            meaning that we adhere to and promote fair and equal human and
            labour rights, working to transform jewellery supply chains to be
            more responsible and sustainable.</p>
        </div>
      </div>
    </div>

<?php } if(!empty($product_data->point3)){ ?>
    <div class="accordionq accordionq--bare accordionq--product-details js-product-usps-accordionq">
      <div class="accordionq__head">
        <button type="button" class="accordionq__button js-product-usps-accordionq__trigger" style="white-space: normal; text-align: left;">
          <div class="accordionq__button-content">
            <span class="accordionq__icon">
              <img src="https://www.monicavinader.com/images/2020/usp-icons/heart-black.svg" width="14px" height="16px">
            </span>
            <p><?=$product_data->point3;?></p>
            <span class="accordionq__status">
              <
            </span>
          </div>
        </button>
      </div>
      <div class="accordionq__wrap">
        <div class="richtext richtext--flush accordionq__body">
          <p>We are certified members of the Responsible Jewellery Council,
            meaning that we adhere to and promote fair and equal human and
            labour rights, working to transform jewellery supply chains to be
            more responsible and sustainable.</p>
        </div>
      </div>
    </div>

<?php } if(!empty($product_data->point4)){ ?>
    <div class="accordionq accordionq--bare accordionq--product-details js-product-usps-accordionq">
      <div class="accordionq__head">
        <button type="button" class="accordionq__button js-product-usps-accordionq__trigger" style="white-space: normal; text-align: left;">
          <div class="accordionq__button-content">
            <span class="accordionq__icon">
              <img src="https://www.monicavinader.com/images/2020/usp-icons/heart-black.svg" width="14px" height="16px">
            </span>
            <p><?=$product_data->point4;?></p>
            <span class="accordionq__status">
              <
            </span>
          </div>
        </button>
      </div>
      <div class="accordionq__wrap">
        <div class="richtext richtext--flush accordionq__body">
          <p>We are certified members of the Responsible Jewellery Council,
            meaning that we adhere to and promote fair and equal human and
            labour rights, working to transform jewellery supply chains to be
            more responsible and sustainable.</p>
        </div>
      </div>
    </div>
<?php } if(!empty($product_data->point5)){ ?>
    <div class="accordionq accordionq--bare accordionq--product-details js-product-usps-accordionq">
      <div class="accordionq__head">
        <button type="button" class="accordionq__button js-product-usps-accordionq__trigger" style="white-space: normal; text-align: left;">
          <div class="accordionq__button-content">
            <span class="accordionq__icon">
              <img src="https://www.monicavinader.com/images/2020/usp-icons/heart-black.svg" width="14px" height="16px">
            </span>
            <p><?=$product_data->point5;?></p>
            <span class="accordionq__status">
              <
            </span>
          </div>
        </button>
      </div>
      <div class="accordionq__wrap">
        <div class="richtext richtext--flush accordionq__body">
          <p>We are certified members of the Responsible Jewellery Council,
            meaning that we adhere to and promote fair and equal human and
            labour rights, working to transform jewellery supply chains to be
            more responsible and sustainable.</p>
        </div>
      </div>
    </div>
<?php } ?>


</div>



      <!-- <div class="accordionq accordionq-flush" id="accordionqFlushExample"> -->



      <!-- <div class="accordionq" id="accordionqExample">
    <div class="accordionq-item">
      <h2 class="accordionq-header" id="headingOne">
        <a class="accordionq-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Product Details
        </a>
      </h2>
      <div id="collapseOne" class="accordionq-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionqExample">
        <div class="accordionq-body">
          <?=$product_data->sdesc;?>
        </div>
      </div>
    </div>
    <div class="accordionq-item">
      <h2 class="accordionq-header" id="headingTwo">
        <a class="accordionq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          All product
        </a>
      </h2>
      <div id="collapseTwo" class="accordionq-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionqExample">
        <div class="accordionq-body">
          <?=$product_data->sdesc;?>
        </div>
      </div>
    </div>
    <div class="accordionq-item">
      <h2 class="accordionq-header" id="headingThree">
        <a class="accordionq-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Product Deatils
        </a>
      </h2>
      <div id="collapseThree" class="accordionq-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionqExample">
        <div class="accordionq-body">
          <strong>          <?=$product_data->sdesc;?>

      </div>
    </div>
  </div> -->


      </div>

      <div class="product-details__benefits">
        <div class="product-benefits">
          <div class="product-benefits__title">Order with Confidence</div>
          <!-- <div class="product-benefits__accordionq">
            <div class="accordionq accordionq--bare accordionq--product-details accordionq--product-benefits js-product-benefits-accordionq accordionq--invalid accordionq--retain-head">
              <div class="accordionq__head">
                <button type="button" class="accordionq__button js-product-benefits-accordionq__trigger js-product-benefit" data-benefit="&quot;<p>We offer free delivery and also offer a range of premium\ndelivery services. Minimum spend may apply, <u><a href=\n\&quot;https:\/\/help.monicavinader.com\/en\/support\/solutions\/folders\/27000059255\&quot;>\nfind out more<\/a><\/u>.<\/p>\n&quot;" tabindex="-1">
                  <div class="accordionq__button-content">
                    <span class="accordionq__icon">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/free-delivery-black.svg" width="14px" height="16px">
                    </span>
                    <p>Free Delivery</p>
                    <span class="accordionq__status">
                      <img src="https://www.monicavinader.com/images/2020/plus-black.svg" width="14px" height="16px">
                    </span>
                  </div>
                </button>
              </div>
              <div class="accordionq__wrap">
                <div class="richtext richtext--flush accordionq__body">
                  <p>We offer free delivery and also offer a range of premium
                    delivery services. Minimum spend may apply, <u><a href="https://help.monicavinader.com/en/support/solutions/folders/27000059255">
                        find out more</a></u>.</p>
                </div>
              </div>
            </div>
            <div class="accordionq accordionq--bare accordionq--product-details accordionq--product-benefits js-product-benefits-accordionq accordionq--invalid accordionq--retain-head">
              <div class="accordionq__head">
                <button type="button" class="accordionq__button js-product-benefits-accordionq__trigger js-product-benefit" data-benefit="&quot;<p>We guarantee a full money-back refund within 100 days of\npurchase, for pieces in their original condition. Engraved items\nare non-refundable.<\/p>\n&quot;" tabindex="-1">
                  <div class="accordionq__button-content">
                    <span class="accordionq__icon">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/returns-black.svg" width="14px" height="16px">
                    </span>
                    <p>100-Day Returns</p>
                    <span class="accordionq__status">
                      <img src="https://www.monicavinader.com/images/2020/plus-black.svg" width="14px" height="16px">
                    </span>
                  </div>
                </button>
              </div>
              <div class="accordionq__wrap">
                <div class="richtext richtext--flush accordionq__body">
                  <p>We guarantee a full money-back refund within 100 days of
                    purchase, for pieces in their original condition. Engraved items
                    are non-refundable.</p>
                </div>
              </div>
            </div>
            <div class="accordionq accordionq--bare accordionq--product-details accordionq--product-benefits js-product-benefits-accordionq accordionq--invalid accordionq--retain-head">
              <div class="accordionq__head">
                <button type="button" class="accordionq__button js-product-benefits-accordionq__trigger js-product-benefit" data-benefit="&quot;<p>Every hand-crafted piece comes with our 5-Year Warranty. Whether\nyou want your ring resized or piece replated, we will repair your\njewellery free of charge<\/p>\n&quot;" tabindex="-1">
                  <div class="accordionq__button-content">
                    <span class="accordionq__icon">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/warranty-black.svg" width="14px" height="16px">
                    </span>
                    <p>5-Year Warranty</p>
                    <span class="accordionq__status">
                      <img src="https://www.monicavinader.com/images/2020/plus-black.svg" width="14px" height="16px">
                    </span>
                  </div>
                </button>
              </div>
              <div class="accordionq__wrap">
                <div class="richtext richtext--flush accordionq__body">
                  <p>Every hand-crafted piece comes with our 5-Year Warranty. Whether
                    you want your ring resized or piece replated, we will repair your
                    jewellery free of charge</p>
                </div>
              </div>
            </div>
          </div> -->
        </div>
      </div>
      <!-- <div class="product-details__stylist">
        <p>Need style assistance? <a href="/virtual-styling-appointments">Click here to book a stylist
            appointment</a></p>
      </div> -->
    </div>
  </article>
</div>
    </div>
  </div>
</section>
</div>



<!-- rew section start -->

<!-- Classic tabs -->
<div class="container-fluid">
<div class="row">

<div class="col-sm-6 col-xs-12 col-md-6">


<div class="container hel_mar col-md-12" style="    margin-top:5rem;margin-left: 1rem;background-color: #f7f5f3;">

<div class="classic-tabs">

  <ul class="nav tabs-primary nav-justified" id="advancedTab" role="tablist">
    <li class="nav-item">
      <a class="nav-link active show responsive" id="description-tab" data-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true" style="width:44%;    font-family: 'Calibri'!important;">Description</a>
    </li>
    <!-- <li class="nav-item">
      <a class="nav-link" id="info-tab" data-toggle="tab" href="#info" role="tab" aria-controls="info" aria-selected="false">Information</a>
    </li> -->
    <li class="nav-item">

<?php
$review_count= App\frontendmodel\Rating::wherenull('deleted_at')->where('product_id',$product_data->id)->count();
?>

      <a class="nav-link responsive1" id="-tab" data-toggle="tab" href="#reviews" role="tab" aria-controls="reviews" aria-selected="false"style="width:44%;margin-left: -18rem;    font-family: 'Calibri'!important;">Reviews (<?=$review_count;?>)</a>
    </li>
  </ul>
  <div class="tab-content" id="advancedTabContent" style="    padding: 2rem;">
    <div class="tab-pane fade active in show" id="description" role="tabpanel" aria-labelledby="description-tab">
      <h5 style="font-weight: 700;">Product Description</h5><br>
      <!-- <p class="small text-muted text-uppercase mb-2">Shirts</p> -->

      <p class="pt-1">
        <?=$product_data->ldesc;?>
      </p>
    </div>

    <div class="tab-pane fade" id="info" role="tabpanel" aria-labelledby="info-tab">
      <h5 style="font-weight:700;">Additional Information</h5>
      <table class="table table-striped table-bordered mt-3">
        <thead>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">Weight</th>
            <td><em>0.3 kg</em></td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row" class="w-150 dark-grey-text h6">Dimensions</th>
            <td><em>50 × 60 cm</em></td>
          </tr>
        </tbody>
      </table>
    </div>

<?php

$review_data= App\frontendmodel\Rating::wherenull('deleted_at')->where('product_id',$product_data->id)->get();

$review_count= App\frontendmodel\Rating::wherenull('deleted_at')->where('product_id',$product_data->id)->count();
// $review_count= 1;
if($review_count <= 1){
  $text= "review";
}else{
  $text= "reviews";
}

?>


    <div class="tab-pane fade" id="reviews" role="tabpanel" aria-labelledby="reviews-tab">
      <h5><span><?=$review_count;?></span> review for <span><?=$product_data->name;?></span></h5>

<?php
       if(!empty($review_data)){
            foreach ($review_data as $review) {

$user_ids= $review->user_id;


$dat= App\frontendmodel\User::wherenull('deleted_at')->where('id',$user_ids)->where('is_active', 1)->first();

if(!empty($dat)){
  $user_name= $dat->name;
}else{
  $user_name= "";
}

?>

      <div class="media mt-3 mb-4">
        <!-- <img style="width:70px !important; height:50px !important;" class="d-flex mr-3 z-depth-1" src="https://mdbootstrap.com/img/Photos/Others/placeholder1.jpg" width="62" alt="Generic placeholder image"> -->
        <div class="media-body">
          <div class="d-sm-flex" style="flex-direction: column-reverse;">
            <p class="mt-1 mb-2">
              <strong><?=$user_name;?> </strong>
              <span>– </span><span>
                <?php
                $newdate = new DateTime($review->created_at);
                echo $newdate->format('j F, Y, g:i a');   #d-m-Y  // March 10, 2001, 5:16 pm
              ?>
              </span>
            </p>
            <ul class="rating  d-flex mb-sm-0">


              <?php if( $review->rating >= 1 ){?>

              <li>
                <i class="fa fa-star fa-sm oran" style="color: orange !important;"></i>
              </li>
              <?php } else{ ?>
                <li>
                <i class="fa fa-star fa-sm oran" style="color:grey !important;"></i>
              </li>
              <?php }?>


              <?php if( $review->rating >= 2 ){?>
              <li>
              <i class="fa fa-star fa-sm oran" style="color: orange !important;"></i>
              </li>
              <?php } else{ ?>
              <li>
              <i class="fa fa-star fa-sm oran" style="color:grey !important;"></i>
              </li>
              <?php }?>


              <?php if( $review->rating >= 3 ){?>
              <li>
              <i class="fa fa-star fa-sm oran" style="color: orange !important;"></i>
              </li>
              <?php } else{ ?>
              <li>
              <i class="fa fa-star fa-sm oran" style="color:grey !important;"></i>
              </li>
              <?php }?>



              <?php if( $review->rating >= 4 ){?>
              <li>
                <i class="fa fa-star fa-sm oran" style="color: orange !important;"></i>
              </li>
              <?php } else{ ?>
                <li>
                <i class="fa fa-star fa-sm oran" style="color:grey !important;"></i>
              </li>
              <?php }?>


              <?php if( $review->rating >= 5 ){?>
                <li>
                  <i class="fa fa-star fa-sm oran" style="color: orange !important;"></i>
                </li>
                <?php } else{ ?>
                  <li>
                  <i class="fa fa-star fa-sm oran" style="color:grey !important;"></i>
                </li>
                <?php }?>



              <!-- <li>
                <i class="fa fa-star fa-sm " style="color:orange;"></i>
              </li> -->

            </ul>
          </div>
          <p class="mb-0"><?=$review->description;?></p>
        </div>
      </div>
<?php } } ?>

      <!-- <hr> -->
      <h5 class="mt-4">Add a review</h5>
      <p>Your email address will not be published.</p>

<form action="<?=base_path?>add_product_rating/<?=base64_encode($product_data->id);?>" method="post" enctype="multipart/form-data">
      @csrf

      <div class="my-3">

        <div style="font-size:1rem !important;" class="rating-form"  >
<!-- < style="font-size:1rem !important;" class="rating-form" action="#" method="post" name="rating-movie"> -->
<fieldset class="form-group">


<legend class="form-legend">Rating: </legend>

<div class="form-item">

<input id="rating-5" name="rating" type="radio" value="5" />
<label for="rating-5" data-value="5">
  <span class="rating-star">
    <i class="fa fa-star-o"></i>
    <i class="fa fa-star"></i>
  </span>
  <span class="ir">5</span>
</label>
<input id="rating-4" name="rating" type="radio" value="4" />
<label for="rating-4" data-value="4">
  <span class="rating-star">
    <i class="fa fa-star-o"></i>
    <i class="fa fa-star"></i>
  </span>
  <span class="ir">4</span>
</label>
<input id="rating-3" name="rating" type="radio" value="3" />
<label for="rating-3" data-value="3">
  <span class="rating-star">
    <i class="fa fa-star-o"></i>
    <i class="fa fa-star"></i>
  </span>
  <span class="ir">3</span>
</label>
<input id="rating-2" name="rating" type="radio" value="2" />
<label for="rating-2" data-value="2">
  <span class="rating-star">
    <i class="fa fa-star-o"></i>
    <i class="fa fa-star"></i>
  </span>
  <span class="ir">2</span>
</label>
<input id="rating-1" name="rating" type="radio" value="1" />
<label for="rating-1" data-value="1">
  <span class="rating-star">
    <i class="fa fa-star-o"></i>
    <i class="fa fa-star"></i>
  </span>
  <span class="ir">1</span>
</label>

<!-- <div class="form-action">
  <input class="btn-reset" type="reset" value="Reset" />
</div> -->

<div class="form-output">
  ? / 5
</div>

</div>

</fieldset>
</div>


      </div>
      <div>
        <!-- Your review -->
        <div class="md-form md-outline">
          <label for="form76">Your review</label>
          <textarea id="form76" class="md-textarea form-control pr-6" rows="4" name="description"></textarea>

        </div>
        <!-- Name -->
        <div class="md-form md-outline">
          <label for="form75">Name</label>
          <input type="text" id="form75" class="form-control pr-6" name="name">

        </div>
        <!-- Email -->
        <div class="md-form md-outline">
          <label for="form77">Email</label>
          <input type="email" id="form77" class="form-control pr-6" name="email">

        </div>
        <div class="text-right pb-2 mt-4">
          <button type="submit" class="btn" style="background: #1f0b00;
    color: #fff !important;">Add a review</button>
        </div>
      </div>

</form>

    </div>
  </div>

</div>

</div>
</div>
<div class="col-sm-6 col-xs-12 d-flex" style="    margin-top: 10rem;">


<div class="drop-hint-section text-center" style="">
                            <img width="30" height="22" class="drop-hint-image" src="https://www.kendrascott.com/on/demandware.static/Sites-KendraScott-Site/-/default/dw556cdcc9/images/drop-a-hint.svg" alt="Drop a Hint">
                            <p class="drop-hint-title" style="font-size:15px !important;font-family: 'Lato';">Gift Card</p>
                            <p class="text-s">Make gifting easy for someone<br> special. Let us send a hint about<br> an item you love.</p>
                            <a href="https://www.fineoutput.co.in/jewellery2/public/send_giftcard_view" class="drop-hint-link dropahint-link" style="text-decoration:underline !important;color:#63c7c5;">Drop a Hint</a>
                        </div>

                        <div class="smart-gift-section text-center" style="margin-left: 12px;
    margin-top: -6px;" >
                    <img width="30" height="30" class="smart-gift-image" src="https://www.kendrascott.com/on/demandware.static/Sites-KendraScott-Site/-/default/dwc8630d02/images/smart-gift.svg" alt="Drop a Hint">
                    <p class="smart-gift-title" style="font-size:15px !important;font-family: 'Lato';">Refer a Friend</p>
                    <p class="text-s">Not sure it’s perfect? Let them<br> decide! Send a gift and they<br>  decide to accept or re-pick.</p>
                    <a href="https://www.fineoutput.co.in/jewellery2/public/refer_friend_view" id="smart-gift" style="text-decoration:underline !important;color:#63c7c5;">Send a Gift</a>
                </div>


</div>
                       </div>
                        </div>
<!-- Classic tabs -->




<!-- rew section end -->








<style media="screen">
.div1 {
display: flex;
}
.div2 {
margin-left: 2px;
margin-top: 1px;
}
.cut-text {
text-overflow: ellipsis;
overflow: hidden;
white-space: nowrap;
}

.h1style{
  font-family: 'Libre Baskerville', serif !important;
  font-size: 36px;
  font-style: italic;
}
</style>


<!-- third slider start -->
<section class=" mb-5 container-fluid" style="overflow:hidden;">
  <center>
    <!-- <h1 class="text-center" style="font-family: 'calibri'; margin-bottom:5rem;margin-top:5rem;">You may also like
    </h1> -->
    <h1  class="" style="margin-bottom: 3rem;margin-top: 5rem;font-size: 36px;">You may also like</h1>

  </center>
  <!-- Swiper -->
  <div class="container-fluid swipmbx">
  <div class="swiper-container" style=" position: relative;">
    <div class="swiper-wrapper">

<?php
$trendings= App\adminmodel\Product::wherenull('deleted_at')->where('is_active',1)->where('is_subcat_delete',0)->where('is_cat_delete',0)->where('is_mini_subcat_delete',0)->where('category',$product_data->category)->limit(10)->get();
if(!empty($trendings)){
  foreach ($trendings as $trend_pro) {

    if($trend_pro->id == $product_data->id ){

    } else{

$pro_type_color= App\adminmodel\ProductColorSize::wherenull('deleted_at')->where('is_active', 1)->where('product_id', $trend_pro->id)->first();
if(!empty($pro_type_color)){

  $color_da= App\adminmodel\Color::wherenull('deleted_at')->where('is_active', 1)->where('id', $pro_type_color->color_id)->first();

  if(!empty($color_da)){
    $color_id= $color_da->id;
    $color= $color_da->name;
    $color_code= $color_da->code;
  }else{
    $color="Color Not Found!";
    $color_code="";
    $color_id="";
  }

  $mrp= $pro_type_color->mrp;
  $price= $pro_type_color->price;
  $image= base_path.$pro_type_color->image1;
}else{
  $mrp="MRP!";
  $price="Price!";
  $image="";
  $color="Color Not Found!";
  $color_code="";
  $color_id="";
}
?>
<!-- <style media="screen">
.hov_p{
  margin-bottom: 4.5rem;
}
</style> -->

      <div class="swiper-slide hello text-left">

        <input type="hidden" value="<?=$color_id;?>" id="color_select_t_<?=$trend_pro->id?>">








        <?php if(!empty($image)){ ?>
        <a style="border: 1px solid #efefef;" class="m-0" href="<?=base_path?>products_view/<?=base64_encode($trend_pro->id);?>">
        <img class=".swiper-slide_img" src="<?=$image;?>" style="height:300px;width:100%;">
      </a>
      <?php }else{ ?>
        <a style="border: 1px solid #efefef;" class="m-0">
            <img class=".swiper-slide_img" src="<?=base_path?>frontend/assets/img/blank_img.jpg" style="height:300px;width:100%;">
          </a>
        <?php } ?>
        <?php if(empty(Session::get('user_data'))) {?>


                    <p class="text_center hov_p" onclick="addToCartOfflineHandler(this)"
                        data-category-id="<?= $trend_pro->category;?>"
                        data-subcategory-id="<?= $trend_pro->sub_category_id;?>"
                        data-product-id="<?= $trend_pro->id;?>"
                        quantity="1"
                        btn="trend_btn_v" style="z-index: 1000;padding:7px;">ADD TO CART</p>

        <?php } else{ ?>

               <p class="text_center hov_p"  onclick="addToCartOnlineHandler(this)"
              data-category-id="<?= $trend_pro->category;?>"
              data-subcategory-id="<?= $trend_pro->sub_category_id;?>"
              data-product-id="<?= $trend_pro->id;?>"
              user-id="<?= Session::get('user_id');?>"
              quantity="1"
              btn="trend_btn_v" style="z-index: 1000;padding:7px;" >ADD TO CART</p>

        <?php } ?>

      <?php

      $user_idd= Session::get('user_id');

      $wish_datas=  App\frontendmodel\Wishlist::wherenull('deleted_at')->where('user_id', $user_idd)->where('product_id', $trend_pro->id)->first();


      // print_r($wish_datas);
      if(!empty($wish_datas)){

      ?>
                       <span style="position: absolute;
    right: 5px;
    font-size: 20px;
    top: 5px;
    background: #e9e9e9;
    height: 30px;
    width: 30px;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;">
                          <i class="fa fa-heart-o" style="color:#ffa4a8;"></i>
                        </span>

      <?php } else{?>

                      <span style="position: absolute;
   right: 5px;
   font-size: 20px;
   top: 5px;
   /* background: #e9e9e9; */
   height: 30px;
   width: 30px;
   display: flex;
   justify-content: center;
   align-items: center;
   /* border-radius: 50px; */
   " onclick="addToWishlist(<?=$trend_pro->id;?>)">
                        <i class="fa fa-heart-o" style=""></i>
                      </span>

      <?php } ?>


         <span class="text_tra cut-text " style="  ">
          <a style="    text-transform: capitalize !important; " class="ml-0 mr-0" href="<?=base_path?>products_view/<?=base64_encode($trend_pro->id);?>"><?=$trend_pro->name;?></a>
          <div class="div1">
            <?if($mrp * $currency_price != (int)$price * $currency_price){?>
              <p style="font-size:10px !important;" class="mb-0 mt-2">
                <a class="ml-0 mr-0" href="#"><del><?=$sign;?> <span><?=(int)$mrp * $currency_price;?></span></del></a>
              </p>
              <?}?>
              <p style="color:#000 !important;"  class="pr_slider_price div2"><?=$sign;?> <span><?=(int)$price * $currency_price;?></span> </p>
                </div>
                <div class="hoverc">
          <span class="carderspan">
            <div class="carder" style="background-color:<?=$color_code;?>;"></div>
            <div><a href="#" class="cardp"><?=$color;?></a></div>
          </span>
                </div>

        </span>
      </div>

<?php } } } ?>

    </div>
    <!-- Add Pagination -->
    <!-- <div class="swiper-pagination"></div> -->
    <!-- Add Arrows -->
    <div class="swiper-button-next btn-desk-1" style="top: 159px;"></div>
    <div class="swiper-button-prev btn-desk-1" style="top: 159px;"></div>
    <div class="swiper-button-next btn-desk-2" style="top: 159px;"></div>
    <div class="swiper-button-prev btn-desk-2" style="top: 159px;"></div>


  </div>
</section>
</div>
<!-- third slider end -->


<?php } ?>





<script>
// $(document).on('change', '.size_selct', function() {
  // Does some stuff and logs the event to the console
  $( ".colorh" ).click(function() {
$(".colorhov").css("display", "block");
});
function colorChange(c_id, prod_id){
  // alert("u");
var c_price ='<?php echo $currency_price;?>';
  // var prod_id = $(this).attr('pro_id');
  // alert(prod_id);
  // alert(c_id);
document.getElementById('js-add-to-basket').setAttribute('color_id',c_id);
  $('.colobtn.p-1.active').removeClass("active");
  $('#asc_'+c_id).addClass("active");

 var base_path = $("#base_path").val();
// alert(selectedsize);
// alert(prod_id);
  $.ajax({
  url:base_path+'get_color_data',
  method: 'post',
  data: {color_id: c_id, product_id: prod_id, _token: '{{csrf_token()}}'},
  dataType: 'json',
  success: function(response){
// alert(response);
  if(response.data == true){



  var pro_color_d= response.productColordata;

var diff= parseFloat(pro_color_d.mrp) - parseFloat(pro_color_d.price);
var discount= diff * 100/ parseFloat(pro_color_d.mrp);
var price_discount= Math.round(discount);
// alert(price_discount);
var discount_string= '( '+price_discount+'% Off )';

if(pro_color_d != "" &&  pro_color_d != null){
  $('#mrp_'+prod_id).text('');
  $('#price_'+prod_id).text('');
  $('#price_discount_'+prod_id).text('');
  $('#color_select_'+prod_id).val('');
var c_mrp =parseFloat(pro_color_d.mrp)  * parseFloat(c_price);
var cc_price =parseFloat(pro_color_d.price) * parseFloat(c_price);
  $('#mrp_'+prod_id).text(c_mrp);
  $('#price_'+prod_id).text(cc_price);
  if(price_discount!=0){
  $('#price_discount_'+prod_id).text(discount_string);
}
  $('#color_select_'+prod_id).val(c_id);

if(pro_color_d.image1 != "" && pro_color_d.image1 != null){

$('#main_img1').attr('src', base_path+pro_color_d.image1);
$('#my_img1').attr('src',base_path+pro_color_d.image1);
$('.zoomImg').attr('src',base_path+pro_color_d.image1);

}

if(pro_color_d.image2 != "" && pro_color_d.image2 != null){

$('#main_img2').attr('src',base_path+pro_color_d.image2);
$('#my_img2').attr('src',base_path+pro_color_d.image2);

}

if(pro_color_d.image3 != "" && pro_color_d.image3 != null){

$('#main_img3').attr('src',base_path+pro_color_d.image3);
$('#my_img3').attr('src',base_path+pro_color_d.image3);

}

if(pro_color_d.image4 != "" && pro_color_d.image4 != null){

$('#main_img4').attr('src',base_path+pro_color_d.image4);
$('#my_img4').attr('src',base_path+pro_color_d.image4);

}

  // $('#main_img2').attr('src','second.jpg');
  // $('#main_img3').attr('src','second.jpg');
  // $('#main_img4').attr('src','second.jpg');
  //
  //
  // $('#my_img2').attr('src','second.jpg');
  // $('#my_img3').attr('src','second.jpg');
  // $('#my_img4').attr('src','second.jpg');


}

  }
  else{
  alert('hiii');
  }
  }
  });


}
</script>

<script>
function myFunction() {
  var x = document.getElementById("quantity").value;
  // alert('hi');
document.getElementById('js-add-to-basket').setAttribute('quantity',x);
}
</script>


<script>
  function addToCartOfflineHandler2(obj){
    // var cart_btn_type = $(obj).attr("data-btn-type");
// alert(JSON.stringify(obj));
    var pro_id = $(obj).attr("data-product-id");
    var color_id = $(obj).attr("color_id");
    var quantity = $(obj).attr("quantity");
    var status = $(obj).attr("status");

    // alert(quantity);


    $.ajax({
      url:'<?=base_path?>add_to_cart_local2',
      method: 'post',
      data: {product_id: pro_id, color_id: color_id, quantity: quantity,status:status},
      dataType: 'json',
      success: function(response){
        alert(response);
        if(response.data == 'Item added in cart'){
          $.notify({
                  icon: 'fa fa-check',
                  title: 'Success!',
                  message: 'Item Successfully added to your cart'
              },{
                  element: 'body',
                  position: null,
                  type: "success",
                  allow_dismiss: true,
                  newest_on_top: false,
                  showProgressbar: true,
                  placement: {
                      from: "top",
                      align: "right"
                  },
                  offset: 20,
                  spacing: 10,
                  z_index: 1031,
                  delay: 5000,
                  animate: {
                      enter: 'animated fadeInDown',
                      exit: 'animated fadeOutUp'
                  },
                  icon_type: 'class',
                  template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                  '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                  '<span data-notify="icon"></span> ' +
                  '<span data-notify="title">{1}</span> ' +
                  '<span data-notify="message">{2}</span>' +
                  // '<div class="progress" data-notify="progressbar">' +
                  // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                  // '</div>' +
                  '<a href="{3}" target="{4}" data-notify="url"></a>' +
                  '</div>'
              });

 location.reload();
        }
          else if(response.data == 'Product is already in cart')
          {
            $.notify({
                    icon: 'fa fa-check',
                    title: '',
                    message: 'Product is already in cart'
                },{
                    element: 'body',
                    position: null,
                    type: "danger",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    // '<div class="progress" data-notify="progressbar">' +
                    // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    // '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });
             location.reload();
          }else if(response.data == 'Product is out of stock'){
            $.notify({
                    icon: 'fa fa-check',
                    title: '',
                    message: 'Product is out of stock'
                },{
                    element: 'body',
                    position: null,
                    type: "danger",
                    allow_dismiss: true,
                    newest_on_top: false,
                    showProgressbar: true,
                    placement: {
                        from: "top",
                        align: "right"
                    },
                    offset: 20,
                    spacing: 10,
                    z_index: 1031,
                    delay: 5000,
                    animate: {
                        enter: 'animated fadeInDown',
                        exit: 'animated fadeOutUp'
                    },
                    icon_type: 'class',
                    template: '<div data-notify="container" class="col-xs-11 col-sm-3 alert alert-{0}" role="alert">' +
                    '<button type="button" aria-hidden="true" class="close" data-notify="dismiss">×</button>' +
                    '<span data-notify="icon"></span> ' +
                    '<span data-notify="title">{1}</span> ' +
                    '<span data-notify="message">{2}</span>' +
                    // '<div class="progress" data-notify="progressbar">' +
                    // '<div class="progress-bar progress-bar-{0}" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="width: 0%;"></div>' +
                    // '</div>' +
                    '<a href="{3}" target="{4}" data-notify="url"></a>' +
                    '</div>'
                });
             location.reload();
          }
        }
        });

      }

  </script>
<script>
		$(document).ready(function(){
			$('#pic-1').zoom();
			$('#pic-2').zoom();
			$('#pic-3').zoom();
			$('#pic-4').zoom();
			$('#pic-5').zoom();
		});
	</script>
  <script>
  var acc = document.getElementsByClassName("accordionq");
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
</script>
<!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script> -->
@endsection
