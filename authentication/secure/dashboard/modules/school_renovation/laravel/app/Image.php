<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['path'];
    protected $table = "images";
    protected $primaryKey = "image_id";
    public $timestamps = false;
    
    
}
