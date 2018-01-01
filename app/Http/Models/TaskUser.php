<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class TaskUser extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'task_id',
    	'user_id',
    ];
}
