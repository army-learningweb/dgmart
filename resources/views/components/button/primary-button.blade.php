<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'text-gray-900 bg-gradient-to-r from-teal-400 to-emerald-400 rounded-md shadow-md hover:brightness-110 text-sm px-3 py-[7px] w-full']) }}>
    {{ $slot }}
</button>
