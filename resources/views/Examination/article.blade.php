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
@endsection