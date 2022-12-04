<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWargaModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('warga', function (Blueprint $table) {
            $table->id();
            $table->string('no_ktp', 20)->nullable();
            $table->string('nama', 50)->nullable();
            $table->string('agama', 20)->nullable();
            $table->string('t_lahir', 20)->nullable();
            $table->date('tgl_lahir')->nullable();
            $table->enum('j_kel', ['L', 'W']);
            $table->string('gol_darah', 2)->nullable();
            $table->string('w_negara', 20)->nullable();
            $table->string('pendidikan', 10)->nullable();
            $table->string('pekerjaan', 30)->nullable();
            $table->string('s_nikah', 20)->nullable();
            $table->enum('status', [1, 0])->nullable();
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
        Schema::dropIfExists('warga');
    }
}
