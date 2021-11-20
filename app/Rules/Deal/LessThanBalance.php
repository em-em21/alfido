<?php

namespace App\Rules\Deal;

use Illuminate\Contracts\Validation\Rule;

class LessThanBalance implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $value <= auth()->user()->balance;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ставка должна быть ниже Вашего текущего баланса.';
    }
}
