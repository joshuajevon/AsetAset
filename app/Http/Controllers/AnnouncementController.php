<?php

namespace App\Http\Controllers;

use App\Models\Announcement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AnnouncementController extends Controller
{
    public function announcement(Request $request){
        $query = Announcement::query();

        $result = $request->input('search',null);

        $selectedFilter = $request->query('filter', session('selected_filter'));

        if (!empty($result)) {
            $query->where('title', 'like', '%' . request('search') . '%');
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

        $announcements = $query->paginate(10);

        if (!$request->has('filter')) {
            session()->remove('selected_filter');
        }else if ($selectedFilter) {
            session(['selected_filter' => $selectedFilter]);
        }

        $announcements->appends(['filter' => $selectedFilter]);
        $result = $request->input('search');
        return view('admin.announcement.announcement', compact('announcements','selectedFilter','result'));
    }

    public function view($id){
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcement.view-announcement', compact('announcement'));
    }

    public function create(){
        return view('admin.announcement.create-announcement');
    }

    public function store(Request $request){

        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'date' => 'required|date',
            'file' => 'required',
            'type' => 'required',
        ]);

        $file_name =  $request->title.'-'.$request->file('file')->getClientOriginalName();
        $request->file('file')->storeAs('/public/asset/announcement/', $file_name);

        Announcement::create([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'file' => $file_name,
            'type' => $request->type,
        ]);

        return redirect(route('announcement'));
    }

    public function edit($id){
        $announcement = Announcement::findOrFail($id);
        return view('admin.announcement.update-announcement', compact('announcement'));
    }

    public function update(Request $request, $id){
        $image = $request->file('file');
        $announcement = Announcement::findOrFail($id);

        if($image){
            Storage::delete('/public/asset/announcement/'.$announcement->file);
            $file_name = $request->title.'-'.$image->getClientOriginalName();
            $image->storeAs('/public/asset/announcement/', $file_name);
            $announcement->update([
                'file' => $file_name
            ]);
        }

        Announcement::findOrFail($id)->update([
            'title' => $request->title,
            'description' => $request->description,
            'date' => $request->date,
            'type' => $request->type,
        ]);

        return redirect(route('announcement'));
    }

    public function delete($id){
        $announcement = announcement::findOrFail($id);
        $announcement->delete();
        Storage::delete('/public/asset/announcement/'.$announcement->slideshow);
        return redirect(route('announcement'));
    }
}
