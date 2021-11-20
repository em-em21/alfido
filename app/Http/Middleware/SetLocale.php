<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class SetLocale
{
	const SESSION_KEY = 'locale';
  	const LOCALES = ['en', 'ru'];

	public function handle(Request $request, Closure $next) {
		/**
		 * @var Session $session
		 */
		$session = $request->getSession();

		// get user's preferred language if he has one
		if (!$session->has(self::SESSION_KEY)) {
			$session->put(self::SESSION_KEY, $request->getPreferredLanguage(self::LOCALES));
		}

		// trivial language change thingy
		if ($request->has('lang')) {
			$lang = $request->get('lang');
			
			if (in_array($lang, self::LOCALES)) {
				$session->put(self::SESSION_KEY, $lang);
			}
		}

		app()->setLocale($session->get(self::SESSION_KEY));

		return $next($request);
	}
}
