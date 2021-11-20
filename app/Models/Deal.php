<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    use HasFactory;

	protected $fillable = [
		'investment', 'price', 'profit', 
		'dest', 'market', 'is_ico', 'taxes',
		'is_open', 'stock_alias', 
		'stock_naming', 'user_id'
	];

	public function user()
	{
		return $this->belongsTo(User::class);
	}

	/**
	 * Get deal status
	 */

	public const DEAL_STATUS = [
		0 => 'Закрыта',
		1 => 'Открыта'
	];

	public function getDealStatus()
	{
		return self::DEAL_STATUS[$this->attributes['is_open']];
	}

	/**
	 * Get deal destination
	 */
	public const DEAL_DEST = [
		0 => 'Sell',
		1 => 'Buy'
	];

	public function getDealDest()
	{
		return self::DEAL_DEST[$this->attributes['dest']];
	}

	/**
	 * Get deal market
	 */
	public const DEAL_MARKET = [
		0 => 'Crypto',
		1 => 'Forex'
	];

	public function getDealMarket()
	{
		return self::DEAL_MARKET[$this->attributes['market']];
	}
}
