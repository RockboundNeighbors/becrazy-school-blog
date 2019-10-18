<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>記事編集用フォーム</title>
</head>
<body>
    <h1>記事編集ぺージ</h1>
    <form method="POST" action="edit">
        @csrf
        <input type="hidden" name="id" value="{{ $titleedit->id }}">
        <dl>
            <dt>タイトル</dt>
            <dd><input type="text" name="title" required value="{{ $titleedit->title }}"></dd>
        </dl>
        <dl>
            <dt>メモ</dt>
            <dd><textarea name="content" required>{{ $todo->content }}</textarea></dd>
        </dl>
        <input type="submit" value="更新">
    </form>
<a href ="index">管理者ページへ</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
</form>
</body>
</html>