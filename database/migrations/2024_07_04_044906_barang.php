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
        Schema::create('barang', function (Blueprint $table) {
            $table->id('id_barang');
            $table->string('nama_barang');
            $table->char('harga', 255);
            $table->integer('stok');
            $table->unsignedBigInteger('id_klasifikasi')->nullable();
            $table->timestamps();
            $table->string('foto_barang', 255);

            // Set foreign key
            $table->foreign('id_klasifikasi')->references('id_klasifikasi')->on('klasifikasi')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
