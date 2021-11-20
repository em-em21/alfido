<div
	x-cloak
	x-data="{ show: false, activeTab: 0 }"
	class="customer-modal-layout"
	x-on:got-user-id.window="show = true"
	x-show="show"
>
	<div class="customer-modal">
		{{-- Close Modal --}}
		<button class="customer-modal__close" type="button" x-on:click="show = false">
			<svg><use xlink:href="/sprite.svg#x"></use></svg>
		</button>

		{{-- Tabs --}}
		<div class="customer-modal__tabs">
			<button x-on:click="activeTab = 0" :class="{'active': activeTab === 0}">
				Инфо
			</button>
			
			<button x-on:click="activeTab = 1" :class="{'active': activeTab === 1}">
				Сделки
			</button>
			
			@if (auth()->user()->getRole() === 'admin')
				<button x-on:click="activeTab = 2" :class="{'active': activeTab === 2}">
					Транзакции
				</button>
			@endif
		</div>
		
		{{-- Info --}}
		@isset($customer)
			<div class="customer-modal__sections">
				<div x-show="activeTab === 0">
					@livewire('admin.customer.modal.info')
				</div>

				<div x-show="activeTab === 1">
					@livewire('admin.customer.modal.deals')
				</div>

				@if (auth()->user()->getRole() === 'admin')
					<div x-show="activeTab === 2">
						@livewire('admin.customer.modal.transactions')
					</div>
				@endif
			</div>
		@endisset
	</div>
</div>
