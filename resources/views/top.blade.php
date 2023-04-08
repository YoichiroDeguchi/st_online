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
    <div class="min-h-screen flex flex-col">
        <header class="p-6 bg-white shadow-md">
            <div class="container mx-auto flex justify-end items-center">
                <a href="{{ route('login') }}" class="bg-indigo-500 text-white px-4 py-2 rounded">ログイン</a>
            </div>
        </header>
        <div class="flex-grow flex items-center justify-center">
            <div class="text-center">
                <h1 class="text-4xl font-thin text-gray-800 tracking-wider mb-4">STオンライン</h1>
                <p class="text-lg font-semibold text-gray-600">Hanabi Co., Ltd.</p>
            </div>
        </div>
    </div>
</body>
</html>