<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Kategori',
            'categories' => Category::where('id', '!=', 1)->orderBy('id', 'desc')->get()
        ];

        return view('admin.category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Nama harus diisi.'
            ]
        );

        $check = Category::create([
            'name' => $request->name,
            'slug' => $this->generateSlug($request->name)
        ]);

        if ($check) {
            return redirect()->back()->with('success', 'Kategori ditambahkan');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return response()->json($category);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Category $category)
    {
        $request->validate(
            [
                'name' => 'required'
            ],
            [
                'name.required' => 'Nama harus diisi.'
            ]
        );

        $check = $category->update([
            'name' => $request->name,
            'slug' => $this->generateSlug($request->name)
        ]);

        if ($check) {
            return redirect()->back()->with('success', 'Kategori diupdate');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        $check = $category->delete();
        
        if ($check) {
            return redirect()->back()->with('success', 'Kategori dihapus');
        } else {
            return redirect()->back()->with('error', 'Kategori gagal dihapus');
        }
    }

    public function generateSlug($string)
    {
        $slug = Str::slug($string, '-');
        return $slug;
    }
}
