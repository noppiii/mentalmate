<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryArticleModel;
use App\Models\TagArticleModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;

class MasterArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allArtikel = ArticleModel::all();
        return view('pages.admin.artikel.artikel.index', compact('allArtikel'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $allCategory = CategoryArticleModel::all();
        $allTag = TagArticleModel::all();
        return view('pages.admin.artikel.artikel.create', compact('allCategory', 'allTag'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'tumbnail' => 'image|mimes:jpeg,png,jpg,gif',
            'content' => 'required',
            'kategori_artikel' => 'required|array',
            'tag_artikel' => 'required|array',
        ];

        $customMessages = [
            'name.required' => 'Judul artikel harus diisi!!!',
            'content.required' => 'Content artikel harus diisi!!!',
            'tumbnail.image' => 'Thumbnail harus berupa gambar.',
            'tumbnail.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
            'kategori_artikel.required' => 'Kategori artikel harus dipilih.',
            'tag_artikel.required' => 'Tag artikel harus dipilih.',
        ];

        $this->validate($request, $rules, $customMessages);

        // upload tumbnail
        if ($request->hasFile('tumbnail')) {
            $img_tmp = $request->file('tumbnail');
            if ($img_tmp->isValid()) {
                // get image extension
                $extension = $img_tmp->getClientOriginalExtension();
                // generate new image name
                $imageName = rand(111, 99999) . '.' . $extension;
                $imagePath = 'store/artikel/thumbnail/' . $imageName;
                // upload image
                Image::make($img_tmp)->save(public_path($imagePath));
                // get only image name
                $imageName = basename($imagePath);
            }
        }

        try {
            $artikel = new ArticleModel();
            $artikel->fill([
                'name' => $data['name'],
                'slug' => Str::slug($data['name']),
                'content' => $data['content'],
                'tumbnail' => $imageName ?? null,
            ]);

            // Check if the user is an admin or psychologist
            if (Auth::guard('admin')->check()) {
                $artikel->admin_id = Auth::guard('admin')->user()->id;
                $artikel->psikolog_id = null;
            } elseif (Auth::guard('psikolog')->check()) {
                $artikel->psikolog_id = Auth::guard('psikolog')->user()->id;
                $artikel->admin_id = null;
            }

            $artikel->save();

            // Attach categories and tags
            $artikel->kategoriArtikels()->attach($data['kategori_artikel']);
            $artikel->tagArtikels()->attach($data['tag_artikel']);

            Session::flash('success_message_create', 'Data artikel berhasil disimpan');
            return redirect()->route('artikel.index');
        } catch (QueryException $e) {
            $errorMessage = 'Upss terjadi kesalahan. Silahkan ulangi lagi';
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
            $artikel = ArticleModel::with('kategoriArtikels', 'tagArtikels')->where('id', $id)->firstOrFail();
            $allCategory = CategoryArticleModel::all();
            $allTag = TagArticleModel::all();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('artikel.index')->with('error_message_not_found', 'Data artikel tidak ditemukan');
        }
        return view('pages.admin.artikel.artikel.edit', compact('artikel', 'allCategory', 'allTag'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $rules = [
            'name' => 'required',
            'tumbnail' => 'image|mimes:jpeg,png,jpg,gif',
            'content' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Judul artikel harus diisi!!!',
            'content.required' => 'Content artikel harus diisi!!!',
            'tumbnail.image' => 'Thumbnail harus berupa gambar.',
            'tumbnail.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $artikel = ArticleModel::findOrFail($id);
            $artikel->name = $data['name'];
            $artikel->slug = Str::slug($data['name'], '-');
            $artikel->content = $data['content'];

            if ($request->hasFile('tumbnail')) {
                // Hapus thumbnail lama jika ada
                if ($artikel->tumbnail && file_exists(public_path('store/artikel/thumbnail/' . $artikel->tumbnail))) {
                    unlink(public_path('store/artikel/thumbnail/' . $artikel->tumbnail));
                }

                $img_tmp = $request->file('tumbnail');
                if ($img_tmp->isValid()) {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/artikel/thumbnail/' . $imageName;
                    Image::make($img_tmp)->save(public_path($imagePath));
                    $artikel->tumbnail = $imageName;
                }
            }

            $artikel->save();

            $artikel->kategoriArtikels()->sync($request->kategori_artikel);
            $artikel->tagArtikels()->sync($request->tag_artikel);

            Session::flash('success_message_create', 'Data artikel berhasil diperbarui');
            return redirect()->route('artikel.index');
        } catch (QueryException $e) {
            if ($e->getCode() === 23000) {
                $errorMessage = 'Upss terjadi kesalahan. Silahkan ulangi lagi';
            } else {
                $errorMessage = 'Upss terjadi kesalahan. Silahkan ulangi lagi';
            }

            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

    public function updateStatus(Request $request, string $id)
    {
        try {
            $status = ArticleModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('artikel.index')->with('error_message_not_found', 'Data artikel tidak ditemukan');
        }
        $data = $request->all();

        $rules = [
            'status' => 'required',
        ];

        $customMessages = [
            'status.required' => 'Status artikel harus diisi!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $status->status  = $data['status'];
            $status->save();

            Session::flash('success_message_create', 'Data status artikel berhasil diperbarui');
            return redirect()->route('artikel.index');
        } catch (QueryException $e) {
            // Handle the integrity constraint violation exception (duplicate entry)
            if ($e->getCode() === 23000) {
                // Duplicate entry error
                $errorMessage = 'Upppss Terjadi Kesalahan. Silahkan Ulangi Lagi.';
            } else {
                // Other database-related errors
                $errorMessage = 'Upppss Terjadi Kesalahan. Silahkan Ulangi Lagi.';
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
            $artikel = ArticleModel::findOrFail($id);

            // Hapus thumbnail jika ada
            if ($artikel->tumbnail && file_exists(public_path('store/artikel/thumbnail/' . $artikel->tumbnail))) {
                unlink(public_path('store/artikel/thumbnail/' . $artikel->tumbnail));
            }

            // Hapus data dari tabel mapping
            $artikel->kategoriArtikels()->detach();
            $artikel->tagArtikels()->detach();

            // Hapus data artikel
            $artikel->delete();

            Session::flash('success_message_delete', 'Data artikel berhasil dihapus');
            return redirect()->route('artikel.index');
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('artikel.index')->with('error_message_not_found', 'Data artikel tidak ditemukan');
        } catch (\Exception $e) {
            // Handle other exceptions
            $errorMessage = 'Upss terjadi kesalahan. Silahkan ulangi lagi';
            return redirect()->back()->withErrors([$errorMessage]);
        }
    }

}