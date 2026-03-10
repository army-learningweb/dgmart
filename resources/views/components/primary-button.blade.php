<button {{ $attributes->merge(['type' => 'submit', 'class' => 'text-black bg-gradient-to-r from-teal-500 to-emerald-500 rounded-md shadow-sm hover:brightness-110 px-3 py-[6px]']) }}>
    {{ $slot }}
</button>
