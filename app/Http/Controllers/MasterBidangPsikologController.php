<?php

namespace App\Http\Controllers;

use App\Models\BidangPsikologModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Str;

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

        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Nama harus diisi!!!',
            'description.required' => 'Deskripsi harus diisi!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $bidang = new BidangPsikologModel();
            $bidang->create([
                'name' => $data['name'],
                'description' => $data['description'],
                'slug' => Str::slug($data['name'], '-'),
            ]);

            Session::flash('success_message_create', 'Data bidang psikolog berhasil disimpan');
            return redirect()->route('bidang-psikolog.index');
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
            $bidang = BidangPsikologModel::where('id', $id)
                ->firstOrFail();
            // dd($admin->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('bidang-psikolog.index')->with('error_message_not_found', 'Data bidang psikolog tidak ditemukan');
        }

        $data = $request->all();

        $rules = [
            'name' => 'required',
            'description' => 'required',
        ];

        $customMessages = [
            'name.required' => 'Nama harus diisi!!!',
            'description.required' => 'Deskripsi harus diisi!!!'
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $bidang->name = $data['name'];
            $bidang->description = $data['description'];
            $bidang->slug = Str::slug($data['name'], '-');

            if ($bidang->isDirty()) {
                $bidang->save();
            }

            Session::flash('success_message_update', 'Data bidang psikolog  berhasil diperbarui');
            return redirect()->route('bidang-psikolog.index');
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
            // Temukan bidang psikolog berdasarkan ID
            $bidangPsikolog = BidangPsikologModel::findOrFail($id);

            // Periksa apakah ada psikolog yang terkait dengan bidang psikolog ini
            if ($bidangPsikolog->detailPsikologs()->count() > 0) {
                return redirect()->route('bidang-psikolog.index')->withErrors(['error_message_not_found' => 'Bidang psikolog ini masih memiliki psikolog terkait dan tidak dapat dihapus.']);
            }

            // Jika tidak ada psikolog yang terkait, hapus bidang psikolog
            $bidangPsikolog->delete();

            return redirect()->route('bidang-psikolog.index')->with('success_message_create', 'Bidang psikolog berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('bidang-psikolog.index')->withErrors(['error_message_not_found' => 'Bidang psikolog tidak ditemukan.']);
        } catch (\Exception $e) {
            return redirect()->route('bidang-psikolog.index')->withErrors(['error_message_not_found' => 'Upss terjadi kesalahan. Silahkan ulangi lagi.']);
        }
    }

}
