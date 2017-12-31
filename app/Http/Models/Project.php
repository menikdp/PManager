<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'name',
    	'description',
    	'company_id',
    	'user_id',
    	'days',
    ];
}
