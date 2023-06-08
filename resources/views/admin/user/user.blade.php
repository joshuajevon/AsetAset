@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-users" />

        {{-- Search Bar --}}
    {{-- <section class="c-container flex justify-center items-center pt-32 pb-16">
        <x-search-bar />
    </section> --}}

        <div
            class="flex flex-col justify-center items-start gap-8 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Manage Users</h1>

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
                                <a class="bg-green-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] mr-2" href="{{ route('view-user', ['id' => $user->id]) }}">View</a>
                                <a class="bg-blue-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)] mr-2" href="{{ route('edit-user', ['id' => $user->id]) }}"><button type="submit">Edit</button></a>
                                <form class="inline" action="{{ route('delete-user', ['id' => $user->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="bg-red-200 py-2 px-4 rounded-lg hover:bg-[linear-gradient(rgb(0_0_0/10%)_0_0)]">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
