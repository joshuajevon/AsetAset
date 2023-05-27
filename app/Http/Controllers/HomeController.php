<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function home(){
        $assets = Asset::all();
        return view('welcome',  compact('assets'));
    }

    public function dashboard(){
        return view('admin.admin-dashboard');
    }
}
