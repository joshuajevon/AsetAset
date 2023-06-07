<section class="space-y-6">
    <header>
        <h2 class="text-2xl font-semibold text-cBlack">
            {{ __('Hapus Akun') }}
        </h2>

        <p class="mt-1 text-sm sm:text-base text-gray-500">
            {{ __('Setelah akun Anda dihapus, semua sumber daya dan data di dalamnya akan dihapus secara permanen. Sebelum menghapus akun Anda, silakan unduh semua data atau informasi yang ingin Anda simpan.') }}
        </p>
    </header>

    <x-danger-button x-data=""
        x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
        {{ __('Hapus Akun') }}</x-danger-button>

    <x-modal name="confirm-user-deletion" id="confirm-delete-account" :show="$errors->userDeletion->isNotEmpty()" focusable>
        <form method="post" action="{{ route('profile.destroy') }}" class="p-4 sm:p-8">
            @csrf
            @method('delete')

            <h2 class="text-2xl font-semibold text-cBlack">
                {{ __('Anda yakin ingin menghapus akun Anda?') }}
            </h2>

            <p class="mt-1 text-sm sm:text-base text-gray-500">
                {{ __('
                Setelah akun Anda dihapus, semua sumber daya dan data yang terkait akan dihapus secara permanen. Silakan masukkan password Anda untuk mengonfirmasi bahwa Anda ingin menghapus akun Anda secara permanen.') }}
            </p>

            <div class="mt-6">
                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                <x-text-input id="password" name="password" type="password" class="mt-1 block w-3/4"
                    placeholder="{{ __('Password') }}" />

                <x-input-error :messages="$errors->userDeletion->get('password')" class="mt-2" />
            </div>

            <div class="mt-6 flex justify-end">
                <x-secondary-button x-on:click="$dispatch('close')">
                    {{ __('Batal') }}
                </x-secondary-button>

                <x-danger-button class="ml-3">
                    {{ __('Hapus Akun') }}
                </x-danger-button>
            </div>
        </form>
    </x-modal>

</section>
