<?php

namespace App\Http\Livewire\Admin\Managers;

use App\Models\User;
use Livewire\Component;

class Edit extends Component
{
    public $manager;

    // manager props
    public $name, $surname, $balance, $phone, $email, $role, $password;

    public $props = [
        'name',
        'surname',
        'balance',
        'phone',
        'email',
        'role',
    ];

    public function rules() {
        return [
            'name' => ['required', 'string', 'max:30'],
            'surname' => ['required', 'alpha', 'string', 'max:30'],
            'balance' => ['numeric', 'between:0.00, 999999.99'],
            'phone' => ['required', 'numeric', 'min:11'],
            'email' => ['required', 'string', 'max:255', "unique:users,email,{$this->manager->id}"],
            'password' => ['nullable', 'string', 'min:8', 'regex:/[0-9]/', 'regex:/[a-z]/'],
            'role' => ['required', 'in:1,2,3'],
        ];
    }

    public function mount(User $manager)
    {
        $this->manager = $manager;

        foreach ($this->props as $prop)
        {
            $this->$prop = $this->manager->$prop;
        }
    }

    public function updateManager()
    {
        $data = array_filter($this->validate());

        $this->manager->update($data);

        $this->dispatchBrowserEvent('admin:user-operations', [
            'message' => 'Информация успешно обновлена',
            'status' => 'success'
        ]);
    }

    public function render()
    {
        return view('livewire.admin.managers.edit')
            ->extends('layouts.admin')
            ->section('admin-content');
    }
}
