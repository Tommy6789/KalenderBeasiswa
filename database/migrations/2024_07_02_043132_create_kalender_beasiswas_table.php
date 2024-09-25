<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('kalender_beasiswas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_user');
            $table->date('tanggal_registrasi');
            $table->date('deadline');
            $table->string('judul');
            $table->string('deskripsi');
            $table->string('jurusan');
            $table->string('jenis_beasiswa');
            $table->string('keuntungan');
            $table->string('umur');
            $table->string('gpa');
            $table->string('tes_english');
            $table->string('tes_bahasa_lain');
            $table->string('tes_standard');
            $table->string('dokumen');
            $table->string('lainnya');
            $table->string('link');
            $table->enum('status_tampil',['1','0'] );
            $table->timestamps();
            $table->softDeletes();

            $table->foreign('id_user')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kalender_beasiswas');
    }
};
