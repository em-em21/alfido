@extends('layouts.user')

@section('content')
    <div class="ico-wrapper flex flex-col md:p-4 w-full h-full">
		<div class="flex flex-wrap flex-col lg:flex-row w-full">
			{{-- ICO --}}
			<div class="card w-full lg:w-3/6 mb-10 lg:mr-10">
				{{-- Card Header --}}
				<div class="card__header flex-col text-gray-50 p-5">
					{{-- svg icon --}}
					<svg class="w-9 h-9" fill="rgba(167, 139, 250, 1)">
						<use xlink:href="/sprite.svg#chart"></use>
					</svg>
					
					{{-- alias --}}
					<h1 class="inv-alias text-center my-2 text-xl md:text-2xl text-teal-300">
						@yield('title')
					</h1>
					
					{{-- title --}}
					<h1 class="card__header--title inv-title text-purple-400 font-black uppercase  text-center text-xl md:text-2xl">
						@yield('alias')
					</h1>
				</div>

				{{-- Card Body --}}
				<div class="card__body">
					<ul class="flex flex-col">
						<li class="inline-flex flex-col md:flex-row justify-between items-center text-gray-300 mb-2 border-b border-gray-700 p-3">
							<pre class="text-indigo-300 text-lg mb-2 md:mb-0">{{ __('Стартовая стоимость') }}</pre>
							<span class=" text-xl text-gray-100">@yield('starter-point') $</span>
						</li>
						<li class="inline-flex flex-col md:flex-row justify-between items-center text-gray-300 mb-2 border-b border-gray-700 p-3">
							<pre class="text-indigo-300 text-lg mb-2 md:mb-0">{{ __('Текущая стоимость') }}</pre>
							<span class=" text-xl text-gray-100">@yield('current-point') $</span>
						</li>
						<li class="inline-flex flex-col md:flex-row justify-between items-center text-gray-300 mb-2 border-b border-gray-700 p-3">
							<pre class="text-indigo-300 text-lg mb-2 md:mb-0">{{ __('Дата выхода') }}</pre>
							<span class=" text-xl text-gray-100">@yield('release-date')</span>
						</li>
						<li class="inline-flex flex-col md:flex-row justify-between items-center text-gray-300 mb-2 p-3">
							<pre class="text-indigo-300 text-lg mb-2 md:mb-0">{{ __('Планируется выпустить') }}</pre>
							<span class=" text-xl text-gray-100">@yield('amount')</span>
						</li>
					</ul>
				</div>
			</div>
	
			{{-- Investment Modal --}}
			<div class="inv-modal card w-full lg:w-2/6 mb-10 lg:mb-0">
				{{-- Card Header --}}
				<div class="card__header p-5">
					<h1 class="card__header--title">
						{{ __('Инвестировать') }}
					</h1>
				</div>
				
				{{-- Card Body --}}
				@yield('ico-investment-form')
			</div>
		</div>
    </div>

	{{-- marque widget --}}
	<div class="w-full px-4 mt-5">
		@include('includes.user.tradingview.ticker')
	</div>
@endsection