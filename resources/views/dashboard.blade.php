<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('STオンライン') }}
        </h2>
    </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-10/12 md:w-8/10 lg:w-8/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-grey-200 dark:border-gray-800">
            <section class="text-gray-600 body-font">
            <div class="container px-5 py-24 mx-auto">
                <div class="lg:w-3/4 w-full mx-auto">
                    <p class="leading-relaxed text-lg text-center mb-10 underline decoration-black">STオンラインへようこそ</p>
                    <P class="leading-relaxed text-lg">言語聴覚士によるオンライン訪問同行をご希望の方は「オンライン同行申し込み」ボタンから予約をお願いします。</P>
                    <p class="leading-relaxed text-lg mt-8 mb-2 text-center">＜使い方の説明＞</p>
                    <P class="leading-relaxed text-lg">1.「オンライン同行申し込み」画面から希望日時を予約します。</P>
                    <P class="leading-relaxed text-lg">2.当日になったら電波が繋がるタブレットを準備し、「予約状況確認」画面の「訪問同行を開始」ボタンを押し、オンライン訪問同行を開始します。</P>
                    <P class="leading-relaxed text-lg">3.後日、利用者ごとの詳細ページに同行時の録画データをup致します（3営業日以内）。</P>
                    <P class="leading-relaxed text-lg mt-6">※オンライン訪問同行を申し込む際は事前に該当利用者の新規作成をお願いします。</P>
                    <div class="text-center">
                        <span class="inline-block h-1 w-10 rounded bg-indigo-500 mt-8 mb-6"></span>
                    </div>
                    <h2 class="text-gray-900 font-medium title-font tracking-wider text-sm text-center">STオンライン</h2>
                </div>
            </div>
            </section>
        </div>
      </div>
    </div>
  </div>


</x-app-layout>
