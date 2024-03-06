<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Destination;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class DestinationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Destinasi',
            'destinations' => Destination::where('category_id', '!=', '1')->orderBy('id', 'desc')->get()
        ];
        return view('admin.destinations.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Destinasi',
            'categories' => Category::where('id', '!=', 1)->get()
        ];

        return view('admin.destinations.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'alamat' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public/destinations', $foto->hashName());

        if ($request->start == null || $request->end == null) {
            $mergeHours = null;
        }else{
            $mergeHours = $request->start . ' - ' . $request->end;
        }

        if($request->harga_tiket == null){
            $harga = 0;
        }else{
            $harga = $request->harga_tiket;
        }
       

        $destination = Destination::create([
            'name' => $request->nama,
            'category_id' => $request->kategori,
            'user_id' => auth()->user()->id,
            'description' => $request->deskripsi,
            'address' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $foto->hashName(),
            'opening_hours' => $mergeHours,
            'ticket_price' => $harga,
        ]);

        if ($destination) {
            return redirect()->route('destinations.index')->with('success', 'Destinasi baru ditambahkan!');
        }else{
            return redirect()->route('destinations.create')->with('error', 'Destinasi gagal ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Destination $destination)
    {
        $data = [
            'title' => 'Detail Destinasi',
            'destination' => $destination
        ];
        return view('admin.destinations._detail', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Destination $destination)
    {
        $data = [
            'title' => 'Edit Destinasi',
            'destination' => $destination,
            'categories' => Category::where('id', '!=', 1)->get()
        ];
        return view('admin.destinations.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Destination $destination)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'alamat' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->start == null || $request->end == null) {
            $mergeHours = null;
        }else{
            $mergeHours = $request->start . ' - ' . $request->end;
        }

        if($request->harga_tiket == null){
            $harga = 0;
        }else{
            $harga = $request->harga_tiket;
        }

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/destinations', $image->hashName());

            if ($destination->image) {
                Storage::delete('public/destinations/'.$destination->image);
            }

            $destination->update([
                'name' => $request->nama,
                'category_id' => $request->kategori,
                'description' => $request->deskripsi,
                'address' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image' => $image->hashName(),
                'opening_hours' => $mergeHours,
                'ticket_price' => $harga,
            ]);
        }else{
            $destination->update([
                'name' => $request->nama,
                'category_id' => $request->kategori,
                'description' => $request->deskripsi,
                'address' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'opening_hours' => $mergeHours,
                'ticket_price' => $harga,
            ]);
        }
        if ($destination) {
            return redirect()->route('destinations.index')->with('success', 'Destinasi baru diubah!');
        }else{
            return redirect()->route('destinations.edit', $destination->id)->with('error', 'Destinasi gagal diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Destination $destination)
    {
        if ($destination->image) {
            Storage::delete('public/destinations/'.$destination->image);
        }
        $destination->delete();
        return redirect()->route('destinations.index')->with('success', 'Destinasi berhasil di hapus!');
    }

    public function galeri(Destination $destination)
    {
        $data = [
            'destination' => $destination
        ];
        return view('admin.destinations._tabel_gallery', $data);
    }

    public function penginapanIndex()
    {
        $data = [
            'title' => 'Penginapan',
            'destinations' => Destination::where('category_id', 1)->orderBy('id', 'desc')->get()
        ];
        return view('admin.penginapan.index', $data);
    }

    public function penginapanCreate()
    {
        $data = [
            'title' => 'Penginapan',
        ];
        return view('admin.penginapan.create', $data);
    }

    public function penginapanStore(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'alamat' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public/destinations', $foto->hashName());

        if ($request->start == null || $request->end == null) {
            $mergeHours = null;
        }else{
            $mergeHours = $request->start . ' - ' . $request->end;
        }

        if($request->harga_tiket == null){
            $harga = 0;
        }else{
            $harga = $request->harga_tiket;
        }
       

        $destination = Destination::create([
            'name' => $request->nama,
            'category_id' => $request->kategori,
            'user_id' => auth()->user()->id,
            'description' => $request->deskripsi,
            'address' => $request->alamat,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'image' => $foto->hashName(),
            'opening_hours' => $mergeHours,
            'ticket_price' => $harga,
        ]);

        if ($destination) {
            return redirect()->route('penginapan.index')->with('success', 'Penginapan baru ditambahkan!');
        }else{
            return redirect()->route('penginapan.create')->with('error', 'Penginapan gagal ditambahkan!');
        }
    }

    public function penginapanEdit(Destination $destination)
    {
        $data = [
            'title' => 'Penginapan',
            'destination' => $destination
        ];
        return view('admin.penginapan.edit', $data);
    }

    public function penginapanUpdate(Request $request, Destination $destination)
    {
        $request->validate([
            'nama' => 'required',
            'kategori' => 'required',
            'alamat' => 'required',
            'longitude' => 'required',
            'latitude' => 'required',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        if ($request->start == null || $request->end == null) {
            $mergeHours = null;
        }else{
            $mergeHours = $request->start . ' - ' . $request->end;
        }

        if($request->harga_tiket == null){
            $harga = 0;
        }else{
            $harga = $request->harga_tiket;
        }

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/destinations', $image->hashName());

            if ($destination->image) {
                Storage::delete('public/destinations/'.$destination->image);
            }

            $destination->update([
                'name' => $request->nama,
                'category_id' => $request->kategori,
                'description' => $request->deskripsi,
                'address' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image' => $image->hashName(),
                'opening_hours' => $mergeHours,
                'ticket_price' => $harga,
            ]);
        }else{
            $destination->update([
                'name' => $request->nama,
                'category_id' => $request->kategori,
                'description' => $request->deskripsi,
                'address' => $request->alamat,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'opening_hours' => $mergeHours,
                'ticket_price' => $harga,
            ]);
        }
        if ($destination) {
            return redirect()->route('penginapan.index')->with('success', 'Destinasi baru diubah!');
        }else{
            return redirect()->route('penginapan.edit', $destination->id)->with('error', 'Destinasi gagal diubah!');
        }
    }
}
