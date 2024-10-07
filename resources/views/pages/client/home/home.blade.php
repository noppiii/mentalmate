@extends('layouts.client.main')
@section('title')
    Home | {{ config('app.name') }}
@endsection
@section('pages')
    Home
@endsection
@section('content')
    <header class="site-header header-style-2">
{{--        <div class="pbmit-slider-social">--}}
{{--            <a title="Facebook" href="#" target="_blank">--}}
{{--                <span><i class="pbmit-base-icon-facebook-f"></i></span>--}}
{{--            </a>--}}
{{--            <a title="Twitter" href="#" target="_blank">--}}
{{--                <span><i class="pbmit-base-icon-twitter-2"></i></span>--}}
{{--            </a>--}}
{{--            <a title="LinkedIn" href="#" target="_blank">--}}
{{--                <span><i class="pbmit-base-icon-linkedin-in"></i></span>--}}
{{--            </a>--}}
{{--            <a title="Instagram" href="#" target="_blank">--}}
{{--                <span><i class="pbmit-base-icon-instagram"></i></span>--}}
{{--            </a>--}}
{{--        </div>--}}
        <div class="pbmit-slider-area pbmit-slider-one">
            <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="true" data-arrows="false"
                 data-columns="1" data-margin="0" data-effect="fade">
                <div class="swiper-wrapper">
                    @foreach($banners as $data)
                        <div class="swiper-slide">
                            <div class="pbmit-slider-item">
                                <div class="pbmit-slider-bg"
                                     style="background-image: url({{ asset('store/banner/' . $data->gambar) }});"></div>
                                <div class="container">
                                    <div class="row text-center">
                                        <div class="col-md-12">
                                            <div class="pbmit-slider-content">
{{--                                                <h5 class="pbmit-sub-title transform-top transform-delay-1">{{$data->judul}}</h5>--}}
                                                <h2 class="pbmit-title transform-bottom transform-delay-2">{{$data->judul}}</h2>
                                                <div class="pbmit-button transform-bottom transform-delay-3">
                                                    @if($data->link)
                                                        <a class="pbmit-btn" href="{{$data->link}}">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76"
                                                                     height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path
                                                                        d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1"
                                                                        transform="translate(-0.29 -0.29)" fill="none"
                                                                        stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75"
                                                                          transform="translate(-0.29 -0.29)" fill="none"
                                                                          stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34"
                                                                          transform="translate(-0.29 -0.29)" fill="none"
                                                                          stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">Explore</span>
														</span>
                                                        </a>
                                                    @endif
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Slide1 -->
                   <div class="swiper-slide">
                       <div class="pbmit-slider-item">
                           <div class="pbmit-slider-bg"
                                style="background-image: url({{ asset('client/images/demo01-slide-02.jpg') }});"></div>
                           <div class="container">
                               <div class="row text-center">
                                   <div class="col-md-12">
                                       <div class="pbmit-slider-content">
                                           <h5 class="pbmit-sub-title transform-top transform-delay-1">Dukungan Profesional
                                               Untuk Kesehatan Mental Anda</h5>
                                           <h5 class="pbmit-title transform-bottom transform-delay-2">Layanan Konseling
                                               <br><strong>Terpercaya</strong></h5>
                                           <div class="pbmit-button transform-bottom transform-delay-3">
                                               <a class="pbmit-btn pbmit-btn-outline" href="{{route('client.aboutus')}}">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76"
                                                                    height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path
                                                                       d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1"
                                                                       transform="translate(-0.29 -0.29)" fill="none"
                                                                       stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75"
                                                                         transform="translate(-0.29 -0.29)" fill="none"
                                                                         stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34"
                                                                         transform="translate(-0.29 -0.29)" fill="none"
                                                                         stroke="#000" stroke-width="2"></path>
																</svg>
															</span>
															<span class="pbmit-button-text">read more</span>
														</span>
                                               </a>
                                               <a class="pbmit-btn" href="{{route('client.aboutus')}}">
														<span class="pbmit-button-content-wrapper">
															<span class="pbmit-button-icon pbmit-align-icon-right">
																<svg xmlns="http://www.w3.org/2000/svg" width="22.76"
                                                                    height="22.76" viewBox="0 0 22.76 22.76">
																	<title>black-arrow</title>
																	<path
                                                                       d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1"
                                                                       transform="translate(-0.29 -0.29)" fill="none"
                                                                       stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75"
                                                                         transform="translate(-0.29 -0.29)" fill="none"
                                                                         stroke="#000" stroke-width="2"></path>
																	<path d="M22.34,1,1,22.34"
                                                                         transform="translate(-0.29 -0.29)" fill="none"
                                                                         stroke="#000" stroke-width="2"></path>
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
                </div>
            </div>
        </div>
    </header>
    <div class="page-content">
        <!-- Inner Box Start -->
        <section class="section-xl inner-box_area">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-4 position-relative">
                        <div class="pbmit-widget_icon">
                            <div class="pbmit_icon">
                                <i class="ti ti-calendar-event" style="font-size: 22px;"></i>
                            </div>
                        </div>
                        <div class="inner-box_style inner-box_1">
                            <div class="pbmit-heading_title">
                                <h5>Konsultasi Online</h5>
                            </div>
                            <ul class="pbmit-timelist-list">
                                <li>
                                    <span class="pbmit-timelist-li-title">Jadwalkan sesi konsultasi online dengan psikolog profesional untuk mendiskusikan kesehatan mental Anda secara pribadi.</span>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 position-relative">
                        <div class="pbmit-widget_icon">
                            <div class="pbmit_icon">
                                <i class="ti ti-checklist" style="font-size: 22px;"></i>
                            </div>
                        </div>
                        <div class="inner-box_style inner-box_2">
                            <div class="pbmit-heading_title">
                                <h5>Tes Kesehatan Mental </h5>
                            </div>
                            <div class="pbmit-text_aditor">
                                Lakukan tes kesehatan mental untuk mengetahui kondisi emosional Anda dan mendapatkan rekomendasi yang tepat.
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4 position-relative">
                        <div class="pbmit-widget_icon">
                            <div class="pbmit_icon">
                                <i class="ti ti-news" style="font-size: 22px;"></i>
                            </div>
                        </div>
                        <div class="inner-box_style inner-box_1">
                            <div class="pbmit-heading_title">
                                <h5>Artikel Kesehatan </h5>
                            </div>
                            <div class="pbmit-text_aditor text-white">
                                Akses berbagai artikel kesehatan yang informatif untuk meningkatkan pemahaman Anda tentang kesehatan mental.
                            </div>
                            <div class="pbmit-ihbox-style-19">
                                <div class="pbmit-ihbox-box">
                                    <div class="pbmit-ihbox-icon">
                                        <div class="pbmit-ihbox-icon-wrapper">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Inner Box end -->

        <!-- About Us Start -->
        <section class="about-us-section_two">
            <div class="container">
                <div class="pbmit-sticky-special pbmit-bg-color-white">
                    <div class="row">
                        <div class="col-md-5 about-us-two_col1">
                            <div class="about-us-two_img">
                                <img src="{{ asset('client/images/about-img-02.jpg') }}" class="img-fluid" alt="">
                            </div>
                        </div>
                        <div class="col-md-7 about-us-two_col2 pbmit-sticky-col2-special">
                            <div class="about-us-two_rightbox">
                                <div class="pbmit-heading-subheading animation-style2">
                                    <h4 class="pbmit-subtitle">Tentang Kami</h4>
                                    <h2 class="pbmit-title">Mentalmate: Solusi Kesehatan Mental Terintegrasi</h2>
                                </div>
                                <div class="about-us-two_innerbox">
                                    <div>Mentalmate adalah platform yang dirancang untuk memberikan dukungan kesehatan mental secara online. Kami mengintegrasikan layanan psikologis, tes kesehatan mental, dan akses ke artikel kesehatan untuk meningkatkan kesejahteraan komunitas.</div>
                                    <div class="pbmit-ihbox-style-12">
                                        <div class="pbmit-ihbox-box d-flex align-items-center">
                                            <div class="pbmit-ihbox-icon">
                                                <div class="pbmit-ihbox-icon-wrapper">
                                                    <div class="pbmit-icon-wrapper text-white">
                                                        <i class="ti ti-calendar-event" style="font-size: 40px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pbmit-ihbox-contents">
                                                <h2 class="pbmit-element-title">Sesi Psikolog Online</h2>
                                                <div class="pbmit-heading-desc">Konsultasikan masalah kesehatan mental Anda dengan psikolog profesional dari kenyamanan rumah Anda.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="pbmit-ihbox-style-12">
                                        <div class="pbmit-ihbox-box d-flex align-items-center">
                                            <div class="pbmit-ihbox-icon">
                                                <div class="pbmit-ihbox-icon-wrapper">
                                                    <div class="pbmit-icon-wrapper text-white">
                                                        <i class="ti ti-checklist" style="font-size: 40px;"></i>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="pbmit-ihbox-contents">
                                                <h2 class="pbmit-element-title">Tes Kesehatan Mental</h2>
                                                <div class="pbmit-heading-desc">Lakukan tes kesehatan mental untuk mengevaluasi kondisi emosional Anda dan mendapatkan rekomendasi yang tepat.</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progressbar" style="margin-top: 38px;">
                                        <span class="progress-label">Mahasiswa Konsultasi</span>
                                        <div class="progress progress-lg progress-percent-bg">
                                            @php
                                                $totalStudents = \App\Models\MahasiswaModel::count();
                                                $percentage = $totalStudents > 0 ? ($consultationCount / $totalStudents) * 100 : 0;
                                            @endphp
                                            <div class="progress-bar aos-init" data-aos="slide-right"
                                                 data-aos-delay="200" data-aos-duration="1000"
                                                 data-aos-easing="ease-in-out"
                                                 role="progressbar" aria-valuenow="{{ $percentage }}" aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width:{{ $percentage }}%">
                                                <span class="progress-percent">{{ $consultationCount }} Mahasiswa</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="progressbar">
                                        <span class="progress-label">Kepuasan Mahasiswa</span>
                                        <div class="progress progress-lg progress-percent-bg">
                                            <div class="progress-bar aos-init" data-aos="slide-right"
                                                 data-aos-delay="200" data-aos-duration="1000"
                                                 data-aos-easing="ease-in-out"
                                                 role="progressbar" aria-valuenow="{{ $satisfactionPercentage }}" aria-valuemin="0"
                                                 aria-valuemax="100"
                                                 style="width:{{ $satisfactionPercentage }}%">
                                                <span class="progress-percent">{{ number_format($satisfactionPercentage, 2) }}%</span>
                                            </div>
                                        </div>
                                    </div>
                                    <h4 class="pbmit-heading_title">Pendekatan Holistik</h4>
                                    <div>Mentalmate menerapkan pendekatan holistik dalam mendukung kesehatan mental, meliputi konsultasi, tes, dan informasi yang relevan.</div>
                                    <div class="list-group_box">
                                        <div class="row">
                                            <div class="col-md-6">
                                                <ul class="list-group list-group-borderless">
                                                    <li class="list-group-item">
                                <span class="pbmit-icon-list-icon">
                                    <i aria-hidden="true" class="ti-check"></i>
                                </span>
                                                        <span class="pbmit-icon-list-text">Dapatkan informasi akurat tentang kesehatan mental</span>
                                                    </li>
                                                    <li class="list-group-item">
                                <span class="pbmit-icon-list-icon">
                                    <i aria-hidden="true" class="ti-check"></i>
                                </span>
                                                        <span class="pbmit-icon-list-text">Konsultasi dengan psikolog berpengalaman</span>
                                                    </li>
                                                    <li class="list-group-item">
                                <span class="pbmit-icon-list-icon">
                                    <i aria-hidden="true" class="ti-check"></i>
                                </span>
                                                        <span class="pbmit-icon-list-text">Akses ke berbagai artikel kesehatan</span>
                                                    </li>
                                                </ul>
                                            </div>
                                            <div class="col-md-6">
                                                <ul class="list-group list-group-borderless">
                                                    <li class="list-group-item">
                                <span class="pbmit-icon-list-icon">
                                    <i aria-hidden="true" class="ti-check"></i>
                                </span>
                                                        <span class="pbmit-icon-list-text">Lakukan tes kesehatan mental secara online</span>
                                                    </li>
                                                    <li class="list-group-item">
                                <span class="pbmit-icon-list-icon">
                                    <i aria-hidden="true" class="ti-check"></i>
                                </span>
                                                        <span class="pbmit-icon-list-text">Dapatkan rekomendasi untuk perawatan selanjutnya</span>
                                                    </li>
                                                    <li class="list-group-item">
                                <span class="pbmit-icon-list-icon">
                                    <i aria-hidden="true" class="ti-check"></i>
                                </span>
                                                        <span class="pbmit-icon-list-text">Bergabung dengan komunitas untuk dukungan lebih</span>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- About Us end -->

        <!-- Marquee Start -->
        <section>
            <div class="container-fluid p-0">
                <div class="swiper-slider marquee">
                    <div class="swiper-wrapper">
                        <!-- Slide1 -->
                        <div class="swiper-slide">
                            <article class="pbmit-marquee-effect-style-1">
                                <div class="pbmit-tag-wrapper">
                                    <h2 class="pbmit-element-title" data-text="Konsultasi Psikologis">
                                        Konsultasi Psikologis
                                    </h2>
                                </div>
                            </article>
                        </div>
                        <!-- Slide2 -->
                        <div class="swiper-slide">
                            <article class="pbmit-marquee-effect-style-1">
                                <div class="pbmit-tag-wrapper">
                                    <h2 class="pbmit-element-title" data-text="Kesehatan Mental">
                                        Kesehatan Mental
                                    </h2>
                                </div>
                            </article>
                        </div>
                        <!-- Slide3 -->
                        <div class="swiper-slide">
                            <article class="pbmit-marquee-effect-style-1">
                                <div class="pbmit-tag-wrapper">
                                    <h2 class="pbmit-element-title" data-text="Pengembangan Diri">
                                        Pengembangan Diri
                                    </h2>
                                </div>
                            </article>
                        </div>
                        <!-- Slide4 -->
                        <div class="swiper-slide">
                            <article class="pbmit-marquee-effect-style-1">
                                <div class="pbmit-tag-wrapper">
                                    <h2 class="pbmit-element-title" data-text="Bimbingan Karir">
                                        Bimbingan Karir
                                    </h2>
                                </div>
                            </article>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Marquee End -->

        <!-- Service Start -->
        <section class="pbmit-sticky-section section-xl">
            <div class="container">

            </div>
        </section>
        <!-- Service End -->

        <!-- Tab Start -->
        <section class="section-xl pbmit-bg-color-global pbmit-extend-animation tab_section">
            <div class="container">
                <div class="pbmit-heading-subheading text-white text-center">
                    <h4 class="pbmit-subtitle">Layanan Kami</h4>
                    <h2 class="pbmit-title">Kami Menawarkan Beragam Arah dan Dukungan</h2>
                </div>
                <div class="pbmit-tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" data-bs-toggle="tab" href="#tab-2-1" aria-selected="true"
                               role="tab">
                                <span>Konsultasi Online</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2-2" aria-selected="false" role="tab"
                               tabindex="-1">
                                <span>Tes Kesehatan Mental</span>
                            </a>
                        </li>
                        <li class="nav-item" role="presentation">
                            <a class="nav-link" data-bs-toggle="tab" href="#tab-2-3" aria-selected="false" role="tab"
                               tabindex="-1">
                                <span>Artikel Kesehatan</span>
                            </a>
                        </li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="tab-2-1" role="tabpanel">
                            <div class="pbmit-column-inner">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-12 col-xl-6 pbmit-tab-img">
                                        <img src="{{ asset('client/images/tab-img-01.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-12 col-xl-6 pbmit-tab-list">
                                        <h2>Kami siap mendengarkan dan membantu Anda</h2>
                                        <div>
                                            Layanan kami mencakup konsultasi online, tes kesehatan mental, dan akses ke artikel kesehatan yang bermanfaat. Kami berkomitmen untuk memberikan dukungan yang Anda butuhkan untuk meningkatkan kesehatan mental Anda.
                                        </div>
                                        <ul class="list-group list-group-borderless">
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Konsultasi Online dengan Psikolog Profesional</span>
                                            </li>
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Tes Kesehatan Mental untuk Memahami Diri Anda</span>
                                            </li>
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">n-list-text">Artikel Kesehatan yang Informatif dan Relevan</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2-2" role="tabpanel">
                            <div class="pbmit-column-inner">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-12 col-xl-6 pbmit-tab-img">
                                        <img src="{{ asset('client/images/tab-img-02.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-12 col-xl-6 pbmit-tab-list">
                                        <h2>Tes Kesehatan Mental</h2>
                                        <div>
                                            Kami menyediakan berbagai alat untuk mengevaluasi kesehatan mental Anda. Dengan hasil yang akurat, Anda dapat lebih memahami kondisi mental Anda dan langkah-langkah yang perlu diambil.
                                        </div>
                                        <ul class="list-group list-group-borderless">
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Menyediakan Pertanyaan Seputar Kesehatan Mental</span>
                                            </li>
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Saran Berdasarkan Hasil Tes</span>
                                            </li>
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Dukungan Berkelanjutan</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane" id="tab-2-3" role="tabpanel">
                            <div class="pbmit-column-inner">
                                <div class="row g-0 align-items-center">
                                    <div class="col-md-12 col-xl-6 pbmit-tab-img">
                                        <img src="{{ asset('client/images/tab-img-03.jpg') }}" class="img-fluid" alt="">
                                    </div>
                                    <div class="col-md-12 col-xl-6 pbmit-tab-list">
                                        <h2>Artikel Kesehatan</h2>
                                        <div>
                                            Temukan berbagai artikel tentang kesehatan mental dan fisik, tips dan informasi yang berguna untuk meningkatkan kesejahteraan Anda. Kami berkomitmen untuk memberikan konten yang berkualitas dan dapat diandalkan.
                                        </div>
                                        <ul class="list-group list-group-borderless">
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Artikel Terkini tentang Kesehatan Mental</span>
                                            </li>
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Tips Kesehatan dari Ahli</span>
                                            </li>
                                            <li class="list-group-item">
													<span class="pbmit-icon-list-icon">
														<i aria-hidden="true" class="ti-check"></i>
													</span>
                                                <span class="pbmit-icon-list-text">Sumber Daya untuk Kesehatan Anda</span>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Tab End -->

        <!-- Timetable Start -->
{{--        <section class="section-lgt timetable_section">--}}
{{--            <div class="container">--}}
{{--                <div class="pbmit-heading-subheading animation-style2">--}}
{{--                    <h4 class="pbmit-subtitle">Timetable</h4>--}}
{{--                    <h2 class="pbmit-title">Events Calendar</h2>--}}
{{--                </div>--}}
{{--                <div class="pbmit-tab pbmit-tab-style-2">--}}
{{--                    <div class="pbmit-select">--}}
{{--                        <ul class="nav nav-tabs" role="tablist">--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link active" data-bs-toggle="tab" href="#tab-3-1" aria-selected="true"--}}
{{--                                   role="tab">--}}
{{--                                    <span>All Events</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3-2" aria-selected="false"--}}
{{--                                   role="tab" tabindex="-1">--}}
{{--                                    <span>Ophthalmology</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3-3" aria-selected="false"--}}
{{--                                   role="tab" tabindex="-1">--}}
{{--                                    <span>Cardiologist</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3-4" aria-selected="false"--}}
{{--                                   role="tab" tabindex="-1">--}}
{{--                                    <span>Pulmonary</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3-5" aria-selected="false"--}}
{{--                                   role="tab" tabindex="-1">--}}
{{--                                    <span>Rhinology</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3-6" aria-selected="false"--}}
{{--                                   role="tab" tabindex="-1">--}}
{{--                                    <span>Psychiatry</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                            <li class="nav-item" role="presentation">--}}
{{--                                <a class="nav-link" data-bs-toggle="tab" href="#tab-3-7" aria-selected="false"--}}
{{--                                   role="tab" tabindex="-1">--}}
{{--                                    <span>Dental</span>--}}
{{--                                </a>--}}
{{--                            </li>--}}
{{--                        </ul>--}}
{{--                    </div>--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="tab-pane show active" id="tab-3-1" role="tabpanel">--}}
{{--                            <table class="mptt-shortcode-table  mptt-theme-mode">--}}
{{--                                <thead>--}}
{{--                                <tr class="mptt-shortcode-row">--}}
{{--                                    <th></th>--}}
{{--                                    <th>Monday</th>--}}
{{--                                    <th>Tuesday</th>--}}
{{--                                    <th>Wednesday</th>--}}
{{--                                    <th>Saturday</th>--}}
{{--                                    <th>Sunday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr class="mptt-shortcode-row-8" data-index="8">--}}
{{--                                    <td class="mptt-shortcode-hours">8:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-5 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Rhinology" href="#" class="event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-8 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Psychiatry" href="#" class="event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-17 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Cardiologist" href="#" class="event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-9" data-index="9">--}}
{{--                                    <td class="mptt-shortcode-hours">9:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-10" data-index="10">--}}
{{--                                    <td class="mptt-shortcode-hours">10:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-10 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Dental" href="#" class="event-title">Dental</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cavities</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-19 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Rhinology" href="#" class="event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-11" data-index="11">--}}
{{--                                    <td class="mptt-shortcode-hours">11:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-12" data-index="12">--}}
{{--                                    <td class="mptt-shortcode-hours">12:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-1 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Ophthalmology" href="#" class="event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="12:00" class="timeslot-start">12:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="22:00" class="timeslot-end">10:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-13" data-index="13">--}}
{{--                                    <td class="mptt-shortcode-hours">1:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-14" data-index="14">--}}
{{--                                    <td class="mptt-shortcode-hours">2:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-2 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Cardiologist" href="#" class="event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-18 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Pulmonary" href="#" class="event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-15" data-index="15">--}}
{{--                                    <td class="mptt-shortcode-hours">3:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-16" data-index="16">--}}
{{--                                    <td class="mptt-shortcode-hours">4:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-22 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Ophthalmology" href="#" class="event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-15 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Rhinology" href="#" class="event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-20 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Pulmonary" href="#" class="event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-17" data-index="17">--}}
{{--                                    <td class="mptt-shortcode-hours">5:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-18" data-index="18">--}}
{{--                                    <td class="mptt-shortcode-hours">6:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-3 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Pulmonary" href="#" class="event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-16 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Psychiatry" href="#" class="event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-19" data-index="19">--}}
{{--                                    <td class="mptt-shortcode-hours">7:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab-3-2" role="tabpanel">--}}
{{--                            <table class="mptt-shortcode-table  mptt-theme-mode">--}}
{{--                                <thead>--}}
{{--                                <tr class="mptt-shortcode-row">--}}
{{--                                    <th></th>--}}
{{--                                    <th>Monday</th>--}}
{{--                                    <th>Tuesday</th>--}}
{{--                                    <th>Wednesday</th>--}}
{{--                                    <th>Saturday</th>--}}
{{--                                    <th>Sunday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr class="mptt-shortcode-row-12" data-index="12">--}}
{{--                                    <td class="mptt-shortcode-hours">12:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="10">--}}
{{--                                        <div class="mptt-event-container id-1 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Ophthalmology" href="#" class="event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="12:00" class="timeslot-start">12:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="22:00" class="timeslot-end">10:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-13" data-index="13">--}}
{{--                                    <td class="mptt-shortcode-hours">1:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle">--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle">--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle">--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle">--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-14" data-index="14">--}}
{{--                                    <td class="mptt-shortcode-hours">2:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-15" data-index="15">--}}
{{--                                    <td class="mptt-shortcode-hours">3:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-16" data-index="16">--}}
{{--                                    <td class="mptt-shortcode-hours">4:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-22 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Ophthalmology" href="#" class="event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-17" data-index="17">--}}
{{--                                    <td class="mptt-shortcode-hours">5:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-18" data-index="18">--}}
{{--                                    <td class="mptt-shortcode-hours">6:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-19" data-index="19">--}}
{{--                                    <td class="mptt-shortcode-hours">7:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-20" data-index="20">--}}
{{--                                    <td class="mptt-shortcode-hours">8:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-21" data-index="21">--}}
{{--                                    <td class="mptt-shortcode-hours">9:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab-3-3" role="tabpanel">--}}
{{--                            <table class="mptt-shortcode-table  mptt-theme-mode">--}}
{{--                                <thead>--}}
{{--                                <tr class="mptt-shortcode-row">--}}
{{--                                    <th></th>--}}
{{--                                    <th>Monday</th>--}}
{{--                                    <th>Tuesday</th>--}}
{{--                                    <th>Wednesday</th>--}}
{{--                                    <th>Saturday</th>--}}
{{--                                    <th>Sunday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr class="mptt-shortcode-row-8" data-index="8">--}}
{{--                                    <td class="mptt-shortcode-hours">8:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-17 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Cardiologist" href="#" class="event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-9" data-index="9">--}}
{{--                                    <td class="mptt-shortcode-hours">9:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-14" data-index="14">--}}
{{--                                    <td class="mptt-shortcode-hours">2:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-2 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Cardiologist" href="#" class="event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-15" data-index="15">--}}
{{--                                    <td class="mptt-shortcode-hours">3:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab-3-4" role="tabpanel">--}}
{{--                            <table class="mptt-shortcode-table  mptt-theme-mode">--}}
{{--                                <thead>--}}
{{--                                <tr class="mptt-shortcode-row">--}}
{{--                                    <th></th>--}}
{{--                                    <th>Monday</th>--}}
{{--                                    <th>Tuesday</th>--}}
{{--                                    <th>Wednesday</th>--}}
{{--                                    <th>Saturday</th>--}}
{{--                                    <th>Sunday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr class="mptt-shortcode-row-14" data-index="14">--}}
{{--                                    <td class="mptt-shortcode-hours">2:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-18 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Pulmonary" href="#" class="event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-15" data-index="15">--}}
{{--                                    <td class="mptt-shortcode-hours">3:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-16" data-index="16">--}}
{{--                                    <td class="mptt-shortcode-hours">4:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-20 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Pulmonary" href="#" class="event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-17" data-index="17">--}}
{{--                                    <td class="mptt-shortcode-hours">5:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-18" data-index="18">--}}
{{--                                    <td class="mptt-shortcode-hours">6:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-3 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Pulmonary" href="#" class="event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-19" data-index="19">--}}
{{--                                    <td class="mptt-shortcode-hours">7:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab-3-5" role="tabpanel">--}}
{{--                            <table class="mptt-shortcode-table  mptt-theme-mode">--}}
{{--                                <thead>--}}
{{--                                <tr class="mptt-shortcode-row">--}}
{{--                                    <th></th>--}}
{{--                                    <th>Monday</th>--}}
{{--                                    <th>Tuesday</th>--}}
{{--                                    <th>Wednesday</th>--}}
{{--                                    <th>Saturday</th>--}}
{{--                                    <th>Sunday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr class="mptt-shortcode-row-8" data-index="8">--}}
{{--                                    <td class="mptt-shortcode-hours">8:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-5 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Rhinology" href="#" class="event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-9" data-index="9">--}}
{{--                                    <td class="mptt-shortcode-hours">9:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-10" data-index="10">--}}
{{--                                    <td class="mptt-shortcode-hours">10:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-19 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Rhinology" href="#" class="event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-11" data-index="11">--}}
{{--                                    <td class="mptt-shortcode-hours">11:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-16" data-index="16">--}}
{{--                                    <td class="mptt-shortcode-hours">4:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-15 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Rhinology" href="#" class="event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-17" data-index="17">--}}
{{--                                    <td class="mptt-shortcode-hours">5:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab-3-6" role="tabpanel">--}}
{{--                            <table class="mptt-shortcode-table  mptt-theme-mode">--}}
{{--                                <thead>--}}
{{--                                <tr class="mptt-shortcode-row">--}}
{{--                                    <th></th>--}}
{{--                                    <th>Monday</th>--}}
{{--                                    <th>Tuesday</th>--}}
{{--                                    <th>Wednesday</th>--}}
{{--                                    <th>Saturday</th>--}}
{{--                                    <th>Sunday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr class="mptt-shortcode-row-8" data-index="8">--}}
{{--                                    <td class="mptt-shortcode-hours">8:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-8 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Psychiatry" href="#" class="event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-9" data-index="9">--}}
{{--                                    <td class="mptt-shortcode-hours">9:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-18" data-index="18">--}}
{{--                                    <td class="mptt-shortcode-hours">6:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-16 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Psychiatry" href="#" class="event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle">--}}
{{--                                    </td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-19" data-index="19">--}}
{{--                                    <td class="mptt-shortcode-hours">7:00 pm</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                        <div class="tab-pane" id="tab-3-7" role="tabpanel">--}}
{{--                            <table class="mptt-shortcode-table  mptt-theme-mode">--}}
{{--                                <thead>--}}
{{--                                <tr class="mptt-shortcode-row">--}}
{{--                                    <th></th>--}}
{{--                                    <th>Monday</th>--}}
{{--                                    <th>Tuesday</th>--}}
{{--                                    <th>Wednesday</th>--}}
{{--                                    <th>Saturday</th>--}}
{{--                                    <th>Sunday</th>--}}
{{--                                </tr>--}}
{{--                                </thead>--}}
{{--                                <tbody>--}}
{{--                                <tr class="mptt-shortcode-row-10" data-index="10">--}}
{{--                                    <td class="mptt-shortcode-hours">10:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event mptt-event-vertical-middle event" rowspan="2">--}}
{{--                                        <div class="mptt-event-container id-10 mptt-colorized">--}}
{{--                                            <div class="mptt-inner-event-content">--}}
{{--                                                <a title="Dental" href="#" class="event-title">Dental</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cavities</p>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                <tr class="mptt-shortcode-row-11" data-index="11">--}}
{{--                                    <td class="mptt-shortcode-hours">11:00 am</td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                    <td class="mptt-shortcode-event  mptt-event-vertical-middle"></td>--}}
{{--                                </tr>--}}
{{--                                </tbody>--}}
{{--                            </table>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--                <div class="pbmit-tab pbmit-tab-style-2 mptt-shortcode-list">--}}
{{--                    <div class="tab-content">--}}
{{--                        <div class="pbmit-select">--}}
{{--                            <ul class="nav nav-tabs" role="tablist">--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link active" data-bs-toggle="tab" href="#tab-4-1" aria-selected="true"--}}
{{--                                       role="tab">--}}
{{--                                        <span>All Events</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4-2" aria-selected="false"--}}
{{--                                       role="tab" tabindex="-1">--}}
{{--                                        <span>Ophthalmology</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4-3" aria-selected="false"--}}
{{--                                       role="tab" tabindex="-1">--}}
{{--                                        <span>Cardiologist</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4-4" aria-selected="false"--}}
{{--                                       role="tab" tabindex="-1">--}}
{{--                                        <span>Pulmonary</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4-5" aria-selected="false"--}}
{{--                                       role="tab" tabindex="-1">--}}
{{--                                        <span>Rhinology</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4-6" aria-selected="false"--}}
{{--                                       role="tab" tabindex="-1">--}}
{{--                                        <span>Psychiatry</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                                <li class="nav-item" role="presentation">--}}
{{--                                    <a class="nav-link" data-bs-toggle="tab" href="#tab-4-7" aria-selected="false"--}}
{{--                                       role="tab" tabindex="-1">--}}
{{--                                        <span>Dental</span>--}}
{{--                                    </a>--}}
{{--                                </li>--}}
{{--                            </ul>--}}
{{--                        </div>--}}
{{--                        <div class="tab-content">--}}
{{--                            <div class="tab-pane show active" id="tab-4-1" role="tabpanel">--}}
{{--                                <div class="mptt-shortcode-list">--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Monday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="ophthalmology">--}}
{{--                                                <a title="Ophthalmology" href="#"--}}
{{--                                                   class="mptt-event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="12:00" class="timeslot-start">12:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="22:00" class="timeslot-end">10:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="cardiologist">--}}
{{--                                                <a title="Cardiologist" href="#"--}}
{{--                                                   class="mptt-event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="pulmonary">--}}
{{--                                                <a title="Pulmonary" href="#" class="mptt-event-title"> Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Tuesday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="rhinology">--}}
{{--                                                <a title="Rhinology" href="#" class="mptt-event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Wednesday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="psychiatry">--}}
{{--                                                <a title="Psychiatry" href="#" class="mptt-event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="dental">--}}
{{--                                                <a title="Dental" href="#" class="mptt-event-title">Dental</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cavities</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="ophthalmology">--}}
{{--                                                <a title="Ophthalmology" href="#"--}}
{{--                                                   class="mptt-event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Saturday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="cardiologist">--}}
{{--                                                <a title="Cardiologist" href="#"--}}
{{--                                                   class="mptt-event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="pulmonary">--}}
{{--                                                <a title="Pulmonary" href="#" class="mptt-event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="rhinology">--}}
{{--                                                <a title="Rhinology" href="3" class="mptt-event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="psychiatry">--}}
{{--                                                <a title="Psychiatry" href="#" class="mptt-event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Sunday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="rhinology">--}}
{{--                                                <a title="Rhinology" href="#" class="mptt-event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </li>--}}
{{--                                            <li class="mptt-list-event" data-event-id="pulmonary">--}}
{{--                                                <a title="Pulmonary" href="#" class="mptt-event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-4-2" role="tabpanel">--}}
{{--                                <div class="mptt-shortcode-list">--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Monday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="ophthalmology">--}}
{{--                                                <a title="Ophthalmology" href="#"--}}
{{--                                                   class="mptt-event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="12:00" class="timeslot-start">12:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="22:00" class="timeslot-end">10:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Wednesday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="ophthalmology">--}}
{{--                                                <a title="Ophthalmology" href="#"--}}
{{--                                                   class="mptt-event-title">Ophthalmology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Laparoscopy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-4-3" role="tabpanel">--}}
{{--                                <div class="mptt-shortcode-list">--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Monday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="cardiologist">--}}
{{--                                                <a title="Cardiologist" href="#"--}}
{{--                                                   class="mptt-event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Saturday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="cardiologist">--}}
{{--                                                <a title="Cardiologist" href="#"--}}
{{--                                                   class="mptt-event-title">Cardiologist</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cardiology</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-4-4" role="tabpanel">--}}
{{--                                <div class="mptt-shortcode-list">--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Monday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="pulmonary">--}}
{{--                                                <a title="Pulmonary" href="#" class="mptt-event-title"> Pulmonary </a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Saturday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="pulmonary">--}}
{{--                                                <a title="Pulmonary" href="#" class="mptt-event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="14:00" class="timeslot-start">2:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="16:00" class="timeslot-end">4:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Sunday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="pulmonary">--}}
{{--                                                <a title="Pulmonary" href="#" class="mptt-event-title">Pulmonary</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Routine</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-4-5" role="tabpanel">--}}
{{--                                <div class="mptt-shortcode-list">--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Tuesday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="rhinology">--}}
{{--                                                <a title="Rhinology" href="#" class="mptt-event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Saturday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="rhinology">--}}
{{--                                                <a title="Rhinology" href="#" class="mptt-event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="16:00" class="timeslot-start">4:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="18:00" class="timeslot-end">6:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Sunday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="rhinology">--}}
{{--                                                <a title="Rhinology" href="#" class="mptt-event-title">Rhinology</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Biopsy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-4-6" role="tabpanel">--}}
{{--                                <div class="mptt-shortcode-list">--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Wednesday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="psychiatry">--}}
{{--                                                <a title="Psychiatry" href="#" class="mptt-event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="08:00" class="timeslot-start">8:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="10:00" class="timeslot-end">10:00 am</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Saturday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="psychiatry">--}}
{{--                                                <a title="Psychiatry" href="#" class="mptt-event-title">Psychiatry</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="18:00" class="timeslot-start">6:00 pm</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="20:00" class="timeslot-end">8:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Colposcopy</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="tab-pane" id="tab-4-7" role="tabpanel">--}}
{{--                                <div class="mptt-shortcode-list">--}}
{{--                                    <div class="mptt-column">--}}
{{--                                        <h3 class="mptt-column-title">Wednesday</h3>--}}
{{--                                        <ul class="mptt-events-list">--}}
{{--                                            <li class="mptt-list-event" data-event-id="dental">--}}
{{--                                                <a title="Dental" href="#" class="mptt-event-title">Dental</a>--}}
{{--                                                <p class="timeslot">--}}
{{--                                                    <time datetime="10:00" class="timeslot-start">10:00 am</time>--}}
{{--                                                    <span class="timeslot-delimiter"> - </span>--}}
{{--                                                    <time datetime="12:00" class="timeslot-end">12:00 pm</time>--}}
{{--                                                </p>--}}
{{--                                                <p class="event-subtitle">Cavities</p>--}}
{{--                                            </li>--}}
{{--                                        </ul>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- Timetable End -->

        <!-- Portfolio Start -->
        <section class="section-lgt portfolio_two">
            <div class="container-fluid p-0">
                <div class="swiper-slider portfolio-two_slider" data-autoplay="false" data-loop="true" data-dots="false"
                     data-arrows="false" data-columns="4" data-margin="30" data-effect="slide">
                    <div class="swiper-wrapper">
                        <!-- Slide1 -->
                        @foreach($bidangPsikolog as $data)
                            <div class="swiper-slide">
                                <article class="pbmit-portfolio-style-2">
                                    <div class="pbminfotech-post-content">
                                        <div class="pbmit-featured-img-wrapper">
                                            <div class="pbmit-featured-wrapper">
                                                <img src="{{ asset('store/bidang-psikolog/' . $data->image_cover) }}" class="img-fluid"
                                                     alt="">
                                            </div>
                                        </div>
                                        <div class="pbminfotech-box-content">
                                            <div class="pbminfotech-titlebox">
                                                <div class="pbmit-port-cat">
{{--                                                    <a href="portfolio-grid-col-3.html" rel="tag">{{$data->name}}</a>--}}
                                                </div>
                                                <h3 class="pbmit-portfolio-title">
                                                    <a href="single-detail-style-01.html">{{$data->name}}</a>
                                                </h3>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio End -->

        <!-- Testimonial Start -->
        <section class="section-xl">
            <div class="container">
                <div class="position-relative">
                    <div class="pbmit-heading-subheading animation-style2">
                        <h4 class="pbmit-subtitle">Testimonials</h4>
                        <h2 class="pbmit-title">Our happy client say</h2>
                    </div>
                    <div class="testimonial_arrow swiper-btn-custom d-flex flex-row-reverse"></div>
                </div>
                <div class="swiper-slider" data-arrows-class="testimonial_arrow" data-autoplay="true" data-loop="true"
                     data-dots="false" data-arrows="true" data-columns="3" data-margin="30" data-effect="slide">
                    <div class="swiper-wrapper">
                        <!-- Slide1 -->
                        @foreach($ulasan as $data)
                            <div class="swiper-slide">
                                <article class="pbmit-testimonial-style-1">
                                    <div class="pbminfotech-post-item">
                                        <div class="pbmit-box-content-wrap">
                                            <div class="pbminfotech-box-star-ratings">
                                                @for ($i = 1; $i <= 5; $i++)
                                                    @if ($data->rating >= $i)
                                                        <i class="pbmit-base-icon-star-1 pbmit-active"></i>
                                                    @else
                                                        <i class="pbmit-base-icon-star-1"></i>
                                                    @endif
                                                @endfor
                                            </div>
                                            <div class="pbminfotech-box-desc">
                                                <blockquote class="pbminfotech-testimonial-text">
                                                    <p>{{$data->isi}}</p>
                                                </blockquote>
                                            </div>
                                            <div class="pbminfotech-box-author d-flex align-items-center">
                                                <div class="pbminfotech-box-img">
                                                    <div class="pbmit-featured-img-wrapper">
                                                        <div class="pbmit-featured-wrapper">
                                                            <img
                                                                src="{{ asset('store/user/photo/mahasiswa/' . $data->mahasiswa->profile_photo_path) }}"
                                                                class="img-fluid" alt="">
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pbmit-auther-content">
                                                    <h3 class="pbminfotech-box-title">{{$data->mahasiswa->nama}}</h3>
                                                    <div
                                                        class="pbminfotech-testimonial-detail">{{$data->mahasiswa->asal_universitas}}</div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </article>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonial End -->

        <!-- Ihbox Style Start -->
{{--        <section>--}}
{{--            <div class="container">--}}
{{--                <div class="row g-0">--}}
{{--                    <div class="col-md-12 col-xl-6">--}}
{{--                        <div class="ihbox-style-4_bg pbmit-text-color-white">--}}
{{--                            <div class="pbmit-ihbox-style-4">--}}
{{--                                <div class="pbmit-ihbox-headingicon">--}}
{{--                                    <h4 class="pbmit-element-heading">--}}
{{--                                        Our Health Care--}}
{{--                                    </h4>--}}
{{--                                    <h2 class="pbmit-element-title">Ready to start learn?<br> Sign up now!</h2>--}}
{{--                                    <div class="pbmit-ihbox-btn">--}}
{{--                                        <a href="our-history.html">--}}
{{--                                            <span class="pbmit-button-text">sign up now</span>--}}
{{--                                            <span class="pbmit-button-icon-wrapper">--}}
{{--													<span class="pbmit-button-icon">--}}
{{--														<i class="pbmit-base-icon-black-arrow-1"></i>--}}
{{--													</span>--}}
{{--												</span>--}}
{{--                                        </a>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                    <div class="col-md-12 col-xl-6">--}}
{{--                        <div class="pbmit-ihbox-style-5_bg pbmit-bg-color-global">--}}
{{--                            <div class="pbmit-ihbox-style-5">--}}
{{--                                <div class="pbmit-ihbox-box d-flex align-items-center">--}}
{{--                                    <div class="pbmit-ihbox-icon">--}}
{{--                                        <div class="pbmit-ihbox-icon-wrapper">--}}
{{--                                            <div class="pbmit-icon-wrapper pbmit-icon-type-icon">--}}
{{--                                                <i class="pbmit-xcare-icon pbmit-xcare-icon-subscribe"></i>--}}
{{--                                            </div>--}}
{{--                                        </div>--}}
{{--                                    </div>--}}
{{--                                    <div class="pbmit-ihbox-contents">--}}
{{--                                        <h2 class="pbmit-element-title">Subscribe <br> to our newsletter</h2>--}}
{{--                                    </div>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <form>--}}
{{--                                <div class="pbmit-footer-newsletter">--}}
{{--                                    <input type="email" name="EMAIL" placeholder="Your email address" required="">--}}
{{--                                    <button class="pbmit-button">--}}
{{--                                        <span class="pbmit-button-text">Subscribe</span>--}}
{{--                                        <span class="pbmit-btn-content-wrapper">--}}
{{--												<span class="pbmit-button-icon">--}}
{{--													<i class="pbmit-base-icon-black-arrow-1"></i>--}}
{{--												</span>--}}
{{--											</span>--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </form>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </section>--}}
        <!-- Ihbox Style Start -->

        <!-- Blog Start -->
        <section class="section-xl">
            <div class="container">
                <div class="pbmit-heading-subheading text-center">
                    <h4 class="pbmit-subtitle">Latest Blog</h4>
                    <h2 class="pbmit-title">Latest posts & articles</h2>
                </div>
                <div class="row align-items-center">
                    <div class="col-md-12 col-xl-5">
                        <div class="blog-style-4_box">
                            <div class="row">
                                @foreach ($newArtikel as $data)
                                    <div class="col-md-12">
                                        <article class="pbmit-blog-style-4">
                                            <div class="post-item">
                                                <div class="pbminfotech-box-content">
                                                    <div class="pbminfotech-content-inner d-flex align-items-center">
                                                        <div class="pbmit-featured-img-wrapper">
                                                            <div class="pbmit-featured-wrapper">
                                                                <img
                                                                    src="{{ asset('store/artikel/thumbnail/' . $data->tumbnail) }}"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                        <div class="pbmit-meta-wraper">
                                                            <div class="pbmit-meta-date-wrapper pbmit-meta-line">
                                                                <div class="pbmit-meta-date">
																	<span class="pbmit-post-date">
																		<i class="pbmit-base-icon-calendar-3"></i>{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y') }}
																	</span>
                                                                </div>
                                                            </div>
                                                            <div class="pbmit-meta-author pbmit-meta-line">
																<span class="pbmit-post-author">
																	<i class="pbmit-base-icon-user-3"></i>
																	@if ($data->psikolog)
                                                                        {{ $data->psikolog->nama }}
                                                                    @elseif ($data->admin)
                                                                        {{ $data->admin->nama }}
                                                                    @endif
																</span>
                                                            </div>
                                                            <div class="pbmit-content-wrapper">
                                                                <h3 class="pbmit-post-title">
                                                                    <a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">{{ $data->name }}</a>
                                                                </h3>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <a class="pbmit-link"
                                                   href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}"></a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-xl-7">
                        <div class="swiper-slider blog-two_slider" data-autoplay="false" data-loop="true"
                             data-dots="false" data-arrows="false" data-columns="1" data-margin="30"
                             data-effect="slide">
                            <div class="swiper-wrapper">
                                @foreach ($newArtikelSlide as $data)
                                    <!-- Slide1 -->
                                    <div class="swiper-slide">
                                        <article class="pbmit-blog-style-3">
                                            <div class="post-item d-flex">
                                                <div class="pbmit-featured-container">
                                                    <div class="pbmit-bg-image"
                                                         style="background-image:url({{ asset('store/artikel/thumbnail/' . $data->tumbnail) }})">
                                                        <div class="pbmit-featured-img-wrapper">
                                                            <div class="pbmit-featured-wrapper">
                                                                <img
                                                                    src="{{ asset('store/artikel/thumbnail/' . $data->tumbnail) }}"
                                                                    class="img-fluid" alt="">
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="pbminfotech-box-wrap">
                                                    <div class="pbminfotech-box-content">
                                                        <div class="pbmit-date-admin-wraper d-flex align-items-center">
                                                            <div class="pbmit-meta-date pbmit-meta-line">
																<span class="pbmit-post-date">
																	<i class=" pbmit-base-icon-calendar-3"></i>
																	{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y') }}
																</span>
                                                            </div>
                                                            <div class="pbmit-meta-author pbmit-meta-line">
																<span class="pbmit-post-author">
																	<i class="pbmit-base-icon-user-3"></i>
																	@if ($data->psikolog)
                                                                        {{ $data->psikolog->nama }}
                                                                    @elseif ($data->admin)
                                                                        {{ $data->admin->nama }}
                                                                    @endif
																</span>
                                                            </div>
                                                        </div>
                                                        <h3 class="pbmit-post-title">
                                                            <a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">Best
                                                                &amp; caring Orthopedic surgeons in hospital</a>
                                                        </h3>
                                                        <div class="pbminfotech-box-desc">
                                                            {{ implode(' ', array_slice(str_word_count($data->content, 1), 0, 25)) }}
                                                            …
                                                        </div>
                                                    </div>
                                                    <a class="pbmit-blog-btn"
                                                       href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">
														<span class="pbmit-button-icon-wrapper">
															<span class="pbmit-button-icon">
																<i class="pbmit-base-icon-black-arrow-1"></i>
															</span>
														</span>
                                                    </a>
                                                </div>
                                                <a class="pbmit-link"
                                                   href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}"></a>
                                            </div>
                                        </article>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Blog End -->

    </div>
@endsection
