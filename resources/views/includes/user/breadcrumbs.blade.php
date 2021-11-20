<div class="w-full flex justify-end breadcrumbs mt-5 p-1 md:px-2 md:pb-3">
	<ol class="flex items-center space-x-2 text-sm">
		<li class="text-gray-400 hover:text-gray-100 hover:underline">
			<a href="{{ route('homepage') }}">{{ __('Главная') }}</a>
		</li>
		<li class="text-gray-600 text-xl">
			&#8725;
		</li>
		<li class="text-gray-50 font-medium">
			@yield('data-title')
		</li>
	</ol>
</div>