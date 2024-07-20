<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RiwayatKonsultasiModel extends Model
{
    use HasFactory;
    protected $table = 'riwayat_konsultasis';
    protected $primaryKey = 'id';
    protected $guarded = [];
}