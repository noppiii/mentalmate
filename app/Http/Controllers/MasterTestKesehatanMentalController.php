<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthTestModel;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

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
                    ->selectRaw('AVG(total_score) as avg_score')
                    ->groupBy('mental_health_test_id');
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
        return view('pages.admin.tes.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
//        dd($request->all());

        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'questions' => 'required|array',
            'questions.*.question_text' => 'required|string',
            'questions.*.options' => 'nullable|array',
            'questions.*.options.*.option_text' => 'required_with:questions.*.options|string',
            'questions.*.options.*.value' => 'required_with:questions.*.options|numeric',
        ]);

        try {
            DB::transaction(function () use ($request) {
                $test = MentalHealthTestModel::create([
                    'name' => $request->input('name'),
                    'description' => $request->input('description'),
                ]);

                foreach ($request->input('questions') as $questionData) {
                    if (!isset($questionData['question_text'])) {
                        continue;
                    }

                    $question = $test->mentalHealthQuestions()->create([
                        'question_text' => $questionData['question_text'],
                    ]);

                    if (isset($questionData['options'])) {
                        foreach ($questionData['options'] as $optionData) {
                            if (isset($optionData['option_text']) && isset($optionData['value'])) {
                                $question->mentalHealthOptions()->create([
                                    'option_text' => $optionData['option_text'],
                                    'value' => $optionData['value'],
                                ]);
                            }
                        }
                    }
                }
            });

            Session::flash('success_message_create', 'Data tes berhasil disimpan');
            return redirect()->route('test-kesehatan-mental.index');
        } catch (QueryException $e) {
            if ($e->getCode() === '23000') {
                $errorMessage = 'Upss terjadi kesalahan';
            } else {
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
