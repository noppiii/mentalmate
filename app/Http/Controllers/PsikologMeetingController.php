<?php

namespace App\Http\Controllers;

use App\Models\KonsultasiModel;
use App\Models\ZoomMeeting;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Jubaer\Zoom\Facades\Zoom;

class PsikologMeetingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // $meeting = Zoom::deleteMeeting(88261116768);
        // dd($meeting);
        // $meetings = Zoom::getAllMeeting();
        // dd($meetings);
        $psikologId = Auth::guard('psikolog')->user()->id;

        $allMeeting = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $psikologId);
        })->get();
        $countMeeting = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $psikologId);
        })->count();
        $upcomingMeetingsCount = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $psikologId);
        })
        ->where('start_time', '>', Carbon::now())
        ->count();
        $passedMeetingsCount = ZoomMeeting::whereIn('konsultasi_id', function ($query) use ($psikologId) {
            $query->select('id')
                ->from('konsultasis')
                ->where('psikolog_id', $psikologId);
        })
        ->where('start_time', '<', Carbon::now())
        ->count();
        // dd($upcomingMeetingsCount);
        return view('pages.psikolog.meeting.index', compact('allMeeting', 'countMeeting', 'upcomingMeetingsCount', 'passedMeetingsCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function store(Request $request, $konsultasiId)
    {
        $konsultasi = KonsultasiModel::findOrFail($konsultasiId);

        $startTime = $konsultasi->tanggal; 

        $meetingData = [
            "agenda" => 'Konsultasi Bersama ' . Auth::guard('psikolog')->user()->nama,
            "topic" => 'Konsultasi Kesehatan',
            "type" => 2,
            "duration" => 60,
            "timezone" => 'Asia/Jakarta', 
            "start_time" => $startTime,
            "password" => '123456',
            "settings" => [
                'join_before_host' => false,
                'host_video' => false,
                'participant_video' => false,
                'mute_upon_entry' => true,
                'waiting_room' => true,
                'audio' => 'both',
                'auto_recording' => 'none',
                'approval_type' => 0,
            ],
        ];

        $response = Zoom::createMeeting($meetingData);

        if ($response['status']) {
            $zoomMeeting = $response['data'];

            $startTimeFormatted = Carbon::parse($zoomMeeting['start_time'])->format('Y-m-d H:i:s');

            $zoomMeetingData = [
                'meeting_id' => $zoomMeeting['id'],
                'topic' => $zoomMeeting['topic'],
                'agenda' => $zoomMeeting['agenda'],
                'link' => $zoomMeeting['join_url'],
                'type' => $zoomMeeting['type'],
                'duration' => $zoomMeeting['duration'],
                'timezone' => $zoomMeeting['timezone'],
                'password' => $zoomMeeting['password'],
                'start_time' => $startTimeFormatted, // Format yang sesuai untuk MySQL
                'template_id' => $zoomMeeting['template_id'] ?? null,
                'pre_schedule' => $zoomMeeting['pre_schedule'],
                'schedule_for' => $zoomMeeting['schedule_for'] ?? null,
                'konsultasi_id' => $konsultasi->id, // Tambahkan konsultasi_id di sini
            ];

            ZoomMeeting::create($zoomMeetingData);

            return redirect()->back()->with('success', 'Zoom meeting berhasil dibuat dan disimpan.');
        } else {
            return redirect()->back()->with('error', 'Gagal membuat Zoom meeting.');
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