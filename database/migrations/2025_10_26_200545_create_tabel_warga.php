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
        Schema::create('warga', function (Blueprint $table) {
            $table->increments('warga_id');
            $table->string('no_ktp')->unique();
            $table->string('nama', 100);
            $table->enum('gender', ['Pria', 'Wanita'])->nullable();
            $table->string('agama', 100);
            $table->string('pekerjaan');
            $table->string('telp');
            $table->string('email');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tabel_warga');
    }
};
