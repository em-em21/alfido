{{-- Payment Tabs --}}
<ul class="tabs-wrapper">
	<li class="flex-grow">
		<button type="button" class="tab" :class="{'active': activeChildTab === 1}" x-on:click="activeChildTab = 1">
			{{ __('Электронные кошельки') }}
		</button>
	</li>
	<li class="flex-grow">
		<button type="button" class="tab" :class="{'active': activeChildTab === 2}" x-on:click="activeChildTab = 2">
			{{ __('Visa, MasterCard') }}
		</button>
	</li>
	<li class="flex-grow">
		<button type="button" class="tab" :class="{'active': activeChildTab === 3}" x-on:click="activeChildTab = 3">
			{{ __('Wire Transfer') }}
		</button>
	</li>
</ul>

{{-- Tab Content --}}
<div class="tab-content">
	{{-- E Wallets --}}
	<div x-show="activeChildTab === 1">
		@include('includes.user.profile-tabs.payment-tabs.e-wallets')
	</div>

	{{-- Visa | MasterCard --}}
	<div x-show="activeChildTab === 2" class="py-3 px-10 md:py-5 md:px-16">
		@livewire('user.info.visa')
	</div>

	{{-- Wire --}}
	<div x-show="activeChildTab === 3">
		@include('includes.user.profile-tabs.payment-tabs.wire')
	</div>
</div>