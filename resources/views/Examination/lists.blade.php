<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <title>記事リスト</title>
</head>
<body>
    <div class="flex-center position-ref">
        <h1>記事のリスト</h1>
        <form method="POST" action="delete">
            @csrf
            <table border="1" cellspacing="0" cellpadding="5" align="left">
                <thead>
                    <tr>
                        <th>選択</th><th>id</th><th>タイトル</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($titlelists as $title)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $title->id }}"></td>
                            <td>{{ $title->id }}</td>
                            <td><a href="titleedit{{$title->id}}">{{ $title->title }}</a></td>
                            
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>
    </div>
    <form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
    <input type="submit" value="ログアウト">
    </form>
</body>
</html>