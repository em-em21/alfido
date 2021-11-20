@extends('layouts.guest')

@section('title', __('Технический анализ'))

@section('main-content')
	{{-- Analysis Wrapper --}}
	<section class="flex flex-col">
		{{-- Title --}}
		@include('includes.guest.page-title', [
			'title' => __('Технический анализ'), 
			'class' => 'analysis-header'
		])

		{{-- Article --}}
		<div class="bg-gray-800">
			<div class="container py-12 md:py-16">
				<h3 class="text-purple-400 text-3xl mb-7">
					Технический анализ криптовалют и Forex
				</h3>
	
				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-300">
					Сводится к выявлению наиболее подходящего момента для входа в рынок, чтобы «купить дешевле, продать дороже» — это может быть обнаружение точки разворота тренда, определение того, подходит ли для входа в рынок его направление в текущий момент, или, например, выявление потенциальных возможностей для заработка даже в период флэта. На восходящем или бычьем тренде можно заработать как на росте цены валютной пары, так и на временных откатах (коррекции).
				</p>
	
				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-300">
					В случае непредвиденного разворота цены против открытых сделок трейдеру предстоит самостоятельно определить хотя бы приблизительное время закрытия сделок с прибылью. Поиск точки закрытия проводится на основании тех же правил технического анализа.
				</p>

				<h3 class="text-purple-400 text-3xl mb-7 mt-16">
					Базовые постулаты технического анализа
				</h3>
	
				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-300">
					Для простоты применения теханализа торговый период от начала торгов в понедельник до их завершения в пятницу разделяют на равные промежутки – тайм-фреймы. Благодаря им открывается возможность анализа наиболее значимых параметров. К ним относятся цена на момент открытия/закрытия периода, ценовой минимум/максимум, объемы.
				</p>

				<p class="max-w-2xl mb-5 leading-2 text-lg text-gray-300">
					Базовые постулаты технического анализа являются основой практически любой торговой стратегии.
				</p>

				<div class="grid grid-cols-1 md:grid-cols-3 gap-5 mt-12">
				 	<div class="bg-slightly-lighter rounded-lg shadow-lg p-5">
						<h3 class="text-lg text-purple-400">
							Цены учитывают все
						</h3>
						<p class="mt-3 text-gray-400">
							На их изменение влияет абсолютно любой политический или экономический фактор (иногда и климатический). Степень влияния обусловлена значимостью для государства, валютой которого ведется торговля.
						</p>
					 </div>
				 	<div class="bg-slightly-lighter rounded-lg shadow-lg p-5">
						<h3 class="text-lg text-purple-400">
							Подчинение цен трендам
						</h3>
						<p class="mt-3 text-gray-400">
							Ценность валют постоянно изменяется. В результате валютные пары то подрастают, то падают в цене. В определенные периоды может возникать флэт — время неопределенности, когда цена с течением времени сильно не меняется.
						</p>
					 </div>
				 	<div class="bg-slightly-lighter rounded-lg shadow-lg p-5">
						<h3 class="text-lg text-purple-400">
							История повторяется
						</h3>
						<p class="mt-3 text-gray-400">
							Разворот тренда, флэтовое состояние рынка наблюдаются на одних и тех же уровнях цен. Однажды подмеченная тенденция может повторяться многократно, что трейдеры используют в торговых системах.
						</p>
					 </div>
				</div>
			</div>
		</div>

		{{-- Article --}}
		<div class="bg-gray-100">
			<div class="container py-12 md:py-16">
				<h3 class="text-purple-700 text-3xl mb-7">
					Основы технического анализа
				</h3>

				{{-- Basics --}}
				<div class="grid grid-cols-1 gap-8">
					{{-- Item --}}
					<div class="bg-gray-50 rounded-lg shadow-lg p-10 relative">
						<h1 class="text-2xl md:text-3xl text-green-500 mb-5 ">
							Cтандартные и нестандартные таймфреймы
						</h1>

						<p class="text-gray-500 text-lg md:text-xl leading-2 max-w-4xl">
							Торговая платформа предлагает несколько стандартных временных промежутков – от М1 (минута) до MN (месяц). Разделяется график на девять тайм-фреймов, помимо крайних используются М5, М15, М30, Н1, Н4, D1, W1. От выбора периода зависит динамика визуального изменения цен. Краткосрочные торговые системы используют временные промежутки не старше М30. Иногда трейдеры прибегают к формированию нестандартных тайм-фреймов. Их задача — компенсировать недостатки типовых значений. Например, если индикатором на Н1 отображается запоздалое значение, а на М30 оно «торопится». Предположительно «среднее значение», т.е. тайм-фрейм М45 должен показывать наиболее точное время для открытия сделок.
						</p>

						<span class="text-3xl md:text-6xl absolute right-5 top-5 text-green-500">
							1
						</span>
					</div>

					{{-- Item --}}
					<div class="bg-gray-50 rounded-lg shadow-lg p-10 relative">
						<h1 class="text-2xl md:text-3xl text-green-500 mb-5 ">
							Инструменты технического анализа
						</h1>

						<p class="text-gray-500 text-lg md:text-xl leading-2 max-w-4xl">
							Периодическое повторение ранее происходивших событий позволяет подготовиться к ним и, своевременно выявив тенденцию к возврату на прежние позиции, заработать прибыль. В арсенале трейдера масса инструментов: уровни поддержки/сопротивления, восходящие и нисходящие каналы. В терминал встроены функции начертания нужных линий на графике валютной пары, доступ к ним предоставляется с панели «Графические инструменты».
						</p>

						<span class="text-3xl md:text-6xl absolute right-5 top-5 text-green-500">
							2
						</span>
					</div>

					{{-- Item --}}
					<div class="bg-gray-50 rounded-lg shadow-lg p-10 relative">
						<h1 class="text-2xl md:text-3xl text-green-500 mb-5 ">
							Применение японских свечей
						</h1>

						{{-- List --}}
						<div class="my-10">
							<h6 class="mb-4 text-gray-400 text-lg md:text-xl">
								В теханализ Форекс входит контроль таких составляющих японских свечей как:
							</h6>

							<ul>
								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Тело свечи.</span> Цвет означает направление движения цены. По умолчанию белый используется для растущих свеч, а черный – для снижающихся
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Размер свечи.</span> Он указывает на силу давления продавцов/покупателей. Встречаются свечи Доджи, когда цена открытия равна цене закрытия. По умолчанию белый используется для растущих свеч, а черный – для снижающихся
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Наличие хвоста и его размер.</span> Отображает нерешительность продавцов/покупателей на рынке, что приводит к колебаниям цены вокруг неизменного уровня.
								</li>
							</ul>
						</div>

						<p class="text-gray-500 text-lg md:text-xl leading-2 max-w-4xl">
							Из различного вида свечей складываются фигуры, их сочетание может использоваться для определения текущей тенденции (тренда), приближающегося разворота. При отсутствии определенности по свече периода Н1 трейдер переключается на младшие тайм-фреймы и тем самым обеспечивает более точный теханализ Форекс. Если речь идет о скальпинге, действуют наоборот – работают в основном на младших ТФ, а общую тенденцию смотрят на старших.
						</p>

						<p class="text-gray-500 text-lg md:text-xl leading-2 max-w-4xl mt-8">
							Еще свечи отображают волатильность валютной пары. Если переключиться на периоды от H4 и выше, станет понятно, в каком диапазоне движется цена в текущем месяце или на этой неделе, есть ли риск разворота, входа рынка в долгосрочный флэт. Точный результат достигается за счет дополнительных инструментов, поиска паттернов, индикаторов. Когда трейдер рассчитывает на долгосрочную перспективу, более динамичная картина на ТФ младше Н1 позволяет быстрее среагировать на сигналы, появившиеся на промежутках Н4 и выше.
						</p>

						<span class="text-3xl md:text-6xl absolute right-5 top-5 text-green-500">
							3
						</span>
					</div>

					{{-- Item --}}
					<div class="bg-gray-50 rounded-lg shadow-lg p-10 relative">
						<h1 class="text-2xl md:text-3xl text-green-500 mb-5 ">
							Графические фигуры
						</h1>

						{{-- List --}}
						<div class="my-10">
							<h6 class="mb-4 text-gray-400 text-lg md:text-xl">
								Применяется 10 базовых фигур технического анализа:
							</h6>

							<ul>
								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Треугольник.</span> Встречается бычий, медвежий и симметричный (последний означает продолжение предыдущей тенденции).
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Бриллиант.</span> Визуально на графике формируется подобие ромба, вершины которого упираются в уровни сопротивления/поддержки.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Двойная вершина.</span> Разворотный паттерн, пригодный для применения как в качестве отдельного инструмента, так и дополнительного сигнала.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Клин.</span> Одна из «долгоиграющих» фигур, может формироваться в течение большого периода, что удобно для использования в долгосрочных торговых стратегиях.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Тройное дно.</span> Позволяет определить направление пробоя в период флэта.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Тройная вершина.</span> Один из инструментов для определения точки разворота тренда, работающего в моменты консолидации.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Двойное дно.</span> Еще одна фигура, указывающая на смену нисходящей тенденции на восходящую.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Флаг.</span> Наблюдается после новостных импульсов, указывает на его продолжение по ранее определенному направлению.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Блюдце.</span> Фигура, используемая любителями долгосрочной торговли.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Вымпел.</span> Паттерн, похожий на флаг, имеющий сходное определение.
								</li>
							</ul>
						</div>

						<span class="text-3xl md:text-6xl absolute right-5 top-5 text-green-500">
							4
						</span>
					</div>

					{{-- Item --}}
					<div class="bg-gray-50 rounded-lg shadow-lg p-10 relative">
						<h1 class="text-2xl md:text-3xl text-green-500 mb-5 ">
							Виды индикаторов
						</h1>

						{{-- List --}}
						<div class="my-10">
							<h6 class="mb-4 text-gray-400 text-lg md:text-xl">
								Индикаторы условно разделяют на несколько категорий:
							</h6>

							<ul>
								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Трендовые.</span> Показывают направление, силу тренда, вероятность разворота.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Осцилляторы.</span> Отображают математическую модель измерения темпов изменений на рынке.
								</li>

								<li class="text-gray-600 text-lg md:text-xl mb-3 max-w-3xl">
									<span class="text-indigo-600 text-bold text-lg md:text-xl">Билла Вильямса и Объемы.</span> Работают на «отдельной теории», но имеют довольно высокую эффективность в краткосрочной и долгосрочной торговле.
								</li>
							</ul>
						</div>

						<p class="text-gray-500 text-lg md:text-xl leading-2 max-w-4xl">
							Ключевой задачей индикаторов является указание рекомендуемого направления для входа в рынок (ордера Buy или Sell), показание волатильности для прогнозирования прибыли. Без их применения трейдеру придется ориентироваться на «более простые» сигналы – уровни поддержки/сопротивления, линии трендового канала. Многие торговые стратегии содержат правила сочетания показаний разных индикаторов. При появлении условий на одном из них (условно главном) трейдер ищет подтверждение на других. И только при совпадении принимается решение об открытии сделки. Если его нет, ждут следующего сигнала «основного» индикатора.
						</p>

						<span class="text-3xl md:text-6xl absolute right-5 top-5 text-green-500">
							5
						</span>
					</div>
				</div>
			</div>
		</div>

		{{-- Action CTA --}}
		@include('includes.guest.cta')
	</section>
@endsection
