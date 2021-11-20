<div>
	{{-- Header --}}
	<div class="h-1/5 py-1 mb-3">
		<h1 class="text-white font-medium text-xl md:text-2xl">
			{{ $tool }}
		</h1>
	</div>

	{{-- Body --}}
	<div>
		<form wire:submit.prevent="makeWithdrawal" wire:loading.class="transition opacity-50 pointer-events-none">
			@csrf

			<div class="form-group">
				<label class="label">{{ __('Сумма') }}</label>

				<div class="w-2/4">
					<input 
						type="number" 
						wire:model="amount"
						autocomplete="off"
						step="0.01"
						class="input"
						inputmode="numeric"
						placeholder="{{ __('Введите сумму') }}"
						required
					>

					@error('amount')
							<p class="mt-2 font-medium text-red-500">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="form-group">
				<label class="label">{{ __('Номер кошелька') }}</label>

				<div class="w-2/4">
					<input 
						type="text"
						wire:model="wallet"
						class="input"
						autocomplete="off"
						placeholder="{{ __('Введите номер кошелька') }}"
						required
					>

					@error('wallet')
							<p class="mt-2 font-medium text-red-500">{{ $message }}</p>
					@enderror
				</div>
			</div>

			<div class="form-group mt-8">
				<button type="submit" class="bg-indigo-500 hover:bg-indigo-700 rounded text-[0.9rem] font-medium text-gray-200 hover:text-gray-50 hover:shadow-lg py-3 px-6 transition">
					{{ __('Вывести') }}
				</button>
			</div>
		</form>
	</div>
</div>