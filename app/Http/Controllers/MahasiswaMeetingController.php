<?php

namespace App\Http\Controllers;

use App\Models\ZoomMeeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaMeetingController extends Controller
{
    public function index()
    {
        $mahasiswaId = Auth::guard('mahasiswa')->user()->id;

        $allMeeting = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('mahasiswa_id', $mahasiswaId);
        })->get();
        // dd(ZoomMeeting::all());
        $countMeeting = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('mahasiswa_id', $mahasiswaId);
        })->count();
        $upcomingMeetingsCount = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('mahasiswa_id', $mahasiswaId);
        })
        ->where('start_time', '>', Carbon::now())
        ->count();
        $passedMeetingsCount = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($mahasiswaId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('mahasiswa_id', $mahasiswaId);
        })
        ->where('start_time', '<', Carbon::now())
        ->count();
        return view('pages.mahasiswa.meeting.index', compact('allMeeting', 'countMeeting', 'upcomingMeetingsCount', 'passedMeetingsCount'));
    }
}