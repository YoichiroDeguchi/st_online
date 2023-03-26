<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('オンライン同行申し込み画面') }}
    </h2>
  </x-slot>

    <h1>オンライン同行申し込み</h1>
    <form action="{{ route('create_meeting') }}" method="post">
        @csrf
        <div>
            <label for="name">名前:</label>
            <input type="text" id="name" name="name" required>
        </div>
        <div>
            <label for="office">事業所名:</label>
            <input type="text" id="office" name="office" required>
        </div>
        <div>
            <label for="start_time">ミーティング開始日時:</label>
            <input type="datetime-local" id="start_time" name="start_time" required>
        </div>
        <div>
            <label for="client_name">ご利用者名:</label>
            <input type="text" id="client_name" name="client_name" required>
        </div>
        <div>
            <label for="age">年齢:</label>
            <input type="number" id="age" name="age" min="0" required>
        </div>
        <div>
            <label for="disease">疾患名:</label>
            <input type="text" id="disease" name="disease" required>
        </div>
        <div>
            <label for="consultation">相談内容:</label>
            <textarea id="consultation" name="consultation" rows="4" cols="50" required></textarea>
        </div>
        <button type="submit">ミーティングを作成</button>
    </form>
</x-app-layout>
