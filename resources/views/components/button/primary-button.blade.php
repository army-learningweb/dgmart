<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'text-gray-900 bg-gradient-to-r from-teal-300 to-emerald-300 rounded-md shadow-sm hover:brightness-110 text-sm px-3 py-[7px] w-full']) }}>
    {{ $slot }}
</button>
