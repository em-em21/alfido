<div class="w-full h-full flex flex-wrap items-center justify-center">
	{{-- btc --}}
	<button 
		class="w-full md:w-auto m-3 py-3 px-6 shadow hover:shadow-md text-gray-50 bg-gray-800 flex items-center justify-center rounded transition opacity-90 hover:opacity-100" 
		@click="activePay = 'btc'"
	>
		<em class="text-sm font-medium">
			Pay with
		</em>
		<svg class="ml-2 w-10 h-10">
			<use xlink:href="/sprite.svg#btc"></use>
		</svg>
	</button>

	{{-- qiwi --}}
	{{-- <a class="w-full md:w-auto m-3 inline-flex items-center justify-center transition shadow hover:shadow-md py-2 px-6 bg-gray-100 rounded opacity-90 hover:opacity-100" href="https://my.qiwi.com/KONSTANTYN-R681oB_QbN?noCache=true" target="_blank">
		<img class="w-32 h-10 pointer-events-none object-center object-contain" src="{{asset('img/user/payments-profile/qiwi.png')}}">
	</a> --}}

	{{-- betat --}}
	{{-- <button class="w-full md:w-auto m-3 inline-flex items-center justify-center transition shadow hover:shadow-md py-4 px-6 bg-gray-100 rounded opacity-90 hover:opacity-100" type="button" @click="activePay = 'beta'">
		<img class="w-32 pointer-events-none object-center object-contain" src="{{ asset('img/user/beta-transfer.svg') }}">
	</button> --}}

	{{-- visa --}}
	<button type="button" @click="activePay = 'visamaster'" class="w-full md:w-auto m-3 inline-flex items-center justify-center transition shadow hover:shadow-md py-4 px-6 bg-gray-100 rounded opacity-90 hover:opacity-100">
		Visa/MasterCard
	</button>
</div>