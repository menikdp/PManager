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

    //every company belongs to users
    public function user() 
    {
        return $this->belongsTo('App\Http\Models\User');
    }

    //every company has many projects
    public function projects() 
    {
        return $this->hasMany('App\Http\Models\Project');
    }

    public function comments()
    {
        return $this->morphMany('App\Http\Models\Comment', 'commentable');
    }
}
