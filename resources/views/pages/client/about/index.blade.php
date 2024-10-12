@extends('layouts.client.main')
@section('title')
    About | {{ config('app.name') }}
@endsection
@section('pages')
    About
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
									<a title="" href="#" class="home"><span>{{$siteIdentity->name_website}}</span></a>
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

   <!-- Page Content -->
        <div class="page-content faq_section">

            <!-- Faq Start -->
            <section class="section-xl">
				<div class="container">
					<div class="row g-0">
						<div class="col-md-6">
                            <div class="faq-left_box">
                                <div class="pbmit-heading-subheading">
                                    <h4 class="pbmit-subtitle">Pertanyaan yang Sering Ditanyakan</h4>
                                    <h2 class="pbmit-title">Pertanyaan Umum</h2>
                                </div>
                                <div class="accordion" id="accordionExample">
                                    <div class="accordion-item active">
                                        <h2 class="accordion-header" id="headingOne">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                                <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">01.</span>
                        Bagaimana cara memastikan kualitas layanan psikolog MentalMate?
                    </span>
                                            </button>
                                        </h2>
                                        <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Kami memastikan kualitas layanan psikolog dengan seleksi ketat terhadap psikolog yang bergabung dalam platform MentalMate. Setiap psikolog telah melalui sertifikasi resmi dan pengalaman di bidang mereka.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingTwo">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                                <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">02.</span>
                        Bagaimana cara memilih psikolog yang sesuai?
                    </span>
                                            </button>
                                        </h2>
                                        <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Anda bisa memilih psikolog berdasarkan profil mereka yang mencakup bidang keahlian, pengalaman, dan ulasan dari klien sebelumnya. Platform MentalMate memberikan rekomendasi sesuai dengan kebutuhan Anda.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="headingThree">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                                <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">03.</span>
                        Apakah layanan konseling online MentalMate aman?
                    </span>
                                            </button>
                                        </h2>
                                        <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                            <div class="accordion-body">
                                                Ya, semua sesi konseling online di MentalMate dilakukan melalui platform yang terenkripsi, memastikan privasi dan kerahasiaan data pengguna.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-md-6">
                            <div class="faq-right_box">
                                <div class="pbmit-heading-subheading">
                                    <h4 class="pbmit-subtitle">PENGGUNA BERTANYA</h4>
                                    <h2 class="pbmit-title">Pertanyaan Lainnya</h2>
                                </div>
                                <div class="accordion" id="accordionExample1">
                                    <div class="accordion-item active">
                                        <h2 class="accordion-header" id="heading1">
                                            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse1" aria-expanded="false" aria-controls="collapse1">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                                <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">01.</span>
                        Apakah Mentalmate menyediakan dukungan pengguna?
                    </span>
                                            </button>
                                        </h2>
                                        <div id="collapse1" class="accordion-collapse collapse show"
                                             aria-labelledby="heading1" data-bs-parent="#accordionExample1">
                                            <div class="accordion-body">
                                                Ya, Mentalmate menyediakan dukungan pengguna melalui berbagai kanal seperti email, live chat, dan konsultasi langsung dengan psikolog yang terdaftar di platform kami.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading2">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse2" aria-expanded="false" aria-controls="collapse2">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                                <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">02.</span>
                        Bagaimana proses seleksi psikolog di Mentalmate?
                    </span>
                                            </button>
                                        </h2>
                                        <div id="collapse2" class="accordion-collapse collapse" aria-labelledby="heading2"
                                             data-bs-parent="#accordionExample1">
                                            <div class="accordion-body">
                                                Proses seleksi psikolog di Mentalmate dilakukan dengan ketat, mencakup verifikasi lisensi praktik, pengalaman, dan kompetensi psikolog sebelum mereka dapat bergabung di platform kami.
                                            </div>
                                        </div>
                                    </div>
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="heading3">
                                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                                    data-bs-target="#collapse3" aria-expanded="false" aria-controls="collapse3">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                                <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">03.</span>
                        Seberapa cepat saya dapat terhubung dengan psikolog?
                    </span>
                                            </button>
                                        </h2>
                                        <div id="collapse3" class="accordion-collapse collapse" aria-labelledby="heading3"
                                             data-bs-parent="#accordionExample1">
                                            <div class="accordion-body">
                                                Setelah Anda mendaftar dan memilih paket layanan, Anda dapat segera menjadwalkan sesi konsultasi dengan psikolog yang tersedia dalam waktu 24 jam melalui aplikasi Mentalmate.
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
					</div>
				</div>
			</section>
            <!-- Faq End -->

			<!-- Faq Start -->
			<section class="section-lgb">
                <div class="container">
                    <div class="pbmit-heading-subheading">
                        <h4 class="pbmit-subtitle">HUBUNGI KAMI SEKARANG</h4>
                        <h2 class="pbmit-title">Kami Siap Menjawab Semua Pertanyaan Anda</h2>
                    </div>
                    <div class="accordion" id="accordionExample2">
                        <div class="accordion-item active">
                            <h2 class="accordion-header" id="heading01">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse01" aria-expanded="false" aria-controls="collapse01">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                    <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">01.</span>
                        Apakah MentalMate menyediakan layanan dukungan produk setelah pengembangan aplikasi selesai?
                    </span>
                                </button>
                            </h2>
                            <div id="collapse01" class="accordion-collapse collapse show" aria-labelledby="heading01" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    Ya, kami menyediakan dukungan berkelanjutan setelah aplikasi diluncurkan, termasuk pembaruan fitur, perbaikan bug, dan peningkatan performa.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading02">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse02" aria-expanded="false" aria-controls="collapse02">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                    <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">02.</span>
                        Saya belum yakin jenis layanan pengembangan aplikasi apa yang saya butuhkan. Apa yang harus saya lakukan?
                    </span>
                                </button>
                            </h2>
                            <div id="collapse02" class="accordion-collapse collapse" aria-labelledby="heading02" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    Tim kami siap membantu Anda memahami kebutuhan spesifik Anda dan memberikan saran yang tepat terkait jenis aplikasi dan fitur yang paling sesuai.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading03">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse03" aria-expanded="false" aria-controls="collapse03">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                    <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">03.</span>
                        Apakah MentalMate menyediakan proyek percontohan sebagai bagian dari layanan pengembangan?
                    </span>
                                </button>
                            </h2>
                            <div id="collapse03" class="accordion-collapse collapse" aria-labelledby="heading03" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    Ya, kami menyediakan proyek percontohan agar Anda dapat melihat hasil kerja sebelum melanjutkan ke pengembangan penuh.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading04">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse04" aria-expanded="false" aria-controls="collapse04">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                    <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">04.</span>
                        Apa keunggulan menggunakan tim MentalMate untuk outsourcing pengembangan proyek Anda?
                    </span>
                                </button>
                            </h2>
                            <div id="collapse04" class="accordion-collapse collapse" aria-labelledby="heading04" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    Keuntungan outsourcing ke MentalMate termasuk efisiensi biaya, akses ke tim ahli, serta pengembangan yang cepat dan berkualitas.
                                </div>
                            </div>
                        </div>
                        <div class="accordion-item">
                            <h2 class="accordion-header" id="heading05">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                                        data-bs-target="#collapse05" aria-expanded="false" aria-controls="collapse05">
                    <span class="pbmit-accordion-icon pbmit-accordion-icon-right">
                        <span class="pbmit-accordion-icon-closed">
                            <i class="fa fa-angle-up"></i>
                        </span>
                        <span class="pbmit-accordion-icon-opened">
                            <i class="fa fa-angle-down"></i>
                        </span>
                    </span>
                                    <span class="pbmit-accordion-title">
                        <span class="pbmit-global-color">05.</span>
                        Berapa anggaran yang umumnya dibutuhkan? Bagaimana MentalMate memperkirakan biaya proyek perangkat lunak?
                    </span>
                                </button>
                            </h2>
                            <div id="collapse05" class="accordion-collapse collapse" aria-labelledby="heading05" data-bs-parent="#accordionExample2">
                                <div class="accordion-body">
                                    Kami menentukan biaya berdasarkan kompleksitas fitur, skala proyek, dan waktu pengembangan yang dibutuhkan. Estimasi akan diberikan setelah konsultasi awal.
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </section>
			<!-- Faq End -->
	<!-- Contact Form -->
			<section>
				<div class="container mb-5">
					<div class="row g-0">
						<div class="col-md-12 col-xl-6">
							<div class="contact-us-left_img" style="background-image: url({{ asset('client/images/titlebar-bg-img.jpg') }})"></div>
						</div>
						<div class="col-md-12 col-xl-6">
							<div class="contact-form-one_right pbmit-bg-color-white">
								<div class="pbmit-heading-subheading">
									<h2 class="pbmit-subtitle">Berikan Rating Anda</h2>
									<h4 class="pbmit-title">Bagikan pengalaman Anda</h4>
								</div>
								<!-- Rating form -->
									<form class="contact-form" method="POST" action="{{ route('client.submitRating') }}">
									    @csrf
									    <div class="row">
									        <div class="col-md-12">
									            <div class="pbminfotech-box-star-ratings fs-2">
									                <i class="pbmit-base-icon-star-1" data-rating="1"></i>
									                <i class="pbmit-base-icon-star-1" data-rating="2"></i>
									                <i class="pbmit-base-icon-star-1" data-rating="3"></i>
									                <i class="pbmit-base-icon-star-1" data-rating="4"></i>
									                <i class="pbmit-base-icon-star-1" data-rating="5"></i>
									            </div>
									            <!-- Hidden input to store the selected rating -->
									            <input type="hidden" name="rating" id="rating-value" value="">
									        </div>
									        <div class="col-md-12">
									            <textarea name="isi" cols="40" rows="10" class="form-control" placeholder="Message"></textarea>
									        </div>
									        <div class="col-md-12">
									            <button class="pbmit-btn" type="submit">
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
			</section>
			<!-- Contact Form End -->
        </div>

<script>
    document.querySelectorAll('.pbminfotech-box-star-ratings i').forEach((star) => {
        star.addEventListener('click', function() {
            let rating = this.getAttribute('data-rating');

            document.querySelectorAll('.pbminfotech-box-star-ratings i').forEach((s) => {
                s.classList.remove('active');
            });

            for (let i = 0; i < rating; i++) {
                document.querySelectorAll('.pbminfotech-box-star-ratings i')[i].classList.add('active');
            }

            document.getElementById('rating-value').value = rating;

            console.log('Selected rating:', rating);
        });
    });
</script>

<style>
.pbmit-base-icon-star-1 {
    cursor: pointer;
    color: #ccc;
}

.pbmit-base-icon-star-1.active {
    color: gold;
}


</style>
@endsection
