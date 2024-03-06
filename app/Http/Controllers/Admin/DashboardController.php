<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Destination;
use App\Models\TourGuide;
use App\Models\DestinationGallery;
class DashboardController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Dashboard',
            'total_pengguna' => User::count(),
            'total_destinasi' => Destination::where('category_id', '!=', 1)->count(),
            'total_penginapan' => Destination::where('category_id', '=', 1)->count(),
            'total_tourguide' => TourGuide::count(),
            'total_galeri' => DestinationGallery::count(),
            'destinasi_terbaru' => Destination::where('category_id', '!=', 1)->orderBy('id', 'desc')->take(5)->get()
        ];

        return view('admin.dashboard', $data);
    }
}
