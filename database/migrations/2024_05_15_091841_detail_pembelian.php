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
        Schema::create('detail_pembelian', function (Blueprint $table) {
            $table->id();
            $table->integer('id_obat');
            $table->String('nama_obat');
            $table->integer('harga_obat');
            $table->enum('jenis',['obat','bahan','alat']);
            $table->integer('jumlah_stok');
            $table->integer('sub_total');
            $table->integer('id_pembelian');
            $table->String('status');
            $table->timestamps();
            // $table->foreign('id_pembelian')->references('id')->on('pembelian')->onDelete('cascade');
            // $table->foreign('id_obat')->references('id')->on('obat_gudang')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('detail_pembelian');
    }
};
