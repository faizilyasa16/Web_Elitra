<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pekerja', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('user')->onDelete('cascade');
            $table->string('nama');
            $table->string('posisi_dikontrak');
            $table->date('tanggal_mulai_kontrak');
            $table->date('tanggal_akhir_kontrak');
            $table->string('email')->nullable();
            $table->string('pt')->nullable();
            $table->integer('lama_kontrak')->nullable();
            $table->string('upah_kontrak')->nullable();
    
            // ✅ Enum untuk status_kontrak
            $table->enum('status_kontrak', [
                'Aktif',
                'Selesai'
            ])->nullable();
    
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
        Schema::dropIfExists('pekerja_memiliki_kontrak');
    }
};
