<?php

namespace App\Http\Livewire\User\Info;

use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class UpdatePassword extends Component
{
	public $pass, $new_pass, $new_pass_confirm;

	protected $rules = [
		'pass' => 'required|string|min:8|regex:/[0-9]/|regex:/[a-z]/',
		'new_pass' => 'required|min:8|string|regex:/[0-9]/|regex:/[a-z]/',
		'new_pass_confirm' => 'required|same:new_pass'
	];

	protected $messages = [
		'pass.required' => 'Поле пароль является обязательным.',
		'pass.min' => 'Пароль должен содержать как минимум 8 символов.',
		'new_pass.regex' => 'В пароле должна содержаться как минимум одна цифра и буква.',
		'new_pass_confirm.same' => 'Новый пароль и его подтверждение должны совпадать.'
	];

	public function updatePass()
	{
		$this->validate();

		// break if pass is not equal to this user actual pass
		if (!Hash::check($this->pass, auth()->user()->password))
		{
			return $this->dispatchBrowserEvent('user:throw-alert', [
				'message' => 'Текущий пароль указан неверно.',
				'status' => 'error'
			]);
		}

		// break if new pass is equal to this user actual pass
		if (Hash::check($this->new_pass, auth()->user()->password)) 
		{
			return $this->dispatchBrowserEvent('user:throw-alert', [
				'message' => 'Новый пароль не может быть идентичным старому.',
				'status' => 'error'
			]);
		}
		
		auth()->user()->password = bcrypt($this->new_pass);
		auth()->user()->save();

		$this->reset();
		
		$this->dispatchBrowserEvent('user:throw-alert', [
			'message' => 'Пароль успешно обновлён.',
			'status' => 'success'
		]);
	}

    public function render()
    {
        return view('livewire.user.info.update-password');
    }
}
