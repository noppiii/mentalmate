<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentalHealthAnswerModel extends Model
{
    use HasFactory;

    protected $table = 'mental_health_answers';

    protected $fillable = ['mental_health_result_id', 'mental_health_question_id', 'mental_health_option_id'];

    public function mentalHealthResult()
    {
        return $this->belongsTo(MentalHealthResultModel::class, 'mental_health_result_id');
    }

    public function mentalHealthQuestion()
    {
        return $this->belongsTo(MentalHealthQuestionModel::class, 'mental_health_question_id');
    }

    public function mentalHealthOption()
    {
        return $this->belongsTo(MentalHealthOptionModel::class, 'mental_health_option_id');
    }
}
