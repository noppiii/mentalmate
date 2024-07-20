<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterMahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMahasiswa = MahasiswaModel::all();
        return view('pages.admin.user.mahasiswa.index', compact('allMahasiswa'));
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
        try {
            $mahasiswa = MahasiswaModel::where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('mahasiswa.index')->with('error_message_not_found', 'Data Mahasiswa tidak ditemukan');
        }

        $data = $request->all();
        try {
            $mahasiswa->status = $data['status'];

            if ($mahasiswa->isDirty()) {
                $mahasiswa->save();
            }

            Session::flash('success_message_update', 'Data mahasiswa berhasil diperbarui');
            return redirect()->route('mahasiswa.index');
        } catch (QueryException $e) {
            // Handle the integrity constraint violation exception (duplicate entry)
            if ($e->getCode() === 23000) {
                // Duplicate entry error
                $errorMessage = 'Terdapat data duplikat dari data kami. Silakan masukan yang berbeda.';
            } else {
                // Other database-related errors
                $errorMessage = 'Terdapat data duplikat dari data kami. Silakan masukan yang berbeda.';
            }

            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}