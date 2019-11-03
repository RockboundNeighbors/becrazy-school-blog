<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Taxonomy extends Model
{
	public function user(){
		return $this->belongsToMany('App\User');
	}

    protected $table = 'taxonomy';
}
