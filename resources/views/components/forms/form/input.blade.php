@props([
    'type','name','id','placeholder','value'
])
<input
    type="{{ $type }}"
    name="{{ $name }}"
    id="{{ $id }}"
    placeholder="{{ $placeholder }}"
    {{ $attributes->merge(['class' => "form-control"]) }}
    value="{{ $value }}"
>
