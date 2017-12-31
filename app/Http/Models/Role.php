<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'name', 
    ];
}
