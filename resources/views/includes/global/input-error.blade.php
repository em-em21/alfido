@error($input)
	<div class="w-full mt-2 flex items-center">
		<span class="inline-flex">
			<svg class="text-red-400 h-5 w-5 mr-1" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
				<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
			</svg>
		</span>

		<span class="text-red-400 w-full">
			{{ $message }}
		</span>
	</div>
@enderror