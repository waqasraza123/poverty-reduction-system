<?php namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Laravel\Cashier\Billable;
use Laravel\Cashier\Contracts\Billable as BillableContract;

class User extends Model implements AuthenticatableContract, CanResetPasswordContract, BillableContract {

	use Authenticatable, CanResetPassword, Billable;

	/**
	 * define table name
	 */
	protected $table = "cw_users";

	/**
	 * define the primary key
	 */
	protected $primaryKey = 'user_id';

    protected $dates = ['trial_ends_at', 'subscription_ends_at'];

	/**
	 * The attributes that are mass assignable.
	 *
	 * @var array
	 */
	protected $fillable = ['name', 'email', 'password', 'donner', 'address', 'phone'];

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = ['password', 'remember_token'];

	public function donate(){
		return $this->hasMany('App\Donate', 'donorId');
	}

	public function problems()
	{
		return $this->hasMany('App\Problem', 'userId');
	}

	/**
	 * user belongs to local user
	 * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
	 */
	public function localUser(){
		return $this->belongsTo('App\LocalUser', 'user_id');
	}

}
