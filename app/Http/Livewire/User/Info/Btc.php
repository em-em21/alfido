<?php

namespace App\Http\Livewire\User\Info;

use Livewire\Component;

class Btc extends Component
{
    public $amount, $wallet;

    protected $rules = [
        'wallet' => ['required', 'alpha_num'],
        'amount' => ['required', 'numeric', 'min:1'],
    ];

	public function makeWithdrawal()
	{
        $this->validate();
        
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
			'tool' => 'Bitcoin',
			'amount' => $this->amount,
            'wallet' => $this->wallet,
		]);

		$this->reset(['amount', 'wallet']);

		$this->dispatchBrowserEvent('user:throw-alert', [
			'message' => __('Ваш запрос на вывод средств принят и будет рассмотрен в ближайшем времени.'),
			'status' => 'success'
		]);
	}
    
    public function render()
    {
        return view('livewire.user.info.btc');
    }
}
