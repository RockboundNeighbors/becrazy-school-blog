<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;


class ExamController extends Controller{

	// 10/11Examコントローラーにはすべて管理者関連のメソッドを書き込む！ つまりlist関連は別のコントローラーに書き込むのかな？
	public function __construct(){
		$this->middleware("auth");
	}

	public function titleaddform(){
		return view('Examination.titleaddform');
	}

	public function titleadd(Request $request){
		$validated_data = $request ->validate([
			'title' => 'required|string|max:255','content' =>'required|string']);
		$post = new Post();
		$post->user_id = $request->userid;
		$post->title = $request->title;
		$post->content = $request->content;
		$post->save();
		return view('Examination.result');
	}

	public function titlelists(){
		$lists = Post::all();
		return view('Examination.lists',array('titlelists'=> $lists));
	}

	public function titleeditform($id){
		$title = Post::find($id);
		if(is_null($title)){
			return redirect("Examination/add");
		}
		return view("Examination.titleeditform",array("titleedit" => $title));
	}

	public function titledelete(Request $request){
		$validated_data = $request->validate([
			'ids' => 'array|required'
		]);
		Post::destroy($request->ids);
		return redirect("Examination/titlelists");

	}

	public function categoryaddform(){

	}

	public function categorieslist(){

	}

	public function categoryedit(){

	}

	public function categorydelete(){

	}
}