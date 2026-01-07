<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rw', function (Blueprint $table) {
            $table->id('rw_id'); // BIGINT — ini aman karena bukan FK
            $table->string('nomor_rw', 10);

            // FK harus cocok dengan warga_id (INT)
            $table->unsignedInteger('ketua_rw_warga_id')->nullable();

            $table->text('keterangan')->nullable();
            $table->timestamps();

            // Foreign key ke warga
            $table->foreign('ketua_rw_warga_id')
                ->references('warga_id')
                ->on('warga')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rw');
    }
};
