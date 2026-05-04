<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    {{-- <x-modal-dial.modal-create modal="create-product" title="Tạo mới sản phẩm" button_create="Tạo mới"
        route="{{ route('admin.products.store') }}" width="md:min-w-[1000px]"
        variant="h-90vh md:max-h-[500px] pl-1 pr-2 overflow-y-auto">

        <div class="md:flex gap-3">
            <div class="md:w-[60%]">
                <div class="mt-2">
                    <x-input-field.field label="Mã sản phẩm" type="text" name="code" id="code"
                        required="*" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Tên sản phẩm" type="text" name="name" id="name"
                        required="*" autocomplete="on" />
                </div>

                <div class="mt-2">
                    <x-form-element.text-area id="desc" label="Mô tả" name="desc" required="*"
                        class="h-[120px]" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Giá" type="number" name="price" id="price" required="*"/>
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Số lượng" type="number" name="quantity" id="quantity" required="*"/>
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Giảm giá %" type="number" name="sale_off" id="sale_off" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Slug" type="text" name="slug" id="slug"
                        placeholder="vd: ten-san-pham" required="*" class="placeholder:text-xs" />
                </div>

                <div class="mt-2">
                    <label for="category_id">Danh mục sản phẩm <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id"
                        class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                        <option value="">Chọn danh mục</option>
                        @include('admin.product.partials.parent_categories')
                    </select>
                    <x-input-field.error_php name="category_id" />
                </div>

                <div class="mt-2">
                    <label for="category_id">Up sales</label>
                    <select name="up_sales" id="up_sales"
                        class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                        <option value="no">Mặc định</option>
                        <option value="yes">Đẩy bán trước</option>
                    </select>
                </div>
            </div>

            <div class="md:flex-1">
                <div class="sticky top-0">
                    <div class="mt-2">
                        <div class="mb-1 inline-block">Ảnh sản phẩm <span class="text-red-500">*</span></div>
                        <x-form-element.file name="product-file" type="product" class="h-[360px]" />
                    </div>

                    <div class="mt-[15px]">
                        <div class="mb-1 inline-block">Ảnh chi tiết <span class="text-gray-500 text-xs">(Không bắt
                                buộc)</span></div>
                        <div class="mt-1 grid grid-cols-2 gap-3">
                            <x-form-element.file name="product-subfile-1" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" />
                            <x-form-element.file name="product-subfile-2" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" />
                        </div>

                        <div class="mt-2 grid grid-cols-2 gap-3">
                            <x-form-element.file name="product-subfile-3" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" />
                            <x-form-element.file name="product-subfile-4" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" />
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-2">
            <x-tinymce.editor id="product-content" name="product-content"/>
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create> --}}

    {{-- modal edit --}}
    {{-- <x-modal-dial.modal-edit modal="edit-product" title="Cập nhật thông tin" button_edit="Cập nhật"
        route="{{ route('admin.products.update') }}" width="md:min-w-[1000px]"
        variant="h-90vh md:max-h-[500px] pl-1 pr-2 overflow-y-auto">

        <div class="md:flex gap-3">
            <div class="md:w-[60%]">
                <div class="mt-2">
                    <x-input-field.field label="Mã sản phẩm" type="text" name="code" id="code"
                        required="*" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Tên sản phẩm" type="text" name="name" id="name"
                        required="*" autocomplete="on" />
                </div>

                <div class="mt-2">
                    <x-form-element.text-area id="desc" label="Mô tả" name="desc" required="*"
                        class="h-[120px]" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Giá" type="number" name="price" id="price"
                        required="*" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Số lượng" type="number" name="quantity" id="quantity"
                        required="*" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Giảm giá %" type="number" name="sale_off" id="sale_off" />
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Slug" type="text" name="slug" id="slug"
                        placeholder="vd: ten-san-pham" required="*" />
                </div>

                <div class="mt-2">
                    <label for="category_id">Danh mục sản phẩm <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id"
                        class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                        <option value="">Chọn danh mục</option>
                        @include('admin.product.partials.parent_categories')
                    </select>
                    <x-input-field.error_php name="category_id" />
                </div>

                <div class="mt-2">
                    <label for="category_id">Up sales</label>
                    <select name="up_sales" id="up_sales"
                        class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                        <option value="no">Mặc định</option>
                        <option value="yes">Đẩy bán trước</option>
                    </select>
                </div>
            </div>

            <div class="md:flex-1">
                <div class="sticky top-0">
                    <div class="mt-2">
                        <div class="mb-1 inline-block">Ảnh sản phẩm <span class="text-red-500">*</span></div>
                        <x-form-element.file name="product-file" type="product" class="h-[360px]" is_edit="true" />
                    </div>

                    <div class="mt-[15px]">
                        <div class="mb-1 inline-block">Ảnh chi tiết <span class="text-gray-500 text-xs">(Không bắt
                                buộc)</span></div>

                        <div class="mt-1 grid grid-cols-2 gap-3">
                            <x-form-element.file name="product-subfile-1" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" is_edit="true" />
                            <x-form-element.file name="product-subfile-2" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" is_edit="true" />
                        </div>
                        <div class="mt-2 grid grid-cols-2 gap-3">
                            <x-form-element.file name="product-subfile-3" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" is_edit="true" />
                            <x-form-element.file name="product-subfile-4" main="1" type="product"
                                remove_size="size-5" class="h-[130px] text-xs" none_upload_icon="true"
                                none_mimes_required="true" is_edit="true" />
                        </div>
                    </div>
                </div>

            </div>
        </div>

        <div class="mt-2">
            <x-tinymce.editor id="edit-product-content" name="edit-product-content"/>
        </div>

        <input type="hidden" name="id" value="{{ old('id') }}">
        <input type="hidden" name="modal" value="edit">
    </x-modal-dial.modal-edit> --}}

    {{-- ============================== --}}
    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách thuộc tính </div>

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
            <form action="" method="post" id="form-product-action">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">

                {{-- action --}}
                <div class="flex gap-2 items-center justify-between md:w-auto md:order-1 order-2">
                    <x-form-element.select name="action" class="flex-1" form="form-product-action">
                        <option value="">Hành động hàng loạt</option>
                        <option value="destroy" {{ old('action') == 'destroy' ? 'selected' : '' }}>Xóa vĩnh viễn
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[40%]" form="form-product-action" />
                </div>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                    {{-- search --}}
                    <div>
                        <x-form-element.search placeholder="Tìm kiếm theo tên..." name="search-product"
                            module="products" class="search" value="{{ request()->input('search') }}" />
                    </div>

                    {{-- orderby price --}}
                    <div>
                        <x-form-element.select name="product-filter" module="products" class="select-order py-1">
                            <option value="">Sắp xếp theo chữ cái</option>
                            <option value="asc" {{ request()->input('order') == 'asc' ? 'selected' : '' }}>A -> Z</option>
                            <option value="desc" {{ request()->input('order') == 'desc' ? 'selected' : '' }}>Z -> A</option>
                        </x-form-element.select>
                    </div>

                    {{-- reset --}}
                    <div class="hidden md:block">
                        <x-button.button-reset link="{{ route('admin.products') }}" />
                    </div>

                </div>
            </div>

            {{-- list --}}
            <div class="list-products-attr pb-5">
                {{-- @include('admin.product.partials.list') --}}
            </div>
        </div>
    </div>
</x-app-layout>
