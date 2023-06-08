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

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">Manage Assets</h1>

            <a href="{{ route('create-asset') }}">Add</a>

            <table style="border:1px solid black">
                <th>
                <td>name</td>
                <td>action</td>
                </th>
                @foreach ($assets as $asset)
                    <tr>

                        <td>{{ $asset->name }}</td>
                        <td>
                            <a href="{{ route('view-asset', ['id' => $asset->id]) }}"><button type="submit"
                                    class="btn btn-success">View</button></a>
                            <a href="{{ route('edit-asset', ['id' => $asset->id]) }}"><button type="submit"
                                    class="btn btn-success">Edit</button></a>
                            <form action="{{ route('delete-asset', ['id' => $asset->id]) }}" method="post">
                                @csrf
                                @method('delete')
                                <button type="submit" class="btn btn-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
