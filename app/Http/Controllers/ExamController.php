<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Taxonomy;
use App\Models\Taxonomy_relationship;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ExamController extends Controller{

//初期ページ
	function top(){
		return view("Examination.top");
	}

//初期ページからのリンク
	function article(){
		$article = Post::all();
		return view("Examination.article",array("articles"=>$article));
	}

	function tag(){
		$taxonomy = Taxonomy::whereType("tag")->get();
		return view("Examination.taxonomy",array("taxonomy"=>$taxonomy));
	}

	function category(){
		$taxonomy = Taxonomy::whereType("category")->get();
		return view("Examination.taxonomy",array("taxonomy"=>$taxonomy));
	}

//記事の表示メソッド
	function view_article($slug){
		$article = Post::whereSlug($slug)->first();
		return view("Examination.view_article",array("articles"=>$article));
	}

	function tag_article($id){
		$article_list = Taxonomy::find($id)->posts();
		return view("Examination.tag_article");
	}
	
	function category_article_list($name){
		$taxonomy = Taxonomy::whereName($name)->first();
		$taxonomy_posts = $taxonomy->post;
		return view("Examination.category_article_list",array("articles"=>$taxonomy_posts,"name"=>$name));
	}

	function tag_article_list($name){
		$taxonomy = Taxonomy::whereName($name)->first();
		$taxonomy_posts = $taxonomy->post;
		return view("Examination.tag_article_list",array("articles"=>$taxonomy_posts,"name"=>$name));
	}
}

