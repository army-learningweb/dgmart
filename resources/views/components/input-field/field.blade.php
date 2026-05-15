@props([
    'id', 
    'label', 
    'required' => '', 
    'type', 'name', 
    'placeholder' => '', 
    'value' => '', 
    'readonly' => false])

<x-input-field.label :id="$id" :label="$label" :required="$required" />
<x-input-field.input :type="$type" :name="$name" :id="$id" :placeholder="$placeholder" :value="$value ? $value : old($name)"
    :readonly="$readonly ? $readonly : ''" class="{{ $readonly ? 'cursor-not-allowed' : '' }}" {{ $attributes }} />
<x-input-field.error_ajax :name="$name" />
<x-input-field.error_php :name="$name" />
