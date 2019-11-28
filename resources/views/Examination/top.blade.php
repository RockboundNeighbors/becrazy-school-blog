@extends('layouts.list')
@section('title','トップ画面')
@section('list')
	<a href ="article_list">記事一覧へ</a>
	<hr>
	<hr>
	<a href ="category_list">カテゴリー一覧へ</a>
	<hr>
	<hr>
	<a href ="tag_list">タグ一覧へ</a>
	@if (Route::has('login'))
                <div class="top-right links">
                    @auth
                        <a href="{{ url('/home') }}">Home</a>
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