@extends('layouts.auth')

@section('auth-title', __('Восстановление пароля'))

@section('auth-background-class', 'auth-bg__register')

@section('content')
	<div class="mt-10 px-12 sm:px-24 md:px-48 lg:px-12 lg:mt-16 xl:px-24 xl:max-w-2xl">
		<h2 class="text-2xl text-indigo-900 font-display font-semibold xl:text-5xl
		xl:text-bold">
			{{ __('Восстановление пароля') }}
		</h2>

		{{-- Php Alert Box --}}
		@include('includes.user.tail-alerts')
	
		{{-- Form --}}
		<div class="mt-12">
			<form method="POST" action="{{ route('password.email') }}">
				@csrf

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
						required
						autofocus
					>

					@error('email')
						<span class="text-red-500 mt-1 text-sm font-normal" role="alert">
							{{ __('Поле ввода было заполнено некорректно.') }}
						</span>
					@enderror
				</div>

				{{-- Submit Form --}}
				<div class="mt-10">
					<button class="bg-blue-500 text-gray-100 p-4 w-full rounded-full tracking-wide
					font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-blue-600
					shadow-lg">
						{{ __('Отправить') }}
					</button>
				</div>
			</form>

			{{-- Go Back --}}
			<div class="mt-6 text-sm font-display font-semibold text-gray-700 text-center">
				<button
					class="text-indigo-500 font-semibold"
					type="button"
					x-on:click="window.history.back()"
				>
					{{ __('Вернуться назад') }}
				</button>
			</div>
		</div>
	</div>
@endsection
