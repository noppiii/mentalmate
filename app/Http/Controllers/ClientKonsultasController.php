<?php

namespace App\Http\Controllers;

use App\Models\BidangPsikologModel;
use App\Models\KonsultasiModel;
use App\Models\PembayaranModel;
use App\Models\PsikologModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Midtrans\Config;
use Midtrans\Snap;

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
        ]);

        DB::beginTransaction();

        try {
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

            Config::$serverKey = config('services.midtrans.serverKey');
            Config::$isProduction = config('services.midtrans.isProduction');
            Config::$isSanitized = config('services.midtrans.isSanitized');
            Config::$is3ds = config('services.midtrans.is3ds');

            $transactionDetails = [
                'order_id' => $pembayaran->id,
                'gross_amount' => $request->harga_konsultasi,
            ];

            $itemDetails = [
                [
                    'id' => $konsultasi->id,
                    'price' => $request->harga_konsultasi,
                    'quantity' => 1,
                    'name' => 'Konsultasi dengan ' . $konsultasi->nama,
                ],
            ];

            $customerDetails = [
                'first_name' => $request->nama,
                'email' => $request->email,
                'phone' => $request->nomor_telepon,
            ];

            $params = [
                'transaction_details' => $transactionDetails,
                'item_details' => $itemDetails,
                'customer_details' => $customerDetails,
                'enabled_payments' => [$request->metode_pembayaran],
            ];

            $snapToken = Snap::getSnapToken($params);

            DB::commit();

            return redirect()->route('client.paymentPage', ['snapToken' => $snapToken]);

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
