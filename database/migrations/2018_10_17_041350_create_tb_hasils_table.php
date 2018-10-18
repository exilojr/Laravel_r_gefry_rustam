<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbHasilsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_hasils', function (Blueprint $table) {

            
            $table->string('nip', 30)->primary();
            $table->string('tpp_maksimal');
            $table->string('tpp_bulan_ini');
            $table->string('kehadiran');
            $table->string('kinerja');
            $table->string('disiplin');
            $table->string('komitmen');
            $table->string('prilaku_kerja');
            $table->string('sasaran_kerja_pegawai');
            $table->string('penilaian_prestasi_kerja');

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
        Schema::dropIfExists('tb_hasils');
    }
}
