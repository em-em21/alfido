<div class="py-3 px-10 md:py-5 md:px-16">
    <div class="h-1/5 py-1">
		<h1 class="text-indigo-300  text-xl md:text-2xl">
			{{ __('Персональная информация') }}
		</h1>
	</div>
	
	<div class="h-4/5">
		<form wire:submit.prevent="updateInfo" class="flex flex-col">
			@csrf

			{{-- Credit, ID --}}
			<div class="my-2 md:my-3 lg:my-4 self-start">
				<p class=" text-gray-500 text-md md:text-lg">
					ID: 
					<span class="text-gray-300 leading-none mr-5">
						{{ auth()->user()->client_id }}
					</span>
				</p>

				<p class=" text-gray-500 text-md md:text-lg">
					{{ __('Кредит') }}: 
					<span class="text-gray-300 leading-none">
						{{auth()->user()->credit}}
					</span>
				</p>
			</div>
	
			{{-- Form Item --}}
			<div class="form-group w-full md:w-auto">
				<label for="name" class="label">
					{{ __('Имя') }}
				</label>
	
				<input 
					class="input w-full md:w-auto" 
					id="name" 
					type="text" 
					wire:model="name" 
					required 
					autocomplete="name" 
					autofocus
				>

				@include('includes.global.input-error', ['input' => 'name'])
			</div>
	
			{{-- Form Item --}}
			<div class="form-group w-full md:w-auto">
				<label for="surname" class="label">
					{{ __('Фамилия') }}
				</label>
	
				<input 
					id="surname" 
					type="text" 
					class="input w-full md:w-auto" 
					wire:model="surname" 
					required 
				>

				@include('includes.global.input-error', ['input' => 'surname'])
			</div>
	
			{{-- Form Item --}}
			<div class="form-group w-full md:w-auto">
				<label for="phone" class="label">
					{{ __('Телефон') }}
				</label>
	
				<input 
					id="phone" 
					type="text" 
					class="input w-full md:w-auto" 
					wire:model="phone" 
				>

				@include('includes.global.input-error', ['input' => 'phone'])
			</div>
	
			{{-- Form Item --}}
			<div class="form-group w-full md:w-auto">
				<label for="email" class="label">
					E-mail
				</label>
	
				<input 
					id="email" 
					type="email" 
					class="input w-full md:w-auto" 
					wire:model="email" 
					required 
				>

				@include('includes.global.input-error', ['input' => 'email'])
			</div>
	
			{{-- Submit --}}
			<div class="form-group mt-5">
				<button type="submit" class="bg-indigo-500 hover:bg-indigo-700 rounded text-gray-200 text-lg hover:text-gray-50 hover:shadow-lg py-2 px-5 transition">
					{{ __('Cохранить') }}
				</button>
			</div>
		</form>
	</div>
</div>
