@extends('layouts.guest')

@section('title', __('Главная'))

@section('main-content')
	{{-- Home Wrapper --}}
	<div class="flex flex-col overflow-hidden has-sliders" x-data="{ showContactModal: false }" x-cloak>
		{{-- Contact Us Modal --}}
		<div 
			x-show.transition.in="showContactModal" 
			x-on:contact-form-submitted.window="showContactModal = false"
			class="fixed top-0 left-0 right-0 bottom-0 z-50 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-70 shadow-xl"
		>
			<div 
				class="w-full mx-5 md:w-96 relative bg-gray-800 text-gray-200 rounded-md p-4 md:p-6 lg:p-8 xl:p-10 shadow-xl"
				x-on:click.away="showContactModal = false"
			>
				<button 
					type="button" 
					class="absolute right-5 top-5 transition-colors ease-in"
					x-on:click="showContactModal = false"
				>
					<svg class="text-gray-500 w-6 h-6 hover:text-gray-100" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</button>

				<div>
					{{-- Form --}}
					<form id="outreachForm" method="POST" action="{{ route('outreaches.store') }}">
						@csrf
						@method('PUT')
					
						<div class="form-item mb-3">
							<label class="text-gray-400 text-bold  pl-1" for="name">{{ __('Имя') }}</label>
							<input class="mt-1 w-full rounded-md bg-gray-700 border-gray-600 focus:border-purple-300 focus:bg-gray-800 transition ease-in shadow" type="text" name="name" id="name" required placeholder="{{ __('Введите Ваше имя') }}" autocomplete="off">
						</div>
					
						<div class="form-item mb-3">
							<label class="text-gray-400 text-bold  pl-1" for="email">E-mail</label>
							<input class="mt-1 w-full rounded-md bg-gray-700 border-gray-600 focus:border-purple-300 focus:bg-gray-800 transition ease-in shadow" type="email" name="email" id="email" required placeholder="{{ __('Введите Вашу почту') }}" autocomplete="off">
						</div>
					
						<div class="form-item mb-3">
							<label class="text-gray-400 text-bold  pl-1" for="message">{{ __('Сообщение') }}</label>
							<textarea class="mt-1 w-full rounded-md bg-gray-700 border-gray-600 focus:border-purple-300 focus:bg-gray-800 transition ease-in shadow" name="message" id="message" cols="30" rows="7" required placeholder="{{ __('Ваше сообщение') }}" style="resize:none;" autocomplete="off"></textarea>
						</div>
					
						<div class="form-item">
							<button 
								class="w-full px-5 py-2 bg-purple-600 text-gray-100 hover:text-gray-50 hover:bg-purple-700 rounded-md shadow-md hover:shadow-xl text-lg"
								type="submit"
							>
								{{ __('Отправить') }}
							</button>
						</div>
					</form>
				</div>
			</div>
		</div>

		{{-- Alerts --}}
		@include('includes.global.alerts')

		{{-- Hero --}}
		<div class="hero h-screen w-screen">
			<div class="container">
				<div class="h-full w-full flex flex-col items-center justify-center">
					<h1 class="text-gray-50 text-center text-4xl md:text-5xl lg:text-6xl">{{ config('app.name') }}</h1>

					<h5 class="my-10 text-base md:text-lg lg:text-xl text-gray-300 text-center">{{ __('Решение для эффективного управления цифровыми активами') }}</h5>

					<button 
						x-on:click="showContactModal = true"
						type="button"
						class="px-4 py-2 md:py-3 md:px-5 rounded-md bg-purple-800 text-gray-200 text-xl hover:bg-indigo-900 hover:text-gray-50 hover:shadow-xl transition-colors out-expo"
					>
						{{ __('Обратная связь') }}
					</button>
				</div>
			</div>
		</div>

		{{-- Info Slider --}}
		<div class="info-slider">
			<div class="container py-14 flex flex-col md:flex-row md:items-center justify-between lg:px-32">
				{{-- Info --}}
				<div class="w-full flex flex-col justify-center md:w-5/12 divide-y divide-gray-300">
					<h1 class="mb-3 text-gray-400 uppercase text-2xl md:text-3xl lg:text-4xl  font-medium">
						{{ __('О нас') }}
					</h1>

					<p class="pt-3 text-gray-600 text-md max-w-lg lg:text-lg">
						<span class="text-indigo-400 text-bold text-2xl font-serif" style="line-height: 1;">
							{{ config('app.name') }}
						</span> 
						- {{ __('британско-русская компания по созданию программного обеспечения для управления цифровыми активами. Основная деятельность – создание решений для управления цифровыми активами. В течение последних 3 лет наша команда работала в формате family-office, обслуживая только собственные средства и активы родных и близких людей. Когда стало понятно, что наша экспертность прошла проверку временем и несколькими кризисами (например, падение рынка криптовалют 2017-2018гг.), наши инструменты хеджирования и заработка стали открытыми для предложений...') }} 
						<a href="{{ route('about') }}" class="text-blue-400 hover:text-blue-500 underline hover:no-underline transition ">
							{{ __('Узнать больше') }}
						</a>
					</p>
				</div>
				{{-- Slider --}}
				<div class="w-full mt-5 md:mt-0 md:w-4/12 bg-teal-400">
					<div class="sliderrr swiper-container h-full w-full overflow-hidden rounded shadow-2xl">
						<div class="swiper-wrapper">
							{{-- Slides --}}
							<div class="swiper-slide">
								<img 
									class="w-full overflow-hidden rounded-md object-cover object-center h-64 shadow-lg" 
									src="{{ asset('img/guest/index-page-sliders/info/1.jpg') }}"
								>
							</div>
							<div class="swiper-slide">
								<img 
									class="w-full overflow-hidden rounded-md object-cover object-center h-64 shadow-lg" 
									src="{{ asset('img/guest/index-page-sliders/info/2.jpg') }}"
								>
							</div>
							<div class="swiper-slide">
								<img 
									class="w-full overflow-hidden rounded-md object-cover object-center h-64 shadow-lg" 
									src="{{ asset('img/guest/index-page-sliders/info/3.jpg') }}"
								>
							</div>
						</div>

						<!-- If we need pagination -->
						<div class="swiper-pagination"></div>
					</div>
				</div>
			</div>
		</div>

		{{-- Benefits --}}
		<div 
			class="benefits py-12"
			x-data="{
				benefits: [
					{
						'id': 0,
						'title': '{{ __('Прибыль') }}',
						'descr': '{{ __('Наша команда разрабатывает и тестирует разные торговые алгоритмы, данные алгоритмы будут доступны Вам для рассмотрения в Вашем личном кабинете, вы можете комбинировать собственные торговые стратегии с разработками нашей компании.') }}'
					},
					{
						'id': 1,
						'title': '{{ __('Безопасность') }}',
						'descr': '{{ config('app.name').' '.__('помогает обеспечить высокую безопасность хранения ваших активов, интегрируя каждому клиенту систему распределенного холодного хранения активов, что существенно снижает риски потери средств.') }}'
					},
					{
						'id': 2,
						'title': '{{ __('Команда') }}',
						'descr': '{{ __('В Alfido Invest работают специалисты из различных отраслей фундаментальных наук и бизнеса. В команде объединены аналитики Blockchain-индустрии, трейдеры, программисты, финансисты и специалисты по математическому моделированию.') }}'
					},
					{
						'id': 3,
						'title': '{{ __('Экспертиза') }}',
						'descr': '{{ str_replace("'", "\'", __('Эксперты компании проводят технический анализ и длительное испытание каждого алгоритма, постоянно усовершенствует и создаёт новые решения для безопасного хранения и управления цифровыми активами.')) }}'
					},
					{
						'id': 4,
						'title': '{{ __('Международные связи') }}',
						'descr': '{{ str_replace("'", "\'", __('Ведущие специалисты компании являются действующими спикерами на международных конференциях криптоиндустрии.').' '.config('app.name').' '.__('получает актуальную и достоверную информацию из первых рук благодаря личным знакомствам с командами разработчиков, другими лидерами мнений и профессионалами индустрии.')) }}'
					},
				],
				activeBen: 0
			}"
		>
			<div class="container flex flex-col px-12 py-5 md:flex-row lg:px-32 justify-around items-center">
				{{-- Loop through benefit titles --}}
				<div class="h-full w-full md:w-2/4 mb-10 md:mb-0">
					<h1 class="uppercase text-gray-100 text-3xl font-medium  mb-10">
						{{ __('почему мы?') }}
					</h1>

					<template x-for="benefit in benefits" x-key="benefit.id">
						<button
							type="button"
							class="ben-link table mb-5 uppercase text-gray-100 font-bold"
							x-text="benefit.title"
							:class="{'active': activeBen === benefit.id }"
							x-on:click="activeBen = benefit.id"
						>
						</button>
					</template>
				</div>

				{{-- Loop through benefit descriptions --}}
				<div class="w-full md:w-2/4">
					<template x-for="benefit in benefits" x-key="benefit.id">
						<div x-show.transition.in.opacity.duration.300ms="benefit.id === activeBen">
							<h1 class="mb-3 text-3xl text-indigo-200 md:text-indigo-500 " x-text="benefit.title.toUpperCase()"></h1>
							<p class="text-lg leading-2 text-indigo-50 md:text-gray-600 md:max-w-xl" x-text="benefit.descr"></p>
						</div>
					</template>
				</div>
			</div>
		</div>

		{{-- Account Types --}}
		<div class="w-full my-16 sm:my-24 md:my-32 flex">
			<div class="container">
				{{-- Titlte --}}
				<div class="block mb-20">
					<h1 class="text-center text-gray-500 text-4xl font-medium">
						{{ __('Типы Cчетов') }}
					</h1>
				</div>

				{{-- Acc Types --}}
				<div class="w-full flex items-center flex-wrap justify-around">
					{{-- --- --}}
					<a href="{{ route('account.types') }}" class="w-full md:w-auto mb-10 md:mb-0">
						<div class="flex-1 flex flex-col items-center p-5 rounded-lg transition-all bg-gray-800 bg-opacity-5 md:bg-transparent hover:bg-gray-800 hover:bg-opacity-5 opacity-75 hover:opacity-100">
							<img class="w-56" src="{{asset('img/guest/svgs/index-types/type-mini.png')}}">
							<h6 class="text-center text-2xl my-8 text-gray-600 uppercase">Mini</h6>
							<button class="w-full flex items-center justify-center bg-purple-700 text-gray-50 rounded px-2 py-4">
								{{ __('Перейти') }}
								<svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
							</button>
						</div>
					</a>

					{{-- --- --}}
					<a href="{{ route('account.types') }}" class="w-full md:w-auto mb-10 md:mb-0">
						<div class="flex-1 flex flex-col items-center p-5 rounded-lg transition-all bg-gray-800 bg-opacity-5 md:bg-transparent hover:bg-gray-800 hover:bg-opacity-5 opacity-75 hover:opacity-100">
							<img class="w-56" src="{{asset('img/guest/svgs/index-types/type-medium.png')}}">
							<h6 class="text-center text-2xl my-8 text-gray-600 uppercase">Medium</h6>
							<button class="w-full flex items-center justify-center bg-purple-700 text-gray-50 rounded px-2 py-4">
								{{ __('Перейти') }}
								<svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
							</button>
						</div>
					</a>

					{{-- --- --}}
					<a href="{{ route('account.types') }}" class="w-full md:w-auto mb-10 md:mb-0">
						<div class="flex-1 flex flex-col items-center p-5 rounded-lg transition-all bg-gray-800 bg-opacity-5 md:bg-transparent hover:bg-gray-800 hover:bg-opacity-5 opacity-75 hover:opacity-100">
							<img class="w-56" src="{{asset('img/guest/svgs/index-types/type-premium.png')}}">
							<h6 class="text-center text-2xl my-8 text-gray-600 uppercase">Premium</h6>
							<button class="w-full flex items-center justify-center bg-purple-700 text-gray-50 rounded px-2 py-4">
								{{ __('Перейти') }}
								<svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
							</button>
						</div>
					</a>

					{{-- --- --}}
					<a href="{{ route('account.types') }}" class="w-full md:w-auto mb-10 md:mb-0">
						<div class="flex-1 flex flex-col items-center p-5 rounded-lg transition-all bg-gray-800 bg-opacity-5 md:bg-transparent hover:bg-gray-800 hover:bg-opacity-5 opacity-75 hover:opacity-100">
							<img class="w-56" src="{{asset('img/guest/svgs/index-types/type-vip.png')}}">
							<h6 class="text-center text-2xl my-8 text-gray-600 uppercase">V.I.P.</h6>
							<button class="w-full flex items-center justify-center bg-purple-700 text-gray-50 rounded px-2 py-4">
								{{ __('Перейти') }}
								<svg class="w-5 h-5 ml-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
									<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 9l3 3m0 0l-3 3m3-3H8m13 0a9 9 0 11-18 0 9 9 0 0118 0z" />
								</svg>
							</button>
						</div>
					</a>
				</div>
			</div>
		</div>

		{{-- Reviews --}}
		<div class="bg-gray-100" x-data="{ stars: 5 }">
			<div class="container flex justify-around items-center py-20 lg:py-24">
				{{-- Reviews Slider --}}
				<div class="sliderrr hidden lg:block swiper-container h-full w-4/12 overflow-hidden rounded shadow-2xl">
					<div class="swiper-wrapper w-full">
						{{-- Slides --}}
						<div class="swiper-slide p-5 py-10">
							<h1 class="text-purple-500 text-xl  mb-3">Forbes</h1>
							<div class="flex justify-around h-full w-full">
								<img class="rounded w-16 h-16 object-center object-cover mt-1 mr-5" src="{{ asset('img/guest/index-page-sliders/reviews/1.png') }}">
								<p class="text-gray-500 leading-2">
									Derivative exchange Singapore-based {{ config('app.name') }} believes they will continue to grow in 2020.
								</p>
							</div>
						</div>
						<div class="swiper-slide p-5 py-10">
							<h1 class="text-purple-500 text-xl  mb-3">CoinTelegraph</h1>
							<div class="flex justify-around h-full w-full">
								<img class="rounded w-16 h-16 object-center object-cover mt-1 mr-5" src="{{ asset('img/guest/index-page-sliders/reviews/2.png') }}">
								<p class="text-gray-500 leading-2">
									{{ config('app.name') }} comes in at 12,035 when compared to all websites on Amazon's Alexa data. It surprisingly ranks higher than BitMEX by web traffic.
								</p>
							</div>
						</div>
						<div class="swiper-slide p-5 py-10">
							<h1 class="text-purple-500 text-xl  mb-3">NEWS BTC</h1>
							<div class="flex justify-around h-full w-full">
								<img class="rounded w-16 h-16 object-center object-cover mt-1 mr-5" src="{{ asset('img/guest/index-page-sliders/reviews/3.png') }}">
								<p class="text-gray-500 leading-2">
									{{ config('app.name') }}'s rapidly growing user base and thorough derivatives offering make it an unquestioned rising star in this space.
								</p>
							</div>
						</div>
					</div>

					<!-- If we need pagination -->
					<div class="swiper-pagination"></div>
				</div>
				
				{{-- Stats --}}
				<div class="w-full lg:w-6/12 flex flex-col md:flex-row lg:flex-col items-center">
					<h1 class="w-full mb-5 md:mb-0 lg:mb-10 text-center text-xl text-gray-500">
						{{ __('Больше') }} 
						<span class="text-yellow-400 font-bold text-2xl">300</span> 
						{{ __('крупнейших') }}
						<br>
						{{ __('медиа каналов с Декабря 2018') }}
					</h1>
					<div class="flex flex-col md:flex-row mt-5 md:mt-0">
						<h1 class="text-center text-6xl text-gray-700 mb-4 md:mb-0 md:mr-4 lg:mr-0 lg:mb-4">
							4.7
						</h1>

						<div class="flex items-center">
							<template x-for="number in stars" x-key="number">
								<svg class="text-yellow-400 w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									<path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
								</svg>
							</template>
						</div>
					</div>
				</div>
			</div>
		</div>

		{{-- Payment Methods --}}
		<div class="w-full bg-gray-800">
			<div class="container flex lg:items-center justify-between flex-col lg:flex-row lg:py-24 lg:px-32 py-16 px-10">
				<div class="w-full lg:w-2/4 mb-14 lg:mb-0 flex flex-col items-start">
					<h1 class="text-3xl md:text-4xl text-purple-400 ">
						{{ __('Способы пополнения') }}
						<br>
						{{ __('и снятия средств') }}
					</h1>
					<h6 class="lg:text-lg max-w-sm my-5 md:my-10 leading-2 text-gray-300">
						{{ __('Работайте со своим депозитом легко и удобно, не теряя лишнего времени на ожидание. Просто выберите подходящий вам способ пополнения и снятия средств из нескольких вариантов.') }}
					</h6>
					<a 
						href="{{ route('crypto') }}" 
						class="py-3 md:py-4 px-6 md:px-8 md:text-lg text-gray-100 bg-purple-600 rounded shadow-lg hover:bg-purple-700 hover:shadow-xl transition duration-100"
					>
						{{ __('Пополнить счёт') }}
					</a>
				</div>

				<div class="h-full lg:w-2/4 grid grid-cols-4 gap-5" x-data="{ images: 8 }">
					<template x-for="image in images">
						<img :src="`/img/guest/payments-grid/${image}.png`" class="">
					</template>
				</div>
			</div>
		</div>

		{{-- Payments --}}
		<div class="payments overflow-x-scroll">
			<div class="container">
				<div class="payments-inner">
					<img src="{{asset('img/guest/payments-row/master.svg')}}" class="big-ones">
					<img src="{{asset('img/guest/payments-row/fp.svg')}}" class="big-ones">
					<img src="{{asset('img/guest/payments-row/ym.svg')}}">
					<img src="{{asset('img/guest/payments-row/pci.svg')}}">
					<img src="{{asset('img/guest/payments-row/sepa.svg')}}">
					<img src="{{asset('img/guest/payments-row/btc.svg')}}">
					<img src="{{asset('img/guest/payments-row/wire.svg')}}" class="big-ones">
					<img src="{{asset('img/guest/payments-row/eth.svg')}}" class="big-ones">
					<a href="https://www.free-kassa.ru/"><img src="https://www.free-kassa.ru/img/fk_btn/8.png"></a>
				</div>
			</div>
		</div>

		{{-- F.A.Q. --}}
		<div class="bg-gray-100 flex flex-col" x-data="{
			items: [
				{
					'id': 0,
					'q': '{{ __('Сколько по времени идет зачисление на счет?') }}',
					'a': '{{ __('Если оплата производится кредитной картой или электронными способами оплаты, то зачисление происходит автоматически. При совершение банковского перевода срок зачисления денежных средств на счет обычно составляет 2−3 дня.') }}'
				},
				{
					'id': 1,
					'q': '{{ __('Как я могу пополнить счет?') }}',
					'a': '{{ __('Существует несколько способов пополнения и вывода средств из личного кабинета. Пополнить счет можно через личный кабинет. Войдите, выберете платежную систему и совершите оплату. Более подробную информацию вы можете получить в разделе «Ввод-вывод средств» в личном кабинете.') }}'
				},
				{
					'id': 2,
					'q': '{{ __('Могу ли я восстановить пароль, если забыл данные?') }}',
					'a': '{{ __('Вы можете восстановить данные для входа в личный кабинет, нажав кнопку «Забыл пароль». Введите электронную почту, указанную при регистрации, и нажмите «Восстановить пароль». Инструкция будет отправлена на электронную почту.') }}'
				},
			],
			activeItem: null
		}">
			<div class="container px-2 py-20 lg:py-32">
				<h1 class="mb-10 lg:mb-14 text-3xl md:text-4xl text-gray-600  text-center">
					{{ __('Часто задаваемые вопросы') }}
				</h1>

				{{-- Faq Items --}}
				<div class="lg:px-20 xl:px-60">
					<template x-for="item in items" x-key="item.id">
						<div>
							{{-- Question --}}
							<div 
								class="block group"
								x-on:click="activeItem = item.id"
							>
								<div class="w-full h-full flex items-center justify-between p-5 text-purple-600 group-hover:text-purple-900 transition-colors duration-150 group-hover:bg-gray-200 group-hover:bg-opacity-50 cursor-pointer" :class="{ 'border-b border-gray-300': items.length !== item.id + 1 }">
									<h3 x-text="item.q" class="w-10/12 md:w-9/12 lg:w-auto text-lg md:text-xl"></h3>
									<svg 
										class="w-2/12 h-5 md:w-3/12 lg:w-6 lg:h-6 transform transition-transform"
										:class="{'rotate-90': activeItem === item.id}" 
										xmlns="http://www.w3.org/2000/svg" 
										fill="none" 
										viewBox="0 0 24 24" 
										stroke="currentColor"
									>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
									</svg>
								</div>
							</div>

							{{-- Answer --}}
							<div 
								class="p-5" 
								x-show.transition.origin.top="activeItem === item.id"
								x-on:click.away="activeItem = null"
							>
								<p x-text="item.a" class="text-gray-600 text-lg"></p>
							</div>
						</div>
					</template>
				</div>
			</div>
		</div>
	</div>
@endsection