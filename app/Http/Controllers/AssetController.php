<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\Seller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{

    public function view(){
        $assets = Asset::all();
        return view('admin.asset.view-asset', compact('assets'));
    }

    public function create(){
        $sellers = Seller::all();
        return view('admin.asset.create-asset', compact('sellers'));
    }

    public function store(Request $request){

        // $request->validate([
        //     'Name' => 'required|string',
        //     'PublicationDate' => 'required',
        //     'Stock' => 'required|numeric|gt:5',
        //     'Author' => 'required|string|min:5',
        //     'BookImg' => 'required|mimes:png,jpg',
        // ]);

        $extension1 = $request->file('image')->getClientOriginalExtension();
        $image_name = time().$request->name.'-'.$request->category.'.'.$extension1;
        $request->file('image')->storeAs('/public/asset/image', $image_name);

        $extension2 = $request->file('attachment')->getClientOriginalExtension();
        $attachment_name = time().$request->name.'-'.$request->category.'.'.$extension2;
        $request->file('attachment')->storeAs('/public/asset/attachment', $attachment_name);

        Asset::create([
            'name' => $request->name,
            'category' => $request->category,
            'province' => $request->province,
            'city' => $request->city,
            'price' => $request->price,
            'seller_id' => $request->seller_name,
            'description' => $request->description,
            'attachment' => $attachment_name,
            'image' => $image_name,
            ]);
        return redirect(route('view-asset'));
    }

    public function edit($id){
        $asset = Asset::findOrFail($id);
        return view('admin.asset.update-asset', compact('asset'));
    }

    public function update(Request $request, $id){
        $image = $request->file('image');
        $asset = Asset::findOrFail($id);

        if($image){
            Storage::delete('public/image/structure'.$asset->image);
            $image_name = $request->profile_region.'-'.$request->profile_name.'.'.$image->getClientOriginalName();
            $image->storeAs('/public/image/structure', $image_name);
            $asset->update([
                'image' => $image_name
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
            'attachment' => $request->attachment,
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
