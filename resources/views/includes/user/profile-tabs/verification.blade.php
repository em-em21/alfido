<div>
	{{-- Verification --}}
	@if(auth()->user()->is_verified)
		<div class="tab-content ">
			<div class="m-5 p-3 flex items-center">
				<svg class="w-6 h-6 mr-3 text-green-500" style="margin-bottom: 2px;" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
					<path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd" />
				</svg>
				<span class="text-green-50 text-lg">
					{{ __('Ваш аккаунт верифирован! Желаем успешной торговли!') }}
				</span>
			</div>
		</div>
	@else
		<div x-show="active === 4" class="py-3 px-10 md:py-5 md:px-16">
			<div class="mb-5">
				<h1 class="text-indigo-300  text-xl md:text-2xl flex items-center relative">
					{{ __('Верифицировать аккаунт') }}

					<span class="inline-flex items-center" x-data="{ showTooltip: false }" x-cloak>
						<svg class="w-4 h-4 ml-3 text-gray-200" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor" x-on:mouseover="showTooltip = true" x-on:mouseleave="showTooltip = false">
							<path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-8-3a1 1 0 00-.867.5 1 1 0 11-1.731-1A3 3 0 0113 8a3.001 3.001 0 01-2 2.83V11a1 1 0 11-2 0v-1a1 1 0 011-1 1 1 0 100-2zm0 8a1 1 0 100-2 1 1 0 000 2z" clip-rule="evenodd" />
						</svg>

						<p class="bg-gray-800 p-2 rounded-md shadow-lg absolute right-0 top-full" x-show="showTooltip">
							<em class="text-sm leading-none text-gray-200">
								{{ __('Для того чтобы осуществлять вывод средств вам необходимо верифицировать свой аккаунт') }}
							</em>
						</p>
					</span>
				</h1>
			</div>

			{{-- methods: 0 -> passport, 1 -> driver license --}}
			<div class="tab-content__body">
				@livewire('user.info.upload-verification-photo')
			</div>
		</div>
	@endif
</div>