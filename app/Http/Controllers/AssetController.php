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

    public function view(){
        $assets = Asset::all();
        return view('admin.asset.view-asset', compact('assets'));
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

        $image_name = time().'-'.Str::random(10).'-'. $request->file('image')->getClientOriginalName();
        $request->file('image')->storeAs('/public/asset/image', $image_name);

        $attachment_name = time().'-'.Str::random(10).'-'. $request->file('attachment')->getClientOriginalName();
        $request->file('attachment')->storeAs('/public/asset/attachment', $attachment_name);

        Asset::create([
            'name' => $request->name,
            'category' => $request->category,
            'province' => $request->province,
            'city' => $request->city,
            'price' => $request->price,
            'seller_id' => $request->seller_name,
            'owner_id' => $request->owner_name,
            'description' => $request->description,
            'attachment' => $attachment_name,
            'image' => $image_name,
            ]);
        return redirect(route('view-asset'));
    }

    public function edit($id){
        $asset = Asset::findOrFail($id);
        $sellers = Seller::all();
        $owners = Owner::all();
        return view('admin.asset.update-asset', compact('asset','sellers','owners'));
    }

    public function update(Request $request, $id){
        $image = $request->file('image');
        $attachment = $request->file('attachment');
        $asset = Asset::findOrFail($id);

        if($image){
            Storage::delete('public/asset/image/'.$asset->image);
            $image_name = time().'-'.Str::random(10).'-'. $request->file('image')->getClientOriginalName();
            $image->storeAs('/public/asset/image/', $image_name);
            $asset->update([
                'image' => $image_name
            ]);
        }

        if($attachment){
            Storage::delete('public/asset/attachment/'.$asset->attachment);
            $attachment_name = time().'-'.Str::random(10).'-'. $request->file('attachment')->getClientOriginalName();
            $attachment->storeAs('/public/asset/attachment/', $attachment_name);
            $asset->update([
                'attachment' => $attachment_name
            ]);
        }

        Asset::findOrFail($id)->update([
            'name' => $request->name,
            'category' => $request->category,
            'province' => $request->province,
            'city' => $request->city,
            'price' => $request->price,
            'seller_id' => $request->seller_name,
            'description' => $request->description,
        ]);
        return redirect(route('view-asset'));
    }

    public function delete($id){
        $asset = Asset::findOrFail($id);
        $asset->delete();
        Storage::delete('public/image/structure'.$asset->image);
        return redirect()->back();
    }
}
