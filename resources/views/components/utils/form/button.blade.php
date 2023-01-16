@props(['class', 'type'])

@php
    $style = 'btn btn-primary normal-case';
    $mainClass = isset($class) ? $class : $style;
    $mainType = isset($type) ? $type : 'button';
@endphp

<div>
    <div class="relative z-0 w-full mb-6 group">
        <button
            {{ $attributes->merge([
                'type' => $mainType,
                'class' => $mainClass,
            ]) }}>
            {{ $slot }}
        </button>
    </div>
</div>
