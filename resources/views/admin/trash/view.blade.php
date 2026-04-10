<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách File rác </div>

            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="trashs" total="{{ $total }}" />
            </div>
        </div>

        <div class="mt-2">
            <form action="{{ route('admin.trashs.destroy_all') }}" method="POST" id="form_action_trashs">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">
                {{-- action --}}
                <button form="form_action_trashs"
                    class="bg-gradient-to-r from-blue-500 to-blue-700 px-3 py-1 rounded-md text-white flex items-center gap-2 hover:brightness-110">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M9.813 15.904 9 18.75l-.813-2.846a4.5 4.5 0 0 0-3.09-3.09L2.25 12l2.846-.813a4.5 4.5 0 0 0 3.09-3.09L9 5.25l.813 2.846a4.5 4.5 0 0 0 3.09 3.09L15.75 12l-2.846.813a4.5 4.5 0 0 0-3.09 3.09ZM18.259 8.715 18 9.75l-.259-1.035a3.375 3.375 0 0 0-2.455-2.456L14.25 6l1.036-.259a3.375 3.375 0 0 0 2.455-2.456L18 2.25l.259 1.035a3.375 3.375 0 0 0 2.456 2.456L21.75 6l-1.035.259a3.375 3.375 0 0 0-2.456 2.456ZM16.894 20.567 16.5 21.75l-.394-1.183a2.25 2.25 0 0 0-1.423-1.423L13.5 18.75l1.183-.394a2.25 2.25 0 0 0 1.423-1.423l.394-1.183.394 1.183a2.25 2.25 0 0 0 1.423 1.423l1.183.394-1.183.394a2.25 2.25 0 0 0-1.423 1.423Z" />
                    </svg>

                    <span>Dọn dẹp File rác</span>

                </button>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                    {{-- reset --}}
                    <div class="hidden md:block">
                        <x-button.button-reset />
                    </div>

                </div>
            </div>

            {{-- list --}}
            <div class="list-trashs pb-5">
                @include('admin.trash.partials.list')
            </div>

        </div>

    </div>
</x-app-layout>
