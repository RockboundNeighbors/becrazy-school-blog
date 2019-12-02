@extends('layouts.list')
@section('title','記事の一覧')
@section('list')
	<h1>記事の一覧（全て）</h1>
        @foreach ($articles as $article)
        @continue($article->completed_at !== NULL)
        <a href = "view_article/{{$article->slug}}">
            {{$article->title}}
        </a>
        <br>
        @endforeach

    <div class="flex-center position-ref full-height">
        @if (Route::has('login'))
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
    </div>
@endsection