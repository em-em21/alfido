<?php

use App\Http\Controllers\Guest\PageController as GuestPages;
use App\Http\Controllers\User\PageController as UserPages;
use App\Http\Controllers\Admin\BetaTransferController;
use App\Http\Controllers\User\VerificationController;
use App\Http\Controllers\User\WithdrawalController;
use App\Http\Controllers\Admin\SettingsController;
use App\Http\Controllers\Admin\OutreachController;
use App\Http\Controllers\Admin\ChatController;
use App\Http\Controllers\Admin\IcoController;
use App\Http\Livewire\Admin\Managers;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::middleware('set.locale')->group(function() {
	/* Guest */
	Route::prefix('/')->group(function() {
		Route::view('/', 'guest.index')->name('homepage');
		Route::view('/about', 'guest.about')->name('about');
		Route::view('/analysis', 'guest.analysis')->name('analysis');
		Route::view('/algotrading', 'guest.algotrading')->name('algotrading');
		Route::view('/eco-calendar', 'guest.eco-calendar')->name('eco.calendar');
		Route::view('/account-types', 'guest.account-types')->name('account.types');
		Route::get('/contacts', [GuestPages::class, 'contacts'])->name('contacts');
		// Outreach
		Route::post('/outreaches', [OutreachController::class, 'store'])->name('outreaches.store');
	});

	/* User */
	Route::group([
		'prefix' => '/user',
		'middleware' => 'auth'
	], function() {
		Route::prefix('/trade')->group(function() {
			Route::view('/crypto', 'user.markets.crypto')->name('crypto');
			// todo: rename forex to stocks across the all application
			Route::view('/stocks', 'user.markets.forex')->name('forex');
			Route::view('/commodity', 'user.markets.commodity')->name('commodity');
		});

		// Update deal profits
		Route::post('/update-profit', [UserPages::class, 'updateProfit']);

		// Ico
		Route::get('/ico/{slug}', [IcoController::class, 'show'])->name('user.ico.show');

		// Loged user pages
		Route::view('/profile', 'user.profile')->name('user.profile');
		Route::get('/history', [UserPages::class, 'history'])->name('user.history');
		Route::get('/transactions', [UserPages::class, 'transactions'])->name('user.transactions');
	});

	/* Admin */
	Route::group([
		'prefix' => '/admin',
		'middleware' => ['auth', 'isAdmin'],
	], function() {
		// Dashboard Index | Users table
		Route::view('/index', 'admin.index')->name('admin.index');

		// Managers
		Route::get('/managers', Managers::class)->name('admin.managers');

		// Admin Profile page
		Route::view('/account', 'admin.account')->name('admin.account');
		
		// Currency converter
		Route::view('/converter', 'admin.converter')->name('admin.converter');

		// Ico
		Route::resource('ico', IcoController::class, [
			'except' => ['show', 'edit', 'create'],
			'as' => 'admin'
		]);

		// Chat
		Route::view('/chat', 'admin.chat')->name('admin.chat.index');
		Route::post('/chat/send-message', [ChatController::class, 'sendMessages']);
		Route::get('/chat/fetch-messages/{id}', [ChatController::class, 'showMessages']);
		Route::get('/chat/fetch-users', [ChatController::class, 'fetchUsers']);

		// Outreaches (messages from users on /contacts page)
		Route::resource('outreaches', OutreachController::class, [
			'only' => ['index', 'destroy']
		]);
		
		// Settings (website contacts, btc wallet, etc)
		Route::resource('settings', SettingsController::class, [
			'only' => ['create', 'store', 'update']
		]);

		// Withdrawals: view, delete
		Route::get('/withdrawal', [WithdrawalController::class, 'index'])->name('withdrawals.index');
		Route::delete('/withdrawal/delete/{id}', [WithdrawalController::class, 'destroy'])->name('withdrawals.destroy');

		// Verifications: view, update, delete
		Route::get('/verifications', [VerificationController::class, 'index'])->name('verification.index');
		Route::put('/verifications/verify/{user}', [VerificationController::class, 'update'])->name('verification.update');
		Route::delete('/verifications/destroy/{id}', [VerificationController::class, 'destroy'])->name('verification.destroy');
	});

	Auth::routes();

	/**
	 * -------------------
	 * Beta Transfer API
	 * ---------------
	 */
	Route::post('/transfer/proccess', [BetaTransferController::class, 'store'])->name('transfer.store');
	Route::get('/transfer/success', [BetaTransferController::class, 'success'])->name('transfer.success');
	Route::get('/transfer/fail', [BetaTransferController::class, 'fail'])->name('transfer.fail');
});

/**
 * --------------------------------
 * Change language for session
 * --------------------
 */
Route::get('change-language/{lang}', function($lang) {
	\Session::put('locale', $lang);
	return redirect()->back();
})->name('change-language');