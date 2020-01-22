<!doctype html>

<html lang="ja">
<head>
    <meta charset="utf-8">
</head>
<body>
	@if($resulttype=="title")
		<h1>試験用記事追加完了フォーム</h1>
		<a>記事の追加ができました</a>
	@elseif($resulttype=="category")
		<h1>試験用カテゴリー追加完了フォーム</h1>
		<a>カテゴリーの追加ができました</a>
	@elseif($resulttype=="tag")
		<h1>試験用タグ追加完了フォーム</h1>
		<a>タグの追加ができました</a>
	@endif
	<br>
	<a href ="index">管理者ページへ</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
    	@csrf
    	<input type="submit" value="ログアウト">
	</form>
</body>