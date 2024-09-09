<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentalHealthTestModel extends Model
{
    use HasFactory;

    protected $table = 'mental_health_tests';

    protected $fillable = ['name', 'description'];

    public function mentalHealthQuestions()
    {
        return $this->hasMany(MentalHealthQuestionModel::class, 'mental_health_test_id');
    }

    public function mentalHealthResults()
    {
        return $this->hasMany(MentalHealthResultModel::class, 'mental_health_test_id');
    }
}
