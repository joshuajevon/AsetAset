<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){
        if($request->input('search')){
            $assets = Asset::where('name','like','%' .request('search'). '%')->simplePaginate(16);
        } else{
            // $assets = Asset::orderBy('created_at', 'desc')->simplePaginate(16);
            $assets = Asset::paginate(16);
        }


        // $assets = Asset::all()->paginate(16);
        return view('welcome',  compact('assets'));
    }

    public function assetById($id){
        $asset = Asset::findOrFail($id);
        return view('asset-by-id', compact('asset'));
    }

    public function asset(){
        return view('asset');
    }

    public function tentangKami(){
        return view('tentang-kami');
    }

    public function panduan(){
        return view('panduan');
    }

    public function hubungiKami(){
        return view('hubungi-kami');
    }

    public function dashboard(){
        return view('admin.admin-dashboard');
    }
}
