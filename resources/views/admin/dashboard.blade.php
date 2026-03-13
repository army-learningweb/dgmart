<x-app-layout>

    <div>
        <x-statis.statis/>
    </div>

    <div class="shadow-md text-gray-400 bg-white dark:bg-[#1e1f20] p-3 rounded-md h-[500px] mt-2">
        {{ session('module_active') }}
    </div>
    
</x-app-layout>
