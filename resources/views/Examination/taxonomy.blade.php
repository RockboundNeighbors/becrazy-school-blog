@extends('layouts.list')
@if($taxonomy == 'category')
	@section('title','カテゴリー一覧')
@elseif($taxonomy == 'tag')
	@section('title','タグ一覧')
@endif
@section('list')	
	@if($taxonomy[0]->type == 'category')
		<h1>カテゴリーの一覧</h1>
	@elseif($taxonomy[0]->type == 'tag')
		<h1>タグの一覧</h1>
	@endif

        @foreach ($taxonomy as $t)
        <a href = "{{$t->type}}_article_list/{{$t->name}}">
            {{$t->name}}
        </a>
        <br>
        @endforeach
@if (Route::has('login'))
    <div class="top-right links">
        @auth
        @else
            <a href="{{ route('login') }}">ログイン</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">新規登録</a>
            @endif
        @endauth
    </div>
@endif
@section('logout')
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
@endsection