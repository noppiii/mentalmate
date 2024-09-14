<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthResultModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MahasiswaHasilTesController extends Controller
{
    public function index()
    {
        $mahasiswaId = Auth::guard('mahasiswa')->user()->id;

        $testResults = MentalHealthResultModel::with(['mentalHealthTest', 'mentalHealtAnswers.mentalHealthQuestion', 'mentalHealtAnswers.mentalHealthOption'])
            ->where('mahasiswa_id', $mahasiswaId)
            ->get();

        $latestTest = MentalHealthResultModel::with('mentalHealthTest:name,id')
            ->where('mahasiswa_id', $mahasiswaId)
            ->latest()
            ->select('mental_health_test_id', 'total_score')
            ->first();

//        dd($testResults->toArray());
        return view('pages.mahasiswa.test-mental.hasil-tes', compact('testResults','latestTest'));
    }

}
