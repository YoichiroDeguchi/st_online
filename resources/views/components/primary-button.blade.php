<button {{ $attributes->merge(['type' => 'submit', 'class' => 'py-3 px-4 inline-flex justify-center items-center gap-2 rounded-md border border-transparent font-semibold bg-white text-gray-600 hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 transition-all text-sm dark:focus:ring-offset-gray-800']) }}>
    {{ $slot }}
</button>
