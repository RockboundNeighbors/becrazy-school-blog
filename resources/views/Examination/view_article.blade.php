@extends('layouts.view_article_layout')
@section('title', $article->title)
@section('content')
	<h1>{{$article->title}}<h1>
	<h3>{{$article->content}}</h1>
@endsection