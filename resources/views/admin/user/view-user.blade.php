@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-users" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('user') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                  </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">View User</h1>

            <table class="w-full divide-y-2 divide-cGold bg-white text-sm border border-cGold table-auto">
                <thead class="text-left text-base">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Nickname
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Email
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Phone Number
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Gender
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-cGold text-sm">
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2">{{ $user->name }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $user->nickname }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $user->email }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $user->phone_number }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $user->gender }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a class="bg-blue-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] mr-2" href="{{ route('edit-user', ['id' => $user->id]) }}"><button type="submit">Edit</button></a>

                            <form class="inline" action="{{ route('delete-user', ['id' => $user->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="bg-red-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]" x-data=""
                                x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>

        <x-modal name="confirm-user-deletion" id="confirm-delete-user" :show="$errors->userDeletion->isNotEmpty()" focusable>
            <form method="post" action="{{ route('delete-user', ['id' => $user->id]) }}" class="p-4 sm:p-8">
                @csrf
                @method('delete')

                <h2 class="text-2xl font-semibold text-cBlack">
                    {{ __('Anda yakin ingin menghapus user ini?') }}
                </h2>

                <p class="mt-1 text-sm sm:text-base text-gray-500">
                    {{ __('
                    Setelah user ini dihapus, semua sumber daya dan data yang terkait akan dihapus secara permanen.') }}
                </p>

                <div class="mt-6 flex justify-end">
                    <x-secondary-button x-on:click="$dispatch('close')">
                        {{ __('Batal') }}
                    </x-secondary-button>

                    <x-danger-button class="ml-3">
                        {{ __('Hapus User') }}
                    </x-danger-button>
                </div>
            </form>
        </x-modal>
    </div>
@endsection
