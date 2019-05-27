<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateJadwalsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwals', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->date('tgl_wawan')->nullable();
            $table->time('jam_wawan')->nullable();
            $table->string('tmpt_wawan',50)->nullable();
            $table->string('pewawancara',50)->unique()->nullable();
            $table->integer('status')->default(0);
            $table->boolean('tgl_wawan_terbesar')->default(0);
            $table->integer('user_id')->nullable()->unsigned();
            $table->integer('divisi_id')->nullable()->unsigned();
            $table->integer('acara_id')->unsigned();
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
        Schema::dropIfExists('jadwals');
    }
}
