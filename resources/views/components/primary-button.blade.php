<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-gray-800 bg-gradient-to-r from-teal-500 to-emerald-500 rounded-md shadow-sm hover:brightness-110 text-sm px-3 py-[7px]']) }}>
    {{ $slot }}
</button>
