<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ブログ作成試験</title>
</head>
<body>
    <div class="flex-center position-ref">
        <h1>ブログ記事追加ページ</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="titleadd">
            @csrf
            <input type="hidden" name="userid" value="{{Auth::id()}}"
            <dl>
                <dt>タイトル</dt>
                <dd><input type="text" name="title" required value="{{ old('title') }}"></dd>
            </dl>
            <dl>
                <dt>本文</dt>
                <dd><textarea name="content" required></textarea></dd>
            </dl>
            <input type="submit" value="投稿">
        </form>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
</form>
</body>
</html>