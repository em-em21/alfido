<?php

namespace App\Http\Controllers\User;

use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Verification;

class VerificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$images = Verification::with('user')->whereHas('User', function($q) {
			$q->where('is_verified', 0);
		})->get();

        return view('admin.verifications', compact('images'));
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
			'tool' => 'required',
			'image' => 'image|mimes:jpeg,png,jpg|max:2048',
		]);

		if ($request->hasFile('image')) {
            $fileName = $request->image->getClientOriginalName();
			$request->file('image')->storeAs('/public/verifications', $fileName);
			$url = Storage::url('verifications/'.$fileName);

			$data = new Verification([
				'url' => $url,
				'tool' => $request->tool,
			]);

			auth()->user()->verifications()->save($data);

			return back()->withSuccess('Изображение отправлено');
        }

        return back()->withError('Возникла непредвиденная ошибка, попробуйте снова через некоторое время.');
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
        User::find($id)->update(['is_verified' => 1]);

		return back()->withSuccess('Пользователь верифицирован');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Verification::find($id)->delete();

		return back()->withSuccess('Запись удалена');
    }
}
