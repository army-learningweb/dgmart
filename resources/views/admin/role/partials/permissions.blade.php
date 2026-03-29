<div class="h-[160px] pl-1 overflow-y-auto overflow-x-hidden">
    <div class="min-w-[700px]">
        @foreach ($permissions as $module => $permissions_list)
            <div class="border-t border-gray-500/50 parent_check_all">
                <div class="py-2" colspan="4">
                    <div class="flex items-center gap-3">
                        <input type="checkbox" class="check_all_permission rounded-sm">
                        <span class="text-emerald-500">Module {{ ucfirst($module) }}</span>
                    </div>
                </div>
            </div>
            <div class="md:grid grid-cols-4">
                @foreach ($permissions_list as $permisison)
                    <div class="py-3 col-span-1">
                        <div class="flex items-center gap-3">
                            <input type="checkbox" name="permission_id[]" value="{{ $permisison->id }}"
                                {{ in_array($permisison->id, (array) old('permission_id')) ? 'checked' : '' }}
                                class="check_single_permission rounded-sm">
                            <span>{{ $permisison->name }}</span>
                        </div>
                    </div>
                @endforeach
            </div>
        @endforeach
    </div>
</div>
