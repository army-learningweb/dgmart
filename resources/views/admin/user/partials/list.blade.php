@if ($users->count() > 0)
    <div
        class="bg-white dark:bg-[#1e1f20] shadow-md mt-3 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible">
        <table class="min-w-[1000px] md:w-full">
            <tr class="dark:text-gray-300">
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
                <tr class="dark:text-gray-300 border-b border-gray-500/20 dark:hover:bg-[#292929] hover:bg-[#f5f5f5]">
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
                        <div class="min-w-[70px]">
                            Chưa có quyền
                        </div>
                    </td>
                    <td class="px-5">
                        <div class="w-[120px] truncate">
                            {{ $user->email }}
                        </div>
                    </td>
                    <td class="px-3 status-users-{{ $user->id }}">{!! user_status($user->status) !!}</td>
                    <td class="px-3">
                        <x-table.select module="users" class="select-status" data-id="{{ $user->id }}">
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
