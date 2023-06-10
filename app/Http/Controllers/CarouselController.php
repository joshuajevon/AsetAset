<?php

namespace App\Http\Controllers;

use App\Models\Carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarouselController extends Controller
{
    public function carousel(Request $request){
        $query = Carousel::query();

        $selectedFilter = $request->query('filter', session('selected_filter'));

        if ($selectedFilter) {
            switch ($selectedFilter) {
                case 'latest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'oldest':
                    $query->orderBy('created_at', 'asc');
                    break;
                case 'updated':
                    $query->orderBy('updated_at', 'desc');
                    break;
            }
        }

        if($request->input('search')){
            $carousels = Carousel::where('title','like','%' .request('search'). '%')->simplePaginate(10);
        }else{
            $carousels = $query->paginate(10);
        }

        session(['selected_filter' => $selectedFilter]);

        $carousels->appends(['filter' => $selectedFilter]);
        $result = $request->input('search');
        return view('admin.carousel.carousel', compact('carousels','selectedFilter','result'));
    }

    public function view($id){
        $carousel = Carousel::findOrFail($id);
        return view('admin.carousel.view-carousel', compact('carousel'));
    }

    public function create(){
        return view('admin.carousel.create-carousel');
    }

    public function store(Request $request){
        $file_name =  $request->title.'-'.$request->file('slideshow')->getClientOriginalName();
        $request->file('slideshow')->storeAs('/public/asset/slideshow/', $file_name);

        Carousel::create([
            'title' => $request->title,
            'slideshow' => $file_name,
            'link' => $request->link,
        ]);

        return redirect(route('carousel'));
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
            $file_name = $request->title.'-'.$image->getClientOriginalName();
            $image->storeAs('/public/asset/slideshow/', $file_name);
            $carousel->update([
                'image' => $file_name
            ]);
        }

        Carousel::findOrFail($id)->update([
            'title' => $request->title,
            'link' => $request->link,
        ]);

        return redirect(route('carousel'));
    }

    public function delete($id){
        $carousel = Carousel::findOrFail($id);
        $carousel->delete();
        Storage::delete('/public/asset/slideshow/'.$carousel->slideshow);
        return redirect()->back();
    }
}
