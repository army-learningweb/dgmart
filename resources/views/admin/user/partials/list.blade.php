<div class="bg-[#1e1f20] mt-4 py-3 px-5 rounded-md text-sm overflow-x-auto md:overflow-visible">
    <form action="">
        @csrf
        <table class="min-w-[900px] md:w-full">
            <tr class="text-gray-300">
                <td class="px-3 py-2">
                    <input type="checkbox" name="" id="check_all" class="rounded-[3px] mb-[2px]">
                    <label for="check_all" class="ms-[2px] text-sm"></label>
                </td>
                <td class="px-5">#</td>
                <td class="px-5">Họ tên</td>
                <td class="px-5">Quyền</td>
                <td class="px-5">Email</td>
                <td class="px-3">Trạng thái</td>
                <td class="px-3">Cập nhật trạng thái</td>
                <td class="px-3">Ngày tham gia</td>
                <td class="px-3 text-center" colspan="2">Tùy chỉnh</td>
            </tr>
            @php
                $num = 1;
            @endphp
            @foreach ($users as $user)
                <tr class="text-gray-300 border-b border-gray-500/40 hover:bg-[#292929]">
                    <td class="px-3 py-4">
                        <input type="checkbox" name="" id="check_single" class="rounded-[3px] mb-[2px]">
                    </td>
                    <td class="px-5">{{ $num++ }}</td>
                    <td class="px-5">{{ $user->name }}</td>
                    <td class="px-5">
                        <div class="w-[70px]">
                            admin
                        </div>
                    </td>
                    <td class="px-5">{{ $user->email }}</td>
                    <td class="px-3 status-users-{{ $user->id }}">{!! user_status($user->status) !!}</td>
                    <td class="px-3">
                        <x-select name="user-filter" module="users" class="select-status py-[3px]" data-id="{{ $user->id }}">
                            <option value="active" {{ $user->status == 'active' ? 'selected' : ''}} >Hoạt động</option>
                            <option value="unactive" {{ $user->status == 'unactive' ? 'selected' : ''}} >Vô hiệu hóa</option>
                        </x-select>
                    </td>
                    <td class="px-3">{{ $user->created_at->format('d/m/Y') }}</td>
                    <td>
                        <div class="open-modal edit-user flex justify-center text-[#5d82ee] hover:text-[#2a35cb] cursor-pointer" data-id="{{ $user->id }}" data-modal="edit-user">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                            </svg>
                        </div>
                    </td>
                    <td>
                        <a href="{{ route('admin.users.destroy',$user->id) }}" onclick="return confirm('Bạn có chắc muốn xóa thành viên này ra khỏi hệ thống ?')" class="flex justify-center text-red-400 hover:text-red-700 cursor-pointer">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-5">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m9.75 9.75 4.5 4.5m0-4.5-4.5 4.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                            </svg>
                        </a>
                    </td>
                </tr>
            @endforeach

        </table>
    </form>
</div>
