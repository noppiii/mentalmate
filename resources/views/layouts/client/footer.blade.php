	<div class="footer-top-section pbmit-bg-color-blackish">
			<div class="container">
				<div class="row align-items-center">
					<div class="col-md-8 pbmit-col_1">
{{--						<ul class="pbmit-icon-list-items pbmit-inline-items">--}}
{{--							<li class="pbmit-icon-list-item pbmit-inline-item">--}}
{{--								<a href="#">--}}
{{--									<span class="pbmit-icon-list-text">Our Mission</span>--}}
{{--								</a>--}}
{{--							</li>--}}
{{--							<li class="pbmit-icon-list-item pbmit-inline-item">--}}
{{--								<a href="#">--}}
{{--									<span class="pbmit-icon-list-text">Awards</span>--}}
{{--								</a>--}}
{{--							</li>--}}
{{--							<li class="pbmit-icon-list-item pbmit-inline-item">--}}
{{--								<a href="#">--}}
{{--									<span class="pbmit-icon-list-text">Experience</span>--}}
{{--								</a>--}}
{{--							</li>--}}
{{--							<li class="pbmit-icon-list-item pbmit-inline-item">--}}
{{--								<a href="#">--}}
{{--									<span class="pbmit-icon-list-text">Success Story</span>--}}
{{--								</a>--}}
{{--							</li>--}}
{{--						</ul>--}}
					</div>
					<div class="col-md-2 pbmit-col_2">
						<div class="pbmit-ihbox-style-13">
							<div class="pbmit-ihbox-box">
								<div class="pbmit-ihbox-icon">
									<div class="pbmit-ihbox-icon-wrapper">
										<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
											<i class="pbmit-xcare-icon pbmit-xcare-icon-phone-call"></i>
										</div>
									</div>
								</div>
								<div class="pbmit-ihbox-contents">
									<h2 class="pbmit-element-title">{{$siteIdentity->contact}}</h2>
								</div>
							</div>
						</div>
					</div>
					<div class="col-md-2 pbmit-col_3">
						<div class="pbmit-ihbox-style-13">
							<div class="pbmit-ihbox-box">
								<div class="pbmit-ihbox-icon">
									<div class="pbmit-ihbox-icon-wrapper">
										<div class="pbmit-icon-wrapper pbmit-icon-type-icon">
											<i class="pbmit-xcare-icon pbmit-xcare-icon-email"></i>
										</div>
									</div>
								</div>
								<div class="pbmit-ihbox-contents">
									<h2 class="pbmit-element-title">{{$siteIdentity->email}}</h2>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
        <footer class="site-footer">
			<div class="pbmit-footer-big-area-wrapper">
				<div class="footer-wrap pbmit-footer-big-area">
					<div class="container">
						<div class="row">
							<div class="col-md-12 col-xl-4"></div>
							<div class="col-md-12 col-xl-8 pbmit-footer-right">
                                <h3 class="pbmit-title">Satu Mimpi yang Kami Perjuangkan: <br> Menjaga Kesehatan Mental dan Fisik Anda!</h3>
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="pbmit-footer-widget-area">
				<div class="container">
					<div class="row">
						<div class="pbmit-footer-widget-col-1 col-md-6 col-lg-3">
							<aside class="widget widget_text">
								<div class="textwidget">
									<div class="pbmit-footer-logo">
										<img src="{{ asset('store/site-identity/' . $siteIdentity->logo) }}" alt="">
									</div>
                                    <div class="pbmit-footer-text">
                                        <p>Di dunia kesehatan, kami merasakan perlunya mengembangkan inovasi baru serta memperbarui sistem yang sudah ada untuk memberikan pelayanan yang lebih baik dan efisien.</p>
                                    </div>
                                    <ul class="pbmit-social-links">
										<li class="pbmit-social-li pbmit-social-facebook">
											<a title="Facebook" href="{{$siteIdentity->social_facebook}}" target="_blank" rel="noopener">
												<span><i class="pbmit-base-icon-facebook-f"></i></span>
											</a>
										</li>
										<li class="pbmit-social-li pbmit-social-twitter">
											<a title="Twitter" href="{{$siteIdentity->social_x}}" target="_blank" rel="noopener">
												<span><i class="pbmit-base-icon-twitter-2"></i></span>
											</a>
										</li>
										<li class="pbmit-social-li pbmit-social-linkedin">
											<a title="LinkedIn" href="{{$siteIdentity->social_linkedin}}" target="_blank" rel="noopener">
												<span><i class="pbmit-base-icon-linkedin-in"></i></span>
											</a>
										</li>
										<li class="pbmit-social-li pbmit-social-instagram">
											<a title="Instagram" href="{{$siteIdentity->social_instagram}}" target="_blank" rel="noopener">
												<span><i class="pbmit-base-icon-instagram"></i></span>
											</a>
										</li>
									</ul>
								</div>
							</aside>
						</div>
						<div class="pbmit-footer-widget-col-2 col-md-6 col-lg-3">
							<div class="widget">
								<h2 class="widget-title">Useful Link</h2>
								<div class="textwidget">
									<ul>
										<li><a href="{{route('client.artikel')}}">Artikel</a></li>
										<li><a href="{{route('client.psikolog')}}">Psikolog</a></li>
										<li><a href="{{ route('client.aboutus') }}">Contact</a></li>
									</ul>
								</div>
							</div>
						</div>
                        <div class="pbmit-footer-widget-col-3 col-md-6 col-lg-3">
                            <div class="widget">
                                <h2 class="widget-title">Artikel Baru</h2>
                                <div class="pbmit-timelist-wrapper">
                                    <ul class="pbmit-timelist-list">
                                        @foreach($latestArticles as $article)
                                            <li>
                        <a href="{{route('client.detailArtikel', ['slug' => $article->slug])}}" class="pbmit-timelist-li-title">
                            {{ Str::words($article->name, 3) }}....
                        </a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="pbmit-footer-widget-col-4 col-md-6 col-lg-3">
                            <aside class="widget">
                                <h2 class="widget-title">Psikolog Favorit</h2>
                                <div class="pbmit-contact-widget-line pbmit-contact-widget-address">
                                    <ul>
                                        @foreach($favoritePsychologists as $psikolog)
                                            <li>{{ $psikolog->nama }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            </aside>
                        </div>
                    </div>
				</div>
			</div>
			<div class="pbmit-footer-text-area">
				<div class="container">
					<div class="pbmit-footer-text-inner">
						<div class="row">
							<div class="col-md-6">
								<div class="pbmit-footer-copyright-text-area"> Copyright © 2024 <a href="#">{{$siteIdentity->name_website}}</a> </div>
							</div>
							<div class="col-md-6">
								<ul class="pbmit-footer-menu">
									<li class="menu-item">
										<a href="#">Terms and conditions</a>
									</li>
									<li class="menu-item">
										<a href="#">Privacy policy</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
        </footer>
