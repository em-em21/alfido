<?php

namespace App\Http\Livewire\User\OpenDeal;

use App\Helpers\Utils;
use App\Models\Stock;
use Livewire\Component;

class Crypto extends Component
{
	public $stock_price, $stock_alias = 'BTC', $stock_naming;
	public $investment; 
	public $dest = 1; // 1 - buy, 0 - sell
	public $market = 0; // crypto

	protected $rules = [
		'investment' => 'required|numeric|min:10|less_than_balance',
		'stock_alias' => 'required|string',
		'stock_naming' => 'required|string',
		'market' => 'required',
		'dest' => 'required',
		'stock_price' => 'required|numeric',
	];

	public function messages()
	{
		return [
			'investment.less_than_balance' => __('Ставка должна быть ниже Вашего текущего баланса.'),
			'investment.required' => __('Данное поле является обязательным'),
			'investment.min' => __('Ставка должна быть выше 10$'),
		];
	}

	/**
	 * Livewire real time validation
	 * 
	 */
	public function updated()
	{
		// otherwise it throws an error when switching deal.dest
		if ($this->investment != null)
			$this->validateOnly('investment');
	}

	/**
	 * Store the deal into db (e.g. open a new deal)
	 * --------------------------------------------
	 * 1. fetch coin price & store into variable
	 * 2. fill up new model instance
	 * 3. save balance, do maths, refresh balance, table, etc
	 */
	public function storeDeal()
	{
		$this->stock_naming = Stock::whereAlias($this->stock_alias)->first()->name;

		try {
			$this->stock_price = Utils::fetchCoinPrice($this->stock_alias);
		} catch (\ErrorException $err) {
			$this->dispatchBrowserEvent('fetchPriceException');
			$this->reset();
		}
		
		$this->validate();
			
		auth()->user()->deals()->create([
			'investment' => $this->investment,
			'market' => $this->market,
			'dest' => $this->dest,
			'profit' => $this->investment,
		 	'price' => $this->stock_price,
			'stock_alias' => $this->stock_alias,
			'stock_naming' => $this->stock_naming,
		]);

		auth()->user()->update([
			'balance' => bcsub(auth()->user()->balance, $this->investment, 2)
		]);

		$this->investment = ''; // can't do reset()
		$this->emit('getBalance');
		$this->emit('reloadTable');
		$this->dispatchBrowserEvent('reindex-table');
		$this->dispatchBrowserEvent('user:throw-alert', [
			'message' => __('Сделка открыта. Желаем успешной торговли.'),
			'status' => 'success'
		]);
	}

    public function render()
    {
        return view('livewire.user.open-deal.crypto', [
			'stocks' => Stock::whereMarket(0)->get()
		]);
    }
}
