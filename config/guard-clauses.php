<?php

/**
 * ----------------------------------------
 * * Verification guard clauses.
 * * Used in Livewire OpenDeal/* classes.
 * ! Not used... Can't use it with livewire, have to hardcode these arrays
 * ----------------------------------------
 */

return [
	/**
	 * New deal verification rules
	 * 
	 */
	'investment_rules' => [
		'investment' => 'required|numeric|min:10|less_than_balance',
		'stock_alias' => 'required|string',
		'stock_naming' => 'required|string',
		'market' => 'required',
		'dest' => 'required',
		'stock_price' => 'required|numeric',
	],

	/**
	 * Verification failure messages
	 * 
	 */
	'investment_messages' => [
		'investment.less_than_balance' => 'Ставка должна быть ниже Вашего текущего баланса.',
		'investment.required' => 'Данное поле является обязательным',
		'investment.min' => 'Ставка должна быть выше 10$',
	]
];