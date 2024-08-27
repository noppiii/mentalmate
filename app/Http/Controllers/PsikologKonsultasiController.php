<?php

namespace App\Http\Controllers;

use App\Events\MessageSentEvent;
use App\Models\MahasiswaModel;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsikologKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($receiverId, $receiverType)
    {
        $senderId = Auth::guard('psikolog')->user()->id;
        $detailMahasiswa = MahasiswaModel::where('id', $receiverId)->first();
        $receiverId = $receiverId;

        $messages = Message::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->orWhere('sender_id', $receiverId);
        })
            ->where(function ($query) use ($senderId, $receiverId) {
                $query->where('receiver_id', $senderId)
                    ->orWhere('receiver_id', $receiverId);
            })
            ->whereIn('sender_type', ['Mahasiswa', 'Psikolog'])
            ->whereIn('receiver_type', ['PsikologModel', 'MahasiswaModel'])
            ->orderBy('created_at', 'asc')
            ->get();
            // dd($messages);

        $mahasiswa = MahasiswaModel::all();

        return view('pages.psikolog.konsultasi.index', compact('receiverId', 'receiverType', 'messages', 'mahasiswa', 'detailMahasiswa'));
    }

    public function getMessages($receiverId, $receiverType)
    {
        $senderId = Auth::guard('psikolog')->user()->id;

        $messages = Message::where(function ($query) use ($senderId, $receiverId) {
            $query->where('sender_id', $senderId)
                ->orWhere('sender_id', $receiverId);
        })
            ->where(function ($query) use ($senderId, $receiverId) {
                $query->where('receiver_id', $senderId)
                    ->orWhere('receiver_id', $receiverId);
            })
            ->whereIn('sender_type', ['Mahasiswa', 'Psikolog'])
            ->whereIn('receiver_type', ['PsikologModel', 'MahasiswaModel'])
            ->orderBy('created_at', 'asc')
            ->get();

        return response()->json($messages);
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
        return response()->json($message);
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
