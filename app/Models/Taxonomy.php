<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
	public function post(){
		return $this->belongsToMany('App\Models\Post');
	}

    protected $table = 'taxonomy';
}
