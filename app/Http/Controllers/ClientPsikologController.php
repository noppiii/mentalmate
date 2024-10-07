<?php

namespace App\Http\Controllers;

use App\Models\PsikologFavoritModel;
use App\Models\PsikologModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientPsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginatePsikolog = PsikologModel::orderBy('created_at', 'desc')->paginate(12);

        $mahasiswaId = Auth::guard('mahasiswa')->check() ? Auth::guard('mahasiswa')->user()->id : null;

        foreach ($paginatePsikolog as $psikolog) {
            $psikolog->isFavorite = $mahasiswaId ?
                PsikologFavoritModel::where('mahasiswa_id', $mahasiswaId)
                    ->where('psikolog_id', $psikolog->id)
                    ->exists()
                : false;
        }

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

    public function addFavoritePsikolog($id) {
        $mahasiswaId = Auth::guard('mahasiswa')->user()->id;

        if($mahasiswaId == null) {
            return back()->with('error_message_not_found', 'Psikolog gagal ditambahkan ke favorite.');
        }

        $exists = PsikologFavoritModel::where('mahasiswa_id', $mahasiswaId)
            ->where('psikolog_id', $id)
            ->exists();

        if ($exists) {
            PsikologFavoritModel::where('mahasiswa_id', $mahasiswaId)
                ->where('psikolog_id', $id)
                ->delete();
            return back()->with('success_message_create', 'Psikolog telah dihapus dari favorit.');
        } else {
            PsikologFavoritModel::create([
                'mahasiswa_id' => $mahasiswaId,
                'psikolog_id' => $id,
            ]);
            return back()->with('success_message_create', 'Psikolog telah ditambahkan ke favorit.');
        }
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
