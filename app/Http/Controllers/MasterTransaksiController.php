<?php

namespace App\Http\Controllers;

use App\Models\PembayaranModel;
use Illuminate\Http\Request;

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
