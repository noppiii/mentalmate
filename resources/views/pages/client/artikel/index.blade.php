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
								<h1 class="pbmit-tbar-title"> Artikel</h1>
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
								<span><span class="post-root post post-post current-item"> Artikel</span></span>
							</div>
						</div>
					</div>
				</div>   
		</div> 
	</div>
	<!-- Title Bar End-->

	<!--Page Content -->
	<div class="page-content">

		<!-- Blog Classic -->
		<section class="site_content blog_classic">
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-9 blog-right-col">
						<div class="row pbmit-element-posts-wrapper">
							 @if(count($paginateArtikel) > 0)
                            @foreach ($paginateArtikel as $data)   
							<article class="post blog-classic">   
								<div class="pbmit-featured-img-wrapper">
									<div class="pbmit-featured-wrapper">
										<a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">
											<img src="{{ asset('store/artikel/thumbnail/' . $data->tumbnail) }}" style="width: 100%; height: 500px; object-fit: cover;" alt="">
										</a>
									</div>
									<span class="pbmit-meta pbmit-meta-cat">
                                         @foreach($data->kategoriArtikels as $kategori)
										<a href="blog-classic.html" rel="category tag">{{ $kategori->nama }}</a>
                                        @endforeach
									</span>
								</div>  
								<div class="pbmit-blog-classic-inner">
									<div class="pbmit-blog-meta pbmit-blog-meta-top">	
										<span class="pbmit-meta pbmit-meta-date">
											<i class="pbmit-base-icon-calendar-3"></i>
											<a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}" rel="bookmark">
												<time class="entry-date published">{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y') }}</time>
											</a>
										</span>
										<span class="pbmit-meta pbmit-meta-author">
											<i class="pbmit-base-icon-user-3"></i>by
											<a class="pbmit-author-link" href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">
                                                @if ($data->psikolog)
                                                    {{ $data->psikolog->nama }}
                                                @elseif ($data->admin)
                                                    {{ $data->admin->nama }}
                                                @endif
                                            </a>
										</span>
										<span class="pbmit-meta pbmit-meta-comments pbmit-comment-bigger-than-zero">
											<i class="pbmit-base-icon-chat-3"></i>3 Comments
										</span>			
									</div>
									<h3 class="pbmit-post-title">
										<a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">{{ $data->name }}</a>
									</h3>
									<div class="pbmit-entry-content">
										<div class="pbmit-firstletter-blog">
											<p>{{ implode(' ', array_slice(str_word_count($data->content, 1), 0, 250)) }}…</p>
										</div>
										<a class="pbmit-btn" href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">
											<span class="pbmit-button-content-wrapper">
												<span class="pbmit-button-icon pbmit-align-icon-right">
													<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
														<title>black-arrow</title>
														<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
														<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
														<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
													</svg>
												</span>
												<span class="pbmit-button-text">Read More</span>
											</span>
										</a>
									</div>
								</div> 
							</article>
                            @endforeach
							 @else
                    		 <div class="text-center">
                    		     <img src="{{ asset('image/data-not-found.png') }}" alt="No Data Image" class="img-fluid w-40" />
                    		 </div>
                			 @endif
							<nav aria-label="Page navigation">
            				    <ul class="pagination justify-content-center">
                			    <!-- Tombol Previous -->
                			    @if ($paginateArtikel->onFirstPage())
                			        <li class="page-item disabled pbmit-social-li">
                			            <span class="page-link" aria-hidden="true">&laquo;</span>
                			        </li>
                			    @else
                			        <li class="page-item pbmit-social-li">
                			            <a class="page-link" href="{{ $paginateArtikel->previousPageUrl() }}" aria-label="Previous">
                			                <span aria-hidden="true">&laquo;</span>
                			            </a>
                			        </li>
                			    @endif
								
                			    <!-- Tombol Halaman -->
                			    @php
                			        $start = max($paginateArtikel->currentPage() - 2, 1);
                			        $end = min($start + 4, $paginateArtikel->lastPage());
								
                			        if ($end - $start < 4) {
                			            $start = max($end - 4, 1);
                			        }
                			    @endphp

                			    @for ($i = $start; $i <= $end; $i++)
                			        <li class="page-item {{ $i == $paginateArtikel->currentPage() ? 'active' : '' }}">
                			            <a class="page-link" href="{{ $paginateArtikel->url($i) }}">{{ $i }}</a>
                			        </li>
                			    @endfor
								
                			    <!-- Tombol Next -->
                			    @if ($paginateArtikel->hasMorePages())
                			        <li class="page-item">
                			            <a class="page-link" href="{{ $paginateArtikel->nextPageUrl() }}" aria-label="Next">
                			                <span aria-hidden="true">&raquo;</span>
                			            </a>
                			        </li>
                			    @else
                			        <li class="page-item disabled">
                			            <span class="page-link" aria-hidden="true">&raquo;</span>
                			        </li>
                			    @endif
            				    </ul>
            				</nav>
						</div>
					</div>
					<div class="col-md-12 col-lg-3 blog-left-col">
						<aside class="sidebar">
							<aside class="widget widget-search">
								<h2 class="widget-title">Search</h2>
								<form class="search-form" action="{{ route('client.artikel') }}" method="GET">
									<input type="search"  name="cariArtikel" value="{{ request('cariArtikel') }}" class="search-field" placeholder="Search …" value="">
									<button type="submit" class="search-submit"></button>
								</form>
							</aside>
							<aside class="widget widget-categories">
								<h2 class="widget-title">Categories</h2>
								<ul>
                                    @foreach ($allCategories as $data)
									    @php
									        $urlParams = [
									            'category' => $data->nama,
									        ];
									        $url = route('client.artikel', $urlParams);
									        $isActive = ($selectedCategoryArtikel == $data->nama);
									    @endphp
									    <li>
									        <span class="pbmit-cat-li">
									            <a href="{{ $url }}" class="{{ $isActive ? 'active' : '' }}">{{ $data->nama }}</a>
									            <span class="pbmit-brackets">( {{ $data->artikels_count }} )</span>
									        </span>
									    </li>
									@endforeach
								</ul>
							</aside>
							<aside class="widget widget-recent-post">
								<h2 class="widget-title">Recent Post </h2>
									<ul class="recent-post-list">
                                        @foreach ($recentArtikel as $data)
										<li class="recent-post-list-li"> 
											<a class="recent-post-thum" href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">
												<img src="{{ asset('store/artikel/thumbnail/' . $data->tumbnail) }}" class="img-fluid" alt="">
											</a>
											<div class="pbmit-rpw-content">
												<span class="pbmit-rpw-date">
													<a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">{{ \Carbon\Carbon::parse($data->updated_at)->translatedFormat('d F Y') }}</a>
												</span>
												<span class="pbmit-rpw-title">
													<a href="{{ route('client.detailArtikel', ['slug' => $data->slug]) }}">{{ $data->name }}</a>
												</span>
											</div> 
										</li>
                                        @endforeach
									</ul>
							</aside> 
							{{-- <aside class="widget pbmit-service-ad">
								<div class="textwidget">
									<div class="pbmit-service-ads">
										<h5 class="pbmit-ads-subheding">Our Newsletter</h5>
										<h4 class="pbmit-ads-subtitle">Ready to start learn ?</h4>
										<h3 class="pbmit-ads-title">Sign up now!</h3>
										<div class="pbmit-ads-desc">
											<i class="pbmit-base-icon-phone-call-1"></i>+(123) 1234-567-8901
										</div>
										<a class="pbmit-btn" href="#">
											<span class="pbmit-button-content-wrapper">
												<span class="pbmit-button-icon pbmit-align-icon-right">
													<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
														<title>black-arrow</title>
														<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
														<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
														<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
													</svg>
												</span>
												<span class="pbmit-button-text">Register now</span>
											</span>
										</a>
									</div>
								</div>
							</aside> --}}
							<aside class="widget widget-tag-cloud">
								<h3 class="widget-title">Tag Cloud</h3>
								<div class="tagcloud">
                                    @foreach ($allTags as $data)
									@php
									    $urlParams = [
									        'tag' => $data->nama,
									    ];
									    $url = route('client.artikel', $urlParams);
									    $isActive = ($selectedTagArtikel == $data->nama);
									@endphp
									<a href="{{ $url }}" class="tag-cloud-link">{{ $data->nama }}</a>
                                    @endforeach
								</div>
							</aside> 
						</aside>
					</div>
				</div>
			</div>
		</section>
		<!-- Blog Classic End -->
		
	</div>
	<!-- Page Content End -->

@endsection