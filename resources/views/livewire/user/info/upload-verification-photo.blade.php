<div>
	<form 
		wire:submit.prevent="uploadPhoto"
		wire:loading.class="opacity-50 pointer-events-none transition-opacity" 
		enctype="multipart/form-data"
		x-data="{ displayMessage: false }" {{-- display success message from livewire comp --}}
	>
		@csrf

		<input type="hidden" wire:model="tool">
		<input class="hidden" x-ref="imageInput" type="file" wire:model="image">

		{{-- Choose verification tool --}}
		<div class="form-group w-full">
			<div class="w-full flex items-stretch overflow-hidden rounded-md shadow-md my-3">
				<button type="button" class="w-full py-2 px-4 font-medium transition duration-200 | {{ $tool === 0 ? 'bg-gray-700 text-white' : 'bg-gray-800 text-gray-200' }}" wire:click="$set('tool', 0)">
					{{ __('С помощью паспорта') }}
				</button>

				<button type="button" class="w-full py-2 px-4 font-medium transition duration-200 | {{ $tool === 1 ? 'bg-gray-700 text-white' : 'bg-gray-800 text-gray-200' }}" wire:click="$set('tool', 1)">
					{{ __('С помощью водительских прав') }}
				</button>
			</div>
		</div>

		{{-- Upload / Display an image --}}
		<div class="w-full md:w-2/4">
			<div class="mt-2 rounded-md w-80 h-36 flex items-center justify-center flex-col bg-gray-800 hover:text-gray-300 border border-gray-700 active:border-gray-400 focus:border-gray-400 transition text-indigo-300 hover:bg-opacity-100 bg-opacity-80">
				@if ($image)
					<img src="{{ $image->temporaryUrl() }}" class="w-full h-full object-center object-cover">
				@else
					<button type="button" class="w-full h-full p-3 space-y-3 flex flex-col items-center justify-center" x-on:click="$refs.imageInput.click()">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" viewBox="0 0 20 20" fill="currentColor">
							<path fill-rule="evenodd" d="M4 5a2 2 0 00-2 2v8a2 2 0 002 2h12a2 2 0 002-2V7a2 2 0 00-2-2h-1.586a1 1 0 01-.707-.293l-1.121-1.121A2 2 0 0011.172 3H8.828a2 2 0 00-1.414.586L6.293 4.707A1 1 0 015.586 5H4zm6 9a3 3 0 100-6 3 3 0 000 6z" clip-rule="evenodd" />
						</svg>

						<span class="font-medium">
							{{ __('Выберите изображение') }}
						</span>
					</button>
				@endif
			</div>
		</div>

		@error ($tool)
			<div class="inline-flex items-center mt-3 py-3 px-4 rounded bg-red-200 text-red-600 font-medium">
				<div class="mr-2">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
					</svg>
				</div>

				{{ $message }}
			</div>
		@enderror

		@error ($image)
			<div class="inline-flex items-center mt-3 py-3 px-4 rounded bg-red-200 text-red-600 font-medium">
				<div class="mr-2">
					<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
						<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd" />
					</svg>
				</div>

				{{ $message }}
			</div>
		@enderror

		<div x-on:flash-message.window="displayMessage = true; setTimeout(() => displayMessage = false, 3500)">
			<template x-if="displayMessage">
				<div class="inline-flex items-center mt-3 py-3 px-4 rounded bg-green-200 text-green-800 font-medium">
					<div class="mr-2">
						<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
							<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
						</svg>
					</div>
	
					{{ __($success_message) }}
				</div>
			</template>
		</div>

		<div class="form-group mt-5">
			<button type="submit" class="payment-tab-btn bg-indigo-500 hover:bg-indigo-700 rounded text-gray-200 text-lg hover:text-gray-50 hover:shadow-lg py-2 px-5 transition">
				{{ __('Отправить') }}
			</button>
		</div>
	</form>
</div>
