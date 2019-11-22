@extends('layouts.list')
@if($taxonomy == 'category')
	@section('title','カテゴリー一覧')
@elseif($taxonomy == 'tag')
	@section('title','タグ一覧')
@endif
@section('list')	
	@if($taxonomy[0]->type == 'category')
		<h1>カテゴリーの一覧</h1>
	@elseif($taxonomy[0]->type == 'tag')
		<h1>タグの一覧</h1>
	@endif

        @foreach ($taxonomy as $t)
        <a href = "{{$t->type}}_article_list/{{$t->name}}">
            {{$t->name}}
        </a>
        <br>
        @endforeach
@endsection