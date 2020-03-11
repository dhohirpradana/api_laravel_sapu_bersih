<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('no_thl')->unique();
            $table->string('name');
            $table->string('password');
            $table->integer('role')->default(1);
            /**
             * admin   3  
             * kepala  2
             * pegawai 1
             */
            $table->date('tmt_pengangkatan_pertama')->nullable();
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tingkat_pendidikan_terakhir')->nullable();
            $table->string('jurusan_pendidikan_terakhir')->nullable();
            $table->string('jabatan')->nullable();
            $table->string('status_tenaga')->nullable();
            $table->string('unit_kerja')->nullable();
            $table->text('keterangan')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
