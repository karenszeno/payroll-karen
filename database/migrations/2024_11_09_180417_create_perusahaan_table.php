<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePerusahaanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perusahaan', function (Blueprint $table) {
            $table->bigIncrements('id_perusahaan', 8);
            $table->bigInteger('id_admin')->unsigned();
            $table->foreign('id_admin')->references('id_admin')->on('admin')->onUpdate('cascade')->onDelete('cascade');
            $table->bigInteger('id_admin_payroll_perusahaan')->unsigned();
            $table->foreign('id_admin_payroll_perusahaan')->references('id_admin_payroll_perusahaan')->on('admin_payroll_perusahaan')->onUpdate('cascade')->onDelete('cascade');
            $table->string('nama_perusahaan', 25);
            $table->string('alamat', 100);
            $table->string('email', 50);
            $table->string('telepon', 12);
            $table->bigInteger('jumlah_karyawan');
            $table->bigInteger('jumlah_dana_di_bank');
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
        Schema::dropIfExists('perusahaan');
    }
}
