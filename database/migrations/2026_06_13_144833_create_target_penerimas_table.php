<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{ 

    public function up(): void
    {
        Schema::create('target_penerimas', function (Blueprint $table) {
            $table->id('id_target'); // Primary Key sesuai Class Diagram
            $table->string('nama_target'); // Nama panti atau lokasi bencana
            $table->enum('kategori_target', ['Bencana Alam', 'Panti Sosial']); // Pembagian kategori
            $table->text('deskripsi_kebutuhan'); // Detail apa saja yang dibutuhkan
            $table->boolean('status_aktif')->default(true); // Status program aktif/tidak
            $table->string('gambar')->nullable(); // Tambahan banner untuk tampilan di Landing Page
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('target_penerimas');
    }
};