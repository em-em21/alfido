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
	{{--  <button type="button" @click="activePay = 'visamaster'" class="w-full md:w-auto m-3 inline-flex items-center justify-center transition shadow hover:shadow-md py-4 px-6 bg-gray-100 rounded opacity-90 hover:opacity-100">
		Visa/MasterCard
	</button>  --}}

	{{--  tether  --}}
	<button 
		type="button"
		class="w-full md:w-auto m-3 py-3 px-16 shadow hover:shadow-md text-gray-50 bg-gray-800 flex items-center justify-center rounded transition opacity-90 hover:opacity-100" 
		@click="activePay = 'usdt'"
	>
		<svg class="w-10 h-10" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 339.43 295.27"><path d="M62.15,1.45l-61.89,130a2.52,2.52,0,0,0,.54,2.94L167.95,294.56a2.55,2.55,0,0,0,3.53,0L338.63,134.4a2.52,2.52,0,0,0,.54-2.94l-61.89-130A2.5,2.5,0,0,0,275,0H64.45a2.5,2.5,0,0,0-2.3,1.45h0Z" style="fill:#50af95;fill-rule:evenodd"/><path d="M191.19,144.8v0c-1.2.09-7.4,0.46-21.23,0.46-11,0-18.81-.33-21.55-0.46v0c-42.51-1.87-74.24-9.27-74.24-18.13s31.73-16.25,74.24-18.15v28.91c2.78,0.2,10.74.67,21.74,0.67,13.2,0,19.81-.55,21-0.66v-28.9c42.42,1.89,74.08,9.29,74.08,18.13s-31.65,16.24-74.08,18.12h0Zm0-39.25V79.68h59.2V40.23H89.21V79.68H148.4v25.86c-48.11,2.21-84.29,11.74-84.29,23.16s36.18,20.94,84.29,23.16v82.9h42.78V151.83c48-2.21,84.12-11.73,84.12-23.14s-36.09-20.93-84.12-23.15h0Zm0,0h0Z" style="fill:#fff;fill-rule:evenodd"/></svg>
{{--  	
		<img class="w-32 h-10 pointer-events-none object-center object-contain" src="{{asset('img/user/payments-profile/qiwi.png')}}">  --}}
	</button>
</div>