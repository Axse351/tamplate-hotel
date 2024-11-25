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
        Schema::create('tbl_reservasi', function (Blueprint $table) {
            $table->bigIncrements('id_reservasi');
            $table->date('tgl_reservasi');
            $table->string('nm_customer',40);
            $table->string('kd_kamar',15);
            $table->integer('jumlah');
            $table->double('total');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tbl_reservasi');
    }
};
