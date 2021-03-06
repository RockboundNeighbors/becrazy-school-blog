@extends('layouts.list')
@section('title','タグごとの記事一覧')



@section('list')
	<h3>タグ「{{$name}}」の記事一覧</h3>
    @foreach ($articles as $article)
    <a href = "../view_article/{{$article->slug}}">
        {{$article->title}}
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