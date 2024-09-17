<?php

namespace App\Http\Controllers;

use App\Models\SiteIdentity;
use Database\Seeders\SiteIdentitySeeder;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class SiteIdentityController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siteIdentity = SiteIdentity::latest()->first();
        return view('pages.admin.site-identity.index', compact('siteIdentity'));
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
        try {
            $siteIdentity = SiteIdentity::findOrFail($id);
//             dd($siteIdentity->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('site-identity.index')->with('error_message_not_found', 'Data identity tidak ditemukan');
        }
        return view('pages.admin.site-identity.edit', compact('siteIdentity'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = $request->all();

        $rules = [
            'name_website' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'contact' => 'nullable|string|max:50',
            'address' => 'required|string|max:255',
            'social_instagram' => 'nullable|url|max:255',
            'social_facebook' => 'nullable|url|max:255',
            'social_linkedin' => 'nullable|url|max:255',
            'social_x' => 'nullable|url|max:255',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ];

        $customMessages = [
            'logo.image' => 'Thumbnail harus berupa logo.',
            'logo.mimes' => 'Format logo tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
            'judul.required' => 'Judul banner harus diisi.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $siteIdentity = SiteIdentity::findOrFail($id);
            $siteIdentity->name_website = $data['name_website'];
            $siteIdentity->email = $data['email'];
            $siteIdentity->contact = $data['contact'];
            $siteIdentity->address = $data['address'];
            $siteIdentity->social_instagram = $data['social_instagram'];
            $siteIdentity->social_facebook = $data['social_facebook'];
            $siteIdentity->social_linkedin = $data['social_linkedin'];
            $siteIdentity->social_x = $data['social_x'];

            if ($request->hasFile('logo')) {
                // Hapus thumbnail lama jika ada
                if ($siteIdentity->logo && file_exists(public_path('store/site-identity/' . $siteIdentity->logo))) {
                    unlink(public_path('store/site-identity/' . $siteIdentity->logo));
                }

                $img_tmp = $request->file('logo');
                if ($img_tmp->isValid()) {
                    $extension = $img_tmp->getClientOriginalExtension();
                    $imageName = rand(111, 99999) . '.' . $extension;
                    $imagePath = 'store/site-identity/' . $imageName;
                    Image::make($img_tmp)->save(public_path($imagePath));
                    $siteIdentity->logo = $imageName;
                }
            }

            $siteIdentity->save();

            Session::flash('success_message_create', 'Data identity berhasil diperbarui');
            return redirect()->route('site-identity.index');
        } catch (QueryException $e) {
            if ($e->getCode() === 23000) {
                $errorMessage = 'Upss terjadi kesalahan. Silahkan ulangi lagi';
            } else {
                $errorMessage = 'Upss terjadi kesalahan. Silahkan ulangi lagi';
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
