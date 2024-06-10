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
        Schema::create('obat_gudang', function (Blueprint $table) {
            $table->id();
            $table->string('nama_obat');
            $table->integer('harga_obat');
            $table->integer('jumlah_stok')->nullable();
            $table->enum('jenis',['obat','bahan','alat']);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('obat_gudang');
    }
};
