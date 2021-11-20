@extends('layouts.guest')

@section('title', __('Экономический календарь'))

@section('main-content')
	<section class="flex flex-col">
		{{-- Title --}}
		@include('includes.guest.page-title', [
			'title' => __('Экономический календарь'), 
			'class' => 'eco-header'
		])

		{{-- Widget --}}
		<div class="block p-10">
			<div class="trading-view">
				<div class="tradingview-widget-container">
					  <div class="tradingview-widget-container__widget"></div>
					  <div class="tradingview-widget-copyright"><a href="https://ru.tradingview.com/markets/currencies/economic-calendar/" rel="noopener" target="_blank"><span class="blue-text">{{ __('Экономический календарь') }}</span></a> {{ __('от') }} TradingView</div>
					  <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-events.js" async>
					  	{
							"colorTheme": "light",
							"isTransparent": false,
							"width": "100%",
							"height": "1500",
							"locale": "{{ app()->getLocale() }}",
							"importanceFilter": "-1,0,1"
						}
					  </script>
				</div>
			</div>
		</div>
	</section>
@endsection