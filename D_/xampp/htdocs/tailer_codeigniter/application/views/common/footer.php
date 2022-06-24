
	<!-- <footer start -->

			<footer class="mt-5 pt-5">
				<div class="container pt-5">
					<div class="row">
						<div class="col-md-2">
							<a href="<?=base_url();?>Home/index">
								<img src="<?=base_url()?>assets/frontend/img/logo.png" class="img-fluid">
							<!-- <h1 class="mb-0 change_mobile tac"><span style="color:#c5a981">O</span>TAILOR</h1>
							<h1 class="mb-0 change_desktop"><span style="color:#c5a981">O</span>TAILOR</h1> -->
						</a>
						</div>
						<div class="col-md-2">
							<h5>CONTACT INFO</h5>
							<p>Phone:1234567890</p>
							<p>Email:demo@gmail.com</p>
							<p>Address:jaipur rajasthan</p>
						</div>
						<div class="col-md-4">
							<div class="row">
								<div class="col-md-6">
									<h5>COMPANY</h5>
									<a href="#">
										<p>About us</p>
									</a>
									<a href="#">
										<p>Best services</p>
									</a>
									<a href="#">
										<p>Recent insight</p>
									</a>
									<a href="#">
										<p>Shipping guid</p>
									</a>
									<a href="#">
										<p>Privacy policy</p>
									</a>
								</div>
								<div class="col-md-6">
									<h5>PAYMENT & SHIPPING</h5>
									<a href="#">
										<p>Payment method</p>
									</a>
									<a href="#">
										<p>Tearms of use</p>
									</a>
									<a href="#">
										<p>Shipping policy</p>
									</a>
									<a href="#">
										<p>Shipping guide</p>
									</a>
									<a href="#">
										<p>Return policy</p>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-4">
							<h5>NEWSLETTER</h5>
							<p>Get timely updates from your favorite products</p>
							<div class="news">
								<form action = "<?=base_url()?>Home/newsletter" method="post" enctype="multipart/form-data">
								<input type="email" name="email" placeholder="Email Address*" required>
								<button type="submit">Subcribe</button>
							</form>
							</div>
						</div>
					</div>
				</div>
					<hr>

				<div class="container">
					<div class="row">
						<div class="col-md-4">
							<p><b>© 2021 demo, All Rights Reserved</b></p>
						</div>
						<div class="col-md-4"></div>
						<div class="col-md-4 d-flex align-items-center justify-content-between">
							<a href="#">
								<p><b>Privacy</b></p>
							</a>
							<a href="#">
								<p><b>Terms</b></p>
							</a>
							<a href="#">
								<p><b>Promo T&Cs Apply</b></p>
							</a>
						</div>
					</div>
				</div>
			</footer>


	<!-- <footer end -->

</body>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
	<script src="https://unpkg.com/swiper/swiper-bundle.min.js"></script>






 <script type="text/javascript">
var mq = window.matchMedia( "(max-width: 570px)" );
if (mq.matches) {

	 var swiper = new Swiper(".mySwiper", {
		 slidesPerView: 2,
		 spaceBetween: 30,
		 slidesPerGroup: 1,
		 loop: true,
		 loopFillGroupWithBlank: true,
		 pagination: {
			 el: ".swiper-pagination",
			 clickable: true,
		 },
		 navigation: {
			 nextEl: ".swiper-button-next",
			 prevEl: ".swiper-button-prev",
		 },
	 });

}
else {

	var swiper = new Swiper(".mySwiper", {
		 slidesPerView: 4,
		 spaceBetween: 30,
		 slidesPerGroup: 1,
		 loop: true,
		 loopFillGroupWithBlank: true,
		 pagination: {
			 el: ".swiper-pagination",
			 clickable: true,
		 },
		 navigation: {
			 nextEl: ".swiper-button-next",
			 prevEl: ".swiper-button-prev",
		 },
	 });

}
 </script>
 <script>
      var swiper = new Swiper(".mySwiper", {
        spaceBetween: 10,
        slidesPerView: 4,
        freeMode: true,
        watchSlidesProgress: true,
      });
      var swiper2 = new Swiper(".mySwiper2", {
        spaceBetween: 10,
        navigation: {
          nextEl: ".swiper-button-next",
          prevEl: ".swiper-button-prev",
        },
        thumbs: {
          swiper: swiper,
        },
      });
    </script>
</html>
