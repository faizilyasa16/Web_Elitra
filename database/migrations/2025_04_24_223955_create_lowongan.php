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
        Schema::create('lowongan', function (Blueprint $table) {
            $table->id();
            $table->string('img');
            $table->string('posisi');
            $table->string('alamat');
            $table->enum('tipe', ['fulltime', 'parttime', 'freelance']);
            $table->string('pendidikan');
            $table->string('gaji');
            $table->enum('status', ['Public', 'Blok'])->default('Blok'); // ← Tambah default
            $table->string('perusahaan');
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
        Schema::dropIfExists('lowongan');
    }
};
