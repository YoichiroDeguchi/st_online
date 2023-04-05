<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('全予約状況') }}
    </h2>
  </x-slot>

<div class="container max-w-8xl px-4 mx-auto sm:px-8">
    <div class="py-8">
        <div class="px-4 py-4 -mx-4 overflow-x-auto sm:-mx-8 sm:px-8">
            <div class="inline-block min-w-full overflow-hidden rounded-lg shadow">
                <table class="min-w-full leading-normal">
                    <thead>
                        <tr>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                名前
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                事業所名
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                開始日時
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                ご利用者名
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                年齢
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                疾患名
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                相談内容
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                開始ボタン
                            </th>
                            <th scope="col" class="px-5 py-3 text-sm font-normal text-left text-gray-800 uppercase bg-white border-b border-gray-200">
                                予約取り消し
                            </th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach ($meetings as $meeting)
                        <tr>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $meeting->name }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $meeting->office }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $meeting->start_time }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $meeting->client_name }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $meeting->age }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $meeting->disease }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <p class="text-gray-900 whitespace-no-wrap">
                                    {{ $meeting->consultation }}
                                </p>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                    <span aria-hidden="true" class="absolute inset-0 bg-indigo-500 rounded-full opacity-50">
                                    </span>
                                    <span class="relative">
                                        <a class="text-white" href="{{ $meeting->join_url }}" target="_blank">訪問同行を開始</a>
                                    </span>
                                </span>
                            </td>
                            <td class="px-5 py-5 text-sm bg-white border-b border-gray-200">
                                <span class="relative inline-block px-3 py-1 font-semibold leading-tight text-green-900">
                                    <span aria-hidden="true" class="absolute inset-0 text-white bg-red-500 rounded-full opacity-50">
                                    </span>
                                    <span class="relative">
                                        <form action="{{ route('delete_meeting', $meeting->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="text-white" type="submit" class="btn btn-danger">予約取消</button>
                                        </form>
                                    </span>
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

{{-- 
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
    </table> --}}
</x-app-layout>