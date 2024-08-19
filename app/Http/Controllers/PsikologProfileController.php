<?php

namespace App\Http\Controllers;

use App\Models\PsikologModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\File;

class PsikologProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psikologId = Auth::guard('psikolog')->user()->id;
        $psikologProfile = PsikologModel::with(['detailPsikologs.bidangPsikologs', 'detailPsikologs.metodeKonsultasis'])->where('id', $psikologId)->firstOrFail();

        return view('pages.psikolog.profile.index', compact('psikologProfile'));
    }

    public function berkas()
    {
        $psikologId = Auth::guard('psikolog')->user()->id;
        $psikologBerkas = PsikologModel::where('id', $psikologId)->firstOrFail();

        return view('pages.psikolog.profile.berkas', compact('psikologBerkas'));
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
            'email' => 'required|email|max:255',
            'password' => 'nullable|string|min:6',
            'jenis_kelamin' => 'required|string|max:10',
            'tanggal_lahir' => 'required|date',
            'tempat_lahir' => 'required|string|max:255',
            'asal_universitas' => 'required|string|max:255',
            'program_studi' => 'required|string|max:255',
            'tahun_lulus' => 'required|numeric',
            'tempat_praktik' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'bidang' => 'nullable|array',
            'metode_konsultasi' => 'nullable|array',
            'profile_photo_path' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        try {
            $psikologProfile = PsikologModel::findOrFail($id);

            $psikologProfile->update([
                'nama' => $validated['nama'],
                'email' => $validated['email'],
                'jenis_kelamin' => $validated['jenis_kelamin'],
                'tanggal_lahir' => $validated['tanggal_lahir'],
                'tempat_lahir' => $validated['tempat_lahir'],
                'asal_universitas' => $validated['asal_universitas'],
                'program_studi' => $validated['program_studi'],
                'tahun_lulus' => $validated['tahun_lulus'],
                'tempat_praktik' => $validated['tempat_praktik'],
                'deskripsi' => $validated['deskripsi'],
            ]);

            if ($request->filled('password')) {
                $psikologProfile->update(['password' => bcrypt($validated['password'])]);
            }

            if ($request->hasFile('profile_photo_path')) {
                $img_tmp = $request->file('profile_photo_path');
                if ($img_tmp->isValid()) {
                    // Get image extension
                    $extension = $img_tmp->getClientOriginalExtension();
                    // Generate new image name
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/user/photo/psikolog/' . $imageName;
                    // Upload image
                    Image::make($img_tmp)->save(public_path($imagePath));

                    // Delete old image if it exists
                    if ($psikologProfile->profile_photo_path && File::exists(public_path('store/user/photo/psikolog/' . $psikologProfile->profile_photo_path))) {
                        File::delete(public_path('store/user/photo/psikolog/' . $psikologProfile->profile_photo_path));
                    }

                    // Save the new image name to the database
                    $psikologProfile->profile_photo_path = $imageName;
                    $psikologProfile->save();
                }
            }

            if ($request->has('bidang')) {
                $psikologProfile->detailPsikologs()->first()->bidangPsikologs()->sync($validated['bidang']);
            }

            if ($request->has('metode_konsultasi')) {
                $psikologProfile->detailPsikologs()->first()->metodeKonsultasis()->sync($validated['metode_konsultasi']);
            }

            return redirect()->back()->with('success_message_update', 'Profile berhasil diperbarui.');
        } catch (\Exception $e) {
            return redirect()->back()->withInput()->withErrors([$e->getMessage()]);
        }
    }

    public function updateBerkas(Request $request, string $id)
    {
        $validated = $request->validate([
            'dokumen_cv' => 'nullable|file|mimes:pdf|max:2048',
            'dokumen_ijazah' => 'nullable|file|mimes:pdf|max:2048',
            'dokumen_str_aktif' => 'nullable|file|mimes:pdf|max:2048',
            'dokumen_izin_praktik' => 'nullable|file|mimes:pdf|max:2048',
        ]);

        $psikologBerkas = PsikologModel::findOrFail($id);

        if ($request->hasFile('dokumen_cv')) {
            if ($psikologBerkas->dokumen_cv && Storage::disk('public')->exists($psikologBerkas->dokumen_cv)) {
                Storage::disk('public')->delete($psikologBerkas->dokumen_cv);
            }

            $ktmFile = $request->file('dokumen_cv');
            $ktmPath = $ktmFile->storeAs('psikolog/profile/berkas/cv', $ktmFile->getClientOriginalName(), 'public');
            $psikologBerkas->dokumen_cv = $ktmPath;
        }

        if ($request->hasFile('dokumen_ijazah')) {
            if ($psikologBerkas->dokumen_ijazah && Storage::disk('public')->exists($psikologBerkas->dokumen_ijazah)) {
                Storage::disk('public')->delete($psikologBerkas->dokumen_ijazah);
            }

            $transkipFile = $request->file('dokumen_ijazah');
            $transkipPath = $transkipFile->storeAs('psikolog/profile/berkas/ijazah', $transkipFile->getClientOriginalName(), 'public');
            $psikologBerkas->dokumen_ijazah = $transkipPath;
        }

        if ($request->hasFile('dokumen_str_aktif')) {
            if ($psikologBerkas->dokumen_str_aktif && Storage::disk('public')->exists($psikologBerkas->dokumen_str_aktif)) {
                Storage::disk('public')->delete($psikologBerkas->dokumen_str_aktif);
            }

            $transkipFile = $request->file('dokumen_str_aktif');
            $transkipPath = $transkipFile->storeAs('psikolog/profile/berkas/str', $transkipFile->getClientOriginalName(), 'public');
            $psikologBerkas->dokumen_str_aktif = $transkipPath;
        }

        if ($request->hasFile('dokumen_izin_praktik')) {
            if ($psikologBerkas->dokumen_izin_praktik && Storage::disk('public')->exists($psikologBerkas->dokumen_izin_praktik)) {
                Storage::disk('public')->delete($psikologBerkas->dokumen_izin_praktik);
            }

            $transkipFile = $request->file('dokumen_izin_praktik');
            $transkipPath = $transkipFile->storeAs('psikolog/profile/berkas/izin_praktik', $transkipFile->getClientOriginalName(), 'public');
            $psikologBerkas->dokumen_izin_praktik = $transkipPath;
        }

        $psikologBerkas->save();

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
