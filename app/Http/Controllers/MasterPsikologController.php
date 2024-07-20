<?php

namespace App\Http\Controllers;

use App\Models\PsikologModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class MasterPsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allPsikolog = PsikologModel::all();
        return view('pages.admin.user.psikolog.index', compact('allPsikolog'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.user.psikolog.create');
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
            $psikolog = PsikologModel::where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('psikolog.index')->with('error_message_not_found', 'Data Psikolog tidak ditemukan');
        }

        $data = $request->all();
        try {
            $psikolog->status = $data['status'];

            if ($psikolog->isDirty()) {
                $psikolog->save();
            }

            Session::flash('success_message_update', 'Data psikolog berhasil diperbarui');
            return redirect()->route('psikolog.index');
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