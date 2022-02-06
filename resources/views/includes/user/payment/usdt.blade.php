<div>
	@include('includes.user.payment.payment_header', [
		'payment_title' => 'Tether (USDT)',
	])

	<div class="pt-3 pb-12 px-10">
		{{-- header --}}
		<div class="flex flex-col mb-1">
			<p class="mb-2 text-gray-600 text-lg">
				{{ __('Сеть TRC20') }}
			</p>

			<p class="text-green-600 mb-3 text-lg text-semibold">
				{{ __('Скопируйте данные кошелька') }}:
			</p>

			<p class="text-gray-600 text-lg" style="word-break: break-all" id="usdt_wallet">
				{{ $usdt_wallet ?? __('Кошелёк не сгенерирован. Пожалуйста, попробуйте ещё раз.') }}
			</p>
		</div>

		{{-- body --}}
		@isset ($usdt_wallet)
			<div class="flex flex-col">
				{{-- copy code --}}
				<button type="button" class="copy-btn copy-btn__usdt">
					<span class="copyText">{{ __('Скопировать') }}</span>
				</button>
			</div>
		@endisset
	</div>
</div>