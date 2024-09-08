<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentalHealthOptionModel extends Model
{
    use HasFactory;

    protected $table = 'mental_health_options';

    protected $fillable = ['mental_health_question_id', 'option_text', 'value'];

    public function mentalHealthQuestion()
    {
        return $this->belongsTo(MentalHealthQuestionModel::class);
    }

    public function mentalHealthAnswers()
    {
        return $this->hasMany(MentalHealthAnswerModel::class);
    }
}
