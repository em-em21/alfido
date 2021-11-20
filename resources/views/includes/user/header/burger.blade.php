<div class="burger lg:hidden xl:hidden">
	{{-- Burger menu trigger --}}
    <button type="button" class="flex items-center justify-center group-hover:text-gray-200" x-on:click="showBurger = true">
        <svg class="w-7 h-7 text-gray-400" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
			<path fill-rule="evenodd" d="M3 5a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 10a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1zM3 15a1 1 0 011-1h12a1 1 0 110 2H4a1 1 0 01-1-1z" clip-rule="evenodd" />
		</svg>

		<span class="ml-2 text-gray-400  text-lg transition duration-100 hidden md:inline">{{ __('Меню') }}</span>
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
			<svg class="text-gray-500 w-8 h-8 focus:text-gray-100 active:text-gray-200 active:bg-gray-800 active:p-1 absolute right-4 top-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
				<path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd" />
			</svg>
		</button>
		
		{{-- Menu --}}
		<ul class="flex flex-col items-start px-10 mb-5">
			<p class="text-xl text-purple-400 mb-5 border-b border-purple-400">
				{{ __('Меню') }}
			</p>

			@include('includes.user.header.menu', [
				'drop_classes' => 'w-full',
				'drop_trigger_classes' => 'text-lg text-gray-300 border-b border-gray-800 rounded py-2 px-3 hover:text-gray-100'
			])
		</ul>

		{{-- Switch language --}}
		<div x-data="{ open: false }" class="relative pt-5 mb-3 mx-auto border-t border-gray-700">
			<button 
				type="button" 
				class="flex items-center py-1 px-4 font-medium text-sm rounded-3xl transition duration-100 hover:bg-gray-800 hover:text-gray-50" 
				:class="open ? 'bg-gray-800 text-gray-50' : 'bg-gray-700 bg-opacity-50 text-gray-200'"
				x-on:click="open = !open"
			>
				<svg class="w-4 h-4 mr-1.5 mt-px">
					<use xlink:href="{{ asset('sprite.svg').'#lang_'.app()->getLocale() }}"></use>
				</svg>
				
				{{ strtoupper(app()->getLocale()) }}
			</button>
		
			<ul 
				x-show="open"
				@include('includes.animation.dropdown_transition')
				x-on:click.away="open = false"
				class="absolute origin-top top-full mt-2 left-0 rounded-sm shadow py-1.5 overflow-hidden bg-gray-700 text-gray-200"
			>
				@foreach ($langs as $lang)
					<li>
						<a 
							href="{{ route('change-language', $lang) }}"
							x-on:click="open = false"
							class="flex items-center py-1 px-4 font-medium text-sm hover:bg-gray-900 hover:bg-opacity-20 hover:text-gray-50 {{ $lang === app()->getLocale() ? 'opacity-50 pointer-events-none' : '' }}"
						>
							<svg class="w-4 h-4 mr-1.5 mt-px">
								<use xlink:href="{{ asset('sprite.svg').'#lang_'.$lang }}"></use>
							</svg>
							
							{{ strtoupper($lang) }}
						</a>
					</li>
				@endforeach
			</ul>
		</div>

		{{-- Menu footer --}}
		<div class="flex flex-col items-center">
			<img class="logo" src="{{ asset('img/logo/logo.png') }}">

			<p class="text-gray-500 mt-2">
				{{ __('Все права защищены.') }}
			</p>

			<p class="text-gray-500 mt-2">
				Alfido Invest &copy; {{ \Carbon\Carbon::now()->year }}
			</p>
		</div>
	</div>
</div>