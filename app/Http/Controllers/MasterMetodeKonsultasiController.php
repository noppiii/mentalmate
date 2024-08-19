<?php

namespace App\Http\Controllers;

use App\Models\MetodeKonsultasiModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class MasterMetodeKonsultasiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $allMetode = MetodeKonsultasiModel::paginate(9);

        $totalMetode = MetodeKonsultasiModel::count();

        $metodePsikologTerfavorit = MetodeKonsultasiModel::select('metode_konsultasis.jenis_metode_konsultasi as name', DB::raw('COUNT(psikolog_favorits.id) as favorit_count'))
            ->leftJoin('metode_konsultasi_mappings', 'metode_konsultasis.id', '=', 'metode_konsultasi_mappings.metode_konsultasi_id')
            ->leftJoin('detail_psikologs', 'metode_konsultasi_mappings.detail_psikolog_id', '=', 'detail_psikologs.id')
            ->leftJoin('psikologs', 'detail_psikologs.psikolog_id', '=', 'psikologs.id')
            ->leftJoin('psikolog_favorits', 'psikologs.id', '=', 'psikolog_favorits.psikolog_id')
            ->groupBy('metode_konsultasis.id', 'metode_konsultasis.jenis_metode_konsultasi')
            ->orderBy('favorit_count', 'DESC')
            ->first();

        $metodePsikologTerbanyak = MetodeKonsultasiModel::select('metode_konsultasis.jenis_metode_konsultasi as name', DB::raw('COUNT(psikologs.id) as psikolog_count'))
            ->leftJoin('metode_konsultasi_mappings', 'metode_konsultasis.id', '=', 'metode_konsultasi_mappings.metode_konsultasi_id')
            ->leftJoin('detail_psikologs', 'metode_konsultasi_mappings.detail_psikolog_id', '=', 'detail_psikologs.id')
            ->leftJoin('psikologs', 'detail_psikologs.psikolog_id', '=', 'psikologs.id')
            ->groupBy('metode_konsultasis.id', 'metode_konsultasis.jenis_metode_konsultasi')
            ->orderBy('psikolog_count', 'DESC')
            ->first();

        return view('pages.admin.metode-konsultasi.index', compact('allMetode', 'totalMetode', 'metodePsikologTerfavorit', 'metodePsikologTerbanyak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.admin.metode-konsultasi.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->all();

        $rules = [
            'jenis_metode_konsultasi' => 'required',
        ];

        $customMessages = [
            'jenis_metode_konsultasi.required' => 'Metode konsultasi harus diisi!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $metode = new MetodeKonsultasiModel();
            $metode->create([
                'jenis_metode_konsultasi' => $data['jenis_metode_konsultasi'],
            ]);

            Session::flash('success_message_create', 'Data metode konsultasi berhasil disimpan');
            return redirect()->route('metode-konsultasi.index');
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
        try {
            $metode = MetodeKonsultasiModel::where('id', $id)
                ->firstOrFail();
            // dd($admin->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('metode-konsultasi.index')->with('error_message_not_found', 'Data metode konsultasi tidak ditemukan');
        }
        return view('pages.admin.metode-konsultasi.edit', compact('metode'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        try {
            $metode = MetodeKonsultasiModel::where('id', $id)
                ->firstOrFail();
            // dd($admin->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('metode-konsultasi.index')->with('error_message_not_found', 'Data metode konsultasi tidak ditemukan');
        }
        return view('pages.admin.metode-konsultasi.edit', compact('metode'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            $metode = MetodeKonsultasiModel::where('id', $id)
                ->firstOrFail();
            // dd($admin->toArray());
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->route('metode-konsultasi.index')->with('error_message_not_found', 'Data metode konsultasi tidak ditemukan');
        }

        $data = $request->all();

        $rules = [
            'jenis_metode_konsultasi' => 'required',
        ];

        $customMessages = [
            'jenis_metode_konsultasi.required' => 'Metode konsultasi harus diisi!!!'
        ];

        $this->validate($request, $rules, $customMessages);

        try {
            $metode->jenis_metode_konsultasi = $data['jenis_metode_konsultasi'];

            if ($metode->isDirty()) {
                $metode->save();
            }

            Session::flash('success_message_update', 'Data metode konsultasi  berhasil diperbarui');
            return redirect()->route('metode-konsultasi.index');
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
            $metodeKonsultasi = MetodeKonsultasiModel::findOrFail($id);

            if ($metodeKonsultasi->detailPsikologs()->count() > 0) {
                return redirect()->route('metode-konsultasi.index')->withErrors(['error_message_not_found' => 'Metode konsultasi ini masih memiliki psikolog terkait dan tidak dapat dihapus.']);
            }

            $metodeKonsultasi->delete();

            return redirect()->route('metode-konsultasi.index')->with('success_message_create', 'Metode konsultasi berhasil dihapus.');
        } catch (ModelNotFoundException $e) {
            return redirect()->route('metode-konsultasi.index')->withErrors(['error_message_not_found' => 'Metode konsultasi tidak ditemukan.']);
        } catch (\Exception $e) {
            return redirect()->route('metode-konsultasi.index')->withErrors(['error_message_not_found' => 'Upss terjadi kesalahan. Silahkan ulangi lagi.']);
        }
    }
}
