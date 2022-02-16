<button {{ $attributes->merge(['type' => 'submit', 'class' => 'block w-full max-w-xs mx-auto bg-gray-900 hover:bg-gray-400 focus:bg-gray-700 text-white rounded-lg px-2 py-2 font-semibold']) }}>
    {{ $slot }}
</button>
