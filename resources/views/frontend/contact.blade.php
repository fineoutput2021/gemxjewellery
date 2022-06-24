@extends('frontend.layout')
@section('main')
<style type="text/css">
  /*--------------------------------------------------------------
# Contact
--------------------------------------------------------------*/
.contact .info-wrap {

  padding: 30px;
}

.contact .info {
  background: #fff;
}

.contact .info i {
  font-size: 20px;
  color: #f03c02;
  float: left;
  width: 44px;
  height: 44px;
  background: #ffeee8;
  display: flex;
  justify-content: center;
  align-items: center;
  border-radius: 50px;
  transition: all 0.3s ease-in-out;
}

.contact .info h4 {
  padding: 0 0 0 60px;
  font-size: 22px;
  font-weight: 600;
  margin-bottom: 5px;
  color: #2b2320;
}

.contact .info p {
  padding: 0 0 0 60px;
  margin-bottom: 0;
  font-size: 14px;
  color: #65534c;
}

.contact .info:hover i {
  background: #f03c02;
  color: #fff;
}

.contact .php-email-form {
  width: 100%;
  padding: 30px;
  background: #fff;
}

.contact .php-email-form .form-group {
  padding-bottom: 8px;
}

.contact .php-email-form .validate {
  display: none;
  color: red;
  margin: 0 0 15px 0;
  font-weight: 400;
  font-size: 13px;
}

.contact .php-email-form .error-message {
  display: none;
  color: #fff;
  background: #ed3c0d;
  text-align: left;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .error-message br + br {
  margin-top: 25px;
}

.contact .php-email-form .sent-message {
  display: none;
  color: #fff;
  background: #18d26e;
  text-align: center;
  padding: 15px;
  font-weight: 600;
}

.contact .php-email-form .loading {
  display: none;
  background: #fff;
  text-align: center;
  padding: 15px;
}

.contact .php-email-form .loading:before {
  content: "";
  display: inline-block;
  border-radius: 50%;
  width: 24px;
  height: 24px;
  margin: 0 10px -6px 0;
  border: 3px solid #18d26e;
  border-top-color: #eee;
  -webkit-animation: animate-loading 1s linear infinite;
  animation: animate-loading 1s linear infinite;
}

.contact .php-email-form input, .contact .php-email-form textarea {
  border-radius: 0;
  box-shadow: none;
  font-size: 14px;
}

.contact .php-email-form input {
  height: 44px;
}

.contact .php-email-form textarea {
  padding: 10px 12px;
}

.contact .php-email-form button[type="submit"] {
  background: #f03c02;
  border: 0;
  padding: 10px 24px;
  color: #fff;
  transition: 0.4s;
  border-radius: 4px;
}

.contact .php-email-form button[type="submit"]:hover {
  background: #fd5c28;
}

@-webkit-keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}

@keyframes animate-loading {
  0% {
    transform: rotate(0deg);
  }
  100% {
    transform: rotate(360deg);
  }
}
</style>


<div class="paddingfromtop">
<section id="contact" class="contact">
    <div class="container">
      <h2 style="text-align:center;text-decoration:underline;" class="mt-5 mb-5">Contact Us</h2>
    </hr>
      <div class="row mt-5" data-aos="fade-up">
        <div class="col-lg-6">

          <!-- show success and error messages -->
         	@if (session('status'))
         		<div class="alert alert-success" role="alert">
         			{{ session('status') }}
         			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         				<span aria-hidden="true">&times;</span>
         		</div>
         	@endif
         	@if (session('status-error'))
         		<div class="alert alert-danger" role="alert">
         			{{ session('status-error') }}
         			 <button type="button" class="close" data-dismiss="alert" aria-label="Close">
         				<span aria-hidden="true">&times;</span>
         		</div>
         	@endif
          <!-- End show success and error messages -->



          <form action="/add_contact_process" method="post" role="form" class="php-email-form">
            @csrf
            <div class="form-row">
              <div class="col-md-6 form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars"required/>
                @error('name')
                <div style= "color:red">{{$message}}</div>
                @enderror
                <div class="validate"></div>
              </div>
              <div class="col-md-6 form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email"required />
                @error('email')
                <div style= "color:red">{{$message}}</div>
                @enderror
                <div class="validate"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="number" class="form-control" name="contact_number" id="contact_number" placeholder="Contact" data-rule="minlen:4" data-msg="Please enter at least 10 number of contact" />

              <div class="validate"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"required></textarea>
              @error('message')
              <div style= "color:red">{{$message}}</div>
              @enderror
              <div class="validate"></div>
            </div>
            <div class="mb-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>
        <div class="col-lg-6">
          <div class="profile">
            <img src="https://i.pinimg.com/originals/4b/fe/f0/4bfef0682fc434a8f6462e388441f54d.png" style="width: 100%; height: 450px;">
          </div>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->
</div>

@endsection
