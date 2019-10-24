<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>記事一覧</title>
</head>
<body>
        <h1>完了したTodo</h1>
        <form method="POST" action="delete">
            @csrf
            <table border="1" cellspacing="0" cellpadding="5" align="left">
                <thead>
                    <tr>
                        <th>選択</th><th>id</th><th>タイトル</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        @continue($article->completed_at == NULL)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $fin->id }}"></td>
                            <td>{{ $fin->id }}</td>
                            <td><a href="{{$fin->id}}">{{ $article->title }}</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <br>
        </form>
    </div>
</body>
</html>