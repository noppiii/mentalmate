<?php

namespace App\Http\Controllers;

use App\Models\TagArticleModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

class MasterTagArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allTagBerita = TagArticleModel::all();
        return view('pages.admin.artikel.tag.index', compact('allTagBerita'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.artikel.tag.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'nama' => 'required',
            'content' => 'required',
        ];

        $customMessages = [
            'nama.required' => 'Nama harus diisi!!!',
            'content.required' => 'Deskripsi harus diisi!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $tag = new TagArticleModel();
            $tag->fill([
                'nama' => $data['nama'],
                'content' => $data['content'],
                'slug' => Str::slug($data['nama'], '-'),
            ]);

            Session::flash('success_message_create', 'Data tag artikel berhasil disimpan');
            return redirect()->route('tag-artikel.index');
        } catch (QueryException $e) {
            // Handle the integrity constraint violation exception (duplicate entry)
            if ($e->getCode() === 23000) {
                // Duplicate entry error
                $errorMessage = 'Upss terjadi kesalahan';
            } else {
                // Other database-related errors
                $errorMessage = 'Upss terjadi kesalahan';
            }

            return redirect()->back()->withInput()->withErrors([$errorMessage]);
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
        try {
            $tag = TagArticleModel::where('id', $id)
                ->firstOrFail();
                // dd($admin->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('tag-artikel.index')->with('error_message_not_found', 'Data tag artikel tidak ditemukan');
        }
        return view('pages.admin.artikel.tag.edit', compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $tag = TagArticleModel::where('id', $id)
                ->firstOrFail();
                // dd($admin->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('tag-artikel.index')->with('error_message_not_found', 'Data tag artikel tidak ditemukan');
        }

        $data = $request->all();

        $rules = [
            'nama' => 'required',
            'content' => 'required',
        ];

        $customMessages = [
            'nama.required' => 'Nama harus diisi!!!',
            'content.required' => 'Deskripsi harus diisi!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $tag->nama = $data['nama'];
            $tag->content = $data['content'];
            $tag->slug = Str::slug($data['nama'], '-');

            if ($tag->isDirty()) {
                $tag->save();
            }

            Session::flash('success_message_update', 'Data tag artikel  berhasil diperbarui');
            return redirect()->route('tag-artikel.index');
        } catch (QueryException $e) {
            // Handle the integrity constraint violation exception (duplicate entry)
            if ($e->getCode() === 23000) {
                // Duplicate entry error
                $errorMessage = 'Upss terjadi kesalahan';
            } else {
                // Other database-related errors
                $errorMessage = 'Upss terjadi kesalahan';
            }

            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $tag = TagArticleModel::where('id', $id)->firstOrFail();

            $tag->delete();

            Session::flash('success_message_delete', 'Data tag artikel berhasil dihapus');
            return redirect()->route('tag-artikel.index');
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('tag-artikel.index')->with('error_message_not_found', 'Data tag artikel tidak ditemukan');
        } catch (\Exception $e) {
            // Handle other exceptions if needed
            return redirect()->route('tag-artikel.index')->with('error_message_delete', 'Gagal menghapus data kategori artikel');
        }
    }
}