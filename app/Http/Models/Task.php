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

    /**
	* relationship between models
    */
    //every task belongs to user
    public function user() {
        return $this->belongsTo('App\Http\Models\User');
    }

    //every task belongs to project
    public function project() {
        return $this->belongsTo('App\Http\Models\Project');
    }

    //every task belongs to company
    public function company() {
        return $this->belongsTo('App\Http\Models\Company');
    }

    //every task belongs to many user
    public function users() {
        return $this->belongsToMany('App\Http\Models\User');
    }
}
