<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MetodeKonsultasiModel extends Model
{
    use HasFactory;
    protected $table = 'metode_konsultasis';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function psikologs()
    {
        return $this->belongsToMany(PsikologModel::class, 'metode_konsultasi_mappings', 'metode_konsultasi_id', 'psikolog_id');
    }

    public function detailPsikologs()
    {
        return $this->belongsToMany(DetailPsikologModel::class, 'metode_konsultasi_mappings', 'metode_konsultasi_id', 'detail_psikolog_id');
    }
}
