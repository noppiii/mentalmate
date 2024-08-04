<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    use HasFactory;
    protected $table = 'artikels';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function psikolog()
    {
        return $this->belongsTo(PsikologModel::class);

    }
    public function admin()
    {
        return $this->belongsTo(AdminModel::class);
    }

    public function kategoriArtikels()
    {
        return $this->belongsToMany(CategoryArticleModel::class, 'category_artikel_mappings', 'artikel_id', 'kategori_artikel_id');
    }

    public function tagArtikels()
    {
        return $this->belongsToMany(TagArticleModel::class, 'tag_artikel_mappings', 'artikel_id', 'tag_artikel_id');
    }

    public function comments()
    {
        return $this->hasMany(CommentModel::class, 'artikel_id');
    }
}