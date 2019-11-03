<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>カテゴリー一覧</title>
</head>
<body>
    <h1>カテゴリーの一覧</h1>
        @foreach ($categories as $category)
        <a href = "{{$category->slug}}">
            {{$category->name}}
        </a>
        <br>
        @endforeach
</body>
</html>