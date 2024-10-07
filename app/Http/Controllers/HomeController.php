<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\BannerModel;
use App\Models\BidangPsikologModel;
use App\Models\MahasiswaModel;
use App\Models\UlasanModel;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $newArtikel = ArticleModel::where('status', 'accepted')
        ->orderBy('created_at', 'asc')
            ->take(3)
            ->get();
            // dd($newArtikel);
        $newArtikelSlide = ArticleModel::where('status', 'accepted')
        ->orderBy('created_at', 'desc')
        ->skip(2)
        ->take(6)
        ->get();

        $banners = BannerModel::all();
        $ulasan = UlasanModel::latest()->take(6)->get();
        $bidangPsikolog = BidangPsikologModel::all();
        $consultationCount = MahasiswaModel::has('konsultasis')->count();
        $averageSatisfaction = UlasanModel::average('rating');
        $satisfactionPercentage = $averageSatisfaction ? ($averageSatisfaction / 5) * 100 : 0;
//        dd($consultationCount);

        return view('pages.client.home.home', compact('newArtikel', 'newArtikelSlide', 'ulasan', 'banners', 'bidangPsikolog','consultationCount','satisfactionPercentage'));
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
