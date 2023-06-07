<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Asset;
use App\Models\Carousel;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function home(Request $request){

        $carousels = Carousel::all();

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
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice'));
        }

        $assets = $query->paginate(16);

        session(['selected_filter' => $selectedFilter]);

        $assets->appends(['filter' => $selectedFilter]);

        return view('welcome',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','carousels'));
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
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice'));
        }

        $assets = $query->paginate(16);

        session(['selected_filter' => $selectedFilter]);

        $assets->appends(['filter' => $selectedFilter]);

        return view('asset',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice'));
    }

    public function tentangKami(Request $request){
        $carousels = Carousel::all();

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
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice'));
        }

        $assets = $query->paginate(16);

        session(['selected_filter' => $selectedFilter]);

        $assets->appends(['filter' => $selectedFilter]);

        return view('tentang-kami',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','carousels'));
    }

    public function panduan(){
        return view('panduan');
    }

    public function hubungiKami(Request $request){
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
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice'));
        }

        $assets = $query->paginate(16);

        session(['selected_filter' => $selectedFilter]);

        $assets->appends(['filter' => $selectedFilter]);

        return view('hubungi-kami',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice'));
    }

    public function error(){
        return view('asset-error');
    }

    public function dashboard(){
        return view('admin.admin-dashboard');
    }

    public function contact(Request $request){
        $rules = [
            'name' => 'required|string',
            'email' => 'required|email',
            'subject' => 'required|string',
            'mail' => 'required|string',
        ];

        $messages = [
            'name.required' => 'Nama harus diisi',
            'email.required' => 'Alamat email harus diisi',
            'email.email' => 'Alamat email harus valid',
            'subject.required' => 'Subjek harus diisi',
            'mail.required' => 'Pesan harus diisi',
        ];

        $request->validate($rules, $messages);

        $name = $request->input('name');
        $email = $request->input('email');
        $subject = $request->input('subject');
        $mail = $request->input('mail');

        Mail::to('tfvtfyfvjyf@gmail.com')->send(new ContactFormMail($name, $email, $subject, $mail));

        return redirect()->back()->with('success', 'Email sudah terkirim, silakan menunggu balasan di email kalian');
    }

    // user
    public function user(){
        $users = User::all();
        return view('admin.user.user', compact('users'));
    }

    public function view($id){
        $user = User::findOrFail($id);
        return view('admin.user.view-user', compact('user'));
    }

    public function edit($id){
        $user = User::findOrFail($id);
        return view('admin.user.update-user', compact('user'));
    }

    public function update(Request $request, $id){

        User::findOrFail($id)->update([
            'name' => $request->name,
            'nickname' => $request->nickname,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'gender' => $request->gender,
        ]);
        return redirect(route('view-user'));
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->back();
    }


}
