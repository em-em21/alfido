<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Ico extends Model
{
    use HasFactory;

	protected $fillable = [
		'title', 'alias', 'starter_price', 'current_price',
		'release_date', 'amount', 'slug'
	];

	// Create slug for urls
	public function setTitleAttribute($value)
	{
	    $this->attributes['title'] = $value;
	    $this->attributes['slug'] = Str::slug($value);
	}

	/**
	 * Get the route key for the model.
	 *
	 * @return string
	 */
	public function getRouteKeyName()
	{
		return 'slug';
	}
}
