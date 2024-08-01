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
								<h1 class="pbmit-tbar-title"> Daftar Psikolog</h1>
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
								<span><span class="post-root post post-post current-item"> Daftar Psikolog</span></span>
							</div>
						</div>
					</div>
				</div>  
			</div> 
		</div>
        <!-- Title Bar End-->

        <!-- Page Content -->
        <div class="page-content"> 

			<!-- Team Start --> 
			<section class="section-lgx">
				<div class="container">
					<div class="row pbmit-element-posts-wrapper">
                        @foreach ($paginatePsikolog as $data)
						<article class="pbmit-team-style-1 col-md-6 col-lg-3">
							<div class="pbminfotech-post-item">
								<div class="pbmit-featured-wrap">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
                                            <div style="width: 80%; max-width: 400px; height: 0; padding-top: 100%; position: relative; overflow: hidden;">
                                                <img src="{{ asset('store/user/photo/psikolog' . $data->profile_photo_path) }}" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; object-fit: cover;" class="img-fluid" alt="">
                                            </div>										
                                        </div>
									</div>
									<div class="pbmit-team-btn">
										<a class="pbmit-team-text" href="#">
											<i class="pbmit-base-icon-share-1"></i>
										</a>
										<div class="pbminfotech-box-social-links">
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
										</div>
									</div>
								</div>
								<div class="pbminfotech-box-content">
									<div class="pbminfotech-box-content-inner">
										<div class="pbminfotech-box-team-position" style="text-transform: capitalize;">{{ $data->asal_universitas }}</div>
										<h3 class="pbmit-team-title">
											<a href="{{ route('client.detailPsikolog', ['username' => Str::slug($data->nama)]) }}">{{ $data->nama }}</a>
										</h3>
									</div>
								</div>
							</div>
						</article>
                        @endforeach
					</div>
				</div>
			</section>
			<!-- Team End --> 

        </div>
        <!-- Page Content End -->

@endsection