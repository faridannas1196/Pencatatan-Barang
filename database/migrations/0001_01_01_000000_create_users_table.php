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
        Schema::create('users', function (Blueprint $table) {
            $table->id()->primary();
            $table->string('email')->unique();
            $table->string('password');
            $table->integer('NIP');
            $table->string('nama_lengkap');
            $table->string('nama_panggilan');
            $table->string('job');
            $table->enum('jenis_kelamin',['Pria','Wanita']);
            $table->string('ttl');
            $table->string('alamat');
            $table->string('no_telepon');
            $table->string('Foto');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
