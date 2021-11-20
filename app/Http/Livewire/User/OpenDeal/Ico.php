<?php

namespace App\Http\Livewire\User\OpenDeal;

use Livewire\Component;

class Ico extends Component
{
	public $investment, $ico;
	
	// following variables are declared for validation purposes only
	public $stock_alias, $stock_naming, $market = 0, $dest = 1, $price, $is_ico;

	protected $rules = [
		'investment' => 'required|numeric|min:10|less_than_balance',
		'stock_alias' => 'required|string',
		'stock_naming' => 'required|string',
		'market' => 'required',
		'dest' => 'required',
		'price' => 'required|numeric',
	];

	public function messages()
	{
		return [
			'investment.less_than_balance' => __('Ставка должна быть ниже Вашего текущего баланса.'),
			'investment.required' => __('Данное поле является обязательным'),
			'investment.min' => __('Ставка должна быть выше 10$'),
		];
	}

	public function mount($ico)
	{
		$this->ico = $ico;
		// validation purposes mounting
		$this->price = $this->ico->current_price;
		$this->stock_alias = $this->ico->alias;
		$this->stock_naming = $this->ico->title;
		$this->is_ico = 1;
	}

	/**
	 * Livewire real time validation
	 * 
	 */
	public function updated()
	{
		$this->validateOnly('investment');
	}

	public function openIcoDeal()
	{
		$this->validate();

		auth()->user()->deals()->create([
			'investment' => $this->investment,
			'profit' => $this->investment,
			'price' => $this->price,
			'dest' => $this->dest,
			'market' => $this->market,
			'is_ico' => $this->is_ico,
			'stock_alias' => $this->stock_alias,
			'stock_naming' => $this->stock_naming,
		]);

		auth()->user()->update([
			'balance' => bcsub(auth()->user()->balance, $this->investment, 2)
		]);

		$this->investment = '';
		$this->emit('getBalance');
		$this->dispatchBrowserEvent('user:throw-alert', [
			'message' => __('Сделка открыта. Желаем успешной торговли.'),
			'status' => 'success'
		]);
	}

    public function render()
    {
        return view('livewire.user.open-deal.ico');
    }
}
