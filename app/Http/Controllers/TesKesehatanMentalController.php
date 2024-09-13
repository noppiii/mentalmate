<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthTestModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

class TesKesehatanMentalController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');

        $testQuery = MentalHealthTestModel::query();

        if ($search) {
            $testQuery->where('name', 'LIKE', '%' . $search . '%');
        }

        $allTest = $testQuery->paginate(10);
        return view('pages.mahasiswa.test-mental.index', compact('search', 'allTest'));
    }

    public function displayQuestion($id, $nama)
    {
        try {
            $test = MentalHealthTestModel::with('mentalHealthQuestions.mentalHealthOptions')
                ->where('id', $id)
                ->where('name', str_replace('-', ' ', $nama))
                ->firstOrFail();
//            dd($test->toArray());
        } catch (ModelNotFoundException $e) {
            return redirect()->route('mahasiswa.test-kesehatan-mental')->with('error_message_not_found', 'Data tes kesehatan mental tidak ditemukan');
        }
        return view('pages.mahasiswa.test-mental.test', compact('test'));
    }

    public function submitTest(Request $request, $idTest, $nama)
    {
        // Use dd to inspect the request data
        dd($request->all());

        // Your existing code for handling the form submission
    }

}
