<div class="w-full" x-data="{ showAlert: true }">
	{{-- success single --}}
	@if (session()->has('success'))
		<div
			class="relative rounded overflow-hidden mx-auto my-6 w-full h-full flex items-center justify-start bg-green-100 px-5 py-3 shadow-lg" 
			role="alert"
			x-show.transition="showAlert"
		>
			<span class="text-green-700 inline-flex text-md xl:text-lg" style="max-width: 95%;">
				{{ session('success') }}
			</span>

			<span 
				class="absolute right-2 top-1 text-green-700 hover:text-gray-50 text-lg cursor-pointer" 
				x-on:click="showAlert=false"
			>
				&#x2715;
			</span>
		</div>
	@endif
	
	{{-- error single --}}
	@if (session()->has('error'))
		<div 
			class="relative rounded overflow-hidden mx-auto my-6 w-full h-full flex items-center justify-start bg-red-100 px-5 py-3 shadow-lg" 
			role="alert"
			x-show.transition="showAlert"
		>
			<span 
				class="text-red-700 inline-flex text-base xl:text-lg" 
				style="max-width: 95%;"
			>
				{{ session('error') }}
			</span>
			
			<span 
				class="absolute right-2 top-1 text-red-700 hover:text-gray-900 text-lg cursor-pointer" 
				x-on:click="showAlert=false"
			>
				&#x2715;
			</span>
		</div>
	@endif
	
	{{-- errors multiple --}}
	@if (count($errors) > 0)	
		<div 
			class="relative rounded overflow-hidden mx-2 my-6 w-full h-full flex flex-col bg-red-100 px-5 py-3 shadow-lg" 
			role="alert"
			x-show.transition="showAlert"
		>
			<ul>
				@foreach ($errors->all() as $error)
					<li 
						class="text-red-700 text-base xl:text-lg" 
						style="max-width: 95%;"
					>
						{{ $error }}
					</li>
				@endforeach
			</ul>

			<span 
				class="absolute right-2 top-1 text-red-700 hover:text-gray-900 text-base lg:text-lg cursor-pointer" 
				x-on:click="showAlert=false"
			>
				&#x2715;
			</span>
		</div>
	@endif
</div>

{{-- JS Alert-Box --}}
<div class="alert-box text-semibold"></div>