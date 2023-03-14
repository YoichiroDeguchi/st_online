{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('スタッフ管理') }}
        </h2>
        <a href="{{ route('stafflist') }}">スタッフ一覧</a>
        <a href="{{ route('register') }}">アカウント作成</a>
    </x-slot>
</x-app-layout> --}}

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Styles -->
    {{-- @vite('resources/css/app.css') --}}
    <title>スタッフ管理</title>
</head>
<body>
    <h2>スタッフ管理</h2>
    <a href="{{ route('stafflist') }}">スタッフ一覧</a>
    <a href="{{ route('register') }}">アカウント作成</a>
    <a href="{{ route('management') }}">管理画面へ</a>
</body>
</html>