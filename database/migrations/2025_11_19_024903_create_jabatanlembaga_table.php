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
    Schema::create('jabatan_lembaga', function (Blueprint $table) {
        $table->id('jabatan_id');
        $table->unsignedBigInteger('lembaga_id');
        $table->string('nama_jabatan', 100);
        $table->integer('level')->default(1);
        $table->timestamps();

        // Relasi ke tabel lembaga
        $table->foreign('lembaga_id')
              ->references('lembaga_id')->on('lembaga')
              ->onDelete('cascade')
              ->onUpdate('cascade');
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jabatanlembaga');
    }
};
