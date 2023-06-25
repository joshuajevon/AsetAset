<section>
    <header>
        <h2 class="text-2xl font-semibold text-cBlack">
            {{ __('Perbarui Password') }}
        </h2>

        <p class="mt-1 text-sm sm:text-base text-gray-500">
            {{ __('Pastikan password Anda terdiri dari 8 karakter, mengandung huruf besar, huruf kecil, dan angka') }}
        </p>
    </header>

    <form id="form-update-password" method="post" action="{{ route('password.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('put')

        <div>
            <x-input-label for="current_password" :value="__('Password Lama')" />
            <x-password-input autocomplete="false" id="current_password" name="current_password" type="password"
                class="mt-1 block w-full" placeholder="Masukkan password Anda" onclick="toggleOldPassword()"
                id_eye="eye-1" id_eye_slash="eye-slash-1" />
            <x-input-error :messages="$errors->updatePassword->get('current_password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password" :value="__('Password Baru')" />
            <x-password-input id="password" name="password" type="password" class="mt-1 block w-full"
                placeholder="Masukkan password baru Anda" onclick="toggleNewPassword()" id_eye="eye-2"
                id_eye_slash="eye-slash-2" />
            <x-input-error :messages="$errors->updatePassword->get('password')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="password_confirmation" :value="__('Ulangi Password Baru')" />
            <x-password-input id="password_confirmation" name="password_confirmation" type="password"
                class="mt-1 block w-full" placeholder="Masukkan password baru Anda lagi"
                onclick="toggleConfirmNewPassword()" id_eye="eye-3" id_eye_slash="eye-slash-3" />
            <x-input-error :messages="$errors->updatePassword->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Simpan') }}</x-primary-button>

            @if (session('status') === 'password-updated')
                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-green-600 font-bold">{{ __('Sukses.') }}</p>
            @endif
        </div>
    </form>
</section>
