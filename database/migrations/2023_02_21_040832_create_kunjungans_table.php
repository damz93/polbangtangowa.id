<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateKunjungansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('kunjungans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_kunjungan');
            $table->string('nik');
            $table->string('nama');
            $table->string('jenis_kelamin');
            $table->string('pekerjaan');
            $table->string('asal_instansi');
            $table->string('alamat');
            $table->string('email');
            $table->string('bertemu_dengan');
            $table->string('jenis_keperluan');
            $table->string('status');
            $table->text('foto');
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
        Schema::dropIfExists('kunjungans');
    }
}
