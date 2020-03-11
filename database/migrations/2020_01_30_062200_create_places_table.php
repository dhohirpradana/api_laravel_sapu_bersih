<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('places', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('image');
            $table->string('latitude');
            $table->string('longtitude');
            $table->dateTime('time');
            $table->text('lokasi');            
            $table->tinyInteger('status')->default(0);
            /**
             * 0 kerja 
             * 1 lembur
             */
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('user_id')->references("id")->on("users");
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('places');
    }
}
