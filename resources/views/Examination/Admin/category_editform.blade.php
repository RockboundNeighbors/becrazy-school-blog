<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>カテゴリー編集用フォーム</title>
</head>
<body>
    <h1>カテゴリー編集ぺージ</h1>
    <form method="POST" action="category_edit">
        @csrf
        <input type="hidden" name="id" value="{{ $category_edit->id }}">
        <dl>
            <dt>カテゴリー名</dt>
            <dd><input type="text" name="title" required value ="{{ $category_edit->name }}"></dd>
        </dl>
        <dl>
            <dt>メモ</dt>
                <dd>
                    <textarea name="content" required>{{ $category_edit->content }}</textarea>
                </dd>
        </dl>
        <dl>
            <dt>URL</dt>
                <dd>
                    <textarea name="slug" required>{{ $category_edit->slug }}</textarea>
                </dd>
        </dl>
        <dl>
            <dt>説明文</dt>
                <dd>
                    <textarea name="description">{{$category_edit->description}}</textarea>
                </dd>
        </dl>
        <input type="submit" value="更新">
    </form>
<a href ="index">管理者ページへ</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
</form>
</body>