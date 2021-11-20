<div>
	{{-- Header --}}
	<div class="flex flex-col md:flex-row items-center py-5">
		<img class="w-16 mr-3" src="{{ asset('img/user/payments-profile/mastercard.png') }}">
		<img class="w-24 mr-3" src="{{ asset('img/user/payments-profile/visa.png') }}">
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
				</div>
			</div>

			<div class="form-group">
				<label class="label">{{ __('Ф.И.О.') }}</label>
				
				<div class="w-2/4">
					<input 
						type="text" 
						wire:model="cardholder" 
						class="input" 
						placeholder="{{ __('Введите Ф.И.О.') }}" 
						required
					>
				</div>
			</div>
	
			<div class="form-group">
				<label class="label">
					{{ __('Номер карты') }}
				</label>
				
				<div class="w-2/4">
					<input 
						type="tel" 
						placeholder="xxxx xxxx xxxx xxxx"
						autocomplete="cc-number"
						maxlength="19"
						inputmode="numeric"
						pattern="[0-9\s]{13,19}"
						wire:model="cardnumber" 
						class="input" 
						placeholder="{{ __('Введите номер карты') }}" 
						required
					>
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