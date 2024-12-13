<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKaryawanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('karyawan', function (Blueprint $table) {
            $table->bigIncrements('id_karyawan');
            $table->bigInteger('id_perusahaan')->unsigned();
            $table->foreign('id_perusahaan')->references('id_perusahaan')->on('perusahaan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_perusahaan', 25);
            $table->string('nama_karyawan', 50);
            $table->string('email', 50);
            $table->string('jabatan', 20);
            $table->bigInteger('gaji_pokok');
            $table->string('nama_bank', 20);
            $table->string('no_rekening', 20);
            $table->date('tanggal_penggajian');
            $table->timestamp('tgl_buat')->useCurrent();
            $table->timestamp('tgl_update')->useCurrent()->useCurrentOnUpdate();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('karyawan'); // Menghapus tabel jika migrasi dibatalkan
    }
}
