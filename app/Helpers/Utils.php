<?php

namespace App\Helpers;

// use GuzzleHttp\Client;
use Jenssegers\Date\Date;

use function PHPSTORM_META\map;

class Utils {
	/**
	 * Simple date formatting
	 * 
	 */
	public static function getDate($date)
	{
		return Date::parse($date)->format('j F Y, H:i');
	}

	/**
	 * Simple price fetch from crypto api
	 * Used for opening a new deal
	 */
	public static function fetchCoinPrice($symbol)
	{
		// working example with crypto compare API
		// $ch = curl_init("https://min-api.cryptocompare.com/data/price?&fsym={$symbol}&tsyms=USD");

        // curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        // curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        // curl_setopt($ch, CURLOPT_FAILONERROR, true);

		// $result = curl_exec($ch);
		// curl_close($ch);

		// return json_decode($result, true)[0];

		$json = file_get_contents("https://www.alphavantage.co/query?function=CURRENCY_EXCHANGE_RATE&from_currency={$symbol}&to_currency=USD&apikey=FT6QSNH7GT4OKCXD");

		$data = json_decode($json, true);

		$filtered = array_values(reset($data));

		return $filtered[4];
	}

	/**
	 * Now for stocks
	 * 
	 */
	public static function fetchStockPrice($symbol) : int
	{
		$api_key = '09fb70d23ec2c8a1be423fe9021458b2';
		$ch = curl_init("https://api.marketstack.com/v1/eod?access_key={$api_key}&symbols={$symbol}");
		// $ch = curl_init("http://api.marketstack.com/v1/eod?access_key={$api_key}&symbols={$symbol}");

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_FAILONERROR, true);

		$result = curl_exec($ch);
		curl_close($ch);

		$price = json_decode($result, true)['data'][0]['close'];
		return $price;
	}
	
	/**
	 * Get current url path and give class to link
	 */
	public static function checkLinks($url) : string
	{
		return request()->is('*'.$url.'*') ? 'active' : '';
	}

	// More specific helper function that is used in menu.blade.php
	// to avoid code repeating. Simply checks if current route matches
	// passed route name and returns classes for "active" link
	public static function isCurrent($route_name, $classes)
	{
		if (Utils::checkLinks($route_name) === 'active')
		{
			return $classes;
		}
	}
}