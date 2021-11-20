@extends('layouts.auth')

@section('auth-title', __('Регистрация'))

@push('styles')
	<link rel="stylesheet" href="{{ asset('css/plugins/intltelinput.css') }}"/>
@endpush

@section('auth-background-class', 'auth-bg__register')

@section('content')
	{{-- Terms and Condiitons --}}
	@include('includes.auth.tos_modal')

	<div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 xl:px-24 xl:max-w-2xl reg">
		<h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-4xl
		xl:text-bold">
			{{ __('Регистрация') }}
		</h2>

		{{-- Php Alert Box --}}
		@include('includes.user.tail-alerts')

		{{-- Form --}}
		<div class="mt-12 h-full">
			<form method="POST" action="{{ route('register') }}" id="registerForm">
				@csrf

				{{-- Name --}}
				<div class="lg:px-2">
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						{{ __('Имя') }} *
					</div>

					<input 
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('name') border-red-500 text-red-500 @enderror" 
						type="text" 
						name="name"
						value="{{ old('name') }}"
						placeholder="{{ __('Введите Ваше имя') }}"
						required
						autofocus
					>

					@error('name')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ $message }}
						</span>
					@enderror
				</div>

				{{-- Surname --}}
				<div class="mt-8 lg:px-2">
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						{{ __('Фамилия') }} *
					</div>

					<input 
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('surname') border-red-500 text-red-500 @enderror" 
						type="text" 
						name="surname"
						value="{{ old('surname') }}"
						placeholder="{{ __('Введите Вашу фамилию') }}"
						required
					>

					@error('surname')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ $message }}
						</span>
					@enderror
				</div>

				{{-- Phone --}}
				<div class="mt-8 lg:px-2">
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						{{ __('Телефон') }} *
					</div>

					<input 
						id="phone"
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('phone') border-red-500 text-red-500 @enderror" 
						type="tel" 
						name="phone"
						required
					>

					<input type="hidden" name="phone" id="phone_db">

					{{-- Phone number output  --}}
					<p class="intl-result text-gray-500"></p>

					{{-- Number Validation Messages --}}
					{{-- see https://intl-tel-input.com/node_modules/intl-tel-input/examples/gen/is-valid-number.html --}}
					<p class="intl-success-message mt-1 hidden items-center text-green-400">
						<svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
						</svg>
						{{ __('Корректный формат') }}
					</p>

					<p class="intl-error-message mt-1 hidden items-center text-red-400">
						<svg class="w-5 h-5 mr-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
						</svg>
						{{ __('Вы ввели некорректный формат номера.') }}
					</p>

					@error('phone')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ $message }}
						</span>
					@enderror
				</div>

				{{-- E-mail --}}
				<div class="mt-8 lg:px-2">
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						E-mail *
					</div>

					<input 
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('email') border-red-500 text-red-500 @enderror" 
						type="email" 
						name="email"
						value="{{ old('email') }}"
						placeholder="{{ __('Введите корректную почту') }}"
						required
					>

					@error('email')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ $message }}
						</span>
					@enderror
				</div>

				{{-- Password --}}
				<div class="mt-8 lg:px-2">
					<div class="flex justify-between items-center">
						<div class="text-sm font-bold text-gray-700 tracking-wide">
							{{ __('Пароль') }} *
						</div>
					</div>

					<input 
						name="password"
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('password') border-red-500 text-red-500 @enderror" 
						type="password" 
						placeholder="{{ __('Введите Ваш пароль') }}"
						required
					>

					@error('password')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				{{-- Password Confirm --}}
				<div class="mt-8 lg:px-2">
					<div class="flex justify-between items-center">
						<div class="text-sm font-bold text-gray-700 tracking-wide">
							{{ __('Повторите пароль') }} *
						</div>
					</div>

					<input 
						name="password_confirmation"
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('password_confirmation') border-red-500 text-red-500 @enderror" 
						type="password"
						placeholder="{{ __('Пароль ещё раз') }}"
						required
					>

					@error('password_confirmation')
						<span class="invalid-feedback" role="alert">
							<strong>{{ $message }}</strong>
						</span>
					@enderror
				</div>

				<div class="mt-8 mb-5 lg:px-2">
					<div class="tos tos-common flex items-start">
						<input 
							class="mr-3 mt-1" 
							type="checkbox" 
							name="terms_of_use" 
							id="terms_of_use" 
							required 
							@if(old('terms_of_use')) checked @endif
						>

						<label class="text-sm text-gray-500" for="terms_of_use">
							{{ __('Регистрируясь на нашем сайте, Вы даёте согласие на наше') }} 
							<button 
								type="button" 
								id="tos-link"
								class="underline text-blue-500 hover:text-blue-800"
								x-on:click="showTos = true"
							>
								{{ __('Пользовательское соглашение') }}
							</button>, 
							{{ __('а также подтверждаете, что Вам больше 18 лет и информация, указанная в этой форме, верна.') }}
						</label>
					</div>
				</div>

				{{-- Submit Form --}}
				<div class="mt-10 lg:mx-12">
					<button class="bg-blue-500 text-gray-100 p-4 w-full rounded-full tracking-wide
					font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-blue-600
					shadow-lg">
						{{ __('Регистрация') }}
					</button>
				</div>
			</form>

			{{-- Alert message localized --}}
			<input 
				type="hidden" 
				value="{{ __('Пожалуйста введите корректный номер телефона') }}"
				id="phoneErrorMessage"
			>

			{{-- Huh? --}}
			<div class="mt-4 text-sm font-display font-semibold text-gray-700 text-center">
				{{ __('Уже зарегистрированы?') }}

				<a
					href="{{ route('login') }}" 
					class="cursor-pointer text-blue-600 hover:text-blue-800"
				>
					{{ __('Войти') }}
				</a>
			</div>
		</div>
	</div>
@endsection