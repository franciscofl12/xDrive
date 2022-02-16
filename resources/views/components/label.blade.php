@props(['value'])

<label {{ $attributes->merge(['class' => 'text-xs font-semibold px-1']) }}>
    {{ $value ?? $slot }}
</label>
