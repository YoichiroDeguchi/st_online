<x-app-layout>
  <x-slot name="header">
    <h2 class="font-semibold text-xl text-gray-800 leading-tight">
      {{ __('新規利用者作成') }}
    </h2>
  </x-slot>

  <div class="py-12">
    <div class="max-w-7xl mx-auto sm:w-8/12 md:w-1/2 lg:w-5/12">
      <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
        <div class="p-6 bg-white border-b border-gray-200">
          @include('common.errors')
          <form class="mb-6" action="{{ route('patient.store') }}" method="POST">
            @csrf
            <div class="flex flex-col mb-4">
              <x-input-label for="name" :value="__('名前')" />
              <x-text-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
              <x-input-error :messages="$errors->get('name')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="birthdate" :value="__('生年月日')" />
              <x-text-input id="birthdate" class="block mt-1 w-full" type="text" placeholder="YYYY-MM-DD" name="birthdate" :value="old('birthdate')" required autofocus />
              <x-input-error :messages="$errors->get('birthdate')" class="mt-2" />
            </div>
            <div class="flex flex-col mb-4">
              <x-input-label for="disease_name" :value="__('疾患名')" />
              <x-text-input id="disease_name" class="block mt-1 w-full" type="text" name="disease_name" :value="old('disease_name')" required autofocus />
              <x-input-error :messages="$errors->get('disease_name')" class="mt-2" />
            </div>
            <div class="flex items-center justify-end mt-4">
              <x-primary-button class="ml-3">
                {{ __('新規登録') }}
              </x-primary-button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</x-app-layout>