<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(Request $request){

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

        $selectedFilter = $request->query('filter', session('selected_filter'));

        if ($selectedFilter) {
            switch ($selectedFilter) {
                case 'latest':
                    $query->orderBy('created_at', 'desc');
                    break;
                case 'price_low_high':
                    $query->orderBy('price', 'asc');
                    break;
                case 'price_high_low':
                    $query->orderBy('price', 'desc');
                    break;
            }
        }

        if($request->input('search')){
            $assets = Asset::where('name','like','%' .request('search'). '%')->simplePaginate(16);
            return view('asset',compact('assets','categories','result'));
        }

        $assets = $query->paginate(16);

        session(['selected_filter' => $selectedFilter]);

        $assets->appends(['filter' => $selectedFilter]);

        return view('welcome',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice'));
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
