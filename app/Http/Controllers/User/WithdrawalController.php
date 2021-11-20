<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\Withdrawal;
use Illuminate\Http\Request;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
	 * ADMIN
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		$withdrawals = Withdrawal::with('user')->get();
		
        return view('admin.withdrawals', compact('withdrawals'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Withdrawal::find($id)->delete();

				return back()->withSuccess('Запись удалена');
    }
}
