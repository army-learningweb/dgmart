@foreach ($parent_categories as $item)
    <option value="{{ $item->id }}" {{ old('category_id') == $item->id && old('is_parent') != 0 ? 'selected' : '' }}>{{ $item->name }}</option>
@endforeach
