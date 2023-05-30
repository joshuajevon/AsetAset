@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} {!! $attributes->merge(['class' => 'p-4 border border-cDarkGrey rounded-md text-base bg-cWhite autofill:shadow-[inset_0_0_0px_1000px_rgb(255,255,255)]']) !!}>
