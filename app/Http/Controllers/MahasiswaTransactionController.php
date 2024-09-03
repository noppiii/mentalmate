<?php

namespace App\Http\Controllers;

use App\Models\PembayaranModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaTransactionController extends Controller
{
    public  function index()
    {
        $mahasiswaId = Auth::guard('mahasiswa')->user()->id;
        $allTransactions = PembayaranModel::whereHas('konsultasi', function ($query) use ($mahasiswaId) {
            $query->where('mahasiswa_id', $mahasiswaId);
        })
            ->get();
        $pendingTransactions = PembayaranModel::where('status', 'pending')
            ->whereHas('konsultasi', function ($query) use ($mahasiswaId) {
                $query->where('mahasiswa_id', $mahasiswaId);
            })
            ->count();
        $successTransactions = PembayaranModel::where('status', 'success')
            ->whereHas('konsultasi', function ($query) use ($mahasiswaId) {
                $query->where('mahasiswa_id', $mahasiswaId);
            })
            ->count();
        $cancelTransactions = PembayaranModel::where('status', 'cancel')
            ->whereHas('konsultasi', function ($query) use ($mahasiswaId) {
                $query->where('mahasiswa_id', $mahasiswaId);
            })
            ->count();
//        dd($allTransactions);
        return view('pages.mahasiswa.transaksi.index', compact('allTransactions','pendingTransactions', 'successTransactions','cancelTransactions'));
    }
}
