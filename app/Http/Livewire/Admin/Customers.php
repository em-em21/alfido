<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Customers extends Component
{
	public $customers, $customer_id = 9999999;

	// New user props
	public $name, $surname, $email, $phone, $password;

	public function mount()
	{
		// customers that are belonging to visiting page manager
		$man_customers = auth()->user()->customers;

		// all customers
		$all_customers = User::where('role', 1)->get();

		$this->customers = auth()->user()->role === 3 ? $all_customers : $man_customers;
	}
	
    public function render()
    {
        return view('livewire.admin.customers');
    }
}
