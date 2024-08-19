<?php

namespace App\Http\Controllers;

use App\Models\PsikologModel;
use Illuminate\Http\Request;

class MasterPsikologFavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psikologs = PsikologModel::with([
            'psikologFavorits',
            'detailPsikologs.bidangPsikologs',
            'detailPsikologs.metodeKonsultasis'
        ])->get();

        foreach ($psikologs as $psikolog) {
            $psikolog->total_favorit = $psikolog->psikologFavorits()->count();
            $psikolog->total_bidang = $psikolog->detailPsikologs
                ->flatMap(fn($detail) => $detail->bidangPsikologs)
                ->unique('id')
                ->count();
            $psikolog->total_metode = $psikolog->detailPsikologs
                ->flatMap(fn($detail) => $detail->metodeKonsultasis)
                ->unique('id')
                ->count();
        }

        return view('pages.admin.psikolog-favorit.index', compact('psikologs'));
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
