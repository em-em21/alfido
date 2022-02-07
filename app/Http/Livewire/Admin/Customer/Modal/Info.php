<?php

namespace App\Http\Livewire\Admin\Customer\Modal;

use App\Events\AdminChangedUsersData;
use App\Models\User;
use Livewire\Component;

class Info extends Component
{
	protected $listeners = [
		'user:ready' => 'setCustomer',
		'user:delete' => 'deleteUser',
		'user:ban' => 'banUser',
		'user:revive' => 'reviveUser',
		'user:transaction-created' => '$refresh'
	];

	protected $rules = [
		'balance' => 'numeric|between:0.00, 999999.99',
		'credit' => 'numeric|between:0.00, 999999.99',
	];

	public $PROPS = [
		'name', 'surname', 'balance', 
		'status', 'phone', 
		'email', 'role', 'algo', 'credit'
	];
	
	public $customer;

	// customer props
	public $name, $surname, $balance, $status, $credit, $phone, $email, $role, $algo, $password;

	// select manager, change manager
	public $manager_id, $managers;

	// define customer instance
	public function setCustomer($id)
	{
		$this->customer = User::find($id);

		foreach ($this->PROPS as $prop)
		{
			$this->$prop = $this->customer->$prop;
		}

		// and get managers
		$this->managers = User::whereRole(2)->get();

		if ($this->customer->managers()->exists())
			$this->manager_id = $this->customer->managers()->first()->id;
	}

	// update user props
	public function updateUserInfo()
	{
		/**
		 * Special cases (not simple input type text fields)
		 */
		// if ($this->balance)
		if ($this->balance !== $this->customer->balance) {
			AdminChangedUsersData::dispatch();
		}

		if ($this->manager_id) {
			$this->customer->managers()->sync(User::find($this->manager_id));
		}

		if ($this->password) {
			$this->customer->password = bcrypt($this->password);
			$this->customer->save();
		}

		/**
		 * Simple properties update
		 */
		foreach ($this->PROPS as $prop) {
			$this->customer->update([
				$prop => $this->$prop
			]);
		}

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Информация успешно обновлена',
			'status' => 'success'
		]);
	}

	/**
	 * Ban, delete operations confirmations
	 * ----
	 */
	public function confirmDelete()
	{
		$this->dispatchBrowserEvent('swal:confirm', [
			'model' => 'user:delete',
			'title' => 'Удалить пользователя?',
			'confirmText' => 'Да, удалить',
			'text' => 'Это действие нельзя отменить',
			'id' => ''
		]);
	}

	public function confirmBan()
	{
		$this->dispatchBrowserEvent('swal:confirm', [
			'model' => 'user:ban',
			'title' => 'Заблокировать пользователя?',
			'confirmText' => 'Да, заблокировать',
			'text' => 'Пользователь не сможет открывать сделки и выводить деньги',
			'id' => ''
		]);
	}

	public function confirmRevive()
	{
		$this->dispatchBrowserEvent('swal:confirm', [
			'model' => 'user:revive',
			'title' => 'Разблокировать пользователя?',
			'confirmText' => 'Да, разблокировать',
			'text' => 'Пользователь теперь сможет открывать сделки и выводить деньги',
			'id' => ''
		]);
	}

	/**
	 * Ban, delete operations
	 * listeners are in admin.js file
	 */

	public function deleteUser()
	{
		$this->customer->delete();

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Пользователь успешно стёрт с базы данных.',
			'status' => 'success'
		]);
	}

	public function banUser()
	{
		$this->customer->update(['is_baned' => 1]);

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Пользователь успешно заблокирован',
			'status' => 'success'
		]);
	}

	public function reviveUser()
	{
		$this->customer->update(['is_baned' => 0]);

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Пользователь успешно разблокирован',
			'status' => 'success'
		]);
	}

	/**
	 * Detach manager from user
	 */
	public function detachManager()
	{
		$this->customer->managers()->detach();
		$this->manager_id = null;

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Текущий менеджер был откреплён.',
			'status' => 'success'
		]);

		$this->dispatchBrowserEvent('close-modal');
	}
	
    public function render()
    {
        return view('livewire.admin.customer.modal.info');
    }
}
