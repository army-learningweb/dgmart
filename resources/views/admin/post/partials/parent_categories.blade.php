@foreach ($parent_categories as $item)
    <option value="{{ $item->id }}" {{ old('category_id') == $item->id ? 'selected' : '' }}>
            {{ Str::limit($item->name, 30, '...') }}
    </option>
@endforeach
