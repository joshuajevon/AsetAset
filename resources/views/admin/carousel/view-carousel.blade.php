@extends('template.admin-template')

@section('head')
    {{-- css --}}

    <!-- javascript -->
@endsection

@section('body')
    <div class="flex">
        <x-admin-navigation-bar page="manage-slideshows" />

        <div
            class="flex flex-col justify-center items-start gap-8 sm:gap-12 lg:gap-16 w-full c-container py-4 sm:py-6 md:py-8 lg:py-10 xl:py-12 2xl:py-14 ml-[72px] lg:ml-[18rem] mt-16">

            <h1 class="text-2xl lg:text-3xl xl:text-4xl 2xl:text-5xl font-bold text-cGold">View Slideshow</h1>


            <table style="border:1px solid black">
                <th>
                <td>id</td>
                <td>title</td>
                <td>image</td>
                <td>link</td>
                <td>action</td>
                </th>
                <tr>
                    <td>{{ $carousel->id }}</td>
                    <td>{{ $carousel->title }}</td>
                    <td>
                        <img src="{{ asset('/storage/asset/slideshow/' . $carousel->slideshow) }}"
                            class="object-fit-contain rounded card-img-top" style="width: 300px" alt="carousel">
                    </td>
                    <td>{{ $carousel->link }}</td>
                    <td>
                        <a href="{{ route('edit-carousel', ['id' => $carousel->id]) }}"><button type="submit"
                                class="btn btn-success">Edit</button></a>
                        <form action="{{ route('delete-carousel', ['id' => $carousel->id]) }}" method="post">
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
