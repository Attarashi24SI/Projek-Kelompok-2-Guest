<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('anggota_lembaga', function (Blueprint $table) {
            $table->id('anggota_id');
            $table->unsignedBigInteger('lembaga_id');
            $table->unsignedInteger('warga_id'); 
            $table->unsignedBigInteger('jabatan_id');
            $table->date('tgl_mulai');
            $table->date('tgl_selesai')->nullable();
            $table->timestamps();

            // FK: warga
            $table->foreign('warga_id')
                ->references('warga_id')->on('warga')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // FK: lembaga (bigint)
            $table->foreign('lembaga_id')
                ->references('lembaga_id')->on('lembaga')
                ->onDelete('cascade')
                ->onUpdate('cascade');

            // FK: jabatan_lembaga (bigint)
            $table->foreign('jabatan_id')
                ->references('jabatan_id')->on('jabatan_lembaga')
                ->onDelete('cascade')
                ->onUpdate('cascade');
        });

    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('anggotalembaga');
    }
};
