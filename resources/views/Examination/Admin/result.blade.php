<!doctype html>

<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<h1>試験用記事追加完了フォーム</h1>
	<a>記事の追加ができました</a>
	<a href ="index">管理者ページへ</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
    	@csrf
    	<input type="submit" value="ログアウト">
	</form>
</body>