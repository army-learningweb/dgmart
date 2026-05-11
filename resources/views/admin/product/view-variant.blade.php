<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-variant" title="Tạo thông số mới" button_create="Tạo mới"
        route="{{ route('admin.products.variants.store') }}" variant="md:min-w-[350px] md:max-h-[500px]">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên" type="text" name="name" required="*"
                autocomplete="on" />
            <span class="text-gray-400 text-xs">Ví dụ: Intel R5 Ultra </span>
        </div>

        <div class="mt-2">
            <x-input-field.field id="slug" label="Slug" type="text" name="slug" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: CPU</span>
        </div>

        <div class="mt-2">
            <x-input-field.field id="price" label="Giá" type="number" name="price" required="*"
                autocomplete="on" />
            <span class="text-gray-400 text-xs">Ví dụ: Intel R5 Ultra </span>
        </div>

         <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc"
                required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Phù hợp với tác vụ văn phòng</span>
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal-edit --}}
    <x-modal-dial.modal-edit modal="edit-variant" title="Cập nhật" button_edit="Cập nhật"
        route="{{ route('admin.products.variants.update') }}" variant="md:min-w-[350px]">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên" type="text" name="name" required="*"
                autocomplete="on" />
            <span class="text-gray-400 text-xs">Ví dụ: Intel R5 Ultra </span>
        </div>

        <div class="mt-2">
            <x-input-field.field id="slug" label="Slug" type="text" name="slug" required="*" />
            <span class="text-gray-400 text-xs">Ví dụ: CPU</span>
        </div>

        <div class="mt-2">
            <x-input-field.field id="price" label="Giá" type="number" name="price" required="*"
                autocomplete="on" />
            <span class="text-gray-400 text-xs">Ví dụ: Intel R5 Ultra </span>
        </div>

         <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc"
                required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Phù hợp với tác vụ văn phòng</span>
        </div>

        <input type="hidden" name="id" value={{ session('variant_id') ? session('variant_id') : '' }}>
        <input type="hidden" name="modal" value="edit">

    </x-modal-dial.modal-edit>

    {{-- ============================== --}}
    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách thông số </div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-variant">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M4.5 12a7.5 7.5 0 0 0 15 0m-15 0a7.5 7.5 0 1 1 15 0m-15 0H3m16.5 0H21m-1.5 0H12m-8.457 3.077 1.41-.513m14.095-5.13 1.41-.513M5.106 17.785l1.15-.964m11.49-9.642 1.149-.964M7.501 19.795l.75-1.3m7.5-12.99.75-1.3m-6.063 16.658.26-1.477m2.605-14.772.26-1.477m0 17.726-.26-1.477M10.698 4.614l-.26-1.477M16.5 19.794l-.75-1.299M7.5 4.205 12 12m6.894 5.785-1.149-.964M6.256 7.178l-1.15-.964m15.352 8.864-1.41-.513M4.954 9.435l-1.41-.514M12.002 12l-3.75 6.495" />
                    </svg>

                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="products-variant" total="{{ $total }}" />
            </div>
        </div>

        <div class="mt-3">
            <form action="{{ route('admin.products.variants.action') }}" method="post" id="form-product-variant">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">

                {{-- action --}}
                <div class="flex gap-2 items-center justify-between md:w-auto md:order-1 order-2">
                    <x-form-element.select name="action" class="flex-1" form="form-product-variant">
                        <option value="">Hành động hàng loạt</option>
                        <option value="destroy" {{ old('action') == 'destroy' ? 'selected' : '' }}>Xóa vĩnh viễn
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[40%]" form="form-product-variant"/>
                </div>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                    {{-- orderby price --}}
                    <div>
                        <x-form-element.select name="product-filter" module="products" type="variants" class="select-filter py-1">
                            <option value="">Lọc theo nhóm</option>
                                @foreach ($variant_select as $slug => $items)
                                    <option value="{{ $slug }}">{{ ucfirst($slug) }}</option>
                                @endforeach
                        </x-form-element.select>
                    </div>

                    {{-- reset --}}
                    <div class="hidden md:block">
                        <x-button.button-reset link="{{ route('admin.products.variants') }}" />
                    </div>

                </div>
            </div>

            {{-- list --}}
            <div class="list-variants pb-5">
                @include('admin.product.partials.list-variant')
            </div>
        </div>
    </div>
</x-app-layout>
