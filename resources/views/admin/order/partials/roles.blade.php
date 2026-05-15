@if ($roles->count() > 0)
    @foreach ($roles as $role)
        <option value="{{ $role->id }}" {{ in_array($role->id,(array) old('roles')) ? 'selected' : ''}} class="mt-1 rounded-sm py-1 px-2">{{ $role->name }}</option>
    @endforeach
@endif
