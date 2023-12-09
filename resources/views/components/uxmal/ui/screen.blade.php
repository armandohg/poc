@props([
    'mainContent' => '',
    'class' => ''
])
<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $mainContent }}
</div>