@props([
    'id',
    'label',
    'type',
    'name',
    'placeholder' => '',
    'value' => ''
])

<div>
    <x-input-field.label :id="$id" :label="$label" />
    <x-input-field.input :type="$type" :name="$name" :id="$id" :placeholder="$placeholder" :value="old($name,$value)"/>
    <x-input-field.error_ajax :name="$name" />
    <x-input-field.error_php :name="$name" />
</div>