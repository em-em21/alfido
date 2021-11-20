<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BetaTransfer extends Model
{
    use HasFactory;

	protected $fillable = [
		'order_id', 'amount', 'currency'
	];

	public function user() {
		return $this->belongsTo(User::class);
	}
}
