<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <title>タグーリスト</title>
</head>
<body>
    <div class="flex-center position-ref">
        <h1>カテゴリーのリスト</h1>
        <form method="POST" action="tag_delete">
            @csrf
            <table border="1" cellspacing="0" cellpadding="5" align="left">
                <thead>
                    <tr>
                        <th>選択</th><th>id</th><th>タグ</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tag_lists as $tag)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $tag->id }}"></td>
                            <td>{{ $tag->id }}</td>
                            <td><a href="tag_edit{{$tag->id}}">{{ $tag->name }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="選択したカテゴリーを削除する">
        </form>
    </div>
    <a href ="index">管理者ページへ</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
    </form>
</body>
</html>