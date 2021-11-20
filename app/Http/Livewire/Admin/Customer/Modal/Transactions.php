<?php

namespace App\Http\Livewire\Admin\Customer\Modal;

use App\Events\AdminChangedUsersData;
use App\Models\Transaction;
use App\Models\User;
use Livewire\Component;

class Transactions extends Component
{
	// Listen to confirmation from sweetAlert
	protected $listeners = [
		'user:ready' => 'setCustomer',
		'trans:delete' => 'deleteTrans',
		'refresh' => '$refresh'
	];
	
	public $customer;

	/**
	 * New transaction validation
	 * 
	 */
	public $amount;
	public $reason = 'Пополнение BTC кошелька.';
	public $type = 0;

	protected $rules = [
		'amount' => 'required|numeric|between: 0.00, 999999.99',
		'reason' => 'required',
		'type' => 'required'
	];

	protected $messages = [
		'amount.required' => 'Поле "сумма" обязательно для заполнения.',
		'amount.numeric' => 'Поле "сумма" должно быть цифрой.',
		'amount.between' => 'Поле "сумма" должно быть между 0.00 и 999,999.99',
		'reason.required' => 'Поле "причина" обязательно для заполнения.',
		'type.required' => 'Поле "тип" обязательно для заполнения.',
	];
	
	// Edit (trans_edit => transaction_to_be_edited)
	public $trans_edit = null;
	public $trans_edit_amount;
	public $trans_edit_reason;
	public $trans_edit_type;

	// define customer instance
	public function setCustomer($id)
	{
		$this->customer = User::find($id);
	}
	
	/**
	 * Create transaction
	 */
	public function createTrans()
	{
		$this->validate();

		if ($this->type == 2 && $this->amount > $this->customer->balance) {
			return $this->dispatchBrowserEvent('admin:user-operations', [
				'message' => 'У данного клиента нет такой суммы на счету. Пожалуйста, перепроверьте его баланс и сумму, которую хотите вычесть.',
				'status' => 'error'
			]);
		}

		if ($this->reason === 'Списание баланса в связи с...' || $this->reason === 'Бонусное пополнение в связи с...')
		{
			return $this->dispatchBrowserEvent('admin:user-operations', [
				'message' => 'Попытка создать создать транзакцию с шаблонной причиной. Пожалуйста, отредактируйте причину.',
				'status' => 'error'
			]);
		}

		$transaction = new Transaction([
			'amount' => $this->amount,
			'type' => $this->type,
			'reason' => $this->reason
		]);

		$this->customer->transactions()->save($transaction);

		$this->customer->update([
			'balance' => 
				$this->type == 2 ? 
				$this->customer->balance - $this->amount : 
				$this->customer->balance + $this->amount
		]);
		
		$this->emitTo('admin.customer.modal.info', 'user:transaction-created');
		$this->emitSelf('refresh');
		AdminChangedUsersData::dispatch();

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Транзакция создана успешно.',
			'status' => 'success'
		]);

		// $this->reset() breaks customer instance
		// TODO: debug this issue later
		$this->reason = '';
		$this->amount = '';
	}

	// Confirm Delete
	public function confirmTransDelete($id)
	{
	   $this->dispatchBrowserEvent('swal:confirm', [
		   'model' => 'trans:delete',
		   'icon' => 'warning',
		   'title' => 'Удалить транзакцию?',
		   'confirmText' => 'Да, удалить',
		   'text' => 'Это действие нельзя отменить',
		   'id' => $id
	   ]);
	}

	// Delete
	public function deleteTrans($id)
	{
		$this->customer->transactions()->find($id)->delete();

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Транзакция удалена.',
			'status' => 'success',
		]);

		$this->emitSelf('refresh');
	}

	// Prepare For Edit
	public function findTransToEdit($id)
	{
		$this->trans_edit = $this->customer->transactions()->find($id);
		// props
		$this->trans_edit_amount = $this->trans_edit->amount;
		$this->trans_edit_reason = $this->trans_edit->reason;
		$this->trans_edit_type = $this->trans_edit->type;
	}

	// Edit
	public function editTransProfit()
	{
		$this->trans_edit->update([
			'amount' => $this->trans_edit_amount,
			'type' => $this->trans_edit_type,
			'reason' => $this->trans_edit_reason
		]);
		
		$this->emitSelf('refresh');
		$this->dispatchBrowserEvent('close-modal');
		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Транзакция успешно изменёна',
			'status' => 'success',
		]);
	}

    public function render()
    {
		if (isset($this->customer)) {
			$transactions = $this->customer->transactions()->get();
		}

        return view('livewire.admin.customer.modal.transactions', [
			'transactions' => $transactions ?? []
		]);
    }
}
