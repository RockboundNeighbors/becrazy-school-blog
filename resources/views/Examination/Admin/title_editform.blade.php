<!doctype html>
<html lang="utf-8">
<head>
    <meta charset="utf-8">
    <title>記事編集用フォーム</title>
</head>
<body>
    <h1>記事編集ぺージ</h1>
    <form method="POST" action="title_edit">
        @csrf
        <input type="hidden" name="id" value="{{ $title->user_id }}">
        <dl>
            <dt>タイトル</dt>
            <dd>
                <input type="text" name="title" required value="{{ $title->title }}">
            </dd>
        </dl>
        <dl>
            <dt>内容？</dt>
            <dd>
                <textarea name="content" required>{{ $title->content }}</textarea>
            </dd>
        </dl>
        <dl>
            <dt>URL</dt>
            <dd>
                <textarea name="slug" required>{{ $title->slug }}</textarea>
            </dd>
        </dl>
        <dl>
            <dt>ステータス</dt>
            <dd>
                <input type ="radio" name="status" value ="publish" required>公開済にする
                <input type ="radio" name="status" value ="draft" required>非公開にする（下書きに格納）
            </dd>
        </dl>
        <dl>
            <dt>関連カテゴリー設定</dt>
            <dd>
                @foreach ($category as $name)
                <input type='radio' name='category' value='{{$name->id}}'>{{$name->name}}
                @endforeach
            </dd>
        </dl>
         <dl>
            <dt>関連タグ設定</dt>
            <dd>
                @foreach ($tag as $name)
                <input type='checkbox' name='tags[]' value='{{$name->id}}'>{{$name->name}}
                @endforeach
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
</html>