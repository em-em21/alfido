<div class="flex items-center py-0 px-7 text-gray-500">
	<button class="w-7 h-7 hover:text-gray-800" x-on:click="activePay = null">
		<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
			<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16l-4-4m0 0l4-4m-4 4h18" />
		</svg>
	</button>

	<h5 class="ml-3 text-xl">
		{{ $payment_title ?? '' }}
	</h5>
</div>