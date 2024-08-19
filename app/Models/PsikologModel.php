<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class PsikologModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'psikologs';
    protected $primaryKey = 'id';
    protected $guarded = [];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    public function getAuthIdentifierName()
    {
        return 'id';
    }

    public function getAuthIdentifier()
    {
        return $this->getKey();
    }

    public function getAuthPassword()
    {
        return $this->password;
    }

    public function getRememberToken()
    {
        return $this->{$this->getRememberTokenName()};
    }

    public function setRememberToken($value)
    {
        $this->{$this->getRememberTokenName()} = $value;
    }

    public function getRememberTokenName()
    {
        return 'remember_token';
    }

    public static function clientID()
    {
        return 'zoom_client_of_user';
    }

    public static function clientSecret()
    {
        return 'zoom_client_secret_of_user';
    }

    public static function accountID()
    {
        return 'zoom_account_id_of_user';
    }

     // Relasi dengan tabel psikolog_favorits
     public function psikologFavorits()
     {
         return $this->hasMany(PsikologFavoritModel::class,'psikolog_id');
     }

     // Relasi dengan tabel artikels
     public function artikels()
     {
         return $this->hasMany(ArticleModel::class);
     }

    // Relasi dengan tabel detail_psikologs
    public function detailPsikologs()
    {
        return $this->hasMany(DetailPsikologModel::class, 'psikolog_id');
    }

     // Relasi dengan tabel riwayat_sesi_konsultasis
     public function riwayatSesiKonsultasis()
     {
         return $this->hasMany(RiwayatSesiKonsultasiModel::class);
     }

     // Relasi dengan tabel konsultasis
     public function konsultasis()
     {
         return $this->hasMany(KonsultasiModel::class);
     }

    //  public function bidangPsikologs()
    //  {
    //      return $this->belongsToMany(BidangPsikologModel::class, 'bidang_psikolog_mappings', 'psikolog_id', 'bidang_psikolog_id');
    //  }

    public function comments()
    {
        return $this->hasMany(CommentModel::class, 'psikolog_id');
    }

    public function sentMessages()
    {
        return $this->morphMany(Message::class, 'sender');
    }

    public function receivedMessages()
    {
        return $this->morphMany(Message::class, 'receiver');
    }

}
