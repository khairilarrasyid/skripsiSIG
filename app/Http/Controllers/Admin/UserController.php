<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' => 'Users',
            'users' => User::all()
        ];

        return view('admin.users.index', $data);
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
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::create([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        if ($user) {
            return redirect()->back()->with('success', 'User berhasil ditambahkan');
        }else{
            return redirect()->back()->with('error', 'User gagal ditambahkan');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return response()->json($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:8|confirmed',
        ]);

        $check = $user->update([
            'name' => $request->nama,
            'email' => $request->email,
            'password' => $request->password ? Hash::make($request->password) : $user->password
        ]);

        if ($check) {
            return redirect()->back()->with('success', 'User berhasil diupdate');
        }else{
            return redirect()->back()->with('error', 'User gagal diupdate');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $check = $user->delete();

        if ($check) {
            return redirect()->back()->with('success', 'User dihapus');
        }else{
            return redirect()->back()->with('error', 'User gagal dihapus');
        }
    }

    public function profile()
    {
        $user = auth()->user();
        return view('admin.users.profile', [
            'title' => 'Profile',
            'user' => $user
        ]);
    }
    
    public function updateProfile(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'email' => 'required|email|unique:users,email,' . auth()->user()->id
        ]);

        $user = User::find(auth()->user()->id);
        $user->name = $request->nama;
        $user->email = $request->email;
        $user->save();

        return redirect()->back()->with('profile', 'Profile Berhasil Diubah');
    }

    public function updatePassword(Request $request)
    {
        $request->validate([
            'password_lama' => 'required',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::find(auth()->user()->id);

        if (Hash::check($request->password_lama, $user->password)) {
            $user->password = Hash::make($request->password);
            $user->save();

            if ($user) {
                return redirect()->back()->with('password', 'Password Berhasil Diubah');
            }else{
                return redirect()->back()->with('password', 'Password gagal diubah');
            }
        }else{
            return redirect()->back()->with('error', 'Password lama salah');
        }
    }
}
