<?php

namespace App\Http\Controllers;

use App\Models\AdminModel;
use App\Models\ArticleModel;
use App\Models\BidangPsikologModel;
use App\Models\KonsultasiModel;
use App\Models\MahasiswaModel;
use App\Models\PembayaranModel;
use App\Models\PsikologModel;
use App\Models\TransaksiModel;
use App\Models\UlasanModel;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $bidangPsikologTerbanyakChart = BidangPsikologModel::select('bidang_psikologs.name', DB::raw('COUNT(psikologs.id) as psikolog_count'))
            ->leftJoin('bidang_psikolog_mappings', 'bidang_psikologs.id', '=', 'bidang_psikolog_mappings.bidang_psikolog_id')
            ->leftJoin('detail_psikologs', 'bidang_psikolog_mappings.detail_psikolog_id', '=', 'detail_psikologs.id')
            ->leftJoin('psikologs', 'detail_psikologs.psikolog_id', '=', 'psikologs.id')
            ->groupBy('bidang_psikologs.id', 'bidang_psikologs.name')
            ->orderBy('psikolog_count', 'DESC')
            ->get();

        $metodeKonsultasiTerbanyakChart = KonsultasiModel::select('metode_konsultasis.jenis_metode_konsultasi', DB::raw('COUNT(konsultasis.id) as konsultasi_count'))
            ->leftJoin('detail_psikologs', 'konsultasis.psikolog_id', '=', 'detail_psikologs.psikolog_id')
            ->leftJoin('metode_konsultasis', 'detail_psikologs.metode_konsultasi_id', '=', 'metode_konsultasis.id')
            ->whereMonth('konsultasis.tanggal', Carbon::now()->month)
            ->whereYear('konsultasis.tanggal', Carbon::now()->year)
            ->groupBy('metode_konsultasis.id', 'metode_konsultasis.jenis_metode_konsultasi')
            ->orderBy('konsultasi_count', 'DESC')
            ->limit(5)
            ->get();

        $topMetodeNominalChart = KonsultasiModel::select('metode_konsultasis.jenis_metode_konsultasi', DB::raw('SUM(pembayarans.nominal) as total_nominal'))
            ->leftJoin('detail_psikologs', 'konsultasis.psikolog_id', '=', 'detail_psikologs.psikolog_id')
            ->leftJoin('pembayarans', 'konsultasis.id', '=', 'pembayarans.konsultasi_id')
            ->leftJoin('metode_konsultasis', 'detail_psikologs.metode_konsultasi_id', '=', 'metode_konsultasis.id')
            ->whereMonth('konsultasis.tanggal', Carbon::now()->month)
            ->whereYear('konsultasis.tanggal', Carbon::now()->year)
            ->groupBy('metode_konsultasis.id', 'metode_konsultasis.jenis_metode_konsultasi')
            ->orderBy('total_nominal', 'DESC')
            ->limit(5)
            ->get();

//        dd($topMetodeNominalChart);

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

        $totalTransaksi = PembayaranModel::sum('nominal');
        $cancelTransaksi = PembayaranModel::where('status', 'cancel')->count();
        $pendingTransaksi = PembayaranModel::where('status', 'pending')->count();
        $successTransaksi = PembayaranModel::where('status', 'success')->count();
        $totalTransaksiMonth = PembayaranModel::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)->sum('nominal');

        return view('pages.admin.dashboard.dashboard', compact('months', 'adminData', 'psikologData', 'mahasiswaData',
            'rejectedData', 'pendingData', 'acceptedData', 'upcomingConsultations', 'pastConsultations', 'bidangPsikologTerbanyakChart', 'totalUser', 'totalUserMonth', 'totalArtikel',
            'totalArtikelMonth', 'totalKonsultasi', 'totalKonsultasiMonth', 'totalUlasan', 'totalUlasanMonth', 'reviewData', 'totalTransaksi', 'cancelTransaksi', 'pendingTransaksi', 'successTransaksi',
            'metodeKonsultasiTerbanyakChart', 'totalTransaksiMonth', 'topMetodeNominalChart'));
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
