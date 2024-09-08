<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentalHealthResultModel extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'mental_health_test_id', 'total_score'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function mentalHealthTest()
    {
        return $this->belongsTo(MentalHealthTestModel::class);
    }

    public function mentalHealtAnswers()
    {
        return $this->hasMany(MentalHealthAnswerModel::class);
    }
}
