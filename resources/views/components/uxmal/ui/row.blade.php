@props([
    'content' => '',
])
<div {{ $attributes->merge(['class' => $class]) }}>
    {{ $content }}
</div>