@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-sellers" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('seller') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">View Seller</h1>

            <table class="w-full divide-y-2 divide-cGold bg-white text-sm border border-cGold table-auto">
                <thead class="text-left text-base">
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Address
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Phone Number
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Action
                        </th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-cGold text-sm">
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2">{{ $seller->seller_name }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $seller->seller_address }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $seller->seller_phone }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a class="bg-blue-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] mr-2"
                                href="{{ route('edit-seller', ['id' => $seller->id]) }}"><button
                                    type="submit">Edit</button></a>
                            <form class="inline" action="{{ route('delete-seller', ['id' => $seller->id]) }}"
                                method="post">
                                @csrf
                                @method('delete')
                                <button
                                    class="bg-red-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]"
                                    type="submit">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
@endsection
