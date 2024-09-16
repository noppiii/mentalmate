<?php

namespace App\Http\Controllers;

use App\Models\BidangPsikologModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class MasterBidangPsikologController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');
        $bidangQuery = BidangPsikologModel::with('detailPsikologs.psikolog');

        if ($search) {
            $bidangQuery->where('name', 'LIKE', '%' . $search . '%');
        }

        $allBidang = $bidangQuery->paginate(10);

//        foreach ($allBidang as $bidang) {
//            foreach ($bidang->detailPsikologs as $detailPsikolog) {
//                dd($detailPsikolog->psikolog);
//            }
//        }

        $totalBidang = BidangPsikologModel::count();
        $bidangPsikologTerfavorit = BidangPsikologModel::select('bidang_psikologs.name', DB::raw('COUNT(psikolog_favorits.id) as favorit_count'))
            ->leftJoin('bidang_psikolog_mappings', 'bidang_psikologs.id', '=', 'bidang_psikolog_mappings.bidang_psikolog_id')
            ->leftJoin('detail_psikologs', 'bidang_psikolog_mappings.detail_psikolog_id', '=', 'detail_psikologs.id')
            ->leftJoin('psikologs', 'detail_psikologs.psikolog_id', '=', 'psikologs.id')
            ->leftJoin('psikolog_favorits', 'psikologs.id', '=', 'psikolog_favorits.psikolog_id')
            ->groupBy('bidang_psikologs.id', 'bidang_psikologs.name')
            ->orderBy('favorit_count', 'DESC')
            ->first();
        $bidangPsikologTerbanyak = BidangPsikologModel::select('bidang_psikologs.name', DB::raw('COUNT(psikologs.id) as psikolog_count'))
            ->leftJoin('bidang_psikolog_mappings', 'bidang_psikologs.id', '=', 'bidang_psikolog_mappings.bidang_psikolog_id')
            ->leftJoin('detail_psikologs', 'bidang_psikolog_mappings.detail_psikolog_id', '=', 'detail_psikologs.id')
            ->leftJoin('psikologs', 'detail_psikologs.psikolog_id', '=', 'psikologs.id')
            ->groupBy('bidang_psikologs.id', 'bidang_psikologs.name')
            ->orderBy('psikolog_count', 'DESC')
            ->first();
//        dd($bidangPsikologTerbanyak->toArray());
        return view('pages.admin.bidang-psikolog.index', compact('search', 'allBidang', 'totalBidang', 'bidangPsikologTerfavorit', 'bidangPsikologTerbanyak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.bidang-psikolog.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        // Validation rules
        $rules = [
            'name' => 'required',
            'description' => 'required',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'image_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];

        $customMessages = [
            'name.required' => 'Nama harus diisi!!!',
            'description.required' => 'Deskripsi harus diisi!!!',
            'image_cover.image' => 'Gambar cover harus berupa gambar.',
            'image_cover.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
            'image_banner.image' => 'Gambar banner harus berupa gambar.',
            'image_banner.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $bidang = new BidangPsikologModel();

            if ($request->hasFile('image_cover')) {
                $img_cover = $request->file('image_cover');
                if ($img_cover->isValid()) {
                    $extension = $img_cover->getClientOriginalExtension();
                    $imageCoverName = rand(111, 99999) . '_cover.' . $extension;
                    $imageCoverPath = 'store/bidang-psikolog/' . $imageCoverName;
                    Image::make($img_cover)->save(public_path($imageCoverPath));
                    $bidang->image_cover = $imageCoverName;
                }
            }

            if ($request->hasFile('image_banner')) {
                $img_banner = $request->file('image_banner');
                if ($img_banner->isValid()) {
                    $extension = $img_banner->getClientOriginalExtension();
                    $imageBannerName = rand(111, 99999) . '_banner.' . $extension;
                    $imageBannerPath = 'store/bidang-psikolog/' . $imageBannerName;
                    Image::make($img_banner)->save(public_path($imageBannerPath));
                    $bidang->image_banner = $imageBannerName;
                }
            }

            $bidang->name = $data['name'];
            $bidang->description = $data['description'];
            $bidang->slug = Str::slug($data['name'], '-');
            $bidang->save();

            Session::flash('success_message_create', 'Data bidang psikolog berhasil disimpan');
            return redirect()->route('bidang-psikolog.index');

        } catch (QueryException $e) {
            $errorMessage = $e->getCode() === 23000 ? 'Nama bidang psikolog sudah ada.' : 'Upss terjadi kesalahan';
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
            $bidang = BidangPsikologModel::where('id', $id)
                ->firstOrFail();
            // dd($admin->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('bidang-psikolog.index')->with('error_message_not_found', 'Data bidang psikolog tidak ditemukan');
        }
        return view('pages.admin.bidang-psikolog.edit', compact('bidang'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $bidang = BidangPsikologModel::findOrFail($id);
        } catch (ModelNotFoundException $e) {
            return redirect()->route('bidang-psikolog.index')->with('error_message_not_found', 'Data bidang psikolog tidak ditemukan');
        }

        $rules = [
            'name' => 'required',
            'description' => 'required',
            'image_cover' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            'image_banner' => 'nullable|image|mimes:jpeg,png,jpg,gif',
        ];

        $customMessages = [
            'name.required' => 'Nama harus diisi!!!',
            'description.required' => 'Deskripsi harus diisi!!!',
            'image_cover.image' => 'Gambar cover harus berupa gambar.',
            'image_cover.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
            'image_banner.image' => 'Gambar banner harus berupa gambar.',
            'image_banner.mimes' => 'Format gambar tidak valid. Hanya diperbolehkan file dengan ekstensi jpeg, png, jpg, dan gif.',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $bidang->name = $request->input('name');
            $bidang->description = $request->input('description');
            $bidang->slug = Str::slug($request->input('name'), '-');

            // Handle image cover update
            if ($request->hasFile('image_cover')) {
                $img_cover = $request->file('image_cover');
                if ($img_cover->isValid()) {
                    // Delete old cover image if exists
                    if (!empty($bidang->image_cover) && file_exists(public_path('store/bidang-psikolog/' . $bidang->image_cover))) {
                        unlink(public_path('store/bidang-psikolog/' . $bidang->image_cover));
                    }

                    $extension = $img_cover->getClientOriginalExtension();
                    $imageCoverName = rand(111, 99999) . '_cover.' . $extension;
                    $imageCoverPath = 'store/bidang-psikolog/' . $imageCoverName;
                    Image::make($img_cover)->save(public_path($imageCoverPath));

                    $bidang->image_cover = $imageCoverName;
                }
            }

            if ($request->hasFile('image_banner')) {
                $img_banner = $request->file('image_banner');
                if ($img_banner->isValid()) {
                    if (!empty($bidang->image_banner) && file_exists(public_path('store/bidang-psikolog/' . $bidang->image_banner))) {
                        unlink(public_path('store/bidang-psikolog/' . $bidang->image_banner));
                    }

                    $extension = $img_banner->getClientOriginalExtension();
                    $imageBannerName = rand(111, 99999) . '_banner.' . $extension;
                    $imageBannerPath = 'store/bidang-psikolog/' . $imageBannerName;
                    Image::make($img_banner)->save(public_path($imageBannerPath));

                    $bidang->image_banner = $imageBannerName;
                }
            }

            if ($bidang->isDirty()) {
                $bidang->save();
            }

            Session::flash('success_message_update', 'Data bidang psikolog berhasil diperbarui');
            return redirect()->route('bidang-psikolog.index');

        } catch (QueryException $e) {
            $errorMessage = $e->getCode() === 23000 ? 'Nama bidang psikolog sudah ada.' : 'Upss terjadi kesalahan';
            return redirect()->back()->withInput()->withErrors([$errorMessage]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $bidangPsikolog = BidangPsikologModel::findOrFail($id);

            if ($bidangPsikolog->detailPsikologs()->count() > 0) {
                return redirect()->route('bidang-psikolog.index')->withErrors([
                    'error_message_related' => 'Bidang psikolog ini masih memiliki psikolog terkait dan tidak dapat dihapus.'
                ]);
            }

            if (!empty($bidangPsikolog->image_cover) && file_exists(public_path('store/bidang-psikolog/' . $bidangPsikolog->image_cover))) {
                unlink(public_path('store/bidang-psikolog/' . $bidangPsikolog->image_cover));
            }

            if (!empty($bidangPsikolog->image_banner) && file_exists(public_path('store/bidang-psikolog/' . $bidangPsikolog->image_banner))) {
                unlink(public_path('store/bidang-psikolog/' . $bidangPsikolog->image_banner));
            }

            $bidangPsikolog->delete();

            return redirect()->route('bidang-psikolog.index')->with('success_message_delete', 'Bidang psikolog berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('bidang-psikolog.index')->withErrors([
                'error_message_not_found' => 'Bidang psikolog tidak ditemukan.'
            ]);
        } catch (\Exception $e) {
            return redirect()->route('bidang-psikolog.index')->withErrors([
                'error_message_general' => 'Upss terjadi kesalahan. Silahkan ulangi lagi.'
            ]);
        }
    }

}
