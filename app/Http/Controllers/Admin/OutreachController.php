<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Outreach;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class OutreachController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$outreaches = Outreach::all();

        return view('admin.outreaches', compact('outreaches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
		$data = [
			'name' => $request->name,
			'message' => $request->message,
			'email' => $request->email
		];

		$validator = Validator::make($data, [
			'name' => 'required',
			'message' => 'required|min:3|max:300',
			'email' => 'required|email'
		]);

		if ($validator->fails()) {
			$error = $validator->errors()->first();

			return response()->json([
				'status' => 'error',
				'msg' => $error
			], 422);
		} else {
			Outreach::create($data);

			return response()->json([
				'status' => 'success',
				'msg' => 'Спасибо! Ваше сообщение принято.'
			], 201);
		}	
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Outreach::find($id)->delete();
		
		return back()->withSuccess('Запись удалена.');
    }
}
