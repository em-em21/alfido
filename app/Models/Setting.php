<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

	protected $fillable = [
		'btc_wallet', 'phone', 'email', 'whatsapp', 'qiwi_link', 'usdt_wallet',
	];
}
