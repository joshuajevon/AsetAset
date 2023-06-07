<button {{ $attributes->merge(['type' => 'button', 'class' => 'flex justify-center items-center rounded-md bg-cWhite px-5 py-2.5 text-cGold transition hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] border border-cGold']) }}>
    {{ $slot }}
</button>
