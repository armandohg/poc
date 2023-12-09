@props([
    'name' => 'name',
    'label' => 'Button',
    'icon' => 'icon',
    'type' => 'button',
    'class' => 'btn btn-primary',
    ])
<button {{ $attributes->merge(['type' => 'button', 'class' => $class]) }}>
    @if($icon)
        <i class="{{ $icon }}"></i>
    @endif
    {{ $label }}
</button>