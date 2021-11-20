<?php

namespace App\Providers;

use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
		Schema::defaultstringLength(191);

		// Set locale for current session
		$langs = [ 'en', 'ru' ];

		view()->share('langs', $langs);

		// Custom validation rule for opening/closing deals
		Validator::extend('less_than_balance', 'App\\Rules\Deal\LessThanBalance@passes');

		// Set locale for Carbon
		Carbon::setLocale(config('app.locale'));
		
		setlocale(LC_TIME, config('app.localeWithRegion'));

		// Return navbars across all user pages with icos
		view()->composer('includes.user.header', function ($view) {
            $view->with('icos', \App\Models\Ico::all());
        });

		// Return payment modal with btc_wallet code
		view()->composer('includes.user.modals.payment_modal', function ($view) {
			$wallet = DB::table('settings')
						->select('btc_wallet')
						->first();
			
			if (isset($wallet)) {
				$view->with('btc_wallet', $wallet->btc_wallet);
			}
		});

		// Contacts info across all guest pages
		view()->composer('layouts.guest', function($view) {
			$view->with('settings', \App\Models\Setting::orderBy('id', 'desc')->first());
		});
    }
}
