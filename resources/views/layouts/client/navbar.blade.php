<header class="site-header header-style-2">
			<div class="container-fluid">
				<div class="pbmit-header-content d-flex justify-content-between align-items-center">
					<div class="d-flex justify-content-between align-items-center">
						<div class="site-navigation">
							<nav class="main-menu navbar-expand-xl navbar-light">
								<div class="navbar-header">
									<!-- Toggle Button --> 
									<button class="navbar-toggler" type="button">
										<i class="pbmit-base-icon-menu-1"></i>
									</button>
								</div>
								<div class="pbmit-mobile-menu-bg"></div>
								<div class="collapse navbar-collapse clearfix show" id="pbmit-menu">
									<div class="pbmit-menu-wrap">
										<span class="closepanel">
											<svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="20.163" height="20.163" viewBox="0 0 26.163 26.163">
												<rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
												<rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
											</svg>
										</span>
										<ul class="navigation clearfix">
											<li class="dropdown active">
												<a href="index.html">Home</a>
												<ul>
													<li class="active"><a href="index.html">Homepage 01</a></li>
													<li><a href="homepage-2.html">Homepage 02</a></li>
													<li><a href="homepage-3.html">Homepage 03</a></li>
													<li><a href="homepage-4.html">Homepage 04</a></li>
													<li><a href="homepage-5.html">Homepage 05</a></li>
													<li><a href="homepage-6.html">Homepage 06</a></li>
													<li><a href="homepage-7.html">Homepage 07</a></li>
													<li><a href="homepage-8.html">Homepage 08</a></li>
													<li><a href="homepage-9.html">Homepage 09</a></li>
													<li><a href="homepage-10.html">Homepage 10</a></li>
													<li><a href="homepage-11.html">Homepage 11</a></li>
													<li><a href="homepage-12.html">Homepage 12</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a href="#">Pages</a>
												<ul>
													<li><a href="about-us.html">About Us</a></li>
													<li><a href="our-history.html">Our History</a></li>
													<li><a href="classes.html">Classes</a></li>
													<li><a href="our-team-member.html">Our Team Member</a></li>
													<li><a href="team-single-detail.html">Team Single Detail</a></li>
													<li><a href="make-appointments-01.html">Make Appointments 01</a></li>
													<li><a href="faq.html">Faq</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a href="#">Services</a>
												<ul>
													<li><a href="service-details.html">Service Detail</a></li>
												</ul>
											</li>
											<li class="dropdown">
												<a href="#">Portfolio</a>
												<ul>
													<li class="dropdown">
														<a href="#">Masonary View</a>
														<ul>
															<li><a href="masonry-grid-col-2.html">Grid Col-2</a></li>
															<li><a href="masonry-grid-col-3.html">Grid Col-3</a></li>
															<li><a href="masonry-grid-col-4.html">Grid Col-4</a></li>
															<li><a href="masonry-grid-col-wide.html">Grid Col-Wide</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Grid View</a>
														<ul>
															<li><a href="portfolio-grid-col-2.html">Grid Col-2</a></li>
															<li><a href="portfolio-grid-col-3.html">Grid Col-3</a></li>
															<li><a href="portfolio-grid-col-4.html">Grid Col-4</a></li>
															<li><a href="portfolio-grid-no-gap.html">Grid No Gap</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Sortable View</a>
														<ul>
															<li><a href="portfolio-sortable-grid-col-2.html">Grid Col-2</a></li>
															<li><a href="portfolio-sortable-grid-col-3.html">Grid Col-3</a></li>
															<li><a href="portfolio-sortable-grid-col-4.html">Grid Col-4</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Single Detail Style</a>
														<ul>
															<li><a href="single-detail-style-01.html">Single Detail Style 01</a></li>
															<li><a href="single-detail-style-02.html">Single Detail Style 02</a></li>
														</ul>
													</li>
												</ul>
											</li>
											<li class="dropdown">
												<a href="#">Blog</a>
												<ul>
													<li class="dropdown">
														<a href="#">Grid View</a>
														<ul>
															<li><a href="blog-grid-2.html">Grid Col 2</a></li>
															<li><a href="blog-grid-3.html">Grid Col-3</a></li>
															<li><a href="blog-grid-4.html">Grid Col-4</a></li>
															<li><a href="blog-grid-wide.html">Grid Col Wide</a></li>
														</ul>
													</li>
													<li class="dropdown">
														<a href="#">Sortable View</a>
														<ul>
															<li><a href="blog-sortable-col-2.html">Sortable Col 2</a></li>
															<li><a href="blog-sortable-col-3.html">Sortable Col 3</a></li>
															<li><a href="blog-sortable-col-4.html">Sortable Col 4</a></li>
														</ul>
													</li>
													<li><a href="blog-classic.html">Blog Classic</a></li>
													<li><a href="blog-details.html">Blog Detail</a></li>
												</ul>
											</li>
											<li><a href="contact-us.html">Contact Us</a></li>
											@if (Auth::guard('mahasiswa')->check() === true)  
											<li><a href="contact-us.html">Make An Appointment</a></li>
											@else
											<li><a href="{{ route('signin') }}">Masuk</a></li>
											@endif
										</ul>
									</div>
								</div>
							</nav>
						</div>
					</div>
					<div class="pbmit-logo-menuarea d-flex align-items-center">
						<div class="site-branding">
							<h1 class="site-title">
								<a href="index.html">
									<img class="pbmit-sticky-logo" src="{{ asset('client/images/logo.svg') }}" alt="Yoge">
								</a>
							</h1>
						</div>
					</div>
					<div class="pbmit-right-box d-flex align-items-center">
						<div class="pbmit-button-box">
							<div class="pbmit-header-button">
								<a href="tel:+1(212)255-511">
									<span class="pbmit-header-button-text-1">+1(212)255-511</span>		
								</a>
							</div>
						</div>
						<div class="pbmit-header-search-btn">
							<a href="#" title="Search">
								<i class="pbmit-base-icon-search-1"></i>
							</a>
						</div>
						 @if (Auth::guard('mahasiswa')->check() === true) 
						<div class="pbmit-button-box-second">
							<a class="pbmit-btn" href="make-appointments-01.html">
								<span class="pbmit-button-content-wrapper">
									<span class="pbmit-button-icon pbmit-align-icon-right">
										<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
											<title>black-arrow</title>
											<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
										</svg>
									</span>
									<span class="pbmit-button-text">Make An Appointment</span>
								</span>
							</a>
						</div>
						@else
						<div class="pbmit-button-box-second">
							<a class="pbmit-btn" href="{{ route('signin') }}">
								<span class="pbmit-button-content-wrapper">
									<span class="pbmit-button-icon pbmit-align-icon-right">
										<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
											<title>black-arrow</title>
											<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
										</svg>
									</span>
									<span class="pbmit-button-text">Masuk</span>
								</span>
							</a>
						</div>
						@endif
					</div>
				</div>
			</div>
			<div class="pbmit-slider-social">
				<a title="Facebook" href="#" target="_blank">
					<span><i class="pbmit-base-icon-facebook-f"></i></span>
				</a>
				<a title="Twitter" href="#" target="_blank">
					<span><i class="pbmit-base-icon-twitter-2"></i></span>
				</a>
				<a title="LinkedIn" href="#" target="_blank">
					<span><i class="pbmit-base-icon-linkedin-in"></i></span>
				</a>
				<a title="Instagram" href="#" target="_blank">
					<span><i class="pbmit-base-icon-instagram"></i></span>
				</a>
			</div>
			<div class="pbmit-slider-area pbmit-slider-one">
				<div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false" data-columns="1" data-margin="0" data-effect="fade">
					<div class="swiper-wrapper">
						<!-- Slide1 -->
						<div class="swiper-slide">
							<div class="pbmit-slider-item">
								<div class="pbmit-slider-bg" style="background-image: url({{ asset('client/images/demo01-slide-01.jpg') }});"></div>
								<div class="container">
									<div class="row text-center">
										<div class="col-md-12">
											<div class="pbmit-slider-content">
												<h5 class="pbmit-sub-title transform-top transform-delay-1">Quality Care Made Easy </h5>
												<h2 class="pbmit-title transform-bottom transform-delay-2">Best Healthcare <br> <strong>Experience</strong> </h2>
												<div class="pbmit-button transform-bottom transform-delay-3">
													<a class="pbmit-btn pbmit-btn-outline" href="about-us.html">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">read more</span>
														</span>
													</a>
													<a class="pbmit-btn" href="contact-us.html">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">contact us</span>
														</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Slide2 -->
						<div class="swiper-slide">
							<div class="pbmit-slider-item">
								<div class="pbmit-slider-bg" style="background-image: url({{ asset('client/images/demo01-slide-02.jpg') }});"></div>
								<div class="container">
									<div class="row text-center">
										<div class="col-md-12">
											<div class="pbmit-slider-content">
												<h5 class="pbmit-sub-title transform-top transform-delay-1">Tradition. Quality. Progress.</h5>
												<h2 class="pbmit-title transform-bottom transform-delay-2">Driving Innovation <br> <strong>To Wellness</strong> </h2>
												<div class="pbmit-button transform-bottom transform-delay-3">
													<a class="pbmit-btn pbmit-btn-outline" href="about-us.html">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">read more</span>
														</span>
													</a>
													<a class="pbmit-btn" href="contact-us.html">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">contact us</span>
														</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
						<!-- Slide3 -->
						<div class="swiper-slide">
							<div class="pbmit-slider-item">
								<div class="pbmit-slider-bg" style="background-image: url({{ asset('client/images/demo01-slide-03.jpg') }});"></div>
								<div class="container">
									<div class="row text-center">
										<div class="col-md-12">
											<div class="pbmit-slider-content">
												<h5 class="pbmit-sub-title transform-top transform-delay-1">The Future of Healthcare</h5>
												<h2 class="pbmit-title transform-bottom transform-delay-2">Doctors Obsolete <br> <strong>Healthcare</strong> </h2>
												<div class="pbmit-button transform-bottom transform-delay-3">
													<a class="pbmit-btn pbmit-btn-outline" href="about-us.html">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">read more</span>
														</span>
													</a>
													<a class="pbmit-btn" href="contact-us.html">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">contact us</span>
														</span>
													</a>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</header>