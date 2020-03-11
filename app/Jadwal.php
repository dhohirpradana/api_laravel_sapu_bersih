<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    protected $fillable = [
        "nama_hari", "nama_lain",
        "jam_mulai", "jam_selesai", 
        "lembur_mulai", "lembur_selesai", 
        "status"
    ];
}
