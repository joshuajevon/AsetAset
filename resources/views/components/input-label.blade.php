@props(['value'])

<label {{ $attributes->merge(['class' => 'text-base sm:text-lg text-cBlack']) }}>
    {{ $value ?? $slot }}
</label>
