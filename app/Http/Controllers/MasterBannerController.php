<?php

namespace App\Http\Controllers;

use App\Models\BannerModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class MasterBannerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allBanner = BannerModel::all();
        $totalBanner = BannerModel::count();
        $newBanner = BannerModel::latest()->first();
        return view('pages.admin.banner.index', compact('allBanner', 'totalBanner', 'newBanner'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.banner.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'nullable|string',
            'link' => 'nullable|string'
        ];

        $customMessages = [
            'gambar.image' => 'Thumbnail harus berupa gambar.',
            'gambar.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
            'judul.required' => 'Judul banner harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $banner = new BannerModel();

            if ($request->hasFile('gambar')) {
                $img_tmp = $request->file('gambar');
                if ($img_tmp->isValid()) {
                    // get image extension
                    $extension = $img_tmp->getClientOriginalExtension();
                    // generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/banner/' . $imageName;
                    // upload image
                    Image::make($img_tmp)->save(public_path($imagePath));
                    // set image name in data
                    $banner->gambar = $imageName;
                }
            }

            $banner->judul = $data['judul'] ?? null;
            $banner->link = $data['link'] ?? null;
            $banner->status = 'disable';
            $banner->save();

            Session::flash('success_message_create', 'Data banner berhasil disimpan');
            return redirect()->route('banner.index');
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
            $banner = BannerModel::where('id', $id)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            return redirect()->route('banner.index')->with('error_message_not_found', 'Data banner tidak ditemukan');
        }
        return view('pages.admin.banner.edit', compact('banner'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $rules = [
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'judul' => 'nullable|string',
            'link' => 'nullable|string'
        ];

        $customMessages = [
            'gambar.image' => 'Thumbnail harus berupa gambar.',
            'gambar.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
            'judul.required' => 'Judul banner harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $banner = BannerModel::findOrFail($id);
            $banner->judul = $data['judul'];
            $banner->link = $data['link'];

            if ($request->hasFile('gambar')) {
                // Hapus thumbnail lama jika ada
                if ($banner->gambar && file_exists(public_path('store/banner/' . $banner->gambar))) {
                    unlink(public_path('store/banner/' . $banner->gambar));
                }

                $img_tmp = $request->file('gambar');
                if ($img_tmp->isValid()) {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/banner/' . $imageName;
                    Image::make($img_tmp)->save(public_path($imagePath));
                    $banner->gambar = $imageName;
                }
            }

            $banner->save();

            Session::flash('success_message_create', 'Data banner berhasil diperbarui');
            return redirect()->route('banner.index');
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
            $status = BannerModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('banner.index')->with('error_message_not_found', 'Data banner tidak ditemukan');
        }
        $data = $request->all();

        $rules = [
            'status' => 'required',
        ];

        $customMessages = [
            'status.required' => 'Status banner harus diisi!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $status->status = $data['status'];
            $status->save();

            Session::flash('success_message_create', 'Data status banner berhasil diperbarui');
            return redirect()->route('banner.index');
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
            $banner = BannerModel::findOrFail($id);

            if ($banner->gambar && file_exists(public_path('store/banner/' . $banner->gambar))) {
                unlink(public_path('store/banner/' . $banner->gambar));
            }


            // Hapus data banner
            $banner->delete();

            Session::flash('success_message_delete', 'Data banner berhasil dihapus');
            return redirect()->route('banner.index');
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('banner.index')->with('error_message_not_found', 'Data banner tidak ditemukan');
        } catch (\Exception $e) {
            // Handle other exceptions
            $errorMessage = 'Upss terjadi kesalahan. Silahkan ulangi lagi';
            return redirect()->back()->withErrors([$errorMessage]);
        }
    }
}
