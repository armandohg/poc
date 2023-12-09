@props([
    'class' => 'card',
    'header' => '',
    'title' => '',
    'body' => '',
    'footer' => '',
])
<div {{ $attributes->merge(['class' => $class]) }} style="max-width: 18rem;">
    <div class="card-header">{{ $header }}</div>
    <div class="card-body text-primary">
        <h5 class="card-title">{{ $title }}</h5>
        <p class="card-text">{{ $body }}</p>
    </div>
    <div class="card-footer bg-transparent border-success">{{ $footer }}</div>
</div>