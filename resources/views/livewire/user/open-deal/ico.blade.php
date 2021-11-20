<div class="card__body p-5">
	<form wire:submit.prevent="openIcoDeal">
		@csrf

		<div class="form-group w-full mb-3">
			<input 
				type="number" 
				wire:model="investment"
				step="0.01" 
				class="text-gray-300 border border-gray-500 rounded shadow-md focus:bg-gray-800 transition ease-out duration-100 px-4 py-2 focus:text-gray-100 focus:border-purple-400 focus:ring-inset w-full text-lg bg-gray-800" 
				placeholder="{{ __('Сумма') }}"
				autocomplete="off"
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

		<button 
			type="{{ auth()->user()->isBanedOrNotVerified() ? 'button' : 'submit' }}" 
			data-type="check"
			data-pass="{{ auth()->user()->isBanedOrNotVerified() ? 'false' : 'true' }}"
			@if (auth()->user()->isBanedOrNotVerified())
				data-spec="{{ auth()->user()->is_baned === 1 ? 'baned' : 'not-verified' }}"
			@endif
			class="
				flex items-center rounded py-2 px-5 mx-1 
				bg-purple-500 hover:bg-purple-700 text-gray-200 hover:text-gray-50 transition 
				{{ $errors->any() ? 'bg-gray-600 opacity-30 cursor-not-allowed hover:bg-gray-600' : '' }}
			"
			{{ $errors->any() ? 'disabled' : '' }}
			{{-- wire:loading.delay.class="bg-gray-600"
			wire:loading.delay.attr="disabled"
			wire:target="openIcoDeal" --}}
		>	
			<span class="text-lg">
				{{ __('Инвестировать') }}
			</span>

			<div wire:loading.delay wire:target="openIcoDeal">
				@include('includes.user.spinner')
			</div>
		</button>
	</form>
</div>