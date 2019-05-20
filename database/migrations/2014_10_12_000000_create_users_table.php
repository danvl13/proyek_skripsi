<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->string('nrp',50)->unique();
            $table->string('nama', 50);
            $table->string('prodi', 50);
            $table->integer('tahun');
            $table->string('ttl',100)->nullable();
            $table->string('agama',50)->nullable();
            $table->integer('jnskl')->nullable();
            $table->string('nohp',50)->nullable();
            $table->string('line',50)->nullable();
            $table->string('email',50)->nullable();
            $table->decimal('ipk',8,2)->nullable();
            $table->decimal('jumkp',8,2)->nullable();
            $table->string('hobi',50)->nullable();
            $table->text('motivasi')->nullable();
            $table->text('komitmen')->nullable();
            $table->text('keunggulan')->nullable();
            $table->text('kelemahan')->nullable();
            $table->string('username',50);
            $table->string('password',50);
            $table->string('foto',100)->nullable();
            $table->integer('status');
            $table->timestamp('email_verified_at')->nullable();
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
