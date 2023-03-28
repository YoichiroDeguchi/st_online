<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('申し込みが完了しました。') }}
    </h2>
  </x-slot>

  <h1>申し込みが完了しました。</h1>
    <h2>{{ $meeting['topic'] }}</h2>
    <p><strong>Meeting ID:</strong> {{ $meeting['id'] }}</p>
    <p><strong>Start Time:</strong> {{ $meeting['start_time'] }}</p>
    <p><strong>Duration:</strong> {{ $meeting['duration'] }} minutes</p>
    <p><strong>Join URL:</strong> <a href="{{ $meeting['join_url'] }}">{{ $meeting['join_url'] }}</a></p>
</x-app-layout>