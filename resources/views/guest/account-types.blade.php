@extends('layouts.guest')

@section('title', __('Типы счетов'))

@section('main-content')
	<section class="flex flex-col">
		{{-- Title --}}
		@include('includes.guest.page-title', [
			'title' => __('Типы счетов'), 
			'class' => 'acctypes-header'
		])

		{{-- Acc Types Table --}}
		<div class="bg-gray-100">
			<div class="container py-16">
				<h1 class="text-purple-600 text-3xl mb-7">
					{{ __('Тарифы') }}
				</h1>
				<div class="max-w-screen overflow-x-auto">
					<table class="w-full text-md bg-white shadow-md rounded-lg mb-4">
						<tbody>
							<tr class="border-b">
								<th class="text-left p-3 px-5 text-lg text-gray-600">{{ __('Типы счетов') }}</th>
								<th class="text-left p-3 px-5 text-lg text-gray-600">Mini</th>
								<th class="text-left p-3 px-5 text-lg text-gray-600">Medium</th>
								<th class="text-left p-3 px-5 text-lg text-gray-600">Premium</th>
								<th class="text-left p-3 px-5 text-lg text-gray-600">V.I.P.</th>
							</tr>
							{{-- --- --}}
							@include('includes.guest.acctypes.table')
						</tbody>
					</table>
				</div>
			</div>
		</div>

		{{-- Article --}}
		<div class="acctypes-islam">
			<div class="container py-12 md:py-16">
				<h3 class="text-purple-400 text-3xl mb-7">
					{{ __('Исламский счет') }}
				</h3>
	
				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-300">
					{{ __('Исламские счета для ведения деятельности на рынке Форекс существуют уже достаточно давно. Страны, где господствующей религией является ислам, как и многие другие государства мира, рассматривают валютный рынок в качестве эффективного инструмента для регулирования валютной политики и осуществления валютных операций при проведении экспортно-импортных сделок.') }}
				</p>

				<h3 class="text-purple-400 text-3xl mb-7 mt-16">
					{{ __('Противоречат ли принципы трейдинга шариату?') }}
				</h3>
	
				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-300">
					{{ __('Этот вопрос возникает в том случае, когда предприниматели, исповедующие ислам, начинают приглядываться к валютному рынку не только как к возможности приобрести необходимую валюту по более выгодной цене, но и как к способу для извлечения прибыли. Сразу следует отметить тот факт, что в мусульманском праве обмен валют разрешен хадисом (изречением, одобрением) о том, что можно обменивать определенные товары друг на друга, но только в одинаковой пропорции и передавая их из рук в руки.') }}
				</p>
				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-300">
					{{ __('Другими словами обмен разрешен при одном условии – при конвертации валют не должно быть разрыва во времени и у одного участника сделки не должна возникать задолженность перед другим участником сделки. Как становится понятно, ислам полностью отвергает ростовщичество, суть которого состоит в разрыве времени – отсрочке. Поэтому, валютные операции осуществляемые без отсрочки платежа и по рыночному курсу установленному на момент сделки, с точки зрения ислама допустимы. Следовательно, операции по обмену валюты в банках и обменных пунктах разрешены.') }}
				</p>
			</div>
		</div>
		
		{{-- One More Faq --}}
		<div class="bg-gray-200" x-data="{
			paragraphs: [
				{
					'id': 0,
					'q': '{{ __('Что такое Гарар?') }}',
					'a': '{{ str_replace("'", "\'", __('Присутствует в финансовых операциях, где продается/покупается то, чем участник сделки не владеет. Сюда можно отнести следующие моменты — трейдер практически всегда покупает/продает валюту не по той цене, что видит на экране компьютера и кредитное плечо (основа маржинальной торговли), позволяющее открывать сделки на сумму, превышающую собственный капитал участника рынка.')) }}'
				},
				{
					'id': 1,
					'q': '{{ __('Что такое Майсир?') }}',
					'a': '{{ str_replace("'", "\'", __('Принято относить прибыль, полученную без вложения труда и капитала. По этой причине под майсир подпадают все азартные игры. Рынок Форекс не принято относить к категории азартных игр. Считается, что трейдер не действует вслепую, а проводит анализ и открывает сделки, руководствуясь реальными прогнозами и расчетами. Но следует признать, что подобными навыками обладаю лишь единицы. А для непрофессионалов — Форекс — игра в рулетку. В этой связи следует заметить, что все брокерские компании настоятельно советуют начинающим трейдерам пройти обучение интернет-трейдингу, прежде чем класть деньги на реальный счет. Другими словами, если трейдер не прошел обучение и торгует с применением кредитного плеча — это значит, что он хочет получить прибыль, не вложив труда и лишь частично на собственные деньги. Делаем вывод: если человек исповедует ислам и хочет попробовать свои силы на рынке Форекс, ему следует пройти хорошее обучение, потренироваться на демо-счете и торговать только собственным денежными средствами.')) }}'
				},
				{
					'id': 2,
					'q': '{{ __('Что такое Риб?') }}',
					'a': '{{ str_replace("'", "\'", __('По поводу понятия риба дискуссии идут постоянно. Кто-то считает, что в отношениях между трейдерами и брокерскими компаниями явно присутствует риба ростовщический процент за оказание услуг в виде спреда, кто-то это утверждение опровергает.')) }}'
				},
			],
			activeItem: null
		}">
			<div class="container py-20">
				{{-- Faq header --}}
				<div class="">
					<h1 class="text-gray-700 text-3xl mb-16">
						{{ __('Подробнее об исламском счёте') }}
					</h1>
				</div>

				{{-- Faq Items --}}
				<div class="mt-16">
					<template x-for="paragraph in paragraphs" x-key="paragraph.id">
						<div>
							{{-- Question --}}
							<div 
								class="block group"
								x-on:click="activeItem = paragraph.id"
							>
								<div class="w-full h-full flex items-center justify-between p-5 text-purple-600 group-hover:text-purple-900 transition-colors duration-150 group-hover:bg-gray-200 group-hover:bg-opacity-50 cursor-pointer" :class="{ 'border-b border-gray-300': paragraphs.length !== paragraph.id + 1 }">
									<h3 x-text="paragraph.q" class="w-10/12 md:w-9/12 lg:w-auto-medium text-lg md:text-xl"></h3>
									<svg 
										class="w-2/12 h-5 md:w-3/12 lg:w-6 lg:h-6 transform transition-transform"
										:class="{'rotate-90': activeItem === paragraph.id}" 
										xmlns="http://www.w3.org/2000/svg" 
										fill="none" 
										viewBox="0 0 24 24" 
										stroke="currentColor"
									>
										<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6v6m0 0v6m0-6h6m-6 0H6" />
									</svg>
								</div>
							</div>

							{{-- Answer --}}
							<div 
								class="p-5" 
								x-show.transition.origin.top="activeItem === paragraph.id"
								x-on:click.away="activeItem = null"
							>
								<p x-text="paragraph.a" class="text-gray-600 text-lg"></p>
							</div>
						</div>
					</template>
				</div>
			</div>
		</div>

		{{-- Acc Bens --}}
		<div class="bg-gray-100">
			<div class="container py-12 md:py-16 lg:py-24">
				<h3 class="text-gray-700 text-3xl mb-7">
					{{ __('Преимущества исламского счета') }}
				</h3>

				<div class="w-full grid grid-cols-1 md:grid-cols-3 md:gap-5 mt-12">
					<div class="w-full flex flex-col items-center mb-7 md:mb-0 p-10 md:p-5 rounded bg-gray-200 bg-opacity-20 shadow-md">
						<img class="w-24 h-24 md:w-16 md:h-16 mb-4" src="{{ asset('img/svg/acctypes/1.svg') }}">
						<p class="text-center text-gray-500">
							{{ __('Отсутствие временных ограничений') }}
						</p>
					</div>
					<div class="w-full flex flex-col items-center mb-7 md:mb-0 p-10 md:p-5 rounded bg-gray-200 bg-opacity-20 shadow-md">
						<img class="w-24 h-24 md:w-16 md:h-16 mb-4" src="{{ asset('img/svg/acctypes/2.svg') }}">
						<p class="text-center text-gray-500">
							{{ __('Отсутствие каких-либо процентов') }}
						</p>
					</div>
					<div class="w-full flex flex-col items-center mb-7 md:mb-0 p-10 md:p-5 rounded bg-gray-200 bg-opacity-20 shadow-md">
						<img class="w-24 h-24 md:w-16 md:h-16 mb-4" src="{{ asset('img/svg/acctypes/3.svg') }}">
						<p class="text-center text-gray-500">
							{{ __('Отсутствие скрытых комиссий и штрафов') }}
						</p>
					</div>
				</div>
			</div>
		</div>

		{{-- How To --}}
		<div class="bg-gray-200">
			<div class="container py-12 md:py-16">
				<h3 class="text-purple-700 text-3xl mb-7">
					{{ __('Как открыть Исламский счет?') }}
				</h3>
	
				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-700">
					{{ __('Для открытия исламского счета требуется подтверждение религиозной принадлежности. Это главное отличие в требованиях брокера при открытии клиентом исламского счета. Во всем остальном процедура открытия этого вида счета аналогична процедуре открытия других счетов.') }}
				</p>

				<p class="max-w-2xl mb-12 leading-2 text-lg text-gray-700">
					{{ __('Вот так обстоят дела в отношении ислама к рынку Форекс. Но, тем не менее, чтобы не ограничивать граждан, исповедующих ислам, брокерские компании специально создали Исламские счета, которые позволяют осуществлять на валютном рынке операции с самыми разными торговыми инструментами при отсутствии свопа и комиссии за перенос позиции.') }}
				</p>
				
				<a class="py-3 px-5 md:py-4 md:px-6 bg-purple-600 shadow-lg hover:shadow-xl transition text-gray-200 hover:text-gray-50 text-lg-medium hover:bg-purple-700 rounded" href="{{ route('crypto') }}">
					{{ __('Открыть торговый счёт') }}
				</a>
			</div>
		</div>
	</section>
@endsection
