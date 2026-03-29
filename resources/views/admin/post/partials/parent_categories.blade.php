@foreach ($parent_categories as $item)
    <option value="{{ $item->id }}" {{ old('parent_category') == $item->id && old('is_parent') != 0 ? 'selected' : '' }}>{{ $item->name }}</option>
@endforeach
