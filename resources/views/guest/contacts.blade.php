@extends('layouts.guest')

@section('title', __('Контакты'))

@section('main-content')
	<section class="flex flex-col">
		{{-- Title --}}
		@include('includes.guest.page-title', [
			'title' => __('Контакты'), 
			'class' => 'contacts-header'
		])

		{{-- Info --}}
		<div class="py-14 md:py-20 bg-gray-200 md:px-10 lg:px-20">
			<div class="container">
				{{-- Title --}}
				<h1 class="text-gray-700 text-3xl mb-7 border-b-2 border-gray-300 py-3">
					{{ __('Связаться с нами') }}
				</h1>

				{{-- Grid --}}
				<div class="grid grid-cols-1 items-center md:grid-cols-2 gap-5 md:gap-8">
					<div class="h-80 md:h-full md:opacity-75 hover:opacity-100 transition-opacity shadow-lg hover:shadow-xl rounded-md overflow-hidden">
						{{-- <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2762.163444795244!2d6.12437471548613!3d46.18730609292254!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x478c7bd639bc828f%3A0xe0b9e518f4de34c9!2sRegus%20-%20Geneva%2C%20Pont%20Rouge!5e0!3m2!1sru!2s!4v1611051987911!5m2!1sru!2s" width="100%" height="100%" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe> --}}
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2483.010164375063!2d-0.1383150843432883!3d51.51302951811267!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487604d491edbd8b%3A0xac67208417fd4281!2zNDA0MiBMZXhpbmd0b24gU3QsIExvbmRvbiBXMUYgMExOLCDQktC10LvQuNC60L7QsdGA0LjRgtCw0L3QuNGP!5e0!3m2!1sru!2s!4v1621355292077!5m2!1sru!2s" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
					</div>

					<div class="mt-10 md:mt-0">
						<ul class="px-10 md:px-14 lg:px-16">
							<li class="flex flex-col text-gray-400 mb-5">
								<p class="inline-flex items-center ">
									<svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M7 2a2 2 0 00-2 2v12a2 2 0 002 2h6a2 2 0 002-2V4a2 2 0 00-2-2H7zm3 14a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
									</svg>
									<span>
										{{ __('Телефон') }}
									</span>
								</p>

								<a href="#" class="pl-8 text-purple-500 underline hover:text-gray-800 transition-colors text-md mt-3">
									{{ $settings->phone ?? 'N/A' }}
								</a>
							</li>
							<li class="flex flex-col text-gray-400 mb-5">
								<p class="inline-flex items-center ">
									<svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
										<path d="M2.003 5.884L10 9.882l7.997-3.998A2 2 0 0016 4H4a2 2 0 00-1.997 1.884z" />
										<path d="M18 8.118l-8 4-8-4V14a2 2 0 002 2h12a2 2 0 002-2V8.118z" />
									</svg>
									<span>
										{{ __('Почта') }}
									</span>
								</p>
								<a href="mailto:{{ config('app.email') }}" class="pl-8 text-purple-500 underline hover:text-gray-800 transition-colors text-md mt-3">
									{{ $settings->email ?? config('app.email') }}
								</a>
							</li>
							<li class="flex flex-col text-gray-400 mb-5">
								<p class="inline-flex items-center ">
									<svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M5.05 4.05a7 7 0 119.9 9.9L10 18.9l-4.95-4.95a7 7 0 010-9.9zM10 11a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd" />
									</svg>
									<span>
										{{ __('Адрес') }}
									</span>
								</p>
								<a href="https://www.google.ru/maps/place/4042+Lexington+St,+London+W1F+0LN,+%D0%92%D0%B5%D0%BB%D0%B8%D0%BA%D0%BE%D0%B1%D1%80%D0%B8%D1%82%D0%B0%D0%BD%D0%B8%D1%8F/@51.5130295,-0.1383151,17z/data=!3m1!4b1!4m5!3m4!1s0x487604d491edbd8b:0xac67208417fd4281!8m2!3d51.5130262!4d-0.1361264" target="_blank" class="pl-8 text-purple-500 underline hover:text-gray-800 transition-colors text-md mt-3">
									{{ __('4042 Lexington St.') }},
									<br>
									{{ __('London, England') }}
								</a>
							</li>
							<li class="flex flex-col text-gray-400">
								<p class="inline-flex items-center ">
									<svg class="w-6 h-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
										<path fill-rule="evenodd" d="M5 3a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2V5a2 2 0 00-2-2H5zm0 2h10v7h-2l-1 2H8l-1-2H5V5z" clip-rule="evenodd" />
									</svg>
									<span>
										WhatsApp
									</span>
								</p>
								<a href="#" class="pl-8 text-purple-500 underline hover:text-gray-800 transition-colors text-md mt-3">
									{{ $settings->whatsapp ?? 'N/A' }}
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection
