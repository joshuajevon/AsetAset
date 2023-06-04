<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function view(){
        $carousels = Carousel::all();
        return view('admin.carousel.view-carousel', compact('carousels'));
    }

    public function create(){
        return view('admin.carousel.create-carousel');
    }

    public function store(Request $request){
        $file_name = time() . $request->file('slideshow')->getClientOriginalName();
        $request->file('slideshow')->storeAs('/public/asset/slideshow/', $file_name);

        Carousel::create([
            'slideshow' => $file_name,
        ]);

        return redirect(route('view-carousel'));
    }

    public function edit($id){
        $carousel = Carousel::findOrFail($id);
        return view('admin.carousel.update-carousel', compact('carousel'));
    }

    public function update(Request $request, $id){
        $image = $request->file('slideshow');
        $carousel = Carousel::findOrFail($id);

        if($image){
            Storage::delete('/public/asset/slideshow/'.$carousel->slideshow);
            $file_name = $image->getClientOriginalName();
            $image->storeAs('/public/asset/slideshow/', $file_name);
            $carousel->update([
                'image' => $file_name
            ]);
        }
        return redirect(route('view-carousel'));
    }

    public function delete($id){
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();
        Storage::delete('/public/asset/slideshow/'.$carousel->slideshow);
        return redirect()->back();
    }
}
