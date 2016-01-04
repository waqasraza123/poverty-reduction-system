<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Problem extends Model {

    /*tell the table name explicitly(no need btw)*/
    protected $table = 'problems';

	protected $fillable = ['name', 'phone', 'address', 'problem', 'cost', 'severity'];

    /**
     * problem belongs to a user
     */
    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * donate belongs to a problem
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function donate(){
        return $this->belongsTo('App\Problem', 'problemId');
    }

}
