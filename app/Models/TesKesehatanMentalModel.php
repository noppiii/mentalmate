<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TesKesehatanMentalModel extends Model
{
    use HasFactory;
    protected $table = 'tes_kesehatan_mentals';
    protected $primaryKey = 'id';
    protected $guarded = [];
}