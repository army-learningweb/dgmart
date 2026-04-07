<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-{{ $type }}-category" title="Tạo mới danh mục" button_create="Tạo mới"
        route="{{ route('admin.' . $type . 's.categories.store') }}" width="w-[400px]">

        <div class="mt-2">
            <x-input-field.field id="name" label="Tên danh mục" type="text" name="name" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="slug" label="Slug" type="text" name="slug" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: cong-nghe-open-ai</span>
            <span class="text-green-600 text-xs">( Dán tên vào Slug hệ thống tự xử lí )</span>
        </div>

        <div class="mt-2 flex flex-col">
            <label for="parent_category">Danh mục</label>
            <select id="parent_category" name="parent_category" class="rounded-md md:py-[3px] text-sm shadow-sm border-gray-500/30 w-full md:w-automd:w-full my-1 py-2 scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
                <option value="">(Trống)</option>
                @include('admin.category.partials.parent_categories')
            </select>
            <span class="text-amber-600 text-xs">Để " trống " nếu bạn muốn đây là danh mục Cha</span>
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal edit --}}
    <x-modal-dial.modal-edit modal="edit-category" title="Cập nhật thông tin danh mục" button_edit="Cập nhật"
        route="{{ route('admin.' . $type . 's.categories.update') }}" width="w-[400px]">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên danh mục" type="text" name="name" required="*" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="slug" label="Slug" type="text" name="slug" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: cong-nghe-open-ai</span>
            <span class="text-green-600 text-xs">( Dán tên vào Slug hệ thống tự xử lí )</span>
        </div>

        <div class="mt-2 flex flex-col">
            <label for="parent_category_{{ $type }}">Chọn danh mục cha</label>
            <select id="parent_category_{{ $type }}" name="parent_category"
                {{ old('is_parent') == 0 ? 'disabled' : '' }}
                class="select-parent-category py-[5px] shadow-sm text-[12px] md:w-auto my-1 rounded-md md:py-[3px] text-sm border-gray-500/30 w-full">
                <option value="0">( Trống )</option>
                @include('admin.category.partials.parent_categories')
            </select>
            <span class="text-amber-600 text-xs">Để " trống " nếu bạn muốn tạo danh mục Cha</span>
        </div>

        <input type="hidden" name="id" value="{{ old('id') }}">
        <input type="hidden" name="modal" value="edit">
        <input type="hidden" name="is_parent" value="{{ old('is_parent') }}">
    </x-modal-dial.modal-edit>

    {{-- =================================== --}}
    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex flex-col md:flex-row gap-2 md:items-center md:justify-between">
            <div class="flex items-center justify-between gap-2">

                {{-- title --}}
                <div class="text-lg"> {{ $type == 'post' ? 'Danh mục bài viết' : 'Danh mục sản phẩm' }}</div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-{{ $type }}-category">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M13.5 16.875h3.375m0 0h3.375m-3.375 0V13.5m0 3.375v3.375M6 10.5h2.25a2.25 2.25 0 0 0 2.25-2.25V6a2.25 2.25 0 0 0-2.25-2.25H6A2.25 2.25 0 0 0 3.75 6v2.25A2.25 2.25 0 0 0 6 10.5Zm0 9.75h2.25A2.25 2.25 0 0 0 10.5 18v-2.25a2.25 2.25 0 0 0-2.25-2.25H6a2.25 2.25 0 0 0-2.25 2.25V18A2.25 2.25 0 0 0 6 20.25Zm9.75-9.75H18a2.25 2.25 0 0 0 2.25-2.25V6A2.25 2.25 0 0 0 18 3.75h-2.25A2.25 2.25 0 0 0 13.5 6v2.25a2.25 2.25 0 0 0 2.25 2.25Z" />
                    </svg>
                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="{{ $type }}s" total="{{ $total }}"
                    active="{{ $active }}" unactive="{{ $unactive ? $unactive : 0 }}" />
            </div>
        </div>

        {{-- action --}}
        <div class="mt-2">
            <form action="{{ route("admin.{$type}s.categories.action") }}" method="POST" id="form_action_categories">
                @csrf</form>

            <div class="flex flex-col md:flex-row md:justify-between md:items-center">
                <div class="flex items-center justify-between md:justify-normal gap-2">
                    <x-form-element.select name="action" form="form_action_categories">
                        <option value="">Hành động hàng loạt</option>
                        <option value="active" {{ old('action') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="unactive" {{ old('action') == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[60%] md:w-auto" form="form_action_categories" />
                </div>

                <div class="hidden md:block">
                    <div class="flex gap-3">
                        <div class="flex gap-2">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-5 text-amber-500 shrink-0">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M2.25 12.75V12A2.25 2.25 0 0 1 4.5 9.75h15A2.25 2.25 0 0 1 21.75 12v.75m-8.69-6.44-2.12-2.12a1.5 1.5 0 0 0-1.061-.44H4.5A2.25 2.25 0 0 0 2.25 6v12a2.25 2.25 0 0 0 2.25 2.25h15A2.25 2.25 0 0 0 21.75 18V9a2.25 2.25 0 0 0-2.25-2.25h-5.379a1.5 1.5 0 0 1-1.06-.44Z" />
                        </svg>
                        <span>Danh mục cha</span>
                    </div>
                    <div class="flex gap-2">
                        <span class="shrink-0 ml-1 mr-2">└</span>
                        <span>
                            Danh mục con
                        </span>
                    </div>
                    </div>
                </div>
            </div>


            {{-- list --}}
            <div class="list-{{ $type . 's' }}-categories pb-5">
                @include('admin.category.partials.list-categories')
            </div>
        </div>

    </div>
</x-app-layout>
