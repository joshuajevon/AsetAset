<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Owner;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class AssetController extends Controller
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

    public function asset(Request $request){

        $query = Asset::query();

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
            $assets = Asset::where('name','like','%' .request('search'). '%')->simplePaginate(10);
        }else{
            $assets = $query->paginate(10);
        }

        if (!$request->has('filter')) {
            session()->remove('selected_filter');
        }else if ($selectedFilter) {
            session(['selected_filter' => $selectedFilter]);
        }

        $assets->appends(['filter' => $selectedFilter]);
        $result = $request->input('search');
        return view('admin.asset.asset', compact('assets','selectedFilter','result'));
    }

    public function view($id){
        $asset = Asset::findOrFail($id);
        return view('admin.asset.view-asset', compact('asset'));
    }


    public function create(Request $request){
        $sellers = Seller::all();
        $owners = Owner::all();

        $cities = $this->getAllCities();

        $provinces = $this->getAllProvinces();

        $selectedProvinces = $request->input('provinces', []);
        $selectedCities = $request->input('cities', []);

        if (!empty($selectedCities)) {
            $query->whereIn('city', $selectedCities);
        }

        if (!empty($selectedProvinces)) {
            $query->whereIn('province', $selectedProvinces);
        }

        return view('admin.asset.create-asset', compact('sellers','owners','selectedProvinces','provinces','cities','selectedCities'));
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|string',
            'category' => 'required',
            'provinces' => 'required',
            'cities' => 'required',
            'price' => 'required',
            'seller_name' => 'required',
            'owner_name' => 'required',
            'description' => 'required|string',
            'status' => 'required|string',
            'image1' => 'required|',
            'attachment1' => 'required|',
        ]);

        $images = [];
        $attachments = [];

        for ($i = 1; $i <= 5; $i++) {
            $imageKey = 'image' . $i;
            $attachmentKey = 'attachment' . $i;

            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $imageName = time() . '-' . Str::random(10) . '-' . $image->getClientOriginalName();
                $image->storeAs('/public/asset/image' . $i, $imageName);
                $images[$imageKey] = $imageName;
            }

            if ($request->hasFile($attachmentKey)) {
                $attachment = $request->file($attachmentKey);
                $attachmentName = time() . '-' . Str::random(10) . '-' . $attachment->getClientOriginalName();
                $attachment->storeAs('/public/asset/attachment' . $i, $attachmentName);
                $attachments[$attachmentKey] = $attachmentName;
            }
        }

        $assetData = [
            'name' => $request->name,
            'category' => $request->category,
            'province' => $request->provinces,
            'city' => $request->cities,
            'price' => $request->price,
            'seller_id' => $request->seller_name,
            'owner_id' => $request->owner_name,
            'description' => $request->description,
            'status' => $request->status,
        ];

        $assetData = array_merge($assetData, $attachments, $images);

        Asset::create($assetData);
        return redirect(route('asset'));
    }

    public function edit(Request $request, $id){
        $asset = Asset::findOrFail($id);
        $sellers = Seller::all();
        $owners = Owner::all();

        $cities = $this->getAllCities();

        $provinces = $this->getAllProvinces();

        return view('admin.asset.update-asset', compact('asset','sellers','owners','provinces','cities'));
    }

    public function update(Request $request, $id){

        $asset = Asset::find($id);
        $images = [];
        $attachments = [];

        for ($i = 1; $i <= 5; $i++) {
            $imageKey = 'image' . $i;
            $attachmentKey = 'attachment' . $i;

            if ($request->hasFile($imageKey)) {
                $image = $request->file($imageKey);
                $imageName = time() . '-' . Str::random(10) . '-' . $image->getClientOriginalName();
                $image->storeAs('/public/asset/image' . $i, $imageName);
                $images[$imageKey] = $imageName;
            }

            if ($request->hasFile($attachmentKey)) {
                $attachment = $request->file($attachmentKey);
                $attachmentName = time() . '-' . Str::random(10) . '-' . $attachment->getClientOriginalName();
                $attachment->storeAs('/public/asset/attachment' . $i, $attachmentName);
                $attachments[$attachmentKey] = $attachmentName;
            }
        }

        $assetData = [
            'name' => $request->name,
            'category' => $request->category,
            'province' => $request->provinces,
            'city' => $request->cities,
            'price' => $request->price,
            'seller_id' => $request->seller_name,
            'owner_id' => $request->owner_name,
            'description' => $request->description,
            'status' => $request->status,
        ];

        $assetData = array_merge($assetData, $attachments, $images);

        $asset->update($assetData);

        return redirect(route('asset'));
    }

    public function delete($id){
        $asset = Asset::findOrFail($id);
        $asset->delete();
        Storage::delete('public/image/structure'.$asset->image);
        return redirect()->back();
    }
}
