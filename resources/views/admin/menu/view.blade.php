<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-menu" title="Tạo Link mới" button_create="Tạo mới"
        route="{{ route('admin.menus.store') }}" width="md:min-w-[450px]"
        variant="h-90vh md:max-h-[500px]">

        <div class="mt-2 space-y-2">
            <div>Cách 1: Tạo tự do với tên</div>
            <div>Cách 2: Tạo với danh mục</div>
            <div class="text-green-600">Slug được xử lý dựa theo tên hoặc danh mục đã chọn</div>
        </div>

        <div class="mt-2">
            <x-input-field.field id="link-name" label="Tên" type="text" name="link-name" required="*"
                autocomplete="on" />
        </div>

        <div class="mt-2">
            <label for="categories-product">Danh mục sản phẩm <span class="text-red-500">*</span></label>
            <select name="categories-product" id="categories-product"
                class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                <option value="">- Chọn danh mục</option>
                @include('admin.menu.partials.categories',['categories' => $categories_product, 'name' => 'categories-product'])
            </select>
        </div>

        <div class="mt-2">
            <label for="categories-post">Danh mục bài viết <span class="text-red-500">*</span></label>
            <select name="categories-post" id="categories-post"
                class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                <option value="">- Chọn danh mục</option>
                @include('admin.menu.partials.categories',['categories' => $categories_post, 'name' => 'categories-post'])
            </select>
        </div>

        <div class="mt-2">
            <label for="parent_id">Link cha <span class="text-gray-500 text-xs">(Để trống nếu muốn tạo Link cha)</span></label>
            <select name="parent_id" id="parent_id"
                class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                <option value="">- Chọn Link cha</option>
                @foreach ($menus as $menu)
                    <option value="{{$menu->id}}">{{$menu->name}}</option>
                @endforeach
            </select>
        </div>

        @if (session('failed'))
            <div class="mt-2 text-red-500">{{ session('failed') }}</div>
        @endif
        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal edit --}}
    <x-modal-dial.modal-edit modal="edit-menu" title="Cập nhật thông tin Link" button_edit="Cập nhật"
        route="{{ route('admin.menus.update') }}"  width="md:min-w-[450px]"
        variant="h-90vh md:max-h-[500px]">

        <div class="mt-2">
            <x-input-field.field id="link-name" label="Tên" type="text" name="link-name" required="*"
                autocomplete="on" />
        </div>

        <div class="mt-2">
            <label for="parent_id">Link cha <span class="text-gray-500 text-xs">(Để trống nếu muốn tạo Link cha)</span></label>
            <select name="parent_id" id="parent_id" {{ old('is_parent') == 0 ? 'disabled' : '' }}
                class="parent_id mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                <option value="">- Chọn Link cha</option>
                @foreach ($menus as $menu)
                    <option value="{{$menu->id}}" {{ old('is_parent') == $menu->id ? 'selected' : '' }}>{{$menu->name}}</option>
                @endforeach
            </select>
        </div>
       
        <input type="hidden" name="id" value="{{ old('id') }}">
        <input type="hidden" name="modal" value="edit">
        <input type="hidden" name="is_parent" value="{{ old('is_parent') }}">
    </x-modal-dial.modal-edit>

    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Menu </div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-menu">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.19 8.688a4.5 4.5 0 0 1 1.242 7.244l-4.5 4.5a4.5 4.5 0 0 1-6.364-6.364l1.757-1.757m13.35-.622 1.757-1.757a4.5 4.5 0 0 0-6.364-6.364l-4.5 4.5a4.5 4.5 0 0 0 1.242 7.244" />
                    </svg>
                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="menus" total="{{ $total }}" active="{{ $active }}" unactive="{{ $unactive }}" />
            </div>
        </div>

        <div class="mt-2">
            <form action="{{ route('admin.menus.action') }}" method="POST" id="form_action_menus">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">
                {{-- action --}}
                <div class="flex gap-2 items-center justify-between w-full md:w-auto md:order-1 order-2">
                    <x-form-element.select name="action" class="flex-1" form="form_action_menus">
                        <option value="">Hành động hàng loạt</option>
                        <option value="active" {{ old('action') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="unactive" {{ old('action') == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[40%]" form="form_action_menus" />
                </div>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                    {{-- reset --}}
                    <div class="hidden md:block">
                        <x-button.button-reset />
                    </div>

                </div>
            </div>

            {{-- list --}}
            <div class="list-menus pb-5">
                @include('admin.menu.partials.list')
            </div>

        </div>

    </div>
</x-app-layout>
