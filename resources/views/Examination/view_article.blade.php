@extends('layouts.view_article_layout')
@section('title', $articles->title)
@section('content')
	<h1>{{$articles->title}}<h1>
	<h3>{{$articles->content}}</h1>
@endsection