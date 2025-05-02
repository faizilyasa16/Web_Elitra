<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jawaban_soal', function (Blueprint $table) {
            $table->id();
            $table->foreignId('soal_lowongan_id')->constrained('soal_lowongan')->onDelete('cascade');
            $table->foreignId('customer_id')->constrained('customer'); // atau 'customer_id' kalau customer = pelamar
            $table->text('jawaban');
            $table->string('letter')->nullable();
            $table->string('pendidikan');
            $table->string('foto_ktp');
            $table->string('harapan_gaji');
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
        Schema::dropIfExists('jawaban_soal');
    }
};
