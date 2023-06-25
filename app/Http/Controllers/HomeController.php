<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Asset;
use App\Models\Owner;
use App\Models\Seller;
use App\Models\Carousel;
use App\Models\User;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class HomeController extends Controller
{
    public function getAllProvinces(){
        return [
            'Aceh',
            'Sumatera Utara',
            'Sumatera Barat',
            'Riau',
            'Jambi',
            'Sumatera Selatan',
            'Bengkulu',
            'Lampung',
            'Kepulauan Bangka Belitung',
            'Kepulauan Riau',
            'DKI Jakarta',
            'Jawa Barat',
            'Jawa Tengah',
            'DI Yogyakarta',
            'Jawa Timur',
            'Banten',
            'Bali',
            'Nusa Tenggara Barat',
            'Nusa Tenggara Timur',
            'Kalimantan Barat',
            'Kalimantan Tengah',
            'Kalimantan Selatan',
            'Kalimantan Timur',
            'Kalimantan Utara',
            'Sulawesi Utara',
            'Sulawesi Tengah',
            'Sulawesi Selatan',
            'Sulawesi Tenggara',
            'Gorontalo',
            'Sulawesi Barat',
            'Maluku',
            'Maluku Utara',
            'Papua Barat',
            'Papua'
        ];
    }

    public function getAllCities(){
        return [
            'Ambon', 'Balikpapan', 'Banda Aceh', 'Bandar Lampung', 'Bandung', 'Banjar', 'Banjarbaru', 'Banjarmasin',
            'Batam', 'Batu', 'Bau-Bau', 'Bekasi', 'Bengkulu', 'Bima', 'Binjai', 'Bitung', 'Blitar', 'Bogor', 'Bontang',
            'Bukittinggi', 'Cilegon', 'Cimahi', 'Cirebon', 'Denpasar', 'Depok', 'Dumai', 'Gorontalo', 'Jakarta', 'Jambi',
            'Jayapura', 'Jember', 'Kediri', 'Kendari', 'Ketapang', 'Kupang', 'Langsa', 'Lhokseumawe', 'Lubuklinggau',
            'Madiun', 'Magelang', 'Makassar', 'Malang', 'Manado', 'Mataram', 'Medan', 'Metro', 'Mojokerto', 'Padang',
            'Padang Panjang', 'Padangsidempuan', 'Pagar Alam', 'Palangkaraya', 'Palembang', 'Palopo', 'Palu',
            'Pangkalpinang', 'Parepare', 'Pariaman', 'Pasuruan', 'Payakumbuh', 'Pekalongan', 'Pekanbaru',
            'Pematangsiantar', 'Pontianak', 'Prabumulih', 'Probolinggo', 'Ruteng', 'Salatiga', 'Samarinda', 'Sawahlunto',
            'Semarang', 'Serang', 'Sibolga', 'Singkawang', 'Solok', 'Sorong', 'Subulussalam', 'Sukabumi', 'Sumedang',
            'Surabaya', 'Surakarta', 'Tangerang', 'Tanjungbalai', 'Tanjungpinang', 'Tarakan', 'Tasikmalaya', 'Tegal',
            'Ternate', 'Tidore Kepulauan', 'Tomohon', 'Tual', 'Yogyakarta'
        ];
    }

    public function getAllCategories(){
        return ['Rumah', 'Ruko', 'Gedung', 'Gudang', 'Apartemen', 'Tanah', 'Barang', 'Kendaraan', 'Alat berat', 'Lain-lain'];
    }

    public function home(Request $request){

        $carousels = Carousel::all();

        $categories = $this->getAllCategories();

        $cities = $this->getAllCities();

        $provinces = $this->getAllProvinces();

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
            $assets = Asset::where('name','like','%' .request('search'). '%')->paginate(16);
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
        }

        $assets = $query->paginate(16);

        if (!$request->has('filter')) {
            session()->remove('selected_filter');
        }else if ($selectedFilter) {
            session(['selected_filter' => $selectedFilter]);
        }

        $assets->appends(['filter' => $selectedFilter]);

        return view('welcome',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','carousels','provinces','cities'));
    }

    public function assetById($id){
        $asset = Asset::findOrFail($id);
        return view('asset-by-id', compact('asset'));
    }

    public function asset(Request $request){
        $categories = $this->getAllCategories();

        $cities = $this->getAllCities();

        $provinces = $this->getAllProvinces();

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

        $result = $request->input('search');
        $assets = Asset::where('name','like','%' .$result. '%')->paginate(16);

        if ($result && $assets->count() === 0) {
            return view('asset-no-result',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));

        }else if($assets->count() == 0) {
            return view('asset-no-search',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
        }

        $assets = $query->paginate(16);

        if (!$request->has('filter')) {
            session()->remove('selected_filter');
        }else if ($selectedFilter) {
            session(['selected_filter' => $selectedFilter]);
        }

        $assets->appends(['filter' => $selectedFilter]);

        return view('asset',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
    }

    public function tentangKami(Request $request){
        $carousels = Carousel::all();

        $categories = $this->getAllCategories();

        $cities = $this->getAllCities();

        $provinces = $this->getAllProvinces();

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
            $assets = Asset::where('name','like','%' .request('search'). '%')->paginate(16);
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
        }

        return view('tentang-kami',  compact('carousels'));
    }

    public function panduan(Request $request){
        $categories = $this->getAllCategories();

        $cities = $this->getAllCities();

        $provinces = $this->getAllProvinces();

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
            $assets = Asset::where('name','like','%' .request('search'). '%')->paginate(16);
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
        }

        return view('panduan');
    }

    public function hubungiKami(Request $request){
        $categories = $this->getAllCategories();

        $cities = $this->getAllCities();

        $provinces = $this->getAllProvinces();

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
            $assets = Asset::where('name','like','%' .request('search'). '%')->paginate(16);
            return view('asset',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
        }

        return view('hubungi-kami');
    }

    public function error(){
        return view('asset-error');
    }

    public function dashboard(){
        $asset_count = Asset::count();
        $user_count = User::count();
        $owner_count = Owner::count();
        $seller_count = Seller::count();
        $carousel_count = Carousel::count();

        return view('admin.admin-dashboard',compact('asset_count','user_count','owner_count','seller_count','carousel_count'));
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

        Mail::to('info@asetaset.com')->send(new ContactFormMail($name, $email, $subject, $mail));

        return redirect()->back()->with('success', 'Email sudah terkirim, silakan menunggu balasan di email kalian');
    }

    // user
    public function user(Request $request){

        $query = User::query();

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
            $users = User::where('name','like','%' .request('search'). '%')->paginate(10);
        }else{
            $users = $query->paginate(10);
        }

        $result = $request->input('search');

        if (!$request->has('filter')) {
            session()->remove('selected_filter');
        }else if ($selectedFilter) {
            session(['selected_filter' => $selectedFilter]);
        }

        $users->appends(['filter' => $selectedFilter]);

        return view('admin.user.user', compact('users','selectedFilter','result'));
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
        return redirect(route('user'));
    }

    public function delete($id){
        $user = User::findOrFail($id);
        $user->delete();
        return redirect(route('user'));
    }


}
