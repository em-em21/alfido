@extends('layouts.guest')

@section('title', __('О нас'))

@section('main-content')
	<section class="flex flex-col">
		{{-- Title --}}
		@include('includes.guest.page-title', [
			'title' => __('Знакомство с'). ' ' . config('app.name'), 
			'class' => 'about-header'
		])

		{{-- Bluhhh --}}
		<div class="bg-gray-100 py-16 md:py-20">
			<div class="container">
				<h3 class="text-purple-700 text-3xl mb-5">
					{{ __('О нас') }}
				</h3>

				{{-- --- --}}
				<p class="max-w-4xl mb-5 text-gray-600 leading-2 text-lg">
					{{ __('Alfido - британско-русская компания по созданию программного обеспечения для управления цифровыми активами. Основная деятельность – создание решений для управления цифровыми активами. В течение последних 3 лет команда Alfido работала в формате family-office, обслуживая только собственные средства и активы родных и близких людей. Когда стало понятно, что наша экспертность прошла проверку временем и несколькими кризисами (например, падение рынка криптовалют 2017-2018гг.), наши инструменты хеджирования и заработка стали открытыми для предложений') }}
				</p>
				
				{{-- --- --}}
				<p class="max-w-4xl mb-5 text-gray-600 leading-2 text-lg">
					{{ __('Компания Alfido объединяет две тенденции - основную бизнес-модель криптовалютного мира и очевидную тенденцию доминирования бизнесов с новыми технологическими возможностями. Ведь теперь, вместе с Blockchain-индустрией, можно инвестировать в прорывные технологии на очень ранней стадии.') }}
				</p>

				{{-- --- --}}
				<p class="max-w-4xl mb-5 text-gray-600 leading-2 text-lg">
					{{ __('Миссия Alfido заключается в том, чтобы создать связь между старой и новой экономикой, обслуживать и защищать деньги клиентов, которые ищут возможности инвестирования в новые виды экономических взаимодействий, что невозможно в старых экономиках. Как сообщил директор Alfido, сегодня фонд действует по принципу новой экономики с полностью прозрачным управлением, а также обеспечивает клиентов максимальной экспертизой и пониманием рынка.') }}
				</p>
				
				{{-- --- --}}
				<p class="max-w-4xl mb-5 text-gray-600 leading-2 text-lg">
					{{ __('Alfido позиционируется как долгосрочный фонд, делающий акцент на работе с проектами, стоимость которых будет увеличиваться постепенно, в долгосрочной перспективе. Регистрация в Англии, в самом лояльном для криптопроектов город Лондон, гарантирует не только защиту прав для инвесторов, но и на законодательном уровне защищает деятельность самой компании.') }}
				</p>
			</div>
		</div>
	</section>
@endsection