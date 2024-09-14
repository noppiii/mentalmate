<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthAnswerModel;
use App\Models\MentalHealthOptionModel;
use App\Models\MentalHealthResultModel;
use App\Models\MentalHealthTestModel;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        try {
            $mahasiswaId = Auth::guard('mahasiswa')->user()->id;
//            dd($mahasiswaId);
            $totalScore = 0;

            $result = MentalHealthResultModel::create([
                'mahasiswa_id' => $mahasiswaId,
                'mental_health_test_id' => $idTest,
                'total_score' => 0,
            ]);

            foreach ($request->all() as $key => $value) {
                if (strpos($key, 'question_') === 0) {
                    $questionId = str_replace('question_', '', $key);

                    $option = MentalHealthOptionModel::where('mental_health_question_id', $questionId)
                        ->where('value', $value)
                        ->first();

                    if ($option) {
                        MentalHealthAnswerModel::create([
                            'mental_health_result_id' => $result->id,
                            'mental_health_question_id' => $questionId,
                            'mental_health_option_id' => $option->id,
                        ]);

                        $totalScore += $option->value;
                    }
                }
            }

            $result->update([
                'total_score' => $totalScore,
            ]);

            return redirect()->route('mahasiswa.test-kesehatan-mental')->with('success_message_update', 'Data Test Berhasil Di Submit!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'An error occurred while submitting the test. Please try again.');
        }
    }

}
