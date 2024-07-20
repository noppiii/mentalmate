<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PsikologFavoritModel extends Model
{
    use HasFactory;
    protected $table = 'psikolog_favorits';
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
}