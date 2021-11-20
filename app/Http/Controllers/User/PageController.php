<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Deal;
use ccxtpro\binanceus;
use Exception;
use Illuminate\Http\Request;
use Stichoza\GoogleTranslate\GoogleTranslate;

class PageController extends Controller
{
	public function history()
	{
		return view('user.history', [
			'deals' => auth()->user()->deals()->whereIsOpen(false)->get()
		]);
	}

	public function transactions()
	{
		/**
		 * Translate transactions reasons if locale
		 * set to non-english language.
		 */
		$gtr = new GoogleTranslate('en');
		
		// translate from russian
		$gtr->setSource('ru');

		return view('user.trans', [
			'gtr' => $gtr,
			'transactions' => auth()->user()->transactions()->get()
		]);
	}

	/**
	 * Update profit for each deal
	 * js file: Crypto.js
	 */
	public function updateProfit(Request $request)
	{
		foreach ($request->get('payload') as $id => $profit) {
			Deal::find($id)->update([
				'profit' => $profit
			]);
		}
	}
}
