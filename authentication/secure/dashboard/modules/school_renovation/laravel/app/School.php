<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Nicolaslopezj\Searchable\SearchableTrait;

class School extends Model
{
    use SearchableTrait;
    protected $table = 'schools';
    protected $primaryKey = 'school_id';
    
    protected $fillable = ['name', 'address', 'description','picture'];
    
     protected $searchable = [
        'columns' => [
            'schools.name' => 10,
            'schools.description' => 5,
        ],
        'joins' => [
            'mm_users' => ['schools.user_id','mm_users.user_id'],
        ],
    ];

    public function posts()
    {
        return $this->hasMany('Post');
    }
    
    public function image(){
        return $this->hasOne('App\Image','image_id','image_id');
    }
    public function user(){
        
        return $this->belongsTo('App\User','user_id','user_id');
        
    }
}
