<!doctype html>
<html lang="ru">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		@include('includes.global.favicon')
		<title>{{ config('app.name') }} | @yield('auth-title')</title>
		{{-- Styles --}}
		<link rel="stylesheet" href="{{ asset('css/app.css') }}">
		<link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
		@stack('styles')
	</head>

	<body 
		id="layer-auth"
		style="margin: 0; padding: 0;" 
		class="font-sans"
		x-cloak
		x-data="{ showTos: false, showTosEn: true, showTosRu: false, showSpinner: false }"
	>
		{{-- Content --}}
		<div class="lg:flex overflow-hidden">
			<div class="lg:w-1/2 xl:max-w-screen-sm relative overflow-y-auto h-screen flex flex-col">
				{{-- Logo - Homepage Link --}}
				<div class="flex justify-center lg:justify-start lg:px-12 py-12 bg-gray-100 lg:bg-white">
					<a href="{{ route('homepage') }}" class="cursor-pointer flex items-center">
						<img class="w-36" src="{{ asset('img/logo/logo-block.png') }}">
					</a>
				</div>

				{{-- Forms --}}
				@yield('content')
			</div>

			<div class="@yield('auth-background-class') hidden lg:flex items-center justify-center bg-blue-100 flex-1 h-screen"></div>
		</div>
	
		{{-- Scripts --}}
		<script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
		<script src="{{ asset('js/scripts/auth.js') }}" defer></script>
		@stack('scripts')
	</body>
</html>
