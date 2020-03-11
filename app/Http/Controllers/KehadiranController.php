<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Place;
use App\User;
use PDF;
use App\Exports\KehadiranExport;
use Maatwebsite\Excel\Facades\Excel;
use DataTables;


class KehadiranController extends Controller
{
    public function index(Request $request)
    {
        $mulai      = urlencode($request->mulai);
        $selesai    = urlencode($request->selesai);
        $waktu      = urlencode($request->waktu);

        if(!empty($mulai) && !empty($selesai) && !empty($waktu)){
            switch ($request->input("action")) {
                case 'cari':
                    if ($waktu == "pagi"){
                        $user = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 0 );
                        }])->where("role", 1)->get();                 
                    }
                    else{
                        $user = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 1 );
                        }])->where("role", 1)->get();         
                    }
                    return view("kehadiran.index", compact(["user", "mulai", "selesai"]));
                break;            
                case 'cetak':
                    if ($waktu == "pagi"){
                        $waktu = "Pagi";
                        $data = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 0);
                        }])->where("role", 1)->get();         
                    }
                    else{
                        $waktu = "Sore";
                        $data = User::with(["kehadirans" => function($query) use($mulai, $selesai, $waktu){
                            $query->whereBetween("time", [date($mulai." ". "00:00:00"), date($selesai. " "."23:59:59")])->where("status", 1);
                        }])->where("role", 1)->get();         
                    }
                    // $full = $mulai ."sampai" . $selesai;
                    // $pdf = PDF::loadView('cetak.index', compact(["user", "mulai", "selesai"]));
                    // return $pdf->stream("laporan_kehadiran_$full.pdf");
                                        
                    return Excel::download(new KehadiranExport($data, $mulai, $selesai, $waktu), 'Kehadiran.xlsx');
                break;
            default:
                abort(404);
                break;
            }

        }else{
            $mulai      = date('Y-m-d 00:00:00');
            $selesai    = date('Y-m-d 23:59:59');   

            $user = User::with(["kehadirans" => function($query) use($mulai, $selesai){
                $query->whereBetween("time", [date($mulai), date($selesai)])->where("status", 0 );
            }])->where("role", 1)->get();         
            
            return view("kehadiran.index", compact(["user", "mulai", "selesai"]));
        }
        
    }

    public function terkini()
    {
        return view("kehadiran.terkini");
    }

    public function terkini_json()
    {
        $places = Place::with("user")->orderBy("id", "DESC")->get();

        return DataTables::of($places)
            ->addColumn("action", function($row){
                return "<a href='/kehadiran/$row->id' class='btn btn-info'>Lihat</a>";
            })->make(true);
    }

}
