<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiModel;
use App\Models\ZoomMeeting;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MasterKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allKonsultasi = ZoomMeeting::whereIn('konsultasi_id', function ($query) {
            $query->select('id')
                ->from('konsultasis');
        })->get();
        $countMeeting = ZoomMeeting::whereIn('konsultasi_id', function ($query) {
            $query->select('id')
                ->from('konsultasis');
        })->count();
        $upcomingMeetingsCount = ZoomMeeting::whereIn('konsultasi_id', function ($query) {
            $query->select('id')
                ->from('konsultasis');
        })
            ->where('start_time', '>', Carbon::now())
            ->count();
        $passedMeetingsCount = ZoomMeeting::whereIn('konsultasi_id', function ($query) {
            $query->select('id')
                ->from('konsultasis');
        })
            ->where('start_time', '<', Carbon::now())
            ->count();
        return view('pages.admin.konsultasi.konsultasi', compact('allKonsultasi', 'countMeeting', 'upcomingMeetingsCount', 'passedMeetingsCount'));
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
