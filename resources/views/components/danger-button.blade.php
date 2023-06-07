<button {{ $attributes->merge(['type' => 'submit', 'class' => 'flex justify-center items-center rounded-md bg-red-500 px-10 py-2.5 text-cWhite transition hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]']) }}>
    {{ $slot }}
</button>
