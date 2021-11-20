<div class="py-3 px-10 md:py-5 md:px-16">
    <div class="h-1/5 py-1">
		<h1 class="text-indigo-300  text-xl md:text-2xl">
			{{ __('Смена пароля') }}
		</h1>
	</div>

	<div class="h-4/5">
		<form wire:submit.prevent="updatePass" class="flex flex-col">
			@csrf
			@method('PATCH')
	
			{{-- Form Item --}}
			<div class="form-group mt-5">
				<label for="pass" class="label">
					{{ __('Текущий пароль') }}
				</label>
	
				<input 
					id="pass" 
					type="password" 
					class="input" 
					wire:model="pass" 
					required 
					autocomplete="off" 
					placeholder="••••••••••••"
				>

				@include('includes.global.input-error', ['input' => 'pass'])
			</div>
	
			{{-- Form Item --}}
			<div class="form-group">
				<label for="new_pass" class="label">
					{{ __('Новый пароль') }}
				</label>
	
				<input 
					id="new_pass" 
					type="password" 
					class="input" 
					wire:model="new_pass" 
					required 
					autocomplete="off" 
					placeholder="••••••••••••"
				>

				@include('includes.global.input-error', ['input' => 'new_pass'])
			</div>
	
			{{-- Form Item --}}
			<div class="form-group">
				<label for="new_pass_confirm" class="label">
					{{ __('Подтвердите пароль') }}
				</label>
	
				<div class="w-2/4">
					<input 
						id="new_pass_confirm" 
						type="password" 
						class="input" 
						wire:model="new_pass_confirm" 
						required 
						autocomplete="new-password" 
						placeholder="••••••••••••"
					>

					@include('includes.global.input-error', ['input' => 'new_pass_confirm'])
				</div>
			</div>
	
			{{-- Submit Form --}}
			<div class="form-group mt-5">
				<button type="submit" class="bg-indigo-500 hover:bg-indigo-700 rounded text-gray-200 text-lg hover:text-gray-50 hover:shadow-lg py-2 px-5 transition">
					{{ __('Cохранить') }}
				</button>
			</div>
		</form>
	</div>
</div>
