<div 
	class="fixed top-0 left-0 right-0 bottom-0 flex items-center justify-center w-full h-full bg-gray-900 bg-opacity-75 z-50" 
	x-show.transition="showPayModal"
>
    <div 
		class="modal-wrapper relative flex flex-col mx-10 sm:mx-0 shadow-lg rounded-md overflow-hidden bg-gray-50"
		x-show="showPayModal"
		x-on:click.away="if (modalFocused) showPayModal = false; modalFocused = false"
	>

		{{-- modal header --}}
		@include('includes.user.payment.modal_header')

		<div>
			{{-- choose payment method --}}
			<div x-show="showPayModal && !activePay" class="w-full md:w-120 pb-3 pt-0 px-6">
				@include('includes.user.payment.choose')
			</div>

			{{-- btc --}}
			<div x-show="activePay === 'btc'" class="w-full md:w-96">
				@include('includes.user.payment.bitcoin')
			</div>

			{{-- visamaster --}}
			<div x-show="activePay === 'visamaster'" class="w-full md:w-96">
				@include('includes.user.payment.visamaster')
			</div>

			{{-- beta-transfer --}}
			{{-- <div x-show="activePay === 'beta'" class="w-full md:w-120">
				@include('includes.user.payment.betatransfer')
			</div> --}}

			{{-- tether --}}
			<div x-show="activePay === 'usdt'" class="w-full md:w-120">
				@include('includes.user.payment.usdt')
			</div>
		</div>
    </div>
</div>
