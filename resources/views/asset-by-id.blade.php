@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
<x-navigation-bar page="beranda" />

<div class="c-container h-screen flex justify-center items-center">
    <h1 class="text-3xl font-bold underline">
        Asset By Id
    </h1>
</div>

<table style="border:1px solid black">
    <th>
        <td>name</td>
        <td>category</td>
        <td>province</td>
        <td>city</td>
        <td>price</td>
        <td>seller name</td>
        <td>seller add</td>
        <td>seller phone</td>
        <td>owner name</td>
        <td>owner add</td>
        <td>owner phone</td>
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
            <td>{{ $asset->price }}</td>
            <td>{{ $asset->seller->seller_name }}</td>
            <td>{{ $asset->seller->seller_address }}</td>
            <td>{{ $asset->seller->seller_phone }}</td>
            <td>{{ $asset->owner->owner_name }}</td>
            <td>{{ $asset->owner->owner_address }}</td>
            <td>{{ $asset->owner->owner_phone }}</td>
            <td>{{ $asset->description }}</td>
            <td>{{ $asset->status }}</td>
            <td>{{ $asset->attachment }}</td>
            <td>
                <img src="{{asset('/storage/asset/image/'.$asset->image)}}" class="object-fit-contain rounded card-img-top" style="width: 50px" alt="asset">
            </td>
        </tr>
</table>
@endsection
