@extends('layouts.client.main')
@section('title')
    Home | Mentalmate
@endsection
@section('pages')
    Home
@endsection
@section('content')
    <!-- Title Bar -->
	<div class="pbmit-title-bar-wrapper" style="background-image: url({{ asset('client/images/titlebar-bg-img.jpg') }})">
		<div class="container">
			<div class="pbmit-title-bar-content">
					<div class="pbmit-title-bar-content-inner">
						<div class="pbmit-tbar">
							<div class="pbmit-tbar-inner container">
								<h1 class="pbmit-tbar-title"> About Us</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>Xcare</span></a>
								</span>
								<span class="sep">
									<i class="pbmit-base-icon-angle-double-right"></i>
								</span>
								<span><span class="post-root post post-post current-item"> About Us</span></span>
							</div>
						</div>
					</div>
				</div>  
		</div> 
	</div>
	<!-- Title Bar End-->

	<!-- Contact Us Content -->
		<div class="page-content contact_us">  

			<!-- Ihbox -->
			<section class="section-xl">
				<div class="container">
					<div class="row">
						<div class="col-md-6 col-xl-4">
							<div class="pbmit-ihbox-style-15">
								<div class="pbmit-ihbox-box">
									<div class="pbmit-icon-wrap d-flex align-items-center">
										<div class="pbmit-ihbox-icon">
											<div class="pbmit-ihbox-icon-wrapper">
												<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
													<i class="pbmit-xcare-icon pbmit-xcare-icon-email"></i>
												</div>
											</div>
										</div>
									</div>
									<h2 class="pbmit-element-title">Mail us 24/7</h2>
									<div class="pbmit-content-wrapper">
										<div class="pbmit-heading-desc">no-reply@pbminfo.com <br> no-reply@pbmadmin.com</div>
									</div>
								</div>
								<div class="pbmit-ihbox-btn">
									<a href="#">
										<span class="pbmit-button-text">Read More</span>
										<span class="pbmit-button-icon-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-base-icon-black-arrow-1"></i>
											</span>
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-6 col-xl-4">
							<div class="pbmit-ihbox-style-15">
								<div class="pbmit-ihbox-box">
									<div class="pbmit-icon-wrap d-flex align-items-center">
										<div class="pbmit-ihbox-icon">
											<div class="pbmit-ihbox-icon-wrapper">
												<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
													<i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call"></i>
												</div>
											</div>
										</div>
									</div>
									<h2 class="pbmit-element-title">Call us 24/7</h2>
									<div class="pbmit-content-wrapper">
										<div class="pbmit-heading-desc">Phone : (+55) 654 - 545 - 5418 <br> Mobile : (+01) 654 - 545 - 1235</div>
									</div>
								</div>
								<div class="pbmit-ihbox-btn">
									<a href="#">
										<span class="pbmit-button-text">Read More</span>
										<span class="pbmit-button-icon-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-base-icon-black-arrow-1"></i>
											</span>
										</span>
									</a>
								</div>
							</div>
						</div>
						<div class="col-md-12 col-xl-4">
							<div class="pbmit-ihbox-style-15">
								<div class="pbmit-ihbox-box">
									<div class="pbmit-icon-wrap d-flex align-items-center">
										<div class="pbmit-ihbox-icon">
											<div class="pbmit-ihbox-icon-wrapper">
												<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
													<i class="pbmit-xcare-icon pbmit-xcare-icon-placeholder"></i>
												</div>
											</div>
										</div>
									</div>
									<h2 class="pbmit-element-title">Our Locations</h2>
									<div class="pbmit-content-wrapper">
										<div class="pbmit-heading-desc">4821 Ride Top, Anch St, Alaska <br> 997998, USA main city.</div>
									</div>
								</div>
								<div class="pbmit-ihbox-btn">
									<a href="#">
										<span class="pbmit-button-text">Read More</span>
										<span class="pbmit-button-icon-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-base-icon-black-arrow-1"></i>
											</span>
										</span>
									</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Ihbox End -->

			<!-- Contact Form -->
			<section>
				<div class="container">
					<div class="row g-0">
						<div class="col-md-12 col-xl-6">
							<div class="contact-us-left_img"></div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="contact-form-one_right pbmit-bg-color-white">
								<div class="pbmit-heading-subheading">
									<h4 class="pbmit-subtitle">Contact Us</h4>
									<h2 class="pbmit-title">Make an appointment apply for treatments</h2>
								</div>
								<form class="contact-form" method="post" id="contact-form" action="send-dummy.php">
									<div class="row">
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Your Name *" name="name" required>
										</div>
										<div class="col-md-6">
											<input type="email" class="form-control" placeholder="Your Email *" name="email" required>
										</div>
										<div class="col-md-6">
											<input type="tel" class="form-control" placeholder="Your Phone *" name="phone" required>
										</div>
										<div class="col-md-6">
											<input type="text" class="form-control" placeholder="Subject" name="subject" required>
										</div>
										<div class="col-md-12">
											<textarea name="message" cols="40" rows="10" class="form-control" placeholder="Message" required></textarea>
										</div>
										<div class="col-md-12">
											<button class="pbmit-btn">
												<span class="pbmit-button-content-wrapper">
													<span class="pbmit-button-icon pbmit-align-icon-right">
														<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
															<title>black-arrow</title>
															<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
															<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
															<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
														</svg>
													</span>
													<span class="pbmit-button-text">Submit Now</span>
												</span>
											</button>
										</div>
										<div class="col-md-12 col-lg-12 message-status"></div>
									</div>
								</form>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Contact Form End -->

			<!-- Client Start -->
			<section class="section-md">
				<div class="container">
					<div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false" data-columns="5" data-margin="30" data-effect="slide">
						<div class="swiper-wrapper">
							<!-- Slide1 -->
							<div class="swiper-slide">
								<article class="pbmit-client-style-1">
									<div class="pbmit-border-wrapper">
										<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
											<h4 class="pbmit-hide">Client-03</h4>
											<div class="pbmit-client-hover-img">
												<img src="images/homepage-1/client/client-global-01.png" alt="">
											</div>
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="images/homepage-1/client/client-dark-01.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!-- Slide2 -->
							<div class="swiper-slide">
								<article class="pbmit-client-style-1">
									<div class="pbmit-border-wrapper">
										<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
											<h4 class="pbmit-hide">Client-03</h4>
											<div class="pbmit-client-hover-img">
												<img src="images/homepage-1/client/client-global-02.png" alt="">
											</div>
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="images/homepage-1/client/client-dark-02.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!-- Slide3 -->
							<div class="swiper-slide">
								<article class="pbmit-client-style-1">
									<div class="pbmit-border-wrapper">
										<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
											<h4 class="pbmit-hide">Client-03</h4>
											<div class="pbmit-client-hover-img">
												<img src="images/homepage-1/client/client-global-03.png" alt="">
											</div>
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="images/homepage-1/client/client-dark-03.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!-- Slide4 -->
							<div class="swiper-slide">
								<article class="pbmit-client-style-1">
									<div class="pbmit-border-wrapper">
										<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
											<h4 class="pbmit-hide">Client-03</h4>
											<div class="pbmit-client-hover-img">
												<img src="images/homepage-1/client/client-global-04.png" alt="">
											</div>
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="images/homepage-1/client/client-dark-04.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!-- Slide5 -->
							<div class="swiper-slide">
								<article class="pbmit-client-style-1">
									<div class="pbmit-border-wrapper">
										<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
											<h4 class="pbmit-hide">Client-03</h4>
											<div class="pbmit-client-hover-img">
												<img src="images/homepage-1/client/client-global-05.png" alt="">
											</div>
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="images/homepage-1/client/client-dark-05.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
							<!-- Slide6 -->
							<div class="swiper-slide">
								<article class="pbmit-client-style-1">
									<div class="pbmit-border-wrapper">
										<div class="pbmit-client-wrapper pbmit-client-with-hover-img">
											<h4 class="pbmit-hide">Client-03</h4>
											<div class="pbmit-client-hover-img">
												<img src="images/homepage-1/client/client-global-06.png" alt="">
											</div>
											<div class="pbmit-featured-img-wrapper">
												<div class="pbmit-featured-wrapper">
													<img src="images/homepage-1/client/client-dark-06.png" class="img-fluid" alt="">
												</div>
											</div>
										</div>
									</div>
								</article>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Client End -->
			
			<!-- Iframe -->
			<section class="iframe_section section-lgb">
				<div class="container-fluid">
					<div class="iframe_box">
						<iframe src="https://maps.google.com/maps?q=London%20Eye%2C%20London%2C%20United%20Kingdom&amp;t=m&amp;z=10&amp;output=embed&amp;iwloc=near" title="London Eye, London, United Kingdom" aria-label="London Eye, London, United Kingdom"></iframe>
					</div>
				</div>
			</section>
			<!-- Iframe End-->

		</div>
		<!-- Contact Us Content End -->
@endsection