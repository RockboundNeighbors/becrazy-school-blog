@extends('layouts/list')
@section('title','パスワードの変更フォームです')

@section('list')
	<h1 class="text-danger">{{session('result')}}</h1>
	<div>パスワードを変更します</div>

	<form method='POST' action='{{route('changePassword')}}'>
		@csrf
		<div>
			<input type ='hidden' name='id' value= {{$id}}>
			<div>
				<label>旧パスワード:<input type='password' name='oldpassword'></label>
			</div>
			<div>
				<label>新しいパスワード:<input type='password' name='newpassword'></label>
			</div>
			<div>
				<label>新しいパスワードの確認:<input type='password' name='newpasswordcheck'></label>
			</div>
			<div>
				<input type='submit' value='パスワード変更'>
			</div>
		</div>
	</form>
@endsection
