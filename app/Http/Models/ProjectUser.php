<?php

namespace App\Http\Controllers;

use Illuminate\Database\Eloquent\Model;

class ProjectUser extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'project_id',
    	'user_id', 
    ];
}
