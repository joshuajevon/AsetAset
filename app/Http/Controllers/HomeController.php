<?php

namespace App\Http\Controllers;

use App\Mail\ContactFormMail;
use App\Models\Announcement;
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
            'Aceh', 'Bali', 'Banten', 'Bengkulu', 'DKI Jakarta', 'Daerah Istimewa Yogyakarta', 'Gorontalo', 'Jambi', 'Jawa Barat', 'Jawa Tengah', 'Jawa Timur', 'Kalimantan Barat', 'Kalimantan Selatan', 'Kalimantan Tengah', 'Kalimantan Timur', 'Kalimantan Utara', 'Kepulauan Bangka Belitung', 'Kepulauan Riau', 'Lampung', 'Maluku', 'Maluku Utara', 'Nusa Tenggara Barat', 'Nusa Tenggara Timur', 'Papua', 'Papua Barat', 'Papua Barat Daya', 'Papua Pegunungan', 'Papua Selatan', 'Papua Tengah', 'Riau', 'Sulawesi Barat', 'Sulawesi Selatan', 'Sulawesi Tengah', 'Sulawesi Tenggara', 'Sulawesi Utara', 'Sumatera Barat', 'Sumatera Selatan', 'Sumatera Utara'
        ];
    }

    public function getAllCities(){
        return [
            'Kabupaten Aceh Barat', 'Kabupaten Aceh Barat Daya', 'Kabupaten Aceh Besar', 'Kabupaten Aceh Jaya', 'Kabupaten Aceh Selatan', 'Kabupaten Aceh Singkil', 'Kabupaten Aceh Tamiang', 'Kabupaten Aceh Tengah', 'Kabupaten Aceh Tenggara', 'Kabupaten Aceh Timur', 'Kabupaten Aceh Utara', 'Kabupaten Administrasi Kepulauan Seribu', 'Kabupaten Agam', 'Kabupaten Alor', 'Kabupaten Asahan', 'Kabupaten Asmat', 'Kabupaten Badung', 'Kabupaten Balangan', 'Kabupaten Bandung', 'Kabupaten Bandung Barat', 'Kabupaten Banggai', 'Kabupaten Banggai Kepulauan', 'Kabupaten Banggai Laut', 'Kabupaten Bangka', 'Kabupaten Bangka Barat', 'Kabupaten Bangka Selatan', 'Kabupaten Bangka Tengah', 'Kabupaten Bangkalan', 'Kabupaten Bangli', 'Kabupaten Banjar', 'Kabupaten Banjarnegara', 'Kabupaten Bantaeng', 'Kabupaten Bantul', 'Kabupaten Banyuasin', 'Kabupaten Banyumas', 'Kabupaten Banyuwangi', 'Kabupaten Barito Kuala', 'Kabupaten Barito Selatan', 'Kabupaten Barito Selatan', 'Kabupaten Barito Timur', 'Kabupaten Barito Timur', 'Kabupaten Barito Utara', 'Kabupaten Barito Utara', 'Kabupaten Barru', 'Kabupaten Batang', 'Kabupaten Batanghari', 'Kabupaten Batu Bara', 'Kabupaten Bekasi', 'Kabupaten Belitung', 'Kabupaten Belitung Timur', 'Kabupaten Belu', 'Kabupaten Bener Meriah', 'Kabupaten Bengkalis', 'Kabupaten Bengkayang', 'Kabupaten Bengkulu Selatan', 'Kabupaten Bengkulu Tengah', 'Kabupaten Bengkulu Utara', 'Kabupaten Biak Numfor', 'Kabupaten Bima', 'Kabupaten Bintan', 'Kabupaten Bireuen', 'Kabupaten Blitar', 'Kabupaten Blora', 'Kabupaten Boalemo', 'Kabupaten Bogor', 'Kabupaten Bojonegoro', 'Kabupaten Bolaang Mongondow', 'Kabupaten Bolaang Mongondow Selatan', 'Kabupaten Bolaang Mongondow Timur', 'Kabupaten Bolaang Mongondow Utara', 'Kabupaten Bombana', 'Kabupaten Bondowoso', 'Kabupaten Bone', 'Kabupaten Bone Bolango', 'Kabupaten Boven Digoel', 'Kabupaten Boyolali', 'Kabupaten Brebes', 'Kabupaten Buleleng', 'Kabupaten Bulukumba', 'Kabupaten Bulungan', 'Kabupaten Bungo', 'Kabupaten Buol', 'Kabupaten Buru', 'Kabupaten Buru Selatan', 'Kabupaten Buton', 'Kabupaten Buton Selatan', 'Kabupaten Buton Tengah', 'Kabupaten Buton Utara', 'Kabupaten Ciamis', 'Kabupaten Cianjur', 'Kabupaten Cilacap', 'Kabupaten Cirebon', 'Kabupaten Dairi', 'Kabupaten Deiyai', 'Kabupaten Deli Serdang', 'Kabupaten Demak', 'Kabupaten Dharmasraya', 'Kabupaten Dogiyai', 'Kabupaten Dompu', 'Kabupaten Donggala','Kabupaten Empat Lawang', 'Kabupaten Ende', 'Kabupaten Enrekang', 'Kabupaten Fakfak', 'Kabupaten Flores Timur', 'Kabupaten Garut', 'Kabupaten Gayo Lues', 'Kabupaten Gianyar', 'Kabupaten Gorontalo', 'Kabupaten Gorontalo Utara', 'Kabupaten Gowa', 'Kabupaten Gresik', 'Kabupaten Grobogan', 'Kabupaten Gunung Mas', 'Kabupaten Gunung Mas', 'Kabupaten Gunungkidul', 'Kabupaten Halmahera Barat', 'Kabupaten Halmahera Selatan', 'Kabupaten Halmahera Tengah', 'Kabupaten Halmahera Timur', 'Kabupaten Halmahera Utara', 'Kabupaten Hulu Sungai Selatan', 'Kabupaten Hulu Sungai Tengah', 'Kabupaten Hulu Sungai Utara', 'Kabupaten Humbang Hasundutan', 'Kabupaten Indragiri Hilir', 'Kabupaten Indragiri Hulu', 'Kabupaten Indramayu', 'Kabupaten Intan Jaya', 'Kabupaten Jayapura', 'Kabupaten Jayawijaya', 'Kabupaten Jember', 'Kabupaten Jembrana', 'Kabupaten Jeneponto', 'Kabupaten Jepara', 'Kabupaten Jombang', 'Kabupaten Kaimana', 'Kabupaten Kampar', 'Kabupaten Kapuas', 'Kabupaten Kapuas', 'Kabupaten Kapuas Hulu', 'Kabupaten Karanganyar', 'Kabupaten Karangasem', 'Kabupaten Karawang', 'Kabupaten Karimun', 'Kabupaten Karo', 'Kabupaten Katingan', 'Kabupaten Katingan', 'Kabupaten Kaur', 'Kabupaten Kayong Utara','Kabupaten Kebumen', 'Kabupaten Kediri', 'Kabupaten Keerom', 'Kabupaten Kendal', 'Kabupaten Kepahiang', 'Kabupaten Kepulauan Anambas', 'Kabupaten Kepulauan Aru', 'Kabupaten Kepulauan Mentawai', 'Kabupaten Kepulauan Meranti', 'Kabupaten Kepulauan Sangihe', 'Kabupaten Kepulauan Selayar', 'Kabupaten Kepulauan Siau Tagulandang Biaro', 'Kabupaten Kepulauan Sula', 'Kabupaten Kepulauan Talaud', 'Kabupaten Kepulauan Tanimbar', 'Kabupaten Kepulauan Yapen', 'Kabupaten Kerinci', 'Kabupaten Ketapang', 'Kabupaten Klaten', 'Kabupaten Klungkung', 'Kabupaten Kolaka', 'Kabupaten Kolaka Timur', 'Kabupaten Kolaka Utara', 'Kabupaten Konawe', 'Kabupaten Konawe Kepulauan', 'Kabupaten Konawe Selatan', 'Kabupaten Konawe Utara', 'Kabupaten Kotabaru', 'Kabupaten Kotawaringin Barat', 'Kabupaten Kotawaringin Barat', 'Kabupaten Kotawaringin Timur', 'Kabupaten Kotawaringin Timur', 'Kabupaten Kuantan Singingi', 'Kabupaten Kubu Raya', 'Kabupaten Kudus', 'Kabupaten Kulon Progo', 'Kabupaten Kuningan', 'Kabupaten Kupang', 'Kabupaten Labuhanbatu', 'Kabupaten Labuhanbatu Selatan', 'Kabupaten Labuhanbatu Utara', 'Kabupaten Lahat', 'Kabupaten Lamandau', 'Kabupaten Lamandau', 'Kabupaten Lamongan', 'Kabupaten Lampung Barat', 'Kabupaten Lampung Selatan', 'Kabupaten Lampung Tengah', 'Kabupaten Lampung Timur', 'Kabupaten Lampung Utara','Kabupaten Landak', 'Kabupaten Langkat', 'Kabupaten Lanny Jaya', 'Kabupaten Lebak', 'Kabupaten Lebong', 'Kabupaten Lembata', 'Kabupaten Lima Puluh Kota', 'Kabupaten Lingga', 'Kabupaten Lombok Barat', 'Kabupaten Lombok Tengah', 'Kabupaten Lombok Timur', 'Kabupaten Lombok Utara', 'Kabupaten Lumajang', 'Kabupaten Luwu', 'Kabupaten Luwu Timur', 'Kabupaten Luwu Utara', 'Kabupaten Madiun', 'Kabupaten Magelang', 'Kabupaten Magetan', 'Kabupaten Majalengka', 'Kabupaten Majene', 'Kabupaten Malaka', 'Kabupaten Malang', 'Kabupaten Malinau', 'Kabupaten Maluku Barat Daya', 'Kabupaten Maluku Tengah', 'Kabupaten Maluku Tenggara', 'Kabupaten Mamasa', 'Kabupaten Mamberamo Raya', 'Kabupaten Mamberamo Tengah', 'Kabupaten Mamuju', 'Kabupaten Mamuju Tengah', 'Kabupaten Mandailing Natal', 'Kabupaten Manggarai', 'Kabupaten Manggarai Barat', 'Kabupaten Manggarai Timur', 'Kabupaten Manokwari', 'Kabupaten Manokwari Selatan', 'Kabupaten Mappi', 'Kabupaten Maros', 'Kabupaten Maybrat', 'Kabupaten Melawi', 'Kabupaten Mempawah', 'Kabupaten Merangin', 'Kabupaten Merauke', 'Kabupaten Mesuji', 'Kabupaten Mimika', 'Kabupaten Minahasa', 'Kabupaten Minahasa Selatan', 'Kabupaten Minahasa Tenggara','Kabupaten Minahasa Utara', 'Kabupaten Mojokerto', 'Kabupaten Morowali', 'Kabupaten Morowali Utara', 'Kabupaten Muara Enim', 'Kabupaten Muaro Jambi', 'Kabupaten Mukomuko', 'Kabupaten Muna', 'Kabupaten Muna Barat', 'Kabupaten Murung Raya', 'Kabupaten Murung Raya', 'Kabupaten Musi Banyuasin', 'Kabupaten Musi Rawas', 'Kabupaten Musi Rawas Utara', 'Kabupaten Nabire', 'Kabupaten Nagan Raya', 'Kabupaten Nagekeo', 'Kabupaten Natuna', 'Kabupaten Nduga', 'Kabupaten Ngada', 'Kabupaten Nganjuk', 'Kabupaten Ngawi', 'Kabupaten Nias', 'Kabupaten Nias Barat', 'Kabupaten Nias Selatan', 'Kabupaten Nias Utara', 'Kabupaten Nunukan', 'Kabupaten Ogan Ilir', 'Kabupaten Ogan Komering Ilir', 'Kabupaten Ogan Komering Ulu', 'Kabupaten Ogan Komering Ulu Selatan', 'Kabupaten Ogan Komering Ulu Timur', 'Kabupaten Pacitan', 'Kabupaten Padang Lawas', 'Kabupaten Padang Lawas Utara', 'Kabupaten Padang Pariaman', 'Kabupaten Pakpak Bharat', 'Kabupaten Pamekasan', 'Kabupaten Pandeglang', 'Kabupaten Pangandaran', 'Kabupaten Pangkajene dan Kepulauan', 'Kabupaten Paniai', 'Kabupaten Parigi Moutong', 'Kabupaten Pasaman', 'Kabupaten Pasaman Barat', 'Kabupaten Pasangkayu', 'Kabupaten Pasuruan', 'Kabupaten Pati', 'Kabupaten Pegunungan Arfak', 'Kabupaten Pegunungan Bintang','Kabupaten Pekalongan', 'Kabupaten Pelalawan', 'Kabupaten Pemalang', 'Kabupaten Penukal Abab Lematang Ilir', 'Kabupaten Pesawaran', 'Kabupaten Pesisir Barat', 'Kabupaten Pesisir Selatan', 'Kabupaten Pidie', 'Kabupaten Pidie Jaya', 'Kabupaten Pinrang', 'Kabupaten Pohuwato', 'Kabupaten Polewali Mandar', 'Kabupaten Ponorogo', 'Kabupaten Poso', 'Kabupaten Pringsewu', 'Kabupaten Probolinggo', 'Kabupaten Pulang Pisau', 'Kabupaten Pulang Pisau', 'Kabupaten Pulau Morotai', 'Kabupaten Pulau Taliabu', 'Kabupaten Puncak', 'Kabupaten Puncak Jaya', 'Kabupaten Purbalingga', 'Kabupaten Purwakarta', 'Kabupaten Purworejo', 'Kabupaten Raja Ampat', 'Kabupaten Rejang Lebong', 'Kabupaten Rembang', 'Kabupaten Rokan Hilir', 'Kabupaten Rokan Hulu', 'Kabupaten Rote Ndao', 'Kabupaten Sabu Raijua', 'Kabupaten Sambas', 'Kabupaten Samosir', 'Kabupaten Sampang', 'Kabupaten Sanggau', 'Kabupaten Sarmi', 'Kabupaten Sarolangun', 'Kabupaten Sekadau', 'Kabupaten Seluma', 'Kabupaten Semarang', 'Kabupaten Seram Bagian Barat', 'Kabupaten Seram Bagian Timur', 'Kabupaten Serang', 'Kabupaten Serdang Bedagai', 'Kabupaten Seruyan', 'Kabupaten Seruyan', 'Kabupaten Siak', 'Kabupaten Sidenreng Rappang', 'Kabupaten Sidoarjo','Kabupaten Sigi', 'Kabupaten Sijunjung', 'Kabupaten Sikka', 'Kabupaten Simalungun', 'Kabupaten Simeulue', 'Kabupaten Simeulue', 'Kabupaten Sinjai', 'Kabupaten Sintang', 'Kabupaten Situbondo', 'Kabupaten Sleman', 'Kabupaten Solok', 'Kabupaten Solok Selatan', 'Kabupaten Soppeng', 'Kabupaten Sorong', 'Kabupaten Sorong Selatan', 'Kabupaten Sragen', 'Kabupaten Subang', 'Kabupaten Sukabumi', 'Kabupaten Sukamara', 'Kabupaten Sukamara', 'Kabupaten Sukoharjo', 'Kabupaten Sumba Barat', 'Kabupaten Sumba Barat Daya', 'Kabupaten Sumba Tengah', 'Kabupaten Sumba Timur', 'Kabupaten Sumbawa', 'Kabupaten Sumbawa Barat', 'Kabupaten Sumedang', 'Kabupaten Sumenep', 'Kabupaten Supiori', 'Kabupaten Tabalong', 'Kabupaten Tabanan', 'Kabupaten Takalar', 'Kabupaten Tambrauw', 'Kabupaten Tana Tidung', 'Kabupaten Tana Toraja', 'Kabupaten Tanah Bumbu', 'Kabupaten Tanah Datar', 'Kabupaten Tanah Laut', 'Kabupaten Tangerang', 'Kabupaten Tanggamus', 'Kabupaten Tanjung Jabung Barat', 'Kabupaten Tanjung Jabung Timur', 'Kabupaten Tapanuli Selatan', 'Kabupaten Tapanuli Tengah', 'Kabupaten Tapanuli Utara', 'Kabupaten Tapin', 'Kabupaten Tasikmalaya', 'Kabupaten Tebo', 'Kabupaten Tegal','Kabupaten Teluk Bintuni', 'Kabupaten Teluk Wondama', 'Kabupaten Temanggung', 'Kabupaten Timor Tengah Selatan', 'Kabupaten Timor Tengah Utara', 'Kabupaten Toba', 'Kabupaten Tojo Una-Una', 'Kabupaten Tolikara', 'Kabupaten Tolitoli', 'Kabupaten Toraja Utara', 'Kabupaten Trenggalek', 'Kabupaten Tuban', 'Kabupaten Tulang Bawang', 'Kabupaten Tulang Bawang Barat', 'Kabupaten Tulungagung', 'Kabupaten Wajo', 'Kabupaten Wakatobi', 'Kabupaten Waropen', 'Kabupaten Way Kanan', 'Kabupaten Wonogiri', 'Kabupaten Wonosobo', 'Kabupaten Yahukimo', 'Kabupaten Yalimo', 'Kota Administrasi Jakarta Barat', 'Kota Administrasi Jakarta Pusat', 'Kota Administrasi Jakarta Selatan', 'Kota Administrasi Jakarta Timur', 'Kota Administrasi Jakarta Utara', 'Kota Ambon', 'Kota Bandar Lampung', 'Kota Bandung', 'Kota Banjar', 'Kota Banjarbaru', 'Kota Banjarmasin', 'Kota Batam', 'Kota Batu', 'Kota Baubau', 'Kota Bekasi', 'Kota Bengkulu', 'Kota Bima', 'Kota Binjai', 'Kota Bitung', 'Kota Blitar', 'Kota Bogor', 'Kota Bukittinggi', 'Kota Cilegon', 'Kota Cimahi', 'Kota Cirebon', 'Kota Denpasar', 'Kota Depok','Kota Dumai', 'Kota Gorontalo', 'Kota Gunungsitoli', 'Kota Jambi', 'Kota Jayapura', 'Kota Kediri', 'Kota Kendari', 'Kota Kotamobagu', 'Kota Kupang', 'Kota Langsa', 'Kota Lhokseumawe', 'Kota Lubuklinggau', 'Kota Madiun', 'Kota Magelang', 'Kota Makassar', 'Kota Malang', 'Kota Manado', 'Kota Mataram', 'Kota Medan', 'Kota Metro', 'Kota Mojokerto', 'Kota Padang', 'Kota Padang Panjang', 'Kota Padang Sidempuan', 'Kota Pagar Alam', 'Kota Palangka Raya', 'Kota Palangka Raya', 'Kota Palembang', 'Kota Palopo', 'Kota Palu', 'Kota Pangkalpinang', 'Kota Parepare', 'Kota Pariaman', 'Kota Pasuruan', 'Kota Payakumbuh', 'Kota Pekalongan', 'Kota Pekanbaru', 'Kota Pematangsiantar', 'Kota Pontianak', 'Kota Prabumulih', 'Kota Probolinggo', 'Kota Sabang', 'Kota Salatiga', 'Kota Sawahlunto', 'Kota Semarang', 'Kota Serang', 'Kota Sibolga', 'Kota Singkawang', 'Kota Solok', 'Kota Sorong','Kota Subulussalam', 'Kota Sukabumi', 'Kota Sung Penuh', 'Kota Surabaya', 'Kota Surakarta', 'Kota Tangerang', 'Kota Tangerang Selatan', 'Kota Tanjungbalai', 'Kota Tanjungpinang', 'Kota Tarakan', 'Kota Tasikmalaya', 'Kota Tebing Tinggi', 'Kota Tegal', 'Kota Ternate', 'Kota Tidore Kepulauan', 'Kota Tomohon', 'Kota Tual', 'Kota Yogyakarta'
        ];
    }

    public function getAllCategories(){
        return [
            "Tanah",
            "Rumah",
            "Ruko",
            "Pabrik",
            "Hotel dan Villa",
            "Mobil",
            "Motor",
            "Bongkaran",
            "Besi Tua",
            "Elektronik",
            "Kayu",
            "UMKM",
            "Inventaris",
            "Gudang",
            "Toko",
            "Apartemen",
            "Lain-lain"
        ];
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

        if (!empty($selectedCities) && $selectedCities[0] !== null && $selectedCities[0] !== "") {
            $query->whereIn('city', $selectedCities);
        }

        if (!empty($selectedProvinces) && $selectedProvinces[0] !== null && $selectedProvinces[0] !== "") {
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
        return view('beranda-by-id', compact('asset'));
    }

    public function asetById($id){
        $asset = Asset::findOrFail($id);
        return view('aset-by-id', compact('asset'));
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
        $result = $request->input('search',null);
        $query = Asset::query();

        if (!empty($selectedCategories)) {
            $query->whereIn('category', $selectedCategories);
        }

        if (!empty($selectedCities) && $selectedCities[0] !== null && $selectedCities[0] !== "") {
            $query->whereIn('city', $selectedCities);
        }

        if (!empty($selectedProvinces) && $selectedProvinces[0] !== null && $selectedProvinces[0] !== "") {
            $query->whereIn('province', $selectedProvinces);
        }

        if (!empty($maxPrice)) {
            $query->where('price', '<=', $maxPrice);
        }

        if (!empty($minPrice)) {
            $query->where('price', '>=', $minPrice);
        }

        if (!empty($result)) {
            $query->where('name', 'like', '%' . request('search') . '%');
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

        $assets = $query->paginate(16);

        if ($result && $assets->total() === 0) {
            return view('asset-no-result',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));

        }else if($assets->total() == 0) {
            return view('asset-no-search',compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
        }


        if (!$request->has('filter')) {
            session()->remove('selected_filter');
        }else if ($selectedFilter) {
            session(['selected_filter' => $selectedFilter]);
        }

        $assets->appends(['filter' => $selectedFilter ,'search' => $result,'min-price' => $minPrice, 'max-price' => $maxPrice, 'categories' => $selectedCategories, 'provinces' => $selectedProvinces,'cities' => $selectedCities]);

        return view('asset',  compact('assets','categories','result','selectedFilter','selectedProvinces','selectedCities','selectedCategories','minPrice','maxPrice','provinces','cities'));
    }

    public function tentangKami(Request $request){
        $carousels = Carousel::all();
        return view('tentang-kami',  compact('carousels'));
    }

    public function panduan(){
        return view('panduan');
    }

    public function hubungiKami(){
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
        $announcement_count = Announcement::count();

        return view('admin.admin-dashboard',compact('asset_count','user_count','owner_count','seller_count','carousel_count','announcement_count'));
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

        return redirect()->back()->with('success', 'Terima kasih telah menghubungi kami. Tim kami akan segera menghubungi anda');
    }

    public function pengumuman(){
        $announcements = Announcement::orderBy('date', 'desc')->paginate(5);
        return view('pengumuman',compact('announcements'));
    }

    public function filterPengumuman(Request $request, $type) {
        $announcements = Announcement::where('type','=', $type)->paginate(5);
        return view('pengumuman', compact('announcements'));
    }

    // user
    public function user(Request $request){

        $query = User::query();

        $result = $request->input('search',null);

        $selectedFilter = $request->query('filter', session('selected_filter'));

        if (!empty($result)) {
            $query->where('name', 'like', '%' . request('search') . '%');
        }

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

        $users = $query->paginate(10);

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
