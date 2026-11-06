@props(['label', 'value', 'note' => null])

<div {{ $attributes->merge(['class' => 'bg-bone border-4 border-ink shadow-panel p-5']) }}>
    <p class="text-sm font-medium text-ink/70">{{ $label }}</p>
    <p class="font-display text-5xl mt-2 tracking-wide" data-count="{{ $value }}">{{ number_format($value, 0, ',', '.') }}</p>
    @if ($note)
        <p class="text-xs mt-2 text-ink/60">{{ $note }}</p>
    @endif
</div>
