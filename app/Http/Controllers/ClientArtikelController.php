<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryArticleModel;
use App\Models\CommentModel;
use App\Models\TagArticleModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ClientArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $allCategories = CategoryArticleModel::withCount('artikels')->get();
        $allTags = TagArticleModel::all();
        $recentArtikel = ArticleModel::orderBy('created_at', 'desc')->take(3)->get();
        $search = $request->input('cariArtikel');
        $selectedCategoryArtikel = $request->input('category');
        $selectedTagArtikel = $request->input('tag');

        $artikelQuery = ArticleModel::with(['kategoriArtikels', 'tagArtikels', 'psikolog', 'admin']);

        if ($search) {
            $artikelQuery->where(function ($query) use ($search) {
                $query->where('name', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('psikolog', function ($q) use ($search) {
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('admin', function ($q) use ($search) {
                        $q->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('kategoriArtikels', function ($q) use ($search) {
                        $q->where('nama', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('tagArtikels', function ($q) use ($search) {
                        $q->where('nama', 'LIKE', '%' . $search . '%');
                    });
            });
        }

        if ($selectedCategoryArtikel) {
            $artikelQuery->whereHas('kategoriArtikels', function ($subquery) use ($selectedCategoryArtikel) {
                $subquery->where('nama', $selectedCategoryArtikel);
            });
        }
        
        if ($selectedTagArtikel) {
            $artikelQuery->whereHas('tagArtikels', function ($subquery) use ($selectedTagArtikel) {
                $subquery->where('nama', $selectedTagArtikel);
            });
        }

        $paginateArtikel = $artikelQuery->where('status', 'accepted')->orderBy('created_at', 'desc')->paginate(6);

        // dd($paginateArtikel);

        return view('pages.client.artikel.index', compact('paginateArtikel', 'allCategories', 'allTags', 'recentArtikel', 'selectedCategoryArtikel', 'selectedTagArtikel'));
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
    public function show(string $slug, Request $request)
    {
        try {
            $detailArtikel = ArticleModel::where('slug', $slug)
                ->firstOrFail();
            $allCategories = CategoryArticleModel::withCount('artikels')->get();
            $allTags = TagArticleModel::all();
            $recentArtikel = ArticleModel::orderBy('created_at', 'asc')->take(3)->get();
            $nextArtikel = ArticleModel::where('created_at', '>', $detailArtikel->created_at)
                ->orderBy('created_at', 'asc')
                ->first();
            $previousArtikel = ArticleModel::where('created_at', '<', $detailArtikel->created_at)
            ->orderBy('created_at', 'desc')
            ->first();
            
            $search = $request->input('cariArtikel');
            $selectedCategoryArtikel = $request->input('category');
            $selectedTagArtikel = $request->input('tag');

            $artikelQuery = ArticleModel::with(['kategoriArtikels', 'tagArtikels', 'psikolog', 'admin']);

            if ($search) {
                $artikelQuery->where(function ($query) use ($search) {
                    $query->where('name', 'LIKE', '%' . $search . '%')
                        ->orWhereHas('psikolog', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        })
                        ->orWhereHas('admin', function ($q) use ($search) {
                            $q->where('name', 'LIKE', '%' . $search . '%');
                        })
                        ->orWhereHas('kategoriArtikels', function ($q) use ($search) {
                            $q->where('nama', 'LIKE', '%' . $search . '%');
                        })
                        ->orWhereHas('tagArtikels', function ($q) use ($search) {
                            $q->where('nama', 'LIKE', '%' . $search . '%');
                        });
                });
            }

            if ($selectedCategoryArtikel) {
                $artikelQuery->whereHas('kategoriArtikels', function ($subquery) use ($selectedCategoryArtikel) {
                    $subquery->where('nama', $selectedCategoryArtikel);
                });
            }

            if ($selectedTagArtikel) {
                $artikelQuery->whereHas('tagArtikels', function ($subquery) use ($selectedTagArtikel) {
                    $subquery->where('nama', $selectedTagArtikel);
                });
            }
            
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->back()->with('error_message_not_found', 'Data artikel tidak ditemukan');
        }
        return view('pages.client.artikel.detail', compact('detailArtikel','allCategories','allTags', 'recentArtikel', 'nextArtikel', 'previousArtikel', 'selectedCategoryArtikel','selectedTagArtikel'));
    }

    public function postComment(Request $request, string $slug)
    {
        $data = $request->all();
        try {
            $artikel = ArticleModel::where('slug', $slug)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->back()->with('error_message_not_found', 'Data artikel tidak ditemukan');
        }

        $rules = [
            'content' => 'required',
        ];

        $customMessages = [
            'content.required' => 'Kolom komentar tidak boleh kosong!!!',
        ];

        $this->validate($request, $rules, $customMessages);

        // try {
            $comment = new CommentModel();
            $comment->content = $data['content'];
            $comment->artikel_id = $artikel->id;
            
            if (Auth::guard('admin')->check()) {
                $comment->admin_id = Auth::guard('admin')->user()->id;
                $comment->psikolog_id = null;
                $comment->mahasiswa_id = null;
            } elseif (Auth::guard('psikolog')->check()) {
                $comment->psikolog_id = Auth::guard('psikolog')->user()->id;
                $comment->admin_id = null;
                $comment->mahasiswa_id = null;
            } elseif (Auth::guard('mahasiswa')->check()) {
                $comment->mahasiswa_id = Auth::guard('mahasiswa')->user()->id;
                $comment->admin_id = null;
                $comment->psikolog_id = null;
            } else {
                $comment->anonymous_account = 'Anonymous Account';
                $comment->mahasiswa_id = null;
                $comment->admin_id = null;
                $comment->psikolog_id = null;
            }
            $comment->save();

            Session::flash('success_message_create', 'Berhasil publish komentar');
            return redirect()->back();
        // } catch (QueryException $e) {
        //     // Handle the integrity constraint violation exception (duplicate entry)
        //     if ($e->getCode() === 23000) {
        //         // Duplicate entry error
        //         $errorMessage = 'Upppss Terjadi Kesalahan. Silahkan Ulangi Lagi.';
        //     } else {
        //         // Other database-related errors
        //         $errorMessage = 'Upppss Terjadi Kesalahan. Silahkan Ulangi Lagi.';
        //     }

        //     return redirect()->back()->withInput()->withErrors([$errorMessage]);
        // }
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}