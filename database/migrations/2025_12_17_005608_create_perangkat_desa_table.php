<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('perangkat_desa', function (Blueprint $table) {
            $table->id('perangkat_id'); // BIGINT untuk primary key perangkat, aman

            // FK ke warga harus INT UNSIGNED (bukan BIGINT)
            $table->unsignedInteger('warga_id');

            $table->string('jabatan')->nullable();
            $table->string('nip')->nullable();
            $table->string('kontak')->nullable();

            $table->date('periode_mulai')->nullable();
            $table->date('periode_selesai')->nullable();

            $table->timestamps();

            // Foreign key yang sudah konsisten
            $table->foreign('warga_id')
                ->references('warga_id')
                ->on('warga')
                ->cascadeOnDelete(); // atau nullOnDelete() jika mau
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('perangkat_desa');
    }
};
