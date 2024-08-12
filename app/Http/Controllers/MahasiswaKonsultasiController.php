<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Models\Message;
use App\Models\PsikologModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($receiverId, $receiverType)
    {
        $allPsikolog = PsikologModel::all();
        $detailPsikolog = PsikologModel::where('id', $receiverId)->first();
        // dd($detailPsikolog);

        $senderId = Auth::guard('mahasiswa')->user()->id;
        $receiverId = $receiverId;

        $messages = Message::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->orWhere('sender_id', $receiverId);
        })
            ->where(function ($query) use ($senderId, $receiverId) {
                $query->where('receiver_id', $senderId)
                    ->orWhere('receiver_id', $receiverId);
            })
            ->whereIn('sender_type', ['Psikolog', 'Mahasiswa'])
            ->whereIn('receiver_type', ['MahasiswaModel', 'PsikologModel'])
            ->orderBy('created_at', 'asc')
            ->get();

        return view('pages.mahasiswa.konsultasi.index', compact('receiverId', 'receiverType', 'allPsikolog', 'messages', 'detailPsikolog'));
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
        // Validate the request
        $validatedData = $request->validate([
            'sender_type' => 'required|string',
            'sender_id' => 'required|integer',
            'receiver_type' => 'required|string',
            'receiver_id' => 'required|integer',
            'content' => 'required|string',
            'reply_id' => 'nullable|integer|exists:messages,id',
        ]);

        // Handle reply_id in a safe manner
        $replyId = $validatedData['reply_id'] ?? null;

        // Create a new message
        $message = Message::create([
            'sender_type' => $validatedData['sender_type'],
            'sender_id' => $validatedData['sender_id'],
            'receiver_type' => $validatedData['receiver_type'],
            'receiver_id' => $validatedData['receiver_id'],
            'content' => $validatedData['content'],
            'reply_id' => $replyId,
        ]);

        // Broadcast the message to others in real-time
        broadcast(new MessageSentEvent($message))->toOthers();

        // Return a response
        return redirect()->back();
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