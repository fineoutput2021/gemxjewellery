@extends('frontend.layout')
@section('main')

<style>
.accordion {
  background-color: #eee;
  /* color: #444; */
  cursor: pointer;
  padding: 18px;
  padding-top: 30px;
  padding-bottom: 30px;
  width: 100%;
  border: none;
  text-align: left;
  outline: none;
  transition: 0.4s;
  font-size: 16px;
  line-height: 22px;
  font-weight: 700;
  letter-spacing: 1.4px;
  font-family: Montserrat, sans-serif;
  color: inherit !important;
}

.active, .accordion:hover {
  background-color: #ccc;
}

.panel {
  padding: 0 18px;
  display: none;
  background-color: white;
  overflow: hidden;
}
.panel p{
  font-size: 14px !important;
    padding-left: 40px;
    padding-top: 1rem;
}
.plus_icon{
  float: right;
}

</style>
<div class="paddingfromtop">
<section style="margin:6rem 0 10rem 0; ">

  <div class="container">
    <div class="row">
      <div class="col-sm-12">

  <img src="<?=base_path?>frontend/assets/img/faqbanner.jpg" alt='faq' width="100%" />
</div>
</div>

<center><h3>FAQ (Frequently Asked Questions)</h3></center>

<div class="row">
  <div class="col-sm-12">

<button class="accordion">Do you offer gift wrap? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Yes, we offer complimentary gift wrap on our jewellery! During checkout, select "yes" under the "Is this a gift wrap?" heading. During the checkout process, please fill out the gift message section to include a gift message in your parcel.</p>
</div>

<button class="accordion">Can you change the shipping address? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Please get in touch with us at info@gemxjewellery.com as soon as you can if you need to change your shipping address.</p>
</div>

<button class="accordion">Can I change or cancel an order? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>After the order is placed, we will start preparing your order immediately as we want to ship your order to you at part, so here you will have a limited window to amend or cancel the order, but, no worries, we got you covered. If you have any issues, please mail us at Info@gmexjewellery.com</p>
</div>

<button class="accordion">Can you change or cancel the order if I selected the wrong item? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Please get in touch with us at Info@gemxjewellery.com if you have any Query regarding the change or cancellation of the placed order..</p>
</div>

<button class="accordion">What is the shipment mode? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>All orders will be shipped via DHL EXPRESS, FEDEX, UPS or another unrivalled service in the delivery state unless specifically requested for a preferred service.</p>
</div>



<button class="accordion">Will I get confirmation after placing an order? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Yes! You will receive an email confirmation from our side. If you have not received your confirmation email, please get in touch with us at Info@gemxjewellery.com.</p>
</div>

<button class="accordion">Is there any advance payment required for my Custom or Bulk order to be treated as a confirmed order? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>We treat wholesale orders as confirmed orders only after we receive an advance of 50% of the payment of the order. </p>
</div>

<button class="accordion">How to add a discount code to my order? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>While placing the order, please enter the discount code in the coupon code field and then click "apply". Please note that discount codes must be applied before the order is submitted.</p>
</div>

<button class="accordion">Can I add two discount codes at the same time? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>No, we are only able to apply one discount code per order.</p>
</div>

<button class="accordion">How do I redeem my birthday discount? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Please submit your birth detail here with a valid government-issued photo ID to receive your birthday discount code. You must redeem a birthday discount during birthday month. We will send you a code during your birthday month. Please enter the code at checkout. Birthday discount is valid for 50% off on one fashion jewellery item or 25% off on one fine jewellery item. Birthday discount is not valid on gift cards, jewellery accessories or any item with associated giveback. Item purchased with birthday discount is not eligible for return. We can refuse or cancel any order if we find that a customer has used their birthday discount more than once in a calendar year.</p>
</div>

<button class="accordion">Can I get my jewellery repaired? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Yes, we repair jewellery only if it is repairable. It may be chargeable. We will be happy to help you, and please contact us at info@gemxjewellery.com for more details.</p>
</div>

<button class="accordion">Can I buy a gift voucher? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Yes, please visit our vouchers column to buy a gift card for use at Gemx Jewellery Store. Gift cards are available to buy in the value between $25-500. They are valid for one year from the date of purchase. To redeem the gift voucher, please enter the code in the voucher/offer code field box during checkout.</p>
</div>

<button class="accordion">what are the methods of payment? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>We accept the following cards for payments:

We also accept Paypal, Bank Transfer as a method of payment. Online gift vouchers are also accepted as a method of payment. We have implemented internet security technology to ensure that it is safe for you to shop with us. You are free to pay in any currency you want. You can change your payment currency in the website footer. 
If you are experiencing difficulties with your payment, please contact us at Info@gemxjewellery.com.
</p>
</div>

<button class="accordion">Do we sell a gift card? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Yes! Electronic gift cards may be purchased and personalized through our website (www.gemxjewellery.com). We will email it to the recipient within 24 hours of submitting your order.</p>
</div>

<button class="accordion">Can I get products in bulk quantity? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Yes, we provide jewellery in bulk quantity. We stock a huge volume of most items in our stores and warehouses. Prices will vary according to the order quantity. For wholesale and custom orders, final prices are discussed before placing the order. No ongoing promotions/coupons may be applied to these orders. Please contact our team at order@gemxjewellery.com for more information about the bulk orders.</p>
</div>

<button class="accordion">What is our return policy? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>Our commitment to you does not end at delivery. We gladly accept returns, exchanges, and cancellations. If you are not satisfied with our product, then please contact our sales team at sale@gemxjewellery.com. Birthday discount purchases, gift cards, permanently discounted items, cut chains, cut beads strands, engraved jewellery items, personalized orders and custom orders are not eligible for return or exchange. All other unworn, unused items can be returned within seven days of receiving the product in original packaging with tags on. Your return will be processed in up to 15 business days. Return processing will begin after your package is delivered to us. Please be advised that returns and exchanges shipping is the buyer's responsibility. </p>
</div>

<button class="accordion">What is the average shipping time? <span class="plus_icon"><i class="fa fa-angle-down" aria-hidden="true"></i></span></button>
<div class="panel">
<p>priority </p>
<p>1-2 weeks</p>
<p>UPS Express 5-7 Days</p>
<p>UPS Standard 10-20 Days</p>
<p>DHL Express 5-7 Days</p>
<p>FedEx Express 7-10 Days</p>
<p>DHL E-Commerce 15-20 Days</p>
</div>

  </div>

</div>
</div>
</section>
</div>
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
</script>
@endsection
