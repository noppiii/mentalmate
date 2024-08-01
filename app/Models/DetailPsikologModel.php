<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPsikologModel extends Model
{
    use HasFactory;
    protected $table = 'detail_psikologs';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function psikolog()
    {
        return $this->belongsTo(PsikologModel::class);
    }

    // public function bidangPsikolog()
    // {
    //     return $this->belongsTo(BidangPsikologModel::class);
    // }

    public function metodeKonsultasi()
    {
        return $this->belongsTo(MetodeKonsultasiModel::class);
    }

    public function ulasan()
    {
        return $this->belongsTo(UlasanModel::class);
    }

    public function bidangPsikologs()
    {
        return $this->belongsToMany(BidangPsikologModel::class, 'bidang_psikolog_mappings', 'detail_psikolog_id', 'bidang_psikolog_id');
    }
}