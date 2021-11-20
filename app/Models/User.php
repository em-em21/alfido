<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;
	
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role', 'algo', 'status', 'name', 'email', 'surname', 'phone',
		'is_baned', 'is_verified', 'comment', 'password', 
		'balance', 'credit', 'client_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

	/**
	 * Manipulates roles on User
	 * var, setters, getters
	 */

	// Roles
	public const ROLES = [
		0 => 'guest',
		1 => 'customer',
		2 => 'manager',
		3 => 'admin'
	];

	// Roles RUS
	public const ROLES_RUS = [
		0 => 'Гость',
		1 => 'Клиент',
		2 => 'Менеджер',
		3 => 'Админ'
	];

	// Get admin role state for auth user
	public function isAdmin(): bool
	{
		return $this->isAdmin() ? true : false;
	}

	// Get role ID
	public static function getRoleID($role)
	{
		return array_search($role, self::ROLES);
	}

	// Get role (name)
	public function getRole()
	{
		return self::ROLES[$this->attributes['role']];
	}

	// Get role rus (name)
	public function getRoleRUS()
	{
		return self::ROLES_RUS[$this->attributes['role']];
	}

	// Set role
	public function setRole($value)
	{
		$roleID = self::getRoleID($value);

		if ($roleID) $this->attributes['role'] = $roleID;
	}

	/**
	 * Get algotrading status
	 */
	public const ALGO = [
		0 => 'Деактивирован',
		1 => 'Активирован'
	];

	// Get algo state
	public function getAlgoState()
	{
		return self::ALGO[$this->attributes['algo']];
	}

	/**
	 * Get user status
	 */
	public const STATUS = [
		0 => 'Новый',
		1 => 'Активен',
		2 => 'Высокий потенциал',
		3 => 'Низкий потенциал',
		4 => 'Не активен'
	];
	
	public function getStatus()
	{
		return self::STATUS[$this->attributes['status']];
	}

	// Get css class for status
	public const STATUS_CLASS = [
		0 => 'text-light',
		1 => 'text-active',
		2 => 'text-success',
		3 => 'text-danger',
		4 => 'text-muted'
	];
	
	public function getStatusClass()
	{
		return self::STATUS_CLASS[$this->attributes['status']];
	}

	// get auth user creds
	public function getCreds()
	{
		return ucfirst($this->surname).' '.ucfirst($this->name);
	}

	// get manager credentials
	public function getManagerCreds()
	{
		$manager = $this->managers()->first();
		
		return ucfirst($manager->surname).' '.ucfirst($manager->name);
	}

	// get users credentials
	public function getCustomersCreds()
	{
		$customers_creds = [];

		foreach ($this->customers() as $customer)
		{
			$customers_creds[] = ucfirst($customer->surname).' '.ucfirst($customer->name);
		}

		return $customers_creds;
	}

	// check if user is baned or not verified
	public function isBanedOrNotVerified()
	{
		return $this->is_baned === 1 || $this->is_verified === 0;
	}
	
	/**
	 * ---------
	 * Relationships
	 * -----------------
	 */

	// withdrawals
	public function withdrawals()
	{
		return $this->hasMany(Withdrawal::class);
	}

	// verifications
	public function verifications()
	{
		return $this->hasMany(Verification::class);
	}

	// deals
	public function deals()
	{
		return $this->hasMany(Deal::class);
	}
	
	// transactions
	public function transactions()
	{
		return $this->hasMany(Transaction::class);
	}

	// chat messages
	public function messages()
	{
		return $this->hasMany(Message::class);
	}

	// manager <--> customers
	public function customers()
	{
		return $this
			->belongsToMany(User::class, 'customer_manager', 'manager_id', 'customer_id')
			->whereRole(1);
	}

	public function managers()
	{
		return $this
			->belongsToMany(User::class, 'customer_manager', 'customer_id', 'manager_id')
			->whereRole(2);
	}

	// beta transfer api
	public function betatransfers()
	{
		return $this->hasMany(BetaTransfer::class);
	}
}
