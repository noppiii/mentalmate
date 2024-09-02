
<!doctype html>
<html class="no-js" lang="en">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>@yield('title')</title>
		<meta name="robots" content="noindex, follow">
		<meta name="description" content="">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<!-- Favicon -->
		<link rel="shortcut icon" type="image/x-icon" href="images/fevicon.png">
		<!-- CSS
			============================================ -->
		<!-- Bootstrap CSS -->
		@include('layouts.asset.client.style')
    <style>
        .swal2-container {
            z-index: 9999;
        }
        </style>
        @stack('style')
        <!-- SweetAlert 2 CSS -->
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.9.359/pdf.min.js"></script>
        @stack('scripts')
	</head>
	<body>

	<!-- page wrapper -->
	<div class="page-wrapper pbmit-bg-color-light">

		<!-- Header Main Area -->
		  @include('layouts.client.navbar')
		<!-- Header Main Area End Here -->

		<!-- page content -->
		@yield('content')
		<!-- page content End -->

		<!-- footer -->
	    @include('layouts.client.footer')
		<!-- footer End -->

	</div>
	<!-- page wrapper End -->

	<!-- Search Box Start Here -->
	<div class="pbmit-search-overlay">
		<div class="pbmit-icon-close">
			<svg class="qodef-svg--close qodef-m" xmlns="http://www.w3.org/2000/svg" width="28.163" height="28.163" viewBox="0 0 26.163 26.163">
				<rect width="36" height="1" transform="translate(0.707) rotate(45)"></rect>
				<rect width="36" height="1" transform="translate(0 25.456) rotate(-45)"></rect>
			</svg>
		</div>
		<div class="pbmit-search-outer">
			<form class="pbmit-site-searchform" action="{{ route('client.search') }}" method="GET">
				<input type="text" class="form-control field searchform-s" name="search" value="{{ request('search') }}" placeholder="Search …">
				<button type="submit"></button>
			</form>
		</div>
	</div>
	<!-- Search Box End Here -->

	<!-- Scroll To Top -->
	<div class="pbmit-progress-wrap">
		<svg class="pbmit-progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
			<path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98"></path>
		</svg>
	</div>
	<!-- Scroll To Top End -->

	<!-- JS
		============================================ -->
  @if (Session::has('success_message'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer);
                    toast.addEventListener('mouseleave', Swal.resumeTimer);
                }
            });

            Toast.fire({
                icon: 'success',
                title: '{{ Session::get('success_message') }}'
            });
        </script>
    @endif

    @if ($errors->any())
        @foreach ($errors->all() as $error)
            <script>
                const Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000,
                    timerProgressBar: true,
                    didOpen: (toast) => {
                        toast.addEventListener('mouseenter', Swal.stopTimer);
                        toast.addEventListener('mouseleave', Swal.resumeTimer);
                    }
                });

                Toast.fire({
                    icon: 'error',
                    title: 'Oops...',
                    html: '{{ $error }}'
                });
            </script>
        @endforeach
    @endif

    @if (Session::has('error_message_update_details'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ Session::get('error_message_update_details') }}",
                showConfirmButton: false,
                timer: 3000 // milliseconds
            });
        </script>
    @endif

    @if (Session::has('error_message_not_found'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ Session::get('error_message_not_found') }}",
                showConfirmButton: false,
                timer: 3000 // milliseconds
            });
        </script>
    @endif

    @if (Session::has('error_message_delete'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: "{{ Session::get('error_message_delete') }}",
                showConfirmButton: false,
                timer: 3000 // milliseconds
            });
        </script>
    @endif

    @if (Session::has('success_message_create'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ Session::get('success_message_create') }}",
                showConfirmButton: false,
                timer: 3000 // milliseconds
            });
        </script>
    @endif

    @if (Session::has('success_message_update'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ Session::get('success_message_update') }}",
                showConfirmButton: false,
                timer: 3000 // milliseconds
            });
        </script>
    @endif

    @if (Session::has('success_message_delete'))
        <script>
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: "{{ Session::get('success_message_delete') }}",
                showConfirmButton: false,
                timer: 3000 // milliseconds
            });
        </script>
    @endif
    @include('layouts.asset.client.script')
    @stack('script')
	</body>
</html>
