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

			<p class="text-gray-600 text-lg" style="word-break: break-all" id="btc_wallet">
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
			</div>
		@endisset
	</div>
</div>