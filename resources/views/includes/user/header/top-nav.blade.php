<nav class="bg-[#212121] flex items-end">
	<div class="container py-2">
		<ul class="flex items-center justify-end w-full space-x-3 sm:space-x-5">
			@if(auth()->user()->role === 2 || auth()->user()->role === 3)
				<li class="flex-row items-center justify-center hidden md:flex">
					<a href="{{ route('admin.index') }}" class="flex items-center text-gray-400 hover:text-white" title="{{ __('Админ-панель') }}">
						<svg class="w-4 h-4 mr-1.5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								<path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd" />
						</svg>

						{{ __('Админ-панель') }}
					</a>
				</li>
			@endif
			
			<li class="flex flex-row items-center justify-center text-gray-400 pointer-events-none" title="Кредит">
				<svg class="w-4 h-4 mr-1 mt-0">
					<use xlink:href="/sprite.svg#credit"></use>
				</svg>
				<span class="c-span">{{auth()->user()->credit}}</span>
			</li>
	
			@livewire('user.balance')

			<li class="flex flex-row items-center justify-center relative z-50">
				<a href="{{ route('user.profile') }}" class="flex items-center text-gray-400 hover:text-white" title="{{ __('Персональная информация') }}">
					<svg class="w-5 h-5 mr-1 mb-px" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd" />
					</svg>

					{{ ucfirst(auth()->user()->name) }}
				</a>
			</li>

			<li class="flex flex-row items-center justify-center relative z-50">
				<button type="submit" class="flex items-center text-gray-400 hover:text-white" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" title="{{ __('Выход') }}">
					<svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z" clip-rule="evenodd" />
					</svg>

					{{ __('Выход') }}
				</button>

				<form id="logout-form" action="{{ route('logout') }}" method="POST" class="hidden">@csrf</form>
			</li>
	
			<!-- 
			<li class="flex flex-row items-center justify-center relative z-50" x-data="{ show: false }" x-cloak>
				<button 
					class="flex items-center justify-center focus:outline-none transition ease-in duration-150 text-gray-400 group-hover:text-gray-100 dropdown-btn"
					type="button" 
					x-on:click="show = !show" 
					:class="{'active': show}"
				>
					{{ ucfirst(auth()->user()->name) }}
					<svg class="h-6 w-6 text-gray-500 arrow" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
					</svg>
				</button>

				<ul 
					class="absolute overflow-hidden rounded-md flex flex-col w-44 right-0 bg-gray-800 shadow-lg origin-top top-full" 
					x-show="show" 
					x-on:click.away="show = false"
					@include('includes.animation.dropdown_transition')
				>
					{{-- Profile Page --}}
					<li class="group text-gray-400 transition ease-out duration-100 inline">
						<a 
							href="{{ route('user.profile') }}" 
							class="w-full flex justify-between items-center p-2 group-hover:text-white hover:bg-slightly-lighter"
						>
							<span>
								{{ __('Мой профиль') }}
							</span>

							<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							  	<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
							</svg>
						</a>
						
					</li>

					{{-- Admin Dashboard --}}
					@if(auth()->user()->role === 2 || auth()->user()->role === 3)
						<li class="group text-gray-400 transition ease-out duration-100 inline md:hidden lg:hidden xl:hidden">
							<a 
								href="{{ route('admin.index') }}" 
								class="w-full flex justify-between items-center p-2 group-hover:text-white hover:bg-slightly-lighter"
							>
								<span>{{ __('Админ-панель') }}</span>

								<svg class="w-5 h-5" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
								  	<path fill-rule="evenodd" d="M7 2a1 1 0 00-.707 1.707L7 4.414v3.758a1 1 0 01-.293.707l-4 4C.817 14.769 2.156 18 4.828 18h10.343c2.673 0 4.012-3.231 2.122-5.121l-4-4A1 1 0 0113 8.172V4.414l.707-.707A1 1 0 0013 2H7zm2 6.172V4h2v4.172a3 3 0 00.879 2.12l1.027 1.028a4 4 0 00-2.171.102l-.47.156a4 4 0 01-2.53 0l-.563-.187a1.993 1.993 0 00-.114-.035l1.063-1.063A3 3 0 009 8.172z" clip-rule="evenodd" />
								</svg>
							</a>
						</li>
					@endif

					{{-- Logout --}}
					<li class="group text-gray-400 transition ease-out duration-100 inline">
						<button  
							class="w-full flex justify-between items-center p-2 group-hover:text-white hover:bg-slightly-lighter"
							onclick="event.preventDefault(); document.getElementById('logout-form').submit();"
						>
							<span>{{ __('Выход') }}</span>

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
			</li>
		-->
		</ul>
	</div>
</nav>
