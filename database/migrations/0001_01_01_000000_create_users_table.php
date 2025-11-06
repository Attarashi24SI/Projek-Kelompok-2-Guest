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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // kolom id auto increment
            $table->string('name', 100);
            $table->string('email', 100)->unique();
            $table->string('password');
            $table->timestamps(); // kolom created_at & updated_at
        });


        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email')->primary();
            $table->string('token');
            $table->timestamp('created_at')->nullable();
        });


        Schema::create('sessions', function (Blueprint $table) {
            $table->string('id')->primary(); // ID session unik
            $table->foreignId('user_id')->nullable()->index(); // ID user yang sedang login
            $table->string('ip_address', 45)->nullable(); // alamat IP user
            $table->text('user_agent')->nullable(); // info browser user
            $table->longText('payload'); // isi session (data serialized)
            $table->integer('last_activity')->index(); // waktu terakhir aktif
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('password_reset_tokens');
        Schema::dropIfExists('sessions');
    }
};
