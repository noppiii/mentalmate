<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomMeeting extends Model
{
    use HasFactory;
    protected $table = 'zoom_meetings';
    protected $primaryKey = 'id';
    protected $fillable = [
        'meeting_id',
        'topic',
        'agenda',
        'link',
        'type',
        'duration',
        'timezone',
        'password',
        'start_time',
        'template_id',
        'pre_schedule',
        'schedule_for',
        'konsultasi_id'
    ];

    public function konsultasi()
    {
        return $this->belongsTo(KonsultasiModel::class, 'konsultasi_id');
    }

    public function settings()
    {
        return $this->hasMany(ZoomMeetingSetting::class);
    }
}