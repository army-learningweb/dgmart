<x-app-layout>

    <div>
        <x-statis.statis/>
    </div>

    <div class="shadow-md text-gray-400 bg-white p-3 rounded-2xl h-[500px] mt-2">
        {{ session('module_active') }}
    </div>
    
</x-app-layout>
