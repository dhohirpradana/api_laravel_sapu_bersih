<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jadwal;

class JadwalController extends Controller
{
    public function index()
    {
        $jadwal = Jadwal::get();
        return view("jadwal.index", compact("jadwal"));
    }

    public function edit($id)
    {
        $jadwal = Jadwal::where("id", $id)->first();
        if(empty($jadwal)) abort(404);
        return view("jadwal.edit", compact("jadwal"));
    }

    public function update(Request $request, $id)
    {
        $jadwal = Jadwal::where("id", $id)->first();
        $jadwal->update([
            "jam_mulai"         => $request->jam_mulai,
            "jam_selesai"       => $request->jam_selesai,
            "lembur_mulai"      => $request->lembur_mulai,
            "lembur_selesai"    => $request->lembur_selesai,
            "status"            => ($request->status == "on") ? 1 : 0,
        ]);
        
        return redirect("/jadwal")->with("msg", "jadwal $jadwal->nama_hari telah di edit");
    }
}
