@extends('template.admin-template')

@section('head')
    {{-- css --}}
    <link rel="stylesheet" href="{{ asset('css/pagination.css') }}">

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-users" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Manage Users</h1>

            {{-- Search Bar --}}
            <div class="self-center w-full">
                <form class="w-full gap-2 text-base">
                    <div class="py-1 sm:py-2 lg:py-3 px-6 sm:px-7 lg:px-8 flex rounded-full bg-cGold text-cWhite">
                        <input autocomplete="false" type="text"
                            class="w-full bg-transparent border-none placeholder:text-cWhite px-0 autofill:shadow-[inset_0_0_0px_1000px_rgb(197,175,102)]"
                            id="search" name="search" placeholder="Pencarian...">
                        <button type="submit" class="flex justify-center items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor"
                                class="bi bi-search" viewBox="0 0 16 16">
                                <path
                                    d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                            </svg>
                        </button>
                    </div>
                </form>
            </div>

            {{-- Sort and refresh --}}
            <div class="flex w-full gap-2">
                {{-- Sorting --}}
                <div class="flex justify-start items-center gap-2">
                    <label class="hidden sm:block text-lg font-bold" for="sortOption">Urutkan:</label>
                    <form action="{{ route('user') }}" method="GET">
                        <select class="cursor-pointer rounded-md" name="filter" id="filter"
                            onchange="this.form.submit()">
                            <option value="" selected disabled>-- Pilih Filter --</option>
                            <option value="latest" {{ Request::query('filter') === 'latest' ? 'selected' : '' }}>
                                Terbaru</option>
                            <option value="oldest" {{ Request::query('filter') === 'oldest' ? 'selected' : '' }}>
                                Terlama</option>
                            <option value="updated" {{ Request::query('filter') === 'updated' ? 'selected' : '' }}>
                                Baru Update</option>
                        </select>
                    </form>
                </div>

                {{-- refresh --}}
                <div>
                    <a href="{{ route('user') }}"
                        class="flex justify-center items-center p-2 bg-cGold text-cWhite rounded-md transition hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2"
                            stroke="currentColor" class="w-6 h-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M16.023 9.348h4.992v-.001M2.985 19.644v-4.992m0 0h4.992m-4.993 0l3.181 3.183a8.25 8.25 0 0013.803-3.7M4.031 9.865a8.25 8.25 0 0113.803-3.7l3.181 3.182m0-4.991v4.99" />
                        </svg>
                    </a>
                </div>
            </div>

            @if ($users->count() == 0)
                <div class="p-4 sm:p-6 lg:p-8 text-red-700 bg-red-200 rounded-lg">
                    <h1>Maaf, hasil pencarian aset dengan kata kunci "{{ $result }}" belum tersedia.
                    </h1>
                </div>
            @else
                @if ($result)
                    <div class="p-4 sm:p-6 lg:p-8 bg-cDarkGrey rounded-lg">
                        <h1>Hasil pencarian aset dengan kata kunci "{{ $result }}"</h1>
                    </div>
                @endif

                <table class="w-full divide-y-2 divide-cGold bg-white text-sm border border-cGold table-auto">
                    <thead class="text-left text-base">
                        <tr>
                            <th class="whitespace-nowrap px-4 py-2 font-medium">
                                Name
                            </th>
                            <th class="whitespace-nowrap px-4 py-2 font-medium">
                                Action
                            </th>
                        </tr>
                    </thead>

                    <tbody class="divide-y divide-cGold text-sm">
                        @foreach ($users as $user)
                            <tr class="odd:bg-gray-100">
                                <td class="whitespace-nowrap px-4 py-2">{{ $user->name }}</td>
                                <td class="whitespace-nowrap px-4 py-2">
                                    <a class="bg-green-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] mr-2"
                                        href="{{ route('view-user', ['id' => $user->id]) }}">View</a>
                                    <a class="bg-blue-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] mr-2"
                                        href="{{ route('edit-user', ['id' => $user->id]) }}"><button
                                            type="submit">Edit</button></a>
                                    <form class="inline" action="{{ route('delete-user', ['id' => $user->id]) }}"
                                        method="post">
                                        @csrf
                                        @method('delete')
                                        <button type="submit"
                                            class="bg-red-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]">Delete</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif

            {{-- Bottom Pagination --}}
            <div id="top-pagination" class="pagination">
                {{ $users->onEachSide(0.5)->links() }}
            </div>

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
