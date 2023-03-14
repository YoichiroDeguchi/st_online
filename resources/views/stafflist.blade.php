<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    {{-- @vite('resources/css/app.css') --}}
    <title>スタッフ一覧</title>
</head>
<body>
    <h2>スタッフ一覧</h2>
    <p>田中　太郎</p>
    <p>山田　花子</p>
    <p>佐藤　二郎</p>
    <a href="{{ route('staffmanagement') }}">スタッフ管理へ</a>
</body>
</html>