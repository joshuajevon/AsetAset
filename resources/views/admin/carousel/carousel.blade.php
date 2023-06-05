@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        View carousel
    </h1>
    <a href="{{route('create-carousel')}}">Add</a>

    <table style="border:1px solid black">
        <th>
            <td>id</td>
            <td>title</td>
            <td>action</td>
        </th>
        @foreach ($carousels as $carousel)
            <tr>
                <td>{{$carousel->title}}</td>
                <td>
                    <a href="{{route('view-carousel', ['id'=>$carousel->id])}}"><button type="submit" class="btn btn-success">View</button></a>
                    <a href="{{route('edit-carousel', ['id'=>$carousel->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete-carousel', ['id'=>$carousel->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>
@endsection
