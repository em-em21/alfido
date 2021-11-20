<header class="fixed top-0 left-0 right-0 w-full z-50 transition-all block">
	{{-- Nav --}}
	<nav 
		x-cloak 
		class="nav w-full h-full flex items-center bg-transparent px-10 md:px-12 transition-all lg:px-32" 
		role="navigation" 
		x-data="{ 
			showBurger: false, showDropOne: false, showDropTwo: false, showAuthDrop: false, dropFocused: false
		}"
	>
		{{-- Logo --}}
		<div class="header-logo hidden lg:flex xl:flex">
			<img class="logo-block w-20" src="{{ asset('img/logo/logo-block.png') }}">
		</div>
		
		{{-- Main Menu --}}
		<ul class="items-center ml-12 max-w-3/4 hidden lg:flex xl:flex">
			<li class="">
				<a href="{{ route('homepage') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
					{{ __('Главная') }}
				</a>
			</li>

			<li class=" nav-dropdown">
				<button 
					class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3 relative"
					x-on:click="showDropOne = !showDropOne; showDropTwo = false; dropFocused = true"
				>
					{{ __('Торговля') }}

					<svg class="w-5 h-5 ml-1 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</button>

				<ul 
					class="with-triangle absolute top-full shadow-xl bg-gray-100 rounded-sm" 
					x-show.transition.in="showDropOne" 
					x-on:click.away="showDropOne = false;"
				>
					<li>
						<a 
							class="block px-4 p-2 text-gray-500 hover:text-gray-700 font-medium text-lg rounded-sm overflow-hidden" 
							href="{{ route('algotrading') }}"
						>
							{{ __('Алготрейдинг') }}
						</a>
					</li>
					<li>
						<a 
							class="block px-4 p-2 text-gray-500 hover:text-gray-700 font-medium text-lg rounded-sm overflow-hidden" 
							href="{{ route('account.types') }}"
						>
							{{ __('Типы счетов') }}
						</a>
					</li>
				</ul>
			</li>

			<li class=" nav-dropdown nd-2">
				<button 
					class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3 relative"
					x-on:click="showDropOne = false; showDropTwo = !showDropTwo; dropFocused = true;"
				>
					{{ __('Аналитика') }}

					<svg class="w-5 h-5 ml-1 mt-0.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</button>

				<ul 
					class="with-triangle absolute top-full shadow-xl bg-gray-100 rounded-sm" 
					x-show.transition.in="showDropTwo" 
					x-on:click.away="showDropTwo = false"
				>
					<li>
						<a 
							class="block px-4 p-2 text-gray-500 hover:text-gray-700 font-medium text-lg rounded-sm overflow-hidden" 
							href="{{ route('eco.calendar') }}"
						>
							{{ __('Экономический календарь') }}
						</a>
					</li>

					{{-- <li>
						<a 
							class="block px-4 p-2 text-gray-500 hover:text-gray-700 font-medium text-lg rounded-sm overflow-hidden" 
							href="{{ route('analysis') }}"
						>
							{{ __('Технический анализ') }}
						</a>
					</li> --}}
				</ul>
			</li>

			<li class="">
				<a href="{{ route('contacts') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
					{{ __('Контакты') }}
				</a>
			</li>

			<li class="">
				<a href="{{ route('about') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
					{{ __('О нас') }}
				</a>
			</li>
		</ul>

		{{-- Burger Menu --}}
		<div class="burger lg:hidden xl:hidden">
			{{-- Burger menu trigger --}}
			<button type="button" class="flex items-center justify-center group-hover:text-gray-50" x-on:click="showBurger = true">
				<svg class="w-8 h-8 text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
				</svg>
			</button>
		
			{{-- Menu overlay --}}
			<div 
				class="w-72 fixed left-0 top-0 bottom-0 flex flex-col justify-between py-12 shadow-dark-md bg-gray-900"
				style="z-index: 1000;"
				:class="{'opacity-100': showBurger}"
				x-show="showBurger" 
				x-on:click.away="showBurger = false"
				x-transition:enter="transition ease-in-out duration-300" 
				x-transition:enter-start="opacity-0 transform scale-x-0 -translate-x-1/2" 
				x-transition:enter-end="opacity-100 transform scale-x-100 translate-x-0" 
				x-transition:leave="transition ease-in-out duration-300" 
				x-transition:leave-start="opacity-100 transform scale-x-100 translate-x-0" 
				x-transition:leave-end="opacity-0 transform scale-x-0 -translate-x-1/2" 
			>
				{{-- Close menu --}}
				<button type="button" x-on:click="showBurger = false">
					<svg class="text-purple-400 w-8 h-8 focus:text-gray-100 active:text-gray-200 active:bg-gray-800 active:p-1 absolute right-4 top-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</button>
				
				{{-- Menu --}}
				<ul class="flex flex-col items-start px-10 mb-5">
					<p class="p-2 text-xl font-semibold text-gray-500 mb-5">
						{{ __('Меню') }}
					</p>
					
					{{-- Link --}}
					<li>
						<a href="{{ route('homepage') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
							{{ __('Главная') }}
						</a>
					</li>

					{{-- Link --}}
					<li>
						<a href="{{ route('algotrading') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
							{{ __('Алготрейдинг') }}
						</a>
					</li>

					{{-- Link --}}
					<li>
						<a href="{{ route('account.types') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
							{{ __('Типы счетов') }}
						</a>
					</li>

					{{-- Link --}}
					<li>
						<a href="{{ route('eco.calendar') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
							{{ __('Экономический календарь') }}
						</a>
					</li>
					
					{{-- Link --}}
					<li>
						<a href="{{ route('contacts') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
							{{ __('Контакты') }}
						</a>
					</li>
					
					{{-- Link --}}
					<li>
						<a href="{{ route('about') }}" class="flex items-center text-gray-300 hover:text-gray-100 text-lg text-medium p-2 mr-3">
							{{ __('О нас') }}
						</a>
					</li>
				</ul>
		
				{{-- Menu footer --}}
				<div class="flex flex-col items-center">
					<p class="text-gray-500 mb-3 text-sm">
						{{ __('Все права защищены.') }}
					</p>
		
					<p class="text-gray-500 text-sm">
						{{ config('app.name') .' &copy; '. \Carbon\Carbon::now()->year }}
					</p>
				</div>
			</div>
		</div>

		{{-- Auth --}}
		<div class="ml-auto flex">
			@guest
				@if (Route::has('login'))
					<a href="{{ route('login') }}" class="auth__btn-entrance text-sm sm:text-base py-2 px-5 sm:py-2.5 sm:px-8 md:py-3 md:px-10 rounded-3xl">
						{{ __('Войти') }}
					</a>
				@endif 
			@else
				<div class="relative">
					{{-- Auth Drop Trigger --}}
					<button type="button" class="flex items-center p-2" x-on:click="showAuthDrop = true; dropFocused = true">
						<span class="text-xl text-gray-200">
							{{ ucfirst(auth()->user()->name) }}
						</span>
						<svg class="w-6 h-7 ml-2 text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
						</svg>
					</button>

					{{-- Auth Dropdown --}}
					<ul
						class="origin-top with-triangle absolute top-full shadow-xl bg-gray-100 rounded-sm"
						x-show="showAuthDrop"
						@include('includes.animation.dropdown_transition')
						x-on:click.away="showAuthDrop = false"
					>
						{{-- Dashboard --}}
						<li class="group text-lg text-gray-400 transition ease-out duration-100 inline">
							<a
								href="{{ route('crypto') }}"
								class="flex items-center justify-between w-full px-4 p-2 text-gray-500 hover:text-gray-700 font-medium rounded-sm overflow-hidden"
							>
								<span class="pr-2">
									{{ __('Платформа') }}
								</span>
								<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
								</svg>
							</a>
						</li>

						{{-- Admin Dashboard --}}
						@if(auth()->user()->role === 2 || auth()->user()->role === 3)
							<li class="group text-lg text-gray-400 transition ease-out duration-100 inline">
								<a
									href="{{ route('admin.index') }}"
									class="flex items-center justify-between w-full px-4 p-2 text-gray-500 hover:text-gray-700 font-medium rounded-sm overflow-hidden"
								>
									<span class="pr-2">{{ __('Админ') }}</span>
									<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd" />
									</svg>
								</a>
							</li>
						@endif
						
						{{-- Logout --}}
						<li class="group text-lg text-gray-400 transition ease-out duration-100 inline">
							<button
								class="flex items-center justify-between w-full px-4 p-2 text-gray-500 hover:text-gray-700 font-medium rounded-sm overflow-hidden"
								onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
							>
								<span class="pr-2">{{ __('Выход') }}</span>
								<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
									<path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
								</svg>
								<form id="logout-form"
									action="{{ route('logout') }}"
									method="POST"
									class="hidden">
									@csrf
								</form>
							</button>
						</li>
					</ul>
				</div>
			@endguest
		</div>

		{{-- lang comp --}}
		<div class="relative | ml-3 md:ml-5" x-data="{ open: false }">
			<button 
				type="button" 
				class="flex items-center py-1 px-4 font-medium text-sm rounded-3xl transition duration-100 hover:bg-gray-200 hover:text-gray-700" 
				:class="open ? 'bg-gray-200 text-gray-700' : 'bg-gray-100 text-gray-500'"
				x-on:click="open = !open"
			>
				<svg class="w-4 h-4 mr-1.5">
					<use xlink:href="{{ asset('sprite.svg').'#lang_'.app()->getLocale() }}"></use>
				</svg>
				
				{{ strtoupper(app()->getLocale()) }}
			</button>
		
			<ul 
				x-show="open"
				@include('includes.animation.dropdown_transition')
				x-on:click.away="open = false"
				class="absolute origin-top top-full mt-2  right-0 rounded-sm shadow py-1.5 overflow-hidden bg-gray-100 text-gray-500"
			>
				@foreach ($langs as $lang)
					<li>
						<a 
							href="{{ route('change-language', $lang) }}"
							x-on:click="open = false"
							class="flex items-center py-1 px-4 font-medium text-sm hover:bg-gray-200 hover:text-gray-700 {{ $lang === app()->getLocale() ? 'opacity-50 pointer-events-none' : '' }}"
						>
							<svg class="w-4 h-4 mr-2">
								<use xlink:href="{{ asset('sprite.svg').'#lang_'.$lang }}"></use>
							</svg>
							
							{{ strtoupper($lang) }}
						</a>
					</li>
				@endforeach
			</ul>
		</div>
	</nav>
</header>