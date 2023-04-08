<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('利用者詳細画面') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          <div class="mb-6">

            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800">名前</p>
              <p class="py-2 px-3 text-gray-800" id="name">
                {{$patient->name}}
              </p>
            </div>

            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800">生年月日</p>
              <p class="py-2 px-3 text-gray-800" id="birthdate">
                {{$patient->birthdate}}
              </p>
            </div>

            <div class="flex flex-col mb-4">
              <p class="mb-2 uppercase font-bold text-lg text-gray-800">疾患名</p>
              <p class="py-2 px-3 text-gray-800" id="disease_name">
                {{$patient->disease_name}}
              </p>
            </div>

            <!-- コメント一覧 -->
            <p class="mb-2 uppercase font-bold text-lg text-gray-800">録画リンク</p>
            @foreach($patient->comments as $comment)
                <div class="flex items-center">
                    <div class="w-3/4 mb-3">
                        <p class="comment-body">{{ $comment->body }}</p>
                    </div>
                    @can('admin-higher')
                    <div class="ml-6">
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post" onsubmit="return confirm('削除しますか？');" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm ml-6 bg-red-500 text-white text-sm py-1 px-2 rounded cursor-pointer">削除</button>
                        </form>
                    </div>
                    @endcan
                </div>
            @endforeach

            <!-- コメント入力 -->
            @can('admin-higher')
            <p class="mt-6 mb-2 uppercase font-bold text-lg text-gray-800">管理者入力用</p>
            <form action="{{ route('patients.comments.store', $patient->id) }}" method="post" class="bg-gray-100 p-4 rounded-md mb-4">
                @csrf
                <div class="flex">
                    <div class="form-group">
                        <textarea name="body" id="body" rows="3" class="form-control w-full p-2 border border-gray-300 rounded resize-none mb-2"></textarea>
                    </div>
                    <div class="flex items-center">
                        <button type="submit" class="btn btn-primary ml-6 bg-blue-500 text-white text-sm py-1 px-2 rounded cursor-pointer">リンクを共有</button>
                    </div>
                </div>
            </form>
            @endcan

            {{-- <div class="flex items-center justify-end mt-4">
            <a href="{{ url()->previous() }}">
              <x-secondary-button class="ml-3">
                {{ __('戻る') }}
              </x-primary-button>
            </a>
            </div> --}}

        </div>
        </div> 
      </div>
    </div>
  </div>
</x-app-layout>

<script>
// リンクをクリックできるようにする
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

// リンクを青色で表示
document.addEventListener("DOMContentLoaded", () => {
    const commentLinks = document.querySelectorAll(".comment-body a");

    commentLinks.forEach((link) => {
        link.style.color = "blue";
        link.style.textDecoration = "underline";
    });
});

// リンクを折りたたみ表示
document.addEventListener("DOMContentLoaded", () => {
    const commentLinks = document.querySelectorAll(".comment-body a");

    commentLinks.forEach((link) => {
        link.style.color = "blue";
        link.style.textDecoration = "underline";
        link.style.wordBreak = "break-word";
    });
});
</script>