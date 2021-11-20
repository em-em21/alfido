<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Verification extends Model
{
    use HasFactory;

	protected $fillable = [
		'tool', 'url', 'user_id'
	];

	public function user()
	{
		return $this->belongsTo(\App\Models\User::class);
	}
}
