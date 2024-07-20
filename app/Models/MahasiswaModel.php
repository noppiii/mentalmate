<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MahasiswaModel extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'mahasiswas';
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

    // Relasi dengan tabel psikolog_favorits
    public function psikologFavorits()
    {
        return $this->hasMany(PsikologFavoritModel::class);
    }

    // Relasi dengan tabel ulasans
    public function ulasans()
    {
        return $this->hasMany(UlasanModel::class);
    }

    // Relasi dengan tabel pembayarans
    public function pembayarans()
    {
        return $this->hasMany(PembayaranModel::class);
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
}