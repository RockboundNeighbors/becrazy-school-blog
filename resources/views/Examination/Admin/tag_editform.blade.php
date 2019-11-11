<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">

    <title>タグ編集用フォーム</title>
</head>
<body>
    <h1>タグ編集ぺージ</h1>
    <form method="POST" action="tag_edit">
        @csrf
        <input type="hidden" name="id" value="{{ $tag_edit->id }}">
        <dl>
            <dt>タグ名</dt>
            <dd><input type="text" name="name" required value ="{{ $tag_edit->name }}"></dd>
        </dl>
        <dl>
            <dt>URL</dt>
                <dd>
                    <textarea name="slug" required>{{ $tag_edit->slug }}</textarea>
                </dd>
        </dl>
        <dl>
            <dt>説明文</dt>
                <dd>
                    <textarea name="description">{{$tag_edit->description}}</textarea>
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