<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\User;

class PegawaiController extends Controller
{
    public function index()
    {
        $users = User::where("role", 1)->get();
        return view("pegawai.index", compact("users"));
    }

    public function create()
    {
        return view("pegawai.create");
    }

    public function store(Request $request)
    {
        // validasi
        $user = User::create([
            "no_thl"                        => $request->no_thl,
            "tmt_pengangkatan_pertama"      => $request->tmt_pengangkatan_pertama,
            "name"                          => $request->name,
            "tempat_lahir"                  => $request->tempat_lahir,
            "tanggal_lahir"                 => $request->tanggal_lahir,
            "tingkat_pendidikan_terakhir"   => $request->tingkat_pendidikan_terakhir,
            "jurusan_pendidikan_terakhir"   => $request->jurusan_pendidikan_terakhir,
            "jabatan"                       => $request->jabatan,
            "status_tenaga"                 => $request->status_tenaga,
            "unit_kerja"                    => $request->unit_kerja,
            "keterangan"                    => $request->keterangan,
            "password"                      => Hash::make($request->password),
        ]);

        return redirect("/pegawai")->with("msg", "Akun Pegawai Berhasil dibuat");
    }

    public function show($id){

        $user = User::findOrFail($id);

        return view("pegawai.show", compact("user"));
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);

        return view("pegawai.edit", compact("user"));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if(empty($user)) abort(404);

        // validasi
        if($request->password != null){
            $user->update([
                "no_thl"                        => $request->no_thl,
                "tmt_pengangkatan_pertama"      => $request->tmt_pengangkatan_pertama,
                "name"                          => $request->name,
                "tempat_lahir"                  => $request->tempat_lahir,
                "tanggal_lahir"                 => $request->tanggal_lahir,
                "tingkat_pendidikan_terakhir"   => $request->tingkat_pendidikan_terakhir,
                "jurusan_pendidikan_terakhir"   => $request->jurusan_pendidikan_terakhir,
                "jabatan"                       => $request->jabatan,
                "status_tenaga"                 => $request->status_tenaga,
                "unit_kerja"                    => $request->unit_kerja,
                "keterangan"                    => $request->keterangan,
                "password"                      => Hash::make($request->password)
            ]);
        }else{
            $user->update([
                "no_thl"                        => $request->no_thl,
                "tmt_pengangkatan_pertama"      => $request->tmt_pengangkatan_pertama,
                "name"                          => $request->name,
                "tempat_lahir"                  => $request->tempat_lahir,
                "tanggal_lahir"                 => $request->tanggal_lahir,
                "tingkat_pendidikan_terakhir"   => $request->tingkat_pendidikan_terakhir,
                "jurusan_pendidikan_terakhir"   => $request->jurusan_pendidikan_terakhir,
                "jabatan"                       => $request->jabatan,
                "status_tenaga"                 => $request->status_tenaga,
                "unit_kerja"                    => $request->unit_kerja,
                "keterangan"                    => $request->keterangan
            ]);
        }
        
        return redirect("/pegawai")->with("msg", $request->nama . " sudah terupdate");
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();

        return redirect("/pegawai")->with("msg", "Pegawai berhasil di hapus");
    }
}
