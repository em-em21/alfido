@extends('layouts.auth')

@section('auth-title', __('Смена пароля'))

@section('auth-background-class', 'auth-bg__login')

@section('content')
	<div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
		<h2 class="text-center text-2xl text-indigo-900 font-display font-semibold xl:text-5xl
		xl:text-bold">
			{{ __('Смена пароля') }}
		</h2>

		{{-- Php Alert Box --}}
		@include('includes.user.tail-alerts')
	
		{{-- Form --}}
		<div class="mt-12">
			<form method="POST" action="{{ route('password.request') }}">
				@csrf

				<input type="hidden" name="token" value="{{ $token }}">

				{{-- E-mail --}}
				<div>
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						{{ __('Ваш E-mail') }}
					</div>

					<input 
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('email') border-red-500 text-red-500 @enderror" 
						type="email" 
						name="email"
						autocomplete="email"
						value="{{ old('email') }}"
						placeholder="{{ __('Подтвердите Ваш e-mail') }}"
						required
						autofocus
					>

					@error('email')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ $message }}
						</span>
					@enderror
				</div>

				{{-- Pass --}}
				<div class="mt-8">
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						{{ __('Новый пароль') }}
					</div>

					<input 
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('password') border-red-500 text-red-500 @enderror" 
						type="password" 
						name="password"
						value="{{ old('password') }}"
						placeholder="{{ __('Придумайте новый пароль') }}"
						required
					>

					@error('password')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ $message }}
						</span>
					@enderror
				</div>

				{{-- Pass Confirm --}}
				<div class="mt-8">
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						{{ __('Подтвердите пароль') }}
					</div>

					<input 
						class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('password_confirmation') border-red-500 text-red-500 @enderror" 
						type="password" 
						name="password_confirmation"
						value="{{ old('password_confirmation') }}"
						placeholder="{{ __('Подтвердите Ваш новый пароль') }}"
						required
					>

					@error('password_confirmation')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ $message }}
						</span>
					@enderror
				</div>

				{{-- Submit Form --}}
				<div class="mt-10">
					<button class="bg-blue-500 text-gray-100 p-4 w-full rounded-full tracking-wide
					font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-blue-600
					shadow-lg text-center">
						{{ __('Сохранить изменения') }}
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection