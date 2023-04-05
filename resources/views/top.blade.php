<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    @vite('resources/css/app.css')
    <title>ST_online</title>
</head>
<body>
<div class="flex items-center flex-col justify-center h-screen">
    <div class="text-center text-2xl font-bold mb-6">STオンライン</div>
    <a class="px-6 py-3 bg-indigo-500 text-xl text-white font-semibold rounded hover:bg-indigo-600" href="{{ route('login') }}">ログイン</a>
</div>
</body>
</html>