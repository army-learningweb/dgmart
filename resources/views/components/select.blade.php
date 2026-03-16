@props([
    'name',
    'id' => '',
    'module',
    'class'
])

<div>
    <form action="" method="post">
        @csrf
        <select name="{{ $name }}" id="{{ $id }}" 
        {{ $attributes->merge(["class" => "$class py-[4px] rounded-md text-sm dark:text-gray-400 dark:bg-[#1e1f20] focus:border-emerald-500 focus:ring-emerald-500"])}}
        data-module="{{ $module }}">    
        {{ $slot }}
        </select>
    </form>
</div>
