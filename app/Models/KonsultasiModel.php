<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KonsultasiModel extends Model
{
    use HasFactory;
    protected $table = 'konsultasis';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class);
    }

    public function psikolog()
    {
        return $this->belongsTo(PsikologModel::class);
    }

    public function zoomMeeting()
    {
        return $this->hasOne(ZoomMeeting::class, 'konsultasi_id');
    }
}