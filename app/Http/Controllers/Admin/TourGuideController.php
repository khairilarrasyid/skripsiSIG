<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TourGuide;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class TourGuideController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Tour Guide',
            'tourGuides' => TourGuide::all()
        ];

        return view('admin.tour-guide.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data = [
            'title' => 'Tambah Tour Guide',
        ];

        return view('admin.tour-guide.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'required|mimes:jpg,png,jpeg|max:2048',
        ]);

        $foto = $request->file('foto');
        $foto->storeAs('public/tour-guide', $foto->hashName());

        $tourGuide = TourGuide::create([
            'user_id' => auth()->user()->id,
            'name' => $request->nama,
            'email' => $request->email,
            'phone' => $request->phone,
            'address' => $request->alamat,
            'description' => $request->deskripsi,
            'foto' => $foto->hashName(),
        ]);

        if ($tourGuide) {
            return redirect()
                ->route('tour-guides.index')
                ->with('success', 'Tour Guide Berhasil Ditambahkan!');
        } else {
            return redirect()
                ->route('tour-guides.create')
                ->with('error', 'Tour Guide Gagal Ditambahkan!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(TourGuide $tourGuide)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(TourGuide $tourGuide)
    {
        $data = [
            'title' => 'Edit Tour Guide',
            'tourGuide' => $tourGuide
        ];

        return view('admin.tour-guide.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, TourGuide $tourGuide)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required',
            'phone' => 'required',
            'alamat' => 'required',
            'deskripsi' => 'required',
            'foto' => 'nullable|mimes:jpg,png,jpeg|max:2048',
        ]);

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $image->storeAs('public/tour-guide', $image->hashName());

            if ($tourGuide->image) {
                Storage::delete('public/tour-guide/'.$tourGuide->foto);
            }

            $tourGuide->update([
                'name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->alamat,
                'description' => $request->deskripsi,
                'foto' => $image->hashName(),
            ]);
        } else {
            $tourGuide->update([
                'name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->phone,
                'address' => $request->alamat,
                'description' => $request->deskripsi,
            ]);
        }

        if ($tourGuide) {
            return redirect()
                ->route('tour-guides.index')
                ->with('success', 'Tour Guide Berhasil Diubah!');
        } else {
            return redirect()
                ->route('tour-guides.edit', $tourGuide->id)
                ->with('error', 'Tour Guide Gagal Diubah!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TourGuide $tourGuide)
    {
        if ($tourGuide->image) {
            Storage::delete('public/tour-guide/'.$tourGuide->foto);
        }

        $cek = $tourGuide->delete();

        if ($cek) {
            return redirect()
                ->route('tour-guides.index')
                ->with('success', 'Tour Guide Berhasil Dihapus!');
        } else {
            return redirect()
                ->route('tour-guides.index')
                ->with('error', 'Tour Guide Gagal Dihapus!');
        }

    }
}
