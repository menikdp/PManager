<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'name', 
    ];

    /**
    * relationship between models
    */

    //every role has many users
    public function users() {
        return $this->hasMany('App\Http\Models\User');
    }
}
