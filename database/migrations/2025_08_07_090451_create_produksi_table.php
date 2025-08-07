<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProduksiTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('produksi', function (Blueprint $table) {
             $table->id();
            $table->unsignedBigInteger('incoming_id'); // relasi ke tabel incoming
            $table->string('produk_nama');
            $table->integer('jumlah_produksi');
            $table->date('tanggal_produksi');
            $table->string('diproduksi_oleh');
            $table->timestamps();

            $table->foreign('incoming_id')->references('id')->on('incoming')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produksi');
    }
}
