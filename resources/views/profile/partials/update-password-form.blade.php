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
                <div id="password-modal"
                    class="fixed h-screen w-screen bg-[#67676780] flex justify-center items-center top-0 left-0 z-50 c-container">
                    <div
                        class="flex flex-col items-center bg-cWhite rounded-xl px-8 md:px-12 lg:px-16 xl:px-20 2xl:px-24 py-16 md:py-20 lg:py-24 xl:py-28 2xl:py-32 relative">
                        <div class="flex flex-col items-center justify-center gap-4">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1"
                                stroke="currentColor" class="w-24 h-24 md:w-32 md:h-32 text-cGold">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 12.75L11.25 15 15 9.75M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                            </svg>

                            <h2 class="text-xl md:text-2xl text-cBlack text-center">
                                Simpan Perubahan Berhasil
                            </h2>

                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                                stroke="currentColor"
                                class="w-8 h-8 md:w-12 md:h-12 absolute top-5 right-5 cursor-pointer text-cGold"
                                onclick="closePasswordModal()">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </form>
</section>
