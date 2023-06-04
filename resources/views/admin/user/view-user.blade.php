@extends('template.template')

@section('head')
    {{-- css --}}

    <!-- javascript -->

@endsection

@section('body')
    <h1 class="text-3xl font-bold underline">
        View user
    </h1>

    <table style="border:1px solid black">
        <th>
            <td>name</td>
            <td>nickname</td>
            <td>email</td>
            <td>phone_number</td>
            <td>gender</td>
            <td>action</td>
        </th>
            <tr>

                <td>{{ $user->name }}</td>
                <td>{{ $user->nickname }}</td>
                <td>{{ $user->email }}</td>
                <td>{{ $user->phone_number }}</td>
                <td>{{ $user->gender }}</td>
                <td>
                    <a href="{{route('edit-user', ['id'=>$user->id])}}"><button type="submit" class="btn btn-success">Edit</button></a>
                    <form action="{{route('delete-user', ['id'=>$user->id])}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
            </tr>
    </table>
@endsection
