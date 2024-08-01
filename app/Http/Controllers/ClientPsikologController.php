<?php

namespace App\Http\Controllers;

use App\Models\PsikologModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ClientPsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginatePsikolog = PsikologModel::orderBy('created_at', 'desc')->paginate(12);
        return view('pages.client.psikolog.index', compact('paginatePsikolog'));
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
    public function show(string $username)
    {
        try {
            // Ganti hyphens dengan spasi untuk pencarian
            $nama = str_replace('-', ' ', $username);

            // Cari psikolog berdasarkan nama
            $psikolog = PsikologModel::where('nama', $nama)->firstOrFail();
            // dd($detailPsikolog);
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->back()->with('error_message_not_found', 'Data psikolog tidak ditemukan');
        }

        return view('pages.client.psikolog.detail', compact('psikolog'));
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