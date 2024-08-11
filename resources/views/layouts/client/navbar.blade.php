@php
    $user = null;
    $dashboardRoute = null;
    if (Auth::guard('mahasiswa')->check() || Auth::guard('psikolog')->check() || Auth::guard('admin')->check() === true) {
        $user = Auth::guard('mahasiswa')->user() ?? Auth::guard('psikolog')->user() ?? Auth::guard('admin')->user();
        $dashboardRoute = Auth::guard('mahasiswa')->check() ? 'mahasiswa.dashboard' : (Auth::guard('psikolog')->check() ? 'psikolog.dashboard' : 'admin.dashboard');
    }
@endphp
<header class="site-header header-style-2">
			<div class="container-fluid">
				<div class="pbmit-header-content d-flex justify-content-between align-items-center">
					<div class="d-flex justify-content-between align-items-center">
						<div class="site-navigation">
							<nav class="main-menu navbar-expand-xl navbar-light">
								<div class="navbar-header">
									<!-- Toggle Button --> 
									<button class="navbar-toggler" type="button" id="navbarToggle">
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
											<li class="active">
												<a href="index.html">Home</a>
											</li>
											<li>
												<a href="#">Konsultasi</a>
											</li>
											<li>
												<a href="{{ route('client.psikolog') }}">Psikolog</a>
											</li>
											<li>
												<a href="{{ route('client.artikel') }}">Artikel</a>
											</li>
											 @if ($user)
											 <li class="dropdown d-none" id="userDropdown">
												<a href="#">
													<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="15" style="margin-right: 5px; margin-bottom: 2px;" height="15" viewBox="0 0 256 256" xml:space="preserve">
													<defs>
													</defs>
													<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
														<circle cx="45" cy="45" r="45" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(32,196,203); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
														<path d="M 48.601 48.545 c 5.698 -2.801 9.639 -8.649 9.639 -15.415 c 0 -9.476 -7.709 -17.185 -17.185 -17.185 S 23.871 23.654 23.871 33.13 c 0 6.925 4.126 12.89 10.041 15.609 c -7.837 1.448 -13.795 8.32 -13.795 16.57 v 9.82 c 0 1.657 1.343 3 3 3 h 37.548 c 1.657 0 3 -1.343 3 -3 v -9.82 C 63.665 56.618 57.056 49.447 48.601 48.545 z M 29.871 33.13 c 0 -6.167 5.018 -11.185 11.185 -11.185 S 52.24 26.963 52.24 33.13 c 0 6.167 -5.018 11.184 -11.185 11.184 S 29.871 39.296 29.871 33.13 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(27,167,173); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
														<path d="M 51.171 45.285 c 6.364 -2.52 10.884 -8.721 10.884 -15.971 c 0 -9.475 -7.709 -17.184 -17.184 -17.184 s -17.184 7.709 -17.184 17.184 c 0 7.272 4.548 13.488 10.942 15.993 c -8.565 0.795 -15.295 8.016 -15.295 16.785 v 9.82 c 0 1.657 1.343 3 3 3 h 37.549 c 1.657 0 3 -1.343 3 -3 v -9.82 C 66.884 53.181 59.933 45.881 51.171 45.285 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(255,255,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
													</g>
													</svg>
													{{ $user->nama }}</a>
												<ul>
													<li><a href="{{ route($dashboardRoute) }}">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="15" style="margin-right: 5px; margin-bottom: 2px;" height="15" viewBox="0 0 256 256" xml:space="preserve">
														<defs>
														</defs>
														<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
															<path d="M 35.813 54.013 H 4.514 C 2.025 54.013 0 51.987 0 49.498 V 4.514 C 0 2.025 2.025 0 4.514 0 h 31.299 c 2.489 0 4.514 2.025 4.514 4.514 v 44.984 C 40.328 51.987 38.303 54.013 35.813 54.013 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,80,192); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 35.813 90 H 4.514 C 2.025 90 0 87.975 0 85.485 V 69.741 c 0 -2.489 2.025 -4.515 4.514 -4.515 h 31.299 c 2.489 0 4.514 2.025 4.514 4.515 v 15.744 C 40.328 87.975 38.303 90 35.813 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,109,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 85.485 90 H 54.187 c -2.489 0 -4.515 -2.025 -4.515 -4.515 V 40.501 c 0 -2.489 2.025 -4.514 4.515 -4.514 h 31.299 c 2.489 0 4.515 2.025 4.515 4.514 v 44.984 C 90 87.975 87.975 90 85.485 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,80,192); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 85.485 24.773 H 54.187 c -2.489 0 -4.515 -2.025 -4.515 -4.515 V 4.514 C 49.672 2.025 51.697 0 54.187 0 h 31.299 C 87.975 0 90 2.025 90 4.514 v 15.745 C 90 22.748 87.975 24.773 85.485 24.773 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,109,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
														</g>
														</svg>
														Dashboard</a>
													</li>
													<li><a href="our-history.html">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="15" style="margin-right: 5px; margin-bottom: 2px;" height="15" viewBox="0 0 256 256" xml:space="preserve">
														<defs>
														</defs>
														<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
															<path d="M 82.091 12.9 H 7.909 C 4.093 12.9 1 15.993 1 19.809 v 8.102 h 88 v -8.102 C 89 15.993 85.907 12.9 82.091 12.9 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(254,117,127); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 1 27.911 v 43.258 c 0 3.816 3.093 6.909 6.909 6.909 h 74.182 c 3.816 0 6.909 -3.093 6.909 -6.909 V 27.911 H 1 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(204,235,255); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 89 28.911 H 1 c -0.552 0 -1 -0.448 -1 -1 v -8.102 C 0 15.448 3.548 11.9 7.909 11.9 h 74.182 c 4.361 0 7.909 3.548 7.909 7.909 v 8.102 C 90 28.463 89.553 28.911 89 28.911 z M 2 26.911 h 86 v -7.102 c 0 -3.258 -2.65 -5.909 -5.909 -5.909 H 7.909 C 4.651 13.9 2 16.551 2 19.809 V 26.911 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 82.091 79.077 H 7.909 C 3.548 79.077 0 75.529 0 71.168 V 27.911 c 0 -0.552 0.448 -1 1 -1 h 88 c 0.553 0 1 0.448 1 1 v 43.257 C 90 75.529 86.452 79.077 82.091 79.077 z M 2 28.911 v 42.257 c 0 3.259 2.651 5.909 5.909 5.909 h 74.182 c 3.259 0 5.909 -2.65 5.909 -5.909 V 28.911 H 2 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 28.696 12.9 h -7.393 V 9.204 c 0 -2.041 1.655 -3.696 3.696 -3.696 h 0 c 2.041 0 3.696 1.655 3.696 3.696 V 12.9 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(254,117,127); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 68.696 12.9 h -7.393 V 9.204 c 0 -2.041 1.655 -3.696 3.696 -3.696 l 0 0 c 2.041 0 3.696 1.655 3.696 3.696 V 12.9 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(254,117,127); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 28.696 13.9 h -7.393 c -0.552 0 -1 -0.448 -1 -1 V 9.204 c 0 -2.589 2.107 -4.696 4.696 -4.696 s 4.696 2.107 4.696 4.696 V 12.9 C 29.696 13.452 29.249 13.9 28.696 13.9 z M 22.304 11.9 h 5.393 V 9.204 c 0 -1.487 -1.209 -2.696 -2.696 -2.696 s -2.696 1.209 -2.696 2.696 V 11.9 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 68.696 13.9 h -7.393 c -0.553 0 -1 -0.448 -1 -1 V 9.204 c 0 -2.589 2.106 -4.696 4.696 -4.696 s 4.696 2.107 4.696 4.696 V 12.9 C 69.696 13.452 69.249 13.9 68.696 13.9 z M 62.304 11.9 h 5.393 V 9.204 c 0 -1.487 -1.21 -2.696 -2.696 -2.696 s -2.696 1.209 -2.696 2.696 V 11.9 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<circle cx="45" cy="60.41" r="24.08" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(199,237,95); fill-rule: nonzero; opacity: 1;" transform="  matrix(1 0 0 1 0 0) "/>
															<path d="M 45 85.492 c -13.829 0 -25.08 -11.25 -25.08 -25.079 S 31.171 35.333 45 35.333 s 25.08 11.251 25.08 25.08 S 58.829 85.492 45 85.492 z M 45 37.333 c -12.727 0 -23.08 10.354 -23.08 23.08 c 0 12.726 10.354 23.079 23.08 23.079 s 23.08 -10.354 23.08 -23.079 C 68.08 47.687 57.727 37.333 45 37.333 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 41.545 70.296 c -0.278 0 -0.543 -0.115 -0.732 -0.319 l -7.545 -8.118 c -0.376 -0.404 -0.353 -1.037 0.052 -1.413 c 0.405 -0.374 1.038 -0.353 1.413 0.052 l 6.796 7.313 l 13.725 -15.443 c 0.366 -0.414 0.998 -0.451 1.411 -0.083 c 0.413 0.366 0.45 0.998 0.083 1.411 L 42.292 69.96 c -0.188 0.211 -0.455 0.333 -0.736 0.336 C 41.552 70.296 41.549 70.296 41.545 70.296 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(0,0,0); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
														</g>
														</svg>
														Konsultasi</a></li>
													<li><a href="classes.html">
														<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" version="1.1" width="15" style="margin-right: 5px; margin-bottom: 2px;" height="15" viewBox="0 0 256 256" xml:space="preserve">
														<defs>
														</defs>
														<g style="stroke: none; stroke-width: 0; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: none; fill-rule: nonzero; opacity: 1;" transform="translate(1.4065934065934016 1.4065934065934016) scale(2.81 2.81)" >
															<path d="M 74.163 0 l -7.07 7.071 l 3.892 3.892 h -9.455 C 49.658 10.963 40 20.622 40 32.493 v 18.713 h 10 V 32.493 c 0 -6.357 5.172 -11.53 11.529 -11.53 h 9.455 l -3.892 3.892 l 7.07 7.071 l 15.964 -15.963 L 74.163 0 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(22,138,231); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<path d="M 76.594 90 H 13.406 C 6.014 90 0 83.986 0 76.594 V 13.406 C 0 6.014 6.014 0 13.406 0 h 28.119 v 10 H 13.406 C 11.528 10 10 11.528 10 13.406 v 63.188 C 10 78.472 11.528 80 13.406 80 h 63.188 C 78.472 80 80 78.472 80 76.594 V 38.159 h 10 v 38.435 C 90 83.986 83.986 90 76.594 90 z" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(86,116,130); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) " stroke-linecap="round" />
															<rect x="22.91" y="60.68" rx="0" ry="0" width="44.19" height="10" style="stroke: none; stroke-width: 1; stroke-dasharray: none; stroke-linecap: butt; stroke-linejoin: miter; stroke-miterlimit: 10; fill: rgb(86,116,130); fill-rule: nonzero; opacity: 1;" transform=" matrix(1 0 0 1 0 0) "/>
														</g>
														</svg>
														Logout</a></li>
												</ul>
											</li>
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
						@if ($user)
						<div class="pbmit-button-box-second">
							<a href="{{ route($dashboardRoute) }}" class="pbmit-btn" href="make-appointments-01.html">
								<span class="pbmit-button-content-wrapper">
									<span class="pbmit-button-icon pbmit-align-icon-right">
										<svg xmlns="http://www.w3.org/2000/svg" width="22.76" height="22.76" viewBox="0 0 22.76 22.76">
											<title>black-arrow</title>
											<path d="M22.34,1A14.67,14.67,0,0,1,12,5.3,14.6,14.6,0,0,1,6.08,4.06,14.68,14.68,0,0,1,1.59,1" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											<path d="M22.34,1a14.67,14.67,0,0,0,0,20.75" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
											<path d="M22.34,1,1,22.34" transform="translate(-0.29 -0.29)" fill="none" stroke="#000" stroke-width="2"></path>
										</svg>
									</span>
									<span class="pbmit-button-text">{{ $user->nama }}</span>
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
		</header>
		
<script>
document.addEventListener('DOMContentLoaded', function() {
    function updateVisibility() {
        var width = window.innerWidth;
        var dropdown = document.getElementById('userDropdown');
        var toggleButton = document.getElementById('navbarToggle');

        if (width > 1200) {
            // Mode mobile
            if (dropdown) {
                dropdown.classList.add('d-none');
            }
            if (toggleButton) {
                toggleButton.classList.remove('d-none');
            }
        } else {
            // Mode desktop
            if (dropdown) {
                dropdown.classList.remove('d-none');
            }
            if (toggleButton) {
                toggleButton.classList.add('d-none');
            }
        }
    }

    // Update visibility on page load and resize
    updateVisibility();
    window.addEventListener('resize', updateVisibility);
});

</script>