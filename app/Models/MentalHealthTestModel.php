<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentalHealthTestModel extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description'];

    public function mentalHealthQuestions()
    {
        return $this->hasMany(MentalHealthQuestionModel::class);
    }

    public function mentalHealthResults()
    {
        return $this->hasMany(MentalHealthResultModel::class);
    }
}
