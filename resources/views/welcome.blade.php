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
            </tr>
        @endforeach
    </table>

@endsection
