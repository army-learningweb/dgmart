@if ($users->count() > 0)
    <div
        class="bg-white shadow-md mt-2 py-3 px-5 rounded-2xl text-sm overflow-x-auto md:overflow-visible scrollbar-thin scrollbar-thumb-rounded-full scrollbar-thumb-gray-400 scrollbar-track-transparent">
        <table class="min-w-[1000px] md:w-full">
            <tr class="font-semibold">
                <td class="px-3 py-2">
                    <input type="checkbox" name="" id="check_all" class="check_all rounded-[3px] mb-[2px]">
                </td>
                <td class="px-3">#</td>
                <td class="px-5">Họ tên</td>
                <td class="px-5">Quyền</td>
                <td class="px-5">Email</td>
                <td class="px-3">Trạng thái</td>
                <td class="px-3">Cập nhật trạng thái</td>
                <td class="px-3">Ngày tham gia</td>
                <td class="px-3 text-center">Thao tác</td>
            </tr>
            @foreach ($users as $user)
                <tr class="border-b border-gray-500/10 hover:bg-[#f5f5f5] animate_tl" style="animation-delay: {{ $loop->index * 0.1 }}s">
                    <td class="px-3 py-4">
                        <input type="checkbox" name="user_id[]" value="{{ $user->id }}" form="form_action_users"
                            {{ in_array($user->id, (array) old('user_id')) ? 'checked' : '' }}
                            class="check_single rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-3">{{ $loop->iteration }}</td>
                    <td class="px-5">
                        <div class="w-[70px] line-clamp-1">
                            {{ $user->name }}
                        </div>
                    </td>
                    <td class="px-5">
                        <div class="w-[120px]">
                            @forelse ($user->roles as $role)
                                {{ admin_role($role->name) }}
                            @empty
                                <span class="text-xs text-gray-500 italic">Chưa phân quyền !</span>
                            @endforelse
                        </div>
                    </td>
                    <td class="px-5">
                        <div class="w-[120px] truncate">
                            {{ $user->email }}
                        </div>
                    </td>
                    <td class="px-3 status-users-{{ $user->id }}">{!! user_status($user->status) !!}</td>
                    <td class="px-3">
                        <x-table.select name="select-status" module="users" class="select-status" data-id="{{ $user->id }}">
                            <option value="active" {{ $user->status == 'active' ? 'selected' : '' }}>Hoạt động
                            </option>
                            <option value="unactive" {{ $user->status == 'unactive' ? 'selected' : '' }}>Vô hiệu hóa
                            </option>
                        </x-table.select>
                    </td>
                    <td class="px-3">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td class="px-3 py-[10px] text-center flex justify-center items-center gap-2">
                        <x-table.button-edit button="edit-user" module="users" id="{{ $user->id }}" />
                        <x-table.button-delete route="{{ route('admin.users.destroy', $user->id) }}"
                            confirm="Bạn có chắc muốn xóa thành viên này ra khỏi hệ thống ?" />
                    </td>
                </tr>
            @endforeach
        </table>
    </div>
@else
    <x-list-not-found />
@endif
