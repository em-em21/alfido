<div class="market_forex | card__body h-full">
    <form 
		x-data="{
			dest: 1,
			btnActive: false,
			selected: ''
		}"
		wire:submit.prevent="storeDeal"
		class="flex flex-col items-stretch" 
		wire:loading.delay.class="opacity-50 pointer-events-none"
	>
		@csrf
		@method('POST')

		{{-- Radio --}}
		<div class="form-group">
			<div class="switch-field">
				<input  class="buy"
						wire:model.debounce.500ms="dest"
						:class="{'checked': dest}"
						id="buy"
						type="radio"
						value="1"
						checked>
				<label for="buy" class="bs-buy" x-on:click="dest = 1">
					BUY
				</label>

				<input  class="sell"
						wire:model.debounce.500ms="dest"
						:class="{'checked': !dest}"
						id="sell"
						type="radio"
						value="0">
				<label for="sell" class="bs-sell" x-on:click="dest = 0">
					SELL
				</label>
			</div>
		</div>
		
		{{-- Select --}}
		<div class="form-group">
			<div class="select w-full block relative">

				<select 
					wire:model="stock_alias" 
					class="bg-transparent focus:bg-gray-800 text-gray-300 text-lg w-full rounded focus:ring-0"
					:class="{'border-green-800': dest, 'focus:border-green-800': dest, 'border-red-800': !dest, 'focus:border-red-800': !dest}"
				>
					@foreach($stocks as $stock)
						<option class="text-gray-500 text-lg" value="{{ $stock->alias }}">{{ $stock->name }} | {{ $stock->alias }}</option>
					@endforeach
				</select>
			</div>
		</div>

		{{-- Investment --}}
		<div class="form-group flex flex-col items-start">
			<input 
				:class="{'border-green-800': dest, 'focus:border-green-800': dest, 'border-red-800': !dest, 'focus:border-red-800': !dest}"
				class="input__buy-sell w-full bg-transparent text-gray-400 text-lg rounded shadow-md transition ease-out duration-100 px-3 py-2 focus:shadow-none focus:text-gray-50 focus:ring-0"
				placeholder="{{ __('Сумма в USD') }}"
				wire:model="investment"
				autocomplete="off"
				type="number"
				step="0.01"
				required
			>

			@error('investment')
				<div class="mt-2 flex items-center justify-between w-full">
					<span class="text-red-400 w-4/5 text-sm">
						{{ $message }}
					</span>

					<span class="w-1/5 inline-flex justify-end">
						<svg class="text-red-400 h-5 w-5" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
						</svg>
					</span>
				</div>
			@enderror
		</div>

		{{-- Submit --}}
		{{-- Submit --}}
		<button 
			type="{{ auth()->user()->is_baned ? 'button' : 'submit' }}"
			data-type="check"
			data-pass="{{ auth()->user()->is_baned ? 'false' : 'true' }}"
			@if (auth()->user()->is_baned)
				data-spec="baned"
			@endif
			class="px-3 py-2 rounded-md shadow-md transition-all ease-in duration-150 border border-transparent btn-bs {{ $errors->any() ? 'offmode' : '' }}"
			:class="{'buy': dest, 'sell': !dest}"
			wire:loading.delay.class.remove="buy sell"
			{{ $errors->any() ? 'disabled' : '' }}
			wire:loading.delay.class="offmode"
			wire:loading.delay.attr="disabled"
			wire:target="storeDeal"
		>
			<span class="text-gray-50 text-lg" x-text="dest ? '{{ __('Купить') }}' : '{{ __('Продать') }}'" ></span>
			<div wire:loading.delay wire:target="storeDeal">
				@include('includes.user.spinner')
			</div>
		</button>

	</form>
</div>