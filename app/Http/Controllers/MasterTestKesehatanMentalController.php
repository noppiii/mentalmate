<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthTestModel;
use Illuminate\Http\Request;

class MasterTestKesehatanMentalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        $testQuery = MentalHealthTestModel::withCount(['mentalHealthQuestions', 'mentalHealthResults'])
            ->with(['mentalHealthResults' => function ($query) {
                $query->select('mental_health_test_id')
                    ->selectRaw('AVG(total_score) as avg_score');
            }]);

        if ($search) {
            $testQuery->where('name', 'LIKE', '%' . $search . '%');
        }

        $allTest = $testQuery->paginate(10);

        return view('pages.admin.tes.index', compact('search', 'allTest'));
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
