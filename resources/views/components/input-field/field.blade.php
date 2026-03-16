@props([
    'id',
    'label',
    'required' => '',
    'type',
    'name',
    'placeholder' => '',
    'value' => '',
    'readonly' => false
])

<div>
    <x-input-field.label :id="$id" :label="$label" :required="$required"/>
    <x-input-field.input :type="$type" :name="$name" :id="$id" :placeholder="$placeholder" :value="old($name,$value)" :readonly="$readonly ? $readonly : '' " class="{{ $readonly ? 'dark:bg-red-600/60 cursor-not-allowed' : '' }}"/>
    <x-input-field.error_ajax :name="$name" />
    <x-input-field.error_php :name="$name" />
</div>