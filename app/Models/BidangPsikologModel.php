<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BidangPsikologModel extends Model
{
    use HasFactory;

    protected $table = 'bidang_psikologs';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function psikologs()
    {
        return $this->belongsToMany(PsikologModel::class, 'bidang_psikolog_mappings', 'bidang_psikolog_id', 'psikolog_id');
    }

    public function detailPsikologs()
    {
        return $this->belongsToMany(DetailPsikologModel::class, 'bidang_psikolog_mappings', 'bidang_psikolog_id', 'detail_psikolog_id');
    }
}
