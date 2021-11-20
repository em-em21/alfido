<div class="flex flex-col py-4 px-6">
	<div class="flex items-center justify-between">
		<h3 class="text-2xl  text-gray-600">
			{{ __('Депозит') }}
		</h3>
		<button type="button" class="w-6 h-6 text-gray-500 hover:text-gray-800" x-on:click="showPayModal = false; modalFocused = false">
			<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
			</svg>
		</button>
	</div>

	<h4 x-show="showPayModal && !activePay" class="pl-1 text-center sm:text-left text-lg text-gray-500 mt-4">
		{{ __('Выберите способ оплаты') }}:
	</h4>
</div>