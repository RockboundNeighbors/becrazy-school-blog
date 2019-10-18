<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>ブログ作成試験</title>
</head>
<body>
    <div class="flex-center position-ref">
        <h1>カテゴリー追加ページ</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form method="POST" action="categoryadd">
            @csrf
            <input type="hidden" name="userid" value="{{Auth::id()}}"
            <dl>
                <dt>追加カテゴリー</dt>
                <dd><input type="text" name="category" required></dd>
            </dl>
            <input type="submit" value="カテゴリー追加">
        </form>
        <a href ="index">管理者ページへ</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
</form>
</body>
</html>