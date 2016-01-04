<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class LocalUser extends Model {

	protected $table = "user_details";

    protected $primaryKey = "user_id";


    /**
     * local user has a user
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function user(){
        return $this->hasOne('App\User', 'user_id');
    }

}
