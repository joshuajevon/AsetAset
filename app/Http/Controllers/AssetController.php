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

        session(['selected_filter' => $selectedFilter]);

        $assets->appends(['filter' => $selectedFilter]);

        return view('admin.asset.asset', compact('assets','selectedFilter'));
    }

    public function view($id){
        $asset = Asset::findOrFail($id);
        return view('admin.asset.view-asset', compact('asset'));
    }


    public function create(){
        $sellers = Seller::all();
        $owners = Owner::all();
        return view('admin.asset.create-asset', compact('sellers','owners'));
    }

    public function store(Request $request){

        // $request->validate([
        //     'Name' => 'required|string',
        //     'PublicationDate' => 'required',
        //     'Stock' => 'required|numeric|gt:5',
        //     'Author' => 'required|string|min:5',
        //     'BookImg' => 'required|mimes:png,jpg',
        // ]);

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
            'province' => $request->province,
            'city' => $request->city,
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

    public function edit($id){
        $asset = Asset::findOrFail($id);
        $sellers = Seller::all();
        $owners = Owner::all();
        return view('admin.asset.update-asset', compact('asset','sellers','owners'));
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
            'province' => $request->province,
            'city' => $request->city,
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
