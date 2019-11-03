<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>タグ一覧</title>
</head>
<body>
    <h1>タグの一覧</h1>
        @foreach ($tags as $tag)
        <a href = "{{$tag->slug}}">
            {{$tag->name}}
        </a>
        <br>
        @endforeach
</body>
</html>