<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Carbon\Carbon;


class ExamAdminController extends Controller{

	// 10/11Examコントローラーにはすべて管理者関連のメソッドを書き込む！ つまりlist関連は別のコントローラーに書き込むのかな？
	public function __construct(){
		$this->middleware("auth");
	}

	public function index(){
		return view('Examination.Admin.Admin_index');
	}

	public function titleaddform(){
		return view('Examination.Admin.titleaddform');
	}

	public function titleadd(Request $request){
		$validated_data = $request ->validate([
			'title' => 'required|string|max:255',
			'content' =>'required|string',
			'slug' => 'required|string']);
		$post = new Post();
		$post->user_id = $request->userid;
		$post->title = $request->title;
		$post->content = $request->content;
		$post->status = 'publish';
		$post->slug = $request->slug;
		$post->mime_type = "text/html";
		$post->save();
		return view('Examination.Admin.result');
	}

	public function titlelists(){
		$lists = Post::all();
		return view('Examination.Admin.lists',array('titlelists'=> $lists));
	}

	public function deleted_lists(){
		$deleted_lists = Post::all();
		return view('Examination.Admin.deleted_lists',array('titlelists'=>$deleted_lists));
	}

	public function titleeditform($id){
		$title = Post::find($id);
		if(is_null($title)){
			return redirect("Examination/add");
		}
		return view("Examination.Admin.titleeditform",array("titleedit" => $title));
	}

	public function titledelete(Request $request){
		$validated_data = $request->validate(['ids' => 'array|required']);
		$deleteposts = Post::find($request->ids);
		foreach($deleteposts as $deletepost){
			$deletepost->deleted_at = Carbon::now();
			$deletepost->save();
		}
		return redirect("Examination/titlelists");
	}


	public function titleRestore(Request $request){
		$validated_data = $request->validate(['ids' => "array|required"]);
		$restoreposts = Post::find($request->ids);
		foreach($restoreposts as $restorepost){
			$restorepost->deleted_at = NULL;
			$restorepost->save();
		}
		return redirect("Examination/deleted_lists");
	}

	public function categoryaddform(){
		return view("Examination.Admin.categoryaddform");
	}

	public function categorieslist(){

	}

	public function categoryedit(){

	}

	public function categorydelete(){

	}
}