<?php

namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //fillable fields for this table
    protected $fillable = [
    	'body',
    	'url',
    	'user_id',
    	'commentable_id',
    	'commentable_type',
    ];

    public function commentable()
    {
    	return $this->morphTo();
    }
}
