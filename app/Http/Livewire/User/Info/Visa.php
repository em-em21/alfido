<?php

namespace App\Http\Livewire\User\Info;

use Livewire\Component;

class Visa extends Component
{
		public $amount, $cardnumber, $cardholder;

		public function makeWithdrawal()
		{
			if (auth()->user()->is_baned === 1) {
				return $this->dispatchBrowserEvent('user:throw-alert', [
					'message' => __('Команда отклонена. Пожалуйста, обратитесь в техническую поддержку за подробностями.'),
					'status' => 'error'
				]);
			}
	
			if (auth()->user()->is_verified === 0) {
				return $this->dispatchBrowserEvent('user:throw-alert', [
					'message' => __('Для того чтобы осуществлять вывод средств вам необходимо верифицировать свой аккаунт'),
					'status' => 'error'
				]);
			}
	
			auth()->user()->withdrawals()->create([
				'tool' => 'Visa, Mastercard',
				'amount' => $this->amount,
				'cardnumber' => $this->cardnumber,
				'cardholder' => $this->cardholder,
			]);
	
			$this->reset(['amount', 'cardnumber', 'cardholder']);
	
			$this->dispatchBrowserEvent('user:throw-alert', [
				'message' => __('Ваш запрос на вывод средств принят и будет рассмотрен в ближайшем времени.'),
				'status' => 'success'
			]);
		}
		
    public function render()
    {
        return view('livewire.user.info.visa');
    }
}
