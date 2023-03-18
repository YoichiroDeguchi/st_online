<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('スタッフ情報の編集') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white dark:bg-gray-800 border-b border-gray-200 dark:border-gray-800 ">
          @include('common.errors')
          <form class="mb-6" action="{{ route('user.update',$user->id) }}" method="POST">
            @method('put')
            @csrf

            <div class="flex flex-col mb-4">
              <x-input-label for="name" :value="__('名前')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" value="{{$user->name}}" required autofocus />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>

            <div class="flex flex-col mb-4">
              <x-input-label for="email" :value="__('メールアドレス')" />
              <x-text-input id="email" class="block mt-1 w-full" type="text" name="email" value="{{$user->email}}" autofocus />
              <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <div class="flex flex-col mb-4">
              <x-input-label for="role" :value="__('管理者権限')" />
              <x-text-input id="role" class="block mt-1 w-full" type="int" name="role" value="{{$user->role}}" autofocus />
              <x-input-error :messages="$errors->get('role')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
              <a href="{{ url()->previous() }}">
                <x-secondary-button class="ml-3">
                  {{ __('戻る') }}
                </x-primary-button>
              </a>
              <x-primary-button class="ml-3">
                {{ __('編集') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>

