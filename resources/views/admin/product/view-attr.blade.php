<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-product-attr" title="Tạo cấu hình mới" button_create="Tạo mới"
        route="{{ route('admin.products.attributes.store') }}" width="md:max-w-[700px]" variant="md:max-h-[700px]">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên cấu hình" type="text" name="name" required="*" autocomplete="on"/>
            <span class="text-gray-400 text-xs">Ví dụ: Laptop, Điện thoại</span>
        </div>

        <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc"
                required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Cấu hình cho Laptop</span>
        </div>

        <div class="my-3">
            <p>Chọn thông số cho cấu hình <span class="text-red-500 inline-block ms-3">@error('variants')
                {{ $message }}
            @enderror</span></p>
        </div>

        <div>
            @include('admin.product.partials.variants')
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal edit --}}
    <x-modal-dial.modal-edit modal="edit-product-attr" title="Cập nhật thông tin" button_edit="Cập nhật"
        route="{{ route('admin.products.attributes.update') }}" width="md:max-w-[700px]" variant="md:max-h-[700px]">
        <div class="mt-2">
            <x-input-field.field id="name" label="Tên cấu hình" type="text" name="name" required="*" autocomplete="on"/>
            <span class="text-gray-400 text-xs">Ví dụ: Laptop, Điện thoại</span>
        </div>

        <div class="mt-2">
            <x-form-element.text-area id="desc" label="Mô tả" name="desc"
                required="*"></x-form-element.text-area>
            <span class="text-gray-400 text-xs">Ví dụ: Cấu hình cho Laptop</span>
        </div>

        <div class="my-3">
            <p>Chọn thông số cho cấu hình <span class="text-red-500 inline-block ms-3">@error('variants')
                {{ $message }}
            @enderror</span></p>
        </div>

        <div>
            @include('admin.product.partials.variants')
        </div>

        <input type="hidden" name="id" value={{ session('attr_id') ? session('attr_id') : '' }}>
        <input type="hidden" name="modal" value="edit">
    </x-modal-dial.modal-edit>

    {{-- ============================== --}}
    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách cấu hình</div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-product-attr">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="m20.25 7.5-.625 10.632a2.25 2.25 0 0 1-2.247 2.118H6.622a2.25 2.25 0 0 1-2.247-2.118L3.75 7.5m8.25 3v6.75m0 0-3-3m3 3 3-3M3.375 7.5h17.25c.621 0 1.125-.504 1.125-1.125v-1.5c0-.621-.504-1.125-1.125-1.125H3.375c-.621 0-1.125.504-1.125 1.125v1.5c0 .621.504 1.125 1.125 1.125Z" />
                    </svg>
                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="products-attr" total="1"/>
            </div>
        </div>

        <div class="mt-3">
            <form action="{{ route('admin.products.attributes.action') }}" method="post" id="form-attr-action">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">

                {{-- action --}}
                <div class="flex gap-2 items-center justify-between md:w-auto md:order-1 order-2">
                    <x-form-element.select name="action" class="flex-1" form="form-attr-action">
                        <option value="">Hành động hàng loạt</option>
                        <option value="destroy" {{ old('action') == 'destroy' ? 'selected' : '' }}>Xóa vĩnh viễn
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[40%]" form="form-attr-action" />
                </div>
            </div>

            {{-- list --}}
            <div class="list-products-attr pb-5">
                @include('admin.product.partials.list-attr')
            </div>
        </div>
    </div>
</x-app-layout>
