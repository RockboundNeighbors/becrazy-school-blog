<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //
    public function taxonomy(){
        return $this->belongsToMany('App\Models\Taxonomy','Taxonomy_relationship');
    }
}
