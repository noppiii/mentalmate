<?php

namespace App\Http\Controllers;

use App\Models\MentalHealthTestModel;
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
}
