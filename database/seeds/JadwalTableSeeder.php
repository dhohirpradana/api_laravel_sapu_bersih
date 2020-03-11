<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class JadwalTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table("jadwals")->insert([
            [
                "nama_hari"         => "Senin",
                "nama_lain"         => "Monday",
                "jam_mulai"         => "08:00:00",
                "jam_selesai"       => "12:00:00",
                "lembur_mulai"      => "14:00:00",
                "lembur_selesai"    => "16:00:00",
                "status"            => 1
            ],
            [
                "nama_hari"         => "Selasa",
                "nama_lain"         => "Tuesday",
                "jam_mulai"         => "08:00:00",
                "jam_selesai"       => "12:00:00",
                "lembur_mulai"      => "14:00:00",
                "lembur_selesai"    => "16:00:00",
                "status"            => 1
            ],
            [
                "nama_hari"         => "Rabu",
                "nama_lain"         => "Wednesday",
                "jam_mulai"         => "08:00:00",
                "jam_selesai"       => "12:00:00",
                "lembur_mulai"      => "14:00:00",
                "lembur_selesai"    => "16:00:00",
                "status"            => 1
            ],
            [
                "nama_hari"         => "Kamis",
                "nama_lain"         => "Thursday",
                "jam_mulai"         => "08:00:00",
                "jam_selesai"       => "12:00:00",
                "lembur_mulai"      => "14:00:00",
                "lembur_selesai"    => "16:00:00",
                "status"            => 1
            ],
            [
                "nama_hari"         => "Jum'at",
                "nama_lain"         => "Friday",
                "jam_mulai"         => "08:00:00",
                "jam_selesai"       => "12:00:00",
                "lembur_mulai"      => "14:00:00",
                "lembur_selesai"    => "16:00:00",
                "status"            => 1
            ],
            [
                "nama_hari"         => "Sabtu",
                "nama_lain"         => "Saturday",
                "jam_mulai"         => null,
                "jam_selesai"       => null,
                "lembur_mulai"      => null,
                "lembur_selesai"    => null,
                "status"            => 0
            ],
            [
                "nama_hari"         => "Minggu",
                "nama_lain"         => "Sunday",
                "jam_mulai"         => null,
                "jam_selesai"       => null,
                "lembur_mulai"      => null,
                "lembur_selesai"    => null,
                "status"            => 0
            ],
        ]);
    }
}
