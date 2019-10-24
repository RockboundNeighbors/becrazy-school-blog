<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <meta name="viewport">
    <title>カテゴリーリスト</title>
</head>
<body>
    <div class="flex-center position-ref">
        <h1>カテゴリーのリスト</h1>
        <form method="POST" action="categorydelete">
            @csrf
            <table border="1" cellspacing="0" cellpadding="5" align="left">
                <thead>
                    <tr>
                        <th>選択</th><th>id</th><th>カテゴリー</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($category_lists as $category)
                        <tr>
                            <td><input type="checkbox" name="ids[]" value="{{ $category->id }}"></td>
                            <td>{{ $category->id }}</td>
                            <td><a href="category_edit{{$category->id}}">{{ $category->name }}</a></td>
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