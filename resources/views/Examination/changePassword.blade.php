@extends('layouts/list')
@section('title','パスワードの変更フォームです')

@section('list')
	@if($check == 'newfalse')
		<div>確認欄にいれたパスワードが一致しません。</div>
	@elseif($check == 'oldfalse')
		<div>旧パスワードが間違っています。</div>
	@else
		<div>パスワードの変更フォームでございます。


	<form method='POST' action='{{route('changePassword')}}'>
		@csrf
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
@endsection