<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'task_id',
    	'user_id',
    ];
}
