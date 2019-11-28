@extends('layouts.list')
@section('title','カテゴリごとの記事一覧')
@section('list')
<h1>カテゴリー「{{$name}}」の記事一覧</h1>


    @foreach ($articles as $article)
    <a href = "../view_article/{{$article->slug}}">
        {{$article->title}}
    </a>
    <br>
    @endforeach
@section('logout')
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
@endsection