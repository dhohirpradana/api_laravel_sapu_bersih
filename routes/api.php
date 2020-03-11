<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::post("/login", "Api\AuthController@login");

Route::group(["middleware" => ["jwt.verify"]], function () {
    Route::post("/presensi", "Api\PresensiController@store");
    Route::post("/lembur",   "Api\PresensiLemburController@store");

    Route::get("/profile",                  "Api\ProfileController@show");
    Route::get("/lokasi_terkini",           "Api\PlaceController@show");
    Route::get("/lokasi_terkini/{id}",      "Api\PlaceController@show_image");
});
