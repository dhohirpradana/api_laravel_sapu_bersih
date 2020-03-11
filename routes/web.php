<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::group(["middleware" => ["auth"]], function() {
    
    Route::get('/',     'HomeController@index')->name('home');
    Route::get('/home', 'HomeController@index')->name('home');
    /**
     * pegawai
     */
    Route::get('/pegawai',              "PegawaiController@index");
    Route::get('/pegawai/create',       "PegawaiController@create");
    Route::post('/pegawai/create',      "PegawaiController@store");
    Route::get('/pegawai/{id}',         "PegawaiController@show");
    Route::get('/pegawai/{id}/edit',    "PegawaiController@edit");
    Route::put('/pegawai/{id}',         "PegawaiController@update");
    Route::delete('/pegawai/{id}',      "PegawaiController@destroy");

    Route::get('/jadwal',               "JadwalController@index");
    Route::get('/jadwal/{id}/edit',     "JadwalController@edit");
    Route::put('/jadwal/{id}',          "JadwalController@update");
        
    Route::get('/kehadiran',                  "KehadiranController@index");
    Route::get('/kehadiran/terkini',          "KehadiranController@terkini");
    Route::get('/kehadiran/terkini/json',     "KehadiranController@terkini_json");
    Route::get('/kehadiran/export',           "KehadiranController@export");
    
    Route::get('/pegawai/riwayat',   function () {
         return view('pegawai.riwayat'); 
    });
    Route::get('/pegawai/show',   function () {
         return view('pegawai.show'); 
    });
    
});

// Route::get('/', function () { return view('welcome'); });
// Route::get('/', function () { return view('welcome'); });

Auth::routes();
