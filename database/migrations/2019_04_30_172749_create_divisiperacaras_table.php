<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDivisiperacarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('divisiperacaras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('kuotapendaftar')->nullable();
            $table->integer('kuotapenerimaan')->nullable();
            $table->integer('acara_id')->unsigned();
            // $table->foreign('acara_id')->references('id')->on('acaras');
            $table->integer('divisi_id')->unsigned();
            // $table->foreign('divisi_id')->references('id')->on('divisis');
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
        Schema::dropIfExists('divisiperacaras');
    }
}
