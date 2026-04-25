<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />
    
    {{-- modal create --}}
    <x-modal-dial.modal-create modal="create-post" title="Tạo mới bài viết" button_create="Tạo mới"
        route="{{ route('admin.posts.store') }}" width="md:min-w-[1000px]" variant="h-90vh md:max-h-[500px] pl-1 pr-2 overflow-y-auto">
        <div class="md:flex gap-2">
            <div class="md:w-[60%]">
                <div class="mt-2">
                    <x-form-element.text-area label="Tiêu đề" name="title" id="title" required="*" class="h-[96px]"/>
                </div>

                <div class="mt-2">
                    <x-form-element.text-area label="Mô tả" name="desc" id="desc" required="*" class="h-[96px]"/>
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Slug" type="text" name="slug" id="slug"
                        placeholder="vd: bai-viet-abc" required="*" />
                </div>

                <div class="mt-2">
                    <label for="category_id">Danh mục bài viết <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id"
                        class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                        <option value="">Chọn danh mục</option>
                        @include('admin.post.partials.parent_categories')
                    </select>
                    <x-input-field.error_php name="category_id" />
                </div>
            </div>

            <div class="md:flex-1">
                <div>
                    <div class="mt-2 inline-block">Ảnh bìa bài viết <span class="text-red-500">*</span></div>
                    <x-form-element.file name="post-file" type="post" class="h-[200px] md:h-[370px] mt-1"/>
                </div>
            </div>
        </div>

        <div class="mt-2">
            {{-- <x-forms.tinymce-editor id="post-content" name="content" /> --}}
        </div>

        <input type="hidden" name="modal" value="create">
    </x-modal-dial.modal-create>

    {{-- modal edit --}}
    <x-modal-dial.modal-edit modal="edit-post" title="Cập nhật thông tin bài viết" button_edit="Cập nhật"
        route="{{ route('admin.posts.update') }}" width="md:min-w-[1000px]" variant="h-90vh md:max-h-[500px] pl-1 pr-2 overflow-y-auto">

        <div class="md:flex gap-2">
            <div class="md:w-[60%]">
                <div class="mt-2">
                    <x-form-element.text-area label="Tiêu đề" name="title" id="title" required="*" class="h-[96px]"/>
                </div>

                <div class="mt-2">
                    <x-form-element.text-area label="Mô tả" name="desc" id="desc" required="*" class="h-[96px]"/>
                </div>

                <div class="mt-2">
                    <x-input-field.field label="Slug" type="text" name="slug" id="slug"
                        placeholder="vd: bai-viet-abc" required="*" />
                </div>

                <div class="mt-2">
                    <label for="category_id">Danh mục bài viết <span class="text-red-500">*</span></label>
                    <select name="category_id" id="category_id"
                        class="mt-1 rounded-md py-[7px] text-sm shadow-sm border-gray-500/30 w-full">
                        <option value="">Chọn danh mục</option>
                        @include('admin.post.partials.parent_categories')
                    </select>
                    <x-input-field.error_php name="category_id" />
                </div>
            </div>

            <div class="md:flex-1">
                <div>
                    <div class="mt-2 inline-block">Ảnh bìa bài viết <span class="text-red-500">*</span></div>
                    <x-form-element.file name="post-file" type="post" class="h-[200px] md:h-[370px] mt-1" is_edit="true"/>
                </div>
            </div>
        </div>

        <div class="mt-2">
            {{-- <x-forms.tinymce-editor id="post-content" name="content" /> --}}
        </div>

        <input type="hidden" name="id" value="{{ old('id') }}">
        <input type="hidden" name="modal" value="edit">
    </x-modal-dial.modal-edit>

    {{-- ============================== --}}
    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Danh sách bài viết </div>

                {{-- create modal --}}
                <x-modal-dial.button-open modal="create-post">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                        stroke="currentColor" class="size-5">
                        <path stroke-linecap="round" stroke-linejoin="round"
                            d="M19.5 14.25v-2.625a3.375 3.375 0 0 0-3.375-3.375h-1.5A1.125 1.125 0 0 1 13.5 7.125v-1.5a3.375 3.375 0 0 0-3.375-3.375H8.25m3.75 9v6m3-3H9m1.5-12H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 0 0-9-9Z" />
                    </svg>
                </x-modal-dial.button-open>
            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="posts" total="{{ $total }}" publish="{{ $publish }}" unpublish="{{ $unpublish }}" draft="{{ $draft }}" />
            </div>
        </div>

        <div class="mt-3">
            <form action="{{ route('admin.posts.action') }}" method="post" id="form-post-action">@csrf</form>
                <div class="flex flex-col md:flex-row justify-between gap-2">

                    {{-- action --}}
                    <div class="flex gap-2 items-center justify-between md:w-auto md:order-1 order-2">
                        <x-form-element.select name="action" class="flex-1" form="form-post-action">
                            <option value="">Hành động hàng loạt</option>
                            <option value="publish" {{ old('action') == 'publish' ? 'selected' : '' }}>Công khai</option>
                            <option value="unpublish" {{ old('action') == 'unpublish' ? 'selected' : '' }}>Tạm ngưng
                            <option value="destroy" {{ old('action') == 'destroy' ? 'selected' : '' }}>Xóa vĩnh viễn
                            </option>
                        </x-form-element.select>

                        <x-button.button-action class="w-[40%]" form="form-post-action"/>
                    </div>

                    {{-- filter --}}
                    <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                        {{-- search --}}
                        <div>
                            <x-form-element.search placeholder="Tìm kiếm theo tiêu đề..." name="search-post"
                                module="posts" class="search" />
                        </div>

                        {{-- category --}}
                        <div>
                            <x-form-element.select name="post-filter" module="posts" class="select-category py-1">
                                <option value="">Lọc theo danh mục</option>
                                @include('admin.post.partials.parent_categories')
                            </x-form-element.select>
                        </div>

                        {{-- status --}}
                        <div>
                            <x-form-element.select name="post-filter" module="posts" class="select-filter py-1">
                                <option value="">Lọc theo trạng thái</option>
                                <option value="publish">Công khai</option>
                                <option value="unpublish">Tạm ngưng</option>
                                <option value="draft">Bản nháp</option>
                            </x-form-element.select>
                        </div>

                        {{-- reset --}}
                        <div class="hidden md:block">
                            <x-button.button-reset />
                        </div>

                    </div>
                </div>

                {{-- list --}}
                <div class="list-posts pb-5">
                    @include('admin.post.partials.list')
                </div>
        </div>
    </div>
</x-app-layout>
