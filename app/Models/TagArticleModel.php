<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagArticleModel extends Model
{
    use HasFactory;
    protected $table = 'tag_artikels';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function artikels()
    {
        return $this->belongsToMany(ArticleModel::class, 'tag_artikel_mappings', 'tag_artikel_id', 'artikel_id');
    }
}