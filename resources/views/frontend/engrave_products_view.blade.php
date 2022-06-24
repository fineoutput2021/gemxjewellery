@extends('frontend.layout')
@section('main')

<link href="https://fonts.googleapis.com/css2?family=Roboto&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Engagement&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Lalezar&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Tajawal:wght@300&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Sansita+Swashed:wght@500&display=swap" rel="stylesheet">
 <link href="https://fonts.googleapis.com/css2?family=Nova+Flat&display=swap" rel="stylesheet">


 <style>
 .accordions {
   background-color: #f7f5f3;
   color: #444;
   cursor: pointer;
   padding: 18px;
   width: 100%;
   border: none;
   text-align: left;
   outline: none;
   font-size: 15px;
   transition: 0.4s;
   margin-bottom: 0px !important;
 }

 /* .actives, .accordions:hover {
   background-color: #ccc;
 } */

 .accordions:after {
   content: '\002B';
   color: #777;
   font-weight: bold;
   float: right;
   margin-left: 5px;
 }

 .actives:after {
   content: "\2212";
 }

 .panels {
   padding: 0 18px;
   background-color: #f7f5f3;
   max-height: 0;
   overflow: hidden;
   transition: max-height 0.2s ease-out;
   margin-bottom:0px !important;
 }
 </style>

<style>

.accordion-button{
  font-size: 20px;
}

.accordion-body{
font-size: 15px;
line-height: 2;

}

@media screen and (min-width: 800px) {
  .rigtal{margin-right: -28rem;}
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
/* @media (max-width:1243px) {
  .responsive1{
      margin-left: 0rem !important;
      width: 100% !important;
  } */
}










@media screen and (min-width: 800px) {
  .rigtal{margin-right: -27rem;}
}

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
  .accordion:not(.accordion--invalid) .accordion__wrap {
    display: none;
  }
  .accordion:not(.accordion--invalid) .accordion__wrap {
    display: block;
    max-height: 0;
    overflow: hidden;
  }
  .accordion.accordion--invalid .accordion__body {
    -webkit-transform: none;
    transform: none;
    opacity: 1;
    -webkit-transition: none;
    transition: none;
  }
  .accordion .accordion__body {
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
  .accordion--product-details .accordion__button {
    width: 100%;
    padding: 7px 0;
    background: 0 0;
    outline: 0;
  }
  .accordion--product-details .accordion__button-content {
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
  .accordion--product-details .accordion__button-content > * {
    margin-right: 8px;
  }
  .accordion--product-details .accordion__button-content > :last-child {
    margin-right: 0;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details .accordion__button-content > * {
      margin-right: 20px;
    }
    .accordion--product-details .accordion__button-content > :last-child {
      margin-right: 0;
    }
  }
  .accordion--product-details .accordion__button-content > :nth-child(3) {
    margin-left: auto;
  }
  .accordion--product-details .accordion__icon {
    min-width: 20px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details .accordion__icon {
      min-width: 30px;
    }
  }
  .accordion--product-details .accordion__icon img {
    display: block;
  }
  .accordion--product-details
    .accordion__icon
    img[src*="2020/usp-icons/recycled-silver-black"] {
    width: 21px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details
      .accordion__icon
      img[src*="2020/usp-icons/recycled-silver-black"] {
      width: 22px;
      height: auto;
    }
  }
  .accordion--product-details
    .accordion__icon
    img[src*="2020/usp-icons/heart-black"] {
    width: 21px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details
      .accordion__icon
      img[src*="2020/usp-icons/heart-black"] {
      width: 22px;
      height: auto;
    }
  }
  .accordion--product-details
    .accordion__icon
    img[src*="2020/usp-icons/handmade"] {
    width: 21px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details
      .accordion__icon
      img[src*="2020/usp-icons/handmade"] {
      width: 16px;
      height: auto;
      margin-left: 2px;
    }
  }
  .accordion--product-details
    .accordion__icon
    img[src*="2020/usp-icons/free-delivery-black"] {
    width: 26px;
    height: 18px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details
      .accordion__icon
      img[src*="2020/usp-icons/free-delivery-black"] {
      width: 30px;
      height: 20px;
    }
  }
  .accordion--product-details
    .accordion__icon
    img[src*="2020/usp-icons/returns-black"] {
    width: 27px;
    height: 19px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details
      .accordion__icon
      img[src*="2020/usp-icons/returns-black"] {
      width: 28px;
      height: auto;
    }
  }
  .accordion--product-details
    .accordion__icon
    img[src*="2020/usp-icons/warranty-black"] {
    width: 17px;
    height: 19px;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details
      .accordion__icon
      img[src*="2020/usp-icons/warranty-black"] {
      width: 24px;
      height: auto;
    }
  }
  .accordion--product-details .accordion__status {
    -webkit-transition: -webkit-transform 0.3s
      cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: -webkit-transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
    transition: transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1),
      -webkit-transform 0.3s cubic-bezier(0.215, 0.61, 0.355, 1);
  }
  .accordion--product-details .accordion__status img {
    display: block;
  }
  .accordion--product-details .accordion__status img[src*="2020/plus-black"] {
    width: 9px;
    height: 9px;
  }
  .accordion--product-details .accordion__body {
    font-size: 10px;
    font-size: 0.625rem;
    line-height: 1.5;
    font-weight: 300;
    padding-left: 36px;
    -webkit-transition: none;
    transition: none;
  }
  @media screen and (max-width: 62.4375em) {
    .accordion--product-details .accordion__body {
      padding-left: 48px;
    }
  }
  .accordion--product-benefits.accordion--invalid .accordion__button {
    cursor: default;
  }
  .accordion--product-benefits.accordion--invalid
    .accordion__button-content
    > :not(.accordion__icon) {
    margin-right: 0;
  }
  .accordion--product-benefits.accordion--invalid .accordion__status,
  .accordion--product-benefits.accordion--invalid .accordion__wrap {
    display: none;
  }
  a {
    text-decoration: none;
    color: #929292;
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
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex;
    -ms-flex-wrap: wrap;
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
  .product-info__accordion {
    padding: 10px 0;
    border-top: 1px solid #b1b1b1;
    border-bottom: 1px solid #b1b1b1;
  }
  @media screen and (max-width: 62.4375em) {
    .product-info__accordion {
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
  .product-benefits__accordion {
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
    .product-benefits__accordion {
      display: block;
      margin: 0;
      padding-top: 10px;
      border-top: 1px solid #b1b1b1;
    }
  }
  .product-benefits__accordion > * {
    margin: 0 10px;
  }
  @media screen and (max-width: 62.4375em) {
    .product-benefits__accordion > * {
      margin: 0;
    }
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
        text-decoration: none;
        background-color: #1f0b00;
        color: #fff !important;
    }

    .nav-link.show.active{
      background-color:#1f0b00;
      color: #fff !important;
    }

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
    color: orange;
    margin-right: 5px;
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
		right: 25px;
		opacity: 1;
	}

	.rating-form input[type='radio'] + label:after {
		content: "/ 5";
		position: absolute;
		right:-10px;
    top:0px;
		font-size: 16px; font-size: 1.6rem;
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



.border{
      border: 1px solid #1f0b00!important;
}



 /* ENGRAVE CSS START */

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


.modal-content {
  position: relative;
  display: -ms-flexbox;
  display: flex;
  -ms-flex-direction: column;
  flex-direction: column;
  width: 100%;
  pointer-events: auto;
  background-color: #fff;
  background-clip: padding-box;
  border: 1px solid rgba(0,0,0,.2);
  border-radius: .3rem;
  outline: 0;
  padding: 0px 30px;
}

.modal-header {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-align: start;
  /* align-items: flex-start; */
  -ms-flex-pack: justify;
  /* justify-content: space-around; */
  padding: 1rem 1rem;
  border-bottom:none;
  border-top-left-radius: calc(.3rem - 1px);
  border-top-right-radius: calc(.3rem - 1px);
}

.modal-footer {
  display: -ms-flexbox;
  display: flex;
  -ms-flex-wrap: wrap;
  flex-wrap: wrap;
  -ms-flex-align: center;
  align-items: center;
  -ms-flex-pack: end;
  justify-content: flex-end;
  padding: .75rem;
  border-top:none;
  border-bottom-right-radius: calc(.3rem - 1px);
  border-bottom-left-radius: calc(.3rem - 1px);
}

.modal-body {
  position: relative;
  -ms-flex: 1 1 auto;
  flex: 1 1 auto;
  padding: 1rem;
  border: 1px solid #cacaca;
}

.custom_p p{
    text-align: center;
  color: black;
  font-size: 39px;
  margin-bottom: 0;
  cursor: pointer;
}
.span_out{
display: block;
  letter-spacing: 0.3em;
  text-transform: uppercase;
  font-size: 1rem;
  font-weight: 700;
  margin-bottom: 15px;
  line-height: 2;
}

.can_p p{

border: 1px solid lightgrey;
padding:5px 20px;
width:100%;
margin-bottom: 0;
cursor: pointer;

}

.img_row img{
width: 100%;
height: 475px;
}

.val_span{
justify-content: center;
align-items: center;
display: flex;
}

.val_span span{
background: white;
  width: 100px;
  padding: 10px 22px;
  border: 1px solid lightgrey;
  margin-right: 5px;
  cursor: pointer;
}


input.numu{

    position: absolute !important;
  z-index: 10 !important;
  background: transparent !important;
  text-align: center !important;
  outline: none !important;
  display: block;
  top: 33% !important;
  left: 25% !important;
  outline: none !important;
  border: none !important;
  border: 2px solid #D4D4D4 !important;
  box-shadow: 2px 2px 4px -1px #D4D4D4 !important;
  padding: 10px !important;
  width: 50% !important;
  border-radius: 7px !important;
  font-size: 13px;
  display: none;
}







p.numu{
position: absolute;
  z-index: 10;
  top: 47%;
  left: 25%;
  width: 50%;
  min-height: 27px;
  background: transparent;
  text-align: center;
  border: 2px dashed red;
  overflow: hidden;
  display: block;
  align-items: center;
  margin-bottom: 0;
  justify-content: center;

}




@media (min-width: 992px){
.modal-lg, .modal-xl {
  max-width: 900px;
}
}


.script_pc{
font-family:  'Engagement', cursive;
}

.block_pc{
font-family:'Lalezar', cursive;
}

.simple_pc{
font-family:sans-serif;
}

.deco_pc{
font-family:'Tajawal', sans-serif;
}

.arabic_pc{
font-family:'Sansita Swashed', cursive;
}

.korean_pc{
font-family:'Nova Flat', cursive;
}


.motif_btnpar{
    background: #4d2f40 !important;
      color: white;
      transition: 0.4s;
}

.font_btnpar{
color: #4d2f40 !important;
background: white !important;
transition: 0.4s;

}

 /* ENGRAVE CSS END */




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


  $product_id= $product_data->id;
  $name= $product_data->name;
  $s_desc= $product_data->s_desc;
  $size= $product_data->size;
  $base_price= $product_data->base_price;

  $images1= $product_data->image;

  if(!empty($images1)){
    $image1=base_path.$images1;
  }else{
    $image1="";
  }



}else{
  $product_id="";
  $image1="";
  $base_price= "";
  $size= "";
  $s_desc= "";
  $name="";
}

?>
<div class="paddingfromtop">
<div class="container mt-5 mb-5 good_mar">
  <div class="row virom">
    <div class="col-md-6 pi_no">
          <div class="preview-pic tab-content" style="border: 1px solid #ddd;">
              <div class="tab-pane active zoom" id="pic-1" ><img id="main_img1" src="<?=$image1;?>" /></div>

              <!-- <div class="tab-pane" id="pic-5"><img src="https://cfs3.monicavinader.com/images/pdpdetaildesktop/3213039-ss-rg-rshr-dia.jpg" /></div> -->
            </div>


    </div>
    <div class="col-md-6 ml-auto pi_no">
  <article class="product-details">
    <div class="d-flex top_star mb-3">







    <!-- <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i>
    <i class="fa fa-star"></i> -->
  </div>
    <header class="product-details__header">
      <h1 class="product-details__title" style="    font-family: 'Calibri'!important;"><?=$name;?></h1>

      <!-- <p class="product-details__subtitle">18ct Gold Vermeil</p> -->
      <div class="product-details__price-and-stock">
        <p class="product-details__price">

           <span style="font-weight:600;"><?=$sign;?> </span><span style="font-weight:600;" id="price_<?=$product_data->id;?>" ><?=(int)$base_price * $currency_price;?></span>
          &nbsp; <span style="color:#f11313;font-size:13px;    font-weight: 600;" id="price_discount_<?=$product_data->id?>">
<?php
// if($mrp != "MRP Not Found!" && $price != "Price Not Found!"){
// $diff_price= $mrp- $price;
//  $discount= round($diff_price*100/$mrp);
//  echo "( ".$discount."% Off )";
// }
?>
          </span>
        </p>
        <p class="product-details__stock">In Stock</p>
      </div>
    </header>
    <div class="product-details__swatches">
    </divxc
    <div class="size-selector">
      <p class="size-selector__title">Size:</p>
      <div class="size-selector__content">
        <div class="size-selector__options">

          <?=$size;?>
        <!-- <button class="colobtn  p-1" style="height:25px; width:25px;background:red;border:none; border-radius:50px;"></button> -->






        </div>
        <!-- <p class="size-selector__guide">|<a class="modal" href="/ring-size-guide">Size guide</a></p> -->
        <p class="size-selector__error">Please select a ring size above</p>
      </div>
    </div>
    <div class="product-details__buttons">
      <div class="pdp-options__group">

        <div id="js-applepay" data-applepay="{&quot;countryCode&quot;:&quot;GB&quot;,&quot;currencyCode&quot;:&quot;GBP&quot;,&quot;shippingMethods&quot;:[{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_66&quot;,&quot;label&quot;:&quot;No Hurry Delivery&quot;,&quot;amount&quot;:&quot;0.00&quot;,&quot;detail&quot;:&quot;No Hurry Delivery&quot;},{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_1&quot;,&quot;label&quot;:&quot;Standard Delivery&quot;,&quot;amount&quot;:&quot;3.95&quot;,&quot;detail&quot;:&quot;Standard Delivery&quot;},{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_20&quot;,&quot;label&quot;:&quot;Next Day Delivery&quot;,&quot;amount&quot;:&quot;7.95&quot;,&quot;detail&quot;:&quot;Next Day Delivery (excl. weekends)&quot;},{&quot;identifier&quot;:&quot;&quot;,&quot;key&quot;:&quot;Shipping_Service_2&quot;,&quot;label&quot;:&quot;Next Morning Delivery&quot;,&quot;amount&quot;:&quot;11.95&quot;,&quot;detail&quot;:&quot;Next Morning Delivery (excl. weekends)&quot;}],&quot;informationPromotion&quot;:null,&quot;promotion&quot;:null,&quot;lineItems&quot;:[{&quot;key&quot;:&quot;Products_StockItem_37152&quot;,&quot;label&quot;:&quot;Siren Muse Wide Ring 18ct Gold Vermeil on Sterling Silver&quot;,&quot;qty&quot;:1,&quot;amount&quot;:170}],&quot;total&quot;:{&quot;label&quot;:&quot;Total&quot;,&quot;amount&quot;:170},&quot;supportedNetworks&quot;:[&quot;amex&quot;,&quot;discover&quot;,&quot;masterCard&quot;,&quot;visa&quot;],&quot;merchantCapabilities&quot;:[&quot;supports3DS&quot;],&quot;requiredShippingContactFields&quot;:[&quot;postalAddress&quot;,&quot;email&quot;],&quot;selectedShippingMethod&quot;:null}" class="pdp" style="display: none;">

        </div>







         <button type="button" class="product-details__add-to-basket button button--full button--alt" id="js-add-to-basket" data-after-href="/basket/recently-added?stockitem=5056112555940" data-href="#"
        data-toggle="modal" data-target="#exampleModal_<?=$product_data->id;?>">
           <span class="add-to-basket__default" data-added="Added to Bag">
             Add Complimentary Engraving
             <img src="https://www.monicavinader.com/images/2020/arrow-right-white.svg" width="14px" height="16px">
           </span>
           <span class="add-to-basket__spinner">
             Adding
             <img src="https://www.monicavinader.com/images/2020/spinner.svg" width="14px" height="16px">
           </span>
         </button>




      </div>
      <button class="accordions">Product Decription</button>
<div class="panels">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>
      <div class="product-details__help js-product-benefit-target">
        <p class="product-details__delivery-message">

         </p>
      </div>
      <div class="product-details__info">
        <div class="product-info">

          <div class="product-info__title">
            About this Product

          </div>
          <div class="product-info__accordion">


            <div class="accordion accordion--bare accordion--product-details js-product-usps-accordion">
              <!-- <div class="accordion__head">
                <button type="button" class="accordion__button js-product-usps-accordion__trigger">
                  <div class="accordion__button-content">
                    <span class="accordion__icon">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/recycled-silver-black.svg" width="14px" height="16px">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/heart-black.svg" width="14px" height="16px">
                    </span>
                    <p><?=$s_desc;?></p>
                    <span class="accordion__status">

                    </span>
                  </div>
                </button>
              </div> -->
              <!-- <div class="accordion__wrap">
                <div class="richtext richtext--flush accordion__body">
                  <p>In April 2020 we transitioned to manufacturing all our jewellery
                    in 100% <u><a href="https://www.monicavinader.com/sustainability/recycled-silver">Recycled
                        Sterling Silver</a></u> and Gold Vermeil. Recycling Silver cuts
                    down CO2 emissions by &#8532; versus mined silver. It is better for the
                    environment, reduces water usage and reduces other environmental
                    impacts.</p>
                </div>
              </div> -->




              <div class="container-fluid pdic">

           <div class="seticons">

             <i class="bi bi-envelope"></i><p class="designp">Drop a Hint? <a id="dahTriggerInner" href="<?=base_path?>contact_us" style="text-decoration:underline !important;">click here</a></p><br>
              <a id="dahTriggerInner" href="<?=base_path?>packaging" style=""><i class="bi bi-truck"></i><p class="designp">Worldwide Shipping <span id="mobbenefits-txt">(incl. India)</span></p><br></a>
             <!-- <i class="bi bi-truck"></i><p class="designp">Worldwide Shipping <span id="mobbenefits-txt">(incl. India)</span></p><br> -->
               <a id="dahTriggerInner" href="<?=base_path?>Refund_Policy" style=""><i class="bi bi-arrow-clockwise"></i><p class="designp">60-DAY RETURN POLICY ON ALL ORDERS</p><br></a>

                </div>


                </div>







            </div>


          </div>
        </div>
      </div>
      <!-- <div class="product-details__benefits">
        <div class="product-benefits">
          <div class="product-benefits__title">Order with Confidence</div>
          <div class="product-benefits__accordion">
            <div class="accordion accordion--bare accordion--product-details accordion--product-benefits js-product-benefits-accordion accordion--invalid accordion--retain-head">
              <div class="accordion__head">
                <button type="button" class="accordion__button js-product-benefits-accordion__trigger js-product-benefit" data-benefit="&quot;<p>We offer free delivery and also offer a range of premium\ndelivery services. Minimum spend may apply, <u><a href=\n\&quot;https:\/\/help.monicavinader.com\/en\/support\/solutions\/folders\/27000059255\&quot;>\nfind out more<\/a><\/u>.<\/p>\n&quot;" tabindex="-1">
                  <div class="accordion__button-content">
                    <span class="accordion__icon">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/free-delivery-black.svg" width="14px" height="16px">
                    </span>
                    <p>Free Delivery</p>
                    <span class="accordion__status">
                      <img src="https://www.monicavinader.com/images/2020/plus-black.svg" width="14px" height="16px">
                    </span>
                  </div>
                </button>
              </div>
              <div class="accordion__wrap">
                <div class="richtext richtext--flush accordion__body">
                  <p>We offer free delivery and also offer a range of premium
                    delivery services. Minimum spend may apply, <u><a href="https://help.monicavinader.com/en/support/solutions/folders/27000059255">
                        find out more</a></u>.</p>
                </div>
              </div>
            </div>
            <div class="accordion accordion--bare accordion--product-details accordion--product-benefits js-product-benefits-accordion accordion--invalid accordion--retain-head">
              <div class="accordion__head">
                <button type="button" class="accordion__button js-product-benefits-accordion__trigger js-product-benefit" data-benefit="&quot;<p>We guarantee a full money-back refund within 100 days of\npurchase, for pieces in their original condition. Engraved items\nare non-refundable.<\/p>\n&quot;" tabindex="-1">
                  <div class="accordion__button-content">
                    <span class="accordion__icon">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/returns-black.svg" width="14px" height="16px">
                    </span>
                    <p>100-Day Returns</p>
                    <span class="accordion__status">
                      <img src="https://www.monicavinader.com/images/2020/plus-black.svg" width="14px" height="16px">
                    </span>
                  </div>
                </button>
              </div>
              <div class="accordion__wrap">
                <div class="richtext richtext--flush accordion__body">
                  <p>We guarantee a full money-back refund within 100 days of
                    purchase, for pieces in their original condition. Engraved items
                    are non-refundable.</p>
                </div>
              </div>
            </div>
            <div class="accordion accordion--bare accordion--product-details accordion--product-benefits js-product-benefits-accordion accordion--invalid accordion--retain-head">
              <div class="accordion__head">
                <button type="button" class="accordion__button js-product-benefits-accordion__trigger js-product-benefit" data-benefit="&quot;<p>Every hand-crafted piece comes with our 5-Year Warranty. Whether\nyou want your ring resized or piece replated, we will repair your\njewellery free of charge<\/p>\n&quot;" tabindex="-1">
                  <div class="accordion__button-content">
                    <span class="accordion__icon">
                      <img src="https://www.monicavinader.com/images/2020/usp-icons/warranty-black.svg" width="14px" height="16px">
                    </span>
                    <p>5-Year Warranty</p>
                    <span class="accordion__status">
                      <img src="https://www.monicavinader.com/images/2020/plus-black.svg" width="14px" height="16px">
                    </span>
                  </div>
                </button>
              </div>
              <div class="accordion__wrap">
                <div class="richtext richtext--flush accordion__body">
                  <p>Every hand-crafted piece comes with our 5-Year Warranty. Whether
                    you want your ring resized or piece replated, we will repair your
                    jewellery free of charge</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div> -->

      <!-- <button class="accordions">Section 1</button>
<div class="panels">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordions">Section 2</button>
<div class="panels">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div>

<button class="accordions">Section 3</button>
<div class="panels">
  <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
</div> -->


    </div>
  </article>
</div>
    </div>
  </div>
</section>



<!-- rew section start -->

<!-- Classic tabs -->

<!-- Classic tabs -->





<!-- rew section end -->











<!-- third slider start -->




<!-- Model Start-->

        <div class="modal fade" id="exampleModal_<?=$product_data->id;?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-lg">
            <div class="modal-content">
              <div class="modal-header p-0">

                <h5 style="font-size: 1.375rem;
              letter-spacing: 0.15em;
              text-transform: uppercase;line-height: 3;" class="modal-title" id="exampleModalLabel">ADD COMPLIMENTARY ENGRAVING</h5>
                        <button type="button" class="close rigtal" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>


              <div class="modal-body">
        <section>
              	<div class="container" style="width:100%;">
              		<div class="row">
              			<div class="col-md-7 text-center  custom_p">
              				<!-- <div class="row">
              					<div class="col-md-2 justify-content-center align-items-center d-flex"><p><</p></div>
              					<div class="col-md-8"><p style=" color: rgb(125, 125, 125);   font-size: 0.5625rem;">LOCATION 1 OF 3</p><span class="span_out">OUTSIDE</span></div>
              					<div class="col-md-2 justify-content-center align-items-center d-flex"><p>></p></div>
              				</div> -->
              			</div>
              			<div class="col-md-5 mt-auto mb-auto">
              				<div class="row text-center can_p ">
              					<div class="col-md-6 p-0 pr-3 cancel" id="cancel" pro_id="<?=$product_data->id;?>">
              						<p>CANCEL</p>
              					</div>
              					<div class="col-md-6 p-0">
              						<!-- <p id="fine_<?=$product_data->id;?>" type="button" style="background:lightgrey;color:white;">FINISHED</p> -->

                          <?php if(empty(Session::get('user_data'))) {?>

	<p id="fine_<?=$product_data->id;?>" type="button" style="background:lightgrey;color:white;"
    onclick="addToCartOfflineHandler2(this)"
        data-product-id="<?=$product_data->id;?>"
        data-enagve_text=""
        data-font_size="15"
        data-font_family="simple"
        quantity="1" status="2">FINISHED</p>



                          <?php }else{ ?>

                            <p id="fine_<?=$product_data->id;?>" type="button" style="background:lightgrey;color:white;"
                              onclick="addToCartOnlineHandler(this)"
                               data-category-id="<?=$product_data->category_id;?>"
                               data-subcategory-id=""
                               data-product-id="<?=$product_data->id;?>"
                               user-id="<?= Session::get('user_id');?>"
                               quantity="1" status="2" >FINISHED</p>



                          <?php } ?>

              					</div>
              				</div>

              			</div>
              		</div>
              	</div>
        </section>



        <section>


        						<div class="container"  style="width:100%;">
        						<div class="row img_row">
        						<div class="col-md-7 pl-0"
        						 style="">


        						 	<input id="mySelect_<?=$product_data->id;?>" pro_id="<?=$product_data->id;?>" onkeyup=" myFunction_in(<?=$product_data->id;?>)"  type="text" class="numu mySelect " name="text" placeholder="Type here..." value="" >


                      <p type="text" class="demo_text"  id="demo_text_<?=$product_data->id;?>"></p>
        						 	<!-- <p type="text" class="demo_text"  id="demo_text_11<?=$product_data->id;?>"></p> -->

<script type="text/javascript">

var el = document.getElementById('mySelect_<?=$product_data->id;?>').querySelector('p');
(window.onresize = function log() {
  console.log("scrollWidth =", el.scrollWidth, ", clientWidth =", el.clientWidth);
})();

</script>



<input type="hidden" name="font_famly" id="font_famly_<?=$product_data->id;?>" value="simple">







        				<img style="position: relative;" src="<?=base_path.$product_data->image;?>">
        			</div>



        			<div class="col-md-5" id="demohide_<?=$product_data->id;?>" style="    background: whitesmoke;">
        				<div class="row " style="padding: 15px;">
        					<div class="col-md-12 pr-0 pl-0 ">
        						<p style="    display: block;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.8125rem;
            margin-bottom: 20px;">ENGRAVE WITH</p>
        					</div>



        					<div class="col-md-12 font"  id="font" style="cursor: pointer;" pro_id="<?=$product_data->id;?>">
        						<div class="row" style="background: white; border: 1px solid lightgrey;border-radius:3px;">
        							<div class="col-md-4 p-0">
        								<img style="width: 100%;height: 80px;" src="<?=base_path?>frontend/assets/clipart.jpg">
        							</div>
        							<div class="col-md-8 mt-auto mb-auto" >
        								<p style="display: block;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.8125rem;
            margin: 0px 0px 5px;
            font-weight: 700;">TEXT & MOTIFS</p>
        								<p style="font-size: 0.875rem;
            color: rgb(125, 125, 125);font-weight: 400;">Add a personal message</p>

        							</div>
        						</div>
        					</div>
        					<div class="col-md-12" style="cursor: pointer;">
        						<div id="heart" class="row mt-3 heart" style="background: white;border: 1px solid lightgrey;border-radius:3px;" pro_id="<?=$product_data->id;?>">
        							<div class="col-md-4 p-0">
        								<img style="width: 100%;height: 80px;" src="<?=base_path?>frontend/assets/heart.png">
        							</div>
        							<div class="col-md-8 mt-auto mb-auto">
        								<p style="display: block;
            letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.8125rem;
            margin: 0px 0px 5px;
            font-weight: 700;"> MOTIFS</p>
        								<p style="font-size: 0.875rem;
            color: rgb(125, 125, 125);font-weight: 400;">Choose from a selection of motif designs</p>

        							</div>
        						</div>
        					</div>


        					<div class="col-md-12 pr-0">
        						<p style="letter-spacing: 0.3em;
            text-transform: uppercase;
            line-height: 1.3;
            font-size: 0.625rem;
            /* display: inline-block; */
            display: none;
            padding: 20px 0px 0px;
            float: right;
            cursor: pointer;">SKIP</p>
        					</div>



        				</div>

        			</div>




        			<div class="col-md-5" id="big_motif_<?=$product_data->id;?>" style=" display: none;    background: whitesmoke;">
        				<div class="row " style="padding: 15px;">

        <div id="motif_first_<?=$product_data->id;?>" class="col-md-12" style="    height:400px;
            overflow: overlay;background: white;display: none;">
        						<div class="row">
        							<div class="col-md-12">
        								<p style="
        	font-size: .8125rem;
            color: #999;
            text-align: left;
            margin: 10px 0 5px 5px;">Emojis</p>


            <div class="col-md-12" >

<?php
$motif_da= App\adminmodel\Motif::wherenull('deleted_at')->where('is_active', 1)->get();
if(!empty($motif_da)){
  foreach ($motif_da as $motif) {

?>

            	<div style="width:70px;height:70px;border: 1px solid ;justify-content: center;align-items: center;display: flex;float: left;padding-left: 10px">
            		<img style="width: 100%;height: auto !important;" src="<?=base_path.$motif->image;?>" onclick="add_motif(this)" image="<?=$motif->image;?>" pro-id="<?=$product_data->id;?>"></div>

<?php }  } ?>

            </div>
        							</div>
        						</div>
        					</div>










        				</div>

        			</div>







                    <div class="col-md-5" id="fontedit_<?=$product_data->id;?>" style=" display: none;   background: whitesmoke;">
        				<div class="row " style="padding: 15px;">
        					<div id="font_btn" class="col-md-6 pr-0 pl-0 text-center font_btn" pro_id="<?=$product_data->id;?>">
        						<p id="font_btnp" style="
        						display: block;
        						letter-spacing: 0.3em;
        						text-transform: uppercase;
        						line-height: 1.3;
        						font-size: 0.8125rem;
        						margin-bottom: 20px;
        						background: #4d2f40;
        						color: white;
        						padding:10px 13px;
        						cursor: pointer;
        						border-top-left-radius:5px;
        						border-bottom-left-radius: 5px;" pro_id="<?=$product_data->id;?>" class="font_btnp">FONT</p>
        					</div>
        					<div id="motif_btn_<?=$product_data->id;?>"  class="col-md-6 pr-0 pl-0  text-center  motif_btn" pro_id="<?=$product_data->id;?>">
        						<p id="motif_btnp_<?=$product_data->id;?>" style="
        						display: block;
        						letter-spacing: 0.3em;
        						text-transform: uppercase;
        						line-height: 1.3;
        						font-size: 0.8125rem;
        						margin-bottom: 20px;
        						padding: 10px 13px;
        						cursor: pointer;
        						background: white;
        						border-top-right-radius: 5px;
        						border-bottom-right-radius: 5px;" class="motif_btnp" pro_id="<?=$product_data->id;?>" >MOTIF</p>
        					</div>
        					<div class="row" id="fo">
        						<div class="col-md-12">
        						<p style="
        						letter-spacing: .3em;
        						display: inline-block;
        						text-transform: uppercase;
        						line-height: 1.3;
        						font-size: 10px;
        						font-size: .625rem;
        						font-weight: 400;">FONT</p>
        						</div>

        					</div>
        					<div class="col-md-12">
        						<div class="row" style="background: white; border: 1px solid lightgrey;border-radius:3px;">


        						</div>
        					</div>
        					<div id="message_<?=$product_data->id;?>" class="col-md-12" style="cursor: pointer;">
        						<div  class="row mt-3" style="background: white;border: 1px solid lightgrey;border-radius:3px;">

        							<div class="col-md-12">

<input type="hidden" name="checkkbox" id="checkbox_<?=$product_data->id;?>" value="0">


        								<input style="
        	outline: 0;
            background-color: #fff;
            border: 1px solid #D4D4D4;
            width: 15px;
            height: 15px;
            cursor: pointer;
            vertical-align: middle;" type="checkbox" name="Preview your message" pro_id="<?=$product_data->id;?>" >
        								<label style="
        	font-size: .875rem;
            margin-left: 10px;
            color: #4d2f40;">Preview your message</label>
        							</div>



        							<div class="col-md-12">
        								<p id="script_p_<?=$product_data->id;?>" class="script_p" style="font-family: 'Engagement', cursive;" pro_id="<?=$product_data->id;?>">Script</p>
        								<p id="block_p_<?=$product_data->id;?>" class="block_p" style="font-family: 'Lalezar', cursive;" pro_id="<?=$product_data->id;?>">BLOCK</p>
        								<p id="simple_p_<?=$product_data->id;?>" class="simple_p" style="color: orange;" pro_id="<?=$product_data->id;?>">Simple</p>
        								<p id="deco_p_<?=$product_data->id;?>" class="deco_p" style="font-family: 'Tajawal', sans-serif;" pro_id="<?=$product_data->id;?>">Deco</p>
        								<p id="arabic_p_<?=$product_data->id;?>" class="arabic_p" style="font-family: 'Sansita Swashed', cursive;" pro_id="<?=$product_data->id;?>">Arabic</p>
        								<p id="korean_p_<?=$product_data->id;?>" class="korean_p" style="font-family: 'Nova Flat', cursive;" pro_id="<?=$product_data->id;?>">Korean</p>
        							</div>

        						</div>
        					</div>





        					<div id="motif_<?=$product_data->id;?>" class="col-md-12" style="    height:250px;
            overflow: overlay;background: white;display: none;">
        						<div class="row">
        							<div class="col-md-12">
        								<p style="
        	font-size: .8125rem;
            color: #999;
            text-align: left;
            margin: 10px 0 5px 5px;">Emojis</p>


            <div class="col-md-12" >

<?php
$motif_da= App\adminmodel\Motif::wherenull('deleted_at')->where('is_active', 1)->get();
if(!empty($motif_da)){
  foreach ($motif_da as $motif) {

?>

            	<div style="width:70px;height:70px;border: 1px solid ;justify-content: center;align-items: center;display: flex;float: left;padding-left: 10px" onclick="add_motif(this)" image="<?=$motif->image;?>" pro-id="<?=$product_data->id;?>">
            		<img style="width: 100%;height: auto !important;" src="<?=base_path.$motif->image;?>" ></div>

<?php }  } ?>

            </div>
        							</div>
        						</div>
        					</div>




        					<div class="col-md-12 mt-3">

        						<div class="row">
        							<div class="col-md-4">
        								<p style="
        								text-transform: none;
        								color: gray;
        								letter-spacing: normal;
        								font-size: 13px;" >Font size</p>
        							</div>
        							<div class="col-md-8 val_span">
        								<span id="minus" class="Minus" product-Id="<?php echo $product_data->id; ?>">-</span>
        								<span id="font_sz_<?php echo $product_data->id; ?>" product-Id="<?php echo $product_data->id; ?>">15</span>
        								<span id="plus"  class="Add" product-Id="<?php echo $product_data->id; ?>">+</span>
        							</div>

        						</div>

        					</div>

        				</div>

        			</div>
        		</div>
        	</div>



        </section>
      </div>

              </div>
              <div class="modal-footer">

              </div>

                  </div>
          </div>
        </div>



<!-- Model End -->





<!-- ENGRAVING JS START -->


<script>
$(document).ready(function(){
  $(".font").click(function(){
    var pro_id= $(this).attr('pro_id');
    $("#fontedit_"+pro_id).show();
    $("#mySelect_"+pro_id).show();
    $("#demo_text_"+pro_id).show();
    $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('numu');
  });

  $(".font").click(function(){
    var pro_id= $(this).attr('pro_id');
    $("#demohide_"+pro_id).hide();
    $("#big_motif_"+pro_id).hide();
  });
});

$(document).ready(function(){
  $(".cancel").click(function(){
    var pro_id= $(this).attr('pro_id');
    $("#fontedit_"+pro_id).hide();
    $("#fontedit_"+pro_id).hide();
    $("#mySelect_"+pro_id).hide();
    $("#demo_text_"+pro_id).hide();
  });
  $(".cancel").click(function(){
      var pro_id= $(this).attr('pro_id');
    $("#demohide_"+pro_id).show();
  });
});

$(document).ready(function(){
  $(".motif_btn").click(function(){
    var pro_id= $(this).attr('pro_id');
    $("#message_"+pro_id).hide();
    $("#fo_"+pro_id).hide();
  });
  $(".motif_btn").click(function(){
    var pro_id= $(this).attr('pro_id');
    $("#motif_"+pro_id).show();
  });
});



$(document).ready(function(){
  $(".font_btn").click(function(){
    var pro_id= $(this).attr('pro_id');
    $("#motif_"+pro_id).hide();
  });
  $(".font_btn").click(function(){
    var pro_id= $(this).attr('pro_id');
    $("#message_"+pro_id).show();
    $("#fo_"+pro_id).show();
  });
});





</script>
<script>
function myFunction_in(pro_id) {

  var new_pe = document.getElementById("mySelect_"+pro_id).value;

  document.getElementById("demo_text_"+pro_id).innerHTML= new_pe;
  document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-enagve_text',new_pe);

}

</script>
<script>

$('.script_p').click(function() {
  var pro_id= $(this).attr('pro_id');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).removeClass();
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('script_pc');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('numu');

  $('#font_famly_'+pro_id).val('');
  $('#font_famly_'+pro_id).val('script');
// var ff = script;
// alert(ff);
  document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_family','script');

});


  $('.block_p').click(function() {
    var pro_id= $(this).attr('pro_id');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).removeClass();

  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('block_pc');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('numu');

  $('#font_famly_'+pro_id).val('');
  $('#font_famly_'+pro_id).val('block');
  document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_family','block');

});


$('.simple_p').click(function() {
  var pro_id= $(this).attr('pro_id');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).removeClass();

  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('simple_pc');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('numu');

  $('#font_famly_'+pro_id).val('');
  $('#font_famly_'+pro_id).val('simple');
  document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_family','simple');

});



$('.deco_p').click(function() {
  var pro_id= $(this).attr('pro_id');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).removeClass();

  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('deco_pc');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('numu');

  $('#font_famly_'+pro_id).val('');
  $('#font_famly_'+pro_id).val('deco');
  document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_family','deco');

});



$('.arabic_p').click(function() {
  var pro_id= $(this).attr('pro_id');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).removeClass();

  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('arabic_pc');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('numu');

  $('#font_famly_'+pro_id).val('');
  $('#font_famly_'+pro_id).val('arabic');
  document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_family','arabic');

});



$('.korean_p').click(function() {
  var pro_id= $(this).attr('pro_id');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).removeClass();

  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('korean_pc');
  $('#mySelect_'+pro_id+',#demo_text_'+pro_id).addClass('numu');

  $('#font_famly_'+pro_id).val('');
  $('#font_famly_'+pro_id).val('korean');
  document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_family','korean');

});




$('.motif_btnp').click(function() {
var pro_id= $(this).attr('pro_id');

  $('').removeClass();
  $('#motif_btnp_'+pro_id).addClass('motif_btnpar');
  $('#font_btnp_'+pro_id).addClass('font_btnpar');
});


$('.font_btnp').click(function() {
  var pro_id= $(this).attr('pro_id');
  $('#font_btnp_'+pro_id).removeClass('font_btnpar');
  $('#motif_btnp_'+pro_id).removeClass('motif_btnpar');

});




$(document).ready(function(){

  $(".mySelect").keyup(function(){

var pro_id= $(this).attr('pro_id');
    var a= $(this).val();

var checks= $('#checkbox_'+pro_id).val();

document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-enagve_text',a);


        if(checks == 1){
          $('#script_p_'+pro_id).text('');
          $('#block_p_'+pro_id).text('');
          $('#simple_p_'+pro_id).text('');
          $('#deco_p_'+pro_id).text('');
          $('#arabic_p_'+pro_id).text('');
          $('#korean_p_'+pro_id).text('');

          $('#script_p_'+pro_id).html(a);
          $('#block_p_'+pro_id).html(a);
          $('#simple_p_'+pro_id).html(a);
          $('#deco_p_'+pro_id).html(a);
          $('#arabic_p_'+pro_id).html(a);
          $('#korean_p_'+pro_id).html(a);

        }else if(checks == 0){

          $('#script_p_'+pro_id).text('');
          $('#block_p_'+pro_id).text('');
          $('#simple_p_'+pro_id).text('');
          $('#deco_p_'+pro_id).text('');
          $('#arabic_p_'+pro_id).text('');
          $('#korean_p_'+pro_id).text('');

          $('#script_p_'+pro_id).text('Script');
          $('#block_p_'+pro_id).text('BLOCK');
          $('#simple_p_'+pro_id).text('Simple');
          $('#deco_p_'+pro_id).text('Deco');
          $('#arabic_p_'+pro_id).text('Arabic');
          $('#korean_p_'+pro_id).text('Korean');
        }






  if(a != ""){
$("#fine_"+pro_id).css("background-color", "rgb(77 47 64)");



  }else{
    $("#fine_"+pro_id).css("background-color", "lightgrey");
  }

  });
});

</script>


<script>
  $(document).ready(function(){
  $(".heart").click(function(){
      var pro_id= $(this).attr('pro_id');
    $("#demohide_"+pro_id).hide();

  });
  $(".heart").click(function(){
      var pro_id= $(this).attr('pro_id');
    $("#big_motif_"+pro_id).show();
    $("#motif_first_"+pro_id).show();
  });
});
</script>




<script type="text/javascript">
$('.Add').on('click', function ()
{
var product_id= $(this).attr('product-Id');
var input = $('#font_sz_'+product_id).text();


var inc_num= 1;
var increaseVal= parseInt(input) + parseInt(inc_num);

$("#font_sz_"+product_id).html("");
$("#font_sz_"+product_id).append(increaseVal);

var font_state= "font-size:"+increaseVal+"px !important;";
$('#demo_text_'+product_id).attr('style', font_state);

document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_size',increaseVal);

})

$('.Minus').on('click', function ()
{
var product_id= $(this).attr('product-Id');
var input = $('#font_sz_'+product_id).text();

var inc_num= 1;

if(input >= 16 ){
    var decreaseVal= parseInt(input) - parseInt(inc_num);
}else{
    var decreaseVal= "15";
}

    $("#font_sz_"+product_id).html("");
    $("#font_sz_"+product_id).append(decreaseVal);

    var font_state= "font-size:"+decreaseVal+"px !important;";
    $('#demo_text_'+product_id).attr('style', font_state);
    document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-font_size',decreaseVal);



})


</script>


<script>

  $(document).ready(function(){
      $('input[type="checkbox"]').click(function(){


var pro_id= $(this).attr('pro_id');
var text= $('#demo_text_'+pro_id).html();

          if($(this).prop("checked") == true){
              $('#script_p_'+pro_id).text('');
              $('#block_p_'+pro_id).text('');
              $('#simple_p_'+pro_id).text('');
              $('#deco_p_'+pro_id).text('');
              $('#arabic_p_'+pro_id).text('');
              $('#korean_p_'+pro_id).text('');

              $('#script_p_'+pro_id).html(text);
              $('#block_p_'+pro_id).html(text);
              $('#simple_p_'+pro_id).html(text);
              $('#deco_p_'+pro_id).html(text);
              $('#arabic_p_'+pro_id).html(text);
              $('#korean_p_'+pro_id).html(text);

              $('#checkbox_'+pro_id).val('');
              $('#checkbox_'+pro_id).val(1);
          }
          else if($(this).prop("checked") == false){
            $('#script_p_'+pro_id).text('');
            $('#block_p_'+pro_id).text('');
            $('#simple_p_'+pro_id).text('');
            $('#deco_p_'+pro_id).text('');
            $('#arabic_p_'+pro_id).text('');
            $('#korean_p_'+pro_id).text('');

            $('#script_p_'+pro_id).text('Script');
            $('#block_p_'+pro_id).text('BLOCK');
            $('#simple_p_'+pro_id).text('Simple');
            $('#deco_p_'+pro_id).text('Deco');
            $('#arabic_p_'+pro_id).text('Arabic');
            $('#korean_p_'+pro_id).text('Korean');

            $('#checkbox_'+pro_id).val('');
            $('#checkbox_'+pro_id).val(0);
          }
      });
  });

</script>

<script>
function add_motif(obj){

var image= $(obj).attr("image");
var pro_id= $(obj).attr("pro-id");
var base_path= "<?=base_path;?>";
var msg= $("#mySelect_"+pro_id).val();
var myArray = msg.split("<br />")
if(myArray.length===0){
var add_msg= msg+'<br /><img style="height: 18px;width: 18px;" src="'+base_path+image+'"/>';
}else{
  var add_msg= myArray[0]+'<br /><img style="height: 18px;width: 18px;" src="'+base_path+image+'"/>';

}

document.getElementById('fine_<?=$product_data->id;?>').setAttribute('data-enagve_text',msg);
// alert(image);
// alert(pro_id);
// alert(base_path);
// alert(msg);
// alert(add_msg);
$("#demo_text_"+pro_id).text('');
$("#demo_text_"+pro_id).html(add_msg);

$("#mySelect_"+pro_id).val('');
$("#mySelect_"+pro_id).val(add_msg);



var checks= $('#checkbox_'+pro_id).val();



          if(checks == 1){
            $('#script_p_'+pro_id).text('');
            $('#block_p_'+pro_id).text('');
            $('#simple_p_'+pro_id).text('');
            $('#deco_p_'+pro_id).text('');
            $('#arabic_p_'+pro_id).text('');
            $('#korean_p_'+pro_id).text('');

            $('#script_p_'+pro_id).html(add_msg);
            $('#block_p_'+pro_id).html(add_msg);
            $('#simple_p_'+pro_id).html(add_msg);
            $('#deco_p_'+pro_id).html(add_msg);
            $('#arabic_p_'+pro_id).html(add_msg);
            $('#korean_p_'+pro_id).html(add_msg);

          }else if(checks == 0){

            $('#script_p_'+pro_id).text('');
            $('#block_p_'+pro_id).text('');
            $('#simple_p_'+pro_id).text('');
            $('#deco_p_'+pro_id).text('');
            $('#arabic_p_'+pro_id).text('');
            $('#korean_p_'+pro_id).text('');

            $('#script_p_'+pro_id).text('Script');
            $('#block_p_'+pro_id).text('BLOCK');
            $('#simple_p_'+pro_id).text('Simple');
            $('#deco_p_'+pro_id).text('Deco');
            $('#arabic_p_'+pro_id).text('Arabic');
            $('#korean_p_'+pro_id).text('Korean');
          }




}
</script>

<!-- ENGRAVING JS END -->





<script>
// $(document).on('change', '.size_selct', function() {
  // Does some stuff and logs the event to the console
function colorChange(c_id, prod_id){
  // alert("u");
var c_price ='<?php echo $currency_price;?>';
  // var prod_id = $(this).attr('pro_id');
  // alert(prod_id);
  // alert(c_id);

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
  $('#price_discount_'+prod_id).text(discount_string);

  $('#color_select_'+prod_id).val(c_id);

if(pro_color_d.image1 != "" && pro_color_d.image1 != null){

$('#main_img1').attr('src', base_path+pro_color_d.image1);
$('#my_img1').attr('src',base_path+pro_color_d.image1);

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
		$(document).ready(function(){
			$('#pic-1').zoom();
			$('#pic-2').zoom();
			$('#pic-3').zoom();
			$('#pic-4').zoom();
			$('#pic-5').zoom();
		});
	</script>

  <script>
var acc = document.getElementsByClassName("accordions");
var i;

for (i = 0; i < acc.length; i++) {
  acc[i].addEventListener("click", function() {
    this.classList.toggle("actives");
    var panel = this.nextElementSibling;
    if (panel.style.maxHeight) {
      panel.style.maxHeight = null;
    } else {
      panel.style.maxHeight = panel.scrollHeight + "px";
    }
  });

}
</script>

@endsection
