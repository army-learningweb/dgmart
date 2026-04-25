<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-slider" title="Tạo ảnh mới" button_create="Tạo mới"
        route="{{ route('admin.sliders.store') }}" width="md:min-w-[800px]"
        variant="h-90vh md:max-h-[500px] pl-1 pr-2 overflow-y-auto">
        <div>
            <div class="mt-2 inline-block">Banner <span class="text-red-500">*</span></div>
            <x-form-element.file name="slider-file" type="slider" class="h-[150px] md:h-[250px] mt-1" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="order" label="Thứ tự xuất hiện" type="number" name="order" required="*"
                autocomplete="off" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="redirect" label="Link chuyển hướng" type="text" name="redirect"
                autocomplete="off" />
        </div>

        <div class="mt-2">
            <x-form-element.text-area label="Tiêu đề" name="title" id="title" class="h-[80px]" />
        </div>

        <div class="mt-1">
            <x-form-element.text-area label="Mô tả" name="desc" id="desc" class="h-[80px]" />
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal edit --}}
    <x-modal-dial.modal-edit modal="edit-slider" title="Cập nhật thông tin" button_edit="Cập nhật"
        route="{{ route('admin.sliders.update') }}" width="md:min-w-[800px]"
        variant="h-90vh md:max-h-[500px] pl-1 pr-2 overflow-y-auto">
        <div>
            <div class="mt-2 inline-block">Banner <span class="text-red-500">*</span></div>
            <x-form-element.file name="slider-file" type="slider" class="h-[150px] md:h-[250px] mt-1" is_edit="true" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="order" label="Thứ tự xuất hiện" type="number" name="order" required="*"
                autocomplete="off" />
        </div>

        <div class="mt-2">
            <x-input-field.field id="redirect" label="Link chuyển hướng" type="text" name="redirect"
                autocomplete="off" />
        </div>

        <div class="mt-2">
            <x-form-element.text-area label="Tiêu đề" name="title" id="title" class="h-[80px]" />
        </div>

        <div class="mt-1">
            <x-form-element.text-area label="Mô tả" name="desc" id="desc" class="h-[80px]" />
        </div>

        <input type="hidden" name="id" value="{{ old('id') }}">
        <input type="hidden" name="modal" value="edit">
    </x-modal-dial.modal-edit>

    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách ảnh Slider </div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-slider">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M10.5 6h9.75M10.5 6a1.5 1.5 0 1 1-3 0m3 0a1.5 1.5 0 1 0-3 0M3.75 6H7.5m3 12h9.75m-9.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-3.75 0H7.5m9-6h3.75m-3.75 0a1.5 1.5 0 0 1-3 0m3 0a1.5 1.5 0 0 0-3 0m-9.75 0h9.75" />
                    </svg>
                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="sliders" total="{{ $total }}" active="{{ $active }}"
                    unactive="{{ $unactive }}" />
            </div>
        </div>

        <div class="mt-3">
            <form action="{{ route('admin.sliders.action') }}" method="POST" id="form_action_sliders">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">
                {{-- action --}}
                <div class="flex gap-2 items-center justify-between w-full md:w-auto md:order-1 order-2">
                    <x-form-element.select name="action" class="flex-1" form="form_action_sliders">
                        <option value="">Hành động hàng loạt</option>
                        <option value="active" {{ old('action') == 'active' ? 'selected' : '' }}>Hoạt động</option>
                        <option value="unactive" {{ old('action') == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                        </option>
                        <option value="destroy" {{ old('action') == 'destroy' ? 'selected' : '' }}>Xóa vĩnh viễn
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[40%]" form="form_action_sliders" />
                </div>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                    {{-- status --}}
                    <div>
                        <x-form-element.select name="slider-filter" module="sliders" class="select-filter py-1">
                            <option value="">Lọc theo trạng thái</option>
                            <option value="active">Hoạt động</option>
                            <option value="unactive">Vô hiệu hóa</option>
                        </x-form-element.select>
                    </div>

                    {{-- reset --}}
                    <div class="hidden md:block">
                        <x-button.button-reset />
                    </div>

                </div>
            </div>

            {{-- list --}}
            <div class="list-sliders pb-5">
                @include('admin.slider.partials.list')
            </div>

        </div>

    </div>
</x-app-layout>
