<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'name',
    	'user_id',
    	'days',
    	'hours',
    	'project_id',
    	'company_id',
    ];
}
