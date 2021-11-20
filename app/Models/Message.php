<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    use HasFactory;

	protected $fillable = [
		'from', 'to', 'message', 'is_read', 'user_id'
	];

	// messages belongs to user
	public function user()
	{
		return $this->belongsTo(User::class);
	}
}
