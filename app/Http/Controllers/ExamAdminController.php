<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\Taxonomy;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Models\User;
use Hash;


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
			return redirect("Examination/lists");
		}

		$category = Taxonomy::whereType('category')->get();
		$tag = Taxonomy::whereType('tag')->get();

		return view("Examination.Admin.title_editform",compact('title','category','tag'));
	}

	public function title_edit(Request $request){
		$request->validate([
			'id' =>'required',
			'title' => 'required|string',
			'content' => 'required|string',
			'status' => 'required',
			'slug' => 'required',
			//is_arrayをけす
			'tags' => 'array']);
		$post = Post::find($request->id);
		$post->title = $request->title;
		$post->content = $request->content;
		$post->status = $request->status;
		$post->slug = $request->slug;
		$post->save();
		//attach
		$post->taxonomy()->detach();
		$post->taxonomy()->attach($request->category);
		$post->taxonomy()->attach($request->tags);

		return redirect("Examination/title_lists");
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
		$category_lists = Taxonomy::whereType('category')->get();
		return view("Examination.Admin.category_lists",array("category_lists" => $category_lists));
	}

	public function category_editform($id){
		$category = Taxonomy::find($id);
		if(is_null($category)){
			return redirect("Examination/category_lists");
		}
		return view("Examination.Admin.category_editform",array("category_edit" => $category));
	}

	public function category_edit(Request $request){
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'slug' => 'required'
			]);
		$cate = Taxonomy::find($request->id);
		$cate->name = $request->name;
		$cate->description = $request->description;
		$cate->slug = $request->slug;
		$cate->save();
		return redirect("Examination/category_lists");
	}

	public function categorydelete(Request $request){
		validate([
			'ids' => 'array|required']);
		Taxonomy::destroy($request->ids);
		return redirect("Examination/lists");
	}

		public function tag_lists(){
		$tag_lists = Taxonomy::whereType('tag')->get();
		return view("Examination.Admin.tag_lists",array("tag_lists" => $tag_lists));
	}

	public function tag_editform($id){
		$tag = Taxonomy::find($id);
		if(is_null($tag)){
			return redirect("Examination/tag_lists");
		}
		return view("Examination.Admin.tag_editform",array("tag_edit" => $tag));
	}

	public function tag_edit(Request $request){
		$request->validate([
			'name' => 'required',
			'description' => 'required',
			'slug' => 'required'
			]);
		$tag = Taxonomy::find($request->id);
		$tag->name = $request->name;
		$tag->description = $request->description;
		$tag->slug = $request->slug;
		$tag->save();
		return redirect("Examination/tag_lists");
	}

	public function tag_delete(Request $request){
		validate([
			'ids' => 'array|required']);
		Taxonomy::destroy($request->ids);
		return redirect("Examination/lists");
	}

	public function changePasswordForm(){
		return view("Examination.ChangePasswordForm");
	}

	public function changePassword(Request $request){
		$user = User::find($request->id);

		if(!Hash::check($request->oldpassword,$user->password)){
			return redirect("Examination/ChangePasswordForm",[$check=>'oldfalse']);
		}
		if($request->newpassword != $request->newpasswordcheck){
			return redirect("Examination/ChangePasswordForm",[$check => 'newfalse']);
		}

		$user->password = $request->newpassword;
		$user->save();

		return view("Examination/SuccessForm");
	}
}