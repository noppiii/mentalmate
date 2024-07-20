<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryArticleModel extends Model
{
    use HasFactory;
    protected $table = 'kategori_artikels';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function artikels()
    {
        return $this->belongsToMany(ArticleModel::class, 'category_artikel_mappings', 'kategori_artikel_id', 'artikel_id');
    }
}