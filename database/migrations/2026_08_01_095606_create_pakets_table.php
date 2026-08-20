<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('pakets', function (Blueprint $table) {
            $table->id();
            $table->foreignId('layanan_id')->constrained()->onDelete('cascade');
            $table->string('nama_paket');
            $table->string('kecepatan')->nullable();
            $table->decimal('harga', 12, 2)->default(0);
            $table->string('tipe')->default('FTTH');
            $table->string('warna')->default('primary');
            $table->integer('urutan')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pakets');
    }
};
