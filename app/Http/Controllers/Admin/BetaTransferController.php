<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BetaTransfer;
use Illuminate\Http\Request;

class BetaTransferController extends Controller
{
	protected $public_key, $secret_key;

	public function __construct()
	{
		$this->public_key = '9ffe3a8b6f2704f4c5e57fa8d6280195';
		$this->secret_key = 'd17856d554c1603cc9efd2a6b1f7a74f';
	}
	
    public function store(Request $request)
	{
		$url = 'https://merchant.betatransfer.io/api/payment?token=' . $this->public_key;

		$data = [
			'amount' => $request->amount,
			'currency' => 'RUB',
			'orderId' => bin2hex(random_bytes(13))
		];

		$data['sign'] = md5(implode('', $data) . $this->secret_key);

		$ch = curl_init();

		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_TIMEOUT, 10);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));

		$response = curl_exec($ch);

		curl_close($ch);

		$response = json_decode($response, true);

		if ($response) {
			auth()->user()->betatransfers()->create([
				'amount' => $request->amount,
				'currency' => 'RUB',
				'order_id' => $response['id'],
			]);
			
			return redirect()->to($response['urlPayment']);
		} else {
			return back()->withError('Произошла непредвиденная ошибка, обратитесь в службу поддержки.');
		}
	}

	public function success()
	{
		$sign = $_POST['sign'] ?? null;
		$amount = $_POST['amount'] ?? null;
		$orderId = $_POST['orderId'] ?? null;

		if ($sign && $amount && $orderId && $sign == md5($amount . $orderId . $this->secret))
		{
			// increase user balance ?
			// auth()->user()->update([
			// 	'balance' => auth()->user()->balance + $amount
			// ]);

			BetaTransfer::where('order_id', $orderId)->update(['status' => 1]);

			return redirect()->route('crypto')->withSuccess('Оплата прошла успешно.');
		}
	}

	public function fail() 
	{
		$orderId = $_POST['orderId'] ?? null;

		if ($orderId) {
			BetaTransfer::where('order_id', $orderId)->update(['status' => 0]);

			return redirect()->route('crypto')->withError('Произошла ошибка при оплате.');
		}
	}
}
