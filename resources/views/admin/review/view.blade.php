<x-app-layout>

    {{-- flash session --}}
    <x-flash-session.success-flash-session />
    <x-flash-session.failed-flash-session />

    <div class="py-4 h-[500px] border-t border-gray-500/50 border-dashed">
        <div class="flex items-center justify-between">
            <div class="flex items-center justify-between gap-2 w-full md:w-auto">

                {{-- title --}}
                <div class="text-lg"> Đánh giá sản phẩm </div>

            </div>

            {{-- statis module --}}
            <div class="hidden md:block">
                <x-statis.statis-module module="reviews" total="{{ $total }}" pending="{{ $pending }}"
                    publish="{{ $publish }}" />
            </div>
        </div>

        <div class="mt-3">
            <form action="{{ route('admin.reviews.action') }}" method="POST" id="form_action_reviews">@csrf</form>
            <div class="flex flex-col md:flex-row justify-between gap-2">
                {{-- action --}}
                <div class="flex gap-2 items-center justify-between w-full md:w-auto md:order-1 order-2">
                    <x-form-element.select name="action" class="flex-1" form="form_action_reviews">
                        <option value="">Hành động hàng loạt</option>
                        <option value="pending" {{ old('action') == 'pending' ? 'selected' : '' }}>Chờ xử lí</option>
                        <option value="publish" {{ old('action') == 'publish' ? 'selected' : '' }}>Công khai
                        </option>
                    </x-form-element.select>

                    <x-button.button-action class="w-[40%]" form="form_action_reviews" />
                </div>

                {{-- filter --}}
                <div class="flex flex-col md:flex-row md:items-center gap-2 md:mt-0 order-1 md:order-2">

                    {{-- search --}}
                    <div>
                        <x-form-element.search placeholder="Tìm kiếm theo từ khóa" name="search-review" module="reviews"
                            class="search" />
                    </div>

                    {{-- status --}}
                    <div>
                        <x-form-element.select name="reivew-filter" module="reviews" class="select-filter py-1">
                            <option value="">Lọc theo trạng thái</option>
                            <option value="pending">Chờ xử lí</option>
                            <option value="publish">Công khai</option>
                        </x-form-element.select>
                    </div>

                    {{-- reset --}}
                    <div class="hidden md:block">
                        <x-button.button-reset link="{{ route('admin.reviews') }}"/>
                    </div>

                </div>
            </div>

            {{-- list --}}
            <div class="list-reviews pb-5">
                @include('admin.review.partials.list')
            </div>

        </div>

    </div>
</x-app-layout>
