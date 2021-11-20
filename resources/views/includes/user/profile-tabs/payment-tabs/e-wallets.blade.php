{{-- E-Wallets Tabs --}}
<ul class="tabs-wrapper items-stretch">
	{{-- Yandex --}}
	<li class="flex-grow">
		<button type="button" class="tab h-full" :class="{'active': activePaymentTab === 1}" x-on:click="activePaymentTab = 1">
			<img class="w-24 object-cover object-center" src="{{ asset('img/user/payments-profile/yandex.png') }}">
		</button>
	</li>

	{{-- Webmoney --}}
	<li class="flex-grow">
		<button type="button" class="tab h-full" :class="{'active': activePaymentTab === 2}" x-on:click="activePaymentTab = 2">
			<img class="w-36 object-cover object-center" src="{{ asset('img/user/payments-profile/webmoney.png') }}">
		</button>
	</li>

	{{-- Qiwi --}}
	<li class="flex-grow">
		<button type="button" class="tab h-full" :class="{'active': activePaymentTab === 3}" x-on:click="activePaymentTab = 3">
			<img class="w-24 object-cover object-center" src="{{ asset('img/user/payments-profile/qiwi.png') }}">
		</button>
	</li>
</ul>

{{-- Tab Content --}}
<div class="py-3 px-10 md:py-5 md:px-16">
	{{-- Yandex --}}
	<div x-show="activePaymentTab === 1">
		@livewire('user.info.make-withdrawal', ['tool' => 'Yandex Money'])
	</div>

	{{-- Webmoney --}}
	<div x-show="activePaymentTab === 2">
		@livewire('user.info.make-withdrawal', ['tool' => 'Webmoney'])
	</div>

	{{-- Qiwi --}}
	<div x-show="activePaymentTab === 3">
		@livewire('user.info.make-withdrawal', ['tool' => 'Qiwi'])
	</div>
</div>