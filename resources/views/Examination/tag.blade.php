@extends('layouts.list')
@section('title','タグ一覧')
@section('list')
    <h1>タグの一覧</h1>
        @foreach ($tags as $tag)
        <a href = "tag_article_list/{{$tag->name}}">
            {{$tag->name}}
        </a>
        <br>
        @endforeach
@if (Route::has('login'))
    <div class="top-right links">
        @auth
            <a href="{{ url('/home') }}">Home</a>
        @else
            <a href="{{ route('login') }}">Login</a>

            @if (Route::has('register'))
                <a href="{{ route('register') }}">Register</a>
            @endif
        @endauth
    </div>
@endif
@section('logout')
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
@endsection