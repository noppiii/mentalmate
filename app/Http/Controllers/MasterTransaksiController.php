<?php

namespace App\Http\Controllers;

use App\Models\PembayaranModel;
use Couchbase\QueryException;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterTransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allTransaksi = PembayaranModel::all();
        $cancelTransaksi = PembayaranModel::where('status', 'cancel')->count();
        $pendingTransaksi = PembayaranModel::where('status', 'pending')->count();
        $successTransaksi = PembayaranModel::where('status', 'success')->count();
        return view('pages.admin.transaksi.index', compact('allTransaksi', 'cancelTransaksi', 'pendingTransaksi','successTransaksi'));
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
        try {
            $transaksi = PembayaranModel::where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('transaksi.index')->with('error_message_not_found', 'Data transaksi tidak ditemukan');
        }

        $data = $request->all();
        try {
            $transaksi->status = $data['status'];

            if ($transaksi->isDirty()) {
                $transaksi->save();
            }

            Session::flash('success_message_update', 'Data status transaksi berhasil diperbarui');
            return redirect()->route('transaksi.index');
        } catch (QueryException $e) {
            // Handle the integrity constraint violation exception (duplicate entry)
            if ($e->getCode() === 23000) {
                // Duplicate entry error
                $errorMessage = 'Upppsss Terjadi Kesalahan Silahkan Coba Lagi.';
            } else {
                // Other database-related errors
                $errorMessage = 'Upppsss Terjadi Kesalahan Silahkan Coba Lagi.';
            }

            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
