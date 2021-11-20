<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		@include('includes.global.favicon')
		<title>@yield('title') | {{ config('app.name') }}</title>

		{{-- preload --}}
		<link rel="preload" href="{{ asset('css/app.css') }}" as="style">
		<link rel="preload" href="{{ asset('css/tailwind.css') }}" as="style">
  	<link rel="preload" href="{{ asset('js/scripts/guest.js') }}" as="script">

		{{-- Styles --}}
		@livewireStyles
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
		@stack('styles')
	</head>
	<body id="layer-guest">
		@include('includes.global.loader')
		
		{{-- Header --}}
		@include('includes.guest.header')

		{{-- Main content --}}
		<div>
			@yield('main-content')
		</div>

		{{-- Footer --}}
		@include('includes.guest.footer')

		{{-- Scripts --}}
		@livewireScripts
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
		{{-- <script src="{{asset('js/libraries/pusher.js')}}"></script> --}}
		<script src="{{ asset('js/scripts/guest.js') }}"></script>
		@stack('scripts')
	</body>
</html>
