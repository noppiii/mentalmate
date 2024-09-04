@extends('layouts.client.main')
@section('title')
    Konsultasi | {{ config('app.name') }}
@endsection
@section('pages')
    Konsultasi
@endsection
@section('content')

    <!-- Page Content -->
    <div class="page-content">

        <!-- Make An Appointment Start -->
        <section class="section-xl">
            <div class="container">
                <div class="pbmit-heading-subheading text-center">
                    <h4 class="pbmit-subtitle">With Access To</h4>
                    <h2 class="pbmit-title">24 Hour Emergency</h2>
                    <div class="pbmit-heading-desc">
                        Our clinic is equipped with modern facilities and advanced medical technology to ensure accurate
                        diagnoses <br> and effective treatments. This enables us to provide you with the highest
                        standard of care.
                    </div>
                </div>
                <div class="appointment_box">
                    <h4 class="text-center mb-3">Make An Appointment</h4>
                    @if (Auth::guard('mahasiswa')->check())
                        <form id="konsultasiForm" action="{{ route('client.postKonsultasi') }}" method="post">
                            @csrf
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" value="{{ Auth::guard('mahasiswa')->user()->nama }}"
                                           class="form-control" placeholder="Your Name *" name="nama" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" value="{{ Auth::guard('mahasiswa')->user()->email }}"
                                           class="form-control" placeholder="Your Email *" name="email" required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Your Phone *"
                                           name="nomor_telepon" required>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control wpcf7-form-control wpcf7-date wpcf7-validates-as-date"
                                           aria-invalid="false" value="2024-02-23T10:00" type="datetime-local"
                                           name="tanggal">
                                </div>
                                <div class="col-md-6">
                                    <select id="bidangSelect" class="form-select form-control"
                                            aria-label="Default select example">
                                        <option value="">Pilih Bidang</option>
                                        @foreach($bidangPsikolog as $bidang)
                                            <option value="{{ $bidang->id }}">{{ $bidang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select id="psikologSelect" class="form-select form-control" name="psikolog_id"
                                            aria-label="Default select example">
                                        <option value="">Pilih Psikolog</option>
                                    </select>
                                </div>
{{--                                <div class="col-md-6">--}}
{{--                                    <select id="metodePembayaran" class="form-select form-control"--}}
{{--                                            name="metode_pembayaran" aria-label="Default select example">--}}
{{--                                        <option value="">Metode Pembayaran</option>--}}
{{--                                        <option value="gopay">Gopay</option>--}}
{{--                                        <option value="dana">Dana</option>--}}
{{--                                        <option value="shopeepay">ShopeePay</option>--}}
{{--                                    </select>--}}
{{--                                </div>--}}
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="biayaKonsultasiInput"
                                           placeholder="Biaya Konsultasi" readonly>
                                    <input type="hidden" name="harga_konsultasi" id="biayaKonsultasiHidden">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="deskripsi" cols="40" rows="10" class="form-control"
                                              placeholder="Type Appointment Note...." required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button type="submit" class="pbmit-btn" id="pay-button">
                                        <span class="pbmit-button-text">Submit Now</span>
                                        <span class="pbmit-button-icon-wrapper">
                    <span class="pbmit-button-icon">
                        <i class="pbmit-base-icon-black-arrow-1"></i>
                    </span>
                </span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @else
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <input type="text" class="form-control" placeholder="Your Name *" name="name"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <input type="email" class="form-control" placeholder="Your Email *" name="email"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <input type="tel" class="form-control" placeholder="Your Phone *" name="phone"
                                           required>
                                </div>
                                <div class="col-md-6">
                                    <input class="form-control wpcf7-form-control wpcf7-date wpcf7-validates-as-date"
                                           aria-invalid="false" value="2024-02-23" type="date" name="date-123">
                                </div>
                                <div class="col-md-6">
                                    <select id="bidangSelect" class="form-select form-control"
                                            aria-label="Default select example">
                                        <option value="">Pilih Bidang</option>
                                        @foreach($bidangPsikolog as $bidang)
                                            <option value="{{ $bidang->id }}">{{ $bidang->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <select id="psikologSelect" class="form-select form-control"
                                            aria-label="Default select example">
                                        <option value="">Pilih Psikolog</option>
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    <input type="text" class="form-control" id="biayaKonsultasiInput"
                                           placeholder="Biaya Konsultasi" readonly>
                                    <input type="hidden" name="biaya_konsultasi" id="biayaKonsultasiHidden">
                                </div>
                                <div class="col-md-12">
                                    <textarea name="message" cols="40" rows="10" class="form-control"
                                              placeholder="Type Appointment Note...." required></textarea>
                                </div>
                                <div class="col-md-12">
                                    <button class="pbmit-btn">
                                        <span class="pbmit-button-text">Submit Now</span>
                                        <span class="pbmit-button-icon-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-base-icon-black-arrow-1"></i>
											</span>
										</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    @endif
                </div>
            </div>
        </section>
        <!-- Make An Appointment End -->

        <!-- Client Start -->
        <section class="section-lgb">
            <div class="container-fluid p-0">
                <div class="swiper-slider" data-autoplay="true" data-loop="true" data-dots="false" data-arrows="false"
                     data-columns="6" data-margin="30" data-effect="slide">
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
                                                <img src="images/homepage-1/client/client-dark-01.png" class="img-fluid"
                                                     alt="">
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
                                                <img src="images/homepage-1/client/client-dark-02.png" class="img-fluid"
                                                     alt="">
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
                                                <img src="images/homepage-1/client/client-dark-03.png" class="img-fluid"
                                                     alt="">
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
                                                <img src="images/homepage-1/client/client-dark-04.png" class="img-fluid"
                                                     alt="">
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
                                                <img src="images/homepage-1/client/client-dark-05.png" class="img-fluid"
                                                     alt="">
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
                                                <img src="images/homepage-1/client/client-dark-06.png" class="img-fluid"
                                                     alt="">
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

    </div>
    <!-- Page Content End -->


    <script>
        function formatRupiah(angka) {
            let numberString = angka.toString(),
                split = numberString.split('.'),
                sisa = split[0].length % 3,
                rupiah = split[0].substr(0, sisa),
                ribuan = split[0].substr(sisa).match(/\d{3}/gi);

            if (ribuan) {
                let separator = sisa ? '.' : '';
                rupiah += separator + ribuan.join('.');
            }

            rupiah = split[1] !== undefined ? rupiah + ',' + split[1] : rupiah + ',00';
            return 'Rp. ' + rupiah;
        }

        document.getElementById('bidangSelect').addEventListener('change', function () {
            let bidangId = this.value;
            let psikologSelect = document.getElementById('psikologSelect');
            psikologSelect.innerHTML = '<option value="">Pilih Psikolog</option>';
            document.getElementById('biayaKonsultasiInput').value = '';

            if (bidangId) {
                fetch(`/get-psikolog/${bidangId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(psikolog => {
                            let option = document.createElement('option');
                            option.value = psikolog.id;
                            option.textContent = psikolog.nama;
                            psikologSelect.appendChild(option);
                        });
                    })
                    .catch(error => console.error('Error:', error));
            }
        });

        document.getElementById('psikologSelect').addEventListener('change', function () {
            let psikologId = this.value;

            if (psikologId) {
                fetch(`/get-psikolog-detail/${psikologId}`)
                    .then(response => response.json())
                    .then(data => {
                        let formattedPrice = formatRupiah(data.harga_konsultasi);
                        document.getElementById('biayaKonsultasiInput').value = formattedPrice;
                        // Simpan nilai asli di input hidden untuk dikirim ke server
                        document.getElementById('biayaKonsultasiHidden').value = data.harga_konsultasi;
                    })
                    .catch(error => console.error('Error:', error));
            } else {
                document.getElementById('biayaKonsultasiInput').value = '';
                document.getElementById('biayaKonsultasiHidden').value = '';
            }
        });
    </script>

@endsection
