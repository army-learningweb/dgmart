<button
    {{ $attributes->merge(['type' => 'submit', 'class' => 'text-white bg-gradient-to-r from-blue-500 to-blue-700 rounded-md shadow-sm hover:brightness-110 text-sm px-3 py-[7px] w-full flex justify-center']) }}>
    {{ $slot }}
</button>
