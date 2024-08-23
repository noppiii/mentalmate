<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PembayaranModel extends Model
{
    use HasFactory;
    protected $table = 'pembayarans';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class);
    }

    public function konsultasi()
    {
        return $this->belongsTo(KonsultasiModel::class);
    }
}
