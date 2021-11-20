<div>
	@include('includes.user.payment.payment_header', [
		'payment_title' => 'Beta Transfer'
	])

	<div class="pt-3 pb-12 px-10">
		<form action="{{ route('transfer.store') }}" method="POST" class="flex flex-col">
			@csrf

			<div class="flex">
				<img src="{{ asset('img/user/beta-transfer.svg') }}">
			</div>
			
			<div class="mt-5 mb-3">
				<input 
					class="w-full rounded border-gray-400" 
					type="number" 
					step="0.01" 
					name="amount" 
					placeholder="{{ __('Введите сумму') }}" 
					autocomplete="off" 
					required
				>
			</div>

			<button type="submit" class="w-full bg-purple-500 hover:bg-purple-600 transition-colors shadow hover:shadow-md rounded text-gray-50 py-3 px-5">
				{{ __('Перевести') }}
			</button>
		</form>
	</div>
</div>