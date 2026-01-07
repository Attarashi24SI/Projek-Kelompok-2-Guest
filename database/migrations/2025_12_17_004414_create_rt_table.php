<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rt', function (Blueprint $table) {
            $table->id('rt_id'); // BIGINT, aman

            // rw_id tetap BIGINT karena tabel rw memakai id()
            $table->unsignedBigInteger('rw_id');

            $table->string('nomor_rt', 10);

            // FK ke warga harus INT UNSIGNED, bukan BIGINT
            $table->unsignedInteger('ketua_rt_warga_id')->nullable();

            $table->text('keterangan')->nullable();
            $table->timestamps();

            // FK ke RW
            $table->foreign('rw_id')
                ->references('rw_id')
                ->on('rw')
                ->cascadeOnDelete();

            // FK ke warga (ketua RT)
            $table->foreign('ketua_rt_warga_id')
                ->references('warga_id')
                ->on('warga')
                ->nullOnDelete();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rt');
    }
};
