<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function view(){
        $owners = Owner::all();
        return view('admin.owner.view-owner', compact('owners'));
    }

    public function create(){
        return view('admin.owner.create-owner');
    }

    public function store(Request $request){

        $request->validate([
            'owner_name' => 'required|string',
            'owner_address' => 'required|string',
            'owner_phone' => 'required|numeric',
        ]);

        Owner::create([
            'owner_name' => $request->owner_name,
            'owner_address' => $request->owner_address,
            'owner_phone' => $request->owner_phone,
            ]);
        return redirect(route('view-owner'));
    }

    public function edit($id){
        $owner = Owner::findOrFail($id);
        return view('admin.owner.update-owner', compact('owner'));
    }

    public function update(Request $request, $id){

        Owner::findOrFail($id)->update([
            'owner_name' => $request->owner_name,
            'owner_address' => $request->owner_address,
            'owner_phone' => $request->owner_phone,
        ]);
        return redirect(route('view-owner'));
    }

    public function delete($id){
        $asset = Owner::findOrFail($id);
        $asset->delete();
        return redirect()->back();
    }
}
