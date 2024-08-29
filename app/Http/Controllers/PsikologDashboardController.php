<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\KonsultasiModel;
use App\Models\PembayaranModel;
use App\Models\ZoomMeeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsikologDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psikologId = Auth::guard('psikolog')->user()->id;

        $totalArtikel = ArticleModel::where('psikolog_id', $psikologId)->count();
        $totalArtikelMonth = ArticleModel::whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $totalJadwal = KonsultasiModel::where('psikolog_id', $psikologId)
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $totalJadwalDay = KonsultasiModel::where('psikolog_id', $psikologId)
            ->whereDate('created_at', Carbon::today())
            ->count();
        $allMeeting = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $psikologId);
        })->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->count();
        $meetingToday = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $psikologId);
        })->whereDate('created_at', Carbon::today())->count();

        $revenueByMonth = PembayaranModel::where('status', 'success')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereHas('konsultasi', function ($query) use ($psikologId) {
                $query->where('psikolog_id', $psikologId);
            })
            ->selectRaw('MONTH(created_at) as month, SUM(nominal) as total')
            ->groupBy('month')
            ->pluck('total', 'month')
            ->toArray();

        $monthlyRevenue = [];
        for ($i = 1; $i <= 12; $i++) {
            $monthlyRevenue[$i] = $revenueByMonth[$i] ?? 0;
        }

        $totalAnnualRevenue = array_sum($monthlyRevenue);

        $totalMonthRevenue = PembayaranModel::where('status', 'success')
            ->whereYear('created_at', Carbon::now()->year)
            ->whereMonth('created_at', Carbon::now()->month)
            ->whereHas('konsultasi', function ($query) use ($psikologId) {
                $query->where('psikolog_id', $psikologId);
            })
            ->sum('nominal');

        $upcomingMeetings = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('mahasiswa_id', $psikologId);
        })
            ->where('start_time', '>', Carbon::now())
            ->orderBy('start_time', 'asc')
            ->take(3)
            ->get();

        $passedMeetings = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('mahasiswa_id', $psikologId);
        })
            ->where('start_time', '<', Carbon::now())
            ->orderBy('start_time', 'desc')
            ->take(3)
            ->get();

        $popularArtikel = ArticleModel::with(['kategoriArtikels', 'tagArtikels', 'comments'])
            ->where('psikolog_id', $psikologId)
            ->where('status', 'accepted')
            ->orderBy('updated_at', 'desc')
            ->get();

        return view('pages.psikolog.dashboard.dashboard', compact('totalArtikel', 'totalArtikelMonth', 'totalJadwal',
            'totalJadwalDay', 'allMeeting', 'meetingToday', 'monthlyRevenue', 'totalAnnualRevenue', 'totalMonthRevenue', 'upcomingMeetings', 'passedMeetings',
            'popularArtikel'
        ));
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
