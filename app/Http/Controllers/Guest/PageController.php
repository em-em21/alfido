<?php

namespace App\Http\Controllers\Guest;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Setting;

class PageController extends Controller
{
	public function index()
	{
		return view();
	}

	public function contacts() {
		return view('guest.contacts', [
			'settings' => Setting::orderBy('id', 'asc')->first()
		]);
	}
}
