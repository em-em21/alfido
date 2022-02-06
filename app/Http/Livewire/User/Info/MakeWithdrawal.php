<?php

namespace App\Http\Livewire\User\Info;

use Livewire\Component;

class MakeWithdrawal extends Component
{
	public $tool, $amount, $wallet, $credentials, $cardholder, $cardnumber;

	public function mount($tool)
	{
		$this->tool = $tool ?? 'Tether'; // looks like tool acts like a label too
	}

	public function makeWithdrawal()
	{
		dd([
			'tool' => $this->tool,
			'amount' => $this->amount,
			'wallet' => $this->wallet,
		]);
		
		// if (auth()->user()->is_baned === 1) {
		// 	return $this->dispatchBrowserEvent('user:throw-alert', [
		// 		'message' => __('Команда отклонена. Пожалуйста, обратитесь в техническую поддержку за подробностями.'),
		// 		'status' => 'error'
		// 	]);
		// }

		// if (auth()->user()->is_verified === 0) {
		// 	return $this->dispatchBrowserEvent('user:throw-alert', [
		// 		'message' => __('Для того чтобы осуществлять вывод средств вам необходимо верифицировать свой аккаунт'),
		// 		'status' => 'error'
		// 	]);
		// }

		auth()->user()->withdrawals()->create([
			'tool' => $this->tool,
			'amount' => $this->amount,
			'wallet' => $this->wallet
		]);

		$this->reset(['amount', 'wallet']);

		$this->dispatchBrowserEvent('user:throw-alert', [
			'message' => __('Ваш запрос на вывод средств принят и будет рассмотрен в ближайшем времени.'),
			'status' => 'success'
		]);
	}

	public function render()
	{
		return view('livewire.user.info.make-withdrawal');
	}
}
