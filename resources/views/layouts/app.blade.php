<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}" class="h-full bg-gray-900 box-border">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
	<meta name="viewport" content="width=device-width, initial-scale=1">
	@include('includes.global.favicon')
	@yield('page_title')
	{{--styles--}}
	<link rel="stylesheet" href="{{ asset('css/app.css') }}">
	<link rel="stylesheet" href="{{ asset('css/tailwind.css') }}">
	@stack('styles')
</head>
<body>
	@yield('body')
</body>
</html>