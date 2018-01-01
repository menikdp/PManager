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

    /**
    * relationship between models
    */
     //every project belongs to company
    public function company() {
        return $this->belongsTo('App\Http\Models\Company');
    }

    //every project belongs to users
    public function user() {
        return $this->belongsToMany('App\Http\Models\User');
    }
}
