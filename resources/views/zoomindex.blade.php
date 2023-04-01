<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('全予約状況') }}
    </h2>
  </x-slot>

    <h1>全ての予約状況</h1>
    <table>
        <tr>
            <th>名前</th>
            <th>事業所名</th>
            <th>ミーティング開始日時</th>
            <th>ご利用者名</th>
            <th>年齢</th>
            <th>疾患名</th>
            <th>相談内容</th>
            <th>Join URL</th>
        </tr>
        @foreach ($meetings as $meeting)
            <tr>
                <td>{{ $meeting->name }}</td>
                <td>{{ $meeting->office }}</td>
                <td>{{ $meeting->start_time }}</td>
                <td>{{ $meeting->client_name }}</td>
                <td>{{ $meeting->age }}</td>
                <td>{{ $meeting->disease }}</td>
                <td>{{ $meeting->consultation }}</td>
                <td><a href="{{ $meeting->join_url }}" target="_blank">Join</a></td>
                <td>
                    <form action="{{ route('delete_meeting', $meeting->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">取消</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
</x-app-layout>