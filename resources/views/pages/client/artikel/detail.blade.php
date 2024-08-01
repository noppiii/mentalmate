@extends('layouts.client.main')
@section('title')
    Home | Mentalmate
@endsection
@section('pages')
    Home
@endsection
@section('content')
<!-- Title Bar -->
	<div class="pbmit-title-bar-wrapper" style="background-image: url({{ asset('store/artikel/thumbnail/' . $detailArtikel->tumbnail) }})">
		<div class="container">
			<div class="pbmit-title-bar-content">
				<div class="pbmit-title-bar-content-inner">
					<div class="pbmit-tbar">
						<div class="pbmit-tbar-inner container">
							<h1 class="pbmit-tbar-title"> {{ $detailArtikel->name }}</h1>
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
							<span><span class="post-root post post-post current-item">Artikel</span></span>
							<span class="sep">
								<i class="pbmit-base-icon-angle-double-right"></i>
							</span>
							<span><span class="post-root post post-post current-item"> {{ $detailArtikel->name }}</span></span>
						</div>
					</div>
				</div>
			</div> 
		</div> 
	</div>
    <!-- Title Bar End-->

	<!-- Page Content -->
	<div class="page-content"> 

		<!-- Blog Single Details -->
		<section class="site_content blog-details">
			<div class="container">
				<div class="row">
					<div class="col-lg-9 blog-right-col">
						<div class="row">
							<div class="col-md-12">
								<article>
									<div class="post blog-classic">    
										<div class="pbmit-featured-img-wrapper">
											<div class="pbmit-featured-wrapper">
												<img src="images/blog/blog-02b.jpg" class="img-fluid" alt="">
											</div>
											@foreach ($detailArtikel->kategoriArtikels as $data)
											<span class="pbmit-meta pbmit-meta-cat">
												<a href="blog-classic.html" rel="category tag">{{ $data->nama }}</a>
											</span>
											@endforeach
										</div> 
										<div class="pbmit-blog-classic-inner">
											<div class="pbmit-blog-meta pbmit-blog-meta-top">	
												<span class="pbmit-meta pbmit-meta-date">
													<i class="pbmit-base-icon-calendar-3"></i>
													<a href="blog-details.html" rel="bookmark">
														<time class="entry-date published">{{ $detailArtikel->updated_at }}</time>
													</a>
												</span>
												<span class="pbmit-meta pbmit-meta-author">
													<i class="pbmit-base-icon-user-3"></i>by
													<a class="pbmit-author-link" href="blog-details.html">
														@if ($detailArtikel->psikolog)
                                                    		{{ $detailArtikel->psikolog->nama }}
                                                		@elseif ($detailArtikel->admin)
                                                		    {{ $detailArtikel->admin->nama }}
                                                		@endif
													</a>
												</span>
												<span class="pbmit-meta pbmit-meta-comments pbmit-comment-bigger-than-zero">
													<i class="pbmit-base-icon-chat-3"></i>3 Comments
												</span>			
											</div>
											<div class="pbmit-entry-content">
												<p class="pbmit-firstletter">
													{!! $detailArtikel->content !!}
												</p>
											</div>
											<div class="pbmit-blog-meta-bottom">
												<div class="pbmit-blog-meta-bottom-left">
													<span class="pbmit-meta-tags">
														@foreach ($detailArtikel->tagArtikels as $data)
														<a href="blog-classic.html" rel="tag">{{ $data->nama }}</a>
														@endforeach
													</span>
												</div>
											</div>
										</div>   
									</div> 
									<nav class="navigation post-navigation" aria-label="Posts">
										<div class="nav-links">
											<div class="nav-previous">
												@if ($previousArtikel)
													<a href="{{ route('client.detailArtikel', ['slug' => $previousArtikel->slug]) }}" rel="prev">
													<span class="pbmit-post-nav-icon">
														<i class="pbmit-base-icon-left-arrow-1"></i>
														<span class="pbmit-post-nav-head">Previous Post</span>
													</span>
													<span class="pbmit-post-nav-wrapper">
														<span class="pbmit-post-nav nav-title">{{ $previousArtikel->nama }}</span> 
													</span>
												</a>
												@endif
											</div>
											<div class="nav-next">
												@if ($nextArtikel)
													<a href="{{ route('client.detailArtikel', ['slug' => $nextArtikel->slug]) }}" rel="next">
													<span class="pbmit-post-nav-icon">
														<span class="pbmit-post-nav-head">Next Post</span>
														<i class="pbmit-base-icon-next"></i>
													</span>
													<span class="pbmit-post-nav-wrapper">
														<span class="pbmit-post-nav nav-title">{{ $nextArtikel->nama }}</span> 
													</span>
												</a>
												@endif
											</div>
										</div>
									</nav>
								</article>
								<div class="comments-area">
									<h2 class="comments-title">3 Replies to “{{ $detailArtikel->name }}”	</h2>
									<ul class="comment-list">
										<li class="comment depth-1">
											<div class="pbmit-comment">
												<div class="pbmit-comment-avatar">
													<img src="images/avtar/img-01.jpeg" class="img-fluid" alt="">
												</div>
												<div class="pbmit-comment-content">
													<div class="pbmit-comment-meta">
														<span class="pbmit-comment-author">by
															<span class="pbmit-comment-author-inner">Leona Spencer</span>
														</span>
														<span class="pbmit-comment-date">
															<a href="#">16 mins ago	</a>
														</span>
													</div>
													<p>Vivamus gravida felis et nibh tristique viverra. Sed vel tortor id ex accumsan lacinia. Interdum et malesuada fames ac ante ipsum primis in faucibus.</p>
													<div class="reply">
														<a href="#">Reply</a>
													</div>
												</div>
											</div>
											<ul class="children">
												<li>
													<div class="pbmit-comment">
														<div class="pbmit-comment-avatar">
															<img src="images/avtar/img-02.jpeg" alt="">
														</div>
														<div class="pbmit-comment-content">
															<div class="pbmit-comment-meta">
																<span class="pbmit-comment-author">by
																	<span class="pbmit-comment-author-inner">John Doe</span>
																</span>
																<span class="pbmit-comment-date">
																	<a href="#">15 mins ago</a>
																</span>
															</div>
															<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Laudantium eius, sunt porro corporis maiores ea, voluptatibus omnis maxime.</p>
															<div class="reply">
																<a href="#">Reply</a>
															</div>
														</div>
													</div>
												</li>
											</ul>
										</li>
										<li>
											<div class="pbmit-comment">
												<div class="pbmit-comment">
													<div class="pbmit-comment-avatar">
														<img src="images/avtar/img-01.jpeg" alt="">
													</div>
													<div class="pbmit-comment-content">
														<div class="pbmit-comment-meta">
															<span class="pbmit-comment-author">by
																<span class="pbmit-comment-author-inner">Leona Spencer</span>
															</span>
															<span class="pbmit-comment-date">
																<a href="#">15 mins ago</a>
															</span>
														</div>
														<p>Sed maximus imperdiet ipsum, id scelerisque nisi tincidunt vitae. In lobortis neque nec dolor vehicula, eget vulputate ligula lobortis.</p>
														<div class="reply">
															<a href="#">Reply</a>
														</div>
													</div>
												</div>
											</div>
										</li>
									</ul>
									<div class="comment-respond">
										<h3 class="comment-reply-title">Leave a Reply </h3>
										<div class="comment-form">
											<p class="comment-notes">Your email address will not be published. Required fields are marked *</p>
											<form>
												<div class="row">
													<div class="col-sm-12">
														<textarea class="form-control" id="exampleFormControlTextarea1" placeholder="Enter your comment here..." rows="3"></textarea>
													</div>
													<div class="col-sm-12"> 
														<button type="submit" class="pbmit-btn">Post Comment</button>
													</div>
												</div>
											</form>
										</div>
									</div>
								</div>
							</div> 
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
		<!-- Blog Single Details End -->
		
	</div>
	<!-- Page Content End -->
@endsection