{{-- <x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('管理画面') }}
        </h2>
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
    <title>管理画面</title>
</head>
<body>
    <h2>管理画面</h2>
    <a href="{{ route('patientlist') }}">利用者管理</a>
    <a href="{{ route('staffmanagement') }}">スタッフ管理</a>
    <a href="{{ route('dashboard') }}">TOPへ</a>
</body>
</html>