<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryArticleModel;
use App\Models\TagArticleModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class ClientArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $paginateArtikel = ArticleModel::orderBy('created_at', 'asc')->paginate(1);
        $allCategories = CategoryArticleModel::all();
        $allTags = TagArticleModel::all();
        $recentArtikel = ArticleModel::orderBy('created_at', 'asc')->take(3)->get();
        return view('pages.client.artikel.index', compact('paginateArtikel', 'allCategories', 'allTags', 'recentArtikel'));
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
    public function show(string $slug)
    {
        try {
            $detailArtikel = ArticleModel::where('slug', $slug)
                ->firstOrFail();
                $allCategory = CategoryArticleModel::all();
                $allTag = TagArticleModel::all();
            $recentArtikel = ArticleModel::orderBy('created_at', 'asc')->take(3)->get();
            $nextArtikel = ArticleModel::where('created_at', '>', $detailArtikel->created_at)
                ->orderBy('created_at', 'asc')
                ->first();
            $previousArtikel = ArticleModel::where('created_at', '<', $detailArtikel->created_at)
            ->orderBy('created_at', 'desc')
            ->first();
        } catch (ModelNotFoundException $e) {
            // Handle not found exception
            return redirect()->back()->with('error_message_not_found', 'Data artikel tidak ditemukan');
        }
        return view('pages.client.artikel.detail', compact('detailArtikel','allCategory','allTag', 'recentArtikel', 'nextArtikel', 'previousArtikel'));
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