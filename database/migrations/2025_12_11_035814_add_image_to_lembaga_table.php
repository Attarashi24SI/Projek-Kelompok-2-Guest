<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddImageToLembagaTable extends Migration
{
    public function up()
    {
        Schema::table('lembaga', function (Blueprint $table) {
            $table->string('image')->nullable()->after('kontak');
        });
    }

    public function down()
    {
        Schema::table('lembaga', function (Blueprint $table) {
            $table->dropColumn('image');
        });
    }
}
