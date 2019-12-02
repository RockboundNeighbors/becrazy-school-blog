@extends('layouts.view_article_layout')
@section('title', $articles->title)
@section('content')
	<h1>{{$articles->title}}<h1>
	<h3>{{$articles->content}}</h1>
    @if(Route::has('login'))
        <div class="top-right links">
            @auth
                @section('logout')
                <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="ログアウト">
            @else
                <a href="{{ route('login') }}">ログイン</a>
                @if (Route::has('register'))
                <a href="{{ route('register') }}">新規登録</a>
                @endif
            @endauth
        </div>
    @endif
@endsection