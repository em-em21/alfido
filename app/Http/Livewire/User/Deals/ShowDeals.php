<?php

namespace App\Http\Livewire\User\Deals;

use App\Http\Controllers\User\AdditionalDealController;
use Livewire\WithPagination;
use Livewire\Component;

class ShowDeals extends Component
{
	use WithPagination;

	public $search = '', $current_page_market;

	protected $listeners = [
		'reloadTable' => 'render',
		'close-deal' => 'closeDeal',
	];

	public function mount($market)
	{
		$this->current_page_market = $market;
	}
	
	public function updatingSearchInput()
	{
		$this->resetPage();
	}

	public function confirmClose($id, $profit)
	{
		$this->dispatchBrowserEvent('swal:confirm', [
			'model' => 'deal:close',
			'icon' => 'warning',
			'title' => __('Закрыть сделку?'),
			'confirmText' => __('Закрыть'),
			'text' => '',
			'id' => $id,
			'profit' => $profit
		]);
	}

	public function closeDeal($id, $profit)
	{
		$deal = auth()->user()->deals()->find($id);

		if ($profit > 0) {
			auth()->user()->update([
				'balance' => bcadd(auth()->user()->balance, $profit, 2)
			]);
		}
		
		$deal->update([
			'is_open' => 0,
			'profit' => $profit
		]);

		$this->page = 1;

		$this->emit('getBalance');
		$this->dispatchBrowserEvent('user:location-reload', [
			'message' => __('Сделка закрыта.'),
			'status' => 'success'
		]);
	}

    public function render()
    {
		$this->dispatchBrowserEvent('reindex-table');

		$deals = auth()->user()
					   ->deals()
					   ->whereIsOpen(true)
					   ->whereMarket($this->current_page_market)
					   ->paginate(3); // paginate by 3 to surely avoid wss limit reaching
		
        return view('livewire.user.deals.show-deals', [
			'deals' => $deals
		]);
    }
}
