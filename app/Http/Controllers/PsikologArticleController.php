<?php

namespace App\Http\Controllers;

use App\Models\ArticleModel;
use App\Models\CategoryArticleModel;
use App\Models\TagArticleModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PsikologArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $psikologId = Auth::guard('psikolog')->user()->id;
        $artikels = ArticleModel::where('psikolog_id', $psikologId)->get();
        return view('pages.psikolog.artikel.index', compact('artikels'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         $allCategory = CategoryArticleModel::all();
        $allTag = TagArticleModel::all();
        return view('pages.psikolog.artikel.create', compact('allCategory', 'allTag'));
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