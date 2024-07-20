<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MeditasiModel extends Model
{
    use HasFactory;
    protected $table = 'meditasis';
    protected $primaryKey = 'id';
    protected $guarded = [];
}