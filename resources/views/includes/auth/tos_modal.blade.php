<div
	x-show.transition.in="showTos"
	class="fixed top-0 left-0 right-0 bottom-0 z-50 w-full h-full flex items-center justify-center bg-gray-900 bg-opacity-70 shadow-xl"
>
	<div 
		class="tos-modal relative bg-gray-50 text-gray-700 overflow-y-scroll rounded-md p-4 md:p-6 lg:p-8 xl:p-10"
		style="width: 90vw; height: 90vh;"
		x-on:click.away="showTos = false"
	>
		<button 
			type="button" 
			class="w-full md:w-auto p-4 text-center bg-indigo-500 text-gray-50 md:bg-indigo-400 text-md md:text-gray-100 hover:text-gray-50 md:hover:bg-indigo-600 rounded-lg shadow-lg transition-colors ease-in"
			x-on:click="showTos = false"
		>
			{{ __('Перейти обратно на форму') }}
		</button>
		{{-- Terms Eng --}}
		<div class="tos-en" x-show="showTosEn">
			@include('includes.auth.tos_en')
		</div>
		{{-- Terms Rus --}}
		<div class="tos-ru" x-show="showTosRu">
			@include('includes.auth.tos_ru')
		</div>
	</div>
</div>
