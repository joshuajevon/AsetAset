@props(['value'])

<label {{ $attributes->merge(['class' => 'text-lg text-cBlack']) }}>
    {{ $value ?? $slot }}
</label>
