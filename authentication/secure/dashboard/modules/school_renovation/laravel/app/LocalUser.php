<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalUser extends Model
{

    protected $table = 'user_details';
    protected $primaryKey = 'user_id';
    public $timestamps= false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ['phone_number', 'bio','more_info','occupation'];

    public function localuser(){
        return $this->belongsTo('App\LocalUser','user_id','user_id');
    }
    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    //protected $hidden = ['password', 'remember_token'];
}
