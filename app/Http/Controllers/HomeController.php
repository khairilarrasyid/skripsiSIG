<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Destination;
use App\Models\Category;
use App\Models\TourGuide;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    public function index()
    {
        $data = [
            'title' => 'Home Page',
            'rekomendasi' => Destination::orderByRaw('RAND()')->where('category_id', '!=', 1)->take(3)->get(),
            'penginapan' => Destination::orderByRaw('RAND()')->where('category_id', '=', 1)->take(3)->get(),
            'terbaru' => Destination::orderBy('id', 'desc')->where('category_id', '!=', 1)->take(5)->get()
        ];

        return view('landing-page', $data);
    }

    public function peta()
    {
        $data = [
            'title' => 'Peta Sebaran Destinasi Wisata',
            'categorys' => Category::all()
        ];
        
        return view('peta', $data);
    }

    public function fetchPeta(Request $request)
    {
        $keyword = $request->query('keyword');
        $kategori = $request->query('category');

        $modelDestinasi = Destination::select('destinations.*')->with('category');

        if($keyword != null){
            $modelDestinasi = $modelDestinasi->where('destinations.name', 'like', '%' . $keyword . '%');
        }

        if($kategori != null){
            $modelDestinasi = $modelDestinasi->where('destinations.category_id', '=', $kategori);
        }

        $modelDestinasi = $modelDestinasi->orderBy('id', 'desc');
        $resultModelDestinasi = $modelDestinasi->get();
        $newDataDestinasi = [];

        foreach($resultModelDestinasi as $row){
            $thumbnailUrl = Storage::url('destinations/' . $row->image);
            if($row->category_id == 1){
                $urlDetail = route('penginapan.detail', ['destination' => $row->id]);
            }else{
                $urlDetail = route('peta.detail', ['destination' => $row->id]);
            }
           
            array_push($newDataDestinasi, [
                'id' => $row->id,
                'title' => $row->name,
                'price' => $row->ticket_price,
                'category_id' => $row->category_id,
                'url' => $urlDetail,
                'address' => $row->address,
                'latitude' => $row->latitude,
                'longitude' => $row->longitude,
                'marker_image' => $thumbnailUrl,
                'jamOperasional' => $row->opening_hours,
                'kategori'  => $row->category->name,
                'additional_info' => [
                    [
                        'title' => 'Jam Operasional',
                        'value' => $row->opening_hours
                    ],
                    [
                        'title' => 'Kategori',
                        'value' => $row->category->name
                    ]
                ]
            ]);
        }

        return response()->json($newDataDestinasi);
    }

    public function petaDetail(Destination $destination)
    {
        $data = [
            'title' => 'Peta Sebaran Destinasi Wisata',
            'destination' => $destination,
            'lainnya' => Destination::orderByRaw('RAND()')->take(3)->get()
        ];
        
        return view('peta-detail', $data);
    }

    public function wisata(Request $request)
    {

        $keyword = $request->query('keyword');
        $kategori = $request->query('category');

        $modelDestinasi = Destination::select('destinations.*')->with('category');

        if($keyword != null){
            $modelDestinasi = $modelDestinasi->where('destinations.name', 'like', '%' . $keyword . '%');
        }

        if($kategori != null){
            $modelDestinasi = $modelDestinasi->where('destinations.category_id', '=', $kategori);
        }

        $modelDestinasi = $modelDestinasi->orderBy('id', 'desc');
        $resultModelDestinasi = $modelDestinasi->where('category_id', '!=', 1)->paginate(10)->appends([
            'keyword' => $keyword,
            'category' => $kategori
        ]);

        $data = [
            'title' => 'Destinasi Wisata',
            'destinations' => $resultModelDestinasi,
            'categories' => Category::where('id', '!=', 1)->get(),
            'keyword' => $keyword,
            'category' => $kategori
        ];
        
        return view('wisata', $data);
    }

    public function tourGuide(Request $request)
    {
        $keyword = $request->query('keyword');

        $modelTourGuide = TourGuide::select('tour_guides.*');

        if($keyword != null){
            $modelTourGuide = $modelTourGuide->where('tour_guides.name', 'like', '%' . $keyword . '%');
        }

        $modelTourGuide = $modelTourGuide->orderBy('id', 'desc');
        $resultModelTourGuide = $modelTourGuide->paginate(10)->appends([
            'keyword' => $keyword,
        ]);

        $data = [
            'title' => 'Tour Guide',
            'keyword' => $keyword,
            'tourGuides' => $resultModelTourGuide
        ];
        
        return view('tour-guide', $data);
    }

    public function tourGuideDetail(TourGuide $tour_guide)
    {
        $data = [
            'title' => 'Tour Guide',
            'tour_guide' => $tour_guide
        ];
        
        return view('tour-guide-detail', $data);
    }

    public function penginapan(Request $request)
    {
        $keyword = $request->query('keyword');

        $modelPenginapan = Destination::select('destinations.*')->with('category');

        if($keyword != null){
            $modelDestinasi = $modelPenginapan->where('destinations.name', 'like', '%' . $keyword . '%');
        }

        $modelPenginapan = $modelPenginapan->orderBy('id', 'desc');
        $resultModelPenginapan = $modelPenginapan->where('category_id', '=', 1)->paginate(10)->appends([
            'keyword' => $keyword
        ]);

        $data = [
            'title' => 'Penginapan',
            'penginapans' => $resultModelPenginapan,
            'keyword' => $keyword,
        ];
        
        return view('penginapan', $data);
    }

    public function penginapanDetail(Destination $destination)
    {
        $data = [
            'title' => 'Penginapan',
            'penginapan' => $destination,
            'lainnya' => Destination::orderByRaw('RAND()')->where('category_id', '=', 1)->take(3)->get()
        ];
        
        return view('penginapan-detail', $data);
    }
}
