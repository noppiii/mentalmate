<?php

namespace App\Http\Controllers;

use App\Models\BidangPsikologModel;
use App\Models\KonsultasiModel;
use App\Models\PembayaranModel;
use App\Models\PsikologModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

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
        $request->validate([
            'nama' => 'required|string',
            'email' => 'required|email',
            'nomor_telepon' => 'required|string|max:20',
            'tanggal' => 'required|date',
            'psikolog_id' => 'required',
            'harga_konsultasi' => 'required|numeric',
            'deskripsi' => 'required|string',
            'metode_pembayaran' => 'required|string', 
        ]);

        try {
            DB::beginTransaction();

            $konsultasi = new KonsultasiModel();
            $konsultasi->nama = $request->nama;
            $konsultasi->email = $request->email;
            $konsultasi->nomor_telepon = $request->nomor_telepon;
            $konsultasi->tanggal = $request->tanggal;
            $konsultasi->psikolog_id = $request->psikolog_id;
            $konsultasi->mahasiswa_id = Auth::guard('mahasiswa')->user()->id;
            $konsultasi->deskripsi = $request->deskripsi;
            $konsultasi->save();

            $pembayaran = new PembayaranModel();
            $pembayaran->nominal = $request->harga_konsultasi;
            $pembayaran->konsultasi_id = $konsultasi->id;
            $pembayaran->metode_pembayaran = $request->metode_pembayaran;
            $pembayaran->status = 'pending';
            $pembayaran->save();

            DB::commit();

            return redirect()->back()->with('success_message_create', 'Konsultasi berhasil disimpan!');
        } catch (\Exception $e) {
            DB::rollBack();
            return redirect()->back()->with('error_message_update_details', 'Terjadi kesalahan saat menyimpan konsultasi. Silakan coba lagi.');
        }
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