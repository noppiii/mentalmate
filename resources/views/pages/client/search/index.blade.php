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
								<h3 class="pbmit-tbar-subtitle"> Hasil Pencarian</h3>
								<h1 class="pbmit-tbar-title"> {{ request('search') }}</h1>
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
								<span>
									<a title="" href="#" class="home"><span>Pencarian</span></a>
								</span>
								<span class="sep">
									<i class="pbmit-base-icon-angle-double-right"></i>
								</span>
								<span><span class="post-root post post-post current-item"> {{ request('search') }}</span></span>
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
					<div class="row pbmit-element-posts-wrapper"><div class="pbmit-tbar">
							<div class="pbmit-tbar-inner container mb-4">
								<h3 class="pbmit-tbar-title"> Psikolog</h1>
							</div>
						</div>
						@if($psikologs->count() > 0)
                    	@foreach ($psikologs as $data)
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
									@if (Auth::guard('mahasiswa')->check())
										<div class="pbmit-team-btn">
										<form action="{{ route('client.psikolog.favorite', ['id' => $data->id]) }}" method="post">
											@csrf
											   <button type="submit" class="pbmit-team-text" style="border: none;">
            										<i class="{{ $data->isFavorite ? 'pbmit-base-icon-heart text-danger' : 'pbmit-base-icon-heart-empty text-secondary' }}"></i>
											   </button>
										</form>
									</div>
									@else
									<div class="pbmit-team-btn">
										<a href="{{ route('client.detailPsikolog', ['username' => Str::slug($data->nama)]) }}" class="pbmit-team-text">
    									    <i class="pbmit-base-icon-arrow-right"></i>
										</a>
									</div>
									@endif
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
                		@else
                		    <div class="text-center">
                		        <img src="{{ asset('image/data-not-found.png') }}" alt="No Data Image" class="img-fluid w-40" />
                		    </div>
                		@endif
					</div>
					<div class="row pbmit-element-posts-wrapper">
                    <div class="pbmit-tbar">
							<div class="pbmit-tbar-inner container mb-4">
								<h3 class="pbmit-tbar-title"> Berita</h1>
							</div>
						</div>
					@if($artikels->count() > 0)
                    @foreach ($artikels as $data)
					<article class="pbmit-blog-style-1 col-md-6 col-lg-3">
						<div class="post-item">
							<div class="pbminfotech-box-content">
								<div class="pbmit-featured-container">
									<div class="pbmit-featured-img-wrapper">
										<div class="pbmit-featured-wrapper">
											<img src="{{ asset('store/artikel/thumbnail/' . $data->tumbnail) }}" class="img-fluid" alt="">
										</div>
									</div>
									<a class="pbmit-blog-btn" href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">
										<span class="pbmit-button-icon-wrapper">
											<span class="pbmit-button-icon">
												<i class="pbmit-base-icon-black-arrow-1"></i>
											</span>
										</span>
									</a>
									<div class="pbmit-meta-cat-wrapper pbmit-meta-line">
										<div class="pbmit-meta-category">
											<a href="blog-classic.html" rel="category tag">Cardiologist</a>
										</div>
									</div>
									<a class="pbmit-link" href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}"></a>
								</div>
								<div class="pbmit-category-date-wraper d-flex align-items-center">
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
								</div>
								<div class="pbmit-content-wrapper">
									<h3 class="pbmit-post-title">
										<a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">
										    @php
										        $words = str_word_count($data->name, 1);
										        $displayedWords = array_slice($words, 0, 8);
										        $isTruncated = count($words) > 8;
										    @endphp
										    {{ implode(' ', $displayedWords) }}{{ $isTruncated ? '...' : '' }}
										</a>
									</h3>
								</div>
							</div>
						</div>
					</article>
					@endforeach
                	@else
                	    <div class="text-center">
                	        <img src="{{ asset('image/data-not-found.png') }}" alt="No Data Image" class="img-fluid w-40" />
                	    </div>
                	@endif
				</div>
				</div>
			</section>
			<!-- Team End --> 

        </div>
        <!-- Page Content End -->

@endsection