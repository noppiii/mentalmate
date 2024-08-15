<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsikologJadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psikolog = Auth::guard('psikolog')->user();

        $bidangPsikologs = $psikolog->detailPsikologs->flatMap(function ($detail) {
            return $detail->bidangPsikologs->pluck('name');
        })->unique()->toArray();

        $jadwalKonsultasi = KonsultasiModel::with(['psikolog.detailPsikologs.bidangPsikologs', 'zoomMeeting'])
        ->where('psikolog_id', $psikolog->id)
        ->get();

        return view('pages.psikolog.jadwal.index', compact('bidangPsikologs', 'jadwalKonsultasi'));
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