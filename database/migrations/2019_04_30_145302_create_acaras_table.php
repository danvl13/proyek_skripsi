<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAcarasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('acaras', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('nama',50)->unique()->nullable();
            $table->date('tgl_mulai_acara')->nullable();
            $table->date('tgl_selesai_acara')->nullable();
            $table->text('tmpt_acara')->nullable();
            $table->text('keterangan')->nullable();
            $table->decimal('ipkmin',8,2)->nullable();
            $table->integer('status')->default(0);
            $table->integer('user_id')->unsigned();
            $table->integer('kategori_id')->unsigned();
            $table->timestamps();
        });

        // Schema::table('acaras',function (Blueprint $table){
        //     $table->foreign('user_id')->references('id')->on('users');
        //     $table->foreign('kategori_id')->references('id')->on('kategoris');
        // });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('acaras');
        //Schema::table('acaras',function (Blueprint $table){
            //$table->dropForeign('user_id');
            //$table->dropForeign('kategori_id');
        // });
    }
}
