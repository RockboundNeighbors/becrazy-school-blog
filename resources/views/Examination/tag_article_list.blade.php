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
@endsection