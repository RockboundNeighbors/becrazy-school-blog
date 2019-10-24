<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExamController extends Controller{

	function top(){
		return view("Examination.top");
	}

	function article(){
		$article = Post::all();
		return view("Examination.article",array("articles"=>$article));
	}

	function tag(){
		$tag = Taxonomy::whereType("tag")->get();
		return view("Examination.tag",array("tags"=>$tag));
	}
	
	function category(){
		$category = Taxonomy::whereType("category")->get();
		return view("Examination.category",array("category"=>$category));
	}
}