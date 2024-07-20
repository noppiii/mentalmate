<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UlasanModel extends Model
{
    use HasFactory;
    protected $table = 'ulasans';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class);
    }
}