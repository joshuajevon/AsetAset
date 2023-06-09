@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-assets" />

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <a href="{{ route('asset') }}" class="gold-btn flex justify-center items-center gap-2">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                    class="w-5 h-5">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                </svg>

                Kembali</a>

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">View Asset</h1>

            <table class="w-full divide-y-2 divide-cGold bg-white text-sm border border-cGold table-auto">
                <thead class="text-left text-base">
                    <tr>
                    <tr>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Name
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Category
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Province
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            City
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Price
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Seller
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Owner
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Description
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Status
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Attachment
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Image
                        </th>
                        <th class="whitespace-nowrap px-4 py-2 font-medium">
                            Action
                        </th>
                    </tr>
                    </tr>
                </thead>

                <tbody class="divide-y divide-cGold text-sm">
                    <tr>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->name }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->category }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->province }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->city }}</td>
                        <td class="whitespace-nowrap px-4 py-2">@currency ($asset->price)</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->seller->seller_name }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->owner->owner_name }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->description }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->status }}</td>
                        <td class="whitespace-nowrap px-4 py-2">{{ $asset->attachment }}</td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <img src="{{ asset('/storage/asset/image/' . $asset->image) }}"
                                class="object-fit-contain rounded card-img-top" style="width: 50px" alt="asset">
                        </td>
                        <td class="whitespace-nowrap px-4 py-2">
                            <a href="{{ route('edit-asset', ['id' => $asset->id]) }}"><button type="submit"
                                    class="bg-blue-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] mr-2">Edit</button></a>
                            <form class="inline" action="{{ route('delete-asset', ['id' => $asset->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit"
                                    class="bg-red-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]">Delete</button>
                            </form>
                        </td>
                    </tr>
                </tbody>
                <tr>


                </tr>
            </table>
        </div>
    </div>
@endsection
