<div class="h-[120px] md:h-[165px] overflow-y-auto scrollbar-thin px-1">
    @foreach ($permissions as $module => $permissions_list)
        <div class="border-t border-gray-500/20 parent_check_all">
            <div class="py-2" colspan="4">
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="check_all_permission rounded-sm">
                    <span class="text-blue-600">{{ ucfirst($module) }}</span>
                </div>
            </div>
        </div>
        <div class="md:grid md:grid-cols-4">
            @foreach ($permissions_list as $permisison)
                <div class="py-3">
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
