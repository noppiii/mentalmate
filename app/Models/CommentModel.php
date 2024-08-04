<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CommentModel extends Model
{
    use HasFactory;
    protected $table = 'artikel_comments';
    protected $primaryKey = 'id';
    protected $guarded = [];

    public function artikel()
    {
        return $this->belongsTo(ArticleModel::class, 'artikel_id');
    }

    public function admin()
    {
        return $this->belongsTo(AdminModel::class, 'admin_id');
    }

    public function mahasiswa()
    {
        return $this->belongsTo(MahasiswaModel::class, 'mahasiswa_id');
    }

    public function psikolog()
    {
        return $this->belongsTo(PsikologModel::class, 'psikolog_id');
    }
}