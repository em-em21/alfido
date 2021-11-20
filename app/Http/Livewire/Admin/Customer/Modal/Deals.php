<?php

namespace App\Http\Livewire\Admin\Customer\Modal;

use App\Events\AdminChangedUsersData;
use App\Events\ProfitChanged;
use App\Models\User;
use Livewire\Component;

class Deals extends Component
{
	public $customer;
	public $deal_profit = [];

	// Edit Deal
	public $deal_to_be_edited = null;
	public $deal_new_profit = null;

	// Listen to confirmation from sweetAlert
	protected $listeners = [
		'user:ready' => 'setCustomer',
		'deal:delete' => 'deleteDeal',
	];

	// define customer instance
	public function setCustomer($id)
	{
		$this->customer = User::find($id);

		$deals = $this->customer->deals()->whereIsOpen(false)->get();

		foreach($deals as $deal)
		{
			$this->deal_profit[] = $deal->profit;
		}
	}
	
	/**
	 * Manipulate deals:
	 * confirm deal delete
	 */
	 public function confirmDealDelete($id)
	 {
		$this->dispatchBrowserEvent('swal:confirm', [
			'model' => 'deal:delete',
			'icon' => 'warning',
			'title' => 'Удалить сделку?',
			'confirmText' => 'Да, удалить',
			'text' => 'Это действие нельзя отменить',
			'id' => $id
		]);
	 }

	/**
	 * Manipulate deals:
	 * deal delete
	 */
	public function deleteDeal($id)
	{
	 	$this->customer->deals()->find($id)->delete();

	 	$this->dispatchBrowserEvent('admin:user-operations', [
	 		'message' => 'Сделка удалена',
	 		'status' => 'success',
	 	]);

		AdminChangedUsersData::dispatch();
	}

	/**
	 * Manipulate deals:
	 * prepare deal for editing
	 */
	public function findDealToEdit($id)
	{
		$this->deal_to_be_edited = $this->customer->deals()->find($id);
		// set initial profit of existing profit value, mostly for reference purposes
		$this->deal_new_profit = $this->deal_to_be_edited->profit;
	}

	/**
	 * Manipulate deals:
	 * edit deal profit
	 */
	public function editDealProfit()
	{
		/**
		 * Get initial deal values
		 * References: pwb = stock price when bought ("price" column on deals table)
		 */
		$stock_dest = $this->deal_to_be_edited->dest;
		$stock_old_pwb = $this->deal_to_be_edited->price;
		$stock_last_profit = $this->deal_to_be_edited->profit;
		$new_pwb = null;
		
		// prepare coefficient by calculating percentage
		$percentage_prep = bcmul($stock_old_pwb, $this->deal_new_profit, 2);
		$percentage_pwb = bcdiv($percentage_prep, $stock_last_profit, 2);

		/**
		 * Count coefficient by diving new pwb on old pwb;
		 * Get new pwb by diving old pwb on coef
		 */
		$coef = bcdiv($percentage_pwb, $stock_old_pwb, 2);

		if ($stock_dest === 0) {
			$new_pwb = bcmul($stock_old_pwb, $coef, 2);
		} else {
			$new_pwb = bcdiv($stock_old_pwb, $coef, 2);
		}

		$this->deal_to_be_edited
			 ->update(['price' => $new_pwb]);

		ProfitChanged::dispatch();

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Профит сделки успешно изменён',
			'status' => 'success',
		]);

		$this->dispatchBrowserEvent('close-modal');
	}

	/**
	 * Manipulate deals:
	 * toggle deal status
	 */
	public function toggleStatus($id)
	{
		$deal = $this->customer->deals()->find($id);
		
		$deal->update([
			'is_open' => $deal->is_open ? 0 : 1 
		]);

		if (!$deal->is_open && $deal->profit > 0) {
			$this->customer->balance += $deal->profit;
	 		$this->customer->update();
		}

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => $deal->is_open ? 'Сделка открыта' : 'Сделка закрыта',
			'status' => 'success',
		]);

		AdminChangedUsersData::dispatch();
	}
	
    public function render()
    {
		return view('livewire.admin.customer.modal.deals', [
			'deals' => $this->customer ? $this->customer->deals()->orderBy('is_open', 'desc')->get() : []
		]);
    }
}
