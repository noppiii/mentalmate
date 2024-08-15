<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ZoomMeetingSetting extends Model
{
    use HasFactory;
    protected $table = 'zoom_meeting_settings';
    protected $primaryKey = 'id';

    protected $fillable = [
        'zoom_meeting_id',
        'join_before_host',
        'host_video',
        'participant_video',
        'mute_upon_entry',
        'waiting_room',
        'audio',
        'auto_recording',
        'approval_type',
    ];

    public function meeting()
    {
        return $this->belongsTo(ZoomMeeting::class);
    }
}