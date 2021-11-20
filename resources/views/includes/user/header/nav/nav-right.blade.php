<ul class="nav-right flex items-center justify-center lg:max-w-1/4">
	<li class="nav-item">
		<div x-data="{ open: false }" class="relative mr-3 hidden md:block">
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
				class="absolute origin-top top-full mt-2 right-0 rounded-sm shadow py-1.5 overflow-hidden bg-gray-700 text-gray-200"
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
	</li>

    <li class="nav-item">
        <button 
			type="button" 
			x-on:click="showPayModal = true; setTimeout(() => modalFocused = true, 250)"
			class="rounded-sm transition-all ease-in duration-150 border border-transparent py-1.5 px-4 font-medium text-gray-100 bg-green-600 hover:bg-green-500 hover:text-gray-50" 
		>
			{{ __('Депозит') }}
		</button>
    </li>

    <li>
        @livewire('user.algotrading')
    </li>
</ul>