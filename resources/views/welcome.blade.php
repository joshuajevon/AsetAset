@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <x-navigation-bar page="beranda" />

    <div class="c-container h-screen flex justify-center items-center">
        <h1 class="text-3xl font-bold underline">
            Hello World!
        </h1>
    </div>

    {{-- Search --}}
    <div class="pt-5">
        <div class="pt-5">
            <div class="container pt-5">
                <h5>Search Asset:</h5>
                <form class="w-100 d-flex gap-2">
                    <input class="w-100 p-2 rounded" id="search" name="search" type="search"
                        placeholder="Type here to search...">
                    <button type="button"
                        class="btn btn-dark text-light d-flex justify-content-center align-items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                            class="bi bi-search" viewBox="0 0 16 16">
                            <path
                                d="M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001c.03.04.062.078.098.115l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85a1.007 1.007 0 0 0-.115-.1zM12 6.5a5.5 5.5 0 1 1-11 0 5.5 5.5 0 0 1 11 0z" />
                        </svg>
                    </button>
                </form>
            </div>
        </div>

    </div>

    <table style="border:1px solid black">
        <th>
            <td>name</td>
            <td>province</td>
            <td>city</td>
            <td>price</td>
            <td>image</td>
        </th>
        @foreach ($assets as $asset)
            <tr>

                <td>{{ $asset->name }}</td>
                <td>{{ $asset->province }}</td>
                <td>{{ $asset->city }}</td>
                <td>{{ $asset->price }}</td>
                <td>
                    <img src="{{asset('/storage/asset/image/'.$asset->image)}}" class="object-fit-contain rounded card-img-top" style="width: 50px" alt="asset">
                </td>
                <td>
                    <a href="{{route('asset-by-id',$asset->id)}}">View</a>
                </td>
            </tr>
        @endforeach
    </table>
    <div class="">
        {{ $assets->links() }}
    </div>

@endsection
