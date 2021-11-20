<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;

	protected $guarded = [];
	
	public $timestamps = false;

	/**
	 * Stock markets
	 */
	public const MARKETS = [
		0 => 'crypto',
		1 => 'forex',
		2 => 'commodity',
	];

	/**
	 * Get market ID
	 */
	public static function getMarketID($market)
	{
		return array_search($market, self::MARKETS);
	}

	/**
	 * Get market name
	 */
	public function getMarketName()
	{
		return self::MARKETS[ $this->attributes['market'] ];
	}

	/**
	 * Set market
	 */
	public function setMarket($value)
	{
		$marketID = self::getMarketID($value);

		if ($marketID) {
		   $this->attributes['market'] = $marketID;
		}
	}

}
