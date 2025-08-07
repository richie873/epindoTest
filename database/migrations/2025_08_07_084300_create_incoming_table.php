<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIncomingTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('incoming', function (Blueprint $table) {
            $table->id();
            $table->string('material_name'); // nama bahan
            $table->string('material_type'); // jenis bahan (kimia, logam, cairan, dll)
            $table->string('unit')->default('kg'); // satuan (kg, liter, pcs, dll)
            $table->integer('quantity'); // jumlah masuk
            $table->date('received_date'); // tanggal diterima
            $table->string('received_by'); // nama petugas yang terima
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('incoming');
    }
}
