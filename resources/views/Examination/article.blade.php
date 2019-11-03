<!doctype html>
<html lang="ja">
<head>
    <meta charset="utf-8">
    <title>記事一覧</title>
</head>
<body>
    <h1>記事の一覧（全て）</h1>
        @foreach ($articles as $article)
        @continue($article->completed_at !== NULL)
        <a href = "{{$article->slug}}">
            {{$article->title}}
        </a>
        <br>
        @endforeach
</body>
</html>