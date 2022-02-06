<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Setting;
use Illuminate\Http\Request;

class SettingsController extends Controller
{
	
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
		$settings = Setting::orderBy('id', 'desc')->first();

        return view('admin.settings', compact('settings'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		Setting::create([
			'phone' => $request->phone,
			'email' => $request->email,
			'whatsapp' => $request->whatsapp,
			'qiwi_link' => $request->qiwi_link,
			'btc_wallet' => $request->btc_wallet,
			'usdt_wallet' => $request->usdt_wallet,
		]);

        return back()->withSuccess('Данные успешно обновлены');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $settings = Setting::find($id);

		foreach ($settings->getFillable() as $item)
		{
			if ($request->$item)
			{
				$settings->$item = $request->$item;
			}
		}

		$settings->update();

		return back()->withSuccess('Данные успешно обновлены');
    }
}
