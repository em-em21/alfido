<?php

namespace App\Http\Controllers\Auth;

use App\Events\UserRegistered;
use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:30'],
            'surname' => ['required', 'alpha', 'string', 'max:30'],
            // 'email' => ['required', 'string', 'email:rfc,dns', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed', 'regex:/[0-9]/', 'regex:/[a-z]/'],
            'phone' => ['required', 'numeric', 'min:11'],
		], [
			'name.required' => __('Поле имя является обязательным.'),
			'name.string' => __('Поле имя должно быть строкой.'),
			'name.alpha' => __('Поле имя не должно содержать цифры.'),
			'name.max' => __('Поле имя не должно быть длиннее 30-ти символов.'),
			'surname.required' => __('Поле фамилия является обязательным.'),
			'surname.string' => __('Поле фамилия должно быть строкой.'),
			'surname.alpha' => __('Поле фамилия не должно содержать цифры.'),
			'surname.max' => __('Поле фамилия не должно быть длиннее 30-ти символов.'),
			'email.required' => __('Нам нужно знать Вашу почту.'),
			'email.unique' => __('Пользователь с данной почтой уже зарегистрирован.'),
			'email.email' => __('Предоставленная почта должна быть корректной.'),
			'email.max' => __('Слишком длинное значение у почты.'),
			'password.confirmed' => __('Пароль не совпадает с подтверждением.'),
			'password.required' => __('Поле пароль является обязательным.'),
			'phone.required' => __('Поле телефон является обязательным.'),
			'phone.numeric' => __('Телефон должен содержать только цифровые символы.'),
			'phone.numeric' => __('Длина номера должна быть не менее 11-ти символов.'),
			'password.min' => __('Пароль должен содержать как минимум 8 символов.'),
		]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        $user = User::create([
            'name' => $data['name'],
            'surname' => $data['surname'],
            'email' => $data['email'],
			'phone' => $data['phone'],
            'password' => Hash::make($data['password']),
			'client_id' => rand(00000000, 99999999),
        ]);

		event(new UserRegistered($user));

		return $user;
    }
}
