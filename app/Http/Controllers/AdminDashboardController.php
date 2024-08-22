<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ArticleModel;
use App\Models\KonsultasiModel;
use App\Models\MahasiswaModel;
use App\Models\PsikologModel;
use App\Models\UlasanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use marineusde\LarapexCharts\LarapexChart;

class AdminDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $months = [];
        $adminData = [];
        $psikologData = [];
        $mahasiswaData = [];
        $rejectedData = [];
        $pendingData = [];
        $acceptedData = [];
        $upcomingConsultations = [];
        $pastConsultations = [];
        $reviewData = [];

        for ($i = 2; $i >= 0; $i--) {
            $month = Carbon::now()->subMonths($i)->format('F Y');
            $months[] = $month;

            $adminCount = AdminModel::whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->count();
            $adminData[] = $adminCount;

            $psikologCount = PsikologModel::whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->count();
            $psikologData[] = $psikologCount;

            $mahasiswaCount = MahasiswaModel::whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->count();
            $mahasiswaData[] = $mahasiswaCount;

            $rejectedCount = ArticleModel::whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->where('status', 'rejected')
                ->count();
            $rejectedData[] = $rejectedCount;

            $pendingCount = ArticleModel::whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->where('status', 'pending')
                ->count();
            $pendingData[] = $pendingCount;

            $acceptedCount = ArticleModel::whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->where('status', 'accepted')
                ->count();
            $acceptedData[] = $acceptedCount;

            $upcomingCount = KonsultasiModel::whereYear('tanggal', Carbon::now()->subMonths($i)->year)
                ->whereMonth('tanggal', Carbon::now()->subMonths($i)->month)
                ->where('tanggal', '>', Carbon::now())
                ->count();
            $upcomingConsultations[] = $upcomingCount;

            $pastCount = KonsultasiModel::whereYear('tanggal', Carbon::now()->subMonths($i)->year)
                ->whereMonth('tanggal', Carbon::now()->subMonths($i)->month)
                ->where('tanggal', '<=', Carbon::now())
                ->count();
            $pastConsultations[] = $pastCount;

            $reviewCount = UlasanModel::whereYear('created_at', Carbon::now()->subMonths($i)->year)
                ->whereMonth('created_at', Carbon::now()->subMonths($i)->month)
                ->count();
            $reviewData[] = $reviewCount;
        }

        $totalUser = AdminModel::count() + PsikologModel::count() + MahasiswaModel::count();
        $totalUserMonth = AdminModel::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count()
            + PsikologModel::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count()
            + MahasiswaModel::whereYear('created_at', Carbon::now()->year)
                ->whereMonth('created_at', Carbon::now()->month)
                ->count();

        $totalArtikel = ArticleModel::count();
        $totalArtikelMonth = ArticleModel::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $totalKonsultasi = KonsultasiModel::count();
        $totalKonsultasiMonth = KonsultasiModel::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        $totalUlasan = UlasanModel::count();
        $totalUlasanMonth = UlasanModel::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();

        return view('pages.admin.dashboard.dashboard', compact('months', 'adminData', 'psikologData', 'mahasiswaData',
            'rejectedData', 'pendingData', 'acceptedData', 'upcomingConsultations', 'pastConsultations', 'totalUser', 'totalUserMonth', 'totalArtikel',
            'totalArtikelMonth', 'totalKonsultasi', 'totalKonsultasiMonth', 'totalUlasan', 'totalUlasanMonth', 'reviewData'));
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
