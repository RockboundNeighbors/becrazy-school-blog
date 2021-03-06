<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>削除済記事リスト</title>
</head>
<body>
    <div class="flex-center position-ref">
        <h1>削除済の記事リスト</h1>
        <form method="POST" action="titledelete">
            @csrf
            <table border="1" cellspacing="0" cellpadding="5" align="left">
                <thead>
                    <tr>
                        <th>選択</th><th>id</th><th>タイトル</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($titlelists as $title)
                    @continue($title->deleted_at == NULL)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $title->id }}"></td>
                            <td>{{ $title->id }}</td>
                            <td><a href="titleedit{{$title->id}}">{{ $title->title }}</a></td>
                            
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <input type="submit" value="選択した記事を公開する">
        </form>
    </div>
    <a href ="index">管理者ページへ</a>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
    </form>
</body>
</html>