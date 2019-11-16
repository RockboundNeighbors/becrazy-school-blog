@extends('layouts.list')
@section('title','カテゴリごとの記事一覧')
@section('list')
   <h1>カテゴリー分けの記事一覧</h1>
        @foreach ($articles as $article)
        <a href = "{{$article->slug}}">
            {{$article->name}}
        </a>
        <br>
        @endforeach
@endsection