<!DOCTYPE html>

<html lang="en">

<head>
	<base href="./">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="description" content="Backend">
	<meta name="author" content="MegonoDev">
	<link rel="apple-touch-icon" sizes="57x57" href="{{ asset('img/favicon/apple-icon-57x57.png') }}">
	<link rel="apple-touch-icon" sizes="60x60" href="{{ asset('img/favicon/apple-icon-60x60.png') }}">
	<link rel="apple-touch-icon" sizes="72x72" href="{{ asset('img/favicon/apple-icon-72x72.png') }}">
	<link rel="apple-touch-icon" sizes="76x76" href="{{ asset('img/favicon/apple-icon-76x76.png') }}">
	<link rel="apple-touch-icon" sizes="114x114" href="{{ asset('img/favicon/apple-icon-114x114.png') }}">
	<link rel="apple-touch-icon" sizes="120x120" href="{{ asset('img/favicon/apple-icon-120x120.png') }}">
	<link rel="apple-touch-icon" sizes="144x144" href="{{ asset('img/favicon/apple-icon-144x144.png') }}">
	<link rel="apple-touch-icon" sizes="152x152" href="{{ asset('img/favicon/apple-icon-152x152.png') }}">
	<link rel="apple-touch-icon" sizes="180x180" href="{{ asset('img/favicon/apple-icon-180x180.png') }}">
	<link rel="icon" type="image/png" sizes="192x192" href="{{ asset('img/favicon/android-icon-192x192.png') }}">
	<link rel="icon" type="image/png" sizes="32x32" href="{{ asset('img/favicon/favicon-32x32.png') }}">
	<link rel="icon" type="image/png" sizes="96x96" href="{{ asset('img/favicon/favicon-96x96.png') }}">
	<link rel="icon" type="image/png" sizes="16x16" href="{{ asset('img/favicon/favicon-16x16.png') }}">
	<link rel="manifest" href="{{ asset('img/favicon/manifest.json') }}">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="{{ asset('img/favicon/ms-icon-144x144.png') }}">
	<meta name="theme-color" content="#ffffff">
	<title>@yield('title') | {{ config('app.name') }} </title>
	<!-- <link rel="icon" type="image/png" sizes="16x16" href="assets/favicon/favicon-16x16.png"> -->

	<!-- Main styles for this application-->
	<link rel="stylesheet" href="{{ mix('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('toast/jquery.toast.css') }}">
	@stack('css')
	<link rel="stylesheet" href="{{ asset('css/custom.css') }}">

</head>

<body class="c-app c-legacy-theme">
	@include('layouts.partials.sidebar')
	<div class="c-wrapper c-fixed-components">
		@include('layouts.partials.header')
		<div class="c-body">
			<main class="c-main">
				@yield('content')
			</main>
			@include('layouts.partials.footer')
		</div>
	</div>
	<!-- CoreUI and necessary plugins-->

	<script src="{{ mix('js/app.js') }}"></script>
	<script type="text/javascript" src="{{ asset('coreui/moment/min/moment.min.js') }}"></script>
	<script src="{{ asset('toast/jquery.toast.js') }}"></script>
	@stack('scripts')
	@include('layouts.partials._flash')

</body>

</html>