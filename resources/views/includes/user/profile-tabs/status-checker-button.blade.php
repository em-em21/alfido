<button 
	type="{{ auth()->user()->isBanedOrNotVerified() ? 'button' : 'submit' }}" 
	data-type="check"
	data-pass="{{ auth()->user()->isBanedOrNotVerified() ? 'false' : 'true' }}"
	@if (auth()->user()->isBanedOrNotVerified())
		data-spec="{{ auth()->user()->is_baned === 1 ? 'baned' : 'not-verified' }}"
	@endif
	class="payment-tab-btn | bg-indigo-500 hover:bg-indigo-700 rounded text-gray-200 text-lg hover:text-gray-50 hover:shadow-lg py-2 px-5 transition"
>
	{{ __('Вывести') }}
</button>