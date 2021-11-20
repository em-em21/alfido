@extends('layouts.auth')

@section('auth-title', __('Логин'))

@section('auth-background-class', 'auth-bg__login')

@section('content')
<div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
	<h2 class="text-center text-4xl text-indigo-900 font-display font-semibold lg:text-left xl:text-5xl
	xl:text-bold">
		{{ __('Войти') }}
	</h2>

	{{-- Form --}}
	<div class="mt-12">
		<form method="POST" action="{{ route('login') }}">
			@csrf

			{{-- E-mail --}}
			<div>
				<div class="text-sm font-bold text-gray-700 tracking-wide">
					E-mail
				</div>

				<input 
					class="w-full text-lg p-2 border-b border-gray-300 focus:outline-none focus:border-blue-500 @error('email') border-red-500 text-red-500 @enderror" 
					type="email" 
					name="email"
					autocomplete="email"
					value="{{ old('email') }}"
					placeholder="{{ __('Введите Вашу почту') }}"
					required
					autofocus
				>

				@error('email')
					<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
						{{ $message }}
					</span>
				@enderror
			</div>

			{{-- Password --}}
			<div class="mt-8">
				<div class="flex justify-between items-center">
					<div class="text-sm font-bold text-gray-700 tracking-wide">
						{{ __('Пароль') }}
					</div>
					{{-- Forgot Password --}}
					<div>
						@if (Route::has('password.request'))
							<a 
								href="{{ route('password.request') }}" 
								class="text-xs font-display font-semibold text-blue-600 hover:text-blue-800 cursor-pointer"
							>
								{{ __('Забыли пароль?') }}
							</a>
						@endif 
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

			{{-- Submit Form --}}
			<div class="mt-10">
				<button class="bg-blue-500 text-gray-100 p-4 w-full rounded-full tracking-wide
				font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-blue-600
				shadow-lg">
					{{ __('Войти') }}
				</button>
			</div>
		</form>
		<div class="mt-12 text-sm font-display font-semibold text-gray-700 text-center">
			{{ __('Ещё не зарегистрированы?') }}

			<a
				href="{{ route('register') }}" 
				class="cursor-pointer text-blue-600 hover:text-blue-800"
			>
				{{ __('Регистрация') }}
			</a>
		</div>
	</div>
</div>
@endsection
