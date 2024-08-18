<?php

namespace App\Http\Controllers;

use App\Models\UlasanModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAboutUsController extends Controller
{
    public function index()
    {
        return view('pages.client.about.index');
    }

    public function submitRating(Request $request)
    {
        $validated = $request->validate([
            'rating' => 'required|integer|min:0|max:5',
            'isi' => 'nullable|string',
        ]);

        UlasanModel::create([
            'mahasiswa_id' => Auth::guard('mahasiswa')->user()->id, 
            'rating' => $validated['rating'],
            'isi' => $validated['isi'],
        ]);

        return redirect()->back()->with('success_message_create', 'Terimakasih atas ulasan yang anda berikan!');
    }
}