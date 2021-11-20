<?php

namespace App\Http\Livewire\User\OpenDeal;

use App\Helpers\Utils;
use App\Models\Deal;
use App\Models\Stock;
use Livewire\Component;

class Commodity extends Component
{
    public $stock_price, $stock_alias = 'AAPL', $stock_naming;
    public $investment;
    public $dest = 1; // 1 - buy, 0 - sell
    public $market = 2; // commodity

    public function rules()
    {
        return config('guard-clauses.investment_rules');
    }

    public function messages()
    {
        return config('guard-clauses.investment_messages');
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
            $this->stock_price = Utils::fetchStockPrice($this->stock_alias);
        } catch (\ErrorException $err) {
            $this->dispatchBrowserEvent('fetchPriceException');
            $this->reset();
        }

        $this->validate();

        $deal = new Deal([
            'investment' => $this->investment,
            'market' => $this->market,
            'dest' => $this->dest,
            'profit' => $this->investment,
            'price' => $this->stock_price,
            'stock_alias' => $this->stock_alias,
            'stock_naming' => $this->stock_naming,
        ]);

        auth()->user()->deals()->save($deal);
        auth()->user()->update([
            'balance' => bcsub(auth()->user()->balance, $this->investment, 2)
        ]);

        $this->investment = ''; // can't do reset()
        $this->emit('getBalance');
        $this->emit('reloadTable');
        $this->dispatchBrowserEvent('reindex-table');
        $this->dispatchBrowserEvent('user:throw-alert', [
            'message' => 'Сделка открыта. Желаем успешной торговли.',
            'status' => 'success'
        ]);
    }

    /**
     * Get selected coin/stock alias and naming
     * @param $alias, $naming
     */
    // public function defineCoin($alias, $naming)
    // {
    // 	$this->stock_alias = $alias;
    // 	$this->stock_naming = $naming;
    // }

    public function render()
    {
        return view('livewire.user.open-deal.commodity', [
            'stocks' => Stock::whereMarket(2)->get()
        ]);
    }
}
