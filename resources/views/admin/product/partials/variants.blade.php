<div class="h-[120px] md:min-h-[250px] overflow-y-auto scrollbar-thin px-1">
    @foreach ($variants as $group => $items)
        <div class="border-t border-gray-500/20 parent_check_all">
            <div class="py-2" colspan="4">
                <div class="flex items-center gap-3">
                    <input type="checkbox" class="check_all_permission rounded-sm" id="check_all_variant_{{$group}}"> 
                    <label for="check_all_variant_{{$group}}" class="text-blue-600">{{ ucfirst($group) }}</label>
                </div>
            </div>
        </div>
        <div class="md:grid md:grid-cols-4 gap-x-3">
            @foreach ($items as $item)
                <div class="py-3">
                    <div class="flex justify-between items-center gap-2">
                        <input type="checkbox" name="variants[]" value="{{ $item->id }}" id="variant_{{$item->id}}"
                        {{ in_array($item->id, (array) old('variants')) ? 'checked' : '' }}
                        class="check_single_variant rounded-sm">
                        <label for="variant_{{$item->id}}" class="w-[150px] truncate">
                            {{ $item->name }}
                        </label>
                    </div>
                </div>
            @endforeach
        </div>
    @endforeach
</div>