<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSiswasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('siswas', function (Blueprint $table) {
            $table->increments('id');
            $table->string('nis');
            $table->string('nisn');
            $table->string('nama_siswa');
            $table->text('alamat');
            $table->string('no_telp',20);
            $table->string('tempat_lahir',50);
            $table->string('nama_orang_tua',50);
            $table->string('sekolah_asal',100);
            $table->string('nomor_peserta',100);
            $table->date('tahun_lulus');
            $table->string('kepala_sekolah',100);
            $table->string('nomor_ijazah',100);
            $table->string('nilai_rata_rata',50);
            $table->string('nama_jurusan',50);
            $table->text('keterangan');
            $table->string('foto',100);
            $table->string('guru',100);
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
        Schema::dropIfExists('siswas');
    }
}
