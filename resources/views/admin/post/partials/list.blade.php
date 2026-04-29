@if ($posts->count() > 0)
    <div
        class="bg-white shadow-md mt-2 py-3 px-5 rounded-2xl text-sm overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1200px] md:w-full">
            <tr class="font-semibold">
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
            @foreach ($posts as $post)
                <tr class="border-b border-gray-500/10 hover:bg-[#f5f5f5] animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="px-3 py-4">
                        <input type="checkbox" name="posts_id[]" value="{{ $post->id }}" form="form-post-action"
                            {{ in_array($post->id, (array) old('posts_id')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-2">{{ $posts->firstItem() + $loop->index }}</td>
                    <td class="px-5 py-[10px] text-center">
                        @if (!empty($post->media->where('object_id',$post->id)->where('type','post')->value('url')))
                            <div class="flex justify-center items-center">
                                <img src="{{ asset($post->media->where('object_id',$post->id)->where('type','post')->value('url')) }}" alt=""
                                    class="w-[100px] h-[60px] object-cover rounded-md shadow-sm">
                            </div>
                        @else
                            <x-table.unknow />
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
                            <x-table.unknow />
                        @endif
                    </td>
                    <td class="px-3 status-posts-{{ $post->id }}">
                        <div class="w-[100px]">
                            {!! post_status($post->status) !!}
                        </div>
                    </td>
                    <td class="px-3">
                        <x-table.select name="select-status" module="posts" class="select-status" data-id="{{ $post->id }}">
                            <option value="publish" {{ $post->status == 'publish' ? 'selected' : '' }}>Công khai
                            </option>
                            <option value="unpublish" {{ $post->status == 'unpublish' ? 'selected' : '' }}>Tạm ngưng
                            </option>
                            <option value="draft" {{ $post->status == 'draft' ? 'selected' : '' }}>Nháp
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-3">{{ $post->created_at->format('d/m/Y') }}</td>
                    <td class="px-3">
                        @if ($post->user)
                            <div class="w-[70px] truncate">{{ $post->user->name }}</div>
                        @else
                            <x-table.unknow />
                        @endif
                    </td>
                    <td class="px-3">
                        <div class="flex justify-center items-center gap-2 h-full">
                            <x-table.button-edit button="edit-post" module="posts" id="{{ $post->id }}" />
                            <x-table.button-delete route="{{ route('admin.posts.destroy', $post->id) }}"
                                confirm="Bạn có chắc muốn xóa bài viết ({{ $post->title }}) ra khỏi hệ thống ?" />
                        </div>
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
    <div class="mt-2">
        {{ $posts->links('pagination::tailwind', ['module' => 'posts']) }}
    </div>
@else
    <x-list-not-found />
@endif
