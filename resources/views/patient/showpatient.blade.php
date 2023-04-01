<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('利用者詳細画面') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800">
          <div class="mb-6">

            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">名前</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="name">
                {{$patient->name}}
              </p>
            </div>

            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">生年月日</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="birthdate">
                {{$patient->birthdate}}
              </p>
            </div>

            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800 dark:text-gray-200">疾患名</p>
              <p class="py-2 px-3 text-gray-800 dark:text-gray-200" id="disease_name">
                {{$patient->disease_name}}
              </p>
            </div>

            @can('admin-higher')
            <!-- コメント入力 -->
            <form action="{{ route('patients.comments.store', $patient->id) }}" method="post">
                @csrf
                <div class="form-group">
                    <label for="body">録画リンク入力欄</label>
                    <textarea name="body" id="body" rows="3" class="form-control"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">リンクを共有</button>
            </form>
            @endcan

            <!-- コメント一覧 -->
            @foreach($patient->comments as $comment)
                <div>
                    {{-- <strong>{{ $comment->user->name }}:</strong> --}}
                    <p class="comment-body">{{ $comment->body }}</p>
                    @can('admin-higher')
                    <form action="{{ route('comments.destroy', $comment->id) }}" method="post" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">削除</button>
                    </form>
                    @endcan
                </div>
            @endforeach

            <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('戻る') }}
              </x-primary-button>
            </a>
            </div>

        </div>
        </div> 
      </div>
    </div>
  </div>
</x-app-layout>

<script>
document.addEventListener("DOMContentLoaded", () => {
    const commentElements = document.querySelectorAll(".comment-body");

    commentElements.forEach((element) => {
        const commentText = element.innerHTML;
        const urlPattern = /(?:https?:\/\/[^\s]+)|(?:www\.[^\s]+)/g;

        const linkedText = commentText.replace(urlPattern, (url) => {
            const protocolPattern = /^https?:\/\//;
            const href = protocolPattern.test(url) ? url : 'http://' + url;
            return `<a href="${href}" target="_blank" rel="noopener noreferrer">${url}</a>`;
        });

        element.innerHTML = linkedText;
    });
});
</script>