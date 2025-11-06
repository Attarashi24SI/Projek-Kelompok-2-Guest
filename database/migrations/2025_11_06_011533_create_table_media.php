<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->bigIncrements('media_id');              // Primary key
            $table->string('ref_table');                    // Nama tabel referensi (string)
            $table->unsignedBigInteger('ref_id');           // ID referensi, foreign key biasanya bigint
            $table->string('file_url');                     // URL file/media
            $table->string('caption')->nullable();          // Caption, boleh kosong
            $table->string('mime_type')->nullable();        // Tipe MIME, boleh kosong
            $table->integer('sort_order')->default(0);      // Urutan, default 0
            $table->timestamps();                           // created_at & updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('table_media');
    }
};
