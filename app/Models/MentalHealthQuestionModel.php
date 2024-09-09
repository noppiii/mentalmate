<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class MentalHealthQuestionModel extends Model
{
    use HasFactory;

    protected $table = 'mental_health_questions';

    protected $fillable = ['mental_health_test_id', 'question_text'];

    public function mentalHealthTest()
    {
        return $this->belongsTo(MentalHealthTestModel::class, 'mental_health_test_id');
    }

    public function mentalHealthOptions()
    {
        return $this->hasMany(MentalHealthOptionModel::class, 'mental_health_question_id');
    }

    public function mentalHealtAnswers()
    {
        return $this->hasMany(MentalHealthAnswerModel::class);
    }

}
