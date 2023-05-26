<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AssetController extends Controller
{

    public function view(){
        return view('admin.asset.view-asset');
    }

    public function create(){
        return view('admin.asset.create-asset');
    }

    public function store(Request $request){

        // $request->validate([
        //     'Name' => 'required|string',
        //     'PublicationDate' => 'required',
        //     'Stock' => 'required|numeric|gt:5',
        //     'Author' => 'required|string|min:5',
        //     'BookImg' => 'required|mimes:png,jpg',
        // ]);

        $extension = $request->file('image')->getClientOriginalExtension();
        $file_name = $request->profile_region.'-'.$request->profile_name.'.'.$extension;
        $request->file('image')->storeAs('/public/asset/image', $file_name);

        Asset::create([
            'name' => $request->name,
            'category' => $request->category,
            'province' => $request->province,
            'city' => $request->city,
            'price' => $request->price,
            'seller_id' => $request->seller_name,
            'description' => $request->description,
            'attachment' => $request->attachment,
            'image' => $file_name,
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
            $file_name = $request->profile_region.'-'.$request->profile_name.'.'.$image->getClientOriginalName();
            $image->storeAs('/public/image/structure', $file_name);
            $asset->update([
                'image' => $file_name
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
