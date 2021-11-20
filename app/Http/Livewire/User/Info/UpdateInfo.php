<?php

namespace App\Http\Livewire\User\Info;

use Illuminate\Validation\Rule;
use Livewire\Component;

class UpdateInfo extends Component
{
	public $name, $surname, $phone, $email;

	public $PROPS = [
		'name', 'surname', 'phone', 'email'
	];

	protected array $rules = [];

	public function rules()
	{
		return [
			'name' => ['required', 'alpha', 'string', 'max:255'],
			'surname' => ['required', 'alpha', 'string', 'max:20'],
			'email' => ['required', 'string', 'max:50', Rule::unique('users')->ignore(auth()->id())],
			'phone' => ['required', 'numeric', 'min:11'],
		];
	}

	protected $messages = [ // Duplicate of this array is in the RegisterController.php
		// TODO: Create global CONST and make it reusable
		'name.required' => 'Поле имя является обязательным.',
		'name.string' => 'Поле имя должно быть строкой.',
		'name.alpha' => 'Поле имя не должно содержать цифры.',
		'name.max' => 'Поле имя не должно быть длиннее 30-ти символов.',
		'surname.required' => 'Поле фамилия является обязательным.',
		'surname.string' => 'Поле фамилия должно быть строкой.',
		'surname.alpha' => 'Поле фамилия не должно содержать цифры.',
		'surname.max' => 'Поле фамилия не должно быть длиннее 30-ти символов.',
		'email.required' => 'Нам нужно знать Вашу почту.',
		'email.email' => 'Предоставленная почта должна быть корректной.',
		'email.unique' => 'Пользователь с данной почтой уже зарегистрирован.',
		'email.max' => 'Слишком длинное значение у почты.',
		'phone.required' => 'Поле телефон является обязательным.',
		'phone.numeric' => 'Телефон должен содержать только цифровые символы.',
		'phone.numeric' => 'Длина номера должна быть не менее 11-ти символов.',
		'phone.numeric' => 'Данный номер телефона уже занят другим пользователем.',
	];

	public function mount()
	{
		foreach ($this->PROPS as $prop)
		{
			$this->$prop = auth()->user()->$prop;
		}
	}

	public function updateInfo()
	{
		$something_updated = false;

		foreach ($this->PROPS as $prop)
		{
			if ($this->$prop !== auth()->user()->$prop) {
				$this->validate();
				$something_updated = true;
			}
			
			auth()->user()->update([
				$prop => $this->$prop
			]);
		}

		if ($something_updated)
		{
			$this->dispatchBrowserEvent('user:throw-alert', [
				'message' => 'Информация успешно обновлена',
				'status' => 'success'
			]);
		}
	}
	
    public function render()
    {
        return view('livewire.user.info.update-info');
    }
}
