<?php

namespace App\Http\Livewire\Admin;

use App\Models\User;
use Livewire\Component;

class Managers extends Component
{
	public $managers;
	public $selected_manager, $customers;

	protected $listeners = [
		'manager:delete' => 'deleteManager'
	];

	public function mount()
	{
		$this->managers = User::whereRole(2)->get();
	}

	public function confirmDeletion($id)
	{
		$manager = User::whereRole(2)->find($id);

		$this->dispatchBrowserEvent('swal:confirm', [
			'model' => 'manager:delete',
			'icon' => 'warning',
			'title' => 'Удалить менеджера '.ucfirst($manager->surname).' '.ucfirst($manager->name).'?',
			'confirmText' => 'Удалить',
			'text' => 'Это действие нельзя будет отменить',
			'id' => $id
		]);
	}

	public function deleteManager($id)
	{
		User::find($id)->delete();

		$this->dispatchBrowserEvent('admin:user-operations', [
			'message' => 'Менеджер удалён.',
			'status' => 'success'
		]);

		$this->redirect('/admin/index', true);
	}

	public function setCustomers($id)
	{
		$this->selected_manager = User::find($id);

		$this->customers = $this->selected_manager->customers;
	}
	
    public function render()
    {
        return view('livewire.admin.managers')
				->extends('layouts.admin')
				->section('admin-content');
    }
}
