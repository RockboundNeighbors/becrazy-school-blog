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
@endsection