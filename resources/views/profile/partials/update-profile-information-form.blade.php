<section>
    <header>
        <h2 class="text-2xl font-semibold text-cBlack">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm sm:text-base text-gray-600 dark:text-gray-400">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Name')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)"
                required autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="nickname" :value="__('Nickname')" />
            <x-text-input id="nickname" name="nickname" type="text" class="mt-1 block w-full" :value="old('nickname', $user->nickname)"
                required autocomplete="nickname" />
            <x-input-error class="mt-2" :messages="$errors->get('nickname')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"
                required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification"
                            class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phone_number" :value="__('Phone Number')" />
            <x-text-input id="phone_number" name="phone_number" type="text" class="mt-1 block w-full"
                :value="old('phone_number', $user->phone_number)" required autocomplete="phone_number" />
            <x-input-error class="mt-2" :messages="$errors->get('phone_number')" />
        </div>

        <div class="w-full">
            <div class="flex gap-1 text-base sm:text-lg">
                <x-input-label for="jenis-kelamin-register" :value="__('Jenis Kelamin')" />
            </div>
            <div class="mt-1 w-full flex justify-start items-center gap-8 text-sm sm:text-base">
                <div class="flex justify-center items-center gap-2">
                    <input
                        class="cursor-pointer rounded-full appearance-none text-cGold focus:ring-0 focus:ring-offset-0"
                        type="radio" id="laki-laki" name="gender" value="Laki-laki"
                        @if ($user->gender == 'Laki-laki') checked="checked" @endif>
                    <label for="laki-laki">Laki-laki</label>
                </div>

                <div class="flex justify-center items-center gap-2">
                    <input
                        class="cursor-pointer rounded-full appearance-none text-cGold focus:ring-0 focus:ring-offset-0"
                        type="radio" id="perempuan" name="gender" value="Perempuan"
                        @if ($user->gender == 'Perempuan') checked="checked" @endif>
                    <label for="perempuan">Perempuan</label>
                </div>
            </div>
            @error('gender')
                <div class="error-message">{{ $message }}</div>
            @enderror
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold">{{ __('Sukses.') }}</p>
            @endif
        </div>
    </form>
</section>
