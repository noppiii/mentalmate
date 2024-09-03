<?php

namespace App\Http\Controllers;

use App\Models\PembayaranModel;
use App\Models\ZoomMeeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaDashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaId = Auth::guard('mahasiswa')->user()->id;

        $upcomingMeetingsCount = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $mahasiswaId);
        })
            ->where('start_time', '>', Carbon::now())
            ->count();

        $nearestMeeting = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $mahasiswaId);
        })
            ->where('start_time', '>', Carbon::now())
            ->orderBy('start_time', 'asc')
            ->first();

        $pendingTransactions = PembayaranModel::where('status', 'pending')
            ->whereHas('konsultasi', function ($query) use ($mahasiswaId) {
                $query->where('mahasiswa_id', $mahasiswaId);
            })
            ->count();

        $monthlyMeetings = [];
        foreach (range(1, 12) as $month) {
            $startOfMonth = Carbon::create(null, $month)->startOfMonth();
            $endOfMonth = Carbon::create(null, $month)->endOfMonth();

            $passedMeetings = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
                $query->select('id')
                    ->from('konsultasis')
                    ->where('psikolog_id', $mahasiswaId);
            })
                ->whereBetween('start_time', [$startOfMonth, $endOfMonth])
                ->where('start_time', '<', Carbon::now())
                ->count();

            $upcomingMeetings = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
                $query->select('id')
                    ->from('konsultasis')
                    ->where('psikolog_id', $mahasiswaId);
            })
                ->whereBetween('start_time', [$startOfMonth, $endOfMonth])
                ->where('start_time', '>', Carbon::now())
                ->count();

            $monthlyMeetings['passed'][] = $passedMeetings;
            $monthlyMeetings['upcoming'][] = $upcomingMeetings;
        }

        return view('pages.mahasiswa.dashboard.dashboard', compact('upcomingMeetingsCount', 'monthlyMeetings', 'nearestMeeting', 'pendingTransactions'));
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
