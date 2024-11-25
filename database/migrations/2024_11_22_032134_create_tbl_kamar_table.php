<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('tbl_kamar', function (Blueprint $table) {
            $table->bigIncrements('id_kamar');
            $table->string('kd_kamar', 15);
            $table->string('no_kamar', 5);
            $table->string('jenis', 30);
            $table->text('fasilitas');
            $table->double('harga');
            $table->integer('stok');
            $table->text('foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_kamar');
    }
};
