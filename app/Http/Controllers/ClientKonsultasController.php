<?php

namespace App\Http\Controllers;

use App\Models\BidangPsikologModel;
use App\Models\PsikologModel;
use Illuminate\Http\Request;

class ClientKonsultasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $bidangPsikolog = BidangPsikologModel::all();
        return view('pages.client.konsultasi.index', compact('bidangPsikolog'));
    }

    public function getPsikologByBidang(Request $request, $bidangId)
    {
        $psikologs = PsikologModel::whereHas('detailPsikologs.bidangPsikologs', function ($query) use ($bidangId) {
            $query->where('bidang_psikolog_id', $bidangId);
        })->get();

        return response()->json($psikologs);
    }

    public function getPsikologDetail($psikologId)
    {
        $psikolog = PsikologModel::with('detailPsikologs')->find($psikologId);

        if ($psikolog) {
            // Mengakses harga_konsultasi dari relasi detailPsikologs
            $detailPsikolog = $psikolog->detailPsikologs->first(); // Mengambil elemen pertama
            $biayaKonsultasi = $detailPsikolog ? $detailPsikolog->harga_konsultasi : 0;

            return response()->json([
                'harga_konsultasi' => $biayaKonsultasi,
            ]);
        }

        return response()->json(['harga_konsultasi' => 0]);
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