<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Taxonomy;
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
		return view('Examination.Admin.result',array('resulttype'=>"title"));
	}

	public function titlelists(){
		$lists = Post::all();
		return view('Examination.Admin.lists',array('titlelists'=> $lists));
	}

	public function deleted_lists(){
		$deleted_lists = Post::all();
		return view('Examination.Admin.deleted_lists',array('titlelists'=>$deleted_lists));
	}

	public function title_editform($id){
		$title = Post::find($id);
		if(is_null($title)){
			return redirect("Examination/Admin/lists");
		}

		$category = Taxonomy::whereType('category')->select('name')->get();

		return view("Examination.Admin.title_editform",compact('title','category'));
	}

	public function title_edit(Request $request){
		$request->validate([
			'id' =>'required',
			'title' => 'required|string',
			'content' => 'required|string',
			'status' => 'required',
			'slug' => 'required']);
		$title = Post::find($request->id);
		$title->title = $request->title;
		$title->content = $request->content;
		$title->status = $request->status;
		$title->slug = $request->slug;
		$title->save();
		return redirect("Examination/Admin/lists");
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

	public function category_addform(){
		return view("Examination.Admin.category_addform");
	}

	public function category_add(Request $request){
		$validatedData = $request->validate([
			'category' => 'required', 
			'slug' =>'required',
			'type' =>'required']);
		$taxonomy = new Taxonomy();
		$taxonomy->slug = $request->slug;
		$taxonomy->type = $request->type;
		$taxonomy->name =$request->name;
		$taxonomy->description = $request->description;
		$taxonomy->save();		
		return view("Examination.Admin.result",array("type"=>"title"));
	}

	public function category_lists(){
		$category_lists = Taxonomy::all();
		return view("Examination.Admin.category_lists",array("category_lists" => $category_lists));
	}

	public function category_editform($id){
		$category = Taxonomy::find($id);
		if(is_null($category)){
			return redirect("Examination/Admin/category_lists");
		}
		return view("Examination.Admin.category_editform",array("category_edit" => $category));
	}

	public function category_edit(Request $request){
		$request->validate([
			'title' => 'required',
			'content' => 'required',
			'slug' => 'required'
			]);
		$cate = Taxonomy::find($request->id);
		$cate->title = $request->title;
		$cate->content = $request->content;
		$cate->slug = $request->slug;
		$cate->save();
		return redirect("Examination/Admin/lists");
	}

	public function categorydelete(Request $request){
		validate([
			'ids' => 'array|required']);
		Taxonomy::destroy($request->ids);
		return redirect("Examination/Admin/lists");
	}
}