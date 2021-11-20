<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Ico;
use Illuminate\Http\Request;

class IcoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$icos = Ico::all();

        return view('admin.ico', compact('icos'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
			'title' => 'required',
			'alias' => 'required',
			'starter_price' => 'required|numeric',
			'current_price' => 'required|numeric',
			'release_date' => 'required',
			'amount' => 'required|numeric',
		]);

		Ico::create([
			'title' => $request->title,
			'alias' => $request->alias,
			'starter_price' => $request->starter_price,
			'current_price' => $request->current_price,
			'release_date' => $request->release_date,
			'amount' => $request->amount,
		]);

		return back()->withSuccess('ICO успешно создан.');
    }

    /**
     * Display the specified resource.
	 * CLIENT
     *
     * @param  int  $slug
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $ico = Ico::where('slug', $slug)->firstorfail();

		return isset($ico) ? 
			view('user.ico-template', compact('ico')) : 
			redirect()
				->route('crypto')
				->withError('Что-то пошло не так. Пожалуйста, попробуйте ещё раз.');
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
		$inputs = array_filter(request()->except(['_token','id', '_method']));

		Ico::where('id', $id)->update($inputs);

        return back()->withSuccess('ICO успешно обновлён');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
		Ico::find($id)->delete();

        return back()->withSuccess('status', 'ICO успешно удалён.');
    }
}
