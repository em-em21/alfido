<footer class="bg-gray-800">
	<div class="container">
		{{-- Info --}}
		<div class="grid gap-10 grid-cols-1 md:grid-cols-2 lg:grid-cols-4 py-20 relative">
			{{-- Info Item --}}
			<ul class="flex flex-col items-center">
				<img class="logo mb-3 w-14" src="{{ asset('img/logo/logo.png') }}">
				<li class="inline-block mb-5 text-lg text-gray-500 text-center">
					<p>
						{{ __('Все права защищены.') }}
						<br>
						&copy; 2016–2021
					</p>
				</li>
			</ul>

			{{-- Info Item --}}
			<ul class="flex flex-col items-center lg:items-start">
				<h6 class="text-gray-500 mb-3 text-lg">
					{{ __('Утилиты') }}
				</h6>

				<li class="inline-block mb-1">
					<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="{{ route('eco.calendar') }}">
						{{ __('Экономический календарь') }}
					</a>
				</li>

				<li class="inline-block mb-1">
					<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="{{ route('analysis') }}">
						{{ __('Технический анализ') }}
					</a>
				</li>
			</ul>

			{{-- Info Item --}}
			<ul class="flex flex-col items-center lg:items-start">
				<h6 class="text-gray-500 mb-3 text-lg">
					{{ __('Информация') }}
				</h6>

				<li class="inline-block mb-1">
					<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="{{ route('account.types') }}">
						{{ __('Типы счетов') }}
					</a>
				</li>
				<li class="inline-block mb-1">
					<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="{{ route('algotrading') }}">
						{{ __('Алготрейдинг') }}
					</a>
				</li>
			</ul>

			{{-- Info Item --}}
			<ul class="flex flex-col items-center lg:items-start">
				<h6 class="text-gray-500 mb-3 text-lg">
					{{ __('Связаться с нами') }}
				</h6>

				<li class="inline-block mb-1">
					<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="{{ route('contacts') }}">
						{{ __('Контакты') }}
					</a>
				</li>

				@if (!empty($settings))
					@if ($settings->phone)
						<li class="inline-block mb-1">
							<span class='text-gray-400 text-lg'>
								{{ __('Тел.') }}:
							</span>
							<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="tel:{{ $settings->phone }}">
								{{ $settings->phone }}
							</a>
						</li>
					@endif
					<li class="inline-block mb-1">
						<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="mailto:{{ $settings->email ?? config('app.email') }}">
							{{ $settings->email ?? config('app.email') }}
						</a>
					</li>
					@if ($settings->whatsapp)
						<li class="inline-block mb-1">
							<a
								target="_blank"
								class="text-gray-300 hover:text-gray-100 transition-colors text-lg" 
								href="https://api.whatsapp.com/send?phone={{ $settings->whatsapp }}"
							>
								WhatsApp: {{ $settings->whatsapp }}
							</a>
						</li>
					@endif
				@endif
				
				<li class="inline-block mb-1">
					<a class="text-gray-300 hover:text-gray-100 transition-colors text-lg" href="https://goo.gl/maps/dH9Ca86ZYPw84Vse7" class="w-full md:w-1/4 flex flex-col items-center lg:items-start__contacts-map">
						{{ __('4042 Lexington St.') }},
						<br>
						{{ __('London, England') }}
					</a>
				</li>
			</ul>
		</div>
	</div>
</footer>
