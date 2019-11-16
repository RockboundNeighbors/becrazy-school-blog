@extends('layouts.list')
@section('title','カテゴリー一覧')
@section('list')
   <h1>カテゴリーの一覧</h1>
        @foreach ($categories as $category)
        <a href = "category_article_list/{{$category->slug}}">
            {{$category->name}}
        </a>
        <br>
        @endforeach
@endsection