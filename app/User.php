<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Tymon\JWTAuth\Contracts\JWTSubject;

class User extends Authenticatable implements JWTSubject
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'no_thl', 'password', "role", "jabatan",
        'tmt_pengangkatan_pertama', 'tempat_lahir',
        'tanggal_lahir', 'tingkat_pendidikan_terakhir',
        'jurusan_pendidikan_terakhir', 'jabatan',
        'status_tenaga', 'unit_kerja',
        'keterangan'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function getJWTIdentifier()
    {
        return $this->getKey();
    }
    public function getJWTCustomClaims()
    {
        return [];
    }
    
    public function kehadirans()
    {
        return $this->hasMany("App\Place");
    }
}
