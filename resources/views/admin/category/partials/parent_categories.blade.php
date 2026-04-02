@foreach ($parent_categories as $item)
    <option value="{{ $item->id }}" {{ old('parent_category') == $item->id  ? 'selected' : '' }}>{{ $item->name }}</option>
@endforeach
