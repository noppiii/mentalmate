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
        return $this->belongsTo(MentalHealthTestModel::class);
    }

    public function mentalHealtOptions()
    {
        return $this->hasMany(MentalHealthOptionModel::class);
    }

    public function mentalHealtAnswers()
    {
        return $this->hasMany(MentalHealthAnswerModel::class);
    }

}
