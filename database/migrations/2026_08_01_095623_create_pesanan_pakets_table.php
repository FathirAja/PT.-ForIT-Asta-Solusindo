<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pesanan_pakets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('paket_id')->constrained()->onDelete('cascade');
            $table->string('nama');
            $table->string('email');
            $table->string('telepon');
            $table->text('alamat');
            $table->text('catatan')->nullable();
            $table->enum('status', ['baru', 'diproses', 'selesai', 'batal'])->default('baru');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pesanan_pakets');
    }
};
