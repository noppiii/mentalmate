<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\PsikologModel;
use Illuminate\Http\Request;

class ClientSearchController extends Controller
{
    public function search(Request $request)
    {
        $search = $request->input('search');

        $psikologQuery = PsikologModel::query();
        $artikelQuery = ArticleModel::query();

        if ($search) {
            $psikologQuery->where(function ($query) use ($search) {
                $query->where('nama', 'LIKE', '%' . $search . '%')
                    ->orWhere('asal_universitas', 'LIKE', '%' . $search . '%')
                    ->orWhere('tempat_praktik', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('detailPsikologs.bidangPsikologs', function ($query) use ($search) {
                        $query->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('detailPsikologs.metodeKonsultasis', function ($query) use ($search) {
                        $query->where('jenis_metode_konsultasi', 'LIKE', '%' . $search . '%');
                    });
            });

            $artikelQuery->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('kategoriArtikels', function ($query) use ($search) {
                        $query->where('nama', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('tagArtikels', function ($query) use ($search) {
                        $query->where('nama', 'LIKE', '%' . $search . '%');
                    });
            });
        }

        $psikologs = $psikologQuery->get();
        $artikels = $artikelQuery->get();

        return view('pages.client.search.index', compact('psikologs', 'artikels'));
    }

}