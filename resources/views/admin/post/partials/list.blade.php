@if ($posts->count() > 0)
    <div
        class="bg-white dark:bg-[#1e1f20] shadow-md mt-3 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible">
        <table class="min-w-[1000px] md:w-full">

            <tr class="dark:text-gray-300">
                <td class="px-3 py-2">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                    <label for="check_all" class="ms-[2px] text-sm"></label>
                </td>
                <td class="px-2">#</td>
                <td class="px-5 text-center">Ảnh</td>
                <td class="px-5">Tiêu đề</td>
                <td class="px-5">Danh mục</td>
                <td class="px-3">Trạng thái</td>
                <td class="px-3">Cập nhật trạng thái</td>
                <td class="px-3">Ngày tạo</td>
                <td class="px-3">Người tạo</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            @php
                $num = 1;
            @endphp
            @foreach ($posts as $post)
                <tr class="dark:text-gray-300 border-b border-gray-500/20 dark:hover:bg-[#292929] hover:bg-[#f5f5f5]">
                    <td class="px-3 py-4">
                        <input type="checkbox" name="post_id[]" value="{{ $post->id }}"
                            {{ in_array($post->id, (array) old('post_id')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-2">{{ $num++ }}</td>
                    <td class="px-5 py-2 text-center">
                        @if ($post->media)
                            <div class="flex justify-center items-center">
                                <img src="{{ asset($post->media->url) }}" alt=""
                                    class="w-[100px] h-[60px] object-cover rounded-md">
                            </div>
                        @else
                            <x-table.unknow/>
                        @endif
                        
                    </td>
                    <td class="px-5">
                        <div class="w-[150px] line-clamp-2">
                            {{ $post->title }}
                        </div>
                    </td>
                    <td class="px-5">
                        @if ($post->category)
                            <div class="w-[120px] line-clamp-1">
                                {{ $post->category->name }}
                            </div>
                        @else
                            <x-table.unknow/>
                        @endif
                    </td>
                    <td class="px-3 status-posts-{{ $post->id }}">
                        {!! post_status($post->status) !!}
                    </td>
                    <td class="px-3">
                        <x-table.select module="posts" class="select-status" data-id="{{ $post->id }}">
                            <option value="active" {{ $post->status == 'active' ? 'selected' : '' }}>Hoạt động
                            </option>
                            <option value="unactive" {{ $post->status == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-3">{{ $post->created_at->format('d/m/Y') }}</td>
                    <td class="px-3">
                        @if ($post->user)
                            {{ $post->user->name }}
                        @else
                            <x-table.unknow/>
                        @endif
                    </td>
                    <td class="px-3">
                        <div class="flex justify-center items-center gap-2 h-full">
                            <x-table.button-edit button="edit-post" module="posts" id="{{ $post->id }}" />
                            <x-table.button-delete route="{{ route('admin.posts.destroy',$post->id) }}"
                                confirm="Bạn có chắc muốn xóa bài viết này ra khỏi hệ thống ?" />
                        </div>
                    </td>
                </tr>
            @endforeach

        </table>
    </div>
@else
    <x-list-not-found />
@endif
