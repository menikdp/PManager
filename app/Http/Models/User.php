<?php

namespace App\Http\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'first_name',
        'middle_name',
        'last_name',
        'role_id',
        'city',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
    * relationship between models
    */

    //every user has many comments
    public function comments() {
        return $this->hasMany('App\Http\Models\Comment');
    }

    //every user belongs to role
    public function role() {
        return $this->belongsTo('App\Http\Models\Role');
    }

    //every user has many companies?
    public function companies() {
        return $this->hasMany('App\Http\Models\Company');
    }

    //every user belongs to many tasks
    public function tasks() {
        return $this->belongsToMany('App\Http\Models\Task');
    }

    //every user belongs to many projects
    public function projects() {
        return $this->belongsToMany('App\Http\Models\Project');
    }
}
