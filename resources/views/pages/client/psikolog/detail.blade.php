@extends('layouts.client.main')
@section('title')
    Detail Psikolog | {{ config('app.name') }}
@endsection
@section('pages')
    Detail Psikolog
@endsection
@section('content')
  <!-- Title Bar -->
        <div class="pbmit-title-bar-wrapper" style="background-image: url({{ asset('client/images/titlebar-bg-img.jpg') }})">
			<div class="container">
				<div class="pbmit-title-bar-content">
					<div class="pbmit-title-bar-content-inner">
						<div class="pbmit-tbar">
							<div class="pbmit-tbar-inner container">
								<h3 class="pbmit-tbar-subtitle"> Psikolog</h3>
								<h1 class="pbmit-tbar-title"> {{ $psikolog->nama }}</h1>
							</div>
						</div>
						<div class="pbmit-breadcrumb">
							<div class="pbmit-breadcrumb-inner">
								<span>
									<a title="" href="#" class="home"><span>{{$siteIdentity->name_website}}</span></a>
								</span>
								<span class="sep">
									<i class="pbmit-base-icon-angle-double-right"></i>
								</span>
								<span>
									<a title="" href="#" class="home"><span>Psikolog</span></a>
								</span>
								<span class="sep">
									<i class="pbmit-base-icon-angle-double-right"></i>
								</span>
								<span><span class="post-root post post-post current-item"> {{ $psikolog->nama }}</span></span>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <!-- Title Bar End-->

        <!-- Page Content -->
        <div class="page-content">

            <!-- Team Single Detail -->
            <section class="pbmit-team-single pbmit-sticky-section">
				<div class="container">
					<div class="pbmit-team-single-info">
						<div class="row">
							<div class="col-md-12 col-xl-3">
								<div class="pbmit-sticky-col">
									<div class="pbmit-team-left-inner">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('store/user/photo/psikolog' . $psikolog->profile_photo_path) }}" class="img-fluid w-100" style="height: 400px; object-fit:cover;" alt="">
										</div>
										<div class="pbmit-team-detail">
											<div class="pbmit-team-detail-inner">
												<div class="pbmit-team-summary">
													<h4 class="pbmit-team-designation">{{ $psikolog->program_studi }}</h4>
													<h2 class="pbmit-team-title">{{ $psikolog->nama }}</h2>
												</div>
												<ul class="pbmit-single-team-info">
													<li>
														<label>Asal Universitas :</label> {{ $psikolog->asal_universitas }}
													</li>
													<li>
														<label>Tempat Praktik :</label> {{ $psikolog->tempat_praktik }}
													</li>
													<li>
														<label>Tahun Lulus:</label> {{ $psikolog->tahun_lulus }}
													</li>
												</ul>
											</div>
											<div class="pbmit-team-share-btn">
												<div class="pbmit-share-icon-wrapper">
													<span class="pbmit-share-icon">
													<i class="pbmit-base-icon-share-2"></i>
													</span>
													<ul class="pbmit-social-links pbmit-team-social-links">
														<li class="pbmit-social-li pbmit-social-facebook">
															<a href="#" title="Facebook" target="_blank">
																<span><i class="pbmit-base-icon-facebook-f"></i></span>
															</a>
														</li>
														<li class="pbmit-social-li pbmit-social-twitter">
															<a href="#" title="Twitter" target="_blank">
																<span><i class="pbmit-base-icon-twitter-2"></i></span>
															</a>
														</li>
														<li class="pbmit-social-li pbmit-social-instagram">
															<a href="#" title="Instagram" target="_blank">
																<span><i class="pbmit-base-icon-instagram"></i></span>
															</a>
														</li>
														<li class="pbmit-social-li pbmit-social-youtube">
															<a href="#" title="Youtube" target="_blank">
																<span><i class="pbmit-base-icon-youtube-play"></i></span>
															</a>
														</li>
													</ul>
													<div class="pbmit-sticky-corner  pbmit-bottom-left-corner">
														<svg width="30" height="30" viewBox="0 0 30 30" fill="" xmlns="http://www.w3.org/2000/svg">
															<path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
														</svg>
													</div>
													<div class="pbmit-sticky-corner pbmit-top-right-corner">
														<svg width="30" height="30" viewBox="0 0 30 30" fill="none" xmlns="http://www.w3.org/2000/svg">
															<path d="M30 30V0C30 16 16 30 0 30H30Z" fill="red"></path>
														</svg>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-12 col-xl-9">
								<div class="pbmit-entry-content">
									<div class="pbmit-heading animation-style2">
										<h3 class="pbmit-title mb-3">Personal Info</h3>
									</div>
									<p class="pbmit-firstletter">{{ $psikolog->deskripsi }}</p>
									<div class="text-editor-box">
										<div class="d-flex">
											<div class="col-md-4">
												<h6>Bidang :</h6>
											</div>
											<div class="col-md-8">
												<p>
												    {{ implode(', ', $psikolog->detailPsikologs->flatMap(function ($detail) {
    												    return $detail->bidangPsikologs->pluck('name');
    												})->unique()->toArray()) }}
												</p>
											</div>
										</div>
									</div>
									<div class="text-editor-box">
										<div class="d-flex">
											<div class="col-md-4">
												<h6>Degrees :</h6>
											</div>
											<div class="col-md-8">
												<p>MBBS University of California</p>
											</div>
										</div>
									</div>
									<div class="text-editor-box">
										<div class="d-flex">
											<div class="col-md-4">
												<h6>Experience :</h6>
											</div>
											<div class="col-md-8">
												<p>7 years, New York Urgent Medical Care Serving California</p>
											</div>
										</div>
									</div>
									<div class="counter-box">
										<div class="row g-0">
											<div class="col-md-8 pbmit-col_1">
												<div class="pbmit-left_col">
													<div class="pbmit-heading animation-style2">
														<h3 class="pbmit-title mb-3">Professional Skills</h3>
													</div>
													<p>The advent of precision medicine is moving us closer to more precise and powerful health care that is for individual patient.</p>
													<div class="row g-0">
														<div class="col-md-4">
															<div class="pbminfotech-ele-fid-style-4">
																<div class="pbmit-fld-contents">
																	<div class="pbmit-circle-outer" data-digit="95" data-fill="#3368c6" data-emptyfill="#f0f7fd" data-before="" data-after="<sup>%</sup>" data-thickness="3" data-size="150">
																		<div class="pbmit-circle">
																			<div class="pbmit-fid-inner">
																				<span class="pbmit-fid"></span>
																				<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="95" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">95</span>
																				<span class="pbmit-fid"><sup>%</sup></span>
																			</div>
																		</div>
																	</div>
																	<div class="pbmit-fid-sub">
																		<h3 class="pbmit-fid-title">Success full <br>Surgery</h3>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="pbminfotech-ele-fid-style-4">
																<div class="pbmit-fld-contents">
																	<div class="pbmit-circle-outer" data-digit="90" data-fill="#3368c6" data-emptyfill="#f0f7fd" data-before="" data-after="<sup>%</sup>" data-thickness="3" data-size="150">
																		<div class="pbmit-circle">
																			<div class="pbmit-fid-inner">
																				<span class="pbmit-fid"></span>
																				<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="90" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">90</span>
																				<span class="pbmit-fid"><sup>%</sup></span>
																			</div>
																		</div>
																	</div>
																	<div class="pbmit-fid-sub">
																		<h3 class="pbmit-fid-title">Satisfied <br>Patients</h3>
																	</div>
																</div>
															</div>
														</div>
														<div class="col-md-4">
															<div class="pbminfotech-ele-fid-style-4">
																<div class="pbmit-fld-contents">
																	<div class="pbmit-circle-outer" data-digit="85" data-fill="#3368c6" data-emptyfill="#f0f7fd" data-before="" data-after="<sup>%</sup>" data-thickness="3" data-size="150">
																		<div class="pbmit-circle">
																			<div class="pbmit-fid-inner">
																				<span class="pbmit-fid"></span>
																				<span class="pbmit-number-rotate numinate" data-appear-animation="animateDigits" data-from="0" data-to="85" data-interval="5" data-before="" data-before-style="" data-after="" data-after-style="">85</span>
																				<span class="pbmit-fid"><sup>%</sup></span>
																			</div>
																		</div>
																	</div>
																	<div class="pbmit-fid-sub">
																		<h3 class="pbmit-fid-title"> Infection <br>Prevention</h3>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
											</div>
											<div class="col-md-4 pbmit-col_2">
												<div class="pbmit-heading animation-style2">
													<h3 class="pbmit-title mb-3">Award and Honours</h3>
												</div>
												<p>Health professionals a wide range of instruments to diagnose and treat a disease or other condition, to prevent a worsening of symptoms</p>
												<div class="pbmit-ihbox-style-2">
													<div class="pbmit-ihbox-headingicon">
														<div class="pbmit-title-wrap">
															<h4 class="pbmit-element-heading">
																2018 - 2019 :
															</h4>
															<h2 class="pbmit-element-title">William Allan Award</h2>
														</div>
														<div class="pbmit-heading-desc">Getting medical help right away for someone who is having a medical emergency</div>
													</div>
												</div>
												<div class="pbmit-ihbox-style-2">
													<div class="pbmit-ihbox-headingicon">
														<div class="pbmit-title-wrap">
															<h4 class="pbmit-element-heading">
																2020 - 2022 :
															</h4>
															<h2 class="pbmit-element-title">Bisset Hawkins Medal</h2>
														</div>
														<div class="pbmit-heading-desc">Infection control information and resources for acute care, dialysis, long-term care, etc...</div>
													</div>
												</div>
											</div>
										</div>
									</div>
									<div class="comment-respond">
										<div class="pbmit-heading animation-style2">
											<h3 class="pbmit-title mb-3">Konsultasi Sekarang</h3>
										</div>
										<div class="comment-form">
											<form>
												<div class="row">
													<div class="col-md-6">
														<input id="name" type="text" placeholder="Your Name *" class="form-control" name="name">
													</div>
													<div class="col-md-6">
														<input id="email" class="form-control" placeholder="Your Email *" name="email" type="email" value="">
													</div>
													<div class="col-md-6">
														<input id="url" class="form-control" placeholder="Your Phone *" name="phone-number" type="text" value="">
													</div>
													<div class="col-md-6">
														<input class="form-control" placeholder="Subject" name="subject" type="text" value="">
													</div>
													<div class="col-md-12">
														<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Message" rows="3"></textarea>
													</div>
													<div class="col-md-12">
														<div class="form-check">
															<input class="form-check-input" type="checkbox">
															<label class="form-check-label">
																Save my name, email, and website in this browser for the next time I comment.
															</label>
														</div>
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
												</div>
											</form>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
            </section>
            <!-- Team Single Detail end -->

        </div>
        <!-- Page Content End -->
@endsection
