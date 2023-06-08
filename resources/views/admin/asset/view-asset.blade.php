@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-assets" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">View Asset</h1>

            <table style="border:1px solid black">
                <th>
                <td>name</td>
                <td>category</td>
                <td>province</td>
                <td>city</td>
                <td>price</td>
                <td>seller</td>
                <td>owner</td>
                <td>description</td>
                <td>status</td>
                <td>attachment</td>
                <td>image</td>
                </th>
                <tr>

                    <td>{{ $asset->name }}</td>
                    <td>{{ $asset->category }}</td>
                    <td>{{ $asset->province }}</td>
                    <td>{{ $asset->city }}</td>
                    <td>@currency ($asset->price)</td>
                    <td>{{ $asset->seller->seller_name }}</td>
                    <td>{{ $asset->owner->owner_name }}</td>
                    <td>{{ $asset->description }}</td>
                    <td>{{ $asset->status }}</td>
                    <td>{{ $asset->attachment }}</td>
                    <td>
                        <img src="{{ asset('/storage/asset/image/' . $asset->image) }}"
                            class="object-fit-contain rounded card-img-top" style="width: 50px" alt="asset">
                    </td>
                    <td>
                        <a href="{{ route('edit-asset', ['id' => $asset->id]) }}"><button type="submit"
                                class="btn btn-success">Edit</button></a>
                        <form action="{{ route('delete-asset', ['id' => $asset->id]) }}" method="post">
                            @csrf
                            @method('delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            </table>
        </div>
    </div>
@endsection
