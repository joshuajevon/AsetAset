@props(['messages'])

@if ($messages)
    <ul {{ $attributes->merge(['class' => 'text-sm sm:text-base text-red-600 space-y-1']) }}>
        @foreach ((array) $messages as $message)
            <li>{{ $message }}</li>
        @endforeach
    </ul>
@endif
