<?php

namespace App\Http\Livewire\Admin\Customer;

use App\Models\User;
use Livewire\Component;

class Root extends Component
{
	public $customer;

	protected $listeners = [
		'customer:chosen' => 'initCustomer'
	];

	public function initCustomer($id)
	{
		$this->customer = User::find($id);

		$this->emit('user:ready', $id);
	}
	
    public function render()
    {
        return view('livewire.admin.customer.root');
    }
}
