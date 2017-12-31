<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'name',
    	'description',
    	'user_id', 
    ];
}
