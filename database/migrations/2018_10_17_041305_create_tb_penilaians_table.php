<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTbPenilaiansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tb_penilaians', function (Blueprint $table) {
           

           
            $table->string('nip', 30)->primary();
            $table->string('tahun');
            $table->string('bulan');
            $table->string('jumlah_hari_kerja');
            $table->string('hadir');
            $table->string('izin');
            $table->string('sakit');
            $table->string('cuti');
            $table->string('tanpa_alasan_sah');
            $table->string('terlambat');
            $table->string('cepat_pulang');
            $table->string('uwas');
            $table->string('upacara');
            $table->string('wirid');
            $table->string('apel');
            $table->string('senam');
            $table->string('orientasi_pelayanan');
            $table->string('integritas');
            $table->string('kerja_sama');
            $table->string('kepemimpinan');
            $table->string('lkh');
            $table->string('sop');
            $table->string('skp');

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
        Schema::dropIfExists('tb_penilaians');
    }
}
