<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transaction extends Model
{
    use HasFactory;

	protected $fillable = [
		'amount', 'type', 'reason', 'user_id'
	];

	public const TRANS_TYPES = [
		0 => 'Пополнение баланса',
		1 => 'Бонусное пополнение',
		2 => 'Списание баланса'
	];

	public function getTransType()
	{
		return self::TRANS_TYPES[$this->attributes['type']];
	}
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
