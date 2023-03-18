<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    {{-- @vite('resources/css/app.css') --}}
    <title>ST_online</title>
</head>
<body>
    <div class="text-center text-2xl font-bold">STオンライン</div>
    <div class="text-center">
        <a href="{{ route('login') }}">ログイン</a>
        <a href="{{ route('register') }}">アカウント作成</a>
    </div>
</body>
</html>