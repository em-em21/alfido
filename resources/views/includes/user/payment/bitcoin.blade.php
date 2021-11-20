<div>
	@include('includes.user.payment.payment_header', [
		'payment_title' => 'BTC'
	])

	<div class="pt-3 pb-12 px-10">
		{{-- header --}}
		<div class="flex flex-col mb-1">
			<p class="text-green-600 mb-3  text-xl text-semibold">
				{{ __('Скопируйте данные кошелька') }}:
			</p>

			<p class="text-gray-600 text-lg" style="word-break: break-all" id="textToBeCopied">
				{{ $btc_wallet ?? __('Кошелёк не сгенерирован. Пожалуйста, попробуйте ещё раз.') }}
			</p>
		</div>

		{{-- body --}}
		@isset ($btc_wallet)
			<div class="flex flex-col">
				{{-- copy code --}}
				<button type="button" class="copy-btn copy-btn__btc">
					<span class="copyText">{{ __('Скопировать') }}</span>
				</button>

				{{-- exchanges --}}
				<div class="flex flex-col bg-gray-200 p-3 mt-5 rounded shadow">
					<h3 class="text-gray-700 text-lg ">
						{{ __('Рекомендуемые обменные пункты') }}:
					</h3>

					<div class="flex items-center flex-wrap">
						<a target="_blank" class="flex items-center text-lg underline mb-2 sm:mr-4 sm:mb-0 py-2 text-blue-500 hover:text-blue-800 transition-colors" href="https://www.netex24.net/#/ru/">
							NETEX24

							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
							</svg>
						</a>

						<a target="_blank" class="flex items-center text-lg underline py-2 text-blue-500 hover:text-blue-800 transition-colors" href="https://tytcoin.com">
							Tytcoin

							<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
								<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
							</svg>
						</a>
					</div>
				</div>
			</div>
		@endisset
	</div>
</div>