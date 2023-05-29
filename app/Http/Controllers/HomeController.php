<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){

        // $assets = Asset::orderBy('created_at', 'desc')->simplePaginate(16);
        // $assets = Asset::paginate(16);

        $categories = ['Rumah', 'Ruko', 'Gedung', 'Gudang', 'Apartemen', 'Tanah', 'Barang', 'Kendaraan', 'Alat berat', 'Lain-lain'];

        $cities = ['Jakarta Barat','Surakarta','Surabaya','Bandung'];

        $provinces = ['DKI Jakarta', 'Jawa Tengah','Jawa Timur','Jawa Barat'];

        $selectedCategories = $request->input('categories', []);
        $selectedProvinces = $request->input('provinces', []);
        $selectedCities = $request->input('cities', []);
        $maxPrice = $request->input('max-price',null);
        $minPrice = $request->input('min-price',null);

        $query = Asset::query();

        if (!empty($selectedCategories)) {
            $query->whereIn('category', $selectedCategories);
        }

        if (!empty($selectedCities)) {
            $query->whereIn('city', $selectedCities);
        }

        if (!empty($selectedProvinces)) {
            $query->whereIn('province', $selectedProvinces);
        }

        if (!empty($maxPrice)) {
            $query->where('price', '<=', $maxPrice);
        }

        if (!empty($minPrice)) {
            $query->where('price', '>=', $minPrice);
        }

        $result = $request->input('search');

        if($request->input('search')){
            $assets = Asset::where('name','like','%' .request('search'). '%')->simplePaginate(16);
            return view('asset',compact('assets','categories','result'));
        }else{
            $assets = $query->paginate(16);
        }


        return view('welcome',  compact('assets','categories','result'));
    }

    public function assetById($id){
        $asset = Asset::findOrFail($id);
        return view('asset-by-id', compact('asset'));
    }

    public function asset(Request $request){
        $categories = ['Rumah', 'Ruko', 'Gedung', 'Gudang', 'Apartemen', 'Tanah', 'Barang', 'Kendaraan', 'Alat berat', 'Lain-lain'];

        $cities = ['Jakarta Barat','Surakarta','Surabaya','Bandung'];

        $provinces = ['DKI Jakarta', 'Jawa Tengah','Jawa Timur','Jawa Barat'];

        $selectedCategories = $request->input('categories', []);
        $selectedProvinces = $request->input('provinces', []);
        $selectedCities = $request->input('cities', []);
        $maxPrice = $request->input('max-price',null);
        $minPrice = $request->input('min-price',null);

        $query = Asset::query();

        if (!empty($selectedCategories)) {
            $query->whereIn('category', $selectedCategories);
        }

        if (!empty($selectedCities)) {
            $query->whereIn('city', $selectedCities);
        }

        if (!empty($selectedProvinces)) {
            $query->whereIn('province', $selectedProvinces);
        }

        if (!empty($maxPrice)) {
            $query->where('price', '<=', $maxPrice);
        }

        if (!empty($minPrice)) {
            $query->where('price', '>=', $minPrice);
        }

        if($request->input('search')){
            $assets = Asset::where('name','like','%' .request('search'). '%')->simplePaginate(16);
        }else{
            $assets = $query->paginate(16);
        }

        $result = $request->input('search');

        return view('asset', compact('assets','categories','result'));
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
