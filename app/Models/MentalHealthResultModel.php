<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentalHealthResultModel extends Model
{
    use HasFactory;

    protected $table = 'mental_health_results';

    protected $fillable = ['mahasiswa_id', 'mental_health_test_id', 'total_score'];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class);
    }

    public function mentalHealthTest()
    {
        return $this->belongsTo(MentalHealthTestModel::class, 'mental_health_test_id');
    }

    public function mentalHealtAnswers()
    {
        return $this->hasMany(MentalHealthAnswerModel::class);
    }
}
