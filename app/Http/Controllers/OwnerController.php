<?php

namespace App\Http\Controllers;

use App\Models\Owner;
use Illuminate\Http\Request;

class OwnerController extends Controller
{
    public function owner(Request $request){
        $query = Owner::query();

        $result = $request->input('search',null);

        $selectedFilter = $request->query('filter', session('selected_filter'));

        if (!empty($result)) {
            $query->where('owner_name', 'like', '%' . request('search') . '%');
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

        $owners = $query->paginate(10);

        if (!$request->has('filter')) {
            session()->remove('selected_filter');
        }else if ($selectedFilter) {
            session(['selected_filter' => $selectedFilter]);
        }

        $owners->appends(['filter' => $selectedFilter]);

        return view('admin.owner.owner', compact('owners','selectedFilter','result'));
    }

    public function view($id){
        $owner = Owner::findOrFail($id);
        return view('admin.owner.view-owner', compact('owner'));
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
        return redirect(route('owner'));
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
        return redirect(route('owner'));
    }

    public function delete($id){
        $asset = Owner::findOrFail($id);
        $asset->delete();
        return redirect(route('owner'));
    }
}
