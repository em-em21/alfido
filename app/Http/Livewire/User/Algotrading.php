<?php

namespace App\Http\Livewire\User;

use Livewire\Component;

class Algotrading extends Component
{
	// Listen to confirmation from sweetAlert
	protected $listeners = [
		'toggle-algo' => 'toggleAlgo'
	];

	/**
	 * Confirm algo switch
	 */
	public function confirmSwitch()
	{
		$this->dispatchBrowserEvent('swal:confirm', [
			'model' => 'algo',
			'title' => auth()->user()->algo ? __('Деактивировать алготрейдинг?') : __('Активировать алготрейдинг?'),
			'confirmText' => 'OK',
			'text' => '',
			'id' => ''
		]);
	}

	/**
	 * Toggle algotrading
	 */
	public function toggleAlgo()
	{
		auth()->user()->update(['algo' => auth()->user()->algo ? 0 : 1]);

		$this->dispatchBrowserEvent('user:throw-alert', [
			'message' => auth()->user()->algo ? __('Алготрейдинг активирован.') : __('Алготрейдинг деактивирован.'),
			'status' => 'success',
		]);
	}

	/**
	 * (: ;)
	 */
    public function render()
    {
        return view('livewire.user.algotrading');
    }
}
