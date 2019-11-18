@extends('layouts.list')
@section('title','カテゴリごとの記事一覧')
@section('list')
   <h1>カテゴリー分けの記事一覧</h1>
   @dump($articles)
        @foreach ($articles as $article)
        <a href = "../view_article/{{$article->slug}}">
            {{$article->title}}
        </a>
        <br>
        @endforeach
@endsection