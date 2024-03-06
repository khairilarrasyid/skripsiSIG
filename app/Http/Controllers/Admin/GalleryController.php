<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\DestinationGallery;
use App\Models\Destination;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class GalleryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Galeri Destinasi',
            'destinations' => Destination::all(),
            'galleries' => DestinationGallery::all()
        ];

        return view('admin.gallery.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'upload' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'destination_id' => 'required'
        ]);

        $image = $request->file('upload');
        $image->storeAs('public/gallery', $image->hashName());

        $upload = DestinationGallery::create([
            'destination_id' => $request->destination_id,
            'image' => $image->hashName()
        ]);

        if($upload){
            return back()->with('success', 'Upload Foto Berhasil');
        }else{
            return back()->with('error', 'Upload Foto Gagal');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(DestinationGallery $gallery)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(DestinationGallery $gallery)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, DestinationGallery $gallery)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(DestinationGallery $gallery)
    {
        Storage::delete('public/gallery/'.$gallery->image);
        $gallery->delete();
        return back()->with('success', 'Hapus Foto Berhasil');
    }
}
