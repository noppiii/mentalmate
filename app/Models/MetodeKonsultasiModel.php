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
}