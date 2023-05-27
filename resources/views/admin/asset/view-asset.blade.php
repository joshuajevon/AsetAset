@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        View Asset
    </h1>

    <a href="{{route('create-asset')}}">Add</a>

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
        @foreach ($assets as $asset)
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
                    <img src="{{asset('/storage/asset/image/'.$asset->image)}}" class="object-fit-contain rounded card-img-top" style="width: 50px" alt="asset">
                </td>
                <td>
                    <a href="{{route('edit-asset', ['id'=>$asset->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete-asset', ['id'=>$asset->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
