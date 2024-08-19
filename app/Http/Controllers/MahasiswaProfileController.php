<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class MahasiswaProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswaId = Auth::guard('mahasiswa')->user()->id;
        $mahasiswaProfile = MahasiswaModel::where('id', $mahasiswaId)->firstOrFail();
        return view('pages.mahasiswa.profile.index', compact('mahasiswaProfile'));
    }

    public function berkas()
    {
        $mahasiswaId = Auth::guard('mahasiswa')->user()->id;
        $mahasiswaBerkas = MahasiswaModel::where('id', $mahasiswaId)->firstOrFail();
        return view('pages.mahasiswa.profile.berkas', compact('mahasiswaBerkas'));
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
        $validated = $request->validate([
            'nama' => 'required|string|max:255',
            'nomor_induk_mahasiswa' => 'required|numeric',
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6',
            'jenis_kelamin' => 'required|string|max:10',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'nama_universitas' => 'required|string|max:255',
            'fakultas' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'tahun_masuk' => 'required|numeric',
            'semester' => 'required|numeric',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $mahasiswaProfile = MahasiswaModel::findOrFail($id);

            $mahasiswaProfile->update([
                'nama' => $validated['nama'],
                'nomor_induk_mahasiswa' => $validated['nomor_induk_mahasiswa'],
                'email' => $validated['email'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'nama_universitas' => $validated['nama_universitas'],
                'fakultas' => $validated['fakultas'],
                'program_studi' => $validated['program_studi'],
                'tahun_masuk' => $validated['tahun_masuk'],
                'semester' => $validated['semester'],
            ]);

            if ($request->filled('password')) {
                $mahasiswaProfile->update(['password' => bcrypt($validated['password'])]);
            }

            if ($request->hasFile('profile_photo_path')) {
                $img_tmp = $request->file('profile_photo_path');
                if ($img_tmp->isValid()) {
                    // Get image extension
                    $extension = $img_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/user/photo/mahasiswa/' . $imageName;
                    // Upload image
                    Image::make($img_tmp)->save(public_path($imagePath));

                    // Delete old image if it exists
                    if ($mahasiswaProfile->profile_photo_path && File::exists(public_path('store/user/photo/mahasiswa/' . $mahasiswaProfile->profile_photo_path))) {
                        File::delete(public_path('store/user/photo/mahasiswa/' . $mahasiswaProfile->profile_photo_path));
                    }

                    // Save the new image name to the database
                    $mahasiswaProfile->profile_photo_path = $imageName;
                    $mahasiswaProfile->save();
                }
            }

            return redirect()->back()->with('success_message_update', 'Profile berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    public function updateBerkas(Request $request, string $id)
    {
        $validated = $request->validate([
            'dokumen_ktm' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'dokumen_transkip_nilai' => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
        ]);

        $mahasiswaBerkas = MahasiswaModel::findOrFail($id);

        if ($request->hasFile('dokumen_ktm')) {
            if ($mahasiswaBerkas->dokumen_ktm && Storage::disk('public')->exists($mahasiswaBerkas->dokumen_ktm)) {
                Storage::disk('public')->delete($mahasiswaBerkas->dokumen_ktm);
            }

            $ktmFile = $request->file('dokumen_ktm');
            $ktmPath = $ktmFile->storeAs('mahasiswa/profile/berkas/ktm', $ktmFile->getClientOriginalName(), 'public');
            $mahasiswaBerkas->dokumen_ktm = $ktmPath;
        }

        if ($request->hasFile('dokumen_transkip_nilai')) {
            if ($mahasiswaBerkas->dokumen_transkip_nilai && Storage::disk('public')->exists($mahasiswaBerkas->dokumen_transkip_nilai)) {
                Storage::disk('public')->delete($mahasiswaBerkas->dokumen_transkip_nilai);
            }

            $transkipFile = $request->file('dokumen_transkip_nilai');
            $transkipPath = $transkipFile->storeAs('mahasiswa/profile/berkas/transkip', $transkipFile->getClientOriginalName(), 'public');
            $mahasiswaBerkas->dokumen_transkip_nilai = $transkipPath;
        }

        $mahasiswaBerkas->save();

        return redirect()->back()->with('success_message_create', 'Berkas berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
