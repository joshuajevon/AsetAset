<?php

namespace App\Http\Controllers;

use App\Models\Seller;
use Illuminate\Http\Request;

class SellerController extends Controller
{

    public function seller(){
        $sellers = Seller::all();
        return view('admin.seller.seller', compact('sellers'));
    }

    public function view($id){
        $seller = Seller::findOrFail($id);
        return view('admin.seller.view-seller', compact('seller'));
    }

    public function create(){
        return view('admin.seller.create-seller');
    }

    public function store(Request $request){

        $request->validate([
            'seller_name' => 'required|string',
            'seller_address' => 'required|string',
            'seller_phone' => 'required|numeric',
        ]);

        Seller::create([
            'seller_name' => $request->seller_name,
            'seller_address' => $request->seller_address,
            'seller_phone' => $request->seller_phone,
            ]);
        return redirect(route('seller'));
    }

    public function edit($id){
        $seller = Seller::findOrFail($id);
        return view('admin.seller.update-seller', compact('seller'));
    }

    public function update(Request $request, $id){

        Seller::findOrFail($id)->update([
            'seller_name' => $request->seller_name,
            'seller_address' => $request->seller_address,
            'seller_phone' => $request->seller_phone,
        ]);
        return redirect(route('seller'));
    }

    public function delete($id){
        $asset = Seller::findOrFail($id);
        $asset->delete();
        return redirect()->back();
    }
}
