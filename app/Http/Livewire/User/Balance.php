<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Balance extends Component
{
	public $balance;

	protected $listeners = [
		'getBalance' => 'mount'
	];

	public function mount()
	{
		$this->balance = auth()->user()->balance;
	}

    public function render()
    {
        return view('livewire.user.balance');
    }
}
