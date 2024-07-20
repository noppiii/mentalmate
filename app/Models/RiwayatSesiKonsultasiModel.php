<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatSesiKonsultasiModel extends Model
{
    use HasFactory;
    protected $table = 'riwayat_sesi_konsultasis';
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

    public function meditasi()
    {
        return $this->belongsTo(MeditasiModel::class);
    }
}