<div {{ $attributes->merge(['class' => 'card app-card', 'style' => 'border: none;']) }}>
    <div class="card-body p-3">
        {{ $slot }}
    </div>
</div>
