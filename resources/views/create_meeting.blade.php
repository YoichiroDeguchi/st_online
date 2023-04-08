<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('オンライン同行申し込み画面') }}
    </h2>
  </x-slot>

    <div class="py-12">
      <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
          <div class="p-6 bg-white border-b border-gray-200">
            <h1 class="text-center mb-6">オンライン同行申し込み</h1>
            <form action="{{ route('create_meeting') }}" method="post">
                @csrf
                <div class="flex flex-col mb-4">
                    <label for="name">名前:</label>
                    <input class="block mt-1 w-full rounded-md" type="text" id="name" name="name" required>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="office">事業所名:</label>
                    <input class="block mt-1 w-full rounded-md" type="text" id="office" name="office" required>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="start_time">ミーティング開始日時:</label>
                    <input class="block mt-1 w-full rounded-md" type="datetime-local" id="start_time" name="start_time" required>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="client_name">ご利用者名:</label>
                    <input class="block mt-1 w-full rounded-md" type="text" id="client_name" name="client_name" required>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="age">年齢:</label>
                    <input class="block mt-1 w-full rounded-md" type="number" id="age" name="age" min="0" required>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="disease">疾患名:</label>
                    <input class="block mt-1 w-full rounded-md" type="text" id="disease" name="disease" required>
                </div>
                <div class="flex flex-col mb-4">
                    <label for="consultation">相談内容:</label>
                    <textarea class="block mt-1 w-full rounded-md" id="consultation" name="consultation" rows="4" cols="50" required></textarea>
                </div>
                <div class="text-center">
                    <button class="text-white bg-indigo-500 border-0 py-2 px-6 focus:outline-none hover:bg-indigo-600 rounded text-lg" type="submit">申し込み</button>
                </div>
            </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>
